@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
            <div class="intro-text">
                <!--div class="intro-lead-in">Estudiantes</div-->
            </div>
        </div>
    </header>

    <div class="card" style="width: 170px; border: none;background: transparent;margin-left: 50px;margin-top: 5px">
        <div class="card-header" style="background: transparent;height: 50px;">
            <a class="btn btn-default" href="{{route("ruffier.uni",[$cliente->id])}}"><span><i class="fa fa-arrow-circle-left"></i></span> Regresar</a>

        </div>
    </div>

    <div class="w3-container w3-teal mx-5">



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


    <html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" >
        <title>FORMULARIO PESO IDEAL</title>
        <script type="text/javascript">function calcularRuffiel(){
                var pulso1= parseFloat(document.getElementById("pulso_r").value);
                var pulso2= parseFloat(document.getElementById("pulso_a").value);
                var pulso3= parseFloat(document.getElementById("pulso_d").value);

                ruffiel= (pulso1+pulso2+pulso3-200)/10;



                document.getElementById("ruffiel").value=ruffiel.toFixed(0);



                if (ruffiel > 16 ) {
                    leyenda="Bajo ";

                    // grasa<=4 && grasa >= 2
                }
                else if (ruffiel>11 ) {
                    leyenda=
                        "Mediano";

                }

                else if (ruffiel>10 ) {
                    leyenda=
                        "Bueno";

                }


                else if (ruffiel>5) {
                    leyenda=
                        "Muy bueno";

                }



                else if ( ruffiel >=1) {
                    leyenda=
                        "Muy Bueno";

                }
                else if ( ruffiel==0) {
                    leyenda=
                        "Excelente";

                }


                else{
                    leyenda="Algo salio mal"
                }





                document.getElementById("leyenda").value=leyenda;

            }

        function calcularMVO2() {
            var mvo= parseFloat(document.getElementById("mvo").value);
            var mvoreal= parseFloat(document.getElementById("mvoreal").value);

           var  mvodiagnostico=   mvo - mvoreal;

            document.getElementById("mvodiagnostico").value=mvodiagnostico.toFixed(0);



        }

        </script>

    </head>

<script type="text/javascript">

</script>

<div class="container">

        <form name="f1" id="f1" method="POST" action="{{route('ruffier.guardar')}}" onsubmit="return medir()">

            <input name="_token" value="{{csrf_token()}}" type="hidden">


            <h5 class="ml-5 mt-4">Calculo de Ruffier</h5>

            <div class="form-row mt-4">
                <div class="form-group col-md-6">
                    <h6 class=" label2" for="email">Pulso en reposo</h6>
                        <input style="width: 310px" type="number" class="form-control inputtamaño3" id="pulso_r"
                               name="pulso_r" maxlength="3" placeholder="Ingrese su pulso" onkeyup="calcularRuffiel()"
                              value="{{old('pulso_r')}}" required

                        >
                    </div>


                <div class="form-group col-md-6">
                    <h6 class="label2" for="email">Pulso en accion:</h6>
                        <input style="width: 310px" type="number" class="form-control inputtamaño3"
                               id="pulso_a" name="pulso_a" maxlength="3" placeholder="Ingrese su pulso" onkeyup="calcularRuffiel()"
                              value="{{old('pulso_a')}}" required>
                    </div>
                </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <h6 class="label2" for="email">Pulso en descanso:</h6>
                        <input style="width: 310px" type="number" class="form-control inputtamaño3"
                               id="pulso_d" name="pulso_d" maxlength="3"  placeholder="Ingrese el pulso" onkeyup="calcularRuffiel()"
                              value="{{old('pulso_d')}}" required>
                </div>

                    <div class="form-group col-md-6">
                    <h6 class="label2" for="email">Ruffier:</h6>
                        <input style="width: 310px" type="number" class="form-control inputtamaño3"
                               id="ruffiel" name="ruffiel" maxlength="3"
                             value="{{old('ruffiel')}}" readonly required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                    <h6 class="label2" for="email">Diagnostico:</h6>
                        <input style="width: 310px" type="text" class="form-control inputtamaño3"
                               id="leyenda" name="leyenda" maxlength="50"
                            value="{{old('leyenda')}}" readonly required>
                    </div>

                   <div class="form-group col-md-6">
                    <h6 class="label2" for="email">MVO2:</h6>
                        <input style="width: 310px" type="number" class="form-control inputtamaño3"
                               id="mvo" name="mvo" maxlength="3"
                              value="{{old('mvo')}}" required placeholder="Ingrese fuerza pulmonar">
                    </div>
                </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                    <h6 class="label2" for="email">MVO2 Real:</h6>
                        <input style="width: 310px" type="number" class="form-control inputtamaño3"
                               id="mvoreal" name="mvoreal" maxlength="3" onkeyup="calcularMVO2()"

                               value="{{old('mvoreal')}}" required placeholder="Ingrese fuerza pulmonar">
                    </div>

                        <div class="form-group col-md-6">
                            <h6 class="label2" for="email">Diagnostico MVO:</h6>
                            <input style="width: 310px" type="number" class="form-control inputtamaño3"
                                   id="mvodiagnostico" name="mvodiagnostico" maxlength="3"
                                   value="{{old(' mvodiagnostico')}}" readonly required >
                        </div>
                    </div>




            <div class="form-row">
                        <div class="form-group col-md-5">
                    <h6 class="label2" for="email">Fecha:</h6>
                        <input style="width: 310px" type="date" class="form-control inputtamaño3" id="fecha_de_ingreso" name="fecha_de_ingreso"
                               placeholder="Escriba la fecha de ingreso"
                               @isset($antecedente)
                               value="{{$antecedente->fecha_de_ingreso}}"
                               @endisset
                               value="{{old('fecha_de_ingreso', $now->format('Y-m-d'))}}" readonly
                        >

                        </div>
                </div>


                <input name="id" value="{{$id}}" type="hidden">

            <div class="container2">


                <button type="button" class="btn btn-primary my-2 boton"><a style="color: white"
                                                                            href="{{route("ruffier.uni",["id"=>$id])}}">Cancelar</a>

                </button>

                <button type="submit" class="btn btn-primary  boton3" onclick="medir()">Guardar</button>
            </div>
        </form>
</div>


    </html>



@endsection

