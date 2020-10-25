<?php
    $titulo = "Puertos";
    include('../templates/header.html');
    include('../templates/nav_bar.php');
    $id = $_GET['id'];
    $id_puerto = $_GET['id_puerto'];
    $tipo = $_GET['tipo'];
    $fecha1 = $_GET['fecha_1'];
    $fecha2 = $_GET['fecha_2'];
    $patente = $_GET['patente'];
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
  $query = "SELECT iid, capacidad_instalacion FROM instalaciones WHERE ppid = $id_puerto AND tipo_instalacion = '$tipo';";

  $result = $db -> prepare($query);
  $result -> execute();
  $instalaciones = $result -> fetchAll();
?>

<div class='columns'>
  <div class='column'></div>
  <div class='column'>
		<div class='box'>
      <?php
      echo "<h4 align='center' class='subtitle is-4'>" .$tipo. "s</h4>";
      ?>
      <table align='center' class='table'>
        <tr>
          <th align='center'>iid</th>
          <th align='center'>Capacidad</th>
          <th align='center'>Permisos</th>
        </tr>

<?php
    foreach($instalaciones as $p) {
        $query = "SELECT * FROM permisos WHERE $p[0] = iid AND fecha_atraque = $fecha1 AND fecha_salida = $fecha2;";
        $result = $db -> prepare($query);
        $result -> execute();
        $aux = $result -> fetchAll();
        
        
        if (count($aux) < $p[1]){
            $resta = $p[1] - count($aux);
            echo "<tr> 
                    <td> $p[0] </td>
                    <td> Tiene: " .$resta. " </td>
                    <td> <a href='./generar_permiso.php?id=" .$id. "&id_instalacion=" .$p['iid']. "&fecha_1=" . $fecha1 . "&fecha_2=" . $fecha2 . "&patente=" . $patente . "'> Generar permiso </a> </td>
                  </tr>";
        } else {
            echo "<tr> <td> $p[0] </td> <td> No tiene capacidad </td> </tr>";
        }
    }
?>

</table>
</div>
</div>
<div class='column'></div>