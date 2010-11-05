<?php

namespace Bundle\BitlyBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class BitlyExtension extends Extension
{

    public function apiLoad($config, ContainerBuilder $container)
    {
        if (! $container->hasDefinition('bitly')) {
            $loader = new XmlFileLoader($container, __DIR__.'/../Resources/config');
            $loader->load('bitly.xml');

            foreach($config as $key => $value) {
                $container->setParameter('bitly.api.'.$key, $value);
            }
        }
    }

    public function getXsdValidationBasePath()
    {
        return null;
    }

    public function getNamespace()
    {
        return 'http://www.symfony-project.org/schema/dic/symfony';
    }

    public function getAlias()
    {
        return 'bitly';
    }

}
