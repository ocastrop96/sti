<?php
if ($_SESSION["perfil"] != 1 && $_SESSION["perfil"] != 2 && $_SESSION["perfil"] != 3) {
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
          <h4><strong>Soporte Técnico:. Usuarios Responsables</strong></h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Soporte Técnico</a></li>
            <li class="breadcrumb-item active">Usuarios Responsables</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Mantenimiento de Usuarios Responsables</h3>
      </div>
      <div class="card-body">
        <button type="btn" class="btn btn-secondary" data-toggle="modal" data-target="#modal-registrar-responsable"><i class="fas fa-plus-circle"></i> Registrar Responsable
        </button>
        <input type="hidden" id="pResponsableOculto" value="<?php echo $_SESSION["perfil"] ?>">
      </div>
      <div class="card-body">
        <table id="tablaResponsables" class="table table-bordered table-hover dt-responsive tablaResponsables">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>DNI N°</th>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Oficina/Departamento</th>
              <th>Servicio</th>
              <th>Opciones</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section>
</div>

<!-- Registrar usuario responsable -->
<div id="modal-registrar-responsable" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" role="form" method="post" id="frmRegistroResponsable">
        <div class="modal-header text-center" style="background: #6c757d; color: white">
          <h4 class="modal-title">Registrar Usuario Responsable</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-8">
              <div class="form-group">
                <label for="dniResponsable">DNI</label>
                <i class="fas fa-address-card"></i> *
                <div class="input-group">
                  <input type="text" name="dniResponsable" id="dniResponsable" class="form-control" placeholder="Ingrese DNI" required autocomplete="off" autofocus="autofocus">
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label>Búsqueda:<span class="text-danger">&nbsp;*</span></label>
                <div class="input-group">
                  <button type="button" class="btn btn-block btn-info" id="btnDNIResponsable"><i class="fas fa-search"></i>&nbsp;Consulta DNI</button>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label for="nombRes">Nombres &nbsp;</label>
                <i class="fas fa-users"></i> *
                <div class="input-group">
                  <input type="text" name="nombRes" id="nombRes" class="form-control" placeholder="Ingrese nombres del usuario responsable" autocomplete="off" autofocus="autofocus">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12">
              <div class="form-group">
                <label for="apeRes">Apellidos &nbsp;</label>
                <i class="fas fa-users"></i> *
                <div class="input-group">
                  <input type="text" name="apeRes" id="apeRes" class="form-control" placeholder="Ingrese apellidos del usuario responsable" autocomplete="off" autofocus="autofocus">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12">
              <div class="form-group">
                <label for="oficinaRes">Oficina / Departamento pertenencia &nbsp;</label>
                <i class="fas fa-sitemap"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="oficinaRes" name="oficinaRes">
                    <option value="0">Seleccione Oficina o Dpto pertenencia</option>
                    <?php
                    $itemOficina1 = null;
                    $valorOficina2  = null;
                    $oficina1 = ControladorAreas::ctrListarAreas($itemOficina1, $valorOficina2);
                    foreach ($oficina1 as $key => $value) {
                      echo '<option value="' . $value["id_area"] . '">' . $value["area"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12">
              <div class="form-group">
                <label for="servicioRes">Servicio de pertenencia &nbsp;</label>
                <i class="fas fa-building"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" name="servicioRes" id="servicioRes">
                    <option value="0">Seleccione servicio pertenencia</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="submit" id="btnRegistrarResponsable" class="btn btn-secondary"><i class="fas fa-save"></i> Guardar</button>
          <button type="reset" class="btn btn-danger"><i class="fas fa-eraser"></i> Limpiar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
        </div>
        <?php
        $regResp = new ControladorResponsables();
        $regResp->ctrRegistrarResponsables();
        ?>
      </form>
    </div>
  </div>
</div>
<!-- Registrar usuario responsable -->
<!-- Editar usuario responsable -->
<div id="modal-editar-responsable" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" role="form" method="post" id="frmEditarResponsable">
        <div class="modal-header text-center" style="background: #6c757d; color: white">
          <h4 class="modal-title">Editar Usuario Responsable</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-8">
              <div class="form-group">
                <label for="edtdniResponsable">DNI</label>
                <i class="fas fa-address-card"></i> *
                <div class="input-group">
                  <input type="text" name="edtdniResponsable" id="edtdniResponsable" class="form-control" placeholder="Ingrese DNI" required autocomplete="off" autofocus="autofocus">
                  <input type="hidden" name="hdni" id="hdni">
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label>Búsqueda:<span class="text-danger">&nbsp;*</span></label>
                <div class="input-group">
                  <button type="button" class="btn btn-block btn-info" id="btnedtDNIResponsable"><i class="fas fa-search"></i>&nbsp;Consulta DNI</button>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label for="edtnombRes">Nombres &nbsp;</label>
                <i class="fas fa-users"></i> *
                <div class="input-group">
                  <input type="text" name="edtnombRes" id="edtnombRes" class="form-control" autocomplete="off" autofocus="autofocus">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12">
              <div class="form-group">
                <label for="edtapeRes">Apellidos &nbsp;</label>
                <i class="fas fa-users"></i> *
                <div class="input-group">
                  <input type="text" name="edtapeRes" id="edtapeRes" class="form-control" autocomplete="off" autofocus="autofocus">
                  <input type="hidden" name="idResponsable" id="idResponsable">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12">
              <div class="form-group">
                <label for="edtoficinaRes">Oficina / Departamento pertenencia &nbsp;</label>
                <i class="fas fa-sitemap"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" name="edtoficinaRes" id="edtOfi">
                    <option value="" id="edtoficinaRes"></option>
                    <?php
                    $itemOficina2 = null;
                    $valorOficina3  = null;
                    $oficina2 = ControladorAreas::ctrListarAreas($itemOficina2, $valorOficina3);
                    foreach ($oficina2 as $key => $value) {
                      echo '<option value="' . $value["id_area"] . '">' . $value["area"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12">
              <div class="form-group">
                <label for="edtservicioRes">Servicio de pertenencia &nbsp;</label>
                <i class="fas fa-building"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" name="edtservicioRes" id="edtSer">
                    <option value="" id="edtservicioRes"></option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="submit" id="btnEditarResponsable" class="btn btn-secondary"><i class="fas fa-save"></i> Guardar cambios</button>
          <button type="reset" class="btn btn-danger"><i class="fas fa-eraser"></i> Limpiar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
        </div>
        <?php
        $editarResponsable = new ControladorResponsables();
        $editarResponsable->ctrEditarResponsables();
        ?>
      </form>
    </div>
  </div>
</div>
<!-- Editar usuario responsable -->

<!-- Eliminar reponsable -->
<?php
$eliminarResponsable = new ControladorResponsables();
$eliminarResponsable->ctrEliminarResponsables();
?>