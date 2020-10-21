<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $puerto = $_POST["nombre_puerto"];
  $query = "SELECT * FROM personal NATURAL JOIN trabajaen NATURAL JOIN (SELECT buque.bid, atraque.puerto FROM buque NATURAL JOIN historial NATURAL JOIN atraque WHERE LOWER(atraque.puerto) LIKE LOWER('%$puerto%')) AS pasaron_puerto WHERE personal.genero = 'mujer'";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

  <table>
    <tr>
      <th>Nombre buque</th>
      <th>ID buque</th>
      <th>Patente</th>
      <th>País</th>
      <th>Nombre puerto</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> </tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
