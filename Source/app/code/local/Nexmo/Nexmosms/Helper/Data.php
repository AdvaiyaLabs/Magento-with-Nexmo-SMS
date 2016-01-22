<?php

define("API_KEY", Mage::getStoreConfig('nexmosms_section/nexmosms_group/nexmo_api_key',Mage::app()->getStore()));
define("API_SECRET", Mage::getStoreConfig('nexmosms_section/nexmosms_group/nexmo_api_secret',Mage::app()->getStore()));
define("ENABLE_SMS", Mage::getStoreConfig('nexmosms_section/nexmosms_group/nexmo_enable_sms',Mage::app()->getStore()));

class Nexmo_Nexmosms_Helper_Data extends Mage_Core_Helper_Abstract
{
	
}