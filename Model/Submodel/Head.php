<?php

    namespace Ratepay\Bundle\PaymentBundle\Model\Submodel;

    use Ratepay\Bundle\PaymentBundle\Model\ModelInterface;

    class Head implements ModelInterface
    {

        /**
         * @var string
         */
        private $systemId;

        /**
         * @var string
         */
        private $transactionId;

        /**
         * @var string
         */
        private $profileId;

        /**
         * @var string
         */
        private $securityCode;

        /**
         * @var string
         */
        private $operation;

        /**
         * @var string
         */
        private $operationSubstring;

        /**
         * @var string
         */
        private $systemVersion;

        /**
         * @var string
         */
        private $orderId;

        public function __construct()
        {
            $this->transactionId      = null;
            $this->operationSubstring = null;
        }

        /**
         * This function returns the value of $systemId
         *
         * @return string
         */
        public function getSystemId()
        {
            return $this->systemId;
        }

        /**
         * This function sets the value for $systemId
         *
         * @param string $systemId
         */
        public function setSystemId($systemId)
        {
            $this->systemId = $systemId;
        }

        /**
         * This function returns the value of $transactionId
         *
         * @return string
         */
        public function getTransactionId()
        {
            return $this->transactionId;
        }

        /**
         * This function sets the value for $transactionId
         *
         * @param string $transactionId
         */
        public function setTransactionId($transactionId)
        {
            $this->transactionId = $transactionId;
        }

        /**
         * This function returns the value of $profileId
         *
         * @return string
         */
        public function getProfileId()
        {
            return $this->profileId;
        }

        /**
         * This function sets the value for $profileId
         *
         * @param string $profileId
         */
        public function setProfileId($profileId)
        {
            $this->profileId = $profileId;
        }

        /**
         * This function returns the value of $securityCode
         *
         * @return string
         */
        public function getSecurityCode()
        {
            return $this->securityCode;
        }

        /**
         * This function sets the value for $securityCode
         *
         * @param string $securityCode
         */
        public function setSecurityCode($securityCode)
        {
            $this->securityCode = $securityCode;
        }

        /**
         * This function returns the value of $operation
         *
         * @return string
         */
        public function getOperation()
        {
            return $this->operation;
        }

        /**
         * This function sets the value for $operation
         *
         * @param string $operation
         */
        public function setOperation($operation)
        {
            $this->operation = $operation;
        }

        /**
         * This function returns the value of $operationSubstring
         *
         * @return string
         */
        public function getOperationSubstring()
        {
            return $this->operationSubstring;
        }

        /**
         * This function sets the value for $operationSubstring
         *
         * @param string $operationSubstring
         */
        public function setOperationSubstring($operationSubstring)
        {
            $this->operationSubstring = $operationSubstring;
        }

        /**
         * This function returns the value of $systemVersion
         *
         * @return string
         */
        public function getSystemVersion()
        {
            return $this->systemVersion;
        }

        /**
         * This function sets the value for $systemVersion
         *
         * @param string $systemVersion
         */
        public function setSystemVersion($systemVersion)
        {
            $this->systemVersion = $systemVersion;
        }

        /**
         * This function returns the value of $orderId
         *
         * @return string
         */
        public function getOrderId()
        {
            return $this->orderId;
        }

        /**
         * This function sets the value for $orderId
         *
         * @param string $orderId
         */
        public function setOrderId($orderId)
        {
            $this->orderId = $orderId;
        }

        /**
         * This function returns all values as Array
         *
         * @return array
         */
        public function toArray()
        {
            $return = array(
                'system-id' => $this->getSystemId(),
                'operation' => $this->getOperation(),
                'credential' => array(
                    'profile-id'   => $this->getProfileId(),
                    'securitycode' => $this->getSecurityCode()
                ),
                'meta' => array(
                    'systems' => array(
                        'system' => array(
                            '@name'    => 'Symfony2 Ratepay Payment Bundle',
                            '@version' => '1.0'
                        )
                    )
                )
            );

            if( null !== $this->getOrderId() ) $return['external']['order-id'] = $this->getOrderId();

            if( null !== $this->getTransactionId() ) $return['transaction-id'] = $this->getTransactionId();

            if( null !== $this->getOperationSubstring())
            {
                $return['operation'] = array(
                    '@subtype' => $this->getOperationSubstring(),
                    $this->getOperation()
                );
            }

            return $return;
        }

    }
