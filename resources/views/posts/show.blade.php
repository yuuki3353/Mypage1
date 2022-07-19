<!DOCTYPE HTML>
@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<html lang="{{ str_replace("_","_", app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!--Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nuntio:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
        <body>
            <a href="">{{ $mail->category->name }}</a>
            <h1 class="title">{{ $mail->title }}</h1>
                <div class="content">
                    <div class="content__post">
                    <h3>本文</h3>
                    <p>{{ $mail->body }}</p>    
                    </div>
                </div>
                    <div class="footer">
                    <a href="/">戻る</a>
                    </div>
                        <p class="edit">[<a href="/posts/{{ $mail->id }}/edit">edit</a>]</p>
        </body>
</html>
@endsection