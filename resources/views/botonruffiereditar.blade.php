@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
            <div class="intro-text">
                <!--<div class="intro-lead-in">Estudiantes</div-->
            </div>
        </div>
    </header>
    <nav aria-label="breadcrumb" style="margin:1%; margin-right:70%;">
        <ol class="breadcrumb" style="background-color: white">
            <li class="breadcrumb-item"><a href="/estudiantes">Estudiante</a></li>
            <li class="breadcrumb-item"><a href="{{route("ruffier.uni",["id"=>$cliente->id])}}">Ruffier</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
        </ol>
    </nav>
    <div class="container-xl clearfix px-2 mt-4">
        @if($cliente->id_tipo_cliente==1)
            <h2 style="margin-left: 1%">Expediente Estudiante</h2>
        @endif
        @if($cliente->id_tipo_cliente==3 )

            <h2 style="margin-left: 1%">Expediente Particular</h2>
        @endif
        @if($cliente->id_tipo_cliente==2)
            <h2 style="margin-left: 1%">Expediente Docente</h2>
        @endif
        <div class="col-md-1 col-md-2 col-12 float-md-left mr-5 pr-md-8 pr-xl-6">


            <img src="/clientes_imagenes/{{$cliente->imagen}}" width="200px" height="200px" style="margin-top: 10%; object-fit: cover">
            <div class="card margencard" style=" border: none;">


                <div>

                    <h5 style="margin-top: 10%">{{$cliente->nombre}}</h5>

                    <h6 style="all: revert">Ruffier</h6>


                </div>
            </div>
        </div>
            <div class="card" style="width: 170px; border: none;background: transparent;margin-left: 3%;margin-top: 5px">

            </div>
        <div class="btn-group mt-3 mb-5" style="margin-left: .1%;" role="group"
             aria-label="Button group with nested dropdown">
            @if($cliente->id_tipo_cliente==3||$cliente->id_tipo_cliente==1)

                <a class="btn btn-secondary btn-sm" @if($cliente->id_tipo_cliente==3)
                href="{{route("pagoparticulares",["id"=>$cliente->id])}}"
                   @endif
                   @if($cliente->id_tipo_cliente ==1)
                   href="{{route("pagoestudiantes",["id"=>$cliente->id])}}" @endif

                   @if($cliente->id_tipo_cliente ==2)
                   style="display: none;"
                        @endif >Pagos</a>

            @endif
            <a class="btn btn-secondary btn-sm" href="{{route("imc.ini",[$cliente->id])}}">MedidasAntropometricas</a>
            <a class="btn btn-secondary btn-sm" href="{{route("grasa.uni",["id"=>$cliente->id])}}">GrasaCorporal</a>
            <a class="btn btn-primary btn-sm" href="{{route("ruffier.uni",["id"=>$cliente->id])}}">Ruffier</a>


        </div>

        <script type="text/javascript">
            document.onreadystatechange = function () {

                if (document.readyState === "complete") {
                    calcularMVO2();
                }
            };

            function calcularRuffiel() {
                var pulso1 = parseFloat(document.getElementById("pulso_r").value);
                var pulso2 = parseFloat(document.getElementById("pulso_a").value);
                var pulso3 = parseFloat(document.getElementById("pulso_d").value);

                ruffiel = (pulso1 + pulso2 + pulso3 - 200) / 10;


                document.getElementById("ruffiel").value = ruffiel.toFixed(0);


                if (ruffiel > 16) {
                    leyenda = 1;

                    // grasa<=4 && grasa >= 2
                } else if (ruffiel > 11) {
                    leyenda =
                        2;

                } else if (ruffiel > 10) {
                    leyenda =
                        3;

                } else if (ruffiel >= 1) {
                    leyenda =
                        4;

                } else if (ruffiel == 0) {
                    leyenda =
                        5;

                } else {
                    leyenda = 6
                }


                document.getElementById("id_diagnostico").value = leyenda;
            }

            function calcularMVO2() {
                var mvo = parseFloat(document.getElementById("mvo").value);
                var mvoreal = parseFloat(document.getElementById("mvoreal").value);

                var mvodiagnostico = mvo - mvoreal;

                document.getElementById("mvodiagnostico").value = mvodiagnostico.toFixed(0);


            }</script>

        </head>


        <form name="id_imc" id="id_imc"
              style="font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'"
              method="post" action="@isset($dato){{route('ruffier.update', $dato->id)}}
        @endisset ">

            {{method_field('put')}}

            <h5 style="margin-top: -1%">Editar Calculo de Ruffier</h5>

            <div class="form-row mt-4">
                <div class="form-group col-md-6">
                    <h6 class=" label2" for="email" style="margin-top: -1%">Pulso en reposo</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" step="0.0001" id="pulso_r"
                           name="pulso_r" maxlength="3" placeholder="Ingrese su pulso" onkeyup="calcularRuffiel()"
                           @isset($dato)
                           value="{{$dato->pulso_r}}"
                           @endisset
                           value="{{old('pulso_r')}}"
                    >
                </div>


                <div class="form-group col-md-6">
                    <h6 class="label2" for="email" style="margin-top: -1%">Pulso en accion:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" step="0.0001"
                           id="pulso_a" name="pulso_a" maxlength="3" placeholder="Ingrese su pulso"
                           onkeyup="calcularRuffiel()"
                           @isset($dato)
                           value="{{$dato->pulso_a}}"
                           @endisset
                           value="{{old('pulso_a')}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <h6 class="label2" for="email" style="margin-top: 1%">Pulso en descanso:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" step="0.0001"
                           id="pulso_d" name="pulso_d" maxlength="3" placeholder="Ingrese el pulso"
                           onkeyup="calcularRuffiel()"
                           @isset($dato)
                           value="{{$dato->pulso_d}}"
                           @endisset
                           value="{{old('pulso_d')}}" required
                    >
                </div>

                <div class="form-group col-md-6">
                    <h6 class="label2" for="email" style="margin-top: 1%">Ruffier:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" step="0.0001"
                           id="ruffiel" name="ruffiel" maxlength="3"
                           @isset($dato)
                           value="{{$dato->ruffiel}}"
                           @endisset
                           value="{{old('ruffiel')}}" readonly
                    >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <h6 class="label2" for="email" style=" margin-top: 1%">MVO2:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" step="0.0001"
                           id="mvo" name="mvo" maxlength="3"
                           @isset($dato)
                           value="{{$dato->mvo}}"
                           @endisset
                           value="{{old('mvo')}}"
                    >
                </div>

                <div class="form-group col-md-6">
                    <h6 class="label2" for="email" style=" margin-top: 1%">MVO2 Real:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" step="0.0001"
                           id="mvoreal" name="mvoreal" maxlength="3" onkeyup="calcularMVO2()"

                           @isset($dato)
                           value="{{$dato->mvoreal}}"
                           @endisset
                           value="{{old('mvoreal')}}"
                    >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <h6 class="label2" for="email" style="margin-left: 49%; margin-top: 1%">Diagnostico MVO:</h6>
                    <input style="width: 310px; margin-left: 49%" type="number" class="form-control inputtamaño3" step="0.0001"
                           id="mvodiagnostico" name="mvodiagnostico" maxlength="3"
                           value="{{old(' mvodiagnostico')}}" readonly required>
                </div>

                <div class="form-group col-md-6">
                    <input style="width: 310px; display: none" type="hidden" class="form-control inputtamaño3" step="0.0001"
                           id="id_diagnostico" name="id_diagnostico" maxlength="50"
                           @isset($dato)
                           value="{{$dato->id_diagnostico}}"
                           @endisset
                           value="{{old('id_diagnostico')}}" readonly
                    >
                </div>
            </div>


            <input name="id_cliente" value="{{$id->id}}" type="hidden">
            <div class="container2">


                <a class="btn btn-primary my-2 boton"
                   href="{{route("ruffier.uni",["id"=>$id])}}">Cancelar</a>


                <button type="submit" class="btn btn-primary  boton3">Guardar</button>

            </div>
        </form>


    </div>
@endsection

