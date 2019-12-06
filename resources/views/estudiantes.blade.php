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


        <h2 class="  mt-3" >Listado de Estudiantes</h2>


        <button type="button" class="btn btn-primary float-right"  id="crearNuevo" data-toggle="modal" data-target="#exampleModalScrollable">
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
                document.getElementById("fecha_nacimiento").value='';
                document.getElementById("identificacion").value='';
                document.getElementById("carrera").value=1;
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
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Registro Estudiantes</h5>
                        <button type="button" class="close" onclick="limpiarDatosModal()" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form method="post" action="{{route('estudiante.guardar')}}" name="f2">

                            <div class="form-row">
                                <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }} col-md-6">
                                    <h6>Nombre Completo</h6>
                                    <input
                                           value="{{old("nombre")}}"
                                           class="form-control solo-letras"   id="nombre" name="nombre"
                                           required
                                    >
                                    @if ($errors->has('nombre'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                    <div class="form-group {{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }} col-md-6">
                                    <h6>Fecha de nacimiento</h6>
                                    <input type="date"  class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"

                                           required
                                           max="{{date("Y-m-d",strtotime("-1825 days"))}}"
                                           value="{{old("fecha_nacimiento")}}">
                                        @if ($errors->has('fecha_nacimiento'))
                                            <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                                    </span>
                                        @endif

                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group{{ $errors->has('identificacion') ? ' has-error' : '' }} col-md-6">
                                    <h6>Número Cuenta</h6>
                                    <input type="text" pattern="([0-9]{1,11})"
                                           class="form-control{{ $errors->has('identificacion') ? ' has-error' : '' }}" id="identificacion"
                                           name="identificacion"
                                           title="Ingrese solo números"
                                           required
                                           value="{{old("identificacion")}}"
                                           minlength="1" maxlength="11" aria-valuemax="11" max="99999999999">

                                    @if ($errors->has('identificacion'))
                                        <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('identificacion') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="form-group {{ $errors->has('carrera') ? ' has-error' : '' }}col-md-6">
                                    <h6>Carrera</h6>
                                    <select class="form-control" id="carrera" name="carrera"
                                            required>
                                        @foreach($carreras as $carrera)
                                            <option value="{{$carrera->id}}"
                                                    {{ old('carrera') == $carrera->id ? "selected" : "" }}>{{$carrera->carrera}}</option>
                                        @endforeach
                                            @if ($errors->has('carrera'))
                                                <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('carrera') }}</strong>
                                    </span>
                                            @endif

                                    </select>
                                </div>
                            </div>



                            <div class="form-row">
                                <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }} col-md-6">
                                    <h6> Teléfono </h6>
                                    <input type="text" pattern="([0-9]{1,8})" class="form-control{{ $errors->has('telefono') ? ' has-error' : '' }}" id="telefono" name="telefono"
                                           title="Ingrese solo números"
                                           required
                                           value="{{old("telefono")}}"
                                           maxlength="8" minlength="1" aria-valuemax="8" max="99999999"  >
                                    @if ($errors->has('telefono'))
                                        <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                    @endif

                                </div>




                                <div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }} col-md-6">
                                    <h6>Sexo</h6>

                                    <div class="form-check form-check-inline">

                                        <input class="form-check-input" type="radio"
                                               title="Masculino"
                                               name="genero" id="sexo1" value="M"
                                               required
                                               @if(old("genero")==='M')
                                                   checked
                                                   @endif>
                                        <label style="color:black; margin-top: 5px"  for="sexo1">Masculino</label>

                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="genero" id="sexo2" value="F" required
                                               @if(old("genero")==='F')
                                                   checked
                                                @endif>
                                        <label style="color:black; margin-top: 5px"  for="sexo2">Femenino</label>
                                    </div>
                                </div>
                            </div>





                            <div class="modal-footer">
                                <button type="button" onclick="limpiarDatosModal()" class="btn btn-secondary" data-dismiss="modal" >cerrar</button>
                                <button type="submit"  class="btn btn-primary">Guardar</button>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>





        <form class="form-inline" method="get" action="{{route('estudiante.buscar')}}">


            <div class="form-group mr-sm-4 my-sm-4 ">
                <input type="text" class="form-control mb-3" id="inputText2" name="busqueda"
                       placeholder="Buscar">
            </div>
            <button type="submit" class="btn btn-primary mb-3 "  >Buscar</button>
        </form>

        @if(session("exito"))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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

        <div class="modal fade  bd-example-modal-lg"  id="editarEstudiante" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalScrollableTitle" >
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Editar Estudiantes</h5>
                        <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <form method="post" action="{{route('estudiante.update')}}">
                            <input type="hidden" name="estudiante_id" id="id" value="">

                            {{method_field('put')}}

                            <div class="form-row">
                                <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }} col-md-6">
                            <h6>Nombre Completo</h6>
                                <input type="text" class="form-control solo-letras" id="nombre" name="nombre"
                                       value="{{old("nombre")}}"
                                       @isset($estudiante)
                                       value="{{$estudiante->nombre}}"
                                       @endisset value="{{old('nombre')}}">
                                    @if ($errors->has('nombre'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                    @endif

                            </div>

                         <div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }} col-md-6">
                            <h6>Fecha de nacimiento</h6>
                                <input type="date" pattern="([0-9]{1,3})"  class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                                       value="{{old("fecha_nacimiento")}}"

                                       @isset($estudiante)
                                       value="{{$estudiante->fecha_nacimiento}}"
                                       @endisset value="{{old('fecha_nacimiento')}}"
                                       title="Ingresa solo numeros entre 1 a 99 años"
                                       required
                                       minlength="1" maxlength="2" min="1" max="99"
                                >
                             @if ($errors->has('fecha_nacimiento'))
                                 <span class="help-block">
                                        <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                                    </span>
                             @endif
                            </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group{{ $errors->has('identificacion') ? ' has-error' : '' }} col-md-6">
                            <h6>Número Cuenta</h6>
                                <input  type="text"  pattern="([0-9]{1,11})"  class="form-control" id="identificacion" name="identificacion"
                                        value="{{old("identificacion")}}"
                                        @isset($estudiante)
                                        value="{{$estudiante->identificacion}}"
                                        @endisset value="{{old('identificacion')}}"
                                        title="Ingrese solo números"
                                        required
                                        minlength="1" maxlength="11" aria-valuemax="11" max="99999999999"
                                >
                                    @if ($errors->has('identificacion'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('identificacion') }}</strong>
                                    </span>
                                    @endif
                            </div>

                         <div class="form-group{{ $errors->has('carrera') ? ' has-error' : '' }} col-md-6">
                            <h6>Carrera</h6>
                                <select class="form-control" id="carrera" placeholder="seleccione" name="carrera"
                                        required>
                                    @foreach($carreras as $carrera)
                                        <option value="{{$carrera->id}}">{{$carrera->carrera}}</option>
                                    @endforeach
                                        @if ($errors->has('carrera'))
                                            <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('carrera') }}</strong>
                                    </span>
                                        @endif


                                </select>
                            </div>
                            </div>




                            <div class="form-row">
                                <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }} col-md-6">
                            <h6> Teléfono </h6>
                                <input input="text"  pattern="([0-9]{1,8})"   class="form-control"   id="telefono" name="telefono"
                                       value="{{old("telefono")}}"
                                       @isset($estudiante)
                                       value="{{$estudiante->telefono}}"
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

                                <div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }} col-md-6">
                                    <h6>Sexo</h6>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="genero" id="sexo1E" value="M" required
                                               @isset($estudiante)
                                               value="{{$estudiante->sexo1}}"
                                               @endisset value="{{old('sexo1')}}"
                                               @if(old("genero")==='M')
                                               checked
                                                @endif>
                                        <label style="color:black; margin-top: 5px"  for="sexo1E">Masculino</label>


                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="genero" id="sexo2E" value="F" required
                                               @isset($estudiante)
                                               value="{{$estudiante->sexo2}}"
                                               @endisset value="{{old('sexo2')}}"
                                               @if(old("genero")==='F')
                                               checked
                                                @endif
                                        >
                                        <label style="color:black; margin-top: 5px"  for="sexo2E">Femenino</label>


                                    </div>
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
                    <th scope="col">Número de Cuenta</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Fecha de Ingreso</th>
                    <th scope="col" >Acciones</th>
                </tr>
                </thead>

                <tbody>
                @if($estudiantes->count()>0)
                    @foreach($estudiantes as $estudiante)

                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$estudiante->nombre}}</td>
                            <td>{{$estudiante->identificacion}}</td>
                            <td>{{$estudiante->carrera}}</td>
                            <td>{{$estudiante->telefono}}</td>
                            <td>{{$estudiante->genero}}</td>
                            <td>{{$estudiante->edad}}
                            <td>{{date("d-m-Y",strtotime($estudiante->created_at))}}</td>
                            <div  style="overflow: auto"></div>


                            <td class="form-inline " style="width: 300px">
                                <form style="display: none" id="pago_form" method="GET"
                                      action="{{route("pagoestudiantes",["id"=>$estudiante->id])}}">
                                    <input name="id_cliente" value="{{$estudiante->id}}" type="hidden">
                                    {{ csrf_field() }}
                                </form>

                                <button class="btn btn-warning mr-xl-2" data-toggle="modal" data-target="#editarEstudiante" data-mynombre="{{$estudiante->nombre}}"
                                        data-myfecha_nacimiento="{{$estudiante->fecha_nacimiento}}"
                                        data-mycuenta="{{$estudiante->identificacion}}"
                                        data-myfecha="{{$estudiante->fecha_de_ingreso}}"
                                        data-mytelefono="{{$estudiante->telefono}}"
                                        data-mycarrera="{{$estudiante->id_carrera}}"
                                        data-catid="{{$estudiante->id}}" data-sexo="{{$estudiante->genero}}"><i
                                            class="fas fa-edit"></i></button>

                                    <button class="btn btn-danger mr-xl-2 "
                                            data-id="{{$estudiante->id}}"
                                            data-nombre="{{$estudiante->nombre}}"
                                            data-toggle="modal"
                                            data-target="#modalBorrarEstudiante"><i class="fas fa-trash-alt"></i>
                                    </button>


                                <a class="btn btn-info mr-xl-2 "
                                   href="{{route("imc.ini",$estudiante->id)}}">
                                    Expediente
                                </a>


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
                        <td colspan="9" style="text-align: center">No hay estudiantes ingresados</td>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="modalBorrarEstudiante">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Atención Eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('estudiante.borrar')}}">
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
