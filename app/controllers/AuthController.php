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
            'contrasena' => Input::get('contrasena'),
            //'rol_fk' => Input::get('rol')
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

    public function getPerfil() {
        if (Auth::user()->rol_fk == 1) {
            $rut = Auth::user()->rut;
            $perfil = Funcionarios::where('rut', '=', $rut)->get();
            $datos = Registros::orderBy('fecha','desc')->paginate(5);
            return View::make('/test/perfil', compact(array("datos", "perfil", "rut")));
        } else
            return Redirect::to('/home/hello');
    }

    public function getAdmin() {
        if (Auth::user()->rol_fk == 2) {
            $rut = Auth::user()->rut;
            $perfil2 = Administradores::where('rut', '=', $rut)->get();
            return View::make('/test/admin', compact(array("perfil2", "rut")));
        } else
            return Redirect::to('/home/hello');
    }

    public function getLogout() {
        if (Auth::check()) {
            Auth::logout();
            return Redirect::to('/')->with('salir', 'Gracias por visitarnos!.');
        }
        return Redirect::to('/');
    }

}
