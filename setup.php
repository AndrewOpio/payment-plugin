<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . './vendor/autoload.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . './ExternalConfiguration.php';

//pass - dreezY581?
//u-name - drew581
//id - drew581
$transient = $token;

$clientReferenceInformationArr = [
        "code" => "cybs_test"
];

$clientReferenceInformation = new CyberSource\Model\Riskv1decisionsClientReferenceInformation($clientReferenceInformationArr);

$tokenInformationArr = [
        "transientToken" => "$transient"
];

$tokenInformation = new CyberSource\Model\Riskv1authenticationsetupsTokenInformation($tokenInformationArr);

$requestObjArr = [
        "clientReferenceInformation" => $clientReferenceInformation,
        "tokenInformation" => $tokenInformation
];

$requestObj = new CyberSource\Model\PayerAuthSetupRequest($requestObjArr);


$commonElement = new CyberSource\ExternalConfiguration();
$config = $commonElement->ConnectionHost();
$merchantConfig = $commonElement->merchantConfigObject();

$api_client = new CyberSource\ApiClient($config, $merchantConfig);
$api_instance = new CyberSource\Api\PayerAuthenticationApi($api_client);

try {
    $apiResponse = $api_instance->payerAuthSetup($requestObj);
    //print_r(PHP_EOL);
    //print_r($apiResponse);
    
    $access_token = $apiResponse[0]['consumerAuthenticationInformation']['accessToken'];
    $collection_url = $apiResponse[0]['consumerAuthenticationInformation']['deviceDataCollectionUrl'];
    $reference_id = $apiResponse[0]['consumerAuthenticationInformation']['referenceId'];
    
    $status = 'success';

    $data = array();
    
    $data['access_token'] = $access_token;
    $data['collection_url'] = $collection_url;
    $data['reference_id'] = $reference_id;

    //print_r($collection_url);
    //return $apiResponse;
} catch (Cybersource\ApiException $e) {
    $status = 'error';
    print_r($e->getMessage());
    print_r($e->getResponseBody());
}
?>
