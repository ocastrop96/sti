<?php
$item = null;
$valor = null;

$usuarios = ControladorUsuarios::ctrListar($item, $valor);
$totalUsuarios = count($usuarios);

$oficinas = ControladorAreas::ctrListarAreas($item, $valor);
$totaloficinas = count($oficinas);

$servicios = ControladorSubareas::ctrListarSubAreas($item, $valor);
$totalservicios = count($servicios);

$responsables = ControladorResponsables::ctrListarResponsables($item, $valor);
$totalresponsables = count($responsables);
?>
<div class="col-lg-3 col-6">
    <div class="small-box bg-info">
        <div class="inner">
            <h3><?php echo number_format($totalUsuarios); ?></h3>
            <p>Usuarios del Sistema</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-stalker"></i>
        </div>
        <a href="usuarios" class="small-box-footer">Más info <i class="fas fa-chevron-circle-right"></i></a>
    </div>
</div>
<div class="col-lg-3 col-6">
    <div class="small-box bg-success">
        <div class="inner">
            <h3><?php echo number_format($totaloficinas); ?></h3>

            <p>Oficinas / Departamentos</p>
        </div>
        <div class="icon">
            <i class="ion ion-ios-home"></i>
        </div>
        <a href="oficinas" class="small-box-footer">Más info <i class="fas fa-chevron-circle-right"></i></a>
    </div>
</div>
<div class="col-lg-3 col-6">
    <div class="small-box bg-warning">
        <div class="inner">
            <h3><?php echo number_format($totalservicios); ?></h3>
            <p>Áreas / Servicios</p>
        </div>
        <div class="icon">
            <i class="ion ion-ios-briefcase"></i>
        </div>
        <a href="servicios" class="small-box-footer">Más info <i class="fas fa-chevron-circle-right"></i></a>
    </div>
</div>
<div class="col-lg-3 col-6">
    <div class="small-box bg-teal">
        <div class="inner">
            <h3><?php echo number_format($totalresponsables); ?></h3>

            <p>Usuarios Responsables</p>
        </div>
        <div class="icon">
            <i class="ion ion-ios-people"></i>
        </div>
        <a href="responsables" class="small-box-footer">Más info <i class="fas fa-chevron-circle-right"></i></a>
    </div>
</div>