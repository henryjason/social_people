<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('after' => 'auth'), function () {

Route::get('login', 'HomeController@login');
Route::get('register', 'HomeController@register');


Route::get('logout', 'UserController@logout');

Route::resource('fblogin', 'UserController@fblogin');
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::get('auth', 'UserController@isLogged');


});

Route::group(array('before' => 'auth'), function () {
  
     Route::get('user/{nick}', 'UserController@index'); 
    Route::resource('serchuser', 'UserController@serchuser'); 
    Route::resource('editarperfil', 'UserController@editar_perfil'); 

    Route::resource('seguir', 'SeguirController@seguir');
    Route::resource('estado_seguir', 'SeguirController@estado_seguir');

    Route::resource('bloquear', 'BloqueoController@bloquear');
    Route::resource('estado_bloqueo', 'BloqueoController@estado_bloqueo');

     Route::resource('solicitud', 'SolicitudController@solicitud');
    Route::resource('estado_solicitud', 'SolicitudController@estado_solicitud');
     Route::resource('getsolicitud', 'SolicitudController@getsolicitud');
     Route::get('putsolicitud/{id}/{estado}', 'SolicitudController@putsolicitud'); 
   

    Route::resource('editarAvatar', 'AvatarController@editarAvatar');
    Route::resource('deleteAvatar', 'AvatarController@deleteAvatar');
    Route::resource('editar_perfil', 'EditarController@index');
   


	Route::get('/', 'HomeController@index');

    Route::resource('hums', 'HumsController@index');
    Route::resource('getHums', 'HumsController@getHums');

    Route::get('hashtag/{id}', 'HashtagController@index'); 
    Route::resource('getHashtag', 'HashtagController@getHashtag');
    Route::resource('serchashtag', 'HashtagController@serchashtag');
    

});