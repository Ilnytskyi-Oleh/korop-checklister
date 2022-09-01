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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::group(['middleware' => 'auth'], function(){
    Route::group(['prefix' => 'admin','as' => 'admin.','middleware' => 'is_admin'], function(){
        Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);
        Route::resource('checklist_groups', \App\Http\Controllers\Admin\ChecklistGroup::class);
        Route::resource('checklists', \App\Http\Controllers\Admin\Checklist::class);
    });
});


