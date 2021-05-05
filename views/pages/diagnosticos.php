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
          <h4><strong>Extras:. Diagnósticos</strong></h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Herramientas</a></li>
            <li class="breadcrumb-item active">Diagnósticos</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-laptop-medical"></i>
          Mantenimiendo de Diagnósticos
        </h3>
      </div>
      <div class="card-body">
        <button type="btn" class="btn btn-secondary" data-toggle="modal" data-target="#modal-registrar-diagnostico"><i class="fas fa-plus-circle"></i> Registrar Diagnostico
        </button>
        <input type="hidden" id="pDiagnosticoOculto" value="<?php echo $_SESSION["perfil"] ?>">
      </div>
      <div class="card-body">
        <table id="tablaDiagnosticos" class="table table-bordered table-hover dt-responsive tablaDiagnosticos">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Diagnóstico</th>
              <th>Segmento</th>
              <th>Opciones</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section>
</div>

<!-- Registrar Diagnostico -->
<div id="modal-registrar-diagnostico" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" role="form" id="formRegDiag" method="post">
        <div class="modal-header text-center" style="background: #6c757d; color: white">
          <h4 class="modal-title">Registrar Diagnóstico</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 mt-2">
              <div class="form-group">
                <label for="oficina">Segmento &nbsp;<i class="fas fa-border-style"></i>*</label>
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="caDiag" name="caDiag" required>
                    <option value="0">Seleccione segmento</option>
                    <?php
                    $itemSeg = null;
                    $valorSeg  = null;
                    $segmentos = ControladorSegmentos::ctrListarSegmentos($itemSeg, $valorSeg);
                    foreach ($segmentos as $key => $value) {
                      echo '<option value="' . $value["idSegmento"] . '">' . $value["descSegmento"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="newDiagnostico">Diagnóstico &nbsp;</label>
                <i class="fas fa-laptop-medical"></i> *
                <div class="input-group">
                  <input type="text" name="newDiagnostico" id="newDiagnostico" class="form-control text-capitalize" placeholder="Ingrese detalle de diagnóstico" required autocomplete="off" autofocus="autofocus">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-secondary" id="btnRegDiag"><i class="fas fa-save"></i> Guardar</button>
          <button type="reset" class="btn btn-danger"><i class="fas fa-eraser"></i> Limpiar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
        </div>
        <?php
        $registroDiag = new ControladorDiagnosticos();
        $registroDiag->ctrRegistrarDiagnosticos();
        ?>
      </form>
    </div>
  </div>
</div>
<!-- Registrar Diagnostico -->
<!-- Editar diagnostico -->
<div id="modal-editar-diagnostico" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" role="form" id="formEdtDiag" method="post">
        <div class="modal-header text-center" style="background: #6c757d; color: white">
          <h4 class="modal-title">Editar Diagnóstico</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 mt-2">
              <div class="form-group">
                <label for="oficina">Segmento &nbsp;<i class="fas fa-border-style"></i>*</label>
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" name="edtcaDiag" id="edtcaDiag2" required>
                    <option value="" id="edtcaDiag"></option>
                    <?php
                    $itemCat1 = null;
                    $valorCat1  = null;
                    $categorias1 = ControladorSegmentos::ctrListarSegmentos($itemCat1, $valorCat1);
                    foreach ($categorias1 as $key => $value) {
                      echo '<option value="' . $value["idSegmento"] . '">' . $value["descSegmento"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="edtDiagnostico">Diagnóstico &nbsp;</label>
                <i class="fas fa-laptop-medical"></i> *
                <div class="input-group">
                  <input type="text" name="edtDiagnostico" id="edtDiagnostico" class="form-control text-capitalize" required autocomplete="off" autofocus="autofocus">
                  <input type="hidden" name="idDiagnostico" id="idDiagnostico">
                  <input type="hidden" name="nSegmento" id="nSegmento">
                  <input type="hidden" name="diagAnt" id="diagAnt">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-secondary" id="btnEdtDiag"><i class="fas fa-save"></i> Guardar cambios</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
        </div>
        <?php
        $editDiag = new ControladorDiagnosticos();
        $editDiag->ctrEditarDiagnosticos();
        ?>
      </form>
    </div>
  </div>
</div>
<!-- elimina diagnostico -->
<?php
$eliminarDiag = new ControladorDiagnosticos();
$eliminarDiag->ctrEliminarDiagnosticos();
?>