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

    <div class="card" style="width: 170px; border: none;background: transparent;margin-left: 3%;margin-top: 5px">
        <div class="card-header" style="background: transparent;height: 50px;">
            <a class="btn btn-default" href="{{route("grasa.uni",[$nombre->id])}}"><span><i class="fa fa-arrow-circle-left"></i></span> Regresar</a>

        </div>
    </div>



        <div class="w3-container w3-teal mx-5">

            <img style="border-radius: 50%;float: left;margin-right: 10px" src="/clientes_imagenes/{{$nombre->imagen}}" width="150px" height="150px" >
            <div class="card margencard" style=" border: none;" >


                <div style="margin-top: 3%">


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
    <br><br>
    <div class="btn-group mt-3 mb-5" style="margin-left: 50px;" role="group" aria-label="Button group with nested dropdown">

        @if($nombre->id_tipo_cliente==3||$nombre->id_tipo_cliente==1)

        <a class="btn btn-secondary" @if($nombre->id_tipo_cliente==3)
        href="{{route("pagoparticulares",["id"=>$nombre->id])}}"
           @endif
           @if($nombre->id_tipo_cliente ==1)
           href="{{route("pagoestudiantes",["id"=>$nombre->id])}}" @endif

           @if($nombre->id_tipo_cliente ==2)
           style="display: none;"
                @endif >Pagos</a>

        @endif
        <a class="btn btn-secondary" href="{{route("imc.ini",[$nombre->id])}}">Imc</a>
        <a class="btn btn-primary" href="{{route("grasa.uni",["id"=>$nombre->id])}}">Grasa</a>
        <a class="btn btn-secondary" href="{{route("ruffier.uni",["id"=>$nombre->id])}}">Ruffier</a>


    </div>

    <html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" >
        <title>FORMULARIO PESO IDEAL</title>
        <script type="text/javascript">

            document.onreadystatechange= function () {

                if(document.readyState==="complete"){
                    calcularGrasa();
                }
            };

            function calcularGrasa(){
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
                        leyenda = 1;
                    } else if (grasa > 18) {
                        leyenda =
                            2;
                    } else if (grasa > 14) {
                        leyenda =
                            3;
                    } else if (grasa > 6) {
                        leyenda =
                            4;
                    } else if (grasa > 2) {
                        leyenda =
                            5;
                    } else {
                        leyenda = 6;

                    }
                }else {
                    if (grasa > 32) {
                        leyenda = 1;
                    } else if (grasa > 25) {
                        leyenda =
                            2;
                    } else if (grasa > 21) {
                        leyenda =
                            3;
                    } else if (grasa > 14) {
                        leyenda =
                            4;
                    } else if (grasa > 10) {
                        leyenda =
                            5;
                    } else {
                        leyenda =6

                    }

                }

                document.getElementById("id_diagnostico").value=leyenda;

            }</script>

    </head>



    <input id="sexo" value="{{$nombre->genero}}" type="hidden">

        <form name="id_imc" id="id_imc"
              style="font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'"
              method="post"
              action="@isset($grasa)
              {{route('grasa.update', $grasa->id)}}
                     @endisset ">

            {{method_field('put')}}


            <h5 class="mt-4 ml-5">Editar medidas de la grasa corporal</h5>








            <div class="form-row">
                <div class="form-group col-md-6">
                <h6 class="label2" for="email">Pc_tricipital:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" onkeyup="calcularGrasa()"
                           id="pc_tricipital" name="pc_tricipital" maxlength="3"
                           @isset($grasa)
                           value="{{$grasa->pc_tricipital}}"
                            @endisset
                    >
                </div>


                    <div class="form-group col-md-6">
                <h6 class="label2" for="email">Pc Infraescrupural:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" onkeyup="calcularGrasa()"
                           id="pc_infraescapular" name="pc_infraescapular" maxlength="50" placeholder="Ingrese medicas en cm"
                           @isset($grasa)
                           value="{{$grasa->pc_infraescapular}}"
                            @endisset
                    >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                <h6 class="label2" for="email">Pc Biciptal:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3" onkeyup="calcularGrasa()"
                           id="pc_biciptal" name="pc_biciptal" maxlength="3" placeholder="Ingrese medicas en cm"
                           @isset($grasa)
                           value="{{$grasa->pc_biciptal}}"
                            @endisset
                    >
            </div>


                    <div class="form-group col-md-6">
                <h6 class="label2" for="email">Pc Suprailiaco:</h6>

                    <input style="width: 310px" type="number" class="form-control inputtamaño3" onkeyup="calcularGrasa()"
                           id="pc_supra_iliaco" name="pc_supra_iliaco" maxlength="50" placeholder="Ingrese medicas en cm"
                           @isset($grasa)
                           value="{{$grasa->pc_supra_iliaco}}"
                            @endisset
                    >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <h6 class="label2" for="email">Porcentaje:</h6>
                    <input style="width: 310px" type="number" class="form-control inputtamaño3"
                           id="grasa" name="grasa" maxlength="3"
                           @isset($grasa)
                           value="{{$grasa->grasa}}"
                           @endisset
                           readonly >
                </div>


                <div class="form-group col-md-6">
                    <input style="width: 310px; display: none " type="hidden" class="form-control inputtamaño3"
                           id="id_diagnostico" name="id_diagnostico" maxlength="50"
                           @isset($grasa)
                           value="{{$grasa->leyenda}}"
                           @endisset
                           readonly>
                </div>
            </div>



                </div>

            <input name="id_cliente" value="{{$id->id}}" type="hidden">


            <div class="container2">


              <a class="btn btn-primary my-2 boton"
                 href="{{route("grasa.uni",["id"=>$id])}}">Cancelar</a>



                <button type="submit" class="btn btn-primary  boton3">Guardar</button>
            </div>

    </form>
    </div>

    </html>




@endsection
