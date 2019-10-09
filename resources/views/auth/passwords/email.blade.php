@extends('layouts.app')

@section('content')
    <div class="fondo1">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <h4 class="panel-heading">Restablecer la contraseña</h4>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="labeltamaño">Dirección de correo electronico</label>

                            <div class="inputtamaño">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="botonrestablecer">
                                <button type="submit" class="btn btn-primary">
                                    Reenviar enlace de restablecimiento de contraseña
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
