<?php

namespace Ratepay\Bundle\PaymentBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class RatepayPaymentExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        //set credentials and gateway
        if(true === $config['sandbox'])
        {
            $container->setParameter('ratepay_payment.profile_id', $config['credentials']['test']['profile_id']);
            $container->setParameter('ratepay_payment.security_code', $config['credentials']['test']['security_code']);
            $container->setParameter('ratepay_payment.api_url', 'https://webservices-int.eos-payment.com/custom/ratepay/xml/1_0');
        }
        else
        {
            $container->setParameter('ratepay_payment.profile_id', $config['credentials']['production']['profile_id']);
            $container->setParameter('ratepay_payment.security_code', $config['credentials']['production']['security_code']);
            $container->setParameter('ratepay_payment.api_url', 'https://webservices.eos-payment.com/custom/ratepay/xml/1_0');
        }

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }

    public function getAlias()
    {
        return 'ratepay_payment';
    }
}
