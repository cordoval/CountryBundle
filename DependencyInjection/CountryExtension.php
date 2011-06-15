<?php

namespace Bundle\ExerciseCom\CountryBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;


/**
 * Configures the DI container for CountryBundle.
 *
 * @author Luis Cordova <cordoval@gmail.com>
 */
class CountryExtension extends Extension
{
    /**
     * Loads and processes configuration to configure the Container.
     *
     * @throws InvalidArgumentException
     * @param array $configs
     * @param ContainerBuilder $container
     * @return void
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();
        $configuration = new Configuration();

        $config = $processor->process($configuration->getConfigTree(), $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        if (!in_array(strtolower($config['db_driver']), array('mongodb', 'orm'))) {
           throw new \InvalidArgumentException(sprintf('Invalid db driver "%s".', $config['db_driver']));
        }

        $loader->load(sprintf('%s.xml', $config['db_driver']));

        //$container->setParameter('cordova_country.model.country.class', $config['class']['model']['country']);

    }

    /**
     * Returns the base path for the XSD files.
     *
     * @return string The XSD base path
     */
    public function getXsdValidationBasePath()
    {
        return null;
    }

    public function getNamespace()
    {
        return 'http://symfony.com/schema/dic/symfony';
    }

    public function getAlias()
    {
        return 'country';
    }
}
