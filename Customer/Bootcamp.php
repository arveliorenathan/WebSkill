<?php
session_start();
include '../koneksi.php';
$id = $_SESSION['customer'];


if (isset($_SESSION['customer'])) {
?>


  <!DOCTYPE html>
  <html>

  <head>
    <title>Bootcamp & Program | Skill+</title>
    <link rel="stylesheet" href="Bootcamp.css" />
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
        <div class="container">
          <div class="bootcamp-content">
            <h2>Bootcamp</h1>
              <h2>Kelas Intensif, Online & Live yang Dapat Diikuti Bersama dengan Para Experts</h2>
              <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."</p>
              <div class="button">
                <button><a href="#program">Cek Program</a></button>
              </div>
              <li>
                <p class="ads">2000+ Orang Berlangganan Tiap Minggu</p>
              </li>
          </div>
          <div class="logo-bootcamp">
            <img src="../Image/BAGIAN PALING ATAS .png" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="box">
        <div class="box-container">
          <img src="../Image/Bootcamp1.png" alt="">
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
        </div>
        <div class="box-container">
          <img src="../Image/Bootcamp2.png" alt="">
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
        </div>
        <div class="box-container">
          <img src="../Image/Bootcamp3.png" alt="">
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
        </div>
        <div class="box-container">
          <img src="../Image/Bootcamp4.png" alt="">
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
        </div>
      </div>
    </div>
    <div class="search">
      <div class="search-box">
        <input type="text" placeholder="Cari Bootcamp...">
      </div>
    </div>
    <div id="program" class="content-program">
      <div class="program">
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
              <a href="Materi-Bootcamp.php?id_bootcamp=<?php echo $id_bootcamp; ?>">
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
    <script>
      let subMenu = document.getElementById("subMenu");

      function toogleMenu() {
        subMenu.classList.toggle("open-menu");
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