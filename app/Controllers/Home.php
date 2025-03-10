<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('auth\login');
    }
    public function register(): string
    {
        return view('auth\register');
    }
    public function home(): string
    {
        return view('user\dashboard');
    }
    public function login(): string
    {
        return view('auth\login');
    }
}
