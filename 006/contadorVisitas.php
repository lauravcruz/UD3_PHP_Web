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
  <title>006 Contador Visitas</title>
</head>

<body>
  <?php
  /* 006contadorVisitas.php: Mediante el uso de cookies, informa al usuario de si es su 
  primera visita, o si no lo es, muestre su valor (valor de un contador). Además, debes 
  permitir que el usuario reinicialice su contador de visitas.*/

  /*Primero comprobamos que el usuario no haya dado a resetear. Si le ha dado, establecemos 0*/
  if (isset($_GET["resetear"])) {
    $_COOKIE['accesos'] = 0;
  }

  if (isset($_COOKIE['accesos'])) {
    //Si la cookie existe, le sumamos 1 visita. Le he tenido que poner json_encode porque no me dejaba meter un número
    setcookie('accesos', json_encode(++$_COOKIE['accesos']));
    /*La recogemos en una variable para luego mostrarla*/
    $accesos = $_COOKIE['accesos'];
  } else {
    //Si no existe, le creamos la cookie con valor 1
    setcookie('accesos', "1");
  }

  echo "<h3 class ='display-3'>Has visitado la página: $accesos veces</h3>";
  ?>
  <a class="link-primary" href="contadorVisitas.php">Recargar</a><br>
  <!--para resetear, pasamos por GET la variable resetear-->
  <a class="link-warning" href="contadorVisitas.php?resetear=true">Reiniciar cookies</a>
</body>

</html>