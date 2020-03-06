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
    <div class="container-xl clearfix px-2 mt-4">
        <div class="col-md-1 col-md-2 col-12 float-md-left mr-5 pr-md-8 pr-xl-6">


        <img src="/clientes_imagenes/{{$cliente->imagen}}" width="200px" height="200px" >
        <div class="card margencard" style=" border: none;" >


            <div >
                <h5 style="margin-top: 10%"> {{$cliente->nombre}}</h5>

                @if($cliente->id_tipo_cliente==3 )

                    <H6> Expediente Particular</H6>
                @endif
                @if($cliente->id_tipo_cliente==2)
                    <H6> Expediente Docente</H6>

                @endif
                @if($cliente->id_tipo_cliente==1)
                    <H6> Expediente Estudiante</H6>
                @endif
                <h6 style="all: revert">Medida antropometrica</h6>


            </div>
        </div>
    </div> <div class="card" style="width: 170px; border: none;background: transparent;margin-left: 3%;margin-top: 5px">
            <div class="card-header" style="background: transparent;height: 50px;">
                <a class="btn btn-default" href="{{route("imc.ini",[$cliente->id])}}"><span><i
                                class="fa fa-arrow-circle-left"></i></span> Regresar</a>

            </div>
        </div>

        <div class="btn-group mt-3 mb-5" style="margin-left: .1%;" role="group" aria-label="Button group with nested dropdown">

        @if($cliente->id_tipo_cliente==3||$cliente->id_tipo_cliente==1)

            <a class="btn btn-secondary" @if($cliente->id_tipo_cliente==3)
            href="{{route("pagoparticulares",["id"=>$cliente->id])}}"
               @endif
               @if($cliente->id_tipo_cliente ==1)
               href="{{route("pagoestudiantes",["id"=>$cliente->id])}}" @endif

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
        <script type="text/javascript">
            document.onreadystatechange = function () {

                if (document.readyState === "complete") {
                    calcularIMC();
                }
            };

            function calcularIMC() {
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


    <form name="id_imc" id="id_imc"
          style="font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'"
          method="post" action="@isset($antecedente){{route('imc.update', $antecedente->id)}}
    @endisset
            ">

        {{method_field('put')}}


        <h5  style="margin-left: 3%;margin-top: -1%">Editar medidas antropometricas</h5>
        <div class="form-row mt-4">
            <div class="form-group col-md-4">
                <h6 class=" label2" for="email" style="margin-top: -1%">Peso kg:</h6>
                <input style="width:310px" type="number" class="form-control inputtamaño3" id="peso"
                       name="peso" maxlength="3" placeholder="Ingrese el peso en kilogramos"
                       onkeyup="calcularIMC()"
                       @isset($antecedente)
                       value="{{$antecedente->peso}}"
                       @endisset
                       value="{{old('peso')}}">
            </div>

            <div class="form-group col-md-4">
                <h6 class="label2" for="email" style="margin-top: -1%">Altura:</h6>
                <input style="width:310px" type="number" class="form-control inputtamaño3"
                       id="altura" name="altura" maxlength="3" placeholder="Ingrese la talla"
                       onkeyup="calcularIMC()"
                       @isset($antecedente)
                       value="{{$antecedente->altura}}"
                       @endisset
                       value="{{old('altura')}}">
            </div>


            <div class="form-group col-md-4">
                <h6 class="label2" for="email" style="margin-top: -1%">Pecho:</h6>
                <input style="width:310px" type="number" class="form-control inputtamaño3"
                       name="pecho" id="pecho"
                       @isset($antecedente)
                       value="{{$antecedente->pecho}}"
                       @endisset
                       value="{{old('pecho')}}">
            </div>


            <div class="form-group col-md-4">
                <h6 class="label2" for="email" style="margin-top: 1%">Brazo:</h6>
                <input style="width:310px" type="number" class="form-control inputtamaño3" name="brazo" id="brazo"
                       @isset($antecedente)
                       value="{{$antecedente->brazo}}"
                       @endisset
                       value="{{old('brazo')}}">
            </div>


            <div class="form-group col-md-4">
                <h6 class="label2" for="email" style="margin-top: 1%">ABD-A:</h6>
                <input style="width:310px" type="number" class="form-control inputtamaño3"
                       name="ABD_A" id="ABD_A"
                       @isset($antecedente)
                       value="{{$antecedente->ABD_A}}"
                       @endisset
                       value="{{old('ABD_A')}}">

            </div>

            <div class="form-group col-md-4">
                <h6 class="label2" for="email" style="margin-top: 1%">ABD-B:</h6>
                <input style="width:310px" type="number" class="form-control inputtamaño3"
                       name="ABD_B" id="ABD_B"
                       @isset($antecedente)
                       value="{{$antecedente->ABD_B}}"
                       @endisset
                       value="{{old('ABD_B')}}">
            </div>

            <div class="form-group col-md-4">
                <h6 class="label2" for="email" style="margin-top: 2%">Cadera:</h6>
                <input style="width:310px" type="number" class="form-control inputtamaño3"
                       name="cadera" id="cadera"
                       @isset($antecedente)
                       value="{{$antecedente->cadera}}"
                       @endisset
                       value="{{old('cadera')}}">
            </div>
            <div class="form-group col-md-4">
                <h6 class="label2" for="email" style="margin-top: 2%">Muslo:</h6>
                <input style="width:310px" type="number" class="form-control inputtamaño3"
                       name="muslo" id="muslo"
                       @isset($antecedente)
                       value="{{$antecedente->muslo}}"
                       @endisset
                       value="{{old('muslo')}}">
            </div>

            <div class="form-group col-md-4">
                <h6 class="label2" for="email" style="margin-top: 2%">Pierna:</h6>
                <input style="width:310px" type="number" class="form-control inputtamaño3"
                       name="pierna" id="pierna"
                       @isset($antecedente)
                       value="{{$antecedente->pierna}}"
                       @endisset
                       value="{{old('pierna')}}">
            </div>
        </div>

        <div class="form-row">


        </div>


        <div class="form-row">


        </div>


        <input name="id_cliente" value="{{$id->id}}" type="hidden">


        <div class="container2">


            <a class="btn btn-primary my-2 boton"
               href="{{route("imc.ini",["id"=>$id])}}">Cancelar</a>



            <button type="submit" class="btn btn-primary  boton3">Guardar</button>
        </div>



        <div class="form-group col-md-4">
            <h6 class="label2" for="email"></h6>
            <input style="width:310px" type="hidden" class="form-control inputtamaño3"
                   id="imc" name="imc" maxlength="3"
                   @isset($antecedente)
                   value="{{$antecedente->imc}}"
                   @endisset
                   value="{{old('imc')}}" readonly>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <h6 class="label2" for="email"></h6>
                <input style="width:310px" type="hidden" class="form-control inputtamaño3"
                       id="leyenda" name="id_diagnostico"
                       @isset($antecedente)
                       value="{{$antecedente->leyenda}}"
                       @endisset
                       value="{{old('leyenda')}}" readonly>
            </div>

        </div>
    </form>
    </html>
    </div>
@endsection