<?php
include '../koneksi.php';


if (isset($_POST["submit"])) {
    $id_bootcamp = $_GET['id_bootcamp'];
    $gambar_bootcamp = $_FILES['gambar_bootcamp'];
    $foto3 = $_FILES['gambar_bootcamp']['name'];    
    $path3 = $_FILES['gambar_bootcamp']['tmp_name'];
    move_uploaded_file($path3,'../Gambar/'.$foto3);
    $judul_bootcamp = $_POST['judul_bootcamp'];
    $tanggal_bootcamp = $_POST['tanggal_bootcamp'];
    $harga_bootcamp	 = $_POST['harga_bootcamp'];
    $tentang_bootcamp = $_POST['tentang_bootcamp'];
    $prospek_bootcamp = $_POST['prospek_bootcamp'];
    $mentor_bootcamp = $_POST['mentor_bootcamp'];
    $jadwal_bootcamp = $_POST['jadwal_bootcamp'];
    $benefit_bootcamp = $_POST['benefit_bootcamp'];

    $query = "UPDATE admin_bootcamp SET 
    gambar_bootcamp = '$foto3', 
    judul_bootcamp = '$judul_bootcamp', 
    tanggal_bootcamp = '$tanggal_bootcamp', 
    harga_bootcamp = '$harga_bootcamp', 
    tentang_bootcamp = '$tentang_bootcamp', 
    prospek_bootcamp = '$prospek_bootcamp', 
    mentor_bootcamp = '$mentor_bootcamp', 
    jadwal_bootcamp = '$jadwal_bootcamp', 
    benefit_bootcamp = '$benefit_bootcamp' 
    WHERE id_bootcamp = '$id_bootcamp'";

    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        echo "<script>
            alert('Data Berhasil Diperbarui');
            window.location.href = 'Admin-Bootcamp.php';
          </script>";
    } else {
        echo "<script>
            alert('Data Tidak Berhasil Diperbarui');
            window.location.href = 'Admin-Bootcamp.php';
          </script>";
    }
} else {
    header("Location: Admin-Bootcamp.php");
}
?>