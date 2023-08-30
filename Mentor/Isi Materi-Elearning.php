<?php
session_start();
include '../koneksi.php';
$id = $_SESSION['mentor'];
$id_materiElearning = $_GET['id_materiElearning'];

if (isset($_GET['aksi'])) {
  $aksi = $_GET['aksi'];
} else {
  $aksi = "";
}

if ($aksi  == "hapus") {
  $id_videoElearning  = $_GET['id_videoElearning'];
  $query = "DELETE FROM video_elearning WHERE id_videoElearning  = $id_videoElearning ";
  $sql = mysqli_query($koneksi, $query);

  if ($sql) {
    header("Location: Isi Materi-Elearning.php?id_materiElearning=" . $id_materiElearning);
  } else {
    echo "<script type='text/javascript'>alert('Data Tidak Berhasil Dihapus');
      window.location.href = 'Isi Materi-Elearning.php';
    </script>";;
  }
}
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
        <a href="Admin-user.php">User</a>
        <a href="Admin-Elearning.php">E-Learning</a>
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
  <main class="content">
    <section class="course-video-wrapper">
      <div class="course-video-player">
        <iframe width="100%" height="415" src="https://www.youtube.com/embed/czubWNv8MYk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen id="yt-video"></iframe>
      </div>

      <div class="course-video-list-wrapper">
        <p class="course-video-list-title">Materi</p>

        <ul class="course-video-list">
          <?php
          $query = "SELECT * FROM video_elearning WHERE id_materiElearning = $id_materiElearning";
          $sql = mysqli_query($koneksi, $query);
          $i = 1;
          while ($result = mysqli_fetch_assoc($sql)) {
            $id_videoElearning = $result['id_videoElearning'];
            $judul_videoElearning = $result['judul_videoElearning'];
            $link_videoElearning = $result['link_videoElearning'];
          ?>
            <li class="course-video-list-item" data-href="<?php echo htmlspecialchars($link_videoElearning); ?>">
              <div class="course-play-item">
                <svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium mui-style-1dtrpo5" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="PlayCircleOutlinedIcon">
                  <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-2.5-3.5 7-4.5-7-4.5v9z"></path>
                </svg>
                <span><?php echo $i . ". " . $judul_videoElearning; ?></span>
              </div>
              <button type="submit" name="aksi" value="hapus"><a href="Isi Materi-Elearning.php?aksi=hapus&id_videoElearning=<?php echo $result['id_videoElearning']; ?>&id_materiElearning=<?php echo $id_materiElearning ?>">Delete</a></button>
            </li>
          <?php
            $i++;
          }
          ?>
        </ul>
        <div class="button-add">
          <button type="submit"><a href="TambahVideo.php?id_materiElearning=<?php echo $id_materiElearning; ?>">Tambah Video</a></button>
        </div>
      </div>
    </section>

    <section class="course-information">
      <?php
      $query = "SELECT * FROM materi_elearning WHERE id_materiElearning = '$id_materiElearning'";
      $sql = mysqli_query($koneksi, $query);
      $result = mysqli_fetch_assoc($sql);
      $id_materiElearning = $result['id_materiElearning'];
      $judul_materiElearning = $result['judul_materiElearning'];
      $deskripsi_materiElearning = $result['deskripsi_materiElearning'];
      ?>
      <div class="course-information-header">
        <div>
          <h2 class="course-information-title">
            <?php echo $result['judul_materiElearning']; ?>
          </h2>
        </div>
      </div>
      <p class="course-information-description">
        <?php echo $result['deskripsi_materiElearning']; ?>
      </p>
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
            <a href="E-Learning.html">E-Learning</a>
            <br>
            <a href="Bootcamp.html">Bootcamp & Program</a>
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

  <script>
    const listVideo = document.getElementsByClassName("course-video-list-item");

    for (let i = 0; i <= listVideo.length; i++) {
      listVideo[i].addEventListener("click", function(e) {
        const linkIframe = listVideo[i].getAttribute('data-href');

        document.getElementById('yt-video').setAttribute("src", linkIframe);
      })
    }
  </script>
</body>

</html>