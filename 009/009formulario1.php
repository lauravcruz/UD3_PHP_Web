<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/bootstrap.css" />
  <script defer src="../js/bootstrap.bundle.js"></script>
  <title>009 Formulario</title>
</head>

<body>
  <!--009formulario1.php envía los datos (nombre y apellidos, email, url y sexo) a 
  009formulario2.php.-->

  <!--Enviamos el formulario del ej2 pero solo con los campos solicitados. Action: el siguiente php-->
  <form class="container-fluid d-grid g-3" action="009formulario2.php" method="POST">
    <div class="row">
      <div class="col-6">
        <label for="nombreCompleto" class="form-label">Nombre y apellidos:</label>
        <input type="text" class="form-control" id="nombreCompleto" name="nombreCompleto" />
      </div>

      <div class="col-6">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" />
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <label for="URL" class="form-label">Url:</label>
        <input type="url" class="form-control" id="URL" name="URL" />
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
    </div>
    </div>

    <div class="col-12">
      <button class="btn btn-primary" type="submit">Submit form</button>
    </div>
  </form>
</body>

</html>