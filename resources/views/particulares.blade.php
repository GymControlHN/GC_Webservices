@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Particulares</div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="alert alert-dismissable mb-n4" role="alert">
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


                            <form class="modal-body" method="post" action="{{route('particular.guardar')}}">
                                <h6>Nombre Completo</h6>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                </div>

                                <h6>Edad</h6>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="edad" name="edad">
                                </div>

                                <h6>Número de Identidad</h6>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="numero_de_identidad" name="numero_de_identidad">
                                </div>

                                <h6>Profesión</h6>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="profesion_u_oficio" name="profesion_u_oficio">
                                </div>



                                <h6> Teléfono </h6>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="telefono" name="telefono">
                                </div>

                                <h6>Fecha</h6>
                                <div class="form-group">
                                    <input type="date" class="form-control" id="fecha_de_ingreso" name="fecha_de_ingreso">
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
                    <th scope="col">Número de Identidad</th>
                    <th scope="col">Profesión</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Fecha de Ingreso</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>

                <tbody>

                @foreach($particulares as $particular)
                    <tr>
                        <th>{{$particular->nombre}}</th>
                        <td>{{$particular->numero_de_identidad}}</td>
                        <td>{{$particular->profesion_u_oficio}}</td>
                        <td>{{$particular->telefono}}</td>
                        <td>{{$particular->fecha_de_ingreso}}</td>

                    <td class="form-inline">
                        <button class="btn btn-secondary"><i class="fas fa-eye"></i></button>
                        <button class="btn btn-warning"><a href="{{route('particular.editar', $particular->id)}}" ></a><i class="fas fa-edit"></i></button>
                        <form method="post" action="{{route('particular.borrar', $particular->id)}}">
                            {{method_field('delete')}}
                        <button class="btn btn-danger "><i class="fas fa-trash-alt"></i></button>

                            <button class="btn btn-info dropdown-toggle " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Medidas
                            </button>

                        @endforeach
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item" type="button" > <a class="nav-link js-scroll-trigger" href="/imc">Imc</a>
                            </button>
                            <button class="dropdown-item" type="button"><a class="nav-link js-scroll-trigger" href="/grasa">Grasa Corporal</a></button>
                            <button class="dropdown-item" type="button"><a class="nav-link js-scroll-trigger" href="/ruffiel">Ruffier</a></button>
                        </div>
                        </form>
                    </td>
                </tr>

                </tbody>
            </table>
            {{ $particulares->links() }}
        </div>
    </div>

@endsection