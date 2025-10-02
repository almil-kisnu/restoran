<?php
$server     ="localhost";
$username   ="root";
$password   ="";
$database   ="almil";
$koneksi = mysqli_connect($server,$username,$password,$database);

if(mysqli_connect_erno()){
    echo"koneksi error : ".mysqli.connect.error();
}