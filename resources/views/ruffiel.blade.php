@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"></div>
            </div>
        </div>
    </header>

    @if($cliente->id_tipo_cliente==1)
        <nav aria-label="breadcrumb" style="margin:1%; margin-right:70%;">
            <ol class="breadcrumb" style="background-color: white" >
                <li class="breadcrumb-item"><a href="/estudiantes">Estudiante</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ruffier</li>
            </ol>

        </nav>
    @endif

    @if($cliente->id_tipo_cliente==2)
        <nav aria-label="breadcrumb" style="margin:1%; margin-right:70%;">
            <ol class="breadcrumb" style="background-color: white" >
                <li class="breadcrumb-item"><a href="/particulares">Docente</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ruffier</li>
            </ol>

        </nav>

    @endif

    @if($cliente->id_tipo_cliente==3 )
        <nav aria-label="breadcrumb" style="margin:1%; margin-right:70%;">
            <ol class="breadcrumb" style="background-color: white" >
                <li class="breadcrumb-item"><a href="/particulares">Particular</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ruffier</li>
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
        <div id="divPerfil" class=" perfil col-md-1 col-md-2 col-12 float-md-left mr-5 pr-md-8 mt-lg-5 pr-xl-6">


            <img src="/clientes_imagenes/{{$cliente->imagen}}" width="200px" height="200px" >
            <div class="card margencard" style=" border: none;" >


                <h5 style="margin-top: 10%"> {{$cliente->nombre}}</h5>

                <h6 style="all: revert">Ruffier</h6>
                <div style="max-height: 250px;">{!! $chart->container() !!}</div>

            </div>

        </div>
            <div class="card"
                 style="width: 170px; border: none">
                <div  style="background: transparent;">

                </div>
            </div>


            <div class="btn-group mt-3 mb-5 " style="margin-left: 0px;" role="group" aria-label="Button group with nested dropdown">

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
        <a class="btn btn-secondary btn-sm" href="{{route("imc.ini",[$cliente->id])}}">MedidasAntropometricas</a>
        <a class="btn btn-secondary btn-sm" href="{{route("grasa.uni",["id"=>$cliente->id])}}">GrasaCorporal</a>
        <a class="btn btn-primary btn-sm" href="{{route("ruffier.uni",["id"=>$cliente->id])}}">Ruffier</a>
            <a class="btn btn-secondary btn-sm" href="{{route("grafico.mostrar",["id"=>$cliente->id])}}">Grafico</a>


    </div>

        <a class="btn btn-primary btn-sm mt-3"   href="{{route("botonruffier",["id"=>$cliente->id])}}"
           style="float: right; margin-right: 50px; color: white">Nuevo

        </a>





    <div class="w3-container w3-teal mx-5">

        <div class="card"  style="-moz-box-shadow: 0px 5px 3px 3px rgba(194,194,194,1);
box-shadow: 0px 5px 3px 3px rgba(194,194,194,1); border: none">




            <div class="table-responsive ">
                <table class="table ruler-vertical table-hover mx-sm-0 ">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">N°</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Diagnostico</th>
                        <th scope="col">Pulso en reposo</th>
                        <th scope="col">Pulso en acción</th>
                        <th scope="col">Pulso en descanso</th>
                        <th scope="col">Ruffier</th>

                        <th scope="col">MVO2</th>
                        <th scope="col">MVOReal</th>
                        <th scope="col">Diagnostico MVO2</th>

                        <th scope="col">Acciones</th>

                    </tr>
                    </thead>

                    <tbody>


                        @if($datos->count()>0)
                            @foreach($datos as $dato)
                                <tr style="text-align:right">
                                    <td>{{$no++}}</td>
                                    <th>{{date("d-m-Y",strtotime($dato->created_at))}}</th>
                                    <td style="text-align: center">{{$dato->diagnostico}}</td>
                                <td>{{$dato->pulso_r}}</td>
                                <td>{{$dato->pulso_a}}</td>
                                <td>{{$dato->pulso_d}}</td>
                                <td>{{$dato->ruffiel}}</td>

                                <td>{{$dato->mvo}}</td>
                                <td>{{$dato->mvoreal}}</td>
                                    <td>{{$dato->mvodiagnostico}}</td>

                                <td class="form-inline ">
                                    <button class="btn btn-warning mr-xl-2"><a
                                                href="{{route('ruffier.editar',[$dato->id,$dato->id_cliente])}}"><i
                                                    class="fas fa-edit" style="color: #1b1e21"></i></a></button>

                                    <button class="btn btn-danger mr-xl-2"
                                            data-id="{{$dato->id}}"
                                            data-id_cliente="{{$dato->id_cliente}}"
                                            data-toggle="modal" data-target="#modalBorrarRuffier"><i class="fas fa-trash-alt"></i></button>

                                </td>
                    </tr>
                    @endforeach
                    @else
                        <td colspan="11" style="text-align: center">No hay medidas ingresados</td>
                    @endif

                    </tbody>
                </table>

                @if($datos->count()>10)
                    <div class="panel">
                        {{ $datos->links() }}
                    </div>
                @endif
            </div>
            </div>
        </div>

        <div class="container" style="margin: 50px">

        </div>
    </div>
    {!! $chart->script() !!}
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="modalBorrarRuffier">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Atención Eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('ruffier.borrar')}}">
                    {{method_field('delete')}}

                    <div class="modal-body">
                        <input name="id" id="id" type="hidden">
                        <input name="id_cliente" id="id_cliente" type="hidden">

                        <p>¿Está seguro que desea borrar la medida de ruffier?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>

                </form>
            </div>

        </div>
    </div>

    <style>
        .perfil{
            position: -webkit-sticky; /* Safari */
            position: sticky;
            overflow-y: hidden;
            top: 10%;
        }
    </style>

    <script>
        window.addEventListener('scroll', function() {
            document.querySelector('.perfil').style.marginTop =
                Math.max(5, 100 - this.scrollY) + 'px';
        }, false);
    </script>

@endsection