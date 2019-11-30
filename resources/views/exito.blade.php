
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-left btn-app"
                             style="width: fit-content">
                            <a href="/login">
                                <span class="fa fa-arrow-left"></span> Volver</a></div>

                        ¡Exito!
                    </div>

                    <div class="panel-body">
                        <h1>{{$json}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection