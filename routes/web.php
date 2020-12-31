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

Route::get('/', 'FrontendController@index')->name('index');
Route::get('/read/{slug}&sourceId={id}', 'FrontendController@single')->name('single.index');

Route::post('/comment/store', 'CommentsController@store')->name('comment.add');
Route::post('/reply/store', 'CommentsController@replyStore')->name('reply.add');

Auth::routes();

Route::get('/results', function(){
    $posts = \App\Post::where('title','like',  '%' . request('query') . '%')->get();
    return view('dynamic.search')->with('posts', $posts)
            ->with('title', 'Search results : ' . request('query'))
            ->with('categories', \App\Category::all())
            ->with('query', request('query'));
});

// ADMIN Middleware for admin functionality and view
Route::group(['prefix' => 'user', 'throttle' => '60:1', 'middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/post', 'PostsController@index')->name('post.index');
    Route::post('/post/create', 'PostsController@store')->name('post.store');
    Route::get('/post/delete/{id}', 'PostsController@destroy')->name('post.delete');
    Route::get('/post/edit/{id}', 'PostsController@edit')->name('post.edit');
    Route::post('/post/update/{id}', 'PostsController@update')->name('post.update');
    Route::get('/post/trash', 'PostsController@trashed')->name('post.trash');
    Route::get('/post/kill/{id}', 'PostsController@kill')->name('post.kill');
    Route::get('/post/restore/{id}', 'PostsController@restore')->name('post.restore');


    Route::get('/category', 'CategoriesController@index')->name('category.index');
    Route::post('/category/create', 'CategoriesController@store')->name('category.store');
    Route::get('/category/delete/{id}', 'CategoriesController@destroy')->name('category.delete');
    Route::get('/category/edit/{id}', 'CategoriesController@edit')->name('category.edit');
    Route::post('/category/update/{id}', 'CategoriesController@update')->name('category.update');

    Route::get('/users', 'AuthorsController@index')->name('user.index');
    Route::post('/user/store', 'AuthorsController@store')->name('user.store');
    Route::get('/user/admin/{id}', 'AuthorsController@admin')->name('user.admin');
    Route::get('/user/not-admin/{id}', 'AuthorsController@not_admin')->name('user.not.admin');
    Route::get('/user/delete/{id}', 'AuthorsController@destroy')->name('user.delete');

    Route::get('/profile', 'ProfilesController@index')->name('profile.index');
    Route::post('/profile/update', 'ProfilesController@update')->name('profile.update');
});

