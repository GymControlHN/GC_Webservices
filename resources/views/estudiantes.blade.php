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

                       <script>
                           @isset($estudiante)
                               action= "{{ route('estudiante.update', $estudiante->id) }}"
                           @else
                               action="{{route('estudiante.guardar')}}"
                           @endisset
                       </script>
                       @isset ($estudiante)
                           @method('put')
                       @endisset
                       <form class="modal-body" method="post" action="{{route('estudiante.guardar')}}">


                                       
                               <h6>Nombre Completo</h6>
                               <div class="form-group">
                                   <input type="text" class="form-control" id="nombre" name="nombre"
                                          placeholder="Escriba el nombre completo" onkeypress="return soloLetras(event)" required
                                   @isset($estudiante)
                                       value="{{$estudiante->nombre}}"
                                   @endisset value="{{old('nombre')}}">
                               </div>

                               <h6>Edad</h6>
                               <div class="form-group">
                                   <input type="number" class="form-control" id="edad" name="edad" required
                                          placeholder="Escriba la edad "
                                   @isset($estudiante)
                                       value="{{$estudiante->edad}}"
                                   @endisset value="{{old('edad')}}">
                               </div>

                               <h6>Número Cuenta</h6>
                               <div class="form-group">
                                   <input type="number" class="form-control" id="numero_de_cuenta" name="numero_de_cuenta"
                                          minlength="11" required
                                          placeholder="Escriba el numero de cuenta"
                                   @isset($estudiante)
                                       value="{{$estudiante->numero_de_cuenta}}"
                                   @endisset value="{{old('numero_de_cuenta')}}">
                               </div>


                                <h6>Carrera</h6>
                               <div class="form-group">
                                   <select class="form-control" id="carrera"  name="carrera" placeholder="seleccione" required>
                                       <option>@isset($estudiante){{$estudiante->carrera}}
                                           @endisset {{old('carrera')}}</option>
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
                                          placeholder="0000-0000"
                                   @isset($estudiante)
                                       value="{{$estudiante->telefono}}"
                                   @endisset value="{{old('telefono')}}">
                               </div>

                               <h6>Fecha</h6>
                               <div class="form-group">
                                   <input type="date" class="form-control" id="fecha_de_ingreso" name="fecha_de_ingreso"
                                          placeholder="0000-0000" required
                                   @isset($estudiante)
                                       value="{{$estudiante->fecha_de_ingreso}}"
                                   @endisset value="{{old('fecha_de_ingreso')}}">
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
    box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);" >

        <thead class="thead-light">
        <tr>

            <th scope="col">Nombre Completo</th>
            <th scope="col">Número de Cuenta</th>
            <th scope="col">Carrera</th>
            <th scope="col">Teléfono</th>
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
            <td>{{$estudiante->fecha_de_ingreso}}</td>


            <td class="form-inline">

                <button class="btn btn-secondary" id="ver" ><i class="fas fa-eye"></i></button>
                <button class="btn btn-warning" id="editar"><a href="{{route('estudiante.editar', $estudiante->id)}}" ><i class="fas fa-edit"></i></a></button>
                <form method="post" action="{{route('estudiante.borrar', $estudiante->id)}}">
                    {{method_field('delete')}}
                    <button class="btn btn-danger " id="borrar"><i class="fas fa-trash-alt"></i></button>
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Medidas
                </button>

   @endforeach
                
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <button class="dropdown-item" type="button"><a class="nav-link js-scroll-trigger" href="/imc">Imc</a>
                    </button>
                    <button class="dropdown-item" type="button"><a class="nav-link js-scroll-trigger" href="/grasa">Grasa Corporal</a>
                    </button>
                    <button class="dropdown-item" type="button"><a class="nav-link js-scroll-trigger" href="/ruffiel">Ruffier</a>
                    </button>

                </div>
                </form>
            </td>
        </tr>

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
