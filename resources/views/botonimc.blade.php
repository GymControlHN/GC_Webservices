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



    <div class="card" style="width: 170px; border: none;background: transparent;margin-left: 3%;margin-top: 5px">
        <div class="card-header" style="background: transparent;height: 50px;">
            <a class="btn btn-default" href="{{route("imc.ini",[$cliente->id])}}"><span><i
                            class="fa fa-arrow-circle-left"></i></span> Regresar</a>

        </div>
    </div>

    <div class="w3-container w3-teal mx-5;">


        <div class="card margencard" style=" border: none; margin-left: 3%">


            <div>
                @if($cliente->id_tipo_cliente==3 )

                    <H5> Expediente Particular</H5>
                @endif
                @if($cliente->id_tipo_cliente==2)
                    <H5> Expediente Docente</H5>

                @endif
                @if($cliente->id_tipo_cliente==1)
                    <H5> Expediente Estudiante</H5>
                @endif
                <h5 style="all: revert">Medida Antropometrica</h5>
                <h5>Nombre: {{$cliente->nombre}}</h5>

            </div>
        </div>
    </div>

    <div class="btn-group mt-3 mb-5" style="margin-left: 3%;" role="group"
         aria-label="Button group with nested dropdown">


        @if($cliente->id_tipo_cliente==3||$cliente->id_tipo_cliente==1)
            <a class="btn btn-secondary" @if($cliente->id_tipo_cliente==3)
            href="{{route("pagoparticulares",["id"=>$cliente->id])}}"
               @endif
               @if($cliente->id_tipo_cliente ==1)
               href="{{route("pagoestudiantes",["id"=>$cliente->id])}}"
               @endif

               @if($cliente->id_tipo_cliente ==2)
               style="display: none;"
                    @endif >Pagos</a>
        @endif
        <a class="btn btn-primary" href="{{route("imc.ini",[$cliente->id])}}">Imc</a>
        <a class="btn btn-secondary" href="{{route("grasa.uni",["id"=>$cliente->id])}}">Grasa</a>
        <a class="btn btn-secondary" href="{{route("ruffier.uni",["id"=>$cliente->id])}}">Ruffier</a>


    </div>

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
                    leyenda =
                        1;
                } else if (imc > 34.99) {
                    leyenda =
                        2;

                } else if (imc > 29.99) {
                    leyenda =
                        3;

                } else if (imc > 24.99) {
                    leyenda =
                        4;

                } else if (imc > 18.49) {
                    leyenda =
                        5;

                } else if (imc > 16.99) {
                    leyenda =
                        6;

                } else if (imc > 16.00) {
                    leyenda =
                        7;

                } else {
                    leyenda = 8
                }
                document.getElementById("leyenda").value = leyenda;


            }</script>

    </head>


    <form name="f1" id="f1"
          style="font-family: 'Montserrat', -apple-system,
           BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif,
            'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'"
          method="POST" action="{{route('imc.guardar')}}">
        {{csrf_field()}}


        <div class="margeneditar">
            <h5 class="label2" style="margin-left: 3%">Agregar medidas antropometricas</h5>
            <div class="form-row mt-4">
                <div class="form-group col-md-4">
                    <h6 class=" label2" for="email">Peso kg:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" id="peso" required
                           name="peso" maxlength="3" placeholder="Ingrese el peso en kilogramos"
                           onkeyup="calcularIMC()" value="{{old('peso')}}">
                </div>

                <div class="form-group col-md-4">
                    <h6 class="label2" for="email">Altura:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3"
                           id="altura" name="altura" maxlength="3" placeholder="Ingrese la talla en cm" required
                           onkeyup="calcularIMC()" value="{{old('altura')}}">

                </div>


                <div class="form-group col-md-4">
                    <h6 class="label2" for="email">Pecho:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" required
                           name="pecho" id="pecho" value="{{old('peso')}}" placeholder="Ingrese la talla en cm">
                </div>

                <div class="form-group col-md-4">
                    <h6 class="label2" for="email">Brazo:</h6>
                    <input style="width:310px" type="number" class="form-control inputtamaño3" required
                           name="brazo" id="brazo" value="{{old('brazo')}}" placeholder="Ingrese la talla en cm">
                </div>
                <div class="form-group col-md-4">
                    <h6 class="label2" for="email">ABD-A:</h6>
                    <input style="width:310px" type="number" class="form-control inputtamaño3" required
                           name="ABD_A" id="ABD_A" value="{{old('ABD_A')}}" placeholder="Ingrese la talla en cm">
                </div>

                <div class="form-group col-md-4">
                    <h6 class="label2" for="email">ABD-B:</h6>
                    <input style="width:310px" type="number" class="form-control inputtamaño3"
                           required name="ABD_B" id="ABD_B" value="{{old('ABD_B')}}"
                           placeholder="Ingrese la talla en cm">
                </div>
                <div class="form-group col-md-4">
                    <h6 class="label2" for="email">Cadera:</h6>
                    <input style="width:310px" type="number" class="form-control inputtamaño3" required
                           name="cadera" id="cadera" value="{{old('cadera')}}" placeholder="Ingrese la talla en cm">
                </div>

                <div class="form-group col-md-4">
                    <h6 class="label2" for="email">Muslo:</h6>
                    <input style="width:310px" type="number" class="form-control inputtamaño3" required
                           name="muslo" id="muslo" value="{{old('muslo')}}" placeholder="Ingrese la talla en cm">
                </div>


                <div class="form-group col-md-4">
                    <h6 class="label2" for="email">Pierna:</h6>
                    <input style="width:310px" type="number" class="form-control inputtamaño3" required
                           name="pierna" id="pierna" value="{{old('pierna')}}" placeholder="Ingrese la talla en cm">
                </div>

            </div>

        </div>


        <input name="id" value="{{$id}}" type="hidden">
        <div class="container2">


            <a class="btn btn-primary my-2 boton"
               href="{{route("imc.ini",["id"=>$id])}}">Cancelar</a>



            <button type="submit" class="btn btn-primary  boton3">Guardar</button>
        </div>


        <div class="form-group col-md-4">
            <h6 class="label2" for="email"></h6>
            <input style="width: 310px;display: none;" type="hidden" class="form-control inputtamaño3"
                   id="imc" name="imc" value="
                    {{old('imc')}}">
        </div>


        <div class="form-row">
            <div class="form-group col-md-4">
                <h6 class="label2" for="email"></h6>
                <input style="width: 310px" type="hidden" class="form-control inputtamaño3"
                       id="leyenda" name="id_diagnostico" value="{{old('id_diagnostico')}}">

            </div>
        </div>


    </form>

    </div>
    </html>
@endsection