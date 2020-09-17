<?php

//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    /*RUTAS DEL MENU*/
    Route::get('/menu', 'MenuController@index')->name('menu');
    Route::post('/menu', 'MenuController@store')->name('guardar_menu');
    Route::get('/menu/{id?}', 'MenuController@show')->name('editar_menu');
    Route::put('/menu/{id}', 'MenuController@update')->name('actualizar_menu');
    Route::delete('/menu/{id}', 'MenuController@destroy')->name('eliminar_menu');
    Route::post('menu/guardar-orden', 'MenuController@guardarOrden')->name('guardar_orden');
    /*RUTAS ROL*/
    Route::get('/rol', 'RolController@index')->name('rol');
    Route::post('/rol', 'RolController@store')->name('crear_rol');
    Route::get('rol/{id}', 'RolController@show')->name('editar_rol');
    Route::put('rol/{id}', 'RolController@update')->name('actualizar_rol');
    Route::delete('rol/{id}', 'RolController@destroy')->name('eliminar_rol');
    /*RUTAS DE PERMISO*/
    Route::get('/permiso', 'PermisoController@index')->name('permiso');
    Route::post('/permiso', 'PermisoController@Store')->name('crear_permiso');
    Route::get('/permiso/{id}', 'PermisoController@show')->name('editar_permiso');
    Route::put('/permiso/{id}', 'PermisoController@update')->name('actualizar_permiso');
    Route::delete('/permiso/{id}', 'PermisoController@destroy')->name('eliminar_permiso');
});
