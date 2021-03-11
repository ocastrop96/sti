<?php
require "tcpdf.php";
class MYPDF extends TCPDF
{
    //Page header
    public function Header()
    {
        // Logo HNSEB
        $image_file = K_PATH_IMAGES . 'logo-hnseb.png';
        $this->Image($image_file, 10, 10, 93, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Logo HNSEB
        $this->SetFont('helvetica', '', 8);
        // Logo SOPORTE
        $image_file2 = K_PATH_IMAGES . 'logo-soporte.png';
        $this->Image($image_file2, 170, 5, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Logo SOPORTE
    }
}
