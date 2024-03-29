<?php

    require_once __DIR__. DIRECTORY_SEPARATOR .'./vendor/autoload.php';
    require_once __DIR__. DIRECTORY_SEPARATOR .'./ExternalConfiguration.php';

	$commonElement = new CyberSource\ExternalConfiguration();
	$config = $commonElement->ConnectionHost();
	$merchantConfig = $commonElement->merchantConfigObject();
	$apiclient = new CyberSource\ApiClient($config, $merchantConfig);
	$api_instance = new CyberSource\Api\KeyGenerationApi($apiclient);
	$flexRequestArr = [
		"encryptionType" => "RsaOaep256",
		"targetOrigin" => "http://localhost",
		//"targetOrigin" => get_site_url(),
	];
	
	$keyResponse = list($response, $statusCode, $httpHeader)=null;
	$captureContext = '';
	$jwt_error = '';

	try {
		// Generating Flex .11 capture context 
		$keyResponse = $api_instance->generatePublicKey($format = 'JWT', $flexRequestArr);
		//print_r($keyResponse);

		//Extracting Capture context from KeyID in response
		$captureContext = $keyResponse[0]["keyId"];
		//print_r($captureContext);

	} catch (Cybersource\ApiException $e) {
		$jwt_error = "#";
		//print_r($e->getResponseBody());
        //print_r($e->getMessage());
	} 
?>