<?php

namespace ContainerXX5A2As;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getConsole_ErrorListenerService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'console.error_listener' shared service.
     *
     * @return \Symfony\Component\Console\EventListener\ErrorListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/EventListener/ErrorListener.php';

        return $container->privates['console.error_listener'] = new \Symfony\Component\Console\EventListener\ErrorListener(($container->privates['monolog.logger.console'] ?? $container->load('getMonolog_Logger_ConsoleService')));
    }
}
