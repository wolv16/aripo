
@extends('layouts.baseartesanos')
@section('titulo') INSTITUTO OAXAQUEÑO DE LAS ARTESANÍAS
@endsection 

@section('contenido')
<div class="container wellr col-sm-8 col-sm-offset-2">


<div class="container wellr col-sm-12">

    <div class="col-md-12">
        <div class="bg-orga col-md-12 text-center">TIPOS DE REPORTE</div>
        <div class="col-sm-4" style="text-align: center; margin: 0 auto;">
            <a target="_self" href="{{URL::to('reportes');}}">
            <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" src="../imgs/trophy.png"></img><br>
            {{ Form::label('concurso', 'DEL PADRÓN') }}
            </a>
        </div>

        <div class="col-sm-4" style="text-align: center; margin: 0 auto;">
            <a target="_self" href="{{URL::to('reportes/eventos');}}">
            <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" src="../imgs/ferias.png"></img><br>
            {{ Form::label('eventos', 'DE EVENTOS') }}
            </a>
        </div>

        <div class="col-sm-4" style="text-align: center; margin: 0 auto;">
            <a  href="{{URL::to('reportes/registros');}}">
            <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" src="../imgs/grupo.png"></img><br>
            {{ Form::label('registro', 'DE REGISTROS') }}
                           
            </a>
        </div>
    </div>    
      
</div>

  
</div>
@stop
@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $("#menu-item-48188").addClass("current_page_item ");
    });
</script>
@stop