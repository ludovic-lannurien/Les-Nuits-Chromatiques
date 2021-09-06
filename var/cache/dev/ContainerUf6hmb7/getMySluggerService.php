<?php

namespace ContainerUf6hmb7;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMySluggerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Service\MySlugger' shared autowired service.
     *
     * @return \App\Service\MySlugger
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Service/MySlugger.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/string/Slugger/SluggerInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/string/Slugger/AsciiSlugger.php';

        return $container->privates['App\\Service\\MySlugger'] = new \App\Service\MySlugger(($container->privates['slugger'] ?? ($container->privates['slugger'] = new \Symfony\Component\String\Slugger\AsciiSlugger('fr'))), $container->getEnv('bool:SLUGGER_TO_LOWER'));
    }
}
