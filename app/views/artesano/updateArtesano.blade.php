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

			<div class="col-md-12 form-group">

				<div class="form-group" style="top: 13px !important;">
					<button id="found" type="submit" class="btn btn-ioa pull-right">
						<span class="glyphicon glyphicon-search"></span> 
						Buscar 
					</button>
				</div>
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

	<div class="col-sm-8 pull-right hidden" id="datitos">
		{{ Form::open(array('url'=> 'editarArtesano/update','id' => 'formupdate','class' => 'class','files'=>true)) }}
		<div class="bg-orga col-md-12">EDITAR DATOS DEL ARTESANO</div>

		<div class="col-md-2 hidden">
			<div class="col-md-12 form-group">			
			{{ Form::text('persona_id', null, array('id'=>'persona_id','class' => 'form-control')) }}
			</div>
		</div>
			
			<div class="col-md-12">			
			<div class="col-md-4 form-group">
				{{ Form::label ('nombre', 'Nombre',array('class' => 'control-label')) }}
				{{ Form::text('nombre', null, array('id'=>'nombre','class' => 'form-control mayuscula')) }}
			</div>
			<div class="col-md-4 form-group">
				{{ Form::label ('paterno', 'Apellido paterno',array('class' => 'control-label')) }}
				{{ Form::text('paterno', null, array('id'=>'paterno','class' => 'form-control mayuscula')) }}
			</div>
			<div class="col-md-4 form-group">
				{{ Form::label ('materno', 'Apellido materno',array('class' => 'control-label')) }}
				{{ Form::text('materno', null, array('id'=>'materno','class' => 'form-control mayuscula')) }}
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group col-md-4 fecha">
	          {{ Form::label('fechanace', 'Fecha de nacimiento',array('class' => 'control-label')) }}
	        <div class="input-group date" id="datetimePicker">
	            {{ Form::text('fechanace', null, array('id'=>'nace','class' => 'form-control', 'data-date-format' => 'YYYY-MM-DD')) }}
	            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
	        </div>
	       	</div>
	       	<div class="col-md-3 form-group">
				{{ Form::label('sexo', 'Sexo',array('class' => 'control-label')) }} 
				{{Form::select('sexo', array('' => 'Seleccione','Masculino' => 'Masculino','Femenino' => 'Femenino',), null, array('class' =>'form-control'))}}
			</div>
	       	<div class="col-md-5 form-group">	
				{{ Form::label('curp', 'CURP') }}
				{{ Form::text('curp', null, array('class' => 'form-control mayuscula')) }}
			</div>
		</div>	

		<div class="col-md-12">
			<div class="col-md-4 form-group">	
				{{ Form::label('RFC', 'RFC') }}
				{{ Form::text('RFC', null, array('id'=>'rfc','class' => 'form-control mayuscula')) }}	
			</div>
			<div class="col-md-5 form-group">	
				{{ Form::label('credencial', 'INE') }}
				{{ Form::text('ine', null, array('id'=>'ine','class' => 'form-control')) }}	
			</div>
			
			
			<div class="col-md-3 form-group">
				
				{{ Form::label ('cuis', 'No. CUIS',array('class' => 'control-label')) }}
				{{ Form::text('cuis', null, array('id'=>'cuis','class' => 'form-control')) }}
			</div>
		</div>

		<div class="col-md-12">
			<div class="col-md-6 form-group">
				{{ Form::label('calle', 'Calle') }}
				{{ Form::text('calle', null, array('class' => 'form-control','id'=>'calle')) }}
			</div>
			<div class="col-md-6 form-group">
				{{ Form::label('numero', 'Numero') }}
				{{ Form::text('numero', null, array('class' => 'form-control','id'=>'numero')) }}
			</div>
			<div class="col-md-6 form-group">
				{{ Form::label('colonia', 'Colonia') }}
				{{ Form::text('colonia', null, array('class' => 'form-control','id'=>'colonia')) }}
			</div>
			<div class="col-md-3 form-group">
				{{ Form::label('grupoetnico', 'Grupo Étnico',array('class' => 'control-label')) }}
				{{ Form::select('grupoetnico', $grupos ,null,array('class' => 'form-control')) }}

			</div>
			<div class="col-md-3 form-group">
				{{ Form::label('civil', 'Estado Civil') }} 
				{{Form::select('civil', array('' => 'Seleccione','Soltero' => 'Soltero','Casado' => 'Casado',), null, array('class' =>'form-control'))}}
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group col-md-3">
				{{ Form::label('cp', 'C.P.') }}
				{{ Form::text('cp', null, array('class' => 'form-control')) }}
			</div>

			<div class="col-md-4 form-group">
				{{ Form::label('municipio', 'Municipio') }}
				{{ Form::select('municipio',$municipios, null, array('class' => 'form-control','id'=>'selectmun')) }} 
			</div>

			<div class="form-group col-md-5">
				{{ Form::label('localidad', 'Localidad') }}
				{{ Form::select('localidad',array(), null, array('class' => 'form-control', 'id'=>'selectloc')) }}
			</div>
		</div>

		<div class="col-md-12">
			<div class="col-md-4 form-group">
				{{ Form::label('lada', 'Lada') }}
				<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-phone"></i></div>
				{{ Form::text('lada', null, array('class' => 'form-control')) }}
			</div>
		</div>
			
			<div class="col-md-4 form-group">
				{{ Form::label('tel', 'Telefono') }}
				<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-phone"></i></div>
				{{ Form::text('tel', null, array('id'=>'tel','class' => 'form-control')) }}
			</div>
			</div>

			<div class="col-md-4 form-group">
			{{ Form::label('tipoTel', 'Tipo Teléfono') }} <br>
			{{Form::select('tipoTel', array('' => 'Seleccione','Casa' => 'Casa','Celular' => 'Celular','Caseta' => 'Caseta','Vecino' => 'Vecino',), null, array('class' =>'form-control'))}}
			</div>
		</div>
			
		<div class="col-md-12">

			<div class="col-md-5 form-group">
			{{ Form::label('taller', 'Tipo Taller') }} 
			{{Form::select('taller', array('' => 'Seleccione','Individual' => 'Individual','Familiar' => 'Familiar',), null, array('class' =>'form-control'))}}
			</div>

			<div class="col-md-5 form-group">
			
			{{ Form::label('rama', 'Rama Artesanal') }} 
			{{Form::select('rama', $ramas, null, array('class' =>'form-control'))}}
			</div>

			<div class="col-md-6 form-group">	
				{{ Form::label('observ', 'OBSERVACIONES') }}
				<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-eye"></i></div>
				{{ Form::text('observ', null, array('class' => 'form-control')) }}<br>
			</div>
			</div>
		</div>

		<div class="col-sm-12" id="documentos1">
			
			<div class="col-sm-12">
			<div class="col-md-3 col-md-offset-1 form-group">
				{{ Form::label('fotoimg', 'FOTO') }}
				{{ Form::file('fotoperfil',array('class' => 'filess')) }}
			</div>
			<div class="col-md-3 col-md-offset-3 form-group">
				{{ Form::label('actaimg', 'ACTA') }}
				{{ Form::file('actapic',array('class' => 'filess')) }}
			</div>
			</div>
			
			<div class="col-sm-12">
			<div class="col-md-2 col-md-offset-1 form-group">
				{{ Form::label('ineimg', 'INE') }}
				{{ Form::file('inepic',array('class' => 'filess')) }}
			</div>
			<div class="col-md-3 col-md-offset-4 form-group">
				{{ Form::label('curpimg', 'CURP') }}
				{{ Form::file('curppic',array('class' => 'filess')) }}
			</div>
			</div>
	
		</div>


		<div class="form-group" >
			<button type="submit" class="btn btn-ioa btn-lg pull-right">
			<span class="glyphicon glyphicon-floppy-disk"></span> 
			Guardar
			</button>
		</div>
		<div class="form-group" >
			<button id="cancelar" type="button" class="btn btn-danger btn-lg pull-right">
			<span class="glyphicon glyphicon-remove"></span> 
			Cancelar
			</button>
		</div>
		{{Form::close()}}

		</div>

</div>
		
		@endsection


@section('scripts')
<script src="js/fileinput.js" type="text/javascript"></script>
	<link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<style type="text/css" media="screen">
	.fecha i{
	    right: 55px !important;
	  }
	.tok{
		top: 17px !important;
		right: 23px !important;
	}
</style>
<script src="js/bootstrapValidator.js" type="text/javascript"></script>
<script src="js/es_ES.js" type="text/javascript"></script>

<script type="text/javascript">
function encontrado (id) {
	console.log(id);
	$.post('encontradoupdate',{id:id}, function(json) {
		$('#datitos, #documentos').removeClass("hidden");
		$('#persona_id').val(json.persona_id);
		$('#nombre').val(json.persona.nombre);
		$('#paterno').val(json.persona.paterno);
		$('#materno').val(json.persona.materno);
		$('#nace').val(json.persona.fechanacimiento);
		$('#curp').val(json.persona.curp);
		$('#cuis').val(json.persona.cuis);
		$('#cp').val(json.persona.direccion.cp);
		$('#calle').val(json.persona.direccion.calle);
		$('#numero').val(json.persona.direccion.num);
		$('#colonia').val(json.persona.direccion.colonia);
		$('#tel').val(json.persona.telefono.numero);
		$('#domicilio').val(json.persona.domicilio);
		$('#edo').val(json.persona.estado);
		$('#lada').val(json.persona.telefono.lada);
		$('#observ').val(json.persona.observaciones);
		$('#localidad').val(json.persona.localidad_id);
		$('#rfc').val(json.rfc);
		$('#fecha').val(json.fecharegistro);
		$('#ine').val(json.ine);
		$('[name = tipoTel] option[value='+json.persona.telefono.tipo+']').attr('selected', true);
		$('[name = sexo] option[value='+json.persona.sexo+']').attr('selected', true);
		$('[name = civil] option[value='+json.estadocivil+']').attr('selected', true);
		$('[name = taller] option[value='+json.taller+']').attr('selected', true);
		$('[name = grupoetnico] option[value='+json.persona.grupoetnico_id+']').attr('selected', true);
		$('[name = municipio] option[value='+json.municipio+']').attr('selected', true);
		$('[name = rama] option[value='+json.persona.rama_id+']').attr('selected', true);
		documentos(json.documentos);
	}, 'json');
}
$(".filess").fileinput({
				showUpload: false,
				showCaption: false,
				showRemove : false,
				fileType: "any"
			});
$(document).ready(function() {
	$("#test-upload").fileinput({
					'showPreview' : true,
					'allowedFileExtensions' : ['jpg','jpeg','png','gif'],
					'elErrorContainer': '#errorBlock'
				});
$('#datetimePicker1,#datetimePicker').datetimepicker({
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
	$.post('verArtesano', $(this).serialize(), function(json) {
		artesanos = '';
		if(json.length > 1){
			$.each(json,function(index,artesano){
				artesanos += '<tr>'+
				'<td>'+artesano.nombre+'</td>'+
				'<td>'+artesano.paterno+'</td>'+
				'<td>'+artesano.materno+'</td>'+
				'<td>'+artesano.cumple+'</td>'+
				'<td><button class="btn-ioa btn-xs" onClick="encontrado('+artesano.id+')" data-dismiss="modal">Seleccionar</button></td>';	
			});
			$('#elementobody').html(artesanos);
			$("#myModal").modal('show');
		}
		else if(json.length == 1)
			encontrado(json[0].id)
		else
			swal('Error','No se encontró el artesano','error');
		
	}, 'json').fail(function(){
		swal('Error','No se encontró el artesano','error');
	});
});

$('#formupdate').bootstrapValidator({
	// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
	feedbackIcons: {
	    valid: 'glyphicon glyphicon-ok tok',
	    invalid: 'glyphicon glyphicon-remove tok',
	    validating: 'glyphicon glyphicon-refresh tok'
	},
	fields: {
	    nombre: {
	        validators: {
	            notEmpty: {},
	        	regexp:{
	            regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
	                message: 'Por favor verifica el campo'
	            }
	            }},
	    paterno: {
            validators: {
                notEmpty: {},
            	regexp:{
                regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
                    message: 'Por favor verifica el campo'
                }
                }},
        materno: {
            validators: {
            	regexp:{
                regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
                    message: 'Por favor verifica el campo'
                }
                }},
	    cp:{
	        validators: {
	            integer: {},
				stringLength:{
					min: 5,
					max: 5,
					message: 'El CP debe tener 5 dígitos'
				}
	        }
	    },
	   
        curp:{
				validators:{
                    notEmpty:{},
                    regexp: {
                        regexp:/^[a-zA-Z]{4}((\d{2}((0[13578]|1[02])(0[1-9]|[12]\d|3[01])|(0[13456789]|1[012])(0[1-9]|[12]\d|30)|02(0[1-9]|1\d|2[0-8])))|([02468][048]|[13579][26])0229)(H|M|h|m)(AS|as|BC|bc|BS|bs|CC|cc|CL|cl|CM|cm|CS|cs|CH|ch|DF|df|DG|dg|GT|gt|GR|gr|HG|hg|JC|jc|MC|mc|MN|mn|MS|ms|NT|nt|NL|nl|OC|oc|PL|pl|QT|qt|QR|qr|SP|sp|SL|sl|SR|sr|TC|tc|TS|ts|TL|tl|VZ|vz|YN|yn|ZS|zs|SM|sm|NE|ne)([a-zA-Z]{3})([a-zA-Z0-9\s]{1})\d{1}$/,
                        message: 'Por favor verifica el campo'
                    }
	    }},
	    RFC: {
	        validators: {
	            stringLength: {
	                min: 13,
	                max:13,
	                message:'Se requieren 13'
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
	    },
	    taller: {
	        validators: {
	            notEmpty: {}
	        }
	    },
	    ine: {
	        validators: {
	            stringLength: {
	                min: 13,
	                max:13,
	                message:'Se requieren 13'
	            }
	        }
	    },
	    sexo: {
			validators: {
	    		notEmpty: {}
	    	}
	    },
	    numero:{
		    validators: {
		        integer: {},
		        notEmpty: {},
		    }
		},
		colonia: {
            validators: {
                notEmpty: {}
            }
        },
        calle: {
            validators: {
                notEmpty: {}
            }
        },
	    civil: {
	        validators: {
	            notEmpty: {}
	        }
	    },
	    tel: {
	        validators: {
	            integer:{},
	            stringLength: {
	                min: 7,
	                max: 7,
	                message:'Se requieren 7 dig'
	        }
	        }},
	    tipoTel: {
        	validators: {
        		notEmpty: {},
        	}
        },
	        lada: {
	        validators: {
	            integer: {},
	            stringLength: {
	                min: 3,
	                max: 3,
	                message:'Verifica'
	        }
	    }
	    },
	    fotoperfil:{
			validators: {
				file: {
					extension: 'jpeg,png,jpg,gif',
					type: 'image/jpg,image/jpeg,image/png,image/gif',
					maxSize: 2048 * 1024,   // 2 MB
				}
			}
		},
	curppic:{
			validators: {
				file: {
					extension: 'jpeg,png,jpg,gif',
					type: 'image/jpg,image/jpeg,image/png,image/gif',
					maxSize: 2048 * 1024,   // 2 MB
				}
			}
		},
	inepic:{
			validators: {
				file: {
					extension: 'jpeg,png,jpg,gif',
					type: 'image/jpg,image/jpeg,image/png,image/gif',
					maxSize: 2048 * 1024,   // 2 MB
				}
			}
		},
	actapic:{
		validators: {
			file: {
				extension: 'jpeg,png,jpg,gif',
				type: 'image/jpg,image/jpeg,image/png,image/gif',
				maxSize: 2048 * 1024,   // 2 MB
			}
		}
	}
	}
	}).on('success.form.bv', function(e) {
  //       e.preventDefault();
  //       $('.fa-refresh').removeClass('hidden');
  //       $.post($(this).attr('action'),$(this).serialize(), function(json) {
		// 	if(json.success)
		// 		swal('Elemento actualizado','', "success");
		// }, 'json').fail(function(){
		// 			swal('Error','ocurrio un error','error');
		// 		});;
    });

$('#datetimePicker1').on('dp.change dp.show', function(e) {
$('#buscarartesano').bootstrapValidator('revalidateField', 'fechanace');
});

});

</script>

<script>
function documentos(documents){
var html='<div class="bg-orga col-md-12 text-center">DOCUMENTOS DEL ARTESANO</div>';
$(documents).each(function(){
	html += '<div class="container bg-docs col-md-7"><div class="col-md-7"><strong>'+this.nombre+'</strong><div class="col-md-7" style="text-align:center;"><img style="border: 0pt; margin-left: 0px; margin-bottom: 10px; margin-top: 15px; height: 200px; width: 150px;" src="'+this.ruta+'" onClick="window.open('+"'"+this.ruta+"'"+')";></img></div></div></div>';
}); 
$('#documentos').html(html);
}
</script>

<script>
$('.mayuscula').focusout(function() {
	$(this).val($(this).val().toUpperCase());
});
	

$('#datetimePicker').on('dp.change dp.show', function(e) {
    $('#formupdate').bootstrapValidator('revalidateField', 'fechanace');
});

$('#cancelar').click(function(){
window.location.reload();	

});
</script>

<script type="text/javascript" charset="utf-8">
$( "#selectmun" ).change(function () {
	$.post("<?php echo URL::to('editarArtesano/municipio'); ?>", 'id='+$( "#selectmun option:selected" ).val(), function(json) {
		 $( "#selectloc" ).html('');
		$(json).each(function(){
			$( "#selectloc" ).append( '<option value="'+this.id+'">'+this.nombre+'</option>')
		});
	}, 'json');
}).change();
</script>
@stop 