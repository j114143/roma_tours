@extends('layout.basico')
@section('titulo')
Servicio de transporte
@stop
@section('feacture')
<section class="bg-primary" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section-heading">Servicio de transporte turistico</h2>
                <hr class="light">
                <p class="text-faded"><img src="{{ url('logo.png') }}"></p>
                <a href="{{ route('book_now_cliente') }}" class="btn btn-default btn-xl">Reservar bus</a>
            </div>
        </div>
    </div>
</section>
@stop
@section('contenido')
<div class="row">
    <div class="col-lg-3 col-md-6 text-center">
        <div class="service-box">
            <i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>
            <h3>Traslados locales</h3>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 text-center">
        <div class="service-box">
            <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
            <h3>Tours de medio día</h3>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 text-center">
        <div class="service-box">
            <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
            <h3>Tours de un día</h3>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 text-center">
        <div class="service-box">
            <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
            <h3>Otras servicios</h3>
        </div>
    </div>
</div>
@stop
@section('footer')
<aside class="bg-dark">
    <div class="container text-center">
    {!!Form::open(array('id'=>'form','url'=>route('verify'),'class'=>'form-horizontal'))!!}
        <div class="row">
        <input class="form-control" name="reserva_id" id="reserva_sku" required placeholder="Código de reserva">
        <input type="submit" class="btn btn-warning" value="Verificar reserva">
        </div>
    </form>
    </div>
</aside>
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Contactenos</h2>
                    <hr class="primary">
                    <p>Para hacernos llegar sus reservas y/o consultas puede hacer usando los siguientes medios</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>+ 084 271750</p>
                    <p><b>Celular:</b> 951330747 - 951331569</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:p_romatours@hotmail.com">p_romatours@hotmail.com</a></p>
                </div>
            </div>
        </div>
    </section>
@stop