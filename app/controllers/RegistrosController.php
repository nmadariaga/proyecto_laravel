<?php

class RegistrosController extends BaseController {

    protected $layout = 'layouts.master';
    

    public function getPublicacion($id = null) {
        $registros = Registros::find($id);
        $doc = TipoDoc::find($registros->tipo_documento_fk);
        $proc = Procedencia::find($registros->procedencia_fk);
        return $this->layout->content = View::make('registros.post', compact("registros",'doc','proc'));
    }

    public function get_add() {
        $rut = Auth::user()->rut;
        $perfil = Usuarios::where('rut', '=', $rut)->first(array("rut"));
        $autor = Funcionarios::where('rut', '=', $rut)->first(array('nombres'));
        return $this->layout->content = View::make('registros.add', compact("perfil", "autor"));
    }
    public function get_registros() {
        $rut = Auth::user()->id;
        $datos = Registros::where('usuario_fk','=',$rut)->orderBy('fecha','desc')->paginate(5);
        $tipo = TipoDoc::all();
        return View::make('/registros/registros', compact(array("datos", "rut","doc",'tipo')));
    }
    
    public function get_busqueda() {
        
        return View::make('registros.busqueda');
    }
    public function get_procedencia() {
        
        return View::make('registros.procedencia');
    }
     public function get_documento() {
        
        return View::make('registros.documento');
    }
    public function get_resultados() {
        $tipos = TipoDoc::all();
        $datos = Registros::where(function ($query) {
                    $rut = Auth::user()->rut;
                    $query->where('rut', '=', $rut);
                })->where(function ($query) {
                    $p = Input::get('buscar');
                    $query->where('materia', 'LIKE', '%' . $p . '%')
                            ->orwhere('observaciones', 'LIKE', '%' . $p . '%');
                            
                })->paginate(8);
                
        return View::make('registros.resultados', compact(array('datos','tipos')));
    }
     public function get_resultadofecha() {
        $tipos = TipoDoc::all();
        $datos = Registros::where(function ($query) {
                    $rut = Auth::user()->rut;
                    $query->where('rut', '=', $rut);
                })->where(function ($query) {
                    $p = Input::get('fecha');
                    $query->where('fecha_recep', '=',  $p );
                            
                            
                })->paginate(8);
                
        return View::make('registros.resultados', compact(array('datos','tipos')));
    }
    public function get_filtros() {
        $tipos = TipoDoc::all();
        $datos = Registros::where(function ($query) {
                    $rut = Auth::user()->rut;
                    $query->where('rut', '=', $rut);
                })->where(function ($query) {
                    $p = Input::all();
                    $query->where('tipo_documento_fk', '=', $p['tipo_documento'] )
                            ->where('procedencia_fk', '=', $p['procedencia'] );
                            
                })->paginate(8);
                
        return View::make('registros.resultados', compact(array('datos','tipos')));
    }
    
    
    public function post_resultados($buscar = null) {

        $datos = Registros::where(function ($query) {
                    $rut = Auth::user()->rut;
                    $query->where('rut', '=', $rut);
                })->where(function ($query) {
                    $p = Input::get('buscar');
                    $query->where('materia', 'LIKE', '%' . $p . '%')
                            ->orwhere('observaciones', 'LIKE', '%' . $p . '%');
                            
                })->paginate(8);
        return View::make('registros.resultados', compact("datos"));
    }

    public function post_add() {
        $inputs = Input::All();
        $reglas = array
            (
            'materia' => 'min:5',
            'observaciones' => 'min:5',
            'numero' =>'integer'
        );
        $validar = Validator::make($inputs, $reglas);
        if ($validar->fails()) {
            return Redirect::back()->withErrors($validar)->withInput();
        } else {


            $inputs = Input::All();
            $n = new Registros();
            $n->tipo_documento_fk = $inputs["nombre"];
            $n->numero_registro = $inputs["numero"];
            $n->procedencia_fk = $inputs["procedencia"];
            $n->materia = $inputs["materia"];
            $n->observaciones = $inputs["observaciones"];
            $n->rut = $inputs["rut"];
            $n->autor = $inputs["autor"];
            $n->fecha_recep = $inputs["fecha"];
            $n->usuario_fk = Auth::user()->id;
            $n->save();
            Session::flash('mensaje', 'Su registro se ingresó correctamente');
            return Redirect::to('inicio');
        }
    }
     public function post_procedencia() {
        $inputs = Input::All();
        $reglas = array
            (
            'nombre' => 'min:3|unique:procedencia'
        );
        $validar = Validator::make($inputs, $reglas);
        if ($validar->fails()) {
            return Redirect::back()->withErrors($validar)->withInput();
        } else {


            $inputs = Input::All();
            $n = new Procedencia();
            $n->nombre = $inputs["nombre"];
            $n->descripcion = $inputs["descripcion"];
            $n->save();
            Session::flash('nuevo', 'Su registro se ingresó correctamente');
            return Redirect::to('registros/add');
        }
    }
        public function post_documento() {
        $inputs = Input::All();
        $reglas = array
            (
            'nombre' => 'min:3|unique:tipo_doc'
        );
        $validar = Validator::make($inputs, $reglas);
        if ($validar->fails()) {
            return Redirect::back()->withErrors($validar)->withInput();
        } else {


            $inputs = Input::All();
            $n = new TipoDoc();
            $n->nombre = $inputs["nombre"];
            $n->descripcion = $inputs["descripcion"];
            $n->save();
            Session::flash('nuevo', 'Su registro se ingresó correctamente');
            return Redirect::to('registros/add');
        }
    }

    public function get_editar($id = null) {
        $datos = Registros::find($id);
        return $this->layout->content = View::make('registros/editar', compact("datos"));
    }

    public function post_editar() {
        $inputs = Input::All();
        $reglas = array
            (
           
            'materia' => 'min:5',
   
            'observaciones' => 'min:5'
        );
        $validar = Validator::make($inputs, $reglas);
        if ($validar->fails()) {
            return Redirect::back()->withErrors($validar)->withInput();
        } else {
            $n = Registros::find($inputs['id']);
            $n->tipo_documento_fk = $inputs["tipo_documento"];
            $n->numero_registro = $inputs["numero_registro"];
            $n->procedencia_fk = $inputs["procedencia"];
            $n->materia = $inputs["materia"];
            $n->observaciones = $inputs["observaciones"];
            date_default_timezone_set('america/santiago');
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
        return view::make('registros/confirmar', compact('registros'));
    }

}
