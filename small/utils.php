<?php

function normalizeUrl($string) {
    if($string[0] == '/') {
        $string = substr($string, 1);
    }
    if($string == '') {
        $string = '/';
        return $string;
    }
    if($string[strlen($string) - 1] != '/') {
        $string .= '/';
        return $string;
    }
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

function checkRessource($route, $uri) {
    if(!str_contains($route, '{')) {
        return false;
    }

    $tab = explode('{', $route); // ie example/{name}

    if($tab[0] == substr($uri, 0, (strlen($tab[0]) - strlen($uri)))) {
        return true;
    }

    return false;

}

function getRessourceName($route) {
    if(!str_contains($route, '{')) {
        return null;
    }

    $tab = explode('{', $route);
    $tab = explode('}', $tab[1]);

    return $tab[0];

}