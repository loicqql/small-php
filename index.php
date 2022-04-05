<?php

require_once('./small/small.php');

$small = new Small();

$small->get('/', function($request, $response) {

    $response->setData(['message'=>'get /']);

    return $response;
});

$small->post('/', function($request, $response) {

    $response->setResponseType('HTML');
    $user = $request->params['user'];
    $response->setData('<p>Hello '.$user.'</p>');

    return $response;
});

$small->get('example', function($request, $response) {

    $response->setResponseType('HTML');
    $response->setData('<p>Hello World</p>');

    return $response;
});

$small->req('/', 'patch', function($request, $response) {

    $response->setData(['message'=>'patch /']);

    return $response;
});