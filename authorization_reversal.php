<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . './vendor/autoload.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . './ExternalConfiguration.php';

$id_payment = $auth_id; 
$reverse = '';
$the_reason = $reason;
$the_amount = $amount; 
$currency = $currency;

$clientReferenceInformationArr = [ 
		"code" => "TC50171_3" 
];
$clientReferenceInformation = new CyberSource\Model\Ptsv2paymentsidreversalsClientReferenceInformation($clientReferenceInformationArr);

$reversalInformationAmountDetailsArr = [
		"totalAmount" => "$the_amount",
		"currency" => "$currency"
];
$reversalInformationAmountDetails = new CyberSource\Model\Ptsv2paymentsidreversalsReversalInformationAmountDetails($reversalInformationAmountDetailsArr);

$reversalInformationArr = [
		"amountDetails" => $reversalInformationAmountDetails,
		"reason" => "$the_reason"
];
$reversalInformation = new CyberSource\Model\Ptsv2paymentsidreversalsReversalInformation($reversalInformationArr);

$requestObjArr = [
		"clientReferenceInformation" => $clientReferenceInformation,
		"reversalInformation" => $reversalInformation
];
$requestObj = new CyberSource\Model\AuthReversalRequest($requestObjArr);


$commonElement = new CyberSource\ExternalConfiguration();
$config = $commonElement->ConnectionHost();
$merchantConfig = $commonElement->merchantConfigObject();

$api_client = new CyberSource\ApiClient($config, $merchantConfig);
$api_instance = new CyberSource\Api\ReversalApi($api_client);

try {
	$apiResponse = $api_instance->authReversal($id_payment, $requestObj);
	// print_r(PHP_EOL);
	// print_r($apiResponse);
	$reverse = "success"; 

} catch (Cybersource\ApiException $e) {
	$reverse = "error";
	//print_r($e->getResponseBody());
	//print_r($e->getMessage());
	//$error = ($e->getMessage());
}
?>
