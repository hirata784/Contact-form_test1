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
        // categoriesテーブル呼び出し
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(AuthRequest $request)
    {
        $input = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel_1', 'tel_2', 'tel_3', 'address', 'building', 'content', 'detail']);

        // categoriesテーブル呼び出し
        $categories = Category::all();

        return view('confirm', compact('input', 'categories'));
    }

    public function back()
    {
        // categoriesテーブル呼び出し
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
        // categoriesテーブル呼び出し
        $categories = Category::all();

        // contactsテーブル呼び出し
        // $contacts = Contact::all();
        $contacts = Contact::Paginate(7);


        // 性別を数値から文字列に変換
        for ($i = 0; $i < count($contacts); $i++) {
            if ($contacts[$i]['gender'] == 1) {
                $contacts[$i]['gender'] = "男性";
            } elseif ($contacts[$i]['gender'] == 2) {
                $contacts[$i]['gender'] = "女性";
            } elseif ($contacts[$i]['gender'] == 3) {
                $contacts[$i]['gender'] = "その他";
            }
        }

        // // お問い合わせの種類を数値から文字列に変換
        // for ($i = 0; $i < count($contacts); $i++) {
        //     if ($contacts[$i]['category_id'] == 1) {
        //         $contacts[$i]['category_id'] = "商品のお届けについて";
        //     } elseif ($contacts[$i]['category_id'] == 2) {
        //         $contacts[$i]['category_id'] = "商品の交換について";
        //     } elseif ($contacts[$i]['category_id'] == 3) {
        //         $contacts[$i]['category_id'] = "商品トラブル";
        //     } elseif ($contacts[$i]['category_id'] == 4) {
        //         $contacts[$i]['category_id'] = "ショップへのお問い合わせ";
        //     } elseif ($contacts[$i]['category_id'] == 5) {
        //         $contacts[$i]['category_id'] = "その他";
        //     }
        // }


        // dd($contacts);
        // dd($categories);

        return view('admin', compact('categories', 'contacts'));
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
