<?php
session_start();
include '../koneksi.php';
$id_bootcamp = $_GET['id_bootcamp'];

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tambah Materi | Admin</title>
    <link rel="stylesheet" href="Tambah Admin.css" />
  </head>
  <body>
  <?php
    $query = "SELECT * FROM admin_bootcamp WHERE id_bootcamp = $id_bootcamp";
    $sql = mysqli_query($koneksi, $query);
    $result = mysqli_fetch_assoc($sql);
    ?>
    <div class="form">
      <div class="container">
        <div class="login">
          <form action="EditBootcamp.php?id_bootcamp=<?php echo $id_bootcamp; ?>" method="post"  enctype="multipart/form-data">
            <h1>Update Bootcamp</h1>
            <hr />
            <p>Level Up With Skill+</p>
            <h4>Gambar</h4>
            <input type="file" name="gambar_bootcamp" placeholder="Image" required/>
            <h4>Judul Bootcamp</h4>
            <input type="text" name="judul_bootcamp" placeholder="<?php echo $result['judul_bootcamp'] ?>" required/>
            <h4>Tanggal Bootcamp</h4>
            <input type="text" name="tanggal_bootcamp" placeholder="<?php echo $result['tanggal_bootcamp'] ?>" required/>
            <h4>Harga</h4>
            <input type="text" name="harga_bootcamp" placeholder="<?php echo $result['harga_bootcamp'] ?>" required/>
            <h4>Tentang Bootcamp</h4>
            <textarea name="tentang_bootcamp" placeholder="<?php echo $result['tentang_bootcamp'] ?>" required></textarea>
            <h4>Prospek Karir</h4>
            <textarea name="prospek_bootcamp" placeholder="<?php echo $result['prospek_bootcamp'] ?>" required></textarea>
            <h4>Mentor</h4>
            <textarea name="mentor_bootcamp" placeholder="<?php echo $result['mentor_bootcamp'] ?>" required></textarea>
            <h4>Jadwal Kelas</h4>
            <textarea name="jadwal_bootcamp" placeholder="<?php echo $result['jadwal_bootcamp'] ?>" required></textarea>
            <h4>Benefit</h4>
            <textarea name="benefit_bootcamp" placeholder="<?php echo $result['benefit_bootcamp'] ?>" required></textarea>
            <button type="submit" name="submit">Update Bootcamp</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
