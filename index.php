<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD | TTK</title>

    <meta name="description" content="Registro de Subscriptores TTK" />

    <link rel="stylesheet" href="css/style.css" />

    <style>
        body {
            background-image: url('./css/fondofijo.jpg');
            /* Reemplaza 'ruta/a/tu/imagen-de-perritos.jpg' con la ruta real de tu imagen */
            background-size: cover;
            /* Ajusta el tamaño de la imagen para cubrir todo el fondo */
            background-position: center_center;
            /* Centra la imagen en el fondo */
            background-repeat: no-repeat;
            /* Evita que la imagen se repita */
            font-family: Arial, sans-serif;
            /* Ajusta la fuente según tus preferencias */
        }
    </style>


    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-firestore-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-auth-compat.js"></script>


    <!--<script src="ICD.js"></script>-->
    <script src="Conn.js"></script>
</head>

<body>
    <div class="header">
        <h1 class="text-center">Registro de Subscriptores TTK</h1>
    </div>

    <div class="body-inicio">
        <div class="panel-login">
            <h4>Login</h4>

            <div class="container">
                <label for="first">Usuario:</label><br>
                <input type="text" id="first" name="first" required><br><br>
                <label for="last">Contraseña:</label><br>
                <input type="text" id="last" name="last" required><br><br>
                <button class="btn btn-info" onclick="login()">Iniciar sesión</button>
                <div id="errorMessage" style="color: red;"></div>

            </div>
        </div>
    </div>

</body>

</html>