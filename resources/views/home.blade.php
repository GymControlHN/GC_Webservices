@extends('layouts.principal')

@section('content')


    <div class=" fondo" style="font-family: 'Raleway', sans-serif">
        <div class="intro-lead-in text-center ">Bienvenido al control del gimnasio</div>
        <div class="intro-heading text-uppercase text-center ">UNAH-TEC Danli</div>

        <div class="container" style="margin-top: 60px">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 card-efect" style="margin-top: 10px">
                    <div class="card card-style">
                        <div class="card-header">
                            <span class="badge badge-warning" style="float: right">Hoy</span>
                            <br>
                            <h5 class="text-center">Total Estudiantes </h5>
                            <h5 class="text-center"><span class="badge badge-dark">{{$estudiantes}}</span></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6  card-efect" style="margin-top: 10px">
                    <div class="card card-style">
                        <div class="card-header">
                            <span class="badge badge-warning" style="float: right">Hoy</span>
                            <br>
                            <h5 class="text-center ">Total Docentes</h5>
                            <h5 class="text-center"><span class="badge badge-dark">{{$docentes}}</span></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 card-efect" style="margin-top: 10px">
                    <div class="card  card-style">
                        <div class="card-header">
                            <span class="badge badge-warning" style="float: right">Hoy</span>
                            <br>
                            <h5 class="text-center ">Total Particulares</h5>
                            <h5 class="text-center"><span class="badge badge-dark">{{$particulares}}</span></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 card-efect" style="margin-top: 10px"    >
                    <div class="card card-style">
                        <div class="card-header">
                            <span class="badge badge-warning" style="float: right">Hoy</span>
                            <br>
                            <h5 class="text-center ">Ingresos Totales</h5>
                            <h5 class="text-center"><span class="badge badge-dark">{{$ingresos}}</span></h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

<style>
    .card-style{
        transition: all 0.2s ease-in-out;
    }
    .card-efect{
        transition: 0.2s all ease-in-out;
    }


    .card-efect:hover .card-style {
        transform: scaleY(1.1) scaleX(1.1);
        z-index: 100;
        box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);
        background: #3a3a3a;
        color: white;
    }
</style>
