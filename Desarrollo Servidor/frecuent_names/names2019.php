<?php
/* FPDF Table with MySQL
 * Author: Olivier
 * License: FPDF 
 * http://www.fpdf.org/en/script/script14.php
 *
 * IES Virgen del Carmen de Jaén
 * Desarrollo Web en Entorno Servidor 2º DAW
 * Rafael García Cabrera
 */

require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
    function Header()
    {
        // Title
        $this->SetFont('Arial', '', 18);
        $this->Cell(0, 6, 'Nombres mas frecuentes 2019', 0, 1, 'C');
        $this->Ln(10);
        // Ensure table header is printed
        parent::Header();
    }

    function Footer()
    {
        // Go to 1.5 cm from bottom
        $this->SetY(-15);
        // Select Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Print centered page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}


// Connect to database
//$link = mysqli_connect('localhost','root','root','test');
$link = new PDO('sqlite:names.db');

$pdf = new PDF();
$pdf->AddPage();
// First table: output all columns
$pdf->Table($link, 'select * from names order by frecuencia DESC');
$pdf->AddPage();


// Second table: specify 3 columns
$pdf->AddCol('sexo', 20, 'Sexo', 'L');
$pdf->AddCol('nombre', 40, 'NOMBRE');
$pdf->AddCol('printf("%,d",frecuencia)', 40, 'Frecuencia', 'C');
$prop = array('HeaderColor' => array(255, 150, 100),
    'color1' => array(210, 245, 255),
    'color2' => array(255, 255, 210),
    'padding' => 2);
$pdf->Table($link, 'select sexo, nombre, printf("%,d",frecuencia) from names order by frecuencia DESC limit 0,10', $prop);

$pdf->Output();
?>