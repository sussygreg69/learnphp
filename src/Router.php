<?php
namespace App;

class Router {
    private static $routes = [];
    private $path;
    private $method;

    public function __construct($path, $method)
    {
        $this->path = parse_url($path, PHP_URL_PATH);
        $this->method = $method;
    }

    public function match(){
        foreach(self::$routes as $route){
            if($route->path === $this->path && $route->method === $this->method){
                return $route;
            }
        }
        return false;
    }

    public static function getRoutes(){
        return self::$routes;
    }

    public static function addRoute($method, $path, $action){
        self::$routes[] = new Route($method, $path, $action);
    }
}