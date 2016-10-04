<?php
/**
 * Import edit block
 * 
 */
class Archana_Storelocator_Block_Adminhtml_Import_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->removeButton('back')
            ->removeButton('reset')
            ->_updateButton('save', 'label', $this->__('Import'))
            ->_updateButton('save', 'id', 'upload_button');
    }
    
    /**
     * Internal constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();

        $this->_blockGroup = 'archana_storelocator';
        $this->_controller = 'adminhtml_import';
    }
    
    /**
     * Get header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        return Mage::helper('archana_storelocator')->__('Import');
    }
}