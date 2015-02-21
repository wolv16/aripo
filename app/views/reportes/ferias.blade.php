
@extends('layouts.baseartesanos')
@section('titulo') Reportes
@endsection
@section('contenido')

<div class="container wellr">
    <div class="col-sm-12">
        <div class="bg-orga text-center col-md-12">REPORTE POR EVENTOS</div>

    {{ Form::open(array('url' => 'reportes/ferias','role' => 'form','id' => 'ferias','class' => 'class')) }}
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
            <div class="btn-group" role="group">
                <label>
                    <input type="radio" name="optionsRadios" value="ferias" checked>
                    Ferias
                </label>
                <label>
                    <input type="radio" name="optionsRadios" value="talleres">
                    Talleres
                </label>
                <label>
                    <input type="radio" name="optionsRadios" value="concursos">
                    Concursos
                </label>
            </div>
            <button type="submit" class="btn btn-ioa col-sm-4 col-sm-offset-4" style="margin-top:10px;"><i class="fa fa-line-chart"></i> Generar reporte</button>
        </div>
    {{ Form::close() }}
    </div>
    <div class="row">
        <div id="grafica" class="col-md-6 col-md-offset-3 hidden" style="height: 300px; margin-bottom: 50px; margin-top:50px; background-color: rgb(252, 252, 252);"></div>
    </div>
    <div class="col-sm-10 col-sm-offset-1" id="dtabla">
    </div>
    <div class="col-sm-8 col-sm-offset-2 hidden" id="dconcursantes">
    </div>
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
            $('#datetimePicker ,#datetimePicker2').datetimepicker({
                language: 'es',
                pickTime: false
            });
            $('#ferias').bootstrapValidator({
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
                $.post('ferias',$('#ferias').serialize(), function(json) {
                    $('#grafica').html('');
                    $('#grafica').removeClass('hidden');
                        if(json.tipo == "ferias")
                            datos=ferias(json.data)
                        if(json.tipo == "talleres" || json.tipo == "concursos")
                            datos=talleres(json.data)
                        Morris.Bar({
                            element: 'grafica',
                            data: datos,
                            xkey: 'label',
                            ykeys: ['value'],
                            labels: ['No.'],
                            barColors: ['rgb(11, 98, 164)'],
                            grid:true,
                            gridTextColor:['#000'],
                            xLabelAngle: 80
                        });
                        $('#dtabla').html('<table id="tabla" class="table table-hover table-first-column-number data-table display full"></table>');
                        if(json.tipo == "ferias")
                            columns=[
                                      { "title": "Nombre" },
                                      { "title": "Fecha Inicio" },
                                      { "title": "Fecha Fin" },
                                      { "title": "Tipo" },
                                      { "title": "lugar" },
                                  ];
                        if(json.tipo == "talleres")
                            columns=[
                                      { "title": "Nombre" },
                                      { "title": "Fecha Inicio" },
                                      { "title": "Fecha Fin" },
                                      { "title": "participantes" },
                                      { "title": "Region" },
                                  ];
                        if(json.tipo == "concursos")
                            columns=[
                                      { "title": "Nombre" },
                                      { "title": "Fecha" },
                                      { "title": "Fecha Premiación" },
                                      { "title": "participantes" },
                                      { "title": "nivel" },
                                  ];
                        $('#tabla').dataTable( {
                          "data": json.data,
                          "columns": columns,
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
                        if(json.tipo == "concursos")
                            $('#tabla').find('tbody').find('tr').on( 'click', function () {
                                concurso(this);
                              } );
                        $('#dconcursantes').addClass('hidden');
                }, 'json').fail(function(){
                    $('#grafica').addClass('hidden');
                    swal('Error','No se encontró','error');
                });
            });
            $('#datetimePicker').on('dp.change dp.show', function(e) {
                $('#ferias').bootstrapValidator('revalidateField', 'inicio');
            });
            $('#datetimePicker2').on('dp.change dp.show', function(e) {
                $('#ferias').bootstrapValidator('revalidateField', 'fin');
            });
    });
    function ferias (json) {
        var data = [];
        var Internacional = 0;
        var Pabellon = 0;
        var Nacional = 0;
        var Regional = 0;
        $.each(json,function(index,val){
            if(val[3] == 'INTERNACIONAL')
                Internacional++;
            if(val[3] == 'PABELLÓN FONART')
                Pabellon++;
            if(val[3] == 'NACIONAL')
                Nacional++;
            if(val[3] == 'REGIONAL')
                Regional++;
        });
        data.push({label:'Internacional',value:Internacional});
        data.push({label:'Pabellon',value:Pabellon});
        data.push({label:'Nacional',value:Nacional});
        data.push({label:'Regional',value:Regional});
        return data;
    }
    function talleres (json) {
        var data = [];
        $.each(json,function(index,val){
            data.push({label:val[0],value:val[3]});
        });
        return data;
    }
    function concurso (tr){
        var nombre = $(tr).find("td:nth-child(1)").text();
        var fecha = $(tr).find("td:nth-child(2)").text();
        $.post('concursantes','nombre='+nombre+'&fecha='+fecha, function(json) {
            console.log(json.data.length)
            if(json.data.length > 0)
                $('#dconcursantes').removeClass('hidden');
            else
                swal('Error','No se encontraron registros','error');
            $('#dconcursantes').html('<table id="concursantes" class="table table-hover table-first-column-number data-table display full"></table>');
            $('#concursantes').dataTable( {
              "data": json.data,
              "columns": [
                          { "title": "Concurso" },
                          { "title": "No. Registro" },
                          { "title": "Nombre" },
                          { "title": "Categoria" },
                          { "title": "Pieza" },
                          { "title": "Premio" },
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
<script type="text/javascript">
$(document).ready(function() {
    $("#menu-item-48188").addClass("current_page_item ");
    });
</script>
@endsection