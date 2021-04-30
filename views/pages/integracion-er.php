<?php
if ($_SESSION["perfil"] != 1 && $_SESSION["perfil"] != 3 && $_SESSION["perfil"] != 4) {
  echo '<script>
    window.location = "dashboard";
  </script>';
  return;
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4><strong>Integración de Equipos:. Redes y Telecomunicaciones</strong></h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Consolidación</a></li>
            <li class="breadcrumb-item active">Redes y Telecomunicaciones</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-server"></i>
          Integración de Equipos de Redes y Telecomunicaciones
        </h3>
      </div>
      <div class="card-body">
        <button type="btn" class="btn btn-secondary mt-2" data-toggle="modal" data-target="#modal-integra-er"><i class="fas fa-server"></i> Registrar Integración</button>
        <input type="hidden" id="pIntROculto" value="<?php echo $_SESSION["perfil"] ?>">
      </div>
      <div class="card-body">
        <table id="tablaIntegraER" class="table table-bordered table-hover dt-responsive tablaIntegraER">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th style="width: 10px">Correlativo</th>
              <th style="width: 10px">F.Registro</th>
              <th style="width: 10px">T.Equipo</th>
              <th>N° Equipo</th>
              <th>Marca</th>
              <th>Serie</th>
              <th style="width: 10px">IP</th>
              <th>Usuario Responsable</th>
              <th>Departamento/Oficina</th>
              <th>Servicio/Área</th>
              <th>Opciones</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section>
</div>
<!-- Registrar Integración de Eq de Red -->
<div id="modal-integra-er" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="" role="form" id="formRegIntR" method="post">
        <div class="modal-header text-center" style="background: #6c757d; color: white">
          <h4 class="modal-title">Registrar Switch, Módem, Router, etc</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="fechita4">Fecha de Registro &nbsp;</label>
                <i class="fas fa-calendar-alt"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" readonly value="
              <?php
              date_default_timezone_set('America/Lima');
              $fechaActual2 = date('d-m-Y');
              echo $fechaActual2; ?>
                " id="fechita4" name="fechita4">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="tEqRed">Tipo de Equipo &nbsp;</label>
                <i class="fas fa-th"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="tEqRed" name="tEqRed">
                    <option value="0">Seleccione tipo</option>
                    <?php
                    $cat3 = ControladorCategorias::ctrListarCategoriaRedes();
                    foreach ($cat3 as $key => $value) {
                      echo '<option value="' . $value["idCategoria"] . '">' . $value["categoria"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="nroERed">N° de Equipo &nbsp;</label>
                <i class="fas fa-hashtag"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" autocomplete="off" id="nroERed" name="nroERed" maxlength="8" placeholder="Ingrese N°de Eq. de Red" required>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="ipERed">IP &nbsp;</label>
                <i class="fas fa-network-wired"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask autocomplete="off" placeholder="Ingrese IP (Opcional)" id="ipERed" name="ipERed">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-12">
              <div class="form-group">
                <label for="serieERed">SWITCH, ROUTER, MÓDEM, ETC &nbsp;</label>
                <i class="fas fa-laptop-code"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="serieERed" name="serieERed">
                    <option value="0">Seleccione N° Serie de Eq. de Red</option>
                    <?php
                    $sImp = ControladorIntegracion::ctrListarSeriesRed();
                    foreach ($sImp as $key => $value) {
                      echo '<option value="' . $value["idEquipo"] . '">' . $value["serie"] . '</option>';
                    }
                    ?>
                    <input type="hidden" id="erResp" name="erResp">
                    <input type="hidden" id="erOfi" name="erOfi">
                    <input type="hidden" id="erServ" name="erServ">
                    <input type="hidden" id="erEst" name="erEst">
                    <input type="hidden" id="erCond" name="erCond">
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-secondary" id="btnRegIntR"><i class="fas fa-save"></i> Guardar</button>
          <button type="reset" class="btn btn-danger"><i class="fas fa-eraser"></i> Limpiar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
        </div>
        <?php
        $regIntER = new ControladorIntegracion();
        $regIntER->ctrRegistrarIntegracionR();
        ?>
      </form>
    </div>
  </div>
</div>
<!-- Registrar Integración de Eq de Red-->
<!-- Editar Integración de Eq de Red-->
<div id="modal-editar-integraER" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="" role="form" id="formEdtIntR" method="post">
        <div class="modal-header text-center" style="background: #6c757d; color: white">
          <h4 class="modal-title">Editar Switch, Módem, Router, etc</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="fechita5">Fecha de Registro &nbsp;</label>
                <i class="fas fa-calendar-alt"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" readonly value="
              <?php
              date_default_timezone_set('America/Lima');
              $fechaActual2 = date('d-m-Y');
              echo $fechaActual2; ?>
                " id="fechita5" name="fechita5">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="edtEqRed1">Tipo de Equipo &nbsp;</label>
                <i class="fas fa-th"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="edtEqRed1" name="edtEqRed">
                    <option id="edtEqRed"></option>
                    <?php
                    $cat34 = ControladorCategorias::ctrListarCategoriaRedes();
                    foreach ($cat34 as $key => $value) {
                      echo '<option value="' . $value["idCategoria"] . '">' . $value["categoria"] . '</option>';
                    }
                    ?>
                    <input type="hidden" name="idIntegracion" id="idIntegracion">
                    <input type="hidden" name="nroAnt3" id="nroAnt3">
                    <input type="hidden" name="ipAnt3" id="ipAnt3">
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="edtnroERed">N° de Equipo &nbsp;</label>
                <i class="fas fa-hashtag"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" autocomplete="off" id="edtnroERed" name="edtnroERed" maxlength="8" required>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="edtipERed">IP &nbsp;</label>
                <i class="fas fa-network-wired"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask autocomplete="off" placeholder="Ingrese IP (Opcional)" id="edtipERed" name="edtipERed">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-12">
              <div class="form-group">
                <label for="edtserieERed1">SWITCH, ROUTER, MÓDEM, ETC &nbsp;</label>
                <i class="fas fa-laptop-code"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="edtserieERed1" name="edtserieERed">
                    <option id="edtserieERed"></option>
                    <?php
                    $sER = ControladorIntegracion::ctrListarSeriesRed();
                    foreach ($sER as $key => $value) {
                      echo '<option value="' . $value["idEquipo"] . '">' . $value["serie"] . '</option>';
                    }
                    ?>
                    <input type="hidden" id="edtResp" name="edtResp">
                    <input type="hidden" id="edtOfi" name="edtOfi">
                    <input type="hidden" id="edtServ" name="edtServ">
                    <input type="hidden" id="edtEst" name="edtEst">
                    <input type="hidden" id="edtCond" name="edtCond">
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-secondary" id="btnEdtIntR"><i class="fas fa-save"></i> Guardar</button>
          <button type="reset" class="btn btn-danger"><i class="fas fa-eraser"></i> Limpiar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
        </div>
        <?php
        $regIntER = new ControladorIntegracion();
        $regIntER->ctrEditarIntegracionR();
        ?>
      </form>
    </div>
  </div>
</div>
<!-- Editar Integración de Eq de Red-->
<?php
$anulaER = new ControladorIntegracion();
$anulaER->ctrAnularIntegracionR();
?>