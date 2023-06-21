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

Route::get('/', function () {
    return view('login');
});

Route::namespace('App\Http\Controllers')->group(function () {
    Route::name('login.')->group(function () {
        Route::get('login', 'LoginController@show')->name('show');
        Route::post('login', 'LoginController@login')->name('action');
        Route::get('logout', 'LoginController@logout')->name('logout');
    });

    Route::name('register.')->group(function () {
        Route::get('register', 'RegisterController@show')->name('show');
        Route::post('register', 'RegisterController@register')->name('action');
    });

    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

    Route::group(['middleware' => ['auth:users','AksesHelpdesk']], function() { 
        Route::group(['prefix'=>'helpdesk-tiket','as'=>'helpdesk.tiket.'], function(){
            Route::get('/', 'TiketController@index')->name('index');
            Route::post('/simpan', 'TiketController@simpan')->name('simpan');
            Route::post('/update', 'TiketController@update')->name('update');
            Route::post('/delete', 'TiketController@delete')->name('delete');
        });
    });
    
    Route::group(['middleware' => ['auth:users','AksesPIC']], function() { 
        Route::group(['prefix'=>'pic-tiket','as'=>'pic.tiket.'], function(){
            Route::get('/', 'TiketController@index')->name('index');
            Route::post('/simpan', 'TiketController@simpan')->name('simpan');
            Route::post('/update-status', 'TiketController@update_status')->name('update.status');
        });
        Route::group(['prefix'=>'pic-laporan-weekly','as'=>'pic.laporan.weekly.'], function(){
            Route::get('/', 'LaporanWeeklyController@index')->name('index');
            Route::post('/simpan', 'LaporanWeeklyController@simpan')->name('simpan');
            Route::post('/update', 'LaporanWeeklyController@update')->name('update');
            Route::post('/delete', 'LaporanWeeklyController@delete')->name('delete');
            Route::get('/get-tiket', 'LaporanWeeklyController@getTiket')->name('getTiket');
        });
    });
    
    Route::group(['middleware' => ['auth:users','AksesMaintenance']], function() { 
        Route::group(['prefix'=>'maintenance-laporan-kegiatan','as'=>'maintenance.laporan.kegiatan.'], function(){
            Route::get('/', 'LaporanKegiatanController@index')->name('index');
            Route::post('/simpan', 'LaporanKegiatanController@simpan')->name('simpan');
            Route::post('/update', 'LaporanKegiatanController@update')->name('update');
            Route::post('/delete', 'LaporanKegiatanController@delete')->name('delete');
        });
    });
    
    Route::group(['middleware' => ['auth:users','AksesManager']], function() {
        Route::group(['prefix'=>'manager-laporan-weekly','as'=>'manager.laporan.weekly.'], function(){
            Route::get('/', 'TiketController@index')->name('index');
        }); 
        Route::group(['prefix'=>'manager-laporan-kegiatan','as'=>'manager.laporan.kegiatan.'], function(){
            Route::get('/', 'TiketController@index')->name('index');
        });
    });
});
