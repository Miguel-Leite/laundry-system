<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view("pages.auth.login");
    }

    public function forgotPassword()
    {
        return view("pages.auth.forgot-password");
    }

    public function home()
    {
        return view("pages.index");
    }

    public function userCreate()
    {
        return view("pages.user.create");
    }

    public function serviceCreate()
    {
        
    }
}
