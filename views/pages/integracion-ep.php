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
          <h4><strong>Integración de Equipos:. Impresora y Periféricos</strong></h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Consolidación</a></li>
            <li class="breadcrumb-item active">Impresora,Fotocopiadora o Escáner</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-print"></i>
          Integración de Impresoras
        </h3>
      </div>
      <div class="card-body">
        <button type="btn" class="btn btn-secondary mt-2" data-toggle="modal" data-target="#modal-integra-ep"><i class="fas fa-print"></i> Registrar Integración</button>
        <input type="hidden" id="pIntPOculto" value="<?php echo $_SESSION["perfil"] ?>">
      </div>
      <div class="card-body">
        <table id="tablaIntegraEP" class="table table-bordered table-hover dt-responsive tablaIntegraEP">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th style="width: 10px">Correlativo</th>
              <th style="width: 10px">F.Registro</th>
              <th style="width: 10px">T.Equipo</th>
              <th style="width: 10px">N° Impresora</th>
              <th>Marca</th>
              <th>Serie</th>
              <th style="width: 10px">IP</th>
              <th>Usuario Responsable</th>
              <th>Departamento/Oficina</th>
              <th>Opciones</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section>
</div>
<!-- Registrar Integración de Impresora -->
<div id="modal-integra-ep" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="" role="form" id="formRegIntPO" method="post">
        <div class="modal-header text-center" style="background: #6c757d; color: white">
          <h4 class="modal-title">Registrar Integración de Impresora,Fotocopiadora o Escáner</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="fechita2">Fecha de Registro &nbsp;</label>
                <i class="fas fa-calendar-alt"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" readonly value="
              <?php
              date_default_timezone_set('America/Lima');
              $fechaActual = date('d-m-Y');
              echo $fechaActual; ?>
                " id="fechita" name="fechita2">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="tEqImp">Tipo de Equipo &nbsp;</label>
                <i class="fas fa-th"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="tEqImp" name="tEqImp">
                    <option value="0">Seleccione tipo</option>
                    <?php
                    $cat2 = ControladorCategorias::ctrListarCategoriaOtros2();
                    foreach ($cat2 as $key => $value) {
                      echo '<option value="' . $value["idCategoria"] . '">' . $value["categoria"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="nroImp">N° de Equipo &nbsp;</label>
                <i class="fas fa-hashtag"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" autocomplete="off" id="nroImp" name="nroImp" maxlength="8" placeholder="Ingrese N°de Impresora" required>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="ip_imp">IP &nbsp;</label>
                <i class="fas fa-network-wired"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask autocomplete="off" placeholder="Ingrese IP (Opcional)" id="ip_imp" name="ip_imp">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-12">
              <div class="form-group">
                <label for="serieImp">IMPRESORA, ESCANER, FOTOCOPIADORA &nbsp;</label>
                <i class="fas fa-laptop-code"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="serieImp" name="serieImp">
                    <option value="0">Seleccione N° Serie de Impresora o Periférico a Integrar</option>
                    <?php
                    $sImp = ControladorIntegracion::ctrListarSeriesImp();
                    foreach ($sImp as $key => $value) {
                      echo '<option value="' . $value["idEquipo"] . '">' . $value["serie"] . '</option>';
                    }
                    ?>
                    <input type="hidden" id="impResp" name="impResp">
                    <input type="hidden" id="impOfi" name="impOfi">
                    <input type="hidden" id="impServ" name="impServ">
                    <input type="hidden" id="impEst" name="impEst">
                    <input type="hidden" id="impCond" name="impCond">
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-secondary" id="btnRegIntPO"><i class="fas fa-save"></i> Guardar</button>
          <button type="reset" class="btn btn-danger"><i class="fas fa-eraser"></i> Limpiar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
        </div>
        <?php
        $regIntImp = new ControladorIntegracion();
        $regIntImp->ctrRegistrarIntegracionI();
        ?>
      </form>
    </div>
  </div>
</div>
<!-- Registrar Integración de Impresora-->
<!-- Editar Integración de Impresora -->
<div id="modal-editar-integraEP" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="" role="form" id="formEdtIntPO" method="post">
        <div class="modal-header text-center" style="background: #6c757d; color: white">
          <h4 class="modal-title">Editar Integración de Impresora,Fotocopiadora o Escáner</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtEqImp1">Tipo de Equipo &nbsp;</label>
                <i class="fas fa-th"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="edtEqImp1" name="edtEqImp">
                    <option id="edtEqImp"></option>
                    <?php
                    $cat24 = ControladorCategorias::ctrListarCategoriaOtros2();
                    foreach ($cat24 as $key => $value) {
                      echo '<option value="' . $value["idCategoria"] . '">' . $value["categoria"] . '</option>';
                    }
                    ?>
                    <input type="hidden" name="idIntegracion" id="idIntegracion">
                    <input type="hidden" name="nroAnt2" id="nroAnt2">
                    <input type="hidden" name="ipAnt2" id="ipAnt2">
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtnroImp">N° de Equipo &nbsp;</label>
                <i class="fas fa-hashtag"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" autocomplete="off" id="edtnroImp" name="edtnroImp" maxlength="8" required>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtip_imp">IP &nbsp;</label>
                <i class="fas fa-network-wired"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask autocomplete="off" id="edtip_imp" name="edtip_imp">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-12">
              <div class="form-group">
                <label for="edtserieImp1">IMPRESORA, ESCANER, FOTOCOPIADORA &nbsp;</label>
                <i class="fas fa-laptop-code"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="edtserieImp1" name="edtserieImp">
                    <option id="edtserieImp"></option>
                    <?php
                    $sImp2 = ControladorIntegracion::ctrListarSeriesImp();
                    foreach ($sImp2 as $key => $value) {
                      echo '<option value="' . $value["idEquipo"] . '">' . $value["serie"] . '</option>';
                    }
                    ?>
                    <input type="hidden" id="edtimpResp" name="edtimpResp">
                    <input type="hidden" id="edtimpOfi" name="edtimpOfi">
                    <input type="hidden" id="edtimpServ" name="edtimpServ">
                    <input type="hidden" id="edtimpEst" name="edtimpEst">
                    <input type="hidden" id="edtimpCond" name="edtimpCond">
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-secondary" id="btnEdtIntPO"><i class="fas fa-save"></i> Guardar cambios</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
        </div>
        <?php
        $edtIntI = new ControladorIntegracion();
        $edtIntI->ctrEditarIntegracionI();
        ?>
      </form>
    </div>
  </div>
</div>
<!-- Editar Integración de Impresora -->
<?php
$anulaIntI = new ControladorIntegracion();
$anulaIntI->ctrAnularIntegracionI();
?>