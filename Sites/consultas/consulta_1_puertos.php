<?php
    $titulo = "Puertos";
    include('../templates/header.html');
    include('../templates/nav_bar.php');
    $id = $_GET['id'];
    $id_puerto = $_GET['id_puerto'];
    $fecha1 = $_GET['fecha_1'];
    $fecha2 = $_GET['fecha_2'];
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
<br>
<br>
<br>
<?php
  require("../config/conexion_129.php");
  $query = "SELECT fib(id_puerto, '$fecha1', '$fecha2'";

  $result = $db -> prepare($query);
  $result -> execute();
  $instalaciones = $result -> fetchAll();
?>

<table>
    <tr>
      <th>Fecha</th>
      <th>iid</th>
      <th>Porcentaje</th>
    </tr>
  <?php
	foreach ($puertos as $puertos) {
  		echo "<tr> <td>$puertos[0]</td> <td>$puertos[1]</td> <td>$puertos[2]</td> </tr>";
	}
  ?>
	</table>

