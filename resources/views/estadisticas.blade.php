@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
        </div>
    </header>

    <div class="w3-container w3-teal mx-5" style="font-family: 'Raleway', sans-serif">
            <h2 class="h3centrado  mt-3" >Lista De Todos Los Clientes</h2>

            <form class="form-inline" method="get" action="{{route('cliente.buscarCliente')}}">

                <div class="form-group mr-sm-4 my-sm-4 ">
                    <input type="text" class="form-control" id="inputText2" placeholder="Buscar" name="busquedaCliente">
                </div>
                <button type="submit" class="btn btn-primary my-4 ">Buscar</button>
            </form>
            <table class="table  mx-sm-0" style="-moz-box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);
box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Numero de Cuenta</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Carrera o profesion u oficio</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Tipo de Cliente</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @if($clientes->count()>0)
                    @foreach($clientes as $estudiante)
                        <tr>
                            <td>{{$estudiante->nombre}}</td>
                            <td>{{$estudiante->identificacion}}</td>
                            <td>{{$estudiante->edad}}</td>
                            @if($estudiante->id_tipo_cliente ==1)
                                <td>{{$estudiante->carrera}}</td>
                            @else
                                <td>{{$estudiante->profesion_u_oficio}}</td>
                            @endif

                            @if($estudiante->telefono == null)
                                <td style="text-align: center"> ----</td>
                            @else
                                <td>{{$estudiante->telefono}}</td>
                            @endif

                            <td>{{$estudiante->descripcion}}</td>
                            <td>{{$estudiante->fecha_de_ingreso}}</td>
                            <td>
                                <button type="button" class="btn btn-secondary btn-sm">Ver Estadística</button>
                                <a  href="{{route("imc.ini",$estudiante->id)}}" ></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" style="text-align: center">No hay estudiantes ingresados</td>
                @endif
                </tbody>
            </table>
            <div class="border-top my-3"></div>

            @if($clientes->count()>10)
                <div class="panel">
                    {{ $clientes->links() }}
                </div>
            @endif
    </div>

@endsection
