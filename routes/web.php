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

Route::get('/','NoticiaController@main_section')->name('main');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Route::middleware([''])->group(function () {
    //Rutas de noticias 
Route::resource('noticias', 'NoticiaController');
// Capturar la imagen de noticias
Route::get('/imagen/{filename}',[
    'as' => 'imageNotice',
    'uses' => 'NoticiaController@getImage'
]);
// });