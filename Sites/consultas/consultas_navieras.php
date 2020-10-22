<?php include('../templates/header.html');   ?>
<!-- aqui va a estar la consulta 1 de navegacion -->
<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

	$id = $_GET['id'];
	
	// buques pesqueros
  $query = "SELECT s.nombre, s.patente FROM (SELECT * FROM naviera NATURAL JOIN pertenece) AS r,(SELECT * FROM buque NATURAL JOIN buquepesquero) AS s WHERE r.bid = s.bid AND r.nid = $id;";
  $result = $db -> prepare($query);
  $result -> execute();
	$dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
	?>
	<h4> Buques pesqueros </h4>
	<?php if (!empty($dataCollected)) : ?>
		<table>
			<tr>
				<th>NOMBRE</th>
				<th>PATENTE</th>
			</tr>
		<?php
		foreach ($dataCollected as $p) {
			echo "<tr> <td>$p[0]</td> <td>$p[1]</td>";
		}
		?>
		</table>
	<?php else : ?>
		<h5> Esta naviera no posee buques pesqueros </h5>
	<?php endif; ?>


	

	<?php
	// buques petroleros
  $query = "SELECT s.nombre, s.patente FROM (SELECT * FROM naviera NATURAL JOIN pertenece) AS r,(SELECT * FROM buque NATURAL JOIN buquepetrolero) AS s WHERE r.bid = s.bid AND r.nid = $id;";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>
	<h4> Buques petroleros </h4>
	<?php if (!empty($dataCollected)) : ?>
		<table>
			<tr>
				<th>NOMBRE</th>
				<th>PATENTE</th>
			</tr>
		<?php
		foreach ($dataCollected as $p) {
			echo "<tr> <td>$p[0]</td> <td>$p[1]</td>";
		}
		?>
		</table>
	<?php else : ?>
		<h5> Esta naviera no posee buques petroleros </h5>
	<?php endif; ?>

	<?php
	// buques de carga
  $query = "SELECT s.nombre, s.patente FROM (SELECT * FROM naviera NATURAL JOIN pertenece) AS r,(SELECT * FROM buque NATURAL JOIN buquecarga) AS s WHERE r.bid = s.bid AND r.nid = $id;";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>
	<h4> Buques de carga </h4>
	<?php if (!empty($dataCollected)) : ?>
		<table>
			<tr>
				<th>NOMBRE</th>
				<th>PATENTE</th>
			</tr>
		<?php
		foreach ($dataCollected as $p) {
			echo "<tr> <td>$p[0]</td> <td>$p[1]</td>";
		}
		?>
		</table>
	<?php else : ?>
		<h5> Esta naviera no posee buques de carga </h5>
	<?php endif; ?>
	
	

<?php include('../templates/footer.html'); ?>