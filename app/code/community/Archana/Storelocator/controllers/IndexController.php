<?php
/**
 * Fontend index controller
 * 
 * 
 */
class Archana_Storelocator_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * Pre dispatch action that allows to redirect to no route page in case of disabled extension through admin panel
     */
    public function preDispatch()
    {
        parent::preDispatch();
        
        if (!Mage::helper('archana_storelocator')->isEnabled()) {
            $this->setFlag('', 'no-dispatch', true);
            $this->_redirect('noRoute');
        }        
    }
    
    function indexAction()
    {
        $this->loadLayout();
        
        $listBlock = $this->getLayout()->getBlock('stores.list');
        if ($listBlock) {
            $currentPage = abs(intval($this->getRequest()->getParam('p')));
            if ($currentPage < 1) {
                $currentPage = 1;
            }
            $listBlock->setCurrentPage($currentPage);
        }
        
        $this->renderLayout();
    }
    
    /**
     * Stores view action
     */
    public function viewAction()
    {
        $storelocatorId = $this->getRequest()->getParam('id');
        if (!$storelocatorId) {
            return $this->_forward('noRoute');
        }
        
        /** @var $model Archana_Storelocator_Model_Storelocator */
        $model = Mage::getModel('archana_storelocator/storelocator')
                ->setStoreId(Mage::app()->getStore()->getId())
                ->load($storelocatorId);

        if (!$model->getId()) {
            return $this->_forward('noRoute');
        }
        Mage::register('store_view', $model);
        $this->loadLayout();
        $this->renderLayout();
    }
    
     /**
     * Stores search action
     */
    public function searchAction() 
    {
        //search form validation
        $post = $this->getRequest()->getQuery();
        if ( !empty($post) ) {
            try {
                $error = false;
                if(isset($post['country'])) {
                    if (Zend_Validate::is(trim($post['country']) , 'NotEmpty')) {
                        $error = true;
                    }
                }

                if(isset($post['continent'])) {
                    if (Zend_Validate::is(trim($post['continent']) , 'NotEmpty')) {
                        $error = true;
                    }
                }

                if(isset($post['city'])) {
                    if (Zend_Validate::is(trim($post['city']), 'NotEmpty')) {
                        $error = true;
                    }
                }
                if (!$error) {
                    throw new Exception('Please enter Country or State or City');
                }
            } catch (Exception $e) {

                Mage::getSingleton('core/session')->addError($e->getMessage());
                Mage::getSingleton('core/session')->setSearchFormData($post);
                $this->_redirect('*/*/*');
                return;
            }
        }

        Mage::getSingleton('core/session')->setSearchFormData(false);

        $this->loadLayout();

        $listBlock = $this->getLayout()->getBlock('stores.list');
        if ($listBlock) {
            $currentPage = abs(intval($this->getRequest()->getParam('p')));
            if ($currentPage < 1) {
                $currentPage = 1;
            }
            $listBlock->setCurrentPage($currentPage);
        }

        $this->renderLayout();
    }
    
     /**
     * Get Country list based on Continent selected action
     */    
    public function getCountryBasedContinentAction()
    {
        $continent = $this->getRequest()->getParam("continent_name");        
        $countryList = array();        
        $storeCol = Mage::getModel('archana_storelocator/storelocator')->getCollection()
                            ->addFieldToFilter('continent', $continent);   
        $storeCol->getSelect()->group('country');
            $html = '<select name="country" id="country">
			<option value=""> -- Please Select -- </option>';
            foreach ($storeCol as $_country) {
                $countryCode=  $_country->getCountry();
                $country = Mage::helper('archana_storelocator')->getCountryNameByCode($countryCode);
                $html .= '<option value="' . $countryCode . '">' . $country . '</option>';
            }
            $html.='</select>';        
        echo $html;       
    }    
    
}