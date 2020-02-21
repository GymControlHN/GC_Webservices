@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
        </div>
    </header>

    <div class="w3-container w3-teal mx-5" style="font-family: 'Raleway', sans-serif">
            <h2 class=" mt-3" >Listado de todos los clientes</h2>



        <form class="form-inline" method="get" action="{{route('cliente.buscarCliente')}}">

            <div class="form-group mr-sm-4 my-sm-4 ">
                <input type="text" class="form-control" id="inputText2" placeholder="Buscar" name="busquedaCliente">
            </div>
            <button type="submit" class="btn btn-primary my-3 ">Buscar</button>
        </form>
        <div class="table-responsive mt-4"  style="-moz-box-shadow: 0px 5px 3px 3px rgba(194,194,194,1);
box-shadow: 0px 5px 3px 3px rgba(194,194,194,1);">
            <table class="table ruler-vertical table-hover mx-sm-0 ">
            <thead class="thead-dark">
            <tr>
                <th >N°</th>
                <th scope="col">Nombre</th>
                <th scope="col">Identificación</th>
                <th scope="col">Edad</th>
                <th scope="col">Carrera o Profesión u Oficio</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Tipo de Cliente</th>
                <th scope="col">Fecha</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>

            <tbody>
            @if($clientes->count()>0)
                @foreach($clientes as $estudiante)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$estudiante->nombre}}</td>
                        <td>{{$estudiante->identificacion}}</td>
                        <td>{{$estudiante->edad}}</td>
                        @if($estudiante->id_tipo_cliente ==1)
                            <td>{{$estudiante->carrera }}</td>
                        @else
                            <td>{{$estudiante->profesion_u_oficio}}</td>
                        @endif

                        @if($estudiante->telefono == null)
                            <td style="text-align: center"> ----</td>
                        @else
                            <td>{{$estudiante->telefono}}</td>
                        @endif

                        <td>{{$estudiante->descripcion}}</td>
                        <td>{{date("Y-m-d",strtotime($estudiante->created_at))}}</td>
                        <td>
                            <a class="btn btn-info mr-xl-2 "
                               href="{{route("estadistica.ver",["id"=>$estudiante->id])}}">
                                Ver Estadística
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8" style="text-align: center">No hay clientes ingresados</td>
            @endif
            </tbody>
        </table>

        </div>
    </div>

@endsection
