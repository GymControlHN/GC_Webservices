@extends("layouts.principal")

@section("content")

    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
            <div class="intro-text">
            </div>
        </div>
    </header>
    @if($cliente->id_tipo_cliente==1)
        <nav aria-label="breadcrumb" style="margin:1%; margin-right:70%;">
            <ol class="breadcrumb" style="background-color: white" >
                <li class="breadcrumb-item"><a href="/estudiantes">Estudiante</a></li>
                <li class="breadcrumb-item active" aria-current="page">Graficos</li>
            </ol>

        </nav>
    @endif

    @if($cliente->id_tipo_cliente==2)
        <nav aria-label="breadcrumb" style="margin:1%; margin-right:70%;">
            <ol class="breadcrumb" style="background-color: white" >
                <li class="breadcrumb-item"><a href="/particulares">Docente</a></li>
                <li class="breadcrumb-item active" aria-current="page">Graficos</li>
            </ol>

        </nav>

    @endif

    @if($cliente->id_tipo_cliente==3 )
        <nav aria-label="breadcrumb" style="margin:1%; margin-right:70%;">
            <ol class="breadcrumb" style="background-color: white" >
                <li class="breadcrumb-item"><a href="/particulares">Particular</a></li>
                <li class="breadcrumb-item active" aria-current="page">Graficos</li>
            </ol>

        </nav>

    @endif
    <div class="container-xl clearfix px-2 mt-4">
        @if($cliente->id_tipo_cliente==1)
            <h2 style="margin-left: 1%">Expediente Estudiante</h2>
        @endif
        @if($cliente->id_tipo_cliente==3 )

            <h2 style="margin-left: 1%">Expediente Particular</h2>
        @endif
        @if($cliente->id_tipo_cliente==2)
            <h2 style="margin-left: 1%">Expediente Docente</h2>
        @endif
        <div id="divPerfil" class="perfil col-md-1 col-md-2 col-12 float-md-left mr-5 pr-md-8 pr-xl-6">

            <img  src="/clientes_imagenes/{{$cliente->imagen}}" width="200px" height="200px" style ="margin-top: 22%">

            <div class="card margencard" style=" border: none;" >

                <div >
                    <h5 style="margin-top: 10%"> {{$cliente->nombre}}</h5>
                    <h6 style="all: revert">Graficos</h6>
                </div>

                </div>
            </div>

            <div class="card"
                 style="width: 170px; border: none">
                <div  style="background: transparent;">

                </div>

    </div>

    <div class="btn-group mt-3 mb-5 " role="group" aria-label="Button group with nested dropdown" >

        @if($cliente->id_tipo_cliente==3||$cliente->id_tipo_cliente==1)

            <a class="btn btn-secondary btn-sm" @if($cliente->id_tipo_cliente==3)
            href="{{route("pagoparticulares",["id"=>$cliente->id])}}"
               @endif
               @if($cliente->id_tipo_cliente ==1)
               href="{{route("pagoestudiantes",["id"=>$cliente->id])}}" @endif

               @if($cliente->id_tipo_cliente ==2)
               style="display: none;"

                    @endif>Pagos</a>



        @endif
        <a class="btn btn-secondary btn-sm" href="{{route("imc.ini",[$cliente->id])}}">Imc</a>
        <a class="btn btn-secondary btn-sm" href="{{route("grasa.uni",["id"=>$cliente->id])}}">Grasa</a>
        <a class="btn btn-secondary btn-sm" href="{{route("ruffier.uni",["id"=>$cliente->id])}}">Ruffier</a>
        <a class="btn btn-primary btn-sm" href="{{route("grafico.mostrar",["id"=>$cliente->id])}}">Grafico</a>

    </div>
    </div>

    <div class="w3-container w3-teal mx-30" style="margin-top: -12%; margin-left: 21%;
     margin-right: 10%; margin-bottom: 10%">
            {!! $chart->container() !!}

    </div>
    {!! $chart->script() !!}
        </div>

    <style>
        .perfil{
            position: -webkit-sticky; /* Safari */
            position: sticky;
            overflow-y: hidden;
            top: 10%;
        }
    </style>
@endsection