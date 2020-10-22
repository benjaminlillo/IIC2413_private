<?php
  require("config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  $query = "SELECT * FROM Usuario;";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['boton']))
    {
        func();
    }
    function func()
    {
      echo("<script>console.log('HOLAH');</script>");
    }
?>


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

          <div  class="field" >
            <label class="label" >Pasaporte</label>
            <div class="control">
              <input id="pasaporte" class="input" type="text" placeholder="n° pasaporte">
          </div>
        </div>
          
          <div class="field">
            <label class="label">Constraseña</label>
            <div class="control">
              <input id="contrasena" class="input" type="text" placeholder="contraseña">
            </div>
          </div>
          
          <div class="control">
              <button type='button' onclick="document.write('<?php echo "Click On YesBtn"; ?>');>Run my PHP code</button>
              <button type="submit" action="login.php" method="post" name="boton" class="button is-link">Log In</button>
          </div>
        </div>

        <div class="column"></div>
      
      </div>
    </div>
  </div>
</section>
</body>





