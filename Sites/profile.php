<?php
  include('templates/header.html');
  include('templates/nav_bar.php');
?>
<?php
  $id = $_GET["id"];
  include('info_id.php');
  $vars = get_params($id);
?>
<body>
<!-- para todos -->
<table class="table">
    <tr>
      <th>ID</th>
      <th>NOMBRE</th>
    </tr>
  <?php
  require("config/conexion_2.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  $query = "SELECT nid, nombre FROM Naviera;";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  foreach ($dataCollected as $p) {
    echo "<tr> <td> $p[0] </td> <td> <a href='./consultas/consultas_navieras.php?id=" . $p[0] . "' > $p[1] </a> </td>";
  }
  ?>
  </table>
<!-- para no todos -->

<div align="center">
    <form action="<?php $_PHP_SELF ?>" method="post">
      <input class="button is-link" type="submit" name="boton_home" value="Home">
    </form>
  </div>
  <?php if(isset($_POST['boton_inicio']))
  {
    echo "<script> location.href='./home.php?id=" .$id. "'; </script>";
    exit;
  }
  ?>
</body>
