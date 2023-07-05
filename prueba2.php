<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();

if (isset($_SESSION['correo'])) {
    $nombre = $_SESSION['nombre'];
    $correo = $_SESSION['correo'];
} else {
    header("Location: ../administrador/index.php");
    exit();
}
?>

<h4>Bienvenido:</h4>
<p><?php echo $nombre; ?></p>
<p><?php echo $correo; ?></p>

</body>
</html>