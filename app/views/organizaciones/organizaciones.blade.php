@extends('layouts.baseartesanos')
@section('titulo') Organizaciones
@endsection 
 
@section('contenido')
    <div class="container wellr col-md-8 col-sm-offset-2">
        
        <div class="col-md-12">
            <div class="col-md-8">
            <h3 style="margin-bottom:20px;"><i class="fa  fa-sitemap"></i><strong> Eliminar integrantes de organización</strong></h3>
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
                        <button type="button" onclick="editar(this)" class="btn btn-ioa select btn-xs">Ver artesanos</button>
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

  <div class="modal fade" id="editar">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title">Artesanos</h3>
            </div>
            <div class="modal-body">
                <p class="bg-danger text-center">Clic en el artesano para eliminarlo de la organización.</p>
                <div id="tablarte"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default " data-dismiss="modal">Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

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
    $('[name = name]').text($(btn).closest("tr").find("td:nth-child(2)").text());
    $('[name = id]').val($(btn).closest("tr").find("td:nth-child(1)").text());
    id = ($(btn).closest("tr").find("td:nth-child(1)").text());
    $('[name = nombre]').val($(btn).closest("tr").find("td:nth-child(2)").text());
    $('[name = tel]').val($(btn).closest("tr").find("td:nth-child(3)").text());
    $.post('organizacion_artesano/listar', {id:id}, function(json) {
        console.log(json);
        $('#tablarte').html('<table id="tartesanoss" class="table table-hover table-first-column-number data-table display full"></table>');
        var tabble=$('#tartesanoss').dataTable( {
          "data": json,
          "columns": [
                      { "title": "Nombre" },
                      { "title": "Apellido paterno" },
                      { "title": "Apellido materno" },
                      { "title": "Fecha nace" },
                      { "title": "RFC" },
                      { "title": "eliminar" },
                      // { "title": "organizacion" },
                  ],
          "language": {
                "lengthMenu": "concursantes por página _MENU_",
                "zeroRecords": "No se encontró",
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
        } );
        $('#tartesanoss').find('tbody').find('tr').on( 'click', function () {
                elim($(this).closest("tr").find("td:nth-child(6)").text(), id)
              } );
//añadir el boton que lanza la funcion elim(idartesadno, idorganizacion) el organizacion es el de la linea 219, y el del artesano viene en el json.
        $('#editar').modal('show');
    }, 'json');
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
function elim (arte, orga) {
    swal({   title: "Estás completamente seguro?",   text: "Se borrará este artesano de esta organización, esta acción no se puede deshacer!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Sí, borrar", cancelButtonText: "¡No, cancelar!",   closeOnConfirm: false }, function(){
    $.post('organizacion_artesano/eliminar', {artesano:arte,organizacion:orga}, function(json) {
        console.log(json);
        if(json.success){
            $('#editar').modal('hide');
            swal('Exito', 'Todo salio bien', "success");
        }
        else 
            swal('Error', 'Ocurrio un error', "error");
    }, 'json');
    });
}
function datos(tr){
    var id = $(tr).find("td:nth-child(1)").text();
    $('#organizacion').html('<h1>Organización: '+$(tr).find("td:nth-child(2)").text()+'</h1><h2>Telefono: '+$(tr).find("td:nth-child(3)").text()+'</h2>');
    $.post('{{URL::to("organizaciones/comite");}}','id='+id, function(json) {
            if(json.comite.length > 0)
                $('#datos').removeClass('hidden');
            else
                swal('Error','No se encontraron registros','error');
            $('#comite').html('<table id="tcomite" class="table table-hover table-first-column-number data-table display full"></table>');
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
///
            $('#artesanos').html('<table id="tartesanos" class="table table-hover table-first-column-number data-table display full"></table>');
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