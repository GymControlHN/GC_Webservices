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

        <div class="card" style="border: none">



            <div>

                @if($cliente->id_tipo_cliente==3 )

                    <H3> Expediente Particular</H3>
                @endif
                @if($cliente->id_tipo_cliente==2)
                    <H3> Expediente Docente</H3>

                @endif
                @if($cliente->id_tipo_cliente==1)
                    <H3> Expediente Estudiante</H3>
                @endif
                <h3 style="all: revert">Ruffier</h3>
                <h5>Nombre: {{$cliente->nombre}}</h5>
            </div>

        </div>
    </div>
    </div>
    <br><br>
    <div class="btn-group " style="margin-left: 50px;" role="group" aria-label="Button group with nested dropdown">

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
    <br><br>


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
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>

                    </tr>
                    </thead>

                    <tbody>

                    <tr>
                        @if($datos->count()>0)
                            @foreach($datos as $dato)

                                <td>{{$dato->pulso_r}}</td>
                                <td>{{$dato->pulso_a}}</td>
                                <td>{{$dato->pulso_d}}</td>
                                <td>{{$dato->ruffiel}}</td>
                                <td>{{$dato->clasificacion}}</td>
                                <td>{{$dato->mvo2}}</td>
                                <td>{{$dato->mvoreal}}</td>
                                <th>{{$dato->fecha_de_ingreso}}</th>
                                <td class="form-inline ">
                                    <button class="btn btn-warning mr-xl-2 "><a
                                                href="{{route('ruffier.editar',[$dato->id,$dato->id_cliente])}}"><i
                                                    class="fas fa-edit"></i></a></button>
                                    <form method="post" action="{{route('ruffier.borrar', [$dato->id,$dato->id_cliente])}}"
                                          onclick="return confirm('Estas seguro que deseas eliminar la medida? ')">
                                        <button class="btn btn-danger mr-xl-2"><i class="fas fa-trash-alt"></i></button>
                                        {{method_field('delete')}}
                                    </form>
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


@endsection