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

                // Condiciones en base el tipo de Equipo
                if ($idTip == 1 || $idTip == 4 || $idTip == 5) {
                        $dato = $idMant;
                        $fichMantEq = ControladorMantenimientos::ctrListarMantoPC($dato);
                        // Test de lista de diagnosticos
                        // Bloque diagnosticos
                        if ($fichMantEq["diagnostico2"] != 0) {
                                $d2 = "• " . $fichMantEq["d2"];
                        } else {
                                $d2 = $fichMantEq["d2"];
                        }

                        if ($fichMantEq["diagnostico3"] != 0) {
                                $d3 = "• " . $fichMantEq["d3"];
                        } else {
                                $d3 = $fichMantEq["d3"];
                        }

                        if ($fichMantEq["diagnostico4"] != 0) {
                                $d4 = "• " . $fichMantEq["d4"];
                        } else {
                                $d4 = $fichMantEq["d4"];
                        }
                        if ($fichMantEq["diagnostico5"] != 0) {
                                $d5 = "• " . $fichMantEq["d5"];
                        } else {
                                $d5 = $fichMantEq["d5"];
                        }
                        if ($fichMantEq["diagnostico6"] != 0) {
                                $d6 = "• " . $fichMantEq["d6"];
                        } else {
                                $d6 = $fichMantEq["d6"];
                        }
                        if ($fichMantEq["diagnostico7"] != 0) {
                                $d7 = "• " . $fichMantEq["d7"];
                        } else {
                                $d7 = $fichMantEq["d7"];
                        }
                        if ($fichMantEq["diagnostico8"] != 0) {
                                $d8 = "• " . $fichMantEq["d8"];
                        } else {
                                $d8 = $fichMantEq["d8"];
                        }
                        // Bloque diagnosticos
                        // Bloque acciones
                        if ($fichMantEq["accion2"] != 0) {
                                $a2 = "• " . $fichMantEq["a2"];
                        } else {
                                $a2 = $fichMantEq["a2"];
                        }

                        if ($fichMantEq["accion3"] != 0) {
                                $a3 = "• " . $fichMantEq["a3"];
                        } else {
                                $a3 = $fichMantEq["a3"];
                        }

                        if ($fichMantEq["accion4"] != 0) {
                                $a4 = "• " . $fichMantEq["a4"];
                        } else {
                                $a4 = $fichMantEq["a4"];
                        }
                        if ($fichMantEq["accion5"] != 0) {
                                $a5 = "• " . $fichMantEq["a5"];
                        } else {
                                $a5 = $fichMantEq["a5"];
                        }
                        if ($fichMantEq["accion6"] != 0) {
                                $a6 = "• " . $fichMantEq["a6"];
                        } else {
                                $a6 = $fichMantEq["a6"];
                        }
                        if ($fichMantEq["accion7"] != 0) {
                                $a7 = "• " . $fichMantEq["a7"];
                        } else {
                                $a7 = $fichMantEq["a7"];
                        }
                        if ($fichMantEq["accion8"] != 0) {
                                $a8 = "• " . $fichMantEq["a8"];
                        } else {
                                $a8 = $fichMantEq["a8"];
                        }
                        // Bloque acciones

                        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                        $pdf->SetCreator(PDF_CREATOR);
                        $pdf->SetAuthor('OFICINA DE ESTADÍSTICA E INFORMÁTICA - SOPORTE TÉCNICO');
                        $pdf->SetTitle($fichMantEq["correlativo_Mant"]);
                        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
                        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
                        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                        $pdf->SetMargins(10, 23, 10);
                        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
                        $pdf->setPrintFooter(false);
                        $pdf->SetAutoPageBreak(TRUE, 5);
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
                                        background-color: #ffffff;"><p style="text-align: center;"><b>' . $fichMantEq["correlativo_Mant"] . '</b></p></td>
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
                                        background-color: #ffffff;"> $fichMantEq[area]</td>
                                        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                                        border-bottom: 0.7px solid #000000;
                                        border-left:   0.7px solid  #000000;
                                        background-color: #ffffff;">  $fichMantEq[subarea]</td>
                                        <td style="text-align:left; width:222.5px;background-color:white;
                                        border-bottom: 0.7px solid #000000;
                                        border-left:   0.7px solid  #000000;
                                        border-right:   0.7px solid  #000000;
                                        background-color: #ffffff;">  $fichMantEq[responsable]</td>
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
                                                ">  $fichMantEq[nro_eq]</td>
                                        <td style="text-align:left; width:110px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-top:  0.7px solid  #000000;
                                                background-color: #E6E6E6;"> <b>Tipo de Equipo:</b></td>
                                        <td style="text-align:left; width:150px;background-color:white;
                                                border-top:  0.7px solid  #000000;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                ">  $fichMantEq[categoria]</td>
                                        <td style="text-align:left; width:59px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-top:  0.7px solid  #000000;
                                                background-color: #E6E6E6;"> <b>N° Serie:</b></td>
                                        <td style="text-align:left; width:159px;background-color:white;
                                                border-top:  0.7px solid  #000000;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                ">  $fichMantEq[serie]</td>
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
                                                "> $fichMantEq[sbn]</td>
                                        <td style="text-align:left; width:60px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Marca:</b></td>
                                        <td style="text-align:left; width:140px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichMantEq[marca]</td>
                                        <td style="text-align:left; width:59px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Modelo:</b></td>
                                        <td style="text-align:left; width:159px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichMantEq[modelo]</td>
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
                                        "> $fichMantEq[procesador] $fichMantEq[vprocesador]</td>
                                        <td style="text-align:left; width:60px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        background-color: #E6E6E6;"> <b>RAM:</b></td>
                                        <td style="text-align:left; width:140px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantEq[ram]</td>
                                        <td style="text-align:left; width:79px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        background-color: #E6E6E6;"> <b>Disco Duro:</b></td>
                                        <td style="text-align:left; width:139px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantEq[discoDuro]</td>
                                </tr>
                                <tr>
                                <tr>
                                <td style="text-align:center; width:667px;background-color:white;"></td>
                                </tr>
                                <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>2. EVALUACIÓN DE INCIDENTE, DIAGNOSTICOS Y ACCIONES REALIZADAS</b></p></td>
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
                                        "> $fichMantEq[fEval]</td>
                                <td style="text-align:left; width:109.5px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Condición Inicial:</b></td>
                                <td style="text-align:left; width:65px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantEq[cinicial]</td>
                                <td style="text-align:left; width:140px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Técnico Evaluador:</b></td>
                                <td style="text-align:left; width:198.5px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantEq[tecnico]</td>
                                </tr>

                                <tr>
                                <td style="text-align:left; width:670.5px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Descripción Inicial de Incidente:</b></td>
                                </tr>
                                <tr>
                                <td style="text-align:left; width:670.5px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-left:   0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantEq[descInc]</td>
                                </tr>
                                <tr>
                                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Diágnosticos Realizados :.</b> <i>(Lista de Diagnosticos realizados)</i></p></td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> • $fichMantEq[d1]</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $d5</td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> $d2</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $d6</td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> $d3</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $d7</td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> $d4</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $d8</td>
                                </tr>
                                </table> 
                                EOF;
                        $pdf->writeHTML($html, false, false, false, false, '');
                        $html2 = <<<EOF
                                <table cellpadding="2" cellspacing="1.5" style="text-align:left;" border="">
                                <tr>
                                <td style="width:669px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Tiempo de Ejecución del Servicio</b></p></td>
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
                                        "> $fichMantEq[finic]</td>
                                <td style="text-align:left; width:109.5px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Fecha Fin:</b></td>
                                <td style="text-align:left; width:65px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantEq[ffin]</td>
                                <td style="text-align:left; width:140px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Trabajo Realizado:</b></td>
                                <td style="text-align:left; width:198.5px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantEq[tipoTrabajo]</td>
                                </tr>
                                <tr>
                                <td style="text-align:left; width:670.5px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Descripción de Primera Evaluación:</b></td>
                                </tr>
                                <tr>
                                <td style="text-align:left; width:670.5px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-left:   0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantEq[primera_eval]</td>
                                </tr>
                                <tr>
                                <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Acciones Realizadas :.</b> <i>(Acciones o trabajos realizados)</i></p></td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> • $fichMantEq[a1]</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $a5</td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> $a2</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $a6</td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> $a3</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $a7</td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> $a4</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $a8</td>
                                </tr>
                                </table> 
                                EOF;
                        $pdf->writeHTML($html2, false, false, false, false, '');
                        $html3 = <<<EOF
                                <table cellpadding="2" cellspacing="1.5" style="text-align:left;" border="">
                                <tr>
                                <td style="text-align:left; width:150px;background-color:white;
                                        border-top:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Técnico Responsable:</b></td>
                                <td style="text-align:left; width:519px;background-color:white;
                                        border-top:0.7px solid #000000;
                                        border-left:   0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantEq[tecresponsable]</td>
                                </tr>
                                <tr>
                                <td style="text-align:left; width:670.5px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        border-top:0.7px solid #000000;
                                        background-color: #E6E6E6;"> <b>Recomendaciones u Observaciones Finales:</b></td>
                                </tr>
                                <tr>
                                <td style="text-align:left; width:670.5px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-left:   0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantEq[recomendaciones]</td>
                                </tr>
                                <tr>
                                <td style="text-align:center; width:667px;background-color:white;"></td>
                                </tr>
                                <tr>
                                <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>3. OBSERVACIONES Y ESTADO FINAL DEL EQUIPO</b> <i>(Información de situación final del equipo)</i></p></td>
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
                                        "> $fichMantEq[estAte]</td>
                                <td style="text-align:left; width:109.5px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Condición Final:</b></td>
                                <td style="text-align:left; width:90px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantEq[cfinal]</td>
                                <td style="text-align:left; width:200px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>¿Requiere Servicio de terceros?</b></td>
                                <td style="text-align:left; width:68.5px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantEq[servTerce]</td>
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
                                        "> $fichMantEq[otros]</td>
                                <td style="text-align:left; width:60px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        background-color: #E6E6E6;"> <b>Detalles:</b></td>
                                <td style="text-align:left; width:516px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantEq[obsOtros]</td>
                                </tr>
                                <tr>
                                <td style="text-align:center; width:667px;background-color:white;"></td>
                                </tr>
                                <tr>
                                <tr>
                                <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>4. SUSCRIPCION DEL ACTA</b> <i>(Firmas y sellos de usuario responsable,técnico evaluador y Oficina de Estadística e Informática)</i></p></td>
                                </tr>
                                <br>
                                <td style="text-align:center; width:222.5px;background-color:white;
                                border-top: 0.7px solid #000000;
                                border-bottom: 0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>V°B° Of. Estadística e Informática</b></td>
                                <td style="text-align:center;vertical-align: middle; width:222.5px;background-color:white;
                                border-top: 0.7px solid #000000;
                                border-bottom: 0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Técnico Responsable</b></td>
                                <td style="text-align:center; width:222.5px;background-color:white;
                                border-top: 0.7px solid #000000;
                                border-bottom: 0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                border-right:   0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Usuario Responsable</b></td>
                                </tr>
                                <tr>
                                <td style="text-align:left; width:222.5px;background-color:white;
                                border-left:   0.7px solid  #000000;
                                background-color: #ffffff;"></td>
                                <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                                border-left:   0.7px solid  #000000;
                                background-color: #ffffff;"></td>
                                <td style="text-align:left; width:222.5px;background-color:white;
                                border-left:   0.7px solid  #000000;
                                border-right:   0.7px solid  #000000;
                                background-color: #ffffff;"></td>
                                </tr>
                                <tr>
                                <td style="text-align:left; width:222.5px;background-color:white;
                                border-left:   0.7px solid  #000000;
                                background-color: #ffffff;"></td>
                                <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                                border-left:   0.7px solid  #000000;
                                background-color: #ffffff;"></td>
                                <td style="text-align:left; width:222.5px;background-color:white;
                                border-left:   0.7px solid  #000000;
                                border-right:   0.7px solid  #000000;
                                background-color: #ffffff;"></td>
                                </tr>
                                <tr>
                                <td style="text-align:left; width:222.5px;background-color:white;
                                border-left:   0.7px solid  #000000;
                                background-color: #ffffff;"></td>
                                <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                                border-left:   0.7px solid  #000000;
                                background-color: #ffffff;"></td>
                                <td style="text-align:left; width:222.5px;background-color:white;
                                border-left:   0.7px solid  #000000;
                                border-right:   0.7px solid  #000000;
                                background-color: #ffffff;"></td>
                                </tr>
                                <tr>
                                <td style="text-align:left; width:222.5px;background-color:white;
                                border-left:   0.7px solid  #000000;
                                background-color: #ffffff;"></td>
                                <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                                border-left:   0.7px solid  #000000;
                                background-color: #ffffff;"></td>
                                <td style="text-align:left; width:222.5px;background-color:white;
                                border-left:   0.7px solid  #000000;
                                border-right:   0.7px solid  #000000;
                                background-color: #ffffff;"></td>
                                </tr>
                                <tr>
                                <td style="text-align:left; width:222.5px;background-color:white;
                                border-left:   0.7px solid  #000000;
                                background-color: #ffffff;"></td>
                                <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                                border-left:   0.7px solid  #000000;
                                background-color: #ffffff;"></td>
                                <td style="text-align:left; width:222.5px;background-color:white;
                                border-left:   0.7px solid  #000000;
                                border-right:   0.7px solid  #000000;
                                background-color: #ffffff;"></td>
                                </tr>
                                <tr>
                                <td style="text-align:left; width:222.5px;background-color:white;
                                border-bottom: 1px solid #000000;
                                border-left:   0.7px solid  #000000;
                                background-color: #ffffff;"></td>
                                <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                                border-bottom: 1px solid #000000;
                                border-left:   0.7px solid  #000000;
                                background-color: #ffffff;"></td>
                                <td style="text-align:left; width:222.5px;background-color:white;
                                border-bottom: 1px solid #000000;
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
                                background-color: #ffffff;"><b>$fichMantEq[tecresponsable]</b></td>
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
                        $pdf->Output($fichMantEq["correlativo_Mant"] . '.pdf', 'I');
                }
                // Listar Datos Equipos de Red
                elseif ($idTip == 2 || $idTip == 6 || $idTip == 7 || $idTip == 8) {
                        $dato = $idMant;
                        $fichMantEq = ControladorMantenimientos::ctrListarMantoRedes($dato);
                        // Bloque diagnosticos
                        if ($fichMantEq["diagnostico2"] != 0) {
                                $d2 = "• " . $fichMantEq["d2"];
                        } else {
                                $d2 = $fichMantEq["d2"];
                        }

                        if ($fichMantEq["diagnostico3"] != 0) {
                                $d3 = "• " . $fichMantEq["d3"];
                        } else {
                                $d3 = $fichMantEq["d3"];
                        }

                        if ($fichMantEq["diagnostico4"] != 0) {
                                $d4 = "• " . $fichMantEq["d4"];
                        } else {
                                $d4 = $fichMantEq["d4"];
                        }
                        if ($fichMantEq["diagnostico5"] != 0) {
                                $d5 = "• " . $fichMantEq["d5"];
                        } else {
                                $d5 = $fichMantEq["d5"];
                        }
                        if ($fichMantEq["diagnostico6"] != 0) {
                                $d6 = "• " . $fichMantEq["d6"];
                        } else {
                                $d6 = $fichMantEq["d6"];
                        }
                        if ($fichMantEq["diagnostico7"] != 0) {
                                $d7 = "• " . $fichMantEq["d7"];
                        } else {
                                $d7 = $fichMantEq["d7"];
                        }
                        if ($fichMantEq["diagnostico8"] != 0) {
                                $d8 = "• " . $fichMantEq["d8"];
                        } else {
                                $d8 = $fichMantEq["d8"];
                        }
                        // Bloque diagnosticos
                        // Bloque acciones
                        if ($fichMantEq["accion2"] != 0) {
                                $a2 = "• " . $fichMantEq["a2"];
                        } else {
                                $a2 = $fichMantEq["a2"];
                        }

                        if ($fichMantEq["accion3"] != 0) {
                                $a3 = "• " . $fichMantEq["a3"];
                        } else {
                                $a3 = $fichMantEq["a3"];
                        }

                        if ($fichMantEq["accion4"] != 0) {
                                $a4 = "• " . $fichMantEq["a4"];
                        } else {
                                $a4 = $fichMantEq["a4"];
                        }
                        if ($fichMantEq["accion5"] != 0) {
                                $a5 = "• " . $fichMantEq["a5"];
                        } else {
                                $a5 = $fichMantEq["a5"];
                        }
                        if ($fichMantEq["accion6"] != 0) {
                                $a6 = "• " . $fichMantEq["a6"];
                        } else {
                                $a6 = $fichMantEq["a6"];
                        }
                        if ($fichMantEq["accion7"] != 0) {
                                $a7 = "• " . $fichMantEq["a7"];
                        } else {
                                $a7 = $fichMantEq["a7"];
                        }
                        if ($fichMantEq["accion8"] != 0) {
                                $a8 = "• " . $fichMantEq["a8"];
                        } else {
                                $a8 = $fichMantEq["a8"];
                        }
                        // Bloque acciones

                        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                        $pdf->SetCreator(PDF_CREATOR);
                        $pdf->SetAuthor('OFICINA DE ESTADÍSTICA E INFORMÁTICA - SOPORTE TÉCNICO');
                        $pdf->SetTitle($fichMantEq["correlativo_Mant"]);
                        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
                        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
                        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                        $pdf->SetMargins(10, 23, 10);
                        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
                        $pdf->setPrintFooter(false);
                        $pdf->SetAutoPageBreak(TRUE, 5);
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
                        background-color: #ffffff;"><p style="text-align: center;"><b>' . $fichMantEq["correlativo_Mant"] . '</b></p></td>
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
                                background-color: #ffffff;"> $fichMantEq[area]</td>
                                <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                                border-bottom: 0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                background-color: #ffffff;"> $fichMantEq[subarea]</td>
                                <td style="text-align:left; width:222.5px;background-color:white;
                                border-bottom: 0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                border-right:   0.7px solid  #000000;
                                background-color: #ffffff;"> $fichMantEq[responsable]</td>
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
                                        "> $fichMantEq[nro_eq]</td>
                        <td style="text-align:left; width:110px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Tipo de Equipo:</b></td>
                        <td style="text-align:left; width:150px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantEq[categoria]</td>
                        <td style="text-align:left; width:59px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>N° Serie:</b></td>
                        <td style="text-align:left; width:159px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantEq[serie]</td>
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
                                                "> $fichMantEq[sbn]</td>
                                <td style="text-align:left; width:60px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Marca:</b></td>
                                <td style="text-align:left; width:140px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichMantEq[marca]</td>
                                <td style="text-align:left; width:59px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Modelo:</b></td>
                                <td style="text-align:left; width:159px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichMantEq[modelo]</td>
                        </tr>
                        <tr>
                        <tr>
                        <td style="text-align:center; width:667px;background-color:white;"></td>
                        </tr>
                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>2. EVALUACIÓN DE INCIDENTE, DIAGNOSTICOS Y ACCIONES REALIZADAS</b></p></td>
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
                                "> $fichMantEq[fEval]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Condición Inicial:</b></td>
                        <td style="text-align:left; width:65px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[cinicial]</td>
                        <td style="text-align:left; width:140px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Técnico Evaluador:</b></td>
                        <td style="text-align:left; width:198.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[tecnico]</td>
                        </tr>

                        <tr>
                                <td style="text-align:left; width:670.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Descripción Inicial de Incidente:</b></td>
                        </tr>
                        <tr>
                                <td style="text-align:left; width:670.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[descInc]</td>
                        </tr>
                        <tr>
                                <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Diágnosticos Realizados :.</b> <i>(Lista de Diagnosticos realizados)</i></p></td>
                        </tr>
                        <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> • $fichMantEq[d1]</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $d5</td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> $d2</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $d6</td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> $d3</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $d7</td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> $d4</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $d8</td>
                                </tr>
                        </table> 
                        EOF;
                        $pdf->writeHTML($html, false, false, false, false, '');

                        $html2 = <<<EOF
                        <table cellpadding="2" cellspacing="1.5" style="text-align:left;" border="">
                        <tr>
                        <td style="width:669px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Tiempo de Ejecución del Servicio</b></p></td>
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
                                "> $fichMantEq[finic]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Fecha Fin:</b></td>
                        <td style="text-align:left; width:65px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[ffin]</td>
                        <td style="text-align:left; width:140px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Trabajo Realizado:</b></td>
                        <td style="text-align:left; width:198.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[tipoTrabajo]</td>
                        </tr>
                        <tr>
                                <td style="text-align:left; width:670.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Descripción de Primera Evaluación:</b></td>
                        </tr>
                        <tr>
                                <td style="text-align:left; width:670.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[primera_eval]</td>
                        </tr>
                        <tr>
                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Acciones Realizadas :.</b> <i>(Lista de acciones o trabajos realizados)</i></p></td>
                        </tr>
                        <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> • $fichMantEq[a1]</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $a5</td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> $a2</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $a6</td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> $a3</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $a7</td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> $a4</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $a8</td>
                                </tr>
                        </table> 
                        EOF;
                        $pdf->writeHTML($html2, false, false, false, false, '');
                        $html3 = <<<EOF
                        <table cellpadding="2" cellspacing="1.5" style="text-align:left;" border="">
                        <tr>
                        <td style="text-align:left; width:150px;background-color:white;
                                border-top:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Técnico Responsable:</b></td>
                        <td style="text-align:left; width:519px;background-color:white;
                                border-top:0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[tecresponsable]</td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:670.5px;background-color:white;
                            border-bottom:0.7px solid #000000;
                            border-left:  0.7px solid  #000000;
                            border-right:  0.7px solid  #000000;
                            border-top:0.7px solid #000000;
                            background-color: #E6E6E6;"> <b>Recomendaciones u Observaciones Finales:</b></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:670.5px;background-color:white;
                            border-bottom:0.7px solid #000000;
                            border-left:   0.7px solid  #000000;
                            border-right:  0.7px solid  #000000;
                            "> $fichMantEq[recomendaciones]</td>
                        </tr>
                        <tr>
                        <tr>
                        <td style="text-align:center; width:667px;background-color:white;"></td>
                        </tr>
                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>3. OBSERVACIONES Y ESTADO FINAL DEL EQUIPO</b> <i>(Información de situación final del equipo)</i></p></td>
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
                                "> $fichMantEq[estAte]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Condición Final:</b></td>
                        <td style="text-align:left; width:90px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[cfinal]</td>
                        <td style="text-align:left; width:200px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>¿Requiere Servicio de terceros?</b></td>
                        <td style="text-align:left; width:68.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[servTerce]</td>
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
                                "> $fichMantEq[otros]</td>
                        <td style="text-align:left; width:60px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                background-color: #E6E6E6;"> <b>Detalles:</b></td>
                        <td style="text-align:left; width:516px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[obsOtros]</td>
                        </tr>
                        <br>
                        <tr>
                        <tr>
                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>4. SUSCRIPCION DEL ACTA</b> <i>(Firmas y sellos de usuario responsable,técnico evaluador y Oficina de Estadística e Informática)</i></p></td>
                        </tr>
                        <br>
                        <td style="text-align:center; width:222.5px;background-color:white;
                        border-top: 0.7px solid #000000;
                        border-bottom: 0.7px solid #000000;
                        border-left:   0.7px solid  #000000;
                        background-color: #E6E6E6;"> <b>V°B° Of. Estadística e Informática</b></td>
                        <td style="text-align:center;vertical-align: middle; width:222.5px;background-color:white;
                        border-top: 0.7px solid #000000;
                        border-bottom: 0.7px solid #000000;
                        border-left:   0.7px solid  #000000;
                        background-color: #E6E6E6;"> <b>Técnico Responsable</b></td>
                        <td style="text-align:center; width:222.5px;background-color:white;
                        border-top: 0.7px solid #000000;
                        border-bottom: 0.7px solid #000000;
                        border-left:   0.7px solid  #000000;
                        border-right:   0.7px solid  #000000;
                        background-color: #E6E6E6;"> <b>Usuario Responsable</b></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        border-right:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        border-right:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        border-right:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        border-right:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        border-right:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-bottom: 1px solid #000000;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                        border-bottom: 1px solid #000000;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-bottom: 1px solid #000000;
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
                        background-color: #ffffff;"><b>$fichMantEq[tecresponsable]</b></td>
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
                        $pdf->Output($fichMantEq["correlativo_Mant"] . '.pdf', 'I');
                }
                // Listar Datos Equipos de Red
                // Listar Datos Equipos de Impresoras y Perifericos
                elseif ($idTip == 3 || $idTip == 9 || $idTip == 14 || $idTip == 15 || $idTip == 16 || $idTip == 17) {
                        $dato = $idMant;
                        $fichMantEq = ControladorMantenimientos::ctrListarMantoImpresoras($dato);
                        // Bloque diagnosticos
                        if ($fichMantEq["diagnostico2"] != 0) {
                                $d2 = "• " . $fichMantEq["d2"];
                        } else {
                                $d2 = $fichMantEq["d2"];
                        }

                        if ($fichMantEq["diagnostico3"] != 0) {
                                $d3 = "• " . $fichMantEq["d3"];
                        } else {
                                $d3 = $fichMantEq["d3"];
                        }

                        if ($fichMantEq["diagnostico4"] != 0) {
                                $d4 = "• " . $fichMantEq["d4"];
                        } else {
                                $d4 = $fichMantEq["d4"];
                        }
                        if ($fichMantEq["diagnostico5"] != 0) {
                                $d5 = "• " . $fichMantEq["d5"];
                        } else {
                                $d5 = $fichMantEq["d5"];
                        }
                        if ($fichMantEq["diagnostico6"] != 0) {
                                $d6 = "• " . $fichMantEq["d6"];
                        } else {
                                $d6 = $fichMantEq["d6"];
                        }
                        if ($fichMantEq["diagnostico7"] != 0) {
                                $d7 = "• " . $fichMantEq["d7"];
                        } else {
                                $d7 = $fichMantEq["d7"];
                        }
                        if ($fichMantEq["diagnostico8"] != 0) {
                                $d8 = "• " . $fichMantEq["d8"];
                        } else {
                                $d8 = $fichMantEq["d8"];
                        }
                        // Bloque diagnosticos
                        // Bloque acciones
                        if ($fichMantEq["accion2"] != 0) {
                                $a2 = "• " . $fichMantEq["a2"];
                        } else {
                                $a2 = $fichMantEq["a2"];
                        }

                        if ($fichMantEq["accion3"] != 0) {
                                $a3 = "• " . $fichMantEq["a3"];
                        } else {
                                $a3 = $fichMantEq["a3"];
                        }

                        if ($fichMantEq["accion4"] != 0) {
                                $a4 = "• " . $fichMantEq["a4"];
                        } else {
                                $a4 = $fichMantEq["a4"];
                        }
                        if ($fichMantEq["accion5"] != 0) {
                                $a5 = "• " . $fichMantEq["a5"];
                        } else {
                                $a5 = $fichMantEq["a5"];
                        }
                        if ($fichMantEq["accion6"] != 0) {
                                $a6 = "• " . $fichMantEq["a6"];
                        } else {
                                $a6 = $fichMantEq["a6"];
                        }
                        if ($fichMantEq["accion7"] != 0) {
                                $a7 = "• " . $fichMantEq["a7"];
                        } else {
                                $a7 = $fichMantEq["a7"];
                        }
                        if ($fichMantEq["accion8"] != 0) {
                                $a8 = "• " . $fichMantEq["a8"];
                        } else {
                                $a8 = $fichMantEq["a8"];
                        }
                        // Bloque acciones

                        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                        $pdf->SetCreator(PDF_CREATOR);
                        $pdf->SetAuthor('OFICINA DE ESTADÍSTICA E INFORMÁTICA - SOPORTE TÉCNICO');
                        $pdf->SetTitle($fichMantEq["correlativo_Mant"]);
                        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
                        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
                        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                        $pdf->SetMargins(10, 23, 10);
                        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
                        $pdf->setPrintFooter(false);
                        $pdf->SetAutoPageBreak(TRUE, 5);
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
                        background-color: #ffffff;"><p style="text-align: center;"><b>' . $fichMantEq["correlativo_Mant"] . '</b></p></td>
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
                                background-color: #ffffff;"> $fichMantEq[area]</td>
                                <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                                border-bottom: 0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                background-color: #ffffff;"> $fichMantEq[subarea]</td>
                                <td style="text-align:left; width:222.5px;background-color:white;
                                border-bottom: 0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                border-right:   0.7px solid  #000000;
                                background-color: #ffffff;"> $fichMantEq[responsable]</td>
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
                                        "> $fichMantEq[nro_eq]</td>
                        <td style="text-align:left; width:110px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Tipo de Equipo:</b></td>
                        <td style="text-align:left; width:150px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantEq[categoria]</td>
                        <td style="text-align:left; width:59px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>N° Serie:</b></td>
                        <td style="text-align:left; width:159px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantEq[serie]</td>
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
                                                "> $fichMantEq[sbn]</td>
                                <td style="text-align:left; width:60px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Marca:</b></td>
                                <td style="text-align:left; width:140px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichMantEq[marca]</td>
                                <td style="text-align:left; width:59px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Modelo:</b></td>
                                <td style="text-align:left; width:159px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichMantEq[modelo]</td>
                        </tr>
                        <tr>
                        <tr>
                        <td style="text-align:center; width:667px;background-color:white;"></td>
                        </tr>
                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>2. EVALUACIÓN DE INCIDENTE, DIAGNOSTICOS Y ACCIONES REALIZADAS</b></p></td>
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
                                "> $fichMantEq[fEval]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Condición Inicial:</b></td>
                        <td style="text-align:left; width:65px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[cinicial]</td>
                        <td style="text-align:left; width:140px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Técnico Evaluador:</b></td>
                        <td style="text-align:left; width:198.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[tecnico]</td>
                        </tr>

                        <tr>
                                <td style="text-align:left; width:670.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Descripción Inicial de Incidente:</b></td>
                        </tr>
                        <tr>
                                <td style="text-align:left; width:670.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[descInc]</td>
                        </tr>
                        <tr>
                                <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Diágnosticos Realizados :.</b> <i>(Lista de Diagnosticos realizados)</i></p></td>
                        </tr>
                        <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> • $fichMantEq[d1]</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $d5</td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> $d2</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $d6</td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> $d3</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $d7</td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> $d4</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $d8</td>
                                </tr>
                        </table> 
                        EOF;
                        $pdf->writeHTML($html, false, false, false, false, '');

                        $html2 = <<<EOF
                        <table cellpadding="2" cellspacing="1.5" style="text-align:left;" border="">
                        <tr>
                        <td style="width:669px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Tiempo de Ejecución del Servicio</b></p></td>
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
                                "> $fichMantEq[finic]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Fecha Fin:</b></td>
                        <td style="text-align:left; width:65px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[ffin]</td>
                        <td style="text-align:left; width:140px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Trabajo Realizado:</b></td>
                        <td style="text-align:left; width:198.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[tipoTrabajo]</td>
                        </tr>
                        <tr>
                                <td style="text-align:left; width:670.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Descripción de Primera Evaluación:</b></td>
                        </tr>
                        <tr>
                                <td style="text-align:left; width:670.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[primera_eval]</td>
                        </tr>
                        <tr>
                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Acciones Realizadas :.</b> <i>(Lista de acciones o trabajos realizados)</i></p></td>
                        </tr>
                        <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> • $fichMantEq[a1]</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $a5</td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> $a2</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $a6</td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> $a3</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $a7</td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> $a4</td>
                                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                        background-color: #ffffff;"> $a8</td>
                                </tr>
                        </table> 
                        EOF;
                        $pdf->writeHTML($html2, false, false, false, false, '');
                        $html3 = <<<EOF
                        <table cellpadding="2" cellspacing="1.5" style="text-align:left;" border="">
                        <tr>
                        <td style="text-align:left; width:150px;background-color:white;
                                border-top:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Técnico Responsable:</b></td>
                        <td style="text-align:left; width:519px;background-color:white;
                                border-top:0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[tecresponsable]</td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:670.5px;background-color:white;
                            border-bottom:0.7px solid #000000;
                            border-left:  0.7px solid  #000000;
                            border-right:  0.7px solid  #000000;
                            border-top:0.7px solid #000000;
                            background-color: #E6E6E6;"> <b>Recomendaciones u Observaciones Finales:</b></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:670.5px;background-color:white;
                            border-bottom:0.7px solid #000000;
                            border-left:   0.7px solid  #000000;
                            border-right:  0.7px solid  #000000;
                            "> $fichMantEq[recomendaciones]</td>
                        </tr>
                        <tr>
                        <tr>
                        <td style="text-align:center; width:667px;background-color:white;"></td>
                        </tr>
                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>3. OBSERVACIONES Y ESTADO FINAL DEL EQUIPO</b> <i>(Información de situación final del equipo)</i></p></td>
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
                                "> $fichMantEq[estAte]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Condición Final:</b></td>
                        <td style="text-align:left; width:90px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[cfinal]</td>
                        <td style="text-align:left; width:200px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>¿Requiere Servicio de terceros?</b></td>
                        <td style="text-align:left; width:68.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[servTerce]</td>
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
                                "> $fichMantEq[otros]</td>
                        <td style="text-align:left; width:60px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                background-color: #E6E6E6;"> <b>Detalles:</b></td>
                        <td style="text-align:left; width:516px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[obsOtros]</td>
                        </tr>
                        <br>
                        <tr>
                        <tr>
                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>4. SUSCRIPCION DEL ACTA</b> <i>(Firmas y sellos de usuario responsable,técnico evaluador y Oficina de Estadística e Informática)</i></p></td>
                        </tr>
                        <br>
                        <td style="text-align:center; width:222.5px;background-color:white;
                        border-top: 0.7px solid #000000;
                        border-bottom: 0.7px solid #000000;
                        border-left:   0.7px solid  #000000;
                        background-color: #E6E6E6;"> <b>V°B° Of. Estadística e Informática</b></td>
                        <td style="text-align:center;vertical-align: middle; width:222.5px;background-color:white;
                        border-top: 0.7px solid #000000;
                        border-bottom: 0.7px solid #000000;
                        border-left:   0.7px solid  #000000;
                        background-color: #E6E6E6;"> <b>Técnico Responsable</b></td>
                        <td style="text-align:center; width:222.5px;background-color:white;
                        border-top: 0.7px solid #000000;
                        border-bottom: 0.7px solid #000000;
                        border-left:   0.7px solid  #000000;
                        border-right:   0.7px solid  #000000;
                        background-color: #E6E6E6;"> <b>Usuario Responsable</b></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        border-right:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        border-right:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        border-right:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        border-right:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        border-right:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-bottom: 1px solid #000000;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                        border-bottom: 1px solid #000000;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-bottom: 1px solid #000000;
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
                        background-color: #ffffff;"><b>$fichMantEq[tecresponsable]</b></td>
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
                        $pdf->Output($fichMantEq["correlativo_Mant"] . '.pdf', 'I');
                }
                // Listar Datos Equipos de Impresoras y Perifericos
                // Listar Datos Resto de Equipos
                else {
                        $dato = $idMant;
                        $fichMantEq = ControladorMantenimientos::ctrListarMantoOtros($dato);
                        // Bloque diagnosticos
                        if ($fichMantEq["diagnostico2"] != 0) {
                                $d2 = "• " . $fichMantEq["d2"];
                        } else {
                                $d2 = $fichMantEq["d2"];
                        }

                        if ($fichMantEq["diagnostico3"] != 0) {
                                $d3 = "• " . $fichMantEq["d3"];
                        } else {
                                $d3 = $fichMantEq["d3"];
                        }

                        if ($fichMantEq["diagnostico4"] != 0) {
                                $d4 = "• " . $fichMantEq["d4"];
                        } else {
                                $d4 = $fichMantEq["d4"];
                        }
                        if ($fichMantEq["diagnostico5"] != 0) {
                                $d5 = "• " . $fichMantEq["d5"];
                        } else {
                                $d5 = $fichMantEq["d5"];
                        }
                        if ($fichMantEq["diagnostico6"] != 0) {
                                $d6 = "• " . $fichMantEq["d6"];
                        } else {
                                $d6 = $fichMantEq["d6"];
                        }
                        if ($fichMantEq["diagnostico7"] != 0) {
                                $d7 = "• " . $fichMantEq["d7"];
                        } else {
                                $d7 = $fichMantEq["d7"];
                        }
                        if ($fichMantEq["diagnostico8"] != 0) {
                                $d8 = "• " . $fichMantEq["d8"];
                        } else {
                                $d8 = $fichMantEq["d8"];
                        }
                        // Bloque diagnosticos
                        // Bloque acciones
                        if ($fichMantEq["accion2"] != 0) {
                                $a2 = "• " . $fichMantEq["a2"];
                        } else {
                                $a2 = $fichMantEq["a2"];
                        }

                        if ($fichMantEq["accion3"] != 0) {
                                $a3 = "• " . $fichMantEq["a3"];
                        } else {
                                $a3 = $fichMantEq["a3"];
                        }

                        if ($fichMantEq["accion4"] != 0) {
                                $a4 = "• " . $fichMantEq["a4"];
                        } else {
                                $a4 = $fichMantEq["a4"];
                        }
                        if ($fichMantEq["accion5"] != 0) {
                                $a5 = "• " . $fichMantEq["a5"];
                        } else {
                                $a5 = $fichMantEq["a5"];
                        }
                        if ($fichMantEq["accion6"] != 0) {
                                $a6 = "• " . $fichMantEq["a6"];
                        } else {
                                $a6 = $fichMantEq["a6"];
                        }
                        if ($fichMantEq["accion7"] != 0) {
                                $a7 = "• " . $fichMantEq["a7"];
                        } else {
                                $a7 = $fichMantEq["a7"];
                        }
                        if ($fichMantEq["accion8"] != 0) {
                                $a8 = "• " . $fichMantEq["a8"];
                        } else {
                                $a8 = $fichMantEq["a8"];
                        }
                        // Bloque acciones

                        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                        $pdf->SetCreator(PDF_CREATOR);
                        $pdf->SetAuthor('OFICINA DE ESTADÍSTICA E INFORMÁTICA - SOPORTE TÉCNICO');
                        $pdf->SetTitle($fichMantEq["correlativo_Mant"]);
                        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
                        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
                        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                        $pdf->SetMargins(10, 23, 10);
                        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
                        $pdf->setPrintFooter(false);
                        $pdf->SetAutoPageBreak(TRUE, 5);
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
                        background-color: #ffffff;"><p style="text-align: center;"><b>' . $fichMantEq["correlativo_Mant"] . '</b></p></td>
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
                                background-color: #ffffff;"> $fichMantEq[area]</td>
                                <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                                border-bottom: 0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                background-color: #ffffff;"> $fichMantEq[subarea]</td>
                                <td style="text-align:left; width:222.5px;background-color:white;
                                border-bottom: 0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                border-right:   0.7px solid  #000000;
                                background-color: #ffffff;"> $fichMantEq[responsable]</td>
                        </tr>
                        </table>
                        <table cellpadding="2" cellspacing="1.5" style="text-align:left; padding:5px 10px;">
                        <tr>
                                <td style="width:667.5px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Datos del Equipo Afectado :.</b> <i>(Información del equipo afectado: tipo,modelo,marca,serie,cod.Patrimonio,N° ID, etc.)</i></p></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:110px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        border-left:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Tipo de Equipo:</b></td>
                        <td style="text-align:left; width:200px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantEq[categoria]</td>
                        <td style="text-align:left; width:59px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>N° Serie:</b></td>
                        <td style="text-align:left; width:297px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantEq[serie]</td>
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
                                                "> $fichMantEq[sbn]</td>
                                <td style="text-align:left; width:60px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Marca:</b></td>
                                <td style="text-align:left; width:140px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichMantEq[marca]</td>
                                <td style="text-align:left; width:59px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Modelo:</b></td>
                                <td style="text-align:left; width:159px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichMantEq[modelo]</td>
                        </tr>
                        <tr>
                        <tr>
                        <td style="text-align:center; width:667px;background-color:white;"></td>
                        </tr>
                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>2. EVALUACIÓN DE INCIDENTE, DIAGNOSTICOS Y ACCIONES REALIZADAS</b></p></td>
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
                                "> $fichMantEq[fEval]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Condición Inicial:</b></td>
                        <td style="text-align:left; width:65px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[cinicial]</td>
                        <td style="text-align:left; width:140px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Técnico Evaluador:</b></td>
                        <td style="text-align:left; width:198.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[tecnico]</td>
                        </tr>

                        <tr>
                                <td style="text-align:left; width:670.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Descripción Inicial de Incidente:</b></td>
                        </tr>
                        <tr>
                                <td style="text-align:left; width:670.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[descInc]</td>
                        </tr>
                        <tr>
                                <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Diágnosticos Realizados :.</b> <i>(Lista de Diagnosticos realizados)</i></p></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:334px;background-color:white;
                        background-color: #ffffff;"> • $fichMantEq[d1]</td>
                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                        background-color: #ffffff;"> $d5</td>
                        </tr>
                        <tr>
                                <td style="text-align:left; width:334px;background-color:white;
                                background-color: #ffffff;"> $d2</td>
                                <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                background-color: #ffffff;"> $d6</td>
                        </tr>
                        <tr>
                                <td style="text-align:left; width:334px;background-color:white;
                                background-color: #ffffff;"> $d3</td>
                                <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                background-color: #ffffff;"> $d7</td>
                        </tr>
                        <tr>
                                <td style="text-align:left; width:334px;background-color:white;
                                background-color: #ffffff;"> $d4</td>
                                <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                background-color: #ffffff;"> $d8</td>
                        </tr>
                        </table> 
                        EOF;
                        $pdf->writeHTML($html, false, false, false, false, '');

                        $html2 = <<<EOF
                        <table cellpadding="2" cellspacing="1.5" style="text-align:left;" border="">
                        <tr>
                        <td style="width:669px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Tiempo de Ejecución del Servicio</b></p></td>
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
                                "> $fichMantEq[finic]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Fecha Fin:</b></td>
                        <td style="text-align:left; width:65px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[ffin]</td>
                        <td style="text-align:left; width:140px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Trabajo Realizado:</b></td>
                        <td style="text-align:left; width:198.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[tipoTrabajo]</td>
                        </tr>
                        <tr>
                                <td style="text-align:left; width:670.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Descripción de Primera Evaluación:</b></td>
                        </tr>
                        <tr>
                                <td style="text-align:left; width:670.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[primera_eval]</td>
                        </tr>
                        <tr>
                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Acciones Realizadas :.</b> <i>(Lista de acciones o trabajos realizados)</i></p></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:334px;background-color:white;
                        background-color: #ffffff;"> • $fichMantEq[a1]</td>
                        <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                        background-color: #ffffff;"> $a5</td>
                        </tr>
                        <tr>
                                <td style="text-align:left; width:334px;background-color:white;
                                background-color: #ffffff;"> $a2</td>
                                <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                background-color: #ffffff;"> $a6</td>
                        </tr>
                        <tr>
                                <td style="text-align:left; width:334px;background-color:white;
                                background-color: #ffffff;"> $a3</td>
                                <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                background-color: #ffffff;"> $a7</td>
                        </tr>
                        <tr>
                                <td style="text-align:left; width:334px;background-color:white;
                                background-color: #ffffff;"> $a4</td>
                                <td style="text-align:left;vertical-align: middle; width:334.75px;background-color:white;
                                background-color: #ffffff;"> $a8</td>
                        </tr>
                        </table> 
                        EOF;
                        $pdf->writeHTML($html2, false, false, false, false, '');
                        $html3 = <<<EOF
                        <table cellpadding="2" cellspacing="1.5" style="text-align:left;" border="">
                        <tr>
                        <td style="text-align:left; width:150px;background-color:white;
                                border-top:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Técnico Responsable:</b></td>
                        <td style="text-align:left; width:519px;background-color:white;
                                border-top:0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[tecresponsable]</td>
                        </tr>
                        <tr>
                                <td style="text-align:left; width:670.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                border-top:0.7px solid #000000;
                                background-color: #E6E6E6;"> <b>Recomendaciones u Observaciones Finales:</b></td>
                        </tr>
                        <tr>
                                <td style="text-align:left; width:670.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[recomendaciones]</td>
                        </tr>
                        <tr>
                        <tr>
                        <td style="text-align:center; width:667px;background-color:white;"></td>
                        </tr>
                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>3. OBSERVACIONES Y ESTADO FINAL DEL EQUIPO</b> <i>(Información de situación final del equipo)</i></p></td>
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
                                "> $fichMantEq[estAte]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Condición Final:</b></td>
                        <td style="text-align:left; width:90px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[cfinal]</td>
                        <td style="text-align:left; width:200px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>¿Requiere Servicio de terceros?</b></td>
                        <td style="text-align:left; width:68.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[servTerce]</td>
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
                                "> $fichMantEq[otros]</td>
                        <td style="text-align:left; width:60px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                background-color: #E6E6E6;"> <b>Detalles:</b></td>
                        <td style="text-align:left; width:516px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantEq[obsOtros]</td>
                        </tr>
                        <br>
                        <tr>
                        <tr>
                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>4. SUSCRIPCION DEL ACTA</b> <i>(Firmas y sellos de usuario responsable,técnico evaluador y Oficina de Estadística e Informática)</i></p></td>
                        </tr>
                        <br>
                        <td style="text-align:center; width:222.5px;background-color:white;
                        border-top: 0.7px solid #000000;
                        border-bottom: 0.7px solid #000000;
                        border-left:   0.7px solid  #000000;
                        background-color: #E6E6E6;"> <b>V°B° Of. Estadística e Informática</b></td>
                        <td style="text-align:center;vertical-align: middle; width:222.5px;background-color:white;
                        border-top: 0.7px solid #000000;
                        border-bottom: 0.7px solid #000000;
                        border-left:   0.7px solid  #000000;
                        background-color: #E6E6E6;"> <b>Técnico Responsable</b></td>
                        <td style="text-align:center; width:222.5px;background-color:white;
                        border-top: 0.7px solid #000000;
                        border-bottom: 0.7px solid #000000;
                        border-left:   0.7px solid  #000000;
                        border-right:   0.7px solid  #000000;
                        background-color: #E6E6E6;"> <b>Usuario Responsable</b></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        border-right:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        border-right:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        border-right:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        border-right:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-left:   0.7px solid  #000000;
                        border-right:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-bottom: 1px solid #000000;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                        border-bottom: 1px solid #000000;
                        border-left:   0.7px solid  #000000;
                        background-color: #ffffff;"></td>
                        <td style="text-align:left; width:222.5px;background-color:white;
                        border-bottom: 1px solid #000000;
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
                        background-color: #ffffff;"><b>$fichMantEq[tecresponsable]</b></td>
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
                        $pdf->Output($fichMantEq["correlativo_Mant"] . '.pdf', 'I');
                }
        }
}
$fichaImprimirMant = new ImprimirFichaMantenimiento();
$fichaImprimirMant->idMantenimiento = $_GET["idMantenimiento"];
$fichaImprimirMant->idTipo = $_GET["idTipo"];
$fichaImprimirMant->imprimirFichaMant();
