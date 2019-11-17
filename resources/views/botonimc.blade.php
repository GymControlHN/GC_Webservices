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
                        "Prblema de obesidad tipo II";

                } else if (imc > 29.99) {
                    leyenda =
                        "Problema de obesidad tipo I";

                } else if (imc > 18.49) {
                    leyenda =
                        "Peso normal";

                } else if (imc > 16.99) {
                    leyenda =
                        "Problema de delgadez";

                } else if (imc > 16.00) {
                    leyenda =
                        "Delgadez severa";

                } else {
                    leyenda = "Algo salio mal"
                }
                document.getElementById("leyenda").value = leyenda;


            }</script>

    </head>


    <div class="container">
        <div name="f1" id="f1"
              style="font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'"
              method="POST" action="{{route('imc.guardar')}}">
            {{csrf_field()}}

            <div class=" h">
            <h5 class="label2" >Agregar medidas antropometricas</h5>
            </div>


                <div class=" top">

            <div class="form-row">
                <div class="form-group col-md-4">
                    <h6 class=" label2" for="email">Peso kg:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" id="peso" required
                           name="peso" maxlength="3" placeholder="Ingrese el peso en kilogramos"
                           onkeyup="calcularIMC()" value="{{old('peso')}}">
                </div>

                <div class="form-group col-md-4">
                    <h6 class="label2" for="email">Altura:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3"
                           id="altura" name="altura" maxlength="3" placeholder="Ingrese la talla" required
                           onkeyup="calcularIMC()" value="{{old('altura')}}">

                </div>
                <div class="form-group col-md-4">
                    <h6 class="label2" for="email">Imc:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" required
                           id="imc" name="imc" maxlength="3" value="
                    {{old('imc')}}">
                </div>


            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <h6 class="label2" for="email">Diagnostico:</h6>
                    <input style="width: 310px" type="text" class="form-control inputtamaño3" required
                           id="leyenda" name="leyenda" maxlength="50" value="{{old('leyenda')}}">

                </div>


                <div class="form-group col-md-4">
                    <h6 class="label2" for="email">Pecho:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" required
                           name="pecho" id="pecho" value="{{old('peso')}}">
                </div>

                <div class="form-group col-md-4">
                    <h6 class="label2" for="email">Brazo:</h6>
                    <input style="width:310px" type="number" class="form-control inputtamaño3" required
                           name="brazo" id="brazo" value="{{old('brazo')}}">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-4">
                    <h6 class="label2" for="email">ABD-A:</h6>
                    <input style="width:310px" type="number" class="form-control inputtamaño3" required
                           name="ABD_A" id="ABD_A" value="{{old('ABD_A')}}">
                </div>

                <div class="form-group col-md-4">
                    <h6 class="label2" for="email">ABD-B:</h6>
                    <input style="width:310px" type="number" class="form-control inputtamaño3"
                           required name="ABD_B" id="ABD_B" value="{{old('ABD_B')}}">
                </div>
                <div class="form-group col-md-4">
                    <h6 class="label2" for="email">Cadera:</h6>
                    <input style="width:310px" type="number" class="form-control inputtamaño3" required
                           name="cadera" id="cadera" value="{{old('cadera')}}">
                </div>

            </div>


            <div class="form-row">
                <div class="form-group col-md-4">
                    <h6 class="label2" for="email">Muslo:</h6>
                    <input style="width:310px" type="number" class="form-control inputtamaño3" required
                           name="muslo" id="muslo" value="{{old('muslo')}}">
                </div>


                <div class="form-group col-md-4">
                    <h6 class="label2" for="email">Pierna:</h6>
                    <input style="width:310px" type="number" class="form-control inputtamaño3" required
                           name="pierna" id="pierna" value="{{old('pierna')}}">
                </div>

                <div class="form-group col-md-4">
                    <h6 class="label2" for="email">Fecha:</h6>
                    <input style="width:310px" type="date" class="form-control inputtamaño3" id="fecha_de_ingreso"
                           required
                           name="fecha_de_ingreso"
                           placeholder="Escriba la fecha de ingreso"
                           @isset($antecedente)
                           value="{{$antecedente->fecha_de_ingreso}}"
                           @endisset
                           value="{{old('fecha_de_ingreso', $now->format('Y-m-d'))}}">
                </div>
            </div>


            <input name="id" value="{{$id}}" type="hidden">
            <div class="container2">


                <button type="button" class="btn btn-primary my-4 boton"><a style="color: white"
                                                                            href="route{{'imc.ini'}}">Cancelar</a>
                </button>

                <button type="submit" class="btn btn-primary my-4 boton3">Guardar</button>
            </div>



        </form>
        </div>

    </div>
    </body>

    </div>
    </html>
@endsection