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

    <div class="w3-container w3-teal mx-5"  >

        <div class="card">

            <h2 style="all: revert" >Ruffier</h2>

            <div>
                <H2> Expediente Estudiante</H2>
                <h5>Nombre: {{$cliente->nombre}}</h5>

            </div>
        </div>
    </div>
    <br><br>

    <div class="w3-container w3-teal mx-5"  >

        <div class="card" style="-moz-box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);
box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);">
            <nav class="navbar navbar-expand-lg navbar-light bg-light ">

                <!-- Brand -->
                <a class="navbar-brand" href="{{route("pagoestudiantes",["id"=>$cliente->id])}}">Pagos</a>
                <a class="navbar-brand" href="{{route("imc.ini",[$cliente->id])}}">Imc</a>
                <a class="navbar-brand" href="{{route("grasa.uni",["id"=>$cliente->id])}}">Grasa</a>
                <a class="navbar-brand" href="{{route("ruffier.uni",["id"=>$cliente->id])}}">Ruffier</a>


                <!-- Toggler/collapsibe Button -->

            </nav>
            <button class="btn btn-primary my-8 mb-2 mr-1 float-right" style="height: 40px; width: 100px" type="button">
                <a href="{{route("botonruffier",["id"=>$cliente->id])}}" style="color: white">Nuevo</a>

            </button>
            <div class="table-responsive mb-5" >
                <table class="table ruler-vertical table-hover mx-sm-0 ">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Pulso en reposo</th>
                        <th scope="col">Pulso en acción</th>
                        <th scope="col">Pulso en descanso</th>
                        <th scope="col">Ruffier</th>
                        <th scope="col">Clasificacion</th>
                        <th scope="col">MVO2</th>
                        <th scope="col">MVOReal</th>
                        <th scope="col">Acciones</th>

                    </tr>
                    </thead>

                    <tbody>

                    <tr>
                        @if($datos->count()>0)
                            @foreach($datos as $dato)
                                <th>{{$dato->fecha_de_ingreso}}</th>
                                <td>{{$dato->pulso_r}}</td>
                                <td>{{$dato->pulso_a}}</td>
                                <td>{{$dato->pulso_d}}</td>
                                <td>{{$dato->ruffiel}}</td>
                                <td>{{$dato->clasificacion}}</td>
                                <td>{{$dato->mvo2}}</td>
                                <td>{{$dato->mvoreal}}</td>
                                <td class="form-inline ">
                                    <button class="btn btn-warning mr-xl-2 "><a
                                                href="{{route('ruffier.editar',[$dato->id,$dato->id_cliente])}}"><i
                                                    class="fas fa-edit"></i></a></button>
                                    <form method="post" action="{{route('ruffier.borrar', $dato->id)}}"
                                          class="pull-left"
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