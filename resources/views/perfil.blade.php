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
    <div class="container">

        <h3 class="mt-4" style="all: revert">Listado de Usuarios</h3>


        <button class="btn btn-success float-right" data-toggle="modal" data-target="#modalañadirnuevousuario">
            <i class="fas fa-user"></i> Agregar Usuario
        </button>

        <div class="modal fade" id="modalañadirnuevousuario" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalScrollableTitleE" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitleE">Crear un nuevo usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="{{ route('nuevo.usuario') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <h6 for="name">Nombre</h6>

                                <div>
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}"
                                           required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                     </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <h6 for="email">Direccion de correo electronico</h6>

                                <div>
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}"
                                           required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                                         <strong>{{ $errors->first('email') }}</strong>
                                                          </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <h6 for="password">Contraseña</h6>

                                <div>
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <h6 for="password-confirm">Confirmar contraseña</h6>

                                <div>
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <div class="form-group">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                    <button type="submit" class="btn btn-primary ">Registrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="table  mx-sm-0" style="margin: 50px">
            <br><br>
            <table class="table ruler-vertical table-hover mx-sm-0 "
                   style="  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <thead class="thead-light">
                <tr>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Contraseña</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @if($usuarios->count()>0)
                    @foreach($usuarios as $usuario)
                        <tr>
                            <th>{{$usuario->name}}</th>
                            <th>{{$usuario->email}}</th>
                            <th><i class="fas fa-exclamation-triangle" data-toggle="tooltip"
                                   data-placement="right" data-content="body"
                                   title="La contraseña no se puede mostrar"
                                   data-title="La contraseña no se puede mostrar"></i> confidencial
                            </th>
                            <th class="form-inline mr-xl-n2 ">
                                <button class="btn btn-danger mr-xl-2 "
                                        data-toggle="modal"
                                        data-target="#modalBorrarUsuario">
                                    <i class="fas fa-trash-alt"></i></button>
                                <button class="btn btn-info mr-xl-2 " type="button"
                                        data-correo="{{$usuario->email}}"
                                        data-toggle="modal"
                                        data-target="#modalRecuperar">Restablecer
                                </button>
                            </th>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" style="text-align: center">No hay usuarios ingresados</td>
                @endif

                </tbody>
            </table>

        </div>
    </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalBorrarUsuario">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Atención Eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('usuario.borrar')}}">
                    {{method_field('delete')}}

                    <div class="modal-body">
                        <input name="id" id="id" type="hidden">

                        <p>Esta seguro que desea borrar el usuario?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>

                </form>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalRecuperar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Recuperar Contraseña</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('password.email') }}">

                    <div class="modal-body">
                        <div class="form-group ">
                            <label style="color: #1b1e21" for="inputEmail4">Correo Electrónico</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="email" placeholder="ingrese el correo"
                                   required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Recuperar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection