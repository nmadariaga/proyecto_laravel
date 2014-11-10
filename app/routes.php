<?php

Route::get('/', 'AuthController@getInicio');

Route::get('login', 'AuthController@getLogin');

Route::post('login', 'AuthController@postLogin');

Route::get('inicio', 'AuthController@getPerfil', array('before' => 'auth'));

Route::get('inicio2', 'AuthController@getAdmin', array('before' => 'auth'));

Route::get('logout', 'AuthController@getLogout', array('before' => 'auth'));

Route::get('/contacto', function() {
    return View::make('home/contacto');
});

Route::get('reminder', function() {
    return View::make('/reminder');
});

Route::get('/hello', function() {
    return View::make('hello');
});

Route::controller("/home", "HomeController");

Route::group(array('before' => 'auth'), function() {
    Route::controller("/test", "TestController");
    Route::controller("/articulos", "ArticulosController");
});






















