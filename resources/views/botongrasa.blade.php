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
        <script type="text/javascript">function calcularGrasa(){
                imc= document.getElementById("imc").value;
                edad= document.getElementById("edad").value;



                grasa=((1.2*imc)+(0.23*edad)-10.8-5.4);


                document.getElementById("grasa").value=grasa.toFixed(2);



                if (grasa >  26) {
                    leyenda="Estas Obeso";
                }
                else if (grasa> 18 ) {
                    leyenda =
                        "Tienes que cuidarte y comenzar un plan de perdida de grasa";
                }
                else if (grasa> 14 ) {
                    leyenda =
                        "Se consideran valores de grasas adecuados, pero no nos podemos descuidar";
                }
                else if (grasa> 6 ) {
                    leyenda =
                        "En forma";
                }

                else if (grasa> 2 ) {
                    leyenda =
                        "Eres un atleta";
                }
                else{
                    leyenda="Algo salio mal"

                }


                document.getElementById("leyenda").value=leyenda;

            }</script>

    </head>

    <body>

    <div class="container" >

        <br><br>
        <div>
            <h5 class="label2">Calculo de la grasa corporal</h5>
            <br>
            <form method="post" action="
           @isset($grasa)
            {{ route('grasa.update', $grasa->id ) }}
            @endisset

            @empty($grasa)
            {{ route('grasa.guardar') }}
            @endempty
                    ">

                {{method_field('put')}}
                <div class="form-group">
                    <h6 class=" label2" for="email">IMC:</h6>
                    <div class="col-sm-10">
                        <input type="number" class="form-control inputtamaño3" id="imc"
                               name="imc" maxlength="3" placeholder="Ingrese su pulso" onkeyup="calcularGrasa()">
                    </div>

                </div>

                <div class="form-group">
                    <h6 class="label2" for="email">Edad:</h6>
                    <div class="col-sm-10">
                        <input type="number" class="form-control inputtamaño3"
                               id="edad" name="edad" maxlength="3" placeholder="Ingrese su pulso" onkeyup="calcularGrasa()">
                    </div>
                </div>



                <div class="form-group">
                    <h6 class="label2" for="email">%Grasa:</h6>
                    <div class="col-sm-10">
                        <input type="number" class="form-control inputtamaño3"
                               id="grasa" name="grasa" maxlength="3"  disabled="true" >
                    </div>
                </div>

                <div class="form-group">
                    <h6 class="label2" for="email">Diagnostico:</h6>
                    <div class="col-sm-10">
                        <input type="text" class="form-control inputtamaño3"
                               id="leyenda" name="leyenda" maxlength="50" disabled="true">
                    </div>
                </div>

                <div class="container">



                    <h6 class="label2" for="email">Fecha:</h6>
                    <div class="col-sm-10">
                        <input type="date" class="form-control inputtamaño3" id="fecha_de_ingreso" name="fecha_de_ingreso"
                               placeholder="Escriba la fecha de ingreso"
                               @isset($estudiante)
                               value="{{$estudiante->fecha_de_ingreso}}"
                                @endisset
                        >
                    </div>

                </div>

                <div class="container1">

                    <button type="button" class="btn btn-primary my-4 boton"><a style="color: white" href=" {{ route('grasa') }} ">Cancelar</a></button>
                    <button type="button" class="btn btn-primary my-4 boton3">Guardar</button>
                </div>



        </form>

        </div>

    </div>

    </body>
    </html>



@endsection