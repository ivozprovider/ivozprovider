<?php

namespace Ivoz\Provider\Domain\Model\User;

use Ivoz\Provider\Domain\Model\Ddi\DdiInterface;
use Ivoz\Provider\Domain\Model\Language\LanguageInterface;
use Ivoz\Provider\Domain\Model\OutgoingDdiRule\OutgoingDdiRuleInterface;
use Ivoz\Provider\Domain\Model\PickUpRelUser\PickUpRelUserInterface;
use Symfony\Component\Security\Core\User\UserInterface as SymfonyUserInterface;

/**
 * User
 */
class User extends UserAbstract implements UserInterface, SymfonyUserInterface, \Serializable
{
    use UserTrait;
    use UserSecurityTrait;

    /**
     * @return array
     */
    public function getChangeSet()
    {
        return parent::getChangeSet();
    }

    /**
     * Get id
     * @codeCoverageIgnore
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Return string representation of this entity
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            "%s %s [%s]",
            $this->getName(),
            $this->getLastname(),
            parent::__toString()
        );
    }

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->email,
            $this->pass,
            $this->active
        ));
    }

    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->email,
            $this->pass,
            $this->active
            ) = unserialize($serialized);
    }

    protected function sanitizeValues()
    {
        $isNew = !$this->getId();
        if ($isNew) {
            $this->sanitizeNew();
        }

        if (!$this->getTimezone()) {
            $this->setTimezone(
                $this->getCompanyTimezone()
            );
        }

        $canAccessUserweb = ($this->getActive() && $this->getEmail());
        if ($canAccessUserweb) {
            // Avoid username/pass/active incoherences
            if (!$this->getPass()) {
                throw new \DomainException('Active users must have a password');
            }
        } else {
            $this->setActive(false);
            $this->setPass(null);
        }

        if (!$this->getEmail()) {
            // If no mail, no SendMail
            $this->setVoicemailSendMail(false);
        }
    }

    protected function sanitizeNew()
    {
        if ($this->getEmail()) {
            $this->setVoicemailSendMail(true);
        }

        if ($this->getEmail() && $this->getPass()) {
            $this->setActive(true);
        }
    }

    /**
     * @inheritdoc
     */
    public function setPass(?string $pass = null): static
    {
        if ($pass === $this->getPass()) {
            return $this;
        }

        if (empty($pass)) {
            return parent::setPass(null);
        }

        $salt = substr(md5(random_int(0, mt_getrandmax()), false), 0, 22);
        $cryptPass = crypt(
            $pass,
            '$2a$08$' . $salt . '$' . $salt . '$'
        );

        return parent::setPass($cryptPass);
    }

    /**
     * return associated endpoint with the user
     *
     * @return \Ivoz\Ast\Domain\Model\PsEndpoint\PsEndpointInterface | null
     */
    public function getEndpoint()
    {
        $terminal = $this->getTerminal();
        if (!$terminal) {
            return null;
        }

        $endpoints = $terminal->getAstPsEndpoints();
        return array_shift($endpoints);
    }

    /**
     * @return string | null
     */
    public function getUserTerminalInterface()
    {
        $terminal = $this->getTerminal();
        if (empty($terminal)) {
            return null;
        }

        return $terminal->getName();
    }

    /**
     * @return string with the voicemail
     */
    public function getVoiceMail()
    {
        return $this->getVoiceMailUser() . '@' . $this->getVoiceMailContext();
    }

    /**
     * @return string with the voicemail user
     */
    public function getVoiceMailUser()
    {
        return "user" . $this->getId();
    }

    /**
     * @return string with the voicemail context
     */
    public function getVoiceMailContext()
    {
        return
            'company'
            . $this->getCompany()->getId();
    }

    /**
     * @return string | null
     */
    public function getOutgoingDdiNumber()
    {
        $ddi = $this->getOutgoingDdi();
        if ($ddi) {
            return $ddi->getDdiE164();
        }

        return null;
    }


    /**
     * Get User outgoingDdi
     * If no Ddi is assigned, retrieve company's default Ddi
     * @return \Ivoz\Provider\Domain\Model\Ddi\DdiInterface | null
     */
    public function getOutgoingDdi(): ?DdiInterface
    {
        $ddi = parent::getOutgoingDdi();
        if ($ddi) {
            return $ddi;
        }

        return $this
            ->getCompany()
            ->getOutgoingDdi();
    }

    public function setOutgoingDdi(?DdiInterface $outgoingDdi = null): static
    {
        return parent::setOutgoingDdi($outgoingDdi);
    }

    /**
     * Get User outgoingDdiRule
     * If no OutgoingDdiRule is assigned, retrieve company's default OutgoingDdiRule
     * @return \Ivoz\Provider\Domain\Model\OutgoingDdiRule\OutgoingDdiRuleInterface|null
     */
    public function getOutgoingDdiRule(): ?OutgoingDdiRuleInterface
    {
        $outgoingDdiRule = parent::getOutgoingDdiRule();
        if ($outgoingDdiRule) {
            return $outgoingDdiRule;
        }

        return $this
            ->getCompany()
            ->getOutgoingDdiRule();
    }


    /**
     * @return string
     */
    public function getExtensionNumber()
    {
        $extension = $this->getExtension();
        if ($extension) {
            return $extension
                ->getNumber();
        }

        return '';
    }

    /**
     * @param string $exten
     * @return bool canCall
     */
    public function isAllowedToCall($exten)
    {
        $callAcl = $this->getCallAcl();
        if (empty($callAcl)) {
            return true;
        }

        return $callAcl
            ->dstIsCallable($exten);
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\PickUpGroup\PickUpGroupInterface[]
     */
    public function getPickUpGroups()
    {
        $pickUpGroups = array();

        /**
         * @var PickUpRelUserInterface[] $pickUpRelUsers
         */
        $pickUpRelUsers = $this->getPickUpRelUsers();
        if (!empty($pickUpRelUsers)) {
            foreach ($pickUpRelUsers as $key => $pickUpRelUser) {
                $pickUpGroups[$key] = $pickUpRelUser->getPickUpGroup();
            }
        }

        return $pickUpGroups;
    }

    /**
     * @return string comma separated pickup group ids
     */
    public function getPickUpGroupsIds()
    {
        $pickUpGroupIds = array();

        /**
         * @var PickUpRelUserInterface[] $pickUpRelUsers
         */
        $pickUpRelUsers = $this->getPickUpRelUsers();
        if (!empty($pickUpRelUsers)) {
            foreach ($pickUpRelUsers as $pickUpRel) {
                if ($pickUpRel->hasBeenDeleted()) {
                    continue;
                }

                array_push($pickUpGroupIds, $pickUpRel->getPickUpGroup()->getId());
            }
        }

        return join(',', $pickUpGroupIds);
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return
            $this->getName()
            . ' '
            . $this->getLastname();
    }

    /**
     * @return array
     */
    public function toArrayPortalForm()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getFullName()
        ];
    }

    /**
     * @return bool
     */
    public function canBeCalled()
    {
        // Check if user is valid to be called
        if (!$this->getActive()) {
            return false;
        }

        // Check if user has terminal configured
        if (empty($this->getTerminal())) {
            return false;
        }
        // Check if user has extension configured
        // Looks like a complete user
        return !empty($this->getExtension());
    }

    /**
     * returns company language if empty
     */
    public function getLanguage(): LanguageInterface
    {
        $language = parent::getLanguage();
        if ($language) {
            return $language;
        }

        return $this->getCompany()->getLanguage();
    }

    /**
     * Get User language code.
     * If not set, get the company language code
     * @return string
     */
    public function getLanguageCode()
    {
        return $this
            ->getLanguage()
            ->getIden();
    }

    public function setEmail(?string $email = null): static
    {
        if ($email === '') {
            // '' is NULL (avoid triggering the UNIQUE KEY)
            $email = null;
        }

        return parent::setEmail($email);
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Timezone\TimezoneInterface
     */
    private function getCompanyTimezone()
    {
        return $this
            ->getCompany()
            ->getDefaultTimezone();
    }

    /**
     * @return string
     */
    public function getFullNameExtension()
    {
        return sprintf(
            "%s %s (%s)",
            $this->getName(),
            $this->getLastname(),
            $this->getExtensionNumber()
        );
    }
}
