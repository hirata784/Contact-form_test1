@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div>
    <h1>Confirm</h1>
    <form class="form" action="/thanks" method="get">
        <table border="1">
            <tr>
                <th>お名前</th>
                <td>サンプル太郎</td>
            </tr>
            <tr>
                <th>性別</th>
                <td>サンプル</td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>aaa@sss.com</td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>0001112222</td>
            </tr>
            <tr>
                <th>住所</th>
                <td>どこどこ</td>
            </tr>
            <tr>
                <th>建物名</th>
                <td>どこどこ</td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td>なんでしょう</td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td>メッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージ</td>
            </tr>
        </table>
        <div class="btn">
            <button class="submit">送信</button>
            <a class="fixes" href="/">修正</a>
            <!-- <button class="fixes">修正</button> -->
        </div>
    </form>
</div>
@endsection