<?php
require_once('fpdf.php');

// Get the page type from POST
$page = isset($_POST['page']) ? $_POST['page'] : 'home';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Yaka Crew Admin Panel - Report',0,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->Ln(10);
$pdf->Cell(0,10,'Date: ' . date('Y-m-d H:i:s'),0,1);
$pdf->Ln(5);

switch($page) {
    case 'home':
        $pdf->Cell(0,10,'Dashboard Report',0,1);
        $pdf->MultiCell(0,8,"This is a summary report for the Dashboard (Home) page.\n\nYou can customize this report to include more details as needed.");
        break;
    case 'music':
        $pdf->Cell(0,10,'Music Management Report',0,1);
        $pdf->MultiCell(0,8,"This is a summary report for the Music Management page.\n\nAdd more details as needed.");
        break;
    case 'video':
        $pdf->Cell(0,10,'Video Management Report',0,1);
        $pdf->MultiCell(0,8,"This is a summary report for the Video Management page.\n\nAdd more details as needed.");
        break;
    case 'bookings':
        $pdf->Cell(0,10,'Booking Management Report',0,1);
        $pdf->MultiCell(0,8,"This is a summary report for the Booking Management page.\n\nAdd more details as needed.");
        break;
    case 'events':
        $pdf->Cell(0,10,'Event Management Report',0,1);
        $pdf->MultiCell(0,8,"This is a summary report for the Event Management page.\n\nAdd more details as needed.");
        break;
    case 'blogs':
        $pdf->Cell(0,10,'Blog Management Report',0,1);
        $pdf->MultiCell(0,8,"This is a summary report for the Blog Management page.\n\nAdd more details as needed.");
        break;
    case 'merchandise-store':
        $pdf->Cell(0,10,'Merchandise Store Report',0,1);
        $pdf->MultiCell(0,8,"This is a summary report for the Merchandise Store page.\n\nAdd more details as needed.");
        break;
    default:
        $pdf->Cell(0,10,'General Report',0,1);
        $pdf->MultiCell(0,8,"This is a general report.\n\nAdd more details as needed.");
        break;
}

$pdf->Output('D','admin_report_'.$page.'_'.date('Ymd_His').'.pdf');
exit;
?>
