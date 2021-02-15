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
        $this->Cell(0, 6, 'World populations 2019', 0, 1, 'C');
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
$link = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');

$pdf = new PDF();
$pdf->AddPage();
// First table: output all columns
$pdf->Table($link, 'select * from country order by name');
$pdf->AddPage();
// Second table: specify 3 columns
$pdf->AddCol('rank', 20, '', 'C');
$pdf->AddCol('name', 40, 'Country');
$pdf->AddCol('pop', 40, 'Population (2019)', 'R');
$prop = array('HeaderColor' => array(255, 150, 100),
    'color1' => array(210, 245, 255),
    'color2' => array(255, 255, 210),
    'padding' => 2);
$pdf->Table($link, 'select name, format(pop*1000,0) as pop, rank from country order by rank limit 0,10', $prop);
$pdf->Output();
?>
