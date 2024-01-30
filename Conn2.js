
// Leer documentos
db.collection("users").onSnapshot((querySnapshot) => {
    try {
        var tabla = document.getElementById('tabla');
        // Verificar si el elemento 'tabla' existe antes de modificar su contenido
        if (tabla) {
            tabla.innerHTML = '';

            querySnapshot.forEach((doc) => {
                console.log(`${doc.id} => ${doc.data()}`);

                tabla.innerHTML += `          
                    <tr>
                        <td>${doc.data().Usuario}</td>
                        <td>${doc.data().Nombre}</td>
                        <td>${doc.data().Direccion}</td>
                        <td>${doc.data().Rol}</td>                        
                        <td>${doc.data().Telefono}</td>
                        <td><button class="btn btn-danger" onclick="eliminando('${doc.id}')">ELIMINAR</button></td>
                        <td><button class="btn btn-warning" onclick="editar('${doc.id}','${doc.data().Usuario}','${doc.data().Nombre}','${doc.data().Direccion}','${doc.data().Telefono}','${doc.data().Rol}')">EDITAR</button></td>
                    </tr>`;
            });
        } else {
            console.error("Elemento 'tabla' no encontrado.");
        }
    } catch (error) {
        console.error("Error procesando los datos:", error);
    }
});


//funcion editar
function editar(id, usuario, nombre, direccion, telefono, rol) {
    console.log(storedBornValue);
    if (storedBornValue === "Administrador") {
        // Construye la URL con los parámetros
        var url = 'editar.view.php?' + '&id=' + encodeURIComponent(id) + '&usuario=' + encodeURIComponent(usuario) + '&nombre=' + encodeURIComponent(nombre) + '&direccion=' + encodeURIComponent(direccion) + '&telefono=' + encodeURIComponent(telefono) + '&rol=' + encodeURIComponent(rol);
        // Redirige a la nueva URL
        window.location.href = url;
    }
    else {
        alert("No tiene permisos para editar los usuarios");
    }
}

db.collection("Centro").onSnapshot((querySnapshot) => {
    try {
        var tabla_centros = document.getElementById('tabla-centros');
        // Verificar si el elemento 'tabla' existe antes de modificar su contenido
        if (tabla_centros) {
            tabla_centros.innerHTML = '';

            querySnapshot.forEach((doc) => {
                console.log(`${doc.id} => ${doc.data()}`);

                tabla_centros.innerHTML += `          
                    <tr>
                        <td>${doc.data().nombre}</td>
                        <td>${doc.data().direccion}</td>
                        <td>${doc.data().especialista}</td>
                        <td>${doc.data().servicio}</td>                        
                        <td>${doc.data().telefono}</td>
                        <td>${doc.data().horario}</td>
                        <td>${doc.data().ciudad}</td>                        
                        <td>${doc.data().centro_servicio}</td>
                        <td><button class="btn btn-danger" onclick="eliminando_centros('${doc.id}')">ELIMINAR</button></td>
                        <td><button class="btn btn-warning" onclick="editar_centros('${doc.id}','${doc.data().nombre}','${doc.data().direccion}','${doc.data().especialista}','${doc.data().servicio}','${doc.data().telefono}','${doc.data().horario}','${doc.data().ciudad}','${doc.data().centro_servicio}')">EDITAR</button></td>
                    </tr>`;
            });
        } else {
            console.error("Elemento 'tabla' no encontrado.");
        }
    } catch (error) {
        console.error("Error procesando los datos:", error);
    }
});

function editar_centros(id, nombre, direccion, especialista, servicio, telefono, horario, ciudad, centro_servicio) {
    console.log(storedBornValue);
    if (storedBornValue === "Administrador") {
        // Construye la URL con los parámetros
        var url = 'editar-centros.view.php?' + '&id=' + encodeURIComponent(id) + '&nombre=' + encodeURIComponent(nombre)+ '&direccion=' + encodeURIComponent(direccion) + '&especialista=' + encodeURIComponent(especialista) + '&servicio=' + encodeURIComponent(servicio) + '&telefono=' + encodeURIComponent(telefono) + '&horario=' + encodeURIComponent(horario) + '&ciudad=' + encodeURIComponent(ciudad) + '&centro_servicio=' + encodeURIComponent(centro_servicio); 
        // Redirige a la nueva URL
        window.location.href = url;
    }
    else {
        alert("No tiene permisos para editar los usuarios");
    }
}