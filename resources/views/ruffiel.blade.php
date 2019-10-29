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

    <div class="w3-container w3-teal mx-5">
       <h2 style="all: revert">Datos fisicos</h2>

            <form class="form-inline">

                <div class="form-group mr-sm-4 my-sm-4 ">
                    <input type="text" class="form-control" id="inputText2" placeholder="Buscar">
                </div>
                <button type="submit" class="btn btn-primary my-4 ">Buscar</button>
            </form>




            <h2 style="all: revert">Ruffier <button type="button" class="btn btn-primary mb-4 float-right">
                    <a style="color: white" class="nav-link js-scroll-trigger " href="/botonruffier">Nuevo</a></button></h2>


            <form action="">
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
                @foreach($datos as $dato)

                <tr href="/botonruffier" onclick="">
                    <td>{{$dato->fecha_de_ingreso}}</td>
                    <td>{{$dato->pulso_r}}</td>
                    <td>{{$dato->pulso_a}}</td>
                    <td>{{$dato->pulso_d}}</td>
                    <td>{{$dato->ruffier}}</td>
                    <td>{{$dato->clasificacion}}</td>
                    <td>{{$dato->mvo3}}</td>
                    <td>{{$dato->mvoreal}}</td>
                    <td class="form-inline ">
                        <button class="btn btn-secondary mr-xl-2" ><i class="fas fa-eye"></i></button>
                        <button class="btn btn-warning mr-xl-2 "><i class="fas fa-edit"></i></button>
                       <form method="post" action="{{route('ruffier.borrar', $dato->id)}}" class="pull-left">
                           {{method_field('delete')}}
                        <button class="btn btn-danger mr-xl-2" ><i class="fas fa-trash-alt"></i></button>
                       </form>
                    </td>
                </tr>
                    @endforeach
                </tbody>
             </table>
            </div>
          </form>
    </div>


@endsection