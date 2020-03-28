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

// Route::get('/', 'PagesController@root')->name('root');

Route::post('/admin/api/upload', 'PagesController@apiImageUpload');

Route::get('/', 'TopicsController@index')->name('topics.index');

Route::get('topics/{topic}', 'TopicsController@show')->name('topics.show');

Route::get('labels/{label}', 'LabelsController@show')->name('labels.show');

Route::get('categories/{category}', 'CategoriesController@show')->name('categories.show');
