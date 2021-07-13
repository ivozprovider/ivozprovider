<?php

namespace Ivoz\Provider\Domain\Model\Brand;

use Ivoz\Core\Domain\Model\TempFileContainnerTrait;
use Ivoz\Core\Domain\Service\FileContainerInterface;

/**
 * Brand
 */
class Brand extends BrandAbstract implements FileContainerInterface, BrandInterface
{
    use BrandTrait;
    use TempFileContainnerTrait;

    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet()
    {
        return parent::getChangeSet();
    }

    /**
     * @return array
     */
    public function getFileObjects(int $filter = null)
    {
        $fileObjects = [
            'Logo' => [
                FileContainerInterface::DOWNLOADABLE_FILE,
                FileContainerInterface::UPDALOADABLE_FILE,
            ]
        ];

        return $this->filterFileObjects(
            $fileObjects,
            $filter
        );
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
     * @inheritdoc
     * @see BrandAbstract::setDomainUsers
     */
    public function setDomainUsers(?string $domainUsers = null): static
    {
        return parent::setDomainUsers(trim($domainUsers));
    }

    public function getLanguageCode(): string
    {
        return $this
            ->getLanguage()
            ->getIden();
    }

    /**
     * @return string
     */
    public function getCurrencySymbol()
    {
        return $this->getCurrency()->getSymbol();
    }

    /**
     * @return string
     */
    public function getCurrencyIden()
    {
        return $this->getCurrency()->getIden();
    }

    /**
     * Get the size in bytes used by the recordings on this brand
     *
     */
    public function getRecordingsDiskUsage()
    {
        // Get the sum of all the companies usages
        $total = 0;

        foreach ($this->getCompanies() as $company) {
            $total += $company->getRecordingsDiskUsage();
        }

        return $total;
    }

    /**
     * Get the size in bytes for disk usage limit on this brand
     */
    public function getRecordingsLimit()
    {
        return $this->getRecordingsLimitMB() * 1024 * 1024;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Feature\FeatureInterface[]
     */
    public function getFeatures()
    {
        $features = array();
        foreach ($this->getRelFeatures() as $relFeature) {
            array_push($features, $relFeature->getFeature());
        }

        return $features;
    }

    /**
     * @param int $featureId
     * @return bool
     */
    public function hasFeature($featureId)
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
     * Return Brand Cgrates tenant code
     *
     * @return string
     */
    public function getCgrTenant()
    {
        return sprintf(
            "b%d",
            $this->getId()
        );
    }

    /**
     * @param string $exten
     * @return \Ivoz\Provider\Domain\Model\BrandService\BrandServiceInterface|null
     */
    public function getService($exten)
    {
        $code = substr($exten, 1);

        // Get company services
        $services = $this->getServices();

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
}
