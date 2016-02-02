@extends('layout.user')
@section('titulo')
Agregar Licencia
@stop
@section('contenido')
<div class="row">
          <div class="col-sm-8">
            {!!Form::open(array('url' => route('licencias_new'),'id'=>'form','class'=>'form-horizontal'))!!}
            {!!Form::input('hidden','conductor_id', $conductor_id)!!}
            <div class="form-group">
                <label class="col-sm-2 control-label">Número de Licencia</label>
                <div class="col-sm-10">
                  {!!Form::input('text','numero_licencia', null ,['class'=>'form-control','maxlength' => 64,'required'])!!}
                </div>
            </div>

            <div class="form-group">
            	<label class="col-sm-2 control-label">Fecha de Emisión</label>
				    <div class="row">
				        <div class='col-sm-6'>
				            <div class="form-group">
				                <div class='input-group date' id='datetimepicker1'>
				                	{!!Form::input('text','fecha_emision', null ,['class'=>'form-control','maxlength' => 64,'required'])!!}
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
				                </div>
				            </div>
				        </div>
				        <script type="text/javascript">
				            $(function () {
				                $('#datetimepicker1').datetimepicker();
				            });
				        </script>
					</div>
			</div>	  
			<div class="form-group">
            	<label class="col-sm-2 control-label">Fecha de Revalidación</label>
				    <div class="row">
				        <div class='col-sm-6'>
				            <div class="form-group">
				                <div class='input-group date' id='datetimepicker1'>
				                	{!!Form::input('text','fecha_revalidacion', null ,['class'=>'form-control','maxlength' => 64,'required'])!!}
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
				                </div>
				            </div>
				        </div>
				        <script type="text/javascript">
				            $(function () {
				                $('#datetimepicker1').datetimepicker();
				            });
				        </script>
					</div>
			</div> 
            <div class="form-group">
                <label class="col-sm-2 control-label">Dirección</label>
                <div class="col-sm-10">
                  {!!Form::input('text','direccion', null ,['class'=>'form-control','maxlength' => 64,'required'])!!}
                </div>
            </div>   
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <a href="{{route('conductores')}}" class="btn btn-danger">Cancelar</a>
                </div>
            </div>

           {!!Form::close()!!}
          </div>
        </div>
@stop