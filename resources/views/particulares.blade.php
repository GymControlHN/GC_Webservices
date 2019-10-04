@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Particulares</div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="alert alert-dismissable mb-n4" role="alert">
            <h2 style="all: revert">Listado de Particulares</h2>
            <button type="button"  class="btn btn-warning float-right" data-dismiss="alert" >
                <i class="fas fa-user-plus"></i>
            </button>

            <form class="form-inline">

                <div class="form-group mr-sm-4 my-sm-4 ">
                    <input type="text" class="form-control" id="inputText2" placeholder="Buscar">
                </div>
                <button type="submit" class="btn btn-primary my-4 ">Buscar</button>
            </form>
            <table class="table  mx-sm-0" style="-moz-box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);
    box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);">
                <thead class="thead-light">
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Numero de Identidad</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>0703-1995-01957</td>
                    <td>tuto</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>fruta</td>
                    <td>
                        <button class="btn btn-secondary"><i class="fas fa-eye"></i></button>
                        <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-info "><i class="far fa-calendar-alt"></i></button>
                        <button class="btn btn-danger "><i class="fas fa-trash-alt"></i></button>


                    </td>

                </tr>

                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>0703-1995-01957</td>
                    <td>tuto</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>fruta</td>
                    <td>
                        <button class="btn btn-secondary"><i class="fas fa-eye"></i></button>
                        <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-info "><i class="far fa-calendar-alt"></i></button>
                        <button class="btn btn-danger "><i class="fas fa-trash-alt"></i></button>

                    </td>
                </tr>

                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>0703-1995-01957</td>
                    <td>tuto</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>fruta</td>
                    <td>
                        <button class="btn btn-secondary"><i class="fas fa-eye"></i></button>
                        <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-info "><i class="far fa-calendar-alt"></i></button>
                        <button class="btn btn-danger "><i class="fas fa-trash-alt"></i></button>

                    </td>
                </tr>

                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>0703-1995-01957</td>
                    <td>tuto</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>fruta</td>
                    <td>
                        <button class="btn btn-secondary"><i class="fas fa-eye"></i></button>
                        <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-info "><i class="far fa-calendar-alt"></i></button>
                        <button class="btn btn-danger "><i class="fas fa-trash-alt"></i></button>

                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

@endsection