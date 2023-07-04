<?php
include("/xampp/htdocs/project-rental-mobil/app/config/database.php");

if (isset($_GET['NoTransaksi'])) {
    $NoTransaksi = $_GET['NoTransaksi'];

    $sql = "DELETE FROM transaksi WHERE NoTransaksi='$NoTransaksi'";
    $query = mysqli_query($db, $sql);

    if ($query) {
        header('Location: ./data-transaksi.php');
        exit;
    } else {
        die("Gagal menghapus...");
    }
} else {
    die("Akses dilarang...");
}
?>
