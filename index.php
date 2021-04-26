<?php
//Controladores
require_once "controllers/ControladorPlantilla.php";
require_once "controllers/ControladorUsuarios.php";
require_once "controllers/ControladorAreas.php";
require_once "controllers/ControladorSubareas.php";
require_once "controllers/ControladorDiagnosticos.php";
require_once "controllers/ControladorAcciones.php";
require_once "controllers/ControladorResponsables.php";
require_once "controllers/ControladorCategorias.php";
require_once "controllers/ControladorSegmentos.php";
require_once "controllers/ControladorEquipos.php";
require_once "controllers/ControladorSituacion.php";
require_once "controllers/ControladorEstado.php";
require_once "controllers/ControladorIntegracion.php";
require_once "controllers/ControladorMantenimiento.php";
require_once "controllers/ControladorReposiciones.php";

//Modelos
require_once "models/ModeloUsuarios.php";
require_once "models/ModeloAreas.php";
require_once "models/ModeloSubareas.php";
require_once "models/ModeloDiagnosticos.php";
require_once "models/ModeloAcciones.php";
require_once "models/ModeloResponsables.php";
require_once "models/ModeloCategorias.php";
require_once "models/ModeloSegmentos.php";
require_once "models/ModeloEquipos.php";
require_once "models/ModeloSituacion.php";
require_once "models/ModeloEstados.php";
require_once "models/ModeloIntegracion.php";
require_once "models/ModeloMantenimientos.php";
require_once "models/ModeloReposiciones.php";

// Llamado a los objetos
$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();
