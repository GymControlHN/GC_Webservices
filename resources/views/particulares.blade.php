@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
        </div>
    </header>



    <div class="w3-container w3-teal mx-5" style="font-family: 'Raleway', sans-serif">
            <h2 class=" mt-3">Listado de Particulares</h2>



            <button type="button" class="btn btn-primary float-right" id="crearNuevo" data-toggle="modal" data-target="#exampleModalScrollable">
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
                            <h5 class="modal-title" id="exampleModalScrollableTitle">Registro de Particulares</h5>
                            <button type="button" onclick="limpiarDatosModal()" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>



                        <div class="modal-body">

                            <form method="post" action="{{route('particular.guardar')}}">

                                <div class="form-row">
                                    <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }} col-md-6">
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

                                    <div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }} col-md-6">
                                        <h6>Fecha de nacimiento</h6>
                                            <input type="date"  pattern="([0-9]{1,3})" class="form-control" id="fecha_nacimiento"
                                                   name="fecha_nacimiento"
                                                   title="Ingrese solo números entre 1 a 99 años"
                                                   required
                                                   max="{{date("Y-m-d",strtotime("-1825 days"))}}"
                                                   value="{{old("fecha_nacimiento")}}"
                                                   minlength="1" maxlength="2" min="1" max="99">
                                        @if ($errors->has('fecha_nacimiento'))
                                            <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                                    </span>
                                        @endif
                                        </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group{{ $errors->has('identificacion') ? ' has-error' : '' }} col-md-6">
                                        <h6>Número de Identidad</h6>
                                            <input type="text"  pattern="([0-9]{1,13})" class="form-control" id="identificacion" name="identificacion"
                                                   title="Ingrese solo números "
                                                   required
                                                   value="{{old("identificacion")}}"
                                                   minlength="1" maxlength="13" aria-valuemax="13" max="9999999999999"
                                            >
                                        @if ($errors->has('identificacion'))
                                            <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('identificacion') }}</strong>
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
                                    <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }} col-md-6">
                                <h6> Teléfono </h6>
                                    <input type="text" pattern="([0-9]{1,8})" class="form-control"
                                           id="telefono" name="telefono"
                                                   title="Ingrese solo números"
                                           required
                                           value="{{old("telefono")}}"
                                           maxlength="8" minlength="1" aria-valuemax="8" max="99999999"
                                    >
                                        @if ($errors->has('telefono'))
                                            <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                        @endif
                                </div>



                                    <div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }} col-md-6">
                                        <h6>Sexo</h6>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="genero" id="sexo1" value="M" required
                                           @if(old("genero")==='M')
                                           checked
                                            @endif>
                                    <label style="color:black; margin-top: 5px"  for="sexo1">Masculino</label>
                                    <label class="form-check-label" for="inlineRadio1"></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="genero" id="sexo2" value="F" required
                                           @if(old("genero")==='F')
                                           checked
                                            @endif>
                                    <label style="color:black; margin-top: 5px"  for="sexo2">Femenino</label>
                                    <label class="form-check-label" for="inlineRadio2"></label>
                                </div>

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




        <form class="form-inline" method="get" action="{{route('particular.buscarPart')}}">

            <div class="form-group mr-sm-4 my-sm-4 ">
                <input type="text" class="form-control mb-3" name="busquedaPart"
                       id="inputText2" placeholder="Buscar">
            </div>
            <button type="submit" class="btn btn-primary mb-3 ">Buscar</button>
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

        <div class ="modal fade  bd-example-modal-lg" id="editarParticular" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Registro de Particulares</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>



                    <div class="modal-body ">

                        <form method="post" action="{{route('particular.update')}}">
                            <input type="hidden" name="particular_id" id="id" value="">

                            {{method_field('put')}}

                            <div class="form-row">
                                <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }} col-md-6">
                            <h6>Nombre Completo</h6>
                                <input type="text" class="form-control solo-letras" id="nombre" name="nombre"
                                       value="{{old("nombre")}}"
                                       @isset($particular)
                                       value="{{$particular->nombre}}"
                                       @endisset value="{{old('nombre')}}"
                                >
                                    @if ($errors->has('nombre'))
                                        <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                    @endif
                            </div>

                                <div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }} col-md-6">
                            <h6>Fecha de nacimiento</h6>
                                <input type="date"  pattern="([0-9]{1,3})" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                                       value="{{old("fecha_nacimiento")}}"
                                       @isset($particular)
                                       value="{{$particular->fecha_nacimiento}}"
                                       @endisset value="{{old('fecha_nacimiento')}}"
                                       title="Ingrese solo números entre 1 a 99 años"
                                       required
                                       minlength="1" maxlength="2" min="1" max="99"
                                >
                                    @if ($errors->has('fecha_nacimiento'))
                                        <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                                    </span>
                                    @endif
                            </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group{{ $errors->has('identificacion') ? ' has-error' : '' }} col-md-6">
                            <h6>Número de Identidad</h6>
                                <input type="text" pattern="([0-9]{1,13})" class="form-control" id="identificacion" name="identificacion"
                                       value="{{old("identificacion")}}"
                                       @isset($particular)
                                       value="{{$particular->identificacion}}"
                                       @endisset value="{{old('identificacion')}}"
                                       required
                                       minlength="1" maxlength="13" aria-valuemax="13" max="9999999999999"

                                >
                                    @if ($errors->has('identificacion'))
                                        <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('identificacion') }}</strong>
                                    </span>
                                    @endif
                            </div>

                                <div class="form-group{{ $errors->has('profesion_u_oficio') ? ' has-error' : '' }} col-md-6">
                            <h6>Profesión</h6>
                                <input type="text" class="form-control solo-letras" id="profesion_u_oficio" name="profesion_u_oficio"
                                       value="{{old("profesion_u_oficio")}}"
                                       @isset($particular)
                                       value="{{$particular->profesion_u_oficio}}"
                                       @endisset value="{{old('profesion_u_oficio')}}"
                                       required
                                >
                                    @if ($errors->has('profesion_u_oficio'))
                                        <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('profesion_u_oficio') }}</strong>
                                    </span>
                                    @endif
                            </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }} col-md-6">
                            <h6> Teléfono </h6>
                                <input type="text" pattern="([0-9]{1,8})" class="form-control" id="telefono" name="telefono"
                                       value="{{old("telefono")}}"
                                       @isset($particular)
                                       value="{{$particular->telefono}}"
                                       @endisset value="{{old('telefono')}}"
                                       id="telefono" name="telefono"
                                       title="Ingrese solo números"
                                       required
                                       maxlength="8" minlength="1" aria-valuemax="8" max="99999999"

                                >
                                    @if ($errors->has('telefono'))
                                        <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                    @endif
                            </div>

                                <div class="form-group col-md-6">
                                    <h6>Sexo</h6>
                                    <div class="form-check form-check-inline ">
                                        <input class="form-check-input" type="radio" name="genero" id="sexo1P" value="M" required

                                               @isset($particular)
                                               value="{{$particular->sexo1}}"
                                               @endisset value="{{old('sexo1 ')}}"
                                               @if(old("genero")==='M')
                                               checked
                                                @endif
                                        > <label style="color:black; margin-top: 5px"  for="sexo1P">Masculino</label>
                                        <label class="form-check-label" for="inlineRadio1"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="genero" id="sexo2P" value="F" required

                                               @isset($particular)
                                               value="{{$particular->sexo2 }}"
                                               @endisset value="{{old('sexo2')}}"
                                               @if(old("genero")==='F')
                                               checked
                                                @endif
                                        >
                                        <label style="color:black; margin-top: 5px"  for="sexo2P">Femenino</label>
                                        <label class="form-check-label" for="inlineRadio2"></label>
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











        <div class="table-responsive mb-5"  style="-moz-box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);
                        box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);">
            <table class="table ruler-vertical table-hover mx-sm-0 ">
                <thead class="thead-light">
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Número de Identidad</th>
                    <th scope="col">Profesión U Oficio</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Fecha de Ingreso</th>
                    <th scope="col">Acciones</th>
                </tr>
                
                </thead>

                <tbody>
                @if($particulares->count()>0)
                @foreach($particulares as $particular)

                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$particular->nombre}}</td>
                    <td>{{$particular->identificacion}}</td>
                    <td>{{$particular->profesion_u_oficio}}</td>
                    <td>{{$particular->telefono}}</td>
                    <td>{{$particular->genero}}</td>
                    <td>{{$particular->edad}}</td>
                    <td>{{date("d-m-Y",strtotime($particular->created_at))}}</td>
                    <div  style="overflow: auto"></div>


                    <td class="form-inline " style="width: 300px">
                        <form style="display: none" id="pago2_form" method="GET" action="{{route("pagoparticulares",["id"=>$particular->id])}}">
                            <input name="id_cliente" value="{{$particular->id}}" type="hidden">
                            {{ csrf_field() }}
                        </form>


                        <button class="btn btn-warning mr-xl-2" data-toggle="modal"
                                data-target="#editarParticular"
                                data-mynombre="{{$particular->nombre}}" data-myfecha_nacimiento="{{$particular->fecha_nacimiento}}"
                                data-myidentidad="{{$particular->identificacion}}"
                                data-myfecha="{{$particular->fecha_de_ingreso}}"
                                data-mytelefono="{{$particular->telefono}}"
                                data-sexo="{{$particular->genero}}"
                                data-myprofesion="{{$particular->profesion_u_oficio}}"
                                data-id="{{$particular->id}}"><i class="fas fa-edit"></i></button>

                        <button class="btn btn-danger mr-xl-2 "
                                data-id="{{$particular->id}}"
                                data-nombre="{{$particular->nombre}}"
                                data-toggle="modal"
                                data-target="#modalBorrarParticular"><i class="fas fa-trash-alt"></i>
                        </button>

                        <a class="btn btn-info mr-xl-2 "
                           href="{{route("imc.ini",$particular->id)}}">
                            Expediente
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item" type="button" > <a class="nav-link js-scroll-trigger" href="{{route("imc.ini",$particular->id)}}">Imc</a>
                            </button>
                            <button class="dropdown-item" type="button"><a class="nav-link js-scroll-trigger" href="{{route("grasa.uni",["id"=>$particular->id])}}">Grasa Corporal</a></button>
                            <button class="dropdown-item" type="button"><a class="nav-link js-scroll-trigger" href="/ruffiel">Ruffier</a></button>
                        </div>
                    </td>
                </tr>

@endforeach
                @else
                    <tr>
                        <td colspan="9" style="text-align: center">No hay particulares ingresados</td>

                @endif
                </tbody>
            </table>

            <div class="border-top my-3"></div>

            @if($particulares->count()>10)
                <div class="panel">
                    {{ $particulares->links() }}
                </div>
                @endif
            </div>
            </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="modalBorrarParticular">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Atención Eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('particular.borrar')}}">
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