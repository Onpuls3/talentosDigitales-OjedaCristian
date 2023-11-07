<div class="container mt-0 mb-0">
<div class="card-header text-justify">
<div class="row d-flex justify-content-center">
<div class="card col-lg-3" style="width: 50%;">
<br>
<h1>Iniciar sesion</h1>
    

  <?php if(session()->getFlashdata('msg')):?>
    <div class="alert alert-warning">
      <?= session()->getFlashdata('msg'); ?> <!-- Mostrar el mensaje flash aquí -->
    </div>
  <?php endif; ?> 
  <form method="post" action="<?php echo base_url('/enviar-user_login')?>">

  <div class="card-body justify-content center" media="(max-width:768px)">
  <div class="mb-2">
      <label for="exampleInputEmail1" class="form-label">Correo electrónico</label>
      <input name="email" type="email" class="form-control" placeholder="correo electronico"> <!-- Agregar el atributo name para identificar el campo en PHP -->
      <div id="emailHelp" class="form-text">Nunca compartiremos tu correo electrónico con nadie más.</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Contraseña</label>
        <input name="password" type="password" class="form-control" placeholder="contraseña"> <!-- Agregar el atributo name para identificar el campo en PHP -->
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember"> <!-- Agregar el atributo name para identificar el checkbox en PHP -->
      <label class="form-check-label" for="exampleCheck1">Recuérdame</label>
    </div>
    <input type="submit" value="Ingresar" class="btn btn-success">
    <a href="<?php echo base_url('user_login'); ?>" class="btn btn-danger">Cancelar</a>
    <br><span>¿Aun no se registro?<a href="<?php echo base_url('/registrarse'); ?>">Registrarse aqui</a></span>
  </form>
</div>
</div>
</div>
</div>
