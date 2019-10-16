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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/', 'Admin\HomeController@index')->name('admin-home');

    //User Controller
    Route::get('user', 'Admin\UserController@index')->name('users');
    Route::get('user/create', 'Admin\UserController@create')->name('user-create');
    Route::post('user/store', 'Admin\UserController@store')->name('user-store');
    Route::get('user/edit/{id}', 'Admin\UserController@edit')->name('user-edit');
    Route::post('user/edit', 'Admin\UserController@update')->name('user-update');
    Route::delete('user/{id}', 'Admin\UserController@destroy')->name('user-delete');

    //User Controller
    Route::get('mitra', 'Admin\MitraController@index')->name('users');

    //Kerjasama Controller
    Route::get('kerjasama', 'Admin\KerjasamaController@index');
    Route::get('kerjasama/create', 'Admin\KerjasamaController@create');
    Route::post('kerjasama/store', 'Admin\KerjasamaController@store');
    Route::get('kerjasama/edit/{id}', 'Admin\KerjasamaController@edit');
    Route::post('kerjasama/edit', 'Admin\KerjasamaController@update');
    Route::delete('kerjasama/{id}', 'Admin\KerjasamaController@destroy');
    Route::get('kerjasama/download/{id}', 'Admin\KerjasamaController@download');
    Route::get('kerjasama/cari', 'Admin\KerjasamaController@cari');
    Route::get('kerjasama/akan_berakhir', 'Admin\KerjasamaController@akan_berakhir');
    Route::get('kerjasama/berakhir', 'Admin\KerjasamaController@berakhir');
    Route::get('kerjasama/aktif', 'Admin\KerjasamaController@aktif');

    //Realisasi Kerjasama
    Route::get('realisasi-kerjasama', 'Admin\RealisasiKerjasamaController@index');
    Route::get('realisasi-kerjasama/create', 'Admin\RealisasiKerjasamaController@create');
    Route::post('realisasi-kerjasama/store', 'Admin\RealisasiKerjasamaController@store');
    Route::get('realisasi-kerjasama/edit/{id}', 'Admin\RealisasiKerjasamaController@edit');
    Route::post('realisasi-kerjasama/edit', 'Admin\RealisasiKerjasamaController@update');
    Route::delete('realisasi-kerjasama/{id}', 'Admin\RealisasiKerjasamaController@destroy');
    Route::get('realisasi-kerjasama/download/{id}', 'Admin\RealisasiKerjasamaController@download');
    Route::get('realisasi-kerjasama/cari', 'Admin\RealisasiKerjasamaController@cari');


    //Realisasi Kerjasama
    Route::get('rencana-kerjasama', 'Admin\RencanaKerjasamaController@index');
    // Route::get('rencana-kerjasama/create', 'Admin\RencanaKerjasamaController@create');
    // Route::post('rencana-kerjasama/store', 'Admin\RencanaKerjasamaController@store');
    // Route::get('rencana-kerjasama/edit/{id}', 'Admin\RencanaKerjasamaController@edit');
    // Route::post('rencana-kerjasama/edit', 'Admin\RencanaKerjasamaController@update');
    // Route::delete('rencana-kerjasama/{id}', 'Admin\RencanaKerjasamaController@destroy');
    Route::get('rencana-kerjasama/download/{id}', 'Admin\RencanaKerjasamaController@download');
});

//user protected routes
Route::group(['middleware' => ['auth', 'user'], 'prefix' => 'user'], function () {
    Route::get('/', 'User\HomeController@index')->name('user-home');

    Route::get('profile', 'User\ProfileController@index');

    //Realisasi Kerjasama
    Route::get('rencana-kerjasama', 'User\RecanaKerjasamaController@index');
    Route::get('rencana-kerjasama/create', 'User\RecanaKerjasamaController@create');
    Route::post('rencana-kerjasama/store', 'User\RecanaKerjasamaController@store');
    Route::get('rencana-kerjasama/edit/{id}', 'User\RecanaKerjasamaController@edit');
    Route::post('rencana-kerjasama/edit', 'User\RecanaKerjasamaController@update');
    Route::delete('rencana-kerjasama/{id}', 'User\RecanaKerjasamaController@destroy');
    Route::get('rencana-kerjasama/download/{id}', 'User\RecanaKerjasamaController@download');

    Route::get('ganti_password', 'User\GantiPasswordController@index');

    Route::post('ganti_password/ubah', 'User\GantiPasswordController@ubah');
});
