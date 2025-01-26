@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
    <div class="paginate">
        {{$contacts->appends(request()->query())->links()}}
    </div>

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

        <?php $i = 0; ?>
        @foreach($contacts as $contact)
        <?php $i++; ?>
        <tr>
            <td>{{$contact['last_name']}} {{$contact['first_name']}}</td>
            <td>{{$contact['gender']}}</td>
            <td>{{$contact['email']}}</td>
            <td>{{$contact->category->getContent()}}</td>
            <td><button type="button" class="btn btn-primary form-btn" data-toggle="modal" data-target="#exampleModalCenter<?= $i ?>">詳細</button></td>
        </tr>
        @endforeach
    </table>
</div>

<!-- Modal -->
<?php $i = 0; ?>
@foreach($contacts as $contact)
<?php $i++; ?>
<div class="modal fade" id="exampleModalCenter<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('admin.delete', ['id' => $contact['id']])}}" method="post">
                @method('DELETE')
                @csrf

                <div class="modal-body">
                    <div class="form-group row">
                        <p class="col-sm-4 col-form-label">お名前</p>
                        <div class="col-sm-8">
                            <p class="modal-name">{{$contact['last_name']}} {{$contact['first_name']}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <p class="col-sm-4 col-form-label">性別</p>
                        <div class="col-sm-8">
                            <p class="modal-email">{{$contact['gender']}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <p class="col-sm-4 col-form-label">メールアドレス</p>
                        <div class="col-sm-8">
                            <p class="modal-email">{{$contact['email']}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <p class="col-sm-4 col-form-label">電話番号</p>
                        <div class="col-sm-8">
                            <p class="modal-email">{{$contact['tel']}}</p>
                        </div>
                    </div>


                    <div class="form-group row">
                        <p class="col-sm-4 col-form-label">住所</p>
                        <div class="col-sm-8">
                            <p class="modal-email">{{$contact['address']}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <p class="col-sm-4 col-form-label">建物名</p>
                        <div class="col-sm-8">
                            <p class="modal-email">{{$contact['building']}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <p class="col-sm-4 col-form-label">お問い合わせの種類</p>
                        <div class="col-sm-8">
                            <p class="modal-email">{{$contact->category->getContent()}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <p class="col-sm-4 col-form-label">お問い合わせ内容</p>
                        <div class="col-sm-8">
                            <p class="modal-email">{{$contact['detail']}}</p>
                        </div>
                    </div>

                    <div class="text-center">
                        <input type="hidden" name="id" value="{{$contact['id']}}">
                        <button type="submit" class="btn btn-secondary">削除</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<!-- <script src="{{ asset('/js/main.js') }}"></script> -->


@endsection