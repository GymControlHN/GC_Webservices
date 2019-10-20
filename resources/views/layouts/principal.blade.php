<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gym Control</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">
    <link href="css/gym.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Gym Control</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/">Principal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/estudiantes">Estudiantes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/docentes">Docentes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/particulares">Particulares</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/estadisticas">Estadisticas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger"></a>
                </li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Iniciar sesion</a></li>
                    <li><a href="{{ route('register') }}">Registro</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link  dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu">
                                <a class="dropdown-item" href="/perfil">
                                    Perfil
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   style="background: #fff;"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Cerrar sesion
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                        </div>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>

@yield('content')



<!-- Footer
<footer class="footer">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <span class="copyright">Copyright &copy; unah.edu.hn 2019</span>
            </div>
            <div class="col-md-4">
                <ul class="list-inline social-buttons">
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-inline quicklinks">
                    <li class="list-inline-item">
                        <a href="#">Politica de Privacidad</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">Terminos de Uso</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>-->

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Contact form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

<!-- Custom scripts for this template -->
<script src="js/agency.min.js"></script>
<script>


        $('#edit').on('show.bs.modal', function (event){
            var button = $(event.relatedTarget) // Button that triggered the modal
            var nombre = button.data('mynombre');
            var edad = button.data('myedad');
            var cuenta = button.data('mycuenta');
            var fecha = button.data('myfecha');
            var telefono = button.data('mytelefono');
            var carrera = button.data('mycarrera');
            var nempleado = button.data('mynempleado');
            var nidentidad = button.data('myidentidad');
            var profesion = button.data('myprofesion');
            //var cat_id = button.data('catid')
            var modal = $(this);

            modal.find('.modal-body #nombre').val(nombre);
            modal.find('.modal-body #edad').val(edad);
            modal.find('.modal-body #numero_de_cuenta').val(cuenta);
            modal.find('.modal-body #fecha_de_ingreso').val(fecha);
            modal.find('.modal-body #telefono').val(telefono);
            modal.find('.modal-body #carrera').val(carrera);
            modal.find('.modal-body #numero_de_empleado').val(nempleado);
            modal.find('.modal-body #numero_de_identidad').val(nidentidad);
            modal.find('.modal-body #profesion_u_oficio').val(profesion);
            // modal.find('.modal-body #cat_id').val(cat_id);
        })


</script>

</body>

</html>
