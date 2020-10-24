<?php
    $titulo = "Puertos";
    include('../templates/header.html');
    include('../templates/nav_bar.php');
    $tipo = $_GET['tipo'];
    $fecha1 = $_GET['Fecha_1'];
    $fecha2 = $_GET['Fecha_2'];
    $patente = $_GET['Patente'];
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
  require("../config/conexion_129.php");
  include 'consultas_puertos.php';
  $query = "SELECT iid, capacidad_instalacion FROM instalaciones WHERE ppid = $id AND tipo_instalacion = $tipo;";
  $result = $db -> prepare($query);
  $result -> execute();
  $instalaciones = $result -> fetchAll();
?>
<?php
    foreach($instalaciones as $p) {
        $query = "SELECT * FROM permisos WHERE $p[0] = iid AND fecha_atraque = $fecha1 AND fecha_salida = $fecha2;";
        $result = $db -> prepare($query);
        $result -> execute();
        $aux = $result -> fetchAll();
        if (count($aux) < $p[1]){
            echo "<tr> <td> $p[0] </td> <td> Tiene capacidad </td> </tr>";
        } else {
            echo "<tr> <td> $p[0] </td> <td> No tiene capacidad </td> </tr>";
        }
    }
?>
