<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../../vendor/fpdf/fpdf.php';

// Create a new PDF object
$pdf = new FPDF();
$pdf->AliasNbPages(); // Enable page numbering
$pdf->AddPage(); // Add a new page

// Set font and size for the table header
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 10, 'ID', 1, 0, 'C');
$pdf->Cell(20, 10, 'NIK', 1, 0, 'C');
$pdf->Cell(40, 10, 'Nama', 1, 0, 'C');
$pdf->Cell(30, 10, 'Nama User', 1, 0, 'C');
$pdf->Cell(30, 10, 'Jenis Kelamin', 1, 0, 'C');
$pdf->Cell(40, 10, 'Alamat', 1, 0, 'C');
$pdf->Cell(30, 10, 'No. Telp', 1, 0, 'C');
$pdf->Cell(25, 10, 'Role User', 1, 1, 'C'); // Changed the parameters for a line break

// Set font and size for the table data
$pdf->SetFont('Arial', '', 10);

// Fetch users from the database
$sql = "SELECT id, NIK, Nama, NamaUser, JenisKelamin, Alamat, NoTelp, role FROM viewusers";
$query = mysqli_query($db, $sql);

if ($query) {
    if (mysqli_num_rows($query) > 0) {
        // Loop through each row of data
        while ($viewusers = mysqli_fetch_array($query)) {
            // Display user data in table cells
            $pdf->Cell(10, 10, $viewusers['id'], 1, 0, 'C');
            $pdf->Cell(20, 10, $viewusers['NIK'], 1, 0, 'C');
            $pdf->Cell(40, 10, $viewusers['Nama'], 1, 0, 'C');
            $pdf->Cell(30, 10, $viewusers['NamaUser'], 1, 0, 'C');
            $pdf->Cell(30, 10, $viewusers['JenisKelamin'], 1, 0, 'C');
            $pdf->Cell(40, 10, $viewusers['Alamat'], 1, 0, 'C');
            $pdf->Cell(30, 10, $viewusers['NoTelp'], 1, 0, 'C');
            $pdf->Cell(25, 10, $viewusers['role'], 1, 1, 'C'); // Changed the parameters for a line break
        }
    } else {
        $pdf->Cell(0, 10, 'No users found', 1, 1, 'C');
    }
} else {
    $pdf->Cell(0, 10, 'Error: ' . mysqli_error($db), 1, 1, 'C');
}

// Output the PDF
$pdf->Output();
?>
