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
                window.location.href = 'inicio.php';
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
            // User successfully authenticated
            var user = userCredential.user;
            console.log("Usuario autenticado:", user);
            window.location.href = 'inicio.php';
        })
        .catch((error) => {
            // Handle authentication errors
            console.error("Error al autenticar usuario:", error);
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


// function guardar() {
//     console.log(storedBornValue);

//     if (storedBornValue === "Administrador") {
//         var username = document.getElementById('username').value;
//         var password = document.getElementById('password').value;
//         var correo = document.getElementById('correo').value;
//         var nombre = document.getElementById('nombre').value;
//         var direccion = document.getElementById('direccion').value;
//         var telefono = document.getElementById('telefono').value;
//         var rol = document.getElementById('rol').value;

//         db.collection("users").add({
//             Usuario: username,
//             Correo: correo,
//             Password: password,
//             Nombre: nombre,
//             Direccion: direccion,
//             Telefono: telefono,
//             Rol: rol,
//         })
//             .then((docRef) => {
//                 // Create the user from Authentication 
//                 firebase.auth().createUserWithEmailAndPassword(correo, password)   
//                 .then(function (userCredential) {
//                     const user = userCredential.user;
//                     return user.delete();
//                 })
//                 document.getElementById('username').value = '';
//                 document.getElementById('password').value = '';
//                 document.getElementById('correo').value = '';
//                 document.getElementById('nombre').value = '';
//                 document.getElementById('direccion').value = '';
//                 document.getElementById('telefono').value = '';
//                 document.getElementById('rol').value = '';
//                 document.getElementById('mensajeregistrar').innerText = 'Usuario Agregado';
//                 console.log("Se agrego el usuario :", docRef.id);
//             })
//             .catch((error) => {
//                 console.error("Error adding document: ", error);
//             });
//     } else {
//         alert("No tiene permisos para crear usuarios");
//     }
// }

function eliminar(id) {
    console.log(storedBornValue);
    if (storedBornValue === "Administrador") {
        db.collection("users").doc(id).delete().then(function () {
            console.log("Document successfully deleted!");
            alert("Usuario Eliminado");
        }).catch(function (error) {
            console.error("Error removing document: ", error);
        });
    } else {
        alert("No tiene permisos para Eliminar usuarios");
    }
}

function Editare() {
    console.log(storedBornValue);
    console.log("Metodo Editar")

    if (storedBornValue === "Administrador") {
        var id = document.getElementById('id').value;
        var usuario = document.getElementById('username-edit').value;
        var contraseña = document.getElementById('password-edit').value;
        var nombre = document.getElementById('nombre-edit').value;
        var direccion = document.getElementById('direccion-edit').value;
        var telefono = document.getElementById('telefono-edit').value;
        var rol = document.getElementById('rol-edit').value;

        db.collection("users").doc(id).update({
            Usuario: usuario,
            Password: contraseña,
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
