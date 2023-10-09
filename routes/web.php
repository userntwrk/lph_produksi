<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\CombineController;

// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
// Route::get('index/create', 'ReportController@autofill')->name('index.autofill');
// Route::post('index/create', 'ReportController@autofill')->name('index.autofill');

Route::resource('/index', ReportController::class);
Route::get('/create/getdata', 'App\Http\Controllers\ReportController@getdata')->name('create.getdata');
Route::get('/index', 'App\Http\Controllers\ReportController@search')->name('index.search');
Route::get('/noreg', 'App\Http\Controllers\ReportController@getnoreg');


Route::resource('/report', DataController::class);
Route::post('/report/import', 'App\Http\Controllers\DataController@import')->name('report.import');
// Route::get('/laporan', 'App\Http\Controllers\DataController@laporan')->name('report.laporan');
// Route::get('/laporan/pdf', 'App\Http\Controllers\DataController@export')->name('report.pdf');

Route::resource('/laporan', CombineController::class);
// Route::get('/export', 'App\Http\Controllers\CombineController@export');
Route::group(
    ['middleware' => ['auth']],
    function () {        
        Route::get('/export/{selectedDate?}/{note?}', 'App\Http\Controllers\CombineController@export')->name('export');
        // Route::get('/laporan/export/{selectedDate}', 'App\Http\Controllers\CombineController@export')->name('export');
        Route::get('/pickDate', 'App\Http\Controllers\CombineController@pickDate')->name('pickDate');
        Route::get('/refresh', 'App\Http\Controllers\CombineController@getProcedure')->name('refresh');
        Route::get('/clear', 'App\Http\Controllers\CombineController@cleanData')->name('clear');
    }
);

Auth::routes();

Route::resource('/profile', 'App\Http\Controllers\UserController');

// just for test
Route::get('/demo', 'App\Http\Controllers\DemoController@displayTable')->name('demo');