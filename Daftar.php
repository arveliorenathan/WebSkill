<?php
include 'koneksi.php';

if (isset($_POST['daftar'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if ($username == '' || $email == '' || $password == '') {
?>
    <script type="text/javascript">
      alert("Data Harus Terisi, Silakan Cek Kembali Isian Anda!!!");
    </script>
    <?php
  } else {
    $query = mysqli_query($koneksi, "INSERT INTO actor VALUES ('', '$username', '$nama_lengkap', '$tanggal_lahir', '$gender', '$no_hp', '$domisili', '$email', md5('$password'), 'customer')");
    if ($query) {
    ?>
      <script type="text/javascript">
        alert("Pendaftaran Anda Berhasil");
        window.location.href = "./Masuk.php";
      </script>
<?php
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Daftar | Skill+</title>
  <link rel="stylesheet" href="./Customer/FormUser.css" />
</head>

<body>
  <div class="form">
    <div class="container">
      <img src="./Image/Login.png" alt="" />
      <div class="login">
        <form action="" method="post">
          <h1>Daftar</h1>
          <hr>
          <p>Level Up With Skill+</p>
          <h4>Username</h4>
          <input type="text" name="username" placeholder="Username" />
          <h4>Email</h4>
          <input type="text" name="email" placeholder="example@gmail.com" />
          <h4>Password</h4>
          <input type="password" name="password" placeholder="Password" />
          <button type="submit" name="daftar"><a href="Masuk.php">Daftar</a></button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>