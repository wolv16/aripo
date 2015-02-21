@extends('layouts.baseartesanos')

@section('titulo')
  Settings IOA
@endsection
@section('contenido')
<div class="main">
      <div class="login-form text-center" style="width: 30%;!important">
        <h2 style="font-size: 30px;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;padding-top:15px;"><i class="fa fa-unlock-alt"></i> Contraseña</h2>
          {{ Form::open(array('url' => 'settings/update','role' => 'form','id' => 'update','class' => 'form-horizontal')) }}
          <div class="form-group">
              <label class="col-sm-3 control-label"><strong>Contraseña: </strong></label>
              <div class="col-sm-9">
                <input type="password" class="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" name="password" autocomplete="off">
                </div>  
          </div>
          <div class="form-group">
              <label class="col-sm-3 control-label"><strong>Contraseña: </strong></label>
              <div class="col-sm-9">
              <input type="password" class="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" name="password_confirmation" autocomplete="off">
              </div>  
          </div>
              <?php $status=Session::get('mensaje_error'); ?> 
              @if (!is_null($status))
                <p style='color:#900F0F' ><strong>{{$status}}</strong></p>
              @endif
              <div class="submit">
                <input type="submit" value="Guardar" >
            </div>
          {{ Form::close() }}
        </div>
      </div>
@endsection
@section('scripts')
{{  HTML::style('css/login.css')  }}
<style type="text/css">
.login-form {
  margin: 0 auto 4% auto;
}
</style>
<style type="text/css" media="screen">
  .tok{
    top: 2px !important;
    right: 23px !important;
  }
</style>
  {{  HTML::script('js/bootstrapValidator.js'); }}
  {{  HTML::script('js/es_ES.js'); }}
  <script type="text/javascript">
    $('#update').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok tok',
            invalid: 'glyphicon glyphicon-remove tok',
            validating: 'glyphicon glyphicon-refresh tok'
        },
        fields: {
            password: {
                validators: {
                    stringLength: {
                      min: 7,
                      max:10,
                  }
                }
            },
            password_confirmation: {
                validators: {
                  notEmpty: {
                    },
                  identical: {
                    field: 'password'
                  }
                }
            },
        }
    })
  </script>
@endsection