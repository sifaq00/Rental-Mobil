<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../../vendor/fpdf/fpdf.php'; // Update the path to the FPDF library file

// Periksa apakah nomor transaksi tersedia di URL
if (isset($_GET['notransaksi'])) {
    $noTransaksi = $_GET['notransaksi'];

    // Mengambil data transaksi berdasarkan nomor transaksi
    $query = "SELECT * FROM viewriwayattransaksi WHERE NoTransaksi = '$noTransaksi'";
    $result = mysqli_query($db, $query);

    // Periksa apakah transaksi ditemukan
    if ($row = mysqli_fetch_assoc($result)) {
        // Create a new PDF instance
        class PDF extends FPDF {
            function Header() {
                // Implement header if needed
            }

            function Footer() {
                // Implement footer if needed
            }
        }

        $pdf = new PDF();

        // Generate the PDF content
        $pdf->SetFont('Arial', '', 12);
        $pdf->AddPage();
        $pdf->Cell(0, 10, 'Kuitansi Transaksi', 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Nomor Transaksi: ' . $row['NoTransaksi'], 0, 1);
        $pdf->Cell(0, 10, 'NIK: ' . $row['NIK'], 0, 1);
        $pdf->Cell(0, 10, 'Nama Type: ' . $row['NmType'], 0, 1);
        $pdf->Cell(0, 10, 'Tanggal Pesan: ' . $row['Tanggal_Pesan'], 0, 1);
        $pdf->Cell(0, 10, 'Tanggal Pinjam: ' . $row['Tanggal_Pinjam'], 0, 1);
        $pdf->Cell(0, 10, 'Tanggal Kembali Rencana: ' . $row['Tanggal_Kembali_Rencana'], 0, 1);
        $pdf->Cell(0, 10, 'Total Harga: ' . $row['TotalHarga'], 0, 1);
        $pdf->Cell(0, 10, 'Status Transaksi: ' . $row['StatusTransaksi'], 0, 1);

        // Output the generated PDF to the browser
        $pdf->Output('D', 'KuitansiJavaEllTrans.pdf');
        exit();
    } else {
        echo "Transaksi tidak ditemukan.";
    }
} else {
    echo "Nomor transaksi tidak tersedia.";
}
?>
