
@extends('layouts.baseartesanos')
@section('titulo') INSTITUTO OAXAQUEÑO DE LAS ARTESANÍAS
@endsection 

@section('contenido')
<div class="container wellr col-sm-8 col-sm-offset-2">

    <div class="col-md-6 wellr">
        <div class="bg-orga col-md-12 text-center">REGISTRO DE ARTESANOS EN EL IOA</div>
        <div class="col-sm-6" style="text-align: center; margin: 0 auto;">
            <a target="_self" href="{{URL::to('artesano');}}">
            <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" src="./imgs/userr.png"></img><br>
            {{ Form::label('pororg', 'REGISTRO ÚNICO') }}
            </a>
        </div>

        <div class="col-sm-6" style="text-align: center; margin: 0 auto;">
            <a  href="{{URL::to('por');}}">
            <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" src="./imgs/users.png"></img><br>
            {{ Form::label('pororg', 'POR ORGANIZACIÓN') }}
                           
            </a>
        </div>
    </div>    
    
 <div class="col-md-6 wellr">
        <div class="bg-orga col-md-12 text-center">MÁS ACCIONES</div>
        <div class="col-sm-6" style="text-align: center; margin: 0 auto;">
            <a target="_self" href="{{URL::to('reportes');}}">
            <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" src="./imgs/report.png"></img><br>
            {{ Form::label('reportes', 'REPORTES') }}
            </a>
        </div>

        <div class="col-sm-6" style="text-align: center; margin: 0 auto;">
            <a  href="{{URL::to('organizaciones');}}">
            <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" src="./imgs/orga.png"></img><br>
            {{ Form::label('org', 'ORGANIZACIONES') }}
                           
            </a>
        </div>
    </div>


<div class="container wellr col-sm-12">

    <div class="col-md-12">
        <div class="bg-orga col-md-12 text-center">REGISTRO A EVENTOS</div>
        <div class="col-sm-3" style="text-align: center; margin: 0 auto;">
            <a target="_self" href="{{URL::to('personaConcurso');}}">
            <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" src="./imgs/trophy.png"></img><br>
            {{ Form::label('concurso', 'CONCURSOS') }}
            </a>
        </div>

        <div class="col-sm-3" style="text-align: center; margin: 0 auto;">
            <a target="_self" href="{{URL::to('ArtesanoEnFeria');}}">
            <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" src="./imgs/ferias.png"></img><br>
            {{ Form::label('feria', 'FERIAS') }}
            </a>
        </div>

        <div class="col-sm-3" style="text-align: center; margin: 0 auto;">
            <a  href="{{URL::to('ArtesanoEnTaller');}}">
            <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" src="./imgs/grupo.png"></img><br>
            {{ Form::label('taller', 'TALLERES') }}
                           
            </a>
        </div>
        <div class="col-sm-3" style="text-align: center; margin: 0 auto;">
            <a target="_self" href="{{URL::to('concursante');}}">
            <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" src="./imgs/datosconcursante.png"></img><br>
            {{ Form::label('feria', 'EDIT. CONCURSANTE') }}
            </a>
        </div>
    </div>    
      
</div>


<div class="container wellr col-sm-12">
        <div class="bg-orga col-md-12 text-center">EDICIÓN DE DATOS</div>

    <div class="col-sm-12 col-sm-offset-1">
        <div class="col-sm-2" style="text-align: center; margin: 0 auto;">
            <a  href="{{URL::to('gruposetnicos');}}">
            <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" src="./imgs/catalogos.png"></img><br>
            {{ Form::label('org', 'GRUPOS ÉTNICOS') }}
                           
            </a>
        </div>
        <div class="col-sm-2" style="text-align: center; margin: 0 auto;">
            <a target="_self" href="{{URL::to('editarArtesano');}}">
            <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" src="./imgs/editaruser.png"></img><br>
            {{ Form::label('reportes', 'EDITAR ARTESANO') }}
            </a>
        </div>

        <div class="col-sm-2" style="text-align: center; margin: 0 auto;">
            <a  href="{{URL::to('editarEventos');}}">
            <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" src="./imgs/editarevento.png"></img><br>
            {{ Form::label('org', 'EDITAR EVENTOS') }}
                           
            </a>
        </div>
         <div class="col-sm-2" style="text-align: center; margin: 0 auto;">
            <a  href="{{URL::to('ramas');}}">
            <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" src="./imgs/catalogos.png"></img><br>
            {{ Form::label('org', 'RAMAS ART.') }}
                           
            </a>
        </div>
        <div class="col-sm-2" style="text-align: center; margin: 0 auto;">
            <a  href="{{URL::to('organizacion_artesano');}}">
            <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" src="./imgs/equis.png"></img><br>
            {{ Form::label('org', 'BORRAR DE ORG.') }}
                           
            </a>
        </div>
    </div>
</div>

  
</div>
@stop
@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $("#menu-item-48096").addClass("current_page_item ");
    });
</script>
@stop