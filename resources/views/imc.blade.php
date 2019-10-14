
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

    <form name="f1" id="f1">
        <br><br>
        <h5 class="label2">Agregar medidas antropometricas</h5>
        <br>
        <form class="form-horizontal" action="/action_page.php">
            <div class="form-group">
                <h6 class=" label2" for="email">Peso kg:</h6>
                <div class="col-sm-10">
                    <input type="text" class="form-control inputtamaño" id="peso"
                           name="peso" maxlength="3" placeholder="Ingrese el peso en kilogramos">
                </div>
            </div>

            <div class="form-group">
                <h6 class="label2" for="email">Talla:</h6>
                <div class="col-sm-10">
                    <input type="text" class="form-control inputtamaño"
                           id="altura" name="altura" maxlength="3" placeholder="Ingrese la talla">
                </div>
            </div>

            <div class="form-group">
                <h6 class="label2" for="email">Imc:</h6>
                <div class="col-sm-10">
                    <input type="text" class="form-control inputtamaño"
                           id="imc" name="imc" maxlength="3">
                </div>
            </div>

            <div class="form-group">
                <h6 class="label2" for="email">Diagnostico:</h6>
                <div class="col-sm-10">
                    <input type="text" class="form-control inputtamaño"
                           id="leyenga" name="leyenda" maxlength="50">
                </div>
            </div>
            <div class="form-group">
                <h6 class="label2" for="email">Pecho:</h6>
                <div class="col-sm-10">
                    <input type="text" class="form-control inputtamaño">
                </div>
            </div>
            <div class="form-group">
                <h6 class="label2" for="email">Brazo:</h6>
                <div class="col-sm-10">
                    <input type="text" class="form-control inputtamaño">
                </div>
            </div>
            <div class="form-group">
                <h6 class="label2" for="email">ABD-A:</h6>
                <div class="col-sm-10">
                    <input type="text" class="form-control inputtamaño">
                </div>
            </div>
            <div class="form-group">
                <h6 class="label2" for="email">ABD-B:</h6>
                <div class="col-sm-10">
                    <input type="text" class="form-control inputtamaño">
                </div>
            </div>
            <div class="form-group">
                <h6 class="label2" for="email">Cadera:</h6>
                <div class="col-sm-10">
                    <input type="text" class="form-control inputtamaño">
                </div>
            </div>
            <div class="form-group">
                <h6 class="label2" for="email">Muslo:</h6>
                <div class="col-sm-10">
                    <input type="text" class="form-control inputtamaño">
                </div>
            </div>
            <div class="form-group">
                <h6 class="label2" for="email">Pierna:</h6>
                <div class="col-sm-10">
                    <input type="text" class="form-control inputtamaño">
                </div>
            </div>
            <input type="button" class="btn btn-primary my-4 boton" value="Calcular IMC" onclick="calcularIMC()">
            <input type="button" class="btn btn-primary my-4 boton1" value="Guardar" onclick="calcularIMC()">
    </form>
    </form>
    </body>
    </html>
@endsection
