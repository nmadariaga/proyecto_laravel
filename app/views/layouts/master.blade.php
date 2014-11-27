
<!DOCTYPE html>
<html>
    <head>
        <title>Proyecto Laravel</title>
        {{ HTML::style('assets/css/bootstrap.min.css',array('rel' => 'stylesheet')) }}
        {{ HTML::style('assets/css/bootstrap-theme.min.css',array('rel' => 'stylesheet')) }}
        {{ HTML::style('css/jumbotron-narrow.css',array('rel' => 'stylesheet')) }}  
        {{ HTML::script('js/jquery-2.1.1.min.js')}}
        {{ HTML::script('assets/js/bootstrap.min.js') }}
        {{ HTML::script('assets/js/jquerymin.js') }}
        {{ HTML::script('assets/js/jquery-ui.js') }}
        {{ HTML::script('assets/js/calendario.js') }}
        {{ HTML::style('css/1.7.2.css') }}      
    </head>
    
    <div class="container">
        <div class="masthead">
            <p class="aligncenter">{{ HTML::image('/imagenes/utem4.png')}}</p>
        </div>
        <div class="navbar navbar-default">
            <div class="navbar-collapse collapse navbar-inverse-collapse">
                <ul class="nav navbar-nav">
                    <li>{{ HTML::link('/','Inicio')}}</li>
                    <li>{{HTML::link('articulos/busqueda','Buscar')}}</li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Registros <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>{{HTML::link('articulos/registros/','Ver Registros')}}</li>
                            <li>{{HTML::link('articulos/add/','Ingresar Registro')}}</li>
                            
                            
                        </ul>
                    </li>
                    <li>{{HTML::link('password/contrasena/','Cambiar Contraseña')}}</li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>{{HTML::link('logout','Cerrar Sesión')}}</li>
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            @yield('contenido')
        </div>
         
        
    </div>

<div class="footer container ">
        <p>&copy; Universidad Tecnológica Metropolitana</p>
    </div>

       



    



    
   
    





