<!DOCTYPE html>
@extends('layouts.app')
        
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>学校連絡ページ</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="./css/index.blade.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- CSS only -->
        <link href="https:cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
        <body>
            <footer>
            <center>
                    <div>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link" href='/posts/index'>ホーム</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href='/posts/school'>学校連絡</a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link" href='/posts/guardian'>{{Auth::user()->name}}様宛て</a>
                            </li>
                             @if(Auth::user()->id ==1)
                            <li class="nav-item">
                                <a class="nav-link" href='/posts/create'>追加・編集</a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href='/posts/calendar'>三者面談[予約]</a>
                            </li>
                        </ul>
                    </div>
                   
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card" style="width: 35rem;">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">学校連絡</h5>
                                    <div class='posts'>
                                        @if(Auth::user()->id ==1)
                                        [<a href='/posts/create'>学校連絡追加</a>] 
                                        @endif
                                        @foreach ($mail as $schoolmail) {{--($mail as $schoolmailとはmailという変数の中から1つずつschoolmailという変数を取り出すという意味)school.blade.phpはM(contorollerとみやり取りしてる)--}}
                                            <form action="/posts/{{ $schoolmail->id }}" id="form_{{ $schoolmail->id }}" method="post" style="display:inline">
                                                @if(Auth::user()->id ==1)
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">削除</button>
                                                @endif
                                                <div class='post'>
                                                    <h2 class='title'>{{ $schoolmail->title }}</h2>
                                                    <a href="/mails/{{ $schoolmail->id }}">{{ $schoolmail->title}}> </a>
                                                    <p class='body'>{{ $schoolmail->body }}</p>
                                                    <p>{{date('Y年m月d日', strtotime($schoolmail->created_at))}}</p>
                                                </div>
                                            </form>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
                </footer>
            </body>
        @endsection
    </html>