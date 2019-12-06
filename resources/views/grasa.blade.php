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

    <div class="card" style="width: 170px; border: none;background: transparent;margin-left: 50px;margin-top: 5px">
        <div class="card-header" style="background: transparent;height: 50px;" >
            @if($nombre->id_tipo_cliente==3 )
                <a class="btn btn-default" href="/particulares"><span><i class="fa fa-arrow-circle-left"></i></span> Regresar</a>

            @endif
            @if($nombre->id_tipo_cliente==2)
                <a class="btn btn-default" href="/docentes"><span><i class="fa fa-arrow-circle-left"></i></span> Regresar</a>

            @endif
            @if($nombre->id_tipo_cliente==1)
                <a class="btn btn-default" href="/estudiantes"><span><i class="fa fa-arrow-circle-left"></i></span> Regresar</a>
            @endif

        </div>
    </div>



    <div class="w3-container w3-teal mx-5">

        <div class="card margencard" style=" border: none">


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
    <a class="btn btn-primary" href="{{route("botongrasa",["id"=>$nombre->id])}}"
       style="float: right; margin-right: 50px; color: white">Nuevo

    </a>

    <div class="w3-container w3-teal mx-5">

        <div class="card" style="-moz-box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);
        box-shadow: 1px 1px 10px 1px rgba(161,161,161,1);">


            <div class="table-responsive mb-5" >
                <table class="table ruler-vertical table-hover mx-sm-0 ">

                    <thead class="thead-light">
                    <tr >
                        <th scope="col">N°</th>


                        <th scope="col">PC Tricipital</th>
                        <th scope="col">PC Infraescapular</th>
                        <th scope="col">PC Supra Ilíaco</th>
                        <th scope="col">PC Biciptal</th>
                        <th scope="col">Porcentaje</th>
                        <th scope="col">Clasificacion</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>

                    </tr>
                    </thead>

                    <tbody>

                        @if($grasa_corporal->count()>0)
                            @foreach($grasa_corporal as $grasa)
                                <tr style="text-align:right">
                                    <td>{{$no++}}</td>


                                <td>{{$grasa->pc_tricipital}}</td>
                                <td>{{$grasa->pc_infraescapular}}</td>
                                <td>{{$grasa->pc_supra_iliaco}}</td>
                                <td>{{$grasa->pc_biciptal}}</td>

                                    <td>{{$grasa->grasa}}</td>
                                    <td>{{$grasa->leyenda}}</td>
                                <th>{{date("d-m-Y",strtotime($grasa->created_at))}}</th>
                                <td class="form-inline ">
                                    <button class="btn btn-warning mr-xl-2 "><a
                                                href="{{route('grasa.editar',[$grasa->id,$grasa->id_cliente])}}"><i
                                                    class="fas fa-edit" style="color: #1b1e21"></i></a></button>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="modalBorrarGrasa">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Atención Eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('grasa.borrar')}}">
                    {{method_field('delete')}}

                    <div class="modal-body">
                        <input name="id" id="id" type="hidden">
                        <input name="id_cliente" id="id_cliente" type="hidden">

                        <p>¿Está seguro que desea borrar la medida la grasa?</p>
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