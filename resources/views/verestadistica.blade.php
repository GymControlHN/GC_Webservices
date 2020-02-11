@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 150px;">
        <div class="container">
            <div class="intro-text">
            </div>
        </div>
    </header>

    <div class="card" style="width: 170px; border: none;background: transparent;margin-left: 50px;margin-top: 5px">
        <div class="card-header" style="background: transparent;height: 50px;" >
                <a class="btn btn-default" href="/estadisticas"><span><i class="fa fa-arrow-circle-left"></i></span> Regresar</a>
        </div>
    </div>




    <div class="w3-container w3-teal mx-5">

            <h5 class="card margencard"  style="all: revert;  border: none;">Estadisticas Datos fisicos</h5>
            <h5>Nombre: {{$cliente->nombre}}</h5>
        <div class="btn-group " style="margin-left: 50px;" role="group" aria-label="Button group with nested dropdown">

            <a class="btn btn-primary" href="{{route("estadistica.ver",[$cliente->id])}}">Estadisticas</a>
            <a class="btn btn-secondary" href="{{route("grafico.mostrar",[$cliente->id])}}">graficos</a>

        </div>





        <h2 class="mt-3"  @if($cliente->id_tipo_cliente==3)
        href="{{route("pagoparticulares",["id"=>$cliente->id])}}"
            @endif
            @if($cliente->id_tipo_cliente ==1)
            href="{{route("pagoestudiantes",["id"=>$cliente->id])}}" @endif

            @if($cliente->id_tipo_cliente ==2)
            style="display: none;"
                @endif>Pagos</h2>

        <div class="table-responsive mb-5"

             @if($cliente->id_tipo_cliente==1||$cliente->id_tipo_cliente==3)
             style="-moz-box-shadow: 0px 5px 3px 3px rgba(194,194,194,1);
box-shadow: 0px 5px 3px 3px rgba(194,194,194,1);" @endif
                >
            <table class="table ruler-vertical table-hover mx-sm-0 "  @if($cliente->id_tipo_cliente==3)
            href="{{route("pagoparticulares",["id"=>$cliente->id])}}"
                   @endif
                   @if($cliente->id_tipo_cliente ==1)
                   href="{{route("pagoestudiantes",["id"=>$cliente->id])}}" @endif

                   @if($cliente->id_tipo_cliente ==2)
                   style="display: none;"
                    @endif>
                <thead class="thead-light"  @if($cliente->id_tipo_cliente==3)
                href="{{route("pagoparticulares",["id"=>$cliente->id])}}"
                       @endif
                       @if($cliente->id_tipo_cliente ==1)
                       href="{{route("pagoestudiantes",["id"=>$cliente->id])}}" @endif

                       @if($cliente->id_tipo_cliente ==2)
                       style="display: none;"
                        @endif>



                <tr  @if($cliente->id_tipo_cliente==3)
                     href="{{route("pagoparticulares",["id"=>$cliente->id])}}"
                     @endif
                     @if($cliente->id_tipo_cliente ==1)
                     href="{{route("pagoestudiantes",["id"=>$cliente->id])}}" @endif

                     @if($cliente->id_tipo_cliente ==2)
                     style="display: none;"
                        @endif>
                    <th scope="col">N°</th>
                    <th scope="col">Mes</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                <tr>
                </thead>
                <tbody >
                @if($pagos->count()>0)
                    @foreach ($pagos as $day => $users_list)
                        <tr>
                            <th colspan="5"
                                style="background-color: #7086f7; color: white;">Registro del año {{ $day }}</th>
                        </tr>
                        @foreach ($users_list as $user)
                            <tr >
                                <td>{{$no++}}</td>
                                <th>{{ $user->mes }}</th>
                                <th>{{ $user->fecha_pago }}</th>
                                <th>Cancelado</th>
                                <th  >
                                    <button class="btn btn-danger mr-xl-2"
                                            data-id="{{$user->id}}"
                                            data-id_cliente="{{$user->id_cliente}}"
                                            data-toggle="modal" data-target="#modalBorrarPagoEstudiante"><i class="fas fa-trash-alt"></i></button>



                                </th>

                            </tr>
                        @endforeach
                    @endforeach
                @else
                    <tr  @if($cliente->id_tipo_cliente==3)
                         href="{{route("pagoparticulares",["id"=>$cliente->id])}}"
                         @endif
                         @if($cliente->id_tipo_cliente ==1)
                         href="{{route("pagoestudiantes",["id"=>$cliente->id])}}" @endif

                         @if($cliente->id_tipo_cliente ==2)
                         style="display: none;"
                            @endif>
                        <td colspan="7" style="text-align: center">No hay pagos ingresados</td>
                @endif
                        <div class="modal fade" tabindex="-1" role="dialog" id="modalBorrarPagoEstudiante">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Atención Eliminación</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post" action="{{route('pago.estadistica.borrar')}}">
                                        {{method_field('delete')}}

                                        <div class="modal-body">
                                            <input name="id" id="id" type="hidden">
                                            <input name="id_cliente" id="id_cliente" type="hidden">

                                            <p>¿Está seguro que desea borrar el pago?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Aceptar</button>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>

                </tbody>
            </table>
        </div>

        <h2 class="mt-3" >IMC</h2>
        <div class="table-responsive mb-5" style="-moz-box-shadow: 0px 5px 3px 3px rgba(194,194,194,1);
box-shadow: 0px 5px 3px 3px rgba(194,194,194,1);">
            <table class="table ruler-vertical table-hover mx-sm-0 ">
                <thead class="thead-light">
                <tr>
                    <th scope="col">N°</th>
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
                        <tr style="text-align:right">
                            <td>{{$no2++ }}</td>
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

                            <td>{{date("d-m-Y",strtotime($antecedente->created_at))}}</td>


                            <td class="form-inline " >


                                <button class="btn btn-danger mr-xl-2"
                                        data-id="{{$antecedente->id}}"
                                        data-id_cliente="{{$antecedente->id_cliente}}"
                                        data-toggle="modal" data-target="#modalBorrarImc"><i class="fas fa-trash-alt"></i></button>


                            </td>
                    @endforeach



                @else
                    <tr>
                        <td colspan="14" style="text-align: center">No hay medidas ingresadas</td>
                    </tr>
                @endif
                <div class="modal fade" tabindex="-1" role="dialog" id="modalBorrarImc">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Atención Eliminación</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="{{route('imc.estadistica.borrar')}}">
                                {{method_field('delete')}}

                                <div class="modal-body">
                                    <input name="id" id="id" type="hidden">
                                    <input name="id_cliente" id="id_cliente" type="hidden">

                                    <p>¿Está seguro que desea borrar la medida de imc?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Aceptar</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>


                </tbody>
            </table>
        </div>

            <h2 class="mt-3" >Grasa</h2>
        <div class="table-responsive mb-5" style="-moz-box-shadow: 0px 5px 3px 3px rgba(194,194,194,1);
box-shadow: 0px 5px 3px 3px rgba(194,194,194,1);">
                <table class="table ruler-vertical table-hover mx-sm-0 ">

                    <thead class="thead-light">
                    <tr>
                        <th scope="col">N°</th>
                        <th scope="col">Imc</th>
                        <th scope="col">edad</th>
                        <th scope="col">%Grasa</th>
                        <th scope="col">Diagnóstico</th>
                        <th scope="col">PC Tricipital</th>
                        <th scope="col">PC Infraescapular</th>
                        <th scope="col">PC Supra Ilíaco</th>
                        <th scope="col">PC Biciptal</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>

                    </tr>
                    </thead>

                    <tbody>

                        @if($grasa_corporal->count()>0)
                            @foreach($grasa_corporal as $grasa)
                                <tr style="text-align:right">
                                    <td>{{$no3++}}</td>
                                <td>{{$grasa->imc}}</td>
                                <td>{{$grasa->edad}}</td>
                                <td>{{$grasa->grasa}}</td>
                                <td>{{$grasa->leyenda}}</td>

                                <td>{{$grasa->pc_tricipital}}</td>
                                <td>{{$grasa->pc_infraescapular}}</td>
                                <td>{{$grasa->pc_supra_iliaco}}</td>
                                <td>{{$grasa->pc_biciptal}}</td>
                                <th>{{date("d-m-Y",strtotime($grasa->created_at))}}</th>
                                <td class="form-inline " >

                                    <button class="btn btn-danger mr-xl-2"
                                            data-id="{{$grasa->id}}"
                                            data-id_cliente="{{$grasa->id_cliente}}"
                                            data-toggle="modal" data-target="#modalBorrarGrasa"><i class="fas fa-trash-alt"></i></button>

                                </td>

                    </tr>
                    @endforeach
                    @else
                        <tr>
                            <td colspan="11" style="text-align: center">No hay medidas ingresados</td>
                    @endif
                            <div class="modal fade" tabindex="-1" role="dialog" id="modalBorrarGrasa">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Atención Eliminación</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="post" action="{{route('grasa.estadistica.borrar')}}">
                                            {{method_field('delete')}}

                                            <div class="modal-body">
                                                <input name="id" id="id" type="hidden">
                                                <input name="id_cliente" id="id_cliente" type="hidden">

                                                <p>¿Está seguro que desea borrar la medida de grasa?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Aceptar</button>
                                            </div>

                                        </form>
                                    </div>

                                </div>
                            </div>

                    </tbody>
                </table>
            </div>

                <h2 class="mt-3" >Ruffier</h2>
        <div class="table-responsive mb-5" style="-moz-box-shadow: 0px 5px 3px 3px rgba(194,194,194,1);
box-shadow: 0px 5px 3px 3px rgba(194,194,194,1);">
                    <table class="table ruler-vertical table-hover mx-sm-0 ">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Ruffier</th>
                            <th scope="col">Pulso en reposo</th>
                            <th scope="col">Pulso en acción</th>
                            <th scope="col">Pulso en descanso</th>
                            <th scope="col">Diagnostico</th>
                            <th scope="col">MVO2</th>
                            <th scope="col">MVOReal</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Acciones</th>

                        </tr>
                        </thead>

                        <tbody>


                            @if($datos->count()>0)
                                @foreach($datos as $dato)
                                    <tr style="text-align:right">
                                        <td>{{$no4++}}</td>
                                    <td>{{$dato->ruffiel}}</td>
                                    <td>{{$dato->pulso_r}}</td>
                                    <td>{{$dato->pulso_a}}</td>
                                    <td>{{$dato->pulso_d}}</td>
                                    <td>{{$dato->leyenda}}</td>
                                    <td>{{$dato->mvo}}</td>
                                    <td>{{$dato->mvoreal}}</td>
                                    <th>{{date("d-m-Y",strtotime($dato->created_at))}}</th>
                                    <td class="form-inline ">

                                        <button class="btn btn-danger mr-xl-2"
                                                data-id="{{$dato->id}}"
                                                data-id_cliente="{{$dato->id_cliente}}"
                                                data-toggle="modal" data-target="#modalBorrarRuffier"><i class="fas fa-trash-alt"></i></button>

                                    </td>
                        </tr>
                        @endforeach
                        @else
                            <td colspan="10" style="text-align: center">No hay medidas ingresados</td>
                        @endif
                        <div class="modal fade" tabindex="-1" role="dialog" id="modalBorrarRuffier">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Atención Eliminación</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post" action="{{route('ruffier.estadistica.borrar')}}">
                                        {{method_field('delete')}}

                                        <div class="modal-body">
                                            <input name="id" id="id" type="hidden">
                                            <input name="id_cliente" id="id_cliente" type="hidden">

                                            <p>¿Está seguro que desea borrar la medida de ruffier?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Aceptar</button>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>


                        </tbody>
                    </table>

                </div>
            </div>

@endsection