<?php
/**
 * Storelocator installation script
 * 
 */
/** @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();

//Add unique index for column 'name'
$installer->getConnection()->addIndex(
        $installer->getTable('archana_storelocator/storelocator'),
        $installer->getIdxName(
                'archana_storelocator/storelocator', 
                array('name'), 
                Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE
         ),
        array('name'), 
        Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE
);

$installer->endSetup();