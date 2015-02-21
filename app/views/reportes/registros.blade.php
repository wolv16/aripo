
@extends('layouts.baseartesanos')
@section('titulo') Reportes de registros
@endsection
@section('contenido')

    <div class="container wellr">
    {{ Form::open(array('url' => 'reportes/registros','role' => 'form','id' => 'registros','class' => 'class')) }}
        <div class="bg-orga text-center col-md-12">REPORTE DE REGISTROS DE ARTESANOS</div>

        <div class="col-sm-6 col-sm-offset-3">
            <div class="col-sm-6 form-group fecha">
                {{ Form::label('birthday', 'Fecha de inicio') }}
                <div class="input-group" id="datetimePicker">
                    {{ Form::text('inicio', null, array('id' => 'fechainicio','class' => 'form-control', 'placeholder' => 'AAAA-MM-DD', 'data-date-format' => 'YYYY-MM-DD')) }}
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>
            <div class="col-sm-6 form-group fecha">
                {{ Form::label('birthday2', 'Fecha de fin') }}
                <div class="input-group" id="datetimePicker2">
                    {{ Form::text('fin', null, array('id' => 'fechafin','class' => 'form-control', 'placeholder' => 'AAAA-MM-DD', 'data-date-format' => 'YYYY-MM-DD')) }}
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>
            <button type="submit" class="btn btn-ioa col-sm-4 col-sm-offset-4" style="margin-top:10px;"><i class="fa fa-line-chart"></i> Generar reporte</button>
        </div>
    {{ Form::close() }}
    <div id="divelementos" class="col-sm-12"></div>
    </div>
@stop
@section('scripts')
<style type="text/css" media="screen">
    .fecha i{
        right: 50px !important;
        top: 18px !important;
    }
</style>
    {{HTML::script('js/bootstrapValidator.js');}}
    {{HTML::script('js/es_ES.js');}}
    <script>
        $(document).ready(function() {
            $('#fechainicio,#fechafin').datetimepicker({
                language: 'es',
                pickTime: false
            });
            $('#datetimePicker').on('dp.change dp.show', function(e) {
                $('#registros').bootstrapValidator('revalidateField', 'inicio');
            });
            $('#datetimePicker2').on('dp.change dp.show', function(e) {
                $('#registros').bootstrapValidator('revalidateField', 'fin');
            });
            $('#registros').bootstrapValidator({
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    inicio: {
                        validators: {
                            notEmpty: {},
                            date: {
                                format: 'YYYY-MM-DD',
                            }
                        }
                    },
                    fin: {
                        validators: {
                            notEmpty: {},
                            date: {
                                format: 'YYYY-MM-DD',
                            }
                        }
                    },
                }
            })
            .on('success.field.bv', function(e, data) {
                 if (data.bv.getSubmitButton()) {
                     data.bv.disableSubmitButtons(false);
                 }
             })
            .on('success.form.bv', function(e) {
                e.preventDefault();
                $.post('inscritos',$('#registros').serialize(), function(json) {
                    $('#divelementos').html('<table id="telementos" class="table table-hover table-first-column-number data-table display full"></table>');
                    $('#telementos').dataTable( {
                        "data": json,
                        "columns": [
                            { "title": "Nombre" },
                            { "title": "Sexo" },
                            { "title": "Rama" },
                        ],
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
                }, 'json');
            });
        });
    </script>
<script type="text/javascript">
$(document).ready(function() {
    $("#menu-item-48188").addClass("current_page_item ");
    });
</script>
@endsection