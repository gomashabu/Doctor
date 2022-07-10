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



Route::group(['middleware' => ['auth']], function(){
    Route::get('/posts/create', 'PostController@create'); //投稿作成画面
    Route::get('/posts/{post}/edit', 'PostController@edit')->where('post','[0-9]{0,3}');; //投稿編集画面
    Route::put('/posts/{post}', 'PostController@update')->where('post','[0-9]{0,3}');; //編集操作
    Route::post('/posts', 'PostController@store'); //投稿保存操作
    Route::delete('/posts/{post}', 'PostController@delete'); //投稿削除
    Route::post('/posts/comment/{post}', 'PostController@comment_store'); //コメントの保存
});



Route::get('/', 'PostController@index'); //一覧画面
Route::get('/posts/{post}', 'PostController@show')->where('post','[0-9]{0,3}'); //投稿詳細画面
Route::get('/categories/{category}', 'CategoryController@index'); //カテゴリー一覧画面



Auth::routes();

Route::get('/posts/search', 'GoodPointController@search'); //検索


Route::get('/home', 'HomeController@index')->name('home');