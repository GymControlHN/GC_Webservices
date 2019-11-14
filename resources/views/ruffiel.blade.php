@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"></div>
            </div>
        </div>
    </header>

    <div class="w3-container w3-teal mx-4">
        <div class="alert alert-dismissable mb-n4" role="alert">
            <h2 class="h3centrado">Ruffier de <strong>{{$nombre->nombre}}</strong></h2>


            <button type="button" class="btn btn-primary my-4 float-right">
                <a style="color: white" class="nav-link js-scroll-trigger" href="{{route("botonruffier",["id"=>$nombre->id])}}">Nuevo</a></button>


                <div class="table-responsive mb-5"  style="-moz-box-shadow: 1px 3px 50px 20px
                rgba(189,178,189,0.76); box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);">
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
                            <td>{{$dato->imc}}</td>
                            <td>{{$dato->edad}}</td>
                            <td>{{$dato->grasa}}</td>
                    <td>{{$dato->pulso_r}}</td>
                    <td>{{$dato->pulso_a}}</td>
                    <td>{{$dato->pulso_d}}</td>
                    <td>{{$dato->ruffiel}}</td>
                    <td>{{$dato->clasificacion}}</td>
                    <td>{{$dato->mvo2}}</td>
                    <td>{{$dato->mvoreal}}</td>
                    <td class="form-inline ">
                        <button class="btn btn-warning mr-xl-2 "><a href="{{route('grasa.editar',[$grasa->id,$grasa->id_cliente])}}"><i class="fas fa-edit"></i></a></button>
                       <form method="post" action="{{route('ruffier.borrar', $dato->id)}}" class="pull-left"
                             onclick="return confirm('Estas seguro que deseas eliminar la medida? ')">
                        <button class="btn btn-danger mr-xl-2" ><i class="fas fa-trash-alt"></i></button>
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
</div>


@endsection