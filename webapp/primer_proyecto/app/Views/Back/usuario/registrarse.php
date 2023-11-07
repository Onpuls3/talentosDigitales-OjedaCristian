<div class="container mt-0 mb-0">
    <div class="card-header text-justify">
        <div class="row d-flex justify-content-center">
            <div class="card col-lg-3" style="width: 50%;">
                <br>

                <?php $validation = \Config\Services::validation(); ?>

                <form method="post" action="<?php echo base_url('/enviar-form')?>">

                    <?= csrf_field(); ?>
                    <?= csrf_field(); ?>

                    <?php if (!empty(session()->getFlashdata('fail'))): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                    <?php endif ?>

                    <?php if (!empty(session()->getFlashdata('success'))): ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                    <?php endif ?>

                    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 50vh;">
                        <h1>Registro</h1>

                        <label for="nombre">Nombre</label>
                        <input name="nombre" type="text" class="form-control" placeholder="Nombre" required>
                        <?php if($validation->getError('nombre')): ?>
                            <div class="alert alert-danger mt-2">
                                <?= $validation->getError('nombre'); ?>
                            </div>
                        <?php endif ?>
                        <br>

                        <label for="apellido">Apellido</label>
                        <input name="apellido" type="text" class="form-control" placeholder="Apellido">
                        <?php if($validation->getError('apellido')): ?>
                            <div class="alert alert-danger mt-2">
                                <?= $validation->getError('apellido'); ?>
                            </div>
                        <?php endif ?>
                        <br>

                        <label for="username">Usuario</label>
                        <input name="username" type="text" class="form-control" placeholder="Usuario" required>
                        <?php if($validation->getError('username')): ?>
                            <div class="alert alert-danger mt-2">
                                <?= $validation->getError('username'); ?>
                            </div>
                        <?php endif ?>
                        <br>

                        <label for="email">Email</label>
                        <input name="email" type="email" class="form-control" placeholder="correo@algo.com" required>
                        <?php if($validation->getError('email')): ?>
                            <div class="alert alert-danger mt-2">
                                <?= $validation->getError('email'); ?>
                            </div>
                        <?php endif ?>
                        <br>

                        <label for="password">Contraseña</label>
                        <input name="password" type="password" class="form-control" placeholder="Contraseña" required>
                        <?php if($validation->getError('password')): ?>
                            <div class="alert alert-danger mt-2">
                                <?= $validation->getError('password'); ?>
                            </div>
                        <?php endif ?>
                        <br>

                        <input type="submit" value="Ingresar" class="btn btn-success">
                        <a href="<?php echo base_url('user_login'); ?>" class="btn btn-danger">Cancelar</a>
                        <br>
                        <span>¿Aun no se registro?<a href="<?php echo base_url('/registrarse'); ?>">Registrarse aqui</a></span>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>