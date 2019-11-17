@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Estudiantes</div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="alert alert-dismissable mb-n4" role="alert">
            <h2 style="all: revert">Datos fisicos</h2>
            <h5>Nombre: {{$cliente->nombre}}</h5>


            <div class="table  mx-sm-0" style="-moz-box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);
        box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);">
                <table class="table ruler-vertical table-hover mx-sm-0 ">
                    <thead class="thead-light">
                    <tr>
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
                                <th colspan="4"
                                    style="background-color: #7086f7; color: white;">Registro del año {{ $day }}</th>
                            </tr>
                            @foreach ($users_list as $user)
                                <tr>
                                    <th>{{ $user->mes }}</th>
                                    <th>{{ $user->fecha_pago }}</th>
                                    <th>Cancelado</th>
                                    <th class="form-inline mr-xl-n2 ">

                                        <button class="btn btn-warning mr-xl-1" data-toggle="modal"
                                                data-target="#editarPagosEstudiantes"
                                                data-mymes="{{$user->mes}}" data-myfecha="{{$user->fecha_pago}}"
                                                data-cat_id="{{$user->id}}">
                                            <i class="fas fa-edit"></i></button>
                                        <form method="post" action="{{route('pagoestudiante.borrar', $user->id)}}"
                                              onclick="return confirm('Estas seguro que deseas eliminar este pago? ')">
                                            <button class="btn btn-danger mr-xl-2 "><i class="fas fa-trash-alt"></i>
                                            </button>
                                            {{method_field('delete')}}
                                        </form>
                                    </th>

                                </tr>
                            @endforeach
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" style="text-align: center">No hay pagos ingresados</td>
                    @endif


                    </tbody>
                </table>
            </div>

            <div class="table  mx-sm-0" style="-moz-box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);
        box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);">
                <table class="table ruler-vertical table-hover mx-sm-0">

                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Imc</th>
                        <th scope="col">edad</th>
                        <th scope="col">%Grasa</th>
                        <th scope="col">PC_Tricipital</th>
                        <th scope="col">PC_Infraescupular</th>
                        <th scope="col">PC_Supra_Iliaco</th>
                        <th scope="col">PC_Biciptal</th>
                        <th scope="col">Acciones</th>

                    </tr>
                    </thead>

                    <tbody>
                    @if($grasas->count()>0)
                        @foreach($grasas as $grasa)
                            <tr>
                                <th>{{$grasa->fecha_de_ingreso}}</th>
                                <td>{{$grasa->imc}}</td>
                                <td>{{$grasa->edad}}</td>
                                <td>{{$grasa->grasa}}</td>
                                <th>{{$grasa->pc_tricipital}}</th>
                                <td>{{$grasa->pc_infraescapular}}</td>
                                <td>{{$grasa->pc_supra_iliaco}}</td>
                                <td>{{$grasa->pc_biciptal}}</td>

                            </tr>
                        @endforeach
                    @else
                        <tr>No hay registros de grasas</tr>
                    @endif
                    </tbody>
                </table>
            </div>


        </div>
    </div>

@endsection