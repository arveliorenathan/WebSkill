<?php
include 'koneksi.php';
session_start();

// When form submitted, check and create user session.
if (isset($_POST['email'])) {
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($koneksi, $email);

  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($koneksi, $password);

  // Check user is exist in the database
  $query    = "SELECT * FROM actor WHERE email = '$email'
               AND password = '$password'";

  $result = mysqli_query($koneksi, $query);
  $rows = mysqli_num_rows($result);

  if ($rows == 1) {
    $_SESSION['email'] = $email;
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
    $_SESSION['tanggal_lahir'] = $row['tanggal_lahir'];
    $_SESSION['gender'] = $row['gender'];
    $_SESSION['no_hp'] = $row['no_hp'];
    $_SESSION['domisili'] = $row['domisili'];
    $_SESSION['id'] = $row['id'];
    $_SESSION['password'] = $row['password'];
  } else {
    echo "<script>alert('Username atau Password salah');
      window.location.href = 'login.php';
      </script>";
  }
}

// multi-lever user
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if ($email == '' || $password == '') {
?> <script type="text/javascript">
      alert("Data Harus Terisi, Silakan Cek Kembali Isian Anda!!!");
    </script><?php
            } else {
              $query = mysqli_query($koneksi, "SELECT * FROM actor WHERE email ='$email' and password = md5('$password')");
              $row = mysqli_fetch_array($query);
              $cek = mysqli_num_rows($query);

              // periksa user masuk sebagai admin/mentor/customer
              if ($cek > 0) {
                if ($row['role'] == "admin") {
                  $_SESSION['admin'] = $row['id'];
                  header("location: ./Admin/Admin-user.php");
                } else if ($row['role'] == "mentor") {
                  $_SESSION['mentor'] = $row['id'];
                  header("location: ./Mentor/Home-Logined.php");
                } else if ($row['role'] == "customer") {
                  $_SESSION['customer'] = $row['id'];
                  header("location: ./Customer/Home-Logined.php");
                }
              } else {
              ?>
      <script type="text/javascript">
        alert("Login Gagal. Silakan Coba Lagi!!!");
      </script>
<?php
              }
            }
          }
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <title>Masuk | Skill+</title>
  <link rel="stylesheet" href="./Customer/FormUser.css" />
</head>

<body>
  <div class="form">
    <div class="container">
      <img src="./Image/Login.png" alt="" />
      <div class="login">
        <form action="" method="POST">
          <h1>Masuk</h1>
          <hr>
          <p>Level Up With Skill+</p>
          <h4>Email</h4>
          <input type="text" name="email" placeholder="example@gmail.com" required>
          <h4>Password</h4>
          <input type="password" name="password" placeholder="password" required>
          <button type="submit" name="login"><a href="">Masuk</a></button>
          <p>Belom punya akun ? <a href="Daftar.php">Daftar di sini</a></p>
        </form>
      </div>
    </div>
  </div>
</body>

</html>