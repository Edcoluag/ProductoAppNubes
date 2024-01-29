<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Editar Usuarios</title>

    <!--Firestore-->
    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-firestore-compat.js"></script>

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
            <h4 class="text-center">Edición de Subscriptores</h4>
            <div class="container">

                <h1>Agregar Usuarios</h1>
                <input type="text" id="id" placeholder="id" class="form-control " style="display: none;"><br>
                <label>Username</label><br>
                <input type="text" id="username-edit"  maxlength="40">
                <br><br>
                <label>Password</label><br>
                <input type="text" id="password-edit" maxlength="40">
                <br><br>
                <label>Nombre</label><br>
                <input type="text"  id="nombre-edit" maxlength="40">
                <br><br>
                <label>Direccion</label><br>
                <input type="text" id="direccion-edit" maxlength="40">
                <br><br>
                <label>Telefono</label><br>
                <input type="number"  id="telefono-edit" maxlength="40">
                <br><br>
                <label>Rol</label><br>
                <input type="text" id="rol-edit" maxlength="40">
                <br><br>

<!--                <button class="btn btn-info" id="boton-editar" onclick="Editando()">Editar</button>-->
                <button class="btn btn-info" onclick="Editare()">Editar</button>
                <div id="mensajeeditar" style="color: #269bd4;"></div>
            </div>
        </div>

    </div>
    <footer>
        <p>Derechos reservados &copy; 2020</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Obtén los parámetros de la URL
            const urlParams = new URLSearchParams(window.location.search);
            const id = urlParams.get('id');
            const user = urlParams.get('usuario');
            const pass = urlParams.get('password');
            const nom = urlParams.get('nombre');
            const dir = urlParams.get('direccion');
            const tel= urlParams.get('telefono');
            const rol = urlParams.get('rol');

            // Establece los valores en los campos correspondientes
            document.getElementById('id').value = id;
            document.getElementById('username-edit').value = user;
            document.getElementById('password-edit').value = pass;
            document.getElementById('nombre-edit').value = nom;
            document.getElementById('direccion-edit').value = dir;
            document.getElementById('telefono-edit').value = tel;
            document.getElementById('rol-edit').value = rol;
        });
    </script>

    <script src="Connection.js"></script>
    <script src="Conn.js"></script>



</body>

</html>