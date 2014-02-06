<?php

    namespace Ratepay\Bundle\PaymentBundle\Model\Submodel;

    use Ratepay\Bundle\PaymentBundle\Model\ModelInterface;

    class Item implements ModelInterface
    {

        /**
         * @var string
         */
        private $articleNumber;

        /**
         * @var string
         */
        private $articleName;

        /**
         * @var string
         */
        private $quantity;

        /**
         * @var string
         */
        private $taxRate;

        /**
         * @var string
         */
        private $unitPriceGross;

        /**
         * This function returns the value of $articleName
         *
         * @return string
         */
        public function getArticleName()
        {
            return $this->articleName;
        }

        /**
         * This function sets the value for $articleName
         *
         * @param string $articleName
         */
        public function setArticleName($articleName)
        {
            $this->articleName = $articleName;
        }

        /**
         * This function returns the value of $articleName
         *
         * @return string
         */
        public function getArticleNumber()
        {
            return $this->articleNumber;
        }

        /**
         * This function sets the value for $articleNumber
         *
         * @param string $articleNumber
         */
        public function setArticleNumber($articleNumber)
        {
            $this->articleNumber = $articleNumber;
        }

        /**
         * This function returns the value of $quantity
         *
         * @return string
         */
        public function getQuantity()
        {
            return $this->quantity;
        }

        /**
         * This function sets the value for $quantity
         *
         * @param string $quantity
         */
        public function setQuantity($quantity)
        {
            $this->quantity = $quantity;
        }

        /**
         * This function returns the value of $taxRate
         *
         * @return string
         */
        public function getTaxRate()
        {
            return $this->taxRate;
        }

        /**
         * This function sets the value for $taxRate
         *
         * @param string $taxRate
         */
        public function setTaxRate($taxRate)
        {
            $this->taxRate = number_format((float)$taxRate, 2, '.', '');
        }

        /**
         * This function returns the value of $unitPriceGross
         *
         * @return string
         */
        public function getUnitPriceGross()
        {
            return $this->unitPriceGross;
        }

        /**
         * This function sets the value for $unitPriceGross
         *
         * @param string $unitPriceGross
         */
        public function setUnitPriceGross($unitPriceGross)
        {
            $this->unitPriceGross = number_format((float)$unitPriceGross, 2, '.', '');
        }

        /**
         * This function returns all values as Array
         *
         * @return array
         */
        public function toArray()
        {
            return array(
                '%item' => array(
                    '@article-number'   => $this->getArticleNumber(),
                    '@quantity'         => $this->getQuantity(),
                    '@tax-rate'         => $this->getTaxRate(),
                    '@unit-price-gross' => $this->getUnitPriceGross(),
                    '#'                 => $this->getArticleName()
                )
            );
        }

    }
