<?php
/**
 * Ptsv2paymentsProcessingInformationCaptureOptions
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
 * Ptsv2paymentsProcessingInformationCaptureOptions Class Doc Comment
 *
 * @category    Class
 * @package     CyberSource
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Ptsv2paymentsProcessingInformationCaptureOptions implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'ptsv2payments_processingInformation_captureOptions';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'captureSequenceNumber' => 'int',
        'totalCaptureCount' => 'int',
        'dateToCapture' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'captureSequenceNumber' => null,
        'totalCaptureCount' => null,
        'dateToCapture' => null
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
        'captureSequenceNumber' => 'captureSequenceNumber',
        'totalCaptureCount' => 'totalCaptureCount',
        'dateToCapture' => 'dateToCapture'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'captureSequenceNumber' => 'setCaptureSequenceNumber',
        'totalCaptureCount' => 'setTotalCaptureCount',
        'dateToCapture' => 'setDateToCapture'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'captureSequenceNumber' => 'getCaptureSequenceNumber',
        'totalCaptureCount' => 'getTotalCaptureCount',
        'dateToCapture' => 'getDateToCapture'
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
        $this->container['captureSequenceNumber'] = isset($data['captureSequenceNumber']) ? $data['captureSequenceNumber'] : null;
        $this->container['totalCaptureCount'] = isset($data['totalCaptureCount']) ? $data['totalCaptureCount'] : null;
        $this->container['dateToCapture'] = isset($data['dateToCapture']) ? $data['dateToCapture'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        if (!is_null($this->container['captureSequenceNumber']) && ($this->container['captureSequenceNumber'] > 99)) {
            $invalid_properties[] = "invalid value for 'captureSequenceNumber', must be smaller than or equal to 99.";
        }

        if (!is_null($this->container['captureSequenceNumber']) && ($this->container['captureSequenceNumber'] < 1)) {
            $invalid_properties[] = "invalid value for 'captureSequenceNumber', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['totalCaptureCount']) && ($this->container['totalCaptureCount'] > 99)) {
            $invalid_properties[] = "invalid value for 'totalCaptureCount', must be smaller than or equal to 99.";
        }

        if (!is_null($this->container['totalCaptureCount']) && ($this->container['totalCaptureCount'] < 1)) {
            $invalid_properties[] = "invalid value for 'totalCaptureCount', must be bigger than or equal to 1.";
        }

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

        if ($this->container['captureSequenceNumber'] > 99) {
            return false;
        }
        if ($this->container['captureSequenceNumber'] < 1) {
            return false;
        }
        if ($this->container['totalCaptureCount'] > 99) {
            return false;
        }
        if ($this->container['totalCaptureCount'] < 1) {
            return false;
        }
        return true;
    }


    /**
     * Gets captureSequenceNumber
     * @return int
     */
    public function getCaptureSequenceNumber()
    {
        return $this->container['captureSequenceNumber'];
    }

    /**
     * Sets captureSequenceNumber
     * @param int $captureSequenceNumber Capture number when requesting multiple partial captures for one authorization. Used along with `totalCaptureCount` to track which capture is being processed.  For example, the second of five captures would be passed to CyberSource as:   - `captureSequenceNumber_ = 2`, and   - `totalCaptureCount = 5`
     * @return $this
     */
    public function setCaptureSequenceNumber($captureSequenceNumber)
    {
        if (!is_null($captureSequenceNumber) && ($captureSequenceNumber > 99)) {
            throw new \InvalidArgumentException('invalid value for $captureSequenceNumber when calling Ptsv2paymentsProcessingInformationCaptureOptions., must be smaller than or equal to 99.');
        }
        if (!is_null($captureSequenceNumber) && ($captureSequenceNumber < 1)) {
            throw new \InvalidArgumentException('invalid value for $captureSequenceNumber when calling Ptsv2paymentsProcessingInformationCaptureOptions., must be bigger than or equal to 1.');
        }

        $this->container['captureSequenceNumber'] = $captureSequenceNumber;

        return $this;
    }

    /**
     * Gets totalCaptureCount
     * @return int
     */
    public function getTotalCaptureCount()
    {
        return $this->container['totalCaptureCount'];
    }

    /**
     * Sets totalCaptureCount
     * @param int $totalCaptureCount Total number of captures when requesting multiple partial captures for one payment. Used along with `captureSequenceNumber` field to track which capture is being processed.  For example, the second of five captures would be passed to CyberSource as:   - `captureSequenceNumber = 2`, and   - `totalCaptureCount = 5`
     * @return $this
     */
    public function setTotalCaptureCount($totalCaptureCount)
    {
        if (!is_null($totalCaptureCount) && ($totalCaptureCount > 99)) {
            throw new \InvalidArgumentException('invalid value for $totalCaptureCount when calling Ptsv2paymentsProcessingInformationCaptureOptions., must be smaller than or equal to 99.');
        }
        if (!is_null($totalCaptureCount) && ($totalCaptureCount < 1)) {
            throw new \InvalidArgumentException('invalid value for $totalCaptureCount when calling Ptsv2paymentsProcessingInformationCaptureOptions., must be bigger than or equal to 1.');
        }

        $this->container['totalCaptureCount'] = $totalCaptureCount;

        return $this;
    }

    /**
     * Gets dateToCapture
     * @return string
     */
    public function getDateToCapture()
    {
        return $this->container['dateToCapture'];
    }

    /**
     * Sets dateToCapture
     * @param string $dateToCapture Date on which you want the capture to occur. This field is supported only for CyberSource through VisaNet. Format: `MMDD`  #### Used by **Authorization** Optional field.
     * @return $this
     */
    public function setDateToCapture($dateToCapture)
    {

        $this->container['dateToCapture'] = $dateToCapture;

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

