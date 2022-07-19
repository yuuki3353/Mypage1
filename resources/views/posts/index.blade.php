<!DOCTYPE html>
@extends('layouts.app')
        
@section('content')
                <nav class="1-headarWrap">
                    <div class="headar_logo">
                        <a href="https://omoidecom.jp/School/detail?ScID=29410&Category=0">
                            <img src="{{ asset('/img/sss.png') }}" alt="○○小学校" width="80" height="50">
                            <span>○○小学校情報はこちら</span>
                            <img src="{{ asset('/img/sss.png') }}" alt="○○小学校" width="80" height="50">
                        </a>
                        
                        <div>
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href='/posts/index'>ホーム</a>
                                    
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href='/posts/school'>学校連絡</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href='/posts/guardian'>{{Auth::user()->name}}様宛て</a>
                                </li>
                                {{--投稿者のみ追加編集が可能--}}
                                @if(Auth::user()->switches_id ==1)
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href='/posts/create'>追加・編集</a>
                                </li>
                        
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href='/posts/calendar'>三者面談[予約]</a>
                                </li>
                                <li>
                                    <div class="nav-link">
                                        <div id="open">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-check-fill" viewBox="0 0 16 16">
                                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 4.697v4.974A4.491 4.491 0 0 0 12.5 8a4.49 4.49 0 0 0-1.965.45l-.338-.207L16 4.697Z"/>
                                                <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                                            </svg>
                                        </div>
                                        <div id="mask" class="hidden">
                                        <section id="modal" class="hidden">
                                            <p>{{Auth::user()->name}}様に新しいメールが届きました。</p>
                                           
                                            @foreach($parentMails as $parentMail)
                                            <a href='/posts/school'>
                                                <form action="/posts/{{ $parentMail->id }}" id="form_{{ $parentMail->id }}" method="mail" style="display:inline">
                                                    <div class='post'>
                                                        <h2 class='title'>{{ $parentMail->title }}</h2>
                                                        <a href="/mails/{{ $parentMail->id }}">{{ $parentMail->title}}> </a>
                                                        <p>{{date('Y年m月d日', strtotime($parentMail->created_at))}}</p>
                                                    </div>
                                                </form>
                                            </a>
                                            @endforeach
                                           
                                            <div id="close">
                                              閉じる
                                            </div>
                                        </section>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <br>
                
                <link rel="stylesheet" href ="{{asset('css/index.css')}}">
                <link rel="stylesheet" href ="{{asset('js/index.js')}}">
        
                <header>
                    <div class="container">
                        <div class="homepage">
                            <div class="homepagetitle">
                                <h3>○○小学校</h3>
                                <p>のマイページへようこそ！</p>
                            </div>
                        </div>
                    </div>
                </header>    
            
                <div id="form">
                    <div class="fish" id="fish"></div>
                    <div class="fish" id="fish2"></div>
                    <form id="waterform" action="/posts" method="POST">
                        <div class="row">
                        <div class="col-6">
                            <div class="card border2" style="width: 25rem;">
                                <div class="pic">
                                    <div class="card-body">
                                        <h5 class="card-title border5">学校連絡</h5>
                                        <div class='posts'>
                                            @if(Auth::user()->switches_id ==1)
                                            @csrf
                                            [<a href='/posts/create'>学校連絡追加</a>] 
                                            @endif(Auth::user()->id ==2)
                                            [<a href='/posts/school'>ページ確認</a>]
                                            <p class="listsap">
                                            @foreach ($schoolMails as $schoolmail)
                                                <form action="/posts/{{ $schoolmail->id }}" id="form_{{ $schoolmail->id }}" method="post" style="display:inline">
                                                    @if(Auth::user()->id ==1)
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">削除</button>
                                                    @endif
                                                    <div class='post'>
                                                        <h3 class='title'>{{ $schoolmail->title }}</h3>
                                                        <a href="/mails/{{ $schoolmail->id }}">{{ $schoolmail->title}}> </a>
                                                        <p>{{date('Y年m月d日', strtotime($schoolmail->created_at))}}</p>
                                                    </div>
                                                </form>
                                            @endforeach
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card border2" style="width: 25rem;">
                              <div class="pic">
                                <div class="card-body">
                                    <h5 class="card-title border5">{{Auth::user()->name}}様宛て連絡</h5>
                                    <div class='posts'>
                                        @if(Auth::user()->id ==1)
                                        @csrf
                                        <a href='/posts/create'>{{Auth::user()->name}}様宛て連絡追加</a>
                                        @endif(Auth::user()->id ==2)
                                        
                                        [<a href='/posts/guardian'>ページ確認</a>]
                                        @foreach($parentMails as $parentMail)
                                            <form action="/posts/{{ $parentMail->id }}" id="form_{{ $parentMail->id }}" method="post" style="display:inline">
                                            @if(Auth::user()->id ==1)
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">削除</button>
                                                @endif
                                                <div class='post'>
                                                    <h3 class='title'>{{ $parentMail->title }}</h3>
                                                    <a href="/mails/{{ $parentMail->id }}">{{ $parentMail->title}}> </a>
                                                    <p>{{date('Y年m月d日', strtotime($parentMail->created_at))}}</p>
                                                    
                                                </div>
                                            </form>
                                            @endforeach
                                    </div>
                                 </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                </form>
            </div>       
                    


        <script type="application/javascript">
        
                  var open = document.getElementById('open');
                  var close = document.getElementById('close');
                  var modal = document.getElementById('modal');
                  var mask = document.getElementById('mask');
                  
                  open.addEventListener('click', function () {
                  console.log('clickされました');
                    modal.classList.remove('hidden');
                    mask.classList.remove('hidden');
                  });
                  close.addEventListener('click', function () {
                    modal.classList.add('hidden');
                    mask.classList.add('hidden');
                  });
                  mask.addEventListener('click', function () {
                    modal.classList.add('hidden');
                    mask.classList.add('hidden');
                  });
        </script>    
@endsection