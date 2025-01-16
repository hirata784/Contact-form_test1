<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
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
        // category_idを追加(お問い合わせの種類)
        $content_str = $request->only('content');

        if ($content_str['content'] == "商品のお届けについて") {
            $request->merge(['category_id' => 1]);
        } elseif ($content_str['content'] == "商品の交換について") {
            $request->merge(['category_id' => 2]);
        } elseif ($content_str['content'] == "商品トラブル") {
            $request->merge(['category_id' => 3]);
        } elseif ($content_str['content'] == "ショップへのお問い合わせ") {
            $request->merge(['category_id' => 4]);
        } elseif ($content_str['content'] == "その他") {
            $request->merge(['category_id' => 5]);
        }

        // 性別を文字列から数値に変換
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
        return view('admin', compact('categories', 'contacts'));
    }

    public function search(Request $request)
    {
        // categoriesテーブル呼び出し
        $categories = Category::all();

        // contactsテーブル呼び出し
        $contacts = Contact::with('category')
            ->KeywordSearch($request->keyword)
            ->GenderSearch($request->gender)
            ->ContentSearch($request->content)
            ->DateSearch($request->date)
            ->Paginate(7);

        // $contacts = Contact::Paginate(7)->KeywordSearch($request->keyword)->get();

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


        return view('admin', compact('categories', 'contacts'));
    }

    public function reset(){
        return redirect('/admin');
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
