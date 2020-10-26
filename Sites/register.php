
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

<body>
<section class="hero is-danger is-fullheight">
  <div class="hero-body">
    <div class="container">
      <div class="columns">
    
        <div class="column"></div>

        <div class="column">
          <h2 class="title">Registrarse</h2>

          <div>
            <form action="<?php $_PHP_SELF ?>" method="post">
              <label class="label has-text-white">Nombre</label>
              <input class="input" type="text" name="Nombre" required>
              <label class="label has-text-white">Edad</label>
              <input class="input" type="Number" name="Edad" required>
              <br>
              <label class="label has-text-white">Sexo</label>
              <div class="field">
                <div class="control">
                  <label class="radio">
                    <input type="radio" name="Sexo">
                    Femenino
                  </label>
                  <label class="radio">
                    <input type="radio" name="Sexo">
                    Masculino
                  </label>
                  <label class="radio">
                    <input type="radio" name="Sexo" checked>
                    Otro
                  </label>
                </div>
              </div>
              <label class="label has-text-white">Pasaporte o RUT</label>
              <input class="input" type="password" name="Pasaporte" required>
              <label class="label has-text-white">Nacionalidad</label>
              <div class="select">
                <select id = 'tipo' name = 'Nacionalidad' required>
                  <option value = 'muelle'>Muelle</option>
                  <option value = 'astillero'>Astillero</option>
                  <!-- =============================== -->
                  <?php
                  foreach (paises as $nacionalidad){
                    echo "<option value = ". $nacionalidad .">Astillero</option>";
                  }
                  ?>
                </select>
              </div>
              <label class="label has-text-white">Contraseña</label>
              <input class="input" type="password" name="Contraseña" required>
              <br></br>
                <div class="columns">
                  <div class="column is-3">
                    <input class="button is-dark" type="submit" name="boton_registrar" value="Registrarse">
                  </div>
            </form>
                  <div class="column is-3"></div>
                  <div class="column is-3">
                    <form action="./login.php" method="post">
                      <input class="button is-success" type="submit" name="boton_login" value="Iniciar Sesión">
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
if(isset($_POST['boton_registrar']))
{
  $pasaporte = $_POST["Pasaporte"]; 
  $clave = $_POST["Password"];
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
}
if(isset($_POST['boton_login']))
{
  echo "<script> location.href='./login.php'; </script>";
}
?>


</body>

</html>





