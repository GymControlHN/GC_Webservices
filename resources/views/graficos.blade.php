@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 150px;">
        <div class="container">
            <div class="intro-text">
            </div>
        </div>
    </header>

    <div class="card" style="width: 170px; border: none;background: transparent;margin-left: 50px;margin-top: 5px">
        <div class="card-header" style="background: transparent;height: 50px;" >
            <a class="btn btn-default" href="/estadisticas"><span><i class="fa fa-arrow-circle-left"></i></span> Regresar</a>
        </div>
    </div>




    <div class="w3-container w3-teal mx-5">

        <h5 class="card margencard"  style="all: revert;  border: none;">Graficos</h5>
        <h5>Nombre: {{$cliente->nombre}}</h5>
        <div class="btn-group " style="margin-left: 50px;" role="group" aria-label="Button group with nested dropdown">

            <a class="btn btn-primary" >Estadisticas</a>
            <a class="btn btn-secondary" >Grafico</a>

        </div>

        </div>


@endsection