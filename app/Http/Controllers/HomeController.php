<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display kanye quotes
     *
     * @return void
     */
    public function index()
    {
        return view('welcome');
    }
}
