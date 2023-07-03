<?php
// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establecer la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "estudi";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    // Obtener los valores del formulario
    $nombre = $_POST['nombre'];
    $segundo_nombre = $_POST['segundo_nombre'];
    $tercer_nombre = $_POST['tercer_nombre'];
    $apellido = $_POST['apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $grado = $_POST['grado'];
    $nivel_carrera = $_POST['nivel_carrera'];

    // Verificar si ya existe un alumno con los mismos campos
    $sql_verificar = "SELECT * FROM alumno WHERE nombre='$nombre' AND segundo_nombre='$segundo_nombre' AND tercer_nombre='$tercer_nombre' AND apellido='$apellido' AND segundo_apellido='$segundo_apellido' AND fecha_nacimiento='$fecha_nacimiento' AND direccion='$direccion' AND grado='$grado' AND nivel_carrera=$nivel_carrera";
    $result_verificar = $conn->query($sql_verificar);
    if ($result_verificar->num_rows > 0) {
        // El alumno ya está registrado, muestra un mensaje de error
        echo "El alumno ya está registrado.";
    } else {
        // El alumno no está registrado, inserta los datos
        $sql_insertar = "INSERT INTO alumno (nombre, segundo_nombre, tercer_nombre, apellido, segundo_apellido, fecha_nacimiento, direccion, grado, nivel_carrera) 
            VALUES ('$nombre', '$segundo_nombre', '$tercer_nombre', '$apellido', '$segundo_apellido', '$fecha_nacimiento', '$direccion', '$grado', $nivel_carrera)";
        if ($conn->query($sql_insertar) === TRUE) {
            // Mostrar mensaje de registro completado
            echo "Registro completado.";

            // Redirigir a la página anterior
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            echo "Error al insertar los datos: " . $conn->error;
        }
    }

    // Cerrar la conexión
    $conn->close();
}
?>
