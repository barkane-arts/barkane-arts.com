<?php
declare(strict_types=1);
namespace BarkaneArts\Website\Handlers;

use BarkaneArts\Website\HandlerCommon;
use BarkaneArts\Website\HandlerInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Index implements HandlerInterface
{
    use HandlerCommon;

    public function __construct()
    {
        $this->beforeInvoke();
    }

    /**
     * Invoke the HTTP request
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     * @return ResponseInterface
     */
    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        // Render index view
        $response->getBody()->write(
            $this->twig->render('index.twig', $args)
        );
        return $response;
    }

}