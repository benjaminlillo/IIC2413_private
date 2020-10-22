<?php include('templates/header.html');   ?>

<body>
  <h1 align="center"> Entrega 3 - grupos 2 y nose </h1>
  <p style="text-align:center;"> Inicio </p>

  <br>

  <!--Listado de navieras-->
  <h3 align="center"> Navieras </h3>

  <?php
  require("config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  $query = "SELECT nid, nombre FROM Naviera;";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

  <h3 align="center"> Puertos </h3>




  <!-- <table>
    <tr>
    <th>ID</th>
      <th>NOMBRE</th>
    </tr>
  <?php
  // foreach ($dataCollected as $p) {
  //   echo "<tr> <td>$p[0]</td> <td>$p[1]</td>";
  // }
  ?>
  </table> -->
  <table>
    <tr>
      <th>ID</th>
      <th>NOMBRE</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td> $p[0] </td> <td> <a href='./consultas/consultas_navieras.php?id=" . $p[0] . "' > $p[1] </a> </td>";
  }
  ?>
  </table>

  <br>
  <br>
  <br>
  <br>
</body>
</html>