<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
    $contraseña = $_POST['contraseña'];
    $errores = '';

    if (empty($correo) || empty($contraseña)) {
        $errores .= '<li>Llena todos los campos</li>';
    } else {
        try {
            $conexion = new PDO("pgsql:host=localhost;port=5432;dbname=pruebaV;user=postgres;password=admin");
        } catch (PDOException $e) {
            echo "ERROR:" . $e->getMessage();
            exit;
        }

        $statement = $conexion->prepare("SELECT * FROM usuarios WHERE correo = :correo AND pass = :pass");
        $statement->bindParam(':correo', $correo);
        $statement->bindParam(':pass', $contraseña);
        $statement->execute();
        $resultado = $statement->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            $_SESSION['correo'] = $correo;

            $buser = $conexion->prepare("SELECT * FROM usuarios WHERE correo = :correo");
            $buser->bindParam(':correo', $correo);
            $buser->execute();
            $result2 = $buser->rowCount();

            if ($result2 == 1) {
                $row = $buser->fetch(PDO::FETCH_ASSOC);
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['tipo_id'] = $row['tipo_id'];
                $_SESSION['depe_user'] = $row['depe_user'];
            }

            header("Location: prueba2.php");
            exit();
        } else {
            $errores .= '<li>Datos incorrectos</li>';
        }
    }
}
?>
