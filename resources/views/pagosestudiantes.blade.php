@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
        </div>
    </header>

    <div class="w3-container w3-teal mx-5">

        <div class="card">

            <h2 style="all: revert">Pagos</h2>

            <div>

                <H2> Expediente Estudiante</H2>
                <h5>Nombre: {{$nombre->nombre}}</h5>

            </div>
        </div>
    </div>
    <br><br>
    <div class="btn-group " style="margin-left: 50px;" role="group" aria-label="Button group with nested dropdown">

        <a class="btn btn-primary" href="{{route("pagoestudiantes",["id"=>$nombre->id])}}">Pagos</a>
        <a class="btn btn-secondary" href="{{route("imc.ini",[$nombre->id])}}">Imc</a>
        <a class="btn btn-secondary" href="{{route("grasa.uni",["id"=>$nombre->id])}}">Grasa</a>
        <a class="btn btn-secondary" href="{{route("ruffier.uni",["id"=>$nombre->id])}}">Ruffier</a>

    </div>

    <div class=" w3-container w3-teal mx-5">


        <button class="btn btn-danger float-right" data-toggle="modal" data-target="#exampleModalScrollable2" >
            <i class="fas fa-dollar-sign"></i> Agregar pago </button>


        <div class="modal fade" id="exampleModalScrollable2" tabindex="-1" role="dialog"
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
                            <h6>Mes</h6>
                            <div class="form-group">
                                <select class="form-control" name="mes" id="carrera" placeholder="seleccione">
                                    <option></option>
                                    <option>Enero</option>
                                    <option>Febrero</option>
                                    <option>Marzo</option>
                                    <option>Abril</option>
                                    <option>Mayo</option>
                                    <option>Junio</option>
                                    <option>Julio</option>
                                    <option>Agosto</option>
                                    <option>Septiembre</option>
                                    <option>Obtubre</option>
                                    <option>Noviembre</option>
                                    <option>Diciembre</option>
                                </select>
                            </div>
                            <h6>Fecha</h6>
                            <div class="form-group">
                                <input type="date" class="form-control" id="fecha" name="fecha_pago"

                                >
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

        <div class="table-responsive mb-5"  style="-moz-box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);
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
                                <i class="fas fa-edit" ></i></button>
                            <form method="post" action="{{route('pagoestudiante.borrar', $user->id)}}"
                                  onclick="return confirm('Estas seguro que deseas eliminar este pago? ')">
                                <button class="btn btn-danger mr-xl-2 "><i class="fas fa-trash-alt"></i></button>
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

    </div>
@endsection



