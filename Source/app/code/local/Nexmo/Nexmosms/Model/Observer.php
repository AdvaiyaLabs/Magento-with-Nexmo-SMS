<?php
class Nexmo_Nexmosms_Model_Observer extends Varien_Event_Observer
{
	public function __construct()
	{
		//constructor
	}
	
	/*
	 *	observer to handle event when an order is placed
	 */
	public function orderPlacedBefore($observer)
	{
		//sending SMS when order is placed
        $order = $observer->getEvent()->getOrder();
		$order_data = $order->getData();
		$n_key = Mage::getStoreConfig('nexmosms_section/nexmosms_group/nexmo_api_key',Mage::app()->getStore());
		$n_secret = Mage::getStoreConfig('nexmosms_section/nexmosms_group/nexmo_api_secret',Mage::app()->getStore());
		$n_from_number = Mage::getStoreConfig('nexmosms_section/nexmosms_group/nexmo_from_number',Mage::app()->getStore());
		$n_threshold = Mage::getStoreConfig('nexmosms_section/nexmosms_group/nexmo_threshold',Mage::app()->getStore());
		$n_enable_sms = Mage::getStoreConfig('nexmosms_section/nexmosms_group/nexmo_enable_sms',Mage::app()->getStore());
		$n_shop_creation = Mage::getStoreConfig('nexmosms_section/nexmoshop_group/shop_creation',Mage::app()->getStore());
		$n_cust_creation = Mage::getStoreConfig('nexmosms_section/nexmocustomer_group/cust_creation',Mage::app()->getStore());
		
		if(!is_numeric($n_threshold)){
			$n_threshold=0;
		}
		
		$order_id = $order_data['increment_id'];
		$currency_code = $order_data['order_currency_code'];
		$amount = number_format((float)$order_data['grand_total'], 2, '.', '');
		$customer_name = $order_data['customer_firstname'].' '.$order_data['customer_middlename'].' '.$order_data['customer_lastname'];
		$store_phone = Mage::getStoreConfig('general/store_information/phone', $order_data['store_id']);
		$customer_phone = $order->getBillingAddress()->getTelephone();
		
		$sms_text_shop = 'The order '.$order_id.' is created of '.$currency_code.$amount.' by '.$customer_name;
		$sms_text_cust = 'You have created an order with id '.$order_id. ' and amount '. $currency_code.$amount;
		
		//to shop owner
		if($n_enable_sms && $n_shop_creation){
			if($n_key!='' && $n_secret!='' && $n_from_number!='' && $amount>$n_threshold ){
				$response = @file_get_contents('http://rest.nexmo.com/sms/xml?api_key='.$n_key.'&api_secret='.$n_secret.'&from='.$n_from_number.'&to='.$store_phone.'&text='.urlencode($sms_text_shop));
				//Mage::log('order created, notify to shop owner');
			}else{
				//handle not sent event
			}
		}
		//to customer
		if($n_enable_sms && $n_cust_creation){
			if($n_key!='' && $n_secret!='' && $n_from_number!='' && $amount>$n_threshold ){
				$response = @file_get_contents('http://rest.nexmo.com/sms/xml?api_key='.$n_key.'&api_secret='.$n_secret.'&from='.$n_from_number.'&to='.$customer_phone.'&text='.urlencode($sms_text_cust));
				//Mage::log('order created, notify to customer');
			}else{
				//handle not sent event
			}
		}
		
	}
	/*
	 *	observer to handle event when an order is cancelled
	 */
	public function orderCancelAfter($observer)
	{
		//sending SMS when order is cancelled
		$order = $observer->getEvent()->getOrder();
		$order_data = $order->getData();
		$n_key = Mage::getStoreConfig('nexmosms_section/nexmosms_group/nexmo_api_key',Mage::app()->getStore());
		$n_secret = Mage::getStoreConfig('nexmosms_section/nexmosms_group/nexmo_api_secret',Mage::app()->getStore());
		$n_from_number = Mage::getStoreConfig('nexmosms_section/nexmosms_group/nexmo_from_number',Mage::app()->getStore());
		$n_threshold = Mage::getStoreConfig('nexmosms_section/nexmosms_group/nexmo_threshold',Mage::app()->getStore());
		$n_enable_sms = Mage::getStoreConfig('nexmosms_section/nexmosms_group/nexmo_enable_sms',Mage::app()->getStore());
		$n_shop_cancel = Mage::getStoreConfig('nexmosms_section/nexmoshop_group/shop_cancel',Mage::app()->getStore());
		$n_cust_cancel = Mage::getStoreConfig('nexmosms_section/nexmocustomer_group/cust_cancel',Mage::app()->getStore());
		$customer_phone = $order->getBillingAddress()->getTelephone();
		
		if(!is_numeric($n_threshold)){
			$n_threshold=0;
		}
		
		
		$order_id = $order_data['increment_id'];
		$currency_code = $order_data['order_currency_code'];
		$amount = number_format((float)$order_data['grand_total'], 2, '.', '');
		$customer_name = $order_data['customer_firstname'].' '.$order_data['customer_middlename'].' '.$order_data['customer_lastname'];
		$store_phone = Mage::getStoreConfig('general/store_information/phone', $order_data['store_id']);
		
		
		$sms_text_shop = 'The order '.$order_id.' has been cancelled ';
		$sms_text_cust = 'The order '.$order_id.' has been cancelled ';
		
		
		if($n_enable_sms && $n_shop_cancel){
			if($n_key!='' && $n_secret!='' && $n_from_number!='' && $amount>$n_threshold ){
				$response = @file_get_contents('http://rest.nexmo.com/sms/xml?api_key='.$n_key.'&api_secret='.$n_secret.'&from='.$n_from_number.'&to='.$store_phone.'&text='.urlencode($sms_text_shop));
				//Mage::log('order cancelled, notify to shop owner');
			}else{
				//handle not sent event
			}
		}
		
		if($n_enable_sms && $n_cust_cancel){
			if($n_key!='' && $n_secret!='' && $n_from_number!='' && $amount>$n_threshold ){
				$response = @file_get_contents('http://rest.nexmo.com/sms/xml?api_key='.$n_key.'&api_secret='.$n_secret.'&from='.$n_from_number.'&to='.$customer_phone.'&text='.urlencode($sms_text_cust));
				//Mage::log('order created, notify to customer');
			}else{
				//handle not sent event
			}
		}
		
	}
	
	/*
	 *	observer to handle event when an invoice is created
	 */
	public function invoiceSaveAfter($observer)
	{	
		
		$invoice = $observer->getEvent()->getInvoice();
		$invoice_data = $invoice->getData();
		$order = $invoice->getOrder();
		$order_data = $order->getData();
		$n_key = Mage::getStoreConfig('nexmosms_section/nexmosms_group/nexmo_api_key',Mage::app()->getStore());
		$n_secret = Mage::getStoreConfig('nexmosms_section/nexmosms_group/nexmo_api_secret',Mage::app()->getStore());
		$n_from_number = Mage::getStoreConfig('nexmosms_section/nexmosms_group/nexmo_from_number',Mage::app()->getStore());
		$n_threshold = Mage::getStoreConfig('nexmosms_section/nexmosms_group/nexmo_threshold',Mage::app()->getStore());
		$n_enable_sms = Mage::getStoreConfig('nexmosms_section/nexmosms_group/nexmo_enable_sms',Mage::app()->getStore());
		$n_shop_invoice = Mage::getStoreConfig('nexmosms_section/nexmoshop_group/shop_invoice',Mage::app()->getStore());
		$n_cust_invoice = Mage::getStoreConfig('nexmosms_section/nexmocustomer_group/cust_invoice',Mage::app()->getStore());
		$customer_phone = $order->getBillingAddress()->getTelephone();
		$currency_code = $order_data['order_currency_code'];
		$amount = number_format((float)$order_data['grand_total'], 2, '.', '');
		
		
		if(!is_numeric($n_threshold)){
			$n_threshold=0;
		}
		
		$order_id = $order_data['increment_id'];
		$invoice_id = $invoice_data['increment_id'];
		
		
		
		$store_phone = Mage::getStoreConfig('general/store_information/phone', $order_data['store_id']);
					
		$sms_text_shop = "The payment of order ".$order_id. " of  ".$currency_code.$amount.' is received.';
		$sms_text_cust = "The payment of order ".$order_id. " of  ".$currency_code.$amount.' is received.';
		
		
		
		if($n_enable_sms && $n_shop_invoice){
			if($n_key!='' && $n_secret!='' && $n_from_number!='' && $amount>$n_threshold ){
				$response = @file_get_contents('http://rest.nexmo.com/sms/xml?api_key='.$n_key.'&api_secret='.$n_secret.'&from='.$n_from_number.'&to='.$store_phone.'&text='.urlencode($sms_text_shop));
				//Mage::log('invoice generated, notify to shop owner');
			}else{
				//handle not sent event
			}
		}
		
		if($n_enable_sms && $n_cust_invoice){
			if($n_key!='' && $n_secret!='' && $n_from_number!='' && $amount>$n_threshold ){
				$response = @file_get_contents('http://rest.nexmo.com/sms/xml?api_key='.$n_key.'&api_secret='.$n_secret.'&from='.$n_from_number.'&to='.$customer_phone.'&text='.urlencode($sms_text_cust));
				//Mage::log('invoice generated, notify to customer');
			}else{
				//handle not sent event
			}
		}
	} 
	
	/*
	 *	observer to handle event when shipment is saved
	 */
	public function shipmentSaveAfter($observer)
	{
		
		$shipment = $observer->getEvent()->getShipment();
		$order = $shipment->getOrder();
		$order_data = $order->getData();
		$n_key = Mage::getStoreConfig('nexmosms_section/nexmosms_group/nexmo_api_key',Mage::app()->getStore());
		$n_secret = Mage::getStoreConfig('nexmosms_section/nexmosms_group/nexmo_api_secret',Mage::app()->getStore());
		$n_from_number = Mage::getStoreConfig('nexmosms_section/nexmosms_group/nexmo_from_number',Mage::app()->getStore());
		$n_threshold = Mage::getStoreConfig('nexmosms_section/nexmosms_group/nexmo_threshold',Mage::app()->getStore());
		$n_enable_sms = Mage::getStoreConfig('nexmosms_section/nexmosms_group/nexmo_enable_sms',Mage::app()->getStore());
		$n_shop_ship = Mage::getStoreConfig('nexmosms_section/nexmoshop_group/shop_ship',Mage::app()->getStore());
		$n_cust_ship = Mage::getStoreConfig('nexmosms_section/nexmocustomer_group/cust_ship',Mage::app()->getStore());
		$customer_phone = $order->getBillingAddress()->getTelephone();
		
		if(!is_numeric($n_threshold)){
			$n_threshold=0;
		}
		
		$order_id = $order->getIncrementId();
		$amount = number_format((float)$order_data['grand_total'], 2, '.', '');
		$store_phone = Mage::getStoreConfig('general/store_information/phone', $order_data['store_id']);
		$customer_name = $order_data['customer_firstname'].' '.$order_data['customer_middlename'].' '.$order_data['customer_lastname'];
		
		$sms_text_shop = "The order ".$order_id ." is fulfilled for ".$customer_name;
		$sms_text_cust = "Your order ".$order_id ." is fulfilled.";
		
		
		if($n_enable_sms && $n_shop_ship){
			if($n_key!='' && $n_secret!='' && $n_from_number!='' && $amount>$n_threshold ){
				$response = @file_get_contents('http://rest.nexmo.com/sms/xml?api_key='.$n_key.'&api_secret='.$n_secret.'&from='.$n_from_number.'&to='.$store_phone.'&text='.urlencode($sms_text_shop));
				//Mage::log('shipment saved , notify to shop owner');
			}else{
				//handle not sent event
			}
		}
		
		if($n_enable_sms && $n_cust_ship){
			if($n_key!='' && $n_secret!='' && $n_from_number!='' && $amount>$n_threshold ){
				$response = @file_get_contents('http://rest.nexmo.com/sms/xml?api_key='.$n_key.'&api_secret='.$n_secret.'&from='.$n_from_number.'&to='.$customer_phone.'&text='.urlencode($sms_text_cust));
				//Mage::log('shipment saved , notify to customer');
			}else{
				//handle not sent event
			}
		}
	}
}
?>