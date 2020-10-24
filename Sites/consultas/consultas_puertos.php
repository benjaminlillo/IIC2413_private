	<?php
		include('../templates/header.html');
		include('../templates/nav_bar.php');
		$id = $_GET['id'];
		$id_puerto = $_GET['id_puerto'];
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
		require("../config/conexion_129.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
		
		// buques pesqueros
		$query = "SELECT * FROM Puerto WHERE ppid=$id_puerto;";
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
					<table align='center' class='table'>
						<tr>
							<th>ID</th>
							<th>NOMBRE</th>
							<th>CIUDAD</th>
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
					<input class="input" type="text" name="Fecha_1">
					<label class="label">Fecha 2</label>
					<input class="input" type="text" name="Fecha_2">
					<br></br>
					<input class="button is-link" type="submit" name="boton_consulta_1" value="Consulta 1">
				</form>
			</div>
			<div class='box'>
				<p class='title is-4'>Consulta 2</p>
				<form action="login.php" method="post">
					<label class="label">Tipo de instalación o fecha</label>
					<input class="input" type="text" name="Tipo_instalacion">
					<label class="label">Fecha</label>
					<input class="input" type="text" name="Fecha">
					<label class="label">Patente del barco</label>
					<input class="input" type="text" name="Patente">
					<label class="label">Sistema</label>
					<input class="input" type="text" name="Sistema">
					<br></br>
					<input class="button is-link" type="submit" name="boton_consulta_2" value="Consulta 2">
				</form>
			</div>
		</div>
		<div class='column'></div>
	</div>
	
</body>
