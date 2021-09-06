<?php

namespace ContainerXX5A2As;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Authentication_RetryEntryPointService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'security.authentication.retry_entry_point' shared service.
     *
     * @return \Symfony\Component\Security\Http\EntryPoint\RetryAuthenticationEntryPoint
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/EntryPoint/AuthenticationEntryPointInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/EntryPoint/RetryAuthenticationEntryPoint.php';

        $a = ($container->privates['router.request_context'] ?? $container->getRouter_RequestContextService());

        return $container->privates['security.authentication.retry_entry_point'] = new \Symfony\Component\Security\Http\EntryPoint\RetryAuthenticationEntryPoint($a->getHttpPort(), $a->getHttpsPort());
    }
}
