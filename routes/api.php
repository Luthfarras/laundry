<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//petugas
Route::post('register', 'PetugasController@register');
Route::post('login', 'PetugasController@login');
Route::get('/', function(){
  return Auth::user()->level;
})->middleware('jwt.verify');
Route::get('user', 'PetugasController@getAuthenticatedUser')->middleware('jwt.verify');

//jenis
// Route::get('jenis','jenisController@index')->middleware('jwt.verify');
Route::post('/add_jn','JenisController@store')->middleware('jwt.verify');
Route::put('/up_jn/{id}','JenisController@update')->middleware('jwt.verify');
Route::get('/get_jn','JenisController@tampil')->middleware('jwt.verify');
Route::delete('/del_jn/{id}','JenisController@destroy')->middleware('jwt.verify');

//pelanggan
// Route::get('pelanggan','pelangganController@index')->middleware('jwt.verify');
Route::post('/add_pl','PelangganController@store')->middleware('jwt.verify');
Route::put('/up_pl/{id}','PelangganController@update')->middleware('jwt.verify');
Route::get('/get_pl','PelangganController@tampil')->middleware('jwt.verify');
Route::delete('/del_pl/{id}','PelangganController@destroy')->middleware('jwt.verify');

//detail
// Route::get('ftayang','FTController@index')->middleware('jwt.verify');
Route::post('/add_dt','DetailController@store')->middleware('jwt.verify');
Route::put('/up_dt/{id}','DetailController@update')->middleware('jwt.verify');
// Route::get('/tampil_dt','DetailController@tampil')->middleware('jwt.verify');
Route::delete('/del_dt/{id}','DetailController@destroy')->middleware('jwt.verify');

//trans
// Route::get('trans','transController@index')->middleware('jwt.verify');
Route::post('/add_tr','TransController@store')->middleware('jwt.verify');
Route::put('/up_tr/{id}','TransController@update')->middleware('jwt.verify');
Route::post('/get_tr/{tgl_trans}/{tgl_selesai}','TransController@show')->middleware('jwt.verify');
Route::delete('/del_tr/{id}','TransController@destroy')->middleware('jwt.verify');
