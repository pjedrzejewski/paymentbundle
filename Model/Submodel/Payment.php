<?php

    namespace Ratepay\Bundle\PaymentBundle\Model\Submodel;

    use Ratepay\Bundle\PaymentBundle\Model\ModelInterface;

    class Payment implements ModelInterface
    {

        /**
         * @var string
         */
        private $method;

        /**
         * @var string
         */
        private $currency;

        /**
         * @var float
         */
        private $amount;

        /**
         * @var integer
         */
        private $installmentNumber;

        /**
         * @var float
         */
        private $installmentAmount;

        /**
         * @var float
         */
        private $lastInstallmentAmount;

        /**
         * @var float
         */
        private $interestRate;

        /**
         * @var integer
         */
        private $paymentFirstday;

        /**
         * @var string
         */
        private $directPayType;

        /**
         * This function returns the value of $method
         *
         * @return string
         */
        public function getMethod()
        {
            return $this->method;
        }

        /**
         * This function sets the value for $method
         *
         * @param string $method
         */
        public function setMethod($method)
        {
            $this->method = $method;
        }

        /**
         * This function returns the value of $currency
         *
         * @return string
         */
        public function getCurrency()
        {
            return $this->currency;
        }

        /**
         * This function sets the value for $currency
         *
         * @param string $currency
         */
        public function setCurrency($currency)
        {
            $this->currency = $currency;
        }

        /**
         * This function returns the value of $amount
         *
         * @return string
         */
        public function getAmount()
        {
            return $this->amount;
        }

        /**
         * This function sets the value for $amount
         *
         * @param string $amount
         */
        public function setAmount($amount)
        {
            $this->amount = number_format((float)$amount, 2, '.', '');
        }

        /**
         * This function returns the value of $installmentNumber
         *
         * @return string
         */
        public function getInstallmentNumber()
        {
            return $this->installmentNumber;
        }

        /**
         * This function sets the value for $installmentNumber
         *
         * @param string $installmentNumber
         */
        public function setInstallmentNumber($installmentNumber)
        {
            $this->installmentNumber = $installmentNumber;
        }

        /**
         * This function returns the value of $installmentAmount
         *
         * @return string
         */
        public function getInstallmentAmount()
        {
            return $this->installmentAmount;
        }

        /**
         * This function sets the value for $installmentAmount
         *
         * @param string $installmentAmount
         */
        public function setInstallmentAmount($installmentAmount)
        {
            $this->installmentAmount = $installmentAmount;
        }

        /**
         * This function returns the value of $lastInstallmentAmount
         *
         * @return string
         */
        public function getLastInstallmentAmount()
        {
            return $this->lastInstallmentAmount;
        }

        /**
         * This function sets the value for $lastInstallmentAmount
         *
         * @param string $lastInstallmentAmount
         */
        public function setLastInstallmentAmount($lastInstallmentAmount)
        {
            $this->lastInstallmentAmount = $lastInstallmentAmount;
        }

        /**
         * This function returns the value of $interestRate
         *
         * @return string
         */
        public function getInterestRate()
        {
            return $this->interestRate;
        }

        /**
         * This function sets the value for $interestRate
         *
         * @param string $interestRate
         */
        public function setInterestRate($interestRate)
        {
            $this->interestRate = $interestRate;
        }

        /**
         * This function returns the value of $paymentFirstday
         *
         * @return string
         */
        public function getPaymentFirstday()
        {
            return $this->paymentFirstday;
        }

        /**
         * This function sets the value for $paymentFirstday
         *
         * @param string $paymentFirstday
         */
        public function setPaymentFirstday($paymentFirstday)
        {
            $this->paymentFirstday = $paymentFirstday;
        }

        /**
         * This function returns the value of $directPayType
         *
         * @return string
         */
        public function getDirectPayType()
        {
            return $this->directPayType;
        }

        /**
         * This function sets the value for $directPayType
         *
         * @param string $directPayType
         */
        public function setDirectPayType($directPayType)
        {
            $this->directPayType = $directPayType;
        }

        /**
         * This function returns all values as Array
         *
         * @return array
         */
        public function toArray()
        {
            $return = array(
                '@method'   => $this->getMethod(),
                '@currency' => $this->getCurrency(),
                'amount'    => $this->getAmount()
            );
            if ($return['@method'] === 'INSTALLMENT') {
                $return['installment-details'] = array(
                    'installment-number'      => $this->getInstallmentNumber(),
                    'installment-amount'      => $this->getInstallmentAmount(),
                    'last-installment-amount' => $this->getLastInstallmentAmount(),
                    'interest-rate'           => $this->getInterestRate(),
                    'payment-firstday'        => $this->getPaymentFirstday()
                );
                $return['debit-pay-type'] = $this->getDirectPayType();
            }
            return $return;
        }

    }
