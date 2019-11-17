@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
            <!--div class="intro-text">
                <div class="intro-lead-in">Estudiantes</div>
            </div-->
        </div>
    </header>

    <div class="w3-container w3-teal mx-5" style="font-family: 'Raleway', sans-serif">
        <h2 class="h3centrado  mt-3">Listado de Estudiantes</h2>


        <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                data-target="#exampleModalScrollable">
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
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Registro Estudiantes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <form method="post" action="{{route('estudiante.guardar')}}">


                            <h6>Nombre Completo</h6>
                            <div class="form-group">
                                <input type="text" class="form-control solo-letras" id="nombre" name="nombre"
                                       required>
                            </div>

                            <h6>Edad</h6>
                            <div class="form-group">
                                <input type="text" pattern="([0-9]{1,3})" class="form-control" id="edad" name="edad"
                                       aria-valuemax="2"
                                       title="Ingresa solo numeros entre 1 a 99 años"
                                       required
                                       minlength="1" maxlength="2" min="1" max="99">
                            </div>

                               <div class="form-row">
                               <div class="form-group col-md-6">
                            <h6>Número Cuenta</h6>
                                <input type="text" pattern="([0-9]{1,11})" class="form-control" id="identificacion"
                                       name="identificacion"
                                       title="Ingrese solo números"
                                       required
                                       minlength="1" maxlength="11" aria-valuemax="11" max="99999999999">
                               </div>

                            <h6>Carrera</h6>
                            <div class="form-group">
                                <select class="form-control" id="carrera" name="carrera"
                                        required>
                                    @foreach($carreras as $carrera)
                                        <option value="{{$carrera->id}}">{{$carrera->carrera}}</option>
                                    @endforeach


                                </select>
                            </div>


                            <h6> Teléfono </h6>
                            <div class="form-group">
                                <input type="text" pattern="([0-9]{1,8})" class="form-control" id="telefono"
                                       name="telefono"
                                       title="Ingrese solo números"
                                       required
                                       maxlength="8" minlength="1" aria-valuemax="8" max="99999999">
                            </div>


                            <h6>Sexo</h6>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="genero" id="sexo1" value="M"
                                       required>Masculino
                                <label class="form-check-label" for="inlineRadio1"></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="genero" id="sexo2" value="F"
                                       required>Femenino
                                <label class="form-check-label" for="inlineRadio2"></label>
                            </div>


                            <h6>Fecha</h6>
                            <div class="form-group">
                                <input type="date" class="form-control" id="fecha_de_ingreso" name="fecha_de_ingreso"
                                       required>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>

                            </div>
                               </div>
                        </form>

                </div>


                </div>
            </div>
        </div>


        <form class="form-inline" method="get" action="{{route('estudiante.buscar')}}">


            <div class="form-group mr-sm-4 my-sm-4 ">
                <input type="text" class="form-control" id="inputText2" name="busqueda"
                       placeholder="Buscar">
            </div>
            <button type="submit" class="btn btn-primary my-4 ">Buscar</button>
        </form>

        @if(session("exito"))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('exito') }}
            </div>

        @endif

        <div class="modal fade" id="editarEstudiante" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalScrollableTitle">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Editar Estudiantes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <form method="post" action="{{route('estudiante.update')}}">
                            <input type="hidden" name="estudiante_id" id="id" value="">

                            {{method_field('put')}}

                            <h6>Nombre Completo</h6>
                            <div class="form-group">
                                <input type="text" class="form-control solo-letras" id="nombre" name="nombre"
                                       @isset($estudiante)
                                       value="{{$estudiante->nombre}}"
                                       @endisset value="{{old('nombre')}}">

                            </div>


                            <h6>Edad</h6>
                            <div class="form-group">
                                <input type="text" pattern="([0-9]{1,3})" class="form-control" id="edad" name="edad"
                                       @isset($estudiante)
                                       value="{{$estudiante->edad}}"
                                       @endisset value="{{old('edad')}}"
                                       title="Ingresa solo numeros entre 1 a 99 años"
                                       required
                                       minlength="1" maxlength="2" min="1" max="99"
                                >
                            </div>

                            <h6>Número Cuenta</h6>
                            <div class="form-group">
                                <input type="text" pattern="([0-9]{1,11})" class="form-control" id="identificacion"
                                       name="identificacion"
                                       @isset($estudiante)
                                       value="{{$estudiante->identificacion}}"
                                       @endisset value="{{old('identificacion')}}"
                                       title="Ingrese solo números"
                                       required
                                       minlength="1" maxlength="11" aria-valuemax="11" max="99999999999"
                                >
                            </div>

                            <h6>Carrera</h6>
                            <div class="form-group">
                                <select class="form-control" id="carrera" placeholder="seleccione" name="carrera"
                                        required>
                                    @foreach($carreras as $carrera)
                                        <option value="{{$carrera->id}}">{{$carrera->carrera}}</option>
                                    @endforeach

                                </select>
                            </div>


                            <h6> Teléfono </h6>
                            <div class="form-group">
                                <input input="text" pattern="([0-9]{1,8})" class="form-control" id="telefono"
                                       name="telefono"

                                       @isset($estudiante)
                                       value="{{$estudiante->telefono}}"
                                       @endisset value="{{old('telefono')}}"
                                       title="Ingrese solo números"
                                       required
                                       maxlength="8" minlength="1" aria-valuemax="8" max="99999999"
                                >
                            </div>


                            <h6>Sexo</h6>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="genero" id="sexo1" value="M" required
                                       @isset($estudiante)
                                       value="{{$estudiante->sexo1}}"
                                       @endisset value="{{old('sexo1')}}"
                                >Masculino
                                <label class="form-check-label" for="inlineRadio1"></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="genero" id="sexo2" value="F" required
                                       @isset($estudiante)
                                       value="{{$estudiante->sexo2}}"
                                       @endisset value="{{old('sexo2')}}"
                                >Femenino
                                <label class="form-check-label" for="inlineRadio2"></label>
                            </div>

                            <h6>Fecha</h6>
                            <div class="form-group">
                                <input type="date" class="form-control" id="fecha_de_ingreso" name="fecha_de_ingreso"
                                       required
                                       @isset($estudiante)
                                       value="{{$estudiante->fecha_de_ingreso}}"
                                       @endisset value="{{old('fecha_de_ingreso')}}"

                                >
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


        <div class="table-responsive mb-5" style="-moz-box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);
box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);">
            <table class="table ruler-vertical table-hover mx-sm-0 ">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Número de Cuenta</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Fecha de Ingreso</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @if($estudiantes->count()>0)
                    @foreach($estudiantes as $estudiante)

                        <tr>
                            <td>{{$estudiante->nombre}}</td>
                            <td>{{$estudiante->identificacion}}</td>
                            <td>{{$estudiante->carrera}}</td>
                            <td>{{$estudiante->telefono}}</td>
                            <td>{{$estudiante->genero}}</td>
                            <td>{{$estudiante->edad}}</td>
                            <td>{{$estudiante->fecha_de_ingreso}}</td>
                            <div style="overflow: auto"></div>


                            <td class="form-inline " style="width: 300px">
                                <form style="display: none" id="pago_form" method="GET"
                                      action="{{route("pagoestudiantes",["id"=>$estudiante->id])}}">
                                    <input name="id_cliente" value="{{$estudiante->id}}" type="hidden">
                                    {{ csrf_field() }}
                                </form>

                                <button class="btn btn-warning mr-xl-2" data-toggle="modal"
                                        data-target="#editarEstudiante" data-mynombre="{{$estudiante->nombre}}"
                                        data-myedad="{{$estudiante->edad}}"
                                        data-mycuenta="{{$estudiante->identificacion}}"
                                        data-myfecha="{{$estudiante->fecha_de_ingreso}}"
                                        data-mytelefono="{{$estudiante->telefono}}"
                                        data-mycarrera="{{$estudiante->id_carrera}}"
                                        data-catid="{{$estudiante->id}}" data-sexo="{{$estudiante->genero}}"><i
                                            class="fas fa-edit"></i></button>

                                <form method="post" action="{{route('estudiante.borrar', $estudiante->id)}}"
                                      onclick="return confirm('Estas seguro que deseas eliminar al estudiante? ')">
                                    <button class="btn btn-danger mr-xl-2 "><i class="fas fa-trash-alt"></i>
                                    </button>
                                    {{method_field('delete')}}
                                </form>


                                <button class="btn btn-info mr-xl-2 " type="button">
                                    <a href="{{route("imc.ini",$estudiante->id)}}" style="color: white">Medidas</a>

                                </button>


                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <button class="dropdown-item" type="button"><a
                                                class="nav-link js-scroll-trigger"
                                                href="{{route("imc.ini",$estudiante->id)}}">Imc</a>
                                    </button>
                                    <button class="dropdown-item" type="button"><a
                                                class="nav-link js-scroll-trigger"
                                                href="{{route("grasa.uni",["id"=>$estudiante->id])}}">Grasa
                                            Corporal</a>
                                    </button>
                                    <button class="dropdown-item" type="button"><a
                                                class="nav-link js-scroll-trigger"
                                                href="{{route("ruffier.uni",["id"=>$estudiante->id])}}">Ruffier</a>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" style="text-align: center">No hay estudiantes ingresados</td>
                @endif


                </tbody>
            </table>

            <div class="border-top my-3"></div>

            @if($estudiantes->count()>10)
                <div class="panel">
                    {{ $estudiantes->links() }}
                </div>
            @endif

        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
