<?php

require_once('./small/small.php');

$small = new Small();

$small->get('/', function($request, $response) {

    $response->setData(['message'=>'get index', 'cookie' => $request->cookies['test']]);

    return $response;
});

$small->post('example', function($request, $response) {

    $response->setResponseType('HTML');
    $user = $request->params['user'];
    $response->setData('<p>Hello '.$user.'</p>');
    return $response;
});

$small->get('example/{name}', function($request, $response) {

    $response->setData(['name'=> $request->resource['name']]);
    $response->setCookie('test', 'wow');

    return $response;
});

$small->req('/', 'patch', function($request, $response) {

    $response->setResponseCode(404);

    return $response;
});