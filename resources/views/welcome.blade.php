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
                <p class="text-faded">Start Bootstrap has everything you need to get your new website up and running in no time! All of the templates and themes on Start Bootstrap are open source, free to download, and easy to use. No strings attached!</p>
                <a href="{{ route('book_now_servicio') }}" class="btn btn-default btn-xl">Reservar bus</a>
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
            <p class="text-muted">Our templates are updated regularly so they don't break.</p>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 text-center">
        <div class="service-box">
            <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
            <h3>Tours de medio día</h3>
            <p class="text-muted">You can use this theme as is, or you can make changes!</p>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 text-center">
        <div class="service-box">
            <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
            <h3>Tours de un día</h3>
            <p class="text-muted">We update dependencies to keep things fresh.</p>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 text-center">
        <div class="service-box">
            <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
            <h3>Otras servicios</h3>
            <p class="text-muted">You have to make your websites with love these days!</p>
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
                    <p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>123-456-6789</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>
                </div>
            </div>
        </div>
    </section>
@stop