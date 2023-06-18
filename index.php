<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulario</title>
  <script src="main.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
      <div class="col-md-6">
        <form method="POST" action="">
          <h2 class="mb-4 text-center"><em>Formulario de Registro</em></h2>
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre <span class="text-danger"><em>(requerido)</em></span></label>
            <input type="text" name="nombre" class="form-control" required maxlength="20"/>
          </div>
          <div class="mb-3">
            <label for="apellido" class="form-label">Apellido <span class="text-danger"><em>(requerido)</em></span></label>
            <input type="text" name="apellido" class="form-control" required maxlength="20"/>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email <span class="text-danger"><em>(requerido)</em></span></label>
            <input type="email" name="email" class="form-control" required maxlength="20"/>
          </div>
          <input class="btn btn-primary" name="submit" type="submit" value="Suscribirse"/>
        </form>

        <?php
        if ($_POST) {
          $nombre = $_POST['nombre'];
          $apellido = $_POST['apellido'];
          $email = $_POST['email'];

          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "cursosamsung";

          $conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          $sql = "INSERT INTO usuarios (nombre, apellido, email)
                  VALUES ('$nombre','$apellido','$email')";

          if ($conn->query($sql) === TRUE) {
            echo "registrado correctamente";
          } else {
            echo "ERROR: " . $sql . "<br>" . $conn->error;
          }
          $conn->close();
        }
        ?>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
