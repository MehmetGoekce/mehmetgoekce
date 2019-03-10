<?php

declare(strict_types=1);

namespace Blog;

/**
 * The configuration provider for the Blog module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     */
    public function __invoke() : array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'doctrine'     => $this->getDoctrine(),
            'templates'    => $this->getTemplates(),
        ];
    }

    public function getDoctrine() : array
    {
        return [
            'driver' => [
                'orm-default' => [
                    'drivers' => [
                        'Blog\Entity' => 'blog_entity',
                    ],
                ],
                'blog_entity' => [
                    'class' => \Doctrine\ORM\Mapping\Driver\SimplifiedYamlDriver::class,
                    'cache' => 'array',
                    'paths' => [
                        dirname(__DIR__) . '/config/doctrine' => 'Blog\Entity',
                    ],
                ],
            ],

        ];
    }

    /**
     * Returns the container dependencies
     */
    public function getDependencies() : array
    {
        return [
            'invokables' => [
            ],
            'factories'  => [
            ],
        ];
    }

    /**
     * Returns the templates configuration
     */
    public function getTemplates() : array
    {
        return [
            'paths' => [
                'blog'    => [__DIR__ . '/../templates/'],
            ],
        ];
    }
}
