<div class="fondo login-page">
  <div class="login-box">
    <div class="login-logo">
      <img src="views/icons/logo-sti.png" class="img-responsive" style="padding:30px 100px 0px 100px">
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg font-weight-bold h5">Ingresar al Sistema</p>

        <form method="post">
          <div class="input-group mb-3 has-feedback">
            <input type="text" class="form-control" name="logCuenta" id="logCuenta" placeholder="Ingrese su usuario" autocomplete="off" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="logClave" placeholder="Ingrese su contraseña" autocomplete="off" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-key"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8 ml-5">
              <button type="submit" class="btn btn-secondary btn-block btn-flat">Iniciar Sesión</button>
            </div>
          </div>
        </form>
        <?php
      $prueba = new ControladorUsuarios();
      $prueba -> ctrLoginUsuario();
        ?>
      </div>
    </div>
  </div>
</div>