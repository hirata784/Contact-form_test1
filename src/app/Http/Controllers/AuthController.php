<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function admin()
    {
        return view('admin');
    }

    public function confirm()
    {
        return view('confirm');
    }

    public function thanks()
    {
        return view('thanks');
    }
}
