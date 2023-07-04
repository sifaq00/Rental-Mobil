<?php 

include("/xampp/htdocs/project-rental-mobil/app/config/database.php");

if(isset($_POST['simpan'])){
    $NIK = $_POST['NIK'];
    $Nama = $_POST['Nama'];
    $NamaUser = $_POST['NamaUser'];
    $Password = $_POST['Password'];
    $JenisKelamin = $_POST['JenisKelamin'];
    $Alamat = $_POST['Alamat'];
    $NoTelp = $_POST['NoTelp'];
    $RoleId = $_POST['RoleId'];


    $sql = "INSERT INTO users (NIK, Nama, NamaUser, Password, JenisKelamin, Alamat, NoTelp, RoleId) VALUES ('$NIK', '$Nama', '$NamaUser', '$Password', '$JenisKelamin', '$Alamat', '$NoTelp', '$RoleId')";  
    $query = mysqli_query($db, $sql);

    if ($query) {
        echo "<script>
            alert('Registrasi berhasil! Harap tunggu aktivasi dari admin atau hubungi admin melalui WhatsApp.');
            window.location.href = '/project-rental-mobil/app/views/auth/login.php';
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    
}

?>
