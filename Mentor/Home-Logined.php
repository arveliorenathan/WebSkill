<?php
session_start();
include '../koneksi.php';
$id = $_SESSION['mentor'];


if (isset($_SESSION['mentor'])) {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Home | Skill+</title>
    <link rel="stylesheet" href="Home.css" />
  </head>

  <body>
    <!-- Navbar -->
    <div class="navbar">
      <div class="navbar-container">
        <div class="name-container">
          <a href="">Skill+</a>
        </div>
        <div class="menu-container">
          <a href="#">Home</a>
          <a href="E-Learning.php">E-Learning</a>
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
    <div class="content-home">
      <div class="content-container">
        <div class="poster">
          <img src="../Image/DESAIN GRAFIS.png" alt="" width="100%">
        </div>
      </div>
    </div>
    <div class="content-elearning">
      <div class="content-container">
        <h1>Rintis Karir Bersama Skill+</h1>
        <div class="deskripsi">
          <div class="penjelasan">
            <img src="../Image/FOTO 1.png" alt="">
            <p>Skill+ Memiliki Lebih Dari 1 Juta Pengguna</p>
          </div>
          <div class="penjelasan">
            <img src="../Image/FOTO 2.png" alt="">
            <p>Alumni Skill+ Berhasil Bekerja di Top Companies</p>
          </div>
          <div class="penjelasan">
            <img src="../Image/FOTO 3.png" alt="">
            <p>Skill+ Terjalin Kerjasama dengan Berbagai Mitra</p>
          </div>
          <div class="penjelasan">
            <img src="../Image/FOTO 4.png" alt="">
            <p>Kuasai dan Pelajari Beragam Skill dari Para Expert</p>
          </div>
        </div>
        <div id="elearning" class="container">
          <div class="logo-elearning">
            <img src="../Image/ELEARNING.png" alt="" width="320px"">
          </div>
          <div class=" elearning-content">
            <li>
              <h2>E-LEARNING</h1>
            </li>
            <li class="list-h2">
              <h2>Ratusan video dan materi yang dapat diakses kapan saja dan dimana saja. Dapatkan sertifikat.</h2>
            </li>
            <li>
              <p>(Memiliki pilihan skill yang beragam memudahkan pengguna untuk mempelajari skill yang ingin dikuasai. Materi yang diberikan terstrukur dan video yang menarik dapat memudahkan saat proses belajar)</p>
            </li>
            <li><button><a href="E-Learning.php">Yuk Mulai Belajar !!</a></button></li>
            <li>
              <p class="ads">1000+ Orang Berlangganan Tiap Bulan</p>
            </li>
          </div>
        </div>
      </div>
    </div>
    <!-- Content Selesai -->

    <!-- Footer -->
    <div id=" about" class="footer">
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
          <p class="pembayaran-top">Metode Pembayaran :</p>
          <div class="logo-pembayaran">
            <li>Logo BRI</li>
            <li>Logo BCA</li>
            <li>Logo OVO</li>
            <li>Logo ShoppePay</li>
            <li>Logo DANA</li>
          </div>
          <p class="pembayaran-bot">© 2023 - 2024. All rights reserved</p>
        </div>
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