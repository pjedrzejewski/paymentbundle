<?php

    namespace Ratepay\Bundle\PaymentBundle\Model;

    use Ratepay\Bundle\PaymentBundle\Model\Submodel\Head;
    use Ratepay\Bundle\PaymentBundle\Model\Submodel\Customer;
    use Ratepay\Bundle\PaymentBundle\Model\Submodel\ShoppingBasket;
    use Ratepay\Bundle\PaymentBundle\Model\Submodel\Payment;

    class PaymentChange implements ModelInterface
    {

        /**
         * @var Head
         */
        private $head;

        /**
         * @var Customer
         */
        private $customer;

        /**
         * @var ShoppingBasket
         */
        private $shoppingBasket;

        /**
         * @var Payment
         */
        private $payment;

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
         * This function sets the value for $customer
         *
         * @return Customer
         */
        public function getCustomer()
        {
            return $this->customer;
        }

        /**
         * This function returns the value of $customer
         *
         * @param Customer $customer
         */
        public function setCustomer(Customer $customer)
        {
            $this->customer = $customer;
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
         * This function returns the value of $payment
         *
         * @return Payment
         */
        public function getPayment()
        {
            return $this->payment;
        }

        /**
         * This function sets the value for $payment
         *
         * @param Payment $payment
         */
        public function setPayment(Payment $payment)
        {
            $this->payment = $payment;
        }

        /**
         * This function returns all values as Array
         *
         * @return array
         */
        public function toArray()
        {
            return array(
                '@version'  => '1.0',
                '@xmlns'    => "urn://www.ratepay.com/payment/1_0",
                'head'      => $this->getHead()->toArray(),
                'content' => array(
                    'customer'        => $this->getCustomer()->toArray(),
                    'shopping-basket' => $this->getShoppingBasket()->toArray(),
                    'payment'         => $this->getPayment()->toArray()
                )
            );
        }

    }
