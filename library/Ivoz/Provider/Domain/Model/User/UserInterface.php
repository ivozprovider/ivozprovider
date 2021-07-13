<?php

namespace Ivoz\Provider\Domain\Model\User;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;
use Ivoz\Provider\Domain\Model\Ddi\DdiInterface;
use Ivoz\Provider\Domain\Model\OutgoingDdiRule\OutgoingDdiRuleInterface;
use Ivoz\Provider\Domain\Model\Language\LanguageInterface;
use Ivoz\Provider\Domain\Model\Company\CompanyInterface;
use Ivoz\Provider\Domain\Model\CallAcl\CallAclInterface;
use Ivoz\Provider\Domain\Model\MatchList\MatchListInterface;
use Ivoz\Provider\Domain\Model\TransformationRuleSet\TransformationRuleSetInterface;
use Ivoz\Provider\Domain\Model\Terminal\TerminalInterface;
use Ivoz\Provider\Domain\Model\Extension\ExtensionInterface;
use Ivoz\Provider\Domain\Model\Timezone\TimezoneInterface;
use Ivoz\Provider\Domain\Model\Locution\LocutionInterface;
use Ivoz\Provider\Domain\Model\PickUpRelUser\PickUpRelUserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;
use Ivoz\Provider\Domain\Model\QueueMember\QueueMemberInterface;
use Ivoz\Provider\Domain\Model\CallForwardSetting\CallForwardSettingInterface;

/**
* UserInterface
*/
interface UserInterface extends LoggableEntityInterface
{
    const EXTERNALIPCALLS_0 = '0';

    const EXTERNALIPCALLS_1 = '1';

    const EXTERNALIPCALLS_2 = '2';

    const EXTERNALIPCALLS_3 = '3';

    const REJECTCALLMETHOD_RFC = 'rfc';

    const REJECTCALLMETHOD_486 = '486';

    const REJECTCALLMETHOD_600 = '600';

    /**
     * @return array
     */
    public function getChangeSet();

    public function serialize();

    public function unserialize($serialized);

    /**
     * @inheritdoc
     */
    public function setPass(?string $pass = null): static;

    /**
     * return associated endpoint with the user
     *
     * @return \Ivoz\Ast\Domain\Model\PsEndpoint\PsEndpointInterface | null
     */
    public function getEndpoint();

    /**
     * @return string | null
     */
    public function getUserTerminalInterface();

    /**
     * @return string with the voicemail
     */
    public function getVoiceMail();

    /**
     * @return string with the voicemail user
     */
    public function getVoiceMailUser();

    /**
     * @return string with the voicemail context
     */
    public function getVoiceMailContext();

    /**
     * @return string | null
     */
    public function getOutgoingDdiNumber();

    /**
     * Get User outgoingDdi
     * If no Ddi is assigned, retrieve company's default Ddi
     * @return \Ivoz\Provider\Domain\Model\Ddi\DdiInterface | null
     */
    public function getOutgoingDdi(): ?DdiInterface;

    public function setOutgoingDdi(?DdiInterface $outgoingDdi = null): static;

    /**
     * Get User outgoingDdiRule
     * If no OutgoingDdiRule is assigned, retrieve company's default OutgoingDdiRule
     * @return \Ivoz\Provider\Domain\Model\OutgoingDdiRule\OutgoingDdiRuleInterface|null
     */
    public function getOutgoingDdiRule(): ?OutgoingDdiRuleInterface;

    /**
     * @return string
     */
    public function getExtensionNumber();

    /**
     * @param string $exten
     * @return bool canCall
     */
    public function isAllowedToCall($exten);

    /**
     * @return \Ivoz\Provider\Domain\Model\PickUpGroup\PickUpGroupInterface[]
     */
    public function getPickUpGroups();

    /**
     * @return string comma separated pickup group ids
     */
    public function getPickUpGroupsIds();

    /**
     * @return string
     */
    public function getFullName();

    /**
     * @return array
     */
    public function toArrayPortalForm();

    /**
     * @return bool
     */
    public function canBeCalled();

    /**
     * Get user language
     * returns company language if empty
     * @return \Ivoz\Provider\Domain\Model\Language\LanguageInterface | null
     */
    public function getLanguage(): ?LanguageInterface;

    /**
     * Get User language code.
     * If not set, get the company language code
     * @return string
     */
    public function getLanguageCode();

    public function setEmail(?string $email = null): static;

    /**
     * @return string
     */
    public function getFullNameExtension();

    public function getName(): string;

    public function getLastname(): string;

    public function getEmail(): ?string;

    public function getPass(): ?string;

    public function getDoNotDisturb(): bool;

    public function getIsBoss(): bool;

    public function getActive(): bool;

    public function getMaxCalls(): int;

    public function getExternalIpCalls(): string;

    public function getRejectCallMethod(): string;

    public function getVoicemailEnabled(): bool;

    public function getVoicemailSendMail(): bool;

    public function getVoicemailAttachSound(): bool;

    public function getMultiContact(): bool;

    public function getGsQRCode(): bool;

    public function getCompany(): CompanyInterface;

    public function getCallAcl(): ?CallAclInterface;

    public function getBossAssistant(): ?UserInterface;

    public function getBossAssistantWhiteList(): ?MatchListInterface;

    public function getTransformationRuleSet(): ?TransformationRuleSetInterface;

    public function setTerminal(?TerminalInterface $terminal = null): static;

    public function getTerminal(): ?TerminalInterface;

    public function setExtension(?ExtensionInterface $extension = null): static;

    public function getExtension(): ?ExtensionInterface;

    public function getTimezone(): ?TimezoneInterface;

    public function getVoicemailLocution(): ?LocutionInterface;

    public function isInitialized(): bool;

    public function addPickUpRelUser(PickUpRelUserInterface $pickUpRelUser): UserInterface;

    public function removePickUpRelUser(PickUpRelUserInterface $pickUpRelUser): UserInterface;

    public function replacePickUpRelUsers(ArrayCollection $pickUpRelUsers): UserInterface;

    public function getPickUpRelUsers(?Criteria $criteria = null): array;

    public function addQueueMember(QueueMemberInterface $queueMember): UserInterface;

    public function removeQueueMember(QueueMemberInterface $queueMember): UserInterface;

    public function replaceQueueMembers(ArrayCollection $queueMembers): UserInterface;

    public function getQueueMembers(?Criteria $criteria = null): array;

    public function addCallForwardSetting(CallForwardSettingInterface $callForwardSetting): UserInterface;

    public function removeCallForwardSetting(CallForwardSettingInterface $callForwardSetting): UserInterface;

    public function replaceCallForwardSettings(ArrayCollection $callForwardSettings): UserInterface;

    public function getCallForwardSettings(?Criteria $criteria = null): array;

    /**
     * @see UserInterface::getRoles()
     */
    public function getRoles(): array;

    /**
     * @see UserInterface::getUsername()
     */
    public function getUsername(): string;

    /**
     * @see UserInterface::getPassword()
     */
    public function getPassword(): string;

    public function isEnabled(): bool;

    /**
     * @see UserInterface::getSalt()
     */
    public function getSalt(): string;

    /**
     * @see UserInterface::eraseCredentials()
     */
    public function eraseCredentials();
}
