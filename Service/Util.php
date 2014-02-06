<?php

    namespace Ratepay\Bundle\PaymentBundle\Service;

    use Ratepay\Bundle\PaymentBundle\Service\SimpleXmlExtended;

    class Util
    {

        /**
         * Converts an array into a xml.
         *
         * @param array $model
         * @return SimpleXmlExtended
         */
        public static function convertToXml($array, $root)
        {
            $xmlString = '<?xml version="1.0" encoding="UTF-8"?>'
                . '<' . $root . '/>';
            $xml = new SimpleXmlExtended($xmlString);
            self::_arrayToXml($array, $xml);
            return $xml;
        }

        /**
         * Converts an array into a xml.
         *
         * @TODO: Needs better testing.
         * @param array $model
         * @param SimpleXmlExtended $xml
         */
        private static function _arrayToXml(array $model, &$xml)
        {
            foreach ($model as $key => $value) {
                if (!self::betterEmpty($value) && !(is_array($value) && count($value) === 0)
                ) {
                    if (is_array($value)) {
                        if (!is_numeric($key)) {
                            if (substr($key, 0, 1) === '%') {
                                $attributeKey = substr($key, 1);
                                $subnode = $xml->addCDataChild("$attributeKey", $value['#']);
                            } else {
                                $subnode = $xml->addChild("$key");
                            }
                            self::_arrayToXml($value, $subnode);
                        } else {
                            self::_arrayToXml($value, $xml);
                        }
                    } else if (substr($key, 0, 1) === '@') {
                        $attributeKey = substr($key, 1);
                        $xml->addAttribute("$attributeKey", "$value");
                    } else if (substr($key, 0, 1) === '%') {
                        $attributeKey = substr($key, 1);
                        $xml->addCDataChild("$attributeKey", "$value");
                    } else {
                        if (is_numeric($key)) {
                            $xml->{0} = $value;
                        } elseif($key !== '#') {
                            $xml->addChild("$key", "$value");
                        }
                    }
                }
            }
        }

        /**
         * Checks if the value is empty. solves problem with value 0
         *
         * @param mixed $value
         * @return boolean
         */
        private static function betterEmpty($value){
            return empty($value) && !is_numeric($value);
        }

        /**
         * Validates the Response
         *
         * @param string $requestType
         * @return boolean
         */
        public static function validateResponse($requestType = '', $response = null)
        {
            $return = false;
            $statusCode = '';
            $resultCode = '';
            $reasonCode = '';
            if ($response != null) {
                $statusCode = (string) $response->getElementsByTagName('status')->item(0)->getAttribute('code');
                $resultCode = (string) $response->getElementsByTagName('result')->item(0)->getAttribute('code');
                $reasonCode = (string) $response->getElementsByTagName('reason')->item(0)->getAttribute('code');
            }
            switch ($requestType) {
                case 'PROFILE_REQUEST':
                    if ($statusCode == "OK" && $resultCode == "500") {
                        $return = true;
                    }
                    break;
                case 'PAYMENT_INIT':
                    if ($statusCode == "OK" && $resultCode == "350") {
                        $return = true;
                    }
                    break;
                case 'PAYMENT_REQUEST':
                    if ($statusCode == "OK" && $resultCode == "402") {
                        $return = true;
                    }
                    break;
                case 'PAYMENT_CONFIRM':
                    if ($statusCode == "OK" && $resultCode == "400") {
                        $return = true;
                    }
                    break;
                case 'CONFIRMATION_DELIVER':
                    if ($statusCode == "OK" && $resultCode == "404") {
                        $return = true;
                    }
                    break;
                case 'PAYMENT_CHANGE':
                    if ($statusCode == "OK" && $resultCode == "403") {
                        $return = true;
                    }
                    break;
                case 'CONFIGURATION_REQUEST':
                    if ($statusCode == "OK" && $resultCode == "500") {
                        $return = true;
                    }
                    break;
                case 'CALCULATION_REQUEST':
                    $successCodes = array('603', '671', '688', '689', '695', '696', '697', '698', '699');
                    if ($statusCode == "OK" && in_array($reasonCode, $successCodes) && $resultCode == "502") {
                        $return = true;
                    }
                    break;
            }
            return $return;
        }

        /**
         * Return the methodname for Ratepay
         *
         * @return string
         */
        public static function getPaymentMethod($payment)
        {
            switch ($payment) {
                case 'rpayratepayinvoice':
                    return 'INVOICE';
                    break;
                case 'rpayratepayrate':
                    return 'INSTALLMENT';
                    break;
                case 'rpayratepaydebit':
                    return 'ELV';
                    break;
            }
        }

    }