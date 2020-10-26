<head><title>Puertos</title></head>
<h1>hola</h1>
<?php
  $id = $_GET['id'];
  $id_instalacion = $_GET['id_instalacion'];
  $fecha_1 = $_GET['fecha_1'];
  $fecha_2 = $_GET['fecha_2'];
  $patente = $_GET['patente'];

  require("../config/conexion_129.php");
  $query = "SELECT * FROM permisos;";
  $result = $db -> prepare($query);
  $result -> execute();
  $p = $result -> fetchAll();

  $largo = 900;
  print_r($fecha_1);
  echo "<br>";
  print_r($fecha_2);
  echo "<br>";
  print_r($id_instalacion);
  echo "<br>";
  print_r($largo);
  echo "<br>";
  print_r($patente);
  echo "<br>";
  $query = "INSERT INTO permisos VALUES($largo, $id_instalacion, '$patente', TIMESTAMP '2018-04-20 06:06:35', TIMESTAMP '2018-04-20 06:06:35', 'te odio php');";
  //$query = "INSERT INTO test VALUES('php', 1);";
  $result = $db -> prepare($query);
  $result -> execute();
  $p = $result -> fetchAll();
  print_r($p);
  /* $query = ;";
  $result = $db -> prepare($query);
  $result -> execute();
  $p = $result -> fetchAll();
  print_r($p);
  print_r("CREADO!"); */
?>