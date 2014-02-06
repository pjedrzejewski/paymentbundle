<?php

    namespace Ratepay\Bundle\PaymentBundle\Model\Submodel;

    use Ratepay\Bundle\PaymentBundle\Model\ModelInterface;

    class ShoppingBasket implements ModelInterface
    {

        /**
         * @var string
         */
        private $amount;

        /**
         * @var string
         */
        private $currency;

        /**
         * @var array
         */
        private $items;

        /**
         * This function returns the value of $amount
         *
         * @return string
         */
        public function getAmount() {
            return $this->amount;
        }

        /**
         * This function sets the value for $amount
         *
         * @param string $amount
         */
        public function setAmount($amount) {
            $this->_amount = number_format((float)$amount, 2, '.', '');;
        }

        /**
         * This function returns the value of $currency
         *
         * @return string
         */
        public function getCurrency() {
            return $this->currency;
        }

        /**
         * This function sets the value for $currency
         *
         * @param string $currency
         */
        public function setCurrency($currency) {
            $this->currency = $currency;
        }

        /**
         * This function returns the value of $items
         *
         * @return array
         */
        public function getItems() {
            return $this->items;
        }

        /**
         * This function sets the value for $items
         *
         * @param array $items
         */
        public function setItems(array $items) {
            $this->items = $items;
        }

        /**
         * This function returns all values as Array
         *
         * @return array
         */
        public function toArray() {
            $return = array(
                '@amount' => $this->getAmount(),
                '@currency' => $this->getCurrency()
            );
            foreach($this->getItems() as $item){
                $return['items'][] = $item->toArray();
            }
            return $return;
        }

    }
