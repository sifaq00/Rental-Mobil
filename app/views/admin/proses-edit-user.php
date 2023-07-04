<?php

include("/xampp/htdocs/project-rental-mobil/app/config/database.php");

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $NIK = $_POST['NIK'];
    $Nama = $_POST['Nama'];
    $NamaUser = $_POST['NamaUser'];
    $JenisKelamin = $_POST['JenisKelamin'];
    $Alamat = $_POST['Alamat'];
    $NoTelp = $_POST['NoTelp'];
    $RoleId = $_POST['RoleId'];
    $IsActive = isset($_POST['IsActive']) ? 1 : 0;

    $sql = "UPDATE users SET NIK='$NIK', Nama='$Nama', NamaUser='$NamaUser',  JenisKelamin='$JenisKelamin', Alamat='$Alamat', NoTelp='$NoTelp', RoleId='$RoleId', IsActive='$IsActive' WHERE id=$id";
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

?>
