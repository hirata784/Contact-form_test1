@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('nav')
<button class="header-nav__button">logout</button>
@endsection

@section('content')
<div>
    <h1>Admin</h1>
    <form action="">
        <div>
            <input type="text" class="name" placeholder="名前やメールアドレスを入力して下さい">

            <select class="gender">
                <option value="" selected>性別</option>
                <option value=" 全て">全て</option>
                <option value="男性">男性</option>
                <option value="女性">女性</option>
                <option value="その他">その他</option>
            </select>

            <select class="content">
                <option value="" selected>お問い合わせの種類</option>
                @foreach ($categories as $category)
                <option value="{{$category->content}}">{{$category->content}}</option>
                @endforeach
            </select>

            <input type="date" class="date">
            <button class="search">検索</button>
            <button class="reset">リセット</button>
        </div>

        <div>
            <button>エクスポート</button>
        </div>

</div>

</form>
</div>
@endsection