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
           <h2 style="all: revert">Listado de Estudiantes</h2>


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
                           <h5 class="modal-title" id="exampleModalScrollableTitle">Registro Estudiantes</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <div class="modal-body">

                           <form method="post" action="{{route('estudiante.guardar')}}">
                               <script>
                                   @isset($estudiante)
                                       action=" {{ route('estudiante.update', $estudiante->id) }}"
                                   @else
                                       action="{{route('estudiante.guardar')}}"
                                   @endisset
                                   @isset ($estudiante)
                                       @method('put')
                                   @endisset
                               </script>
                               <h6>Nombre Completo</h6>
                               <div class="form-group">
                                   <input type="text" class="form-control" id="nombre" name="nombre"
                                          @isset($estudiante)
                                          value="{{$estudiante->cuenta}}"
                                           @endisset
                                   >
                               </div>

                               <h6>Edad</h6>
                               <div class="form-group">
                                   <input type="number" class="form-control" id="edad" name="edad"
                                          @isset($estudiante)
                                          value="{{$estudiante->edad}}"
                                           @endisset
                                   >
                               </div>

                               <h6>Número Cuenta</h6>
                               <div class="form-group">
                                   <input type="number" class="form-control" id="numero_de_cuenta" name="numero_de_cuenta"
                                          @isset($estudiante)
                                          value="{{$estudiante->numero_de_cuenta}}"
                                           @endisset
                                   >
                               </div>

                                <h6>Carrera</h6>
                               <div class="form-group">
                                   <select class="form-control" id="carrera" placeholder="seleccione" name="carrera" >
                                       <option></option>
                                       <option>Lic. informática administrativa</option>
                                       <option>Lic. Enfermeria</option>
                                       <option>Ing. Agroindustrial</option>
                                       <option>TUAEC</option>
                                       <option>Otros</option>
                                   </select>
                               </div>





                               <h6> Teléfono </h6>
                               <div class="form-group">
                                   <input type="number" class="form-control" id="telefono" name="telefono"
                                          @isset($estudiante)
                                          value="{{$estudiante->telefono}}"
                                           @endisset
                                   >
                               </div>

                               <h6>Fecha</h6>
                               <div class="form-group">
                                   <input type="date" class="form-control" id="fecha_de_ingreso" name="fecha_de_ingreso"
                                          @isset($estudiante)
                                          value="{{$estudiante->fecha_de_ingreso}}"
                                           @endisset>
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
<!--Modal de editar -->

           <div class="modal fade show" id="editarEstudiante" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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
                                   <input type="text" class="form-control" id="nombre" name="nombre"
                                          @isset($estudiante)
                                          value="{{$estudiante->nombre}}"
                                          @endisset value="{{old('nombre')}}"
                                   >

                               </div>

                               <h6>Edad</h6>
                               <div class="form-group">
                                   <input type="number" class="form-control" id="edad" name="edad"
                                          @isset($estudiante)
                                          value="{{$estudiante->edad}}"
                                          @endisset value="{{old('edad')}}"
                                   >
                               </div>

                               <h6>Número Cuenta</h6>
                               <div class="form-group">
                                   <input type="number" class="form-control" id="numero_de_cuenta" name="numero_de_cuenta"
                                          @isset($estudiante)
                                          value="{{$estudiante->numero_de_cuenta}}"
                                          @endisset value="{{old('numero_de_cuenta')}}"
                                   >
                               </div>

                               <h6>Carrera</h6>
                               <div class="form-group">
                                   <select class="form-control" id="carrera" placeholder="seleccione" name="carrera">
                                       <option></option>
                                       <option>Lic. informática administrativa</option>
                                       <option>Lic. Enfermeria</option>
                                       <option>Ing. Agroindustrial</option>
                                       <option>TUAEC</option>
                                       <option>Otros</option>
                                   </select>
                               </div>





                               <h6> Teléfono </h6>
                               <div class="form-group">
                                   <input type="number" class="form-control" id="telefono" name="telefono"
                                          @isset($estudiante)
                                          value="{{$estudiante->telefono}}"
                                          @endisset value="{{old('telefono')}}"
                                   >
                               </div>

                               <h6>Fecha</h6>
                               <div class="form-group">
                                   <input type="date" class="form-control" id="fecha_de_ingreso" name="fecha_de_ingreso"
                                          @isset($estudiante)
                                          value="{{$estudiante->fecha_de_ingreso}}"
                                          @endisset value="{{old('fecha_de_ingreso')}}"
                                   >
                               </div>




                               <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                   <button type="submit"  class="btn btn-primary">Guardar Cambios</button>

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
       <div class="table-responsive mb-5"  style="-moz-box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);
    box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);">
           <table class="table ruler-vertical table-hover mx-sm-0 ">
         <thead class="thead-light">
         <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Número de Cuenta</th>
            <th scope="col">Carrera</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Edad</th>
            <th scope="col">Fecha de Ingreso</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>

        <tbody>
        @foreach($estudiantes as $estudiante)

        <tr>
            <td>{{$estudiante->nombre}}</td>
            <td>{{$estudiante->numero_de_cuenta}}</td>
            <td>{{$estudiante->carrera}}</td>
            <td>{{$estudiante->telefono}}</td>
            <td>{{$estudiante->edad}}</td>
            <td>{{$estudiante->fecha_de_ingreso}}</td>
            <div  style="overflow: auto"></div>


            <td class="form-inline">
                <button class="btn btn-secondary" ><i class="fas fa-eye"></i></button>
                <button class="btn btn-warning" data-toggle="modal" data-target="#editarEstudiante" data-mynombre="{{$estudiante->nombre}}" data-myedad="{{$estudiante->edad}}"
                        data-mycuenta="{{$estudiante->numero_de_cuenta}}" data-myfecha="{{$estudiante->fecha_de_ingreso}}"
                        data-mytelefono="{{$estudiante->telefono}}" data-mycarrera="{{$estudiante->carrera}}"
                data-catid="{{$estudiante->id}}"><i class="fas fa-edit"></i></button>

                <form method="post" action="{{route('estudiante.borrar', $estudiante->id)}}" onclick="return confirm('Estas seguro que deseas eliminar al estudiante? ')">
                <button class="btn btn-danger "><i class="fas fa-trash-alt"></i></button>



                    {{method_field('delete')}}
                </form>
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Medidas
                </button>


                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <button class="dropdown-item" type="button"><a class="nav-link js-scroll-trigger" href="/imc">Imc</a>
                    </button>
                    <button class="dropdown-item" type="button"><a class="nav-link js-scroll-trigger" href="/grasa">Grasa Corporal</a>
                    </button>
                    <button class="dropdown-item" type="button"><a class="nav-link js-scroll-trigger" href="/ruffiel">Ruffier</a>
                    </button>
                </div>
            </td>
        </tr>

@endforeach
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


        </tbody>
    </table>
           {{ $estudiantes->links() }}


   </div>


   </div>




@endsection
