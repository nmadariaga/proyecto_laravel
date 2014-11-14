<?php

class ReminderController extends BaseController {

    public function remind() {
        return View::make('password/remind');
    }

    public function request() {
        $credentials = array(
            'email' => Input::get('email')
        );
        $reglas = array
            (
            'email' => 'email|exists:usuarios'
        );

        $validar = Validator::make($credentials, $reglas);
        if ($validar->fails()) {
            return Redirect::back()->withErrors($validar)->withinput();
        }else{
            Password::remind($credentials);
            return Redirect::back()->with('success','Se ha enviado un mail para reestablecer su contraseña');
        }
            
        }
      
    public function reset($token) {
        return View::make('password/reset')->with('token', $token);
    }

    public function update() {
        $credentials = array(
  			'email'                 => Input::get('email'),
  			'contrasena'              => Input::get('password'),
  			'contrasena_confirmation' => Input::get('password_confirmation'),
  			'token'                 => Input::get('token')
  		);
        $response = Password::reset($credentials, function($user, $contrasena)
		{
			$user->contrasena = Hash::make($contrasena);
			$user->save();
		});
		switch ($response)
		{
			case Password::INVALID_PASSWORD:
                                return Redirect::back()->with('error', 'La contraseña debe tener a lo menos 6 caracteres y deben coincidir');
			case Password::INVALID_TOKEN:
                                return Redirect::back()->with('error', 'El tiempo de reestablecimiento ha expirado');
			case Password::INVALID_USER:
				return Redirect::back()->with('error', 'No se encuentra el usuario');
			case Password::PASSWORD_RESET:
				return Redirect::to('home/ingreso')->with('mensaje', 'Su contraseña ha sido reestablecida');
		}

    }

}
