@extends('layouts.baseartesanos')
@section('titulo') Compras/Ventas
@endsection 
 
@section('contenido')
	<div class="container wellr col-md-8 col-sm-offset-2">
		
		<div class="col-md-12">
			<div class="col-md-8">
	        <h3 style="margin-bottom:20px;"><i class="fa  fa-sitemap"></i><strong> Compras y ventas</strong></h3>
	    	</div>
	    	<div class="col-md-2" style="margin-top:10px;">
	        <button type="button" class="btn btn-success" id="bnuevo"><i class="fa fa-plus fa-lg"></i> Nueva</button>
	    	</div> 
        </div>
        <div class="col-md-9 col-md-offset-1 wellr">
		<table id='comprasyventas'class="table table-hover table-first-column-number data-table display full">
			<thead>
				<tr>
					<th><i class="fa fa-sort-desc"></i></th>
					<th>Nombre de la compra/venta <i class="fa fa-sort-desc"></i></th>
					<th>Editar</th>
				</tr>
			</thead>
			<tbody>
				@if(isset($comprasyventas))
    				@foreach($comprasyventas as $comprasyventa)
    				<tr>
    				<td>{{ $comprasyventa->id }}</td>
    				<td>{{ $comprasyventa->nombre }}</td>
    				<td>
    					<button type="button" onclick="editar(this)" class="btn btn-ioa select btn-xs">Editar</button>
                        <button type="button" class="btn btn-danger btn-xs delete" title="{{$comprasyventa->nombre}}" onclick="eliminar(this)">Eliminar</button> 
                    </td>
    				</tr>  
    				@endforeach 
				@endif	
			</tbody>
		</table>
	</div>


	<!-- Modal -->
  <div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="comprasyventa">
            <i class="fa fa-pencil-square-o fa-lg"></i> Compras y Ventas
          </h4>
        </div>
        {{ Form::open(array('url' => 'comprasyventas/nueva','role' => 'form','id' => 'nueva-comprasyventa','class' => '')) }}
        <div class="modal-body">
            <center>
            <h2 name="name"><i class="fa fa-pencil"></i> Nueva compra/venta</h2>
            <i class="fa fa-refresh fa-spin hidden fa-2x"></i>
            </center>            
            <div class="form-group">  
              {{ Form::label('nombre', 'Nombre',array('class' => 'control-label')) }}
              {{ Form::text('nombre', null, array('placeholder' => 'introduce nombre','class' => 'form-control')) }}
            </div>
        </div>
        <div class="modal-footer">
            <button id='bcancelar' type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
            {{ Form::button('<i class="fa fa-floppy-o "></i> Guardar',array('class' => 'btn btn-success','id' => 'guardar','type' => 'submit')) }}
        </div> 
        {{ Form::close() }}
      </div>
    </div>
  </div>
  <!-- End Modal -->
<!-- Modal -->
  <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="comven">
            <i class="fa fa-pencil-square-o fa-lg"></i> comprasyventa
          </h4>
        </div>
        {{ Form::open(array('url' => 'comprasyventas/update','role' => 'form','id' => 'edit','class' => '')) }}
        <div class="modal-body">
            <center>
            <h2 name="name"><i class="fa fa-pencil"></i> comprasyventa</h2>
            <i class="fa fa-refresh fa-spin hidden fa-2x"></i>
            </center>      
            {{ Form::text('id', null, array('class' => 'hidden')) }}      
            <div class="form-group">  
              {{ Form::label('nombre', 'Nombre',array('class' => 'control-label')) }}
              {{ Form::text('nombre', null, array('placeholder' => 'introduce nombre','class' => 'form-control')) }}
            </div>

        </div>
        <div class="modal-footer">
            <button id='bcancelar' type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
            {{ Form::button('<i class="fa fa-floppy-o "></i> Guardar',array('class' => 'btn btn-success','id' => 'guardar','type' => 'submit')) }}
        </div> 
        {{ Form::close() }}
      </div>
    </div>
  </div>
  <!-- End Modal -->

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
{{  HTML::script('js/tables/jquery.dataTables.min.js'); }}
{{  HTML::script('js/tables/jquery.dataTables.bootstrap.js'); }}
{{  HTML::script('js/bootstrapValidator.js'); }}
{{  HTML::script('js/es_ES.js'); }}
{{  HTML::script('js/sweet-alert.js'); }}
<script type="text/javascript">
    $('#comprasyventas').dataTable( {
        "language": {
            "lengthMenu": "Elementos por página _MENU_",
            "zeroRecords": "No se encontró",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay información",
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
</script>
    <script type="text/javascript">
$(document).ready(function() {
    $('#nueva-comprasyventa').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok nombre',
            invalid: 'glyphicon glyphicon-remove nombre',
            validating: 'glyphicon glyphicon-refresh nombre'
        },
        fields: {
            enabled: false,
            nombre: {
                validators: {
                    notEmpty: {
                    },
                    stringLength:{
                      max: 15,
                    }
                }
            },
        }
    })
    .on('success.form.bv', function(e) {
        e.preventDefault();
        $('.fa-refresh').removeClass('hidden');
        $.post($('#nueva-comprasyventa').attr('action'),$('#nueva-comprasyventa').serialize(), function(json) {
                $('#nuevo').modal('hide');
                if(json.success)
                    swal({
                        title: 'Operacion completada correctamente',
                        text: '',
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#AEDEF4',
                        confirmButtonText: 'OK',
                        cancelButtonText: 'No, regresar a revisar',
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm){
                        window.location.reload();
                    });
                if(json.ocupado)
                    swal('Error','Ya existe un cuerpo con ese nombre', "error");
            $('.fa-refresh').addClass('hidden');    
            }, 'json');
    });
    $('#edit').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok nombre',
            invalid: 'glyphicon glyphicon-remove nombre',
            validating: 'glyphicon glyphicon-refresh nombre'
        },
        fields: {
            enabled: false,
            nombre: {
                validators: {
                    notEmpty: {
                    }
                }
            },
            enabled: false,
            precio: {
                validators: {
                    notEmpty: {
                    },
                    integer: {
                    }
                }
            }
        }
    })
    .on('success.form.bv', function(e) {
        e.preventDefault();
        $('.fa-refresh').removeClass('hidden');
        $.post($('#edit').attr('action'),$('#edit').serialize(), function(json) {
                $('#editar').modal('hide');
                if(json.success)
                    swal({
                        title: 'Operacion completada correctamente',
                        text: '',
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#AEDEF4',
                        confirmButtonText: 'OK',
                        cancelButtonText: 'No, regresar a revisar',
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm){
                        window.location.reload();
                    });
                if(json.ocupado)
                    swal('Error','Ya existe un cuerpo con ese nombre', "error");
            $('.fa-refresh').addClass('hidden');    
            }, 'json');
    });
});
$('#bnuevo').click(function(){
    $('#nuevo').modal('show');
    $("tbody").find('tr').removeClass('danger').find('button').attr('disabled',false);
    $('[name = name]').html('<i class="fa fa-pencil"></i> Nueva comprasyventa');
    $('[name = nombre]').val('');
});
$('#nuevo').on('hide.bs.modal', function() {
    $('#nueva-comprasyventa').bootstrapValidator('resetForm', true);
});
$('#editar').on('hide.bs.modal', function() {
    $('#edit').bootstrapValidator('resetForm', true);
    $("tbody").find('tr').removeClass('danger').find('button').attr('disabled',false);
});
$('#comprasyventas, #2comprasyventas').addClass('active');
function editar(btn){
	$(btn).closest("tbody").find('tr').removeClass('danger').find('button').attr('disabled',false);
	$(btn).attr('disabled',true).closest("tr").addClass('danger');
	$('#editar').modal('show');
	$('[name = name]').text($(btn).closest("tr").find("td:nth-child(2)").text());
	$('[name = id]').val($(btn).closest("tr").find("td:nth-child(1)").text());
	$('[name = nombre]').val($(btn).closest("tr").find("td:nth-child(2)").text());
}
function eliminar(btn) {
    swal({   title: "Estás completamente seguro?",   text: "Se borrarán todos los artesanos pertenecientes a este elemento, esta acción no se puede deshacer!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Sí, borrar", cancelButtonText: "¡No, cancelar!",   closeOnConfirm: false }, function(){   
$.post('{{URL::to("comprasyventas/delete");}}', {comprasyventa:$(btn).closest("tr").find("td:nth-child(1)").text()}, function(json) {
            if(json.success){
                swal('Elemento eliminado', null, "success");
                $(btn).closest("tr").remove();
                location.reload();
            }
            else
                swal('Error', 'Ocurrio un error', "error");
        }, 'json');
     });
    
}
</script>


@stop