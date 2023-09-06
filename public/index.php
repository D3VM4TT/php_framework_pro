<?php

use Framework\Http\Request;
use Framework\Http\Response;

require_once __DIR__ . '/../vendor/autoload.php';

// receive the request
$request = Request::createFromGlobals();

// perform some logic

// return a response

$response = new Response(
    '<h1>Hello World</h1>',
    200,
    ['Content-Type' => 'text/plain']
);

$response->send();


