<?php include('templates/header.html');   ?>

<body>
  <h1 align="center"> Entrega 2 - grupo 2 </h1>
  <p style="text-align:center;"> Consultas </p>

  <br>

  <h2 align="center"> Pendiente: </h1>
  <p style="text-align:center;"> Consultas </p>
  <p style="text-align:center;"> Que las consultas entreguen un link de ruta relativa </p>

  <br>

  #consulta 1
  <h3 align="center"> Mostrar el nombre de todas las navieras </h3>

  <form align="center" action="consultas/consulta_1.php" method="post">
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  #consulta 2
  <h3 align="center"> Mostrar todos los buques de una naviera </h3>

  <form align="center" action="consultas/consulta_2.php" method="post">
    Nombre de la naviera:
    <input type="text" name="nombre_naviera">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  #consulta 3
  <h3 align="center"> Mostrar todos los buques que hayan atracado en un puerto</h3>

  <form align="center" action="consultas/consulta_3.php" method="post">
    Nombre del puerto:
    <input type="text" name="nombre_puerto">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  #consulta 4
  <h3 align="center"> Mostrar todos los buques que hayan estado en un puerto al mismo tiempo que otro buque </h3>

  <form align="center" action="consultas/consulta_4.php" method="post">
    Nombre del puerto:
    <input type="text" name="nombre_puerto">
    <br/><br/>
    Nombre del buque:
    <input type="text" name="nombre_buque">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  #consulta 5
  <h3 align="center"> Mostrar todos los capitanes mujeres que han pasado por un puerto </h3>

  <form align="center" action="consultas/consulta_5.php" method="post">
    Nombre del puerto:
    <input type="text" name="nombre_puerto">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  #consulta 6
  <h3 align="center"> Mostrar el buque pesquero que tiene más personas trabajando </h3>

  <form align="center" action="consultas/consulta_6.php" method="post">
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  <br>
  <br>
  <br>
  <br>
</body>
</html>
