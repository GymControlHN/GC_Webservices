@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;" xmlns="http://www.w3.org/1999/html">
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
                        <a class="navbar-brand" href="#" data-toggle="modal" data-target="#exampleModalScrollable">
                            <span><i class="fa fa-pencil-alt"></i></span> Agregar evento</a>


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
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                cerrar
                                            </button>
                                            <button type="submit" class="btn btn-primary">Guardar</button>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </nav>
                </li>
            </ul>
        </div>
    </div>


    <div class="py-4">
        <div class="card">
            <div class="card-header">
                <h6 style="text-align: center">Crear un usuario nuevo</h6>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route('nuevo.usuario') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <h6 for="name" class="labeltamaño">Nombre</h6>

                        <div class="inputtamaño">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                   required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <h6 for="email" class="labeltamañodir1">Direccion de correo electronico</h6>

                        <div class="inputtamaño">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                   required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <h6 for="password" class="labeltamaño">Contraseña</h6>

                        <div class="inputtamaño">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <h6 for="password-confirm" class="labeltamaño">Confirmar contraseña</h6>

                        <div class="inputtamaño">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="boton2">
                            <button type="submit" class="btn btn-primary">
                                Registrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <form>

                </form>
            </div>
        </div>
    </div>
@endsection