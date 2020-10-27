<head><title>Cambiar clave</title></head>
<?php
  $titulo = "Perfil";
  include('templates/header.html');
  include('templates/nav_bar.php');
	$id = $_GET['id'];
	$status = $_GET['status'];
?>

<?php
	if(isset($_POST['boton_inicio']))
	{
		echo "<script> location.href='./home.php?id=" .$id. "'; </script>";
		exit;
	}
  if(isset($_POST['boton_miperfil']))
  {
    echo "<script> location.href='./profile.php?id=" .$id. "'; </script>";
    exit;
	}
?>

<?php  if(isset($_POST['boton_submit']))
{
	$clave_antigua = $_POST['clave_antigua'];
	$clave_nueva = $_POST['clave_nueva'];
	// verificar clave antigua
	require("config/conexion_2.php");
	$query = "SELECT contrasena FROM usuarios WHERE id = $id;";
	$result = $db -> prepare($query);
	$result -> execute();
	$return = $result -> fetchAll();
	echo "<br>";
	echo "<br>";
	echo "<br>";
	if($return[0]['contrasena'] == $clave_antigua) {
		// cambiar la clave
		$query = "UPDATE usuarios SET contrasena = '$clave_nueva' WHERE id = $id;";
		$result = $db -> prepare($query);
		$result -> execute();
		$return = $result -> fetchAll();
		if(!empty($return)) {
			// redirigir a perfil
			echo "<script> location.href='./profile.php?id=" .$id. "&status=cambio_clave'; </script>";
		}
		exit;
	}
	else {
		echo "<script> location.href='./cambiar_clave.php?id=" .$id. "&status=clave_anterior'; </script>";
	}
}
?>
<section class="hero is-fullheight">
  <div class="hero-body">
    <div class="container">
      <div class="columns">
    
        <div class="column"></div>

        <div class="column">

          <h2 class="title">Cambiar contraseña</h2>
					<?php if($status == 'clave_anterior'){
					echo "<h3 class='subtitle'>Contraseña anterior es incorrecta</h3>"; 
					} ?>
          <div>
						<form action="<?php $_PHP_SELF ?>" method="post">
							<label class="label">Contraseña antigua</label>
              <input class="input" type="password" name="clave_antigua">
              <label class="label">Nueva contraseña</label>
              <input class="input" type="password" name="clave_nueva">
              <br></br>

              <input class="button is-danger" type="submit" name="boton_submit" value="Cambiar contraseña">
            </form>
          </div>
        </div>

        <div class="column"></div>
      
      </div>
    </div>
  </div>
</section>
<?php include("templates/footer.html") ?>