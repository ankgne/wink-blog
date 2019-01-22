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

//Index page
Route::get('/', 'blogController@index')->name('blog.home');

Route::get('/tags/{tagSlug}', 'blogController@tagPageIndex')->name('blog.tag.index');

//Pagination page
Route::get('/posts/page/{pageNum}', 'blogController@index')->name('post.pagination');

//Single post page
Route::get('/post/{slug}', 'blogController@showSinglePost')->name('single.blog.show');

