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
                            data-original-title="Cerrar sesión" onclick="cerrarSesion()">
                            bai <b>Cerrar sesión</b>
                        </a>
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

                    <li class="nav-item">
                        <a href="actualizar_reg.php" class="btn btn-primary">
                            <i class="material-icons">spellcheck</i>
                            editar Registros
                        </a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a href="Historial_reg.php" class="btn btn-primary">
                            <i class="material-icons">format_align_justify</i>
                            Historial de cambios
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="main main-raised" id="id-about">
        <div class="container">
            <div class="section text-center">
                <div class="row"></div>

                <div class="section text-center">
                    <h2 class="title" data-aos="fade-up" data-aos-duration="1000">ACTUALIZA/EDITA LOS REGISTROS </h2>
                    <label for="gradeSelect">Recuerda que cada cambio se guardara en el Historial para mayor
                        seguridad</label>

                    <form id="searchForm" method="GET">
                        <div class="form-group">
                            <label for="gradeSelect">Selecciona el grado:</label>
                            <select class="form-control" id="gradeSelect" name="grado">
                                <option value="">Selecciona un grado</option>
                                <option value="primaria">Primaria</option>
                                <option value="basico">Básico</option>
                                <option value="criminologia">Criminología</option>
                                <option value="computacion">Perio en Computación</option>
                                <option value="turismo">Turismo</option>
                                <option value="magisterio">Magisterio</option>
                                <option value="administracion">Administracion de empresas</option>
                                <option value="electronica">Electronica</option>
                                <option value="mecanica">Mecanica</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nivelSelect">Selecciona el nivel:</label>
                            <select class="form-control" id="nivel_carrera" name="nivel_carrera">
                                <option value="#">Todos los niveles</option>
                                <option value="1">nivel 1</option>
                                <option value="2">nivel 2</option>
                                <option value="3">nivel 3</option>
                                <option value="4">nivel 4</option>
                                <option value="5">nivel 5</option>
                                <option value="6">nivel 6</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="material-icons">send</i> 
                        </button>

                    </form>

                    <?php
// Obtener el grado seleccionado
$grado = isset($_GET['grado']) ? $_GET['grado'] : "";   

// Obtener el nivel seleccionado
$nivel = isset($_GET['nivel_carrera']) ? $_GET['nivel_carrera'] : "";

// Establecer la conexión a la base de datos
$servername = "localhost";
$username = "id20999683_harvey";
$password = "Dannycbl200@";
$dbname = "id20999683_estudi";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

// Preparar la consulta SQL para obtener los registros filtrados por grado y nivel
$sql = "SELECT * FROM alumno WHERE 1=1";
if (!empty($grado)) {
    $sql .= " AND grado = '$grado'";
}
if (!empty($nivel)) {
    $sql .= " AND nivel_carrera = '$nivel'";
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
    echo '<th>ID</th>';
    echo '<th>Grado</th>';
    echo '<th>Nombre</th>';
    echo '<th>Segundo Nombre</th>';
    echo '<th>Tercer Nombre</th>';
    echo '<th>Apellido</th>';
    echo '<th>Segundo Apellido</th>';
    echo '<th>Fecha de Nacimiento</th>';
    echo '<th>Dirección</th>';
    echo '<th>Nivel</th>';
    echo '<th>Acciones</th>'; // Nueva columna de acciones
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Recorrer los resultados de la consulta
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $grado = $row['grado'];
        $nombre = $row['nombre'];
        $segundo_nombre = $row['segundo_nombre'];
        $tercer_nombre = $row['tercer_nombre'];
        $apellido = $row['apellido'];
        $segundo_apellido = $row['segundo_apellido'];
        $fecha_nacimiento = $row['fecha_nacimiento'];
        $direccion = $row['direccion'];
        $nivel_carrera = $row['nivel_carrera'];

        // Agregar una fila para el registro actual 
        echo '<tr>';
                        echo '<td>' . $id . '</td>';
                        echo '<td>' . $grado . '</td>';
                        echo '<td>' . $nombre . '</td>';
                        echo '<td>' . $segundo_nombre . '</td>';
                        echo '<td>' . $tercer_nombre . '</td>';
                        echo '<td>' . $apellido . '</td>';
                        echo '<td>' . $segundo_apellido . '</td>';
                        echo '<td>' . $fecha_nacimiento . '</td>';
                        echo '<td>' . $direccion . '</td>';
                        echo '<td>' . $nivel_carrera . '</td>';
                        echo '<td>';
                        echo '<a href="eliminar_registro.php?id=' . $id . '">Eliminar</a> | '; // Enlace para eliminar el registro
                        echo '<a href="actualizar_registro.php?id=' . $id . '">Actualizar</a>'; // Enlace para actualizar el registro
                        echo '</td>';
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
            </div>
        </div>



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
    <!-- cerrar sesion-->
    <script>
    function cerrarSesion() {
        // Aquí debes incluir el código necesario para cerrar la sesión, como redireccionar a una página de inicio de sesión o eliminar las variables de sesión.

        // Redirigir al usuario a index.html
        window.location.href = "index.html";
    }
    </script>


    <script>
    AOS.init();
    </script>

</body>

</html>