<?php
session_start();
include '../koneksi.php';
$id = $_SESSION['customer'];

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <title>Profil | Skill+</title>
  <link rel="stylesheet" href="Profil-Profil Saya.css">
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
          <a href="Profil-Profil Saya.php?id=<?php echo $id; ?>" class="sub-menu-link">
            <img src="../Image/profile.png">
            <p>Edit Profile</p>
            <span></span>
          </a>
          <a href="../Keluar.php" class="sub-menu-link">
            <img src="../Image/logout.png">
            <p>Logout</p>
            <span></span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- Navbar Selesai -->

  <!-- Content -->
  <div class="content">
    <div class="container">
      <div class="sidebar">
        <div class="bar">
          <h3>Navigasi Profil</h3>
          <hr>
          <a href="#" class="sub-nav-profil">
            <img src="../Image/profile.png" />
            <p>Profil Saya</p>
          </a>
          <a href="Profil-Akses Pembelian Elearning.php" class="sub-nav-profil">
            <img src="../Image/shopping-bag.png" />
            <p>Akses Pembelian</p>
          </a>
          <a href="Profil-Akses Riwayat Pembelian.php" class="sub-nav-profil">
            <img src="../Image/bill.png" />
            <p>Riwayat Transaksi</p>
          </a>
          <a href="#" class="sub-nav-profil">
            <img src="../Image/award.png" />
            <p>Sertifikat</p>
          </a>
        </div>
        <div class="profil">
          <div class="profil-top">
            <?php
            $query = "SELECT * FROM actor WHERE id = $id";
            $sql = mysqli_query($koneksi, $query);
            $result = mysqli_fetch_assoc($sql);
            ?>
            <h2>Welcome, <?php echo $result['username'] ?>!</h2>
            <p>Informasi mengenai profil dan preferensi anda</p>
          </div>
          <form action="Edit Profil.php?id=<?php echo $id; ?>" method="post">
            <?php
            $query = "SELECT * FROM actor WHERE id = $id";
            $sql = mysqli_query($koneksi, $query);
            $result = mysqli_fetch_assoc($sql);
            ?>
            <div class="profil-name">
              <p>Nama Lengkap</p>
              <input type="text" name="nama_lengkap" placeholder="<?php echo $result['nama_lengkap'] ?>">
            </div>
            <div class="profil-content">
              <div class="profil-container">
                <p>Tanggal Lahir</p>
                <input type="date" name="<?php echo $result['tanggal_lahir'] ?>">
              </div>
              <div class="profil-container">
                <p>Jenis Kelamin</p>
                <select name="gender">
                  <?php if (!empty($result['gender'])) : ?>
                    <option value="" disabled selected hidden>- Jenis Kelamin -</option>
                    <option value="Laki-Laki" <?php if ($result['gender'] === 'Laki-Laki') echo 'selected'; ?>>Laki-Laki</option>
                    <option value="Perempuan" <?php if ($result['gender'] === 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                  <?php else : ?>
                    <option value="" disabled selected hidden>- Jenis Kelamin -</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  <?php endif; ?>
                </select>
              </div>
            </div>
            <div class="profil-content">
              <div class="profil-container">
                <p>No.HP</p>
                <input type="text" name="no_hp" placeholder="<?php echo $result['no_hp'] ?>">
              </div>
              <div class="profil-container">
                <p>Domisili</p>
                <input type="text" name="domisili" placeholder="<?php echo $result['domisili'] ?>">
              </div>
            </div>
            <!-- <div class="profil-button">
                      <button><a href="">Ubah Email</a></button>
                      <button><a href="">Ubah Password</a></button>
                  </div> -->
            <div class="profil-save">
              <button type="submit" name="submit">Simpan Perubahan</button>
            </div>
          </form>
        </div>
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