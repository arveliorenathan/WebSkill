<?php
session_start();
include '../koneksi.php';
$id = $_SESSION['admin'];
$id_materi = $_GET['id_materi'];

if (isset($_GET['aksi'])) {
  $aksi = $_GET['aksi'];
} else {
  $aksi = "";
}

if (isset($_POST['aksi'])) {
  if ($_POST['aksi'] == "tambah") {
    $gambar_materiElearning = $_POST['gambar_materiElearning'];
    $judul_materiElearning   = $_POST['judul_materiElearning'];
    $deskripsi_materiElearning = $_POST['deskripsi_materiElearning'];

    $query = "INSERT INTO materi_elearning VALUES ('', 
    '$judul_materiElearning', 
    '$deskripsi_materiElearning', 
    '$gambar_materiElearning',
    '$id_materi')";

    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
      header("Location: Materi Elearning.php?id_materi=" . $id_materi);
    } else {
      echo "<script>
              alert('Data Tidak Berhasil Ditambah');
              window.location.href = 'Materi Elearning.php';
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
        <form action="" method="post">
          <h1>Tambah Materi</h1>
          <hr>
          <p>Level Up With Skill+</p>
          <h4>Gambar Materi</h4>
          <input type="file" name="gambar_materiElearning" placeholder="Gambar Materi">
          <h4>Judul Materi</h4>
          <input type="text" name="judul_materiElearning" placeholder="Judul Materi" />
          <h4>Deskrispsi Materi</h4>
          <textarea name="deskripsi_materiElearning" placeholder="Deskripsi"></textarea>
          <button type="submit" name="aksi" value="tambah">Tambah Materi</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>