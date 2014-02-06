<?php

    namespace Ratepay\Bundle\PaymentBundle\Model\Submodel;

    use Ratepay\Bundle\PaymentBundle\Model\ModelInterface;
    use Ratepay\Bundle\PaymentBundle\Model\Submodel\Address;
    use Ratepay\Bundle\PaymentBundle\Model\Submodel\BankAccount;

    class Customer implements ModelInterface
    {

        /**
         * @var string
         */
        private $firstName;

        /**
         * @var string
         */
        private $lastName;

        /**
         * @var string
         */
        private $salutation;

        /**
         * @var string
         */
        private $gender;

        /**
         * @var string
         */
        private $dateOfBirth;

        /**
         * @var string
         */
        private $companyName;

        /**
         *
         * @var string
         */
        private $vatId;

        /**
         * @var string
         */
        private $email;

        /**
         * @var string
         */
        private $phone;

        /**
         * @var Address
         */
        private $billingAddresses;

        /**
         * @var Address
         */
        private $shippingAddresses;

        /**
         * @var BankAccount
         */
        private $bankAccount;

        /**
         * @var string
         */
        private $nationality;

        /**
         * @var string
         */
        private $ipAddress;

        public function __construct()
        {
            $this->companyName = null;
            $this->bankAccount = null;
        }

        /**
         * This function returns the value of $firstName
         *
         * @return string
         */
        public function getFirstName()
        {
            return $this->firstName;
        }

        /**
         * This function sets the value for $firstName
         *
         * @param string $firstName
         */
        public function setFirstName($firstName)
        {
            $this->firstName = $firstName;
        }

        /**
         * This function returns the value of $lastName
         *
         * @return string
         */
        public function getLastName()
        {
            return $this->lastName;
        }

        /**
         * This function sets the value for $lastName
         *
         * @param string $lastName
         */
        public function setLastName($lastName)
        {
            $this->lastName = $lastName;
        }

        /**
         * This function returns the value of $salutation
         *
         * @return string
         */
        public function getSalutation()
        {
            return $this->salutation;
        }

        /**
         * This function sets the value for $salutation
         *
         * @param string $salutation
         */
        public function setSalutation($salutation)
        {
            $this->salutation = $salutation;
        }

        /**
         * This function returns the value of $gender
         *
         * @return string
         */
        public function getGender()
        {
            return $this->gender;
        }

        /**
         * This function sets the value for $gender
         *
         * @param string $gender
         */
        public function setGender($gender)
        {
            $this->gender = $gender;
        }

        /**
         * This function returns the value of $dateOfBirth
         *
         * @return string
         */
        public function getDateOfBirth()
        {
            return $this->dateOfBirth;
        }

        /**
         * This function sets the value for $dateOfBirth
         *
         * @param string $dateOfBirth
         */
        public function setDateOfBirth($dateOfBirth)
        {
            $this->dateOfBirth = $dateOfBirth;
        }

        /**
         * This function returns the value of $companyName
         *
         * @return string
         */
        public function getCompanyName()
        {
            return $this->companyName;
        }

        /**
         * This function sets the value for $companyName
         *
         * @param string $companyName
         */
        public function setCompanyName($companyName)
        {
            $this->companyName = $companyName;
        }

        /**
         * This function returns the value of $email
         *
         * @return string
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * This function sets the value for $email
         *
         * @param string $email
         */
        public function setEmail($email)
        {
            $this->email = $email;
        }

        /**
         * This function returns the value of $phone
         *
         * @return string
         */
        public function getPhone()
        {
            return $this->phone;
        }

        /**
         * This function sets the value for $phone
         *
         * @param string $phone
         */
        public function setPhone($phone)
        {
            $this->phone = $phone;
        }

        /**
         * This function returns the value of $billingAddresses
         *
         * @return Address
         */
        public function getBillingAddresses()
        {
            return $this->billingAddresses;
        }

        /**
         * This function sets the value for $billingAddresses
         *
         * @param Address $billingAddresses
         */
        public function setBillingAddresses(Address $billingAddresses)
        {
            $this->billingAddresses = $billingAddresses;
        }

        /**
         * This function returns the value of $shippingAddresses
         *
         * @return Address
         */
        public function getShippingAddresses()
        {
            return $this->shippingAddresses;
        }

        /**
         * This function sets the value for $shippingAddresses
         *
         * @param Address $shippingAddresses
         */
        public function setShippingAddresses(Address $shippingAddresses)
        {
            $this->shippingAddresses = $shippingAddresses;
        }

        /**
         * This function returns the value of $bankAccount
         *
         * @return BankAccount
         */
        public function getBankAccount()
        {
            return $this->bankAccount;
        }

        /**
         * This function sets the value for $bankAccount
         *
         * @param BankAccount $bankAccount
         */
        public function setBankAccount(BankAccount $bankAccount)
        {
            $this->bankAccount = $bankAccount;
        }

        /**
         * This function returns the value of $nationality
         *
         * @return string
         */
        public function getNationality()
        {
            return $this->nationality;
        }

        /**
         * This function sets the value for $nationality
         *
         * @param string $nationality
         */
        public function setNationality($nationality)
        {
            $this->nationality = $nationality;
        }

        /**
         * This function returns the value of $vatId
         *
         * @return string
         */
        public function getVatId()
        {
            return $this->vatId;
        }

        /**
         * This function sets the value for $vatId
         *
         * @param string $vatId
         */
        public function setVatId($vatId)
        {
            $this->vatId = $vatId;
        }

        /**
         * This function returns the value of $ipAddress
         *
         * @return string
         */
        public function getIpAddress()
        {
            return $this->ipAddress;
        }

        /**
         * This function sets the value for $ipAddress
         *
         * @param string $ipAddress
         */
        public function setIpAddress($ipAddress)
        {
            $this->ipAddress = $ipAddress;
        }


        /**
         * This function returns all values as Array
         *
         * @return array
         */
        public function toArray()
        {
            $return = array(
                'first-name'    => $this->getFirstName(),
                'last-name'     => $this->getLastName(),
                'salutation'    => $this->getSalutation(),
                'gender'        => $this->getGender(),
                'date-of-birth' => $this->getDateOfBirth(),
                'contacts' => array(
                    'email' => $this->getEmail(),
                    'phone' => array(
                        'direct-dial' => $this->getPhone()
                    )
                ),
                'addresses' => array(
                    0 => array(
                        'address' => $this->getBillingAddresses()->toArray(),
                    ),
                    1 => array(
                        'address' => $this->getShippingAddresses()->toArray(),
                    )
                ),
                'customer-allow-credit-inquiry' => 'yes'
            );

            if (null !== $this->companyName && null !== $this->vatId) {
                $return['company-name'] = $this->getCompanyName();
                $return['vat-id'] = $this->getVatId();
            }
            if (null !== $this->bankAccount) {
                $return['bank-account'] = $this->getBankAccount()->toArray();
            }
            if (null !== $this->ipAddress) {
                $return['ip-address'] = $this->getIpAddress();
            }
            return $return;
        }

    }
