<?php
include "../koneksi/koneksi.php";

$queryMhs = "SELECT * FROM mahasiswa";
$resultMhs = mysqli_query($koneksi, $queryMhs);
$countMhs = mysqli_num_rows($resultMhs);

session_start();

if (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'mahasiswa' && $_SESSION['role'] !== 'admin')) {
  header("Location: ../index.php");
  exit();
}
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
      <li><a href="mahasiswaView.php">Mahasiswa</a></li>
      <li><a href="../admin/dosenView.php">Dosen</a></li>
      <li><a href="../dosen/nilaiView.php">Nilai</a></li>
      <li><a href="../index.php">Logout</a></li>
    </ul>
  </section>

  <section id="container">
    <br><br><br>
    <div style="padding: 0 30px 0 30px;">
      <div style="display: flex; justify-content: end;">
        <a href="mahasiswaAdd.php" style="background-color: green; padding: 10px 20px 10px 20px; border-radius: 7px; font-weight: bold;">Tambah Data Mahasiswa</a>
      </div>
      <br><br>

      <table style="width: 100%; color: white; border-collapse: collapse; border: white;" border="1">
        <tr>
          <th>NIM</th>
          <th>Nama</th>
          <th>Jenis Kelamin</th>
          <th>Jurusan</th>
          <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
            <th>Aksi</th>
          <?php endif; ?>
        </tr>
        <?php

        if ($countMhs > 0) {
          while ($dataMhs = mysqli_fetch_array($resultMhs, MYSQLI_ASSOC)) {
            echo "<td>" . $dataMhs['nim'] . "</td>";
            echo "<td>" . $dataMhs['nama'] . "</td>";
            echo "<td>" . $dataMhs['jk'] . "</td>";
            echo "<td>" . $dataMhs['jur'] . "</td>";
            if ($_SESSION['role'] == "admin") {
              echo "<td>";
              echo "<a href='mahasiswaEdit.php?nim=" . $dataMhs['nim'] . "'>Edit</a> | ";
              echo "<a href='mahasiswaDelete.php?nim=" . $dataMhs['nim'] . "' onclick='return confirm(\"Yakin ingin menghapus?\")'>Delete</a>";
              echo "</td>";
            }
            echo "</tr>";
          }
        } else {
          echo "<tr>
                <td colspan='9' align='center' height='20'>
                  <div> Belum ada data Mahasiswa </div>
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