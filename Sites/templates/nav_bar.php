<?php $titulo = $_PHP_SELF ?>
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
          <div class="buttons">
            <a class="button is-primary">
              <strong>Sign up</strong>
            </a>
            <a class="button is-light">
              Log in
            </a>
          </div>
        </div>
      </div>
    </div>
  </nav>