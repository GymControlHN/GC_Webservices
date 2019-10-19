@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
        </div>
    </header>

    <div class="container">
        <div class="alert alert-dismissable mb-n4" role="alert">
            <h2 style="all: revert">Lista De Todos Los Clientes</h2>

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
                    <th scope="col">Numero de Cuenta o Identidad</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Profesión</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <th scope="row">2</th>
                    <td>Francisco López</td>
                    <td>20162500169</td>
                    <td>24</td>
                    <td>Informática</td>
                    <td>98-95-00-40</td>
                    <td>2/9/2019</td>
                    <td>
                        <button type="button" class="btn btn-secondary btn-sm"><a class="nav-link js-scroll-trigger" href="/verestadistica">Ver Estadística</a></button>
                    </td>
                </tr>



                </tbody>
            </table>
        </div>
    </div>

@endsection
