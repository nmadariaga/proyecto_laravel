<?php

class AdminController extends BaseController {

    protected $layout = 'layouts.master';

    public function get_datosadmin() {
            $rut = Auth::user()->rut;
            $perfil2 = Administradores::where('rut', '=', $rut)->get();
            return $this->layout->content = View::make('admin/datosadmin', compact('rut', 'perfil2'));
    }

    public function get_registro() {
         
        return $this->layout->content = View::make('admin.registro');
        
    }
    
    public function post_registro() {
        $input = Input::all();
        $reglas = array
            (
            'rut' => 'unique:usuarios',
            'contrasena' => 'min:6',
            'email' => 'email',
            'contrasena_confirmation'=> 'same:contrasena'
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
                $usuario->contrasena_confirmation = $contrasena;
                $usuario->remember_token = $contrasena;
                $usuario->rol_fk = Input::get('rol');
                $usuario->email = Input::get('email');
                $usuario->save();
                Session::flash('completo', 'Usuario Registrado Satisfactoriamente.');
                return Redirect::to('inicio2');
            }
            if ($rol == 2) {

                $data = new Administradores;
                $data->rut = Input::get('rut');
                $data->nombres = Input::get('nombres');
                $data->apellidos = Input::get('apellidos');
                //$data->departamento_fk = Input::get('departamento');
                $data->email = Input::get('email');
                $data->genero = Input::get('genero');
                $data->save();
                $usuario = new Usuarios;
                $usuario->rut = Input::get('rut');
                $contrasena = Hash::make($input['contrasena']);
                $usuario->contrasena = $contrasena;
                $usuario->contrasena_confirmation = $contrasena;
                $usuario->remember_token = $contrasena;
                $usuario->rol_fk = Input::get('rol');
                $usuario->email = Input::get('email');
                $usuario->save();
                Session::flash('completo', 'Usuario Registrado Satisfactoriamente.');
                return Redirect::to('inicio2');
            }
        }
    }

    public function get_usuarios() {
        $datos = Funcionarios::all();
        $dpto = Departamentos::find(1);
        return $this->layout->content = View::make('admin/usuarios', compact("datos", "dpto"));
    }

    public function get_editaradmin($id = null) {
        $datos = Administradores::find($id);
        return $this->layout->content = View::make('admin/editaradmin', compact("datos"));
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
            $user = Auth::user()->id;
            $usuario = Usuarios::find($user);
            $data->nombres = Input::get('nombres');
            $data->apellidos = Input::get('apellidos');
            $data->email = Input::get('email');
            $data->save();
            $usuario->email = Input::get('email');
            $usuario->save();
            Session::flash('completo', 'sus datos se actualizaron correctamente');
            return Redirect::to('admin/datosadmin');
    }

}
