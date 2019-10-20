@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
        </div>
    </header>

    <div class="container">
        <div class="alert alert-dismissable mb-n4" role="alert">
            <h2 style="all: revert">Lista De Todos Los Clientes</h2>

            <form  method="post" action="{{route('estadistica.guardar')}}" class="form-inline">

                <div class="form-group mr-sm-4 my-sm-4 ">
                    <input type="text" class="form-control" id="inputText2" placeholder="Buscar">
                </div>
                <button type="submit" class="btn btn-primary my-4 ">Buscar</button>
            </form>
            <table class="table  mx-sm-0" style="-moz-box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);
                box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);">
                <thead class="thead-light">
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Identificación</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Carrera o Profesión</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($estadisticas as $estadistica)
                <tr>

                    <td>{{$estadistica->nombre}}</td>
                    <td>{{$estadistica->numero_de_cuenta}}</td>
                    <td>{{$estadistica->numero_de_empleado}}</td>
                    <td>{{$estadistica->numero_de_identidad}}</td>
                    <td>{{$estadistica->carrera}}</td>
                    <td>{{$estadistica->profesion_u_oficio}}</td>
                    <td>{{$estadistica->telefono}}</td>
                    <td>{{$estadistica->edad}}</td>
                    <td><{{$estadistica->fecha_de_ingreso}}/td>
                    <td>
                        <button type="button" class="btn btn-secondary btn-sm">Ver Estadística</button>
                    </td>
                </tr>

    @endforeach

                </tbody>
            </table>
            {{ $estadisticas->links() }}
        </div>
    </div>

@endsection
