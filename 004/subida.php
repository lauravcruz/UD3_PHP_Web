<?php declare(strict_types = 1); 
  
  /* 004subida.html/.php: Crea un formulario que permita subir un archivo al servidor. 
  Además del fichero, debe pedir en el mismo formulario dos campos numéricos que 
  soliciten la anchura y la altura. Comprueba que tanto el fichero como los datos llegan 
  correctamente.*/

  if (isset($_FILES['archivo'])) {
    $errors = array();
    $file_name = $_FILES['archivo']['name']; //Recoge el nombre del archivo
    $file_tmp = $_FILES['archivo']['tmp_name']; //Nombre temporal

    $dimensions = getimagesize($_FILES['archivo']['tmp_name']); //recogemos las dimensiones del archivo
    $image_width = $dimensions[0];
    $image_height = $dimensions[1];
    $widthForm = $_POST["anchura"];
    $heightForm = $_POST["altura"];

    //Comprobamos que el archivo tiene la altura y la anchura especificada en el form
    if($image_width != $widthForm){
      $errors[] = 'El archivo no tiene la anchura indicada';
    }
    if($image_height != $heightForm){
      $errors[] = 'El archivo no tiene la altura indicada';
    }
    //Comprobamos: si no hay erorres, guardamos el archivo. Si hay, los mostramos
    if (empty($errors) == true) {
      move_uploaded_file($file_tmp, $file_name);
      echo "La imagen se ha guardado correctamente";
    } else {
      print_r($errors);
    }
    
  }
  ?>
