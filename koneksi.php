<?php
$servername = "localhost";
$database = "skill+";
$username = "root";
$password = "";

$koneksi = mysqli_connect($servername, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

mysqli_select_db($koneksi, $database); 
?>