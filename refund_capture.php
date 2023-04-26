<?php
    require_once __DIR__ . DIRECTORY_SEPARATOR . './vendor/autoload.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . './ExternalConfiguration.php';

	$id = $capt_id;
	$status = "";
	$total = $total;
    $currency = $currency;


	$clientReferenceInformationArr = [
			"code" => "TC50171_3"
	];
	$clientReferenceInformation = new CyberSource\Model\Ptsv2paymentsClientReferenceInformation($clientReferenceInformationArr);

	$orderInformationAmountDetailsArr = [
			"totalAmount" => "$total",
			"currency" => "$currency"
	];
	$orderInformationAmountDetails = new CyberSource\Model\Ptsv2paymentsidcapturesOrderInformationAmountDetails($orderInformationAmountDetailsArr);

	$orderInformationArr = [
			"amountDetails" => $orderInformationAmountDetails
	];
	$orderInformation = new CyberSource\Model\Ptsv2paymentsidrefundsOrderInformation($orderInformationArr);

	$requestObjArr = [
			"clientReferenceInformation" => $clientReferenceInformation,
			"orderInformation" => $orderInformation
	];
	$requestObj = new CyberSource\Model\RefundCaptureRequest($requestObjArr);


	$commonElement = new CyberSource\ExternalConfiguration();
	$config = $commonElement->ConnectionHost();
	$merchantConfig = $commonElement->merchantConfigObject();

	$api_client = new CyberSource\ApiClient($config, $merchantConfig);
	$api_instance = new CyberSource\Api\RefundApi($api_client);

	try {
		$apiResponse = $api_instance->refundCapture($requestObj, $id);
		//print_r(PHP_EOL);
		//print_r($apiResponse);
		$status = true;

		return $apiResponse;
	} catch (Cybersource\ApiException $e) {
		$status = false;
		//print_r($e->getResponseBody());
		//print_r($e->getMessage());
	}

?>
