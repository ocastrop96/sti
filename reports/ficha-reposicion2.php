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
            $fichRepoEq = ControladorReposiciones::ctrListarMantoPCRepo($dato);
            // Test de lista de diagnosticos
            // Bloque diagnosticos
            if ($fichRepoEq["diagnostico2"] != 0) {
                $d2 = "• " . $fichRepoEq["d2"];
            } else {
                $d2 = $fichRepoEq["d2"];
            }

            if ($fichRepoEq["diagnostico3"] != 0) {
                $d3 = "• " . $fichRepoEq["d3"];
            } else {
                $d3 = $fichRepoEq["d3"];
            }

            if ($fichRepoEq["diagnostico4"] != 0) {
                $d4 = "• " . $fichRepoEq["d4"];
            } else {
                $d4 = $fichRepoEq["d4"];
            }
            if ($fichRepoEq["diagnostico5"] != 0) {
                $d5 = "• " . $fichRepoEq["d5"];
            } else {
                $d5 = $fichRepoEq["d5"];
            }
            if ($fichRepoEq["diagnostico6"] != 0) {
                $d6 = "• " . $fichRepoEq["d6"];
            } else {
                $d6 = $fichRepoEq["d6"];
            }
            if ($fichRepoEq["diagnostico7"] != 0) {
                $d7 = "• " . $fichRepoEq["d7"];
            } else {
                $d7 = $fichRepoEq["d7"];
            }
            if ($fichRepoEq["diagnostico8"] != 0) {
                $d8 = "• " . $fichRepoEq["d8"];
            } else {
                $d8 = $fichRepoEq["d8"];
            }
            // Bloque diagnosticos
            // Bloque acciones
            if ($fichRepoEq["accion2"] != 0) {
                $a2 = "• " . $fichRepoEq["a2"];
            } else {
                $a2 = $fichRepoEq["a2"];
            }

            if ($fichRepoEq["accion3"] != 0) {
                $a3 = "• " . $fichRepoEq["a3"];
            } else {
                $a3 = $fichRepoEq["a3"];
            }

            if ($fichRepoEq["accion4"] != 0) {
                $a4 = "• " . $fichRepoEq["a4"];
            } else {
                $a4 = $fichRepoEq["a4"];
            }
            if ($fichRepoEq["accion5"] != 0) {
                $a5 = "• " . $fichRepoEq["a5"];
            } else {
                $a5 = $fichRepoEq["a5"];
            }
            if ($fichRepoEq["accion6"] != 0) {
                $a6 = "• " . $fichRepoEq["a6"];
            } else {
                $a6 = $fichRepoEq["a6"];
            }
            if ($fichRepoEq["accion7"] != 0) {
                $a7 = "• " . $fichRepoEq["a7"];
            } else {
                $a7 = $fichRepoEq["a7"];
            }
            if ($fichRepoEq["accion8"] != 0) {
                $a8 = "• " . $fichRepoEq["a8"];
            } else {
                $a8 = $fichRepoEq["a8"];
            }
            // Bloque acciones

            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('OFICINA DE ESTADÍSTICA E INFORMÁTICA - SOPORTE TÉCNICO');
            $pdf->SetTitle($fichRepoEq["correlativo_Repo"]);
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
                                        background-color: #ffffff;"><p style="text-align: center;"><b>' . $fichRepoEq["correlativo_Repo"] . '</b></p></td>
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
                                        background-color: #ffffff;"> $fichRepoEq[area]</td>
                                        <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                                        border-bottom: 0.7px solid #000000;
                                        border-left:   0.7px solid  #000000;
                                        background-color: #ffffff;">  $fichRepoEq[subarea]</td>
                                        <td style="text-align:left; width:222.5px;background-color:white;
                                        border-bottom: 0.7px solid #000000;
                                        border-left:   0.7px solid  #000000;
                                        border-right:   0.7px solid  #000000;
                                        background-color: #ffffff;">  $fichRepoEq[responsable]</td>
                                </tr>
                                </table>
                                <table cellpadding="2" cellspacing="1.5" style="text-align:left; padding:5px 10px;">
                                <tr>
                                <td style="text-align:center; width:667px;background-color:white;"></td>
                                </tr>
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
                                                ">  $fichRepoEq[nro_eq]</td>
                                        <td style="text-align:left; width:110px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-top:  0.7px solid  #000000;
                                                background-color: #E6E6E6;"> <b>Tipo de Equipo:</b></td>
                                        <td style="text-align:left; width:150px;background-color:white;
                                                border-top:  0.7px solid  #000000;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                ">  $fichRepoEq[categoria]</td>
                                        <td style="text-align:left; width:59px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-top:  0.7px solid  #000000;
                                                background-color: #E6E6E6;"> <b>N° Serie:</b></td>
                                        <td style="text-align:left; width:159px;background-color:white;
                                                border-top:  0.7px solid  #000000;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                ">  $fichRepoEq[serie]</td>
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
                                                "> $fichRepoEq[sbn]</td>
                                        <td style="text-align:left; width:60px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Marca:</b></td>
                                        <td style="text-align:left; width:140px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichRepoEq[marca]</td>
                                        <td style="text-align:left; width:59px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Modelo:</b></td>
                                        <td style="text-align:left; width:159px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichRepoEq[modelo]</td>
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
                                        "> $fichRepoEq[procesador] $fichRepoEq[vprocesador]</td>
                                        <td style="text-align:left; width:60px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        background-color: #E6E6E6;"> <b>RAM:</b></td>
                                        <td style="text-align:left; width:140px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichRepoEq[ram]</td>
                                        <td style="text-align:left; width:79px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        background-color: #E6E6E6;"> <b>Disco Duro:</b></td>
                                        <td style="text-align:left; width:139px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichRepoEq[discoDuro]</td>
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
                                        "> $fichRepoEq[fEval]</td>
                                <td style="text-align:left; width:109.5px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Condición Inicial:</b></td>
                                <td style="text-align:left; width:65px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichRepoEq[cinicial]</td>
                                <td style="text-align:left; width:140px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Técnico Evaluador:</b></td>
                                <td style="text-align:left; width:198.5px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichRepoEq[tecnico]</td>
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
                                        "> $fichRepoEq[descInc]</td>
                                </tr>
                                <tr>
                                <td style="text-align:center; width:667px;background-color:white;"></td>
                                </tr>
                                <tr>
                                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Diágnosticos Realizados :.</b> <i>(Lista de Diagnosticos realizados)</i></p></td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> • $fichRepoEq[d1]</td>
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
                                <tr>
                                <td style="text-align:center; width:667px;background-color:white;"></td>
                                </tr>
                                </table> 
                                EOF;
            $pdf->writeHTML($html, false, false, false, false, '');
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
                                        "> $fichRepoEq[finic]</td>
                                <td style="text-align:left; width:109.5px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Fecha Fin:</b></td>
                                <td style="text-align:left; width:65px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichRepoEq[ffin]</td>
                                <td style="text-align:left; width:140px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Trabajo Realizado:</b></td>
                                <td style="text-align:left; width:198.5px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichRepoEq[tipoTrabajo]</td>
                                </tr>
                                <tr>
                                <td style="text-align:left; width:150px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Desc. Primera Evaluación:</b></td>
                                <td style="text-align:left; width:519px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-left:   0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichRepoEq[primera_eval]</td>
                                </tr>
                                <tr>
                                <tr>
                                <td style="text-align:center; width:667px;background-color:white;"></td>
                                </tr>
                                <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Acciones Realizadas :.</b> <i>(Lista de acciones o trabajos realizados)</i></p></td>
                                </tr>
                                <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> • $fichRepoEq[a1]</td>
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
                                        "> $fichRepoEq[recomendaciones]</td>
                                </tr>
                                <tr>
                                <td style="text-align:center; width:667px;background-color:white;"></td>
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
                                        "> $fichRepoEq[estAte]</td>
                                <td style="text-align:left; width:109.5px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Condición Final:</b></td>
                                <td style="text-align:left; width:90px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichRepoEq[cfinal]</td>
                                <td style="text-align:left; width:200px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>¿Requiere Servicio de terceros?</b></td>
                                <td style="text-align:left; width:68.5px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichRepoEq[servTerce]</td>
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
                                        "> $fichRepoEq[otros]</td>
                                <td style="text-align:left; width:60px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        background-color: #E6E6E6;"> <b>Detalles:</b></td>
                                <td style="text-align:left; width:516px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichRepoEq[obsOtros]</td>
                                </tr>
                                <tr>
                                <td style="text-align:center; width:667px;background-color:white;"></td>
                                </tr>
                                <tr>
                                <tr>
                                <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>5. SUSCRIPCION DEL ACTA</b> <i>(Firmas y sellos de usuario responsable,técnico evaluador y Oficina de Estadística e Informática)</i></p></td>
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
            $pdf->Output($fichRepoEq["correlativo_Repo"] . '.pdf', 'I');
        }
        // Listar Datos Equipos de Red
        elseif ($idTip == 2 || $idTip == 6 || $idTip == 7 || $idTip == 8) {
            $dato = $idRepo;
            $fichRepoEq = ControladorReposiciones::ctrListarMantoRedesRepo($dato);
            // Bloque diagnosticos
            if ($fichRepoEq["diagnostico2"] != 0) {
                $d2 = "• " . $fichRepoEq["d2"];
            } else {
                $d2 = $fichRepoEq["d2"];
            }

            if ($fichRepoEq["diagnostico3"] != 0) {
                $d3 = "• " . $fichRepoEq["d3"];
            } else {
                $d3 = $fichRepoEq["d3"];
            }

            if ($fichRepoEq["diagnostico4"] != 0) {
                $d4 = "• " . $fichRepoEq["d4"];
            } else {
                $d4 = $fichRepoEq["d4"];
            }
            if ($fichRepoEq["diagnostico5"] != 0) {
                $d5 = "• " . $fichRepoEq["d5"];
            } else {
                $d5 = $fichRepoEq["d5"];
            }
            if ($fichRepoEq["diagnostico6"] != 0) {
                $d6 = "• " . $fichRepoEq["d6"];
            } else {
                $d6 = $fichRepoEq["d6"];
            }
            if ($fichRepoEq["diagnostico7"] != 0) {
                $d7 = "• " . $fichRepoEq["d7"];
            } else {
                $d7 = $fichRepoEq["d7"];
            }
            if ($fichRepoEq["diagnostico8"] != 0) {
                $d8 = "• " . $fichRepoEq["d8"];
            } else {
                $d8 = $fichRepoEq["d8"];
            }
            // Bloque diagnosticos
            // Bloque acciones
            if ($fichRepoEq["accion2"] != 0) {
                $a2 = "• " . $fichRepoEq["a2"];
            } else {
                $a2 = $fichRepoEq["a2"];
            }

            if ($fichRepoEq["accion3"] != 0) {
                $a3 = "• " . $fichRepoEq["a3"];
            } else {
                $a3 = $fichRepoEq["a3"];
            }

            if ($fichRepoEq["accion4"] != 0) {
                $a4 = "• " . $fichRepoEq["a4"];
            } else {
                $a4 = $fichRepoEq["a4"];
            }
            if ($fichRepoEq["accion5"] != 0) {
                $a5 = "• " . $fichRepoEq["a5"];
            } else {
                $a5 = $fichRepoEq["a5"];
            }
            if ($fichRepoEq["accion6"] != 0) {
                $a6 = "• " . $fichRepoEq["a6"];
            } else {
                $a6 = $fichRepoEq["a6"];
            }
            if ($fichRepoEq["accion7"] != 0) {
                $a7 = "• " . $fichRepoEq["a7"];
            } else {
                $a7 = $fichRepoEq["a7"];
            }
            if ($fichRepoEq["accion8"] != 0) {
                $a8 = "• " . $fichRepoEq["a8"];
            } else {
                $a8 = $fichRepoEq["a8"];
            }
            // Bloque acciones

            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('OFICINA DE ESTADÍSTICA E INFORMÁTICA - SOPORTE TÉCNICO');
            $pdf->SetTitle($fichRepoEq["correlativo_Repo"]);
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
                        background-color: #ffffff;"><p style="text-align: center;"><b>' . $fichRepoEq["correlativo_Repo"] . '</b></p></td>
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
                                background-color: #ffffff;"> $fichRepoEq[area]</td>
                                <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                                border-bottom: 0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                background-color: #ffffff;"> $fichRepoEq[subarea]</td>
                                <td style="text-align:left; width:222.5px;background-color:white;
                                border-bottom: 0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                border-right:   0.7px solid  #000000;
                                background-color: #ffffff;"> $fichRepoEq[responsable]</td>
                        </tr>
                        </table>
                        <table cellpadding="2" cellspacing="1.5" style="text-align:left; padding:5px 10px;">
                        <tr>
                        <td style="text-align:center; width:667px;background-color:white;"></td>
                        </tr>
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
                                        "> $fichRepoEq[nro_eq]</td>
                        <td style="text-align:left; width:110px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Tipo de Equipo:</b></td>
                        <td style="text-align:left; width:150px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichRepoEq[categoria]</td>
                        <td style="text-align:left; width:59px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>N° Serie:</b></td>
                        <td style="text-align:left; width:159px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichRepoEq[serie]</td>
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
                                                "> $fichRepoEq[sbn]</td>
                                <td style="text-align:left; width:60px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Marca:</b></td>
                                <td style="text-align:left; width:140px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichRepoEq[marca]</td>
                                <td style="text-align:left; width:59px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Modelo:</b></td>
                                <td style="text-align:left; width:159px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichRepoEq[modelo]</td>
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
                                "> $fichRepoEq[fEval]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Condición Inicial:</b></td>
                        <td style="text-align:left; width:65px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[cinicial]</td>
                        <td style="text-align:left; width:140px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Técnico Evaluador:</b></td>
                        <td style="text-align:left; width:198.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[tecnico]</td>
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
                                "> $fichRepoEq[descInc]</td>
                        </tr>
                        <tr>
                        <td style="text-align:center; width:667px;background-color:white;"></td>
                        </tr>
                        <tr>
                                <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Diágnosticos Realizados :.</b> <i>(Lista de Diagnosticos realizados)</i></p></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:334px;background-color:white;
                        background-color: #ffffff;"> • $fichRepoEq[d1]</td>
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
                        <td style="text-align:center; width:667px;background-color:white;"></td>
                        </tr>
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
                                "> $fichRepoEq[finic]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Fecha Fin:</b></td>
                        <td style="text-align:left; width:65px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[ffin]</td>
                        <td style="text-align:left; width:140px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Trabajo Realizado:</b></td>
                        <td style="text-align:left; width:198.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[tipoTrabajo]</td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:150px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Desc. Primera Evaluación:</b></td>
                        <td style="text-align:left; width:519px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[primera_eval]</td>
                        </tr>
                        <tr>
                        <tr>
                        <td style="text-align:center; width:667px;background-color:white;"></td>
                        </tr>
                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Acciones Realizadas :.</b> <i>(Lista de acciones o trabajos realizados)</i></p></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:334px;background-color:white;
                        background-color: #ffffff;"> • $fichRepoEq[a1]</td>
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
                                "> $fichRepoEq[recomendaciones]</td>
                        </tr>
                        <tr>
                        <tr>
                        <td style="text-align:center; width:667px;background-color:white;"></td>
                        </tr>
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
                                "> $fichRepoEq[estAte]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Condición Final:</b></td>
                        <td style="text-align:left; width:90px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[cfinal]</td>
                        <td style="text-align:left; width:200px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>¿Requiere Servicio de terceros?</b></td>
                        <td style="text-align:left; width:68.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[servTerce]</td>
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
                                "> $fichRepoEq[otros]</td>
                        <td style="text-align:left; width:60px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                background-color: #E6E6E6;"> <b>Detalles:</b></td>
                        <td style="text-align:left; width:516px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[obsOtros]</td>
                        </tr>
                        <br>
                        <tr>
                        <tr>
                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>5. SUSCRIPCION DEL ACTA</b> <i>(Firmas y sellos de usuario responsable,técnico evaluador y Oficina de Estadística e Informática)</i></p></td>
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
            $pdf->Output($fichRepoEq["correlativo_Repo"] . '.pdf', 'I');
        }
        // Listar Datos Equipos de Red
        // Listar Datos Equipos de Impresoras y Perifericos
        elseif ($idTip == 3 || $idTip == 9 || $idTip == 14 || $idTip == 15 || $idTip == 16 || $idTip == 17) {
            $dato = $idRepo;
            $fichRepoEq = ControladorReposiciones::ctrListarMantoImpresorasRepo($dato);
            // Bloque diagnosticos
            if ($fichRepoEq["diagnostico2"] != 0) {
                $d2 = "• " . $fichRepoEq["d2"];
            } else {
                $d2 = $fichRepoEq["d2"];
            }

            if ($fichRepoEq["diagnostico3"] != 0) {
                $d3 = "• " . $fichRepoEq["d3"];
            } else {
                $d3 = $fichRepoEq["d3"];
            }

            if ($fichRepoEq["diagnostico4"] != 0) {
                $d4 = "• " . $fichRepoEq["d4"];
            } else {
                $d4 = $fichRepoEq["d4"];
            }
            if ($fichRepoEq["diagnostico5"] != 0) {
                $d5 = "• " . $fichRepoEq["d5"];
            } else {
                $d5 = $fichRepoEq["d5"];
            }
            if ($fichRepoEq["diagnostico6"] != 0) {
                $d6 = "• " . $fichRepoEq["d6"];
            } else {
                $d6 = $fichRepoEq["d6"];
            }
            if ($fichRepoEq["diagnostico7"] != 0) {
                $d7 = "• " . $fichRepoEq["d7"];
            } else {
                $d7 = $fichRepoEq["d7"];
            }
            if ($fichRepoEq["diagnostico8"] != 0) {
                $d8 = "• " . $fichRepoEq["d8"];
            } else {
                $d8 = $fichRepoEq["d8"];
            }
            // Bloque diagnosticos
            // Bloque acciones
            if ($fichRepoEq["accion2"] != 0) {
                $a2 = "• " . $fichRepoEq["a2"];
            } else {
                $a2 = $fichRepoEq["a2"];
            }

            if ($fichRepoEq["accion3"] != 0) {
                $a3 = "• " . $fichRepoEq["a3"];
            } else {
                $a3 = $fichRepoEq["a3"];
            }

            if ($fichRepoEq["accion4"] != 0) {
                $a4 = "• " . $fichRepoEq["a4"];
            } else {
                $a4 = $fichRepoEq["a4"];
            }
            if ($fichRepoEq["accion5"] != 0) {
                $a5 = "• " . $fichRepoEq["a5"];
            } else {
                $a5 = $fichRepoEq["a5"];
            }
            if ($fichRepoEq["accion6"] != 0) {
                $a6 = "• " . $fichRepoEq["a6"];
            } else {
                $a6 = $fichRepoEq["a6"];
            }
            if ($fichRepoEq["accion7"] != 0) {
                $a7 = "• " . $fichRepoEq["a7"];
            } else {
                $a7 = $fichRepoEq["a7"];
            }
            if ($fichRepoEq["accion8"] != 0) {
                $a8 = "• " . $fichRepoEq["a8"];
            } else {
                $a8 = $fichRepoEq["a8"];
            }
            // Bloque acciones

            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('OFICINA DE ESTADÍSTICA E INFORMÁTICA - SOPORTE TÉCNICO');
            $pdf->SetTitle($fichRepoEq["correlativo_Repo"]);
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
                        background-color: #ffffff;"><p style="text-align: center;"><b>' . $fichRepoEq["correlativo_Repo"] . '</b></p></td>
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
                                background-color: #ffffff;"> $fichRepoEq[area]</td>
                                <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                                border-bottom: 0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                background-color: #ffffff;"> $fichRepoEq[subarea]</td>
                                <td style="text-align:left; width:222.5px;background-color:white;
                                border-bottom: 0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                border-right:   0.7px solid  #000000;
                                background-color: #ffffff;"> $fichRepoEq[responsable]</td>
                        </tr>
                        </table>
                        <table cellpadding="2" cellspacing="1.5" style="text-align:left; padding:5px 10px;">
                        <tr>
                        <td style="text-align:center; width:667px;background-color:white;"></td>
                        </tr>
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
                                        "> $fichRepoEq[nro_eq]</td>
                        <td style="text-align:left; width:110px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>Tipo de Equipo:</b></td>
                        <td style="text-align:left; width:150px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichRepoEq[categoria]</td>
                        <td style="text-align:left; width:59px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>N° Serie:</b></td>
                        <td style="text-align:left; width:159px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichRepoEq[serie]</td>
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
                                                "> $fichRepoEq[sbn]</td>
                                <td style="text-align:left; width:60px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Marca:</b></td>
                                <td style="text-align:left; width:140px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichRepoEq[marca]</td>
                                <td style="text-align:left; width:59px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Modelo:</b></td>
                                <td style="text-align:left; width:159px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichRepoEq[modelo]</td>
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
                                "> $fichRepoEq[fEval]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Condición Inicial:</b></td>
                        <td style="text-align:left; width:65px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[cinicial]</td>
                        <td style="text-align:left; width:140px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Técnico Evaluador:</b></td>
                        <td style="text-align:left; width:198.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[tecnico]</td>
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
                                "> $fichRepoEq[descInc]</td>
                        </tr>
                        <tr>
                        <td style="text-align:center; width:667px;background-color:white;"></td>
                        </tr>
                        <tr>
                                <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Diágnosticos Realizados :.</b> <i>(Lista de Diagnosticos realizados)</i></p></td>
                        </tr>
                        <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> • $fichRepoEq[d1]</td>
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
                        <td style="text-align:center; width:667px;background-color:white;"></td>
                        </tr>
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
                                "> $fichRepoEq[finic]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Fecha Fin:</b></td>
                        <td style="text-align:left; width:65px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[ffin]</td>
                        <td style="text-align:left; width:140px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Trabajo Realizado:</b></td>
                        <td style="text-align:left; width:198.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[tipoTrabajo]</td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:150px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Desc. Primera Evaluación:</b></td>
                        <td style="text-align:left; width:519px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[primera_eval]</td>
                        </tr>
                        <tr>
                        <tr>
                        <td style="text-align:center; width:667px;background-color:white;"></td>
                        </tr>
                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Acciones Realizadas :.</b> <i>(Lista de acciones o trabajos realizados)</i></p></td>
                        </tr>
                        <tr>
                                        <td style="text-align:left; width:334px;background-color:white;
                                        background-color: #ffffff;"> • $fichRepoEq[a1]</td>
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
                                "> $fichRepoEq[recomendaciones]</td>
                        </tr>
                        <tr>
                        <tr>
                        <td style="text-align:center; width:667px;background-color:white;"></td>
                        </tr>
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
                                "> $fichRepoEq[estAte]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Condición Final:</b></td>
                        <td style="text-align:left; width:90px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[cfinal]</td>
                        <td style="text-align:left; width:200px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>¿Requiere Servicio de terceros?</b></td>
                        <td style="text-align:left; width:68.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[servTerce]</td>
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
                                "> $fichRepoEq[otros]</td>
                        <td style="text-align:left; width:60px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                background-color: #E6E6E6;"> <b>Detalles:</b></td>
                        <td style="text-align:left; width:516px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[obsOtros]</td>
                        </tr>
                        <br>
                        <tr>
                        <tr>
                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>5. SUSCRIPCION DEL ACTA</b> <i>(Firmas y sellos de usuario responsable,técnico evaluador y Oficina de Estadística e Informática)</i></p></td>
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
            $pdf->Output($fichRepoEq["correlativo_Repo"] . '.pdf', 'I');
        }
        // Listar Datos Equipos de Impresoras y Perifericos
        // Listar Datos Resto de Equipos
        else {
            $dato = $idRepo;
            $fichRepoEq = ControladorReposiciones::ctrListarMantoOtrosRepo($dato);
            // Bloque diagnosticos
            if ($fichRepoEq["diagnostico2"] != 0) {
                $d2 = "• " . $fichRepoEq["d2"];
            } else {
                $d2 = $fichRepoEq["d2"];
            }

            if ($fichRepoEq["diagnostico3"] != 0) {
                $d3 = "• " . $fichRepoEq["d3"];
            } else {
                $d3 = $fichRepoEq["d3"];
            }

            if ($fichRepoEq["diagnostico4"] != 0) {
                $d4 = "• " . $fichRepoEq["d4"];
            } else {
                $d4 = $fichRepoEq["d4"];
            }
            if ($fichRepoEq["diagnostico5"] != 0) {
                $d5 = "• " . $fichRepoEq["d5"];
            } else {
                $d5 = $fichRepoEq["d5"];
            }
            if ($fichRepoEq["diagnostico6"] != 0) {
                $d6 = "• " . $fichRepoEq["d6"];
            } else {
                $d6 = $fichRepoEq["d6"];
            }
            if ($fichRepoEq["diagnostico7"] != 0) {
                $d7 = "• " . $fichRepoEq["d7"];
            } else {
                $d7 = $fichRepoEq["d7"];
            }
            if ($fichRepoEq["diagnostico8"] != 0) {
                $d8 = "• " . $fichRepoEq["d8"];
            } else {
                $d8 = $fichRepoEq["d8"];
            }
            // Bloque diagnosticos
            // Bloque acciones
            if ($fichRepoEq["accion2"] != 0) {
                $a2 = "• " . $fichRepoEq["a2"];
            } else {
                $a2 = $fichRepoEq["a2"];
            }

            if ($fichRepoEq["accion3"] != 0) {
                $a3 = "• " . $fichRepoEq["a3"];
            } else {
                $a3 = $fichRepoEq["a3"];
            }

            if ($fichRepoEq["accion4"] != 0) {
                $a4 = "• " . $fichRepoEq["a4"];
            } else {
                $a4 = $fichRepoEq["a4"];
            }
            if ($fichRepoEq["accion5"] != 0) {
                $a5 = "• " . $fichRepoEq["a5"];
            } else {
                $a5 = $fichRepoEq["a5"];
            }
            if ($fichRepoEq["accion6"] != 0) {
                $a6 = "• " . $fichRepoEq["a6"];
            } else {
                $a6 = $fichRepoEq["a6"];
            }
            if ($fichRepoEq["accion7"] != 0) {
                $a7 = "• " . $fichRepoEq["a7"];
            } else {
                $a7 = $fichRepoEq["a7"];
            }
            if ($fichRepoEq["accion8"] != 0) {
                $a8 = "• " . $fichRepoEq["a8"];
            } else {
                $a8 = $fichRepoEq["a8"];
            }
            // Bloque acciones

            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('OFICINA DE ESTADÍSTICA E INFORMÁTICA - SOPORTE TÉCNICO');
            $pdf->SetTitle($fichRepoEq["correlativo_Repo"]);
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
                        background-color: #ffffff;"><p style="text-align: center;"><b>' . $fichRepoEq["correlativo_Repo"] . '</b></p></td>
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
                                background-color: #ffffff;"> $fichRepoEq[area]</td>
                                <td style="text-align:left;vertical-align: middle; width:222.5px;background-color:white;
                                border-bottom: 0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                background-color: #ffffff;"> $fichRepoEq[subarea]</td>
                                <td style="text-align:left; width:222.5px;background-color:white;
                                border-bottom: 0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                border-right:   0.7px solid  #000000;
                                background-color: #ffffff;"> $fichRepoEq[responsable]</td>
                        </tr>
                        </table>
                        <table cellpadding="2" cellspacing="1.5" style="text-align:left; padding:5px 10px;">
                        <tr>
                        <td style="text-align:center; width:667px;background-color:white;"></td>
                        </tr>
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
                                        "> $fichRepoEq[categoria]</td>
                        <td style="text-align:left; width:59px;background-color:white;
                                        border-bottom:0.7px solid #000000;
                                        border-top:  0.7px solid  #000000;
                                        background-color: #E6E6E6;"> <b>N° Serie:</b></td>
                        <td style="text-align:left; width:297px;background-color:white;
                                        border-top:  0.7px solid  #000000;
                                        border-bottom:0.7px solid #000000;
                                        border-left:  0.7px solid  #000000;
                                        border-right:  0.7px solid  #000000;
                                        "> $fichRepoEq[serie]</td>
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
                                                "> $fichRepoEq[sbn]</td>
                                <td style="text-align:left; width:60px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Marca:</b></td>
                                <td style="text-align:left; width:140px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichRepoEq[marca]</td>
                                <td style="text-align:left; width:59px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                background-color: #E6E6E6;"> <b>Modelo:</b></td>
                                <td style="text-align:left; width:159px;background-color:white;
                                                border-bottom:0.7px solid #000000;
                                                border-left:  0.7px solid  #000000;
                                                border-right:  0.7px solid  #000000;
                                                "> $fichRepoEq[modelo]</td>
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
                                "> $fichRepoEq[fEval]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Condición Inicial:</b></td>
                        <td style="text-align:left; width:65px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[cinicial]</td>
                        <td style="text-align:left; width:140px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Técnico Evaluador:</b></td>
                        <td style="text-align:left; width:198.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[tecnico]</td>
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
                                "> $fichRepoEq[descInc]</td>
                        </tr>
                        <tr>
                        <td style="text-align:center; width:667px;background-color:white;"></td>
                        </tr>
                        <tr>
                                <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Diágnosticos Realizados :.</b> <i>(Lista de Diagnosticos realizados)</i></p></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:334px;background-color:white;
                        background-color: #ffffff;"> • $fichRepoEq[d1]</td>
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
                        <td style="text-align:center; width:667px;background-color:white;"></td>
                        </tr>
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
                                "> $fichRepoEq[finic]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Fecha Fin:</b></td>
                        <td style="text-align:left; width:65px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[ffin]</td>
                        <td style="text-align:left; width:140px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Trabajo Realizado:</b></td>
                        <td style="text-align:left; width:198.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[tipoTrabajo]</td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:150px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Desc. Primera Evaluación:</b></td>
                        <td style="text-align:left; width:519px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:   0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[primera_eval]</td>
                        </tr>
                        <tr>
                        <tr>
                        <td style="text-align:center; width:667px;background-color:white;"></td>
                        </tr>
                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>Acciones Realizadas :.</b> <i>(Lista de acciones o trabajos realizados)</i></p></td>
                        </tr>
                        <tr>
                        <td style="text-align:left; width:334px;background-color:white;
                        background-color: #ffffff;"> • $fichRepoEq[a1]</td>
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
                                "> $fichRepoEq[recomendaciones]</td>
                        </tr>
                        <tr>
                        <tr>
                        <td style="text-align:center; width:667px;background-color:white;"></td>
                        </tr>
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
                                "> $fichRepoEq[estAte]</td>
                        <td style="text-align:left; width:109.5px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>Condición Final:</b></td>
                        <td style="text-align:left; width:90px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[cfinal]</td>
                        <td style="text-align:left; width:200px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-top:  0.7px solid  #000000;
                                background-color: #E6E6E6;"> <b>¿Requiere Servicio de terceros?</b></td>
                        <td style="text-align:left; width:68.5px;background-color:white;
                                border-top:  0.7px solid  #000000;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[servTerce]</td>
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
                                "> $fichRepoEq[otros]</td>
                        <td style="text-align:left; width:60px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                background-color: #E6E6E6;"> <b>Detalles:</b></td>
                        <td style="text-align:left; width:516px;background-color:white;
                                border-bottom:0.7px solid #000000;
                                border-left:  0.7px solid  #000000;
                                border-right:  0.7px solid  #000000;
                                "> $fichRepoEq[obsOtros]</td>
                        </tr>
                        <br>
                        <tr>
                        <tr>
                        <td style="width:667px;background-color:white;background-color: white;"><p style="text-align: left;"><b>5. SUSCRIPCION DEL ACTA</b> <i>(Firmas y sellos de usuario responsable,técnico evaluador y Oficina de Estadística e Informática)</i></p></td>
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
            $pdf->Output($fichRepoEq["correlativo_Repo"] . '.pdf', 'I');
        }
    }
}
$fichaImprimirRepo = new ImprimirFichaReposicion();
$fichaImprimirRepo->idReposicion = $_GET["idReposicion"];
$fichaImprimirRepo->idTipo = $_GET["idTipo"];
$fichaImprimirRepo->imprimirFichaRepo();
