<?php

namespace XeroPHP\Models\Accounting\Overpayment;

use XeroPHP\Remote;
use XeroPHP\Models\Accounting\Invoice;

class Allocation extends Remote\Model
{
    /**
     * the invoice the overpayment is being allocated against.
     *
     * @property Invoice Invoice
     */

    /**
     * the amount being applied to the invoice.
     *
     * @property float AppliedAmount
     */

    /**
     * the date the overpayment is applied YYYY-MM-DD (read-only). This will be the latter of the invoice
     * date and the overpayment date.
     *
     * @property \DateTimeInterface Date
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Overpayments';
    }


    public static function getSubResourceURI()
    {
        return 'Allocations';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Allocation';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'OverpaymentID';
    }

    /**
     * Get the stem of the API (core.xro) etc.
     *
     * @return string
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_CORE;
    }

    /**
     * Get the supported methods.
     */
    public static function getSupportedMethods()
    {
        return [
            Remote\Request::METHOD_PUT
        ];
    }

    /**
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Type
     *  [2] - PHP type
     *  [3] - Is an Array
     *  [4] - Saves directly.
     *
     * @return array
     */
    public static function getProperties()
    {
        return [
            'Invoice' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Invoice', false, false],
            'AppliedAmount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Date' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'OverpaymentID' => [false, self::PROPERTY_TYPE_STRING, null, false, false]
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return Invoice
     */
    public function getInvoice()
    {
        return $this->_data['Invoice'];
    }

    /**
     * @param Invoice $value
     *
     * @return Allocation
     */
    public function setInvoice(Invoice $value)
    {
        $this->propertyUpdated('Invoice', $value);
        $this->_data['Invoice'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getAppliedAmount()
    {
        return $this->_data['AppliedAmount'];
    }

    /**
     * @param float $value
     *
     * @return Allocation
     */
    public function setAppliedAmount($value)
    {
        $this->propertyUpdated('AppliedAmount', $value);
        $this->_data['AppliedAmount'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDate()
    {
        return $this->_data['Date'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Allocation
     */
    public function setDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('Date', $value);
        $this->_data['Date'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getOverpaymentID()
    {
        return $this->_data['OverpaymentID'];
    }

    /**
     * @param string $value
     * @return Allocation
     */
    public function setOverpaymentID($value)
    {
        $this->propertyUpdated('OverpaymentID', $value);
        $this->_data['OverpaymentID'] = $value;
        return $this;
    }
}
