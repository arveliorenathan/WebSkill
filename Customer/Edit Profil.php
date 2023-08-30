<?php
include '../koneksi.php';
$id = $_GET['id'];

if (isset($_POST["submit"])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $gender = $_POST['gender'];
    $no_hp = $_POST['no_hp'];
    $domisili = $_POST['domisili'];

    $query = "UPDATE actor SET 
        nama_lengkap = '$nama_lengkap',
        tanggal_lahir = '$tanggal_lahir',
        gender = '$gender',
        no_hp = '$no_hp',
        domisili = '$domisili'
        WHERE id = '$id'";

    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        echo "<script>
                alert('Data Berhasil Diperbarui');
                window.location.href = 'Profil-Profil Saya.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Tidak Berhasil Diperbarui');
                window.location.href = 'Profil-Profil Saya.php';
              </script>";
    }
}
?>