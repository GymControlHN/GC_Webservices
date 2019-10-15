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
                pulso1=document.getElementById("pulso1").value;
                pulso2=document.getElementById("pulso2").value;
                pulso3=document.getElementById("pulso3").value;
                ruffiel= (pulso1+pulso2+pulso3-200)/10;


                document.getElementById("ruffiel").value=ruffiel.toFixed(2).slice(4);

                if (ruffiel <=1 || ruffiel >= 0 ) {
                    leyenda="Muy bueno ";

                   // grasa<=4 && grasa >= 2
                }
                else if (ruffiel<=5 || ruffiel >=1 ) {
                    leyenda=
                        "Muy bueno";

                }

                else if (ruffiel<=10  || ruffiel >=5 ) {
                    leyenda=
                        "Bueno";

                }
                else if (ruffiel<=15 || ruffiel >=10) {
                    leyenda=
                        "Mediano";

                }



                else if (ruffiel <= 20 || ruffiel >=15) {
                    leyenda=
                        "Bajo";

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
        <h5 class="label2">Calculo de Ruffier</h5>
        <br>
        <form class="form-horizontal" action="/action_page.php">
            <div class="form-group">
                <h6 class=" label2" for="email">Pulso en reposo</h6>
                <div class="col-sm-10">
                    <input type="number" class="form-control inputtamaño3" id="pulso1"
                           name="pulso1" maxlength="3" placeholder="Ingrese su pulso" onkeyup="calcularRuffiel()">
                </div>

            </div>

            <div class="form-group">
                <h6 class="label2" for="email">Pulso en accion:</h6>
                <div class="col-sm-10">
                    <input type="number" class="form-control inputtamaño3"
                           id="pulso2" name="pulso2" maxlength="3" placeholder="Ingrese su pulso" onkeyup="calcularRuffiel()">
                </div>
            </div>

            <div class="form-group">
                <h6 class="label2" for="email">Pulso en descanso:</h6>
                <div class="col-sm-10">
                    <input type="number" class="form-control inputtamaño3"
                           id="pulso3" name="pulso3" maxlength="3"  placeholder="Ingrese el pulso" onkeyup="calcularRuffiel()">
                </div>
            </div>

            <div class="form-group">
                <h6 class="label2" for="email">Ruffier:</h6>
                <div class="col-sm-10">
                    <input type="number" class="form-control inputtamaño3"
                           id="ruffiel" name="ruffiel" maxlength="3"  disabled="true" >
                </div>
            </div>

            <div class="form-group">
                <h6 class="label2" for="email">Diagnostico:</h6>
                <div class="col-sm-10">
                    <input type="text" class="form-control inputtamaño3"
                           id="leyenda" name="leyenda" maxlength="50" disabled="true">
                </div>
            </div>

            <input type="button" class="btn btn-primary my-4 boton" value="Guardar"   onclick="calcularRuffiel()">

        </form>
    </form>



</div>

    </body>
    </html>



@endsection