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

// Others routes
Route::get('/', 'NoticiaController@main_section')->name('main');
Route::get('/ver-noticias', 'NoticiaController@show_users_notices')->name('show-notices-user');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ver mas', function(){
    return view('others.vermas');
})->name('vermas');
Route::get('/acciones',function () {
    return view('acciones.acciones');
})->name('acciones')->middleware(['auth','permission:noticias.all','permission:deportes.all']);
Route::post('/create-schedule', 'DeporteController@createHorario')->name('create-schedule')->middleware(['auth']);
Route::get('/show-schedule', 'DeporteController@ShowHorarios')->name('show-schedule');
Auth::routes();
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
// Ruta DAC
Route::get('dac/','DacController@index')->name('dac.index');
Route::get('dac/create','DacController@create')->name('dac.create');
Route::post('dac/store','DacController@store')->name('dac.store');
Route::get('dac/user_index','DacController@index_users')->name('dac.users');
Route::get('dac/{id}','DacController@show')->name('dac.show');
Route::post('dac/subcategories','DacController@get_subcategories')->name('dac.getsubcategories');
Route::get('/imagen_dacs/{filename}','DacController@getImage')->name('get_image_dac');
Route::get('/filter','DacController@search')->name('filter_dac');
// Route::get('/DAC_/index_user', [
//     'as' => 'dac_user',
//     'uses' => 'DacController@show_alls'  
// ]);
// Route::post('/DAC_/index_user', [
//     'as' => 'dac_user_filter',
//     'uses' => 'DacController@filter'  
// ]);
// Route::post('/DAC_/get_subcategories/',[
//     'as' => 'getSubcategories',
//     'uses' => 'DacController@get_subcategories'  
// ]);
// UsersRoutes
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
