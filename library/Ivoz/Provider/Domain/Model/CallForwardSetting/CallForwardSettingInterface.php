<?php

namespace Ivoz\Provider\Domain\Model\CallForwardSetting;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;

interface CallForwardSettingInterface extends LoggableEntityInterface
{
    const CALLTYPEFILTER_INTERNAL = 'internal';
    const CALLTYPEFILTER_EXTERNAL = 'external';
    const CALLTYPEFILTER_BOTH = 'both';


    const CALLFORWARDTYPE_INCONDITIONAL = 'inconditional';
    const CALLFORWARDTYPE_NOANSWER = 'noAnswer';
    const CALLFORWARDTYPE_BUSY = 'busy';
    const CALLFORWARDTYPE_USERNOTREGISTERED = 'userNotRegistered';


    const TARGETTYPE_NUMBER = 'number';
    const TARGETTYPE_EXTENSION = 'extension';
    const TARGETTYPE_VOICEMAIL = 'voicemail';
    const TARGETTYPE_RETAIL = 'retail';


    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet();

    /**
     * {@inheritDoc}
     *
     * @throws \InvalidArgumentException
     */
    public function setNumberValue($numberValue = null);

    public function toArrayPortal();

    /**
     * Get the numberValue in E.164 format when routing to 'number'
     *
     * @return string
     */
    public function getNumberValueE164();

    /**
     * Alias for getTargetType
     *
     * @todo rename tagetType field to routeType
     */
    public function getRouteType();

    /**
     * Get callTypeFilter
     *
     * @return string
     */
    public function getCallTypeFilter(): string;

    /**
     * Get callForwardType
     *
     * @return string
     */
    public function getCallForwardType(): string;

    /**
     * Get targetType
     *
     * @return string | null
     */
    public function getTargetType();

    /**
     * Get numberValue
     *
     * @return string | null
     */
    public function getNumberValue();

    /**
     * Get noAnswerTimeout
     *
     * @return integer
     */
    public function getNoAnswerTimeout(): int;

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled(): bool;

    /**
     * Set user
     *
     * @param \Ivoz\Provider\Domain\Model\User\UserInterface $user | null
     *
     * @return static
     */
    public function setUser(\Ivoz\Provider\Domain\Model\User\UserInterface $user = null);

    /**
     * Get user
     *
     * @return \Ivoz\Provider\Domain\Model\User\UserInterface | null
     */
    public function getUser();

    /**
     * Get extension
     *
     * @return \Ivoz\Provider\Domain\Model\Extension\ExtensionInterface | null
     */
    public function getExtension();

    /**
     * Get voiceMailUser
     *
     * @return \Ivoz\Provider\Domain\Model\User\UserInterface | null
     */
    public function getVoiceMailUser();

    /**
     * Get numberCountry
     *
     * @return \Ivoz\Provider\Domain\Model\Country\CountryInterface | null
     */
    public function getNumberCountry();

    /**
     * Set residentialDevice
     *
     * @param \Ivoz\Provider\Domain\Model\ResidentialDevice\ResidentialDeviceInterface $residentialDevice | null
     *
     * @return static
     */
    public function setResidentialDevice(\Ivoz\Provider\Domain\Model\ResidentialDevice\ResidentialDeviceInterface $residentialDevice = null);

    /**
     * Get residentialDevice
     *
     * @return \Ivoz\Provider\Domain\Model\ResidentialDevice\ResidentialDeviceInterface | null
     */
    public function getResidentialDevice();

    /**
     * Set retailAccount
     *
     * @param \Ivoz\Provider\Domain\Model\RetailAccount\RetailAccountInterface $retailAccount | null
     *
     * @return static
     */
    public function setRetailAccount(\Ivoz\Provider\Domain\Model\RetailAccount\RetailAccountInterface $retailAccount = null);

    /**
     * Get retailAccount
     *
     * @return \Ivoz\Provider\Domain\Model\RetailAccount\RetailAccountInterface | null
     */
    public function getRetailAccount();

    /**
     * Get cfwToRetailAccount
     *
     * @return \Ivoz\Provider\Domain\Model\RetailAccount\RetailAccountInterface | null
     */
    public function getCfwToRetailAccount();

    /**
     * @return bool
     */
    public function isInitialized(): bool;

    /**
     * @param string $prefix
     * @return null|string
     */
    public function getTarget(string $prefix = '');
}
