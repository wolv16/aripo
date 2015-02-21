@extends('layouts.baseartesanos')
    @section('titulo') IOA-Credenciales
    @endsection 
@section('contenido')
	<div class="container wellr">			
    	<div class="col-sm-5 wellr">
    		{{ Form::open(array('url' => 'credenciales/artesano','role' => 'form','id' => 'artesano','class' => 'form')) }}
			
				<div class="col-md-12">

					<div class="bg-orga col-md-12">BÚSQUEDA DE ARTESANOS</div>
					
					<div class="col-md-12 form-group">
					{{ Form::label('artesanombre', 'Nombre(s)',array('class' => 'control-label')) }}
					{{ Form::text('artesanombre', null, array('placeholder' => 'introduce nombre','class' => 'form-control')) }}
					</div>

					<div class="col-md-12 form-group">
					{{ Form::label('artesapaterno', 'Apellido paterno') }}
					{{ Form::text('artesapaterno', null, array('placeholder' => 'introduce apellido paterno','class' => 'form-control')) }}
					</div>

					<div class="col-md-12 form-group">
					{{ Form::label('artesamaterno', 'Apellido materno') }}
					{{ Form::text('artesamaterno', null, array('placeholder' => 'introduce apellido materno','class' => 'form-control')) }}
					</div>
				</div>

					<div class="form-group" style="top: 13px !important;">
						<button id="found" type="submit" class="btn btn-ioa pull-right">
							<span class="glyphicon glyphicon-search"></span> 
							Buscar 
						</button>
					</div>
			{{Form::close()}}
			<div id="imp_artesano" class="hidden col-sm-12">
				<h3>Pulsa imprimir para generar credencial</h3>
				{{ Form::open(array('url' => 'credenciales/credencial','role' => 'form','id' => 'credencial','class' => 'class')) }}
					{{ Form::text('id', null, array('class' => 'hidden form-control')) }}
					<div class="form-group" style="top: 13px !important;">
						<button id="found" type="submit" class="btn btn-ioa pull-right">
							<span class="glyphicon glyphicon-print"></span> 
							Imprimir 
						</button>
					</div>
				{{ Form::close() }}
			</div>
		</div>
		<div class="col-sm-6 wellr">	
			<div class="col-md-12">
				{{ Form::open(array('url' => 'credenciales/organizacion','role' => 'form','id' => 'organizacion','class' => 'form')) }}
					<div class="col-md-12">
						<h3></h3>
					</div>
					<div class="bg-orga col-md-12">BUSQUEDA DE ORGANIZACIONES</div>
				
					<div class="col-xs-4 col-md-6 form-group">
						{{ Form::label ('organización', 'NOMBRE ORGANIZACIÓN') }}
						{{ Form::text('nombreorg', null, array('placeholder' => 'Escriba el nombre de la organización','class' => 'form-control')) }} 
					</div>

					<div class="col-md-1 form-group" style="top: 17px !important; ">
						<button type="submit" class="btn btn-ioa">
							<span class="glyphicon glyphicon-search"></span>
					 		Buscar 
						</button>
					</div>
				{{ Form::close() }}
			</div>
    	</div>
    	<div id="form_org" class="col-sm-6 col-sm-offset-1 wellr hidden" style="min-height:400px; margin:10px 0 0 30px;">
    		{{ Form::open(array('url' => 'credenciales/credenciales','role' => 'form','id' => 'form_artesanos','class' => 'class')) }}
    			{{ Form::text('org_id', null, array('class' => 'hidden')) }}
	    		<div class="checkbox col-sm-6">
	    			<label style="font-size:16px;">{{Form::checkbox('todos', 'all', false);}}Seleccionar todos</label>
	    		</div>
	    		<div class="form-group" style="top: 13px !important;">
					<button id="imprimir" type="button" class="btn btn-ioa pull-right">
						<span class="glyphicon glyphicon-print"></span> 
						Imprimir 
					</button>
				</div>
    		{{ Form::close() }}
		  <div id="artesanos"></div>
		</div>
	</div>
	<div class="modal fade" id="artesanomodal">
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
							<button type="button" class="btn btn-default " data-dismiss="modal">Cerrar</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<div class="modal fade" id="orgmodal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h3 class="modal-title">Organizaciones</h3>
						</div>
						<div class="modal-body">
							<h5 class="text-center">Elige una opción</h5>
							<table class="table table-hover">
								<thead id="tblHead">
									<tr>
										<th>Organización</th>
										<th>Teléfono</th>
										<th>Seleccionar</th>
									</tr>
								</thead>
								<tbody id="elementobody2">
								</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default " data-dismiss="modal">Cerrar</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
@stop
@section('scripts')
<style type="text/css" media="screen">
	.fecha i{
	    right: 55px !important;
	  }
	.tok{
		top: 18px !important;
		right: 23px !important;
	}
</style>
<script src="js/bootstrapValidator.js" type="text/javascript"></script>
<script src="js/es_ES.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	//$("#menu-item-49489").addClass("current_page_item ");
	$('#datetimePicker1').datetimepicker({
        language: 'es',
        pickTime: false
    });

	$('#artesano').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok tok',
            invalid: 'glyphicon glyphicon-remove tok',
            validating: 'glyphicon glyphicon-refresh tok'
        },
        fields: {
        	artesanombre: {
                validators: {
                    regexp:{
                    regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
                        message: 'Por favor verifica el campo'
                    }
                    }
            },
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
                }
        }
    })
    .on('success.form.bv', function(e) {
    	e.preventDefault();
		$.post($(this).attr('action'), $(this).serialize(), function(json) {
				// $('#imp_artesano').removeClass("hidden");
				// $('[name=id]').val(json.artesano.id);
			console.log(json);
				if(json.length == 0){
					swal('Error', 'Persona no encontrada', 'error');
					$('#artesano').addClass("hidden");
				}
				else{
					$.each(json,function(index,artesano){
						$('#elementobody').append('<tr>'+
						'<td>'+artesano.persona.nombre+'</td>'+
						'<td>'+artesano.persona.paterno+'</td>'+
						'<td>'+artesano.persona.materno+'</td>'+
						'<td>'+artesano.persona.fechanacimiento+'</td>'+
						'<td>'+artesano.persona.rama.nombre+'</td>'+
						'<td><button class="btn-ioa btn-xs" onClick="encontrado('+artesano.id+')" data-dismiss="modal">Seleccionar</button></td>');
						$("#artesanomodal").modal('show');
					});
				}
		}, 'json').fail(function(){
			swal('Error','No se encontró el artesano','error');
		});
    });
    $('#organizacion').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok tok',
            invalid: 'glyphicon glyphicon-remove tok',
            validating: 'glyphicon glyphicon-refresh tok'
        },
        fields: {
        	nombreorg:{
        		validators:{
        			notEmpty:{},
        			regexp:{
		                    regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
		                        message: 'Por favor verifica el campo'
		                    }
        		}},
			telmun:{
				validators:{
					integer:{},
					notEmpty:{},
					stringLength: {
					    min: 7,
					    max:10,
					},
				}
			},
        }
    })
    .on('success.form.bv', function(e) {
		e.preventDefault();
		$.post('buscorg', $(this).serialize(), function(json) {
        	if(json.length >= 1){
            	$.each(json,function(index,org){
					$('#elementobody2').append('<tr>'+
					'<td>'+org.nombre+'</td>'+
					'<td>'+org.telefono+'</td>'+
					'<td><button class="btn-ioa btn-xs" onClick="encontrada('+org.id+','+org.organizacion_id+')" data-dismiss="modal">Seleccionar</button></td>');
				});
				$("#orgmodal").modal('show');
			}
			else
				swal('Error','No se registro la organizacion','error');
		}, 'json').fail(function(){
			swal('Error','No se encontró la organizacion','error');
		});
    });
	$('.mayuscula').focusout(function() {
		$(this).val($(this).val().toUpperCase());
	});
	$('#datetimePicker1').on('dp.change dp.show', function(e) {
    	$('#artesano').bootstrapValidator('revalidateField', 'fechanace');
    });
    $('#credencial').submit(function(e){
    	if($('[name=id]').val() == ''){
    		e.preventDefault();
			swal('Error','No se puede imprimir','error');
    	}
    });
    $('#imprimir').click(function(){
	  if($('#artesanos_table').DataTable().rows('.success').data().length == 0 && !$('[name=todos]').is(":checked")){
	    swal('Error', "Ningun artesano seleccionado", "error");
	  }
	  else if($('[name=todos]').is(":checked")){
	  	$('#form_artesanos').submit();
	  }
	  else{
	    var artesanos = '';
	    $('#artesanos_table').DataTable().rows('.success').data().each(function( row ) {
	      artesanos += '<input class="hidden" type="checkbox" checked name="'+row[0]+'">';
	    });
	    $('#form_artesanos').html(artesanos);
	    $('#form_artesanos').submit();
	  }
	});
	$('[name=todos]').change(function(){
		if($('[name=todos]').is(":checked"))
			$('#artesanos_table').find('tbody').find('tr').addClass('success');
		else
			$('#artesanos_table').find('tbody').find('tr').removeClass('success');
	});
});
$('#artesanomodal').on('hide.bs.modal', function() {
		    $('#elementobody').html('');
		});
$('#orgmodal').on('hide.bs.modal', function() {
		    $('#elementobody2').html('');
		});		
function creartabla(json){
	$('#artesanos').html('<table id="artesanos_table" class="table table-hover table-first-column-number data-table display full"></table>');
	$('#artesanos_table').dataTable( {
	  "data": json.artesanos,
	  "columns": [
	      { "title": "id" },
	      { "title": "Nombre" },
	      { "title": "Fecha de nacimiento" },
	  ],
	  "language": {
	    "lengthMenu": "Artesanos por página _MENU_",
	    "zeroRecords": "No se encontro",
	    "info": "Pagina _PAGE_ de _PAGES_",
	    "infoEmpty": "No records available",
	    "infoFiltered": "(Ver _MAX_ total records)",
	    'search': 'Buscar: ',
	    "paginate": {
	      "first":      "Inicio",
	      "last":       "Fin",
	      "next":       "Siguiente",
	      "previous":   "Anterior"
	    },
	}
	} );
	$('#artesanos_table').find('tbody').find('tr').on( 'click', function () {
		$(this).toggleClass('success');
	} );	 
}
function encontrado (id) {
	$.post('buscaconcursante2', {id:id}, function(json) {
		console.log(json);
		$('#imp_artesano').removeClass("hidden");
		$('[name=id]').val(json.id);
	}, 'json').fail(function(){
		swal('Error','No se encontró el artesano','error');
	});
}
function encontrada (id) {
	$.post('credenciales/organizacion', {id:id}, function(json) {
		console.log(json);
		$('#form_org').removeClass("hidden");
		$('[name=org_id]').val(json.organizacion.id);
		creartabla(json);
	}, 'json').fail(function(){
		swal('Error','No se encontró el artesano','error');
	});
}
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#menu-item-49489").addClass("current_page_item ");
    });
</script>
@stop