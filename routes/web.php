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

Route::get('', function() {
    return redirect('mechanics');
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'mechanics'], function(){
    Route::get('', 'MechanicController@index')->name('mechanic.index');
    Route::get('/new', 'MechanicController@new')->name('mechanic.new');
    Route::post('/new', 'MechanicController@save')->name('mechanic.save');
    Route::get('/delete/{id}', 'MechanicController@delete')->name('mechanic.delete');
    Route::get('/filterA', 'MechanicController@filterAsc')->name('mechanic.filterAsc');
    Route::get('/filterD', 'MechanicController@filterDesc')->name('mechanic.filterDesc');
    Route::get('/trucks/{id}', 'MechanicController@showTrucks')->name('mechanic.showTrucks');
});

Route::group(['prefix' => 'trucks'], function(){
    Route::get('', 'TruckController@index')->name('truck.index');
    Route::get('/new', 'TruckController@new')->name('truck.new');
    Route::post('/new', 'TruckController@save')->name('truck.save');
    Route::get('/delete/{id}', 'TruckController@delete')->name('truck.delete');
    Route::get('/filterA', 'TruckController@filterAsc')->name('truck.filterAsc');
    Route::get('/filterD', 'TruckController@filterDesc')->name('truck.filterDesc');
    Route::get('/filterAM', 'TruckController@filterAscMech')->name('truck.filterAscMech');
    Route::get('/filterDM', 'TruckController@filterDescMech')->name('truck.filterDescMech');
    Route::get('/update/{id}', 'TruckController@update')->name('truck.update');
    Route::post('/edit/{id}', 'TruckController@edit')->name('truck.edit');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
