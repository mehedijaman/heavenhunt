<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show website homepage
     */
    public function index()
    {
        return view('home');
    }
}
