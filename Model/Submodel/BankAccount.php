<?php
    namespace Ratepay\Bundle\PaymentBundle\Model\Submodel;

    use Ratepay\Bundle\PaymentBundle\Model\ModelInterface;

    class BankAccount implements ModelInterface
    {

        /**
         * @var string
         */
        private $owner;

        /**
         * @var string
         */
        private $bankAccountNumber;

        /**
         * @var string
         */
        private $bankCode;

        /**
         * @var string
         */
        private $bankName;

        /**
         * This function returns the value of $owner
         *
         * @return string
         */
        public function getOwner()
        {
            return $this->owner;
        }

        /**
         * This function sets the value for $owner
         *
         * @param string $owner
         */
        public function setOwner($owner)
        {
            $this->owner = $owner;
        }

        /**
         * This function returns the value of $bankAccount
         *
         * @return string
         */
        public function getBankAccount()
        {
            return $this->bankAccountNumber;
        }

        /**
         * This function sets the value for $bankAccount
         *
         * @param string $bankAccount
         */
        public function setBankAccount($bankAccountNumber)
        {
            $this->bankAccountNumber = $bankAccountNumber;
        }

        /**
         * This function returns the value of $bankCode
         *
         * @return string
         */
        public function getBankCode()
        {
            return $this->bankCode;
        }

        /**
         * This function sets the value for $bankCode
         *
         * @param string $bankCode
         */
        public function setBankCode($bankCode)
        {
            $this->bankCode = $bankCode;
        }

        /**
         * This function returns the value of $bankName
         *
         * @return string
         */
        public function getBankName()
        {
            return $this->bankName;
        }

        /**
         * This function sets the value for $bankName
         *
         * @param string $bankName
         */
        public function setBankName($bankName)
        {
            $this->bankName = $bankName;
        }

        /**
         * This function returns all values as Array
         * This contains a quickfix for sepa transactions
         *
         * @toDo: real implementation for sepa elv
         *
         * @return array
         */
        public function toArray()
        {

            if(false !== strpos(strtolower($this->getBankAccount()), 'de')) {
                return array(
                    'owner'     => $this->getOwner(),
                    'bank-name' => $this->getBankName(),
                    'iban'      => $this->getBankAccount()
                );
            }

            return array(
                'owner'               => $this->getOwner(),
                'bank-account-number' => $this->getBankAccount(),
                'bank-code'           => $this->getBankCode(),
                'bank-name'           => $this->getBankName()
            );
        }

    }
