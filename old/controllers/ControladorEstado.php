<?php
class ControladorEstados
{
    static public function ctrListarEstados($item, $valor)
    {
        $tabla = "ws_estado";
        $respuesta = ModeloEstado::mdlListarEstado($tabla, $item, $valor);
        return $respuesta;
    }
    static public function ctrListarEstadosAtencion($item, $valor)
    {
        $respuesta = ModeloEstado::mdlListarEstadoAtencion($item, $valor);
        return $respuesta;
    }
}
