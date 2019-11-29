@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
            <div class="intro-text">

            </div>
        </div>
    </header>



    <div class="w3-container w3-teal mx-5">

        <div class="card" style=" border: none">


            <div>

                @if($cliente->id_tipo_cliente==3 )

                    <H3> Expediente Particular</H3>
                @endif
                @if($cliente->id_tipo_cliente==2)
                    <H3> Expediente Docente</H3>

                @endif
                @if($cliente->id_tipo_cliente==1)
                    <H3> Expediente Estudiante</H3>
                @endif
                <h3 style="all: revert">Medida Antropometrica</h3>
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
                @endif

        >Pagos</a>
        <a class="btn btn-primary" href="{{route("imc.ini",[$cliente->id])}}">Imc</a>
        <a class="btn btn-secondary" href="{{route("grasa.uni",["id"=>$cliente->id])}}">Grasa</a>
        <a class="btn btn-secondary" href="{{route("ruffier.uni",["id"=>$cliente->id])}}">Ruffier</a>

    </div>

    <a class="btn btn-primary"  href="{{route("botonimc",["id"=>$cliente->id])}}"
       style="float: right; margin-right: 50px; color: white">Nuevo

    </a>



    <div class="w3-container w3-teal mx-5">

        <div class="card" style="-moz-box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);
        box-shadow: 1px 1px 10px 1px rgba(161,161,161,1); border: none">





            <div class="table-responsive mb-5" >
                <table class="table ruler-vertical table-hover mx-sm-0 ">
                    <thead class="thead-light">
                    <tr>


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

                                <td><strong>{{$antecedente->fecha_de_ingreso}}</strong></td>



                                <td class="form-inline ">


                                    <button class="btn btn-warning mr-xl-2 ">
                                        <a style="color: white"
                                           href="{{route('imc.editar',[$antecedente->id,$antecedente->id_cliente])}}"><i
                                                    class="fas fa-edit" style="color: #1b1e21"></i> </a></button>


                                    <form method="post" action="{{route('imc.borrar',[$antecedente->id,$antecedente->id_cliente])}}"
                                          onclick="return confirm('¿Estas seguro que deseas eliminar las medidas antropometricas? ')">
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
                <div class="border-top my-3"></div>

                @if($antecedentes->count()>10)
                    <div class="panel">
                        {{ $antecedentes->links() }}
                    </div>
                @endif


            </div>
        </div>
    </div>


@endsection
