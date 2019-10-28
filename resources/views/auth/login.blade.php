@extends('layouts.app')

@section('content')

      <div class="container">
         <div class="row ">
             <div class="col-md-8 col-md-offset-1">
                <div class="panel-body top-left">
                    <h4 class="panel-heading ">Iniciar Sesion</h4>
                    <form  method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label  for="email"  class="labeltamañodir">Direccion de correo electrónico</label>

                            <div class="inputtamaño" >
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="labeltamaño">Contraseña</label>

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
                            <div class="inputtamaño">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuérdame
                                    </label>
                                    <a class="btn btn-link" href="{{ route('password.request') }}" >
                                        ¿Olvidaste tu contraseña?
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="boton">
                                <button type="submit" class="btn btn-primary ">
                                    Iniciar sesion
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
         <div class="logopuma"></div>

         </div>
      </div>

@endsection
