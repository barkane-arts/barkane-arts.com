<?php
declare(strict_types=1);
namespace BarkaneArts\Website;

use Monolog\Logger;

/**
 * Class HandlerCommon
 * @package BarkaneArts\Website
 */
trait HandlerCommon
{
    /**
     * @var bool
     */
    protected $invoked = false;

    /**
     * @var \Twig_Environment
     */
    protected $twig;

    /**
     * @var Logger
     */
    protected $logger;

    /**
     * Run this in constructors.
     */
    public function beforeInvoke()
    {
        if ($this->invoked) {
            return;
        }
        $c = Singleton::getInstance()->getContainer();

        $this->twig = $c['twig'];
        $this->logger = $c['logger'];
    }
}
