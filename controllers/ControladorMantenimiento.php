<?php
class ControladorMantenimientos
{
    static public function ctrListarDatosEqOtros($dato)
    {
        $repuesta = ModeloMantenimientos::mdlListarDatosEqOtros($dato);
        return $repuesta;
    }
    static public function ctrListarDatosEqComputo($dato)
    {
        $repuesta = ModeloMantenimientos::mdlListarDatosEqComputo($dato);
        return $repuesta;
    }

    static public function ctrListarDatosEqRedes($dato)
    {
        $repuesta = ModeloMantenimientos::mdlListarDatosEqRedes($dato);
        return $repuesta;
    }
    static public function ctrListarDatosEqImp($dato)
    {
        $repuesta = ModeloMantenimientos::mdlListarDatosEqImp($dato);
        return $repuesta;
    }
    // Registrar Mantenimiento
    static public function ctrRegistrarMantenimiento()
    {
        if (isset($_POST["detaEQ"]) && isset($_POST["descIniEQ"]) && isset($_POST["priEvaEQ"]) && isset($_POST["recoFEQ"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ].+$/', $_POST["detaEQ"]) && preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ].+$/', $_POST["descIniEQ"]) && preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ].+$/', $_POST["priEvaEQ"]) && preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ].+$/', $_POST["recoFEQ"])) {
                if ($_POST["listaDiagnosticos"] != "" && $_POST["listaDiagnosticos"] != "[]" && $_POST["listaAcciones"] != "" && $_POST["listaAcciones"] != "[]") {
                    
                }
                else{
                    // Si los diagnósticos y acciones están vacía o sin registro mostrar error
                }
            } else {
                // Si envía datos que no cumnplen las reglas
            }
        }
    }
    static public function ctrEditarMantenimiento()
    {
    }
    // Registrar Mantenimiento
}
