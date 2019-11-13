@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
            <div class="intro-text">

            </div>
        </div>
    </header>


    <div class="container">
        <div class="alert alert-dismissable mb-n4" role="alert">
            <h2 style="all: revert" class="h3centrado">Medidas Antropometricas de {{$cliente->nombre}}</h2>


            <h2 style="all: revert">
                <button type="button" class="btn btn-primary my-5 float-right">
                    <a style="color: white" class="nav-link js-scroll-trigger" href="{{route("botonimc",["id"=>$cliente->id])}}">Nuevo</a></button>
            </h2>
        </div>
    </div>


    <div class="table-responsive " style="-moz-box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);
        box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);">
        <table class="table table-striped table-hover ">
            <thead class="thead-light">
            <tr>
                <th scope="row">Peso_kg</th>
                <th scope="col">Altura°</th>
                <th scope="col">Imc</th>
                <th scope="col">Diagnostico</th>
                <th scope="col">Pecho_cm</th>
                <th scope="col">Brazo_cm</th>
                <th scope="col">ABD_A</th>
                <th scope="col">ABD_B</th>
                <th scope="col">Cadera_cm</th>
                <th scope="col">Muslo_cm</th>
                <th scope="col">Pierna_cm</th>
                <th scope="col">Fecha_de_ingreso</th>
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


                        <td class="form-inline " style="width: 300px">


                            <button class="btn btn-warning mr-xl-2 "><a style="color: white"
                                                                        href="{{route('imc.editar',[$antecedente->id,$antecedente->id_cliente])}}"><i
                                            class="fas fa-edit"></i> </a></button>


                            <form method="post" action="{{route('imc.borrar',$antecedente->id)}}"
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
        {{$antecedentes->links()}}


    </div>

@endsection