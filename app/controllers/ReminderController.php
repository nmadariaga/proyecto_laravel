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
            'email' => 'email'
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
            'email' => Input::get('email'),
            'contrasena' => Input::get('password'),
            //'password_confirmation'=>Input::get('password_confirmation')
            );

        return Password::reset($credentials, function($usuarios, $password) {
                    $usuarios->contrasena = Hash::make($password);
                     //$usuarios->password_confirmation = Hash::make($password_confirmation);
                    $usuarios->save();

                    return Redirect::to('home/ingreso')->with('mensaje', 'Su contraseña ha sido reestablecida');
                });
    }

}
