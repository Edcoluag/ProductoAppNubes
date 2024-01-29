<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Registro de Usuarios</title>

    <!--Firestore-->
    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-firestore-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-auth-compat.js"></script>

    <script src="Conn.js"></script>

    <title>Registro | TTK</title>
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
            <h4>Registro de Subscriptores</h4>

            <div class="container">

                <label>Username</label><br>
                <input type="text" id="username" name="username" maxlength="40">
                <br><br>
                <label>Password</label><br>
                <input type="text" name="password" id="password" maxlength="40">
                <br><br>
                <label>Correo</label><br>
                <input type="text" name="password" id="correo" maxlength="40">
                <br><br>
                <label>Nombre</label><br>
                <input type="text" name="nombre" id="nombre" maxlength="40">
                <br><br>
                <label>Direccion</label><br>
                <input type="text" id="direccion" name="direccion" maxlength="40">
                <br><br>
                <label>Telefono</label><br>
                <input type="number" name="telefono" id="telefono" maxlength="40">
                <br><br>
                <label>Rol</label><br>
                <input type="text" name="rol" id="rol" maxlength="40">
                <br><br>


                <button class="btn btn-info" id="boton" onclick="guardar()">Guardar</button>

                <button class="btn btn-info" id="boton2" onclick="limpiar()">Limpiar</button>

                <a class="btn-link" href="listado.view.php">Ver Listado</a>

                <div id="mensajeregistrar" style="color: #269bd4;"></div>
                <br><br>

            </div>
        </div>

        <table class="table" style="display: none;">

            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">born</th>
                    <th scope="col">Eliminar</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>

            <tbody id="tabla">
            </tbody>

        </table>


    </div>

    <footer>
        <p>Derechos reservados &copy; 2020</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>

</body>

</html>