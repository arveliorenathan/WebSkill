<?php
session_start();
include '../koneksi.php';
$id = $_SESSION['admin'];


if (isset($_GET['aksi'])) {
  $aksi = $_GET['aksi'];
} else {
  $aksi = "";
}

if (isset($_POST['tambah'])) {
  $judul_materi = $_POST['judul_materi'];
  $deskripsi_materi = $_POST['deskripsi_materi'];
  $mentor_materi = $_POST['mentor_materi'];
  $harga_materi = $_POST['harga_materi'];
  $gambar_materi = $_POST['gambar_materi'];
  $sertif_materi = $_POST['sertif_materi'];

  if ($judul_materi) {
    if ($aksi == 'ganti') {
      $id_materi = $_GET['id_materi'];
      $query = "UPDATE admin_materi SET 
      judul_materi = '$judul_materi', 
      deskripsi_materi = '$deskripsi_materi', 
      mentor_materi = '$mentor_materi', 
      harga_materi = '$harga_materi', 
      gambar_materi = '$gambar_materi', 
      sertif_materi = '$sertif_materi' 
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
      $query = "INSERT INTO admin_materi VALUES 
      ('', '$judul_materi', 
      '$deskripsi_materi', 
      '$mentor_materi', 
      '$harga_materi', 
      '$gambar_materi', 
      '$sertif_materi')";

      $sql = mysqli_query($koneksi, $query);

      if ($sql) {
        echo "<script>
                alert('Data Berhasil Ditambah');
                window.location.href = 'Admin-Elearning.php';
              </script>";
      } else {
        echo "<script>
                alert('Data Tidak Berhasil Ditambah');
                window.location.href = 'Admin-Elearning.php';
              </script>";
      }
    }
  }
}


if ($aksi  == "hapus") {
  $id_materi = $_GET['id_materi'];
  $query = "DELETE FROM admin_materi WHERE `admin_materi`.`id_materi` = $id_materi";
  $sql = mysqli_query($koneksi, $query);

  if ($sql) {
    echo "<script type='text/javascript'>alert('Data Berhasil Dihapus');
        window.location.href = 'Admin-Elearning.php';
      </script>";
  } else {
    echo "<script type='text/javascript'>alert('Data Tidak Berhasil Dihapus');
      window.location.href = 'Admin-Elearning.php';
    </script>";;
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin | Skill+</title>
  <link rel="stylesheet" href="Admin-Fitur.css" />
</head>

<body>
  <!-- Navbar -->
  <div class="navbar">
    <div class="navbar-container">
      <div class="name-container">
        <a href="">Skill+</a>
      </div>
      <div class="menu-container">
        <a href="Admin-user.php">User</a>
        <a href="Admin-Elearning.php">E-Learning</a>
        <a href="Admin-Bootcamp.php">Bootcamp & Program</a>
        <a href="Admin-RiwayatPembayaran.php">Riwayat Pembayaran</a>
      </div>
      <div class="profile-container">
        <a href="#none">
          <?php
          $query = "SELECT * FROM actor WHERE id = $id ";
          $sql = mysqli_query($koneksi, $query);
          $result = mysqli_fetch_assoc($sql);
          ?>
          <h3 onclick="toogleMenu()"><?php echo $result['username'] ?></h3>
        </a>
      </div>
      <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
          <div class="user-info">
            <h2>Nama User</h2>
          </div>
          <hr>
          <a href="../Keluar.php" class="sub-menu-link">
            <img src="../Image/logout.png">
            <p>Logout</p>
            <span>></span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- Navbar Selesai -->

  <!-- Content -->
  <div class="content">
    <div class="container">
      <h2>Materi E-Learning</h2>
      <div class="section-materi">
        <?php
        $query = "SELECT * FROM admin_materi";
        $sql = mysqli_query($koneksi, $query);
        while ($result = mysqli_fetch_assoc($sql)) {
          $id_materi = $result['id_materi'];
          $gambar_materi = $result['gambar_materi'];
          $judul_materi = $result['judul_materi'];
          $mentor_materi = $result['mentor_materi'];
          $harga_materi = $result['harga_materi'];
        ?>
          <div class="materi-content">
            <a href="Materi Elearning.php?id_materi=<?php echo $id_materi; ?>">
              <img src="../Gambar/<?php echo $result['gambar_materi']; ?>" alt="" />
              <h3>
                <?php echo $result['judul_materi']; ?>
              </h3>
              <br>
              <p>
                <?php echo $result['mentor_materi']; ?>
              </p>
              <br>
              <p>
                <?php echo $result['harga_materi']; ?>
              </p>
              <br />
              <button type="submit" name="aksi" value="ganti"><a href="Edit Materi.php?id_materi=<?php echo $id_materi; ?>">Edit</a></button>
              <button type="submit" name="aksi" value="hapus"><a href="Admin-Elearning.php?aksi=hapus&id_materi=<?php echo $result['id_materi']; ?>">Delete</a></button>
            </a>
          </div>
        <?php
        }
        ?>
      </div>
      <div class="button">
        <button type="submit" name="tambah"><a href="Tambah Materi.php?id_materi=<?php echo $id_materi; ?>">Tambah Materi</a></button>
      </div>
    </div>
  </div>
  <!-- Content Selesai -->

  <!-- Footer -->
  <div id="about" class="footer">
    <div class="footer-container">
      <div class="logo">
        <h1>Skill +</h1>
      </div>
      <div class="footer-content">
        <div class="quotes">
          <h3>Level Up with Skill+</h3>
        </div>
        <div class="about">
          <div class="about1">
            <li class="about-content">
              <h3>Skill+</h3>
            </li>
            <li class="about-content">About</li>
          </div>
          <div class="about2">
            <li class="about-content">
              <h3>Produk</h3>
            </li>
            <li class="about-content"><a href="">E-Learning</a></li>
            <li class="about-content"><a href="">Bootcamp & Program</a></li>
          </div>
          <div class="about3">
            <li class="about-content">
              <h3>Lainnya</h3>
            </li>
            <li class="about-content">Kebijakan Privasi</li>
          </div>
        </div>
      </div>
      <div class="pembayaran">
        <p class="pembayaran-bot">© 2023 - 2024. All rights reserved</p>
      </div>
    </div>
  </div>
  <!-- Footer Selesai -->

  <script>
    let subMenu = document.getElementById("subMenu");

    function toogleMenu() {
      subMenu.classList.toggle("open-menu");
    }
  </script>
</body>

</html>