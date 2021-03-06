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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(["prefix"=>"admin","middleware"=> "admin.auth"],function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/demo','HomeController@demo');

    Route::get("/book/create","HomeController@bookCreate");
    Route::post("/book/create","HomeController@bookSave");

    Route::get("book/edit","HomeController@bookEdit");
    Route::post("book/edit","HomeController@bookUpdate");

    Route::get("book","HomeController@books");

    Route::get("book/delete/{book_id}","HomeController@bookDelete");

    Route::get("author","HomeController@authors");
    Route::get("author/detail","HomeController@authorDetail");
});
Route::get("view_notify",function (){
   return view("view_notify");
});
Route::get("push_notify","HomeController@pushNotify");