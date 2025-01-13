<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(AuthRequest $request)
    {
        $input = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel_1', 'tel_2', 'tel_3', 'address', 'building', 'content', 'detail']);
        return view('confirm', compact('input'));
    }

    public function admin()
    {
        return view('admin');
    }

    public function thanks()
    {
        return view('thanks');
    }
}
