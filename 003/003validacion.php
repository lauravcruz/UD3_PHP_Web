<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <script defer src="js/bootstrap.bundle.js"></script>
  <title>003 Validación</title>
</head>

<body>
  <?php
  /*003validacion.php: A partir del formulario anterior, introduce validaciones en HTML 
  mediante el atributo required de los campos (uso los tipos adecuados para cada 
  campo), y en comprueba los tipos de los datos y que cumplen los valores esperados 
  (por ejemplo, en los checkboxes que los valores recogidos forman parte de todos los 
  posibles). Puedes probar a pasarle datos erróneos vía URL y comprobar su 
  comportamiento. Tip: Investiga el uso de la función filter_var.*/

  /*Establecemos primero las validaciones: 
  Si metemos por URL un dato que no es válido, saltará el mensaje arriba. Si es válido, lo mostrará*/

  $aficionesValidas = ["deporte", "musica", "cine", "videojuegos"];
  $menusValidos = ["pasta", "carne", "pescado", "ensalada"];

  if (!empty($_GET['nombreCompleto']) && !empty($_GET['email']) && !empty($_GET['URL']) && !empty($_GET['sexo']) && !empty($_GET['convivientes']) && !empty($_GET['aficiones']) && !empty($_GET['menu'])) {
    // Aquí se incluye el código a ejecutar cuando los datos son correctos 
    if (isset($_GET["nombreCompleto"])) {
      $nombreCompleto = $_GET["nombreCompleto"];
      echo "Nombre y apellidos: $nombreCompleto <br>";
    }

    if (isset($_GET["email"])) {
      $email = $_GET["email"];

      //Filter_var hace una comprobación. Le pasamos nuestra variable, y el tipo de variable que debe ser. Si lo cumple, devuelve true
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email = $_GET["email"];
        echo "Email: $email <br>";
      } else {
        echo $email . " no es un email válido <br>";
      }
    }

    if (isset($_GET["URL"])) {
      $url = $_GET["URL"];
      //Esta vez el tipo de la variable es url

      if (filter_var($url, FILTER_VALIDATE_URL)) {
        $url = $_GET["URL"];
        echo "URL: $url<br>";
      } else {
        echo ($url . " no es una url válida<br>");
      }
    }

    if (isset($_GET["sexo"])) {
      $sexo = $_GET["sexo"];

      if (!($sexo == "hombre" || $sexo == "mujer")) {
        echo "$sexo no es un sexo válido<br>";
      }
    }

    if (isset($_GET["convivientes"])) {
      $convivientes = $_GET["convivientes"];
      //Aquí comprobaremos si se ha introducido un número entero
      if (
        filter_var($convivientes, FILTER_VALIDATE_INT) === 0 ||
        !filter_var($convivientes, FILTER_VALIDATE_INT) === false
      ) {
        echo "Convivientes: $convivientes<br>";
      } else {
        echo "Convivientes tiene que ser un número entero<br>";
      }
    }

    if (isset($_GET["aficiones"])) {
      $aficiones = $_GET["aficiones"];

      foreach ($aficiones as $aficion) {
        if (!(in_array($aficion, $aficionesValidas))) {
          echo "$aficion no es una afición válida<br>";
        } else {
          echo "Afición: $aficion<br>";
        }
      }
    }

    if (isset($_GET["menu"])) {
      $menu = $_GET["menu"];
      foreach ($menu as $plato) {
        if (!(in_array($plato, $menusValidos))) {
          echo "$plato no es un menú válido<br>";
        } else {
          echo "Menú favorito: $plato<br>";
        }
      }
    }
  } else {
    // Generamos el formulario
    $nombreCompleto = $_GET['nombreCompleto'] ?? "";
    $email = $_GET['email'] ?? "";
    $url = $_GET['URL'] ?? "";
    $sexo = $_GET['sexo'] ?? "";
    $aficiones = $_GET['aficiones'] ?? [];
    $menu = $_GET['menu'] ?? [];
  }

  ?>

  <!--Volvemos a imprimir el formulario del anterior ejercicio, pero añadiendo required a los inputs-->

  <form class="container-fluid d-grid g-3" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
    <div class="row">
      <div class="col-6">
        <label for="nombreCompleto" class="form-label">Nombre y apellidos:</label>
        <input type="text" class="form-control" id="nombreCompleto" name="nombreCompleto" value="<?= $nombreCompleto ?>" required />
      </div>

      <div class="col-6">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" required />
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <label for="URL" class="form-label">Url:</label>
        <input type="url" class="form-control" id="URL" name="URL" value="<?= $url ?>" required />
      </div>
    </div>
    <div class="row d-flex align-items-center">
      <div class="col-6">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sexo" id="sexo_hombre" value="hombre" />
          <label class="form-check-label" for="hombre"> Hombre </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sexo" id="sexo_mujer" value="mujer" />
          <label class="form-check-label" for="mujer"> Mujer </label>
        </div>
      </div>
      <div class="col-6 p-2">
        <div class="form-outline">
          <label class="form-label" for="typeNumber">Número de convivientes</label>
          <input type="number" id="convivientes" name="convivientes" class="form-control" value="<?= $convivientes ?>" />
        </div>
      </div>
    </div>
    <div class="row d-flex align-items-center">
      <div class="col-6">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="deporte" id="aficiones" name="aficiones[]" <?php if (in_array("deporte", $aficiones)) echo 'checked="checked"'; ?> />
          <label class="form-check-label" for="deporte"> Deporte </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="musica" id="aficiones" name="aficiones[]" <?php if (in_array("musica", $aficiones)) echo 'checked="checked"'; ?> />
          <label class="form-check-label" for="musica"> Música </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="cine" id="aficiones" name="aficiones[]" <?php if (in_array("cine", $aficiones)) echo 'checked="checked"'; ?> />
          <label class="form-check-label" for="cine"> Cine </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="videojuegos" name="aficiones[]" id="aficiones" <?php if (in_array("videojuegos", $aficiones)) echo 'checked="checked"'; ?> />
          <label class="form-check-label" for="videojuegos">
            Videojuegos
          </label>
        </div>
      </div>
      <div class="col-6">
        <div class="mb-3">
          <label for="menu" class="form-label">Menú</label>
          <select multiple class="form-select form-select-lg" name="menu[]" id="menu" required>
            <option value="pasta" <?php if (in_array("pasta", $menu)) echo 'selected="select"' ?>>Pasta</option>
            <option value="carne" <?php if (in_array("carne", $menu)) echo 'selected="select"' ?>>Carne</option>
            <option value="pescado" <?php if (in_array("pescado", $menu)) echo 'selected="select"' ?>>Pescado</option>
            <option value="ensalada" <?php if (in_array("ensalada", $menu)) echo 'selected="select"' ?>>Ensalada</option>
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