<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/clear-cache', function() {
  $exitCode = Artisan::call('config:clear');
  $exitCode = Artisan::call('cache:clear');
  $exitCode = Artisan::call('config:cache');
  return 'DONE'; //Return anything
});


Route::get('/', function () {
    return view('index');
});

Route::group(['middleware' => 'auth'], function() {
  //Route::get('/', 'HomeController@index')->name('index');
  Route::get('/folders/{folder}/tasks', 'TaskController@index')->name('tasks.index');
  Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
  Route::post('/folders/create', 'FolderController@create');
  Route::get('/folders/{folder}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
  Route::post('/folders/{folder}/tasks/create', 'TaskController@create');
  Route::get('/folders/{folder}/tasks/{task}/edit', 'TaskController@showEditForm')->name('tasks.edit');
  Route::post('/folders/{folder}/tasks/{task}/edit', 'TaskController@edit');
});
Auth::routes();

