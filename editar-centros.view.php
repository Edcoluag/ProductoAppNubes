<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Editar Centros</title>

    <!--Firestore-->
    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-firestore-compat.js"></script>

    <title>Editar | TTK</title>
    <meta name="description" content="Registro de Subscriptores TTK" />
    <link rel="stylesheet" href="css/style.css" />

</head>

<body>
    <div class="header">
        <h1 class="text-center">Editor de Ciudades | TTK</h1>

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
            <h4 class="text-center">Edición de Centros</h4>
            <div class="container">

                <h1>Agregar Centros</h1>
                <input type="text" id="id" placeholder="id" class="form-control " style="display: none;"><br>

                <label>Nombre_Centro</label><br>
                <input type="text" id="nombre-centro-edit" maxlength="40">
                <br><br>
                <label>Direccion</label><br>
                <input type="text" id="direccion-centro-edit" maxlength="40">
                <br><br>
                <label>Especialista</label><br>
                <input type="text" id="especialista-centro-edit" maxlength="40">
                <br><br>
                <label>Servicio</label><br>
                <input type="text" id="servicio-centro-edit" maxlength="100">
                <br><br>
                <label>Telefono</label><br>
                <input type="number" id="telefono-centro-edit" maxlength="9">
                <br><br>
                <label>Horario</label><br>
                <input type="text" id="horario-centro-edit" maxlength="40">
                <br><br>
                <label>Ciudad</label><br>
                <select name="rol" id="ciudad-centro-edit" style="padding: 8px;">
                    <option value="Nuevo Chimbote">Nuevo Chimbote</option>
                    <option value="Chimbote">Chimbote</option>
                </select>
                <br><br>
                <label>Centro_Servicio</label><br>
                <select name="rol" id="centroserv-centro-edit" style="padding: 8px;">
                    <option value="Adopcion">Adopcion</option>
                    <option value="PetSpa">PetSpa</option>
                    <option value="Veterinaria">Veterinaria</option>
                </select>
                <br><br>

                <!--                <button class="btn btn-info" id="boton-editar" onclick="Editando()">Editar</button>-->
                <button class="btn btn-info" onclick="Editare_centros()">Editar</button>
                <div id="mensajeeditar-centros" style="color: #269bd4;"></div>
            </div>
        </div>

    </div>
    <footer>
        <p>Derechos reservados &copy; 2024</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Obtén los parámetros de la URL
            const urlParams = new URLSearchParams(window.location.search);
            const id = urlParams.get('id');
            const nombre = urlParams.get('nombre');
            const direccion = urlParams.get('direccion');
            const especialista = urlParams.get('especialista');
            const servicio = urlParams.get('servicio');
            const telefono = urlParams.get('telefono');
            const horario = urlParams.get('horario');
            const ciudad = urlParams.get('ciudad');
            const centroserv = urlParams.get('centroserv');


            // Establece los valores en los campos correspondientes
            document.getElementById('id').value = id;
            document.getElementById('nombre-centro-edit').value = nombre;
            document.getElementById('direccion-centro-edit').value = direccion;
            document.getElementById('especialista-centro-edit').value = especialista;
            document.getElementById('servicio-centro-edit').value = servicio;
            document.getElementById('telefono-centro-edit').value = telefono;
            document.getElementById('horario-centro-edit').value = horario;
            document.getElementById('ciudad-centro-edit').value = ciudad;
            document.getElementById('centroserv-centro-edit').value = centroserv;
        });
    </script>

    <script src="Connection.js"></script>
    <script src="Conn.js"></script>



</body>

</html>