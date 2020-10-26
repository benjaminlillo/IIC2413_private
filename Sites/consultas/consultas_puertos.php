<head><title>Puertos</title></head>
	<?php
		$titulo = "Puertos";
		include('../templates/header.html');
		include('../templates/nav_bar.php');
		$id = $_GET['id'];
		$id_puerto = $_GET['id_puerto'];
	?>
	<?php
		require("../config/conexion_129.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
		
		// buques pesqueros
		$query = "SELECT nombre_puerto FROM Puerto WHERE ppid=$id_puerto;";
		$result = $db -> prepare($query);
		$result -> execute();
		$dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
		foreach ($dataCollected as $p) {
			$nombre_puerto = $p[0];
		}
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
		if(isset($_POST['boton_consulta_2']))
		{
      		$tipo = $_POST['tipo'];
			$fecha_1 = $_POST['Fecha_1'];
			$fecha_2 = $_POST['Fecha_2'];
			$patente = $_POST['Patente'];
			echo "<script> location.href='consulta_2_puertos.php?id=" .$id. "&fecha_1=" .$fecha_1. "&fecha_2=" .$fecha_2. "&tipo=" .$tipo. "&id_puerto=" .$id_puerto. "&patente=" .$patente. "'; </script>";
			exit;
		}
	?>
	<?php
		require("../config/conexion_129.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
		
		// buques pesqueros
		$query = "SELECT iid, tipo_instalacion, capacidad_instalacion FROM instalaciones WHERE ppid=$id_puerto;";
		$result = $db -> prepare($query);
		$result -> execute();
		$dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
	?>
	<br>
  <br>
	<br>
	<div class='columns'>
		<div class='column'></div>
			<div class='column'>
				<div class='box'>
					<?php echo "<h4 align='center' class='subtitle is-4'> Instalaciones del puerto " . $nombre_puerto ."</h4>"; ?>
					<table align='center' class='table'>
						<tr>
							<th>ID</th>
							<th>TIPO</th>
							<th>CAPACIDAD</th>
						</tr>
					<?php
						foreach ($dataCollected as $p) {
							echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td>";
						}
					?>
					</table>
				</div>

			<div class='box'>
				<p class='title is-4'>Consulta 1</p>
				<form action="login.php" method="post">
					<label class="label">Fecha 1</label>
					<input class="input" type="date" name="Fecha_1" required>
					<label class="label">Fecha 2</label>
					<input class="input" type="date" name="Fecha_2" required>
					<br></br>
					<input class="button is-link" type="submit" name="boton_consulta_1" value="Consulta 1">
				</form>
			</div>
			<div class='box'>
				<p class='title is-4'>Consulta 2</p>
				<form action="<?php $_PHP_SELF ?>" method="post">
					<label class="label">Tipo de instalación</label>
					<div class="select">
						<select id = 'tipo' name = 'tipo'>
							<option value = 'muelle'>Muelle</option>
							<option value = 'astillero'>Astillero</option>
						</select>
					</div>
					<label class="label">Fecha 1</label>
					<input class="input" type="date" name="Fecha_1" required>
					<label class="label">Fecha 2</label>
					<input class="input" type="date" name="Fecha_2">
					<label class="label">Patente del barco</label>
					<input class="input" type="text" name="Patente" required>
					<br></br>
					<input class="button is-link" type="submit" name="boton_consulta_2" value="Consulta 2">
				</form>
			</div>
		</div>
		<div class='column'></div>
	</div>
	
	<?php include("../templates/footer.html") ?>
