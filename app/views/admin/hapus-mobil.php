<?php
include("/xampp/htdocs/project-rental-mobil/app/config/database.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM mobil WHERE id=$id";
    $query = mysqli_query($db, $sql);

    if ($query) {
        header('Location: ./data-mobil.php');
        exit;
    } else {
        die("Gagal menghapus...");
    }
} else {
    die("Akses dilarang...");
}
?>
