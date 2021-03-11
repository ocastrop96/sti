<?php
class ControladorEstados{
    static public function ctrListarEstados($item,$valor)
    {
        $tabla = "ws_estado";
        $respuesta = ModeloEstado::mdlListarEstado($tabla, $item, $valor);
        return $respuesta;
    }
}