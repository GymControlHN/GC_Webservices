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
    @if($nombre->id_tipo_cliente==1)
        <nav aria-label="breadcrumb" style="margin:1%; margin-right:70%;">
            <ol class="breadcrumb" style="background-color: white" >
                <li class="breadcrumb-item"><a href="/estudiantes">Estudiante</a></li>
                <li class="breadcrumb-item active" aria-current="page">Grasa Corporal</li>
            </ol>

        </nav>
    @endif

    @if($nombre->id_tipo_cliente==2)
        <nav aria-label="breadcrumb" style="margin:1%; margin-right:70%;">
            <ol class="breadcrumb" style="background-color: white" >
                <li class="breadcrumb-item"><a href="/particulares">Docente</a></li>
                <li class="breadcrumb-item active" aria-current="page">Grasa Corporal</li>
            </ol>

        </nav>

    @endif

    @if($nombre->id_tipo_cliente==3 )
        <nav aria-label="breadcrumb" style="margin:1%; margin-right:70%;">
            <ol class="breadcrumb" style="background-color: white" >
                <li class="breadcrumb-item"><a href="/particulares">Particular</a></li>
                <li class="breadcrumb-item active" aria-current="page">Grasa Corporal</li>
            </ol>

        </nav>

    @endif



    <div class="container-xl clearfix px-2 mt-4">
        @if($nombre->id_tipo_cliente==1)
            <h2 style="margin-left: 1%">Expediente Estudiante</h2>
        @endif
        @if($nombre->id_tipo_cliente==3 )

            <h2 style="margin-left: 1%">Expediente Particular</h2>
        @endif
        @if($nombre->id_tipo_cliente==2)
            <h2 style="margin-left: 1%">Expediente Docente</h2>
        @endif
        <div id="divPerfil" class="perfil col-md-1 col-md-2 col-12 float-md-left mr-5 pr-md-8 mt-lg-5 pr-xl-6">


        <img src="/clientes_imagenes/{{$nombre->imagen}}" width="200px" height="200px" style="; object-fit: cover" >

        <div class="card margencard" style=" border: none;" >

            <div >
                <h5 style="margin-top: 10%">{{$nombre->nombre}}</h5>
            <h6 style="all: revert">Grasa Corporal</h6>
                <div style="max-height: 250px;">{!! $chart->container() !!}</div>


        </div>
    </div>

            <div class="card"
                 style="width: 170px; border: none">
                <div  style="background: transparent;">

                </div>
            </div>
        </div>
    <div class="btn-group mt-3 mb-5" style="margin-left: .1%;" role="group" aria-label="Button group with nested dropdown">
        @if($nombre->id_tipo_cliente==3||$nombre->id_tipo_cliente==1)

            <a class="btn btn-secondary btn-sm" @if($nombre->id_tipo_cliente==3)
            href="{{route("pagoparticulares",["id"=>$nombre->id])}}"
           @endif
           @if($nombre->id_tipo_cliente ==1)
           href="{{route("pagoestudiantes",["id"=>$nombre->id])}}" @endif

           @if($nombre->id_tipo_cliente ==2)
           style="display: none;"
                @endif >Pagos</a>
        @endif


        <a class="btn btn-secondary btn-sm" href="{{route("imc.ini",[$nombre->id])}}">MedidasAntropometricas</a>
        <a class="btn btn-primary btn-sm" href="{{route("grasa.uni",["id"=>$nombre->id])}}">GrasaCorporal</a>
        <a class="btn btn-secondary btn-sm" href="{{route("ruffier.uni",["id"=>$nombre->id])}}">Ruffier</a>
            <a class="btn btn-secondary btn-sm" href="{{route("grafico.mostrar",["id"=>$nombre->id])}}">Grafico</a>

    </div>
    <a class="btn btn-primary btn-sm mt-3" href="{{route("botongrasa",["id"=>$nombre->id])}}"
       style="float: right; margin-right: 50px;color: white">Nuevo

    </a>

    <div class="w3-container w3-teal mx-5">

        <div class="card" style="-moz-box-shadow: 0px 5px 3px 3px rgba(194,194,194,1);
box-shadow: 0px 5px 3px 3px rgba(194,194,194,1);border: none">


            <div class="table-responsive" >
                <table class="table table-hover">

                    <thead class="thead-dark">
                    <tr >
                        <th scope="col">N°</th>

                        <th scope="col">Fecha</th>
                        <th scope="col">Clasificacion</th>
                        <th scope="col">PC Tricipital</th>
                        <th scope="col">PC Infraescapular</th>
                        <th scope="col">PC Supra Ilíaco</th>
                        <th scope="col">PC Biciptal</th>
                        <th scope="col">Porcentaje</th>


                        <th scope="col">Acciones</th>

                    </tr>
                    </thead>

                    <tbody>

                        @if($grasa_corporal->count()>0)
                            @foreach($grasa_corporal as $grasa)
                                <tr style="text-align:right">
                                    <td>{{$no++}}</td>
                                    <th>{{date("d-m-Y",strtotime($grasa->created_at))}}</th>
                                    <td style="text-align: center">{{$grasa->diagnostico}}</td>


                                <td>{{$grasa->pc_tricipital}}</td>
                                <td>{{$grasa->pc_infraescapular}}</td>
                                <td>{{$grasa->pc_supra_iliaco}}</td>
                                <td>{{$grasa->pc_biciptal}}</td>

                                    <td>{{$grasa->grasa}}</td>


                                <td class="form-inline ">
                                    <button class="btn btn-warning mr-xl-2 "><a
                                                href="{{route('grasa.editar',["id_grasa"=>$grasa->id,"id_cliente"=>$grasa->id_cliente])}}"><i
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
                            <td colspan="11" style="text-align: center">No hay medidas ingresadas</td>
                    @endif

                    </tbody>
                </table>


                @if($grasa_corporal->count()>10)
                    <div class="panel">
                        {{ $grasa_corporal->links() }}
                    </div>
                @endif
            </div>
            </div>


        </div>
        <div class="container" style="margin: 50px">

        </div>
    </div>
    {!! $chart->script() !!}
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
    <style>
        .perfil{
            position: -webkit-sticky; /* Safari */
            position: sticky;
            overflow-y: hidden;
            top: 10%;
        }
    </style>

    <script>
        window.addEventListener('scroll', function() {
            document.querySelector('.perfil').style.marginTop =
                Math.max(5, 100 - this.scrollY) + 'px';
        }, false);
    </script>
@endsection