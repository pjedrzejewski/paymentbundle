<?php

namespace Ratepay\Bundle\PaymentBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ratepay_payment');

        $rootNode
            ->children()

                ->arrayNode('credentials')
                    ->isRequired()
                    ->children()

                        ->arrayNode('production')
                        ->isRequired()
                            ->children()
                                ->scalarNode('profile_id')
                                    ->isRequired()
                                    ->cannotBeEmpty()
                                    ->info('Set the profile id for production environment.')
                                    ->end()
                                ->scalarNode('security_code')
                                    ->isRequired()
                                    ->cannotBeEmpty()
                                    ->info('Set the security code for production environment.')
                                    ->end()
                            ->end()
                        ->end()

                        ->arrayNode('test')
                        ->isRequired()
                            ->children()
                                ->scalarNode('profile_id')
                                    ->isRequired()
                                    ->cannotBeEmpty()
                                    ->info('Set the profile id for test environment.')
                                    ->end()
                                ->scalarNode('security_code')
                                    ->isRequired()
                                    ->cannotBeEmpty()
                                    ->info('Set the security code for test environment.')
                                    ->end()
                            ->end()
                        ->end()

                    ->end()
                ->end()
                ->booleanNode('sandbox')
                    ->defaultTrue()
                    ->info('Set either to true or false for sandbox or production mode. Default is set to true.')
                    ->end()
            ->end();

        return $treeBuilder;
    }
}
