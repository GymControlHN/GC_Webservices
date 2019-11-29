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



    <div class="w3-container w3-teal mx-5">

        <div class="card" style=" border: none">


            @if($nombre->id_tipo_cliente==3 )

                <H3> Expediente Particular</H3>
            @endif
            @if($nombre->id_tipo_cliente==2)
                <H3> Expediente Docente</H3>

            @endif
            @if($nombre->id_tipo_cliente==1)
                <H3> Expediente Estudiante</H3>
            @endif
            <h3 style="all: revert">Grasa Corporal</h3>
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
    <a class="btn btn-primary" href="{{route("botongrasa",["id"=>$nombre->id])}}"
       style="float: right; margin-right: 50px; color: white">Nuevo

    </a>

    <div class="w3-container w3-teal mx-5">

        <div class="card" style="-moz-box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);
        box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);">


            <div class="table-responsive mb-5" >
                <table class="table ruler-vertical table-hover mx-sm-0 ">

                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Imc</th>
                        <th scope="col">edad</th>
                        <th scope="col">%Grasa</th>
                        <th scope="col">Diagnostico</th>
                        <th scope="col">PC Tricipital</th>
                        <th scope="col">PC Infraescapular</th>
                        <th scope="col">PC Supra Iliaco</th>
                        <th scope="col">PC Biciptal</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>

                    </tr>
                    </thead>

                    <tbody>
                    <tr style="text-align:right">
                        @if($grasa_corporal->count()>0)
                            @foreach($grasa_corporal as $grasa)
                                <td>{{$grasa->imc}}</td>
                                <td>{{$grasa->edad}}</td>
                                <td>{{$grasa->grasa}}</td>
                                <td>{{$grasa->leyenda}}</td>

                                <td>{{$grasa->pc_tricipital}}</td>
                                <td>{{$grasa->pc_infraescapular}}</td>
                                <td>{{$grasa->pc_supra_iliaco}}</td>
                                <td>{{$grasa->pc_biciptal}}</td>
                                <th>{{$grasa->fecha_de_ingreso}}</th>
                                <td class="form-inline ">
                                    <button class="btn btn-warning mr-xl-2 "><a
                                                href="{{route('grasa.editar',[$grasa->id,$grasa->id_cliente])}}"><i
                                                    class="fas fa-edit" style="color: #1b1e21"></i></a></button>
                                    <form method="post"
                                          action="{{route('grasa.borrar', [$grasa->id,$grasa->id_cliente])}}"
                                          onclick="return confirm('Estas seguro que deseas eliminar la medida? ')">
                                        <button class="btn btn-danger mr-xl-2"><i class="fas fa-trash-alt"></i></button>
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
                <div class="border-top my-3"></div>

                @if($grasa_corporal->count()>10)
                    <div class="panel">
                        {{ $grasa_corporal->links() }}
                    </div>
                @endif

            </div>

        </div>
    </div>

@endsection