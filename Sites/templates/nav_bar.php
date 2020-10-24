<?php $titulo = $_PHP_SELF ?>
<head>
  <link rel="stylesheet" href="css/fondo.css">
</head>
<body>
<nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item title is-4">
        Cochrane Ports
      </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
        <div id='titulo' class='navbar-item center'>
          <a>titulo</a> 
        </div>
        <div class="navbar-item">
        <form action="<?php $_PHP_SELF ?>" method="post"> 
          <input class="button is-link" type="submit" name="boton_inicio" value="Inicio">
        </form>
        </div>

        <div class="navbar-item">
          <form action="<?php $_PHP_SELF ?>" method="post"> 
            <input class="button is-link" type="submit" name="boton_miperfil" value="Mi Perfil">
          </form>
        </div>

        
      </div>


      <div class="navbar-end">
        <div class="navbar-item">
          <form action="<?php $_PHP_SELF ?>" method="post">
          <!-- por implementar -->
            <input class="button is-primary" type="submit" name="boton_registrar" value="Registrarse">
          </form>
        </div>
        <div class="navbar-item">
          <form action="./login.php" method="post"> 
            <input class="button is-light" type="submit" name="boton_cerrar_sesion" value="Cerrar Sesión">
          </form>
        </div>
      </div>
    </div>
  </nav>