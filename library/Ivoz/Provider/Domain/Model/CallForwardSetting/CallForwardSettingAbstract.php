<?php

namespace Ivoz\Provider\Domain\Model\CallForwardSetting;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;
use Ivoz\Core\Domain\Model\EntityInterface;

/**
 * CallForwardSettingAbstract
 * @codeCoverageIgnore
 */
abstract class CallForwardSettingAbstract
{
    /**
     * comment: enum:internal|external|both
     * @var string
     */
    protected $callTypeFilter;

    /**
     * comment: enum:inconditional|noAnswer|busy|userNotRegistered
     * @var string
     */
    protected $callForwardType;

    /**
     * comment: enum:number|extension|voicemail|retail
     * @var string | null
     */
    protected $targetType;

    /**
     * @var string | null
     */
    protected $numberValue;

    /**
     * @var integer
     */
    protected $noAnswerTimeout = 10;

    /**
     * @var boolean
     */
    protected $enabled = true;

    /**
     * @var \Ivoz\Provider\Domain\Model\User\UserInterface | null
     */
    protected $user;

    /**
     * @var \Ivoz\Provider\Domain\Model\Extension\ExtensionInterface | null
     */
    protected $extension;

    /**
     * @var \Ivoz\Provider\Domain\Model\User\UserInterface | null
     */
    protected $voiceMailUser;

    /**
     * @var \Ivoz\Provider\Domain\Model\Country\CountryInterface | null
     */
    protected $numberCountry;

    /**
     * @var \Ivoz\Provider\Domain\Model\ResidentialDevice\ResidentialDeviceInterface | null
     */
    protected $residentialDevice;

    /**
     * @var \Ivoz\Provider\Domain\Model\RetailAccount\RetailAccountInterface | null
     */
    protected $retailAccount;

    /**
     * @var \Ivoz\Provider\Domain\Model\RetailAccount\RetailAccountInterface | null
     */
    protected $cfwToRetailAccount;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct(
        $callTypeFilter,
        $callForwardType,
        $noAnswerTimeout,
        $enabled
    ) {
        $this->setCallTypeFilter($callTypeFilter);
        $this->setCallForwardType($callForwardType);
        $this->setNoAnswerTimeout($noAnswerTimeout);
        $this->setEnabled($enabled);
    }

    abstract public function getId();

    public function __toString()
    {
        return sprintf(
            "%s#%s",
            "CallForwardSetting",
            $this->getId()
        );
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @param null $id
     * @return CallForwardSettingDto
     */
    public static function createDto($id = null)
    {
        return new CallForwardSettingDto($id);
    }

    /**
     * @internal use EntityTools instead
     * @param CallForwardSettingInterface|null $entity
     * @param int $depth
     * @return CallForwardSettingDto|null
     */
    public static function entityToDto(EntityInterface $entity = null, $depth = 0)
    {
        if (!$entity) {
            return null;
        }

        Assertion::isInstanceOf($entity, CallForwardSettingInterface::class);

        if ($depth < 1) {
            return static::createDto($entity->getId());
        }

        if ($entity instanceof \Doctrine\ORM\Proxy\Proxy && !$entity->__isInitialized()) {
            return static::createDto($entity->getId());
        }

        /** @var CallForwardSettingDto $dto */
        $dto = $entity->toDto($depth-1);

        return $dto;
    }

    /**
     * Factory method
     * @internal use EntityTools instead
     * @param CallForwardSettingDto $dto
     * @return self
     */
    public static function fromDto(
        DataTransferObjectInterface $dto,
        \Ivoz\Core\Application\ForeignKeyTransformerInterface $fkTransformer
    ) {
        Assertion::isInstanceOf($dto, CallForwardSettingDto::class);

        $self = new static(
            $dto->getCallTypeFilter(),
            $dto->getCallForwardType(),
            $dto->getNoAnswerTimeout(),
            $dto->getEnabled()
        );

        $self
            ->setTargetType($dto->getTargetType())
            ->setNumberValue($dto->getNumberValue())
            ->setUser($fkTransformer->transform($dto->getUser()))
            ->setExtension($fkTransformer->transform($dto->getExtension()))
            ->setVoiceMailUser($fkTransformer->transform($dto->getVoiceMailUser()))
            ->setNumberCountry($fkTransformer->transform($dto->getNumberCountry()))
            ->setResidentialDevice($fkTransformer->transform($dto->getResidentialDevice()))
            ->setRetailAccount($fkTransformer->transform($dto->getRetailAccount()))
            ->setCfwToRetailAccount($fkTransformer->transform($dto->getCfwToRetailAccount()))
        ;

        $self->initChangelog();

        return $self;
    }

    /**
     * @internal use EntityTools instead
     * @param CallForwardSettingDto $dto
     * @return self
     */
    public function updateFromDto(
        DataTransferObjectInterface $dto,
        \Ivoz\Core\Application\ForeignKeyTransformerInterface $fkTransformer
    ) {
        Assertion::isInstanceOf($dto, CallForwardSettingDto::class);

        $this
            ->setCallTypeFilter($dto->getCallTypeFilter())
            ->setCallForwardType($dto->getCallForwardType())
            ->setTargetType($dto->getTargetType())
            ->setNumberValue($dto->getNumberValue())
            ->setNoAnswerTimeout($dto->getNoAnswerTimeout())
            ->setEnabled($dto->getEnabled())
            ->setUser($fkTransformer->transform($dto->getUser()))
            ->setExtension($fkTransformer->transform($dto->getExtension()))
            ->setVoiceMailUser($fkTransformer->transform($dto->getVoiceMailUser()))
            ->setNumberCountry($fkTransformer->transform($dto->getNumberCountry()))
            ->setResidentialDevice($fkTransformer->transform($dto->getResidentialDevice()))
            ->setRetailAccount($fkTransformer->transform($dto->getRetailAccount()))
            ->setCfwToRetailAccount($fkTransformer->transform($dto->getCfwToRetailAccount()));



        return $this;
    }

    /**
     * @internal use EntityTools instead
     * @param int $depth
     * @return CallForwardSettingDto
     */
    public function toDto($depth = 0)
    {
        return self::createDto()
            ->setCallTypeFilter(self::getCallTypeFilter())
            ->setCallForwardType(self::getCallForwardType())
            ->setTargetType(self::getTargetType())
            ->setNumberValue(self::getNumberValue())
            ->setNoAnswerTimeout(self::getNoAnswerTimeout())
            ->setEnabled(self::getEnabled())
            ->setUser(\Ivoz\Provider\Domain\Model\User\User::entityToDto(self::getUser(), $depth))
            ->setExtension(\Ivoz\Provider\Domain\Model\Extension\Extension::entityToDto(self::getExtension(), $depth))
            ->setVoiceMailUser(\Ivoz\Provider\Domain\Model\User\User::entityToDto(self::getVoiceMailUser(), $depth))
            ->setNumberCountry(\Ivoz\Provider\Domain\Model\Country\Country::entityToDto(self::getNumberCountry(), $depth))
            ->setResidentialDevice(\Ivoz\Provider\Domain\Model\ResidentialDevice\ResidentialDevice::entityToDto(self::getResidentialDevice(), $depth))
            ->setRetailAccount(\Ivoz\Provider\Domain\Model\RetailAccount\RetailAccount::entityToDto(self::getRetailAccount(), $depth))
            ->setCfwToRetailAccount(\Ivoz\Provider\Domain\Model\RetailAccount\RetailAccount::entityToDto(self::getCfwToRetailAccount(), $depth));
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'callTypeFilter' => self::getCallTypeFilter(),
            'callForwardType' => self::getCallForwardType(),
            'targetType' => self::getTargetType(),
            'numberValue' => self::getNumberValue(),
            'noAnswerTimeout' => self::getNoAnswerTimeout(),
            'enabled' => self::getEnabled(),
            'userId' => self::getUser() ? self::getUser()->getId() : null,
            'extensionId' => self::getExtension() ? self::getExtension()->getId() : null,
            'voiceMailUserId' => self::getVoiceMailUser() ? self::getVoiceMailUser()->getId() : null,
            'numberCountryId' => self::getNumberCountry() ? self::getNumberCountry()->getId() : null,
            'residentialDeviceId' => self::getResidentialDevice() ? self::getResidentialDevice()->getId() : null,
            'retailAccountId' => self::getRetailAccount() ? self::getRetailAccount()->getId() : null,
            'cfwToRetailAccountId' => self::getCfwToRetailAccount() ? self::getCfwToRetailAccount()->getId() : null
        ];
    }
    // @codeCoverageIgnoreStart

    /**
     * Set callTypeFilter
     *
     * @param string $callTypeFilter
     *
     * @return static
     */
    protected function setCallTypeFilter($callTypeFilter)
    {
        Assertion::notNull($callTypeFilter, 'callTypeFilter value "%s" is null, but non null value was expected.');
        Assertion::maxLength($callTypeFilter, 25, 'callTypeFilter value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        Assertion::choice($callTypeFilter, [
            CallForwardSettingInterface::CALLTYPEFILTER_INTERNAL,
            CallForwardSettingInterface::CALLTYPEFILTER_EXTERNAL,
            CallForwardSettingInterface::CALLTYPEFILTER_BOTH
        ], 'callTypeFiltervalue "%s" is not an element of the valid values: %s');

        $this->callTypeFilter = $callTypeFilter;

        return $this;
    }

    /**
     * Get callTypeFilter
     *
     * @return string
     */
    public function getCallTypeFilter(): string
    {
        return $this->callTypeFilter;
    }

    /**
     * Set callForwardType
     *
     * @param string $callForwardType
     *
     * @return static
     */
    protected function setCallForwardType($callForwardType)
    {
        Assertion::notNull($callForwardType, 'callForwardType value "%s" is null, but non null value was expected.');
        Assertion::maxLength($callForwardType, 25, 'callForwardType value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        Assertion::choice($callForwardType, [
            CallForwardSettingInterface::CALLFORWARDTYPE_INCONDITIONAL,
            CallForwardSettingInterface::CALLFORWARDTYPE_NOANSWER,
            CallForwardSettingInterface::CALLFORWARDTYPE_BUSY,
            CallForwardSettingInterface::CALLFORWARDTYPE_USERNOTREGISTERED
        ], 'callForwardTypevalue "%s" is not an element of the valid values: %s');

        $this->callForwardType = $callForwardType;

        return $this;
    }

    /**
     * Get callForwardType
     *
     * @return string
     */
    public function getCallForwardType(): string
    {
        return $this->callForwardType;
    }

    /**
     * Set targetType
     *
     * @param string $targetType | null
     *
     * @return static
     */
    protected function setTargetType($targetType = null)
    {
        if (!is_null($targetType)) {
            Assertion::maxLength($targetType, 25, 'targetType value "%s" is too long, it should have no more than %d characters, but has %d characters.');
            Assertion::choice($targetType, [
                CallForwardSettingInterface::TARGETTYPE_NUMBER,
                CallForwardSettingInterface::TARGETTYPE_EXTENSION,
                CallForwardSettingInterface::TARGETTYPE_VOICEMAIL,
                CallForwardSettingInterface::TARGETTYPE_RETAIL
            ], 'targetTypevalue "%s" is not an element of the valid values: %s');
        }

        $this->targetType = $targetType;

        return $this;
    }

    /**
     * Get targetType
     *
     * @return string | null
     */
    public function getTargetType()
    {
        return $this->targetType;
    }

    /**
     * Set numberValue
     *
     * @param string $numberValue | null
     *
     * @return static
     */
    protected function setNumberValue($numberValue = null)
    {
        if (!is_null($numberValue)) {
            Assertion::maxLength($numberValue, 25, 'numberValue value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        }

        $this->numberValue = $numberValue;

        return $this;
    }

    /**
     * Get numberValue
     *
     * @return string | null
     */
    public function getNumberValue()
    {
        return $this->numberValue;
    }

    /**
     * Set noAnswerTimeout
     *
     * @param integer $noAnswerTimeout
     *
     * @return static
     */
    protected function setNoAnswerTimeout($noAnswerTimeout)
    {
        Assertion::notNull($noAnswerTimeout, 'noAnswerTimeout value "%s" is null, but non null value was expected.');
        Assertion::integerish($noAnswerTimeout, 'noAnswerTimeout value "%s" is not an integer or a number castable to integer.');

        $this->noAnswerTimeout = (int) $noAnswerTimeout;

        return $this;
    }

    /**
     * Get noAnswerTimeout
     *
     * @return integer
     */
    public function getNoAnswerTimeout(): int
    {
        return $this->noAnswerTimeout;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return static
     */
    protected function setEnabled($enabled)
    {
        Assertion::notNull($enabled, 'enabled value "%s" is null, but non null value was expected.');
        Assertion::between(intval($enabled), 0, 1, 'enabled provided "%s" is not a valid boolean value.');
        $enabled = (bool) $enabled;

        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * Set user
     *
     * @param \Ivoz\Provider\Domain\Model\User\UserInterface $user | null
     *
     * @return static
     */
    public function setUser(\Ivoz\Provider\Domain\Model\User\UserInterface $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Ivoz\Provider\Domain\Model\User\UserInterface | null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set extension
     *
     * @param \Ivoz\Provider\Domain\Model\Extension\ExtensionInterface $extension | null
     *
     * @return static
     */
    protected function setExtension(\Ivoz\Provider\Domain\Model\Extension\ExtensionInterface $extension = null)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return \Ivoz\Provider\Domain\Model\Extension\ExtensionInterface | null
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set voiceMailUser
     *
     * @param \Ivoz\Provider\Domain\Model\User\UserInterface $voiceMailUser | null
     *
     * @return static
     */
    protected function setVoiceMailUser(\Ivoz\Provider\Domain\Model\User\UserInterface $voiceMailUser = null)
    {
        $this->voiceMailUser = $voiceMailUser;

        return $this;
    }

    /**
     * Get voiceMailUser
     *
     * @return \Ivoz\Provider\Domain\Model\User\UserInterface | null
     */
    public function getVoiceMailUser()
    {
        return $this->voiceMailUser;
    }

    /**
     * Set numberCountry
     *
     * @param \Ivoz\Provider\Domain\Model\Country\CountryInterface $numberCountry | null
     *
     * @return static
     */
    protected function setNumberCountry(\Ivoz\Provider\Domain\Model\Country\CountryInterface $numberCountry = null)
    {
        $this->numberCountry = $numberCountry;

        return $this;
    }

    /**
     * Get numberCountry
     *
     * @return \Ivoz\Provider\Domain\Model\Country\CountryInterface | null
     */
    public function getNumberCountry()
    {
        return $this->numberCountry;
    }

    /**
     * Set residentialDevice
     *
     * @param \Ivoz\Provider\Domain\Model\ResidentialDevice\ResidentialDeviceInterface $residentialDevice | null
     *
     * @return static
     */
    public function setResidentialDevice(\Ivoz\Provider\Domain\Model\ResidentialDevice\ResidentialDeviceInterface $residentialDevice = null)
    {
        $this->residentialDevice = $residentialDevice;

        return $this;
    }

    /**
     * Get residentialDevice
     *
     * @return \Ivoz\Provider\Domain\Model\ResidentialDevice\ResidentialDeviceInterface | null
     */
    public function getResidentialDevice()
    {
        return $this->residentialDevice;
    }

    /**
     * Set retailAccount
     *
     * @param \Ivoz\Provider\Domain\Model\RetailAccount\RetailAccountInterface $retailAccount | null
     *
     * @return static
     */
    public function setRetailAccount(\Ivoz\Provider\Domain\Model\RetailAccount\RetailAccountInterface $retailAccount = null)
    {
        $this->retailAccount = $retailAccount;

        return $this;
    }

    /**
     * Get retailAccount
     *
     * @return \Ivoz\Provider\Domain\Model\RetailAccount\RetailAccountInterface | null
     */
    public function getRetailAccount()
    {
        return $this->retailAccount;
    }

    /**
     * Set cfwToRetailAccount
     *
     * @param \Ivoz\Provider\Domain\Model\RetailAccount\RetailAccountInterface $cfwToRetailAccount | null
     *
     * @return static
     */
    protected function setCfwToRetailAccount(\Ivoz\Provider\Domain\Model\RetailAccount\RetailAccountInterface $cfwToRetailAccount = null)
    {
        $this->cfwToRetailAccount = $cfwToRetailAccount;

        return $this;
    }

    /**
     * Get cfwToRetailAccount
     *
     * @return \Ivoz\Provider\Domain\Model\RetailAccount\RetailAccountInterface | null
     */
    public function getCfwToRetailAccount()
    {
        return $this->cfwToRetailAccount;
    }

    // @codeCoverageIgnoreEnd
}
