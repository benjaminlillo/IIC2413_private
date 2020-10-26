<head><title>Navieras</title></head>
<?php
	$titulo = "Navieras";
  include('../templates/header.html');
  include('../templates/nav_bar.php');
  $id = $_GET['id'];
  $id_naviera = $_GET['id_naviera'];
?>

<link rel="stylesheet" href="../css/fondo.css">
<?php
  if(isset($_POST['boton_miperfil']))
  {
    echo "<script> location.href='../profile.php?id=" .$id. "'; </script>";
    exit;
  }
  if(isset($_POST['boton_inicio']))
  {
    echo "<script> location.href='../home.php?id=" .$id. "'; </script>";
    exit;
  }
?>
  <?php
  require("../config/conexion_2.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
	
	// buques pesqueros
  $query = "SELECT s.nombre, s.patente FROM (SELECT * FROM naviera NATURAL JOIN pertenece) AS r,(SELECT * FROM buque NATURAL JOIN buquepesquero) AS s WHERE r.bid = s.bid AND r.nid = $id_naviera;";
  $result = $db -> prepare($query);
  $result -> execute();
	$dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
	?>
	<br>
  <br>
	<br>
	<br>
	<br>
	<div class='columns'>
	<div class="column is-1"></div>
		<div class='column box'>
			<h4 align='center' class='subtitle is-4'> Buques pesqueros </h4>
			<?php if (!empty($dataCollected)) : ?>
				<table align='center' class='table'>
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
				<h5 align='center'> Esta naviera no posee buques pesqueros </h5>
			<?php endif; ?>
		</div>

		<?php
		// buques petroleros
		$query = "SELECT s.nombre, s.patente FROM (SELECT * FROM naviera NATURAL JOIN pertenece) AS r,(SELECT * FROM buque NATURAL JOIN buquepetrolero) AS s WHERE r.bid = s.bid AND r.nid = $id_naviera;";
		$result = $db -> prepare($query);
		$result -> execute();
		$dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
		?>
		<div class="column is-1"></div>
		<div class='column box'>
			<h4 align='center' class='subtitle is-4'> Buques petroleros </h4>
			<?php if (!empty($dataCollected)) : ?>
				<table align='center' class='table'>
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
				<h5 align='center'> Esta naviera no posee buques petroleros </h5>
			<?php endif; ?>
		</div>

		<?php
		// buques de carga
		$query = "SELECT s.nombre, s.patente FROM (SELECT * FROM naviera NATURAL JOIN pertenece) AS r,(SELECT * FROM buque NATURAL JOIN buquecarga) AS s WHERE r.bid = s.bid AND r.nid = $id_naviera;";
		$result = $db -> prepare($query);
		$result -> execute();
		$dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
		?>
		<div class="column is-1"></div>
		<div class='column box'>
			<h4 align='center' class='subtitle is-4'> Buques de carga </h4>
			<?php if (!empty($dataCollected)) : ?>
				<table align='center' class='table'>
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
				<h5 align='center'> Esta naviera no posee buques de carga </h5>
			<?php endif; ?>
		</div>
		<div class="column is-1"></div>
	</div>
<?php include("../templates/footer.html") ?>
