<?php
$servername = "localhost";
$username = "id20999683_harvey";
$password = "Dannycbl200@";
$dbname = "id20999683_estudi";

// Verificar si se ha proporcionado el ID del registro a actualizar
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Crear la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    // Obtener los datos actuales del registro
    $sql = "SELECT * FROM alumno WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre = $row["nombre"];
        $segundo_nombre = $row["segundo_nombre"];
        $tercer_nombre = $row["tercer_nombre"];
        $apellido = $row["apellido"];
        $segundo_apellido = $row["segundo_apellido"];
        $fecha_nacimiento = $row["fecha_nacimiento"];
        $direccion = $row["direccion"];
        $grado = $row["grado"];
        $nivel_carrera = $row["nivel_carrera"];

        // Mostrar el formulario de actualización con los datos actuales
        ?>
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
                    <li class="nav-item">

                        <a href="home.php" class="btn btn-primary">
                            <i class="material-icons">create</i>
                            Registrar
                        </a>

                  

                </ul>
            </div>
        </div>
    </nav>

    <div class="main main-raised" id="id-about">
        <div class="container">
            <div class="section text-center">
                <div class="row">
                    <!-- ... -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h2>Formulario de Actualización</h2>
                        <form action="save_update.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre" class="bmd-label-floating">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre"
                                        value="<?php echo $nombre; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="segundo_nombre" class="bmd-label-floating">Segundo Nombre</label>
                                    <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre"
                                        value="<?php echo $segundo_nombre; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tercer_nombre" class="bmd-label-floating">Tercer Nombre</label>
                                    <input type="text" class="form-control" name="tercer_nombre" id="tercer_nombre"
                                        value="<?php echo $tercer_nombre; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="apellido" class="bmd-label-floating">Apellido</label>
                                    <input type="text" class="form-control" name="apellido" id="apellido"
                                        value="<?php echo $apellido; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="segundo_apellido" class="bmd-label-floating">Segundo Apellido</label>
                                    <input type="text" class="form-control" name="segundo_apellido"
                                        id="segundo_apellido" value="<?php echo $segundo_apellido; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha_nacimiento" class="bmd-label-floating">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" name="fecha_nacimiento"
                                        id="fecha_nacimiento" value="<?php echo $fecha_nacimiento; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="direccion" class="bmd-label-floating">Dirección</label>
                                    <input type="text" class="form-control" name="direccion" id="direccion"
                                        value="<?php echo $direccion; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="grado" class="bmd-label-floating">Grado</label>
                                    <input type="text" class="form-control" name="grado" id="grado"
                                        value="<?php echo $grado; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nivel_carrera" class="bmd-label-floating">Nivel de Carrera</label>
                                    <input type="number" class="form-control" name="nivel_carrera" id="nivel_carrera"
                                        value="<?php echo $nivel_carrera; ?>">
                                </div>
                            </div>

                            <!-- Resto del formulario... -->

                            <input type="submit" value="Guardar" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ... -->
</body>

</html>

<?php
    } else {
        echo "No se encontró el registro.";
    }

    $conn->close();
} else {
    echo "No se ha proporcionado un ID válido.";
}
?>