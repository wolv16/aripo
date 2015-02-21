@extends('layouts.baseartesanos')
	@section('titulo')REGISTRAR EVENTOS
	@endsection

		@section('contenido')
		<div class="container wellr"> 
			<div class="col-sm-12 bg-titulo">REGISTRAR EVENTOS</div>
		
			<div class="col-sm-5 col-md-offset-1 wellr">

				<div class="col-sm-12">
					<div class="btn-group btn-group-justified" role="group">
					<div class="btn-group" role="group">
					    <button id="btnferias" type="button" class="btn btn-xs btn-ioa">FERIA</button>
					</div>
					<div class="btn-group" role="group">
						<button id="btnconcursos" type="button" class="btn btn-xs btn-ioa">CONCURSO</button>
					</div>
					<div class="btn-group" role="group">
					    <button id="btntalleres" type="button" class="btn btn-xs btn-ioa">TALLER</button>
					</div>
					</div>
				</div>
		
		
		
			<div class="col-md-12 hidden" id="registroTaller">
				{{ Form::open(array('id' =>'formregistroTaller', 'URL'=>'registrarEventos/taller')) }}
				<div class="bg-orga col-md-12">REGISTRO DE TALLER</div>
				<input type="text" name="id" class="hidden">
				<div class="col-md-12 form-group">
					{{ Form::label ('tallernombre', 'NOMBRE DEL TALLER') }}
					{{ Form::text('tallernombre', null, array('placeholder' => 'Escriba el nombre del Taller','class' => 'form-control mayuscula')) }} 
				</div>

				<div class="col-md-12 form-group">
					{{ Form::label ('maestro', 'NOMBRE DEL MAESTRO') }}
					{{ Form::text('maestro', null, array('placeholder' => 'Nombre del maestro','class' => 'form-control mayuscula')) }} 
				</div>
		
	
				<div class="form-group col-sm-12 fecha">
				    {{ Form::label('fecha1', 'FECHA DE INICIO',array('class' => 'control-label')) }}
				    <div class="input-group date" id="datetimePicker1">
				    {{ Form::text('fecha1', null, array('class' => 'form-control','placeholder' => 'YYYY-MM-DD', 'data-date-format' => 'YYYY-MM-DD')) }}
				    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
				    </div>
				</div>
				<div class="form-group col-sm-12 fecha">
				    {{ Form::label('fecha2', 'FECHA DE FIN',array('class' => 'control-label')) }}
				    <div class="input-group date" id="datetimePicker2">
				    {{ Form::text('fecha2', null, array('class' => 'form-control','placeholder' => 'YYYY-MM-DD', 'data-date-format' => 'YYYY-MM-DD')) }}
				    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
				    </div>
				</div>
			
				<div class="form-group" style="top: 13px !important;">
				<button id="found" type="submit" class="btn btn-ioa pull-right">
				<span class="glyphicon glyphicon-ok"></span> 
					Registrar 
				</button>
				</div>
	
				{{Form::close()}}
			
			</div>
	
			<div class="col-md-12" id="registroFeria">
				{{ Form::open(array('id' =>'formregistroFeria','URL'=>'registrarEventos/feria')) }}
				<div class="bg-orga col-md-12">REGISTRO DE FERIA</div>
				<input type="text" name="id" class="hidden">
				<div class="col-md-12 form-group">
				{{ Form::label('ferianombre', 'NOMBRE DE LA FERIA',array('class' => 'control-label')) }}
				{{ Form::text('ferianombre', null, array('placeholder' => 'Introduce nombre de la feria','class' => 'form-control mayuscula')) }}
				</div>
				<div class="col-md-12 form-group">
				{{ Form::label('ferialugar', 'LUGAR DE LA FERIA',array('class' => 'control-label')) }}
				{{ Form::text('ferialugar', null, array('placeholder' => 'Introduce el lugar de la feria','class' => 'form-control mayuscula')) }}
				</div>

				<div class="col-md-12 form-group">
					{{ Form::label('tipo', 'TIPO DE LA FERIA') }} 
					{{Form::select('tipo', array(''=>'Seleccione tipo','INTERNACIONAL' => 'Internacional','PABELLON FONART' => 'Pabellón Fonart','NACIONAL' => 'Nacional','REGIONAL' => 'Regional'), null, array('class' =>'form-control'))}}
				</div>

				<div class="form-group col-sm-12 fecha">
		        	{{ Form::label('fecha1', 'FECHA DE INICIO',array('class' => 'control-label')) }}
		          	<div class="input-group date" id="datetimePicker3">
		            {{ Form::text('fecha1', null, array('class' => 'form-control','placeholder' => 'YYYY-MM-DD', 'data-date-format' => 'YYYY-MM-DD')) }}
		            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
		          	</div>
		        </div>
		        <div class="form-group col-sm-12 fecha">
		        	{{ Form::label('fecha2', 'FECHA DE FIN',array('class' => 'control-label')) }}
		          	<div class="input-group date" id="datetimePicker4">
		            {{ Form::text('fecha2', null, array('class' => 'form-control','placeholder' => 'YYYY-MM-DD', 'data-date-format' => 'YYYY-MM-DD')) }}
		            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
		          	</div>
		        </div>


		        <div class="form-group" style="top: 13px !important;">
		        	<button id="found" type="submit" class="btn btn-ioa pull-right">
		        	<span class="glyphicon glyphicon-ok"></span> 
		        		Registrar 
		        	</button>
		        	</div>
				{{Form::close()}}

			</div>


		
			<div class="col-md-12 hidden" id="registroConcurso">
				{{ Form::open(array('id' =>'formregistroConcurso','URL'=>'registrarEventos/concurso')) }}
				<div class="bg-orga col-md-12">REGISTRO DE CONCURSO</div>
				<input type="text" name="id" class="hidden">
				<div class="col-md-12 form-group">
				{{ Form::label('concurnombre', 'NOMBRE DEL CONCURSO',array('class' => 'control-label')) }}
				{{ Form::text('concursonombre', null, array('placeholder' => 'Introduce el nombre del concurso','class' => 'form-control mayuscula')) }}
				</div>

				<div class="col-md-12 form-group">
				{{ Form::label('nivel', 'NIVEL DEL CONCURSO') }} 
				{{Form::select('nivel', array(''=>'Seleccione nivel','ESTATAL' => 'ESTATAL','NACIONAL' => 'NACIONAL',), null, array('class' =>'form-control'))}}
				</div>

				<div class="form-group col-sm-12 fecha">
			        {{ Form::label('fecha', 'FECHA LÍMITE DE REGISTRO',array('class' => 'control-label')) }}
			        <div class="input-group date" id="datetimePicker5">
			        {{ Form::text('fecha1', null, array('class' => 'form-control','placeholder' => 'YYYY-MM-DD', 'data-date-format' => 'YYYY-MM-DD')) }}
			        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			        </div>
			    </div>
			    <div class="form-group col-sm-12 fecha">
			        {{ Form::label('fecha2', 'FECHA DE PREMIACIÓN',array('class' => 'control-label')) }}
			        <div class="input-group date" id="datetimePicker6">
			        {{ Form::text('fecha2', null, array('class' => 'form-control','placeholder' => 'YYYY-MM-DD', 'data-date-format' => 'YYYY-MM-DD')) }}
			        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			        </div>
			    </div>

			    <div class="form-group" style="top: 13px !important;">
			    	<button id="found" type="submit" class="btn btn-ioa pull-right">
			    	<span class="glyphicon glyphicon-ok"></span> 
			    		Registrar 
			    	</button>
			    	</div>
			 	{{Form::close()}}
			</div>
		</div>
			


	<div class="col-sm-6">
		
		<div class="pull-left col-md-10 hidden" id="concursos">
      		@if(isset($concursos))
      			<div class="bg-orga col-md-12 text-center">CONCURSOS PRÓXIMOS</div>
        	@foreach($concursos as $concurso)
			    <div class="container bg-evento col-md-12 concurso" >
			    <div class="col-md-7">
		        <p id='idconcurso' class='hidden'>{{$concurso->id}}</p>
				<h5><i class="fa fa-trophy fa-lg pull-left"></i><strong id="nombconc">{{$concurso->nombre}}</strong></h5>
	            <h5>FECHA:<span id="fech">{{$concurso->fecha}}</h5>
	            <h5>NIVEL: <span id="nive">{{$concurso->nivel}}</span></h5>
	            <h5>PREMIACIÓN: <span id="prem">{{$concurso->premiacion}}</h5>
	      		</div>
			    <div class="col-md-5">
			    <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px; margin-top: 15px;" src="./imgs/event5.png"></img>
			    </div>
	           	</div>
          	@endforeach    
      		@endif
    	</div>

    	<div class="pull-left col-md-10 ferias">
    	    @if(isset($ferias))
    	    <div class="bg-orga col-md-12 text-center">FERIAS PRÓXIMAS</div>
    	    @foreach($ferias as $feria)
	            <div class="container bg-evento col-md-12 feria">
	            	<div class="col-md-12">
	            	<p id='idferia' class='hidden'>{{$feria->id}}</p>
		              
		            <h4><i class="fa fa-chain-broken fa-lg pull-left"></i><span id="nombre">{{ $feria->nombre }}</span></h4>
		          	</div>
		          	<div class="col-md-6">
		              <h5>LUGAR: <span id="lugar">{{$feria->lugar}}</span></h5>
		              <h5>TIPO: <span id="tipo">{{$feria->tipo}}</span></h5>
		              <h5>INICIO: <span id="fechainicio">{{$feria->fechainicio}}</span></h5>
		              <h5>FIN: <span id="fechafin">{{$feria->fechafin}}</span></h5>
		              
	          		</div>
	              	<div class="col-md-5" style="margin-left:0px">
	              		<span class="fa-stack fa-2x">
	              		<i class="fa fa-group fa-4x"></i></span>
	          		</div>            
	            </div>
    	    @endforeach    
    	    @endif
    	</div>


    	<div class="pull-left col-md-10 hidden talleres">
	    	@if(isset($talleres))
	      	<div class="bg-orga col-md-12 text-center">TALLERES PRÓXIMOS </div>
	        @foreach($talleres as $taller)
	            <div class="container bg-evento col-md-12 taller">
	            <div class="col-md-12">
	            <p id='id' class='hidden'>{{$taller->id}}</p>
		        <h4><i class="fa fa-joomla fa-lg pull-left"></i><span id="nombre">{{ $taller->nombre }}</span></h4>
		        </div>
		        <div class="col-md-6">
		            <h5>MAESTRO: <span id="maestro">{{$taller->maestro}}</span></h5>
		            <h5>INICIO: <span id="inicio">{{$taller->fechainicio}}</span></h5>
		            <h5>FIN: <span id="fin">{{$taller->fechafin}}</span></h5>
		              
	          	</div>
	            <div class="col-md-5" style="margin-left:30px">
	              	<span class="fa-stack fa-2x">
	              	<i class="fa fa-stack-overflow fa-3x"></i></span>
	          		</div>            
	            </div>
	        @endforeach    
	      	@endif
	    </div>

	</div>

</div>
		
		@endsection


@section('scripts')
<style type="text/css" media="screen">
	.fecha i{
	    right: 55px !important;
	  }
	.tok{
		top: 17px !important;
		right: 23px !important;
	}
</style>
<script src="js/bootstrapValidator.js" type="text/javascript"></script>
<script src="js/es_ES.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {

$('#datetimePicker1 , #datetimePicker2 , #datetimePicker3, #datetimePicker4, #datetimePicker5, #datetimePicker6').datetimepicker({
	language: 'es',
	pickTime: false
		    });

$('#formregistroTaller').bootstrapValidator({
    // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok tok',
        invalid: 'glyphicon glyphicon-remove tok',
        validating: 'glyphicon glyphicon-refresh tok'
    },
    fields: {
        tallernombre: {
            validators: {
                regexp:{
                regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
                    message: 'Por favor verifica el campo'
                },
                notEmpty: {}
        }
        },
        fecha1: {
            validators: {
                notEmpty: {},
                date: {
                    format: 'YYYY-MM-DD'
                }
            }
        },
        fecha2: {
            validators: {
                notEmpty: {},
                date: {
                    format: 'YYYY-MM-DD'
                }
            }
        },
        maestro: {
            validators: {
                regexp:{
                regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
                    message: 'Por favor verifica el campo'
                },
                notEmpty: {}
                }}
    }
}).on('success.form.bv', function(e) {
    e.preventDefault();
	$.post("{{URL::to('registrarEventos/taller');}}", $(this).serialize(), function(json) {
		if(json.success){
			swal({
				title: 'Taller registrado',
				text: '(:',
				type: 'success',
				showCancelButton: false,
				confirmButtonColor: '#AEDEF4',
				confirmButtonText: 'Ok',
				cancelButtonText: '',
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function(isConfirm){
				if (isConfirm){
					//location.reload();
					console.log('adadasd');
				}
			});
		}
		else
			swal('Error','Error al registrar','error');	
	}, 'json').fail(function(){
	});
});
$('#formregistroFeria').bootstrapValidator({
    // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok tok',
        invalid: 'glyphicon glyphicon-remove tok',
        validating: 'glyphicon glyphicon-refresh tok'
    },
    fields: {
        ferianombre: {
            validators: {
                regexp:{
                regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
                    message: 'Por favor verifica el campo'
                },
            notEmpty: {}
        }},
        fecha1: {
            validators: {
                notEmpty: {},
                date: {
                    format: 'YYYY-MM-DD'
                }
            }
        },
        fecha2: {
            validators: {
                notEmpty: {},
                date: {
                    format: 'YYYY-MM-DD'
                }
            }
        },
        tipo: {
            validators: {
                notEmpty: {}
                }
            },
        ferialugar: {
            validators: {
                notEmpty: {}
                }
            },
    }
}).on('success.form.bv', function(e) {
    e.preventDefault();
	$.post("{{URL::to('registrarEventos/feria');}}", $(this).serialize(), function(json) {
		if(json.success){
			swal('Feria registrada',null,'success');
			$('#formregistroFeria').data('bootstrapValidator').resetForm(true);
			location.reload();
		}
		else
			swal('Error','Error al registrar','error');	
	}, 'json').fail(function(){
	});
});

}
    );
$('#formregistroConcurso').bootstrapValidator({
    // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok tok',
        invalid: 'glyphicon glyphicon-remove tok',
        validating: 'glyphicon glyphicon-refresh tok'
    },
    fields: {
        concursonombre: {
            validators: {
                regexp:{
                regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
                    message: 'Por favor verifica el campo'
                },
            notEmpty: {}
        }},
        fecha1: {
            validators: {
                notEmpty: {},
                date: {
                    format: 'YYYY-MM-DD'
                }
            }
        },
        fecha2: {
            validators: {
                notEmpty: {},
                date: {
                    format: 'YYYY-MM-DD'
                }
            }
        },
        nivel: {
            validators: {
                regexp:{
                regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
                    message: 'Por favor verifica el campo'
                },
                notEmpty: {}
                }}
    }
}).on('success.form.bv', function(e) {
    e.preventDefault();
	$.post("{{URL::to('registrarEventos/concurso');}}", $(this).serialize(), function(json) {
		if(json.success){
			swal('Concurso registrado',null,'success');
			$('#formregistroConcurso').data('bootstrapValidator').resetForm(true);
			location.reload();
		}
		else
			swal('Error','Error al registrar','error');	
	}, 'json').fail(function(){
	});

});
$('.mayuscula').focusout(function() {
				$(this).val($(this).val().toUpperCase());
			});
	</script>

<script>

$('#btnferias').click(function(){
	$('#registroFeria').removeClass('hidden');
	$('.ferias').removeClass('hidden');
	$('#registroConcurso').addClass('hidden');
	$('#registroTaller').addClass('hidden');
	$('#concursos').addClass('hidden');
	$('.talleres').addClass('hidden');
	$('#formregistroFeria').data('bootstrapValidator').resetForm(true);
});
$('#btnconcursos').click(function(){
	$('#registroConcurso').removeClass('hidden');
	$('#concursos').removeClass('hidden');
	$('#registroTaller').addClass('hidden');
	$('#registroFeria').addClass('hidden');
	$('.ferias').addClass('hidden');
	$('.talleres').addClass('hidden');
	$('#formregistroConcurso').data('bootstrapValidator').resetForm(true);
});
$('#btntalleres').click(function(){
	$('#registroTaller').removeClass('hidden');
	$('.talleres').removeClass('hidden');
	$('#registroFeria').addClass('hidden');
	$('#registroConcurso').addClass('hidden');
	$('.ferias').addClass('hidden');
	$('#concursos').addClass('hidden');
	$('#formregistroTaller').data('bootstrapValidator').resetForm(true);
});
$('#datetimePicker1').on('dp.change dp.show', function(e) {
        $('#formregistroTaller').bootstrapValidator('revalidateField', 'fecha1');
    });
$('#datetimePicker2').on('dp.change dp.show', function(e) {
        $('#formregistroTaller').bootstrapValidator('revalidateField', 'fecha2');
    });
$('#datetimePicker5').on('dp.change dp.show', function(e) {
        $('#formregistroConcurso').bootstrapValidator('revalidateField', 'fecha1');
    });
$('#datetimePicker6').on('dp.change dp.show', function(e) {
        $('#formregistroConcurso').bootstrapValidator('revalidateField', 'fecha2');
    });
$('#datetimePicker3').on('dp.change dp.show', function(e) {
        $('#formregistroFeria').bootstrapValidator('revalidateField', 'fecha1');
    });
$('#datetimePicker4').on('dp.change dp.show', function(e) {
        $('#formregistroFeria').bootstrapValidator('revalidateField', 'fecha2');
    });


</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#menu-item-48164").addClass("current_page_item ");
    });
</script>
@stop 