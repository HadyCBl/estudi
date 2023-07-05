<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estudi";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

$id = $_POST['id'] ?? '';

if (!empty($id)) {
    $sql = "DELETE FROM alumno WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: actualizar_reg.php");
        exit;
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
} else {
    echo "ID de registro no proporcionado.";
}

$conn->close();
?>
