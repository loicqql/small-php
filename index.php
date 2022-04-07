<?php

require_once('./small/small.php');

$small = new Small();

$small->get('/', function($request, $response) {

    $response->setData(['message'=>$request->cookies['te']]);

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

    return $response;
});

$small->post('example/{name}', function($request, $response) {

    $response->setData(['name'=> $request->resource['name']]);
    $response->setCookie('te', 'val');

    // var_dump($_SERVER);

    return $response;
});

$small->req('/', 'patch', function($request, $response) {

    $response->setData(['message'=>'patch /']);

    return $response;
});