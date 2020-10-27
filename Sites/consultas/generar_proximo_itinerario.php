<head><title>Crear próximo itinerario</title></head>
<?php
  $titulo = "Generar permiso";
  include('../templates/header.html');
  include('../templates/nav_bar.php');
?>

<?php
  $id = $_GET['id'];
  $bid = $_GET['bid'];
	$fecha = $_GET['fecha'];
	$puerto = $_GET['puerto'];
	echo "<br>";
	echo "<br>";
	echo "<br>";
	$actual = date("Y-m-d");

	if(isset($_POST['boton_miperfil']))
  {
    echo "<script> location.href='../profile.php?id=" .$id. "'; </script>";
    exit;
  }
  ?>
  <?php
  if(isset($_POST['boton_inicio']))
  {
    echo "<script> location.href='../home.php?id=" .$id. "'; </script>";
    exit;
  }
?>

<?php

	require("../config/conexion_2.php");
	$query = "SELECT * FROM historial;";
  $result = $db -> prepare($query);
  $result -> execute();
  $p = $result -> fetchAll();

	$largo = end($p)['aid'] + 1;
	
	if($fecha > $actual){
		$query1 = "INSERT INTO atraque VALUES($largo, TIMESTAMP '$fecha', NULL, '$puerto');";
		$query2 = "INSERT INTO historial VALUES($largo, $bid);";
		$result1 = $db -> prepare($query1);
		$result1 -> execute();
		$dataCollected1 = $result1 -> fetchAll();
		$result2 = $db -> prepare($query2);
		$result2 -> execute();
		$dataCollected2 = $result2 -> fetchAll();
		echo "<h1 class='title' align='center'>Itinerario creado correctamente</h1>";
	}
	else {
		echo "<h1 class='title' align='center'>Fecha ingresada debe ser posterior a la actual</h1>";
	}


