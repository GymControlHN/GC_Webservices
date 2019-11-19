@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 150px;">
        <div class="container">
            <div class="intro-text">
            </div>
        </div>
    </header>

    <div class="w3-container w3-teal mx-5">
        <div class="alert alert-dismissable mb-n4" role="alert">
            <h2 style="all: revert">Datos fisicos</h2>
            <h5>Nombre: {{$cliente->nombre}}</h5>


        </div>
        <br><br>
        <h2 class="h3centrado  mt-3" >Pagos</h2>
        <div class="table-responsive mb-5" style="-moz-box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);
            box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);">
            <table class="table ruler-vertical table-hover mx-sm-0 ">
                <thead class="thead-light">
                <tr>
                    <th>Mes</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                <tr>
                </thead>
                <tbody>
                @if($pagos->count()>0)
                    @foreach ($pagos as $day => $users_list)
                        <tr>
                            <th colspan="4"
                                style="background-color: #7086f7; color: white;">Registro del año {{ $day }}</th>
                        </tr>
                        @foreach ($users_list as $user)
                            <tr>
                                <th>{{ $user->mes }}</th>
                                <th>{{ $user->fecha_pago }}</th>
                                <th>Cancelado</th>
                                <th class="form-inline mr-xl-n2 ">


                                    <form method="post" action="{{route('pagoestudiante.borrar', [$user->id,$user->id_cliente])}}"
                                          onclick="return confirm('Estas seguro que deseas eliminar este pago? ')">
                                        <button class="btn btn-danger mr-xl-2 "><i class="fas fa-trash-alt"></i>
                                        </button>
                                        {{method_field('delete')}}
                                    </form>
                                </th>

                            </tr>
                        @endforeach
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" style="text-align: center">No hay pagos ingresados</td>
                @endif


                </tbody>
            </table>
        </div>

        <h2 class="h3centrado  mt-3" >IMC</h2>
        <div class="table-responsive mb-5" style="-moz-box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);
            box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);">
            <table class="table ruler-vertical table-hover mx-sm-0 ">
                <thead class="thead-light">
                <tr>


                    <th scope="row">Peso Kg</th>
                    <th scope="col">Altura°</th>
                    <th scope="col">Imc</th>
                    <th scope="col">Diagnostico</th>
                    <th scope="col">Pecho cm</th>
                    <th scope="col">Brazo cm</th>
                    <th scope="col">ABD A</th>
                    <th scope="col">ABD B</th>
                    <th scope="col">Cadera cm</th>
                    <th scope="col">Muslo cm</th>
                    <th scope="col">Pierna cm</th>
                    <th scope="col">Fecha de medision</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @if($antecedentes->count()>0)

                    @foreach($antecedentes as $antecedente)
                        <tr>

                            <td>{{$antecedente->peso}}</td>
                            <td>{{$antecedente->altura}}</td>
                            <td>{{$antecedente->imc}}</td>
                            <td>{{$antecedente->leyenda}}</td>
                            <td>{{$antecedente->pecho}}</td>
                            <td>{{$antecedente->brazo}}</td>
                            <td>{{$antecedente->ABD_A}}</td>
                            <td>{{$antecedente->ABD_B}}</td>
                            <td>{{$antecedente->cadera}}</td>
                            <td>{{$antecedente->muslo}}</td>
                            <td>{{$antecedente->pierna}}</td>

                            <td>{{$antecedente->fecha_de_ingreso}}</td>


                            <td class="form-inline " >


                                <form method="post" action="{{route('imc.borrar',[$antecedente->id,$antecedente->id_cliente])}}"
                                      onclick="return confirm('Estas seguro que deseas eliminar las medidas antropometricas? ')">
                                    <button class="btn btn-danger mr-xl-2 "><i class="fas fa-trash-alt"></i>
                                    </button>
                                    {{method_field('delete')}}
                                </form>

                            </td>
                    @endforeach



                @else
                    <tr>
                        <td colspan="13" style="text-align: center">No hay medidas ingresadas</td>
                    </tr>
                @endif


                </tbody>
            </table>
        </div>

            <h2 class="h3centrado  mt-3" >Grasa</h2>
        <div class="table-responsive mb-5" style="-moz-box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);
                box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);">
                <table class="table ruler-vertical table-hover mx-sm-0 ">

                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Imc</th>
                        <th scope="col">edad</th>
                        <th scope="col">%Grasa</th>
                        <th scope="col">PC_Tricipital</th>
                        <th scope="col">PC_Infraescupular</th>
                        <th scope="col">PC_Supra_Iliaco</th>
                        <th scope="col">PC_Biciptal</th>
                        <th scope="col">Acciones</th>

                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        @if($grasa_corporal->count()>0)
                            @foreach($grasa_corporal as $grasa)
                                <th>{{$grasa->fecha_de_ingreso}}</th>
                                <td>{{$grasa->imc}}</td>
                                <td>{{$grasa->edad}}</td>
                                <td>{{$grasa->grasa}}</td>
                                <th>{{$grasa->pc_tricipital}}</th>
                                <td>{{$grasa->pc_infraescapular}}</td>
                                <td>{{$grasa->pc_supra_iliaco}}</td>
                                <td>{{$grasa->pc_biciptal}}</td>
                                <td class="form-inline " >

                                    <form method="post" action="{{route('grasa.borrar', [$grasa->id,$grasa->id_cliente])}}"
                                          onclick="return confirm('Estas seguro que deseas eliminar la medida? ')">
                                        <button class="btn btn-danger mr-xl-2"><i class="fas fa-trash-alt"></i></button>
                                        {{method_field('delete')}}
                                    </form>
                                </td>
                                </td>

                    </tr>
                    @endforeach
                    @else
                        <tr>
                            <td colspan="9" style="text-align: center">No hay medidas ingresados</td>
                    @endif

                    </tbody>
                </table>
            </div>

                <h2 class="h3centrado  mt-3" >Ruffier</h2>
        <div class="table-responsive mb-5" style="-moz-box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);
                box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);">
                    <table class="table ruler-vertical table-hover mx-sm-0 ">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Pulso en reposo</th>
                            <th scope="col">Pulso en acción</th>
                            <th scope="col">Pulso en descanso</th>
                            <th scope="col">Ruffier</th>
                            <th scope="col">Clasificacion</th>
                            <th scope="col">MVO2</th>
                            <th scope="col">MVOReal</th>
                            <th scope="col">Acciones</th>

                        </tr>
                        </thead>

                        <tbody>

                        <tr>
                            @if($datos->count()>0)
                                @foreach($datos as $dato)
                                    <th>{{$dato->fecha_de_ingreso}}</th>
                                    <td>{{$dato->pulso_r}}</td>
                                    <td>{{$dato->pulso_a}}</td>
                                    <td>{{$dato->pulso_d}}</td>
                                    <td>{{$dato->ruffiel}}</td>
                                    <td>{{$dato->clasificacion}}</td>
                                    <td>{{$dato->mvo2}}</td>
                                    <td>{{$dato->mvoreal}}</td>
                                    <td class="form-inline ">

                                        <form method="post" action="{{route('ruffier.borrar', [$dato->id,$dato->id_cliente])}}"
                                              class="pull-left"
                                              onclick="return confirm('Estas seguro que deseas eliminar la medida? ')">
                                            <button class="btn btn-danger mr-xl-2"><i class="fas fa-trash-alt"></i>
                                            </button>
                                            {{method_field('delete')}}
                                        </form>
                                    </td>
                        </tr>
                        @endforeach
                        @else
                            <td colspan="9" style="text-align: center">No hay medidas ingresados</td>
                        @endif

                        </tbody>
                    </table>

                </div>
            </div>

@endsection