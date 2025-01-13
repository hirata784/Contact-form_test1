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
                <td>
                    <input type="text" class="last_name" name="last_name" value="{{ $input['last_name'] }}{{ $input['first_name'] }}" readonly>
                </td>
            </tr>
            <tr>
                <th>性別</th>
                <td><input type="text" class="gender" name="gender" value="{{ $input['gender'] }}" readonly></td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td><input type="text" class="email" name="email" value="{{ $input['email'] }}" readonly></td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td><input type="text" class="tel_1" name="tel_1" value="{{ $input['tel_1'] }}{{ $input['tel_2'] }}{{ $input['tel_3'] }}" readonly></td>
            </tr>
            <tr>
                <th>住所</th>
                <td><input type="text" class="address" name="address" value="{{ $input['address'] }}" readonly>
                </td>
            </tr>
            <tr>
                <th>建物名</th>
                <td><input type="text" class="building" name="building" value="{{ $input['building'] }}" readonly></td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td><input type="text" class="content" name="content" value="{{ $input['content'] }}" readonly></td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td><input type="text" class="detail" name="detail" value="{{ $input['detail'] }}" readonly></td>
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