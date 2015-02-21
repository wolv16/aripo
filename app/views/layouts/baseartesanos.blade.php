<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es-ES" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>
    <title> @yield('titulo') </title>
<!--<link rel="stylesheet" href="../css/jquery.jqzoom.css" type="text/css">-->
    <meta http-equiv="Content-Type">
    {{header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');}}
    {{header('Cache-Control: no-store, no-cache, must-revalidate');}}
    {{header('Cache-Control: post-check=0, pre-check=0',false);}}
    {{header('Pragma: no-cache');}}
    {{HTML::style('css/bootstrap.css')}}
    {{HTML::style('css/style.css')}}
    {{HTML::style('css/bootstrap-theme.css')}}
    {{HTML::style('font-awesome/css/font-awesome.css');  }}
    {{HTML::script('js/jquery-1.11.1.js');}}
    {{HTML::script('js/bootstrap.js');}}
    {{HTML::script('js/moment.js');}}
    {{HTML::script('js/bootstrap-datetimepicker.js');}}
    {{HTML::script('js/bootstrap-datetimepicker.es.js');}}
    {{HTML::style('css/bootstrap-datetimepicker.min.css');}}
    {{HTML::script('js/sweet-alert.js');}}
    {{HTML::style('css/sweet-alert.css');}}
    {{  HTML::script('js/chart/morris.min.js')}}
    {{  HTML::script('js/chart/raphael-min.js')}}
    {{  HTML::script('js/tables/jquery.dataTables.min.js')}}
    {{  HTML::script('js/dataTables.tableTools.min.js')}}
    {{  HTML::style('css/jquery.dataTables.css')}}
    {{  HTML::style('css/dataTables.tableTools.css')}}

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="blog windows chrome ch" data-twttr-rendered="true" style="">﻿﻿
    

<div id="wrapper" class="hfeed">
    <div id="header">
        
        <div id="branding">
            
            
        </div><!--  #branding -->
        <div id="access">
          
            <div class="menu">
                <ul id="menu-menu-1" class="sf-menu sf-js-enabled sf-shadow">
                    <li id="menu-item-48096" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item menu-item-home menu-item-48096">
                        <a title="Inicio" href="{{URL::to('inicio');}}" class="sf-with-ul">INICIO<span class="sf-sub-indicator"></span></a>
                    </li>
                    <li id="menu-item-48155" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-48155">
                        <a title="Registro único" href="{{URL::to('artesano');}}" class="sf-with-ul">REGISTRO<span class="sf-sub-indicator"></span></a>
                    </li>
                    <li id="menu-item-48164" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-48164">
                        <a title="Registro de eventos" href="{{URL::to('registrarEventos');}}" class="sf-with-ul">EVENTOS<span class="sf-sub-indicator"> »</span></a>
                    </li>
                    <li id="menu-item-48175" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-48175">
                        <a title="Datos de artesanos" href="{{URL::to('verArtesano');}}" class="sf-with-ul">CONSULTA<span class="sf-sub-indicator"> »</span></a>
                    </li>
                    <li id="menu-item-49489" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-49489">
                        <a title="Credenciales" href="{{URL::to('credenciales');}}">CREDENCIAL<span class="sf-sub-indicator"> »</span></a>
                    </li>
                    <li id="menu-item-48188" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-48188">
                        <a title="Reportes" href="{{URL::to('reportes/reportesmenu');}}" class="smcf-link sf-with-ul">REPORTES<span class="sf-sub-indicator"> »</span></a>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-48188">
                        <a title="Ayuda" class="sf-sub-indicator" onClick="window.open('{{URL::to('help/user.pdf');}}')";>?</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right" style="margin-top: -10px">
                      <li id="fat-menu" class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-size:20px;">
                            @if(Auth::id())
                              {{ Auth::user()->username }}
                            @endif  
                              <i class="fa fa-user"></i>
                              <i class="fa fa-caret-down"></i>
                          </a>

                          <ul class="dropdown-menu">
                            @if(Auth::user()->role_id == 2)
                              <li><a href="{{ URL::to('users'); }}"><i class="fa fa-users"></i> Usuarios</a></li>
                              <li class="divider"></li>
                            @endif
                              <li><a class="visible-phone" href="{{ URL::to('settings'); }}"><i class="fa fa-cogs"></i> Opciones</a></li>
                              <li class="divider"></li>
                              <li><a href="{{ URL::to('logout'); }}"><i class="fa fa-sign-out"></i> Salir</a></li>
                          </ul>
                      </li>
                  </ul>
            </div>
            <div class="izquierda">
                
                
            </div>
        </div><!-- #access -->
    </div><!-- #header-->
</div>
<div class="content">
    @yield('contenido')
      
      
    </div>

</body>
@yield('scripts')
</html>