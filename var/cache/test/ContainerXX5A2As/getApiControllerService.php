<?php

namespace ContainerXX5A2As;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiControllerService extends App_KernelTestDebugContainer
{
    /**
     * Gets the public 'App\Controller\Api\ApiController' shared autowired service.
     *
     * @return \App\Controller\Api\ApiController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/Api/ApiController.php';

        $container->services['App\\Controller\\Api\\ApiController'] = $instance = new \App\Controller\Api\ApiController();

        $instance->setContainer(($container->privates['.service_locator.W9y3dzm'] ?? $container->load('get_ServiceLocator_W9y3dzmService'))->withContext('App\\Controller\\Api\\ApiController', $container));

        return $instance;
    }
}
