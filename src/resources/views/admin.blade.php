@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('nav')
<form action="{{route('logout')}}" method="post">
    @csrf
    <button class=" header-nav__button">logout</button>
</form>
@endsection

@section('content')
<div>
    <h1>Admin</h1>
    <div class="form_inner">
        <form action="/admin/search" method="get">
            @csrf
            <div>
                <input type="text" class="name" name="keyword" placeholder="名前やメールアドレスを入力して下さい">

                <select class="gender" name="gender">
                    <option value="" selected>性別</option>
                    <option value="">全て</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>

                <select class="content" name="content">
                    <option value="" selected>お問い合わせの種類</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->content}}</option>
                    @endforeach
                </select>

                <input type="date" class="date" name="date">
                <button class="search">検索</button>
        </form>

        <form action="/admin/reset" method="get">
            @csrf
            <button class="reset">リセット</button>
        </form>
    </div>
</div>

<div class="paginate">
    {{$contacts->appends(request()->query())->links()}}
</div>

<div class="table">
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
            <td>{{$contact->category->getContent()}}</td>
            <td><button>詳細</button></td>
        </tr>
        @endforeach
    </table>
</div>

</div>
@endsection