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
Route::get('/read/{slug}', 'FrontendController@single')->name('single.index');
Route::get('/category&sourceid={id}', 'FrontendController@category')->name('category.index');

Route::post('/comment/store', 'CommentsController@store')->name('comment.add');
Route::post('/reply/store', 'CommentsController@replyStore')->name('reply.add');

Route::get('/results', 'FrontendController@search');
Route::get('/category/{id}', 'FrontendController@category')->name('category.all');

Auth::routes();


// ADMIN Middleware for admin functionality and view
Route::group(['prefix' => 'user', 'throttle' => '60:1', 'middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/posts', 'PostsController@index')->name('post.index');
    Route::get('/post/add', 'PostsController@create')->name('post.create');
    Route::post('/post/create', 'PostsController@store')->name('post.store');
    Route::get('/post/delete/{id}', 'PostsController@destroy')->name('post.delete');
    Route::get('/post/edit/{id}', 'PostsController@edit')->name('post.edit');
    Route::post('/post/update/{id}', 'PostsController@update')->name('post.update');
    Route::get('/post/trash', 'PostsController@trashed')->name('post.trash');
    Route::get('/post/kill/{id}', 'PostsController@kill')->name('post.kill');
    Route::get('/post/restore/{id}', 'PostsController@restore')->name('post.restore');
    Route::post('/post/delete/all', 'PostsController@postDelete')->name('post.multiple');
    Route::post('/post/trash/all', 'PostsController@postTrash')->name('post.destroy');
    // Wp-media
    Route::get('/wp-media/all', 'PostsController@media')->name('post.media');
    Route::get('/wp-media/delete', 'PostsController@deleteMedia')->name('media.delete');


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
    Route::get('/user/create', 'AuthorsController@create')->name('user.create');
    Route::post('/user/delete/all', 'AuthorsController@multipleDelete')->name('user.multiple');

    Route::get('/profile', 'ProfilesController@index')->name('profile.index');
    Route::post('/profile/update', 'ProfilesController@update')->name('profile.update');

    Route::get('/comments', 'CommentsController@index')->name('comment.index');
    Route::get('/comment/delete/{id}', 'CommentsController@destroy')->name('comment.delete');
    Route::post('/comment/delete/all', 'CommentsController@multipleDelete')->name('comment.multiple');

    Route::get('/adverts', 'AdvertsController@index')->name('advert.index');
    Route::post('/advert/stop/ads', 'AdvertsController@advertStop')->name('advert.multiple');
    Route::post('/advert/delete/ads', 'AdvertsController@advertTrash')->name('advert.trashed');
    Route::get('/advert/add', 'AdvertsController@create')->name('advert.create');
    Route::get('/advert/trashed', 'AdvertsController@trashed')->name('advert.trash');
    Route::post('/advert/create', 'AdvertsController@store')->name('adverts.store');
    Route::get('/advert/restore/{id}', 'AdvertsController@restore')->name('advert.restore');
});

