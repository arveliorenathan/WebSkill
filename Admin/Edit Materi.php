<?php
session_start();
include '../koneksi.php';
$id_materi = $_GET['id_materi'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tambah Materi | Admin</title>
  <link rel="stylesheet" href="Tambah Admin.css" />
</head>

<body>
  <?php
  $query = "SELECT * FROM admin_materi WHERE id_materi = $id_materi";
  $sql = mysqli_query($koneksi, $query);
  $result = mysqli_fetch_assoc($sql);
  ?>
  <div class="form">
    <div class="container">
      <img src="./Image/Login.png" alt="" />
      <div class="login">
        <form action="EditMateri.php?id_materi=<?php echo $id_materi; ?>" method="post"  enctype="multipart/form-data">
          <h1>Update Materi</h1>
          <hr>
          <p>Level Up With Skill+</p>
          <h4>Judul Materi</h4>
          <input type="text" name="judul_materi" placeholder="<?php echo $result['judul_materi'] ?>" required/>
          <h4>Deskripsi Materi</h4>
          <textarea name="deskripsi_materi" placeholder="<?php echo $result['deskripsi_materi'] ?> " required></textarea>
          <h4>Mentor</h4>
          <input type="text" name="mentor_materi" placeholder="<?php echo $result['mentor_materi'] ?>" required/>
          <h4>Harga</h4>
          <input type="text" name="harga_materi" placeholder="<?php echo $result['harga_materi'] ?>" required/>
          <h4>Gambar</h4>
          <input type="file" name="gambar_materi" placeholder="Image" required>
          <h4>Desain Sertifikat</h4>
          <input type="file" name="sertif_materi" placeholder="Image" required>
          <button type="submit" name="submit">Update Materi</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>