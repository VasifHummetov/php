<?php

namespace Http\Controllers;

class HomeController
{
    public function index()
    {
        return "ok";
    }

    public function product(int $id, string $slug)
    {
        echo $id. ' ----- '. $slug;
    }
}