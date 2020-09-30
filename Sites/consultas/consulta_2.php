<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $naviera = $_POST["nombre_naviera"];
  $query = "SELECT buque.bid, buque.nombre, buque.patente, buque.pais FROM buque, (SELECT pertenece.bid FROM naviera, pertenece WHERE naviera.nid = pertenece.nid AND LOWER(naviera.nombre) LIKE LOWER('%$naviera%')) AS naviera_buscada WHERE buque.bid = naviera_buscada.bid";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

  <table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Patente</th>
      <th>Pais</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> </tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
