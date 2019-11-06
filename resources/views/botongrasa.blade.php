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

        <form name="f1" id="f1"
              style="font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'"
              method="POST" action="{{route('grasa.guardar')}}"
        >
            {{csrf_field()}}

        <br><br>
            <h5 class="label2">Calculo de la grasa corporal</h5>
            <br>

                <div class="form-group">
                    <h6 class=" label2" for="email">IMC:</h6>
                    <div class="col-sm-10">
                        <input type="number" class="form-control inputtamaño3" id="imc"
                               name="imc" maxlength="3" placeholder="Ingrese su pulso" onkeyup="calcularGrasa()"
                               value="{{old('imc')}}"
                        >
                    </div>

                </div>

                <div class="form-group">
                    <h6 class="label2" for="email">Edad:</h6>
                    <div class="col-sm-10">
                        <input type="number" class="form-control inputtamaño3"
                               id="edad" name="edad" maxlength="3" placeholder="Ingrese su pulso" onkeyup="calcularGrasa()"
                               value="{{old('edad')}}"

                        >
                    </div>
                </div>

                <div class="form-group">
                    <h6 class="label2" for="email">%Grasa:</h6>
                    <div class="col-sm-10">
                        <input type="number" class="form-control inputtamaño3"
                               id="grasa" name="grasa" maxlength="3"  disabled="true"
                               value="{{old('grasa')}}"

                        >
                    </div>
                </div>

                <div class="form-group">
                    <h6 class="label2" for="email">Diagnostico:</h6>
                    <div class="col-sm-10">
                        <input type="text" class="form-control inputtamaño3"
                               id="leyenda" name="leyenda" maxlength="50" disabled="true"
                               value="{{old('leyenda')}}"

                        >
                    </div>
                </div>

                <div class="form-group">
                    <h6 class="label2" for="email">Pc_tricipital:</h6>
                    <div class="col-sm-10">
                        <input type="number" class="form-control inputtamaño3"
                               id="pc_tricipital" name="pc_tricipital" maxlength="3"
                               value="{{old('pc_tricipital')}}"

                        >
                    </div>
                </div>

                <div class="form-group">
                    <h6 class="label2" for="email">Pc_Infraescrupural:</h6>
                    <div class="col-sm-10">
                        <input type="number" class="form-control inputtamaño3"
                               id="pc_infraescapular" name="pc_infraescapular" maxlength="50"
                               value="{{old('pc_infraescapular')}}"

                        >
                    </div>
                </div>

                <div class="form-group">
                    <h6 class="label2" for="email">Pc_Biciptal:</h6>
                    <div class="col-sm-10">
                        <input type="number" class="form-control inputtamaño3"
                               id="pc_biciptal" name="pc_biciptal" maxlength="3"
                               value="{{old('pc_biciptal')}}"

                        >
                    </div>
                </div>

                <div class="form-group">
                    <h6 class="label2" for="email">Pc_supra_Iliaco:</h6>
                    <div class="col-sm-10">
                        <input type="number" class="form-control inputtamaño3"
                               id="pc_supra_iliaco" name="pc_supra_iliaco" maxlength="50"
                               value="{{old('pc_supra_iliaco')}}"

                        >
                    </div>
                </div>

                <div class="container">



                    <h6 class="label2" for="email">Fecha:</h6>
                    <div class="col-sm-10">
                        <input type="date" class="form-control inputtamaño3" id="fecha_de_ingreso" name="fecha_de_ingreso"
                               placeholder="Escriba la fecha de ingreso"
                               value="{{old('fecha_de_ingreso')}}"

                        >
                    </div>

                </div>

                <div class="container1">

                    <button type="button" class="btn btn-primary my-4 boton"><a style="color: white" href="/grasa">Cancelar</a></button>
                    <button type="submit" class="btn btn-primary" >Guardar</button>
                </div>






    </form>

    </div>

    </body>
    </html>



@endsection