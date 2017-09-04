<?php
declare(strict_types=1);
namespace BarkaneArts\Website;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Interface HandlerInterface
 * @package BarkaneArts\Website
 */
interface HandlerInterface
{
    /**
     * All handlers are invokable.
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     * @return mixed
     */
    public function __invoke(
        RequestInterface $request,
        ResponseInterface $response,
        array $args = []
    ): ResponseInterface;
}
