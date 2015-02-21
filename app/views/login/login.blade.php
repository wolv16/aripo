<!DOCTYPE html>
<html>
  <head>
    <title>Inicio</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      {{  HTML::style('css/login.css')  }}
      {{  HTML::style('css/bootstrap.css');  }}
  </head>
  <body>
    <div class="jumbotron" style="background-color: rgba(238, 238, 238, 0);">
      <img src="{{ asset('imgs/header2.png') }}" class="img-responsive col-sm-10 col-sm-offset-1 " alt="Responsive image" style="top:-50px;">
    </div>
    <div class="main">
      <div class="login-form text-center">
        <h2 style="padding-top:15px;">IOA</h2>
          {{ Form::open(array('url' => 'login','role' => 'form','id' => 'id','class' => 'class')) }}
              <input type="text" class="text" placeholder="Usuario" onfocus="this.value = '';" name="username" autocomplete="off">
              <input type="password" placeholder="Contraseña" onfocus="this.value = '';"  name="password">
              <?php $status=Session::get('mensaje_error'); ?> 
          @if (!is_null($status))
            <p style='color:#900F0F' ><strong>{{$status}}</strong></p>
          @else
            <p>Introduzca usuario y contraseña para continuar.</p>
          @endif
              <div class="submit">
                <input type="submit" value="Entrar" >
            </div>
          {{ Form::close() }}
        </div>
      </div>
  </body>
</html>