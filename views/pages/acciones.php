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
          <h4><strong>Extras:. Acciones Realizadas</strong></h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Herramientas</a></li>
            <li class="breadcrumb-item active">Acciones Realizadas</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-tools"></i>
          Mantenimiento de Acciones Realizadas
        </h3>
      </div>
      <div class="card-body">
        <button type="btn" class="btn btn-secondary" data-toggle="modal" data-target="#modal-registrar-accion"><i class="fas fa-plus-circle"></i> Registrar Acción Realizada
        </button>
        <input type="hidden" id="pAccionOculto" value="<?php echo $_SESSION["perfil"] ?>">
      </div>
      <div class="card-body">
        <table id="tablaAcciones" class="table table-bordered table-hover dt-responsive tablaAcciones">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Accion realizada</th>
              <th>Segmento</th>
              <th>Opciones</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section>
</div>

<!-- Registrar Accion Realizada -->
<div id="modal-registrar-accion" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" role="form" id="formRegAcc" method="post">
        <div class="modal-header text-center" style="background: #6c757d; color: white">
          <h4 class="modal-title">Registrar Acción realizada</h4>
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
                  <select class="form-control" style="width: 100%;" id="acDiag" name="acDiag" required>
                    <option value="0">Seleccione segmento</option>
                    <?php
                    $itemCat2 = null;
                    $valorCat2  = null;
                    $categorias2 = ControladorSegmentos::ctrListarSegmentos($itemCat2, $valorCat2);
                    foreach ($categorias2 as $key => $value) {
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
                <label for="newAccion">Acción realizada &nbsp;</label>
                <i class="fas fa-tools"></i> *
                <div class="input-group">
                  <input type="text" name="newAccion" id="newAccion" class="form-control text-capitalize" placeholder="Ingrese nueva acción" required autocomplete="off" autofocus="autofocus">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-secondary" id="btnRegAcc"><i class="fas fa-save"></i> Guardar</button>
          <button type="reset" class="btn btn-danger"><i class="fas fa-eraser"></i> Limpiar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
        </div>
        <?php
        $regAccion = new ControladorAcciones();
        $regAccion->ctrRegistrarAccion();
        ?>
      </form>
    </div>
  </div>
</div>
<!-- Registrar Accion Realizada -->

<!-- Editar accion realizada -->
<div id="modal-editar-accion" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" role="form" id="formEdtAcc" method="post">
        <div class="modal-header text-center" style="background: #6c757d; color: white">
          <h4 class="modal-title">Editar Acción realizada</h4>
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
                  <select class="form-control text-capitalize" style="width: 100%;" name="edtacDiag" id="edtacDiag2" required>
                    <option value="" id="edtacDiag"></option>
                    <?php
                    $itemCat3 = null;
                    $valorCat3  = null;
                    $categorias3 = ControladorSegmentos::ctrListarSegmentos($itemCat3, $valorCat3);
                    foreach ($categorias3 as $key => $value) {
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
                <label for="edtAccion">Acción realizada &nbsp;</label>
                <i class="fas fa-tools"></i> *
                <div class="input-group">
                  <input type="text" name="edtAccion" id="edtAccion" class="form-control" required autocomplete="off" autofocus="autofocus">
                  <input type="hidden" name="idAccion" id="idAccion">
                  <input type="hidden" name="nSeg2" id="nSeg2">
                  <input type="hidden" name="accAnt" id="accAnt">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-secondary" id="btnEdtAcc"><i class="fas fa-save"></i> Guardar cambios</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
        </div>
        <?php
        $edtAccion = new ControladorAcciones();
        $edtAccion->ctrEditarAccion();
        ?>
      </form>
    </div>
  </div>
</div>
<!-- Editar accion realizada -->
<!-- eliminar acción realizada -->
<?php
$eliAccion = new ControladorAcciones();
$eliAccion->ctrEliminarAccion();
?>
<!-- eliminar acción realizada -->