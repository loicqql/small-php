<?php

require_once('small-response.php');
require_once('utils.php');

class Small {

    private $base_url;

    public function __construct($base = null) {
        if(isset($base)) {
            $base = normalizeUrl($base);
            $this->base_url = $base;
        }else {
            $this->base_url = '/';
        }
    }

    public function req($route, $method, $func) {
        $method = strtolower($method);

        $route = normalizeUrl($route);
        $uri = getRequestUri($this->base_url);

        if(getMethod() == $method && $uri == $route) {
            $response = new Response();
            $this->sendResponse($func($response));
        }
    }

    public function get($route, $func) {
        $this->req($route, 'get', $func);
    }

    public function post($route, $func) {
        $this->req($route, 'post', $func);
    }

    private function sendResponse($response) {
        $response->send();
    }
}
