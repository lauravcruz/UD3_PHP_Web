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
    <title>002 Formulario</title>
</head>

<body>
    <?php
    /*009formulario2.php lee los datos y los mete en la sesión. A continuación, muestra el 
    resto de los campos del formulario a rellenar (convivientes, aficiones y menú). Envía 
    estos datos a 009formulario3.php.*/
    
    /*Aquí recibimos los datos del formulario del anterior php. 
    Iniciamos una sesión para guardar los datos*/

    session_start();

    if (!empty($_POST['nombreCompleto']) && !empty($_POST['email']) && !empty($_POST['URL']) && !empty($_POST['sexo'])) {
        if (isset($_POST["nombreCompleto"])) {
            $nombreCompleto = $_POST["nombreCompleto"];
            $_SESSION["nombreCompleto"] = $nombreCompleto;
        }
        if (isset($_POST["email"])) {
            $email = $_POST["email"];
            $_SESSION["email"] = $email;
        }

        if (isset($_POST["URL"])) {
            $url = $_POST["URL"];
            $_SESSION["URL"] = $url;
        }

        if (isset($_POST["sexo"])) {
            $sexo = $_POST["sexo"];
            $_SESSION["sexo"] = $sexo;
        }
    }

    ?>

    <!--Y solicitamos los que quedan con destino 009formulario3-->
    <form class="container-fluid d-grid g-3" action="009formulario3.php" method="POST">
        <div class="col-6 p-2">
            <div class="form-outline">
                <label class="form-label" for="typeNumber">Número de convivientes</label>
                <input type="number" id="convivientes" name="convivientes" class="form-control" />
            </div>
        </div>
        <div class="row d-flex align-items-center">
            <div class="col-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="deporte" id="aficiones" name="aficiones[]" />
                    <label class="form-check-label" for="deporte"> Deporte </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="musica" id="aficiones" name="aficiones[]" />
                    <label class="form-check-label" for="musica"> Música </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="cine" id="aficiones" name="aficiones[]" />
                    <label class="form-check-label" for="cine"> Cine </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="videojuegos" name="aficiones[]" id="aficiones" />
                    <label class="form-check-label" for="videojuegos">
                        Videojuegos
                    </label>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="menu" class="form-label">Menú</label>
                    <select multiple class="form-select form-select-lg" name="menu[]" id="menu">
                        <option value="pasta">Pasta</option>
                        <option value="carne">Carne</option>
                        <option value="pescado">Pescado</option>
                        <option value="ensalada">Ensalada</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>




</body>

</html>