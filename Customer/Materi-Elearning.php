<?php
session_start();
include '../koneksi.php';
$id = $_SESSION['customer'];

$id_materi = $_GET['id_materi'];
?>


<!DOCTYPE html>
<html>

<head>
  <title>Materi | E-Learning</title>
  <link rel="stylesheet" href="Materi-Elearning.css" />
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
  <main class="content">
    <section class="hero">
      <?php
      $query = "SELECT * FROM admin_materi WHERE id_materi = '$id_materi'";
      $sql = mysqli_query($koneksi, $query);
      $result = mysqli_fetch_assoc($sql);
      ?>
      <div class="title">
        <h2 class="hero-title"><?php echo $result['judul_materi']; ?></h2>
        <p class="hero-description">🎯 <?php echo $result['deskripsi_materi']; ?></p>
        <p class="hero-description">🎯 <?php echo $result['mentor_materi']; ?></p>
      </div>
      <div class="button-hero-wrapper">
        <a href="#marketing-management">
          <button class="button-hero-primary">Lihat Materi</button>
        </a>
      </div>
      <div class="card-hero-wrapper">
        <div class="card-hero">
          <div class="card-hero-header">
            <h4 class="card-hero-title">Materi</h4>
          </div>
          <hr class="card-hero-divider">
          <div class="card-hero-body">
            <p class="card-hero-description">
              <?php echo $result['deskripsi_materi']; ?>
            </p>
          </div>
        </div>
        <div class="card-hero">
          <div class="card-hero-header">
            <h4 class="card-hero-title">Benefit</h4>
          </div>
          <hr class="card-hero-divider">
          <div class="card-hero-body">
            <p class="card-hero-description">
              Dapatkan Sertifikat tiap menyelesaikan materi. Modul Praktik untuk Portfolio. Pre & Post Test untuk uji pemahaman. Gabung Grup Komunitas untuk berdiskusi. Short Class Gratis Bulanan yang bersertifikat.
            </p>
          </div>
        </div>
        <div class="card-hero">
          <div class="card-hero-header">
            <h4 class="card-hero-title">Persyaratan</h4>
          </div>
          <hr class="card-hero-divider">
          <div class="card-hero-body">
            <p class="card-hero-description">
              Tidak harus mulai dari paham basic marketing. Experts akan mengajarimu dari level dasar hingga lanjut dengan kombinasi konsep, studi kasus dan praktik. Video bisa dipelajari dengan berbagai device.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="progress">
      <h2 class="progress-title">
        Progress & Sertifikat
      </h2>

      <div class="progress-body-wrapper">
        <div class="progress-item">
          <h4 class="progress-item-title progress-item-sertifikat">Sertifikat Learning Path</h4>
          <p class="progress-item-description">
            Sepertinya kamu belum mulai menyelesaikan topik pada learning path ini, ayo mulai mengerjakan dan pantau progress kamu disini.
          </p>

          <div class="progress-wrapper">
            <span class="progress-status"></span>
            <label class="progress-value">0%</label>
          </div>
        </div>
      </div>

      <div class="progress-button-wrapper">
        <button class="progress-button-item" disabled>Download Sertifikat</button>
      </div>
    </section>

    <section class="marketing-management" id="marketing-management">
      <div class="marketing-management-header">
        <h2 class="marketing-management-title">
          Marketing Management
        </h2>
      </div>
      <div class="marketing-management-card-wrapper">
        <?php
        $query = "SELECT * FROM materi_elearning WHERE id_materi = $id_materi";
        $sql = mysqli_query($koneksi, $query);
        while ($result = mysqli_fetch_assoc($sql)) {
          $id_materi = $_GET['id_materi'];
          $id_materiElearning = $result['id_materiElearning'];
          $judul_materiElearning = $result['judul_materiElearning'];
          $deskripsi_materiElearning = $result['deskripsi_materiElearning'];
          $gambar_materiElearning = $result['gambar_materiElearning'];
        ?>
          <div class="marketing-management-card">
            <a href="Isi Materi-Elearning.php?id_materiElearning=<?php echo $id_materiElearning; ?>">
              <div class="marketing-management-card-image">
                <img src="../Gambar/<?php echo $result['gambar_materiElearning']; ?>" alt="" />
              </div>
              <div class="marketing-management-card-body">
                <h4 class="marketing-management-card-title"><?php echo $judul_materiElearning; ?></h4>
              </div>
            </a>
          </div>
        <?php
        }
        ?>
      </div>
    </section>
  </main>
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