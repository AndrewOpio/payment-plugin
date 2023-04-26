<?php
/**
 * PaymentBatchSummariesApi
 * PHP version 5
 *
 * @category Class
 * @package  CyberSource
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * CyberSource Merged Spec
 *
 * All CyberSource API specs merged together. These are available at https://developer.cybersource.com/api/reference/api-reference.html
 *
 * OpenAPI spec version: 0.0.1
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace CyberSource\Api;

use \CyberSource\ApiClient;
use \CyberSource\ApiException;
use \CyberSource\Configuration;
use \CyberSource\ObjectSerializer;

/**
 * PaymentBatchSummariesApi Class Doc Comment
 *
 * @category Class
 * @package  CyberSource
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PaymentBatchSummariesApi
{
    /**
     * API Client
     *
     * @var \CyberSource\ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * Constructor
     *
     * @param \CyberSource\ApiClient|null $apiClient The api client to use
     */
    public function __construct(\CyberSource\ApiClient $apiClient = null)
    {
        if ($apiClient === null) {
            $apiClient = new ApiClient();
        }

        $this->apiClient = $apiClient;
    }

    /**
     * Get API client
     *
     * @return \CyberSource\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Set the API client
     *
     * @param \CyberSource\ApiClient $apiClient set the API client
     *
     * @return PaymentBatchSummariesApi
     */
    public function setApiClient(\CyberSource\ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * Operation getPaymentBatchSummary
     *
     * Get Payment Batch Summary Data
     *
     * @param \DateTime $startTime Valid report Start Time in **ISO 8601 format** Please refer the following link to know more about ISO 8601 format.[Rfc Date Format](https://xml2rfc.tools.ietf.org/public/rfc/html/rfc3339.html#anchor14)  **Example date format:**   - yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ (e.g. 2018-01-01T00:00:00.000Z) (required)
     * @param \DateTime $endTime Valid report End Time in **ISO 8601 format** Please refer the following link to know more about ISO 8601 format.[Rfc Date Format](https://xml2rfc.tools.ietf.org/public/rfc/html/rfc3339.html#anchor14)  **Example date format:**   - yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ (e.g. 2018-01-01T00:00:00.000Z) (required)
     * @param string $organizationId Valid Cybersource Organization Id (optional)
     * @param string $rollUp Conditional - RollUp for data for day/week/month. Required while getting breakdown data for a Merchant (optional)
     * @param string $breakdown Conditional - Breakdown on account_rollup/all_merchant/selected_merchant. Required while getting breakdown data for a Merchant. (optional)
     * @param int $startDayOfWeek Optional - Start day of week to breakdown data for weeks in a month (optional)
     * @throws \CyberSource\ApiException on non-2xx response
     * @return array of \CyberSource\Model\ReportingV3PaymentBatchSummariesGet200Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPaymentBatchSummary($startTime, $endTime, $organizationId = null, $rollUp = null, $breakdown = null, $startDayOfWeek = null)
    {
        list($response, $statusCode, $httpHeader) = $this->getPaymentBatchSummaryWithHttpInfo($startTime, $endTime, $organizationId, $rollUp, $breakdown, $startDayOfWeek);
        return [$response, $statusCode, $httpHeader];
    }

    /**
     * Operation getPaymentBatchSummaryWithHttpInfo
     *
     * Get Payment Batch Summary Data
     *
     * @param \DateTime $startTime Valid report Start Time in **ISO 8601 format** Please refer the following link to know more about ISO 8601 format.[Rfc Date Format](https://xml2rfc.tools.ietf.org/public/rfc/html/rfc3339.html#anchor14)  **Example date format:**   - yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ (e.g. 2018-01-01T00:00:00.000Z) (required)
     * @param \DateTime $endTime Valid report End Time in **ISO 8601 format** Please refer the following link to know more about ISO 8601 format.[Rfc Date Format](https://xml2rfc.tools.ietf.org/public/rfc/html/rfc3339.html#anchor14)  **Example date format:**   - yyyy-MM-dd&#39;T&#39;HH:mm:ss.SSSZ (e.g. 2018-01-01T00:00:00.000Z) (required)
     * @param string $organizationId Valid Cybersource Organization Id (optional)
     * @param string $rollUp Conditional - RollUp for data for day/week/month. Required while getting breakdown data for a Merchant (optional)
     * @param string $breakdown Conditional - Breakdown on account_rollup/all_merchant/selected_merchant. Required while getting breakdown data for a Merchant. (optional)
     * @param int $startDayOfWeek Optional - Start day of week to breakdown data for weeks in a month (optional)
     * @throws \CyberSource\ApiException on non-2xx response
     * @return array of \CyberSource\Model\ReportingV3PaymentBatchSummariesGet200Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPaymentBatchSummaryWithHttpInfo($startTime, $endTime, $organizationId = null, $rollUp = null, $breakdown = null, $startDayOfWeek = null)
    {
        // verify the required parameter 'startTime' is set
        if ($startTime === null) {
            throw new \InvalidArgumentException('Missing the required parameter $startTime when calling getPaymentBatchSummary');
        }
        // verify the required parameter 'endTime' is set
        if ($endTime === null) {
            throw new \InvalidArgumentException('Missing the required parameter $endTime when calling getPaymentBatchSummary');
        }
        if (!is_null($organizationId) && (strlen($organizationId) > 32)) {
            throw new \InvalidArgumentException('invalid length for "$organizationId" when calling PaymentBatchSummariesApi.getPaymentBatchSummary, must be smaller than or equal to 32.');
        }
        if (!is_null($organizationId) && (strlen($organizationId) < 1)) {
            throw new \InvalidArgumentException('invalid length for "$organizationId" when calling PaymentBatchSummariesApi.getPaymentBatchSummary, must be bigger than or equal to 1.');
        }
        if (!is_null($organizationId) && !preg_match("/[a-zA-Z0-9-_]+/", $organizationId)) {
            throw new \InvalidArgumentException("invalid value for \"organizationId\" when calling PaymentBatchSummariesApi.getPaymentBatchSummary, must conform to the pattern /[a-zA-Z0-9-_]+/.");
        }

        if (!is_null($startDayOfWeek) && ($startDayOfWeek > 7)) {
            throw new \InvalidArgumentException('invalid value for "$startDayOfWeek" when calling PaymentBatchSummariesApi.getPaymentBatchSummary, must be smaller than or equal to 7.');
        }
        if (!is_null($startDayOfWeek) && ($startDayOfWeek < 1)) {
            throw new \InvalidArgumentException('invalid value for "$startDayOfWeek" when calling PaymentBatchSummariesApi.getPaymentBatchSummary, must be bigger than or equal to 1.');
        }

        // parse inputs
        $resourcePath = "/reporting/v3/payment-batch-summaries";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/hal+json', 'text/csv', 'application/xml']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json;charset=utf-8']);

        // query params
        if ($startTime !== null) {
            $queryParams['startTime'] = $this->apiClient->getSerializer()->toQueryValue($startTime);
        }
        // query params
        if ($endTime !== null) {
            $queryParams['endTime'] = $this->apiClient->getSerializer()->toQueryValue($endTime);
        }
        // query params
        if ($organizationId !== null) {
            $queryParams['organizationId'] = $this->apiClient->getSerializer()->toQueryValue($organizationId);
        }
        // query params
        if ($rollUp !== null) {
            $queryParams['rollUp'] = $this->apiClient->getSerializer()->toQueryValue($rollUp);
        }
        // query params
        if ($breakdown !== null) {
            $queryParams['breakdown'] = $this->apiClient->getSerializer()->toQueryValue($breakdown);
        }
        // query params
        if ($startDayOfWeek !== null) {
            $queryParams['startDayOfWeek'] = $this->apiClient->getSerializer()->toQueryValue($startDayOfWeek);
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\CyberSource\Model\ReportingV3PaymentBatchSummariesGet200Response',
                '/reporting/v3/payment-batch-summaries'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\CyberSource\Model\ReportingV3PaymentBatchSummariesGet200Response', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\CyberSource\Model\ReportingV3PaymentBatchSummariesGet200Response', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\CyberSource\Model\Reportingv3ReportDownloadsGet400Response', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }
}
