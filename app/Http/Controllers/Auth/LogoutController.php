<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Cookie;

class LogoutController extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        Auth::logout();
    	Session::flush();

    	return redirect('/login');
    }
}
