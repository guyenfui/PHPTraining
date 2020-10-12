
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('welcome', 'MainController@index1');
Route::post('welcome', 'MainController@store');

Route::get('/uploadfile', 'UploadfileController@index');
Route::post('/uploadfile', 'UploadfileController@upload');
Route::get('/login', 'MainController@index');
Route::post('/login/checklogin', 'MainController@checklogin');
Route::get('login/successlogin', 'MainController@successlogin');
//Route::get('login/admin', 'MainController@successlogin');
Route::get('login/logout', 'MainController@logout');

// Email related routes

Route::get('/sendemail', 'SendEmailController@index');
Route::post('/sendemail/send', 'SendEmailController@send');

//show contact
Route::post('/CreateContact', 'ContactController@storeContact');
Route::get('/getContacts', 'ContactController@getAllContacts');

//export

Route::get('/login/successlogin/excel', 'ExportController@excel')->name('export.excel');
Route::get('/login/successlogin/csv', 'ExportController@csv')->name('export.csv');