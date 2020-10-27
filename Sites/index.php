
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
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
<?php
$status = $_GET['status'];
?>
<body>
<section class="hero is-success is-fullheight">
  <div class="hero-body">
    <div class="container">
      <div class="columns">
    
        <div class="column"></div>

        <div class="column">

        <div class="title is-5 has-text-centered">
          <strong>Cochrane Ports</strong> - Grupos 2 y 129
          <br>
          <a href="https://github.com/benjaminlillo/IIC2413_private">Repositorio de GitHub</a>
        </div>

          <h2 class="title">Iniciar Sesión</h2>
          <?php if($status=='registrado'){
          echo "<h2 class='subtitle'>Usuario creado</h2>";
          }
          ?>

          <div>
            <form action="<?php $_PHP_SELF ?>" method="post">
              <label class="label">Pasaporte</label>
              <input class="input" type="text" name="Pasaporte">
              <label class="label">Contraseña</label>
              <input class="input" type="password" name="Password">
              <br></br>
              <div class="columns">
                <div class="column is-3">
                  <input class="button is-info" type="submit" name="boton_submit" value="Iniciar Sesión">
                </div>
                <div class="column is-3"></div>
                <div class="column is-3">
                  <input class="button is-danger" type="submit" name="boton_registrarse" value="Registrarse">
                </div>
              </div>
              
            </form>
          </div>
        </div>

        <div class="column"></div>
      
      </div>
    </div>
  </div>
</section>

<?php
if(isset($_POST['boton_submit']))
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
if(isset($_POST['boton_registrarse']))
{
  echo "<script> location.href='./register.php'; </script>";
}
?>

</body>








