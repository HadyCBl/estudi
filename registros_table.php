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
    <h2 class="title" data-aos="fade-up" data-aos-duration="1000">Estudiantes por Grado</h2>
    
    <form id="gradeForm" method="GET">
        <div class="form-group">
            <label for="gradeSelect">Selecciona el grado:</label>
            <select class="form-control" id="gradeSelect" name="grado" onchange="changeGrade()">
                <option value="">Todos los grados</option>
                <option value="primaria">primaria</option>
                <option value="basico">basico</option>
                <option value="criminologia">criminologia</option>
                <!-- Agrega más opciones según tus necesidades -->
            </select>
        </div>
    </form>
    <form id="nivelForm" method="GET">
        <div class="form-group">
            <label for="nivelSelect">Selecciona el grado:</label>
            <select class="form-control" id="nivelSelect" name="nivel_carrera" onchange="changeGrade()">
                <option value="">Todos los niveles</option>
                <option value="1">nivel 1</option>
                <option value="2">nivel 2</option>
                <option value="3">nivel 3</option>
                <!-- Agrega más opciones según tus necesidades -->
            </select>
        </div>
    </form>

    <?php
    // Obtener el grado seleccionado
    $grado = isset($_GET['grado']) ? $_GET['grado'] : "";

    // Establecer la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "estudi";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    // Preparar la consulta SQL para obtener los registros filtrados por grado
    $sql = "SELECT * FROM alumno";
    if (!empty($grado)) {
        $sql .= " WHERE grado = '$grado'";
    }
    $sql .= " ORDER BY grado";
    
    // Ejecutar la consulta
    $result = $conn->query($sql);

    // Verificar si se encontraron registros
    if ($result->num_rows > 0) {
        // Construir la tabla HTML
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Grado</th>';
        echo '<th>Nombre</th>';
        echo '<th>Apellido</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Recorrer los resultados de la consulta
        while ($row = $result->fetch_assoc()) {
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
            $grado = $row['grado'];

            // Agregar una fila para el registro actual
            echo '<tr>';
            echo '<td>' . $grado . '</td>';
            echo '<td>' . $nombre . '</td>';
            echo '<td>' . $apellido . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo "No se encontraron registros.";
    }

    // Cerrar la conexión
    $conn->close();
    ?>
</div>

<script>
    function changeGrade() {
        // Obtener el valor seleccionado del grado
        var selectedGrade = document.getElementById("gradeSelect").value;

        // Redirigir a la página con el grado seleccionado
        if (selectedGrade !== "") {
            window.location.href = "registros_table.php?grado=" + selectedGrade;
        } else {
            window.location.href = "registros_table.php";
        }
    }
</script>


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