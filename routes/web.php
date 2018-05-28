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




// Route::post('/post/create', 'PostController@store')->name('post.store');


Auth::routes();

Route::get('auth/activate', 'Auth\ActivationController@activate')->name('auth.activate');

Route::get('auth/activate/resend', 'Auth\ActivationResendController@showResendForm')->name('auth.activate.resend');

Route::post('auth/activate/resend', 'Auth\ActivationResendController@resend')->name('auth.activate.resend');;


Route::get('/', 'HomeController@index')->name('home');
Route::post('/', 'HomeController@store')->name('home.store');
Route::delete('/{id}/delete', 'HomeController@destroy')->name('home.destroy');

Route::post('/{id}/comment', 'HomeCommentController@store')->name('home.comment.store');
Route::delete('/{id}/comment/delete', 'HomeCommentController@destroy')->name('home.comment.destroy');


Route::resource('/caribarengan','CariBarenganController');
Route::resource('/caribarengan/{id}/comment', 'CariBarenganCommentController')->only([
    'store'
])->names(['store'=>'caribarengancomment.store']);
Route::resource('/caribarengancomment', 'CariBarenganCommentController')->only([
    'destroy'
])->names(['destroy' => 'caribarengancomment.destroy']);

Route::get('/calendar', 'CalendarController@index')->name('calendar');
Route::get('/loadCalendar', 'CalendarController@loadData')->name('calendar.load');

Route::get('/tentang', 'TentangController@index')->name('tentang');
Route::post('tentang', 'TentangController@update');


Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile', 'ProfileController@update');
Route::delete('/profile', 'ProfileController@destroy')->name('user.destroy');

Route::get('/galeri', 'GaleriController@index')->name('galeri');