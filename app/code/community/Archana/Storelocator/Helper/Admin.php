<?php
/**
 * Store locator admin helper
 * 
 */
class Archana_Storelocator_Helper_Admin extends Mage_Core_Helper_Abstract
{
    /**
     * Check permission for passed action
     *
     * @param string $action
     * @return bool
     */
    public function isActionAllowed($action)
    {
        return Mage::getSingleton('admin/session')->isAllowed('archana_storelocator/archana_manage_storelocator/' . $action);
    }
}