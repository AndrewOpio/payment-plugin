<?php
/**
 * PtsV2PaymentsPost201ResponseProcessorInformation
 *
 * PHP version 5
 *
 * @category Class
 * @package  CyberSource
 * @author   Swaagger Codegen team
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

namespace CyberSource\Model;

use \ArrayAccess;

/**
 * PtsV2PaymentsPost201ResponseProcessorInformation Class Doc Comment
 *
 * @category    Class
 * @package     CyberSource
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class PtsV2PaymentsPost201ResponseProcessorInformation implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'ptsV2PaymentsPost201Response_processorInformation';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'authIndicator' => 'string',
        'approvalCode' => 'string',
        'cardReferenceData' => 'string',
        'transactionId' => 'string',
        'networkTransactionId' => 'string',
        'providerTransactionId' => 'string',
        'responseCode' => 'string',
        'responseCodeSource' => 'string',
        'responseDetails' => 'string',
        'responseCategoryCode' => 'string',
        'forwardedAcquirerCode' => 'string',
        'avs' => '\CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationAvs',
        'cardVerification' => '\CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationCardVerification',
        'merchantAdvice' => '\CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationMerchantAdvice',
        'electronicVerificationResults' => '\CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationElectronicVerificationResults',
        'achVerification' => '\CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationAchVerification',
        'customer' => '\CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationCustomer',
        'consumerAuthenticationResponse' => '\CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationConsumerAuthenticationResponse',
        'systemTraceAuditNumber' => 'string',
        'paymentAccountReferenceNumber' => 'string',
        'transactionIntegrityCode' => 'string',
        'amexVerbalAuthReferenceNumber' => 'string',
        'masterCardServiceCode' => 'string',
        'masterCardServiceReplyCode' => 'string',
        'masterCardAuthenticationType' => 'string',
        'name' => 'string',
        'routing' => '\CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationRouting',
        'merchantNumber' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'authIndicator' => null,
        'approvalCode' => null,
        'cardReferenceData' => null,
        'transactionId' => null,
        'networkTransactionId' => null,
        'providerTransactionId' => null,
        'responseCode' => null,
        'responseCodeSource' => null,
        'responseDetails' => null,
        'responseCategoryCode' => null,
        'forwardedAcquirerCode' => null,
        'avs' => null,
        'cardVerification' => null,
        'merchantAdvice' => null,
        'electronicVerificationResults' => null,
        'achVerification' => null,
        'customer' => null,
        'consumerAuthenticationResponse' => null,
        'systemTraceAuditNumber' => null,
        'paymentAccountReferenceNumber' => null,
        'transactionIntegrityCode' => null,
        'amexVerbalAuthReferenceNumber' => null,
        'masterCardServiceCode' => null,
        'masterCardServiceReplyCode' => null,
        'masterCardAuthenticationType' => null,
        'name' => null,
        'routing' => null,
        'merchantNumber' => null
    ];

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'authIndicator' => 'authIndicator',
        'approvalCode' => 'approvalCode',
        'cardReferenceData' => 'cardReferenceData',
        'transactionId' => 'transactionId',
        'networkTransactionId' => 'networkTransactionId',
        'providerTransactionId' => 'providerTransactionId',
        'responseCode' => 'responseCode',
        'responseCodeSource' => 'responseCodeSource',
        'responseDetails' => 'responseDetails',
        'responseCategoryCode' => 'responseCategoryCode',
        'forwardedAcquirerCode' => 'forwardedAcquirerCode',
        'avs' => 'avs',
        'cardVerification' => 'cardVerification',
        'merchantAdvice' => 'merchantAdvice',
        'electronicVerificationResults' => 'electronicVerificationResults',
        'achVerification' => 'achVerification',
        'customer' => 'customer',
        'consumerAuthenticationResponse' => 'consumerAuthenticationResponse',
        'systemTraceAuditNumber' => 'systemTraceAuditNumber',
        'paymentAccountReferenceNumber' => 'paymentAccountReferenceNumber',
        'transactionIntegrityCode' => 'transactionIntegrityCode',
        'amexVerbalAuthReferenceNumber' => 'amexVerbalAuthReferenceNumber',
        'masterCardServiceCode' => 'masterCardServiceCode',
        'masterCardServiceReplyCode' => 'masterCardServiceReplyCode',
        'masterCardAuthenticationType' => 'masterCardAuthenticationType',
        'name' => 'name',
        'routing' => 'routing',
        'merchantNumber' => 'merchantNumber'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'authIndicator' => 'setAuthIndicator',
        'approvalCode' => 'setApprovalCode',
        'cardReferenceData' => 'setCardReferenceData',
        'transactionId' => 'setTransactionId',
        'networkTransactionId' => 'setNetworkTransactionId',
        'providerTransactionId' => 'setProviderTransactionId',
        'responseCode' => 'setResponseCode',
        'responseCodeSource' => 'setResponseCodeSource',
        'responseDetails' => 'setResponseDetails',
        'responseCategoryCode' => 'setResponseCategoryCode',
        'forwardedAcquirerCode' => 'setForwardedAcquirerCode',
        'avs' => 'setAvs',
        'cardVerification' => 'setCardVerification',
        'merchantAdvice' => 'setMerchantAdvice',
        'electronicVerificationResults' => 'setElectronicVerificationResults',
        'achVerification' => 'setAchVerification',
        'customer' => 'setCustomer',
        'consumerAuthenticationResponse' => 'setConsumerAuthenticationResponse',
        'systemTraceAuditNumber' => 'setSystemTraceAuditNumber',
        'paymentAccountReferenceNumber' => 'setPaymentAccountReferenceNumber',
        'transactionIntegrityCode' => 'setTransactionIntegrityCode',
        'amexVerbalAuthReferenceNumber' => 'setAmexVerbalAuthReferenceNumber',
        'masterCardServiceCode' => 'setMasterCardServiceCode',
        'masterCardServiceReplyCode' => 'setMasterCardServiceReplyCode',
        'masterCardAuthenticationType' => 'setMasterCardAuthenticationType',
        'name' => 'setName',
        'routing' => 'setRouting',
        'merchantNumber' => 'setMerchantNumber'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'authIndicator' => 'getAuthIndicator',
        'approvalCode' => 'getApprovalCode',
        'cardReferenceData' => 'getCardReferenceData',
        'transactionId' => 'getTransactionId',
        'networkTransactionId' => 'getNetworkTransactionId',
        'providerTransactionId' => 'getProviderTransactionId',
        'responseCode' => 'getResponseCode',
        'responseCodeSource' => 'getResponseCodeSource',
        'responseDetails' => 'getResponseDetails',
        'responseCategoryCode' => 'getResponseCategoryCode',
        'forwardedAcquirerCode' => 'getForwardedAcquirerCode',
        'avs' => 'getAvs',
        'cardVerification' => 'getCardVerification',
        'merchantAdvice' => 'getMerchantAdvice',
        'electronicVerificationResults' => 'getElectronicVerificationResults',
        'achVerification' => 'getAchVerification',
        'customer' => 'getCustomer',
        'consumerAuthenticationResponse' => 'getConsumerAuthenticationResponse',
        'systemTraceAuditNumber' => 'getSystemTraceAuditNumber',
        'paymentAccountReferenceNumber' => 'getPaymentAccountReferenceNumber',
        'transactionIntegrityCode' => 'getTransactionIntegrityCode',
        'amexVerbalAuthReferenceNumber' => 'getAmexVerbalAuthReferenceNumber',
        'masterCardServiceCode' => 'getMasterCardServiceCode',
        'masterCardServiceReplyCode' => 'getMasterCardServiceReplyCode',
        'masterCardAuthenticationType' => 'getMasterCardAuthenticationType',
        'name' => 'getName',
        'routing' => 'getRouting',
        'merchantNumber' => 'getMerchantNumber'
    ];

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    public static function setters()
    {
        return self::$setters;
    }

    public static function getters()
    {
        return self::$getters;
    }

    

    

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['authIndicator'] = isset($data['authIndicator']) ? $data['authIndicator'] : null;
        $this->container['approvalCode'] = isset($data['approvalCode']) ? $data['approvalCode'] : null;
        $this->container['cardReferenceData'] = isset($data['cardReferenceData']) ? $data['cardReferenceData'] : null;
        $this->container['transactionId'] = isset($data['transactionId']) ? $data['transactionId'] : null;
        $this->container['networkTransactionId'] = isset($data['networkTransactionId']) ? $data['networkTransactionId'] : null;
        $this->container['providerTransactionId'] = isset($data['providerTransactionId']) ? $data['providerTransactionId'] : null;
        $this->container['responseCode'] = isset($data['responseCode']) ? $data['responseCode'] : null;
        $this->container['responseCodeSource'] = isset($data['responseCodeSource']) ? $data['responseCodeSource'] : null;
        $this->container['responseDetails'] = isset($data['responseDetails']) ? $data['responseDetails'] : null;
        $this->container['responseCategoryCode'] = isset($data['responseCategoryCode']) ? $data['responseCategoryCode'] : null;
        $this->container['forwardedAcquirerCode'] = isset($data['forwardedAcquirerCode']) ? $data['forwardedAcquirerCode'] : null;
        $this->container['avs'] = isset($data['avs']) ? $data['avs'] : null;
        $this->container['cardVerification'] = isset($data['cardVerification']) ? $data['cardVerification'] : null;
        $this->container['merchantAdvice'] = isset($data['merchantAdvice']) ? $data['merchantAdvice'] : null;
        $this->container['electronicVerificationResults'] = isset($data['electronicVerificationResults']) ? $data['electronicVerificationResults'] : null;
        $this->container['achVerification'] = isset($data['achVerification']) ? $data['achVerification'] : null;
        $this->container['customer'] = isset($data['customer']) ? $data['customer'] : null;
        $this->container['consumerAuthenticationResponse'] = isset($data['consumerAuthenticationResponse']) ? $data['consumerAuthenticationResponse'] : null;
        $this->container['systemTraceAuditNumber'] = isset($data['systemTraceAuditNumber']) ? $data['systemTraceAuditNumber'] : null;
        $this->container['paymentAccountReferenceNumber'] = isset($data['paymentAccountReferenceNumber']) ? $data['paymentAccountReferenceNumber'] : null;
        $this->container['transactionIntegrityCode'] = isset($data['transactionIntegrityCode']) ? $data['transactionIntegrityCode'] : null;
        $this->container['amexVerbalAuthReferenceNumber'] = isset($data['amexVerbalAuthReferenceNumber']) ? $data['amexVerbalAuthReferenceNumber'] : null;
        $this->container['masterCardServiceCode'] = isset($data['masterCardServiceCode']) ? $data['masterCardServiceCode'] : null;
        $this->container['masterCardServiceReplyCode'] = isset($data['masterCardServiceReplyCode']) ? $data['masterCardServiceReplyCode'] : null;
        $this->container['masterCardAuthenticationType'] = isset($data['masterCardAuthenticationType']) ? $data['masterCardAuthenticationType'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['routing'] = isset($data['routing']) ? $data['routing'] : null;
        $this->container['merchantNumber'] = isset($data['merchantNumber']) ? $data['merchantNumber'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        return true;
    }


    /**
     * Gets authIndicator
     * @return string
     */
    public function getAuthIndicator()
    {
        return $this->container['authIndicator'];
    }

    /**
     * Sets authIndicator
     * @param string $authIndicator Flag that specifies the purpose of the authorization.  Possible values:  - `0`: Preauthorization  - `1`: Final authorization
     * @return $this
     */
    public function setAuthIndicator($authIndicator)
    {

        $this->container['authIndicator'] = $authIndicator;

        return $this;
    }

    /**
     * Gets approvalCode
     * @return string
     */
    public function getApprovalCode()
    {
        return $this->container['approvalCode'];
    }

    /**
     * Sets approvalCode
     * @param string $approvalCode Authorization code. Returned only when the processor returns this value.  The length of this value depends on your processor.  Returned by authorization service.  #### PIN debit Authorization code that is returned by the processor.  Returned by PIN debit credit.  #### Elavon Encrypted Account Number Program The returned value is OFFLINE.  #### TSYS Acquiring Solutions The returned value for a successful zero amount authorization is 000000.
     * @return $this
     */
    public function setApprovalCode($approvalCode)
    {
        $this->container['approvalCode'] = $approvalCode;

        return $this;
    }

    /**
     * Gets cardReferenceData
     * @return string
     */
    public function getCardReferenceData()
    {
        return $this->container['cardReferenceData'];
    }

    /**
     * Sets cardReferenceData
     * @param string $cardReferenceData The Scheme reference data is a variable length data element up to a maximum of 56 characters. It may be sent by the acquirer in the  authorisation response message, and by the terminal (unchanged) in subsequent authorisation request messages associated with the same  transaction. This field is used by Streamline and HSBC UK only, at present.
     * @return $this
     */
    public function setCardReferenceData($cardReferenceData)
    {

        $this->container['cardReferenceData'] = $cardReferenceData;

        return $this;
    }

    /**
     * Gets transactionId
     * @return string
     */
    public function getTransactionId()
    {
        return $this->container['transactionId'];
    }

    /**
     * Sets transactionId
     * @param string $transactionId Network transaction identifier (TID). You can use this value to identify a specific transaction when you are discussing the transaction with your processor. Not all processors provide this value.  Returned by the authorization service.  #### PIN debit Transaction identifier generated by the processor.  Returned by PIN debit credit.  #### GPX Processor transaction ID.  #### Cielo For Cielo, this value is the non-sequential unit (NSU) and is supported for all transactions. The value is generated by Cielo or the issuing bank.  #### Comercio Latino For Comercio Latino, this value is the proof of sale or non-sequential unit (NSU) number generated by the acquirers Cielo and Rede, or the issuing bank.  #### CyberSource through VisaNet and GPN For details about this value for CyberSource through VisaNet and GPN, see \"Network Transaction Identifiers\" in [Credit Card Services Using the SCMP API.](https://apps.cybersource.com/library/documentation/dev_guides/CC_Svcs_SCMP_API/html/)  #### Moneris This value identifies the transaction on a host system. It contains the following information: - Terminal used to process the transaction - Shift during which the transaction took place - Batch number - Transaction number within the batch You must store this value. If you give the customer a receipt, display this value on the receipt.  **Example** For the value 66012345001069003: - Terminal ID = 66012345 - Shift number = 001 - Batch number = 069 - Transaction number = 003
     * @return $this
     */
    public function setTransactionId($transactionId)
    {

        $this->container['transactionId'] = $transactionId;

        return $this;
    }

    /**
     * Gets networkTransactionId
     * @return string
     */
    public function getNetworkTransactionId()
    {
        return $this->container['networkTransactionId'];
    }

    /**
     * Sets networkTransactionId
     * @param string $networkTransactionId The description for this field is not available.
     * @return $this
     */
    public function setNetworkTransactionId($networkTransactionId)
    {
        $this->container['networkTransactionId'] = $networkTransactionId;

        return $this;
    }

    /**
     * Gets providerTransactionId
     * @return string
     */
    public function getProviderTransactionId()
    {
        return $this->container['providerTransactionId'];
    }

    /**
     * Sets providerTransactionId
     * @param string $providerTransactionId The description for this field is not available.
     * @return $this
     */
    public function setProviderTransactionId($providerTransactionId)
    {
        $this->container['providerTransactionId'] = $providerTransactionId;

        return $this;
    }

    /**
     * Gets responseCode
     * @return string
     */
    public function getResponseCode()
    {
        return $this->container['responseCode'];
    }

    /**
     * Sets responseCode
     * @param string $responseCode For most processors, this is the error message sent directly from the bank. Returned only when the processor returns this value.  **Important** Do not use this field to evaluate the result of the authorization.  #### PIN debit Response value that is returned by the processor or bank. **Important** Do not use this field to evaluate the results of the transaction request.  Returned by PIN debit credit, PIN debit purchase, and PIN debit reversal.  #### AIBMS If this value is `08`, you can accept the transaction if the customer provides you with identification.  #### Atos This value is the response code sent from Atos and it might also include the response code from the bank. Format: `aa,bb` with the two values separated by a comma and where: - `aa` is the two-digit error message from Atos. - `bb` is the optional two-digit error message from the bank.  #### Comercio Latino This value is the status code and the error or response code received from the processor separated by a colon. Format: [status code]:E[error code] or [status code]:R[response code] Example `2:R06`  #### JCN Gateway Processor-defined detail error code. The associated response category code is in the `processorInformation.responseCategoryCode` field. String (3)
     * @return $this
     */
    public function setResponseCode($responseCode)
    {

        $this->container['responseCode'] = $responseCode;

        return $this;
    }

    /**
     * Gets responseCodeSource
     * @return string
     */
    public function getResponseCodeSource()
    {
        return $this->container['responseCodeSource'];
    }

    /**
     * Sets responseCodeSource
     * @param string $responseCodeSource Used by Visa only and contains the response source/reason code that identifies the source of the response decision.
     * @return $this
     */
    public function setResponseCodeSource($responseCodeSource)
    {

        $this->container['responseCodeSource'] = $responseCodeSource;

        return $this;
    }

    /**
     * Gets responseDetails
     * @return string
     */
    public function getResponseDetails()
    {
        return $this->container['responseDetails'];
    }

    /**
     * Sets responseDetails
     * @param string $responseDetails This field might contain information about a decline. This field is supported only for **CyberSource through VisaNet**.
     * @return $this
     */
    public function setResponseDetails($responseDetails)
    {

        $this->container['responseDetails'] = $responseDetails;

        return $this;
    }

    /**
     * Gets responseCategoryCode
     * @return string
     */
    public function getResponseCategoryCode()
    {
        return $this->container['responseCategoryCode'];
    }

    /**
     * Sets responseCategoryCode
     * @param string $responseCategoryCode Processor-defined response category code. The associated detail error code is in the `processorInformation.responseCode` or `issuerInformation.responseCode` field of the service you requested.  This field is supported only for:   - Japanese issuers  - Domestic transactions in Japan  - Comercio Latino—processor transaction ID required for troubleshooting  #### Maximum length for processors   - Comercio Latino: 36  - All other processors: 3
     * @return $this
     */
    public function setResponseCategoryCode($responseCategoryCode)
    {

        $this->container['responseCategoryCode'] = $responseCategoryCode;

        return $this;
    }

    /**
     * Gets forwardedAcquirerCode
     * @return string
     */
    public function getForwardedAcquirerCode()
    {
        return $this->container['forwardedAcquirerCode'];
    }

    /**
     * Sets forwardedAcquirerCode
     * @param string $forwardedAcquirerCode Name of the Japanese acquirer that processed the transaction. Returned only for JCN Gateway. Please contact the CyberSource Japan Support Group for more information.
     * @return $this
     */
    public function setForwardedAcquirerCode($forwardedAcquirerCode)
    {

        $this->container['forwardedAcquirerCode'] = $forwardedAcquirerCode;

        return $this;
    }

    /**
     * Gets avs
     * @return \CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationAvs
     */
    public function getAvs()
    {
        return $this->container['avs'];
    }

    /**
     * Sets avs
     * @param \CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationAvs $avs
     * @return $this
     */
    public function setAvs($avs)
    {
        $this->container['avs'] = $avs;

        return $this;
    }

    /**
     * Gets cardVerification
     * @return \CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationCardVerification
     */
    public function getCardVerification()
    {
        return $this->container['cardVerification'];
    }

    /**
     * Sets cardVerification
     * @param \CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationCardVerification $cardVerification
     * @return $this
     */
    public function setCardVerification($cardVerification)
    {
        $this->container['cardVerification'] = $cardVerification;

        return $this;
    }

    /**
     * Gets merchantAdvice
     * @return \CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationMerchantAdvice
     */
    public function getMerchantAdvice()
    {
        return $this->container['merchantAdvice'];
    }

    /**
     * Sets merchantAdvice
     * @param \CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationMerchantAdvice $merchantAdvice
     * @return $this
     */
    public function setMerchantAdvice($merchantAdvice)
    {
        $this->container['merchantAdvice'] = $merchantAdvice;

        return $this;
    }

    /**
     * Gets electronicVerificationResults
     * @return \CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationElectronicVerificationResults
     */
    public function getElectronicVerificationResults()
    {
        return $this->container['electronicVerificationResults'];
    }

    /**
     * Sets electronicVerificationResults
     * @param \CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationElectronicVerificationResults $electronicVerificationResults
     * @return $this
     */
    public function setElectronicVerificationResults($electronicVerificationResults)
    {
        $this->container['electronicVerificationResults'] = $electronicVerificationResults;

        return $this;
    }

    /**
     * Gets achVerification
     * @return \CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationAchVerification
     */
    public function getAchVerification()
    {
        return $this->container['achVerification'];
    }

    /**
     * Sets achVerification
     * @param \CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationAchVerification $achVerification
     * @return $this
     */
    public function setAchVerification($achVerification)
    {
        $this->container['achVerification'] = $achVerification;

        return $this;
    }

    /**
     * Gets customer
     * @return \CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationCustomer
     */
    public function getCustomer()
    {
        return $this->container['customer'];
    }

    /**
     * Sets customer
     * @param \CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationCustomer $customer
     * @return $this
     */
    public function setCustomer($customer)
    {
        $this->container['customer'] = $customer;

        return $this;
    }

    /**
     * Gets consumerAuthenticationResponse
     * @return \CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationConsumerAuthenticationResponse
     */
    public function getConsumerAuthenticationResponse()
    {
        return $this->container['consumerAuthenticationResponse'];
    }

    /**
     * Sets consumerAuthenticationResponse
     * @param \CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationConsumerAuthenticationResponse $consumerAuthenticationResponse
     * @return $this
     */
    public function setConsumerAuthenticationResponse($consumerAuthenticationResponse)
    {
        $this->container['consumerAuthenticationResponse'] = $consumerAuthenticationResponse;

        return $this;
    }

    /**
     * Gets systemTraceAuditNumber
     * @return string
     */
    public function getSystemTraceAuditNumber()
    {
        return $this->container['systemTraceAuditNumber'];
    }

    /**
     * Sets systemTraceAuditNumber
     * @param string $systemTraceAuditNumber This field is returned only for **American Express Direct** and **CyberSource through VisaNet**. Returned by authorization and incremental authorization services.  #### American Express Direct  System trace audit number (STAN). This value identifies the transaction and is useful when investigating a chargeback dispute.  #### CyberSource through VisaNet  System trace number that must be printed on the customer’s receipt.
     * @return $this
     */
    public function setSystemTraceAuditNumber($systemTraceAuditNumber)
    {

        $this->container['systemTraceAuditNumber'] = $systemTraceAuditNumber;

        return $this;
    }

    /**
     * Gets paymentAccountReferenceNumber
     * @return string
     */
    public function getPaymentAccountReferenceNumber()
    {
        return $this->container['paymentAccountReferenceNumber'];
    }

    /**
     * Sets paymentAccountReferenceNumber
     * @param string $paymentAccountReferenceNumber Visa-generated reference number that identifies a card-present transaction for which you provided one of the following:   - Visa primary account number (PAN)  - Visa-generated token for a PAN  This reference number serves as a link to the cardholder account and to all transactions for that account. This reply field is returned only for CyberSource through VisaNet.  **Note** On CyberSource through VisaNet, the value for this field corresponds to the following data in the TC 33 capture file: - Record: CP01 TCR8 - Position: 79-110 - Field: Payment Account Reference  The TC 33 Capture file contains information about the purchases and refunds that a merchant submits to CyberSource. CyberSource through VisaNet creates the TC 33 Capture file at the end of the day and sends it to the merchant’s acquirer, who uses this information to facilitate end-of-day clearing processing with payment networks.
     * @return $this
     */
    public function setPaymentAccountReferenceNumber($paymentAccountReferenceNumber)
    {

        $this->container['paymentAccountReferenceNumber'] = $paymentAccountReferenceNumber;

        return $this;
    }

    /**
     * Gets transactionIntegrityCode
     * @return string
     */
    public function getTransactionIntegrityCode()
    {
        return $this->container['transactionIntegrityCode'];
    }

    /**
     * Sets transactionIntegrityCode
     * @param string $transactionIntegrityCode Transaction integrity classification provided by Mastercard. This value specifies Mastercard’s evaluation of the transaction’s safety and security. This field is returned only for **CyberSource through VisaNet**.  For card-present transactions, possible values:   - `A1`: EMV or token in a secure, trusted environment  - `B1`: EMV or chip equivalent  - `C1`: Magnetic stripe  - `E1`: Key entered  - `U0`: Unclassified  For card-not-present transactions, possible values:   - `A2`: Digital transactions  - `B2`: Authenticated checkout  - `C2`: Transaction validation  - `D2`: Enhanced data  - `E2`: Generic messaging  - `U0`: Unclassified  For information about these values, contact Mastercard or your acquirer.  #### CyberSource through VisaNet  The value for this field corresponds to the following data in the TC 33 capture file,<sup>1</sup>: - Record: CP01 TCR6 - Position: 136-137 - Field: Mastercard Transaction Integrity Classification  <sup>1</sup> The TC 33 Capture file contains information about the purchases and refunds that a merchant submits to CyberSource. CyberSource through VisaNet creates the TC 33 Capture file at the end of the day and sends it to the merchant’s acquirer, who uses this information to facilitate end-of-day clearing processing with payment networks.
     * @return $this
     */
    public function setTransactionIntegrityCode($transactionIntegrityCode)
    {

        $this->container['transactionIntegrityCode'] = $transactionIntegrityCode;

        return $this;
    }

    /**
     * Gets amexVerbalAuthReferenceNumber
     * @return string
     */
    public function getAmexVerbalAuthReferenceNumber()
    {
        return $this->container['amexVerbalAuthReferenceNumber'];
    }

    /**
     * Sets amexVerbalAuthReferenceNumber
     * @param string $amexVerbalAuthReferenceNumber Referral response number for a verbal authorization with FDMS Nashville when using an American Express card. Give this number to American Express when you call them for the verbal authorization.
     * @return $this
     */
    public function setAmexVerbalAuthReferenceNumber($amexVerbalAuthReferenceNumber)
    {

        $this->container['amexVerbalAuthReferenceNumber'] = $amexVerbalAuthReferenceNumber;

        return $this;
    }

    /**
     * Gets masterCardServiceCode
     * @return string
     */
    public function getMasterCardServiceCode()
    {
        return $this->container['masterCardServiceCode'];
    }

    /**
     * Sets masterCardServiceCode
     * @param string $masterCardServiceCode Mastercard service that was used for the transaction. Mastercard provides this value to CyberSource.  Possible value:  - 53: Mastercard card-on-file token service  #### CyberSource through VisaNet The value for this field corresponds to the following data in the TC 33 capture file: - Record: CP01 TCR6 - Position: 133-134 - Field: Mastercard Merchant on-behalf service. **Note** This field is returned only for CyberSource through VisaNet.
     * @return $this
     */
    public function setMasterCardServiceCode($masterCardServiceCode)
    {

        $this->container['masterCardServiceCode'] = $masterCardServiceCode;

        return $this;
    }

    /**
     * Gets masterCardServiceReplyCode
     * @return string
     */
    public function getMasterCardServiceReplyCode()
    {
        return $this->container['masterCardServiceReplyCode'];
    }

    /**
     * Sets masterCardServiceReplyCode
     * @param string $masterCardServiceReplyCode Result of the Mastercard card-on-file token service. Mastercard provides this value to CyberSource.  Possible values:   - `C`: Service completed successfully.  - `F`: One of the following:    - Incorrect Mastercard POS entry mode. The Mastercard POS entry mode should be 81 for an authorization or      authorization reversal.    - Incorrect Mastercard POS entry mode. The Mastercard POS entry mode should be 01 for a tokenized request.    - Token requestor ID is missing or formatted incorrectly.  - `I`: One of the following:    - Invalid token requestor ID.    - Suspended or deactivated token.    - Invalid token (not in mapping table).  - `T`: Invalid combination of token requestor ID and token.  - `U`: Expired token.  - `W`: Primary account number (PAN) listed in electronic warning bulletin.  **Note** This field is returned only for **CyberSource through VisaNet**.
     * @return $this
     */
    public function setMasterCardServiceReplyCode($masterCardServiceReplyCode)
    {

        $this->container['masterCardServiceReplyCode'] = $masterCardServiceReplyCode;

        return $this;
    }

    /**
     * Gets masterCardAuthenticationType
     * @return string
     */
    public function getMasterCardAuthenticationType()
    {
        return $this->container['masterCardAuthenticationType'];
    }

    /**
     * Sets masterCardAuthenticationType
     * @param string $masterCardAuthenticationType Type of authentication for which the transaction qualifies as determined by the Mastercard authentication service, which confirms the identity of the cardholder. Mastercard provides this value to CyberSource.  Possible values:   - `1`: Transaction qualifies for Mastercard authentication type 1.  - `2`: Transaction qualifies for Mastercard authentication type 2.  #### CyberSource through VisaNet The value for this field corresponds to the following data in the TC 33 capture file: - Record: CP01 TCR6 - Position: 132 - Field: Mastercard Member Defined service. **Note** This field is returned only for CyberSource through VisaNet.
     * @return $this
     */
    public function setMasterCardAuthenticationType($masterCardAuthenticationType)
    {

        $this->container['masterCardAuthenticationType'] = $masterCardAuthenticationType;

        return $this;
    }

    /**
     * Gets name
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     * @param string $name Name of the Processor.
     * @return $this
     */
    public function setName($name)
    {

        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets routing
     * @return \CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationRouting
     */
    public function getRouting()
    {
        return $this->container['routing'];
    }

    /**
     * Sets routing
     * @param \CyberSource\Model\PtsV2PaymentsPost201ResponseProcessorInformationRouting $routing
     * @return $this
     */
    public function setRouting($routing)
    {
        $this->container['routing'] = $routing;

        return $this;
    }

    /**
     * Gets merchantNumber
     * @return string
     */
    public function getMerchantNumber()
    {
        return $this->container['merchantNumber'];
    }

    /**
     * Sets merchantNumber
     * @param string $merchantNumber Identifier that was assigned to you by your acquirer. This value must be printed on the receipt.  #### Returned by Authorizations and Credits.  This reply field is only supported by merchants who have installed client software on their POS terminals and use these processors: - American Express Direct - Credit Mutuel-CIC - FDC Nashville Global - OmniPay Direct - SIX
     * @return $this
     */
    public function setMerchantNumber($merchantNumber)
    {

        $this->container['merchantNumber'] = $merchantNumber;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(\CyberSource\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\CyberSource\ObjectSerializer::sanitizeForSerialization($this));
    }
}


