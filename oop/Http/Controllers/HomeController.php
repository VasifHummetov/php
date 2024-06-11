<?php

namespace Http\Controllers;

use vendor\Request;

class HomeController
{
    public function index(Request $request)
    {
        return view('about', ['name' => 'Vasif']);
    }

    public function product(Request $request, int $id, string $slug)
    {
        echo $id. ' ----- '. $slug;
    }

    public function products()
    {
        return 'ddd';
    }
}