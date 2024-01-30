firebase.initializeApp({
    apiKey: "AIzaSyAM1-mu2s3ddCWVOQhX5lJpu3b8J4-64ZQ",
    authDomain: "tukitukipet-499eb.firebaseapp.com",
    databaseURL: "https://tukitukipet-499eb-default-rtdb.firebaseio.com",
    projectId: "tukitukipet-499eb",
    storageBucket: "tukitukipet-499eb.appspot.com",
    messagingSenderId: "112823282852",
    appId: "1:112823282852:web:1e276d12980d7521128a31",
    measurementId: "G-SDNESXHHQN"
});
var db = firebase.firestore();

function iniciar() {
    var username = document.getElementById('first').value;
    var password = document.getElementById('last').value;

    db.collection("users").where("Correo", "==", username).where("Password", "==", password).get()
        .then((querySnapshot) => {
            if (!querySnapshot.empty) {
                const userDoc = querySnapshot.docs[0];
                var user = userDoc.data()['Rol'];
                console.log("Usuario encontrado:", userDoc.data(), user);
                //window.location.href = 'inicio.php';
                window.location.href = 'inicio.html';
                localStorage.setItem('bornValue', user);

                // Redirigir a inicio.php

            } else {
                console.log("Usuario no encontrado");
                document.getElementById('errorMessage').innerText = 'Credenciales incorrectas';
                document.getElementById('first').value = '';
                document.getElementById('last').value = '';
            }
        })
        .catch((error) => {
            console.error("Error al buscar usuario en Firestore:", error);
        });
}

function login() {
    var username = document.getElementById('first').value;
    var password = document.getElementById('last').value;

    firebase.auth().signInWithEmailAndPassword(username, password)
        .then((userCredential) => {
            // Obtener el usuario autenticado
            var user = userCredential.user;
            console.log("Usuario encontrado:", user);

            // Consultar la colección 'users' para obtener el valor del campo 'rol'
            var usersCollection = firebase.firestore().collection('users');

            usersCollection.where('Correo', '==', username).get()
                .then((querySnapshot) => {
                    if (!querySnapshot.empty) {
                        // Encontró un documento con el correo electrónico proporcionado
                        querySnapshot.forEach((doc) => {
                            // Obtener el valor del campo 'rol'
                            var rolValue = doc.data().Rol;
                            console.log("Valor del rol:", rolValue);

                            // Guardar el valor del rol en el almacenamiento local
                            localStorage.setItem('bornValue', rolValue);

                            // Redirigir a la página 'inicio.php'
                            //window.location.href = 'inicio.php';
                            window.location.href = 'inicio.html';
                        });
                    } else {
                        // No se encontró ningún documento con el correo electrónico proporcionado
                        console.log("No se encontró ningún documento con el correo electrónico proporcionado");
                    }
                })
                .catch((error) => {
                    console.error("Error al buscar en la colección 'users':", error);
                });
        })
        .catch((error) => {
            // Manejar errores de inicio de sesión
            var errorCode = error.code;
            var errorMessage = error.message;
            console.log("Usuario no encontrado:", errorCode, errorMessage);
            document.getElementById('errorMessage').innerText = 'Credenciales incorrectas';
            document.getElementById('first').value = '';
            document.getElementById('last').value = '';
        });

}

function guardar() {
    console.log(storedBornValue);

    if (storedBornValue === "Administrador") {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var correo = document.getElementById('correo').value;
        var nombre = document.getElementById('nombre').value;
        var direccion = document.getElementById('direccion').value;
        var telefono = document.getElementById('telefono').value;
        var rol = document.getElementById('rol').value;

        // Add the user document to Firestore
        db.collection("users").add({
            Usuario: username,
            Correo: correo,
            Password: password,
            Nombre: nombre,
            Direccion: direccion,
            Telefono: telefono,
            Rol: rol,
        })
            .then((docRef) => {
                // Create the user in Firebase Authentication
                return firebase.auth().createUserWithEmailAndPassword(correo, password);
            })
            .then(function (userCredential) {
                // User successfully created in Authentication
                const user = userCredential.user;
                console.log("User created in Authentication:", user);

                // Perform additional actions if needed
                document.getElementById('username').value = '';
                document.getElementById('password').value = '';
                document.getElementById('correo').value = '';
                document.getElementById('nombre').value = '';
                document.getElementById('direccion').value = '';
                document.getElementById('telefono').value = '';
                document.getElementById('rol').value = '';
                document.getElementById('mensajeregistrar').innerText = 'Usuario Agregado';
                console.log("Se agregó el usuario:", user.uid);
            })
            .catch((error) => {
                console.error("Error adding document or creating user: ", error);
                // Handle error and provide appropriate feedback to the user
            });
    } else {
        alert("No tiene permisos para crear usuarios");
    }
}

function Editare() {
    console.log(storedBornValue);
    console.log("Metodo Editar")

    if (storedBornValue === "Administrador") {
        var id = document.getElementById('id').value;
        var usuario = document.getElementById('username-edit').value;
        var nombre = document.getElementById('nombre-edit').value;
        var direccion = document.getElementById('direccion-edit').value;
        var telefono = document.getElementById('telefono-edit').value;
        var rol = document.getElementById('rol-edit').value;

        db.collection("users").doc(id).update({
            Usuario: usuario,
            Nombre: nombre,
            Direccion: direccion,
            Telefono: telefono,
            Rol: rol
        })
            .then((docRef) => {
                document.getElementById('mensajeeditar').innerText = 'Usuario Actualizado';
                console.log("Se Actualizo el Usuario :", docRef);
            })
            .catch((error) => {
                console.error("Error adding document: ", error);
            });
    } else {
        alert("No tiene permisos para Editar usuarios");
    }
}

function eliminando(id) {
    console.log(storedBornValue);

    if (storedBornValue === "Administrador") {
        // Get the user data from Firestore
        db.collection("users").doc(id).get().then(function (doc) {
            if (doc.exists) {
                // Get the user's email and password from Firestore
                const userEmail = doc.data().Correo;  // Assuming 'Usuario' is the field for email
                const userPassword = doc.data().Password;

                // Delete the user from Authentication
                firebase.auth().signInWithEmailAndPassword(userEmail, userPassword)
                    .then(function (userCredential) {
                        const user = userCredential.user;
                        return user.delete();
                    })
                    .then(function () {
                        // Delete the user document from Firestore
                        return db.collection("users").doc(id).delete();
                    })
                    .then(function () {
                        console.log("User and document successfully deleted!");
                        alert("Usuario Eliminado");
                    })
                    .catch(function (error) {
                        console.error("Error deleting user and document: ", error);
                        alert("Error al eliminar usuario");
                    });
            } else {
                console.error("User document not found");
                alert("Error: Usuario no encontrado");
            }
        }).catch(function (error) {
            console.error("Error getting user document: ", error);
            alert("Error al obtener información del usuario");
        });
    } else {
        alert("No tiene permisos para Eliminar usuarios");
    }
}

// async function eliminando_centros(id) {
//     console.log(storedBornValue);

//     try {
//         if (storedBornValue === "Administrador") {
//             // Eliminar el centro de la colección "Centro"
//             await db.collection("Centro").doc(id).delete();
//             // Obtener el nombre del centro con la ID proporcionada
//             const centroSnapshot = await db.collection("Centro").doc(id).get();
//             const nombreDelCentro = centroSnapshot.data().nombre;

//             // Buscar ubicaciones asociadas al centro por nombre
//             const ubicacionesSnapshot = await db.collection("Ubicacion").where("nombre", "==", nombreDelCentro).get();
//             //devolverme su id y eliminarlo
//             /*agregue */
//             ubicacionesSnapshot.forEach((doc) => {
//                 console.log(`${doc.id} => ${doc.data()}`);
//                 db.collection("Ubicacion").doc(doc.id).delete();
//                 console.log("Document Ubicacion deleted!");
//             });
//             /*Esto */
//             //movi al bloc 
//             console.log("Document Centro deleted!");
//             alert("Error al eliminar Ubicacion");
//             // No usar alert, manejar la retroalimentación en la interfaz de usuario
//         } else {
//             alert("No tiene permisos para Eliminar Centros");
//         }
//     } catch (error) {
//         console.error(`Error: ${error.message} - Centro ID: ${id}`);
//         //alert("Error al eliminar centro");
//     }
// }

async function eliminando_centros(id) {
    console.log(storedBornValue);

    try {
        if (storedBornValue === "Administrador") {
            // Obtener el nombre del centro con la ID proporcionada
            const centroSnapshot = await db.collection("Centro").doc(id).get();
            const nombreDelCentro = centroSnapshot.data().nombre;

            // Buscar ubicaciones asociadas al centro por nombre
            const ubicacionesSnapshot = await db.collection("Ubicacion").where("nombre", "==", nombreDelCentro).get();

            // Eliminar las ubicaciones encontradas
            ubicacionesSnapshot.forEach(async (doc) => {
                console.log(`${doc.id} => ${doc.data()}`);
                await db.collection("Ubicacion").doc(doc.id).delete();
                console.log("Document Ubicacion deleted!");
            });

            // Eliminar el centro de la colección "Centro"
            await db.collection("Centro").doc(id).delete();
            
            console.log("Document Centro deleted!");
            // No usar alert, manejar la retroalimentación en la interfaz de usuario
        } else {
            alert("No tiene permisos para Eliminar Centros");
        }
    } catch (error) {
        console.error(`Error: ${error.message} - Centro ID: ${id}`);
        alert("Error al eliminar centro o ubicaciones asociadas");
    }
}


function Editare_centros() {
    console.log(storedBornValue);
    console.log("Metodo Editar")

    if (storedBornValue === "Administrador") {
        var id = document.getElementById('id').value;
        var nombre_centro = document.getElementById('nombre-centro-edit').value;
        var direccion_centro = document.getElementById('direccion-centro-edit').value;
        var especialista = document.getElementById('especialista-centro-edit').value;
        var servicio = document.getElementById('servicio-centro-edit').value;
        var telefono = document.getElementById('telefono-centro-edit').value;
        var horario = document.getElementById('horario-centro-edit').value;
        var ciudad = document.getElementById('ciudad-centro-edit').value;
        var centro_servicio = document.getElementById('centroserv-centro-edit').value;

        db.collection("Centro").doc(id).update({
            nombre: nombre_centro,
            direccion: direccion_centro,
            especialista: especialista,
            servicio: servicio,
            telefono: telefono,
            horario: horario,
            ciudad: ciudad,
            centro_servicio: centro_servicio
        })
            .then((docRef) => {
                document.getElementById('mensajeeditar-centros').innerText = 'Centro Actualizado';
                console.log("Se Actualizo el Centro :", docRef);
            })
            .catch((error) => {
                console.error("Error adding document: ", error);
            });

    } else {
        alert("No tiene permisos para Editar Centros");
    }
}

function guardar_centros() {
    console.log(storedBornValue);

    if (storedBornValue === "Administrador") {
        var nombre_centro = document.getElementById('nombre-centro').value;
        var direccion_centro = document.getElementById('direccion-centro').value;
        var especialista = document.getElementById('especialista-centro').value;
        var servicio = document.getElementById('servicio-centro').value;
        var telefono = document.getElementById('telefono-centro').value;
        var horario = document.getElementById('horario-centro').value;
        var ciudad = document.getElementById('ciudad-centro').value;
        var centro_servicio = document.getElementById('centroserv-centro').value;

        // Add the user document to Firestore
        db.collection("Centro").add({
            nombre: nombre_centro,
            direccion: direccion_centro,
            especialista: especialista,
            servicio: servicio,
            telefono: telefono,
            horario: horario,
            ciudad: ciudad,
            centro_servicio: centro_servicio
        })
        document.getElementById('mensajeregistrar-centros').innerText = 'Centro  Agregado';
    } else {
        alert("No tiene permisos para crear Centros");
    }
}


