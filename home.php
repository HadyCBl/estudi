<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Registro
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="assets/css/material-kit.css?v=2.0.5" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/hover-min.css" rel="stylesheet">

</head>

<body class="landing-page sidebar-collapse">
    <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100"
        id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="#">
                    <img src="assets/img/logo.png" width="110" height="40"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#"
                            data-original-title="English">🇺🇸 <b> Eng </b></a>
                    </li>
                    <li class="nav-item">

                        <a href="home.php" class="btn btn-primary">
                            <i class="material-icons">create</i>
                            Registrar
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="registros_table.php" class="btn btn-primary">
                            <i class="material-icons">list</i>
                            Ver Registros
                        </a>


                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main main-raised" id="id-about">
        <div class="container">
            <div class="section text-center">
                <div class="row">
                </div>
                <div class="section text-center">
                    <h2 class="title" data-aos="fade-up" data-aos-duration="1000">Registrar</h2>
                    <form action="guardar_alumno.php" method="POST">
                        <div class="row" data-aos="fade-up" data-aos-duration="2000">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre" class="bmd-label-floating"> Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="segundo_nombre" class="bmd-label-floating">Segundo Nombre</label>
                                    <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tercer_nombre" class="bmd-label-floating">Tercer Nombre</label>
                                    <input type="text" class="form-control" name="tercer_nombre" id="tercer_nombre">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="apellido" class="bmd-label-floating">Apellido</label>
                                    <input type="text" class="form-control" name="apellido" id="apellido" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="segundo_apellido" class="bmd-label-floating">Segundo Apellido</label>
                                    <input type="text" class="form-control" name="segundo_apellido"
                                        id="segundo_apellido">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha_nacimiento" class="bmd-label-floating">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" name="fecha_nacimiento"
                                        id="fecha_nacimiento" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="direccion" class="bmd-label-floating">Dirección</label>
                                    <input type="text" class="form-control" name="direccion" id="direccion" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="grado" class="bmd-label-floating">Grado</label>
                                    <select class="form-control" name="grado" id="grado" required>
                                        <option value="">Selecciona un grado</option>
                                        <option value="primaria">Primaria</option>
                                        <option value="basico">Básico</option>
                                        <option value="criminologia">Criminología</option>
                                        <option value="computacion"> Perio en Computación</option>
                                        <option value="turismo">Turismo</option>
                                        <option value="magisterio">Magisterio</option>
                                        <option value="administracion">Administracion de empresas </option>
                                        <option value="electronica">Electronica</option>
                                        <option value="Mecanica">Mecanica</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nivel_carrera" class="bmd-label-floating">Nivel/Carrera (1-6)</label>
                                    <input type="number" class="form-control" name="nivel_carrera" id="nivel_carrera"
                                        min="1" max="6" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
                <!-- map -->
            </div>
        </div>
    </div>

    <div class="page-header header-filter" data-parallax="true"
        style="background-image: url('assets/img/bg-masthead1.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-6 animated fadeInDown delay-1s">
                    <h4 id="welcome-message">bienvenido ...()</h4>
                    <br>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer footer-default">
        <div class="container">
            <nav class="float-left">
                <ul>
                    <li>
                        <a href="tel:+502 50154938">
                            Contáctacta al Programador
                        </a>
                    </li>
                    <li>3
                        <a href="https://www.instagram.com/_harveycbl/">
                            Acerca de Nosotros
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright float-right">
                &copy; <script>
                document.write(new Date().getFullYear())
                </script> Harvey Danny Enrique <b style="font-weight: bold; color: #333;">+502 50154938</b>
            </div>
        </div>
    </footer>
    <!-- END Bootstrap-Cookie-Alert -->
    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="assets/js/plugins/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-133328003-1"></script>
    <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/material-kit.js?v=2.0.5" type="text/javascript"></script>
    <script>
    AOS.init();
    </script>

</body>

</html>