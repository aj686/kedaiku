<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    function hello() {
        echo "<h1>Hello World</h1>";
    }
}
