<?php
declare(strict_types=1);
namespace BarkaneArts\Website\Handlers;

use BarkaneArts\Website\HandlerCommon;
use BarkaneArts\Website\HandlerInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class CustomUserHomepage implements HandlerInterface
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
        if (!($args['user'])) {
            \header('Location: /');
            exit;
        }

        $user = \preg_replace('/[^A-Za-z0-9\-\_]/', '', $args['user']);
        if (!\file_exists(BARKANE_ROOT . '/templates/user/' . $user . '.twig')) {
            \header('Location: /');
            exit;
        }

        // Render index view
        $response->getBody()->write(
            $this->twig->render('user/' . $user .'.twig', $args)
        );
        return $response;
    }

}