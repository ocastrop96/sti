<?php
class ControladorSituacion{
    static public function ctrListarSituacion($item,$valor)
    {
        $tabla = "ws_situacion";
        $respuesta = ModeloSituacion::mdlListarSituacion($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrListarSituacionManto($item,$valor)
    {
        $respuesta = ModeloSituacion::mdlListarSituacionManto($item, $valor);
        return $respuesta;
    }
}