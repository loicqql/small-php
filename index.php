<?php

require_once('small.php');

$small = new Small();

$small->get('/small/', function() {
    echo 'letsgo';
});

