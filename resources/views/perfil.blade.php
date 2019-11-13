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
    <div class=" w3-container w3-teal mx-5">
        <h2 style="all: revert">Listado de Usuarios</h2>


        <button class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModalScrollable" >
                <i class="fas fa-user"></i> Agregar Usuario</button>

                        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
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
                                                <h6 for="name" >Nombre</h6>

                                                <div >
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
                                                <h6 for="email">Direccion de correo electronico</h6>

                                                <div>
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
                                                <h6 for="password" >Contraseña</h6>

                                                <div >
                                                    <input id="password" type="password" class="form-control" name="password" required>

                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h6 for="password-confirm" >Confirmar contraseña</h6>

                                                <div>
                                                    <input id="password-confirm" type="password" class="form-control"
                                                           name="password_confirmation" required>
                                                </div>
                                            </div>



                                        <div class="modal-footer">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                                <button type="submit"  class="btn btn-primary ">Registrar</button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                    </div>
                            </div>
        </div>


        <div class="table  mx-sm-0" style="-moz-box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);
        box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);">
            <table class="table ruler-vertical table-hover mx-sm-0 " >
                <thead class="thead-light">
                <tr>
                    <th>Nombre</th>
                    <th>Correo electronico</th>
                    <th>Contraseña</th>
                    <th>Acciones</th>
                <tr>
                </thead>
                <tbody>
                @if($errors->count()>0)
                    @foreach($errors as $usuario)
                <tr>
                    <th>{{$usuario->name}}</th>
                    <th>{{$usuario->email}}</th>
                    <th>{{$usuario->password}}</th>
                    <th class="form-inline mr-xl-n2 ">
                        <button class="btn btn-warning mr-xl-1">
                            <i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger mr-xl-2 "><i class="fas fa-trash-alt"></i></button>
                        </form>
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

@endsection