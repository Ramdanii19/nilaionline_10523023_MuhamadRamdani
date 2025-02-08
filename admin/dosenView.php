<?php
include "../koneksi/koneksi.php";

$queryDosen = "SELECT * FROM dosen";
$resultDosen = mysqli_query($koneksi, $queryDosen);
$countDosen = mysqli_num_rows($resultDosen);

session_start();

if (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'admin')) {
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
      <li><a href="../mahasiswa/mahasiswaView.php">Mahasiswa</a></li>
      <li><a href="dosenView.php">Dosen</a></li>
      <li><a href="../dosen/nilaiView.php">Nilai</a></li>
      <li><a href="../index.php">Logout</a></li>
    </ul>
  </section>

  <section id="container">
    <br><br><br>
    <div style="padding: 0 30px 0 30px;">
      <div style="display: flex; justify-content: end;">
        <a href="dosenAdd.php" style="background-color: green; padding: 10px 20px 10px 20px; border-radius: 7px; font-weight: bold;">Tambah Data Dosen</a>
      </div>
      <br><br>

      <table style="width: 100%; color: white; border-collapse: collapse; border: white;" border="1">
        <tr>
          <th>NIP</th>
          <th>Nama</th>
          <th>Kode Matkul</th>
          <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
            <th>Aksi</th>
          <?php endif; ?>
        </tr>
        <?php

        if ($countDosen > 0) {
          while ($dataDosen = mysqli_fetch_array($resultDosen, MYSQLI_ASSOC)) {
            echo "<td>" . $dataDosen['nip'] . "</td>";
            echo "<td>" . $dataDosen['nama'] . "</td>";
            echo "<td>" . $dataDosen['kode_matkul'] . "</td>";
            if ($_SESSION['role'] == "admin") {
              echo "<td>
              <a href='DosenEdit.php?nip=" . $dataDosen['nip'] . "'>Edit</a> |
              <a href='DosenDelete.php?nip=" . $dataDosen['nip'] . "' onclick='return confirm(\"Yakin ingin menghapus?\")'>Delete</a>
            </td>";
            }
            echo "</tr>";
          }
        } else {
          echo "<tr>
                <td colspan='9' align='center' height='20'>
                  <div> Belum ada data Dosen </div>
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