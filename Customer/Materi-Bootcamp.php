<?php
session_start();
include '../koneksi.php';
$id = $_SESSION['customer'];

$id_bootcamp = $_GET['id_bootcamp'];
?>


<!DOCTYPE html>
<html>

<head>
  <title>Materi | Bootcamp</title>
  <link rel="stylesheet" href="Materi-Bootcamp.css" />
</head>

<body>
  <!-- Navbar -->
  <div class="navbar">
    <div class="navbar-container">
      <div class="name-container">
        <a href="">Skill+</a>
      </div>
      <div class="menu-container">
        <a href="Home-Logined.php">Home</a>
        <a href="E-Learning.php">E-Learning</a>
        <a href="Bootcamp.php">Bootcamp & Program</a>
        <a href="#about">About</a>
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
            <?php
            $query = "SELECT * FROM actor WHERE id = $id ";
            $sql = mysqli_query($koneksi, $query);
            $result = mysqli_fetch_assoc($sql);
            ?>
            <h2><?php echo $result['username'] ?></h2>
          </div>
          <hr>
          <a href="Profil-Profil Saya.php" class="sub-menu-link">
            <img src="../Image/profile.png">
            <p>Edit Profile</p>
            <span>></span>
          </a>
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
    <?php
    $query = "SELECT * FROM admin_bootcamp WHERE id_bootcamp = '$id_bootcamp'";
    $sql = mysqli_query($koneksi, $query);
    while ($result = mysqli_fetch_assoc($sql)) {
    ?>
      <div class="container">
        <div class="head-content">
          <img src="../Gambar/<?php echo $result['gambar_bootcamp']; ?>" alt="Poster">
          <div>
            <h3><?php echo $result['judul_bootcamp']; ?></h3>
            <br>
            <div class="description">
              <img src="../Image/calendar.png" alt="" style="width: 50px">
              <p><?php echo $result['tanggal_bootcamp']; ?></p>
            </div>
            <div class="description">
              <img src="../Image/shopping.png" alt="" style="width: 50px">
              <p><?php echo $result['harga_bootcamp']; ?></p>
            </div>
            <br>
            <button><a href="Pembayaran Bootcamp.php?id_bootcamp=<?php echo $id_bootcamp; ?>">Daftar Sekarang</a></button>
          </div>
        </div>
        <div class="body-content">
          <h2>Tentang Bootcamp</h2>
          <p><?php echo $result['tentang_bootcamp']; ?></p>
          <h2>Prospek Karir</h2>
          <p><?php echo $result['prospek_bootcamp']; ?></p>
          <h2>Mentor</h2>
          <p><?php echo $result['mentor_bootcamp']; ?></p>
          <h2>Jadwal Kelas</h2>
          <p><?php echo $result['jadwal_bootcamp']; ?></p>
          <h2>Benefit</h2>
          <p><?php echo $result['benefit_bootcamp']; ?></p>
        </div>
      </div>
    <?php
    }
    ?>
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
            <h3>Skill+</h3>
            <a href="#">About</a>
          </div>
          <div class="about2">
            <h3>Produk</h3>
            <a href="E-Learning.php">E-Learning</a>
            <br>
            <a href="Bootcamp.php">Bootcamp & Program</a>
          </div>
          <div class="about3">
            <h3>Lainnya</h3>
            <p>Kebijakan Privasi</p>
          </div>
        </div>
      </div>
      <div class="pembayaran">
        <p class="pembayaran-top">Metode Pembayaran :</p>
        <div class="logo-pembayaran">
          <li class="bank">Logo BRI</li>
          <li class="bank">Logo BCA</li>
          <li class="bank">Logo OVO</li>
          <li class="bank">Logo ShoppePay</li>
          <li class="bank">Logo DANA</li>
        </div>
        <p class="pembayaran-bot">© 2023 - 2024. All rights reserved</p>
      </div>
    </div>
  </div>
  </div>
  <!-- Footer Selesai -->

  <!-- JavaScript -->
  <script>
    let subMenu = document.getElementById("subMenu");

    function toogleMenu() {
      subMenu.classList.toggle("open-menu")
    }
  </script>
</body>

</html>