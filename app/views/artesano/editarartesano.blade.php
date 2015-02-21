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
	<div class="col-sm-5 hidden wellr" id="datitos">
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
			<label class="elementos">CURP: </label>
			<label id="curp" class="label btn-ioa"></label>
			</h4>

			<h4>
			<label class="elementos">CUIS: </label>
			<label id="cuis" class="label btn-ioa"></label>
			</h4>

			<h4>
			<label class="elementos">Código Postal:</label>
			<label id="cp" class="label btn-ioa"></label>
			</h4>

			<h4>
			<label class="elementos">Lada: </label>
			<label id="lada" class="label btn-ioa"></label>
			</h4>

			<h4>
			<label class="elementos">Teléfono: </label>
			<label id="telefono" class="label btn-ioa"></label>
			</h4>

			<h4>
			<label class="elementos">Calle: </label>
			<label id="calle" class="label btn-ioa"></label>
			</h4>
			<h4>
			<label class="elementos">Número: </label>
			<label id="numero" class="label btn-ioa"></label>
			</h4>
			<h4>
			<label class="elementos">Colonia: </label>
			<label id="colonia" class="label btn-ioa"></label>
			</h4>

			<h4>
			<label class="elementos">Estado: </label>
			<label id="edo" class="label btn-ioa"></label>
			</h4>


			<h4>
			<label class="elementos">Observaciones: </label>
			<label id="observ" class="label btn-ioa"></label>
			</h4>

			<h4>
			<label class="elementos">Grupo Étnico: </label>
			<label id="grupo" class="label btn-ioa"></label>
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
			<label class="elementos">RFC: </label>
			<label id="rfc" class="label btn-ioa"></label>
			</h4>

			<h4>
			<label class="elementos">Estado Civil: </label>
			<label id="civil" class="label btn-ioa"></label>
			</h4>

			<h4>
			<label class="elementos">Fecha registro: </label>
			<label id="fecha" class="label btn-ioa"></label>
			</h4>

			<h4>
			<label class="elementos">INE: </label>
			<label id="ine" class="label btn-ioa"></label>
			</h4>

			<h4>
			<label class="elementos">Taller: </label>
			<label id="taller" class="label btn-ioa"></label>
			</h4>

			<h4>
			<label class="elementos">Tipo de teléfono: </label>
			<label id="tipotel" class="label btn-ioa"></label>
			</h4>

		</div>

	</div>
	<div class="wellr hidden anadidos col-sm-4">
		<div class="bg-orga col-md-12">CONCURSOS</div>
		<div id="concursos"></div>
		<div class="bg-orga col-md-12">FERIAS</div>
		<div id="ferias"></div>
		<div class="bg-orga col-md-12">TALLERES</div>
		<div id="talleres"></div>
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
	.elementos{
		font-size: 90%;
	}
</style>
<script src="js/bootstrapValidator.js" type="text/javascript"></script>
<script src="js/es_ES.js" type="text/javascript"></script>

<script type="text/javascript">
			$(document).ready(function() {
			$('#datetimePicker1').datetimepicker({
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
				$.post($(this).attr('action'), $(this).serialize(), function(json) {
					if(json.length > 1){
						$.each(json,function(index,artesano){
								$('#elementobody').append('<tr>'+
								'<td>'+artesano.nombre+'</td>'+
								'<td>'+artesano.paterno+'</td>'+
								'<td>'+artesano.materno+'</td>'+
								'<td>'+artesano.cumple+'</td>'+
								'<td><button class="btn-ioa btn-xs" onClick="encontrado('+artesano.id+')" data-dismiss="modal">Seleccionar</button></td>');
						});
						$("#myModal").modal('show');
					}
					else if(json.length == 1)
						encontrado(json[0].id);
					else
						al('Error','No se encontró el artesano','error');
				}, 'json').fail(function(){
					sw
					al('Error','No se encontró el artesano','error');
				});
			});
		$('#myModal').on('hide.bs.modal', function() {
		    $('#elementobody').html('');
		});
		$('#datetimePicker1').on('dp.change dp.show', function(e) {
        $('#buscarartesano').bootstrapValidator('revalidateField', 'fechanace');
        
    });


});
    function encontrado (id) {
    	$.post('encontrado', {id:id}, function(json) {
			$('#buscarartesano').closest(".wellr").addClass('hidden');
			$(".anadidos").removeClass('hidden')
			console.log(json.persona.telefono);
			$.each(json.concursos,function(index,concurso){
				$('#concursos').append('<div class="wellr"><h4><label class="elementos nombreconcurso">Nombre: <strong>'+concurso.nombre+'</strong></label></h4><h4><label class="elementos fechaconcurso">Fecha: <strong>'+concurso.fecha+'</strong></label></h4><h4><label class="elementos">Premiación: <strong>'+concurso.premiacion+'</strong></label></h4><h4><label class="elementos nivelconcurso">Nivel: <strong>'+concurso.nivel+'</strong></label></h4></div>');
			});
			$.each(json.talleres,function(index,taller){
				$('#talleres').append('<div class="wellr"><h4><label class="elementos nombreconcurso">Nombre: <strong>'+taller.nombre+'</strong></label></h4><h4><label class="elementos fechaconcurso">Fecha: <strong>'+taller.fechainicio+' al '+taller.fechafin+'</strong></label></h4><h4><label class="elementos">Maestro: <strong>'+taller.maestro+'</strong></label></h4></div>');
			});
			$.each(json.ferias,function(index,feria){
				$('#ferias').append('<div class="wellr"><h4><label class="elementos nombreconcurso">Nombre: <strong>'+feria.nombre+'</strong></label></h4><h4><label class="elementos fechaconcurso">Fecha: <strong>'+feria.fechainicio+' al '+feria.fechafin+'</strong></label></h4><h4><label class="elementos">Ubicación: <strong>'+feria.lugar+'</strong></label></h4></div>');
			});
			$('#datitos, #documentos').removeClass("hidden");
			$('#nombre').text(json.persona.nombre+' '+json.persona.paterno+' '+json.persona.materno);
			$('#nace').text(json.persona.fechanacimiento);
			$('#sexo').text(json.persona.sexo);
			$('#curp').text(json.persona.curp);
			$('#cuis').text(json.persona.cuis);
			$('#cp').text(json.persona.direccion.cp);
			$('#telefono').text(json.persona.telefono.numero);
			$('#calle').html(json.persona.direccion.calle);
			$('#numero').text(json.persona.direccion.num);
			$('#colonia').text(json.persona.direccion.colonia);
			$('#edo').text('Oaxaca');
			$('#lada').text(json.persona.telefono.lada);
			$('#observ').text(json.persona.observaciones);
			$('#grupo').text(json.persona.grupoetnico_id);
			$('#localidad').text(json.persona.localidad_id);
			$('#rama').text(json.persona.rama_id);
			$('#rfc').text(json.rfc);
			$('#civil').text(json.estadocivil);
			$('#fecha').text(json.fecharegistro);
			$('#ine').text(json.ine);
			$('#taller').text(json.taller);
			$('#tipotel').text(json.persona.telefono.tipo);
			documentos(json.documentos);
		}, 'json').fail(function(){
			swal('Error','No se encontró el artesano','error');
		});
    }
	</script>

<script>
function documentos(documents){
	var html='<div class="bg-orga col-md-12 text-center">DOCUMENTOS DEL ARTESANO</div>';
	$(documents).each(function(){
		html += '<div class="container bg-docs col-md-12"><div class="col-md-12"><strong>'+this.nombre+'</strong><div class="col-md-12" style="text-align:center;"><img style="border: 0pt; margin-left: 0px; margin-bottom: 10px; margin-top: 15px; height: 200px; width: 150px;" src="'+this.ruta+'" onClick="window.open('+"'"+this.ruta+"'"+')";></img></div></div></div>';
	}); 
	$('#documentos').html(html);
}
	
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#menu-item-48175").addClass("current_page_item ");
    });
</script>
@stop 