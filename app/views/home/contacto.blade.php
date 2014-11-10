@extends('layouts.inicio')
@section('contenido')


                <h2>Contactenos</h2>
                <h3>Ud. puede contactarnos a los siguientes e-mails ante cualquier duda:</h3>
                <h4>pdro.gonzalez@gmail.com</h4>
                <h3>Link's de interes</h3>
                <a href="http://www.utem.cl/">Pagina de la universidad UTEM</a></br>
                <a href="http://informatica.utem.cl/">Pagina de la escuela de informatica, UTEM</a></br>
                <a href="http://bienestarestudiantil.blogutem.cl/ ">Servicio bienestar estudiantil, UTEM</a>
                <br> 
                <h3><a href="{{ URL::to('/') }}">Volver atrás</a></h3>
                </br>


@stop

