<?php
include "../koneksi/koneksi.php";
$editDosen = "SELECT * FROM dosen";
$resultDosen = mysqli_query($koneksi, $editDosen);
$dataDosen = mysqli_fetch_array($resultDosen);

if (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'dosen' && $_SESSION['role'] !== 'admin')) {
  header("Location: ../index.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Nilai</title>
</head>

<body>
  <h3>Tambah Data Nilai</h3>
  <hr><br>
  <?php
  if (!isset($_POST['submit'])) {
  ?>
    <form enctype="multipart/form-data" method="post">
      <table width="100%" border="0">
        <tr>
          <td>Nama Mahasiswa</td>
          <td>:</td>
          <td><select name="mahasiswa" id="">
              <option selected>Pilih</option>
              <?php
              $queyMhs = "SELECT nim, nama FROM mahasiswa";
              $resultMhs = mysqli_query($koneksi, $queyMhs);
              while ($dataMhs = mysqli_fetch_array($resultMhs, MYSQLI_NUM)) {
                echo "<option value='$dataMhs[0]'>$dataMhs[1]</option>";
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Nama Dosen</td>
          <td>:</td>
          <td><select name="dosen" id="">
              <option selected>Pilih</option>
              <?php
              $queyDosen = "SELECT nip, nama FROM dosen";
              $resultDosen = mysqli_query($koneksi, $queyDosen);
              while ($dataDosen = mysqli_fetch_array($resultDosen, MYSQLI_NUM)) {
                echo "<option value='$dataDosen[0]'>$dataDosen[1]</option>";
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Nilai Tugas</td>
          <td>:</td>
          <td><input type="number" name="tugas" size="30" placeholder="Tugas"></td>
        </tr>
        <tr>
          <td>Nilai UTS</td>
          <td>:</td>
          <td><input type="number" name="uts" size="30" placeholder="UTS"></td>
        </tr>
        <tr>
          <td>Nilai UAS</td>
          <td>:</td>
          <td><input type="number" name="uas" size="30" placeholder="UAS"></td>
        </tr>
        <tr>
          <td><input name="submit" type="submit" value="Tambah" style="color: white; text-decoration: none; background-color: green; padding: 5px 15px 5px 15px; border-radius: 5px; margin-top: 20px; border: none;"> <a href="mahasiswaView.php" style="color: white; text-decoration: none; background-color: blue; padding: 5px 15px 5px 15px; border-radius: 5px; margin-top: 20px;">Kembali</a></td>
        </tr>
      </table>
    </form>
  <?php
  } else {
    $mahasiswa = $_POST["mahasiswa"];
    $dosen = $_POST["dosen"];
    $tugas = $_POST["tugas"];
    $uts = $_POST["uts"];
    $uas = $_POST["uas"];

    $insertNilai = "INSERT INTO nilai (nim, nip, tugas, uts, uas) VALUES ('$mahasiswa', '$dosen', '$tugas', '$uts', '$uas')";
    $queryNilai = mysqli_query($koneksi, $insertNilai);

    if ($queryNilai) {
      echo "<script>alert('Daftar Berhasil Disimpan !') </script>";
      echo "<script type='text/javascript'>window.location = 'nilaiView.php'</script>";
    } else {
      echo "<script>alert('Daftar Gagal Disimpan !') </script>";
      echo "<script type='text/javascript'>window.location = 'nilaiView.php'</script>";
    }
  }
  ?>
</body>

</html>