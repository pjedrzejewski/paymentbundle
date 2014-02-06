# RatepayPaymentBundle

This bundle provides basic services to interact with the ratepay api

``` php
<?php
class TestController extends Controller
{
    /**
     * This actions show how to send an payment init against the ratepay api
     */
    public function PaymentInitAction()
    {

        //init head model
        $head = $this->get('ratepay_payment.model.submodel.head');

        //set operation
        $head->setOperation('PAYMENT_INIT');

        //get credentials and correct api url out of container based on your configuration
        $head->setProfileId($this->container->getParameter('ratepay_payment.profile_id'));
        $head->setSecurityCode($this->container->getParameter('ratepay_payment.security_code'));

        //get api url, you need to send the xml against this url
        $apiUrl = $this->container->getParameter('ratepay_payment.api_url');

        $head->setSystemId($_SERVER['SERVER_ADDR']);


        $head->setSystemVersion('1.0');

        $paymentInit = $this->get('ratepay_payment.model.paymentinit');
        $paymentInit->setHead($head);

        //get utils
        $util = $this->get('ratepay_payment.service.util');

        /**
         * Convert the PaymentInit model to a sendable xml.
         * If you send this generate xml $xml against the corrent api $apiUrl ( there are integrations and production gateways )
         * you will get a response with an transaction id. You can easily parse this response and use it for further operations.
         */
        $xml = $util->convertToXml($paymentInit->toArray(), 'request')->asXML();


        return new Response(var_dump($xml));


    }
}
```

Installation
------
### Add the package to your dependencies

``` yaml
"require": {
    "ratepay/payment-bundle": "dev-master",
    ....
},
```

### Register the bundle in your kernel

``` php
public function registerBundles()
{
    $bundles = array(
    // ...
    new Ratepay\Bundle\PaymentBundle\RatepayPaymentBundle(),
);
```

### Update your packages

```
php composer.phar update ratepay/payment-bundle
```

Configuration
------
``` yaml
#app/config/config.yml
ratepay_payment:
    sandbox: true #default is set to true
    credentials:
        production:
            profile_id: RatePAY-Prod
            security_code: someFancySecurityCode
        test:
            profile_id: RatePAY-Test
            security_code: 818b8d1351cb9098f293308f0b8f9dfb
```

Configuration
------
For listing all available models and tools please run:

``` shell
php app/console container:debug | grep ratepay
```




