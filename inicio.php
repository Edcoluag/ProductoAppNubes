<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Inicio | TTK</title>
    <meta name="description" content="Registro de Subscriptores TTK" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="header">
        <h1 class="text-center">Registro de Subscriptores TTK</h1>

        <h3>ROL: <span id="usernameElement"></span></h3>
        <script>
            var storedBornValue = localStorage.getItem('bornValue');
            console.log("El valor de born es:", storedBornValue);

            var usernameElement = document.getElementById('usernameElement');
            usernameElement.innerHTML = "<strong>" + storedBornValue + "</strong>";
        </script>

    </div>
    <nav>
        <ul>
            <li class="active"><a href="inicio.php">INICIO</a></li>
            <li><a href="registrar.view.php">REGISTRO</a></li>
            <li><a href="listado.view.php">LISTA</a></li>
            <li class="right"><a href="logout.php">Salir</a></li>
        </ul>
    </nav>
    <div class="body">
        <div class="panel">
            <h1 class="text-center">TTK</h1>
            <?php
            if (isset($_GET['err']) && $_GET['err'] == 1) {
                echo '<h3 class="error text-center">ERROR: Usuario no autorizado</h3>';
            }
            ?>
            <br>
            <hr>
            <p class="text-center">
                <strong>Integrantes GRUPO21</strong>
                <br><br>Arrospide Gambini Steffano<br>Bocanegra Quipusco Yoseph<br>Cohaila Aguilar Luis
            </p>
            <br>
        </div>
    </div>
    <footer>
        <p>Derechos reservados &copy; 2020</p>
    </footer>
</body>

</html>