<head><title>Mi perfil</title></head>
<?php
  $titulo = "Perfil";
  include('templates/header.html');
  include('templates/nav_bar.php');
?>
<?php
  $id = $_GET["id"];
  include('info_id.php');
  $vars = get_params($id);
  $status = $_GET['status']
?>

<body>

<br>
<br>
<br>
<br>
<!-- PARA TODOS -->
<div class='columns is-mobile is-multiline is-centered'>
  <div class='column is-2'></div>
  <div class='column'>
    <div class='box'>
      <h3 align='center' class='title'>Información Personal</h3>
      <table class="table" align="center">
        <tr>
          <th>ID</th>
          <th>NOMBRE</th>
          <th>EDAD</th>
          <th>SEXO</th>
          <th>PASAPORTE</th>
          <th>NACIONALIDAD</th>
        </tr>
        <tr>
          <td> <?php echo $id ?> </td>
          <td> <?php echo $vars["nombre"] ?> </td>
          <td> <?php echo $vars["edad"] ?> </td>
          <td> <?php echo $vars["sexo"] ?> </td>
          <td> <?php echo $vars["pasaporte"] ?> </td>
          <td> <?php echo $vars["nacionalidad"] ?> </td>
        </tr>
      </table>
      <div align='center'>
        <form action="<?php $_PHP_SELF ?>" method="post">
          <input class='button is-link' type='submit' name='boton_cambiar_clave' value='Cambiar contraseña'>
        </form>
        <?php if($status == 'cambio_clave'){
        echo "<h4 class='subtitle is-5'> Contraseña cambiada </h4>";
        }
        ?>
      </div>
    </div>
<?php
  if($vars["tipo"] == "capitan"){
    require("config/conexion_2.php");
    $pasaporte = $vars["pasaporte"];

    // personalid
    $query = "SELECT personalid FROM Personal WHERE pasaporte = '$pasaporte';";
    $result = $db -> prepare($query);
    $result -> execute();
    $return = $result -> fetchAll();
    $personalid = $return[0]["personalid"];

    // su buque: bid
    $query = "SELECT bid FROM Capitanes WHERE personalid = '$personalid';";
    $result = $db -> prepare($query);
    $result -> execute();
    $return = $result -> fetchAll();
    $bid = $return[0]["bid"];


    // tipo de buque: tipo_buque
    $query = "SELECT tipo FROM tipos WHERE bid = $bid;";
    $result = $db -> prepare($query);
    $result -> execute();
    $return = $result -> fetchAll();
    $tipo_buque = $return[0]["tipo"];
    //print_r($tipo_buque);

    // nombre y patente buque
    $query = "SELECT patente, nombre FROM buque WHERE bid = $bid;";
    $result = $db -> prepare($query);
    $result -> execute();
    $return = $result -> fetchAll();
    $patente_buque = $return[0]["patente"];
    $nombre_buque = $return[0]["nombre"];
  
    // nombre naviera
    $query = "SELECT nombre FROM pertenece, naviera WHERE pertenece.bid = $bid AND naviera.nid = pertenece.nid;";
    $result = $db -> prepare($query);
    $result -> execute();
    $return = $result -> fetchAll();
    $nombre_naviera = $return[0]["nombre"];

    // proximo itinerario
    $query = "SELECT fecha_atraque, fecha_salida FROM historial, atraque WHERE historial.bid = $bid AND atraque.aid = historial.aid ORDER BY fecha_atraque ASC;";
    $result = $db -> prepare($query);
    $result -> execute();
    $return = $result -> fetchAll();
    $return = $return;
    $prox_itinerario = "";
    $atraques_antiguos = array();
    // proximo
    foreach ($return as $p) {

      $aux = array_search("", $p);
      if($aux == "fecha_salida"){
        $prox_itinerario = $p['fecha_atraque'];
        break;
      }
      array_push($atraques_antiguos, $p);
    }
 

    $atraques_antiguos = array_slice($atraques_antiguos, - 5);
    echo "
          <div class='box'>
            <h3 align='center' class='title'>Capitán</h3>
            <h3 align='center' class='title is-5'>Buque y Naviera</h3>
            <div>
              <table align='center' class='table'>
                <tr>
                  <th>PATENTE</th>
                  <th>NOMBRE BUQUE</th>
                  <th>TIPO BUQUE</th>
                  <th>NOMBRE NAVIERA</th>
                  <th>PROX ITINERARIO</th>
                </tr>
                <tr>
                  <td> $patente_buque </td>
                  <td> $nombre_buque </td>
                  <td> $tipo_buque </td>
                  <td> $nombre_naviera </td>
                  <td> $prox_itinerario </td>
                </tr>
              </table>
            </div>
          </div>";
?>
      <div class='box'>
      <h3 align='center' class='title'>Crear próximo itinerario</h3>
        <form action='<?php $_PHP_SELF ?>' method='post'>
          <label class='label'>Fecha de llegada</label>
          <input class='input' type='date' name='Fecha' required>
          <label class='label'>Nombre próximo puerto</label>
          <input class='input' type='text' name='Puerto' required>
          <br>
          <br>
          <input class='button is-link' type='submit' name='boton_itinerario'>
        </form>
      </div>
<?php
    echo "
          <div class='box'>
            <h3 align='center' class='title'>Atraques Pasados</h3>
            <div>
              <table align='center' class='table'>
                <tr>
                  <th> FECHA LLEGADA </td>
                  <th> FECHA SALIDA </td>
                </tr>
              ";     

    foreach ($atraques_antiguos as $a){
      $aux1 = $a['fecha_atraque'];
      $aux2 = $a['fecha_salida'];
      echo "<tr>
        <td> $aux1  </td>
        <td> $aux2 </td>
      </tr>";
    }
    echo "
    </table>
    </div>
    </div>";
          
  
  }
?>

<?php
  if($vars["tipo"] == "jefe"){

    $pasaporte = $vars['pasaporte'];
    $nombre = $vars['nombre'];

    require("config/conexion_129.php");
    $query = "SELECT * FROM personal WHERE rut='$pasaporte';";
    $result = $db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll();
    $dataCollected = $dataCollected[0];
    $iid = $dataCollected['iid'];

    $query = "SELECT * FROM instalaciones WHERE iid=$iid;";
    $result = $db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll();
    $dataCollected = $dataCollected[0];
    $tipo_instalacion = $dataCollected['tipo_instalacion'];
    $ppid = $dataCollected['ppid'];

    $query = "SELECT * FROM puerto WHERE ppid=$ppid;";
    $result = $db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll();
    $dataCollected = $dataCollected[0];
    $nombre_puerto = $dataCollected['nombre_puerto'];
    $ciudad_puerto = $dataCollected['ciudad_puerto'];

    echo "
      <div class='box'>
        <h3 align='center' class='title'>Jefe</h3>
        <h3 align='center' class='title is-5'>Puerto e instalación</h3>
        <div>
          <table align='center' class='table'>
            <tr>
              <th>NOMBRE JEFE</th>
              <th>NOMBRE PUERTO</th>
              <th>CIUDAD PUERTO</th>
              <th>ID PUERTO</th>
              <th>TIPO INSTALACIÓN</th>
              <th>ID INSTALACIÓN</th>
            </tr>
            <tr>
              <td> $nombre </td>
              <td> $nombre_puerto </td>
              <td> $ciudad_puerto </td>
              <td> $ppid </td>
              <td> $tipo_instalacion </td>
              <td> $iid </td>
            </tr>
          </table>
        </div>
      </div>";
    
  }
?>
<?php if(isset($_POST['boton_inicio']))
{
  echo "<script> location.href='./home.php?id=" .$id. "'; </script>";
  exit;
}

  if(isset($_POST['boton_itinerario']))
{
  $fecha = $_POST['Fecha'];
  $puerto = $_POST['Puerto'];
  echo "<script> location.href='consultas/generar_proximo_itinerario.php?id=" .$id. "&bid=" .$bid. "&fecha=" .$fecha. "&puerto=" .$puerto. "'; </script>";
  
  exit;
}

if(isset($_POST['boton_cambiar_clave']))
{
  echo "<script> location.href='./cambiar_clave.php?id=" .$id. "'; </script>";
  
  exit;
}

?>
</div> <!-- </div> cierre de column -->
<div class='column is-2'></div>
</div>
<?php include("templates/footer.html") ?>
