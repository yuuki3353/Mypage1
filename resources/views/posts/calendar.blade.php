<!DOCTYPE html>
@extends('layouts.app')
        
@section('content')
<!--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">-->
<!--    <head>-->
<!--        <meta charset="utf-8">-->
<!--        <title>三者面談ページ</title>-->
<!--         Fonts -->
<!--        <link href="{{asset('/css/calendar.css')}}" rel="stylesheet">-->
<!--        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">-->
        
<!--         CSS only -->
<!--        <link href="https:cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">-->
<!--    </head>-->
                <body>
                
                    <div>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link " href='/posts/index'>ホーム</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href='/posts/school'>学校連絡</a>
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
                                <a class="nav-link active" aria-current="page" href='/posts/calendar'>三者面談[予約]</a>
                            </li>
                        </ul>
                    </div>
            
                    <link rel="stylesheet" href="{{asset('css/calendar.css')}}">
                    <link rel="stylesheet" href="{{asset('js/calendar.js')}}">
                        
                    <center>
                        <header>
                        <h1>予約はこちら</h2>    
                        </header>
                            <div id="form">
                                <div class="fish" id="fish"></div>
                                <div class="fish" id="fish2"></div>
                                
                                <div id="waterform"  action="/posts" method="POST"></div>
                                
                                <div class="formgroup" id="name-form" style="text-aling:center; , text-left">
                                    <ul class="list">
                                            <li>
                                                ※以下の手順に沿って予約して下さい<br>
                                                ①カレンダー右上の[Week]を選択して下さい。<br>
                                                ②時間帯を選択して下さい。<br>
                                                ③学年・組・氏名の順番に記入して下さい。<br>
                                                ※[list]より予約確認が可能です<br>
                                                削除したい場合は、予約された箇所を選択肢し削除して下さい。
                                            </li>
                                    </ul>
                                </div>
                                <div id="calendar" class="mt-5 w-50 p-10" style="background:url('/img/06.jpg'); background-size: cover; background-repeat: no-repeat;" ></div>
                                <div class="fish" id="fish"></div>
                                <div class="fish" id="fish2"></div>
                            </div>
                        
                    </center>
                </div>
@endsection