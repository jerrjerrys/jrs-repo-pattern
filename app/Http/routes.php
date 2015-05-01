<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::any('/', function(){
    return view('jrs.index');
});

Route::controller('/user', 'Repo\UserModule\UserController');
Route::controller('/product', 'Repo\ProductModule\ProductController');
Route::controller('/store', 'Repo\StoreModule\StoreController');
