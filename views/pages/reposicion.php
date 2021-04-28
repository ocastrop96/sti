<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4><strong>Soporte Técnico:. Reposición de Equipos</strong></h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">HelpDesk</a></li>
            <li class="breadcrumb-item active">Reposición</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-sync-alt"></i>
          Reposición de Equipos
        </h3>
      </div>
      <div class="card-body">
        <button type="btn" class="btn btn-secondary mt-2" data-toggle="modal" data-target="#modal-registro-reposicion"><i class="fas fa-sync-alt"></i> Registrar Reposición</button>
      </div>
      <div class="card-body">
        <table id="tablaReposicion" class="table table-bordered table-hover dt-responsive tablaReposicion">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>N° Ficha</th>
              <th>F.Registro</th>
              <th>T.Equipo</th>
              <th>Serie</th>
              <th>Responsable</th>
              <th>Departamento/Oficina</th>
              <th>Servicio/Área</th>
              <th>Técnico</th>
              <th>Est.Atención</th>
              <th>Est.Ficha</th>
              <th>Opciones</th>
            </tr>
          </thead>
        </table>
        <input type="hidden" value="<?php echo $_SESSION['id']; ?>" id="idOculto">
      </div>
    </div>
  </section>
</div>

<!-- Modal Registro de Reposicion -->
<div id="modal-registro-reposicion" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <form action="" role="form" id="formRegRepo" method="post" class="frmManto1">
        <div class="modal-header text-center" style="background: #6c757d; color: white">
          <h4 class="modal-title">Registro Solicitud de Reposición de Equipo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="font-weight-bolder text-gray">I. Datos Generales del Equipo</p>
          <div class="row">
            <div class="col-12 col-md-2">
              <div class="form-group">
                <label for="fechita">F.Registro &nbsp; <i class="fas fa-calendar-alt"></i> *</label>
                <input type="text" class="form-control" readonly value="<?php date_default_timezone_set('America/Lima');
                                                                        $fechaActual = date('d-m-Y');
                                                                        echo $fechaActual; ?>">
                <input type="hidden" name="uregMant" id="uregMant" value="<?php echo $_SESSION["id"]; ?>">
                <input type="hidden" name="segmentado" id="segmentado">
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="tipEquipo">Tipo de Equipo &nbsp;</label>
                <i class="fas fa-th"></i> *
                <select class="form-control" style="width: 100%;" name="tipEquipo" id="tipEquipo">
                  <option value="0">Seleccione Tipo de Equipo</option>
                  <?php
                  $itemSeg23 = null;
                  $valorSeg23  = null;
                  $cat23 = ControladorCategorias::ctrListarCategorias($itemSeg23, $valorSeg23);
                  foreach ($cat23 as $key => $value) {
                    echo '<option value="' . $value["idCategoria"] . '">' . $value["categoria"] . '</option>';
                  }
                  ?>
                </select>

              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="serieEQ">N° de Serie &nbsp;</label>
                <i class="fas fa-desktop"></i> *
                <select class="form-control validaExiste" style="width: 100%;" name="serieEQ" id="serieEQ">
                  <option value="0">Seleccione tip EQ</option>
                </select>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="tsegmento1">Segmento &nbsp;</label>
                <i class="fas fa-border-style"></i> *
                <select class="form-control" style="width: 100%;" name="tsegmento" id="tsegmento1">
                  <option value="0" id="tsegmento">Seleccione Serie EQ</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="ofiEq1">Oficina/Dep &nbsp;</label>
                <i class="fas fa-sitemap"></i> *
                <select class="form-control" style="width: 100%;" name="ofiEq" id="ofiEq1">
                  <option value="0" id="ofiEq">Seleccione Serie EQ</option>
                </select>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="servEq1">Área/Servicio &nbsp;</label>
                <i class="fas fa-building"></i> *
                <select class="form-control" style="width: 100%;" name="servEq" id="servEq1">
                  <option value="0" id="servEq">Seleccione Serie EQ</option>

                </select>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="respEq1">Usuario Responsable &nbsp;</label>
                <i class="fas fa-user"></i> *
                <select class="form-control" style="width: 100%;" name="respEq" id="respEq1">
                  <option value="0" id="respEq">Seleccione Serie EQ</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-12">
              <div class="form-group">
                <label for="">Información detallada del Equipo &nbsp;</label>
                <i class="fas fa-hashtag"></i> *
                <textarea class="form-control" name="detaEQ" id="detaEQ" cols="1" rows="2" placeholder="Detalle del Equipo" readonly></textarea>
              </div>
            </div>
          </div>
          <p class="font-weight-bolder text-gray">II. Diagnosticos Realizados</p>
          <div class="row mt-2">
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="fEva">F.Evaluación &nbsp;</label>
                <i class="fas fa-calendar-alt"></i> *
                <input type="text" name="fEva" id="fEva" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask autocomplete="off" placeholder="dd/mm/yyyy">
                <input type="hidden" id="fEvaC" name="fEvaC">
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="condInEQ">Cond. Inicial(EQ) &nbsp;</label>
                <i class="fas fa-thermometer-half"></i> *
                <select class="form-control" style="width: 100%;" name="condInEQ" id="condInEQ">
                  <option value="0">Seleccione Condición</option>
                  <?php
                  $itemCIM = null;
                  $valorCIM  = null;
                  $ciManto = ControladorSituacion::ctrListarSituacionManto($itemCIM, $valorCIM);
                  foreach ($ciManto as $key => $value) {
                    echo '<option value="' . $value["idSituacion"] . '">' . $value["situacion"] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-12 col-md-5">
              <div class="form-group">
                <label for="tecEvEQ">Técnico Evaluador &nbsp;</label>
                <i class="fas fa-user-edit"></i> *
                <select class="form-control" style="width: 100%;" name="tecEvEQ" id="tecEvEQ">
                  <option value="0">Seleccione Técnico Evaluador</option>
                  <?php
                  $itemTecEva = null;
                  $valorTecEva  = null;
                  $tecEva = ControladorUsuarios::ctrListarTecnicos($itemTecEva, $valorTecEva);
                  foreach ($tecEva as $key => $value) {
                    echo '<option value="' . $value["id_usuario"] . '">' . $value["nombres"] . ' ' . $value["apellido_paterno"] . ' ' . $value["apellido_materno"] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-12">
              <div class="form-group">
                <label for="descIniEQ">Descripción del Incidente inicial &nbsp;</label>
                <i class="fas fa-chalkboard-teacher"></i> * (Indicar el problema, falla o inconveniente que presenta el equipo)
                <input type="text" name="descIniEQ" id="descIniEQ" class="form-control" autocomplete="off" placeholder="Ingrese descripción del incidente" maxlength="94">
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-12">
              <div class="form-group">
                <label for="">Diagnósticos Realizados &nbsp;</label>
                <i class="fas fa-laptop-medical"></i> * <span class="text-danger font-weight-bolder">Debe seleccionar al menos una opción</span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="d1" id="d1">
                  <option value="0">Selecciona Diagnostico</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="d2" id="d2" disabled>
                  <option value="0" id="d_2">Selecciona Diagnostico</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="d3" id="d3" disabled>
                  <option value="0">Selecciona Diagnostico</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="d4" id="d4" disabled>
                  <option value="0">Selecciona Diagnostico</option>
                </select>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="d5" id="d5" disabled>
                  <option value="0">Selecciona Diagnostico</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="d6" id="d6" disabled>
                  <option value="0">Selecciona Diagnostico</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="d7" id="d7" disabled>
                  <option value="0">Selecciona Diagnostico</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="d8" id="d8" disabled>
                  <option value="0">Selecciona Diagnostico</option>
                </select>
              </div>
            </div>
          </div>
          <p class="font-weight-bolder text-gray">III. Descripción de Acciones realizadas</p>
          <div class="row">
            <div class="col-12 col-md-12">
              <div class="form-group">
                <label for="priEvaEQ">Primera Evaluación &nbsp;</label>
                <i class="fas fa-camera-retro"></i> * (Impresión diagnóstica observada por el Tec. Responsable del Servicio)
                <input type="text" name="priEvaEQ" id="priEvaEQ" class="form-control" autocomplete="off" placeholder="Ingrese descripción primera evaluación" maxlength="94">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-2">
              <div class="form-group">
                <label for="fInicio">Fecha Inicio &nbsp;</label>
                <i class="fas fa-calendar-alt"></i> *
                <input type="text" name="fInicio" id="fInicio" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask autocomplete="off" placeholder="dd/mm/yyyy">
                <input type="hidden" name="fIniEv" id="fIniEv">
              </div>
            </div>
            <div class="col-12 col-md-2">
              <div class="form-group">
                <label for="fFin">Fecha Fin &nbsp;</label>
                <i class="fas fa-calendar-alt"></i> *
                <input type="text" name="fFin" id="fFin" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask autocomplete="off" placeholder="dd/mm/yyyy">
                <input type="hidden" name="fFinEv" id="fFinEv">
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="tipTrabEQ">Trabajo Realizado &nbsp;</label>
                <i class="fas fa-code-branch"></i> *
                <select class="form-control" style="width: 100%;" name="tipTrabEQ" id="tipTrabEQ">
                  <option value="0">Seleccione Trabajo realizado</option>
                  <?php
                  $itemTrabM = null;
                  $valorTrabM  = null;
                  $trabM = ControladorDiagnosticos::ctrListarTrabajosManto($itemTrabM, $valorTrabM);
                  foreach ($trabM as $key => $value) {
                    echo '<option value="' . $value["idTipoTrabajo"] . '">' . $value["tipoTrabajo"] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-12 col-md-5">
              <div class="form-group">
                <label for="tecEvEQ">Técnico Responsable &nbsp;</label>
                <i class="fas fa-user-cog"></i> *
                <select class="form-control" style="width: 100%;" name="tecResEQ" id="tecResEQ">
                  <option value="0">Seleccione Técnico Responsable</option>
                  <?php
                  $itemTecEva2 = null;
                  $valorTecEva2  = null;
                  $tecEva2 = ControladorUsuarios::ctrListarTecnicos($itemTecEva2, $valorTecEva2);
                  foreach ($tecEva2 as $key => $value) {
                    echo '<option value="' . $value["id_usuario"] . '">' . $value["nombres"] . ' ' . $value["apellido_paterno"] . ' ' . $value["apellido_materno"] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-12">
              <div class="form-group">
                <label for="">Acciones Realizadas &nbsp;</label>
                <i class="fas fa-tools"></i> * <span class="text-danger font-weight-bolder">Debe seleccionar al menos una opción</span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="a1" id="a1">
                  <option value="0">Selecciona Accion Realizada</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="a2" id="a2" disabled>
                  <option value="0">Selecciona Accion Realizada</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="a3" id="a3" disabled>
                  <option value="0">Selecciona Accion Realizada</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="a4" id="a4" disabled>
                  <option value="0">Selecciona Accion Realizada</option>
                </select>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="a5" id="a5" disabled>
                  <option value="0">Selecciona Accion Realizada</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="a6" id="a6" disabled>
                  <option value="0">Selecciona Accion Realizada</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="a7" id="a7" disabled>
                  <option value="0">Selecciona Accion Realizada</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="a8" id="a8" disabled>
                  <option value="0">Selecciona Accion Realizada</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-12">
              <div class="form-group">
                <label for="recoFEQ">Recomendaciones u Observaciones finales &nbsp;</label>
                <i class="fas fa-comment-medical"></i> * (Recomendaciones después de finalizado el trabajo)
                <!-- <input type="text" name="recoFEQ" id="recoFEQ" class="form-control" autocomplete="off" placeholder="Ingrese Recomendación u observacion final"> -->
                <textarea class="form-control" name="recoFEQ" id="recoFEQ" cols="1" rows="3" autocomplete="off" placeholder="Ingrese Recomendación u observacion final" maxlength="272"></textarea>
                <!-- <input type="text" name="recoFEQ" id="recoFEQ" class="form-control" autocomplete="off" placeholder="Ingrese Recomendación u observacion final"> -->
              </div>
            </div>
          </div>
          <p class="font-weight-bolder text-gray">IV. Observaciones del estado del Equipo</p>
          <div class="row">
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="estAtEQ">Estado de Atención &nbsp;</label>
                <i class="fas fa-signal"></i> *
                <select class="form-control" style="width: 100%;" name="estAtEQ" id="estAtEQ">
                  <option value="0">Seleccione Est. Atención</option>
                  <?php
                  $itemTEstaAtM = null;
                  $valorTEstaAtM  = null;
                  $tEstaAtM = ControladorEstados::ctrListarEstadosAtencion($itemTEstaAtM, $valorTEstaAtM);
                  foreach ($tEstaAtM as $key => $value) {
                    echo '<option value="' . $value["idEstAte"] . '">' . $value["estAte"] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="condFEQ">Cond. Final(EQ) &nbsp;</label>
                <i class="fas fa-thermometer-full"></i> *
                <select class="form-control" style="width: 100%;" name="condFEQ" id="condFEQ">
                  <option value="0">Seleccione Cond. Final</option>
                  <?php
                  $itemCondM = null;
                  $valorCondM  = null;
                  $CondM = ControladorSituacion::ctrListarSituacionManto($itemCondM, $valorCondM);
                  foreach ($CondM as $key => $value) {
                    echo '<option value="' . $value["idSituacion"] . '">' . $value["situacion"] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="tercEq">Serv. Terceros &nbsp;</label>
                <i class="fas fa-thermometer-full"></i> *
                <select class="form-control" style="width: 100%;" name="tercEq" id="tercEq">
                  <option value="SI">SI</option>
                  <option value="NO" selected>NO</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-sm-11 col-md-1 col-lg-1 col-xl-1">
              <label>Otros</label>
            </div>
            <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
              <div class="input-group">
                <div class="icheck-dark d-inline">
                  <input type="radio" id="radiorep1" name="obsOtros" value="SI">
                  <label for="radiorep1"> SI
                  </label>&nbsp;&nbsp;
                </div>
                <div class="icheck-dark d-inline">
                  <input type="radio" id="radiorep2" name="obsOtros" value="NO" checked>
                  <label for="radiorep2"> NO
                  </label>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <div class="form-group">
                <input type="text" name="detalleOtros" id="detalleOtros" class="form-control" autocomplete="off" readonly placeholder="Detalle otros">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-secondary" id="btnRegRepo"><i class="fas fa-save"></i> Registrar Ficha</button>
          <button type="reset" class="btn btn-danger"><i class="fas fa-eraser"></i> Limpiar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
        </div>
        <?php
        $registraRepo = new ControladorReposiciones();
        $registraRepo->ctrRegistrarReposicion();
        ?>
      </form>
    </div>
  </div>
</div>
<!-- Modal Registro de Reposicion -->
<!-- Modal Editar Reposicion -->
<div id="modal-editar-reposicion" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <form action="" role="form" id="formEdtRepo" method="post" class="frmManto1">
        <div class="modal-header text-center" style="background: #6c757d; color: white">
          <h4 class="modal-title">Editar Ficha de Mantenimiento</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="font-weight-bolder text-gray">I. Datos Generales del Equipo</p>
          <div class="row">
            <div class="col-12 col-md-2">
              <div class="form-group">
                <label for="fechita">N° de Ficha &nbsp; <i class="fas fa-file-invoice"></i> *</label>
                <input type="text" class="form-control" readonly name="ncorrelativo" id="ncorrelativo">
                <input type="hidden" name="idReposicion" id="idReposicion">
                <input type="hidden" name="uedtMant" id="uedtMant" value="<?php echo $_SESSION["id"]; ?>">
                <input type="hidden" name="edsegmentado" id="edsegmentado">
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="edtipEquipo">Tipo de Equipo &nbsp;</label>
                <i class="fas fa-th"></i> *
                <select class="form-control" style="width: 100%;" name="edtipEquipo" id="edtipEquipo">
                  <option value="0" id="edtipEquip1">Seleccione Tipo de Equipo</option>
                  <?php
                  $itemSeg23 = null;
                  $valorSeg23  = null;
                  $cat23 = ControladorCategorias::ctrListarCategorias($itemSeg23, $valorSeg23);
                  foreach ($cat23 as $key => $value) {
                    echo '<option value="' . $value["idCategoria"] . '">' . $value["categoria"] . '</option>';
                  }
                  ?>
                </select>

              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="edserieEQ">N° de Serie &nbsp;</label>
                <i class="fas fa-desktop"></i> *
                <select class="form-control validaExisteEdt" style="width: 100%;" name="edserieEQ" id="edserieEQ">
                  <option value="0" id="edserieEQ1">Seleccione tip EQ</option>
                </select>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtsegmento1">Segmento &nbsp;</label>
                <i class="fas fa-border-style"></i> *
                <select class="form-control" style="width: 100%;" name="edtsegmento" id="edtsegmento1">
                  <option value="0" id="edtsegmento">Seleccione Serie EQ</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edofiEq1">Oficina/Dep &nbsp;</label>
                <i class="fas fa-sitemap"></i> *
                <select class="form-control" style="width: 100%;" name="edofiEq" id="edofiEq1">
                  <option value="0" id="edofiEq">Seleccione Serie EQ</option>
                </select>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edservEq1">Área/Servicio &nbsp;</label>
                <i class="fas fa-building"></i> *
                <select class="form-control" style="width: 100%;" name="edservEq" id="edservEq1">
                  <option value="0" id="edservEq">Seleccione Serie EQ</option>

                </select>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edrespEq1">Usuario Responsable &nbsp;</label>
                <i class="fas fa-user"></i> *
                <select class="form-control" style="width: 100%;" name="edrespEq" id="edrespEq1">
                  <option value="0" id="edrespEq">Seleccione Serie EQ</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-12">
              <div class="form-group">
                <label for="eddetaEQ">Información detallada del Equipo &nbsp;</label>
                <i class="fas fa-hashtag"></i> *
                <textarea class="form-control" name="eddetaEQ" id="eddetaEQ" cols="1" rows="2" placeholder="Detalle del Equipo" readonly></textarea>
              </div>
            </div>
          </div>
          <p class="font-weight-bolder text-gray">II. Diagnosticos Realizados</p>
          <div class="row mt-2">
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="edfEva">F.Evaluación &nbsp;</label>
                <i class="fas fa-calendar-alt"></i> *
                <input type="text" name="edfEva" id="edfEva" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask autocomplete="off" placeholder="dd/mm/yyyy">
                <input type="hidden" id="edfEvaC" name="edfEvaC">
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edcondInEQ">Cond. Inicial(EQ) &nbsp;</label>
                <i class="fas fa-thermometer-half"></i> *
                <select class="form-control" style="width: 100%;" name="edcondInEQ" id="edcondInEQ">
                  <option value="0" id="edcondInEQ1">Seleccione Condición</option>
                  <?php
                  $itemCIM = null;
                  $valorCIM  = null;
                  $ciManto = ControladorSituacion::ctrListarSituacionManto($itemCIM, $valorCIM);
                  foreach ($ciManto as $key => $value) {
                    echo '<option value="' . $value["idSituacion"] . '">' . $value["situacion"] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-12 col-md-5">
              <div class="form-group">
                <label for="edtecEvEQ">Técnico Evaluador &nbsp;</label>
                <i class="fas fa-user-edit"></i> *
                <select class="form-control" style="width: 100%;" name="edtecEvEQ" id="edtecEvEQ">
                  <option value="0" id="edtecEvEQ1">Seleccione Técnico Evaluador</option>
                  <?php
                  $itemTecEva = null;
                  $valorTecEva  = null;
                  $tecEva = ControladorUsuarios::ctrListarTecnicos($itemTecEva, $valorTecEva);
                  foreach ($tecEva as $key => $value) {
                    echo '<option value="' . $value["id_usuario"] . '">' . $value["nombres"] . ' ' . $value["apellido_paterno"] . ' ' . $value["apellido_materno"] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-12">
              <div class="form-group">
                <label for="eddescIniEQ">Descripción del Incidente inicial &nbsp;</label>
                <i class="fas fa-chalkboard-teacher"></i> * (Indicar el problema, falla o inconveniente que presenta el equipo)
                <input type="text" name="eddescIniEQ" id="eddescIniEQ" class="form-control" autocomplete="off" placeholder="Ingrese descripción del incidente" maxlength="94">
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-md-12">
              <div class="form-group">
                <label for="">Diagnósticos Realizados &nbsp;</label>
                <i class="fas fa-laptop-medical"></i> * <span class="text-danger font-weight-bolder">Debe seleccionar al menos una opción</span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="edd1" id="edd1">
                  <option value="0" id="edd1_">Selecciona Diagnostico</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="edd2" id="edd2">
                  <option value="0" id="edd2_">Selecciona Diagnostico</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="edd3" id="edd3">
                  <option value="0" id="edd3_">Selecciona Diagnostico</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="edd4" id="edd4">
                  <option value="0" id="edd4_">Selecciona Diagnostico</option>
                </select>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="edd5" id="edd5">
                  <option value="0" id="edd5_">Selecciona Diagnostico</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="edd6" id="edd6">
                  <option value="0" id="edd6_">Selecciona Diagnostico</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="edd7" id="edd7">
                  <option value="0" id="edd7_">Selecciona Diagnostico</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="edd8" id="edd8">
                  <option value="0" id="edd8_">Selecciona Diagnostico</option>
                </select>
              </div>
            </div>
          </div>
          <p class="font-weight-bolder text-gray">III. Descripción de Acciones realizadas</p>
          <div class="row">
            <div class="col-12 col-md-12">
              <div class="form-group">
                <label for="edpriEvaEQ">Primera Evaluación &nbsp;</label>
                <i class="fas fa-camera-retro"></i> * (Impresión diagnóstica observada por el Tec. evaluador)
                <input type="text" name="edpriEvaEQ" id="edpriEvaEQ" class="form-control" autocomplete="off" placeholder="Ingrese descripción primera evaluación" maxlength="94">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-2">
              <div class="form-group">
                <label for="edfInicio">Fecha Inicio &nbsp;</label>
                <i class="fas fa-calendar-alt"></i> *
                <input type="text" name="edfInicio" id="edfInicio" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask autocomplete="off" placeholder="dd/mm/yyyy">
                <input type="hidden" name="edfIniEv" id="edfIniEv">
              </div>
            </div>
            <div class="col-12 col-md-2">
              <div class="form-group">
                <label for="edfFin">Fecha Fin &nbsp;</label>
                <i class="fas fa-calendar-alt"></i> *
                <input type="text" name="edfFin" id="edfFin" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask autocomplete="off" placeholder="dd/mm/yyyy">
                <input type="hidden" name="edfFinEv" id="edfFinEv">
              </div>
            </div>
            <div class="col-12 col-md-3">
              <div class="form-group">
                <label for="edtipTrabEQ">Trabajo Realizado &nbsp;</label>
                <i class="fas fa-code-branch"></i> *
                <select class="form-control" style="width: 100%;" name="edtipTrabEQ" id="edtipTrabEQ">
                  <option value="0" id="edtipTrabEQ1">Seleccione Trabajo realizado</option>
                  <?php
                  $itemTrabM = null;
                  $valorTrabM  = null;
                  $trabM = ControladorDiagnosticos::ctrListarTrabajosManto($itemTrabM, $valorTrabM);
                  foreach ($trabM as $key => $value) {
                    echo '<option value="' . $value["idTipoTrabajo"] . '">' . $value["tipoTrabajo"] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-12 col-md-5">
              <div class="form-group">
                <label for="edtecResEQ">Técnico Responsable &nbsp;</label>
                <i class="fas fa-user-cog"></i> *
                <select class="form-control" style="width: 100%;" name="edtecResEQ" id="edtecResEQ">
                  <option value="0" id="edtecResEQ1">Seleccione Técnico Responsable</option>
                  <?php
                  $itemTecEva = null;
                  $valorTecEva  = null;
                  $tecEva = ControladorUsuarios::ctrListarTecnicos($itemTecEva, $valorTecEva);
                  foreach ($tecEva as $key => $value) {
                    echo '<option value="' . $value["id_usuario"] . '">' . $value["nombres"] . ' ' . $value["apellido_paterno"] . ' ' . $value["apellido_materno"] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-12">
              <div class="form-group">
                <label for="">Acciones Realizadas &nbsp;</label>
                <i class="fas fa-tools"></i> * <span class="text-danger font-weight-bolder">Debe seleccionar al menos una opción</span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="eda1" id="eda1">
                  <option value="0" id="eda1_">Selecciona Accion Realizada</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="eda2" id="eda2">
                  <option value="0" id="eda2_">Selecciona Accion Realizada</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="eda3" id="eda3">
                  <option value="0" id="eda3_">Selecciona Accion Realizada</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="eda4" id="eda4">
                  <option value="0" id="eda4_">Selecciona Accion Realizada</option>
                </select>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="eda5" id="eda5">
                  <option value="0" id="eda5_">Selecciona Accion Realizada</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="eda6" id="eda6">
                  <option value="0" id="eda6_">Selecciona Accion Realizada</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="eda7" id="eda7">
                  <option value="0" id="eda7_">Selecciona Accion Realizada</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" style="width: 100%;" name="eda8" id="eda8">
                  <option value="0" id="eda8_">Selecciona Accion Realizada</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-12">
              <div class="form-group">
                <label for="edrecoFEQ">Recomendaciones u Observaciones finales &nbsp;</label>
                <i class="fas fa-comment-medical"></i> * (Recomendaciones después de finalizado el trabajo)

                <textarea class="form-control" name="edrecoFEQ" id="edrecoFEQ" cols="1" rows="3" autocomplete="off" placeholder="Ingrese Recomendación u observacion final" maxlength="272"></textarea>
              </div>
            </div>
          </div>
          <p class="font-weight-bolder text-gray">IV. Observaciones del estado del Equipo</p>
          <div class="row">
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edestAtEQ">Estado de Atención &nbsp;</label>
                <i class="fas fa-signal"></i> *
                <select class="form-control" style="width: 100%;" name="edestAtEQ" id="edestAtEQ">
                  <option value="0" id="edestAtEQ1">Seleccione Est. Atención</option>
                  <?php
                  $itemTEstaAtM = null;
                  $valorTEstaAtM  = null;
                  $tEstaAtM = ControladorEstados::ctrListarEstadosAtencion($itemTEstaAtM, $valorTEstaAtM);
                  foreach ($tEstaAtM as $key => $value) {
                    echo '<option value="' . $value["idEstAte"] . '">' . $value["estAte"] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edcondFEQ">Cond. Final(EQ) &nbsp;</label>
                <i class="fas fa-thermometer-full"></i> *
                <select class="form-control" style="width: 100%;" name="edcondFEQ" id="edcondFEQ">
                  <option value="0" id="edcondFEQ1">Seleccione Cond. Final</option>
                  <?php
                  $itemCondM = null;
                  $valorCondM  = null;
                  $CondM = ControladorSituacion::ctrListarSituacionManto($itemCondM, $valorCondM);
                  foreach ($CondM as $key => $value) {
                    echo '<option value="' . $value["idSituacion"] . '">' . $value["situacion"] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="edtercEq">Serv. Terceros &nbsp;</label>
                <i class="fas fa-thermometer-full"></i> *
                <select class="form-control" style="width: 100%;" name="edtercEq" id="edtercEq">
                  <option id="edtercEq1">SI</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-sm-11 col-md-1 col-lg-1 col-xl-1">
              <label>Otros</label>
            </div>
            <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
              <div class="input-group">
                <div class="icheck-dark d-inline">
                  <input type="radio" id="edradiorep1" name="edobsOtros" value="SI">
                  <label for="edradiorep1"> SI
                  </label>&nbsp;&nbsp;
                </div>
                <div class="icheck-dark d-inline">
                  <input type="radio" id="edradiorep2" name="edobsOtros" value="NO" checked>
                  <label for="edradiorep2"> NO
                  </label>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <div class="form-group">
                <input type="text" name="eddetalleOtros" id="eddetalleOtros" class="form-control" autocomplete="off" readonly placeholder="Detalle otros">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-secondary" id="btnEdtRepo"><i class="fas fa-save"></i> Guardar Cambios</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Salir</button>
        </div>
        <?php
        $editarRepo = new ControladorReposiciones();
        $editarRepo->ctrEditarReposicion();
        ?>
      </form>
    </div>
  </div>
</div>
<!-- Modal Editar Reposicion -->

<?php
$anulRepo = new ControladorReposiciones();
$anulRepo->ctrAnularReposicion();
?>