<?php

declare(strict_types=1);
/*011login.php: hace de controlador, por lo que debe comprobar los datos recibidos 
(solo permite la entrada de usuario/usuario y si todo es correcto, ceder el control a la 
vista del siguiente ejercicio. No contiene código HTML.*/

if (isset($_GET['login'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];

    if (empty($username) || empty($password)) {
        //Si están vacíos, le devolvemos al index con el error: 
        $errores = "Debes introducir un usuario y contraseña";
        include "010index.php";
    } else {
        //Si no está vacío, comprobamos si los datos son correctos:
        if ($username == "usuario" && $password == "usuario") {
            //Lo guardamos en la sesión y lo mandamos a 012peliculas.php
            session_start();
            $_SESSION['user'] = $username;
            $_SESSION['peliculas'] = ["Los otros", "El sexto sentido", "Origen"];
            $_SESSION['series'] = ["This is us", "La Casa del Dragón", "1899"];
            include "012peliculas.php";
        } else {
            // Si las credenciales no son válidas, se vuelven a pedir
            $errores = "Usuario o contraseña no válidos";
            include "010index.php";
        }
    }
}
