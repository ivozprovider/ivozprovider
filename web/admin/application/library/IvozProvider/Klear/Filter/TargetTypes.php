<?php

use Ivoz\Core\Application\Service\DataGateway;
use Ivoz\Provider\Domain\Model\Company\Company;
use Ivoz\Provider\Domain\Model\Company\CompanyInterface;
use Ivoz\Provider\Domain\Model\Company\CompanyDto;

/**
 * Class IvozProvider_Klear_Filter_TargetTypes
 *
 * Filter Call Forward settings based on client type
 */
class IvozProvider_Klear_Filter_TargetTypes implements KlearMatrix_Model_Field_Select_Filter_Interface
{

    public function setRouteDispatcher(KlearMatrix_Model_RouteDispatcher $routeDispatcher)
    {
        return true;
    }

    /**
     * Get Call forward types based on company type
     * @return array
     */
    public function getCondition()
    {
        $auth = Zend_Auth::getInstance();
        $user = $auth->getIdentity();

        /** @var DataGateway $dataGateway */
        $dataGateway = \Zend_Registry::get('data_gateway');

        /** @var CompanyDto $companyDto */
        $companyDto = $dataGateway->find(
            Company::class,
            $user->companyId
        );

        if (is_null($companyDto)) {
            // No company feature to filter by
            return [];
        }

        $excludedRoutes = [];

        if ($companyDto->getType() !== CompanyInterface::TYPE_VPBX) {
            $excludedRoutes[] = "extension";
        }

        if ($companyDto->getType() !== CompanyInterface::TYPE_RETAIL) {
            $excludedRoutes[] = "retail";
        }

        if ($companyDto->getType() === CompanyInterface::TYPE_RETAIL) {
            $excludedRoutes[] = "voicemail";
        }

        return $excludedRoutes;
    }
}
