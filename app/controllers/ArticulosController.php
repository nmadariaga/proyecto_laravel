<?php

class ArticulosController extends BaseController {

    protected $layout = 'layouts.master';

    public function getPublicacion($id = null) {
        $registros = Registros::find($id);
        return $this->layout->content = View::make('articulos.post', compact("registros"));
    }

    public function get_add($rut = null) {
        $perfil = Usuarios::where('rut', '=', $rut)->first(array("rut"));
        $autor = Funcionarios::where('rut', '=', $rut)->first(array('nombres'));
        return $this->layout->content = View::make('articulos.add', compact("perfil", "autor"));
    }

    public function get_busqueda($buscar = null) {
        $p = Input::get('buscar');
        $datos = Registros::where('tipo_documento', 'LIKE','%'.$p.'%' )
        ->orwhere('materia', 'LIKE', '%'.$p.'%')
        ->orwhere('procedencia', 'LIKE', '%'.$p.'%')
        ->paginate(8);
        return View::make('articulos.busqueda', compact("datos"));
    }

    public function get_categoria() {
        $n = Input::get('tipo');
        $datos = Registros::where('tipo_fk', '=', $n)->get();
        return View::make('articulos.busqueda', compact("datos"));
    }
      

    public function post_add() {
        $inputs = Input::All();
        $reglas = array
            (
            'tipo_documento' => 'unique:registros|min:5',
            'materia' => 'min:5',
            'procedencia' => 'min:5'
        );
        $validar = Validator::make($inputs, $reglas);
        if ($validar->fails()) {
            return Redirect::back()->withErrors($validar)->withInput();
        } else {


            $inputs = Input::All();
            $n = new Registros();
            $n->tipo_documento = $inputs["tipo_documento"];
            $n->procedencia = $inputs["procedencia"];
            $n->materia = $inputs["materia"];
            $n->fecha = date("d-m-Y");
            $n->rut = $inputs["rut"];
            $n->autor = $inputs["autor"];
            $n->save();
            Session::flash('mensaje', 'Su registro se ingresó correctamente');
            return Redirect::to('inicio');
        }
    }
    public function get_editar($id = null) {
        $datos = Registros::find($id);
        return $this->layout->content = View::make('articulos/editar', compact("datos"));
    }

    public function post_editar() {
        $inputs = Input::All();
        $reglas = array
            (
            'tipo_documento' => 'unique:registros|min:5',
            'materia' => 'min:5',
            'procedencia' => 'min:5'
        );
        $validar = Validator::make($inputs, $reglas);
        if ($validar->fails()) {
            return Redirect::back()->withErrors($validar)->withInput();
        } else {
            $n = Registros::find($inputs['id']);
            $n->tipo_documento = $inputs["tipo_documento"];
            $n->procedencia = $inputs["procedencia"];
            $n->materia = $inputs["materia"];
            $n->fecha = date("Y-m-d");
            $n->save();
            Session::flash('mensaje', 'Su registro se actualizo correctamente');
            return Redirect::to('inicio');
        }
    }

    public function getDelete($id = null) {
            $borrar = Registros::find($id);
            $borrar->delete();
            return Redirect::to('inicio');
        
        
    }

}
