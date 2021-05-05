<div class="fondo login-page">
  <div class="login-box">

    <div class="card card-outline card-secondary">
      <div class="login-logo">
        <img src="views/icons/logo-sti.png" class="img-responsive" style="padding:30px 50px 0px 50px">
      </div>
      <div class="card-body">
        <p class="login-box-msg font-weight-bold h5 text-secondary">Soporte Técnico Web - HNSEB</p>

        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Ingrese usuario" name="logCuenta" id="logCuenta">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Ingrese contraseña" name="logClave" id="logClave">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-key"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8 ml-5">
              <button type="submit" class="btn btn-secondary btn-block btn-flat rounded">Ingresar</button>
            </div>
          </div>
        </form>
        <?php
        $logUser = new ControladorUsuarios();
        $logUser->ctrLoginUsuario();
        ?>
      </div>
    </div>
  </div>
</div>