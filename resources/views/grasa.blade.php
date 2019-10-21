
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

    <div class="container">
        <div class="alert alert-dismissable mb-n4" role="alert">
            <h2 style="all: revert">Datos fisicos</h2>

            <form class="form-inline">

                <div class="form-group mr-sm-4 my-sm-4 ">
                    <input type="text" class="form-control" id="inputText2" placeholder="Buscar">
                </div>
                <button type="submit" class="btn btn-primary my-4 ">Buscar</button>
            </form>







            <h2 style="all: revert">Grasa Corporal <button type="button" class="btn btn-primary my-5">
                    <a style="color: white" class="nav-link js-scroll-trigger" href="/botongrasa">Nuevo</a></button></h2>
            <table class="table  mx-sm-0" style="-moz-box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);
                box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Imc</th>
                    <th scope="col">edad</th>
                    <th scope="col">%Grasa</th>
                    <th scope="col">Acciones</th>

                </tr>
                </thead>

                <tbody>
                <tr>
                    <th scope="row">2019/11/16</th>
                    <td>24.5</td>
                    <td>45</td>
                    <td>8.9</td>
                    <td class="form-inline " style="width: 300px">
                        <button class="btn btn-secondary mr-xl-2" ><i class="fas fa-eye"></i></button>
                        <button class="btn btn-warning mr-xl-2 "><i class="fas fa-edit"></i></button>

                        <button class="btn btn-danger mr-xl-2" ><i class="fas fa-trash-alt"></i></button>

                    </td>


                </tbody>
                <tbody>
                <tr>
                    <th scope="row">2019/10/16</th>
                    <td>24.5</td>
                    <td>45</td>
                    <td>8.9</td>
                    <td class="form-inline " style="width: 300px">
                        <button class="btn btn-secondary mr-xl-2" ><i class="fas fa-eye"></i></button>
                        <button class="btn btn-warning mr-xl-2 "><i class="fas fa-edit"></i></button>

                        <button class="btn btn-danger mr-xl-2" ><i class="fas fa-trash-alt"></i></button>

                    </td>


                </tbody>
            </table>












        </div>
    </div>

@endsection