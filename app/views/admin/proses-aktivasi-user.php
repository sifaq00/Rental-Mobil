<?php

include("/xampp/htdocs/project-rental-mobil/app/config/database.php");

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $IsActive = isset($_POST['IsActive']) ? 1 : 0;

    $sql = "UPDATE users SET IsActive='$IsActive' WHERE id=$id";
    $query = mysqli_query($db, $sql);

    if ($query) {
        header('Location: ./user.php');
        exit();
    } else {
        die("Gagal menyimpan perubahan...");
    }
} else {
    die("Akses dilarang...");
}
