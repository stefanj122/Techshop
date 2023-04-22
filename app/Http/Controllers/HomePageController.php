<?php

namespace App\Http\Controllers;

class HomePageController extends Controller
{
    public function show()
    {
        return view('home-page', ['name' => 'Stefan Jeftic']);
    }
}
