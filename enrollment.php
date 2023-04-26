<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . './vendor/autoload.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . './ExternalConfiguration.php';


$transientToken = $token;
$total = $total;
$currency = $currency;
$first_name = $first_name;
$last_name = $last_name;
$street_address = $street_address;
$locality = $locality;
$country = $country;
$email = $email;
$phone = $phone;

$clientReferenceInformationArr = [
        "code" => "UNKNOWN"
];
$clientReferenceInformation = new CyberSource\Model\Riskv1decisionsClientReferenceInformation($clientReferenceInformationArr);

$orderInformationAmountDetailsArr = [
        "totalAmount" => "$total",
        "currency" => "$currency"
];
$orderInformationAmountDetails = new CyberSource\Model\Riskv1authenticationsOrderInformationAmountDetails($orderInformationAmountDetailsArr);

$orderInformationBillToArr = [
        "address1" => "$street_address",
        "address2" => "",
        "administrativeArea" => "",
        "country" => "$country",
        "locality" => "$locality",
        "firstName" => "$first_name",
        "lastName" => "$last_name",
        "phoneNumber" => "$phone",
        "email" => "$email",
        "postalCode" => ""
];
$orderInformationBillTo = new CyberSource\Model\Riskv1authenticationsOrderInformationBillTo($orderInformationBillToArr);

$orderInformationArr = [
        "amountDetails" => $orderInformationAmountDetails,
        "billTo" => $orderInformationBillTo
];
$orderInformation = new CyberSource\Model\Riskv1authenticationsOrderInformation($orderInformationArr);

$tokenInformationArr = [
        "transientToken" => "$transientToken"
];
$tokenInformation = new CyberSource\Model\Riskv1authenticationsetupsTokenInformation($tokenInformationArr);

$requestObjArr = [
        "clientReferenceInformation" => $clientReferenceInformation,
        "orderInformation" => $orderInformation,
        "tokenInformation" => $tokenInformation
];
$requestObj = new CyberSource\Model\CheckPayerAuthEnrollmentRequest($requestObjArr);


$commonElement = new CyberSource\ExternalConfiguration();
$config = $commonElement->ConnectionHost();
$merchantConfig = $commonElement->merchantConfigObject();

$api_client = new CyberSource\ApiClient($config, $merchantConfig);
$api_instance = new CyberSource\Api\PayerAuthenticationApi($api_client);

try {
    $apiResponse = $api_instance->checkPayerAuthEnrollment($requestObj);
    //print_r(PHP_EOL);
    $access_token = $apiResponse[0]['consumerAuthenticationInformation']['accessToken'];
    $stepup_url = $apiResponse[0]['consumerAuthenticationInformation']['stepUpUrl'];
    
    $status = 'success';

    $data = array();
    
    $data['access_token'] = $access_token;
    $data['stepup_url'] = $stepup_url;

    //return $apiResponse;
} catch (Cybersource\ApiException $e) {
    $status = 'error';
    //print_r($e->getResponseBody());
    //print_r($e->getMessage());
}
?>
