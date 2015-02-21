@extends('layouts.baseartesanos')
	@section('titulo')EDITAR EVENTOS
	@endsection

		@section('contenido')
		<div class="container wellr"> 
			<div class="col-sm-12 bg-titulo">EDITAR EVENTOS</div>
		
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
		
		
		
			<div class="col-md-12 hidden" id="updateTaller">
				{{ Form::open(array('id' =>'formupdateTaller')) }}
				<div class="bg-orga col-md-12">UPDATE DE TALLER</div>
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
				<span class="glyphicon glyphicon-floppy-disk"></span> 
					Guardar 
				</button>
				</div>
	
				{{Form::close()}}
			
			</div>
	
			<div class="col-md-12" id="updateFeria">
				{{ Form::open(array('id' =>'formupdateFeria')) }}
				<div class="bg-orga col-md-12">UPDATE DE FERIA</div>
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
		        	<span class="glyphicon glyphicon-floppy-disk"></span> 
		        		Guardar 
		        	</button>
		        	</div>
				{{Form::close()}}

			</div>


		
			<div class="col-md-12 hidden" id="updateConcurso">
				{{ Form::open(array('id' =>'formupdateConcurso')) }}
				<div class="bg-orga col-md-12">UPDATE DE CONCURSO</div>
				<input type="text" name="id" class="hidden">
				<div class="col-md-12 form-group">
				{{ Form::label('concurnombre', 'NOMBRE DEL CONCURSO',array('class' => 'control-label')) }}
				{{ Form::text('concurnombre', null, array('placeholder' => 'Introduce el nombre del concurso','class' => 'form-control mayuscula')) }}
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
			    	<span class="glyphicon glyphicon-floppy-disk"></span> 
			    		Guardar 
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

$('#formupdateTaller').bootstrapValidator({
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
	$.post("{{URL::to('editarEventos/taller');}}", $(this).serialize(), function(json) {
		if(json.success){
			swal('Taller actualizado',null,'success');
			$('#formupdateTaller').data('bootstrapValidator').resetForm(true);
			location.reload();
		}
		else
			swal('Error','No se actualizo','error');	
	}, 'json').fail(function(){
	});
});
$('#formupdateFeria').bootstrapValidator({
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
	$.post("{{URL::to('editarEventos/feria');}}", $(this).serialize(), function(json) {
		if(json.success){
			swal('Feria actualizada',null,'success');
			$('#formupdateFeria').data('bootstrapValidator').resetForm(true);
			location.reload();
		}
		else
			swal('Error','No se actualizo','error');	
	}, 'json').fail(function(){
	});
});

}
    );
$('#formupdateConcurso').bootstrapValidator({
    // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok tok',
        invalid: 'glyphicon glyphicon-remove tok',
        validating: 'glyphicon glyphicon-refresh tok'
    },
    fields: {
        concurnombre: {
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
	$.post("{{URL::to('editarEventos/concurso');}}", $(this).serialize(), function(json) {
		if(json.success){
			swal('Concurso actualizado',null,'success');
			$('#formupdateConcurso').data('bootstrapValidator').resetForm(true);
			location.reload();
		}
		else
			swal('Error','No se actualizo','error');	
	}, 'json').fail(function(){
	});
});
	</script>

<script>

$('.concurso').click(function(){
	$('.bg-evento').removeClass('sombreado-evento');
	$(this).addClass('sombreado-evento');
	$('[name=id]').val($(this).find('#idconcurso').text());
	$('[name=concurnombre]').val($(this).find('#nombconc').text());
	$('[name=nivel] option[value='+$(this).find('#nive').text()+']').attr('selected', true);
	$('[name=fecha1]').val($(this).find('#fech').text());
	$('[name=fecha2]').val($(this).find('#prem').text());
});
$('.feria').click(function(){
	$('.bg-evento').removeClass('sombreado-evento');
	$(this).addClass('sombreado-evento');
	$('[name=id]').val($(this).find('#idferia').text());
	$('[name=ferianombre]').val($(this).find('#nombre').text());
	$('[name=ferialugar]').val($(this).find('#lugar').text());
	$('[name=tipo] option[value="'+$(this).find('#tipo').text()+'"]').attr('selected', true);
	$('[name=fecha1]').val($(this).find('#fechainicio').text());
	$('[name=fecha2]').val($(this).find('#fechafin').text());
});
$('.taller').click(function(){
	$('.bg-evento').removeClass('sombreado-evento');
	$(this).addClass('sombreado-evento');
	$('[name=id]').val($(this).find('#id').text());
	$('[name=fecha1]').val($(this).find('#inicio').text());
	$('[name=fecha2]').val($(this).find('#fin').text());
	$('[name=tallernombre]').val($(this).find('#nombre').text());
	$('[name=maestro]').val($(this).find('#maestro').text());
});

$('#btnferias').click(function(){
	$('#updateFeria').removeClass('hidden');
	$('.ferias').removeClass('hidden');
	$('#updateConcurso').addClass('hidden');
	$('#updateTaller').addClass('hidden');
	$('#concursos').addClass('hidden');
	$('.talleres').addClass('hidden');
	$('#formupdateFeria').data('bootstrapValidator').resetForm(true);
});
$('#btnconcursos').click(function(){
	$('#updateConcurso').removeClass('hidden');
	$('#concursos').removeClass('hidden');
	$('#updateTaller').addClass('hidden');
	$('#updateFeria').addClass('hidden');
	$('.ferias').addClass('hidden');
	$('.talleres').addClass('hidden');
	$('#formupdateConcurso').data('bootstrapValidator').resetForm(true);
});
$('#btntalleres').click(function(){
	$('#updateTaller').removeClass('hidden');
	$('.talleres').removeClass('hidden');
	$('#updateFeria').addClass('hidden');
	$('#updateConcurso').addClass('hidden');
	$('.ferias').addClass('hidden');
	$('#concursos').addClass('hidden');
	$('#formupdateTaller').data('bootstrapValidator').resetForm(true);
});
	

$('#datetimePicker1').on('dp.change dp.show', function(e) {
        $('#formupdateTaller').bootstrapValidator('revalidateField', 'fecha1');
    });
$('#datetimePicker2').on('dp.change dp.show', function(e) {
        $('#formupdateTaller').bootstrapValidator('revalidateField', 'fecha2');
    });
$('#datetimePicker5').on('dp.change dp.show', function(e) {
        $('#formupdateConcurso').bootstrapValidator('revalidateField', 'fecha1');
    });
$('#datetimePicker6').on('dp.change dp.show', function(e) {
        $('#formupdateConcurso').bootstrapValidator('revalidateField', 'fecha2');
    });
$('#datetimePicker3').on('dp.change dp.show', function(e) {
        $('#formupdateFeria').bootstrapValidator('revalidateField', 'fecha1');
    });
$('#datetimePicker4').on('dp.change dp.show', function(e) {
        $('#formupdateFeria').bootstrapValidator('revalidateField', 'fecha2');
    });
$('.mayuscula').focusout(function() {
				$(this).val($(this).val().toUpperCase());
			});

</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#menu-item-48164").addClass("current_page_item ");
    });
</script>
@stop 