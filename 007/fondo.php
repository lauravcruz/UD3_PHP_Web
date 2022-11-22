<?php

declare(strict_types=1);
/*Si el campo de color ya envió los datos, lo recogemos y creamos su cookie*/
if (isset($_POST['color'])) {
  $color = $_POST['color'];
  setcookie("color", $color, time() + 24 * 3600);
} else {
  /*Si todavía no se han recibido datos, se cogen los guardados en la cookie*/
  /*Si no hay cookie todavía, se pone en blanco*/
  $color = $_COOKIE['color'] ?? "light";
  };

?>
<!--007fondo.php: Mediante el uso de cookies, crea una página con un desplegable con
varios colores, de manera que el usuario pueda cambiar el color de fondo de la página.
Al cerrar la página, ésta debe recordar, al menos durante 24h, el color elegido y la
próxima vez que se cargue la página, lo haga con el último color seleccionado.-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/bootstrap.css" />
  <script defer src="../js/bootstrap.bundle.js"></script>
  <title>007 Fondo</title>
</head>

<!--Ponemos el body con el fondo del color que introduzca el usuario-->

<body <?php echo "class =bg-$color" ?>>
  <form action="" method="POST">
    <div class="mb-3">
      <label for="color" class="form-label">Color</label>
      <select class="form-select form-select-lg" name="color" id="color">
        <option value="danger">Rojo</option>
        <option value="success">Verde</option>
        <option value="info">Azul</option>
        <option value="warning">Amarillo</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Cambiar color</button>
  </form>
</body>

</html>