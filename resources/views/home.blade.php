@extends('layouts.principal')

@section('content')


    <div class=" fondo" style="font-family: 'Raleway', sans-serif">
        <div class="intro-lead-in text-center ">Bienvenido al control del gimnasio</div>
        <div class="intro-heading text-uppercase text-center ">UNAH-TEC Danli</div>

        <div class="container" style="margin-top: 60px">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center ">Total Estudiantes</h3>
                            <div class="card-footer">
                                <h3 class="text-center">{{$estudiantes}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header">
                            <h3 class="text-center ">Total Docentes</h3>
                            <div class="card-footer">
                                <h3 class="text-center">{{$docentes}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header">
                            <h3 class="text-center ">Total Particulares</h3>
                            <div class="card-footer">
                                <h3 class="text-center">{{$particulares}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header">
                            <h3 class="text-center ">Ingresos Totales</h3>
                            <div class="card-footer">
                                <h3 class="text-center">{{$ingresos}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection


