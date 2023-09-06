<?php

use Framework\Http\Kernel;
use Framework\Http\Request;
use Framework\Http\Response;

require_once __DIR__ . '/../vendor/autoload.php';

// receive the request
$request = Request::createFromGlobals();

// perform some logic
$kernel = new Kernel();
$response = $kernel->handle($request);

// return a response
$response->send();


