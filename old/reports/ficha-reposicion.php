<?php
require_once "../controllers/ControladorReposiciones.php";
require_once "../models/ModeloReposiciones.php";

error_reporting(0);
class ImprimirFichaReposicion
{
        public $idReposicion;
        public $idTipo;
    
        public function imprimirFichaRepo()
        {
                require_once "../util/tcpdf/headFichaMantenimiento.php";
                $idRepo = $this->idReposicion;
                $idTip = $this->idTipo;

                // Condiciones en base el tipo de Equipo
                if ($idTip == 1 || $idTip == 4 || $idTip == 5) {
                        $dato = $idRepo;
                        $fichMantRepo = ControladorReposiciones::ctrListarMantoPCRepo($dato);
                        // Test de lista de diagnosticos
                        // Bloque diagnosticos
                        if ($fichMantRepo["diagnostico2"] != 0) {
                                $d2 = "• " . $fichMantRepo["d2"];
                        } else {
                                $d2 = $fichMantRepo["d2"];
                        }

                        if ($fichMantRepo["diagnostico3"] != 0) {
                                $d3 = "• " . $fichMantRepo["d3"];
                        } else {
                                $d3 = $fichMantRepo["d3"];
                        }

                        if ($fichMantRepo["diagnostico4"] != 0) {
                                $d4 = "• " . $fichMantRepo["d4"];
                        } else {
                                $d4 = $fichMantRepo["d4"];
                        }
                        if ($fichMantRepo["diagnostico5"] != 0) {
                                $d5 = "• " . $fichMantRepo["d5"];
                        } else {
                                $d5 = $fichMantRepo["d5"];
                        }
                        if ($fichMantRepo["diagnostico6"] != 0) {
                                $d6 = "• " . $fichMantRepo["d6"];
                        } else {
                                $d6 = $fichMantRepo["d6"];
                        }
                        if ($fichMantRepo["diagnostico7"] != 0) {
                                $d7 = "• " . $fichMantRepo["d7"];
                        } else {
                                $d7 = $fichMantRepo["d7"];
                        }
                        if ($fichMantRepo["diagnostico8"] != 0) {
                                $d8 = "• " . $fichMantRepo["d8"];
                        } else {
                                $d8 = $fichMantRepo["d8"];
                        }
                        // Bloque diagnosticos
                        // Bloque acciones
                        if ($fichMantRepo["accion2"] != 0) {
                                $a2 = "• " . $fichMantRepo["a2"];
                        } else {
                                $a2 = $fichMantRepo["a2"];
                        }

                        if ($fichMantRepo["accion3"] != 0) {
                                $a3 = "• " . $fichMantRepo["a3"];
                        } else {
                                $a3 = $fichMantRepo["a3"];
                        }

                        if ($fichMantRepo["accion4"] != 0) {
                                $a4 = "• " . $fichMantRepo["a4"];
                        } else {
                                $a4 = $fichMantRepo["a4"];
                        }
                        if ($fichMantRepo["accion5"] != 0) {
                                $a5 = "• " . $fichMantRepo["a5"];
                        } else {
                                $a5 = $fichMantRepo["a5"];
                        }
                        if ($fichMantRepo["accion6"] != 0) {
                                $a6 = "• " . $fichMantRepo["a6"];
                        } else {
                                $a6 = $fichMantRepo["a6"];
                        }
                        if ($fichMantRepo["accion7"] != 0) {
                                $a7 = "• " . $fichMantRepo["a7"];
                        } else {
                                $a7 = $fichMantRepo["a7"];
                        }
                        if ($fichMantRepo["accion8"] != 0) {
                                $a8 = "• " . $fichMantRepo["a8"];
                        } else {
                                $a8 = $fichMantRepo["a8"];
                        }
                        // Bloque acciones

                        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                        $pdf->SetCreator(PDF_CREATOR);
                        $pdf->SetAuthor('OFICINA DE ESTADÍSTICA E INFORMÁTICA - SOPORTE TÉCNICO');
                        $pdf->SetTitle($fichMantRepo["correlativo_Repo"]);
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
                        $htmlhead = '<h3 style="text-align:center;">SOPORTE INFORMÁTICO Y TELECOMUNICACIONES<br><i>Reporte de Solicitud de Reposición de Equipo</i></h3>';
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
                                        background-color: #ffffff;"><p style="text-align: center;"><b>' . $fichMantRepo["correlativo_Repo"] . '</b></p></td>
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
                                        background-color: #ffffff;"> $fichMantRepo[area]</td>
                                        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                                        border-bottom: 0.7px solid #000000;
                                        border-left:   0.7px solid  #000000;
                                        background-color: #ffffff;">  $fichMantRepo[subarea]</td>
                                        <td style="text-align:left; width:222.5px;background-color:white;
                                        border-bottom: 0.7px solid #000000;
                                        border-left:   0.7px solid  #000000;
                                        border-right:   0.7px solid  #000000;
                                        background-color: #ffffff;">  $fichMantRepo[responsable]</td>
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
                                                ">  $fichMantRepo[nro_eq]</td>
                                        <td style="text-align:left; width:110px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-top:  0.7px solid  #000000;
                                                background-color: #E6E6E6;"> <b>Tipo de Equipo:</b></td>
                                        <td style="text-align:left; width:150px;background-color:white;
                                                border-top:  0.7px solid  #000000;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                ">  $fichMantRepo[categoria]</td>
                                        <td style="text-align:left; width:59px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-top:  0.7px solid  #000000;
                                                background-color: #E6E6E6;"> <b>N° Serie:</b></td>
                                        <td style="text-align:left; width:159px;background-color:white;
                                                border-top:  0.7px solid  #000000;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                ">  $fichMantRepo[serie]</td>
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
                                                "> $fichMantRepo[sbn]</td>
                                        <td style="text-align:left; width:60px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Marca:</b></td>
                                        <td style="text-align:left; width:140px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichMantRepo[marca]</td>
                                        <td style="text-align:left; width:59px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Modelo:</b></td>
                                        <td style="text-align:left; width:159px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichMantRepo[modelo]</td>
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
                                        "> $fichMantRepo[procesador] $fichMantRepo[vprocesador]</td>
                                        <td style="text-align:left; width:60px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        background-color: #E6E6E6;"> <b>RAM:</b></td>
                                        <td style="text-align:left; width:140px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantRepo[ram]</td>
                                        <td style="text-align:left; width:79px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        background-color: #E6E6E6;"> <b>Disco Duro:</b></td>
                                        <td style="text-align:left; width:139px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantRepo[discoDuro]</td>
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
                                        "> $fichMantRepo[fEval]</td>
                                <td style="text-align:left; width:109.5px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Condición Inicial:</b></td>
                                <td style="text-align:left; width:65px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantRepo[cinicial]</td>
                                <td style="text-align:left; width:140px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Técnico Evaluador:</b></td>
                                <td style="text-align:left; width:198.5px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantRepo[tecnico]</td>
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
                                        "> $fichMantRepo[descInc]</td>
                                </tr>
                                <tr>
                                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Diágnosticos Realizados :.</b> <i>(Lista de Diagnosticos realizados)</i></p></td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> • $fichMantRepo[d1]</td>
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
                                        "> $fichMantRepo[finic]</td>
                                <td style="text-align:left; width:109.5px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Fecha Fin:</b></td>
                                <td style="text-align:left; width:65px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantRepo[ffin]</td>
                                <td style="text-align:left; width:140px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Trabajo Realizado:</b></td>
                                <td style="text-align:left; width:198.5px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantRepo[tipoTrabajo]</td>
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
                                        "> $fichMantRepo[primera_eval]</td>
                                </tr>
                                <tr>
                                <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Acciones Realizadas :.</b> <i>(Acciones o trabajos realizados)</i></p></td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> • $fichMantRepo[a1]</td>
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
                                        "> $fichMantRepo[tecresponsable]</td>
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
                                        "> $fichMantRepo[recomendaciones]</td>
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
                                        "> $fichMantRepo[estAte]</td>
                                <td style="text-align:left; width:109.5px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Condición Final:</b></td>
                                <td style="text-align:left; width:90px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantRepo[cfinal]</td>
                                <td style="text-align:left; width:200px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>¿Requiere Servicio de terceros?</b></td>
                                <td style="text-align:left; width:68.5px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantRepo[servTerce]</td>
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
                                        "> $fichMantRepo[otros]</td>
                                <td style="text-align:left; width:60px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        background-color: #E6E6E6;"> <b>Detalles:</b></td>
                                <td style="text-align:left; width:516px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantRepo[obsOtros]</td>
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
                                background-color: #ffffff;"><b>$fichMantRepo[tecresponsable]</b></td>
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
                        $pdf->Output($fichMantRepo["correlativo_Repo"] . '.pdf', 'I');
                }
                // Listar Datos Equipos de Red
                elseif ($idTip == 2 || $idTip == 6 || $idTip == 7 || $idTip == 8) {
                        $dato = $idRepo;
                        $fichMantRepo = ControladorReposiciones::ctrListarMantoRedesRepo($dato);
                        // Bloque diagnosticos
                        if ($fichMantRepo["diagnostico2"] != 0) {
                                $d2 = "• " . $fichMantRepo["d2"];
                        } else {
                                $d2 = $fichMantRepo["d2"];
                        }

                        if ($fichMantRepo["diagnostico3"] != 0) {
                                $d3 = "• " . $fichMantRepo["d3"];
                        } else {
                                $d3 = $fichMantRepo["d3"];
                        }

                        if ($fichMantRepo["diagnostico4"] != 0) {
                                $d4 = "• " . $fichMantRepo["d4"];
                        } else {
                                $d4 = $fichMantRepo["d4"];
                        }
                        if ($fichMantRepo["diagnostico5"] != 0) {
                                $d5 = "• " . $fichMantRepo["d5"];
                        } else {
                                $d5 = $fichMantRepo["d5"];
                        }
                        if ($fichMantRepo["diagnostico6"] != 0) {
                                $d6 = "• " . $fichMantRepo["d6"];
                        } else {
                                $d6 = $fichMantRepo["d6"];
                        }
                        if ($fichMantRepo["diagnostico7"] != 0) {
                                $d7 = "• " . $fichMantRepo["d7"];
                        } else {
                                $d7 = $fichMantRepo["d7"];
                        }
                        if ($fichMantRepo["diagnostico8"] != 0) {
                                $d8 = "• " . $fichMantRepo["d8"];
                        } else {
                                $d8 = $fichMantRepo["d8"];
                        }
                        // Bloque diagnosticos
                        // Bloque acciones
                        if ($fichMantRepo["accion2"] != 0) {
                                $a2 = "• " . $fichMantRepo["a2"];
                        } else {
                                $a2 = $fichMantRepo["a2"];
                        }

                        if ($fichMantRepo["accion3"] != 0) {
                                $a3 = "• " . $fichMantRepo["a3"];
                        } else {
                                $a3 = $fichMantRepo["a3"];
                        }

                        if ($fichMantRepo["accion4"] != 0) {
                                $a4 = "• " . $fichMantRepo["a4"];
                        } else {
                                $a4 = $fichMantRepo["a4"];
                        }
                        if ($fichMantRepo["accion5"] != 0) {
                                $a5 = "• " . $fichMantRepo["a5"];
                        } else {
                                $a5 = $fichMantRepo["a5"];
                        }
                        if ($fichMantRepo["accion6"] != 0) {
                                $a6 = "• " . $fichMantRepo["a6"];
                        } else {
                                $a6 = $fichMantRepo["a6"];
                        }
                        if ($fichMantRepo["accion7"] != 0) {
                                $a7 = "• " . $fichMantRepo["a7"];
                        } else {
                                $a7 = $fichMantRepo["a7"];
                        }
                        if ($fichMantRepo["accion8"] != 0) {
                                $a8 = "• " . $fichMantRepo["a8"];
                        } else {
                                $a8 = $fichMantRepo["a8"];
                        }
                        // Bloque acciones

                        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                        $pdf->SetCreator(PDF_CREATOR);
                        $pdf->SetAuthor('OFICINA DE ESTADÍSTICA E INFORMÁTICA - SOPORTE TÉCNICO');
                        $pdf->SetTitle($fichMantRepo["correlativo_Repo"]);
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
                        $htmlhead = '<h3 style="text-align:center;">SOPORTE INFORMÁTICO Y TELECOMUNICACIONES<br><i>Reporte de Solicitud de Reposición de Equipo</i></h3>';
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
                        background-color: #ffffff;"><p style="text-align: center;"><b>' . $fichMantRepo["correlativo_Repo"] . '</b></p></td>
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
                                background-color: #ffffff;"> $fichMantRepo[area]</td>
                                <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                                border-bottom: 0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                background-color: #ffffff;"> $fichMantRepo[subarea]</td>
                                <td style="text-align:left; width:222.5px;background-color:white;
                                border-bottom: 0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                border-right:   0.7px solid  #000000;
                                background-color: #ffffff;"> $fichMantRepo[responsable]</td>
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
                                        "> $fichMantRepo[nro_eq]</td>
                        <td style="text-align:left; width:110px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Tipo de Equipo:</b></td>
                        <td style="text-align:left; width:150px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantRepo[categoria]</td>
                        <td style="text-align:left; width:59px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>N° Serie:</b></td>
                        <td style="text-align:left; width:159px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantRepo[serie]</td>
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
                                                "> $fichMantRepo[sbn]</td>
                                <td style="text-align:left; width:60px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Marca:</b></td>
                                <td style="text-align:left; width:140px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichMantRepo[marca]</td>
                                <td style="text-align:left; width:59px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Modelo:</b></td>
                                <td style="text-align:left; width:159px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichMantRepo[modelo]</td>
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
                                "> $fichMantRepo[fEval]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Condición Inicial:</b></td>
                        <td style="text-align:left; width:65px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantRepo[cinicial]</td>
                        <td style="text-align:left; width:140px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Técnico Evaluador:</b></td>
                        <td style="text-align:left; width:198.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantRepo[tecnico]</td>
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
                                "> $fichMantRepo[descInc]</td>
                        </tr>
                        <tr>
                                <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Diágnosticos Realizados :.</b> <i>(Lista de Diagnosticos realizados)</i></p></td>
                        </tr>
                        <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> • $fichMantRepo[d1]</td>
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
                                "> $fichMantRepo[finic]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Fecha Fin:</b></td>
                        <td style="text-align:left; width:65px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantRepo[ffin]</td>
                        <td style="text-align:left; width:140px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Trabajo Realizado:</b></td>
                        <td style="text-align:left; width:198.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantRepo[tipoTrabajo]</td>
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
                                "> $fichMantRepo[primera_eval]</td>
                        </tr>
                        <tr>
                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Acciones Realizadas :.</b> <i>(Lista de acciones o trabajos realizados)</i></p></td>
                        </tr>
                        <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> • $fichMantRepo[a1]</td>
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
                                "> $fichMantRepo[tecresponsable]</td>
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
                            "> $fichMantRepo[recomendaciones]</td>
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
                                "> $fichMantRepo[estAte]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Condición Final:</b></td>
                        <td style="text-align:left; width:90px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantRepo[cfinal]</td>
                        <td style="text-align:left; width:200px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>¿Requiere Servicio de terceros?</b></td>
                        <td style="text-align:left; width:68.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantRepo[servTerce]</td>
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
                                "> $fichMantRepo[otros]</td>
                        <td style="text-align:left; width:60px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                background-color: #E6E6E6;"> <b>Detalles:</b></td>
                        <td style="text-align:left; width:516px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantRepo[obsOtros]</td>
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
                        background-color: #ffffff;"><b>$fichMantRepo[tecresponsable]</b></td>
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
                        $pdf->Output($fichMantRepo["correlativo_Repo"] . '.pdf', 'I');
                }
                // Listar Datos Equipos de Red
                // Listar Datos Equipos de Impresoras y Perifericos
                elseif ($idTip == 3 || $idTip == 9 || $idTip == 14 || $idTip == 15 || $idTip == 16 || $idTip == 17) {
                        $dato = $idRepo;
                        $fichMantRepo = ControladorReposiciones::ctrListarMantoImpresorasRepo($dato);
                        // Bloque diagnosticos
                        if ($fichMantRepo["diagnostico2"] != 0) {
                                $d2 = "• " . $fichMantRepo["d2"];
                        } else {
                                $d2 = $fichMantRepo["d2"];
                        }

                        if ($fichMantRepo["diagnostico3"] != 0) {
                                $d3 = "• " . $fichMantRepo["d3"];
                        } else {
                                $d3 = $fichMantRepo["d3"];
                        }

                        if ($fichMantRepo["diagnostico4"] != 0) {
                                $d4 = "• " . $fichMantRepo["d4"];
                        } else {
                                $d4 = $fichMantRepo["d4"];
                        }
                        if ($fichMantRepo["diagnostico5"] != 0) {
                                $d5 = "• " . $fichMantRepo["d5"];
                        } else {
                                $d5 = $fichMantRepo["d5"];
                        }
                        if ($fichMantRepo["diagnostico6"] != 0) {
                                $d6 = "• " . $fichMantRepo["d6"];
                        } else {
                                $d6 = $fichMantRepo["d6"];
                        }
                        if ($fichMantRepo["diagnostico7"] != 0) {
                                $d7 = "• " . $fichMantRepo["d7"];
                        } else {
                                $d7 = $fichMantRepo["d7"];
                        }
                        if ($fichMantRepo["diagnostico8"] != 0) {
                                $d8 = "• " . $fichMantRepo["d8"];
                        } else {
                                $d8 = $fichMantRepo["d8"];
                        }
                        // Bloque diagnosticos
                        // Bloque acciones
                        if ($fichMantRepo["accion2"] != 0) {
                                $a2 = "• " . $fichMantRepo["a2"];
                        } else {
                                $a2 = $fichMantRepo["a2"];
                        }

                        if ($fichMantRepo["accion3"] != 0) {
                                $a3 = "• " . $fichMantRepo["a3"];
                        } else {
                                $a3 = $fichMantRepo["a3"];
                        }

                        if ($fichMantRepo["accion4"] != 0) {
                                $a4 = "• " . $fichMantRepo["a4"];
                        } else {
                                $a4 = $fichMantRepo["a4"];
                        }
                        if ($fichMantRepo["accion5"] != 0) {
                                $a5 = "• " . $fichMantRepo["a5"];
                        } else {
                                $a5 = $fichMantRepo["a5"];
                        }
                        if ($fichMantRepo["accion6"] != 0) {
                                $a6 = "• " . $fichMantRepo["a6"];
                        } else {
                                $a6 = $fichMantRepo["a6"];
                        }
                        if ($fichMantRepo["accion7"] != 0) {
                                $a7 = "• " . $fichMantRepo["a7"];
                        } else {
                                $a7 = $fichMantRepo["a7"];
                        }
                        if ($fichMantRepo["accion8"] != 0) {
                                $a8 = "• " . $fichMantRepo["a8"];
                        } else {
                                $a8 = $fichMantRepo["a8"];
                        }
                        // Bloque acciones

                        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                        $pdf->SetCreator(PDF_CREATOR);
                        $pdf->SetAuthor('OFICINA DE ESTADÍSTICA E INFORMÁTICA - SOPORTE TÉCNICO');
                        $pdf->SetTitle($fichMantRepo["correlativo_Repo"]);
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
                        $htmlhead = '<h3 style="text-align:center;">SOPORTE INFORMÁTICO Y TELECOMUNICACIONES<br><i>Reporte de Solicitud de Reposición de Equipo</i></h3>';
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
                        background-color: #ffffff;"><p style="text-align: center;"><b>' . $fichMantRepo["correlativo_Repo"] . '</b></p></td>
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
                                background-color: #ffffff;"> $fichMantRepo[area]</td>
                                <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                                border-bottom: 0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                background-color: #ffffff;"> $fichMantRepo[subarea]</td>
                                <td style="text-align:left; width:222.5px;background-color:white;
                                border-bottom: 0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                border-right:   0.7px solid  #000000;
                                background-color: #ffffff;"> $fichMantRepo[responsable]</td>
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
                                        "> $fichMantRepo[nro_eq]</td>
                        <td style="text-align:left; width:110px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Tipo de Equipo:</b></td>
                        <td style="text-align:left; width:150px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantRepo[categoria]</td>
                        <td style="text-align:left; width:59px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>N° Serie:</b></td>
                        <td style="text-align:left; width:159px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantRepo[serie]</td>
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
                                                "> $fichMantRepo[sbn]</td>
                                <td style="text-align:left; width:60px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Marca:</b></td>
                                <td style="text-align:left; width:140px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichMantRepo[marca]</td>
                                <td style="text-align:left; width:59px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Modelo:</b></td>
                                <td style="text-align:left; width:159px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichMantRepo[modelo]</td>
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
                                "> $fichMantRepo[fEval]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Condición Inicial:</b></td>
                        <td style="text-align:left; width:65px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantRepo[cinicial]</td>
                        <td style="text-align:left; width:140px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Técnico Evaluador:</b></td>
                        <td style="text-align:left; width:198.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantRepo[tecnico]</td>
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
                                "> $fichMantRepo[descInc]</td>
                        </tr>
                        <tr>
                                <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Diágnosticos Realizados :.</b> <i>(Lista de Diagnosticos realizados)</i></p></td>
                        </tr>
                        <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> • $fichMantRepo[d1]</td>
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
                                "> $fichMantRepo[finic]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Fecha Fin:</b></td>
                        <td style="text-align:left; width:65px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantRepo[ffin]</td>
                        <td style="text-align:left; width:140px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Trabajo Realizado:</b></td>
                        <td style="text-align:left; width:198.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantRepo[tipoTrabajo]</td>
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
                                "> $fichMantRepo[primera_eval]</td>
                        </tr>
                        <tr>
                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Acciones Realizadas :.</b> <i>(Lista de acciones o trabajos realizados)</i></p></td>
                        </tr>
                        <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> • $fichMantRepo[a1]</td>
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
                                "> $fichMantRepo[tecresponsable]</td>
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
                            "> $fichMantRepo[recomendaciones]</td>
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
                                "> $fichMantRepo[estAte]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Condición Final:</b></td>
                        <td style="text-align:left; width:90px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantRepo[cfinal]</td>
                        <td style="text-align:left; width:200px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>¿Requiere Servicio de terceros?</b></td>
                        <td style="text-align:left; width:68.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantRepo[servTerce]</td>
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
                                "> $fichMantRepo[otros]</td>
                        <td style="text-align:left; width:60px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                background-color: #E6E6E6;"> <b>Detalles:</b></td>
                        <td style="text-align:left; width:516px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantRepo[obsOtros]</td>
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
                        background-color: #ffffff;"><b>$fichMantRepo[tecresponsable]</b></td>
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
                        $pdf->Output($fichMantRepo["correlativo_Repo"] . '.pdf', 'I');
                }
                // Listar Datos Equipos de Impresoras y Perifericos
                // Listar Datos Resto de Equipos
                else {
                        $dato = $idRepo;
                        $fichMantRepo = ControladorReposiciones::ctrListarMantoOtrosRepo($dato);
                        // Bloque diagnosticos
                        if ($fichMantRepo["diagnostico2"] != 0) {
                                $d2 = "• " . $fichMantRepo["d2"];
                        } else {
                                $d2 = $fichMantRepo["d2"];
                        }

                        if ($fichMantRepo["diagnostico3"] != 0) {
                                $d3 = "• " . $fichMantRepo["d3"];
                        } else {
                                $d3 = $fichMantRepo["d3"];
                        }

                        if ($fichMantRepo["diagnostico4"] != 0) {
                                $d4 = "• " . $fichMantRepo["d4"];
                        } else {
                                $d4 = $fichMantRepo["d4"];
                        }
                        if ($fichMantRepo["diagnostico5"] != 0) {
                                $d5 = "• " . $fichMantRepo["d5"];
                        } else {
                                $d5 = $fichMantRepo["d5"];
                        }
                        if ($fichMantRepo["diagnostico6"] != 0) {
                                $d6 = "• " . $fichMantRepo["d6"];
                        } else {
                                $d6 = $fichMantRepo["d6"];
                        }
                        if ($fichMantRepo["diagnostico7"] != 0) {
                                $d7 = "• " . $fichMantRepo["d7"];
                        } else {
                                $d7 = $fichMantRepo["d7"];
                        }
                        if ($fichMantRepo["diagnostico8"] != 0) {
                                $d8 = "• " . $fichMantRepo["d8"];
                        } else {
                                $d8 = $fichMantRepo["d8"];
                        }
                        // Bloque diagnosticos
                        // Bloque acciones
                        if ($fichMantRepo["accion2"] != 0) {
                                $a2 = "• " . $fichMantRepo["a2"];
                        } else {
                                $a2 = $fichMantRepo["a2"];
                        }

                        if ($fichMantRepo["accion3"] != 0) {
                                $a3 = "• " . $fichMantRepo["a3"];
                        } else {
                                $a3 = $fichMantRepo["a3"];
                        }

                        if ($fichMantRepo["accion4"] != 0) {
                                $a4 = "• " . $fichMantRepo["a4"];
                        } else {
                                $a4 = $fichMantRepo["a4"];
                        }
                        if ($fichMantRepo["accion5"] != 0) {
                                $a5 = "• " . $fichMantRepo["a5"];
                        } else {
                                $a5 = $fichMantRepo["a5"];
                        }
                        if ($fichMantRepo["accion6"] != 0) {
                                $a6 = "• " . $fichMantRepo["a6"];
                        } else {
                                $a6 = $fichMantRepo["a6"];
                        }
                        if ($fichMantRepo["accion7"] != 0) {
                                $a7 = "• " . $fichMantRepo["a7"];
                        } else {
                                $a7 = $fichMantRepo["a7"];
                        }
                        if ($fichMantRepo["accion8"] != 0) {
                                $a8 = "• " . $fichMantRepo["a8"];
                        } else {
                                $a8 = $fichMantRepo["a8"];
                        }
                        // Bloque acciones

                        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                        $pdf->SetCreator(PDF_CREATOR);
                        $pdf->SetAuthor('OFICINA DE ESTADÍSTICA E INFORMÁTICA - SOPORTE TÉCNICO');
                        $pdf->SetTitle($fichMantRepo["correlativo_Repo"]);
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
                        $htmlhead = '<h3 style="text-align:center;">SOPORTE INFORMÁTICO Y TELECOMUNICACIONES<br><i>Reporte de Solicitud de Reposición de Equipo</i></h3>';
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
                        background-color: #ffffff;"><p style="text-align: center;"><b>' . $fichMantRepo["correlativo_Repo"] . '</b></p></td>
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
                                background-color: #ffffff;"> $fichMantRepo[area]</td>
                                <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                                border-bottom: 0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                background-color: #ffffff;"> $fichMantRepo[subarea]</td>
                                <td style="text-align:left; width:222.5px;background-color:white;
                                border-bottom: 0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                border-right:   0.7px solid  #000000;
                                background-color: #ffffff;"> $fichMantRepo[responsable]</td>
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
                                        "> $fichMantRepo[categoria]</td>
                        <td style="text-align:left; width:59px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>N° Serie:</b></td>
                        <td style="text-align:left; width:297px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichMantRepo[serie]</td>
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
                                                "> $fichMantRepo[sbn]</td>
                                <td style="text-align:left; width:60px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Marca:</b></td>
                                <td style="text-align:left; width:140px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichMantRepo[marca]</td>
                                <td style="text-align:left; width:59px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Modelo:</b></td>
                                <td style="text-align:left; width:159px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichMantRepo[modelo]</td>
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
                                "> $fichMantRepo[fEval]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Condición Inicial:</b></td>
                        <td style="text-align:left; width:65px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantRepo[cinicial]</td>
                        <td style="text-align:left; width:140px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Técnico Evaluador:</b></td>
                        <td style="text-align:left; width:198.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantRepo[tecnico]</td>
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
                                "> $fichMantRepo[descInc]</td>
                        </tr>
                        <tr>
                                <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Diágnosticos Realizados :.</b> <i>(Lista de Diagnosticos realizados)</i></p></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:334px;background-color:white;
                        background-color: #ffffff;"> • $fichMantRepo[d1]</td>
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
                                "> $fichMantRepo[finic]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Fecha Fin:</b></td>
                        <td style="text-align:left; width:65px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantRepo[ffin]</td>
                        <td style="text-align:left; width:140px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Trabajo Realizado:</b></td>
                        <td style="text-align:left; width:198.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantRepo[tipoTrabajo]</td>
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
                                "> $fichMantRepo[primera_eval]</td>
                        </tr>
                        <tr>
                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Acciones Realizadas :.</b> <i>(Lista de acciones o trabajos realizados)</i></p></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:334px;background-color:white;
                        background-color: #ffffff;"> • $fichMantRepo[a1]</td>
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
                                "> $fichMantRepo[tecresponsable]</td>
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
                                "> $fichMantRepo[recomendaciones]</td>
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
                                "> $fichMantRepo[estAte]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Condición Final:</b></td>
                        <td style="text-align:left; width:90px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantRepo[cfinal]</td>
                        <td style="text-align:left; width:200px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>¿Requiere Servicio de terceros?</b></td>
                        <td style="text-align:left; width:68.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantRepo[servTerce]</td>
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
                                "> $fichMantRepo[otros]</td>
                        <td style="text-align:left; width:60px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                background-color: #E6E6E6;"> <b>Detalles:</b></td>
                        <td style="text-align:left; width:516px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichMantRepo[obsOtros]</td>
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
                        background-color: #ffffff;"><b>$fichMantRepo[tecresponsable]</b></td>
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
                        $pdf->Output($fichMantRepo["correlativo_Repo"] . '.pdf', 'I');
                }
        }
}
$fichaImprimirRepo = new ImprimirFichaReposicion();
$fichaImprimirRepo->idReposicion = $_GET["idReposicion"];
$fichaImprimirRepo->idTipo = $_GET["idTipo"];
$fichaImprimirRepo->imprimirFichaRepo();