@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
        </div>
    </header>

    <div class="card" style="width: 170px; border: none;background: transparent;margin-left: 50px;margin-top: 5px">
        <div class="card-header" style="background: transparent;height: 50px;" >
            @if($nombre->id_tipo_cliente==3 )
                <a class="btn btn-default" href="/particulares"><span><i class="fa fa-arrow-circle-left"></i></span> Regresar</a>

            @endif
            @if($nombre->id_tipo_cliente==2)
                <a class="btn btn-default" href="/docentes"><span><i class="fa fa-arrow-circle-left"></i></span> Regresar</a>

            @endif
            @if($nombre->id_tipo_cliente==1)
                <a class="btn btn-default" href="/estudiantes"><span><i class="fa fa-arrow-circle-left"></i></span> Regresar</a>
            @endif

        </div>
    </div>

    <div class="w3-container w3-teal mx-5">

        <div class="card margencard" style="border: none" >

            <div>
                @if($nombre->id_tipo_cliente==3 )

                    <H5> Expediente Particular</H5>
                @endif
                @if($nombre->id_tipo_cliente==2)
                    <H5> Expediente Docente</H5>

                @endif
                @if($nombre->id_tipo_cliente==1)
                    <H5> Expediente Estudiante</H5>
                @endif
                <h5 style="all: revert">Pago</h5>
                <h5>Nombre: {{$nombre->nombre}}</h5>

            </div>
        </div>
    </div>

    <div class="btn-group " style="margin-left: 50px;" role="group" aria-label="Button group with nested dropdown">

        <a class="btn btn-primary" href="{{route("pagoestudiantes",["id"=>$nombre->id])}}">Pagos</a>
        <a class="btn btn-secondary" href="{{route("imc.ini",[$nombre->id])}}">Imc</a>
        <a class="btn btn-secondary" href="{{route("grasa.uni",["id"=>$nombre->id])}}">Grasa</a>
        <a class="btn btn-secondary" href="{{route("ruffier.uni",["id"=>$nombre->id])}}">Ruffier</a>

    </div>
    <button class="btn btn-danger float-right" style="margin-right: 50px" data-toggle="modal" data-target="#modalPagoEstudiante" >
        <i class="fas fa-dollar-sign"></i> Agregar pago
    </button>
    <br><br>

    <div class=" w3-container w3-teal mx-5">




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




        @if(session("exito"))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


                {{ session('exito') }}
            </div>

        @endif
        @if(session("error"))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


                {{ session('error') }}
            </div>

        @endif



        <div class="table-responsive mb-5"  style="-moz-box-shadow: 0px 5px 3px 3px rgba(194,194,194,1);
box-shadow: 0px 5px 3px 3px rgba(194,194,194,1);">
            <table class="table ruler-vertical table-hover mx-sm-0 ">

                <thead class="thead-light">
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
                        style="background-color: #7086f7; color: white;">Registro del año {{ $day }}</th>
                </tr>
                @foreach ($users_list as $user)
                    <tr>
                        <td>{{$no++}}</td>
                        <th>{{ $user->mes }}</th>
                        <th>{{ $user->fecha_pago }}</th>
                        <th>Cancelado</th>
                        <th>
                            <button class="btn btn-danger mr-xl-2"
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
@endsection



