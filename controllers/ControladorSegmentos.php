<?php
class ControladorSegmentos{
    static public function ctrListarSegmentos($item,$valor){
        $tabla = "ws_segmento";
        $respuesta = ModeloSegmentos::mdlListarSegmentos($tabla,$item,$valor);
        return $respuesta;
    }
}