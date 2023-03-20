<?php

use Illuminate\Support\Facades\Route;

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

Route::group([
    'middleware' => ['guest'],
],function () {
    Route::get('login', function () {
        return view('login');
    })->name('login');
    Route::post('/login', "LoginController@login")->name('login.post');
});

Route::group([
    'middleware' => ['auth'],
],function () {
    Route::group([
        'middleware' => ['auth'],
    ],function () {
        Route::get('/users', "UsersController@index")->name('users');
        Route::get('/user', "UsersController@create")->name('user.new');
        Route::post('/user', "UsersController@createPost")->name('user.new.post');
        Route::get('/user/{id}', "UsersController@edit")->name('user.get');
        Route::post('/user/{id}', "UsersController@editPost")->name('user.get.post');
        Route::get('/user/delete/{id}', "UsersController@delete")->name('user.delete');
        Route::post('/user/delete/{id}', "UsersController@deletePost")->name('user.delete.post');

        Route::get('/keys', "APIKeysController@indexPage")->name('keys');
        Route::get('/key', "APIKeysController@create")->name('key.new');
        Route::post('/key', "APIKeysController@createPost")->name('key.new.post');
        Route::get('/key/{id}', "APIKeysController@edit")->name('key.edit');
        Route::post('/key/{id}', "APIKeysController@editPost")->name('key.edit.post');
        Route::get('/key/delete/{id}', "APIKeysController@delete")->name('key.delete');
        Route::post('/key/delete/{id}', "APIKeysController@deletePost")->name('key.delete.post');
    });
    Route::get('logout', "LoginController@logout")->name("logout");
    Route::get('/', "FileController@index")->name("home");
    Route::get('/file/downloadOrigin/{id}', "FileController@download")->name("file.download");
    Route::get('/file/add', "FileController@add")->name("file.new");
    Route::post('/file/add', "FileController@addPost")->name("file.new.post");
    Route::get('/file/{id}', "FileController@get")->name("file.get");
    Route::post('/file/{id}', "FileController@update")->name("file.get.post");
    Route::get('/file/delete/{id}', "FileController@delete")->name("file.delete");
    Route::post('/file/delete/{id}', "FileController@deletePost")->name("file.delete.post");

    Route::get('/file/check/{id}', "FileController@check")->name("file.check");
    Route::get("/file/check/google/{id}", "FileController@checkGoogle")->name('file.check.google');

    Route::get('/raport/{id}', "CheckController@index")->name("check.raport");
    Route::get('/raportGoogle/{id}', "CheckController@indexGoogle")->name("check.raportGoogle");

    Route::get('/pdf-mini/{id}', "PDFController@mini")->name('pdf-mini');
    Route::get('/pdf-max/{id}', "PDFController@max")->name('pdf-max');
    Route::get('/pdf-mini/g/{id}', "PDFController@miniG")->name('pdf-mini-g');
    Route::get('/pdf-max/g/{id}', "PDFController@maxG")->name('pdf-max-g');

    //copypaste DB values
    Route::get('/multi', "FileController@multiPliLines");
    Route::get('/tempgoogle/{id}', "CheckController@google");
    Route::get('/temp/{id}', "FileController@temp");
    Route::get('/temppdf/{id}', "PDFController@temp")->name('pdf');

});
