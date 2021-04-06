<?php
require_once "../controllers/ControladorMantenimiento.php";
require_once "../models/ModeloMantenimientos.php";

error_reporting(0);
class ImprimirFichaMantenimiento
{
        public $idMantenimiento;
        public $idTipo;

        public function imprimirFichaMant()
        {
                require_once "../util/tcpdf/headFichaMantenimiento.php";
                $idMant = $this->idMantenimiento;
                $idTip = $this->idTipo;

                // Test de lista de diagnosticos
                $diagList = '[{"id":"4","diagnostico":"Equipo Averiado","segmento":"Equipo de Cómputo","conteo":"1"},{"id":"24","diagnostico":"Detección de virus","segmento":"Equipo de Cómputo","conteo":"1"},{"id":"7","diagnostico":"Falla de disco duro","segmento":"Equipo de Cómputo","conteo":"1"},{"id":"14","diagnostico":"Falla de Equipo","segmento":"Equipo de Cómputo","conteo":"1"},{"id":"11","diagnostico":"Falta de mantenimiento","segmento":"Equipo de Cómputo","conteo":"1"},{"id":"9","diagnostico":"Memoria  RAM malograda","segmento":"Equipo de Cómputo","conteo":"1"},{"id":"9","diagnostico":"Memoria  RAM malograda","segmento":"Equipo de Cómputo","conteo":"1"},{"id":"9","diagnostico":"Memoria  RAM malograda","segmento":"Equipo de Cómputo","conteo":"1"}]';
                $diagnosis = json_decode($diagList, true);

                $diagList1 = '[{"id":"15","accion":"Eliminación de virus","segmento":"Equipo de Cómputo","conteo":"1"},{"id":"2","accion":"Formateo de disco duro","segmento":"Equipo de Cómputo","conteo":"1"},{"id":"12","accion":"Eliminación de temporales","segmento":"Equipo de Cómputo","conteo":"1"},{"id":"1","accion":"Copia de Seguridad","segmento":"Equipo de Cómputo","conteo":"1"},{"id":"17","accion":"Instalación de antivirus","segmento":"Equipo de Cómputo","conteo":"1"},{"id":"13","accion":"Instalación de programas","segmento":"Equipo de Cómputo","conteo":"1"},{"id":"13","accion":"Instalación de programas","segmento":"Equipo de Cómputo","conteo":"1"},{"id":"13","accion":"Instalación de programas","segmento":"Equipo de Cómputo","conteo":"1"}]';
                $diagnosis1 = json_decode($diagList1, true);
                // Test de lista de diagnosticos

                $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('OFICINA DE ESTADÍSTICA E INFORMÁTICA - SOPORTE TÉCNICO');
                $pdf->SetTitle('FICHA DE MANTENIMIENTO');
                $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
                $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                $pdf->SetMargins(10, 23, 10);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
                $pdf->setPrintFooter(false);
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
                $pdf->SetFont('helvetica', '', 9);
                $pdf->AddPage();
                $htmlhead = '<h3 style="text-align:center;">SOPORTE INFORMÁTICO Y TELECOMUNICACIONES<br><i>Reporte de Servicio Técnico</i></h3>';
                $pdf->writeHTMLCell(0, 0, -10, 27, $htmlhead, 0, 1, 0, true, 'L', true);
                $htmlhead = '<table cellpadding="2" cellspacing="1.5" class="block-1" style="text-align:center;"><tr>
                <td style="text-align:center; width:485px;background-color:white;"></td>
                <td style="width:70px;background-color:white;
                border-top:    0.7px solid  #000000;
                border-right:  0.7px solid #000000;
                border-bottom: 0.7px solid #000000;
                border-left:   0.7px solid  #000000;
                background-color: #E6E6E6;"><p style="text-align: center;"><b>FICHA N°</b></p></td>
                <td style="width:91px;background-color:white;
                border-top:    0.7px solid  #000000;
                border-right:  0.7px solid #000000;
                border-bottom: 0.7px solid #000000;
                background-color: #ffffff;"><p style="text-align: center;"><b>FM-2021-00001</b></p></td>
                </tr></table>';
                $pdf->writeHTMLCell(0, 0, 15, 27, $htmlhead, 0, 1, 0, true, 'L', true);
                $htmlhead2 = '<br>';
                $pdf->writeHTMLCell(0, 0, 15, 35, $htmlhead2, 0, 1, 0, true, 'L', true);

                // fORMATEO DE CUERPO DE FICHA
                $html = <<<EOF
        <table cellpadding="2" cellspacing="1.5" style="text-align:left;" border="">
        <tr>
            <td style="width:300px;background-color:white;background-color: white;"><p style="text-align: left;"><b>1. DATOS DE LA SOLICITUD</b></p></td>
        </tr>
        <tr>
                <td style="text-align:left; width:222.5px;background-color:white;
                border-top: 0.7px solid #000000;
                border-bottom: 0.7px solid #000000;
                border-left:   0.7px solid  #000000;
                background-color: #E6E6E6;"> <b>Dirección/Oficina/Servicio</b></td>
                <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                border-top: 0.7px solid #000000;
                border-bottom: 0.7px solid #000000;
                border-left:   0.7px solid  #000000;
                background-color: #E6E6E6;"> <b>Área y/o Ubicación Física</b></td>
                <td style="text-align:left; width:222.5px;background-color:white;
                border-top: 0.7px solid #000000;
                border-bottom: 0.7px solid #000000;
                border-left:   0.7px solid  #000000;
                border-right:   0.7px solid  #000000;
                background-color: #E6E6E6;"> <b>Usuario Responsable</b></td>
        </tr>
        <tr>
                <td style="text-align:left; width:222.5px;background-color:white;
                border-bottom: 0.7px solid #000000;
                border-left:   0.7px solid  #000000;
                background-color: #ffffff;"> Laboratorio y Patología Clínica</td>
                <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                border-bottom: 0.7px solid #000000;
                border-left:   0.7px solid  #000000;
                background-color: #ffffff;"> Sala de Operaciones</td>
                <td style="text-align:left; width:222.5px;background-color:white;
                border-bottom: 0.7px solid #000000;
                border-left:   0.7px solid  #000000;
                border-right:   0.7px solid  #000000;
                background-color: #ffffff;"> Moises Ronald Guerrero Sandoval</td>
        </tr>
        </table>
        <table cellpadding="2" cellspacing="1.5" style="text-align:left; padding:5px 10px;">
        <tr>
            <td style="width:667.5px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Datos del Equipo Afectado :.</b> <i>(Información del equipo afectado: tipo,modelo,marca,serie,cod.Patrimonio,N° ID, etc.)</i></p></td>
        </tr>
        <tr>
        <td style="text-align:left; width:85px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-left:  0.7px solid  #000000;
                border-top:  0.7px solid  #000000;
                background-color: #E6E6E6;"> <b>N° ID Equipo:</b></td>
        <td style="text-align:left; width:100px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-left:   0.7px solid  #000000;
                border-right:  0.7px solid  #000000;
                border-top:  0.7px solid  #000000;
                "> SERV_00001</td>
        <td style="text-align:left; width:110px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-top:  0.7px solid  #000000;
                background-color: #E6E6E6;"> <b>Tipo de Equipo:</b></td>
        <td style="text-align:left; width:150px;background-color:white;
                border-top:  0.7px solid  #000000;
                border-bottom:0.7px solid #000000;
                border-left:  0.7px solid  #000000;
                border-right:  0.7px solid  #000000;
                "> Servidor</td>
        <td style="text-align:left; width:59px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-top:  0.7px solid  #000000;
                background-color: #E6E6E6;"> <b>N° Serie:</b></td>
        <td style="text-align:left; width:159px;background-color:white;
                border-top:  0.7px solid  #000000;
                border-bottom:0.7px solid #000000;
                border-left:  0.7px solid  #000000;
                border-right:  0.7px solid  #000000;
                "> BDMEP0C5Y7N1FMBD</td>
        </tr>
        <tr>
        <td style="text-align:left; width:100px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-left:  0.7px solid  #000000;
                background-color: #E6E6E6;"> <b>Cod. Patrimonio:</b></td>
        <td style="text-align:left; width:145px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-left:   0.7px solid  #000000;
                border-right:  0.7px solid  #000000;
                "> 740841000067</td>
        <td style="text-align:left; width:60px;background-color:white;
                border-bottom:0.7px solid #000000;
                background-color: #E6E6E6;"> <b>Marca:</b></td>
        <td style="text-align:left; width:140px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-left:  0.7px solid  #000000;
                border-right:  0.7px solid  #000000;
                "> KONICA MINOLTA</td>
        <td style="text-align:left; width:59px;background-color:white;
                border-bottom:0.7px solid #000000;
                background-color: #E6E6E6;"> <b>Modelo:</b></td>
        <td style="text-align:left; width:159px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-left:  0.7px solid  #000000;
                border-right:  0.7px solid  #000000;
                "> ELITE 8300</td>
        </tr>
        <tr>
        <td style="text-align:left; width:105px;background-color:white;
            border-bottom:0.7px solid #000000;
            border-left:  0.7px solid  #000000;
            background-color: #E6E6E6;"> <b>Microprocesador:</b></td>
        <td style="text-align:left; width:140px;background-color:white;
            border-bottom:0.7px solid #000000;
            border-left:   0.7px solid  #000000;
            border-right:  0.7px solid  #000000;
            "> CORE I7 3.20GHZ</td>
        <td style="text-align:left; width:60px;background-color:white;
            border-bottom:0.7px solid #000000;
            background-color: #E6E6E6;"> <b>RAM:</b></td>
        <td style="text-align:left; width:140px;background-color:white;
            border-bottom:0.7px solid #000000;
            border-left:  0.7px solid  #000000;
            border-right:  0.7px solid  #000000;
            "> 128GB</td>
        <td style="text-align:left; width:79px;background-color:white;
            border-bottom:0.7px solid #000000;
            background-color: #E6E6E6;"> <b>Disco Duro:</b></td>
        <td style="text-align:left; width:139px;background-color:white;
            border-bottom:0.7px solid #000000;
            border-left:  0.7px solid  #000000;
            border-right:  0.7px solid  #000000;
            "> 1TB</td>
        </tr>
        <tr>
        <tr>
        <td style="text-align:center; width:667px;background-color:white;"></td>
        </tr>
        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>2. DETALLES DEL INCIDENTE Y DIAGNOSTICOS</b> <i>(Descripción del Incidente y diagnósticos realizados)</i></p></td>
        </tr>
        <tr>
        <td style="text-align:left; width:85px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-left:  0.7px solid  #000000;
                border-top:  0.7px solid  #000000;
                background-color: #E6E6E6;"> <b>F.Evaluación:</b></td>
        <td style="text-align:left; width:65px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-left:   0.7px solid  #000000;
                border-right:  0.7px solid  #000000;
                border-top:  0.7px solid  #000000;
                "> 01/02/2021</td>
        <td style="text-align:left; width:109.5px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-top:  0.7px solid  #000000;
                background-color: #E6E6E6;"> <b>Condición Inicial:</b></td>
        <td style="text-align:left; width:65px;background-color:white;
                border-top:  0.7px solid  #000000;
                border-bottom:0.7px solid #000000;
                border-left:  0.7px solid  #000000;
                border-right:  0.7px solid  #000000;
                "> Inoperativo</td>
        <td style="text-align:left; width:140px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-top:  0.7px solid  #000000;
                background-color: #E6E6E6;"> <b>Técnico Evaluador:</b></td>
        <td style="text-align:left; width:198.5px;background-color:white;
                border-top:  0.7px solid  #000000;
                border-bottom:0.7px solid #000000;
                border-left:  0.7px solid  #000000;
                border-right:  0.7px solid  #000000;
                "> Ivan Victor Chuquicaña Fernandez</td>
        </tr>
        <tr>
        <td style="text-align:left; width:150px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-left:  0.7px solid  #000000;
                background-color: #E6E6E6;"> <b>Desc. Inicial de Incidente:</b></td>
        <td style="text-align:left; width:519px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-left:   0.7px solid  #000000;
                border-right:  0.7px solid  #000000;
                "> </td>
        </tr>
        <tr>
            <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Diágnosticos Realizados :.</b> <i>(Lista de Diagnosticos realizados)</i></p></td>
        </tr>
        </table> 
        EOF;
                $pdf->writeHTML($html, false, false, false, false, '');
                foreach ($diagnosis as $key => $item) {
                        $bloqueDiagnosticos = <<<EOF
            <table style="text-align:left; padding:1.5px 0px;" border=>
            <tr>
                <td style="color:#000; background-color:white; width:671px; text-align:left">
                    • $item[diagnostico]
                </td>
            </tr>
            </table>
            EOF;
                        $pdf->writeHTML($bloqueDiagnosticos, false, false, false, false, '');
                }
                $html2 = <<<EOF
        <table cellpadding="2" cellspacing="1.5" style="text-align:left;" border="">
        <tr>
        <td style="width:669px;background-color:white;background-color: white;"><p style="text-align: left;"><b>3. DETALLES EVALUACIÓN DE EQUIPOS Y ACCIONES REALIZADAS</b> <i>(Descripción de trabajos realizados)</i></p></td>
        </tr>
        <tr>
        <td style="width:669px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Tiempo de Ejecución</b> <i>(Tiempo de trabajos y acciones realizadas)</i></p></td>
        </tr>
        <tr>
        <td style="text-align:left; width:85px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-left:  0.7px solid  #000000;
                border-top:  0.7px solid  #000000;
                background-color: #E6E6E6;"> <b>Fecha Inicio:</b></td>
        <td style="text-align:left; width:65px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-left:   0.7px solid  #000000;
                border-right:  0.7px solid  #000000;
                border-top:  0.7px solid  #000000;
                "> 01/02/2021</td>
        <td style="text-align:left; width:109.5px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-top:  0.7px solid  #000000;
                background-color: #E6E6E6;"> <b>Fecha Fin:</b></td>
        <td style="text-align:left; width:65px;background-color:white;
                border-top:  0.7px solid  #000000;
                border-bottom:0.7px solid #000000;
                border-left:  0.7px solid  #000000;
                border-right:  0.7px solid  #000000;
                "> 01/02/2021</td>
        <td style="text-align:left; width:140px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-top:  0.7px solid  #000000;
                background-color: #E6E6E6;"> <b>Trabajo Realizado:</b></td>
        <td style="text-align:left; width:198.5px;background-color:white;
                border-top:  0.7px solid  #000000;
                border-bottom:0.7px solid #000000;
                border-left:  0.7px solid  #000000;
                border-right:  0.7px solid  #000000;
                "> Mantenimiento Preventivo</td>
        </tr>
        <tr>
        <td style="text-align:left; width:150px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-left:  0.7px solid  #000000;
                background-color: #E6E6E6;"> <b>Desc. Primera Evaluación:</b></td>
        <td style="text-align:left; width:518.5px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-left:   0.7px solid  #000000;
                border-right:  0.7px solid  #000000;
                "> </td>
        </tr>
        <tr>
        
        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Acciones Realizadas :.</b> <i>(Lista de acciones o trabajos realizados)</i></p></td>
        </tr>
        </table> 
        EOF;
                $pdf->writeHTML($html2, false, false, false, false, '');
                foreach ($diagnosis1 as $key => $item) {
                        $bloqueAcciones = <<<EOF
            <table style="text-align:left; padding:1.5px 0px;" border=>
            <tr>
                <td style=";color:#000; background-color:white; width:671px; text-align:left">
                    • $item[accion]
                </td>
            </tr>
            </table>
            EOF;
                        $pdf->writeHTML($bloqueAcciones, false, false, false, false, '');
                }
                $html3 = <<<EOF
        <table cellpadding="2" cellspacing="1.5" style="text-align:left;" border="">
        <tr>
        <td style="text-align:left; width:195px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-top:0.7px solid #000000;
                border-left:  0.7px solid  #000000;
                background-color: #E6E6E6;"> <b>Recomendaciones u Obs. Finales:</b></td>
        <td style="text-align:left; width:474px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-left:   0.7px solid  #000000;
                border-top:0.7px solid #000000;
                border-right:  0.7px solid  #000000;
                "> Se recomienda tener más cuidado y limpieza</td>
        </tr>
        <tr>
        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>4. OBSERVACIONES Y ESTADO FINAL DEL EQUIPO</b> <i>(Información de situación final del equipo)</i></p></td>
        </tr>
        <tr>
        <td style="text-align:left; width:120px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-left:  0.7px solid  #000000;
                border-top:  0.7px solid  #000000;
                background-color: #E6E6E6;"> <b>Estado de Atención:</b></td>
        <td style="text-align:left; width:75px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-left:   0.7px solid  #000000;
                border-right:  0.7px solid  #000000;
                border-top:  0.7px solid  #000000;
                "> Pendiente</td>
        <td style="text-align:left; width:109.5px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-top:  0.7px solid  #000000;
                background-color: #E6E6E6;"> <b>Condición Final:</b></td>
        <td style="text-align:left; width:90px;background-color:white;
                border-top:  0.7px solid  #000000;
                border-bottom:0.7px solid #000000;
                border-left:  0.7px solid  #000000;
                border-right:  0.7px solid  #000000;
                "> Inoperativo</td>
        <td style="text-align:left; width:200px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-top:  0.7px solid  #000000;
                background-color: #E6E6E6;"> <b>¿Requiere Servicio de terceros?</b></td>
        <td style="text-align:left; width:70px;background-color:white;
                border-top:  0.7px solid  #000000;
                border-bottom:0.7px solid #000000;
                border-left:  0.7px solid  #000000;
                border-right:  0.7px solid  #000000;
                "> NO</td>
        </tr>
        <tr>
        <td style="text-align:left; width:45px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-left:  0.7px solid  #000000;
                background-color: #E6E6E6;"> <b>Otros:</b></td>
        <td style="text-align:left; width:45px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-left:   0.7px solid  #000000;
                border-right:  0.7px solid  #000000;
                "> SI</td>
        <td style="text-align:left; width:60px;background-color:white;
                border-bottom:0.7px solid #000000;
                background-color: #E6E6E6;"> <b>Detalles:</b></td>
        <td style="text-align:left; width:517.5px;background-color:white;
                border-bottom:0.7px solid #000000;
                border-left:  0.7px solid  #000000;
                border-right:  0.7px solid  #000000;
                "> </td>
        </tr>
        <tr>
        <td style="text-align:center; width:667px;background-color:white;"></td>
        </tr>
        <tr>
        <tr>
        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>5. SUSCRIPCION DEL ACTA</b> <i>(Firmas y sellos de usuario responsable,técnico evaluador y Oficina de Estadística e Informática)</i></p></td>
        </tr>
        <td style="text-align:center; width:222.5px;background-color:white;
        border-top: 0.7px solid #000000;
        border-bottom: 0.7px solid #000000;
        border-left:   0.7px solid  #000000;
        background-color: #E6E6E6;"> <b>V°B° Of. Estadística e Informática</b></td>
        <td style="text-align:center;vertical-align: middle; width:222.5px;background-color:white;
        border-top: 0.7px solid #000000;
        border-bottom: 0.7px solid #000000;
        border-left:   0.7px solid  #000000;
        background-color: #E6E6E6;"> <b>Técnico Evaluador</b></td>
        <td style="text-align:center; width:222.5px;background-color:white;
        border-top: 0.7px solid #000000;
        border-bottom: 0.7px solid #000000;
        border-left:   0.7px solid  #000000;
        border-right:   0.7px solid  #000000;
        background-color: #E6E6E6;"> <b>Usuario Responsable</b></td>
        </tr>
        <tr>
        <td style="text-align:left; width:222.5px;background-color:white;
        border-bottom: 0.7px solid #000000;
        border-left:   0.7px solid  #000000;
        background-color: #ffffff;"></td>
        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
        border-bottom: 0.7px solid #000000;
        border-left:   0.7px solid  #000000;
        background-color: #ffffff;"></td>
        <td style="text-align:left; width:222.5px;background-color:white;
        border-bottom: 0.7px solid #000000;
        border-left:   0.7px solid  #000000;
        border-right:   0.7px solid  #000000;
        background-color: #ffffff;"></td>
        </tr>
        <tr>
        <td style="text-align:left; width:222.5px;background-color:white;
        border-bottom: 0.7px solid #000000;
        border-left:   0.7px solid  #000000;
        background-color: #ffffff;"></td>
        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
        border-bottom: 0.7px solid #000000;
        border-left:   0.7px solid  #000000;
        background-color: #ffffff;"></td>
        <td style="text-align:left; width:222.5px;background-color:white;
        border-bottom: 0.7px solid #000000;
        border-left:   0.7px solid  #000000;
        border-right:   0.7px solid  #000000;
        background-color: #ffffff;"></td>
        </tr>
        <tr>
        <td style="text-align:left; width:222.5px;background-color:white;
        border-bottom: 0.7px solid #000000;
        border-left:   0.7px solid  #000000;
        background-color: #ffffff;"></td>
        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
        border-bottom: 0.7px solid #000000;
        border-left:   0.7px solid  #000000;
        background-color: #ffffff;"></td>
        <td style="text-align:left; width:222.5px;background-color:white;
        border-bottom: 0.7px solid #000000;
        border-left:   0.7px solid  #000000;
        border-right:   0.7px solid  #000000;
        background-color: #ffffff;"></td>
        </tr>
        <tr>
        <td style="text-align:center; width:222.5px;background-color:white;
        border-bottom: 0.7px solid #000000;
        border-left:   0.7px solid  #000000;
        background-color: #ffffff;"><b>FIRMA/SELLO</b></td>
        <td style="text-align:center;vertical-align: middle; width:222.5px;background-color:white;
        border-bottom: 0.7px solid #000000;
        border-left:   0.7px solid  #000000;
        background-color: #ffffff;"><b>FIRMA/SELLO</b></td>
        <td style="text-align:center; width:222.5px;background-color:white;
        border-bottom: 0.7px solid #000000;
        border-left:   0.7px solid  #000000;
        border-right:   0.7px solid  #000000;
        background-color: #ffffff;"><b>FIRMA/SELLO</b></td>
        </tr>
        </table> 
        EOF;
                $pdf->writeHTML($html3, false, false, false, false, '');
                // Bloque de dianosticos
                $pdf->Output('ficha-mantenimiento.pdf', 'I');
        }
}
$fichaImprimirMant = new ImprimirFichaMantenimiento();
$fichaImprimirMant->idMantenimiento = $_GET["idMantenimiento"];
$fichaImprimirMant->idTipo = $_GET["idTipo"];
$fichaImprimirMant->imprimirFichaMant();
