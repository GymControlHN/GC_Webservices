@extends("layouts.principal")

@section("content")
    <!-- Header -->
    <header class="fondo" style="max-height: 100px;">
        <div class="container">
        </div>
    </header>

    <div class="container">
        <h2 class="h3centrado">Registro de pagos mensuales</h2>

        <button class="btn btn-danger botonpago" data-toggle="modal" data-target="#exampleModalScrollable2">
            <i class="fas fa-dollar-sign"></i> Agregar pago </button>

        <div class="modal fade" id="exampleModalScrollable2" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Agregar Pago</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                    <div class="modal-body">
                        <form>
                            <h6>Mes</h6>
                            <div class="form-group">
                                <select class="form-control" id="carrera" placeholder="seleccione">
                                    <option></option>
                                    <option>Enero</option>
                                    <option>Febrero</option>
                                    <option>Marzo</option>
                                    <option>Abril</option>
                                    <option>Mayo</option>
                                    <option>Junio</option>
                                    <option>Julio</option>
                                    <option>Agosto</option>
                                    <option>Septiembre</option>
                                    <option>Obtubre</option>
                                    <option>Noviembre</option>
                                    <option>Diciembre</option>
                                </select>
                            </div>
                            <h6>Fecha</h6>
                            <div class="form-group">
                                <input type="date" class="form-control" id="fecha">
                            </div>

                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                            <button type="submit"  class="btn btn-primary">Guardar</button>


                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div>
            <h1> </h1>
        </div>
        <div class="card">
            <div class="card-body">
                Registros del año 2019
            </div>
        </div>
        <table class="table  mx-sm-0" style="-moz-box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);
                      box-shadow: 1px 3px 50px 20px rgba(189,178,189,0.76);">
            <tbody>
            <tr>
                <td>Enero</td>
                <td>05/01/19</td>
                <td>cancelado</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
