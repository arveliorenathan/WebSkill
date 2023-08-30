<?php
include '../koneksi.php';

if (isset($_POST["submit"])) {
    $id_materi = $_GET['id_materi'];
    $judul_materi = $_POST['judul_materi'];
    $deskripsi_materi = $_POST['deskripsi_materi'];
    $mentor_materi = $_POST['mentor_materi'];
    $harga_materi = $_POST['harga_materi'];
    $gambar_materi = $_FILES['gambar_materi'];
    $foto = $_FILES['gambar_materi']['name'];
    $path = $_FILES['gambar_materi']['tmp_name'];
    move_uploaded_file($path, '../Gambar/' . $foto);
    $sertif_materi = $_FILES['sertif_materi'];
    $foto2 = $_FILES['sertif_materi']['name'];
    $path2 = $_FILES['sertif_materi']['tmp_name'];
    move_uploaded_file($path2, '../Gambar/' . $foto2);

    $query = "UPDATE admin_materi SET 
    judul_materi = '$judul_materi', 
    deskripsi_materi = '$deskripsi_materi', 
    mentor_materi = '$mentor_materi', 
    harga_materi = '$harga_materi', 
    gambar_materi = '$foto', 
    sertif_materi = '$foto2' 
    WHERE id_materi = '$id_materi'";

    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        echo "<script>
            alert('Data Berhasil Diperbarui');
            window.location.href = 'Admin-Elearning.php';
          </script>";
    } else {
        echo "<script>
            alert('Data Tidak Berhasil Diperbarui');
            window.location.href = 'Admin-Elearning.php';
          </script>";
    }
} else {
    header("Location: Admin-Elearning.php");
}


if (isset($_POST["submit"])) {
    $gambar_bootcamp = $_FILES['gambar_bootcamp'];
    $foto = $_FILES['gambar_bootcamp'];
    $path = $_FILES['gambar_bootcamp']['tmp_name'];
    move_uploaded_file($path,'../Gambar/'.$foto);
    $judul_bootcamp = $_POST['judul_bootcamp'];
    $tanggal_bootcamp = $_POST['tanggal_bootcamp'];
    $harga_bootcamp	 = $_POST['harga_bootcamp'];
    $tentang_bootcamp = $_POST['tentang_bootcamp'];
    $prospek_bootcamp = $_POST['prospek_bootcamp'];
    $mentor_bootcamp = $_POST['mentor_bootcamp'];
    $jadwal_bootcamp = $_POST['jadwal_bootcamp'];
    $benefit_bootcamp = $_POST['benefit_bootcamp'];

    $query = "UPDATE admin_bootcamp SET 
    gambar_bootcamp = '$foto', 
    judul_bootcamp = '$judul_bootcamp', 
    tanggal_bootcamp = '$tanggal_bootcamp', 
    harga_bootcamp = '$harga_bootcamp', 
    tentang_bootcamp = '$tentang_bootcamp', 
    prospek_bootcamp = '$prospek_bootcamp' 
    mentor_bootcamp = '$mentor_bootcamp' 
    jadwal_bootcamp = '$jadwal_bootcamp' 
    benefit_bootcamp = '$benefit_bootcamp' 
    WHERE id_materi = '$id_materi'";

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