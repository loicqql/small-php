<?php

class Small {

    private $routes;

    public function __construct() {
        $this->routes = [];
    }

    public function req() {
        var_dump($uri);
    }

    public function get($route, $func) {
        array_push($this->routes, $route);

        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $uri = strtolower($_SERVER['REQUEST_URI']);

        var_dump($uri);

        if($uri == $route) {
            $func();
        }
    }

}
