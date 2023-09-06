<?php

namespace Framework\Http;

use App\Controller\HomeController;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;


class Kernel
{

    public function handle(Request $request): Response
    {
        $dispatcher = simpleDispatcher(function(RouteCollector $routeCollector) {
            $routes = include APP_ROOT . '/routes/web.php';
            foreach ($routes as $route) {
                $routeCollector->addRoute(...$route);
            }
        });

        $routeInfo = $dispatcher->dispatch($request->getMethod(), $request->getPath());

        [$status, [$controller, $method], $routeParams] = $routeInfo;

        $response = call_user_func_array([new $controller, $method], $routeParams);

        return $response;
    }
}
