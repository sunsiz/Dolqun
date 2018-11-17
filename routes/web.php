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

Route::namespace('Home')->group(function () {
    Route::get('/', 'IndexController@index')->name('home');

    //登录
    Route::get('login', 'LoginController@create')->name('login');
    Route::post('login', 'LoginController@store')->name('login');
    //退出
    Route::get('logout', 'LoginController@destroy')->name('logout');
    //注册
    Route::get('register', 'RegisterController@create')->name('register');
    Route::post('register', 'RegisterController@store')->name('register');
    //注册激活账户
    Route::get('register/confirmEmail/{token}', 'RegisterController@confirmEmail')->name('confirmEmail');

    //用户
    Route::resource('user', 'UserController');

    Route::get('user/{user}/avatar', 'UserController@avatar')->name('user.avatar');
    Route::post('avatar', 'UserController@avatarStore')->name('user.setAvatar');
    Route::post('post_thumb', 'PostController@thumbStore')->name('post.thumb');
    Route::get('user/{user}/password', 'UserController@password')->name('user.password');
    Route::post('user/{user}/password', 'UserController@setPassword')->name('user.setPassword');

    //文章
    Route::resource('posts', 'PostController');
    Route::resource('articles', 'ArticleController');
    Route::resource('qamus', 'QamusController');
    Route::resource('filghetes', 'FilghetesController');
    Route::resource('photos', 'PhotosController');
    Route::post('thumb', 'ArticleController@thumb')->name('article.thumb');
    //标签
    //Route::resource('tag', 'TagController');

});
