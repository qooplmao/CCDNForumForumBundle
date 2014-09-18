<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CCDNForum\ForumBundle\DependencyInjection\Compiler;

use CCDNForum\ForumBundle\DependencyInjection\DoctrineTargetEntitiesResolver;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Resolves given target entities with container parameters.
 * Usable only with *doctrine/orm* driver.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@sylius.pl>
 */
class ResolveDoctrineTargetEntitiesPass implements CompilerPassInterface
{
    /**
     * @var array $interfaces
     */
    private $interfaces;

    /**
     * @var string $bundlePrefix
     */
    private $bundlePrefix;

    public function __construct($bundlePrefix, array $interfaces)
    {
        $this->bundlePrefix = $bundlePrefix;
        $this->interfaces = $interfaces;
    }

    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        $resolver = new DoctrineTargetEntitiesResolver();
        $resolver->resolve($container, $this->interfaces);
    }
}