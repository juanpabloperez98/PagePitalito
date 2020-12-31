<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;


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

Route::get('/', 'NoticiaController@main_section')->name('main');
Route::get('/ver-noticias', 'NoticiaController@show_users_notices')->name('show-notices-user');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Rutas de noticias 
Route::resource('noticias', 'NoticiaController');
// Capturar la imagen de noticias
Route::get('/imagen/{filename}', [
    'as' => 'imageNotice',
    'uses' => 'NoticiaController@getImage'
]);

// Rutas Deportes
Route::resource('deportes', 'DeporteController');

// Capturar la imagen de deportes
Route::get('/imagen_deportes/{filename}', [
    'as' => 'imageDeporte',
    'uses' => 'DeporteController@getImage'
]);


Route::middleware(['auth'])->group(function () {
    Route::get('/porfile/{filename}', function ($filename) {
        $file = \Storage::disk('photos_porfile')->get($filename);
        return new Response($file, 200);
    })->name('getPorfileImage');

    Route::get('user/edit',[
        'as' => 'UserEdit',
        'uses' => 'UserController@edit'
    ]);

    Route::post('user/store/{user}',[
        'as' => 'UserUpdate',
        'uses' => 'UserController@update'
    ]);
});
