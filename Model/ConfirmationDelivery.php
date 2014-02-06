<?php

    namespace Ratepay\Bundle\PaymentBundle\Model;

    use Ratepay\Bundle\PaymentBundle\Model\Submodel\Head;
    use Ratepay\Bundle\PaymentBundle\Model\Submodel\ShoppingBasket;

    class ConfirmationDelivery implements ModelInterface
    {

        /**
         * @var Head
         */
        private $head;

        /**
         * @var ShoppingBasket
         */
        private $shoppingBasket;

        /**
         * This function returns the value of $head
         *
         * @return Head
         */
        public function getHead()
        {
            return $this->head;
        }

        /**
         * This function sets the value for $head
         *
         * @param Head $head
         */
        public function setHead(Head $head)
        {
            $this->head = $head;
        }

        /**
         * This function returns the value of $shoppingBasket
         *
         * @return ShoppingBasket
         */
        public function getShoppingBasket()
        {
            return $this->shoppingBasket;
        }

        /**
         * This function sets the value for $shoppingBasket
         *
         * @param ShoppingBasket $shoppingBasket
         */
        public function setShoppingBasket(ShoppingBasket $shoppingBasket)
        {
            $this->shoppingBasket = $shoppingBasket;
        }

        /**
         * This function returns all values as Array
         *
         * @return array
         */
        public function toArray()
        {
            return array(
                '@version' => '1.0',
                '@xmlns'   => "urn://www.ratepay.com/payment/1_0",
                'head'     => $this->getHead()->toArray(),
                'content'  => array(
                    'shopping-basket' => $this->getShoppingBasket()->toArray()
                )
            );
        }

    }
