
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

<body>
<section class="hero is-success is-fullheight">
  <div class="hero-body">
    <div class="container">
      <div class="columns">
    
        <div class="column"></div>

        <div class="column">
          <h2 class="title">Log In</h2>

          <div>
            <form action="login.php" method="post">
              <label class="label">Pasaporte</label>
              <input class="input" type="text" name="Pasaporte">
              <label class="label">Contraseña</label>
              <input class="input" type="password" name="Password">
              <br></br>
              <input class="button is-link" type="submit" name="boton_submit" value="Iniciar Sesión">
            </form>
          </div>
        </div>

        <div class="column"></div>
      
      </div>
    </div>
  </div>
</section>

<?php if(isset($_POST['boton_submit']))
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
?>


<?php include("templates/footer.html") ?>





