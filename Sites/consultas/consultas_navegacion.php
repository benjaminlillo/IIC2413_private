<?php include('../templates/header.html');   ?>
<!-- aqui va a estar la consulta 1 de navegacion -->
<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $id = $_GET['id'];
  $query = "SELECT nid, nombre FROM Naviera WHERE nid = $id;";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

  <table>
    <tr>
    <th>ID naviera</th>
      <th>NOMBRE</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
