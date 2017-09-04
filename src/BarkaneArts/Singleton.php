<?php
declare(strict_types=1);
namespace BarkaneArts\Website;

use Psr\Container\ContainerInterface;

/**
 * Class Singleton
 */
class Singleton
{
    /** @var Singleton */
    private static $instance;

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Singleton constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return Singleton
     */
    public static function getInstance()
    {
        if (isset(self::$instance)) {
            return self::$instance;
        }

        self::$instance = new static();
        return self::$instance;
    }

    /**
     * @return ContainerInterface
     */
    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }

    /**
     * @param ContainerInterface $c
     * @return Singleton
     */
    public function setContainer(ContainerInterface $c): self
    {
        $this->container = $c;
        return $this;
    }
}
