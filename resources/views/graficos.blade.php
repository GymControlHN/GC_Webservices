@extends("layouts.principal")

@section("content")

    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
            <div class="intro-text">
            </div>
        </div>
    </header>

    <div class="container-xl clearfix px-2 mt-4">
        <div class="col-md-1 col-md-2 col-12 float-md-left mr-5 pr-md-8 pr-xl-6">

            <img  src="/clientes_imagenes/{{$cliente->imagen}}" width="200px" height="200px" >

            <div class="card margencard" style=" border: none;" >

                <div >
                    @if($cliente->id_tipo_cliente==3 )

                        <H5> Expediente Particular</H5>
                    @endif
                    @if($cliente->id_tipo_cliente==2)
                        <H5> Expediente Docente</H5>

                    @endif
                    @if($cliente->id_tipo_cliente==1)
                        <H5> Expediente Estudiante</H5>
                    @endif

                </div>

                </div>
            </div>

        <div class="card"
             style="width: 170px; border: none;background: transparent;margin-left: 50px;margin-top: 5px">
            <div class="card-header" style="background: transparent;height: 50px;" >
            <a class="btn btn-default" href="/estadisticas"><span><i class="fa fa-arrow-circle-left"></i></span> Regresar</a>
        </div>
    </div>

    <div class="btn-group mt-3 mb-5 " role="group" aria-label="Button group with nested dropdown" >

        @if($cliente->id_tipo_cliente==3||$cliente->id_tipo_cliente==1)

            <a class="btn btn-secondary" @if($cliente->id_tipo_cliente==3)
            href="{{route("pagoparticulares",["id"=>$cliente->id])}}"
               @endif
               @if($cliente->id_tipo_cliente ==1)
               href="{{route("pagoestudiantes",["id"=>$cliente->id])}}" @endif

               @if($cliente->id_tipo_cliente ==2)
               style="display: none;"

                    @endif>Pagos</a>



        @endif
        <a class="btn btn-secondary" href="{{route("imc.ini",[$cliente->id])}}">Imc</a>
        <a class="btn btn-secondary" href="{{route("grasa.uni",["id"=>$cliente->id])}}">Grasa</a>
        <a class="btn btn-secondary" href="{{route("ruffier.uni",["id"=>$cliente->id])}}">Ruffier</a>
        <a class="btn btn-primary" href="{{route("grafico.mostrar",["id"=>$cliente->id])}}">Grafico</a>

    </div>
    </div>

    <div class="w3-container w3-teal mx-30" style="margin-top: -12%; margin-left: 21%;
     margin-right: 10%; margin-bottom: 10%">
            {!! $chart->container() !!}

    </div>
    {!! $chart->script() !!}
        </div>
@endsection