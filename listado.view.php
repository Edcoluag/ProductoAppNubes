<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Lista de Usuarios</title>

    <!--Firestore-->
    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-firestore-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.7.2/firebase-auth-compat.js"></script>





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

            <h4 class="text-center">Listado de Subscriptores</h4>

            <div class="form">
                <table class="table">

                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Password</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Eliminar</th>
                            <th scope="col">Editar</th>
                        </tr>
                    </thead>

                    <tbody id="tabla">
                    </tbody>

                </table>
                <br><br>

                <a class="btn-link" href="registrar.view.php">Agregar Alumno</a>
                <br><br>

            </div>
        </div>
    </div>

    <footer>
        <p>Derechos reservados &copy; 2020</p>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
    <script src="Connection.js"></script>
    <script src="Conn2.js"></script>
    <script src="Conn.js"></script>
    x
</body>

</html>