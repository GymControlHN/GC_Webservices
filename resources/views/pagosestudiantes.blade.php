@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
        </div>
    </header>
    @if($nombre->id_tipo_cliente==1)
        <nav aria-label="breadcrumb" style="margin:1%; margin-right:70%;">
            <ol class="breadcrumb" style="background-color: white" >
                <li class="breadcrumb-item"><a href="/estudiantes">Estudiante</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pagos</li>
            </ol>

        </nav>
    @endif

    @if($nombre->id_tipo_cliente==2)
        <nav aria-label="breadcrumb" style="margin:1%; margin-right:70%;">
            <ol class="breadcrumb" style="background-color: white" >
                <li class="breadcrumb-item"><a href="/particulares">Docente</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pagos</li>
            </ol>

        </nav>

    @endif

    @if($nombre->id_tipo_cliente==3 )
        <nav aria-label="breadcrumb" style="margin:1%; margin-right:70%;">
            <ol class="breadcrumb" style="background-color: white" >
                <li class="breadcrumb-item"><a href="/particulares">Particular</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pagos</li>
            </ol>

        </nav>

    @endif

    <div class="container-xl clearfix px-1 mt-3">
        <div id="divPerfil" class=" perfil col-md-1 col-md-2 col-12 card float-md-left mr-5 mt-lg-3 pr-xl-6">
            <div class="card-header" style="background: #8addff">
            @if($nombre->id_tipo_cliente==1)
                <h6 style="margin-left: 1%">Expediente Estudiante</h6>
            @endif
            @if($nombre->id_tipo_cliente==3 )

                <h6 style="margin-left: 1%">Expediente Particular</h6>
            @endif
            @if($nombre->id_tipo_cliente==2)
                <h6 style="margin-left: 1%">Expediente Docente</h6>
            @endif
            </div>

            <img class="card-img-top" src="/clientes_imagenes/{{$nombre->imagen}}" width="250px"
                 height="300px"  style=" object-fit: cover">
            <div class="card margencard" style=" border: none;" >


                <div class="card-body">
                    <h5 style="margin-top: 10%"> {{$nombre->nombre}}</h5>
                    @if($nombre->id_tipo_cliente==3 )

                        <H6> Expediente Particular</H6>
                    @endif
                    @if($nombre->id_tipo_cliente==2)
                        <H6> Expediente Docente</H6>

                    @endif

                    <h6 style="all: revert">Pagos </h6>


                </div>
            </div>
        </div>


        <div class="card"
             style="width: 170px; border: none">
            <div  style="background: transparent;">

            </div>
    </div>

        <div class="btn-group mt-3 mb-5" style="margin-left: .1%;" role="group" aria-label="Button group with nested dropdown">
        <a class="btn btn-primary btn-sm  " href="{{route("pagoestudiantes",["id"=>$nombre->id])}}">Pagos</a>
        <a class="btn btn-secondary btn-sm" href="{{route("imc.ini",[$nombre->id])}}">MedidasAntroPometricos</a>
        <a class="btn btn-secondary btn-sm" href="{{route("grasa.uni",["id"=>$nombre->id])}}">GrasaCorporal</a>
        <a class="btn btn-secondary btn-sm" href="{{route("ruffier.uni",["id"=>$nombre->id])}}">Ruffier</a>
        <a class="btn btn-secondary btn-sm" href="{{route("grafico.mostrar",["id"=>$nombre->id])}}">Grafico</a>

    </div>
        <button class="btn btn-primary btn-sm  float-right mt-sm-3" style="margin-top: -10px; margin-right: 50px"
                data-toggle="modal" data-target="#modalPagoEstudiante" >Nuevo
        </button>


        <div class="modal fade" id="modalPagoEstudiante" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Agregar Pago</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                    <div class="modal-body">
                        <form method="post" action="{{route('pagoestudiantes.guardar')}}">
                            <h6>Fecha</h6>
                            <div class="form-group">
                                <input type="date" class="form-control"
                                       required
                                       id="fecha" name="fecha_pago">
                                <input type="hidden" id="mes" name="mes">
                            </div>
                            <div class="modal-footer">
                                <input name="id" value="{{$nombre->id}}" type="hidden">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                <button type="submit"  class="btn btn-primary ">Guardar</button>

                            </div>
                        </form>

                    </div>

                </div>
            </div>

        </div>





        <div class="w3-container w3-teal mx-5">

            <div class="card" style="-moz-box-shadow: 0px 5px 3px 3px rgba(194,194,194,1);
box-shadow: 0px 5px 3px 3px rgba(194,194,194,1);border: none">


                <div class="table-responsive" >
                    @if(session("exito"))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-left: 0%; margin-right: 0%;" >
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>


                            {{ session('exito') }}
                        </div>

                    @endif
                    @if(session("error"))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-left: 0%; margin-right: 0%;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>


                            {{ session('error') }}
                        </div>

                    @endif

                    <table class="table table-hover" style="font-size: 12px" >

                        <thead class="thead-dark">
            <tr>
                <th>N°</th>
                <th>Mes</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acciones</th>
            <tr>
            </thead>
            <tbody>
            @if($pagos->count()>0)
            @foreach ($pagos as $day => $users_list)
                <tr>
                    <th colspan="5"
                        style="background-color: #85d6f7; color: white;">Registro del año {{ $day }}</th>
                </tr>
                @foreach ($users_list as $user)
                    <tr>
                        <td>{{$no++}}</td>
                        <th>{{ $user->mes }}</th>
                        <th>{{ $user->fecha_pago }}</th>
                        <th>Cancelado</th>
                        <th>
                            <button class="btn btn-outline-danger btn-sm"
                                    data-id="{{$user->id}}"
                                    data-id_cliente="{{$user->id_cliente}}"
                                    data-toggle="modal" data-target="#modalBorrarPagoEstudiante"><i class="fas fa-trash-alt"></i></button>

                        </th>

                    </tr>
                        @endforeach
            @endforeach
            @else
                <tr>
                    <td colspan="5" style="text-align: center">No hay pagos ingresados</td>
            @endif


            </tbody>
        </table>
        </div>

    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="modalBorrarPagoEstudiante">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Atención Eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('pagoestudiante.borrar')}}">
                    {{method_field('delete')}}

                    <div class="modal-body">
                        <input name="id" id="id" type="hidden">
                        <input name="id_cliente" id="id_cliente" type="hidden">

                        <p>¿Está seguro que desea borrar el pago?</p>
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
@endsection



