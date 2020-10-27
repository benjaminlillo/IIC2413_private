
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.css">
    <style>
      body {
        overflow-y:hidden;
      }
      ::-webkit-scrollbar {
        width: 0px;  /* Remove scrollbar space */
        background: transparent;  /* Optional: just make scrollbar invisible */
      }
    </style>
</head>
<!-- Obtener lista de países -->
<?php
  require("config/conexion_2.php");
  $query = "SELECT * FROM Usuarios;";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll();

  $valido = FALSE;
  foreach ($dataCollected as $p) {
    if($p["pasaporte"] == $pasaporte && $p["contrasena"] == $clave)
    {
      echo "<script> location.href='./home.php?id=" .$p["id"]. "'; </script>";
      $valido = TRUE;
      exit;
    }
  }

?>
<?php
  $status = $_GET['status'];
?>
<body>
<section class="hero is-danger is-fullheight">
  <div class="hero-body">
    <div class="container">
      <div class="columns">
    
        <div class="column"></div>

        <div class="column">
          <h2 class="title">Registrarse</h2>
          <?php if($status=='pasaporte'){
            echo "<br>";
            echo "<h2 class='subititle'> Pasaporte ya existe </h2>";
            echo "<br>";
          }
          ?>
          <div>
            <form action="<?php $_PHP_SELF ?>" method="post">
              <label class="label has-text-white">Nombre</label>
              <input class="input" type="text" name="Nombre" required>
              <label class="label has-text-white">Edad</label>
              <input class="input" type="Number" name="Edad" min="0" required>
              <label class="label has-text-white">Pasaporte o RUT</label>
              <input class="input" type="text" name="Pasaporte" required>
              <label class="label has-text-white">Nacionalidad</label>
              <input class="input" type="text" name="Nacionalidad" required>
              <label class="label has-text-white">Contraseña</label>
              <input class="input" type="password" name="Contraseña" required>
              <br>
              <label class="label has-text-white">Sexo</label>
              <div class="field">
                <div class="control">
                  <label class="radio" for="femenino">
                    <input type="radio" id="femenino" name="Sexo" value="femenino" checked>
                    Femenino
                  </label>
                  <label class="radio" for="masculino">
                    <input type="radio" id="masculino" name="Sexo" value="masculino">
                    Masculino
                  </label>
                </div>
              </div>
              <br></br>
                <div class="columns">
                  <div class="column is-3">
                    <input class="button is-dark" type="submit" name="boton_registrarse" value="Registrarse">
                  </div>
            </form>
                  <div class="column is-3"></div>
                  <div class="column is-3">
                    <form action="./index.php" method="post">
                      <input class="button is-success" type="submit" name="boton_login" value="Volver">
                    </form>
                  </div>
                </div>
              
            
          </div>
        </div>

        <div class="column"></div>
      
      </div>
    </div>
  </div>
</section>

<?php
if(isset($_POST['boton_registrarse']))
{
  $nombre = $_POST["Nombre"]; 
  $edad = $_POST["Edad"];
  $pasaporte = $_POST["Pasaporte"];
  $nacionalidad = $_POST["Nacionalidad"];
  $contrasena = $_POST["Contraseña"];
  $sexo = $_POST["Sexo"];

  require("config/conexion_2.php");
  $query = "SELECT pasaporte FROM Usuarios WHERE pasaporte='$pasaporte';";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  print_r($dataCollected);
  if(empty($dataCollected)){
    // insertar tupla
    $query = "INSERT INTO Usuarios VALUES('$nombre', '$pasaporte', '$sexo', '$nacionalidad', $edad, '$contrasena', 'normal');";
    $result = $db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll();
    // redirigir a home
    echo "<script> location.href='./index.php?status=registrado'; </script>";
  }
  echo "<script> location.href='./register.php?status=pasaporte'; </script>";
}
if(isset($_POST['boton_login']))
{
  echo "<script> location.href='./index.php'; </script>";
}
?>


</body>

</html>





