@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Docentes</div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="alert alert-dismissable mb-n4" role="alert">
            <h2 style="all: revert">Listado de Docentes</h2>




            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalScrollable">
                <i class="fas fa-user-plus"></i>
            </button>

            <!--button type="button"  class="btn btn-warning float-right" data-dismiss="alert"
                    data-toggle="modal" data-target="#exampleModalScrollable">

            </button-->

            <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">Registro de Docentes</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form method="post" action="{{route('docente.guardar')}}">

                                <h6>Nombre Completo</h6>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nombre" name="nombre" required
                                           @isset($docente)
                                           value="{{$docente->nombre}}"
                                            @endisset
                                    >

                                </div>

                                <h6>Edad</h6>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="edad" name="edad" required
                                           @isset($docente)
                                           value="{{$docente->edad}}"
                                            @endisset
                                    >
                                </div>
                                <h6>Número de Empleado</h6>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="numero_de_empleado" name="numero_de_empleado" required
                                           @isset($docente)
                                           value="{{$docente->numero_de_empleado}}"
                                            @endisset
                                    >
                                </div>


                                <h6> Teléfono </h6>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="telefono" name="telefono" required
                                           @isset($docente)
                                           value="{{$docente->telefono}}"
                                            @endisset
                                    >
                                </div>

                                <h6>Fecha</h6>
                                <div class="form-group">
                                    <input type="date" class="form-control" id="fecha_de_ingreso" name="fecha_de_ingreso" required
                                           @isset($docente)
                                           value="{{$docente->fecha_de_ingreso}}"
                                            @endisset
                                    >
                                </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                <button type="submit"  class="btn btn-primary">Guardar</button>

                            </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <! -- modal editar -->

            <div class="modal fade" id="edit" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">Registro de Docentes</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <form method="post" action="{{route('docente.update' , 'docentes')}}">

                                {{method_field('put')}}

                                <h6>Nombre Completo</h6>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nombre" name="nombre" required
                                           @isset($docente)
                                           value="{{$docente->nombre}}"
                                            @endisset
                                    >

                                </div>

                                <h6>Edad</h6>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="edad" name="edad" required
                                           @isset($docente)
                                           value="{{$docente->edad}}"
                                            @endisset
                                    >
                                </div>
                                <h6>Número de Empleado</h6>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="numero_de_empleado" name="numero_de_empleado" required
                                           @isset($docente)
                                           value="{{$docente->numero_de_empleado}}"
                                            @endisset
                                    >
                                </div>


                                <h6> Teléfono </h6>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="telefono" name="telefono" required
                                           @isset($docente)
                                           value="{{$docente->telefono}}"
                                            @endisset
                                    >
                                </div>

                                <h6>Fecha</h6>
                                <div class="form-group">
                                    <input type="date" class="form-control" id="fecha_de_ingreso" name="fecha_de_ingreso" required
                                           @isset($docente)
                                           value="{{$docente->fecha_de_ingreso}}"
                                            @endisset
                                    >
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                    <button type="submit"  class="btn btn-primary">Guardar</button>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

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
                    <th scope="col">Numero de Empleado</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Fecha de Ingreso</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($docentes as $docente)
                <tr>

                    <td>{{$docente->nombre}}</td>
                    <td>{{$docente->numero_de_empleado}}</td>
                    <td>{{$docente->telefono}}</td>
                    <td>{{$docente->edad}}</td>
                    <td>{{$docente->fecha_de_ingreso}}</td>

                    <td class="form-inline">
                        <button class="btn btn-secondary"><i class="fas fa-eye"></i></button>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit" data-mynombre="{{$docente->nombre}}" data-myedad="{{$docente->edad}}"
                                data-mynempleado="{{$docente->numero_de_empleado}}" data-myfecha="{{$docente->fecha_de_ingreso}}"
                                data-mytelefono="{{$docente->telefono}}" data-mycarrera="{{$docente->carrera}}"><i class="fas fa-edit"></i></button>
                        <form method="post" action="{{route('docente.borrar', $docente->id)}}" onclick="return confirm('Estas seguro que deseas eliminar al docente? ')">
                        <button class="btn btn-danger "><i class="fas fa-trash-alt"></i></button>
                            {{method_field('delete')}}
                        </form>
                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Medidas
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item" type="button"><a class="nav-link js-scroll-trigger" href="/imc">Imc</a></button>
                            <button class="dropdown-item" type="button"><a class="nav-link js-scroll-trigger" href="/grasa">Grasa Corporal</a></button>
                            <button class="dropdown-item" type="button"><a class="nav-link js-scroll-trigger" href="/ruffiel">Ruffiel</a></button>
                        </div>
                    </td>
                </tr>

@endforeach


                </tbody>
            </table>
        {{ $docentes->links() }}
            <!--nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Siguiente</a>
                    </li>
                </ul>
            </nav-->

        </div>
    </div>

@endsection