<?php
include "../koneksi/koneksi.php";

session_start();

if (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'dosen' && $_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'mahasiswa')) {
  header("Location: ../index.php");
  exit();
}

if ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'dosen') {
  $queryNilai = "SELECT mahasiswa.nim, mahasiswa.nama AS nama_mahasiswa, 
                   nilai.tugas, nilai.uts, nilai.uas, 
                   (0.2 * nilai.tugas) + (0.4 * nilai.uts) + (0.4 * nilai.uas) AS total_nilai, 
                   dosen.nip, dosen.nama AS nama_dosen 
                   FROM nilai
                   LEFT JOIN mahasiswa ON nilai.nim = mahasiswa.nim
                   LEFT JOIN dosen ON dosen.nip = nilai.nip";
} else {
  $nim = $_SESSION['nim'];
  $queryNilai = "SELECT mahasiswa.nim, mahasiswa.nama AS nama_mahasiswa, 
                   nilai.tugas, nilai.uts, nilai.uas, 
                   (0.2 * nilai.tugas) + (0.4 * nilai.uts) + (0.4 * nilai.uas) AS total_nilai, 
                   dosen.nip, dosen.nama AS nama_dosen 
                   FROM nilai
                   LEFT JOIN mahasiswa ON nilai.nim = mahasiswa.nim
                   LEFT JOIN dosen ON dosen.nip = nilai.nip
                   WHERE mahasiswa.nim = '$nim'";
}

$resultNilai = mysqli_query($koneksi, $queryNilai);
$countNilai = mysqli_num_rows($resultNilai);
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <title>.: Sistem Informasi Nilai Online - Universitas Komputer Indonesia :.</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="shortcut icon" type="image/x-icon" href="../images/logoicon.ico" />
  <link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold' rel='stylesheet' type='text/css' />
  <link href='http://fonts.googleapis.com/css?family=Kreon:light,regular' rel='stylesheet' type='text/css' />
  <link rel="stylesheet" type="text/css" href="../css/style-sheet.css" />
  <link rel="stylesheet" type="text/css" href="../css/nivo-slider.css" />
</head>

<body onLoad="initialize()">
  <header>
    <section class="logo"><a href="#"><img src="../images/logo.png" /></a></section>
    <section class="title">Sistem Informasi Nilai Online <br /> <span>POLITEKNIK POS BANDUNG</span></section>
    <section class="clr">
      <center>Jl.Sariasih No.54, Sarijadi, Sukasari, Kota Bandung, Jawa Barat 40151</center>
    </section>
  </header>

  <section id="navigator">
    <ul class="menus">
      <li><a href="../admin/index.php">Home</a></li>
      <?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'mahasiswa')) : ?>
        <li><a href="../mahasiswa/mahasiswaView.php">Mahasiswa</a></li>
      <?php endif; ?>
      <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
        <li><a href="../admin/dosenView.php">Dosen</a></li>
      <?php endif; ?>
      <li><a href="nilaiView.php">Nilai</a></li>
      <li><a href="../index.php">Logout</a></li>
    </ul>
  </section>

  <section id="container">
    <br><br><br>
    <div style="padding: 0 30px 0 30px;">
      <?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'dosen')) : ?>
        <div style="display: flex; justify-content: end;">
          <a href="nilaiAdd.php" style="background-color: green; padding: 10px 20px 10px 20px; border-radius: 7px; font-weight: bold;">Tambah Data Nilai</a>
        </div>
      <?php endif; ?>
      <br><br>

      <table style="width: 100%; color: white; border-collapse: collapse; border: white;" border="1">
        <tr>
          <th>NIM</th>
          <th>Nama</th>
          <th>Tugas</th>
          <th>UTS</th>
          <th>UAS</th>
          <th>Nilai Akhir</th>
          <th>Mata Kuliah</th>
          <th>Dosen</th>
          <?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'dosen')) : ?>
            <th>Aksi</th>
          <?php endif; ?>
        </tr>
        <?php

        if ($countNilai > 0) {
          while ($dataNilai = mysqli_fetch_array($resultNilai, MYSQLI_ASSOC)) {
            echo "<td>" . $dataNilai['nim'] . "</td>";
            echo "<td>" . $dataNilai['nama_mahasiswa'] . "</td>";
            echo "<td>" . $dataNilai['tugas'] . "</td>";
            echo "<td>" . $dataNilai['uts'] . "</td>";
            echo "<td>" . $dataNilai['uas'] . "</td>";
            echo "<td>" . $dataNilai['total_nilai'] . "</td>";
            echo "<td>" . $dataNilai['nip'] . "</td>";
            echo "<td>" . $dataNilai['nama_dosen'] . "</td>";
            if ($_SESSION['role'] == "admin" || $_SESSION['role'] == "dosen") {
              echo "<td>
              <a href='nilaiEdit.php?nim=" . $dataNilai['nim'] . "'>Edit</a> |
              <a href='nilaiDelete.php?nim=" . $dataNilai['nim'] . "' onclick='return confirm(\"Yakin ingin menghapus?\")'>Delete</a>
            </td>";
            }
            echo "</tr>";
          }
        } else {
          echo "<tr>
                <td colspan='9' align='center' height='20'>
                  <div> Belum ada data Nilai </div>
                </td>
            </tr>";
        }
        ?>
      </table>
      <br><br><br><br><br><br>
    </div>
    <section class="clr"></section>
  </section>

  <footer>
    <font color=#000> Copyright &copy; 2025 - Universitas Komputer Indonesia <br />
      Developed By <a href="#" target="_new">10523023 Muhamad Ramdani</a> </font>
  </footer>

</body>

</html>