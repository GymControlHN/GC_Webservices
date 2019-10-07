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
                ruffiel= (pulso1+pulso2+pulso3-200)/10 ;


                document.getElementById("ruffiel").value=ruffiel.toFixed(2);

                if (ruffiel == 0 ) {
                    leyenda="Muy bueno ";
                }
                else if (ruffiel<=5 ) {
                    leyenda=
                        "Muy bueno";

                }

                else if (ruffiel<=10 ) {
                    leyenda=
                        "Bueno";

                }
                else if (ruffiel<=15) {
                    leyenda=
                        "Mediano";

                }



                else if (ruffiel >= 15) {
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
    <form name="f1" id="f1" action="">
        <fieldset>
            <legend>CALCULO DEL RUFFIEL</legend>
            <p>Pulso en reposo:
                <input type="text" name="pulso1" id="pulso1" size="4" maxlength="4">
            </p>
            <p>Pulso en acción:
                <input type="text" name="pulso2" id="pulso2" size="4" maxlength="4">
            </p>
            <p>Pulso en descanso:
                <input type="text" name="pulso3u"
                       id="pulso3" size="2"
                       maxlength="3">
            <P>Ruffiel:
                <input type="text" name="ruffiel"
                       id="ruffiel" size="12" maxlength="15">
            </P>

            <p>Diagnostico:
                <input type="text" name="leyenda" id="leyenda" size="42"></p>

            <div>
                <input type="button" value="Calcular Ruffiel"  onclick="calcularRuffiel()" ><input type="button" value="Guardar Ruffiel"  onclick="guardarRuffiel()" ></p>
                </p>




            </div>




        </fieldset>
    </form>





    </body>
    </html>



@endsection