@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('nav')
<form action="/login">
    <button class=" header-nav__button">logout</button>
</form>
@endsection

@section('content')
<div>
    <h1>Admin</h1>
    <form action="">
        @csrf
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
            {{ $contacts->links() }}

        </div>

        <div>
            <table border="1">
                <tr>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                    <th>詳細</th>
                </tr>

                @foreach($contacts as $contact)
                <tr>
                    <td>{{$contact['last_name']}} {{$contact['first_name']}}</td>
                    <td>{{$contact['gender']}}</td>
                    <td>{{$contact['email']}}</td>
                    <td>{{$contact['category_id']}}</td>
                    <td><button>詳細</button></td>
                </tr>
                @endforeach
            </table>
        </div>
    </form>
</div>
@endsection