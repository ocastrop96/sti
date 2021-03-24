<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4><strong>Registro de Mantenimientos</strong></h4>
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
            <div class="col-lg-6 col-xs-12">
                <div class="card card-secondary">
                    <div class="card-header with-border">
                        <h3 class="card-title">
                            <i class="far fa-edit"></i>
                            Ficha de Mantenimiento
                        </h3>
                    </div>
                    <form action="" role="form" id="formRegMant" method="post">
                        <div class="card-body">
                            <p class="font-weight-bolder text-gray">I. Datos Generales del Equipo</p>
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="fechita">Fecha de Registro &nbsp; <i class="fas fa-calendar-alt"></i> *</label>
                                        <input type="text" class="form-control" readonly value="<?php date_default_timezone_set('America/Lima');
                                                                                                $fechaActual = date('d-m-Y');
                                                                                                echo $fechaActual; ?>">
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
                                            <option value="0">Seleccione Serie de Equipo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="">Oficina/Departamento &nbsp;</label>
                                        <i class="fas fa-sitemap"></i> *
                                        <select class="form-control" style="width: 100%;" name="" id="">
                                            <option value="0">Seleccione Serie de Equipo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="">Área/Servicio &nbsp;</label>
                                        <i class="fas fa-building"></i> *
                                        <select class="form-control" style="width: 100%;" name="" id="">
                                            <option value="0">Seleccione Serie de Equipo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="">Usuario Responsable &nbsp;</label>
                                        <i class="fas fa-user"></i> *
                                        <select class="form-control" style="width: 100%;" name="" id="">
                                            <option value="0">Seleccione Serie de Equipo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Información detallada del Equipo &nbsp;</label>
                                        <i class="fas fa-hashtag"></i> *
                                        <textarea class="form-control" name="" id="" cols="2" rows="2" placeholder="Detalle del Equipo" readonly></textarea>
                                    </div>
                                </div>
                            </div>
                            <p class="font-weight-bolder text-gray disabled">II. Diagnosticos Realizados</p>
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha Evaluación &nbsp;</label>
                                        <i class="fas fa-calendar-alt"></i> *
                                        <input type="text" name="" id="" class="form-control" required autocomplete="off" placeholder="dd/mm/yyyy">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="">Condición Inicial del Equipo &nbsp;</label>
                                        <i class="fas fa-thermometer-half"></i> *
                                        <select class="form-control" style="width: 100%;" name="" id="">
                                            <option value="0">Seleccione Condición</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label for="">Técnico Evaluador &nbsp;</label>
                                        <i class="fas fa-thermometer-half"></i> *
                                        <select class="form-control" style="width: 100%;" name="" id="">
                                            <option value="0">Seleccione Técnico Evaluador</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Descripción del Incidente inicial &nbsp;</label>
                                        <i class="fas fa-chalkboard-teacher"></i> * (Indicar el problema, falla o inconveniente que presenta el equipo)
                                        <input type="text" name="" id="" class="form-control" required autocomplete="off" placeholder="Ingrese descripción del incidente">
                                    </div>
                                </div>
                            </div>
                            <!-- Bloque de diagnosticos -->
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group row nuevoDiagnostico">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="listaDiagnosticos" name="listaDiagnosticos">
                            <!-- Bloque de diagnosticos -->
                            <p class="font-weight-bolder text-gray disabled">III. Descripción de Acciones realizadas</p>

                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Primera Evaluación &nbsp;</label>
                                        <i class="fas fa-camera-retro"></i> * (Impresión diagnóstica observada por el Tec. evaluador)
                                        <input type="text" name="" id="" class="form-control" required autocomplete="off" placeholder="Ingrese descripción del incidente">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <p class="font-weight-bolder text-gray disabled">IV. Observaciones del estado del Equipo</p>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-secondary" id="btnRegMant"><i class="fas fa-save"></i> Registrar Ficha</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header with-border">
                                <h3 class="card-title">
                                    <i class="fas fa-laptop-medical"></i>
                                    Diagnósticos
                                </h3>
                            </div>
                            <div class="card-body">
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