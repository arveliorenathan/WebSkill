<?php
session_start();
include '../koneksi.php';
$id = $_SESSION['admin'];

if (isset($_GET['aksi'])) {
  $aksi = $_GET['aksi'];
}
else{
  $aksi = "";
}

if (isset($_POST['aksi'])) {
  if ($_POST['aksi'] == "tambah") {
    $judul_materi = $_POST['judul_materi'];
    $deskripsi_materi = $_POST['deskripsi_materi'];
    $mentor_materi = $_POST['mentor_materi'];
    $harga_materi = $_POST['harga_materi'];
    $gambar_materi = $_FILES['gambar_materi'];
    $foto = $_FILES['gambar_materi']['name'];
    $path = $_FILES['gambar_materi']['tmp_name'];
    move_uploaded_file($path,'../Gambar/'.$foto);
    $sertif_materi = $_FILES['sertif_materi'];
    $foto2 = $_FILES['sertif_materi']['name'];
    $path2 = $_FILES['sertif_materi']['tmp_name'];
    move_uploaded_file($path2,'../Gambar/'.$foto2);

    $query = "INSERT INTO admin_materi VALUES ('', 
    '$judul_materi', 
    '$deskripsi_materi', 
    '$mentor_materi', 
    '$harga_materi',
    '$foto', 
    '$foto2')";
    
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
      echo "<script>
              alert('Data Berhasil Ditambah');
              window.location.href = 'Admin-Elearning.php?id_materi=<?php echo $id_materi; ?>';
            </script>";
    } else{
      echo "<script>
              alert('Data Tidak Berhasil Ditambah');
              window.location.href = 'Admin-Elearning.php';
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
        <img src="../Image/Login.png" alt="" />
        <div class="login">
          <form action="" method="POST" enctype="multipart/form-data">
            <h1>Tambah Materi</h1>
            <hr>
            <p>Level Up With Skill+</p>
            <h4>Judul Materi</h4>
            <input type="text" name="judul_materi" placeholder="Judul Materi" required/>
            <h4>Deskripsi Materi</h4>
            <textarea name="deskripsi_materi" placeholder="Deskripsi" required></textarea>
            <h4>Mentor</h4>
            <input type="text" name="mentor_materi" placeholder="Nama Mentor" required/>
            <h4>Harga</h4>
            <input type="text" name="harga_materi" placeholder="Harga" required/>
            <h4>Gambar</h4>
            <input type="file" name="gambar_materi" placeholder="Image" required>
            <h4>Desain Sertifikat</h4>
            <input type="file" name="sertif_materi" placeholder="Image" required>
            <button type="submit" name="aksi" value="tambah">Tambah Materi</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>