<!DOCTYPE HTML>
@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <link rel="stylesheet" href ="{{asset('css/edit.css')}}">
    
    
    <header>
        <h1>投稿修正</h1>
    </header>
        <body>
            <center>
                <div id ="form">    
                    <div class="fish" id="fish"></div>
                    <div class="fish" id="fish2"></div>
                        <div calss="waterform" action="/posts" method="POST">
                        <h2>編集画面</h2>
                            <div class="content">
                                <form action="/mails/{{ $mail->id }}" method="POST">
                                    @csrf
                                    
                                    @method('PUT')
                                    <div class="formgrop" id="title-form">
                                        <label for="title">Title</label>
                                        <input type='title' id="title" name='mail[title]' placeholder="こちらからタイトルの修正して下さい。" value="{{ $mail->title }}">
                                        <p class="title__error" style="color:red">{{ $errors->first('meil.title' }}</p>
                                        <input name="mail[user_id]" type="hidden" value="{{$mail->title}}">
                                    </div>
                                    <div class="formgrop" id="body-form">
                                        <lable for="body">Body</lable>
                                        <textarea name="mail[body]" placeholder="こちらから内容を修正して下さい。">{{ old('mail.body') }}</textarea>
                                        <input type='text' name='mail[body]' value="{{ $mail->body }}">
                                        <p class="body__error" style="color:red">[{$errors->first('mail.body')}]</p>
                                    </div>
                                    <div>
                                        <input type="submit" value="更新">
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </center>
        </body>
</html>
@endsection