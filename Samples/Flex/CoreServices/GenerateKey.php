<?php
//echo "Inside php functionality"
error_reporting(E_ALL);

require_once('../cybersource-rest-client-php/autoload.php');
require_once('./Resources/ExternalConfiguration.php');

function GenerateKey()
{
	$commonElement = new CyberSource\ExternalConfiguration();
	$config = $commonElement->ConnectionHost();
	$apiclient = new CyberSource\ApiClient($config);
	$api_instance = new CyberSource\Api\KeyGenerationApi($apiclient);
	$flexRequestArr = [
	'encryptionType' => "RsaOaep256",
	];
	$flexRequest = new CyberSource\Model\KeyParameters($flexRequestArr);
	$api_response = list($response,$statusCode,$httpHeader)=null;
	try {
		$api_response = $api_instance->generatePublicKey($flexRequest);
		print_r($api_response);
		

	} catch (Exception $e) {
		print_r($e->getresponseBody());
		print_r($e->getmessage());
	}
}    

// Call Sample Code
if(!defined('DO NOT RUN SAMPLE')){
    echo "Get Customer Sample Code\n";
	GenerateKey();
}

?>	
