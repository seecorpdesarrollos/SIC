<?php if ($_SESSION['rol']  == 'A'): ?>
  
<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse nav">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="inicio">Sistema</a>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav" >
      <li class="nav-item active">
        <a class="nav-link" href="categorias" id="cate">Categorías <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="nosotros">Nosotros</a>
      </li>
     <li class="nav-item soporte active">
          <a class="nav-link animated " href="https://diegopennisi.es/" target="_blanck">Soporte</a>
        </li>
       <li class="nav-item dropdown navbar-toggler-right active">
          <a class="nav-link dropdown-toggle animated bounceInDown" href="config" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="usu"><i class="fa fa-user"></i></span>
          <?php echo strtoupper($_SESSION['nombreAdmin']); ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="sesion"><i class="fa fa-close"></i> Salir</a>
            <a class="dropdown-item" href="config"><i class="fa fa-gear"></i> Configuración</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
    </ul>
  </div>
</nav>
<?php else: ?>

  <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="inicioUs">Sistema</a>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="categorias">Categorías <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="nosotros">Nosotros</a>
      </li>
    <!-- -->
       <li class="nav-item dropdown navbar-toggler-right active">
          <a class="nav-link dropdown-toggle animated bounceInDown" href="https://diegopennisi.es" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="usu"><i class="fa fa-user"></i></span>
          <?php echo strtoupper($_SESSION['nombreAdmin']); ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="sesion"><i class="fa fa-close"></i> Salir</a>
         </div>
        </li>
    </ul>
  </div>
</nav>
<?php endif ?>