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
            <h2 style="all: revert">Test de Ruffiel</h2><br>
            <form  method="POST">
                <table>
                    <tr>
                        <td>Ingrese pulso en reposo</td>
                        <td><input type="number" placeholder="Ingrese su primer pulso"
                                   name="pul1" ></td>
                    </tr>
                    <tr>
                        <td>Ingrese pulso despues del ejercicio</td>
                        <td><input type="number" placeholder="Ingrese su segundo pulso" name="pul2" ></td>
                    </tr><br>

                    <tr>
                        <td>Ingrese pulso en descanso</td>
                        <td><input type="number" placeholder="Ingrese su tercer pulso" name="pul3" ></td>
                    </tr><br>




                    <tr>
                        <td><input type="submit" value="calcular"> </td>
                        <td><input type="reset" value="limpia celdas"></td>
                    </tr>

                </table>
            </form>





@endsection