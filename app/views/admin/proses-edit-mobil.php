<?php

include("/xampp/htdocs/project-rental-mobil/app/config/database.php");

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $NoPlat = $_POST['NoPlat'];
    $KdMerk = $_POST['KdMerk'];
    $IdType = $_POST['IdType'];
    $StatusRental = $_POST['StatusRental'];
    $HargaSewa = $_POST['HargaSewa'];
    $NmMerk = $_POST['NmMerk'];
    $NmType = $_POST['NmType'];
    $JenisMobil = $_POST['JenisMobil'];
    $Transmisi = $_POST['Transmisi'];

    // Periksa apakah file foto mobil diunggah
    if ($_FILES['FotoMobil']['name'] != '') {
        $FotoMobil = $_FILES['FotoMobil']['name'];

        // Lokasi sementara file yang diunggah
        $tempFile = $_FILES['FotoMobil']['tmp_name'];

        // Direktori tujuan penyimpanan file foto mobil
        $targetPath = "/xampp/htdocs/project-rental-mobil/app/img/assets/";

        // Pindahkan file yang diunggah ke direktori tujuan
        move_uploaded_file($tempFile, $targetPath . $FotoMobil);

        // Update nama file foto mobil dalam query SQL
        $sqlMobil = "UPDATE mobil SET NoPlat='$NoPlat', KdMerk='$KdMerk', IdType='$IdType', StatusRental='$StatusRental', HargaSewa='$HargaSewa', FotoMobil='$FotoMobil', JenisMobil='$JenisMobil', Transmisi='$Transmisi' WHERE id=$id";
    } else {
        // Jika tidak ada file foto diunggah, gunakan nilai foto mobil yang ada sebelumnya
        $sqlMobil = "UPDATE mobil SET NoPlat='$NoPlat', KdMerk='$KdMerk', IdType='$IdType', StatusRental='$StatusRental', HargaSewa='$HargaSewa', JenisMobil='$JenisMobil', Transmisi='$Transmisi' WHERE id=$id";
    }

    // Update tabel 'mobil'
    $queryMobil = mysqli_query($db, $sqlMobil);

    // Update tabel 'merk'
    $sqlMerk = "UPDATE merk SET NmMerk='$NmMerk' WHERE KdMerk='$KdMerk'";
    $queryMerk = mysqli_query($db, $sqlMerk);

    // Update tabel 'type'
    $sqlType = "UPDATE type SET NmType='$NmType' WHERE IdType='$IdType'";
    $queryType = mysqli_query($db, $sqlType);

    if ($queryMobil && $queryMerk && $queryType) {
        header('Location: ./data-mobil.php');
        exit();
    } else {
        die("Gagal menyimpan perubahan...");
    }
} else {
    die("Akses dilarang...");
}
?>
