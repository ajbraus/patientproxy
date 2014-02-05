<?php
require_once ( 'fpdf/pdfadd.php' );
$html = 'You can use html formatting here.';

$pdf = new PDF();
// First page
$pdf->AddPage();
$pdf->SetFont('Arial','',20);
$pdf->Write(5,"yay yay yay!!!!! I figured it out.");
/*$pdf->SetFont('','U');
$link = $pdf->AddLink();
$pdf->Write(5,'here',$link);*/
$pdf->SetFont('');
// Second page
$pdf->AddPage();
$pdf->SetLeftMargin(45);
$pdf->SetFontSize(14);
$pdf->WriteHTML($html);

$harvey = $pdf->Output('', 'S');

?>