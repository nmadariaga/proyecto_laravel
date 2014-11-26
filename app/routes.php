<?php

Route::get('/', 'AuthController@getInicio');

Route::get('login', 'AuthController@getLogin');

Route::post('login', 'AuthController@postLogin');

Route::group(array('before' => 'auth'), function() {

    Route::get('inicio', 'AuthController@getPerfil');

    Route::get('inicio2', 'AuthController@getAdmin');

    Route::get('logout', 'AuthController@getLogout');
});

Route::get('password/remind', 'ReminderController@remind');

Route::get('password/contrasena', 'AuthController@get_reset');

Route::post('password/contrasena/', 'AuthController@post_reset');

Route::get('password/contrasenadmin', 'AuthController@get_resetadmin');

Route::post('password/contrasenadmin/', 'AuthController@post_resetadmin');

Route::post('password/remind', 'ReminderController@request');

Route::post('password/reset/{token}','ReminderController@update');

Route::get('/contacto', function() {
    return View::make('home/contacto');
});
Route::get('password/reset/{token}','ReminderController@reset');

Route::get('/hello', function() {
    return View::make('hello');
});

Route::controller("/home", "HomeController");

Route::group(array('before' => 'auth'), function() {
    Route::group(array('before' => 'admin'), function() {

        Route::controller("/admin", "AdminController");
    });
    Route::group(array('before' => 'usuario'), function() {
        Route::controller("/usuario", "UsuarioController");
        Route::controller("/articulos","ArticulosController");
        
    });
});






















