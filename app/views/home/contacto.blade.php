@extends('layouts.inicio')
@section('contenido')


                <h2>Contáctenos</h2>
                <h3>Ud. puede contactárnos a los siguientes e-mails ante cualquier duda:</h3>
                <h4>pdro.gonzalez@gmail.com</h4>
                <h3>Link's de interes</h3>
                <a href="http://www.utem.cl/">Página de la universidad UTEM</a></br>
                <a href="http://informatica.utem.cl/">Página de la escuela de informática, UTEM</a></br>
                <a href="http://bienestarestudiantil.blogutem.cl/ ">Servicio bienestar estudiantil, UTEM</a>
                <br> 
                <h3><a href="{{ URL::to('/') }}">Volver atrás</a></h3>


@stop

