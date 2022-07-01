<?php

use phpDocumentor\Reflection\PseudoTypes\False_;

defined('BASEPATH') or exit('No direct script access allowed');
require_once('vendor/tecnickcom/tcpdf/examples/tcpdf_include.php');
class MYPDF extends TCPDF
{
    public function Header()
    {
        $image_file = K_PATH_IMAGES . 'logo_jmto-removebg-preview.png';
        $this->Image($image_file, 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->SetFont('times', 'B', 20);
        $this->Cell(0, 15, 'KARTU KENDALI SURAT MASUK', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }
    public function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('times', 'I', 8);
        $this->Cell(0, 10, 'Page' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
// create new PDF document

//============================================================+
// END OF FILE
//============================================================+