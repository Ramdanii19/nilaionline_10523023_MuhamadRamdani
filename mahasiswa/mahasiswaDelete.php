<?php
include "../koneksi/koneksi.php";

$nim = $_GET["nim"];
$delMhs = "DELETE FROM MAHASISWA WHERE nim='$nim'";
$resultMhs = mysqli_query($koneksi, $delMhs);

if ($resultMhs) {
  echo "<script>alert('Daftar Berhasil Di hapus !') </script>";
  echo "<script type='text/javascript'>window.location = 'mahasiswaView.php'</script>";
} else {
  echo "<script>alert('Daftar Gagal Di hapus !') </script>";
  echo "<script type='text/javascript'>window.location = 'mahasiswaView.php'</script>";
}
