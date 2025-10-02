<?php
$server     = "localhost";
$username   = "root";
$password   = "";
$database   = "tugas";

// Membuat koneksi ke database MySQL
$koneksi = mysqli_connect($server, $username, $password, $database);

// Mengecek apakah koneksi gagal
if (mysqli_connect_errno()) {
    echo "Koneksi error : " . mysqli_connect_error();
    exit;
}
?>
