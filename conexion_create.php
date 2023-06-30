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

    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $contraseña = $_POST["pass"];
    $cargo = $_POST["cargo"];

    // Verificar si el correo o nombre ya están registrados
    $sql_verificar = "SELECT * FROM cuenta WHERE correo = '$correo' OR nombre = '$nombre'";
    $result_verificar = $conn->query($sql_verificar);

    if ($result_verificar->num_rows > 0) {
        // El correo o nombre ya están registrados
        echo "El correo o nombre ya están registrados. Por favor, intenta con otro.";
    } else {
        // Preparar la consulta SQL para insertar los datos en la tabla "cuenta"
        $sql_insertar = "INSERT INTO cuenta (nombre, apellido, correo, pass, cargo) VALUES ('$nombre', '$apellido', '$correo', '$contraseña', '$cargo')";

        // Ejecutar la consulta SQL para insertar los datos
        if ($conn->query($sql_insertar) === TRUE) {
            echo "Datos insertados correctamente";
        } else {
            echo "Error al insertar datos: " . $conn->error;
        }
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
