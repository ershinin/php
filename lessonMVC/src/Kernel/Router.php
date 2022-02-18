<?php
namespace Cakes\Kernel;

class Router
{
    public static function start($routes = 'routes.php') {


        $method = $_SERVER['REQUEST_METHOD'];
        $uri = explode('?', $_SERVER['REQUEST_URI']);
        $path = $uri[0];
        $param = $uri[1] ?? '';

        $routes = require_once '../settings/' . $routes;


        foreach ($routes as $route){
            if ($route['path'] === $path && $route['method'] === $method && $route['parameter'] === boolval($param)) {
                $controller = explode("::", $route['controller'])[0];
                $action = explode("::", $route['controller'])[1];
                $obj = new $controller();
                $obj->$action();
                return;
            }
        }

    }
}