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
        $pdf->writeHTMLCell(0, 0, 15, 25, $htmlhead, 0, 1, 0, true, 'L', true);
        $htmlhead = '<br>';
        $pdf->writeHTMLCell(0, 0, 15, 37, $htmlhead, 0, 1, 0, true, 'L', true);
        $pdf->Output('ficha-mantenimiento.pdf', 'I');
    }
}
$fichaImprimirMant = new ImprimirFichaMantenimiento();
$fichaImprimirMant->idMantenimiento = $_GET["idMantenimiento"];
$fichaImprimirMant->idTipo = $_GET["idTipo"];
$fichaImprimirMant->imprimirFichaMant();
