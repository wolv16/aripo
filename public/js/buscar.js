$(document).ready(function() {
   $('#fbuscar').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nombre: {
                validators: {
                    notEmpty: {
                    },
                    regexp: {
                        regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
                        message: 'Por favor verifica el campo'
                    }
                }
            },
            paterno: {
                validators: {
                    notEmpty: { },
                    regexp: {
                        regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
                        message: 'Por favor verifica el campo'
                    }
                }
            },
            materno: {
                validators: {
                    regexp: {
                        regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/
                        ,
                        message: 'Por favor verifica el campo'
                    }
                }
            },
        }
    })
    .on('success.form.bv', function(e) {
            e.preventDefault();
            var $form = $(e.target);
            var bv = $form.data('bootstrapValidator');

            $('.spin-form').removeClass('hidden');
            $.post($form.attr('action'), $form.serialize(), function(json) {
                if (json.success) {
                    $('.table tbody tr td:first-child').text(json.id);
                    $('.table tbody tr td:nth-child(2)').text(json.name);
                    $('.table tbody tr td:nth-child(3)').text(json.paterno);
                    $('.table tbody tr td:nth-child(4)').text(json.materno);
                    $('.table tbody tr td:nth-child(5)').text(json.fecha);
                    $('.table tbody tr td:nth-child(6)').text(json.matricula);
                    $('#elemento').removeClass('hidden');
                    $('#error').addClass('hidden');
                }
                else if(json.success == false){
                   $('#error').removeClass('hidden');
                   $('#elemento').addClass('hidden');
                }
                else{
                    $( "#elementos tbody" ).html('');
                    for (var i = json.length - 1; i >= 0; i--) {
                        var matricula = '';
                        if(json[i].matricula!=null)
                                matricula=json[i].matricula.matricula;
                        $( "<tr>" ).append(
                            "<td>"+json[i].id+'</td>'+
                            "<td>"+json[i].nombre+'</td>'+
                            "<td>"+json[i].paterno+'</td>'+
                            "<td>"+json[i].materno+'</td>'+
                            "<td>"+json[i].fecha+'</td>'+
                            "<td>"+matricula+'</td>'+
                            '<td><button type="button" onclick="llenartabla(this)" class="btn btn-info select btn-sm">seleccionar</button></td>').appendTo( "#elementos tbody" );
                    };
                    $('#Elementos').modal('show')
                    $('#error').addClass('hidden');
                }
                $('.fa-spin').addClass('hidden');
    }, 'json');
    });
    $('#pagar').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok cantidad',
            invalid: 'glyphicon glyphicon-remove cantidad',
            validating: 'glyphicon glyphicon-refresh cantidad'
        },
        fields: {
            cantidad: {
                validators: {
                    notEmpty: {
                    },
                    regexp: {
                        regexp:/^[0-9]*\.?[0-9]+$/,
                        message: 'Por favor introduce una cantidad'
                    }
                }
            }
        }
    })
    .on('success.form.bv', function(e) {
            e.preventDefault();
            var $form = $(e.target);
            var bv = $form.data('bootstrapValidator');
            $('#myModal').modal('show')
            $('.spin-modal').removeClass('hidden');
            $('[name=id]').val($('#elemento tbody tr td:first-child').text());
            $('#recibo').attr('href','recibo/'+$('#telemento tbody tr td:first-child').text());
            $('.alert').addClass('hidden');
            $.post($form.attr('action'), $form.serialize(), function(json) {
                if (json.success) {
                    $('#message').html(json.message+json.matricula);
                    $('#pagoerror').removeClass('hidden alert-danger');
                    $('#pagoerror').addClass('alert-success');
                } else {
                    $('#message').html(json.errormessage);
                    $('#pagoerror').removeClass('hidden alert-success');
                    $('#pagoerror').addClass('alert-danger');
                }
                $('.spin-modal').addClass('hidden');
                $('#pagar').data('bootstrapValidator').resetField('cantidad', true)

    }, 'json');
    });
});
$('#main-menu').find('li').removeClass('active');
$('#main-menu ul li:nth-child(2)').addClass('active');
    function llenartabla(a) {
        $('#Elementos').modal('hide');
        var $row = $(a).closest("tr");
        for (var i = 1; i < 7; i++) {
            $('#telemento tbody tr td:nth-child('+i+')').text($row.find("td:nth-child("+i+")").text());
        };
        $('#elemento').removeClass('hidden');
    }