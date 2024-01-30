<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Registro de Centro</title>

    <!--Firestore-->
    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-firestore-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-auth-compat.js"></script>

    <script src="Conn.js"></script>

    <title>Registro Centro | TTK</title>
    <meta name="description" content="Registro de Subscriptores TTK" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>

    <div class="header">
        <h1 class="text-center">Registro de Centro TTK</h1>
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
            <li><a href="registrar.view.php">REGISTRO USUARIOS</a></li>
            <li><a href="listado.view.php">LISTA USUARIOS</a></li>
            <li><a href="registrar-centros.view.php">REGISTRO CENTROS</a></li>
            <li><a href="listado-centros.view.php">LISTA CENTROS</a></li>
            <li class="right"><a href="logout.php">Salir</a></li>
        </ul>
    </nav>

    <div class="body">

        <div class="panel">
            <h4>Registro de Centros</h4>

            <div class="container">

                <label>Nombre_Centro</label><br>
                <input type="text" id="nombre-centro" maxlength="40">
                <br><br>
                <label>Direccion</label><br>
                <input type="text" id="direccion-centro" maxlength="40">
                <br><br>
                <label>Especialista</label><br>
                <input type="text" id="especialista-centro" maxlength="40">
                <br><br>
                <label>Servicio</label><br>
                <input type="text" id="servicio-centro" maxlength="100">
                <br><br>
                <label>Telefono</label><br>
                <input type="number" id="telefono-centro" maxlength="9">
                <br><br>
                <label>Horario</label><br>
                <input type="text" id="horario-centro" maxlength="40">
                <br><br>
                <label>Ciudad</label><br>
                <select name="rol" id="ciudad-centro" style="padding: 8px;">
                    <option value="Nuevo Chimbote">Nuevo Chimbote</option>
                    <option value="Chimbote">Chimbote</option>
                </select>
                <br><br>
                <label>Centro_Servicio</label><br>
                <select name="rol" id="centroserv-centro" style="padding: 8px;">
                    <option value="Adopcion">Adopcion</option>
                    <option value="PetSpa">PetSpa</option>
                    <option value="Veterinaria">Veterinaria</option>
                </select>
                <br><br>

                <button class="btn btn-info" id="boton" onclick="guardar_centros()">Guardar</button>

                <button class="btn btn-info" id="boton2" onclick="limpiar_centro()">Limpiar</button>

                <a class="btn-link" href="listado-centros.view.php">Ver Listado</a>

                <div id="mensajeregistrar-centros" style="color: #269bd4;"></div>
                <br><br>

            </div>
        </div>


    </div>

    <footer>
        <p>Derechos reservados &copy; 2024</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>

</body>

</html>