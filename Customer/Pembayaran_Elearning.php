<?php
include '../koneksi.php';
$id_pembayaran = $_GET['id_pembayaran'];
$id_materi = $_GET['id_materi'];

if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];
} else {
    $aksi = "";
}

if ($aksi  == "tambah") {
    $bukti_pembayaran = $_FILES['bukti_pembayaran'];
    $foto = $_FILES['bukti_pembayaran']['name'];
    $path = $_FILES['bukti_pembayaran']['tmp_name'];
    move_uploaded_file($path, '../Gambar/' . $foto);

    $query = "UPDATE pembayaran SET bukti_pembayaran = '$foto' WHERE id_pembayaran = '$id_pembayaran'";
    $sql = mysqli_query($koneksi, $query);
    if ($sql) {
        header("location: Materi-Elearning.php?id_materi=$id_materi");
    } else {
        echo "<script>
              alert('Data Tidak Berhasil Ditambah');
              window.location.href = 'Materi Elearning.php';
            </script>";
    }
}
