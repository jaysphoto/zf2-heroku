<?php

namespace Hypem;

use Zend\Module\Manager,
    Zend\EventManager\StaticEventManager,
    Zend\Module\Consumer\AutoloaderProvider;

class Module implements AutoloaderProvider
{
    public function init(Manager $moduleManager)
    {
        $events = StaticEventManager::getInstance();
        $events->attach('bootstrap', 'bootstrap', array($this, 'onBootstrap'));
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function onBootstrap(\Zend\EventManager\Event $e)
    {
        $app          = $e->getParam('application');
				/* @var $app \Zend\Mvc\Application */
				
        $basePath     = $app->getRequest()->getBasePath() . '/sandbox/';

				$locator      = $app->getLocator();
        $renderer     = $locator->get('Zend\View\Renderer\PhpRenderer');
        $renderer->plugin('basePath')->setBasePath($basePath);
				
				//$view         = $locator->get('Zend\View\View');
        //$jsonStrategy = $locator->get('Zend\View\Strategy\JsonStrategy');
        //$view->events()->attach($jsonStrategy, 100);  
    }
}