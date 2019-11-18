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
        <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
        <title>FORMULARIO PESO IDEAL</title>
        <script type="text/javascript">
            document.onreadystatechange= function () {

                if(document.readyState==="complete"){
                    calcularGrasa();
                }
            };



            function calcularGrasa() {
                imc = document.getElementById("imc").value;
                edad = document.getElementById("edad").value;
                grasa = ((1.2 * imc) + (0.23 * edad) - 10.8 - 5.4);
                document.getElementById("grasa").value = grasa.toFixed(0);

                var genero = document.getElementById("sexo").value;


                if(genero==="M"){
                    if (grasa > 26) {
                        leyenda = "Estas Obeso";
                    } else if (grasa > 18) {
                        leyenda =
                            "Tienes que perder grasa";
                    } else if (grasa > 14) {
                        leyenda =
                            "Porcentaje aceptable";
                    } else if (grasa > 6) {
                        leyenda =
                            "En forma";
                    } else if (grasa > 2) {
                        leyenda =
                            "Eres un atleta";
                    } else {
                        leyenda = "Algo salio mal"

                    }
                }else {
                    if (grasa > 32) {
                        leyenda = "Estas Obeso";
                    } else if (grasa > 25) {
                        leyenda =
                            "Tienes que perder grasa";
                    } else if (grasa > 21) {
                        leyenda =
                            "Porcentaje aceptable";
                    } else if (grasa > 14) {
                        leyenda =
                            "En forma";
                    } else if (grasa > 10) {
                        leyenda =
                            "Eres un atleta";
                    } else {
                        leyenda = "Algo salio mal"

                    }

                }







                document.getElementById("leyenda").value = leyenda;
            }


        </script>

    </head>

    <body>

    <div class="container">

        <input id="sexo" value="{{$edad->genero}}" type="hidden">


        <form name="f1" id="f1"
              style="font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'"
              method="POST" action="{{route('grasa.guardar')}}">

            {{csrf_field()}}

            <br><br>
            <h5 class="label2">Calculo de la grasa corporal</h5>
            <br>

            <div class="form-row">
                <div class="form-group col-md-6">
                <h6 class=" label2" for="email">IMC:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" required
                           id="imc"
                           name="imc" maxlength="3" placeholder="Ingrese su imc" onkeyup="calcularGrasa()"
                           @isset($imc)value="{{$imc->imc}}" readonly @endisset>
                </div>


                <div class="form-group col-md-6">
                    <h6 class="label2" for="email">Edad:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" required
                           id="edad" name="edad" maxlength="3" placeholder="Ingrese su edad" onkeyup="calcularGrasa()"

                           @isset($edad)value="{{$edad->edad}}" readonly @endisset>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <h6 class="label2" for="email">%Grasa:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" required
                           id="grasa" name="grasa" maxlength="3"
                           value="{{old('grasa')}}" readonly>

            </div>


                <div class="form-group col-md-6">
                    <h6 class="label2" for="email">Diagnostico:</h6>
                    <input style="width: 310px" type="text" class="form-control inputtamaño3" required
                           id="leyenda" name="leyenda" maxlength="50"
                           value="{{old('leyenda')}}"readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <h6 class="label2" for="email">Pc_tricipital:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" required
                           id="pc_tricipital" name="pc_tricipital" maxlength="3"
                           value="{{old('pc_tricipital')}}">

                </div>


                <div class="form-group col-md-6">
                    <h6 class="label2" for="email">Pc_Infraescrupural:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" required
                           id="pc_infraescapular" name="pc_infraescapular" maxlength="50"
                           value="{{old('pc_infraescapular')}}">

                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <h6 class="label2" for="email">Pc_Biciptal:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" required
                           id="pc_biciptal" name="pc_biciptal" maxlength="3"
                           value="{{old('pc_biciptal')}}">

                </div>


                <div class="form-group col-md-6">
                    <h6 class="label2" for="email">Pc_supra_Iliaco:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" required
                           id="pc_supra_iliaco" name="pc_supra_iliaco" maxlength="50"
                           value="{{old('pc_supra_iliaco')}}">

                </div>
            </div>

            <div class="form-group col-md-6">
            <h6 class="label2" for="email">Fecha:</h6>
                <input  style="width: 310px"  type="date" class="form-control inputtamaño3" required
                       id="fecha_de_ingreso" name="fecha_de_ingreso"
                       placeholder="Escriba la fecha de ingreso"
                       readonly
                       value="{{old('fecha_de_ingreso',$now->format('Y-m-d'))}}">

            </div>


            <input name="id" value="{{$id}}" type="hidden">
            <div class="container1">

                <button type="button" class="btn btn-primary my-4 boton"><a style="color: white" href="{{route("grasa.uni",["id"=>$id])}}">Cancelar</a>
                </button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>


        </form>

    </div>

    </body>
    </html>



@endsection