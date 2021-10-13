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

Auth::routes([
    'reset' => false
]);

Route::get('/penelitian/skripsi', 'HomeController@index')->name('skripsi');
Route::get('/penelitian/skripsi/edit', 'HomeController@edit_skripsi')->name('edit.skripsi');
Route::patch('/penelitian/skripsi/update', 'HomeController@update_skripsi')->name('update.skripsi');
Route::get('/penelitian/skripsi/upload_file', 'HomeController@create_file')->name('create.file');
Route::post('/penelitian/skripsi/upload', 'HomeController@upload_file')->name('upload.file');
Route::delete('/penelitian/skripsi/delete_file', 'HomeController@delete_file')->name('delete.file');

Route::namespace('Admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('dosen', 'DosenController');
    Route::resource('mahasiswa', 'MahasiswaController');
    Route::get('/mahasiswa/{id}/skripsi', 'MahasiswaController@show_skripsi')->name('mahasiswa.skripsi');
    //user
    Route::resource('user', 'UserController');
    Route::patch('/reset-password/{id}', 'UserController@reset_password')->name('reset-password');
});
