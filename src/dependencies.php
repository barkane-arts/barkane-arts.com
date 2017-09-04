<?php
declare(strict_types=1);

use \Psr\Container\ContainerInterface;
use BarkaneArts\Website\Singleton;

// DIC configuration
$container = $app->getContainer();

/**
 * @param ContainerInterface $c
 * @return Twig_Environment
 */
$container['twig']= function (ContainerInterface $c) {
    $settings = $c->get('settings')['twig'];
    $loader = new Twig_Loader_Filesystem(
        $settings['paths'] ?? \dirname(__DIR__) . '/templates'
    );
    return new Twig_Environment(
        $loader,
        $settings['environment']
    );
};

// monolog
$container['logger'] = function (ContainerInterface $c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

$singleton = Singleton::getInstance();
$singleton->setContainer($container);