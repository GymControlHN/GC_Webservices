
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

    <div class="container" >
        <div class="alert alert-dismissable mb-n4" role="alert">
        <h2 class="h3centrado ">Grasa Corporal <strong>{{$nombre->nombre}}</strong></h2>

            <button type="button" class="btn btn-primary my-5">
                <a style="color: white" class="nav-link js-scroll-trigger" href="{{route("botongrasa",["id"=>$nombre->id])}}">Nuevo</a></button>
            <div class="table-responsive mb-5"  style="-moz-box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);
            box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);">
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
                    <td class="form-inline " style="width: 300px">
                        <button class="btn btn-warning mr-xl-2 " ><a href="{{route('grasa.editar',[$grasa->id,$grasa->id_cliente])}}"><i class="fas fa-edit"></i></a></button>
                        <form method="post" action="{{route('grasa.borrar', $grasa->id)}}"onclick="return confirm('Estas seguro que deseas eliminar la medida? ')">
                        <button class="btn btn-danger mr-xl-2" ><i class="fas fa-trash-alt"></i></button>
                            {{method_field('delete')}}
                        </form>
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

        </div>
    </div>

@endsection