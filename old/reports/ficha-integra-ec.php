<?php
require_once "../controllers/ControladorIntegracion.php";
require_once "../models/ModeloIntegracion.php";
// error_reporting(0);
class ImprimirFichaIntegracionEC
{
    public $idIntegracion;
    public function imprimirFichaEC()
    {
        require_once "../util/tcpdf/headFichaTecnica.php";
        $idInt = $this->idIntegracion;
        $idTip = $this->idTipo;
        // Condicionales acorde al tipo de resultado
        if ($idTip == 1) {
            $item = "idIntegracion";
            $fichIntEC = ControladorIntegracion::ctrListarIntegracionesC($item, $idInt);
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('OFICINA DE ESTADÍSTICA E INFORMÁTICA - SOPORTE TÉCNICO');
            $pdf->SetTitle($fichIntEC["correlativo_integracion"]);
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
            $htmlhead = '<h1 style="text-align:center;"><i>FICHA TÉCNICA DE EQUIPOS DE COMPUTO<br>(PCs,LAPTOPs Y SERVIDORES)</i></h1>';
            $pdf->writeHTMLCell(0, 0, 15, 25, $htmlhead, 0, 1, 0, true, 'L', true);
            $htmlhead = '<br>';
            $pdf->writeHTMLCell(0, 0, 15, 37, $htmlhead, 0, 1, 0, true, 'L', true);
            $html =
                <<<EOF
                <table cellpadding="2" cellspacing="1.2" class="block-1" style="text-align:center;">
                <tr>
                    <td style="text-align:center; width:492px;background-color:white;"></td>
                    <td style="width:160px;background-color:white;
                    border-top:    1px solid  #000000;
                    border-right:  1px solid #000000;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: #E6E6E6;"><p style="text-align: center;"><b>ID PC N°</b></p></td>
                </tr>
                <tr>
                <td style="text-align:center; width:492px;background-color:white;"></td>
                    <td style="width:160px;background-color:white;
                    border-right:  1px solid #000000;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;"><p style="text-align: center;"><b>$fichIntEC[nro_eq]</b></p></td>
                </tr>
                </table>

                <table cellpadding="1" cellspacing="1" style="text-align:left;" border="">
                <tr>
                    <td style="text-align:center; width:667px;background-color:white;"></td>
                </tr>
                </table>

                <table cellpadding="2" cellspacing="1.2" style="text-align:left;" border="">
                <tr>
                    <td style="width:300px;background-color:white;
                    background-color: white;"><p style="text-align: left;"><b>1. UBICACIÓN Y RESPONSABLE DEL EQUIPO</b></p></td>
                </tr>
                <tr>
                    <td style="text-align:left; width:170px;background-color:white;
                    background-color: white;"> OFICINA / DEPARTAMENTO :</td>
                    <td style="text-align:left; width:270px;background-color:white;
                    border-bottom: 1px solid #000000;
                    ">$fichIntEC[departamento]</td>
                </tr>
                <tr>
                    <td style="text-align:left; width:169.8px;background-color:white;
                    background-color: white;"> ÁREA / SERVICIO :</td>
                    <td style="text-align:left; width:270px;background-color:white;
                    border-bottom: 1px solid #000000;">$fichIntEC[servicio]</td>
                </tr>
                <tr>
                    <td style="text-align:left; width:169.8x;background-color:white;
                    background-color: white;"> USUARIO RESPONSABLE :</td>
                    <td style="text-align:left; width:270px;background-color:white;
                    border-bottom: 1px solid #000000;"> $fichIntEC[nombRes] $fichIntEC[apellRes]</td>
                </tr>

                <tr>
                    <td style="width:671px;background-color:white;
                    background-color: white;"><p style="text-align: left;"><b>2. DATOS DEL ACTIVO</b></p></td>
                </tr>
                <tr>
                    <td style="text-align:left; width:165px;background-color:white;
                    background-color: white;"> FECHA DE ADQUISICIÓN :</td>
                    <td style="text-align:left; width:100px;background-color:white;border-bottom: 1px solid #000000;
                    "> $fichIntEC[fcomprapc]</td>
                    <td style="text-align:left; width:140px;background-color:white;
                    background-color: white;"> TIEMPO DE GARANTÍA :</td>
                    <td style="text-align:left; width:70px;background-color:white;border-bottom: 1px solid #000000;
                    "> $fichIntEC[garantiapc]</td>
                </tr>
                <tr>
                    <td style="text-align:left; width:165px;background-color:white;
                    background-color: white;"> N° DE ORDEN DE COMPRA :</td>
                    <td style="text-align:left; width:150px;background-color:white;border-bottom: 1px solid #000000;
                    "> $fichIntEC[Ordenpc]</td>
                    <td style="text-align:left; width:70px;background-color:white;
                    background-color: white;"> ESTADO :</td>
                    <td style="text-align:left; width:80px;background-color:white;border-bottom: 1px solid #000000;
                    "> $fichIntEC[detaEstado]</td>
                </tr>
                <tr>
                    <td style="text-align:center; width:667px;background-color:white;"></td>
                </tr>
                <tr>
                    <td style="width:671px;background-color:white;"><p style="text-align: center;"><b> Datos Generales del Equipo de Computo</b></p></td>
                </tr>
                <tr>
                <td style="text-align:center; width:667px;background-color:white;"></td>
                </tr>
                <tr>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-top: 1px solid #000000;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: #E6E6E6;"> <b>COMPONENTE</b></td>
                    <td style="text-align: center; vertical-align: middle; width:90px;background-color:white;
                    border-top: 1px solid #000000;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: #E6E6E6;"> <b>MARCA</b></td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-top: 1px solid #000000;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: #E6E6E6;"> <b>CAPACIDAD / VELOCIDAD</b></td>
                    <td style="text-align:center;vertical-align: middle; width:115px;background-color:white;
                    border-top: 1px solid #000000;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: #E6E6E6;"> <b>MODELO</b></td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-top: 1px solid #000000;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: #E6E6E6;"> <b>SERIE</b></td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-top: 1px solid #000000;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    border-right:   1px solid  #000000;
                    background-color: #E6E6E6;"> <b>COD. PATR</b></td>
                    
                </tr>
                <tr>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> <b>CASE</b></td>
                    <td style="text-align: center; vertical-align: middle; width:90px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[marcapc]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> <b></b></td>
                    <td style="text-align:center;vertical-align: middle; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[modelopc]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[seriepc]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    border-right:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[sbnpc]</td>
                </tr>
                <tr>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> <b>PROCESADOR</b></td>
                    <td style="text-align: center; vertical-align: middle; width:90px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> INTEL</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[vprocesadorpc]</td>
                    <td style="text-align:center;vertical-align: middle; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[procesadorpc]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> </td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    border-right:   1px solid  #000000;
                    background-color: white;"> </td>
                </tr>
                <tr>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> <b>RAM</b></td>
                    <td style="text-align: center; vertical-align: middle; width:90px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[marcapc]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[rampc]</td>
                    <td style="text-align:center;vertical-align: middle; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> </td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> </td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    border-right:   1px solid  #000000;
                    background-color: white;"> </td>
                </tr>
                <tr>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> <b>DISCO DURO</b></td>
                    <td style="text-align: center; vertical-align: middle; width:90px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[marcapc]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[ddpc]</td>
                    <td style="text-align:center;vertical-align: middle; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> </td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> </td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    border-right:   1px solid  #000000;
                    background-color: white;"> </td>
                </tr>
                <tr>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> <b>MONITOR</b></td>
                    <td style="text-align: center; vertical-align: middle; width:90px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[marcamon]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> <b></b></td>
                    <td style="text-align:center;vertical-align: middle; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[modelomon]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[seriemon]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    border-right:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[sbnmon]</td>
                </tr>
                <tr>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> <b>TECLADO</b></td>
                    <td style="text-align: center; vertical-align: middle; width:90px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[marcatec]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> <b></b></td>
                    <td style="text-align:center;vertical-align: middle; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[modelotec]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[serietec]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    border-right:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[sbntec]</td>
                </tr>
                <tr>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> <b>F. ENERGIA</b></td>
                    <td style="text-align: center; vertical-align: middle; width:90px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[marcaAcu]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> <b></b></td>
                    <td style="text-align:center;vertical-align: middle; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[modeloAcu]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[serieAcu]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    border-right:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[sbnAcu]</td>
                </tr>
                </table>
            EOF;
            $pdf->writeHTML($html, false, false, false, false, '');
            $pdf->Output($fichIntEC["correlativo_integracion"] . '.pdf', 'I');
        } else {
            $item = "idIntegracion";
            $fichIntEC = ControladorIntegracion::ctrListarIntegracionesC2($item, $idInt);
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('OFICINA DE ESTADÍSTICA E INFORMÁTICA - SOPORTE TÉCNICO');
            $pdf->SetTitle($fichIntEC["correlativo_integracion"]);
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
            $htmlhead = '<h1 style="text-align:center;"><i>FICHA TÉCNICA DE EQUIPOS DE COMPUTO<br>(PCs,LAPTOPs Y SERVIDORES)</i></h1>';
            $pdf->writeHTMLCell(0, 0, 15, 25, $htmlhead, 0, 1, 0, true, 'L', true);
            $htmlhead = '<br>';
            $pdf->writeHTMLCell(0, 0, 15, 37, $htmlhead, 0, 1, 0, true, 'L', true);
            $html =
                <<<EOF
                <table cellpadding="2" cellspacing="1.2" class="block-1" style="text-align:center;">
                <tr>
                    <td style="text-align:center; width:492px;background-color:white;"></td>
                    <td style="width:160px;background-color:white;
                    border-top:    1px solid  #000000;
                    border-right:  1px solid #000000;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: #E6E6E6;"><p style="text-align: center;"><b>ID PC N°</b></p></td>
                </tr>
                <tr>
                <td style="text-align:center; width:492px;background-color:white;"></td>
                    <td style="width:160px;background-color:white;
                    border-right:  1px solid #000000;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;"><p style="text-align: center;"><b>$fichIntEC[nro_eq]</b></p></td>
                </tr>
                </table>

                <table cellpadding="1" cellspacing="1" style="text-align:left;" border="">
                <tr>
                    <td style="text-align:center; width:667px;background-color:white;"></td>
                </tr>
                </table>

                <table cellpadding="2" cellspacing="1.2" style="text-align:left;" border="">
                <tr>
                    <td style="width:300px;background-color:white;
                    background-color: white;"><p style="text-align: left;"><b>1. UBICACIÓN Y RESPONSABLE DEL EQUIPO</b></p></td>
                </tr>
                <tr>
                    <td style="text-align:left; width:170px;background-color:white;
                    background-color: white;"> OFICINA / DEPARTAMENTO :</td>
                    <td style="text-align:left; width:270px;background-color:white;
                    border-bottom: 1px solid #000000;
                    ">$fichIntEC[departamento]</td>
                </tr>
                <tr>
                    <td style="text-align:left; width:169.8px;background-color:white;
                    background-color: white;"> ÁREA / SERVICIO :</td>
                    <td style="text-align:left; width:270px;background-color:white;
                    border-bottom: 1px solid #000000;">$fichIntEC[servicio]</td>
                </tr>
                <tr>
                    <td style="text-align:left; width:169.8x;background-color:white;
                    background-color: white;"> USUARIO RESPONSABLE :</td>
                    <td style="text-align:left; width:270px;background-color:white;
                    border-bottom: 1px solid #000000;"> $fichIntEC[nombRes] $fichIntEC[apellRes]</td>
                </tr>

                <tr>
                    <td style="width:671px;background-color:white;
                    background-color: white;"><p style="text-align: left;"><b>2. DATOS DEL ACTIVO</b></p></td>
                </tr>
                <tr>
                    <td style="text-align:left; width:165px;background-color:white;
                    background-color: white;"> FECHA DE ADQUISICIÓN :</td>
                    <td style="text-align:left; width:100px;background-color:white;border-bottom: 1px solid #000000;
                    "> $fichIntEC[fcomprapc]</td>
                    <td style="text-align:left; width:140px;background-color:white;
                    background-color: white;"> TIEMPO DE GARANTÍA :</td>
                    <td style="text-align:left; width:70px;background-color:white;border-bottom: 1px solid #000000;
                    "> $fichIntEC[garantiapc]</td>
                </tr>
                <tr>
                    <td style="text-align:left; width:165px;background-color:white;
                    background-color: white;"> N° DE ORDEN DE COMPRA :</td>
                    <td style="text-align:left; width:150px;background-color:white;border-bottom: 1px solid #000000;
                    "> $fichIntEC[Ordenpc]</td>
                    <td style="text-align:left; width:70px;background-color:white;
                    background-color: white;"> ESTADO :</td>
                    <td style="text-align:left; width:80px;background-color:white;border-bottom: 1px solid #000000;
                    "> $fichIntEC[detaEstado]</td>
                </tr>
                <tr>
                    <td style="text-align:center; width:667px;background-color:white;"></td>
                </tr>
                <tr>
                    <td style="width:671px;background-color:white;"><p style="text-align: center;"><b> Datos Generales del Equipo de Computo</b></p></td>
                </tr>
                <tr>
                <td style="text-align:center; width:667px;background-color:white;"></td>
                </tr>
                <tr>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-top: 1px solid #000000;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: #E6E6E6;"> <b>COMPONENTE</b></td>
                    <td style="text-align: center; vertical-align: middle; width:90px;background-color:white;
                    border-top: 1px solid #000000;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: #E6E6E6;"> <b>MARCA</b></td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-top: 1px solid #000000;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: #E6E6E6;"> <b>CAPACIDAD / VELOCIDAD</b></td>
                    <td style="text-align:center;vertical-align: middle; width:115px;background-color:white;
                    border-top: 1px solid #000000;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: #E6E6E6;"> <b>MODELO</b></td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-top: 1px solid #000000;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: #E6E6E6;"> <b>SERIE</b></td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-top: 1px solid #000000;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    border-right:   1px solid  #000000;
                    background-color: #E6E6E6;"> <b>COD. PATR</b></td>
                    
                </tr>
                <tr>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> <b>CASE</b></td>
                    <td style="text-align: center; vertical-align: middle; width:90px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[marcapc]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> <b></b></td>
                    <td style="text-align:center;vertical-align: middle; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[modelopc]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[seriepc]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    border-right:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[sbnpc]</td>
                </tr>
                <tr>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> <b>PROCESADOR</b></td>
                    <td style="text-align: center; vertical-align: middle; width:90px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> INTEL</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[vprocesadorpc]</td>
                    <td style="text-align:center;vertical-align: middle; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[procesadorpc]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> </td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    border-right:   1px solid  #000000;
                    background-color: white;"> </td>
                </tr>
                <tr>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> <b>RAM</b></td>
                    <td style="text-align: center; vertical-align: middle; width:90px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[marcapc]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[rampc]</td>
                    <td style="text-align:center;vertical-align: middle; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> </td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> </td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    border-right:   1px solid  #000000;
                    background-color: white;"> </td>
                </tr>
                <tr>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> <b>DISCO DURO</b></td>
                    <td style="text-align: center; vertical-align: middle; width:90px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[marcapc]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntEC[ddpc]</td>
                    <td style="text-align:center;vertical-align: middle; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> </td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> </td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    border-right:   1px solid  #000000;
                    background-color: white;"> </td>
                </tr>
                </table>
            EOF;
            $pdf->writeHTML($html, false, false, false, false, '');
            $pdf->Output('ficha-ec.pdf', 'I');
        }
    }
}



$fichaImprimir = new ImprimirFichaIntegracionEC();
$fichaImprimir->idIntegracion = $_GET["idIntegracion"];
$fichaImprimir->idTipo = $_GET["idTipo"];
$fichaImprimir->imprimirFichaEC();
