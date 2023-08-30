<?php
session_start();
include '../koneksi.php';
$id = $_SESSION['admin'];

if (isset($_SESSION['admin'])) {

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin | Skill+</title>
  <link rel="stylesheet" href="Admin-user.css" />
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
          <h3 onclick="toogleMenu()">Admin Skill+</h3>
        </a>
      </div>
      <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
          <div class="user-info">
            <h2>Admin Skill+</h2>
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
      <h2>Daftar Mentor</h2>
      <div class="table">
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Nama Lengkap</th>
              <th>Tanggal Lahir</th>
              <th>Gender</th>
              <th>No.HP</th>
              <th>Domisili</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "SELECT * FROM actor WHERE role = 'mentor'";
            $sql = mysqli_query($koneksi, $query);
            $no = 1;
            while ($result = mysqli_fetch_assoc($sql)) {

            ?>
              <tr>
                <th><?php echo $no ?></th>
                <th><?php echo $result['username']; ?></th>
                <th><?php echo $result['nama_lengkap']; ?></th>
                <th><?php echo $result['tanggal_lahir']; ?></th>
                <th><?php echo $result['gender']; ?></th>
                <th><?php echo $result['no_hp']; ?></th>
                <th><?php echo $result['domisili']; ?></th>
              </tr>
            <?php
            $no++;
            }
            ?>
          </tbody>
        </table>
      </div>
      <h2>Daftar Customer</h2>
      <div class="table">
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Nama Lengkap</th>
              <th>Tanggal Lahir</th>
              <th>Gender</th>
              <th>No.HP</th>
              <th>Domisili</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $query = "SELECT * FROM actor WHERE role = 'customer'";
            $sql = mysqli_query($koneksi, $query);
            $no = 1;
            while ($result = mysqli_fetch_assoc($sql)) {
            ?>
              <tr>
                <th><?php echo $no ?></th>
                <th><?php echo $result['username']; ?></th>
                <th><?php echo $result['nama_lengkap']; ?></th>
                <th><?php echo $result['tanggal_lahir']; ?></th>
                <th><?php echo $result['gender']; ?></th>
                <th><?php echo $result['no_hp']; ?></th>
                <th><?php echo $result['domisili']; ?></th>
              </tr>
            <?php
            $no++;
            }
            ?>
          </tbody>
        </table>
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
      subMenu.classList.toggle("open-menu")
    }
  </script>
</body>

</html>

<?php
} else {
  echo "<script>
          alert('Silahkan Masuk Terlebih Dahulu');
          window.location.href = '../Masuk.php';
        </script>";
}
?>