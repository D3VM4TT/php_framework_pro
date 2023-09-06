<?php

namespace App\Controller;

use Framework\Http\Response;

class HomeController
{

    const NAME = "HomeController";

    public function index():Response
    {
        $content = "<h1>Hello World</h1>";
        return new Response($content);
    }

}
