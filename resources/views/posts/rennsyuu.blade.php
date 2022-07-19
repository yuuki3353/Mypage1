<header>
  <h1>Contact us</h1>
</header>

<div id="form">

<div class="fish" id="fish"></div>
<div class="fish" id="fish2"></div>

<form id="waterform" method="post">

<div class="formgroup" id="name-form">
    <label for="name">Your name*</label>
    <input type="text" id="name" name="name" />
</div>

    <div class="formgroup" id="titlename-form">
        <label for="title">タイトル*</label>
        <input type="message" name="mail[title]" placeholder="タイトル" value="{{ old('mail.title') }}"/>
        <input name="mail[user_id]" type="text" value={{Auth::id()}} />
        </div>
        
        
    <div class="formgroup" id="message-form">
        <label for="message">内容*</label>
        <textarea name="mail[body]" placeholder="今日も1日お疲れ様でした。">{{ old('mail.body') }}</textarea>
            <p class="body__error" style="color:red">{{ $errors->first('mail.body') }}</p>
        </div>
        <input type="submit" value="保存" />
        <div class="back">[<a href="/">back</a>]</div>
    </form>
</div>


<center>
                <h1>追加</h1>
                
                <div id="form">
                    <div class="fish" id="fish"></div>
                    <div class="fish" id="fish2"></div>
                </div>
                
                <form  id="waterform" action="/posts" method="POST">
                    @csrf
                    <div class="formgroup_category" id="">
                        <h3>カテゴリー</h3>
                            <select name="mail[category_id]">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                            <div class="form">
                                <h2>タイトル</h2>
                                <input type="text" name="mail[title]" placeholder="タイトル" value="{{ old('mail.title') }}"/>
                                <p class="title__error" style="color:red">{{ $errors->first('mail.title') }}</p>
                                <input name="mail[user_id]" type="hidden" value={{Auth::id()}} />
                            </div>
                                <div class="body">
                                <h3>内容</h3>
                                <textarea name="mail[body]" placeholder="今日も1日お疲れさまでした。">{{ old('mail.body') }}</textarea>
                                <p class="body__error" style="color:red">{{ $errors->first('mail.body') }}</p>
                                </div>
                                <input type="submit" value="保存"/>
                            <div class="back">[<a href="/">back</a>]</div>
                    </div>
                </form>
            </center