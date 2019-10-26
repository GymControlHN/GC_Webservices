@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
        </div>
    </header>

    <div class="w3-container w3-teal mx-5" style="font-family: 'Raleway', sans-serif">
            <h2 style="all: revert">Listado de Particulares</h2>



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
                            <h5 class="modal-title" id="exampleModalScrollableTitle">Registro de Particulares</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>



                        <div class="modal-body ">

                            <form method="post" action="{{route('particular.guardar')}}">


                                <h6>Nombre Completo</h6>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nombre" name="nombre"

                                           @isset($particular)
                                           value="{{$particular->cuenta}}"
                                            @endisset
                                    >
                                </div>

                                <h6>Edad</h6>
                                <div class="form-group">
                                    <input type="text"  pattern="([0-9]{1,3})" class="form-control" id="edad" name="edad"

                                           title="Ingrese solo números entre 1 a 99 años"
                                           @isset($particular)
                                           value="{{$particular->edad}}"
                                           @endisset
                                           required
                                           minlength="1" maxlength="2" min="1" max="99">
                                </div>

                                <h6>Número de Identidad</h6>
                                <div class="form-group" pattern="([0-9]{1,13})" >
                                    <input type="text" class="form-control" id="numero_de_identidad" name="numero_de_identidad"

                                           @isset($particular)
                                           title="Ingrese solo números"
                                           value="{{$particular->numero_de_identidad}}"
                                           @endisset
                                           required
                                           minlength="1" maxlength="13" aria-valuemax="13" max="9999999999999"
                                    >
                                </div>

                                <h6>Profesión</h6>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="profesion_u_oficio" name="profesion_u_oficio"

                                           @isset($particular)
                                           value="{{$particular->profesion_u_oficio}}"
                                           @endisset
                                           required
                                    >
                                </div>



                                <h6> Teléfono </h6>
                                <div class="form-group" >
                                    <input type="text" pattern="([0-9]{1,8})" class="form-control"
                                           id="telefono" name="telefono"
                                           @isset($particular)
                                                   title="Ingrese solo números"
                                           value="{{$particular->telefono}}"
                                           @endisset
                                           required
                                           maxlength="8" minlength="1" aria-valuemax="8" max="99999999"
                                    >
                                </div>

                                <h6>Sexo</h6>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="M" required>Masculino
                                    <label class="form-check-label" for="inlineRadio1"></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="F" required>Femenino
                                    <label class="form-check-label" for="inlineRadio2"></label>
                                </div>





                                <h6>Fecha</h6>
                                <div class="form-group">
                                    <input type="date" class="form-control" id="fecha_de_ingreso" name="fecha_de_ingreso"
                                           @isset($particular)
                                           value="{{$particular->fecha_de_ingreso}}"
                                           @endisset
                                           required
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




        <form class="form-inline" method="get" action="{{route('particular.buscarPart')}}">

            <div class="form-group mr-sm-4 my-sm-4 ">
                <input type="text" class="form-control" name="busquedaPart"
                       id="inputText2" placeholder="Buscar">
            </div>
            <button type="submit" class="btn btn-primary my-4 ">Buscar</button>
        </form>

        <div class="modal fade" id="editarParticular" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
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

                            <h6>Nombre Completo</h6>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                       @isset($particular)
                                       value="{{$particular->nombre}}"
                                       @endisset value="{{old('nombre')}}"
                                >
                            </div>

                            <h6>Edad</h6>
                            <div class="form-group">
                                <input type="number" class="form-control" id="edad" name="edad"
                                       @isset($particular)
                                       value="{{$particular->edad}}"
                                       @endisset value="{{old('edad')}}"
                                >
                            </div>

                            <h6>Número de Identidad</h6>
                            <div class="form-group">
                                <input type="number" class="form-control" id="numero_de_identidad" name="numero_de_identidad"
                                       @isset($particular)
                                       value="{{$particular->numero_de_identidad}}"
                                       @endisset value="{{old('numero_de_identidad')}}"
                                >
                            </div>

                            <h6>Profesión</h6>
                            <div class="form-group">
                                <input type="text" class="form-control" id="profesion_u_oficio" name="profesion_u_oficio"
                                       @isset($particular)
                                       value="{{$particular->profesion_u_pficio}}"
                                       @endisset value="{{old('profesion_u_oficio')}}"
                                >
                            </div>



                            <h6> Teléfono </h6>
                            <div class="form-group">
                                <input type="number" class="form-control" id="telefono" name="telefono"
                                       @isset($particular)
                                       value="{{$particular->telefono}}"
                                       @endisset value="{{old('telefono')}}"
                                >
                            </div>

                            <h6>Fecha</h6>
                            <div class="form-group">
                                <input type="date" class="form-control" id="fecha_de_ingreso" name="fecha_de_ingreso"
                                       @isset($particular)
                                       value="{{$particular->fecha_de_ingreso}}"
                                       @endisset value="{{old('fecha_de_ingreso')}}"
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










        <div class="table-responsive mb-5"  style="-moz-box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);
    box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);">
            <table class="table ruler-vertical table-hover mx-sm-0 ">
                <thead class="thead-light">
                <tr>

                    <th scope="col">Nombre</th>
                    <th scope="col">Número de Identidad</th>
                    <th scope="col">Profesión U Oficio</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Fecha de Ingreso</th>
                    <th scope="col">Acciones</th>
                </tr>
                
                </thead>

                <tbody>
                @if($particulares->count()>0)
                @foreach($particulares as $particular)

                <tr>

                    <td>{{$particular->nombre}}</td>
                    <td>{{$particular->numero_de_identidad}}</td>
                    <td>{{$particular->profesion_u_oficio}}</td>
                    <td>{{$particular->telefono}}</td>
                    <td>{{$particular->edad}}</td>
                    <td>{{$particular->fecha_de_ingreso}}</td>
                    <div  style="overflow: auto"></div>

                    <td class="form-inline">
                        <button class="btn btn-secondary mr-xl-2"><a href="{{route("pagoparticulares")}}"><i class="fas fa-eye"></i></a> </button>

                        <button class="btn btn-warning mr-xl-2" data-toggle="modal" data-target="#editarParticular" data-mynombre="{{$particular->nombre}}" data-myedad="{{$particular->edad}}"
                                data-myidentidad="{{$particular->numero_de_identidad}}" data-myfecha="{{$particular->fecha_de_ingreso}}"
                                data-mytelefono="{{$particular->telefono}}" data-myprofesion="{{$particular->profesion_u_oficio}}"
                                data-catid="{{$particular->id}}"><i class="fas fa-edit"></i></button>
                        <form method="post" action="{{route('particular.borrar', $particular->id)}}" onclick="return confirm('Estas seguro que deseas eliminar al cliente? ')">
                        <button class="btn btn-danger mr-xl-2"><i class="fas fa-trash-alt"></i></button>
                            {{method_field('delete')}}
                        </form>
                            <button class="btn btn-info dropdown-toggle " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Medidas
                            </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item" type="button" > <a class="nav-link js-scroll-trigger" href="/imc">Imc</a>
                            </button>
                            <button class="dropdown-item" type="button"><a class="nav-link js-scroll-trigger" href="/grasa">Grasa Corporal</a></button>
                            <button class="dropdown-item" type="button"><a class="nav-link js-scroll-trigger" href="/ruffiel">Ruffier</a></button>
                        </div>
                    </td>
                </tr>
@endforeach
                @else
                    <tr>
                        <td colspan="7" style="text-align: center">No hay particulares ingresados</td>
                    </tr>
                @endif
                </tbody>
            </table>
            {{ $particulares->links() }}
    </div>
</div>
@endsection