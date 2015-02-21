@extends('layouts.baseartesanos')
@section('titulo') Organizaciones
@endsection 
 
@section('contenido')
    <div class="container wellr col-md-8 col-sm-offset-2">
        
        <div class="col-md-12">
            <div class="col-md-8">
            <h3 style="margin-bottom:20px;"><i class="fa  fa-sitemap"></i><strong> Organizaciones</strong></h3>
            <h4>Clic en la organización para ver los datos del comité</h4>
            </div>
            <div class="col-md-2" style="margin-top:10px;">
            <button type="button" class="btn btn-success" id="bnuevo"><i class="fa fa-plus fa-lg"></i> Nueva</button>
            </div> 
        </div>
        <div class="col-md-9 col-md-offset-1 wellr">
        <table id='orgs'class="table table-hover table-first-column-number data-table display full">
            <thead>
                <tr>
                    <th><i class="fa fa-sort-desc"></i></th>
                    <th>Nombre de la organización <i class="fa fa-sort-desc"></i></th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($organizaciones))
                    @foreach($organizaciones as $organizacion)
                    <tr>
                    <td>{{ $organizacion->id }}</td>
                    <td>{{ $organizacion->nombre }}</td>
                    <td>{{ $organizacion->telefono }}</td>
                    <td>
                        <button type="button" onclick="editar(this)" class="btn btn-ioa select btn-xs">Editar</button>
                        <button type="button" class="btn btn-danger btn-xs delete" title="{{$organizacion->nombre}}" onclick="eliminar(this)">Eliminar</button> 
                    </td>
                    </tr>  
                    @endforeach 
                @endif  
            </tbody>
        </table>

    </div>
    <div class="col-md-10 col-md-offset-1 wellr hidden" id="datos">
            <div id="organizacion">
                
            </div>
            <div  id="comite">

                
            </div>
            <div id="artesanos">

                
            </div>
    </div>


    <!-- Modal -->
  <div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="org">
            <i class="fa fa-pencil-square-o fa-lg"></i> Organización
          </h4>
        </div>
        {{ Form::open(array('url' => 'organizaciones/nueva','role' => 'form','id' => 'nueva-org','class' => '')) }}
        <div class="modal-body">
            <center>
            <h2 name="name"><i class="fa fa-pencil"></i> Nueva organización</h2>
            <i class="fa fa-refresh fa-spin hidden fa-2x"></i>
            </center>            
            <div class="form-group">  
              {{ Form::label('nombre', 'Nombre',array('class' => 'control-label')) }}
              {{ Form::text('nombre', null, array('placeholder' => 'introduce nombre','class' => 'form-control')) }}
            </div>
            <div class="form-group">  
              {{ Form::label('tel', 'Teléfono',array('class' => 'control-label')) }}
              {{ Form::text('tel', null, array('placeholder' => 'No telefono (10 digitos)','class' => 'form-control')) }}
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
          <h4 class="modal-title" id="examen">
            <i class="fa fa-pencil-square-o fa-lg"></i> Organización
          </h4>
        </div>
        {{ Form::open(array('url' => 'organizaciones/update','role' => 'form','id' => 'edit','class' => '')) }}
        <div class="modal-body">
            <center>
            <h2 name="name"><i class="fa fa-pencil"></i> Organización</h2>
            <i class="fa fa-refresh fa-spin hidden fa-2x"></i>
            </center>      
            {{ Form::text('id', null, array('class' => 'hidden')) }}      
            <div class="form-group">  
              {{ Form::label('nombre', 'Nombre',array('class' => 'control-label')) }}
              {{ Form::text('nombre', null, array('placeholder' => 'introduce nombre','class' => 'form-control')) }}
            </div>
            <div class="form-group">  
              {{ Form::label('tel', 'Teléfono',array('class' => 'control-label')) }}
              {{ Form::text('tel', null, array('placeholder' => 'No telefono (10 digitos)','class' => 'form-control')) }}
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
        right: 0px !important;
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
    $('#orgs').dataTable( {
        "language": {
            "lengthMenu": "Elementos por página _MENU_",
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
</script>
    <script type="text/javascript">
$(document).ready(function() {
    $('#nueva-org').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok tok',
            invalid: 'glyphicon glyphicon-remove tok',
            validating: 'glyphicon glyphicon-refresh tok'
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
            tel: {
            validators: {
                notEmpty: {},
                stringLength:{
                      max: 10,
                      min: 10,
                      message:'Intoduce un telefono a 10 digitos'
                    }
            }
            }
        },
    })
    .on('success.form.bv', function(e) {
        e.preventDefault();
        $('.fa-refresh').removeClass('hidden');
        $.post($('#nueva-org').attr('action'),$('#nueva-org').serialize(), function(json) {
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
                    swal('Error','Ya existe una organización con ese nombre', "error");
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
                        closeOnConfirm: true,
                        closeOnCancel: false
                    },
                    function(isConfirm){
                        window.location.reload();
                    });
                if(json.ocupado)
                    swal('Error','Ya existe una organización con ese nombre', "error");
            $('.fa-refresh').addClass('hidden');    
            }, 'json');
    });
});
$('#orgs').find('tbody').find('tr').find("td:nth-child(1)").on( 'click', function () {
    datos($(this).closest("tr"));
} );
$('#orgs').find('tbody').find('tr').find("td:nth-child(2)").on( 'click', function () {
    datos($(this).closest("tr"));
} );
$('#orgs').find('tbody').find('tr').find("td:nth-child(3)").on( 'click', function () {
    datos($(this).closest("tr"));
} );
$('#bnuevo').click(function(){
    $('#nuevo').modal('show');
    $("tbody").find('tr').removeClass('danger').find('button').attr('disabled',false);
    $('[name = name]').html('<i class="fa fa-pencil"></i> Nueva organización');
    $('[name = nombre]').val('');
});
$('#nuevo').on('hide.bs.modal', function() {
    $('#nueva-org').bootstrapValidator('resetForm', true);
});
$('#editar').on('hide.bs.modal', function() {
    $('#edit').bootstrapValidator('resetForm', true);
    $("tbody").find('tr').removeClass('danger').find('button').attr('disabled',false);
});
$('#orgs, #2orgs').addClass('active');
function editar(btn){
    $(btn).closest("tbody").find('tr').removeClass('danger').find('button').attr('disabled',false);
    $(btn).attr('disabled',true).closest("tr").addClass('danger');
    $('#editar').modal('show');
    $('[name = name]').text($(btn).closest("tr").find("td:nth-child(2)").text());
    $('[name = id]').val($(btn).closest("tr").find("td:nth-child(1)").text());
    $('[name = nombre]').val($(btn).closest("tr").find("td:nth-child(2)").text());
    $('[name = tel]').val($(btn).closest("tr").find("td:nth-child(3)").text());
}
function eliminar(btn) {
    swal({   title: "Estás completamente seguro?",   text: "Se borrarán todos los artesanos pertenecientes a esta organización, esta acción no se puede deshacer!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Sí, borrar", cancelButtonText: "¡No, cancelar!",   closeOnConfirm: false }, function(){
        $.post('{{URL::to("organizaciones/delete");}}', {org:$(btn).closest("tr").find("td:nth-child(1)").text()}, function(json) {
            if(json.success){
                swal('Organización eliminada', null, "success");
                $(btn).closest("tr").remove();
                location.reload();
            }
            else
                swal('Error', 'Ocurrio un error', "error");
        }, 'json');
    });
}
function datos(tr){
    var id = $(tr).find("td:nth-child(1)").text();
    $('#organizacion').html('<h2>Organización: '+$(tr).find("td:nth-child(2)").text()+'</h2><h2>Telefono: '+$(tr).find("td:nth-child(3)").text()+'</h2>');
    $.post('{{URL::to("organizaciones/comite");}}','id='+id, function(json) {
            if(json.comite.length > 0)
                $('#datos').removeClass('hidden');
            else
                swal('Error','No se encontraron registros','error');
            $('#comite').html('<div class="bg-orga text-center">COMITÉ DE LA ORGANIZACIÓN</div><table id="tcomite" class="table table-hover table-first-column-number data-table display full"></table>');
            $('#tcomite').dataTable( {
              "data": json.comite,
              "columns": [
                          { "title": "Nombre" },
                          { "title": "Apellido paterno" },
                          { "title": "Apellido materno" },
                          { "title": "Fecha nace" },
                          { "title": "Sexo" },
                          { "title": "Cuis" },
                          { "title": "Telefono" },
                          { "title": "Cargo" },
                      ],
              "language": {
                    "lengthMenu": "Elementos por página _MENU_",
                    "zeroRecords": "No se encontro",
                    "info": "Pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros por mostrar",
                    "infoFiltered": "(Ver _MAX_ total records)",
                    'search': 'Buscar: ',
                    "paginate": {
                          "first":      "Inicio",
                          "last":       "Fin",
                          "next":       "Siguiente",
                          "previous":   "Anterior"
                    },
                },
                dom: 'T<"clear">lfrtip',
                tableTools : {
                    "sSwfPath": "{{URL::to('swf/copy_csv_xls_pdf.swf')}}",
                    aButtons: [
                        "copy",
                        "xls",
                        {
                            "sExtends": "pdf",
                            "sPdfOrientation": "landscape",
                            "sPdfMessage": 'PDF'
                        },
                    ]
                },
            } );
///
            $('#artesanos').html('<div class="bg-orga text-center">ARTESANOS EN LA ORGANIZACIÓN</div><table id="tartesanos" class="table table-hover table-first-column-number data-table display full"></table>');
            $('#tartesanos').dataTable( {
              "data": json.artesanos,
              "columns": [
                          { "title": "Nombre" },
                          { "title": "Apellido paterno" },
                          { "title": "Apellido materno" },
                          { "title": "Fecha nace" },
                          { "title": "Sexo" },
                          { "title": "Cuis" },
                          { "title": "Telefono" },
                      ],
              "language": {
                    "lengthMenu": "concursantes por página _MENU_",
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
                },
                dom: 'T<"clear">lfrtip',
                tableTools : {
                    "sSwfPath": "{{URL::to('swf/copy_csv_xls_pdf.swf')}}",
                    aButtons: [
                        "copy",
                        "xls",
                        {
                            "sExtends": "pdf",
                            "sPdfOrientation": "landscape",
                            "sPdfMessage": 'PDF'
                        },
                    ]
                },
            } );
        }, 'json').fail(function(){
            $('#grafica').addClass('hidden');
            swal('Error','No se encontró','error');
        });
}
</script>

@stop