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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'HomePenelitianController@index');
Route::get('/tentang', 'HomePenelitianController@tentang')->name('tentang');
Route::get('/panduan-skripsi', 'HomePenelitianController@panduan')->name('panduan');
Route::get('/view/{slug}', 'HomePenelitianController@detail_skripsi')->name('detail_skripsi');

Auth::routes([
    'reset' => false
]);
//skripsi
Route::get('/penelitian/skripsi', 'HomeController@index')->name('skripsi');
Route::get('/penelitian/skripsi/edit', 'HomeController@edit_skripsi')->name('edit.skripsi');
Route::patch('/penelitian/skripsi/update', 'HomeController@update_skripsi')->name('update.skripsi');
Route::get('/penelitian/skripsi/upload_file', 'HomeController@create_file')->name('create.file');
Route::post('/penelitian/skripsi/upload', 'HomeController@upload_file')->name('upload.file');
Route::delete('/penelitian/skripsi/delete_file', 'HomeController@delete_file')->name('delete.file');

//jurnal
Route::get('/penelitian/jurnal', 'JurnalController@index')->name('jurnal');
Route::get('/penelitian/jurnal/create', 'JurnalController@create')->name('jurnal.create');
Route::post('/penelitian/jurnal/store', 'JurnalController@store')->name('jurnal.store');
Route::delete('/penelitian/jurnal/{id}', 'JurnalController@destroy')->name('jurnal.destroy');

//skpi
Route::resource('skpi', 'SkpiController');


Route::namespace('Admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('dosen', 'DosenController');
    Route::resource('mahasiswa', 'MahasiswaController');
    Route::get('/mahasiswa/{id}/skripsi', 'MahasiswaController@show_skripsi')->name('mahasiswa.skripsi');
    Route::get('/mahasiswa/{id}/skpi', 'MahasiswaController@show_skpi')->name('mahasiswa.skpi');
    Route::get('/mahasiswa/{id}/jurnal', 'MahasiswaController@show_jurnal')->name('mahasiswa.jurnal');
    Route::get('/update-publish/{id}', 'MahasiswaController@update_publish');
    Route::get('/update-approve/{id}', 'MahasiswaController@update_approve');
    //user
    Route::resource('user', 'UserController');
    Route::patch('/reset-password/{id}', 'UserController@reset_password')->name('reset-password');
});
