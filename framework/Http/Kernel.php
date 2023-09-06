<?php

namespace Framework\Http;

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

class Kernel
{

    public function handle(Request $request): Response
    {

        $dispatcher = simpleDispatcher(function(RouteCollector $routeCollector) {
            $routeCollector->addRoute('GET', '/', function() {
                return new Response(
                    body: '<h1>Hello World<h/1>',
                    status: 200,
                    headers: ['Content-Type' => 'text/html']
                );
            });

            $routeCollector->addRoute('GET',  '/posts/{id:\d+}', function($routeParams) {
                return new Response(
                    body: "<h1>Post #{$routeParams['id']}<h/1>",
                    status: 200,
                    headers: ['Content-Type' => 'text/html']
                );
            });
        });

        $routeInfo = $dispatcher->dispatch($request->serverParams['REQUEST_METHOD'], $request->serverParams['REQUEST_URI']);

        [$status, $handler, $routeParams] = $routeInfo;

        return $handler($routeParams);

    }
}
