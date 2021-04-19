<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4><strong> Help Desk:. Registro de Mantenimientos</strong></h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="mantenimientos">Mantenimientos</a></li>
                        <li class="breadcrumb-item active">Registrar Mantenimiento</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="card card-info">
                    <div class="card-header with-border">
                        <h3 class="card-title">
                            <i class="far fa-edit"></i>
                            Ficha de Mantenimiento
                        </h3>
                    </div>
                    <form action="" role="form" id="formRegMant" method="post" class="frmManto1">
                        <div class="card-body">
                            <p class="font-weight-bolder text-gray">I. Datos Generales del Equipo</p>
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="fechita">F.Registro &nbsp; <i class="fas fa-calendar-alt"></i> *</label>
                                        <input type="text" class="form-control" readonly value="<?php date_default_timezone_set('America/Lima');
                                                                                                $fechaActual = date('d-m-Y');
                                                                                                echo $fechaActual; ?>">
                                        <input type="hidden" name="uregMant" id="uregMant" value="<?php echo $_SESSION["id"]; ?>">
                                        <input type="hidden" name="segmentado" id="segmentado">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
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
                                <div class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label for="serieEQ">N° de Serie &nbsp;</label>
                                        <i class="fas fa-desktop"></i> *
                                        <select class="form-control" style="width: 100%;" name="serieEQ" id="serieEQ">
                                            <option value="0">Seleccione tip EQ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Información detallada del Equipo &nbsp;</label>
                                        <i class="fas fa-hashtag"></i> *
                                        <textarea class="form-control" name="detaEQ" id="detaEQ" cols="1" rows="2" placeholder="Detalle del Equipo" readonly></textarea>
                                    </div>
                                </div>
                            </div>
                            <p class="font-weight-bolder text-gray disabled">II. Diagnosticos Realizados</p>
                            <div class="row">
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
                                        <i class="fas fa-thermometer-half"></i> *
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
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label for="descIniEQ">Descripción del Incidente inicial &nbsp;</label>
                                        <i class="fas fa-chalkboard-teacher"></i> * (Indicar el problema, falla o inconveniente que presenta el equipo)
                                        <input type="text" name="descIniEQ" id="descIniEQ" class="form-control" autocomplete="off" placeholder="Ingrese descripción del incidente">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8 col-md-8">
                                    <div class="form-group">
                                        <label for="">Diagnósticos Realizados &nbsp;</label>
                                        <i class="fas fa-laptop-medical"></i> *
                                    </div>
                                    <div class="col-4 col-md-4" id="">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <button type="button" class="btn btn-info" id="" data-toggle="modal" data-target="#modal-agregar-diagnosticos"><i class="fas fa-search"></i>&nbsp;Agregar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group row nuevoDiagnostico"></div>
                                    <input type="hidden" id="listaDiagnosticos" name="listaDiagnosticos">
                                </div>
                            </div>
                            <!-- Bloque de diagnosticos -->
                            <!-- Bloque de diagnosticos -->
                            <p class="font-weight-bolder text-gray disabled">III. Descripción de Acciones realizadas</p>

                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label for="priEvaEQ">Primera Evaluación &nbsp;</label>
                                        <i class="fas fa-camera-retro"></i> * (Impresión diagnóstica observada por el Tec. evaluador)
                                        <input type="text" name="priEvaEQ" id="priEvaEQ" class="form-control" autocomplete="off" placeholder="Ingrese descripción primera evaluación">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="fInicio">Fecha Inicio &nbsp;</label>
                                        <i class="fas fa-calendar-alt"></i> *
                                        <input type="text" name="fInicio" id="fInicio" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask autocomplete="off" placeholder="dd/mm/yyyy">
                                        <input type="hidden" name="fIniEv" id="fIniEv">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="fFin">Fecha Fin &nbsp;</label>
                                        <i class="fas fa-calendar-alt"></i> *
                                        <input type="text" name="fFin" id="fFin" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask autocomplete="off" placeholder="dd/mm/yyyy">
                                        <input type="hidden" name="fFinEv" id="fFinEv">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
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
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Acciones Realizadas &nbsp;</label>
                                        <i class="fas fa-tools"></i> *
                                        <input type="hidden" id="listaAcciones" name="listaAcciones">
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="form-group row nuevoAcciones"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label for="recoFEQ">Recomendaciones u Observaciones finales &nbsp;</label>
                                        <i class="fas fa-comment-medical"></i> * (Recomendaciones después de finalizado el trabajo)
                                        <input type="text" name="recoFEQ" id="recoFEQ" class="form-control" autocomplete="off" placeholder="Ingrese Recomendación u observacion final">
                                    </div>
                                </div>
                            </div>
                            <p class="font-weight-bolder text-gray disabled">IV. Observaciones del estado del Equipo</p>
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
                        <div class="card-footer">
                            <center><button type="submit" class="btn btn-secondary" id="btnRegMant"><i class="fas fa-save"></i> Registrar Ficha</button></center>
                        </div>
                        <?php
                        $registraMante = new ControladorMantenimientos();
                        $registraMante->ctrRegistrarMantenimiento();
                        ?>
                    </form>
                </div>
            </div>
            <!-- <div class="col-lg-5 col-xs-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header with-border">
                                <h3 class="card-title">
                                    <i class="fas fa-laptop-medical"></i>
                                    Diagnósticos
                                </h3>
                            </div>
                            <div class="card-body" id="tabDiagTemp">
                                <table id="tablaMDiagnosticoFrm" class="table table-bordered table-hover dt-responsive tablaMDiagnosticoFrm">
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
                    </div>
                    <div class="col-12">
                        <div class="card card-success">
                            <div class="card-header with-border">
                                <h3 class="card-title">
                                    <i class="fas fa-tools"></i>
                                    Acciones Realizadas
                                </h3>
                            </div>
                            <div class="card-body">
                                <table id="tablaAccionesFrm" class="table table-bordered table-hover dt-responsive tablaAccionesFrm">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Accion Realizada</th>
                                            <th>Segmento</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
</div>
<div id="modal-agregar-diagnosticos" class="modal fade" role="dialog" aria-modal="true" style="padding-right: 17px;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        </div>
    </div>
</div>