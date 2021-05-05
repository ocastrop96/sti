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
          <h4><strong>Equipos Informáticos:. Registro de Equipos de Cómputo</strong></h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Equipos Informáticos</a></li>
            <li class="breadcrumb-item active">Registro de Equipos de Cómputo</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-laptop-code"></i>
          Registro de Equipos de Cómputo
        </h3>
      </div>
      <div class="card-body">
        <button type="btn" class="btn btn-secondary mt-2" data-toggle="modal" data-target="#modal-registrar-computadora"><i class="fas fa-desktop"></i> Registrar Equipo de Cómputo</button>
        <input type="hidden" id="pEqCompOculto" value="<?php echo $_SESSION["perfil"] ?>">
      </div>
      <div class="card-body">
        <table id="tablaEquiposComputo" class="table table-bordered table-hover dt-responsive tablaEquiposComputo">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Tipo</th>
              <th>Serie</th>
              <th>SBN</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Descripción</th>
              <th>Condición</th>
              <th>Estado</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th style="width: 10px">#</th>
              <th>Tipo</th>
              <th>Serie</th>
              <th>SBN</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Descripción</th>
              <th>Condición</th>
              <th>Estado</th>
              <th>Opciones</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </section>
</div>
<!-- Registrar Equipo de Computo -->
<div id="modal-registrar-computadora" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="" role="form" id="formRegEqComputo" method="post">
        <div class="modal-header text-center" style="background: #6c757d; color: white">
          <h4 class="modal-title">Registrar Equipos de Cómputo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="ecCat">Tipo de Equipo &nbsp;</label>
                <i class="fas fa-th"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="ecCat" name="ecCat">
                    <option value="0">Seleccione tipo de Equipo</option>
                    <?php
                    $cat1 = ControladorCategorias::ctrListarCategoriaComputo();
                    foreach ($cat1 as $key => $value) {
                      echo '<option value="' . $value["idCategoria"] . '">' . $value["categoria"] . '</option>';
                    }
                    ?>
                  </select>
                  <input type="hidden" name="reg1" id="reg1" value="<?php echo $_SESSION["id"]; ?>">
                  <input type="hidden" name="segmento" value="1">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="ecRes">Usuario Responsable &nbsp;</label>
                <i class="fas fa-user"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="ecRes" name="ecRes">
                    <option value="0">Seleccione Usuario responsable</option>
                    <?php
                    $item = null;
                    $valor = null;
                    $res1 = ControladorResponsables::ctrListarResponsables($item, $valor);
                    foreach ($res1 as $key => $value) {
                      echo '<option value="' . $value["idResponsable"] . '">' . $value["nombresResp"] . ' ' . $value["apellidosResp"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="ecOfi1">Oficina/Departamento &nbsp;</label>
                <i class="fas fa-sitemap"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" name="ecOfi" id="ecOfi1">
                    <option value="0" id="ecOfi">Seleccione Departamento</option>
                    <?php
                    $item = null;
                    $valor = null;
                    $res2 = ControladorAreas::ctrListarAreas($item, $valor);
                    foreach ($res2 as $key => $value) {
                      echo '<option value="' . $value["id_area"] . '">' . $value["area"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="ecServ1">Servicio &nbsp;</label>
                <i class="fas fa-building"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" name="ecServ" id="ecServ1">
                    <option value="0" id="ecServ">Seleccione Servicio</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="ecSerie">Serie N° &nbsp;</label>
                <i class="fas fa-desktop"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Ingrese serie" required autocomplete="off" id="ecSerie" name="ecSerie">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="ecSBN">SBN N° &nbsp;</label>
                <i class="fas fa-hashtag"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Ingrese SBN" required autocomplete="off" id="ecSBN" name="ecSBN">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="ecMarca">Marca &nbsp;</label>
                <i class="fas fa-thumbtack"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Ingrese marca" required autocomplete="off" id="ecMarca" name="ecMarca">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="ecModelo">Modelo &nbsp;</label>
                <i class="fas fa-bookmark"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Ingrese modelo" required autocomplete="off" id="ecModelo" name="ecModelo">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="ecDescripcion">Descripción &nbsp;</label>
                <i class="fas fa-bars"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Ingrese descripción" required autocomplete="off" id="ecDescripcion" name="ecDescripcion">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="ecOrden">Orden de Compra N° &nbsp;</label>
                <i class="fas fa-truck-loading"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Ingrese  N° de Orden de Compra" required autocomplete="off" id="ecOrden" name="ecOrden">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="ecFCompra">Fecha de Compra</label>*
                <div class="input-group">
                  <input type="text" class="form-control" id="ecFCompra" name="ecFCompra" placeholder="dd-mm-aaaa" autocomplete="off">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="ecGarantia">Garantía &nbsp;</label>
                <i class="fas fa-award"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Tiempo de garantía" required autocomplete="off" id="ecGarantia" name="ecGarantia">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="ecPlaca">Placa &nbsp;</label>
                <i class="fas fa-digital-tachograph"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Placa" required autocomplete="off" id="ecPlaca" name="ecPlaca">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-2">
              <div class="form-group">
                <label for="ecProcesador">Procesador&nbsp;</label>
                <i class="fas fa-microchip"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Procesador" required autocomplete="off" id="ecProcesador" name="ecProcesador">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-2">
              <div class="form-group">
                <label for="ecVProc">Velocidad&nbsp;</label>
                <i class="fab fa-safari"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Velocidad" required autocomplete="off" id="ecVProc" name="ecVProc">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-2">
              <div class="form-group">
                <label for="ecRAM">RAM &nbsp;</label>
                <i class="fas fa-memory"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="RAM" required autocomplete="off" id="ecRAM" name="ecRAM">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="ecDD">Disco Duro &nbsp;</label>
                <i class="fas fa-hdd"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Almacenamiento" required autocomplete="off" id="ecDD" name="ecDD">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="ecCondicion">Condición del Equipo&nbsp;</label>
                <i class="fas fa-thermometer-half"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="ecCondicion" name="ecCondicion">
                    <option value="0">Seleccione condición del Equipo</option>
                    <?php
                    $iC = null;
                    $vC = null;
                    $cond1 = ControladorSituacion::ctrListarSituacion($iC, $vC);
                    foreach ($cond1 as $key => $value) {
                      echo '<option value="' . $value["idSituacion"] . '">' . $value["situacion"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="ecEstado">Estado&nbsp;</label>
                <i class="fas fa-vote-yea"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="ecEstado" name="ecEstado">
                    <option value="0">Seleccione estado del Equipo</option>
                    <?php
                    $iE = null;
                    $vE = null;
                    $est1 = ControladorEstados::ctrListarEstados($iE, $vE);
                    foreach ($est1 as $key => $value) {
                      echo '<option value="' . $value["idEstado"] . '">' . $value["descEstado"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-secondary" id="btnRegEqComputo"><i class="fas fa-save"></i> Guardar</button>
          <button type="reset" class="btn btn-danger"><i class="fas fa-eraser"></i> Limpiar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
        </div>
        <?php
        $regEC =  new ControladorEquipos();
        $regEC->ctrRegistrarEquipoC();
        ?>
      </form>
    </div>
  </div>
</div>
<!-- Registrar Equipo de Computo -->
<!-- Editar -->


<!-- Editar Equipo de Computo -->
<div id="modal-editar-equipoC" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="" role="form" method="post" id="formEdtEqComputo">
        <div class="modal-header text-center" style="background: #6c757d; color: white">
          <h4 class="modal-title">Editar Equipos de Cómputo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="edtecCat1">Tipo de Equipo &nbsp;</label>
                <i class="fas fa-th"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" name="edtecCat" id="edtecCat1">
                    <option value="" id="edtecCat"></option>
                    <?php
                    $cat2 = ControladorCategorias::ctrListarCategoriaComputo();
                    foreach ($cat2 as $key => $value) {
                      echo '<option value="' . $value["idCategoria"] . '">' . $value["categoria"] . '</option>';
                    }
                    ?>
                  </select>
                  <input type="hidden" name="idEquipo" id="idEquipo">
                  <input type="hidden" name="antSerie" id="antSerie">
                  <input type="hidden" name="antSBN" id="antSBN">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="edtecRes1">Usuario Responsable &nbsp;</label>
                <i class="fas fa-user"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" name="edtecRes" id="edtecRes1">
                    <option value="" id="edtecRes"></option>
                    <?php
                    $itemUR = null;
                    $valorUR = null;
                    $res2 = ControladorResponsables::ctrListarResponsables($itemUR, $valorUR);
                    foreach ($res2 as $key => $value) {
                      echo '<option value="' . $value["idResponsable"] . '">' . $value["nombresResp"] . ' ' . $value["apellidosResp"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="edtecOfi1">Oficina/Departamento &nbsp;</label>
                <i class="fas fa-sitemap"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="edtecOfi1" name="edtecOfi">
                    <option value="" id="edtecOfi"></option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="edtecServ1">Servicio &nbsp;</label>
                <i class="fas fa-building"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="edtecServ1" name="edtecServ">
                    <option value="" id="edtecServ"></option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtecSerie">Serie N° &nbsp;</label>
                <i class="fas fa-desktop"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" required autocomplete="off" id="edtecSerie" name="edtecSerie">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtecSBN">SBN N° &nbsp;</label>
                <i class="fas fa-hashtag"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" required autocomplete="off" id="edtecSBN" name="edtecSBN">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtecMarca">Marca &nbsp;</label>
                <i class="fas fa-thumbtack"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" required autocomplete="off" id="edtecMarca" name="edtecMarca">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="edtecModelo">Modelo &nbsp;</label>
                <i class="fas fa-bookmark"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" required autocomplete="off" id="edtecModelo" name="edtecModelo">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="edtecDescripcion">Descripción &nbsp;</label>
                <i class="fas fa-bars"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" required autocomplete="off" id="edtecDescripcion" name="edtecDescripcion">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtecOrden">Orden de Compra N° &nbsp;</label>
                <i class="fas fa-truck-loading"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" required autocomplete="off" id="edtecOrden" name="edtecOrden">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtecFCompra">Fecha de Compra</label>*
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="dd-mm-yyyy" required id="edtecFCompra" name="edtecFCompra" autocomplete="off">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtecGarantia">Garantía &nbsp;</label>
                <i class="fas fa-award"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" autocomplete="off" id="edtecGarantia" name="edtecGarantia">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="edtecPlaca">Placa &nbsp;</label>
                <i class="fas fa-digital-tachograph"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" required autocomplete="off" id="edtecPlaca" name="edtecPlaca">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-2">
              <div class="form-group">
                <label for="edtecProcesador">Procesador&nbsp;</label>
                <i class="fas fa-microchip"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" required autocomplete="off" id="edtecProcesador" name="edtecProcesador">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-2">
              <div class="form-group">
                <label for="edtecVProc">Velocidad&nbsp;</label>
                <i class="fab fa-safari"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" required autocomplete="off" id="edtecVProc" name="edtecVProc">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-2">
              <div class="form-group">
                <label for="edtecRAM">RAM &nbsp;</label>
                <i class="fas fa-memory"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" required autocomplete="off" id="edtecRAM" name="edtecRAM">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="edtecDD">Disco Duro &nbsp;</label>
                <i class="fas fa-hdd"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" required autocomplete="off" id="edtecDD" name="edtecDD">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="edtecCondicion1">Condición del Equipo&nbsp;</label>
                <i class="fas fa-thermometer-half"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" name="edtecCondicion" id="edtecCondicion1">
                    <option value="" id="edtecCondicion"></option>
                    <?php
                    $iC2 = null;
                    $vC2 = null;
                    $cond2 = ControladorSituacion::ctrListarSituacion($iC2, $vC2);
                    foreach ($cond1 as $key => $value) {
                      echo '<option value="' . $value["idSituacion"] . '">' . $value["situacion"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="edtecEstado1">Estado&nbsp;</label>
                <i class="fas fa-vote-yea"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="edtecEstad1" name="edtecEstado">
                    <option value="" id="edtecEstado"></option>
                    <?php
                    $iE2 = null;
                    $vE2 = null;
                    $est2 = ControladorEstados::ctrListarEstados($iE2, $vE2);
                    foreach ($est2 as $key => $value) {
                      echo '<option value="' . $value["idEstado"] . '">' . $value["descEstado"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-secondary" id="btnEdtEqComputo"><i class="fas fa-save"></i> Guardar cambios</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
        </div>
        <?php
        $edtEC =  new ControladorEquipos();
        $edtEC->ctrEditarEquipoC();
        ?>
      </form>
    </div>
  </div>
</div>
<!-- Editar Equipo de Computo -->

<!-- Eliminar equipo de Computo -->
<?php
$eliminarEC = new ControladorEquipos();
$eliminarEC->ctrEliminarEquipoC();
?>
<!-- Eliminar equipo de Computo -->