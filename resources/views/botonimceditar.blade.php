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

    <!DOCTYPE html>
    <html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
        <title>FORMULARIO PESO IDEAL</title>
        <script type="text/javascript">function calcularIMC() {
                peso = document.getElementById("peso").value;
                altura = document.getElementById("altura").value / 100;
                imc = peso / (altura * altura);
                document.getElementById("imc").value = imc.toFixed(0);


                if (imc > 40) {
                    leyenda = "Problema de obesidad tipo III";
                } else if (imc > 34.99) {
                    leyenda =
                        "Problema de obesidad tipo II";

                } else if (imc > 29.99) {
                    leyenda =
                        "problema de obesidad tipo I";

                } else if (imc > 18.49) {
                    leyenda =
                        "Peso normal";

                } else if (imc > 16.99) {
                    leyenda =
                        "Problema de delgadez";

                } else if (imc > 16.00) {
                    leyenda =
                        "Problema de delgadez severa";

                } else {
                    leyenda = "Algo salio mal"
                }
                document.getElementById("leyenda").value = leyenda;


            }</script>

    </head>

    <body>


    <div class="container">

        <form name="id_imc" id="id_imc"
              style="font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'"
              method="post" action="@isset($antecedente){{route('imc.update', $antecedente->id)}}
                @endisset
                ">

            {{method_field('put')}}

            <br><br>
            <h5 class="label2">Editar medidas antropometricas</h5>
            <br>


            <h6 class=" label2" for="email">Peso kg:</h6>
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="number" class="form-control inputtamaño3" id="peso"
                           name="peso" maxlength="3" placeholder="Ingrese el peso en kilogramos"
                           onkeyup="calcularIMC()"
                           @isset($antecedente)
                           value="{{$antecedente->peso}}"
                           @endisset
                           value="{{old('peso')}}">
                </div>
            </div>


            <h6 class="label2" for="email">Altura:</h6>
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="number" class="form-control inputtamaño3"
                           id="altura" name="altura" maxlength="3" placeholder="Ingrese la talla"
                           onkeyup="calcularIMC()"
                           @isset($antecedente)
                           value="{{$antecedente->altura}}"
                           @endisset
                           value="{{old('altura')}}">
                </div>

            </div>



            <h6 class="label2" for="email">Imc:</h6>
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="number" class="form-control inputtamaño3"
                           id="imc" name="imc" maxlength="3"
                           @isset($antecedente)
                           value="{{$antecedente->imc}}"
                           @endisset
                           value="{{old('imc')}}">
                </div>
            </div>


            <h6 class="label2" for="email">Diagnostico:</h6>
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="text" class="form-control inputtamaño3"
                           id="leyenda" name="leyenda" maxlength="50"
                           @isset($antecedente)
                           value="{{$antecedente->leyenda}}"
                           @endisset
                           value="{{old('leyenda')}}" >
                </div>
            </div>



            <h6 class="label2" for="email">Pecho:</h6>
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="number" class="form-control inputtamaño3"
                           name="pecho" id="pecho"
                           @isset($antecedente)
                           value="{{$antecedente->pecho}}"
                           @endisset
                           value="{{old('pecho')}}">
                </div>
            </div>

            <h6 class="label2" for="email">Brazo:</h6>
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="number" class="form-control inputtamaño3" name="brazo" id="brazo"
                           @isset($antecedente)
                           value="{{$antecedente->brazo}}"
                           @endisset
                           value="{{old('brazo')}}">
                </div>
            </div>

            <h6 class="label2" for="email">ABD-A:</h6>
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="number" class="form-control inputtamaño3"
                           name="ABD_A" id="ABD_A"
                           @isset($antecedente)
                           value="{{$antecedente->ABD_A}}"
                           @endisset
                           value="{{old('ABD_A')}}">
                </div>
            </div>

            <h6 class="label2" for="email">ABD-B:</h6>
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="number" class="form-control inputtamaño3"
                           name="ABD_B" id="ABD_B"
                           @isset($antecedente)
                           value="{{$antecedente->ABD_B}}"
                           @endisset
                           value="{{old('ABD_B')}}">
                </div>
            </div>

            <h6 class="label2" for="email">Cadera:</h6>
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="number" class="form-control inputtamaño3"
                           name="cadera" id="cadera"
                           @isset($antecedente)
                           value="{{$antecedente->cadera}}"
                           @endisset
                           value="{{old('cadera')}}">
                </div>
            </div>

            <h6 class="label2" for="email">Muslo:</h6>
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="number" class="form-control inputtamaño3"
                           name="muslo" id="muslo"
                           @isset($antecedente)
                           value="{{$antecedente->muslo}}"
                           @endisset
                           value="{{old('muslo')}}">
                </div>
            </div>

            <h6 class="label2" for="email">Pierna:</h6>
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="number" class="form-control inputtamaño3"
                           name="pierna" id="pierna"
                           @isset($antecedente)
                           value="{{$antecedente->pierna}}"
                           @endisset
                           value="{{old('pierna')}}">
                </div>

            </div>

            <div class="container">


                <h6 class="label2" for="email">Fecha:</h6>
                <div class="col-sm-10">
                    <input type="date" class="form-control inputtamaño3" id="fecha_de_ingreso" name="fecha_de_ingreso"
                           placeholder="Escriba la fecha de ingreso"
                           @isset($antecedente)
                           value="{{$antecedente->fecha_de_ingreso}}"
                           @endisset
                           value="{{old('fecha_de_ingreso')}}">
                </div>

            </div>



            <input name="id_cliente" value="{{$id->id}}" type="">

            <div class="container1">

                <button type="button" class="btn btn-primary my-4 boton"><a style="color: white"
                                                                            href="/imc">Cerrar</a></button>
                <button type="submit" class="btn btn-primary my-4 boton3">Guardar Cambios</button>
            </div>



        </form>
    </div>
    </body>


    </html>
@endsection