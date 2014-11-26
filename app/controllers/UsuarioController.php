<?php

class UsuarioController extends BaseController {

    protected $layout = 'layouts.master';

    public function get_datos($id = null) {
        if (Auth::user()->rol_fk == 1) {
            $rut = Auth::user()->rut;           
            $perfil = Funcionarios::find($id);          
            $dpto = Departamentos::find($perfil->departamento_fk);
            return $this->layout->content = View::make('usuario/datos', compact('rut', 'perfil', 'dpto'));
        }
    }
    
    

    public function get_editar($id = null) {
        $datos = Funcionarios::find($id);
        return $this->layout->content = View::make('usuario/editarperfil', compact("datos"));
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
        return Redirect::to('usuario/datos/'.$data->id);
    }

    
}
