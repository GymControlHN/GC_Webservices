@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
            <div class="intro-text">

            </div>
        </div>
    </header>
    <div class="container-xl clearfix px-2 mt-4">
        <div class="col-md-1 col-md-2 col-12 float-md-left mr-5 pr-md-8 pr-xl-6">
            <img src="/clientes_imagenes/{{$cliente->imagen}}" width="200px"
                 height="200px">
            <div>
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
                <h6 style="all: revert">Medida Antropometrica</h6>

            </div>
        </div>

        <div class="col-lg-9 col-md-10 p-r-10 col-12 pl-md-2 float-left">
            <div class="card"
                 style="width: 170px; border: none;background: transparent;">
                <div class="card-header" style="background: transparent;height: 50px;">
                    @if($cliente->id_tipo_cliente==3 )
                        <a class="btn btn-default" href="/particulares"><span><i
                                        class="fa fa-arrow-circle-left"></i></span>
                            Regresar</a>

                    @endif
                    @if($cliente->id_tipo_cliente==2)
                        <a class="btn btn-default" href="/docentes"><span><i class="fa fa-arrow-circle-left"></i></span>
                            Regresar</a>

                    @endif
                    @if($cliente->id_tipo_cliente==1)
                        <a class="btn btn-default" href="/estudiantes"><span><i
                                        class="fa fa-arrow-circle-left"></i></span>
                            Regresar</a>
                    @endif

                </div>
            </div>

            <div class="card" style=" border: none;">


                <div class="btn-group" style="width: 50px; float: left" role="group"
                     aria-label="Button group with nested dropdown">


                    @if($cliente->id_tipo_cliente==3||$cliente->id_tipo_cliente==1)
                        <a class="btn btn-secondary" @if($cliente->id_tipo_cliente==3)
                        href="{{route("pagoparticulares",["id"=>$cliente->id])}}"
                           @endif
                           @if($cliente->id_tipo_cliente ==1)
                           href="{{route("pagoestudiantes",["id"=>$cliente->id])}}" @endif

                           @if($cliente->id_tipo_cliente ==2)
                           style="display: none;"
                                @endif

                        >Pagos</a>
                    @endif


                    <a class="btn btn-primary" href="{{route("imc.ini",[$cliente->id])}}">Imc</a>
                    <a class="btn btn-secondary" href="{{route("grasa.uni",["id"=>$cliente->id])}}">Grasa</a>
                    <a class="btn btn-secondary" href="{{route("ruffier.uni",["id"=>$cliente->id])}}">Ruffier</a>

                </div>
                <a class="btn btn-primary pull-right" href="{{route("botonimc",["id"=>$cliente->id])}}"
                   style="float: right; width: 80px; margin-left: 92%; color: white">Nuevo
                </a>
            </div>


            <div class=" mt-4">
                <div class="card" style="-moz-box-shadow: 0px 5px 3px 3px rgba(194,194,194,1);
box-shadow: 0px 5px 3px 3px rgba(194,194,194,1);border: none ">


                    <div class="table-responsive-lg ">
                        <table class="table ruler-vertical table-hover">
                            <thead class="thead-dark">
                            <tr>

                                <th scope="col">N°</th>
                                <th scope="col">Peso Kg</th>
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
                                <th scope="col">Fecha</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if($antecedentes->count()>0)

                                @foreach($antecedentes as $antecedente)
                                    <tr style="text-align:right">
                                        <td>{{$no++}}</td>
                                        <td>{{$antecedente->peso}}</td>
                                        <td>{{$antecedente->altura}}</td>
                                        <td>{{$antecedente->imc}}</td>
                                        <td>{{$antecedente->diagnostico}}</td>
                                        <td>{{$antecedente->pecho}}</td>
                                        <td>{{$antecedente->brazo}}</td>
                                        <td>{{$antecedente->ABD_A}}</td>
                                        <td>{{$antecedente->ABD_B}}</td>
                                        <td>{{$antecedente->cadera}}</td>
                                        <td>{{$antecedente->muslo}}</td>
                                        <td>{{$antecedente->pierna}}</td>

                                        <td><strong>{{date("d-m-Y",strtotime($antecedente->created_at))}}</strong></td>


                                        <td class="form-inline ">


                                            <button class="btn btn-warning mr-xl-2 ">
                                                <a style="color: white"
                                                   href="{{route('imc.editar',[$antecedente->id,$antecedente->id_cliente])}}"><i
                                                            class="fas fa-edit" style="color: #1b1e21"></i> </a>
                                            </button>


                                            <button class="btn btn-danger mr-xl-2"
                                                    data-id="{{$antecedente->id}}"
                                                    data-id_cliente="{{$antecedente->id_cliente}}"
                                                    data-toggle="modal" data-target="#modalBorrarImc"><i
                                                        class="fas fa-trash-alt"></i></button>


                                        </td>
                                @endforeach



                            @else
                                <tr>
                                    <td colspan="14" style="text-align: center">No hay medidas ingresadas</td>
                                </tr>
                            @endif


                            </tbody>
                        </table>
                        <div class="border-top my-3"></div>

                        @if($antecedentes->count()>10)
                            <div class="panel">
                                {{ $antecedentes->links() }}
                            </div>
                        @endif


                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="modalBorrarImc">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Atención Eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('imc.borrar')}}">
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


@endsection
