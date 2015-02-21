
@extends('layouts.baseartesanos')
@section('titulo') Usuarios
@endsection 

@section('contenido')
<div class="container wellr col-sm-8 col-sm-offset-2" style="margin-top: 2em;">
    <div class="row" style="margin-bottom: 1em;">
        <div class="col-sm-5">
        <h2 >Usuarios</h2>
        </div>
        <div class="col-sm-2 pull-right">
            <button type="button" class="btn btn-success btn-md" style="margin-top: 2em;" data-toggle="modal" data-target="#nuevo"><i class="fa fa-plus"></i> Nuevo</button>
        </div>
    </div>
        @if(count($users) > 0)
            <table class="table table-hover" id="usuarios">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Nivel</th>
                        <th>Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user) 
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->role_id }}</td>
                            <td>
                                <button type="button" class="btn btn-ioa btn-xs update" title="{{$user->username}}" onclick="update(this)">Editar</button>
                                <button type="button" class="btn btn-warning btn-xs delete" title="{{$user->username}}" onclick="password(this)">Reset password</button>
                                <button type="button" class="btn btn-danger btn-xs delete" title="{{$user->username}}" onclick="eliminar(this)">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table> 
        @else 
            <div class="alert alert-danger fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Error</strong>Todavia no hay ningún usuario registrado Por favor registrese.
            </div>
        @endif
</div>
<!-- Modal -->
  <div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="user">
            <i class="fa fa-user fa-lg"></i>Nuevo Usuario
          </h4>
        </div>
        {{ Form::open(array('url' => 'users/nuevo','role' => 'form','id' => 'nuevo-user','class' => '')) }}
        <div class="modal-body">
            <center>
            <h2 name="name"><i class="fa fa-user"></i> Nuevo usuario</h2>
            <i class="fa fa-refresh fa-spin hidden fa-2x"></i>
            </center>            
            <div class="form-group">  
              {{ Form::label('nombre', 'Nombre de Usuario',array('class' => 'control-label')) }}
              {{ Form::text('nombre', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
              {{ Form::label('tipo', 'Tipo',array('class' => 'control-label')) }}
              {{Form::select('tipo', array('0' => 'Seleccione','1' => 'Usuario','2' => 'Administrador',), null, array('class' =>'form-control'))}}
            </div>
        </div>
        <div class="modal-footer">
            <button id='bcancelar' type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
            {{ Form::button('<i class="fa fa-floppy-o "></i> Crear',array('class' => 'btn btn-success','id' => 'guardar','type' => 'submit')) }}
        </div> 
        {{ Form::close() }}
      </div>
    </div>
  </div>
  <!-- End Modal -->
<!-- Modal -->
<!-- Modal -->
  <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="user">
            <i class="fa fa-user fa-lg"></i>Nuevo Usuario
          </h4>
        </div>
        {{ Form::open(array('url' => 'users/update','role' => 'form','id' => 'editar-user','class' => '')) }}
        <div class="modal-body">
            <center>
            <h2 name="name"><i class="fa fa-user"></i> Nuevo usuario</h2>
            <i class="fa fa-refresh fa-spin hidden fa-2x"></i>
            </center>
             {{ Form::text('id', null, array('class' => 'hidden','id' => 'id')) }}
            <div class="form-group">  
              {{ Form::label('nombre', 'Nombre de Usuario',array('class' => 'control-label')) }}
              {{ Form::text('nombre_editar', null, array('class' => 'form-control','id' => 'nombre')) }}
            </div>
            <div class="form-group">
              {{ Form::label('tipo', 'Tipo',array('class' => 'control-label')) }}
              {{Form::select('tipo_editar', array('0' => 'Seleccione','1' => 'Usuario','2' => 'Administrador',), null, array('class' =>'form-control','id' => 'tipo'))}}
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
@stop
@section('scripts')
{{  HTML::script('js/bootstrapValidator.js'); }}
<script  type="text/javascript" >
$(document).ready(function() {
    $('#nuevo-user').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok nombre',
            invalid: 'glyphicon glyphicon-remove nombre',
            validating: 'glyphicon glyphicon-refresh nombre'
        },
        fields: {
            nombre: {
                validators: {
                    notEmpty: {
                    }
                }
            },
            tipo: {
                validators: {
                    notEmpty: {}
                }
            }
        }
    })
    .on('success.form.bv', function(e) {
        e.preventDefault();
        $('.fa-refresh').removeClass('hidden');
        $.post($('#nuevo-user').attr('action'), $('#nuevo-user').serialize(), function(json) {
            if(json.success){
                swal('Usuario creado', null, "success");
                html = '<tr><td>'+json.user_id+'</td><td>'+json.username+'</td><td>'+json.role_id+'</td><td><button type="button" class="btn btn-ioa btn-xs update" onclick="update(this)" title='+json.username+'>Editar</button> <button type="button" class="btn btn-warning btn-xs delete" title='+json.username+' onclick="password(this)">reset password</button> <button type="button" class="btn btn-danger btn-xs delete" onclick="eliminar(this)" title='+json.username+'>eliminar</button></td></tr>';
                $('#usuarios').append(html);
            }
            else
                swal('Error', 'Ocurrio un error', "error");
            $('#nuevo-user').data('bootstrapValidator').resetForm(true);
            $('.fa-spin').addClass('hidden');
            $('#nuevo').modal('hide');
        }, 'json');
        
    });
    $('#editar-user').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok nombre',
            invalid: 'glyphicon glyphicon-remove nombre',
            validating: 'glyphicon glyphicon-refresh nombre'
        },
        fields: {
            nombre_editar: {
                validators: {
                    notEmpty: {
                    }
                }
            },
            tipo_editar: {
                validators: {
                    notEmpty: {
                    }
                }
            }
        }
    })
    .on('success.field.bv', function(e, data) {
            if (data.bv.getSubmitButton()) {
                data.bv.disableSubmitButtons(false);
            }
        })
    .on('success.form.bv', function(e) {
        e.preventDefault();
        $('.fa-refresh').removeClass('hidden');
        $.post($('#editar-user').attr('action'), $('#editar-user').serialize(), function(json) {
            if(json.success){
                swal('Usuario Actualizado', null, "success");
                $('table').find('tr').each(function(index,tr) {
                    if($(tr).find("td:nth-child(1)").text() == json.user_id){
                        $(tr).find("td:nth-child(2)").text(json.username);
                        $(tr).find("td:nth-child(3)").text(json.role_id);
                        $(tr).find("button").attr('title',json.username);
                    }
                });
            }
            else if(json.errors){
                swal('Error', 'Existe un usuario con ese nombre', "error");
            }
            else
                swal('Error', 'Ocurrio un error', "error");
            $('#editar-user').data('bootstrapValidator').resetForm(true);
            $('.fa-spin').addClass('hidden');
            $('#editar').modal('hide');
        }, 'json');
        
    });
});
function update(btn) {
    $('#editar').modal('show');
    $('[name=id]').val($(btn).closest("tr").find("td:nth-child(1)").text());
    $('[name=nombre_editar]').val($(btn).closest("tr").find("td:nth-child(2)").text());
    $('[name=tipo_editar] option[value='+$(btn).closest("tr").find("td:nth-child(3)").text()+']').attr('selected', true);
}
function eliminar(btn) {
    $.post('{{URL::to("users/delete");}}', {user:$(btn).closest("tr").find("td:nth-child(1)").text()}, function(json) {
            if(json.success){
                swal('Usuario eliminado', null, "success");
                $(btn).closest("tr").remove();
            }
            else
                swal('Error', 'Ocurrio un error', "error");
        }, 'json');
}
function password(btn) {
    $.post('{{URL::to("users/password");}}', {user:$(btn).closest("tr").find("td:nth-child(1)").text()}, function(json) {
            if(json.success){
                swal('Contraseña restablecida', 'contraseña: 123', "success");
            }
            else
                swal('Error', 'Ocurrio un error', "error");
        }, 'json');
}
</script>
@stop

