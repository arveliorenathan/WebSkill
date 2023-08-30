<?php
session_start();
include '../koneksi.php';
$id = $_SESSION['customer'];
?>



<!DOCTYPE html>
<html>

<head>
  <title>E-Learning | Skill+</title>
  <link rel="stylesheet" href="Daftar-Materi.css" />
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
  <div class="content-top">
    <div class="content-container">
      <h2>Daftar Materi</h2>
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
            <a href="Pembayaran Elearning.php?id_materi=<?php echo $id_materi; ?>">
              <img src="../Gambar/<?php echo $result['gambar_materi']; ?>" alt="" /></a>
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
          </div>
        <?php
        }
        ?>
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