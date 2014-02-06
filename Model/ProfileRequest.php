<?php

    namespace Ratepay\Bundle\PaymentBundle\Model;

    use Ratepay\Bundle\PaymentBundle\Model\Submodel\Head;

    class ProfileRequest implements ModelInterface
    {

        /**
         * @var Head
         */
        private $head;

        /**
         * This function returns the value of $head
         *
         * @returnHead
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
         * This function returns all values as Array
         *
         * @return array
         */
        public function toArray()
        {
            return array(
                '@version'  => '1.0',
                '@xmlns'    => "urn://www.ratepay.com/payment/1_0",
                'head'      => $this->getHead()->toArray()
            );
        }

    }
