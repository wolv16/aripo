
@extends('layouts.baseartesanos')
    @section('titulo') REGISTRO EN FERIAS
    @endsection 
 
@section('contenido')
	<div class="container wellr">
			

		<div class="pull-left col-md-4" id="ferias">
	    	@if(isset($ferias))
	      		<div class="bg-orga col-md-12 text-center">PRÓXIMAS FERIAS</div>
	        @foreach($ferias as $feria)
	            <div class="container bg-evento col-md-12">
	            <div class="col-md-12">
	           	<p id='idferia' class='hidden'>{{$feria->id}}</p>
		              
		        <h4><i class="fa fa-chain-broken fa-lg pull-left"></i>{{ $feria->nombre }}</h4>
		        </div>
		        <div class="col-md-6">
		            <h5>LUGAR: {{$feria->lugar}}</h5>
		            <h5>TIPO: {{$feria->tipo}}</h5>
		            <h5>INICIO: {{$feria->fechainicio}}</h5>
		            <h5>FIN: {{$feria->fechafin}}</h5>
		              
	          	</div>
	            <div class="col-md-5" style="margin-left:0px">
	              	<span class="fa-stack fa-2x">
	              	<i class="fa fa-star fa-4x"></i></span>
	          	</div>            
	            </div>
	        @endforeach    
	      	@endif
	    </div>
				
		<div class="col-md-6 col-md-offset-1">
		<div class="col-sm-12 wellr">
		<div class="bg-orga col-md-12" style="margin-top:10px; text-align:center;">BUSCAR ARTESANOS</div>
		
		{{ Form::open(array('class'=>"form-horizontal",'id'=>'buscarartesano')) }}
		
			<div class="col-md-12">				
				
				<div class="form-group">
					{{ Form::label('artesanombre', 'Nombre(s)',array('style'=>'text-align: left;','class' => 'control-label col-sm-2')) }}
					<div class="col-sm-8">
					{{ Form::text('artesanombre', null, array('id'=>'artesanombre1','placeholder' => 'introduce nombre','class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('artesapaterno', 'Apellido paterno',array('style'=>'text-align: left','class' => 'control-label col-sm-2')) }}
				<div class="col-sm-8">
				{{ Form::text('artesapaterno', null, array('placeholder' => 'introduce apellido paterno','class' => 'form-control')) }}
				</div>
				</div>

				<div class="form-group">
				{{ Form::label('artesamaterno', 'Apellido materno',array('style'=>'text-align: left','class' => 'control-label col-sm-2')) }}
				<div class="col-sm-8">
				{{ Form::text('artesamaterno', null, array('placeholder' => 'introduce apellido materno','class' => 'form-control')) }}
				</div>
				</div>
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
			
			<div class="col-sm-12">

				<div class="form-group" style="top: 13px !important;">
					<button id="found" type="submit" class="btn btn-ioa pull-right">
						<span class="glyphicon glyphicon-search"></span> 
						Buscar 
					</button>
				</div>
				</div>
			

				{{Form::close()}}
			</div>

	<div class="col-sm-12 pull-right hidden" id="artesano">
		{{ Form::open(array('url' => 'ArtesanoEnFeria2','role' => 'form','id' => 'registrar','class' => 'form-horizontal')) }}
		<div class="bg-orga col-md-12">ARTESANO</div>

		<div class="col-md-12">
		
			<h4>
			<label id="nombre" class="elementos"></label>
			</h4>

			<h4>
			<label id="nace" class="elementos"></label>
			</h4>

			<h4>
			<label id="sexo" class="elementos"></label>
			</h4>

			<h4>
			<label id="curp" class="elementos"></label>
			</h4>

			<div class="col-sm-2 form-group hidden">
				{{ Form::label('feriaid', 'fer') }}
				{{ Form::text('feriaid', null, array('placeholder' => 'Id','class' => 'form-control')) }}
			</div>
			<div class="col-sm-2 form-group hidden">
				{{ Form::label('artesanoid', 'art') }}
				{{ Form::text('artesanoid', null, array('id'=>'artesanoid','placeholder' => 'Id','class' => 'form-control')) }}
			</div>

			<div class="form-group" style="top: 13px !important;">
				<button type="submit" class="btn btn-ioa pull-right" id="btnregistrar">
				<span class="glyphicon glyphicon-ok"></span> 
						Registrar 
				</button>
			</div>

		</div>
		{{Form::close()}}

</div>
				
</div>

</div>

@stop

@section('scripts')

<style type="text/css" media="screen">
	.fecha i{
	    right: 145px !important;
	  }
	.tok{
		top: 0px !important;
		right: 30px !important;
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

		        }
		    })
			.on('success.form.bv', function(e) {
	            e.preventDefault();
				$.post($(this).attr('action'), $(this).serialize(), function(json) {
					console.log(json);
						if(json.length == 0){
							swal('Error', 'Artesano no encontrado', 'error');
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
								$("#myModal").modal('show');
							});
						}
				}, 'json').fail(function(){
					swal('Error','No se encontró el artesano','error');
					$('#artesano').addClass("hidden");
				});
			});

	$('#datetimePicker').on('dp.change dp.show', function(e) {
        $('#buscarartesano').bootstrapValidator('revalidateField', 'fechanace');
    });


$('#registrar').submit( function(e) {
    e.preventDefault();
    if($('[name = feriaid').val() == "")
       	swal('Error', 'Aun no seleccionas una Feria', 'error');
    else{
		$.post($(this).attr('action'), $(this).serialize(), function(json) {
			if(json.error)
				swal('Error', 'Este artesano ya esta inscrito en esta feria', 'error');
			else{
				swal('Operacion completada correctamente', '', 'success');
				$('#buscarartesano').data('bootstrapValidator').resetForm(true);
				$('#artesano').addClass("hidden");
			}
			$('.bg-evento').removeClass('sombreado-evento');
		}, 'json');
	}
	$('#btnregistrar').prop('disabled','disabled');
});
$('#myModal').on('hide.bs.modal', function() {
		$('#elementobody').html('');
	});
	$('.bg-evento').click(function(){
		$('.bg-evento').removeClass('sombreado-evento');
		$(this).addClass('sombreado-evento');
		$('[name=feriaid]').val($(this).find('#idferia').text());
		$('#btnregistrar').removeAttr('disabled',false);
	});

});
function encontrado (id) {
	$.post('buscaconcursante2', {id:id}, function(json) {
		console.log(json);
		$('#artesano').removeClass("hidden");
						$('#nombre').text(json.nombre);
						$('#nace').text(json.fechanacimiento);
						$('#sexo').text(json.sexo);
						$('#curp').text(json.curp);
						$('#artesanoid').val(json.artesano.id);
						$('[name=feriaid]').val("");
	}, 'json').fail(function(){
		swal('Error','No se encontró el artesano','error');
	});
}
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#menu-item-48164").addClass("current_page_item ");
    });
</script>


@stop