
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.css">
    
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
              <label class="label">Pasaporte:</label>
              <input class="input" type="text" name="Pasaporte">
              <label class="label">Contraseña:</label>
              <input class="input" type="text" name="Password">
              <input type="submit" name="boton_submit">
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
  $password = $_POST["Password"];
  require("config/conexion.php");
  $query = "SELECT * FROM Usuario;";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll();

  $valido = FALSE;
  foreach ($dataCollected as $p) {
  echo $p;
    if($p["pasaporte"] == $pasaporte && $p["contrasena"] == $password)
    {
      echo "<script> location.href='./home.php?id=" .$p["id"]. "&tipo=" .$p["tipo"]. "'; </script>";
      $valido = TRUE;
      exit;
    }
  }
  echo $valido;
  echo "hola";
}
?>


</body>





