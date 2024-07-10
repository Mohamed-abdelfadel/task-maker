<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authController extends Controller
{
    public function login()
    {
        return 'login';
    }
    public function register()
    {
        return 'register';
    }
    public function home()
    {
        return view('layout.home');
    }
}
