<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function show()
    {
        return view('home-page', ['name' => 'Stefan Jeftic']);
    }
}
