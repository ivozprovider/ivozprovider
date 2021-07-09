<?php

/**
 * Class IvozProvider_Klear_Filter_RetailAccounts
 *
 * Filter company's retail accounts to exclude current edited retail account
 */
class IvozProvider_Klear_Filter_RetailAccounts extends IvozProvider_Klear_Filter_Company
{
    protected $_condition = array();

    public function setRouteDispatcher(KlearMatrix_Model_RouteDispatcher $routeDispatcher)
    {
        // Add parent filters
        parent::setRouteDispatcher($routeDispatcher);

        $pk = $routeDispatcher->getParam("parentId", false);

        if (!is_array($pk)) {
            $this->_condition[] = "self::id != $pk";
        }

        return true;
    }
}
