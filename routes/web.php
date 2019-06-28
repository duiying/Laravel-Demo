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

Route::get('/', 'IndexController@index');

Route::get('/post/create', 'PostController@create');
Route::post('/post/create', 'PostController@save');
Route::get('/post/{post_id}', 'PostController@detail')->name('post.detail');
Route::post('/post/{post_id}/comment', 'PostController@comment')->name('post.comment')->middleware(['auth', 'comment.limit']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
