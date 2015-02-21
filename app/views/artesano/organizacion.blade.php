
@extends('layouts.baseartesanos')
    @section('titulo') IOA-Organizaciones
    @endsection 

@section('contenido')
<?php $status=Session::get('status'); ?>

	<div class="container wellr col-sm-6 col-sm-offset-3">
		<form role="form" method="POST" id="altaorg">
				<div class="col-sm-12">


					<div class="bg-orga col-sm-12">REGISTRAR ORGANIZACIÓN</div>
						
					<div class="col-sm-12">
						<div class="col-sm-6 form-group">
							{{ Form::label ('organización', 'NOMBRE DE LA ORGANIZACIÓN') }}
							{{ Form::text('nombreOrg', null, array('placeholder' => 'Escriba el nombre de la organización','class' => 'form-control mayuscula')) }}
						</div>
					</div>
					<div class="col-sm-12">

						<div class="col-sm-4 form-group">
							{{ Form::label ('tel', 'TELÉFONO DEL MUNICIPIO') }}
							{{ Form::text('telMun', null, array('placeholder' => 'Número de telefono','class' => 'form-control')) }} 
						</div>
					</div>
						<div class="col-sm-12 form-group">
							<button type="submit" class="btn btn-ioa pull-right">Registrar
							<span class="glyphicon glyphicon-ok"></span></button>
						</div>

				</div>

		</form>

			
		<div class="message col-md-6 col-md-offset-3" style="">
	        @if($status == 'fail_create')
	        <div id="error" style="margin-top:10px;">
	            <p class="alert alert-danger"><i class="fa fa-exclamation-triangle fa-lg"></i> Ocurrio un error 
	            </p>
	        </div>
	        @elseif(($status == 'ok_create'))
	        <div id="error" style="margin-top:10px;">
	            <p class="alert alert-success"><i class="fa fa-check-square-o fa-lg"></i> Operacion completada correctamente, ahora puedes registrar artesanos en esta organización
	            </p>
	        </div>
	        @endif
	    </div>

	</div>
@stop

@section('scripts')

<style type="text/css" media="screen">
	.tok{
		top: 18px !important;
		
	}
</style>
<script src="js/bootstrapValidator.js" type="text/javascript"></script>
	<script src="js/es_ES.js" type="text/javascript"></script>
	<script type="text/javascript">
$(document).ready(function() {
	$('#altaorg').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok tok',
            invalid: 'glyphicon glyphicon-remove tok',
            validating: 'glyphicon glyphicon-refresh tok'
        },
        fields: {
        	nombreOrg:{
        		validators:{
        			notEmpty:{},
        			regexp:{
		                    regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
		                        message: 'Por favor verifica el campo'
		                    }
        		}},
			telMun:{
				validators:{
					integer:{},
					notEmpty:{}
				}

			},
        		}
        	})
		$('.mayuscula').focusout(function() {
				$(this).val($(this).val().toUpperCase());
			});
	});
</script>
@stop