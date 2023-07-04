<?php

include("/xampp/htdocs/project-rental-mobil/app/config/database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $NoPlat = $_POST['NoPlat'];
    $KdMerk = $_POST['KdMerk'];
    $IdType = $_POST['IdType'];
    $StatusRental = $_POST['StatusRental'];
    $HargaSewa = $_POST['HargaSewa'];
    $FotoMobil = $_FILES['FotoMobil']['name'];
    $tmpFoto = $_FILES['FotoMobil']['tmp_name'];
    $NmMerk = $_POST['NmMerk'];
    $NmType = $_POST['NmType'];
    $JenisMobil = $_POST['JenisMobil'];
    $Transmisi = $_POST['Transmisi'];

    $targetDir = "/xampp/htdocs/project-rental-mobil/app/img/assets/";
    $targetFile = $targetDir . basename($FotoMobil);

    if (move_uploaded_file($tmpFoto, $targetFile)) {
        // Insert data ke tabel 'mobil'
        $sqlMobil = "INSERT INTO mobil (NoPlat, KdMerk, IdType, StatusRental, HargaSewa, FotoMobil, JenisMobil, Transmisi) 
                     VALUES ('$NoPlat', '$KdMerk', '$IdType', '$StatusRental', '$HargaSewa', '$FotoMobil', '$JenisMobil', '$Transmisi')";

        if (mysqli_query($db, $sqlMobil)) {
            $mobilId = mysqli_insert_id($db); // Dapatkan ID mobil yang baru ditambahkan

            // Insert data ke tabel 'merk'
            $sqlMerk = "INSERT INTO merk (KdMerk, NmMerk) VALUES ('$KdMerk', '$NmMerk')";
            mysqli_query($db, $sqlMerk);

            // Insert data ke tabel 'type'
            $sqlType = "INSERT INTO type (IdType, NmType) VALUES ('$IdType', '$NmType')";
            mysqli_query($db, $sqlType);

            header('Location: ./data-mobil.php');
            exit();
        } else {
            echo "Error: " . $sqlMobil . "<br>" . mysqli_error($db);
        }
    } else {
        echo "Error uploading the file.";
    }
}
