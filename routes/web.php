
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

//form
Route::get('/', function () {
    return view('form');
});
Route::get('form', 'MainController@form');
Route::post('form', 'MainController@store');

//login
Route::get('/login', 'MainController@index');
Route::post('/login/checklogin', 'MainController@checklogin');

//admin
Route::get('manage', 'MainController@manage');
Route::get('login/logout', 'MainController@logout');

//export
Route::get('/manage/excel', 'ExportController@excel')->name('export.excel');
Route::get('/manage/csv', 'ExportController@csv')->name('export.csv');
