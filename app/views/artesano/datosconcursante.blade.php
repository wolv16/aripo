@extends('layouts.baseartesanos')
	@section('titulo')BÚSQUEDA ARTESANO
	@endsection

@section('contenido')
<div class="container wellr">

	<div class="col-sm-4 wellr">
		{{ Form::open(array('id' => 'buscarartesano')) }}
		
			<div class="col-md-12">

				<div class="bg-orga col-md-12">BÚSQUEDA DE ARTESANOS</div>
				
				<div class="col-md-12 form-group">
				{{ Form::label('artesanombre', 'Nombre(s)',array('class' => 'control-label')) }}
				{{ Form::text('artesanombre', 'eliel', array('placeholder' => 'introduce nombre','class' => 'form-control')) }}
				</div>

				<div class="col-md-12 form-group">
				{{ Form::label('artesapaterno', 'Apellido paterno') }}
				{{ Form::text('artesapaterno', 'nava', array('placeholder' => 'introduce apellido paterno','class' => 'form-control')) }}
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
					<th>Rama</th>
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

	<div class="pull-left wellr col-md-3 hidden" id="documentos">      
	</div>
	<div class="col-sm-4 hidden wellr" id="datitos">
		<div class="bg-orga col-md-12">DATOS DEL ARTESANO</div>

		<div class="col-md-12">
		
			<h4>
			<label class="elementos">Nombre: </label>
			<label id="nombre" class="label btn-ioa"></label>
			</h4>

			<h4>
			<label class="elementos">Fecha de nacimiento: </label>
			<label id="nace" class="label btn-ioa"></label>
			</h4>

			<h4>
			<label class="elementos">Sexo: </label>
			<label id="sexo" class="label btn-ioa"></label>
			</h4>
			
			<h4>
			<label class="elementos">Localidad: </label>
			<label id="localidad" class="label btn-ioa"></label>
			</h4>

			<h4>
			<label class="elementos">Rama: </label>
			<label id="rama" class="label btn-ioa"></label>
			</h4>

			<h4>
			<label class="elementos">Grupo Étnico: </label>
			<label id="grupo" class="label btn-ioa"></label>
			</h4>

			<h4>
			<label class="elementos">Fecha registro: </label>
			<label id="fecharegistro" class="label btn-ioa"></label>
			</h4>

		</div>

	</div>
	<div class="hidden anadidos col-sm-8">
		<div class="bg-orga col-md-12 text-center">HISTORIAL DE PARTICIPACIÓN EN CONCURSOS</div>
		<div id="concursos"></div>
		
	</div>
</div>
<div class="modal fade" id="concurso">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 class="modal-title">Concursante</h3>
				</div>
				<div class="modal-body">
					{{ Form::open(array('url' => 'ArtesanoEnFeria/update','role' => 'form','id' => 'update','class' => '')) }}
					<div class="modal-body">
					{{ Form::text('personaid', null, array('class' => 'hidden','id' => 'personaid')) }} 
					{{ Form::text('concursoid', null, array('class' => 'hidden','id' => 'concursoid')) }}
					    <div class="form-group">  
					      {{ Form::label('entrego', 'Devolvió',array('class' => 'control-label')) }}
					      {{ Form::text('entrego', null, array('placeholder' => 'introduce nombre','class' => 'form-control')) }}
					    </div>
					    <div class="form-group">  
					      {{ Form::label('premio', 'Premio',array('class' => 'control-label')) }}
					      {{ Form::text('premio', null, array('placeholder' => 'introduce nombre','class' => 'form-control')) }}
					    </div>
					    <div class="form-group fecha">
					      {{ Form::label('fecha', 'Fecha de devolución',array('class' => 'control-label')) }}
					      <div class="input-group date" id="datetimePicker">
					        {{ Form::text('fecha', null, array('class' => 'form-control','placeholder' => 'YYYY-MM-DD', 'data-date-format' => 'YYYY-MM-DD')) }}
					        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					      </div>
					    </div>
					    <br>
					</div>
					<div class="modal-footer">
					    <button id='bcancelar' type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
					    {{ Form::button('<i class="fa fa-floppy-o "></i> Guardar',array('class' => 'btn btn-success','id' => 'guardar','type' => 'submit')) }}
					</div> 
					{{ Form::close() }}
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
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
	.elementos{
		font-size: 90%;
	}
</style>
<script src="js/bootstrapValidator.js" type="text/javascript"></script>
<script src="js/es_ES.js" type="text/javascript"></script>

<script type="text/javascript">
			$(document).ready(function() {
			$('#datetimePicker').datetimepicker({
        language: 'es',
        pickTime: false
    });
		    $('#buscarartesano').bootstrapValidator({
		        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
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

		        }
		    })
			.on('success.form.bv', function(e) {
	            e.preventDefault();
				$.post('ArtesanoEnFeria', $(this).serialize(), function(json) {
					console.log(json);
					$('#artesano').removeClass("hidden");
						if(json.length == 0){
							swal('Error', 'Persona no encontrada', 'error');
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
								$("#myModal").modal('show');
							});
						}
				}, 'json').fail(function(){
					swal('Error','No se encontró el artesano','error');
				});
			});
		$('#myModal').on('hide.bs.modal', function() {
		    $('#elementobody').html('');
		});
		$('#update').bootstrapValidator({
		        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
		        feedbackIcons: {
		            valid: 'glyphicon glyphicon-ok tok',
		            invalid: 'glyphicon glyphicon-remove tok',
		            validating: 'glyphicon glyphicon-refresh tok'
		        },
		        fields: {
		            entrego: {
		                validators: {
		                    regexp:{
		                    regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
		                        message: 'Por favor verifica el campo'
		                    }
		                    }},
		            premio:{
		                validators: {
		                    notEmpty: {},
		                }
		            },
		            fecha: {
		                validators: {
		                    notEmpty: {
		                    },
		                    date: {
		                        format: 'YYYY-MM-DD',
		                    }
		                }
		            },	            
		        }
		    })
			.on('success.form.bv', function(e) {
	            e.preventDefault();
				$.post('concursante/update', $(this).serialize(), function(json) {
					console.log(json);
					if(!json.error)
					swal('Exito','todo salio bien','success');
					$('#concursos').html('');
					encontrado(json.id);
					$("#concurso").modal('hide');
				}, 'json').fail(function(){
					swal('Error','No se encontró el artesano','error');
				});
			});
		$('#myModal').on('hide.bs.modal', function() {
		    $('#elementobody').html('');
		});
});
    function encontrado (id) {
    	$.post('encontrado', {id:id}, function(json) {
			$('#buscarartesano').closest(".wellr").addClass('hidden');
			$(".anadidos").removeClass('hidden')
			console.log(json.persona.id);
			$('#personaid').val(json.persona.id);
			$.each(json.concursos,function(index,concurso){
				$('#concursos').append('<div class=" col-sm-6"><h4><label class="elementos nombreconcurso"><div class="col-sm-1 pull-right" style="cursor:pointer;" onClick="update('+concurso.id+')"><i class="fa fa-pencil fa-lg pull-right"></i>Editar</div>Concurso: <strong>'+concurso.nombre+'</strong></label></h4><h4><label class="elementos fechaconcurso">Fecha: <strong>'+concurso.fecha+'</strong></label></h4><h4><label class="elementos">Premiación: <strong>'+concurso.premiacion+'</strong></label></h4><h4><label class="elementos nivelconcurso">Nivel: <strong>'+concurso.nivel+'</strong></label></h4><h4><label class="elementos cat">Categoría: <strong>'+concurso.pivot.categoria+'</strong></label></h4><h4><label class="elementos pieza">Pieza: <strong>'+concurso.pivot.pieza+'</strong></label></h4><h4><label class="elementos calidad">Calidad: <strong>'+concurso.pivot.calidad+'</strong></label></h4><h4><label class="elementos registro">No. registro: <strong>'+concurso.pivot.numregistro+'</strong></label></h4><h4><label class="elementos costo">Costo Unitario: <strong>'+concurso.pivot.costounitario+'</strong></label></h4><h4><label class="elementos avaluo">Avaluo: <strong>'+concurso.pivot.avaluo+'</strong></label></h4><h4><label class="elementos entrego">Devolvió: <strong>'+concurso.pivot.entrego+'</strong></label></h4><h4><label class="elementos premio">Premio: <strong>'+concurso.pivot.premio+'</strong></label></h4><h4><label class="elementos dev">Fecha de devolución: <strong>'+concurso.pivot.fechadev+'</strong></label></h4></div>');
			});
			
			$('#datitos').removeClass("hidden");
			$('#nombre').text(json.persona.nombre+' '+json.persona.paterno+' '+json.persona.materno);
			$('#nace').text(json.persona.fechanacimiento);
			$('#sexo').text(json.persona.sexo);
			$('#grupo').text(json.persona.grupoetnico_id);
			$('#localidad').text(json.persona.localidad_id);
			$('#rama').text(json.persona.rama_id);
			$('#fecharegistro').text(json.fecharegistro);
		}, 'json').fail(function(){
			swal('Error','No se encontró el artesano','error');
		});
    }
    function update(id){
    	$('#concursoid').val(id);
    	$("#concurso").modal('show');
    }
	</script>


<script type="text/javascript">
$(document).ready(function() {
    $("#menu-item-48175").addClass("current_page_item ");
    });
</script>
@stop 