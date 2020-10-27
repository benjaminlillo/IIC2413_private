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
<br>
<?php
  require("../config/conexion_129.php");
  $query = "SELECT fib($id_puerto, '$fecha1', '$fecha2')";

  $result = $db -> prepare($query);
  $result -> execute();
  $instalaciones = $result -> fetchAll();

?>
<div class="columns">
  <div class="column"></div>

  <div class="column">
    <div class="box">
      <h3 align="center" class="title is-4">Días disponibles y Porcentaje disponibilidad</h3>


      <table class="table" align="center">
          <tr>
            <th>FECHA</th>
            <th>IID</th>
            <th>PORCENTAJE</th>
          </tr>
        <?php
        $promedio = 0;
        $cant = 0;
        foreach ($instalaciones as $p) {
            $p = $p[0];
            $p = str_replace("(", "", $p);
            $p = str_replace(")", "", $p);
            $p = explode(",", $p);
            $promedio = $promedio + $p[2];
            $cant = $cant + 1;
            $p[2] = round($p[2], 3);
            $p[2] = $p[2] * 100;
            $p[2] = $p[2]."%";
            echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> </tr>";
        }
      
        $promedio = $promedio / $cant;
        $promedio = round($promedio, 3);
        $promedio = $promedio * 100;
        $promedio = $promedio."%";
        echo "<h3> Porcentaje promedio: " .$promedio."</h3>";
?>

</table>
    </div>
  </div>
<div class="column"></div>
</div>
</body>