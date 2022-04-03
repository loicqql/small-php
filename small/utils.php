<?php

function normalizeUrl($string) {
    if($string[0] == '/') {
        $string = substr($string, 1);
    }
    if($string[strlen($string) - 1] != '/') {
        $string .= '/';
    }
    return $string;
}

function getMethod() {
    return strtolower($_SERVER['REQUEST_METHOD']);
}

function getRequestUri($base_url) {
    $uri = normalizeUrl($_SERVER['REQUEST_URI']);
    if($base_url != '/') {
        $uri = substr($uri, strlen($base_url));
    }
    return $uri == '' ? '/' : $uri;
}