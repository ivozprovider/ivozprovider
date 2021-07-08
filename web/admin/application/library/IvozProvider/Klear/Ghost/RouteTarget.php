<?php

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\Service\DataGateway;
use Ivoz\Provider\Domain\Model\ExternalCallFilter\ExternalCallFilterDto;
use Ivoz\Provider\Domain\Model\Ivr\IvrDto;

class IvozProvider_Klear_Ghost_RouteTarget extends KlearMatrix_Model_Field_Ghost_Abstract
{
    /**
     * @param IvrDto $model
     * @return null|string name of target based on route type
     * @throws Zend_Exception
     */
    public function getIvrNoInputTarget($model)
    {
        return $this->getTarget($model, 'getNoInputTarget');
    }

    /**
     * @param IvrDto $model
     * @return null|string name of target based on route type
     * @throws Zend_Exception
     */
    public function getIvrErrorTarget($model)
    {
        return $this->getTarget($model, 'getErrorTarget');
    }

    /**
     * @param $model ExternalCallFilterDto
     * @return null|string name of target based on route type
     * @throws Zend_Exception
     */
    public function getExternalCallFilterHolidayTarget($model)
    {
        return $this->getTarget($model, 'getHolidayTarget');
    }

    /**
     * @param $model ExternalCallFilterDto
     * @return null|string name of target based on route type
     * @throws Zend_Exception
     */
    public function getExternalCallFilterOutOfScheduleTarget($model)
    {
        return $this->getTarget($model, 'getOutOfScheduleTarget');
    }

    /**
     * @param DataTransferObjectInterface $model
     * @param string $method
     * @return null|string name of target based on route type
     * @throws Zend_Exception
     */
    public function getTarget(
        DataTransferObjectInterface $model,
        string $method = 'getTarget'
    ) {
        /** @var DataGateway $dataGateway */
        $dataGateway = \Zend_Registry::get('data_gateway');

        // Get entity name from the Dto
        $entityName = substr(get_class($model), 0, -3);

        return $dataGateway->remoteProcedureCall(
            $entityName,
            $model->getId(),
            $method,
            []
        );
    }

    public function getCallForwardTarget(DataTransferObjectInterface $model)
    {
        return $this->getTarget($model, 'getCallForwardTarget');
    }
}
