<?php

namespace ContainerXX5A2As;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_MXekun_Service extends App_KernelTestDebugContainer
{
    /**
     * Gets the private '.service_locator.mXekun.' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.mXekun.'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'slugger' => ['privates', 'App\\Service\\MySlugger', 'getMySluggerService', true],
        ], [
            'slugger' => 'App\\Service\\MySlugger',
        ]);
    }
}
