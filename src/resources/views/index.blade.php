@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div>
    <h1>Contact</h1>
    <form class="form" action="/confirm" method="get">
        <table>
            <tr>
                <th><label>お名前<span>※</span></label></th>
                <td>
                    <input type="text" class="last_name-text" name="last_name" placeholder="例:山田">
                    <input type="text" class="first_name-text" name="first_name" placeholder="例:太郎">
                </td>
            </tr>

            <tr>
                <th><label>性別<span>※</span></label></th>
                <td class="gender">
                    <input type="radio" class="gender_radio-man" name="gender" value="man" id="man" checked>
                    <label for="man">男性</label>
                    <input type="radio" class="gender_radio-woman" name="gender" value="woman" id="woman">
                    <label for="woman">女性</label>
                    <input type="radio" class="gender_radio-other" name="gender" value="other" id="other">
                    <label for="other">その他</label>
                </td>
            </tr>

            <tr>
                <th><label>メールアドレス<span>※</span></label></th>
                <td><input class="address_email" type="email" placeholder="例:test@example.com"></td>
            </tr>

            <tr>
                <th><label>電話番号<span>※</span></label></th>
                <td class="tel">
                    <input type="text" class="tel_1" name="tel_1" placeholder="080">-
                    <input type="text" class="tel_2" name="tel_2" placeholder="1234">-
                    <input type="text" class="tel_3" name="tel_3" placeholder="5678">
                </td>
            </tr>

            <tr>
                <th><label>住所<span>※</span></label></th>
                <td>
                    <input type="text" class="address" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3">
                </td>
            </tr>

            <tr>
                <th><label>建物名</label></th>
                <td>
                    <input type="text" class="building" name="building" placeholder="例:千駄ヶ谷マンション101">
                </td>
            </tr>

            <tr>
                <th><label>お問い合わせの種類<span>※</span></label></th>
                <td>
                    <select class="inquiry_type" name="inquiry">
                        <option value="" selected>選択して下さい</option>
                        <option value="">サンプル1</option>
                        <option value="">サンプル2</option>
                        <option value="">サンプル3</option>
                        <option value="">サンプル4</option>
                        <option value="">サンプル5</option>
                        <option value="">サンプル6</option>
                    </select>
            </tr>

            <tr>
                <th class="inquiry_content-th"><label>お問い合わせ内容<span>※</span></label></th>
                <td>
                    <textarea class="inquiry_content" cols="120" placeholder="お問い合わせ内容をご記載ください"></textarea>
                </td>
            </tr>
        </table>

        <button class="submit" type="submit">確認画面</button>

    </form>
</div>
@endsection