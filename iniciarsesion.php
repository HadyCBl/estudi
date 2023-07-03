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
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];

    // Consultar la tabla "cuenta" para verificar las credenciales
    $sql = "SELECT * FROM cuenta WHERE correo = '$correo' AND pass = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // El inicio de sesión es exitoso
        header("Location: cargaindex.html");
        exit();
    } else {
        // Las credenciales son incorrectas
        header("Location: error2.php");
    }
    }
    $conn->close();
    ?>