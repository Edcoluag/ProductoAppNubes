<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD | TTK</title>

    <meta name="description" content="Registro de Subscriptores TTK" />

    <link rel="stylesheet" href="css/style.css" />

    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-firestore-compat.js"></script>

    <!--<script src="ICD.js"></script>-->
    <script src="Conn.js"></script>
</head>

<body>
    <div class="header">
        <h1 class="text-center">Registro de Subscriptores TTK</h1>
    </div>

    <div class="body">
        <div class="panel-login">
            <h4>Login</h4>

            <div class="container">
                <label for="first">Usuario:</label><br>
                <input type="text" id="first" name="first" required><br><br>
                <label for="last">Contraseña:</label><br>
                <input type="text" id="last" name="last" required><br><br>
                <button class="btn btn-info" onclick="iniciar()">Iniciar sesión</button>
                <div id="errorMessage" style="color: red;"></div>

            </div>
        </div>
    </div>
    <script></script>

</body>

</html>