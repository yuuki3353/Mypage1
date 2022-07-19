<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'mailController@index')->middleware('auth');// ログインしないとアクセスできない
Route::get('/mail', 'mailController@index');
Route::get('/posts/index', 'mailController@index');
//Hoomページ
Route::get('/mails/{mail}', 'mailController@show');
Route::get('/posts/create', 'mailController@create')->name("mail");
//追加・編集ページ
Route::get('/posts/school', 'mailController@school');
//学校連絡ページ

Route::get('/posts/guardian', 'mailController@guardian');
//保護者連絡ページ

Route::get('/posts/calendar', 'mailController@calendar');
Route::post('/posts', 'mailController@store');




//ブログ投稿編集画面表示　URI:/posts/{mail}/　リクエスト種別:GET　コントローラ:edit関数
Route::put('/mails/{mail}', 'mailController@update');
//ブログ投稿編集実行　URI:/posts/{mail}　リクエスト種別：PUT　コントローラ：mailController:update関数
Route::get('/posts/guardiancreate','mailController@create')->name("guardian");
Route::delete('/posts/{mail}', 'mailController@delete');
Route::get('/posts/{mail}/edit','mailController@edit');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register/re', 'UserController@register');//アカウント新規登録画面の表示

Route::get('/calendar', function(){
    return view('calendar');
});

Route::post('/schedule-add', 'mailController@scheduleAdd')->name('schedule-add');//イベントの追加
Route::post('/schedule-get', 'mailController@scheduleGet')->name('schedule-get');//イベントの取得
Route::post('/schedule-delete',['maailController::class','scheduleDelete'])->name('schedule-delete');//イベントの削除処理




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');