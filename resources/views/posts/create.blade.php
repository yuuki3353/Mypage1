<!DOCTYPE HTML>
@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
    <html>    
        <body>
            <div>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href='/posts/index'>ホーム</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href='/posts/school'>学校連絡</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href='/posts/guardian'>{{Auth::user()->name}}様宛て連絡</a>
                    </li>
                    @if(Auth::user()->switches_id ==1)
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href='/posts/create'>追加・編集</a>
                    </li>
                    @else
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href='/posts/calendar'>三者面談[予約]</a>
                    </li>
                </ul>
            </div>
            
            <link rel="stylesheet" href ="{{asset('css/create.css')}}">
            <link rel="stylesheet" href ="{{asset('js/create.js')}}">
            
            <center>
                <header>
                    <h1>こちらから追加</h1>
                </header>
                <div id ="form">
                    <div class="fish" id="fish"></div>
                    <div class="fish" id="fish2"></div>
                        <form id="waterform" action="/posts" method="POST">
                            @csrf
                            <div class="formgrop" id="category-form">
                                <label for="category">Who do you send your message to?📩</label>
                                
                                <select name="mail[category_id]">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="formgrop" id="title-form">
                                <label for="title">Title</label>
                                <input type="title" id="title" name="mail[title]" placeholder="タイトルを記載して下さい。" value="{{ old('mail.title') }}"/>>
                                <p class="title__error" style="color:red">{{ $errors->first('mail.title') }}</p>
                                <input name="mail[user_id]" type="hidden" value={{Auth::id()}} />
                            </div>
                            <div class="formgrop" id="body-form">
                                <lable for="body">Body</lable>
                                <textarea name="mail[body]" placeholder="内容を記載して下さい。">{{ old('mail.body') }}</textarea>
                                <p class="body__error" style="color:red">{{ $errors->first('mail.body') }}</p>
                            </div>
                                <input type="submit" value="Send your message!📬"/>
                            <div class="back">[<a href="/">back</a>]</div>
                        </form>
                </div>   
            </center>
            </body>
        </html> 
            
        
@endsection