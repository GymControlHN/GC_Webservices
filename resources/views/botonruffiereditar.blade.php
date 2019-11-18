@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Estudiantes</div>
            </div>
        </div>
    </header>

    <html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" >
        <title>FORMULARIO PESO IDEAL</title>
        <script type="text/javascript">function calcularRuffiel(){
                var pulso1= parseFloat(document.getElementById("pulso1").value);
                var pulso2= parseFloat(document.getElementById("pulso2").value);
                var pulso3= parseFloat(document.getElementById("pulso3").value);

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



                else if ( ruffiel>1) {
                    leyenda=
                        "Muy Bueno";

                }


                else{
                    leyenda="Algo salio mal"
                }





                document.getElementById("leyenda").value=leyenda;

            }</script>

    </head>

    <body>

    <div class="container mr-5 ">

        <form  name="id_imc" id="id_imc"
              style="font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'"
              method="post" action="@isset($dato){{route('ruffier.update', $dato->id)}}
        @endisset ">

            {{method_field('put')}}

            <h5 class=" ml-5 mt-4" >Calculo de Ruffier</h5>

            <div class="form-row mt-4">
                <div class="form-group col-md-6">
                <h6 class=" label2" for="email">Pulso en reposo</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" id="pulso1"
                           name="pulso1" maxlength="3" placeholder="Ingrese su pulso" onkeyup="calcularRuffiel()"
                           @isset($dato)
                           value="{{$dato->pulso1}}"
                            @endisset
                    >
                </div>

                <div class="form-group col-md-6">
                <h6 class="label2" for="email">Pulso en accion:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3"
                           id="pulso2" name="pulso2" maxlength="3" placeholder="Ingrese su pulso" onkeyup="calcularRuffiel()"
                           @isset($dato)
                           value="{{$dato->pulso2}}"
                            @endisset>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                <h6 class="label2" for="email">Pulso en descanso:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3"
                           id="pulso3" name="pulso3" maxlength="3"  placeholder="Ingrese el pulso" onkeyup="calcularRuffiel()"
                           @isset($dato)
                           value="{{$dato->pulso3}}"
                            @endisset>
                </div>

                <div class="form-group col-md-6">
                <h6 class="label2" for="email">Ruffier:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3"
                           id="ruffiel" name="ruffiel" maxlength="3"
                           @isset($dato)
                           value="{{$dato->ruffiel}}"
                            @endisset>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                <h6 class="label2" for="email">Diagnostico:</h6>
                    <input style="width: 310px" type="text" class="form-control inputtamaño3"
                           id="leyenda" name="clasificacion" maxlength="50"
                           @isset($dato)
                           value="{{$dato->clasificacion}}"
                            @endisset
                    >
                </div>

                <div class="form-group col-md-6">
                <h6 class="label2" for="email">MVO2:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3"
                           id="mvo" name="mvo" maxlength="3"
                           @isset($dato)
                           value="{{$dato->mvo}}"
                            @endisset >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                <h6 class="label2" for="email">MVO2 Real:</h6>
                <input style="width: 310px" type="number" class="form-control inputtamaño3"
                           id="mvo2" name="mvor" maxlength="3"

                           @isset($dato)
                           value="{{$dato->mvor}}"
                            @endisset>
                </div>


                <div class="form-group col-md-6">
                <h6 class="label2" for="email">Fecha:</h6>
                    <input style="width: 310px" type="date" class="form-control inputtamaño3" id="fecha_de_ingreso" name="fecha_de_ingreso"
                           placeholder="Escriba la fecha de ingreso"

                           @isset($dato)
                           value="{{$dato->fecha_de_ingreso}}"
                            @endisset
                    >


                   </div>
            </div>

            <input name="id" value="{{$id->id}}" type="hidden">
            <div class="container1">

                <button type="button" class="btn btn-primary my-4 boton"><a style="color: white" href="ruffiel">Cancelar</a></button>
                <button type="submit" class="btn btn-primary my-4 boton3">Guardar</button>
            </div>



        </form>
    </div>

    </body>
    </html>



@endsection

