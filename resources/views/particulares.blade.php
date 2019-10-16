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
                 aria-labelledby="exampleModalScrollableTitleP" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalScrollableTitleP">Ingrese los datos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>



                        <div class="modal-body ">
                            <form>
                                <h6>Nombre Completo</h6>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nombreP">
                                </div>

                                <h6>Edad</h6>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="edadP">
                                </div>

                                <h6>Número de Identidad</h6>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="numIde">
                                </div>

                                <h6>Profesión</h6>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="profesion">
                                </div>



                                <h6>Celular</h6>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="telP">
                                </div>

                                <h6>Fecha de ingreso</h6>
                                <div class="form-group">
                                    <input type="date" class="form-control" id="fechaP">
                                </div>



                            </form>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                <button type="submit"  class="btn btn-primary">Guardar</button>

                            </div>
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
                    <th scope="col">N°</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Número de Identidad</th>
                    <th scope="col">Profesión</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Fecha de Ingreso</th>
                    <th scope="col">Acciones</th>
                </tr>
                
                </thead>

                <tbody>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob Lopez</td>
                    <td>0703-1995-01957</td>
                    <td>Tamalero</td>
                    <td>98-69-52-12</td>
                    <td>7/10/2019</td>
                    <td>
                        <button class="btn btn-secondary"><i class="fas fa-eye"></i></button>
                        <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger "><i class="fas fa-trash-alt"></i></button>

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

                </tbody>
            </table>
        </div>
    </div>

@endsection