<?php

declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <script defer src="../js/bootstrap.bundle.js"></script>
    <title>003 Formulario</title>
</head>

<body>
    <?php
    /*009formulario3.php recoge los datos enviados en el paso anterior y junto a los que ya 
    estaban en la sesión, se muestran todos los datos en una tabla/lista desordenada.*/

    /*Recuperamos la sesión creada en el anterior ejercicio para recuperar los datos recogidos y guardar los nuevos:*/
    session_start();

    if (!empty($_POST['convivientes']) && !empty($_POST['aficiones']) && !empty($_POST['menu'])) {
        if (isset($_POST['convivientes'])) {
            $convivientes = $_POST["convivientes"];
            $_SESSION["convivientes"] = $convivientes;
        }
        if (isset($_POST["aficiones"])) {
            $aficiones = $_POST["aficiones"];
            $_SESSION["aficiones"] = $aficiones;
        }

        if (isset($_POST["menu"])) {
            $menu = $_POST["menu"];
            $_SESSION["menu"] = $menu;
        }
    }
    ?>
    <div class='table-responsive'>
        <table class='table table-primary text-center'>
            <thead>
                <tr>
                    <th scope='col'>NOMBRE Y APELLIDOS</th>
                    <th scope='col'>EMAIL</th>
                    <th scope='col'>URL</th>
                    <th scope='col'>SEXO</th>
                    <th scope='col'>CONVIVIENTES</th>
                    <th scope='col'>AFICIONES</th>
                    <th scope='col'>MENÚ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!--Mostramos los datos guardados en la sesión durante los 3 archivos .php-->
                    <td><?php echo $_SESSION['nombreCompleto'] ?></td>
                    <td><?php echo $_SESSION['email'] ?></td>
                    <td><?php echo $_SESSION['URL'] ?></td>
                    <td><?php echo $_SESSION['sexo'] ?></td>
                    <td><?php echo $_SESSION['convivientes'] ?></td>
                    <td><?php echo implode("<br>", $_SESSION['aficiones']); ?></td>
                    <td><?php echo implode("<br>", $_SESSION['menu']); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>