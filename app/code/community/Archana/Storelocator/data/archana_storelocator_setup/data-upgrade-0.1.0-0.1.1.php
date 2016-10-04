<?php
/**
 * Storelocator data installation script
 * 
 */
/**
 * @var $installer Mage_Core_Model_Resource_Setup
 */
$installer = $this;

/**
 * Update table 'archana_storelocator/storelocator_store' for multiple store view
 */

//test stores in the table 'archana_storelocator/storelocator' 
$testStores = array('Store1', 'Store2', 'Store3', 'Store4', 'Store5');

foreach ($testStores as $testStore) {
    $testStorelocator = Mage::getModel('archana_storelocator/storelocator')->load($testStore,'name');
    if ($testStorelocator->getId()) {
        $stores = $testStorelocator->getStores();
        if(empty($stores)){
            $testStorelocator->setStores(array(0))->save();
        }
    }
}