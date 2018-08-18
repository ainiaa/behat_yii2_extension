<?php

/*
 * This file is part of the Behat\YiiXExtension
 *
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Behat\YiiXExtension;

use Behat\Testwork\ServiceContainer\Extension as ExtensionInterface;
use Behat\Testwork\ServiceContainer\ExtensionManager;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * Yii extension for Behat class.
 *
 * @author Jeff Liu <jeff.liu.guo@gmail.com>
 */
class Extension implements ExtensionInterface
{

    /**
     * Loads a specific configuration.
     *
     * @param array            $config    Extension configuration hash (from behat.yml)
     * @param ContainerBuilder $container ContainerBuilder instance
     */
    public function load(ContainerBuilder $container, array $config)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/services'));
        $loader->load('yiix.xml');
        $basePath = $container->getParameter('behat.paths.base');

        $extensions = $container->getParameter('behat.extension.classes');

        if (!isset($config['framework_script']))
        {
            throw new \InvalidArgumentException('Specify `framework_script` parameter for yiix_extension.');
        }
        if (file_exists($cfg = $basePath . DIRECTORY_SEPARATOR . $config['framework_script']))
        {
            $config['framework_script'] = $cfg;
        }
        $container->setParameter('behat.yiix_extension.framework_script', $config['framework_script']);

        if (!isset($config['config_script']))
        {
            throw new \InvalidArgumentException('Specify `config_script` parameter for yiix_extension.');
        }
        if (file_exists($cfg = $basePath . DIRECTORY_SEPARATOR . $config['config_script']))
        {
            $config['config_script'] = $cfg;
        }
        $container->setParameter('behat.yiix_extension.config_script', $config['config_script']);

        if (!isset($config['application_class_name']))
        {
            throw new \InvalidArgumentException('Specify `application_class_name` parameter for yiix_extension.');
        }
        $container->setParameter('behat.yiix_extension.application_class_name', $config['application_class_name']);

    }

    /**
     * You can modify the container here before it is dumped to PHP code.
     */
    public function process(ContainerBuilder $container)
    {
    }

    /**
     * Returns the extension config key.
     *
     * @return string
     */
    public function getConfigKey()
    {
        return 'yiix';
    }

    /**
     * Initializes other extensions.
     *
     * This method is called immediately after all extensions are activated but
     * before any extension `configure()` method is called. This allows extensions
     * to hook into the configuration of other extensions providing such an
     * extension point.
     *
     * @param ExtensionManager $extensionManager
     */
    public function initialize(ExtensionManager $extensionManager)
    {
    }

    /**
     * Setups configuration for the extension.
     *
     * @param ArrayNodeDefinition $builder
     */
    public function configure(ArrayNodeDefinition $builder)
    {
        $builder->children()->scalarNode('framework_script')->isRequired()->end()->scalarNode('config_script')->isRequired()->end()->scalarNode('application_class_name')->isRequired()->end()->end();
    }
}
