<!DOCTYPE html>
@extends('layouts.app')
        
@section('content')

        <body>
            <footer>
                <div>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link"href='/posts/index'>ホーム</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href='/posts/school'>学校連絡</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href='/posts/guardian'>✅{{Auth::user()->name}}様宛て</a>
                        </li>
                         @if(Auth::user()->switches_id ==1)
                        <li class="nav-item">
                            <a class="nav-link" href='/posts/create'>追加・編集</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href='/posts/calendar'>三者面談[予約]</a>
                        </li>
                    </ul>
                </div>
            
                <center>
                    <header>
                        <h1>📝{{Auth::user()->name}}様宛て<h1>
                    </header>
                    <div id="form">
                        <div class="fish" id="fish"></div>
                        <div class="fish" id="fish2"></div>
                            <form id="waterform" action="/posts" method="POST">
                                <div class="card-body">
                                    <h5 class="card-title">{{Auth::user()->name}}様宛て</h5>
                                    <div class='posts'>
                                        @if(Auth::user()->switches_id ==1)
                                        @csrf
                                        [<a href='/posts/create'>保護者連絡追加</a>] 
                                        @endif
                                        @foreach($mail as $parentMail)
                                            <form action="/posts/{{ $parentMail->id }}" id="form_{{ $parentMail->id }}" method="post" style="display:inline">
                                                @if(Auth::user()->switches_id ==1)
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">削除</button>
                                                @endif
                                                <div class='post'>
                                                    <h2 class='title'>{{ $parentMail->title }}</h2>
                                                    <a href="/mails/{{ $parentMail->id }}">{{ $parentMail->title}}> </a>
                                                    <p class='body'>{{ $parentMail->body }}</p>
                                                    <p>{{date('Y年m月d日', strtotime($parentMail->created_at))}}</p>
                                                </div>
                                             </form>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="fish" id="fish"></div>
                                <div class="fish" id="fish2"></div>
                            </from>
                    </div>
                </center>
            </footer>
        </body>
@endsection