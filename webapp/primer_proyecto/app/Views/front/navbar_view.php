<?php
$session = session();
$nombre = $session->get('nombre');
$perfil = $session->get('perfil_id');

?>

<nav class="navbar navbar-expand-lg bg-success">
  <div class="container-fluid">
    <a class="navbar-brand me-auto" href="<?= base_url('principal') ?>">
      <img src="<?= base_url('assets/img/logo_navbar.png') ?>" alt="marca" width="75" height="30" class="img-fluid" />
    </a>
    <style>
      .nav-link-active-text-dark {
        font-weight: bold;
      }
    </style>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if ($perfil == 1): ?> <!-- Elementos para el perfil de ADMIN -->
          <div class="btn btn-secondary active btnUser btn-sm">
            <a href="">ADMIN: <?= $nombre ?></a>
          </div>

          <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url('catalogo') ?>">Catálogo</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url('logout') ?>">Cerrar Sesión</a>
        </li>

          
      <?php elseif ($perfil == 2): ?> <!-- Elementos para el perfil de CLIENTE -->
        <div class="btn btn-secondary active btnUser btn-sm">
          <a href="">CLIENTE: <?= $nombre ?></a>
        </div>
        

        <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url('catalogo') ?>">Catálogo</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url('logout') ?>">Cerrar Sesión</a>
        </li>

        
        <?php else: ?> <!-- Elementos para usuarios no registrados -->
          <li class="nav-item">
            <a class="nav-link active text-dark" aria-current="page" href="<?= base_url('principal') ?>">Principal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-dark" aria-current="page" href="<?= base_url('quienes_somos') ?>">Quiénes Somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="<?= base_url('acerca_de') ?>">Acerca de</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark" href="registro" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Registro
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?= base_url('registrarse') ?>">Registrarse</a></li>
              <li><a class="dropdown-item" href="<?= base_url('user_login') ?>">Login</a></li>
              <li><a class="dropdown-item" href="<?= base_url('logout') ?>" tabindex="-1" aria-disabled="true">Cerrar Sesión</a></li>
            </ul>
          </li>
        <?php endif; ?>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Ingresa tu búsqueda" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>
