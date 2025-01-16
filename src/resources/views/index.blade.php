@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div>
    <h1>Contact</h1>
    <form class="form" action="/confirm" method="post">
        @csrf
        <table border="1">
            <tr>
                <th><label>お名前<span>※</span></label></th>
                <td>
                    <input type="text" class="last_name" name="last_name" value="{{ old('last_name') }}" placeholder="例:山田">
                    <input type="text" class="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="例:太郎">
                    <div class="form_error">
                        @error('last_name')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="form_error">
                        @error('first_name')
                        {{ $message }}
                        @enderror
                    </div>
                </td>
            </tr>

            <tr>
                <th><label>性別<span>※</span></label></th>
                <td class="gender">
                    <input type="radio" class="gender_radio-man" name="gender" value="男性" id="man" checked>
                    <label for="man">男性</label>
                    <input type="radio" class="gender_radio-woman" name="gender" value="女性" id="woman">
                    <label for="woman">女性</label>
                    <input type="radio" class="gender_radio-other" name="gender" value="その他" id="other">
                    <label for="other">その他</label>
                    <div class="form_error">
                        @error('gender')
                        {{ $message }}
                        @enderror
                    </div>
                </td>
            </tr>

            <tr>
                <th><label>メールアドレス<span>※</span></label></th>
                <td><input class="email" type="email" name="email" value="{{ old('email') }}" placeholder="例:test@example.com">
                    <div class="form_error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </td>
            </tr>

            <tr>
                <th><label>電話番号<span>※</span></label></th>
                <td class="tel">
                    <input type="text" class="tel_1" name="tel_1" value="{{ old('tel_1') }}" placeholder="080">-
                    <input type="text" class="tel_2" name="tel_2" value="{{ old('tel_2') }}" placeholder="1234">-
                    <input type="text" class="tel_3" name="tel_3" value="{{ old('tel_3') }}" placeholder="5678">
                    <div class="form_error">
                        @error('tel_1')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="form_error">
                        @error('tel_2')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="form_error">
                        @error('tel_3')
                        {{ $message }}
                        @enderror
                    </div>
                </td>
            </tr>

            <tr>
                <th><label>住所<span>※</span></label></th>
                <td>
                    <input type="text" class="address" name="address" value="{{ old('address') }}" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3">
                    <div class="form_error">
                        @error('address')
                        {{ $message }}
                        @enderror
                    </div>
                </td>
            </tr>


            <tr>
                <th><label>建物名</label></th>
                <td>
                    <input type="text" class="building" name="building" value="{{ old('building') }}" placeholder="例:千駄ヶ谷マンション101">
                </td>
            </tr>

            <tr>
                <th><label>お問い合わせの種類<span>※</span></label></th>
                <td>
                    <select class="content" name="content">
                        <option value="" selected>選択して下さい</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->content}}" @if("{{$category->content}}"==old("content")) selected @endif>{{$category->content}}</option>
                        @endforeach
                    </select>
                    <div class="form_error">
                        @error('content')
                        {{ $message }}
                        @enderror
                    </div>
                </td>
            </tr>

            <tr>
                <th class="detail-th"><label>お問い合わせ内容<span>※</span></label></th>
                <td>
                    <textarea class="detail" name="detail" cols="120" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                    <div class="form_error">
                        @error('detail')
                        {{ $message }}
                        @enderror
                    </div>
                </td>
            </tr>
        </table>

        <button class="submit" type="submit">確認画面</button>

    </form>
</div>
@endsection