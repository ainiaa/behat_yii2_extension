<?php

/*
 * This file is part of the Behat\YiiExtension
 *
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Behat\YiiXExtension\Context\Initializer;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\Initializer\ContextInitializer;
use Behat\YiiXExtension\Context\YiiXAwareContext;

/**
 * Yii aware contexts initializer.
 * Sets Yii web app instance to the YiiAware contexts.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
class YiiXAwareInitializer implements ContextInitializer
{
    private $config;
    private $application;

    /**
     * Initializes initializer.
     *
     * @param $frameworkScript
     * @param $configScript
     */
    public function __construct($frameworkScript, $configScript, $application)
    {
        defined('YII_DEBUG') or define('YII_DEBUG', true);
        require_once($frameworkScript);
        $config = [];
        if ($configScript)
        {
            foreach ($configScript as $script)
            {
                $currentConfig = include $script;
                $config        = array_merge($config, $currentConfig);
            }
        }
        $this->config      = $config;
        $this->application = new $application($configScript);
        if (method_exists($this->application, 'init'))
        {
            $this->application->init();
        }
        // create the application and remember it
    }


    /**
     * Initializes provided context.
     *
     * @param Context $context
     */
    public function initializeContext(Context $context)
    {
        if (!$context instanceof YiiXAwareContext)
        {
            return;
        }

        $context->setApplication($this->application);
        $context->setConfig($this->config);
    }
}
