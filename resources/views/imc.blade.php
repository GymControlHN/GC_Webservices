
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
    <!-- Header -->

    <!DOCTYPE html public>
    <html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" >
        <title>FORMULARIO PESO IDEAL</title>
        <script type="text/javascript">function calcularIMC(){
                peso=document.getElementById("peso").value;
                altura=document.getElementById("altura").value/100;
                imc=peso/(altura*altura);
                document.getElementById("imc").value=imc.toFixed(2);

                if (imc>40) {
                    leyenda="Tu diagnostico es problema de obesidad tipo III" + (altura* altura*40-peso).toFixed(1)+"kilos";
                }
                else if (imc>34.99) {
                    leyenda=
                        "Tu diagnostico es problema de obisidad tipo II" + (altura* altura*34.99-peso).toFixed(1)+"kilos";

                }

                else if (imc>29.99) {
                    leyenda=
                        "Tu diagnostico es problema de obisidad tipo I" + (altura* altura*29.99-peso).toFixed(1)+"kilos";

                }

                else if (imc>18.49) {
                    leyenda=
                        "Tu diagnostico es peso normal" + (altura* altura*18.49-peso).toFixed(1)+"kilos";

                }

                else if (imc>16.99) {
                    leyenda=
                        "Tu diagnostico es problema de delgadez" + (altura* altura*16.99-peso).toFixed(1)+"kilos";

                }

                else if (imc>16.00) {
                    leyenda=
                        "Tu diagnostico es problema de delgadez severa" + (altura* altura*16.00-peso).toFixed(1)+"kilos";

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
            <legend>CALCULO DEL PESO IDEAL IMC (Indice de Masa Corporal)</legend>
            <p>Peso en kg:
                <input type="text" name="peso" id="peso" size="5" maxlength="4">
            </p>
            <p>Altura en cm:
                <input type="text" name="altura"
                       id="altura" size="3"
                       maxlength="3">

            <P>IMC:
                <input type="text" name="imc"
                       id="imc" size="11" maxlength="15">
            </P>

            <p>
                Leyenda:<input type="text" name="leyenda" id="leyenda" size="50">
            </p>


            <input type="button" value="Calcular IMC" onclick="calcularIMC()">  <input type="button" value="Guardar IMC" onclick="GuardarIMC()"></p></p>





        </fieldset>
    </form>





    </body>
    </html>
@endsection
