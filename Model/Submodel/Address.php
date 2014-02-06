<?php

    namespace Ratepay\Bundle\PaymentBundle\Model\Submodel;

    use Ratepay\Bundle\PaymentBundle\Model\ModelInterface;

    class Address implements ModelInterface
    {

        /**
         * @var string
         */
        private $street;

        /**
         * @var string
         */
        private $streetNumber;

        /**
         * @var string
         */
        private $zipCode;

        /**
         * @var string
         */
        private $city;

        /**
         * @var string
         */
        private $countryCode;

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
        private $company;

        /**
         * @var string
         */
        private $type;

        /**
         * This function returns the value of $type
         *
         * @return string
         */
        public function getType()
        {
            return $this->type;
        }

        /**
         * This function sets the value for $type
         *
         * @param string $type
         */
        public function setType($type)
        {
            $this->type = $type;
        }

        /**
         * This function returns the value of $street
         *
         * @return string
         */
        public function getStreet()
        {
            return $this->street;
        }

        /**
         * This function sets the value for $street
         *
         * @param string $street
         */
        public function setStreet($street)
        {
            $this->street = $street;
        }

        /**
         * This function returns the value of $streetNumber
         *
         * @return string
         */
        public function getStreetNumber()
        {
            return $this->streetNumber;
        }

        /**
         * This function sets the value for $streetNumber
         *
         * @param string $streetNumber
         */
        public function setStreetNumber($streetNumber)
        {
            $this->streetNumber = (string)$streetNumber;
        }

        /**
         * This function returns the value of $zipCode
         *
         * @return string
         */
        public function getZipCode()
        {
            return $this->zipCode;
        }

        /**
         * This function sets the value for $zipCode
         *
         * @param string $zipCode
         */
        public function setZipCode($zipCode)
        {
            $this->zipCode = (string)$zipCode;
        }

        /**
         * This function returns the value of $city
         *
         * @return string
         */
        public function getCity()
        {
            return $this->city;
        }

        /**
         * This function sets the value for $city
         *
         * @param string $city
         */
        public function setCity($city)
        {
            $this->city = $city;
        }

        /**
         * This function returns the value of $countryCode
         *
         * @return string
         */
        public function getCountryCode()
        {
            return $this->countryCode;
        }

        /**
         * This function sets the value for $countryCode
         *
         * @param string $countryCode
         */
        public function setCountryCode($countryCode)
        {
            $this->countryCode = $countryCode;
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
         * This function returns the value of $company
         *
         * @return string
         */
        public function getCompany()
        {
            return $this->company;
        }

        /**
         * This function sets the value for $company
         *
         * @param string $company
         */
        public function setCompany($company)
        {
            $this->company = $company;
        }

        /**
         * This function returns all values as Array
         *
         * @return array
         */
        public function toArray()
        {
            $return = array(
                '@type'         => $this->getType(),
                '%street'       => $this->getStreet(),
                'street-number' => $this->getStreetNumber(),
                'zip-code'      => $this->getZipCode(),
                '%city'         => $this->getCity(),
                'country-code'  => $this->getCountryCode()
            );

            if ($this->getType() === 'DELIVERY') {
                $return['first-name'] = $this->getFirstName();
                $return['last-name']  = $this->getLastName();
                $return['salutation'] = $this->getSalutation();
                if (isset($this->company)) {
                    $return['company'] = $this->getCompany();
                }
            }
            return $return;
        }

    }
