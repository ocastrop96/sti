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
          <h4><strong>Equipos Informáticos:. Registro de Equipos de Redes Telecomunicaciones</strong></h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Equipos Informáticos</a></li>
            <li class="breadcrumb-item active">Registro de Equipos de Redes y Telecomunicaciones</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-ethernet"></i>
          Registro de Equipos de Redes
        </h3>
      </div>
      <div class="card-body">
        <button type="btn" class="btn btn-secondary mt-2" data-toggle="modal" data-target="#modal-registrar-redes"><i class="fas fa-network-wired"></i> Registrar Eq. Redes</button>
        <input type="hidden" id="pEqRedesOculto" value="<?php echo $_SESSION["perfil"] ?>">
      </div>
      <div class="card-body">
        <table id="tablaEquiposRedes" class="table table-bordered table-hover dt-responsive tablaEquiposRedes">
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

<!-- Registrar Equipo de Redes -->
<div id="modal-registrar-redes" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="" role="form" id="formRegEqRed" method="post">
        <div class="modal-header text-center" style="background: #6c757d; color: white">
          <h4 class="modal-title">Registrar Equipos de Redes y Telecomunicaciones</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="erCat1">Tipo de Equipo &nbsp;</label>
                <i class="fas fa-th"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="erCat1" name="erCat">
                    <option value="0">Seleccione tipo de Equipo</option>
                    <?php
                    $cat22 = ControladorCategorias::ctrListarCategoriaRedes();
                    foreach ($cat22 as $key => $value) {
                      echo '<option value="' . $value["idCategoria"] . '">' . $value["categoria"] . '</option>';
                    }
                    ?>
                  </select>
                  <input type="hidden" name="reg4" id="reg4" value="<?php echo $_SESSION["id"]; ?>">
                  <input type="hidden" name="segmentoR" value="2">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="erRes1">Usuario Responsable &nbsp;</label>
                <i class="fas fa-user"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="erRes1" name="erRes">
                    <option value="0">Seleccione Usuario responsable</option>
                    <?php
                    $item = null;
                    $valor = null;
                    $res3 = ControladorResponsables::ctrListarResponsables($item, $valor);
                    foreach ($res3 as $key => $value) {
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
                <label for="erOficina1">Oficina/Departamento &nbsp;</label>
                <i class="fas fa-sitemap"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="erOficina1" name="erOficina">
                    <option value="0" id="erOficina">Seleccione Oficina</option>
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
                <label for="erServ1">Servicio &nbsp;</label>
                <i class="fas fa-building"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="erServ1" name="erServ">
                    <option value="0" id="erServ">Seleccione Servicio o Area</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="erSerie">Serie N° &nbsp;</label>
                <i class="fas fa-server"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Ingrese serie" id="erSerie" name="erSerie" required autocomplete="off">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="erSBN">SBN N° &nbsp;</label>
                <i class="fas fa-hashtag"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Ingrese SBN" id="erSBN" name="erSBN" required autocomplete="off">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="erMarca">Marca &nbsp;</label>
                <i class="fas fa-thumbtack"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Ingrese marca" id="erMarca" name="erMarca" required autocomplete="off">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="erModelo">Modelo &nbsp;</label>
                <i class="fas fa-bookmark"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Ingrese modelo" id="erModelo" name="erModelo" required autocomplete="off">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="erDescrip">Descripción &nbsp;</label>
                <i class="fas fa-bars"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Ingrese descripción" id="erDescrip" name="erDescrip" required autocomplete="off">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="erOrden">Orden de Compra N° &nbsp;</label>
                <i class="fas fa-truck-loading"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Ingrese  N° de Orden de Compra" id="erOrden" name="erOrden" required autocomplete="off">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="erFCompra">Fecha de Compra</label>*
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="dd-mm-aaaa" id="erFCompra" name="erFCompra" required autocomplete="off">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="erGarantia">Garantía &nbsp;</label>
                <i class="fas fa-award"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Ingrese años de garantía" id="erGarantia" name="erGarantia" required autocomplete="off">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="erPuertos">Puertos &nbsp;</label>
                <i class="fas fa-ethernet"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Ingrese N° de puertos" id="erPuertos" name="erPuertos" required autocomplete="off">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="erCapa">Capa &nbsp;</label>
                <i class="far fa-object-group"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Ingrese tipo de capa" id="erCapa" name="erCapa" required autocomplete="off">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="erCond">Condición del Equipo&nbsp;</label>
                <i class="fas fa-thermometer-half"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="erCond" name="erCond">
                    <option value="0">Seleccione condición del Equipo</option>
                    <?php
                    $iC12 = null;
                    $vC12 = null;
                    $cond22 = ControladorSituacion::ctrListarSituacion($iC12, $vC12);
                    foreach ($cond22 as $key => $value) {
                      echo '<option value="' . $value["idSituacion"] . '">' . $value["situacion"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="erEstado">Estado&nbsp;</label>
                <i class="fas fa-vote-yea"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="erEstado" name="erEstado">
                    <option value="0">Seleccione estado del Equipo</option>
                    <?php
                    $iE12 = null;
                    $vE12 = null;
                    $est22 = ControladorEstados::ctrListarEstados($iE12, $vE12);
                    foreach ($est22 as $key => $value) {
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
          <button type="submit" class="btn btn-secondary" id="btnRegEqRed"><i class="fas fa-save"></i> Guardar</button>
          <button type="reset" class="btn btn-danger"><i class="fas fa-eraser"></i> Limpiar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
        </div>
        <?php
        $regER = new ControladorEquipos();
        $regER->ctrRegistrarEquipoR();
        ?>
      </form>
    </div>
  </div>
</div>
<!-- Registrar Equipo de Redes -->
<!-- Editar -->
<div id="modal-editar-equipoR" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="" role="form" id="formEdtEqRed" method="post">
        <div class="modal-header text-center" style="background: #6c757d; color: white">
          <h4 class="modal-title">Editar Equipo de Redes y Telecomunicaciones</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="edtrCat1">Tipo de Equipo &nbsp;</label>
                <i class="fas fa-th"></i> *
                <div class="input-group">
                  <input type="hidden" name="idEquipo" id="idEquipo">
                  <input type="hidden" name="antSerie3" id="antSerie3">
                  <input type="hidden" name="antSBN3" id="antSBN3">
                  <select class="form-control" style="width: 100%;" name="edtrCat" id="edtrCat1">
                    <option value="" id="edtrCat"></option>
                    <?php
                    $cat32 = ControladorCategorias::ctrListarCategoriaRedes();
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
                <label for="edtrRes1">Usuario Responsable &nbsp;</label>
                <i class="fas fa-user"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="edtrRes1" name="edtrRes">
                    <option value="" id="edtrRes"></option>
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
                <label for="edtrOficina1">Oficina/Departamento &nbsp;</label>
                <i class="fas fa-sitemap"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="edtrOficina1" name="edtrOficina">
                    <option value="" id="edtrOficina"></option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="edtrServ1">Servicio &nbsp;</label>
                <i class="fas fa-building"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="edtrServ1" name="edtrServ">
                    <option value="" id="edtrServ"></option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtrSerie">Serie N° &nbsp;</label>
                <i class="fas fa-keyboard"></i> <i class="fas fa-charging-station"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" id="edtrSerie" name="edtrSerie" required autocomplete="off">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtrSBN">SBN N° &nbsp;</label>
                <i class="fas fa-hashtag"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" id="edtrSBN" name="edtrSBN" required autocomplete="off">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtrMarca">Marca &nbsp;</label>
                <i class="fas fa-thumbtack"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" id="edtrMarca" name="edtrMarca" required autocomplete="off">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="edtrModelo">Modelo &nbsp;</label>
                <i class="fas fa-bookmark"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" id="edtrModelo" name="edtrModelo" required autocomplete="off">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="edtrDescrip">Descripción &nbsp;</label>
                <i class="fas fa-bars"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" id="edtrDescrip" name="edtrDescrip" required autocomplete="off">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtrOrden">Orden de Compra N° &nbsp;</label>
                <i class="fas fa-truck-loading"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" id="edtrOrden" name="edtrOrden" autocomplete="off">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtrFCompra">Fecha de Compra</label>*
                <div class="input-group">
                  <input type="text" class="form-control" id="edtrFCompra" name="edtrFCompra" autocomplete="off">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtrGarantia">Garantía &nbsp;</label>
                <i class="fas fa-award"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" id="edtrGarantia" name="edtrGarantia" autocomplete="off">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="">Puertos &nbsp;</label>
                <i class="fas fa-ethernet"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" id="edtrPuertos" name="edtrPuertos" required autocomplete="off">
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="edtrCapa">Capa &nbsp;</label>
                <i class="far fa-object-group"></i> *
                <div class="input-group">
                  <input type="text" class="form-control" id="edtrCapa" name="edtrCapa" required autocomplete="off">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="edtrCond1">Condición del Equipo&nbsp;</label>
                <i class="fas fa-thermometer-half"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="edtrCond1" name="edtrCond">
                    <option value="" id="edtrCond"></option>
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
                <label for="edtrEstado1">Estado&nbsp;</label>
                <i class="fas fa-vote-yea"></i> *
                <div class="input-group">
                  <select class="form-control" style="width: 100%;" id="edtrEstado1" name="edtrEstado">
                    <option value="" id="edtrEstado"></option>
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
          <button type="submit" class="btn btn-secondary" id="btnEdtEqRed"><i class="fas fa-save"></i> Guardar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
        </div>
        <?php

        $edtEQRed = new ControladorEquipos();
        $edtEQRed->ctrEditarEquipoRTC();
        ?>
      </form>
    </div>
  </div>
</div>
<?php

$eliminaEQRed = new ControladorEquipos();
$eliminaEQRed->ctrEliminarEquipoR();
?>