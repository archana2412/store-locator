<?php
/**
 * Storelocator data installation script
 */
/**
 * @var $installer Mage_Core_Model_Resource_Setup
 */
$installer = $this;
/**
 * Fill table archana_storelocator/storelocator
 */

//Get current timestamp
$currentTimestamp = Mage::getModel('core/date')->timestamp(time());

$stores = array(
    array(
        'name'           => 'Store1',
        'status'         => 1,
        'street_address' =>'NY Road',
        'continent'      =>'South America',
        'country'        =>'US',
        'state'          =>'New York',
        'city'           =>'New York',
        'zipcode'        =>'10007',
        'radius'         =>'100',
        'latitude'       =>'40.712784',
        'longitude'      =>'-74.005941',
        'zoom_level'     =>'6'
    ),
    array(
        'name'           => 'Store2',
        'status'         => 1,
        'street_address' =>'LA Road',
        'continent'      =>'South America',
        'country'        =>'US',
        'state'          =>'California',
        'city'           =>'Los Angeles',
        'zipcode'        =>'90012',
        'radius'         =>'100',
        'latitude'       =>'34.052234',
        'longitude'      =>'-118.243685',
        'zoom_level'     =>'6'
    ),
    array(
        'name'           => 'Store3',
        'status'         => 1,
        'street_address' =>'CH Road',
        'continent'      =>'South America',
        'country'        =>'US',
        'state'          =>'Illinois',
        'city'           =>'Chicago',
        'zipcode'        =>'60602',
        'radius'         =>'100',
        'latitude'       =>'41.878114',
        'longitude'      =>'-87.629798',
        'zoom_level'     =>'6'
    ),
    array(
        'name'           => 'Store4',
        'status'         => 1,
        'street_address' =>'HO Road',
        'continent'      =>'South America',
        'country'        =>'US',
        'state'          =>'Texas',
        'city'           =>'Houston',
        'zipcode'        =>'77002',
        'radius'         =>'100',
        'latitude'       =>'29.760193',
        'longitude'      =>'-95.369390',
        'zoom_level'     =>'6'
    ),
    array(
        'name'           => 'Store5',
        'status'         => 1,
        'street_address' =>'Sadashiv Peth',
        'continent'      =>'Asia',
        'country'        =>'IN',
        'state'          =>'Maharshtra',
        'city'           =>'Pune',
        'zipcode'        =>'411009',
        'radius'         =>'100',
        'latitude'       =>'18.5204',
        'longitude'      =>'73.8567',
        'zoom_level'     =>'6'
    )
);

/**
 * Insert data into storelocator table for testing/demo
 */
foreach ($stores as $data) {
    Mage::getModel('archana_storelocator/storelocator')->setData($data)->save();
}