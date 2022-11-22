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
  <title>005 Subida</title>
</head>

<body>
  <?php
  /* 004subida.html/.php: Crea un formulario que permita subir un archivo al servidor. 
  Además del fichero, debe pedir en el mismo formulario dos campos numéricos que 
  soliciten la anchura y la altura. Comprueba que tanto el fichero como los datos llegan 
  correctamente.*/

  if (isset($_FILES['archivo'])) {
    $errors = array();
    $file_name = $_FILES['archivo']['name']; //Recoge el nombre del archivo
    $file_tmp = $_FILES['archivo']['tmp_name']; //Nombre temporal

    $file_type = $_FILES['archivo']['type']; // Tipo MIME
    $dimensions = getimagesize($_FILES['archivo']['tmp_name']); //recogemos las dimensiones del archivo
    $image_width = $dimensions[0];
    $image_height = $dimensions[1];
    $widthForm = $_POST["anchura"];
    $heightForm = $_POST["altura"];

    //Comprobamos que el archivo tiene la altura y la anchura especificada en el form
    if ($image_width != $widthForm) {
      $errors[] = 'El archivo no tiene la anchura indicada';
    }
    if ($image_height != $heightForm) {
      $errors[] = 'El archivo no tiene la altura indicada';
    }
    //Comprobamos: si no hay erorres, guardamos el archivo. Si hay, los mostramos y si no hay, visualizamos la imagen
    if (empty($errors) == true) {
      move_uploaded_file($file_tmp, $file_name);
      echo "La imagen se ha guardado correctamente";
      echo "<img src ='$file_name'>"; 
    } else {
      echo implode("<br>", $errors);
    }
  }
  ?>
  <form class="container-fluid d-grid g-3" action="subida.php" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="form-outline col-3">
        <label class="form-label" for="typeNumber">Anchura</label>
        <input type="number" id="anchura" name="anchura" class="form-control" />
      </div>
      <div class="form-outline col-3">
        <label class="form-label" for="typeNumber">Altura</label>
        <input type="number" id="altura" name="altura" class="form-control" />
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <input type="file" name="archivo" id="archivo" />
      </div>
    </div>
    <input type="submit" />
  </form>
</body>

</html>