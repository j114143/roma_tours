@extends('layout.basico')

@section('titulo')
<i class="fa fa-user fa-3x"></i><br>Iniciar sesión
@stop
@section('contenido')
<style type="text/css">
    .col-centered{
    float: none;
    margin: 0 auto;
}
</style>
<div class="col-sm-4 col-centered">
    {!!Form::open(array('id'=>'form','class'=>'form-horizontal','id'=>"form"))!!}
        <div class="form-group">
            <input type="text" name="email" placeholder="E-mail" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Password" class="form-control">
        </div>
        <p class="text-center"><input type="submit" name="login" value="Iniciar sesión" class="btn btn-info"></p>
      </form>
</div>
<script type="text/javascript">
    $(document).ready(function(){
 $('#form').validate({
  errorElement: "span",
  rules: {
      email: {
        required: true,
        minlength: 10,
        maxlength: 32,
        email:true
      },
      password: {
        required: true,
        minlength: 5,
        maxlength: 16
      }
  },
  highlight: function(element) {
   $(element).closest('.form-group')
   .removeClass('has-success').addClass('has-error');
  },
  success: function(element) {
   element
   .addClass('help-inline')
   .closest('.form-group')
   .removeClass('has-error').addClass('has-success');
  }
 });
});
</script>
@stop