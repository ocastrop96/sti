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
          <h4><strong>Equipos Informáticos:. Registro de Periféricos y Otros</strong></h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Equipos Informáticos</a></li>
            <li class="breadcrumb-item active">Registro de Periféricos y Otros</li>
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
          Registro de Periféricos y Otros
        </h3>
      </div>
      <div class="card-body">
        <button type="btn" class="btn btn-secondary mt-2" data-toggle="modal" data-target="#modal-registrar-otros"><i class="fas fa-keyboard"></i> Registrar Periféricos y otros</button>
        <input type="hidden" id="pEqOtrosOculto" value="<?php echo $_SESSION["perfil"] ?>">
      </div>
      <div class="card-body">
        <table id="tablaEquiposOtros" class="table table-bordered table-hover dt-responsive tablaEquiposOtros">
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
<!-- Registrar Equipo Periferico y otros -->
<div id="modal-registrar-otros" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="" role="form" id="formRegEqOtro" method="post">
        <div class="modal-header text-center" style="background: #6c757d; color: white">
          <h4 class="modal-title">Registrar Périfericos y Otros</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="epoCat">Tipo de Equipo &nbsp;</label>
                <i class="fas fa-th"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="epoCat" name="epoCat">
                    <option value="0">Seleccione tipo de Equipo</option>
                    <?php
                    $cat3 = ControladorCategorias::ctrListarCategoriaOtros();
                    foreach ($cat3 as $key => $value) {
                      echo '<option value="' . $value["idCategoria"] . '">' . $value["categoria"] . '</option>';
                    }
                    ?>
                  </select>
                  <input type="hidden" name="reg3" id="reg3" value="<?php echo $_SESSION["id"]; ?>">
                  <input type="hidden" name="segmentoP" value="3">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="epoRes">Usuario Responsable &nbsp;</label>
                <i class="fas fa-user"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" name="epoRes" id="epoRes">
                    <option value="0">Seleccione Usuario responsable</option>
                    <?php
                    $item = null;
                    $valor = null;
                    $res2 = ControladorResponsables::ctrListarResponsables($item, $valor);
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
                <label for="epoOfi1">Oficina/Departamento &nbsp;</label>
                <i class="fas fa-sitemap"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" name="epoOfi" id="epoOfi1">
                    <option value="0" id="epoOfi">Seleccione responsable</option>
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
                <label for="epoServ1">Servicio &nbsp;</label>
                <i class="fas fa-building"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" name="epoServ" id="epoServ1">
                    <option value="0" id="epoServ">Seleccione responsable</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="epoSerie">Serie N° &nbsp;</label>
                <i class="fas fa-keyboard"></i> <i class="fas fa-charging-station"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Ingrese serie" required autocomplete="off" name="epoSerie" id="epoSerie">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="epoSBN">SBN N° &nbsp;</label>
                <i class="fas fa-hashtag"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Ingrese SBN" required autocomplete="off" name="epoSBN" id="epoSBN">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="epoMarca">Marca &nbsp;</label>
                <i class="fas fa-thumbtack"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Ingrese marca" required autocomplete="off" name="epoMarca" id="epoMarca">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="epoModelo">Modelo &nbsp;</label>
                <i class="fas fa-bookmark"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Ingrese modelo" required autocomplete="off" name="epoModelo" id="epoModelo">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="epoDescripcion">Descripción &nbsp;</label>
                <i class="fas fa-bars"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Ingrese descripción" required autocomplete="off" name="epoDescripcion" id="epoDescripcion">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="epoOrden">Orden de Compra N° &nbsp;</label>
                <i class="fas fa-truck-loading"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Ingrese  N° de Orden de Compra" required autocomplete="off" name="epoOrden" id="epoOrden">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="epoFCompra">Fecha de Compra</label>
                <i class="fas fa-calendar-alt"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" name="epoFCompra" id="epoFCompra" placeholder="dd-mm-aaaa" autocomplete="off">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="">Garantía &nbsp;</label>
                <i class="fas fa-award"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Ingrese años de garantía" required autocomplete="off" id="epoGarantia" name="epoGarantia">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="epoCondicion">Condición del Equipo&nbsp;</label>
                <i class="fas fa-thermometer-half"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" name="epoCondicion" id="epoCondicion">
                    <option value="0">Seleccione condición del Equipo</option>
                    <?php
                    $iPO = null;
                    $vPO = null;
                    $condPO = ControladorSituacion::ctrListarSituacion($iPO, $vPO);
                    foreach ($condPO as $key => $value) {
                      echo '<option value="' . $value["idSituacion"] . '">' . $value["situacion"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="epoEstado">Estado&nbsp;</label>
                <i class="fas fa-vote-yea"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" name="epoEstado" id="epoEstado">
                    <option value="0">Seleccione estado del Equipo</option>
                    <?php
                    $iPOE = null;
                    $vPOE = null;
                    $estPO = ControladorEstados::ctrListarEstados($iPOE, $vPOE);
                    foreach ($estPO as $key => $value) {
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
          <button type="submit" class="btn btn-secondary" id="btnRegEqOtro"><i class="fas fa-save"></i> Guardar</button>
          <button type="reset" class="btn btn-danger"><i class="fas fa-eraser"></i> Limpiar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
        </div>
        <?php
        $RegPO = new ControladorEquipos();
        $RegPO->ctrRegistrarEquipoPO();
        ?>
      </form>
    </div>
  </div>
</div>
<!-- Registrar Equipo Periferico y otros -->

<!-- Editar Periférico -->
<div id="modal-editar-equipoP" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="" role="form" id="formEdtEqOtro" method="post">
        <div class="modal-header text-center" style="background: #6c757d; color: white">
          <h4 class="modal-title">Editar Périfericos y Otros</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="edtpoCat1">Tipo de Equipo &nbsp;</label>
                <i class="fas fa-th"></i> *
                <div class="input-group">
                  <input type="hidden" name="idEquipo" id="idEquipo">
                  <input type="hidden" name="antSerie2" id="antSerie2">
                  <input type="hidden" name="antSBN2" id="antSBN2">
                  <select class="form-control" style="width: 100%;" name="edtpoCat" id="edtpoCat1">
                    <option value="" id="edtpoCat"></option>
                    <?php
                    $cat32 = ControladorCategorias::ctrListarCategoriaOtros();
                    foreach ($cat32 as $key => $value) {
                      echo '<option value="' . $value["idCategoria"] . '">' . $value["categoria"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="edtpoRes1">Usuario Responsable &nbsp;</label>
                <i class="fas fa-user"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="edtpoRes1" name="edtpoRes">
                    <option value="" id="edtpoRes"></option>
                    <?php
                    $item21 = null;
                    $valor21 = null;
                    $res21 = ControladorResponsables::ctrListarResponsables($item21, $valor21);
                    foreach ($res21 as $key => $value) {
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
                <label for="edtpoOfi1">Oficina/Departamento &nbsp;</label>
                <i class="fas fa-sitemap"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="edtpoOfi1" name="edtpoOfi">
                    <option value="" id="edtpoOfi"></option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="edtpoServ1">Servicio &nbsp;</label>
                <i class="fas fa-building"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="edtpoServ1" name="edtpoServ">
                    <option value="" id="edtpoServ"></option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtpoSerie">Serie N° &nbsp;</label>
                <i class="fas fa-keyboard"></i> <i class="fas fa-charging-station"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" id="edtpoSerie" name="edtpoSerie" required autocomplete="off">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtpoSBN">SBN N° &nbsp;</label>
                <i class="fas fa-hashtag"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" id="edtpoSBN" name="edtpoSBN" required autocomplete="off">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtpoMarca">Marca &nbsp;</label>
                <i class="fas fa-thumbtack"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" id="edtpoMarca" name="edtpoMarca" required autocomplete="off">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="edtpoModelo">Modelo &nbsp;</label>
                <i class="fas fa-bookmark"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" id="edtpoModelo" name="edtpoModelo" required autocomplete="off">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="edtpoDescripcion">Descripción &nbsp;</label>
                <i class="fas fa-bars"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" id="edtpoDescripcion" name="edtpoDescripcion" required autocomplete="off">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtpoOrden">Orden de Compra N° &nbsp;</label>
                <i class="fas fa-truck-loading"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" id="edtpoOrden" name="edtpoOrden" autocomplete="off">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtpoFCompra">Fecha de Compra</label>
                <i class="fas fa-calendar-alt"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" id="edtpoFCompra" name="edtpoFCompra" autocomplete="off">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtpoGarantia">Garantía &nbsp;</label>
                <i class="fas fa-award"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" id="edtpoGarantia" name="edtpoGarantia" autocomplete="off">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="edtpoCondicion1">Condición del Equipo&nbsp;</label>
                <i class="fas fa-thermometer-half"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="edtpoCondicion1" name="edtpoCondicion">
                    <option value="" id="edtpoCondicion"></option>
                    <?php
                    $iedtPO = null;
                    $vedtPO = null;
                    $condedtPO = ControladorSituacion::ctrListarSituacion($iedtPO, $vedtPO);
                    foreach ($condedtPO as $key => $value) {
                      echo '<option value="' . $value["idSituacion"] . '">' . $value["situacion"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="epdtoEstado1">Estado&nbsp;</label>
                <i class="fas fa-vote-yea"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="epdtoEstado1" name="epdtoEstado">
                    <option value="" id="epdtoEstado"></option>
                    <?php
                    $iedtPOE = null;
                    $vedtPOE = null;
                    $estedtPO = ControladorEstados::ctrListarEstados($iedtPOE, $vedtPOE);
                    foreach ($estedtPO as $key => $value) {
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
          <button type="submit" class="btn btn-secondary" id="btnEdtEqOtro"><i class="fas fa-save"></i> Guardar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
        </div>
        <?php

        $edtEQPO = new ControladorEquipos();
        $edtEQPO->ctrEditarEquipoPO();
        ?>
      </form>
    </div>
  </div>
</div>

<?php

$eliminarEQPO = new ControladorEquipos();
$eliminarEQPO->ctrEliminarEquipoP();
?>