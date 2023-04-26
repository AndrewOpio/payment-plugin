<?php
    require_once __DIR__. DIRECTORY_SEPARATOR .'./vendor/autoload.php';
    require_once __DIR__. DIRECTORY_SEPARATOR .'./ExternalConfiguration.php';

	$apiResponse = '';
	$transientTokenJWK = $transientToken;
	$payment_id = '';
	$payment = '';

	$total = $total;
	$currency = $currency;
	
	$first_name = $first_name;
	$last_name = $last_name;
	$street_address = $street_address;
	$locality = $locality;
	$country = $country;
	$state = $state;
	$email = $email;
	$phone = $phone;

	$clientReferenceInformationArr = [
			"code" => "TC50171_3"
	];
	$clientReferenceInformation = new CyberSource\Model\Ptsv2paymentsClientReferenceInformation($clientReferenceInformationArr);

	$orderInformationAmountDetailsArr = [
		//"totalAmount" => "102.1",
		//"currency" => "USD",

		"totalAmount" => "$total",
		"currency" => "$currency",
    ];
	$orderInformationAmountDetails = new CyberSource\Model\Ptsv2paymentsOrderInformationAmountDetails($orderInformationAmountDetailsArr);

	$orderInformationBillToArr = [

		"firstName" => "$first_name",
		"lastName" => "$last_name",
		"address1" => "$street_address",
		"locality" => "$locality",
		"administrativeArea" => "",
		"postalCode" => "",
		"country" => "$country",
		"district" => "$state",
		"buildingNumber" => "",
		"email" => "$email",
		"phoneNumber" => "$phone"
	];
	$orderInformationBillTo = new CyberSource\Model\Ptsv2paymentsOrderInformationBillTo($orderInformationBillToArr);

	$orderInformationArr = [
			"amountDetails" => $orderInformationAmountDetails,
			"billTo" => $orderInformationBillTo
	];
	$orderInformation = new CyberSource\Model\Ptsv2paymentsOrderInformation($orderInformationArr);

	$tokenInformationArr = [
			"transientTokenJwt" => "$transientTokenJWK"
    ];
    ;
	$tokenInformation = new CyberSource\Model\Ptsv2paymentsTokenInformation($tokenInformationArr);

	$requestObjArr = [
			"clientReferenceInformation" => $clientReferenceInformation,
			"orderInformation" => $orderInformation,
			"tokenInformation" => $tokenInformation
	];
	$requestObj = new CyberSource\Model\CreatePaymentRequest($requestObjArr);


	$commonElement = new CyberSource\ExternalConfiguration();
	$config = $commonElement->ConnectionHost();
	$merchantConfig = $commonElement->merchantConfigObject();

	$api_client = new CyberSource\ApiClient($config, $merchantConfig);
	$api_instance = new CyberSource\Api\PaymentsApi($api_client);

	try {
		$apiResponse = $api_instance->createPayment($requestObj);
		//print_r(PHP_EOL);
		//print_r($apiResponse);
				
		$payment_id = $apiResponse[0]["id"];
		
		$payment = $apiResponse[0]["status"];

	} catch (Cybersource\ApiException $e) {
		$payment = "error";
		print_r($e->getMessage());
		print_r($e->getResponseBody());
	}

?>