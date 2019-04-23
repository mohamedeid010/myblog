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
Route::group(['prefix'=>'admin'],function(){
  Route::get('/main', function () {
      return view('admin.main');
  })->name('main');
  Route::get('/posts','PostsController@index')->name('posts');
  Route::get('/posts/getdata','PostsController@getdata')->name('posts.getdata');
  Route::get('/post/add','PostsController@create')->name('post.add');
  Route::post('/post/store','PostsController@store')->name('post.store');
  Route::get('/post/edit/{id}','PostsController@edit')->name('post.edit');
  Route::get('/post/delete/{id}','PostsController@delete')->name('post.delete');
});
