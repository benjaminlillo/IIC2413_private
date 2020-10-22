<?php
  require("config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  $query = "SELECT * FROM Usuario;";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.css">
    
</head>

<body>

<div  class="field" class="is-centered" class="is-half">
  <label class="label" >Pasaporte</label>
  <div class="control">
    <input class="input" type="text" placeholder="n° pasaporte">
  </div>
</div>

<div class="field" class="is-centered" class="is-half">
  <label class="label">Constraseña</label>
  <div class="control">
    <input class="input" type="text" placeholder="contraseña">
  </div>
</div>

</body>