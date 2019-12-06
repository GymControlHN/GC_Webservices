@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
            <div class="intro-text">
                <!--div class="intro-lead-in">Estudiantes</div-->
            </div>
        </div>
    </header>

    <div class="card" style="width: 170px; border: none;background: transparent;margin-left:3%;margin-top: 5px">
        <div class="card-header" style="background: transparent;height: 50px;">
            <a class="btn btn-default" href="{{route("grasa.uni",[$nombre->id])}}"><span><i class="fa fa-arrow-circle-left"></i></span> Regresar</a>

        </div>
    </div>

    <div class="w3-container w3-teal mx-5">

        <div class="card margencard" style=" border: none ">


            @if($nombre->id_tipo_cliente==3 )

                <H5> Expediente Particular</H5>
            @endif
            @if($nombre->id_tipo_cliente==2)
                <H5> Expediente Docente</H5>

            @endif
            @if($nombre->id_tipo_cliente==1)
                <H5> Expediente Estudiante</H5>
            @endif
            <h5 style="all: revert">Grasa Corporal</h5>
            <h5>Nombre: {{$nombre->nombre}}</h5>

        </div>
    </div>
    </div>

    <div class="btn-group mt-3 mb-5" style="margin-left: 50px;" role="group" aria-label="Button group with nested dropdown">

        <a class="btn btn-secondary" @if($nombre->id_tipo_cliente==3)
        href="{{route("pagoparticulares",["id"=>$nombre->id])}}"
           @endif
           @if($nombre->id_tipo_cliente ==1)
           href="{{route("pagoestudiantes",["id"=>$nombre->id])}}" @endif

           @if($nombre->id_tipo_cliente ==2)
           style="display: none;"
                @endif >Pagos</a>
        <a class="btn btn-secondary" href="{{route("imc.ini",[$nombre->id])}}">Imc</a>
        <a class="btn btn-primary" href="{{route("grasa.uni",["id"=>$nombre->id])}}">Grasa</a>
        <a class="btn btn-secondary" href="{{route("ruffier.uni",["id"=>$nombre->id])}}">Ruffier</a>


    </div>


    <html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
        <title>FORMULARIO PESO IDEAL</title>
        <script type="text/javascript">




            function calcularGrasa() {
                pc_tricipital = document.getElementById("pc_tricipital").value;
                pc_infraescapular = document.getElementById("pc_infraescapular").value;
                pc_biciptal = document.getElementById("pc_biciptal").value;
                pc_supra_iliaco = document.getElementById("pc_supra_iliaco").value;
                grasa = (2.745+ (0.0008 * pc_tricipital)+
                    (0.002*pc_infraescapular)+(0.637*pc_supra_iliaco)+(0.809*pc_biciptal));
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








        <form name="f1" id="f1"
              style="font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'"
              method="POST" action="{{route('grasa.guardar')}}">

            {{csrf_field()}}




            <div class="margeneditar" >
            <h5 class="label2" style="margin-left: 4%">Calculo de la grasa corporal</h5>




            <div class="form-row">
                <div class="form-group col-md-6">
                    <h6 class="label2" for="email">Pc tricipital:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" required
                           id="pc_tricipital" name="pc_tricipital" maxlength="3" placeholder="Ingrese medicas en cm"
                           value="{{old('pc_tricipital')}}" onkeyup="calcularGrasa()">

                </div>


                <div class="form-group col-md-6">
                    <h6 class="label2" for="email">Pc Infraescrupural:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" required
                           id="pc_infraescapular" name="pc_infraescapular" maxlength="50" placeholder="Ingrese medida en cm"
                           value="{{old('pc_infraescapular')}}"  onkeyup="calcularGrasa()">

                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <h6 class="label2" for="email">Pc Biciptal:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" required
                           id="pc_biciptal" name="pc_biciptal" maxlength="3" placeholder="Ingrese medida en cm"
                           value="{{old('pc_biciptal')}}"  onkeyup="calcularGrasa()">

                </div>


                <div class="form-group col-md-6">
                    <h6 class="label2" for="email">Pc SupraIliaco:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" required
                           id="pc_supra_iliaco" name="pc_supra_iliaco" maxlength="50" placeholder="Ingrese medida en cm"
                           value="{{old('pc_supra_iliaco')}}"  onkeyup="calcularGrasa()">

                </div>
            </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <h6 class="label2" for="email">Porcentaje:</h6>
                        <input style="width: 310px" type="number" class="form-control inputtamaño3" required
                               id="grasa" name="grasa" maxlength="3"
                               value="{{old('grasa')}}" readonly>

                    </div>


                    <div class="form-group col-md-6">
                        <h6 class="label2" for="email">Clasificacion:</h6>
                        <input style="width: 310px" type="text" class="form-control inputtamaño3" required
                               id="leyenda" name="leyenda" maxlength="50"
                               value="{{old('leyenda')}}"readonly>
                    </div>
                </div>

            <div class="form-group col-md-5 ">
            <h6 class="label2 " for="email">Fecha:</h6>
                <input  style="width: 310px"  type="date" class="form-control inputtamaño3 " required
                       id="fecha_de_ingreso" name="fecha_de_ingreso"
                       placeholder="Escriba la fecha de ingreso"
                       readonly
                       value="{{old('fecha_de_ingreso',$now->format('Y-m-d'))}}">

            </div>


            <input name="id" value="{{$id}}" type="hidden">




            <div class="container2">


                <button type="button" class="btn btn-primary my-2 boton"><a style="color: white"
                                                                            href="{{route("grasa.uni",["id"=>$id])}}">Cancelar</a>

                </button>

                <button type="submit" class="btn btn-primary  boton3">Guardar</button>
            </div>
        </div>

        </form>
    </div>
    </html>




@endsection