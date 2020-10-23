<?php
  function get_params($id){
    require("config/conexion_2.php");

    $query = "SELECT * FROM Usuarios;";
    $result = $db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll();
    $correct = FALSE;

    foreach ($dataCollected as $p) {
    if($id == p["id"]){
      $pasaporte = p["pasaporte"];
      $tipo = p["tipo"];
      $nombre = $p["nombre"];
      //$edad = $p["edad"];
      //$sexo = $p["genero"];
      //$nacionalidad = $p["nacionalidad"];
      $correct = TRUE;
    }
    }
    
    if(!$correct) {
      echo "ERROR - NO ENCONTRADO"
    }
    return array("pasaporte" => $pasaporte, "tipo" => $tipo, "nombre" => $nombre);
  }
  
 
  
?>


<!-- if($correct && $tipo == "normal"){

require("config/conexion_2.php");
$query = "SELECT * FROM Normal;";
$result = $db -> prepare($query);
$result -> execute();
$dataCollected = $result -> fetchAll();

} elseif($correct && $tipo == "capitan"){

require("config/conexion_2.php");
$query = "SELECT * FROM Personal;";
$result = $db -> prepare($query);
$result -> execute();
$dataCollected = $result -> fetchAll();
foreach ($dataCollected as $p) {
  if($p["pasaporte"] == $pasaporte){
    $nombre = $p["nombre"];
    $edad = $p["edad"];
    $sexo = $p["genero"];
    $nacionalidad = $p["nacionalidad"];
  }
}

} elseif($correct && $tipo == "jefe"){

require("config/conexion_129.php");
$query = "SELECT * FROM jefes;";
$result = $db -> prepare($query);
$result -> execute();
$dataCollected = $result -> fetchAll();
foreach ($dataCollected as $p) {
  if($p["pasaporte"] == $pasaporte){
    $nombre = $p["nombre"];
    $edad = $p["edad"];
    $sexo = $p["sexo"];
  }
}
 -->