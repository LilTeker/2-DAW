<?php
require('fpdf.php');

class PDF extends FPDF
{
// Page header
    function Header()
    {
        // Logo
        $this->Image('logo.gif',10,5,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(60);
        // Title
        $this->Cell(90,10,'Informacion Sobre TLA Consulting',1,0,'C');
        // Line break
        $this->Ln(40);
    }

// Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    public function firstParagraph() {
        $this->SetFont('Arial','B',15);
        $this->Cell(0,10,'Sobre Nosotros',0,0,'C');
        $this->Ln(20);
        $this->SetFont('Times','',12);
        $this->Cell(0,10,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore ',0,1);
        $this->Cell(0,10,'magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea',0,1);
        $this->Cell(0,10,'commodo consequat. ',0,1);

        $this->Ln(10);
        $this->Cell(0,10,'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. ',0,1);
        $this->Cell(0,10,'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',0,1);
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->firstParagraph();

$pdf->Output();
?>