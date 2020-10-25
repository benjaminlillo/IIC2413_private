<?php
  $titulo = "Inicio";
  include('templates/header.html');
  include('templates/nav_bar.php');
?>
<?php
  $id = $_GET["id"];
  include('info_id.php');
  $vars = get_params($id);
?>

  <br>
  <!-- <nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
    <div align="center">
      <?php 
      // echo "<div> <h2 class='title' align='center'>" . $vars['nombre'] . "</h2> </div>";
      ?>
      <br>
      <div>
      <form action="<?php $_PHP_SELF ?>" method="post">
        <input class="button is-link" type="submit" name="boton_perfil" value="Mi Perfil">
      </form>
      </div>
    </div>
  </nav> -->
  <?php
  if(isset($_POST['boton_miperfil']))
  {
    echo "<script> location.href='./profile.php?id=" .$id. "'; </script>";
    exit;
  }
  ?>
  <br>
  <br>
  <br>
    <div class='columns is-mobile is-multiline is-centered'>
      <div class="column is-1"></div>

      <div class='column box'>
        <h3 align='center' class='title'>Navieras</h3>
        <div>
          <table align='center' class="table">
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
            echo "<tr> <td> $p[0] </td> <td> <a href='./consultas/consultas_navieras.php?id=" . $id . "&id_naviera=" . $p[0] . "'> $p[1] </a> </td>";
          }
          ?>
          </table>
        </div>
      </div>

      <div class="column is-1"></div>

      <div class='column box'>
        <h3 align='center' class='title'>Puertos</h3>
        <div>
          <table align='center' class="table">
            <tr>
              <th>ID</th>
              <th>NOMBRE</th>
            </tr>
          <?php
          require("config/conexion_129.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
          $query = "SELECT ppid, nombre_puerto FROM Puerto;";
          $result = $db -> prepare($query);
          $result -> execute();
          $dataCollected = $result -> fetchAll();
          foreach ($dataCollected as $p) {
            echo "<tr> <td> $p[0] </td> <td> <a href='./consultas/consultas_puertos.php?id=" . $id . "&id_puerto=" . $p[0] . "'> $p[1] </a> </td>";
          }
          ?>
          </table>
        </div>
      </div>

      <div class="column is-1"></div>
    </div>
  </div>
<?php include("templates/footer.html") ?>
