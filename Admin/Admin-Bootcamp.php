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
  $gambar_bootcamp = $_POST['gambar_bootcamp'];
  $judul_bootcamp = $_POST['judul_bootcamp'];
  $tanggal_bootcamp = $_POST['tanggal_bootcamp'];
  $harga_bootcamp   = $_POST['harga_bootcamp'];
  $tentang_bootcamp = $_POST['tentang_bootcamp'];
  $prospek_bootcamp = $_POST['prospek_bootcamp'];
  $mentor_bootcamp = $_POST['mentor_bootcamp'];
  $jadwal_bootcamp = $_POST['jadwal_bootcamp'];
  $benefit_bootcamp = $_POST['benefit_bootcamp'];

  if ($judul_bootcamp) {
    if ($aksi == 'ganti') {
      $id_bootcamp = $_GET['id_bootcamp'];
      $query = "UPDATE admin_bootcamp set 
      gambar_bootcamp = '$gambar_bootcamp', 
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
                window.location.href = 'Admin-Elearning.php';
              </script>";
      } else {
        echo "<script>
                alert('Data Tidak Berhasil Diperbarui');
                window.location.href = 'Admin-Elearning.php';
              </script>";
      }
    } else {
      $query = "INSERT INTO admin_bootcamp VALUES ('', 
      '$gambar_bootcamp',
      '$judul_bootcamp',
      '$tanggal_bootcamp',
      '$harga_bootcamp',
      '$tentang_bootcamp',
      '$prospek_bootcamp',
      '$mentor_bootcamp',
      '$jadwal_bootcamp',
      '$benefit_bootcamp'";

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
}


if ($aksi  == "hapus") {
  $id_bootcamp = $_GET['id_bootcamp'];
  $query = "DELETE FROM admin_bootcamp WHERE `admin_bootcamp`.`id_bootcamp` = '$id_bootcamp'";
  $sql = mysqli_query($koneksi, $query);

  if ($sql) {
    echo "<script type='text/javascript'>alert('Data Berhasil Dihapus');
        window.location.href = 'Admin-Bootcamp.php';
      </script>";
  } else {
    echo "<script type='text/javascript'>alert('Data Tidak Berhasil Dihapus');
      window.location.href = 'Admin-Bootcamp.php';
    </script>";
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
      <h2>Bootcamp & Program</h2>
      <div class="program-container">
        <?php
        $query = "SELECT * FROM admin_bootcamp";
        $sql = mysqli_query($koneksi, $query);
        while ($result = mysqli_fetch_assoc($sql)) {
          $id_bootcamp = $result['id_bootcamp'];
          $gambar_bootcamp = $result['gambar_bootcamp'];
          $judul_bootcamp = $result['judul_bootcamp'];
          $tanggal_bootcamp = $result['tanggal_bootcamp'];
          $harga_bootcamp   = $result['harga_bootcamp'];
          $tentang_bootcamp = $result['tentang_bootcamp'];
          $prospek_bootcamp = $result['prospek_bootcamp'];
          $mentor_bootcamp = $result['mentor_bootcamp'];
          $jadwal_bootcamp = $result['jadwal_bootcamp'];
          $benefit_bootcamp = $result['benefit_bootcamp'];
        ?>
          <div class="section-program">
            <a href="#">
              <img src="../Gambar/<?php echo $result['gambar_bootcamp']; ?>" alt="Poster">
              <h3><?php echo $result['judul_bootcamp']; ?></h3>
              <br>
              <div class="description">
                <img src="../Image/calendar.png" alt="">
                <p><?php echo $result['tanggal_bootcamp']; ?></p>
              </div>
              <br>
              <div class="description">
                <img src="../Image/shopping.png" alt="">
                <p><?php echo $result['harga_bootcamp']; ?></p>
              </div>
              <br>
            </a>
            <button type="submit" name="aksi" value="ganti"><a href="Edit Bootcamp.php?id_bootcamp=<?php echo $id_bootcamp; ?>">Edit</a></button>
            <button type="submit" name="aksi" value="hapus"><a href="Admin-Bootcamp.php?aksi=hapus&id_bootcamp=<?php echo $result['id_bootcamp']; ?>">Delete</a></button>
          </div>
        <?php
        }
        ?>
      </div>
      <div class="button">
        <button><a href="Tambah Bootcamp.php">Tambah Bootcamp</a></button>
      </div>
    </div>
  </div>

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
      subMenu.classList.toggle("open-menu")
    }
  </script>
</body>

</html>