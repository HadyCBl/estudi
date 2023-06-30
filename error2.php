<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css" />

    <title>Control de Inventario</title>

    <style>
       .btn-back{
        background-color: #F24C3D;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
       }
    </style>
</head>

<body>
    <div class="logo">
        <img class="logo__image" src="assets/img/logo.png" alt="logo" />
    </div>
    <div class="login">
     
      <form action="conexion_create.php" method="POST" class="login__form">
        <!-- Resto del formulario -->
        <h1>Correo o contraseña incorrecta</h1>
        <a href="index.html" class="btn btn-back">Regresar</a>
        
        <button> </button>
      </form>
    </div>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
  </body>
</html>