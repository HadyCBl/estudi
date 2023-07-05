<?php
session_start(); // Iniciar la sesión

// Verificar si se ha proporcionado un ID válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Realizar la conexión a la base de datos y ejecutar la consulta de eliminación
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "estudi";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    // Obtener los datos del registro antes de eliminarlo
    $selectSql = "SELECT * FROM alumno WHERE id = $id";
    $result = $conn->query($selectSql);
    $registroEliminado = $result->fetch_assoc();

    // Insertar los datos eliminados en la tabla historial
    $nombreDelete = $registroEliminado['nombre'] ;
    $segundoNombreDelete = $registroEliminado['segundo_nombre'] ;
    $tercerNombreDelete = $registroEliminado['tercer_nombre']  ;
    $apellidoDelete = $registroEliminado['apellido']  ;
    $segundoApellidoDelete = $registroEliminado['segundo_apellido']  ;
    $fechaNacimientoDelete = $registroEliminado['fecha_nacimiento']  ;
    $direccionDelete = $registroEliminado['direccion']  ;
    $gradoDelete = $registroEliminado['grado'] ;
    $nivelCarreraDelete = $registroEliminado['nivel_carrera']  ;
    $usuarioEliminador = $_SESSION['nombre']; 

    $insertSql = "INSERT INTO historial (nombre_delete, segundo_nombre_delete, tercer_nombre_delete, apellido_delete, segundo_apellido_delete, fecha_nacimiento_delete, direccion_delete, grado_delete, nivel_carrera_delete, usuario_eliminador) VALUES ('$nombreDelete', '$segundoNombreDelete', '$tercerNombreDelete', '$apellidoDelete', '$segundoApellidoDelete', '$fechaNacimientoDelete', '$direccionDelete', '$gradoDelete', '$nivelCarreraDelete', '$usuarioEliminador')";
    if ($conn->query($insertSql) === TRUE) {

        $deleteSql = "DELETE FROM alumno WHERE id = $id";
    if ($conn->query($deleteSql) === TRUE) {
        echo "El registro ha sido eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
        header("Location: actualizar_reg.php");
            exit();
    } else {
        echo "Error al almacenar los datos eliminados en el historial: " . $conn->error;
    }

 
    

    $conn->close();
} else {
    echo "ID no válido. No se puede eliminar el registro.";
}
?>
