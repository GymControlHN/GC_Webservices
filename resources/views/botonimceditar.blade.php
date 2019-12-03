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
            <a class="btn btn-default" href="{{route("imc.ini",[$cliente->id])}}"><span><i class="fa fa-arrow-circle-left"></i></span> Regresar</a>

        </div>
    </div>

    <!DOCTYPE html>
    <html>
    <head>
        <div class="w3-container w3-teal mx-5">



            <div class="card margencard" style=" border: none">


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
                    <h5 style="all: revert">Medida antropometrica</h5>
                    <h5>Nombre: {{$cliente->nombre}}</h5>

                </div>
            </div>
        </div>
        <div class="btn-group mt-3 mb-5" style="margin-left: 50px;" role="group" aria-label="Button group with nested dropdown">

            <a class="btn btn-secondary" @if($cliente->id_tipo_cliente==3)
            href="{{route("pagoparticulares",["id"=>$cliente->id])}}"
               @endif
               @if($cliente->id_tipo_cliente ==1)
               href="{{route("pagoestudiantes",["id"=>$cliente->id])}}" @endif

               @if($cliente->id_tipo_cliente ==2)
               style="display: none;"
                    @endif >Pagos</a>
            <a class="btn btn-secondary" href="{{route("imc.ini",[$cliente->id])}}">Imc</a>
            <a class="btn btn-secondary" href="{{route("grasa.uni",["id"=>$cliente->id])}}">Grasa</a>
            <a class="btn btn-primary" href="{{route("ruffier.uni",["id"=>$cliente->id])}}">Ruffier</a>


        </div>

        <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
        <title>FORMULARIO PESO IDEAL</title>
        <script type="text/javascript">

            function calcularIMC() {
                peso = document.getElementById("peso").value;
                altura = document.getElementById("altura").value / 100;
                imc = peso / (altura * altura);
                document.getElementById("imc").value = imc.toFixed(0);


                if (imc > 40) {
                    leyenda = "Obesidad tipo III";
                } else if (imc > 34.99) {
                    leyenda =
                        "Obesidad tipo II";

                } else if (imc > 29.99) {
                    leyenda =
                        "Obesidad tipo I";

                } else if (imc > 24.99) {
                leyenda =
                    "Preobesidad";

                } else if (imc > 18.49) {
                    leyenda =
                        "Peso normal";

                } else if (imc > 16.99) {
                    leyenda =
                        "Delgadez";

                } else if (imc > 16.00) {
                    leyenda =
                        "Delgadez severa";

                } else {
                    leyenda = "Algo salio mal"
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





              <h5 class=" label2" style="margin-left: 3%">Editar medidas antropometricas</h5>
              <div class="form-row mt-4">
                  <div class="form-group col-md-4">
            <h6 class=" label2" for="email">Peso kg:</h6>
                    <input  style="width:310px" type="number" class="form-control inputtamaño3" id="peso"
                           name="peso" maxlength="3" placeholder="Ingrese el peso en kilogramos"
                           onkeyup="calcularIMC()"
                           @isset($antecedente)
                           value="{{$antecedente->peso}}"
                           @endisset
                           value="{{old('peso')}}">
                </div>

                      <div class="form-group col-md-4">
                        <h6 class="label2" for="email">Altura:</h6>
                                <input  style="width:310px" type="number" class="form-control inputtamaño3"
                               id="altura" name="altura" maxlength="3" placeholder="Ingrese la talla"
                           onkeyup="calcularIMC()"
                           @isset($antecedente)
                           value="{{$antecedente->altura}}"
                           @endisset
                           value="{{old('altura')}}">
                </div>


                      <div class="form-group col-md-4">
                    <h6 class="label2" for="email">Imc:</h6>
                          <input  style="width:310px" type="number" class="form-control inputtamaño3"
                           id="imc" name="imc" maxlength="3"
                           @isset($antecedente)
                           value="{{$antecedente->imc}}"
                           @endisset
                           value="{{old('imc')}}" readonly>
                </div>
            </div>

                  <div class="form-row">
                      <div class="form-group col-md-4">
                        <h6 class="label2" for="email">Diagnostico:</h6>
                                <input  style="width:310px" type="text" class="form-control inputtamaño3"
                           id="leyenda" name="leyenda" maxlength="50"
                           @isset($antecedente)
                           value="{{$antecedente->leyenda}}"
                           @endisset
                           value="{{old('leyenda')}}" readonly>
                        </div>


                      <div class="form-group col-md-4">
                          <h6 class="label2" for="email">Pecho:</h6>
                         <input  style="width:310px" type="number" class="form-control inputtamaño3"
                           name="pecho" id="pecho"
                           @isset($antecedente)
                           value="{{$antecedente->pecho}}"
                           @endisset
                           value="{{old('pecho')}}">
                    </div>


                          <div class="form-group col-md-4">
                        <h6 class="label2" for="email">Brazo:</h6>
                                <input  style="width:310px" type="number" class="form-control inputtamaño3" name="brazo" id="brazo"
                           @isset($antecedente)
                           value="{{$antecedente->brazo}}"
                           @endisset
                           value="{{old('brazo')}}">
                </div>
            </div>

                  <div class="form-row">
                      <div class="form-group col-md-4">
                    <h6 class="label2" for="email">ABD-A:</h6>
                            <input  style="width:310px" type="number" class="form-control inputtamaño3"
                           name="ABD_A" id="ABD_A"
                           @isset($antecedente)
                           value="{{$antecedente->ABD_A}}"
                           @endisset
                           value="{{old('ABD_A')}}">

                     </div>

                          <div class="form-group col-md-4">
                        <h6 class="label2" for="email">ABD-B:</h6>
                                <input  style="width:310px" type="number" class="form-control inputtamaño3"
                           name="ABD_B" id="ABD_B"
                           @isset($antecedente)
                           value="{{$antecedente->ABD_B}}"
                           @endisset
                           value="{{old('ABD_B')}}">
                   </div>

                      <div class="form-group col-md-4">
                          <h6 class="label2" for="email">Cadera:</h6>
                             <input  style="width:310px" type="number" class="form-control inputtamaño3"
                           name="cadera" id="cadera"
                           @isset($antecedente)
                           value="{{$antecedente->cadera}}"
                           @endisset
                           value="{{old('cadera')}}">
                </div>
            </div>


                  <div class="form-row">
                      <div class="form-group col-md-4">
                            <h6 class="label2" for="email">Muslo:</h6>
                          <input  style="width:310px" type="number" class="form-control inputtamaño3"
                             name="muslo" id="muslo"
                            @isset($antecedente)
                            value="{{$antecedente->muslo}}"
                            @endisset
                               value="{{old('muslo')}}">
                                </div>

                      <div class="form-group col-md-4">
                            <h6 class="label2" for="email">Pierna:</h6>
                          <input  style="width:310px" type="number" class="form-control inputtamaño3"
                           name="pierna" id="pierna"
                           @isset($antecedente)
                           value="{{$antecedente->pierna}}"
                           @endisset
                           value="{{old('pierna')}}">
                      </div>

                      <div class="form-group col-md-4">
                             <h6 class="label2" for="email">Fecha:</h6>
                              <input  style="width:310px" type="date" class="form-control inputtamaño3" id="fecha_de_ingreso" name="fecha_de_ingreso"
                           placeholder="Escriba la fecha de ingreso"
                           @isset($antecedente)
                           value="{{$antecedente->fecha_de_ingreso}}"
                           @endisset
                           value="{{old('fecha_de_ingreso')}}" readonly>
                      </div>

                  </div>



            <input name="id_cliente" value="{{$id->id}}" type="hidden">


              <div class="container2">


                  <button type="button" class="btn btn-primary my-2 boton"><a style="color: white"
                                                                              href="{{route("imc.ini",["id"=>$id])}}">Cancelar</a>

                  </button>

                  <button type="submit" class="btn btn-primary  boton3">Guardar</button>
              </div>


          </div>

        </form>
    </div>
    </html>
@endsection