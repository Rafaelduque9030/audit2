<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});



Route::resource('personajes', 'PersonajesController')->middleware(['auth']);
Route::resource('comparador', 'ComparadorController')->middleware(['auth']);


Auth::routes(['register'=>true,'reset'=>true]);


Route::get('/home', 'HomeController@index')->name('home');


//Routes
Route::middleware(['auth'])->group(function(){
    //Roles
    Route::post('roles/store','RoleController@store')->name('roles.store')
    ->middleware('can:roles.create' );

    Route::get('roles','RoleController@index')->name('roles.index')
    ->middleware('can:roles.index' );

    Route::get('roles/create','RoleController@create')->name('roles.create')
    ->middleware('can:roles.create' );

    Route::put('roles/{role}','RoleController@update')->name('roles.update')
    ->middleware('can:roles.update' );

    Route::get('roles/{role}','RoleController@show')->name('roles.show')
    ->middleware('can:roles.show' );

    Route::delete('roles/{role}','RoleController@destroy')->name('roles.destroy')
    ->middleware('can:roles.destroy' );
    
    Route::get('roles/{role}/edit','RoleController@edit')->name('roles.edit')
    ->middleware('can:roles.edit' );

      //Products
      Route::post('products/store','ProductController@store')->name('products.store')
      ->middleware('can:products.create' );
  
      Route::get('products','ProductController@index')->name('products.index')
      ->middleware('can:products.index' );
  
      Route::get('products/create','ProductController@create')->name('products.create')
      ->middleware('can:products.create' );
  
      Route::put('products/{product}','ProductController@update')->name('products.update')
      ->middleware('can:products.update' );
  
      Route::get('products/{product}','ProductController@show')->name('products.show')
      ->middleware('can:products.show' );
  
      Route::delete('products/{product}','ProductController@destroy')->name('products.destroy')
      ->middleware('can:products.destroy' );
      
      Route::get('products/{product}/edit','ProductController@edit')->name('products.edit')
      ->middleware('can:products.edit' );

      //Users  
      Route::get('users','UserController@index')->name('users.index')
      ->middleware('can:users.index' );
   
      Route::put('users/{user}','UserController@update')->name('users.update')
      ->middleware('can:users.update' );
  
      Route::get('users/{user}','UserController@show')->name('users.show')
      ->middleware('can:users.show' );
  
      Route::delete('users/{user}','UserController@destroy')->name('users.destroy')
      ->middleware('can:users.destroy' );
      
      Route::get('users/{user}/edit','UserController@edit')->name('users.edit')
      ->middleware('can:users.edit' );

      //Comparar
      Route::get('personajes/create','PersonajesController@create')->name('personajes.create')
      ->middleware('can:personajes.create' );

        //Logs
        Route::get('logs/index','LogsController@index')->name('logs.index')
        ->middleware('can:logs.index' );

    
});


