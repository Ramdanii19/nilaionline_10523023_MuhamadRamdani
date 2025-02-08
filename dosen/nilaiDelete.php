<?php
include "../koneksi/koneksi.php";

if (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'dosen' && $_SESSION['role'] !== 'admin')) {
  header("Location: ../index.php");
  exit();
}

$nim = $_GET["nim"];
$delDosen = "DELETE FROM nilai WHERE nim='$nim'";
$resultDosen = mysqli_query($koneksi, $delDosen);

if ($resultDosen) {
  echo "<script>alert('Daftar Berhasil Di hapus !') </script>";
  echo "<script type='text/javascript'>window.location = 'nilaiView.php'</script>";
} else {
  echo "<script>alert('Daftar Gagal Di hapus !') </script>";
  echo "<script type='text/javascript'>window.location = 'nilaiView.php'</script>";
}
