<?php
  $id = $_GET["id"];
  require("config/conexion.php");

  $query = "SELECT * FROM Usuario;";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll();

  foreach ($dataCollected as $p) {
   
  }
?>

<!-- $nombre =
    $edad =
    $sexo =
    $pasaporte =
    $nacionalidad = -->