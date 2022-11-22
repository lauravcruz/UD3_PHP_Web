<?php

declare(strict_types=1);
if (!isset($_SESSION)) {
    session_start();
}
// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['user'])) {
    die("Error - debe <a href='010index.php'>identificarse</a>.<br />");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <script defer src="../js/bootstrap.bundle.js"></script>
    <title>010 Inicio Sesión</title>
</head>

<body>
    <?php
    /*014series.php: Añade una nueva vista similar a 012peliculas.php que muestra un 
    "Listado de Series" con una lista desordenada con tres series. Tanto 012peliculas.php 
    como la vista recién creada, deben tener un pequeño menú que permita pasar de un 
    listado a otro. Comprueba que, si se accede directamente a cualquiera de las vistas sin 
    tener un usuario logado vía URL del navegador, no se muestra el listado.
    Modifica tanto el controlador como las vistas para que:
    los datos los obtenga el controlador (almacena en la sesión un array de películas y otro 
    de series) coloque los datos en la sesión.
    En las vistas, los datos se recuperan de la sesión y se pintan en la lista desordenada 
    recorriendo el array correspondiente.*/

    ?>
    <nav class="navbar navbar-expand-sm navbar-light bg-black ">
        <div class="container-fluid">
            <h1 class="navbar-brand text-danger" href="#">N</h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID" aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarID">
                <ul class="navbar-nav ms-auto">
                    <li><a class="nav-link active text-danger" aria-current="page" href="012peliculas.php?username=<?php echo $_GET['username']?>">PELÍCULAS</a></li>
                    <li><a class="nav-link active text-danger" aria-current="page" href="014series.php?username=<?php echo $_GET['username']?>">SERIES</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li><a class="nav-link active text-white" aria-current="page" href="013logout.php">LOG OUT</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container-fluid p-5">
            <h1 class="display-1 text-center">Listado de series</h1>
            <ul class="list-group">
                <!--Solo mostramos lista si encuentra el login en la URL:-->
                <?php if (isset($_GET['username'])) {
                    foreach ($_SESSION["series"] as $serie) {
                        echo "<li class ='list-group-item'>$serie</li>";
                    }
                }
                ?>
            </ul>
        </div>
    </main>
</body>

</html>