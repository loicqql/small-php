<?php

require_once('./small/small.php');

$small = new Small();

$small->get('/', function($response) {

    $response->setData(['message'=>'get /']);

    return $response;
});

$small->post('/', function($response) {

    $response->setData(['message'=>'post /']);

    return $response;
});

$small->get('example', function($response) {

    $response->setData('<p>Hello World</p>');
    $response->setResponseType('HTML');

    return $response;
});

$small->req('/', 'patch', function($response) {

    $response->setData(['message'=>'patch /']);

    return $response;
});