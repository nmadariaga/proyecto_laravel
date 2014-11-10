
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        {{ HTML::style('assets/css/bootstrap.min.css',array('rel' => 'stylesheet')) }}
        {{ HTML::style('css/jumbotron-narrow.css',array('rel' => 'stylesheet')) }}
        {{ HTML::script('assets/js/ie-emulation-modes-warning.js')}}
        
    </head>
    <title>Proyecto Laravel</title>
    <div class="container">
            <div class="header">
            
            <ul class="nav nav-pills pull-right">
                
                
                   <li>{{ HTML::link('/','Inicio')}}</li>
                   <li>{{HTML::link('logout','Salir')}}</li>
                
            </ul>
            <p class="text-muted">{{ HTML::image('/imagenes/utem2.png')}}</p>
        </div>
        

        @yield('contenido')



    </div> 
    <div class="footer container ">
        <p>&copy; Universidad Tecnológica Metropolitana</p>
    </div>




    {{ HTML::script('js/jquery-1.11.1.min.js')}}
    {{ HTML::script('js/jquery-2.1.1.min.js')}}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/ie10-viewport-bug-workaround.js')}}





