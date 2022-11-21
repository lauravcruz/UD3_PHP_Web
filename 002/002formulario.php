<?php

declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script defer src="js/bootstrap.bundle.js"></script>
    <title>001 Post</title>
</head>

<body>
    <?php
    /*002formulario.html/.php: Crea un formulario que solicite:
    Nombre y apellidos. Email. URL página personal. Sexo (radio). Número de convivientes
    en el domicilio. Aficiones (checkboxes) – poner mínimo 4 valores.
    Menú favorito (lista selección múltiple) – poner mínimo 4 valores.
    Muestra los valores cargados en una tabla-resumen.*/

    $nombreCompleto = $_GET["nombreCompleto"];
    $email = $_GET["email"];
    $url = $_GET["URL"];
    $sexo = $_GET["sexo"];
    $convivientes = $_GET["convivientes"];
    $aficiones = $_GET["aficiones"];
    $menu = $_GET["menu"];
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
                    <td><?php echo $nombreCompleto ?></td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $url ?></td>
                    <td><?php echo $sexo ?></td>
                    <td><?php echo $convivientes ?></td>
                    <td><?php echo implode("<br>", $aficiones); ?></td>
                    <td><?php echo implode("<br>", $menu); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>