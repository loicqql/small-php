<?php

require_once('./small/small.php');

$small = new Small();

$small->get('/', function() {

    $t = 'get /';

    return $t;
});

$small->post('/', function() {

    $t = 'post /';

    return $t;
});

$small->get('example', function() {

    $t = 'get /example';

    return $t;
});

$small->req('/', 'patch', function() {

    $t = 'patch /';

    return $t;
});