<?php

define('BASEURL', 'https://localhost/project-rental-mobil/app/views/home/index.php');

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "rental_mobil";

$db = mysqli_connect($server, $user, $password, $nama_database);


if (!$db) {
   die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
