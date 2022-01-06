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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/company/index','CompanyController@index');
Route::get('/company/tambah','CompanyController@tambah');
Route::post('/company/store','CompanyController@store');
Route::get('/company/hapus/{id}','CompanyController@hapus');
Route::get('/company/edit/{id}','CompanyController@edit');

Route::post('/company/edit/update','CompanyController@update');
Route::get('/company/cetak_pdf','CompanyController@cetak_pdf');

Route::get('/company/edit','CompanyController@index');
Route::get('/company/hapus','CompanyController@index');
// php artisan make:controller CompanyController

Route::get('/employes/index','EmployesController@index');
Route::get('/employes/tambah','EmployesController@tambah');
Route::post('/employes/store','EmployesController@store');
Route::get('/employes/hapus/{id}','EmployesController@hapus');
Route::get('/employes/edit/{id}','EmployesController@edit');
Route::post('/employes/edit/update','EmployesController@update');
Route::get('/employes/cetak_pdf','EmployesController@cetak_pdf');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
