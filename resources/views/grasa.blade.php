
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
    <form name="f1" id="f1" action="">
        <fieldset>
            <legend>CALCULO DE LA GRASA CORPORAL</legend>
            <p>Imc:
                <input type="text" name="imc" id="imc" size="6" maxlength="4">
            </p>
            <p>Edad:
                <input type="text" name="edad"
                       id="edad" size="5"
                       maxlength="3">

            <P>Grasa:
                <input type="text" name="grasa"
                       id="grasa" size="5" maxlength="15">
            </P>
            <p>Diagnostico:<input type="text" name="leyenda" id="leyenda" size="42"></p>

            <input type="button" value="Calcular Grasa" onclick="calcularGRASA()"> <input type="button" value="Guardar Grasa" onclick="guardarGRASA()"></p></p>


        </fieldset>
    </form>





    </body>
    </html>




@endsection