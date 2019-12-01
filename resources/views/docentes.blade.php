@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
        </div>
    </header>

    <div class="w3-container w3-teal mx-5" style="font-family: 'Raleway', sans-serif">
            <h2 class=" mt-3">Listado de Docentes</h2>




            <button type="button" class="btn btn-primary float-right " id="crearNuevo" data-toggle="modal" data-target="#exampleModalScrollable">
                <i class="fas fa-user-plus"></i>
            </button>

            <!--button type="button"  class="btn btn-warning float-right" data-dismiss="alert"
                    data-toggle="modal" data-target="#exampleModalScrollable">

            </button-->
        @if(session("errors"))
            <script>
                document.onreadystatechange= function () {

                    if(document.readyState==="complete"){
                        document.getElementById("crearNuevo").click();
                    }
                };

            </script>
        @endif
        <script>
            function limpiarDatosModal() {
                document.getElementById("nombre").value='';
                document.getElementById("edad").value='';
                document.getElementById("identificacion").value='';
                document.getElementById("profesion_u_oficio").value='';
                document.getElementById("telefono").value='';
                document.getElementById("sexo1").checked=false;
                document.getElementById("sexo2").checked=false;



            }
        </script>

            <div class="modal fade  bd-example-modal-lg" id="exampleModalScrollable" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">Registro de Docentes</h5>
                            <button type="button" onclick="limpiarDatosModal()" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form method="post" action="{{route('docente.guardar')}}">


                                <div class="form-row">
                                    <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }} col-md-6">
                                    <h6>Nombre Completo</h6>
                                    <input type="text" class="form-control solo-letras" id="nombre" name="nombre"
                                           required
                                           value="{{old("nombre")}}"
                                    >
                                        @if ($errors->has('nombre'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                        @endif

                                </div>


                                    <div class="form-group{{ $errors->has('profesion_u_oficio') ? ' has-error' : '' }} col-md-6">
                                        <h6>Profesión</h6>
                                    <input type="text" class="form-control solo-letras" id="profesion_u_oficio" name="profesion_u_oficio"
                                           required
                                           value="{{old("profesion_u_oficio")}}"
                                    >
                                        @if ($errors->has('profesion_u_oficio'))
                                            <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('profesion_u_oficio') }}</strong>
                                    </span>
                                        @endif
                                </div>
                                </div>


                                <div class="form-row">
                                    <div class="form-group{{ $errors->has('edad') ? ' has-error' : '' }}  col-md-6">
                                    <h6>Edad</h6>
                                    <input type="text"  pattern="([0-9]{1,3})" class="form-control" id="edad" name="edad"
                                           title="Ingrese solo números entre 1 a 99 años"

                                           required
                                           minlength="1" maxlength="2" min="1" max="99"
                                           value="{{old("edad")}}"
                                    >
                                        @if ($errors->has('edad'))
                                            <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('edad') }}</strong>
                                    </span>
                                        @endif
                                </div>

                                <div class="form-group{{ $errors->has('identificacion') ? ' has-error' : '' }} col-md-6">
                                    <h6>Número de Empleado</h6>
                                    <input type="text" pattern="([0-9]{1,5})" class="form-control" id="identificacion" name="identificacion"
                                           title="Ingrese solo números"
                                            required
                                           value="{{old("identificacion")}}"
                                           minlength="1" maxlength="5" min="1" max="99999"
                                    >
                                    @if ($errors->has('identificacion'))
                                        <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('identificacion') }}</strong>
                                    </span>
                                    @endif
                                </div>
                             </div>

                                <div class="form-row">
                                    <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }} col-md-6">
                                <h6> Teléfono </h6>
                                    <input type="text" pattern="([0-9]{1,8})" class="form-control" id="telefono" name="telefono"
                                           title="Ingrese solo números"
                                           required
                                           maxlength="8" minlength="1" aria-valuemax="8" max="99999999"
                                           value="{{old("telefono")}}"

                                    >
                                        @if ($errors->has('telefono'))
                                            <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h6>Fecha</h6>
                                        <div class="form-group">
                                            <input type="date" class="form-control"
                                                   value="{{date("Y-m-d")}}"
                                                   readonly
                                                   id="fecha_de_ingreso" name="fecha_de_ingreso"
                                                   required
                                            >
                                        </div>
                                    </div>
                                </div>


                                    <div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }} col-md-6">
                                <h6>Sexo</h6>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="genero" id="sexo1" value="M"
                                           @if(old("genero")==='M')
                                           checked
                                            @endif
                                           required>
                                    <label style="color:black; margin-top: 5px"  for="sexo1">Masculino</label>

                                    <label class="form-check-label" for="inlineRadio1"></label>
                                </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="genero" id="sexo2" value="F"
                                                   @if(old("genero")==='F')
                                                   checked
                                                   @endif
                                                   required>
                                            <label style="color:black; margin-top: 5px"  for="sexo2">Femenino</label>
                                            <label class="form-check-label" for="inlineRadio2"></label>
                                        </div>
                                    </div>





                        <div class="modal-footer">
                                <button type="button" onclick="limpiarDatosModal()" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                <button type="submit"  class="btn btn-primary">Guardar</button>

                            </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


        <form class="form-inline" method="get" action="{{route('docente.buscarDoc')}}">

            <div class="form-group mr-sm-4 my-sm-4 ">
                <input type="text" class="form-control mb-3" name="busquedaDoc"
                       id="inputText2" placeholder="Buscar">
            </div>
            <button type="submit" class="btn btn-primary mb-3 ">Buscar</button>
        </form>

        @if(session("exito"))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button"  class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('exito') }}
            </div>

        @endif




        @if(session("error"))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" id="crearNuevo" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('error') }}
            </div>

        @endif

        @if(session("errors"))
            <script>
                document.onreadystatechange= function () {

                    if(document.readyState==="complete"){
                        document.getElementById("crearNuevo").click();
                    }
                };

            </script>
        @endif

        <div class="modal fade  bd-example-modal-lg" id="editarDocente" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Registro de Docentes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <form method="post" action="{{route('docente.update')}}">
                            <input type="hidden" name="docente_id" id="id" value="">
                            {{method_field('put')}}

                            <div class="form-row">
                                <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }} col-md-6">
                            <h6>Nombre Completo</h6>
                                <input type="text" class="form-control solo-letras" id="nombre" name="nombre"
                                       value="{{old("nombre")}}"
                                       @isset($docente)
                                       value="{{$docente->nombre}}"
                                       @endisset value="{{old('nombre')}}"
                                       required
                                >
                                    @if ($errors->has('nombre'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                    @endif

                            </div>

                            <div class="form-group{{ $errors->has('edad') ? ' has-error' : '' }} col-md-6">
                            <h6>Edad</h6>
                                <input type="text"  pattern="([0-9]{1,3})"  class="form-control" id="edad" name="edad"
                                       value="{{old("edad")}}"
                                       @isset($docente)
                                       value="{{$docente->edad}}"
                                       @endisset value="{{old('edad')}}"
                                       title="Ingrese solo números entre 1 a 99 años"
                                       required
                                       minlength="1" maxlength="2" min="1" max="99"
                                >
                                @if ($errors->has('edad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('edad') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group{{ $errors->has('identificacion') ? ' has-error' : '' }} col-md-6">
                            <h6>Número de Empleado</h6>
                                <input type="text"  pattern="([0-9]{1,5})"  class="form-control" id="identificacion" name="identificacion"
                                       value="{{old("identificacion")}}"
                                       @isset($docente)
                                       value="{{$docente->numero_de_empleado}}"
                                       @endisset value="{{old('identificacion')}}"
                                       title="Ingrese solo números "
                                       required
                                       minlength="1" maxlength="5" min="1" max="99999"

                                >
                                    @if ($errors->has('identificacion'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('identificacion') }}</strong>
                                    </span>
                                    @endif
                            </div>

                                <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }} col-md-6">
                            <h6> Teléfono </h6>
                                <input type="text" pattern="([0-9]{1,8})" class="form-control" id="telefono" name="telefono"
                                       value="{{old("telefono")}}"
                                       @isset($docente)
                                       value="{{$docente->telefono}}"
                                       @endisset value="{{old('telefono')}}"
                                       title="Ingrese solo números"
                                       required
                                       maxlength="8" minlength="1" aria-valuemax="8" max="99999999"
                                >
                                    @if ($errors->has('telefono'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                    @endif
                            </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group{{ $errors->has('profesion_u_oficio') ? ' has-error' : '' }} col-md-6">
                                <h6>Profesión</h6>
                                    <input type="text" class="form-control solo-letras" id="profesion_u_oficio" name="profesion_u_oficio"
                                           value="{{old("profesion_u_oficio")}}"
                                           @isset($docente)
                                           value="{{$docente->profesion_u_oficio}}"
                                           @endisset value="{{old('profesion_u_oficio')}}"
                                           required
                                    >
                                    @if ($errors->has('profesion_u_oficio'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('profesion_u_oficio') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                <h6>Fecha</h6>
                                    <input type="date" class="form-control" id="fecha_de_ingreso" name="fecha_de_ingreso"
                                           @isset($docente)
                                           value="{{$docente->fecha_de_ingreso,$now->format('Y-m-d')}}"
                                           @endisset value="{{old('fecha_de_ingreso')}}"
                                           required
                                           readonly
                                    >
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }} col-md-6">
                            <h6>Sexo</h6>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="genero" id="sexo1D" value="M" required
                                       @isset($docente)
                                       value="{{$docente->sexo1}}"
                                       @endisset value="{{old('sexo1')}}"
                                       @if(old("genero")==='M')
                                       checked
                                        @endif
                                >
                                <label style="color:black; margin-top: 5px"  for="sexo1D">Masculino</label>

                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="genero" id="sexo2D" value="F" required
                                       @isset($docente)
                                       value="{{$docente->sexo2}}"
                                       @endisset value="{{old('sexo2')}}"
                                       @if(old("genero")==='F')
                                       checked
                                        @endif
                                >
                                <label style="color:black; margin-top: 5px"  for="sexo2D">Femenino</label>
                                <label class="form-check-label" for="inlineRadio2"></label>
                            </div>
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



        <div class="table-responsive mb-5" style="-moz-box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);
box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);">
            <table class="table ruler-vertical table-hover mx-sm-0 ">
                <thead class="thead-light">
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Id de Empleado</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Sexo</th>

                    <th scope="col">Profesión</th>
                    <th scope="col">Fecha de Ingreso</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @if($docentes->count()>0)
                    @foreach($docentes as $docente)
                <tr>
                    <td></td>
                    <td>{{$docente->nombre}}</td>
                    <td>{{$docente->identificacion}}</td>
                    <td>{{$docente->edad}}</td>
                    <td>{{$docente->telefono}}</td>
                    <td>{{$docente->genero}}</td>
                    <td>{{$docente->profesion_u_oficio}}</td>

                    <td>{{$docente->fecha_de_ingreso}}</td>
                    <div  style="overflow: auto"></div>

                    <td class="form-inline">

                        <button class="btn btn-warning  mr-2" data-toggle="modal" data-target="#editarDocente" data-mynombre="{{$docente->nombre}}" data-myedad="{{$docente->edad}}"
                                data-mynumero="{{$docente->identificacion}}" data-myfecha="{{$docente->fecha_de_ingreso}}" data-myprofesion="{{$docente->profesion_u_oficio}}"
                                data-mytelefono="{{$docente->telefono}}" data-catid="{{$docente->id}}" data-sexo="{{$docente->genero}}"><i class="fas fa-edit"></i></button>

                        <button class="btn btn-danger mr-xl-2 "
                                data-id="{{$docente->id}}"
                                data-nombre="{{$docente->nombre}}"
                                data-toggle="modal"
                                data-target="#modalBorrarDocente"><i class="fas fa-trash-alt"></i>
                        </button>
                        <button class="btn btn-info mr-xl-2 " type="button">
                            <a href="{{route("imc.ini",$docente->id)}}" style="color: white">Expediente</a>

                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item" type="button"><a class="nav-link js-scroll-trigger" href="{{route("imc.ini",$docente->id)}}">Imc</a></button>
                            <button class="dropdown-item" type="button"><a class="nav-link js-scroll-trigger" href="{{route("grasa.uni",["id"=>$docente->id])}}">Grasa Corporal</a></button>
                            <button class="dropdown-item" type="button"><a class="nav-link js-scroll-trigger" href="/ruffiel">Ruffiel</a></button>
                        </div>
                    </td>
                </tr>


@endforeach
                @else
                    <tr>
                        <td colspan="9" style="text-align: center">No hay docentes ingresados</td>

                @endif

                </tbody>
            </table>
            <div class="border-top my-3"></div>
            @if($docentes->count()>10)
                <div class="panel">
                    {{ $docentes->links() }}
                </div>
            @endif
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
    <div class="modal fade" tabindex="-1" role="dialog" id="modalBorrarDocente">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Atención Eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('docente.borrar')}}">
                    {{method_field('delete')}}

                    <div class="modal-body">
                        <input name="id" id="id" type="hidden">

                        <div>¿Está seguro que desea borrar a <label style="color: black;font-weight: bold" id="nombreBorrar"></label> ?</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection