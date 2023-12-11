<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        // log in
        return 'log in';
    }
    public function register(){
        return 'Register';
    }
}