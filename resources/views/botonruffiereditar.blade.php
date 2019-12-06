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

    <div class="card" style="width: 170px; border: none;background: transparent;margin-left: 3%;margin-top: 5px">
        <div class="card-header" style="background: transparent;height: 50px;">
            <a class="btn btn-default" href="{{route("ruffier.uni",[$cliente->id])}}"><span><i class="fa fa-arrow-circle-left"></i></span> Regresar</a>

        </div>
    </div>

    <html>
    <head>
        <div class="w3-container w3-teal mx-5" style="margin-left: 4%">



                    <div class="card margencard" style=" border: none">


                        <div>


                @if($cliente->id_tipo_cliente==3 )

                    <H5> Expediente Particular</H5>
                @endif
                @if($cliente->id_tipo_cliente==2)
                    <H5> Expediente Docente</H5>

                @endif
                @if($cliente->id_tipo_cliente==1)
                    <H5> Expediente Estudiante</H5>
                @endif
                <h5 style="all: revert">Ruffier</h5>
                <h5>Nombre: {{$cliente->nombre}}</h5>

            </div>
        </div>
        </div>

        <div class="btn-group mt-3 mb-5" style="margin-left: 50px;" role="group" aria-label="Button group with nested dropdown">

            <a class="btn btn-secondary" @if($cliente->id_tipo_cliente==3)
            href="{{route("pagoparticulares",["id"=>$cliente->id])}}"
               @endif
               @if($cliente->id_tipo_cliente ==1)
               href="{{route("pagoestudiantes",["id"=>$cliente->id])}}" @endif

               @if($cliente->id_tipo_cliente ==2)
               style="display: none;"
                    @endif >Pagos</a>
            <a class="btn btn-secondary" href="{{route("imc.ini",[$cliente->id])}}">Imc</a>
            <a class="btn btn-secondary" href="{{route("grasa.uni",["id"=>$cliente->id])}}">Grasa</a>
            <a class="btn btn-primary" href="{{route("ruffier.uni",["id"=>$cliente->id])}}">Ruffier</a>


        </div>

        <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" >
        <title>FORMULARIO PESO IDEAL</title>
        <script type="text/javascript">function calcularRuffiel() {
                var pulso1 = parseFloat(document.getElementById("pulso_r").value);
                var pulso2 = parseFloat(document.getElementById("pulso_a").value);
                var pulso3 = parseFloat(document.getElementById("pulso_d").value);

                ruffiel = (pulso1 + pulso2 + pulso3 - 200) / 10;


                document.getElementById("ruffiel").value = ruffiel.toFixed(0);


                if (ruffiel > 16) {
                    leyenda = "Bajo ";

                    // grasa<=4 && grasa >= 2
                } else if (ruffiel > 11) {
                    leyenda =
                        "Mediano";

                } else if (ruffiel > 10) {
                    leyenda =
                        "Bueno";

                } else if (ruffiel > 5) {
                    leyenda =
                        "Muy bueno";

                } else if (ruffiel >= 1) {
                    leyenda =
                        "Muy Bueno";

                } else if (ruffiel == 0) {
                    leyenda =
                        "Muy Bueno";

                } else {
                    leyenda = "Algo salio mal"
                }


                document.getElementById("leyenda").value = leyenda;
            }
            function calcularMVO2() {
                var mvo= parseFloat(document.getElementById("mvo").value);
                var mvoreal= parseFloat(document.getElementById("mvoreal").value);

                var  mvodiagnostico=  mvo-mvoreal;

                document.getElementById("mvodiagnostico").value=mvodiagnostico.toFixed(0);





            }</script>

    </head>




        <form  name="id_imc" id="id_imc"
              style="font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'"
              method="post" action="@isset($dato){{route('ruffier.update', $dato->id)}}
        @endisset ">

            {{method_field('put')}}

            <h5 class=" ml-5 mt-4" >Editar Calculo de Ruffier</h5>

            <div class="form-row mt-4">
                <div class="form-group col-md-6">
                <h6 class=" label2" for="email">Pulso en reposo</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" id="pulso_r"
                           name="pulso_r" maxlength="3" placeholder="Ingrese su pulso" onkeyup="calcularRuffiel()"
                           @isset($dato)
                           value="{{$dato->pulso_r}}"
                            @endisset
                           value="{{old('pulso_r')}}"
                    >
                </div>


                <div class="form-group col-md-6">
                <h6 class="label2" for="email">Pulso en accion:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3"
                           id="pulso_a" name="pulso_a" maxlength="3" placeholder="Ingrese su pulso" onkeyup="calcularRuffiel()"
                           @isset($dato)
                           value="{{$dato->pulso_a}}"
                            @endisset
                            value="{{old('pulso_a')}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                <h6 class="label2" for="email">Pulso en descanso:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3"
                           id="pulso_d" name="pulso_d" maxlength="3"  placeholder="Ingrese el pulso" onkeyup="calcularRuffiel()"
                           @isset($dato)
                           value="{{$dato->pulso_d}}"
                            @endisset
                    value="{{old('pulso_d')}}" required
                    >
                </div>

                <div class="form-group col-md-6">
                <h6 class="label2" for="email">Ruffier:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3"
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
                <h6 class="label2" for="email">Diagnostico:</h6>
                    <input style="width: 310px" type="text" class="form-control inputtamaño3"
                           id="leyenda" name="leyenda" maxlength="50"
                           @isset($dato)
                           value="{{$dato->leyenda}}"
                            @endisset
                           value="{{old('leyenda')}}" readonly
                    >
                </div>

                <div class="form-group col-md-6">
                <h6 class="label2" for="email">MVO2:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3"
                           id="mvo" name="mvo" maxlength="3"
                           @isset($dato)
                           value="{{$dato->mvo}}"
                            @endisset
                    value="{{old('mvo')}}"
                    >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                <h6 class="label2" for="email">MVO2 Real:</h6>
                <input style="width: 310px" type="number" class="form-control inputtamaño3"
                           id="mvoreal" name="mvoreal" maxlength="3" onkeyup="calcularMVO2()"

                           @isset($dato)
                           value="{{$dato->mvoreal}}"
                            @endisset
                    value="{{old('mvoreal')}}"
                    >
                </div>

                <div class="form-group col-md-6">
                    <h6 class="label2" for="email">Diagnostico MVO:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3"
                           id="mvodiagnostico" name="mvodiagnostico" maxlength="3"
                           value="{{old(' mvodiagnostico')}}" readonly required >
                </div>
            </div>


            <input name="id_cliente" value="{{$id->id}}" type="hidden">
            <div class="container2">


                <button type="button" class="btn btn-primary my-2 boton"><a style="color: white"
                                                                            href="{{route("ruffier.uni",["id"=>$id])}}">Cancelar</a>

                </button>

                <button type="submit" class="btn btn-primary  boton3">Guardar</button>
            </div>
        </form>
    </div>

    </html>



@endsection

