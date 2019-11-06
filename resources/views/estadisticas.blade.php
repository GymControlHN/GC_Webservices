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

            <form class="form-inline">

                <div class="form-group mr-sm-4 my-sm-4 ">
                    <input type="text" class="form-control" id="inputText2" placeholder="Buscar">
                </div>
                <button type="submit" class="btn btn-primary my-4 ">Buscar</button>
            </form>
            <table class="table  mx-sm-0" style="-moz-box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);
                box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Numero de Cuenta</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>

                <tbody>

                @foreach($estadisticas as $estudiante)
                    <tr>
                        <td>{{$estudiante->nombre}}</td>
                        <td>{{$estudiante->numero_de_cuenta}}</td>
                        <td>{{$estudiante->edad}}</td>
                        <td>{{$estudiante->carrera}}</td>
                        <td>{{$estudiante->telefono}}</td>
                        <td>{{$estudiante->fecha_de_ingreso}}</td>
                        <td>
                            <button type="button" class="btn btn-secondary btn-sm">Ver Estadística</button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            <table class="table  mx-sm-0" style="-moz-box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);
                box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Numero de Empleado</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>

                <tbody>

                @foreach($estadisticas as $docente)
                    <tr>
                        <td>{{$docente->nombre}}</td>
                        <td>{{$docente->numero_de_empleado}}</td>
                        <td>{{$docente->edad}}</td>
                        <td>{{$docente->telefono}}</td>
                        <td>{{$docente->fecha_de_ingreso}}</td>
                        <td>
                            <button type="button" class="btn btn-secondary btn-sm">Ver Estadística</button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            <table class="table  mx-sm-0" style="-moz-box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);
                box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Numero de Identidad</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Profesión U Oficio </th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>

                <tbody>

                @foreach($estadisticas as $particular)
                    <tr>
                        <td>{{$particular->nombre}}</td>
                        <td>{{$particular->numero_de_identidad}}</td>
                        <td>{{$particular->edad}}</td>
                        <td>{{$particular->profesion_u_oficio}}</td>
                        <td>{{$particular->telefono}}</td>
                        <td>{{$particular->fecha_de_ingreso}}</td>
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
