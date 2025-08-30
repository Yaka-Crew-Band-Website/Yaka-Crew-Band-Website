<?php
require_once('fpdf.php');

// Simple PDF report for the Home (Dashboard) page
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Yaka Crew Admin Panel - Dashboard Report',0,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->Ln(10);
$pdf->Cell(0,10,'Date: ' . date('Y-m-d H:i:s'),0,1);
$pdf->Ln(5);
$pdf->MultiCell(0,8,"This is a summary report for the Dashboard (Home) page.\n\nYou can customize this report to include more details as needed.");
$pdf->Output('D','dashboard_report.pdf');
exit;
?>
