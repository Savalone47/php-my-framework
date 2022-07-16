<?php

namespace Framework;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Psr7\Response;

class App
{

    public function run(ServerRequestInterface $request): ResponseInterface
    {
        $uri = $request->getUri()->getPath();

        if(!empty($uri) && $uri[-1] == "/")
        {
            return (new Response())
                    ->withStatus(301)
                    ->withHeader('Location', substr($uri, 0, -1));
        }
        
        $response = new Response();
        $response->getBody()->write('Hello PHP-MY-FRAMEWORK');
        return $response;
    }
}
