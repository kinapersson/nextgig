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

// Route::get('/', function () {
//     return view('welcome');
// });

//Om man vill se hela listan med vilka routes man har i sin applikation: artisan route:list

Route::get('/', 'PagesController@index');
Route::get('about/', 'PagesController@about');
Route::get('/services', 'PagesController@services');

//Här skapas alla nödvändiga routes för den controllern
Route::resource('spelningar', 'PostsController');

//Exempel på dynamisk routing:
// Route::get('/users/{id}', function ($id) {
//     return 'this is user '.$id;
// });


Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
