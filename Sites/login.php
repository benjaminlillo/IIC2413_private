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
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
    
</head>

<body>

<div align="center" class="field">
  <label class="label">Pasaporte</label>
  <div class="control">
    <input class="input" type="text" placeholder="n° pasaporte">
  </div>
</div>

<div align="center" class="field">
  <label class="label">Constraseña</label>
  <div class="control">
    <input class="input" type="text" placeholder="contraseña">
  </div>
</div>

</body>