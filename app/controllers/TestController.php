<?php

class TestController extends BaseController {

    protected $layout = 'layouts.master';
    public function get_datos() {
        if (Auth::user()->rol_fk == 1) {
            $rut = Auth::user()->rut;
            $perfil = Funcionarios::where('rut', '=', $rut)->get();
            //$dpto = (integer)$perfil;
            $dpto = Departamentos::find(1);
            return $this->layout->content = View::make('test/datos', compact('rut', 'perfil', 'dpto'));
        }
    }

    public function get_datosadmin() {
        if (Auth::user()->rol_fk == 2) {
            $rut = Auth::user()->rut;
            $perfil2 = Administradores::where('rut', '=', $rut)->get();
            return $this->layout->content = View::make('test/datosadmin', compact('rut', 'perfil2'));
        }
    }

    public function get_registro() {
        return $this->layout->content = View::make('test.registro');
    }

    public function post_registro() {
        $input = Input::all();
        $reglas = array
            (
            'rut' => 'unique:usuarios',
            'contrasena' => 'min:6',
            'email' => 'email',
        );

        $validar = Validator::make($input, $reglas);
        if ($validar->fails()) {
            return Redirect::back()->withErrors($validar)->withinput();
        } else {
            $rol = Input::get('rol');

            if ($rol == 1) {

                $data = new Funcionarios;
                $data->rut = Input::get('rut');
                $data->nombres = Input::get('nombres');
                $data->apellidos = Input::get('apellidos');
                $data->departamento_fk = Input::get('departamento');
                $data->email = Input::get('email');
                $data->genero = Input::get('genero');
                $data->save();
                $usuario = new Usuarios;
                $usuario->rut = Input::get('rut');
                $contrasena = Hash::make($input['contrasena']);
                $usuario->contrasena = $contrasena;
                $usuario->remember_token = $contrasena;
                $usuario->rol_fk = Input::get('rol');
                $usuario->save();
                Session::flash('completo', 'Usuario Registrado Satisfactoriamente.');
                return Redirect::to('inicio2');
            }
            if ($rol == 2) {

                $data = new Administradores;
                $data->rut = Input::get('rut');
                $data->nombres = Input::get('nombres');
                $data->apellidos = Input::get('apellidos');
                $data->departamento_fk = Input::get('departamento');
                $data->email = Input::get('email');
                $data->genero = Input::get('genero');
                $data->save();
                $usuario = new Usuarios;
                $usuario->rut = Input::get('rut');
                $contrasena = Hash::make($input['contrasena']);
                $usuario->contrasena = $contrasena;
                $usuario->remember_token = $contrasena;
                $usuario->rol_fk = Input::get('rol');
                $usuario->save();
                Session::flash('completo', 'Usuario Registrado Satisfactoriamente.');
                return Redirect::to('test/registro');
            }
        }
    }

    public function get_editar($id = null) {
        $datos = Funcionarios::find($id);
        return $this->layout->content = View::make('test/editarperfil', compact("datos"));
    }

    public function post_editar() {
        $inputs = Input::All();
        $reglas = array
            (
            'email' => 'email',
        );
        $validar = Validator::make($inputs, $reglas);
        if ($validar->fails()) {
            return Redirect::back()->withErrors($validar)->withInput();
        } else
            $data = Funcionarios::find($inputs['id']);
        $data->nombres = Input::get('nombres');
        $data->apellidos = Input::get('apellidos');
        $data->email = Input::get('email');
        $data->save();
        Session::flash('mensaje', 'sus datos se actualizaron correctamente');
        return Redirect::to('test/datos');
    }

    public function get_editaradmin($id = null) {
        $datos = Administradores::find($id);
        return $this->layout->content = View::make('test/editaradmin', compact("datos"));
    }

    public function post_editaradmin() {
        $inputs = Input::All();
        $reglas = array
            (
            'email' => 'email',
        );
        $validar = Validator::make($inputs, $reglas);
        if ($validar->fails()) {
            return Redirect::back()->withErrors($validar)->withInput();
        } else
            $data = Administradores::find($inputs['id']);
        $data->nombres = Input::get('nombres');
        $data->apellidos = Input::get('apellidos');
        $data->email = Input::get('email');
        $data->direccion = Input::get('direccion');
        $data->save();
        Session::flash('completo', 'sus datos se actualizaron correctamente');
        return Redirect::to('test/editaradmin');
    }

}
