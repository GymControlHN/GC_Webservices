@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"></div>
            </div>
        </div>
    </header>

    <div class="card text-center">
        <div class="card-header">

            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <img src="puma.png" class="rounded" alt="Cinque Terre">
                        <a class="navbar-brand" href="#" data-toggle="modal" data-target="#exampleModalScrollable">Agregar evento</a>


                        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalScrollableTitleE" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalScrollableTitleE">Ingrese los datos</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">

                                        <form method="post" action="{{route('particular.guardar')}}">


                                            <h6>Nombre del evento</h6>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="nombre" name="nombre"


                                                >
                                            </div>

                                            <h6>Direccion</h6>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="nombre" name="nombre"


                                                >
                                            </div>

                                            <h6>Fecha</h6>
                                            <div class="form-group">
                                                <input type="date" class="form-control" id="nombre" name="nombre"


                                                >
                                            </div>










                                        </form>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                        <button type="submit"  class="btn btn-primary">Guardar</button>

                                    </div>
                                </div>

                            </div>
                        </div>





                    </nav>
                </li>
            </ul>
        </div>
    </div>
