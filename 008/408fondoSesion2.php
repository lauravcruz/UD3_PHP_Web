<?php

declare(strict_types=1);
/*Recuperamos la sesión y el color*/
session_start();
$ej8 = $_SESSION["ej8"];
$color = $_SESSION['color'];
?>

<!--408fondoSesion2.php: Debe mostrar el color y dar la posibilidad de:
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
  <a href="008fondoSesion1.php">VOLVER</a>
  <a href="008fondoSesion1.php?vaciar=true">VACIAR Y VOLVER</a>
</body>

</html>