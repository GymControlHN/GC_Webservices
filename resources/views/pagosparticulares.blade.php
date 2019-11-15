@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
        </div>
    </header>

    <div class="w3-container w3-teal mx-5">
        <h3>Registro de pagos mensuales</h3>

        <div>
            <h6>Nombre:  {{$nombre->nombre}}</h6>
        </div>


        <button class="btn btn-danger float-right" data-toggle="modal" data-target="#exampleModalScrollable2">
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
                        <form method="post" action="{{route('pagoparticulares.guardar')}}">
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
                                    <option>Octubre</option>
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
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                <button type="submit"  class="btn btn-primary ">Guardar</button>

                            </div>
                        </form>

                    </div>

                </div>
            </div>

        </div>
        <div class="form-inline">


            <div class="modal fade" id="editarPagosParticulares" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">Editar Pago</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form method="post" action="{{route('pagoparticulares.update')}}">
                                <input type="hidden" name="pagoPart_id" id="id" value="">

                                {{method_field('put')}}

                                <h6>Mes</h6>
                                <div class="form-group">
                                    <select class="form-control" name="mes" id="mes" placeholder="seleccione">
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
                                        <option>Octubre</option>
                                        <option>Noviembre</option>
                                        <option>Diciembre</option>
                                    </select>
                                </div>
                                <h6>Fecha</h6>
                                <div class="form-group">
                                    <input type="date" class="form-control" id="fecha_pago" name="fecha_pago"
                                           @isset($user)
                                           value="{{$user->fecha_pago}}"
                                           @endisset value="{{old('fecha_pago')}}"


                                    >
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                    <button type="submit"  class="btn btn-primary ">Guardar Cambios</button>

                                </div>
                            </form>

                        </div>

                    </div>
                </div>

            </div>
            <form class="form-inline">






            <div class="form-group mr-sm-4 my-sm-4 ">
                <input type="text" class="form-control" id="inputText2" name="busqueda"
                       placeholder="Buscar">
            </div>
            <button type="submit" class="btn btn-primary my-4 "  >Buscar</button>
        </form>






            <div class="table  mx-sm-0" style="-moz-box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);
        box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);">
                <table class="table ruler-vertical table-hover mx-sm-0 " >
                    <thead class="thead-light">
        <div>
            <h1> </h1>
        </div>
        <table class="table  mx-sm-0" style="-moz-box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);
                      box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);">
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
                        style="background-color: #7086f7; color: white;">Registros del año {{ $day }}</th>
                </tr>
                @foreach ($users_list as $user)
                    <tr>
                        <td>{{ $user->mes }}</td>
                        <td>{{ $user->fecha_pago }}</td>
                        <td>Cancelado</td>
                        <th class="form-inline mr-xl-n2 ">
                            <button class="btn btn-warning mr-xl-1"  data-toggle="modal"
                                    data-target="#editarPagosParticulares"
                                    data-mymes="{{$user->mes}}" data-myfecha="{{$user->fecha_pago}}"
                                    data-cat_id="{{$user->id}}">
                                <i class="fas fa-edit"></i></button>
                            <form method="post" action="{{route('pagoparticulares.borrar', $user->id)}}" onclick="return confirm('Estas seguro que deseas eliminar este pago? ')">
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
