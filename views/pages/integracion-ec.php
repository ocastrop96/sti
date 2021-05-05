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
          <h4><strong>Integración de Equipos:. PC/Laptop/Servidor</strong></h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Consolidación</a></li>
            <li class="breadcrumb-item active">PC/LAPTOP/SERVIDOR</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-desktop"></i>
          Integración de Equipos de Cómputo
        </h3>
      </div>
      <div class="card-body">
        <button type="btn" class="btn btn-secondary mt-2" data-toggle="modal" data-target="#modal-integra-ec"><i class="fas fa-desktop"></i> Registrar Integración</button>
        <input type="hidden" id="pIntCOculto" value="<?php echo $_SESSION["perfil"] ?>">
      </div>
      <div class="card-body">
        <table id="tablaIntegraEC" class="table table-bordered table-hover dt-responsive tablaIntegraEC">
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
<!-- Registrar Integración de Equipo de Computo -->
<div id="modal-integra-ec" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="" role="form" id="formRegIntC" method="post">
        <div class="modal-header text-center" style="background: #6c757d; color: white">
          <h4 class="modal-title">Registrar Integración de PC/LAPTOP/SERVIDOR</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="fechita">Fecha de Registro &nbsp;</label>
                <i class="fas fa-calendar-alt"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" readonly value="<?php date_default_timezone_set('America/Lima');
                                                                          $fechaActual = date('d-m-Y');
                                                                          echo $fechaActual; ?>" id="fechita" name="fechita">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="tipEq">Tipo de Equipo &nbsp;</label>
                <i class="fas fa-th"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="tipEq" name="tipEq">
                    <option value="0">Seleccione tipo</option>
                    <?php
                    $cat1 = ControladorCategorias::ctrListarCategoriaComputo();
                    foreach ($cat1 as $key => $value) {
                      echo '<option value="' . $value["idCategoria"] . '">' . $value["categoria"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="nroEquipo">N° de Equipo &nbsp;</label>
                <i class="fas fa-hashtag"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" autocomplete="off" id="nroEquipo" name="nroEquipo" maxlength="15" placeholder="Ingrese N° de PC" required>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="ip_comp">IP &nbsp;</label>
                <i class="fas fa-network-wired"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask autocomplete="off" placeholder="Ingrese IP del Equipo" id="ip_comp" name="ip_comp">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2 d-none" id="bloquePC">
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="seriePC">PC &nbsp;</label>
                <i class="fas fa-laptop-code"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="seriePC" name="seriePC">
                    <option value="0">Seleccione PC</option>
                    <?php
                    $sPC = ControladorIntegracion::ctrListarSeriesPC();
                    foreach ($sPC as $key => $value) {
                      echo '<option value="' . $value["idEquipo"] . '">' . $value["serie"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="serieMon">Monitor &nbsp;</label>
                <i class="fas fa-desktop"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="serieMon" name="serieMon">
                    <option value="0">Seleccione Monitor</option>
                    <?php
                    $sMon = ControladorIntegracion::ctrListarSeriesMon();
                    foreach ($sMon as $key => $value) {
                      echo '<option value="' . $value["idEquipo"] . '">' . $value["serie"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="serieTec">Teclado &nbsp;</label>
                <i class="fas fa-keyboard"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="serieTec" name="serieTec">
                    <option value="0">Seleccione Teclado</option>
                    <?php
                    $sTec = ControladorIntegracion::ctrListarSeriesTec();
                    foreach ($sTec as $key => $value) {
                      echo '<option value="' . $value["idEquipo"] . '">' . $value["serie"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="serieAcuEne">Energía&nbsp;</label>
                <i class="fas fa-charging-station"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="serieAcuEne" name="serieAcuEne">
                    <option value="0">Seleccione F. Energía</option>
                    <?php
                    $sFuen = ControladorIntegracion::ctrListarSeriesEnergia();
                    foreach ($sFuen as $key => $value) {
                      echo '<option value="' . $value["idEquipo"] . '">' . $value["serie"] . '</option>';
                    }
                    ?>
                    <input type="hidden" id="datResp" name="datResp">
                    <input type="hidden" id="datOfi" name="datOfi">
                    <input type="hidden" id="datServ" name="datServ">
                    <input type="hidden" id="datEst" name="datEst">
                    <input type="hidden" id="datCond" name="datCond">
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2 d-none" id="bloqueLapServ">
            <div class="col-12 col-md-12">
              <div class="form-group">
                <label for="serieLaptop">LAPTOP O SERVIDOR &nbsp;</label>
                <i class="fas fa-laptop-code"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="serieLaptop" name="serieLaptop">
                    <option value="0">Selecciona Servidor o Laptop</option>
                    <?php
                    $sLap = ControladorIntegracion::ctrListarSeriesLapServ();
                    foreach ($sLap as $key => $value) {
                      echo '<option value="' . $value["idEquipo"] . '">' . $value["serie"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-secondary" id="btnRegIntC"><i class="fas fa-save"></i> Guardar</button>
          <button type="reset" class="btn btn-danger"><i class="fas fa-eraser"></i> Limpiar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
        </div>
        <?php
        $regInt1 = new ControladorIntegracion();
        $regInt1->ctrRegistrarIntegracionC();
        ?>
      </form>
    </div>
  </div>
</div>
<!-- Registrar Integración de Equipo de Computo-->

<!-- Editar -->
<div id="modal-editar-integraC" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="" role="form" id="formEdtIntC" method="post">
        <div class="modal-header text-center" style="background: #6c757d; color: white">
          <h4 class="modal-title">Editar Integración de PC/LAPTOP/SERVIDOR</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtTip1">Tipo de Equipo &nbsp;</label>
                <i class="fas fa-th"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="edtTip1" name="edtTip">
                    <option id="edtTip"></option>
                    <?php
                    $cat12 = ControladorCategorias::ctrListarCategoriaComputo();
                    foreach ($cat12 as $key => $value) {
                      echo '<option value="' . $value["idCategoria"] . '">' . $value["categoria"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtNEquipo">N° de Equipo &nbsp;</label>
                <i class="fas fa-hashtag"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" autocomplete="off" id="edtNEquipo" name="edtNEquipo" maxlength="15" required>
                  <input type="hidden" name="idIntegracion" id="idIntegracion">
                  <input type="hidden" name="nroAnt" id="nroAnt">
                  <input type="hidden" name="ipAnt" id="ipAnt">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="idIp">IP &nbsp;</label>
                <i class="fas fa-network-wired"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask autocomplete="off" id="idIp" name="idIp">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2 d-none" id="bloquePC2">
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="edtSeriePC1">PC &nbsp;</label>
                <i class="fas fa-laptop-code"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="edtSeriePC1" name="edtSeriePC">
                    <option id="edtSeriePC"></option>
                    <?php
                    $sPC2 = ControladorIntegracion::ctrListarSeriesPC();
                    foreach ($sPC2 as $key => $value) {
                      echo '<option value="' . $value["idEquipo"] . '">' . $value["serie"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="edtSerieMon1">Monitor &nbsp;</label>
                <i class="fas fa-desktop"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="edtSerieMon1" name="edtSerieMon">
                    <option id="edtSerieMon"></option>
                    <?php
                    $sMon2 = ControladorIntegracion::ctrListarSeriesMon();
                    foreach ($sMon2 as $key => $value) {
                      echo '<option value="' . $value["idEquipo"] . '">' . $value["serie"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="edtSerieTec1">Teclado &nbsp;</label>
                <i class="fas fa-keyboard"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="edtSerieTec1" name="edtSerieTec">
                    <option id="edtSerieTec"></option>
                    <?php
                    $sTec2 = ControladorIntegracion::ctrListarSeriesTec();
                    foreach ($sTec2 as $key => $value) {
                      echo '<option value="' . $value["idEquipo"] . '">' . $value["serie"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="edtSerieAcu1">Energía&nbsp;</label>
                <i class="fas fa-charging-station"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="edtSerieAcu1" name="edtSerieAcu">
                    <option id="edtSerieAcu"></option>
                    <?php
                    $sFuen2 = ControladorIntegracion::ctrListarSeriesEnergia();
                    foreach ($sFuen2 as $key => $value) {
                      echo '<option value="' . $value["idEquipo"] . '">' . $value["serie"] . '</option>';
                    }
                    ?>
                    <input type="hidden" id="datResp2" name="datResp2">
                    <input type="hidden" id="datOfi2" name="datOfi2">
                    <input type="hidden" id="datServ2" name="datServ2">
                    <input type="hidden" id="datEst2" name="datEst2">
                    <input type="hidden" id="datCond2" name="datCond2">
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2 d-none" id="bloqueLapServ2">
            <div class="col-12 col-md-12">
              <div class="form-group">
                <label for="edtSerieLap1">LAPTOP O SERVIDOR &nbsp;</label>
                <i class="fas fa-laptop-code"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="edtSerieLap1" name="edtSerieLap">
                    <option id="edtSerieLap"></option>
                    <?php
                    $sLap = ControladorIntegracion::ctrListarSeriesLapServ();
                    foreach ($sLap as $key => $value) {
                      echo '<option value="' . $value["idEquipo"] . '">' . $value["serie"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-secondary" id="btnEdtIntC"><i class="fas fa-save"></i> Guardar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
        </div>
        <?php
        $edtIntegraC = new ControladorIntegracion();
        $edtIntegraC->ctrEditarIntegracionC();
        ?>
      </form>
    </div>
  </div>
</div>
<!-- Editar -->
<?php
$anulaIntC = new ControladorIntegracion();
$anulaIntC->ctrAnularIntegracionC();
?>