<?php

class ArticulosController extends BaseController {

    protected $layout = 'layouts.master';
    

    public function getPublicacion($id = null) {
        $registros = Registros::find($id);
        return $this->layout->content = View::make('articulos.post', compact("registros"));
    }

    public function get_add() {
        $rut = Auth::user()->rut;
        $perfil = Usuarios::where('rut', '=', $rut)->first(array("rut"));
        $autor = Funcionarios::where('rut', '=', $rut)->first(array('nombres'));
        return $this->layout->content = View::make('articulos.add', compact("perfil", "autor"));
    }
    public function get_registros() {
        $rut = Auth::user()->rut;
        $datos = Registros::where('rut','=',$rut)->orderBy('fecha','desc')->paginate(5);
        return View::make('/articulos/registros', compact(array("datos", "rut")));
    }
    
    public function get_busqueda() {
        
        return View::make('articulos.busqueda');
    }
    
    public function post_resultados($buscar = null) {

        $datos = Registros::where(function ($query) {
                    $rut = Auth::user()->rut;
                    $query->where('rut', '=', $rut);
                })->where(function ($query) {
                    $p = Input::get('buscar');
                    $query->where('materia', 'LIKE', '%' . $p . '%')
                            ->orwhere('procedencia', 'LIKE', '%' . $p . '%')
                            ->orwhere('tipo_documento', 'LIKE', '%' . $p . '%');
                })->paginate(8);
        return View::make('articulos.resultados', compact("datos"));
    }

    public function post_add() {
        $inputs = Input::All();
        $reglas = array
            (
            'tipo_documento' => 'unique:registros|min:5',
            'materia' => 'min:5',
            'procedencia' => 'min:5',
            'observaciones' => 'min:5'
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
            $n->observaciones = $inputs["observaciones"];
            $n->rut = $inputs["rut"];
            $n->autor = $inputs["autor"];
            $n->fecha_recep = $inputs["fecha"];
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
            'tipo_documento' => 'min:5',
            'materia' => 'min:5',
            'procedencia' => 'min:5',
            'observaciones' => 'min:5'
        );
        $validar = Validator::make($inputs, $reglas);
        if ($validar->fails()) {
            return Redirect::back()->withErrors($validar)->withInput();
        } else {
            $n = Registros::find($inputs['id']);
            $n->tipo_documento = $inputs["tipo_documento"];
            $n->procedencia = $inputs["procedencia"];
            $n->materia = $inputs["materia"];
            $n->observaciones = $inputs["observaciones"];
            date_default_timezone_set('UTC');
            $n->fecha = date('Y-m-d H:m:s',time());
            $n->save();

            Session::flash('mensaje', 'Su registro se actualizo correctamente');
            return Redirect::to('inicio');
        }
    }

    public function get_delete($id = null) {
        $borrar = Registros::find($id);
        $borrar->delete();
        return Redirect::to('inicio')->with('borrar', 'El registro se elimino satisfactoriamente');
    }

    public function get_confirmar($id = null) {
        $registros = Registros::find($id);
        return view::make('articulos/confirmar', compact('registros'));
    }

}
