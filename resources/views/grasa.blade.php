
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
        <script type="text/javascript">function calcularGRASA(){
                imc=document.getElementById("imc").value;
                edad=document.getElementById("edad").value;
                grasa=((1.2*imc)+(0.23 * edad) -10.8 - 5.4);
                document.getElementById("grasa").value=grasa.toFixed(2);

                if (grasa<=4 && grasa >= 2 ) {
                    leyenda="Cantidad minima de grasa ";
                }
                else if (grasa<=13 && grasa >= 6) {
                    leyenda=
                        "Tienes la condicion de un atleta";

                }

                else if (grasa<=17 && grasa >= 14) {
                    leyenda=
                        "En forma";

                }
                else if (grasa<=25 && grasa >= 15) {
                    leyenda=
                        "Valores de grasas aceptables, pero no te descuides";

                }



                else if (grasa<=32 && grasa >= 26) {
                    leyenda=
                        "Estas obeso";

                }


                else{
                    leyenda="Algo salio mal"
                }
                document.getElementById("leyenda").value=leyenda;



            }</script>

    </head>

    <body>

<div class="container">
    <form name="f1" id="f1">
        <br><br>
        <h5 class="label2">Calculo de la Grasa Corporal</h5>
        <br>
        <form class="form-horizontal" action="/action_page.php">
            <div class="form-group">
                <h6 class=" label2" for="email">IMC</h6>
                <div class="col-sm-10">
                    <input type="number" class="form-control inputtamaño3" id="imc"
                           name="imc" maxlength="3" placeholder="Ingrese su masa corporal" onkeyup="calcularGRASA()">
                </div>

            </div>

            <div class="form-group">
                <h6 class="label2" for="email">Edad:</h6>
                <div class="col-sm-10">
                    <input type="number" class="form-control inputtamaño3"
                           id="edad" name="edad" maxlength="3" placeholder="Ingrese su edad" onkeyup="calcularGRASA()">
                </div>
            </div>

            <div class="form-group">
                <h6 class="label2" for="email">Grasa:</h6>
                <div class="col-sm-10">
                    <input type="number" class="form-control inputtamaño3"
                           id="grasa" name="grasa" maxlength="3"  disabled="true">
                </div>
            </div>

            <div class="form-group">
                <h6 class="label2" for="email">Diagnostico:</h6>
                <div class="col-sm-10">
                    <input type="text" class="form-control inputtamaño3"
                           id="leyenda" name="leyenda" maxlength="50"  disabled="true">
                </div>
            </div>

            <input type="button" class="btn btn-primary my-4 boton" value="Guardar" onclick="calcularGRASA()">

        </form>
    </form>
</div>





    </body>
    </html>




@endsection