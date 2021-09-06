<?php

namespace ContainerUf6hmb7;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_MeJ8mi7Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.meJ8mi7' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.meJ8mi7'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'slugger' => ['privates', 'App\\Service\\MySlugger', 'getMySluggerService', true],
        ], [
            'slugger' => 'App\\Service\\MySlugger',
        ]);
    }
}
