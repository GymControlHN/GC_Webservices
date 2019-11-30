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

    <div class="w3-container w3-teal mx-5">

        <div class="card margencard" style=" border: none">



            <div>

                @if($cliente->id_tipo_cliente==3 )

                    <H5> Expediente Particular</H5>
                @endif
                @if($cliente->id_tipo_cliente==2)
                    <H5> Expediente Docente</H5>

                @endif
                @if($cliente->id_tipo_cliente==1)
                    <H5> Expediente Estudiante</H5>
                @endif
                <h5 style="all: revert">Ruffier</h5>
                <h5>Nombre: {{$cliente->nombre}}</h5>
            </div>

        </div>
    </div>
    </div>

    <div class="btn-group mt-3 mb-5 " style="margin-left: 50px;" role="group" aria-label="Button group with nested dropdown">

        <a class="btn btn-secondary" @if($cliente->id_tipo_cliente==3)
        href="{{route("pagoparticulares",["id"=>$cliente->id])}}"
           @endif
           @if($cliente->id_tipo_cliente ==1)
           href="{{route("pagoestudiantes",["id"=>$cliente->id])}}" @endif

           @if($cliente->id_tipo_cliente ==2)
           style="display: none;"

                @endif>Pagos</a>
        <a class="btn btn-secondary" href="{{route("imc.ini",[$cliente->id])}}">Imc</a>
        <a class="btn btn-secondary" href="{{route("grasa.uni",["id"=>$cliente->id])}}">Grasa</a>
        <a class="btn btn-primary" href="{{route("ruffier.uni",["id"=>$cliente->id])}}">Ruffier</a>

    </div>

    <a class="btn btn-primary"  href="{{route("botonruffier",["id"=>$cliente->id])}}"
       style="float: right; margin-right: 50px; color: white">Nuevo

    </a>



    <div class="w3-container w3-teal mx-5">

        <div class="card"  style="-moz-box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);
                box-shadow: 1px 1px 10px 1px rgba(161,161,161,1); border: none">




            <div class="table-responsive mb-5">
                <table class="table ruler-vertical table-hover mx-sm-0 ">
                    <thead class="thead-light">
                    <tr>

                        <th scope="col">Pulso en reposo</th>
                        <th scope="col">Pulso en acción</th>
                        <th scope="col">Pulso en descanso</th>
                        <th scope="col">Ruffier</th>
                        <th scope="col">Diagnostico</th>
                        <th scope="col">MVO2</th>
                        <th scope="col">MVOReal</th>
                        <th scope="col">Diagnostico MVO2</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>

                    </tr>
                    </thead>

                    <tbody>


                        @if($datos->count()>0)
                            @foreach($datos as $dato)
                                <tr style="text-align:right">

                                <td>{{$dato->pulso_r}}</td>
                                <td>{{$dato->pulso_a}}</td>
                                <td>{{$dato->pulso_d}}</td>
                                <td>{{$dato->ruffiel}}</td>
                                <td>{{$dato->leyenda}}</td>
                                <td>{{$dato->mvo}}</td>
                                <td>{{$dato->mvoreal}}</td>
                                    <td>{{$dato->mvodiagnostico}}</td>
                                <th>{{$dato->fecha_de_ingreso}}</th>
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
                        <td colspan="9" style="text-align: center">No hay medidas ingresados</td>
                    @endif

                    </tbody>
                </table>
                <div class="border-top my-3"></div>
                @if($datos->count()>10)
                    <div class="panel">
                        {{ $datos->links() }}
                    </div>
                @endif
            </div>
        </div>
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



@endsection