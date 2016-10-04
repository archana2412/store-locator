<?php
/**
 * Storelocator installation script
 * 
 * 
 */
/**
 * @var $installer Mage_Core_Model_Resource_Setup
 */
$installer = $this;

/**
 * Prepare database for install
 */
$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('archana_storelocator/storelocator'))
    ->addColumn('store_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Store Id')
        
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        ), 'Store Name')
        
    ->addColumn('status', Varien_Db_Ddl_Table::TYPE_TINYINT, null, array(
        'nullable'  => false,
        'default'   => '1',
        ), 'Staus')
        
   ->addColumn('street_address', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => true,
        'default'   => null,
        ), 'Street Address')
        
   ->addColumn('continent', Varien_Db_Ddl_Table::TYPE_TEXT, 64, array(
        'nullable'  => true,
        'default'   => null,
        ), 'Continent')      
        
   ->addColumn('country', Varien_Db_Ddl_Table::TYPE_TEXT, 64, array(
        'nullable'  => true,
        'default'   => null,
        ), 'Country')
        
    ->addColumn('state', Varien_Db_Ddl_Table::TYPE_TEXT, 64, array(
        'nullable'  => true,
        'default'   => null,
        ), 'State')
   
    ->addColumn('city', Varien_Db_Ddl_Table::TYPE_TEXT, 64, array(
        'nullable'  => true,
        'default'   => null,
        ), 'City')
        
   ->addColumn('zipcode', Varien_Db_Ddl_Table::TYPE_TEXT, 64, array(
        'nullable'  => true,
        'default'   => null,
        ), 'Zipcode')             
   
   ->addColumn('radius', Varien_Db_Ddl_Table::TYPE_TEXT, 64, array(
       'nullable' => true,
       'default'  => null,
        ), 'Radius')
        
   ->addColumn('latitude', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
       'nullable' => true,
       'default'  => null,
        ), 'Latitude')
        
   ->addColumn('longitude', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
       'nullable' => true,
       'default'  => null,
        ), 'Longitude')
  
   ->addColumn('zoom_level', Varien_Db_Ddl_Table::TYPE_TEXT, 64, array(
       'nullable' => true,
       'default'  => null,
        ), 'Zoom level')        
        
    ->setComment('Archana Storelocator Table');

$installer->getConnection()->createTable($table);
/**
 * Prepare database after install
 */
$installer->endSetup();