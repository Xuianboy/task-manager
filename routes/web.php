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


/*Route::get('/admin/tasks','App\Http\Controllers\TaskController@index')->middleware(['role.check:'.App\Models\Role::ADMIN, 'auth']);*/
Route::group(['namespace'=>'App\Http\Controllers'],function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/','TaskController@index')->name('tasks.index');
    Route::get('/tasks/create','TaskController@create')->name('tasks.create');
    Route::post('/tasks/store','TaskController@store')->name('tasks.store');
    Route::group(['prefix'=>'admin','middleware' => ['auth', 'role.check:'.\App\Models\Role::ADMIN]],function (){
        Route::get('/tasks','Admin\TaskController@index')->name('admin.tasks.index');
        Route::get('/tasks/{task}','Admin\TaskController@edit')->name('admin.tasks.edit');
        Route::put('/tasks/{task}/update','Admin\TaskController@update')->name('admin.tasks.update');
        Route::delete('/tasks/{task}/delete','Admin\TaskController@delete')->name('admin.tasks.delete');
    });
});
Auth::routes();

