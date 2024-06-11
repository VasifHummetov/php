<?php

namespace Http\Controllers;

use Request;

class HomeController
{
    public function index(Request $request)
    {
        return "ok";
    }

    public function product(Request $request, int $id, string $slug)
    {
        echo $id. ' ----- '. $slug;
    }
}