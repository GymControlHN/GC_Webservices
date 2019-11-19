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

            }</script>

    </head>



<div class="container">

        <form name="f1" id="f1" method="POST" action="{{route('ruffier.guardar')}}">

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
                              value="{{old('mvo')}}" required>
                    </div>
                </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                    <h6 class="label2" for="email">MVO2 Real:</h6>
                        <input style="width: 310px" type="number" class="form-control inputtamaño3"
                               id="mvoreal" name="mvoreal" maxlength="3"

                               value="{{old('mvoreal')}}" required>
                    </div>

                        <div class="form-group col-md-6">
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
                                                                            href="{{route("grasa.uni",["id"=>$id])}}">Cancelar</a>

                </button>

                <button type="submit" class="btn btn-primary  boton3">Guardar</button>
            </div>
        </form>
</div>


    </html>



@endsection

