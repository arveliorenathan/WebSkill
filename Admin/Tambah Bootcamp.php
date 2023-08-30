<?php
session_start();
include '../koneksi.php';

if (isset($_GET['aksi'])) {
  $aksi = $_GET['aksi'];
} else {
  $aksi = "";
}

if (isset($_POST['aksi'])) {
  if ($_POST['aksi'] == "tambah") {

    $gambar_bootcamp = $_FILES['gambar_bootcamp'];
    $foto3 = $_FILES['gambar_bootcamp']['name'];
    $path1 = $_FILES['gambar_bootcamp']['tmp_name'];
    move_uploaded_file($path1, '../Gambar/' . $foto3);
    $judul_bootcamp = $_POST['judul_bootcamp'];
    $tanggal_bootcamp = $_POST['tanggal_bootcamp'];
    $harga_bootcamp   = $_POST['harga_bootcamp'];
    $tentang_bootcamp = $_POST['tentang_bootcamp'];
    $prospek_bootcamp = $_POST['prospek_bootcamp'];
    $mentor_bootcamp = $_POST['mentor_bootcamp'];
    $jadwal_bootcamp = $_POST['jadwal_bootcamp'];
    $benefit_bootcamp = $_POST['benefit_bootcamp'];

    $query = "INSERT INTO admin_bootcamp VALUES ('', 
    '$foto3',
    '$judul_bootcamp',  
    '$tanggal_bootcamp',
    '$harga_bootcamp',
    '$tentang_bootcamp',
    '$prospek_bootcamp',
    '$mentor_bootcamp',
    '$jadwal_bootcamp',
    '$benefit_bootcamp')";

    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
      echo "<script>
              alert('Data Berhasil Ditambah');
              window.location.href = 'Admin-Bootcamp.php';
            </script>";
    } else {
      echo "<script>
              alert('Data Tidak Berhasil Ditambah');
              window.location.href = 'Admin-Bootcamp.php';
            </script>";
    }
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tambah Materi | Admin</title>
  <link rel="stylesheet" href="Tambah Admin.css" />
</head>

<body>
  <div class="form">
    <div class="container">
      <div class="login">
        <form action="" method="POST" enctype="multipart/form-data">
          <h1>Tambah Bootcamp</h1>
          <hr>
          <p>Level Up With Skill+</p>
          <h4>Gambar</h4>
          <input type="file" name="gambar_bootcamp" placeholder="Image" required>
          <h4>Judul Bootcamp</h4>
          <input type="text" name="judul_bootcamp" placeholder="Judul Materi" required />
          <h4>Tanggal Bootcamp</h4>
          <input type="text" name="tanggal_bootcamp" placeholder="Deskrispsi Materi" required />
          <h4>Harga</h4>
          <input type="text" name="harga_bootcamp" placeholder="Harga" required />
          <h4>Tentang Bootcamp</h4>
          <textarea name="tentang_bootcamp" placeholder="Tentang Bootcamp" required></textarea>
          <h4>Prospek Karir</h4>
          <textarea name="prospek_bootcamp" placeholder="Prospek Karir" required></textarea>
          <h4>Mentor</h4>
          <textarea name="mentor_bootcamp" placeholder="List Mentor" required></textarea>
          <h4>Jadwal Kelas</h4>
          <textarea name="jadwal_bootcamp" placeholder="Jadwal Kelas" required></textarea>
          <h4>Benefit</h4>
          <textarea name="benefit_bootcamp" placeholder="Benefit" required></textarea>
          <button type="submit" name="aksi" value="tambah"><a href="Admin-Bootcamp.php">Tambah Bootcamp</a></button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>