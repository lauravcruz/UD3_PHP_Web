<?php

declare(strict_types=1);
/*Iniciamos la sesión y le guardamos el color que haya recibido por formulario, igual que la cookie*/
session_start();
$_SESSION["ej8"] = "ej8";

if (isset($_GET['vaciar'])) {
  //Destruimos la sesión y creamos una nueva. Llamo igual para poder seguir reutilziando el siguiente archivo
  session_destroy();
  unset($_SESSION['color']);

  session_start();
  $_SESSION["ej8"] = "ej8";
}

if (isset($_POST['color'])) {
  $color = $_POST['color'];
  $_SESSION['color'] = $color;
} else {
  //Si no se ha recibido, se recupera el de la sesión
  $color = $_SESSION['color'] ?? 'light';
}

?>

<!--008fondoSesion1.php: Modifica el ejercicio anterior para almacenar el color de fondo 
en la sesión y no emplear cookies. Además, debe contener un enlace al siguiente 
archivo. 408fondoSesion2.php: Debe mostrar el color y dar la posibilidad de:
Volver a la página anterior mediante un enlace, y mediante otro enlace, vaciar la 
sesión y volver a la página anterior.-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/bootstrap.css" />
  <script defer src="../js/bootstrap.bundle.js"></script>
  <title>008 Fondo</title>
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
  <a href="408fondoSesion2.php">SIGUIENTE ENLACE</a>
</body>

</html>