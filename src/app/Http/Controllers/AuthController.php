<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
// use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(AuthRequest $request)
    {
        $input = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel_1', 'tel_2', 'tel_3', 'address', 'building', 'content', 'detail']);

        $categories = Category::all();

        return view('confirm', compact('input', 'categories'));
    }

    public function back()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function thanks(AuthRequest $request)
    {
        // category_id追加
        // ex)1.商品のお届けについてならidの1を渡す
        // $content = $request->only('content');
        $request->merge(['category_id' => 1]);

        // 性別表示変更
        // 1:男性 2:女性 3:その他
        $gender_str = $request->only('gender');

        if ($gender_str['gender'] == "男性") {
            $request['gender'] = 1;
        } elseif ($gender_str['gender'] == "女性") {
            $request['gender'] = 2;
        } elseif ($gender_str['gender'] == "その他") {
            $request['gender'] = 3;
        }

        // 3つの電話番号を先に呼び出す
        $tels = $request->only('tel_1', 'tel_2', 'tel_3');

        // 3つの電話番号を1つにまとめる
        $str = implode('', $tels);

        // 結合した電話番号telを追加
        $request->merge(['tel' => $str]);

        $input = $request->only(['category_id', 'last_name', 'first_name', 'gender', 'email', 'tel', 'address', 'building', 'detail']);

        Contact::create($input);
        return view('thanks');
    }

    public function admin()
    {
        $categories = Category::all();
        return view('admin', compact('categories'));
    }

    // public function register()
    // {
    //     return view('register');
    // }

    // public function login()
    // {
    //     return view('login');
    // }
}
