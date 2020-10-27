<head><title>Puertos</title></head>
<?php
  $titulo = "Generar permiso";
  include('../templates/header.html');
  include('../templates/nav_bar.php');
?>

<?php
  $id = $_GET['id'];
  $id_instalacion = $_GET['id_instalacion'];
  $fecha_1 = $_GET['fecha_1'];
  $fecha_2 = $_GET['fecha_2'];
  $patente = $_GET['patente'];

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

  require("../config/conexion_129.php");
  $query = "SELECT * FROM permisos;";
  $result = $db -> prepare($query);
  $result -> execute();
  $p = $result -> fetchAll();

  $largo = end($p)['peid'] + 1;
  echo "<br>";
  echo "<br>";
  echo "<br>";
  $query = "INSERT INTO permisos VALUES($largo, $id_instalacion, '$patente', TIMESTAMP '$fecha_1', TIMESTAMP '$fecha_2', 'holi');";
  // $query = "INSERT INTO test VALUES('php');";
  $result = $db -> prepare($query);
  $result -> execute();
  $p = $result -> fetchAll();
  /* $query = ;";
  $result = $db -> prepare($query);
  $result -> execute();
  $p = $result -> fetchAll();
  print_r($p);
  print_r("CREADO!"); */
  if(empty($p)){
    echo "<h1 class='title' align='center'>Patente no existe</h1>";
  }
  else {
    echo "<h1 class='title' align='center'>Permiso creado</h1>";
  }
?>

<?php include("../templates/footer.html") ?>