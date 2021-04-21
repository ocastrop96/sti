<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4><strong> Editar de Mantenimiento</strong></h4>
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
        <div class="row">
            <div class="col-lg-7 col-xs-12">
                <div class="card card-secondary">
                    <div class="card-header with-border">
                        <h3 class="card-title">
                            <i class="far fa-edit"></i>
                            Ficha de Mantenimiento
                        </h3>
                    </div>
                    <form action="" role="form" id="formRegMant" method="post" class="frmManto1">
                        <div class="card-body">
                            <?php
                            $item = "idMantenimiento";
                            $valor = $_GET["idMantenimiento"];

                            $fichaManto = ControladorMantenimientos::ctrListarFichasManto($item, $valor);
                            ?>
                            <p class="font-weight-bolder text-gray">I. Datos Generales del Equipo</p>
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="fechita">N° de Ficha &nbsp; <i class="fas fa-file-invoice"></i> *</label>
                                        <input type="text" class="form-control" readonly name="ncorrelativo">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="fechita">F.Registro &nbsp; <i class="fas fa-calendar-alt"></i> *</label>
                                        <input type="text" class="form-control" readonly value="<?php echo $fichaManto["fRegManto"]; ?>">
                                        <input type="hidden" name="uedtMant" id="uedtMant" value="<?php echo $_SESSION["id"]; ?>">
                                        <input type="hidden" name="segmentado" id="segmentado" value="<?php echo $fichaManto["sgmtoManto"]; ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="tipEquipo">T. Equipo &nbsp;</label>
                                        <i class="fas fa-th"></i> *
                                        <select class="form-control" style="width: 100%;" name="tipEquipo" id="tipEquipo">
                                            <option value="<?php echo $fichaManto["tipEquipo"]; ?>"><?php echo $fichaManto["categoria"]; ?></option>
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
                                        <select class="form-control" style="width: 100%;" name="serieEQ" id="serieEQ">
                                            <option value="<?php echo $fichaManto["idEquip"] ?>"><?php echo $fichaManto["serie"]; ?></option>
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
                                            <option value="<?php echo $fichaManto["oficEquip"] ?>" id="ofiEq"><?php echo $fichaManto["area"]; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="servEq1">Área/Servicio &nbsp;</label>
                                        <i class="fas fa-building"></i> *
                                        <select class="form-control" style="width: 100%;" name="servEq" id="servEq1">
                                            <option value="<?php echo $fichaManto["areaEquip"] ?>" id="servEq"><?php echo $fichaManto["subarea"]; ?></option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="respEq1">Usuario Responsable &nbsp;</label>
                                        <i class="fas fa-user"></i> *
                                        <select class="form-control" style="width: 100%;" name="respEq" id="respEq1">
                                            <option value="<?php echo $fichaManto["uResponsable"] ?>" id="respEq"><?php echo $fichaManto["responsable"]; ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Información detallada del Equipo &nbsp;</label>
                                        <i class="fas fa-hashtag"></i> *
                                        <textarea class="form-control" name="detaEQ" id="detaEQ" cols="1" rows="2" placeholder="Detalle del Equipo" readonly><?php echo $fichaManto["logdeta"]; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <p class="font-weight-bolder text-gray disabled">II. Diagnosticos Realizados</p>
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="fEva">F.Evaluación &nbsp;</label>
                                        <i class="fas fa-calendar-alt"></i> *
                                        <input type="text" name="fEva" id="fEva" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask autocomplete="off" placeholder="dd/mm/yyyy" value="<?php echo $fichaManto["fEval"] ?>">
                                        <input type="hidden" id="fEvaC" name="fEvaC" value="<?php $fEvac = $fichaManto["fEval"];
                                                                                            $dateFEva = str_replace('/', '-', $fEvac);
                                                                                            $fe1Eva = date('Y-m-d', strtotime($dateFEva));
                                                                                            echo $fe1Eva ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="condInEQ">Cond. Inicial(EQ) &nbsp;</label>
                                        <i class="fas fa-thermometer-half"></i> *
                                        <select class="form-control" style="width: 100%;" name="condInEQ" id="condInEQ">
                                            <option value="<?php echo $fichaManto["condInicial"]; ?>"><?php echo $fichaManto["cinicial"]; ?></option>
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
                                            <option value="<?php echo $fichaManto["tecEvalua"]; ?>"><?php echo $fichaManto["tecnico"]; ?></option>
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
                                        <input type="text" name="descIniEQ" id="descIniEQ" class="form-control" autocomplete="off" placeholder="Ingrese descripción del incidente" value="<?php echo $fichaManto["descInc"]; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Diagnósticos Realizados &nbsp;</label>
                                        <i class="fas fa-laptop-medical"></i> *
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="form-group row nuevoDiagnostico">
                                            <?php
                                            $listaDiagnosticos = json_decode($fichaManto["diagnosticos"], true);
                                            // var_dump($listaDiagnosticos);
                                            foreach ($listaDiagnosticos as $key => $value) {
                                                echo '<div class="col-md-12" style="padding-right:0px">
                                                            <div class= "input-group mt-1" >
                                                                <span class="input-group-addon"><button type="button" class="btn btn-danger btn-md quitarDiagnostico" idDiagnostico="' . $value["id"] . '"><i class="fas fa-trash-restore"></i></button></span> &nbsp;
                                                                <input type="text" class="form-control nuevaDescripcionDiagnostico" name="agregarDiagnostico" placeholder="Descripción del diagnóstico" idDiagnostico="' . $value["id"] . '" value="' . $value["diagnostico"] . '" segmento="' . $value["segmento"] . '" contable2="' . $value["conteo"] . '" required readonly>
                                                                <span class="input-group-addon ml-1"><button type="button" class="btn btn-warning btn-md"><i class="fas fa-border-style"></i></button></span> &nbsp;
                                                                <input type="text" class="form-control" name="" value="' . $value["segmento"] . '" required readonly>
                                                            </div>
                                                        </div >';
                                            }
                                            ?>
                                        </div>
                                        <input type="hidden" id="listaDiagnosticos" name="listaDiagnosticos">
                                    </div>
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
                                        <input type="text" name="priEvaEQ" id="priEvaEQ" class="form-control" autocomplete="off" placeholder="Ingrese descripción primera evaluación" value="<?php echo $fichaManto["primera_eval"]; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="fInicio">Fecha Inicio &nbsp;</label>
                                        <i class="fas fa-calendar-alt"></i> *
                                        <input type="text" name="fInicio" id="fInicio" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask autocomplete="off" placeholder="dd/mm/yyyy" value="<?php echo $fichaManto["fInic"]; ?>">
                                        <input type="hidden" name="fIniEv" id="fIniEv" value="<?php $fEvac1 = $fichaManto["fInic"];
                                                                                                $dateFEva1 = str_replace('/', '-', $fEvac1);
                                                                                                $fe1Eva1 = date('Y-m-d', strtotime($dateFEva1));
                                                                                                echo $fe1Eva1 ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="fFin">Fecha Fin &nbsp;</label>
                                        <i class="fas fa-calendar-alt"></i> *
                                        <input type="text" name="fFin" id="fFin" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask autocomplete="off" placeholder="dd/mm/yyyy" value="<?php echo $fichaManto["fFinE"]; ?>">
                                        <input type="hidden" name="fFinEv" id="fFinEv" value="<?php $fEvac2 = $fichaManto["fFinE"];
                                                                                                $dateFEva2 = str_replace('/', '-', $fEvac2);
                                                                                                $fe1Eva2 = date('Y-m-d', strtotime($dateFEva2));
                                                                                                echo $fe1Eva2 ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="tipTrabEQ">Trabajo Realizado &nbsp;</label>
                                        <i class="fas fa-code-branch"></i> *
                                        <select class="form-control" style="width: 100%;" name="tipTrabEQ" id="tipTrabEQ">
                                            <option value="<?php echo $fichaManto["tipTrabajo"]; ?>"><?php echo $fichaManto["tipoTrabajo"]; ?></option>
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
                                        <div class="form-group row nuevoAcciones">
                                            <?php
                                            $listaAcciones = json_decode($fichaManto["acciones"], true);
                                            // var_dump($listaAcciones);
                                            foreach ($listaAcciones as $key => $value) {
                                                echo '<div class="col-md-12" style="padding-right:0px">
                                                <div class= "input-group mt-1" >
                                                <span class="input-group-addon"><button type="button" class="btn btn-danger btn-md quitarAccion" idAccion="' . $value["id"] . '"><i class="fas fa-trash-restore"></i></button></span> &nbsp;
                                                <input type="text" class="form-control nuevaDescripcionAccion" name="agregarAccion" placeholder="Descripción de acción realizada" idAccion="' . $value["id"] . '" value="' . $value["accion"] . '" segmento="' . $value["segmento"] . '" contable="' . $value["conteo"] . '" required readonly>
                                                <span class="input-group-addon ml-1"><button type="button" class="btn btn-warning btn-md"><i class="fas fa-border-style"></i></button></span> &nbsp;
                                                <input type="text" class="form-control" name="" value="' . $value["segmento"] . '" required readonly>
                                                </div>
                                                </div >';
                                            }
                                            ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label for="recoFEQ">Recomendaciones u Observaciones finales &nbsp;</label>
                                        <i class="fas fa-comment-medical"></i> * (Recomendaciones después de finalizado el trabajo)
                                        <input type="text" name="recoFEQ" id="recoFEQ" class="form-control" autocomplete="off" placeholder="Ingrese Recomendación u observacion final" value="<?php echo $fichaManto["recomendaciones"]; ?>">
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
                                            <option value="<?php echo $fichaManto["estAtencion"]; ?>"><?php echo $fichaManto["estAte"]; ?></option>
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
                                            <option value="<?php echo $fichaManto["condFinal"]; ?>"><?php echo $fichaManto["cfinal"]; ?></option>
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
                                            <option value="<?php echo $fichaManto["servTerce"]; ?>"><?php echo $fichaManto["servTerce"]; ?></option>
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
                                            <input type="radio" id="radiorep1" name="obsOtros" value="SI" <?php
                                                                                                            echo ($fichaManto["otros"] == "SI") ? 'checked' : '' ?>>
                                            <label for="radiorep1"> SI
                                            </label>&nbsp;&nbsp;
                                        </div>
                                        <div class="icheck-dark d-inline">
                                            <input type="radio" id="radiorep2" name="obsOtros" value="NO" <?php
                                                                                                            echo ($fichaManto["otros"] == "NO") ? 'checked' : '' ?>>
                                            <label for="radiorep2"> NO
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <input type="text" name="detalleOtros" id="detalleOtros" class="form-control" autocomplete="off" <?php
                                                                                                                                            echo ($fichaManto["obsOtros"] != "") ? '' : 'readonly' ?> placeholder="Detalle otros" value="<?php echo $fichaManto["obsOtros"]; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <center><button type="submit" class="btn btn-secondary" id="btnEdtMant"><i class="fas fa-save"></i> Guardar cambios</button></center>
                        </div>
                        <?php
                        // $editaMante = new ControladorMantenimientos();
                        // $editaMante->ctrEditarMantenimiento();
                        ?>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 col-xs-12">
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
            </div>
        </div>
    </section>
</div>