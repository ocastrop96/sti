<?php
require_once "../controllers/ControladorIntegracion.php";
require_once "../models/ModeloIntegracion.php";
error_reporting(0);
class ImprimirFichaIntegracionImp
{
    public $idIntegracion;
    public function imprimirFichaIMP()
    {
        require_once "../util/tcpdf/headFichaTecnica.php";
        $idInt = $this->idIntegracion;

        // Condicionales acorde al tipo de resultado


        $item = "idIntegracion";
        $fichIntIMP = ControladorIntegracion::ctrListarIntegracionesI($item, $idInt);
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('OFICINA DE ESTADÍSTICA E INFORMÁTICA - SOPORTE TÉCNICO');
        $pdf->SetTitle($fichIntIMP["correlativo_integracion"]);
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
        $htmlhead = '<h1 style="text-align:center;"><i>FICHA TÉCNICA DE IMPRESORAS Y PERIFÉRICOS<br>(Impresora, Escáner,Ticketera,etc)</i></h1>';
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
                    border-left:   1px solid  #000000;"><p style="text-align: center;"><b>$fichIntIMP[nro_eq]</b></p></td>
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
                    ">$fichIntIMP[departamento]</td>
                </tr>
                <tr>
                    <td style="text-align:left; width:169.8px;background-color:white;
                    background-color: white;"> ÁREA / SERVICIO :</td>
                    <td style="text-align:left; width:270px;background-color:white;
                    border-bottom: 1px solid #000000;">$fichIntIMP[servicio]</td>
                </tr>
                <tr>
                    <td style="text-align:left; width:169.8x;background-color:white;
                    background-color: white;"> USUARIO RESPONSABLE :</td>
                    <td style="text-align:left; width:270px;background-color:white;
                    border-bottom: 1px solid #000000;"> $fichIntIMP[nombRes] $fichIntIMP[apellRes]</td>
                </tr>

                <tr>
                    <td style="width:671px;background-color:white;
                    background-color: white;"><p style="text-align: left;"><b>2. DATOS DEL ACTIVO</b></p></td>
                </tr>
                <tr>
                    <td style="text-align:left; width:165px;background-color:white;
                    background-color: white;"> FECHA DE ADQUISICIÓN :</td>
                    <td style="text-align:left; width:100px;background-color:white;border-bottom: 1px solid #000000;
                    "> $fichIntIMP[fcompraimp]</td>
                    <td style="text-align:left; width:140px;background-color:white;
                    background-color: white;"> TIEMPO DE GARANTÍA :</td>
                    <td style="text-align:left; width:70px;background-color:white;border-bottom: 1px solid #000000;
                    "> $fichIntIMP[garantiaimp]</td>
                </tr>
                <tr>
                    <td style="text-align:left; width:165px;background-color:white;
                    background-color: white;"> N° DE ORDEN DE COMPRA :</td>
                    <td style="text-align:left; width:150px;background-color:white;border-bottom: 1px solid #000000;
                    "> $fichIntIMP[Ordenimp]</td>
                    <td style="text-align:left; width:70px;background-color:white;
                    background-color: white;"> ESTADO :</td>
                    <td style="text-align:left; width:80px;background-color:white;border-bottom: 1px solid #000000;
                    "> $fichIntIMP[detaEstado]</td>
                </tr>
                <tr>
                    <td style="text-align:center; width:667px;background-color:white;"></td>
                </tr>
                <tr>
                    <td style="width:671px;background-color:white;"><p style="text-align: center;"><b> Datos Generales de la Impresora o periférico</b></p></td>
                </tr>
                <tr>
                <td style="text-align:center; width:667px;background-color:white;"></td>
                </tr>
                <tr>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-top: 1px solid #000000;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: #E6E6E6;"> <b>T. PERIFÉRICO</b></td>
                    <td style="text-align: center; vertical-align: middle; width:90px;background-color:white;
                    border-top: 1px solid #000000;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: #E6E6E6;"> <b>MARCA</b></td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-top: 1px solid #000000;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: #E6E6E6;"> <b>SERIE</b></td>
                    <td style="text-align:center;vertical-align: middle; width:115px;background-color:white;
                    border-top: 1px solid #000000;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: #E6E6E6;"> <b>MODELO</b></td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-top: 1px solid #000000;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: #E6E6E6;"> <b>IP</b></td>
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
                    background-color: white;"> $fichIntIMP[detaCategoria]</td>
                    <td style="text-align: center; vertical-align: middle; width:90px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntIMP[marcaimp]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntIMP[serieimp]</td>
                    <td style="text-align:center;vertical-align: middle; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntIMP[modeloimp]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: white;"> $fichIntIMP[ip]</td>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    border-right:   1px solid  #000000;
                    background-color: white;"> $fichIntIMP[sbnimp]</td>
                </tr>
                <tr>
                    <td style="text-align:center; width:115px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    background-color: #E6E6E6;"> <b>DESCRIPCIÓN</b></td>
                    <td style="text-align: left; vertical-align: middle; width:555px;background-color:white;
                    border-bottom: 1px solid #000000;
                    border-left:   1px solid  #000000;
                    border-right:   1px solid  #000000;
                    background-color: white;"> $fichIntIMP[descripcionimp]</td>            
                </tr>
                </table>
            EOF;
        $pdf->writeHTML($html, false, false, false, false, '');
        $pdf->Output($fichIntIMP["correlativo_integracion"] . '.pdf', 'I');
    }
}



$fichaImprimir = new ImprimirFichaIntegracionImp();
$fichaImprimir->idIntegracion = $_GET["idIntegracion"];
$fichaImprimir->imprimirFichaIMP();
