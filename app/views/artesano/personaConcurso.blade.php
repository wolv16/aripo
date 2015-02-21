@extends('layouts.baseartesanos')
@section('titulo') REGISTRO EN CONCURSO
@endsection 
 
@section('contenido')
	<div class="container wellr">
		<div class="pull-left col-sm-4" id="concursos">
      		@if(isset($concursos))
      			<div class="bg-orga col-sm-12 text-center">CONCURSOS PRÓXIMOS</div>
        		@foreach($concursos as $concurso)
		            <div class="container bg-evento col-sm-12">
		            	<div class="col-sm-7">
	           				<p id='idconc' class='hidden'>{{$concurso->id}}</p>
				            <h5><i class="fa fa-trophy fa-lg pull-left"></i><strong>{{$concurso->nombre}}</strong></h5>
				            <h5>FECHA: {{$concurso->fecha}}</h5>
				            <h5>NIVEL: {{$concurso->nivel}}</h5>
				            <h5>DÍA DE PREMIACIÓN: {{$concurso->premiacion}}</h5>
			          	</div>
		              	<div class="col-sm-5">
		              		<img style="border: 0pt; margin-left: 0px; margin-bottom: 10px; margin-top: 15px;" src="./imgs/event5.png"></img>
		          		</div>
            		</div>
          		@endforeach    
      		@endif
    	</div>
		<div class="col-sm-4 col-sm-offset-2 wellr" style="text-align:center;">
			<img id="123" class="botones elegido" title="Artesano" src="./imgs/nueva.png"></img>
			<img id="1234"class="botones" style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" title="Persona" src="./imgs/inscrito.png"></img>
		</div>	
 <!-- /////////////////-->		
		<div class="col-sm-8 pull-right wellr" id="divalta">
			<div class="bg-orga col-sm-12 text-center">DATOS DEL PARTICIPANTE</div>
			{{ Form::open(array('url' => 'personaConcurso','role' => 'form','id' => 'formalta','data-toggle' => 'validator')) }}
				<div class='col-md-12'>
					<div id="idcurp" class="col-sm-5 form-group">	
						{{ Form::label('curp', 'CURP') }}
						{{ Form::text('curp', null, array('id' => 'curp', 'placeholder' => 'Ingrese CURP','class' => 'form-control')) }}
					</div>
				</div>
				<div class="col-sm-12">	
					<div class="col-sm-4 form-group">	
						{{ Form::label ('nombre', 'Nombre',array('class' => 'control-label')) }}
						{{ Form::text('nombre', null, array('placeholder' => 'Ingrese nombre','class' => 'form-control mayuscula')) }}
					</div>
					<div class="col-sm-4 form-group">	
						{{ Form::label ('paterno', 'Apellido paterno',array('class' => 'control-label')) }}
						{{ Form::text('paterno', null, array('placeholder' => 'Apellido paterno','class' => 'form-control mayuscula')) }}
					</div>
					<div class="col-sm-4 form-group">	
						{{ Form::label ('materno', 'Apellido materno',array('class' => 'control-label')) }}
						{{ Form::text('materno', null, array('placeholder' => 'Apellido materno','class' => 'form-control mayuscula')) }}
					</div>
				</div>
				<div class="col-sm-12">
					<div class="col-sm-3 form-group">
						{{ Form::label('sexo', 'Sexo',array('class' => 'control-label')) }} 
						{{Form::select('sexo', array('' => 'Seleccione','Masculino' => 'Masculino','Femenino' => 'Femenino',), null, array('class' =>'form-control'))}}
					</div>
					<div class="form-group col-sm-4 fecha">
			          {{ Form::label('fechanace', 'Fecha de nacimiento',array('class' => 'control-label')) }}
			          <div class="input-group date" id="datetimePicker">
			            {{ Form::text('fechanace', null, array('class' => 'form-control','placeholder' => 'YYYY-MM-DD', 'data-date-format' => 'YYYY-MM-DD')) }}
			            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			          </div>
			        </div>
					<div class="col-sm-3 form-group">
						{{ Form::label('grupoetnico', 'Grupo Étnico',array('class' => 'control-label')) }}
						{{ Form::select('grupoetnico', $grupos, null, array('class' => 'form-control')) }}
					</div>
				</div>	
				
				<div class="col-md-12">
					<div class="col-md-6 form-group">
						{{ Form::label('colonia', 'Colonia') }}
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-home"></i></div>
						{{ Form::text('colonia', null, array('placeholder' => 'Nombre de la colonia','class' => 'form-control')) }}
						</div>
					</div>
					<div class="col-md-6 form-group">
						{{ Form::label('calle', 'Calle') }}
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-home"></i></div>
						{{ Form::text('calle', null, array('placeholder' => 'Nombre de la calle','class' => 'form-control')) }}
						</div>
					</div>
	
				</div>
				
				<div class="col-sm-12">
					<div class="col-md-3 form-group">
						{{ Form::label('numero', 'Número') }}
						{{ Form::text('numero', null, array('placeholder' => 'No.','class' => 'form-control')) }}
					</div>
					<div class="col-sm-4 form-group">
						{{ Form::label('municipio', 'Municipio') }}
						{{ Form::select('municipio',$municipios, null, array('class' => 'form-control','id'=>'selectmun')) }} 
					</div>
					<div class="form-group col-sm-4">
						{{ Form::label('localidad', 'Localidad') }}
						{{ Form::select('localidad',array(), null, array('class' => 'form-control', 'id'=>'selectloc')) }}
					</div>
				</div>
				<div class="col-sm-12">
					<div class="form-group col-sm-3">
						{{ Form::label('cp', 'C.P.') }}
						{{ Form::text('cp', null, array('placeholder' => 'CP','class' => 'form-control')) }}
					</div>
					<div class="col-sm-3 form-group">
						{{ Form::label('lada', 'Lada') }}
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-phone"></i></div>
							{{ Form::text('lada', null, array('placeholder' => 'Lada','class' => 'form-control')) }}
						</div>
					</div>
					
					<div class="col-sm-3 form-group">
						{{ Form::label('tel', 'Telefono') }}
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-phone"></i></div>
						{{ Form::text('tel', null, array('placeholder' => 'Teléfono','class' => 'form-control')) }}
						</div>
					</div>
					<div class="col-md-3 form-group">
						{{ Form::label('tipoTel', 'Tipo Teléfono') }} <br>
						{{Form::select('tipoTel', array('' => 'Seleccione','Casa' => 'Casa','Celular' => 'Celular','Caseta' => 'Caseta','Vecino' => 'Vecino',), null, array('class' =>'form-control'))}}
						</div>

				</div>
				<div class="col-md-12">
					<div class="col-sm-4 form-group">
						{{ Form::label('rama', 'Rama Artesanal') }} <br>
						{{Form::select('rama', $ramas, null, array('class' =>'form-control'))}}
					</div>
				</div>
				<div class="col-sm-12 wellr">
					<h4>DATOS DE LA PIEZA</h4>
					<div class="col-sm-12">
						<div class="col-sm-4 form-group">	
							{{ Form::label('categoria', 'Categoría') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-sitemap"></i></div>
								{{ Form::textarea('categoria', null, array('placeholder' => 'Ingrese categoría','class' => 'form-control', 'size' => '3x2')) }}	
							</div>
						</div>
						<div class="col-sm-7 form-group">	
							{{ Form::label('pieza', 'Pieza') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-info-circle"></i></div>
							{{ Form::textarea('pieza', null, array('placeholder' => 'Descripción y nombre de la pieza','class' => 'form-control', 'size' => '3x2')) }}
							</div>
						</div>
						<div class="col-sm-3 form-group">
							{{ Form::label('costo', 'Costo Aprox') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-dollar"></i></div>
								{{ Form::text('costo', null, array('placeholder' => 'costo','class' => 'form-control')) }}
							</div>
						</div>
						<div class="col-sm-3 form-group">
							{{ Form::label('avaluo', 'Avaluo') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-dollar"></i></div>
								{{ Form::text('avaluo', null, array('placeholder' => 'avaluo','class' => 'form-control')) }}
							</div>
						</div>
						<div class="col-sm-4 form-group">
								{{ Form::label('prod', 'Producción mensual') }}
								<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-signal"></i></div>
									{{ Form::text('prod', null, array('placeholder' => 'produccion','class' => 'form-control')) }}
								</div>
							</div>
						
					</div>
					<div class="col-sm-12">
						<div class="col-sm-7 form-group">
							{{ Form::label('observ', 'OBSERVACIONES') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-eye"></i></div>
							{{ Form::textarea('observ', null, array('placeholder' => 'Escriba las observaciones aquí','class' => 'form-control', 'size' => '6x2')) }}<br>
							</div>
						</div>
						<div class="col-sm-2 form-group hidden">
							{{ Form::label('concid', 'CONCURSO') }}
							{{ Form::text('concid', null, array('placeholder' => 'Id','class' => 'form-control')) }}
						</div>
					</div>
					<div class="col-sm-12">
						<div class="col-sm-4 form-group">
							{{ Form::label('calidad', 'Calidad en general') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-star-half-o"></i></div>
							{{ Form::text('calidad', null, array('placeholder' => 'Calidad de la pieza','class' => 'form-control')) }}
							</div>
						</div>
						<div class="col-sm-6 form-group">
							{{ Form::label('recibio', 'Recibió') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-male"></i></div>
							{{ Form::text('recibio', null, array('placeholder' => 'Nombre de quien recibe la pieza','class' => 'form-control')) }}
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 form-group">
					<button id="btonen" type="submit" class="btn btn-ioa btn-lg pull-right">Registrar <span class="glyphicon glyphicon-ok"></span></button>
				</div>
			{{ Form::close() }}
		</div>
 <!--////////////////////////-->
		<div class="col-sm-8 pull-right hidden" id="inscritod">
			<div class="col-sm-12 wellr">
				{{ Form::open(array('id' => 'buscaconcursante', 'url' => 'buscaconcursante')) }}
					<div class="col-sm-12">
						<div class="bg-orga col-sm-12">BÚSQUEDA DEL CONCURSANTE</div>
						<div class="col-sm-6 form-group">
							{{ Form::label('artesanombre', 'Nombre(s)',array('class' => 'control-label')) }}
							{{ Form::text('artesanombre', null, array('placeholder' => 'introduce nombre','class' => 'form-control')) }}
						</div>
						<div class="col-sm-6 form-group">
							{{ Form::label('artesapaterno', 'Apellido paterno') }}
							{{ Form::text('artesapaterno', null, array('placeholder' => 'introduce apellido paterno','class' => 'form-control')) }}
						</div>

						<div class="col-sm-6 form-group">
							{{ Form::label('artesamaterno', 'Apellido materno') }}
							{{ Form::text('artesamaterno', null, array('placeholder' => 'introduce apellido materno','class' => 'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-ioa pull-right">
							<span class="glyphicon glyphicon-search"></span> 
							Buscar 
						</button>
					</div>
				{{Form::close()}}
			</div>
			<div class="modal fade" id="myModal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h3 class="modal-title">Artesanos</h3>
						</div>
						<div class="modal-body">
							<h5 class="text-center">Elige una opción</h5>
							<table class="table table-hover">
							<thead id="tblHead">
							<tr>
							<th>Nombre</th>
							<th>Paterno</th>
							<th>Materno</th>
							<th>Fecha Nacimiento</th>
							<th>Seleccionar</th>
							</tr>
							</thead>
							<tbody id="elementobody">
							</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<button id="cerrar" type="button" class="btn btn-default " data-dismiss="modal">Cerrar</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<div id="inscrito_div" class="col-sm-12 wellr hidden">
				<h4>DATOS DE LA PIEZA</h4>
				<div class="col-sm-12">
					{{ Form::open(array('url' => 'personaConcurso2','role' => 'form','id' => 'inscrito','class' => 'class')) }}
						<div class="col-sm-4 form-group">	
							{{ Form::label('categoria', 'Categoría') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-sitemap"></i></div>
								{{ Form::textarea('categoria', null, array('placeholder' => 'Ingrese categoría','class' => 'form-control', 'size' => '3x2')) }}	
							</div>
						</div>
						<div class="col-sm-7 form-group">	
							{{ Form::label('pieza', 'Pieza') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-info-circle"></i></div>
								{{ Form::textarea('pieza', null, array('placeholder' => 'Descripción y nombre de la pieza','class' => 'form-control', 'size' => '3x2')) }}
							</div>
						</div>
						<div class="col-sm-12">
							<div class="col-sm-3 form-group">
								{{ Form::label('costo', 'Costo Aprox') }}
								<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-dollar"></i></div>
									{{ Form::text('costo', null, array('placeholder' => 'costo','class' => 'form-control')) }}
								</div>
							</div>
							<div class="col-sm-3 form-group">
								{{ Form::label('avaluo', 'Avaluo') }}
								<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-dollar"></i></div>
									{{ Form::text('avaluo', null, array('placeholder' => 'avaluo','class' => 'form-control')) }}
								</div>
							</div>
							<div class="col-sm-3 form-group">
								{{ Form::label('prod', 'Producción mensual') }}
								<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-signal"></i></div>
									{{ Form::text('prod', null, array('placeholder' => 'produccion','class' => 'form-control')) }}
								</div>
							</div>
						</div>
						<div class="col-sm-7 form-group">
							{{ Form::label('observ', 'OBSERVACIONES') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-eye"></i></div>
							{{ Form::textarea('observ', null, array('placeholder' => 'Escriba las observaciones aquí','class' => 'form-control', 'size' => '6x2')) }}<br>
							</div>
						</div>
						<div class="col-sm-4 form-group">
							{{ Form::label('calidad', 'Calidad en general') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-star-half-o"></i></div>
							{{ Form::text('calidad', null, array('placeholder' => 'Calidad de la pieza','class' => 'form-control')) }}
							</div>
						</div>		
						<div class="col-sm-6 form-group">
							{{ Form::label('recibio', 'Recibió') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-male"></i></div>
							{{ Form::text('recibio', null, array('placeholder' => 'Nombre de quien recibe la pieza','class' => 'form-control')) }}
							</div>
						</div>
						<div class="col-sm-12 form-group">
							<button type="submit" class="btn btn-ioa btn-lg pull-right" id="btner">
								 Registrar 
								<span class="glyphicon glyphicon-ok"></span>
							</button>
						</div>
						{{ Form::text('idpersona', null, array('class' => 'hidden')) }}
						{{ Form::text('idartesano', null, array('class' => 'hidden')) }}
						{{ Form::text('concid', null, array('class' => 'hidden')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
		{{ Form::open(array('url' => 'credenciales/imprimirregistro','role' => 'form','id' => 'imprimir','class' => 'hidden')) }}
			{{ Form::text('registroartesano', null, array('class' => 'class')) }}
			{{ Form::text('registropersona', null, array('class' => 'class')) }}
			{{ Form::text('registroconcid', null, array('class' => 'class')) }}
		{{ Form::close() }}
	</div>
@stop

@section('scripts')
<style type="text/css" media="screen">
	.fecha i{
    	right: 55px !important;
  	}
	.tok{
		top: 17px !important;
		right: 23px !important;
	}
	textarea{
		resize:none !important;
	}
</style>
<script src="js/bootstrapValidator.js" type="text/javascript"></script>
<script src="js/es_ES.js" type="text/javascript"></script>
	
<script type="text/javascript">
$(document).ready(function() {

	$('#datetimePicker').datetimepicker({
        language: 'es',
        pickTime: false,
        defaultDate: moment().subtract(8, 'y'),
 		maxDate: moment().subtract(6, 'y')
    });
    $('#datetimePicker1').datetimepicker({
        language: 'es',
        pickTime: false,
        defaultDate: moment().subtract(8, 'y'),
 		maxDate: moment().subtract(6, 'y')
    });

	$('#buscaconcursante').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok tok',
            invalid: 'glyphicon glyphicon-remove tok',
            validating: 'glyphicon glyphicon-refresh tok'
        },
        fields: {
            artesanombre: {
                validators: {
                	notEmpty: {},
                    regexp:{
                    regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
                        message: 'Por favor verifica el campo'
                    }
                    }},
            artesapaterno:{
                validators: {
                    notEmpty: {},
                	regexp:{
                    regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
                        message: 'Por favor verifica el campo'
                    }
                    }},
            artesamaterno:{
				validators: {
                    regexp:{
                    regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
                        message: 'Por favor verifica el campo'
                    }
                    }
                },
            fechanace: {
                validators: {
                    notEmpty: {},
                    date: {
                        format: 'YYYY-MM-DD'
                    }
                }
            }		            

        }
    })
	.on('success.form.bv', function(e) {
        e.preventDefault();
		$.post('buscaconcursante', $(this).serialize(), function(json) {
			console.log(json);
			$('#inscrito_div').removeClass('hidden');
			if(json.length == 0){
				swal('Error', 'No se encontraron coincidencias', 'error');
				$('#inscrito_div').addClass('hidden');
			}
			else{
				$.each(json,function(index,artesano){
					$('#elementobody').append('<tr>'+
					'<td>'+artesano.nombre+'</td>'+
					'<td>'+artesano.paterno+'</td>'+
					'<td>'+artesano.materno+'</td>'+
					'<td>'+artesano.fechanacimiento+'</td>'+
					'<td>'+artesano.rama.nombre+'</td>'+
					'<td><button class="btn-ioa btn-xs" onClick="encontrado('+artesano.id+')" data-dismiss="modal">Seleccionar</button></td>');
					$("#myModal").modal('show');
				});
			}
		}, 'json');
	});
	$('#myModal').on('hide.bs.modal', function() {
		$('#elementobody').html('');
	});

	$('#formalta').bootstrapValidator({
	    // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
	    feedbackIcons: {
	        valid: 'glyphicon glyphicon-ok tok',
	        invalid: 'glyphicon glyphicon-remove tok',
	        validating: 'glyphicon glyphicon-refresh tok'
	    },
	    fields: {
	        nombre: {
	            validators: {
	                notEmpty: {},
	            	regexp:{
	                regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
	                    message: 'Por favor verifica el campo'
	                }
	                }},
	        paterno:{
                validators: {
                    notEmpty: {},
                	regexp:{
                    regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
                        message: 'Por favor verifica el campo'
                    }
                    }},
            materno:{
				validators: {
                    regexp:{
                    regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
                        message: 'Por favor verifica el campo'
                    }
                    }
                },
                colonia: {
		                validators: {
		                    notEmpty: {}
		                }
		            },
		            calle: {
		                validators: {
		                    notEmpty: {}
		                }
		            },
	                tipoTel: {
	                	validators: {
	                		notEmpty: {},
	                	}
	                },
	        cp:{
	            validators: {
	                integer: {},
					stringLength:{
						min: 5,
						max: 5,
						message: 'El CP debe tener 5 dígitos'
					}
	            }
	        },
	       curp:{
				validators:{
                    notEmpty:{},
                    regexp: {
                        regexp:/^[a-zA-Z]{4}((\d{2}((0[13578]|1[02])(0[1-9]|[12]\d|3[01])|(0[13456789]|1[012])(0[1-9]|[12]\d|30)|02(0[1-9]|1\d|2[0-8])))|([02468][048]|[13579][26])0229)(H|M|h|m)(AS|as|BC|bc|BS|bs|CC|cc|CL|cl|CM|cm|CS|cs|CH|ch|DF|df|DG|dg|GT|gt|GR|gr|HG|hg|JC|jc|MC|mc|MN|mn|MS|ms|NT|nt|NL|nl|OC|oc|PL|pl|QT|qt|QR|qr|SP|sp|SL|sl|SR|sr|TC|tc|TS|ts|TL|tl|VZ|vz|YN|yn|ZS|zs|SM|sm|NE|ne)([a-zA-Z]{3})([a-zA-Z0-9\s]{1})\d{1}$/,
                        message: 'Por favor verifica el campo'
					}
		            }},
	        RFC: {
	            validators: {
	                stringLength: {
	                    min: 13,
	                    max:13,
	                    message:'Se requieren 13'
	                }
	            }
	        },
	        fechanace: {
	            validators: {
	                notEmpty: {},
	                date: {
	                    format: 'YYYY-MM-DD'
	                }
	            }
	        },
	        tel: {
	            validators: {
	                integer:{}
	            }},
	            lada: {
	            validators: {
	                integer: {},
	                stringLength: {
	                    min: 3,
	                    max: 3,
	                    message:'Verifica'
	            }
	        }
	        },
	        sexo:{
	        	validators: {
	        		notEmpty:{}
	        	}
	        },
	        numero:{
                validators: {
                    integer: {},
                    notEmpty: {},
                }
            },
	        concid:{
	        	validators: {
	        		notEmpty:{}
	        	}
	        },
	        estado:{
	        	validators: {
	        		notEmpty:{}
	        	}
	        },
	        grupoetnico:{
	        	validators: {
	        		notEmpty:{}
	        	}
	        },
	        rama:{
	        	validators: {
	        		notEmpty:{}
	        	}
	        },
	        categoria:{
	        	validators: {
	        		notEmpty:{}
	        	}
	        },
	        pieza:{
	        	validators: {
	        		notEmpty:{}
	        	}
	        },
	        costo:{
	        	validators: {
	        		integer: {},
	        		notEmpty:{}
	        	}
	        },
        	avaluo:{
        	validators: {
        		integer: {},
        		notEmpty:{}
        	}
	        },
	        prod:{
        	validators: {
        		integer: {},
        		notEmpty:{}
        	}
	        },
	        observ: {
	            validators: {
	            	regexp:{
	                regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
	                    message: 'Por favor verifica el campo'
	                }
	                }},
	        recibio: {
	            validators: {
	                notEmpty: {},
	            	regexp:{
	                regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
	                    message: 'Por favor verifica el campo'
	                }
	                }},
	        calidad: {
	            validators: {
	                notEmpty: {},
	            	regexp:{
	                regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
	                    message: 'Por favor verifica el campo'
	                }
	                }}

	    }
	})
	.on('success.form.bv', function(e) {
        e.preventDefault();
        if($('[name = concid').val() == "")
        	swal('Error', 'Aun no seleccionas un concurso', 'error');
        else
		$.post($(this).attr('action'), $(this).serialize(), function(json) {
			console.log(json);
			$('[name = registroartesano]').val("");
			$('[name = registropersona]').val(json.id);
			$('[name = registroconcid]').val($('[name = concid]').val());
			swal({
					title: 'Operacion completada correctamente',
					text: 'Imprimir registro',
					type: 'success',
					showCancelButton: true,
					confirmButtonColor: '#AEDEF4',
					confirmButtonText: 'Si',
					cancelButtonText: 'No',
					closeOnConfirm: false,
					closeOnCancel: false
					},
					function(isConfirm){
						if(isConfirm)
							$('#imprimir').submit();
					});
					$('#formalta').data('bootstrapValidator').resetForm(true);
		}, 'json');

	});

	$('#inscrito').bootstrapValidator({
	    // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
	    feedbackIcons: {
	        valid: 'glyphicon glyphicon-ok tok',
	        invalid: 'glyphicon glyphicon-remove tok',
	        validating: 'glyphicon glyphicon-refresh tok'
	    },
	    fields: {
	    	observ: {
	            validators: {
	            	regexp:{
	                regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
	                    message: 'Por favor verifica el campo'
	                }
	                }},
	        recibio: {
	            validators: {
	                notEmpty: {},
	            	regexp:{
	                regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
	                    message: 'Por favor verifica el campo'
	                }
	                }},
	        calidad: {
	            validators: {
	                notEmpty: {},
	            	regexp:{
	                regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
	                    message: 'Por favor verifica el campo'
	                }
	                }},
            categoria:{
		    	validators: {
		    		notEmpty:{}
		    	}
			        },
	        pieza:{
	        	validators: {
	        		notEmpty:{}
	        	}
	        },
	        costo:{
	        	validators: {
	        		integer: {},
	        		notEmpty:{}
	        	}
	        },
	        prod:{
        	validators: {
        		integer: {},
        		notEmpty:{}
        	}
	        },
	        avaluo:{
	        	validators: {
	        		integer: {},
	        		notEmpty:{}
	        	}
	        }
	    }
	})
	.on('success.form.bv', function(e) {
        e.preventDefault();
        if($('[name = concid]').val() == "")
        	swal('Error', 'Aun no seleccionas un concurso', 'error');
        else
		$.post($('#inscrito').attr('action'), $('#inscrito').serialize(), function(json) {
			if(json.error)
				swal('Error', 'Esta persona ya esta inscrita en el concurso seleccionado', 'error');
			else{
				$('[name = registroartesano]').val($('[name = idartesano]').val());
				$('[name = registropersona]').val($('[name = idpersona]').val());
				$('[name = registroconcid]').val($('[name = concid]').val());
				swal({
					title: 'Operacion completada correctamente',
					text: 'Imprimir registro',
					type: 'success',
					showCancelButton: true,
					confirmButtonColor: '#AEDEF4',
					confirmButtonText: 'Si',
					cancelButtonText: 'No',
					closeOnConfirm: false,
					closeOnCancel: false
					},
					function(isConfirm){
						if(isConfirm)
							$('#imprimir').submit();
					});
			}
				//swal('Operacion completada correctamente', '', 'success');
			$('#inscrito').data('bootstrapValidator').resetForm(true);
			$('#inscrito_div').addClass('hidden');
			$('[name = idartesano]').val("");
			$('[name = idpersona]').val("");
			$('[name = concid]').val("");
			$('.bg-evento').removeClass('sombreado-evento');
		}, 'json');
		
	});

	$('.mayuscula').focusout(function() {
		$(this).val($(this).val().toUpperCase());
	});
});

$('#datetimePicker').on('dp.change dp.show', function(e) {
        $('#formalta').bootstrapValidator('revalidateField', 'fechanace');
    });
$('#datetimePicker1').on('dp.change dp.show', function(e) {
        $('#buscaconcursante').bootstrapValidator('revalidateField', 'fechanace');
    });
$('.bg-evento').click(function(){
	$('.bg-evento').removeClass('sombreado-evento');
	$(this).addClass('sombreado-evento');
	$('[name=concid]').val($(this).find('#idconc').text());
	$('#formalta').bootstrapValidator('revalidateField', 'concid');
	$('#btonen , #btner').prop( "disabled", false );
});

$('#123').click(function(){
	$('.botones').removeClass('elegido');
	$(this).addClass('elegido');
	$('#inscritod').addClass('hidden');
	$('#divalta').removeClass('hidden');

});

$('#1234').click(function(){
	$('.botones').removeClass('elegido');
	$(this).addClass('elegido');
	$('#inscritod').removeClass('hidden');
	$('#divalta').addClass('hidden');

});
$('#cerrar').click(function(){
	$('#inscrito_div').addClass('hidden');
});
</script>

<script type="text/javascript" charset="utf-8">
$( "#selectmun" ).change(function () {
	$.post("<?php echo URL::to('artesano/municipio'); ?>", 'id='+$( "#selectmun option:selected" ).val(), function(json) {
		 $( "#selectloc" ).html('');
		$(json).each(function(){
			$( "#selectloc" ).append( '<option value="'+this.id+'">'+this.nombre+'</option>')
		});
	}, 'json');
}).change();
function encontrado (id) {
	$.post('buscaconcursante2', {id:id}, function(json) {
		console.log(json);
		$('#inscrito').data('bootstrapValidator').resetForm(true);
		$('[name = idpersona]').val(json.id);
		if(json.artesano)
			$('[name = idartesano]').val(json.artesano.id);
		else
			$('[name = idartesano]').val("");
		$('[name = concid]').val("");
		$('.bg-evento').removeClass('sombreado-evento');
	}, 'json').fail(function(){
		swal('Error','Ocurrió un error, vuelva a intentarlo','error');
	});
}
</script>

<script>
	$( "#curp" ).focusout(function() {
		var curp = $(this).val();
		$.post('curp',{curp:curp}, function(json) {
			if (!json.success) {
				$('#idcurp').addClass('has-error');
				$('[name=curp]').val('');
				$('#formalta').bootstrapValidator('revalidateField','curp');
				$('[name=curp]').focus();
				$('[name=curp]').closest('div').find('small').html('La CURP '+curp+' ya se encuentra registrada');
			}
		}, 'json');
	})
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#menu-item-48164").addClass("current_page_item ");
    });
</script>

@stop