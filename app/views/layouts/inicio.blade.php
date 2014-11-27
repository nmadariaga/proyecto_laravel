
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Proyecto Laravel</title>
        {{ HTML::style('assets/css/bootstrap.min.css',array('rel' => 'stylesheet')) }}
        {{ HTML::style('assets/css/bootstrap-theme.min.css',array('rel' => 'stylesheet')) }}
        {{ HTML::style('css/jumbotron-narrow.css',array('rel' => 'stylesheet')) }}
        {{ HTML::script('js/jquery-2.1.1.min.js')}}
          {{ HTML::script('assets/js/bootstrap.min.js') }}

    </head>


    <div class="container">
        <div class="masthead">
            <p class="text-muted">{{ HTML::image('/imagenes/utem4.png')}}</p>

        </div>
        <div class="navbar navbar-default">
            <div class="navbar-collapse collapse navbar-inverse-collapse">
                <ul class="nav navbar-nav">
                    <li>{{ HTML::link('/','Inicio')}}</li>
                    <li>{{HTML::link('/contacto','Contacto')}}</li>

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







