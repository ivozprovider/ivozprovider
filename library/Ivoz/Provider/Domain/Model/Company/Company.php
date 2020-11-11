<?php

namespace Ivoz\Provider\Domain\Model\Company;

use Assert\Assertion;
use Doctrine\Common\Collections\Criteria;
use Ivoz\Provider\Domain\Model\FeaturesRelCompany\FeaturesRelCompany;
use Ivoz\Provider\Domain\Model\Friend\Friend;
use Ivoz\Provider\Domain\Model\Language\LanguageInterface;

/**
 * Company
 */
class Company extends CompanyAbstract implements CompanyInterface
{
    const EMPTY_DOMAIN_EXCEPTION = 2001;

    use CompanyTrait;

    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet()
    {
        $response = parent::getChangeSet();
        unset($response['currentDayUsage']);

        return $response;
    }

    /**
     * {@inheritDoc}
     */
    public function setName(string $name): static
    {
        return parent::setName(trim($name));
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

    protected function sanitizeValues()
    {
        if (!$this->getDefaultTimezone()) {
            $this->setDefaultTimezone(
                $this->getBrandTimezone()
            );
        }

        if (!parent::getLanguage()) {
            $this->setLanguage(
                // @todo create a shortcut
                $this->getBrand()->getLanguage()
            );
        }

        if (!$this->getIpFilter()) {
            $this->setIpFilter(false);
        }

        if (!$this->getOnDemandRecord()) {
            $this->setOnDemandRecord(0);
        }

        if (!$this->getOnDemandRecordCode()) {
            $this->setOnDemandRecordCode('');
        }

        $setBrandDomain = in_array(
            $this->getType(),
            [
                self::TYPE_RETAIL,
                self::TYPE_RESIDENTIAL
            ],
            true
        );

        if ($setBrandDomain) {
            if (!$this->getDomain()) {
                $this->setDomain(
                    $this->getBrand()->getDomain()
                );
            }
        }
    }

    public function getLanguage(): ?LanguageInterface
    {
        $language = parent::getLanguage();
        if ($language) {
            return $language;
        }

        return $this
            ->getBrand()
            ->getLanguage();
    }

    /**
     * {@inheritDoc}
     */
    public function setOnDemandRecordCode(?string $onDemandRecordCode = null): static
    {
        if (!empty($onDemandRecordCode)) {
            Assertion::regex($onDemandRecordCode, '/^[0-9]+$/');
        }
        return parent::setOnDemandRecordCode($onDemandRecordCode);
    }

    /**
     * @param string $exten
     * @return \Ivoz\Provider\Domain\Model\Extension\ExtensionInterface | null
     */
    public function getExtension($exten)
    {
        $criteria = Criteria::create();
        $criteria->where(
            Criteria::expr()->eq('number', $exten)
        );
        $extensions = $this->getExtensions($criteria);

        return array_shift($extensions);
    }

    /**
     * @param string $ddieE164
     * @return \Ivoz\Provider\Domain\Model\Ddi\DdiInterface|null
     */
    public function getDdi($ddieE164)
    {
        $criteria = Criteria::create();
        $criteria->where(
            Criteria::expr()->eq('ddie164', $ddieE164)
        );
        $ddis = $this->getDdis($criteria);

        return array_shift($ddis);
    }


    public function getFriend($exten)
    {
        $criteria = Criteria::create();
        $criteria->orderBy(['priority' => Criteria::ASC]);
        $friends = $this->getFriends($criteria);
        /**
         * @var Friend $friend
         */
        foreach ($friends as $friend) {
            if ($friend->checkExtension($exten)) {
                return $friend;
            }
        }

        return null;
    }

    /**
     * @param string $exten
     * @return \Ivoz\Provider\Domain\Model\CompanyService\CompanyServiceInterface|null
     */
    public function getService($exten)
    {
        $code = substr($exten, 1);

        // Get company services
        $services = $this->getCompanyServices();

        // Look for an exact match in service name
        foreach ($services as $service) {
            if ($service->getService()->getExtraArgs()) {
                continue;
            }
            if (strlen($code) !== strlen($service->getCode())) {
                continue;
            }
            if ($code === $service->getCode()) {
                return $service;
            }
        }

        // Look for a partial service match
        foreach ($services as $service) {
            if (!$service->getService()->getExtraArgs()) {
                continue;
            }
            if (!strncmp($code, $service->getCode(), strlen($service->getCode()))) {
                return $service;
            }
        }

        // Extension doesn't match any service
        return null;
    }

    /**
     * @param string $name
     * @return \Ivoz\Provider\Domain\Model\Terminal\TerminalInterface|mixed
     */
    public function getTerminal($name)
    {
        $criteria = Criteria::create();
        $criteria->where(
            Criteria::expr()->eq('name', $name)
        );
        $terminals = $this->getTerminals($criteria);

        return array_shift($terminals);
    }

    /**
     * @return string
     */
    public function getLanguageCode()
    {
        $language = parent::getLanguage();
        if (! $language) {
            return $this->getBrand()->getLanguageCode();
        }
        return $language->getIden();
    }

    /**
     * @return string
     */
    public function getCurrencySymbol()
    {
        $currency = $this->getCurrency();
        if (!$currency) {
            return $this->getBrand()->getCurrencySymbol();
        }
        return $currency->getSymbol();
    }

    /**
     * @return string
     */
    public function getCurrencyIden()
    {
        $currency = $this->getCurrency();
        if (!$currency) {
            return $this->getBrand()->getCurrencyIden();
        }
        return $currency->getIden();
    }

    /**
     * brief: Get musicclass for given company
     *
     * If no specific company music on hold is found, brand music will be used.
     * If no specific brand music  on hold is found, dafault music will be sued.
     *
     * @return string
     */
    public function getMusicClass()
    {
        // Company has music on hold
        /** @var \Ivoz\Provider\Domain\Model\MusicOnHold\MusicOnHoldInterface[] $companyMoH */
        $companyMoH = $this->getMusicsOnHold();
        if (!empty($companyMoH)) {
            return $companyMoH[0]->getOwner();
        }

        // Brand has music on hold
        /** @var \Ivoz\Provider\Domain\Model\MusicOnHold\MusicOnHoldInterface[] $brandMoH */
        $brandMoH = $this->getBrand()->getMusicsOnHold();
        if (!empty($brandMoH)) {
            return $brandMoH[0]->getOwner();
        }

        return "default";
    }

    /**
     * @inheritdoc
     */
    public function setDomainUsers(?string $domainUsers = null): static
    {
        if (is_string($domainUsers)) {
            $domainUsers = trim($domainUsers);
        }

        if ($this->getType() === self::TYPE_VPBX && empty($domainUsers)) {
            throw new \DomainException("Domain can't be empty", self::EMPTY_DOMAIN_EXCEPTION);
        }

        return parent::setDomainUsers($domainUsers);
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\OutgoingRouting\OutgoingRoutingInterface[]
     */
    public function getOutgoingRoutings()
    {
        $outgoingRoutings = $this->getBrand()->getOutgoingRoutings();
        $applicableOutgoingRoutings = array();

        foreach ($outgoingRoutings as $outgoingRouting) {
            $isForAllCompanies = is_null($outgoingRouting->getCompany());
            $isForMyCompany = !$isForAllCompanies && ($outgoingRouting->getCompany()->getId() == $this->getId());

            if ($isForMyCompany or $isForAllCompanies) {
                array_push($applicableOutgoingRoutings, $outgoingRouting);
            }
        }

        return $applicableOutgoingRoutings;
    }

    /**
     * Get the size in bytes used by the recordings on this company
     * @return int|null
     */
    public function getRecordingsDiskUsage()
    {
        /**
         * @var Company $this
         */
        $total = 0;

        // Get company recordings
        $recordings = $this->getRecordings();

        // Sum all recording size
        foreach ($recordings as $recording) {
            $total += $recording->getRecordedFile()->getFileSize();
        }
        return $total;
    }

    /**
     * Get the size in bytes for disk usage limit on this company
     * @return float|int
     */
    public function getRecordingsLimit()
    {
        /**
         * @var Company $this
         */
        return $this->getRecordingsLimitMB() * 1024 * 1024;
    }

    /**
     * Check if a Company has a given Feature by id
     *
     * @param int $featureId
     * @return bool
     */
    public function hasFeature($featureId): bool
    {
        foreach ($this->getFeatures() as $feature) {
            if ($feature->getId() == $featureId) {
                return true;
            }
        }
        return false;
    }

    public function hasFeatureByIden(string $iden): bool
    {
        foreach ($this->getFeatures() as $feature) {
            if ($feature->getIden() === $iden) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get On demand recording code DTMFs
     * @return string
     */
    public function getOnDemandRecordDTMFs()
    {
        /**
         * @var Company $this
         */
        return '*' . $this->getOnDemandRecordCode();
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Feature\FeatureInterface[]
     */
    public function getFeatures()
    {
        /**
         * @var Company $this
         */
        $features = array();

        /**
         * @var FeaturesRelCompany $relFeature
         */
        foreach ($this->getRelFeatures() as $relFeature) {
            $relFeatureId = $relFeature->getFeature()->getId();
            if ($this->getBrand()->hasFeature($relFeatureId)) {
                array_push($features, $relFeature->getFeature());
            }
        }

        return $features;
    }

    /**
     * @param string $name
     * @return string
     */
    public function getServiceCode($name)
    {
        // Get company services
        $services = $this->getCompanyServices();
        // Look for an exact match in service name
        foreach ($services as $service) {
            if ($service->getService()->getIden() === $name) {
                return $service->getCode();
            }
        }

        return '';
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Timezone\TimezoneInterface
     */
    private function getBrandTimezone()
    {
        return $this
            ->getBrand()
            ->getDefaultTimezone();
    }

    /**
     * @return string
     */
    public function getCgrSubject()
    {
        return sprintf("c%d", $this->getId());
    }

    public function isVpbx(): bool
    {
        return $this->getType() === self::TYPE_VPBX;
    }

    public function isRetail(): bool
    {
        return $this->getType() === self::TYPE_RETAIL;
    }

    public function isResidential(): bool
    {
        return $this->getType() === self::TYPE_RESIDENTIAL;
    }

    public function isWholesale(): bool
    {
        return $this->getType() === self::TYPE_WHOLESALE;
    }

    protected function setBalance(?float $balance = null): static
    {
        $balance = round($balance, 4);
        return parent::setBalance($balance);
    }
}
