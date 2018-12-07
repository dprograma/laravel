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
Route::get('site', function(){
		return view('layouts.app');
	});
Route::group(['middleware' => ['web']], function(){
	//slug
	Route::get('blog/{slug}', ['uses' => 'blogController@getSingle', 'as' => 'blog.single'])->where('slug','[\w\d\-\_]+');
	//categories
	Route::resource('categories', 'categoryController', ['except' => ['create', 'show', 'destroy']]);
	//tags
	Route::resource('tags', 'tagController', ['except' => ['create']]);
	//comments
	Route::post('comments/{post_id}', ['uses' => 'commentsController@store', 'as' => 'comments.store']);
	Route::get('comments/{id}/edit', ['uses' => 'commentsController@edit', 'as' => 'comments.edit']);
	Route::put('comments/{id}', ['uses' => 'commentsController@update', 'as' => 'comments.update']);
	Route::delete('comments/{id}', ['uses' => 'commentsController@destroy', 'as' => 'comments.destroy']);
	Route::get('comments/{id}', ['uses' => 'commentsController@delete', 'as' => 'comments.delete']);
	//pages
	Route::get('blog', ['uses' => 'blogController@getIndex', 'as' => 'blog.index']);
	Route::get('about', 'pageController@about');
	Route::get('contact', 'pageController@contact');
	Route::get('welcome', 'pageController@index');
	Route::post('contact', 'pageController@postContact');
	//posts
	Route::resource('posts','postController');
	
});
//test route

Route::get('test','TestController@index');

//phpinfo

Route::get('phpinfo', function(){
	phpinfo();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
