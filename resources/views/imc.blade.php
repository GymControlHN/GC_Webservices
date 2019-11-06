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

    <div class="w3-container w3-teal mx-5" style="font-family: 'Raleway', sans-serif">

    <div class="container">
        <div class="alert alert-dismissable mb-n4" role="alert">
            <h2 style="all: revert" class="h3centrado">Medidas Antropometricas</h2>






            <h2 style="all: revert">   <button type="button" class="btn btn-primary my-5 float-right" >
                    <a style="color: white" class="nav-link js-scroll-trigger" href="/botonimc">Nuevo</a></button></h2>

            <div class="table-responsive  mx-sm-5"  style="-moz-box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);
    box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);">
                <table class="table ruler-vertical    table-hover mx-sm-0 ">


                <thead class="thead-light " >
                <tr>
                    <th scope="row">Peso kg</th>
                    <th scope="col">Altura°</th>
                    <th scope="col">Imc</th>
                    <th scope="col">Diagnostico</th>
                    <th scope="col">Pecho_cm</th>
                    <th scope="col">Brazo_cm</th>
                    <th scope="col">ABD-A</th>
                    <th scope="col">ABD-B</th>
                    <th scope="col">Cadera cm</th>
                    <th scope="col">Muslo cm</th>
                    <th scope="col">Pierna cm</th>
                    <th scope="col">Fecha de ingreso</th>
                    <th scope="col" class="col-sm-5" >Acciones</th>
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
                                                                    href="{{route('imc.editar',$antecedente->id)}}"><i class="fas fa-edit"></i> </a></button>

                        <form method="post" action="{{route('imc.borrar', $antecedente->id)}}" onclick="return confirm('Estas seguro que deseas eliminar las medidas antropometricas? ')">
                            <button class="btn btn-danger mr-xl-2 "><i class="fas fa-trash-alt"></i></button>
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
    </div>
    </div>
    </div>

@endsection