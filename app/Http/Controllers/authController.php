<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function comingSoon()
    {
        return view('layout.soon');
    }
}
