<?php

class AuthController extends BaseController {

    public function getInicio() {
        if (Auth::check()) {
            if (Auth::user()->rol_fk == 1)
                return Redirect::to('inicio');
            else
                return Redirect::to('inicio2');
        } else
            return View::make('/home/hello');
    }

    public function getLogin() {
        return View::make('login');
    }

    public function postLogin() {
        $input = Input::all();

        $user_data = array(
            'rut' => Input::get('rut'),
            'contrasena' => Input::get('contrasena')
        );

        if (Auth::attempt($user_data)) {
            if (Auth::user()->rol_fk == 2)
                return Redirect::to('inicio2');
            else {
                if (Auth::user()->rol_fk == 1)
                    return Redirect::to('inicio');
                else
                    return Redirect::to('/home/ingreso')->with('mensaje', 'Rut o Contraseña Incorrectos. ')->withInput();
            }
        } else
            return Redirect::to('/home/ingreso')->with('mensaje', 'Rut o Contraseña Incorrectos. ')->withInput();
    }

    public function get_reset() {
        return View::make('password/contrasena');
    }
    
    public function get_resetadmin() {
        return View::make('password/contrasenadmin');
    }

    public function post_reset() {

        $rules = array(
            'contraseña' => 'min:6',
            'confirmar_contraseña' => 'same:contraseña'
        );
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails()) {
            return Redirect::to('password/contrasena')->withErrors($validation)->withInput();
        } else {
            if (Hash::check(Input::get('password_old'), Auth::user()->contrasena)) {

                $user = Auth::user();
                $user->contrasena = Hash::make(Input::get('contraseña'));
                $user->save();
                return Redirect::back()->with('reset', 'Su contraseña ha sido modificada');
            } else
                return Redirect::to('/password/contrasena')->with('incorrecta', 'Contraseña Incorrecta. ')->withInput();
        }
    }public function post_resetadmin() {

        $rules = array(
            'contraseña' => 'min:6',
            'confirmar_contraseña' => 'same:contraseña'
        );
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails()) {
            return Redirect::to('password/contrasena')->withErrors($validation)->withInput();
        } else {
            if (Hash::check(Input::get('password_old'), Auth::user()->contrasena)) {

                $user = Auth::user();
                $user->contrasena = Hash::make(Input::get('contraseña'));
                $user->save();
                return Redirect::back()->with('reset', 'Su contraseña ha sido modificada');
            } else
                return Redirect::to('/password/contrasenadmin')->with('incorrecta', 'Contraseña Incorrecta. ')->withInput();
        }
    }

    public function getPerfil() {

        $rut = Auth::user()->rut;
        $perfil = Funcionarios::where('rut', '=', $rut)->get();
        $datos = Registros::where('rut', '=', $rut)->orderBy('fecha', 'desc')->paginate(5);
        return View::make('/test/perfil', compact(array("datos", "perfil", "rut")));
    }

    public function getAdmin() {

        $rut = Auth::user()->rut;
        $perfil2 = Administradores::where('rut', '=', $rut)->get();
        return View::make('/test/admin', compact(array("perfil2", "rut")));
    }

    public function getLogout() {
        if (Auth::check()) {
            Auth::logout();
            return Redirect::to('/')->with('salir', 'Gracias por visitarnos!.');
        }
        return Redirect::to('/');
    }

}
