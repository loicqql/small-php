<?php

require_once('./small/small.php');

$small = new Small();

$small->get('/', function($request, $response) {

    $response->setData(['message'=>'get /']);

    return $response;
});

$small->post('/', function($request, $response) {

    $response->setData(['message'=>'post /']);

    return $response;
});

$small->get('example', function($request, $response) {

    $response->setData('<p>Hello World</p>');
    $response->setResponseType('HTML');

    return $response;
});

$small->get('example/{name}', function($request, $response) {

    $response->setData(['name'=> $request->resource['name']]);

    return $response;
});

$small->req('/', 'patch', function($request, $response) {

    $response->setData(['message'=>'patch /']);

    return $response;
});