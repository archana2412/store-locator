<?php
/**
 * Google map tab class file
 * 
 */

class Archana_Storelocator_Block_Adminhtml_Storelocator_Edit_Tab_Googlemap extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $model = Mage::registry('storelocator_data');
        
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('form_General_Googlemap', array('legend'=>Mage::helper('archana_storelocator')->__('Google Map')));
        
        $radiusConfigValue = Mage::getStoreConfig('archana_storelocator_general_setting/archana_storelocator_display_setting/default_radius');
        $fieldset->addField('radius', 'text', array(
          'label'     => Mage::helper('archana_storelocator')->__('Radius'),
          'note'  => Mage::helper('archana_storelocator')->__('Radius is in miles. If kept blank then default configured radius will be used (System > Configuration > Store Locator)'),
          'name'      => 'radius',
          'value'      => $radiusConfigValue,
        ));
        
        $fieldset->addField('latitude', 'text', array(
          'label'     => Mage::helper('archana_storelocator')->__('Latitude'),
          'class'     => 'validate-number',
          'required'  => true,
          'name'      => 'latitude',
        ));
        
        $fieldset->addField('longitude', 'text', array(
          'label'     => Mage::helper('archana_storelocator')->__('Longitude'),
          'class'     => 'validate-number',
          'required'  => true,
          'name'      => 'longitude',
        ));
        
        $zoomLevelConfigValue = Mage::getStoreConfig('archana_storelocator_general_setting/archana_storelocator_display_setting/zoom_level');
        $fieldset->addField('zoom_level', 'text', array(
          'label'     => Mage::helper('archana_storelocator')->__('Zoom Level '),
          'note'  => Mage::helper('archana_storelocator')->__('If kept blank then default configured zoom level will be used (System > Configuration > Store Locator)'),
          'name'      => 'zoom_level',
          'value'      => $zoomLevelConfigValue,
        ));
        
        $data = $model->getData();
        if(!empty($data)) {
            $form->setValues($data);
        }
       return parent::_prepareForm();
    }
}