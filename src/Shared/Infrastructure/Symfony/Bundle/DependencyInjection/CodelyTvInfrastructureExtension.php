<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Shared\Infrastructure\Symfony\Bundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

final class KetoFoodDbApiInfrastructureExtension extends Extension
{
    public function load(array $config, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/Resources'));

        $loader->load('infrastructure_extension.yml');
        $loader->load(sprintf('infrastructure_config_%s.yml', $container->getParameter('kernel.environment')));
    }
}
