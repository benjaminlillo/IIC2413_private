<?php include('templates/header.html');   ?>
<?php
  $id = $_GET["id"];
  include('info_id.php');
  $vars = get_params($id);
  print_r($vars)
?>


<body>
  <h1 align="center"> Entrega 3 - grupos 2 y nose </h1>
  <p style="text-align:center;"> Inicio </p>

  <br>

  <!--Listado de navieras-->
  <h3 align="center"> Navieras </h3>


  <h3 align="center"> Puertos </h3>

  


  
  <table>
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

  <br>
  <br>
  <br>
  <br>
</body>
</html>
