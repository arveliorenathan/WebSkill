<?php
session_start();
include '../koneksi.php';
$id = $_SESSION['admin'];
$id_materiElearning = $_GET['id_materiElearning'];

if (isset($_GET['aksi'])) {
  $aksi = $_GET['aksi'];
} else {
  $aksi = "";
}

if (isset($_POST['aksi'])) {
  if ($_POST['aksi'] == "tambah") {
    $judul_videoElearning = $_POST['judul_videoElearning'];
    $link_videoElearning   = $_POST['link_videoElearning'];

    $query = "INSERT INTO video_elearning VALUES ('', 
    '$judul_videoElearning', 
    '$link_videoElearning',
    '$id_materiElearning')";

    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
      header("Location: Isi Materi-Elearning.php?id_materiElearning=" . $id_materiElearning);
    } else {
      echo "<script>
              alert('Data Tidak Berhasil Ditambah');
              window.location.href = 'Isi Materi-Elearning.php';
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
          <h4>Judul Video Materi</h4>
          <input type="text" name="judul_videoElearning" placeholder="Judul Video Materi">
          <h4>Link Video Materi</h4>
          <input type="text" name="link_videoElearning" placeholder="Link Video Materi">
          <button type="submit" name="aksi" value="tambah">Tambah Materi</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>