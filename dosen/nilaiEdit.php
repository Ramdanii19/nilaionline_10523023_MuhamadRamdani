<?php
include "../koneksi/koneksi.php";

$getNim = $_GET["nim"];
$editMhs = "SELECT * FROM nilai WHERE nim='$getNim'";
$resultMhs = mysqli_query($koneksi, $editMhs);
$dataMhs = mysqli_fetch_array($resultMhs);
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
  <title>Edit Data Nilai</title>
</head>

<body>
  <h3>Edit Data Nilai</h3>
  <br>
  <hr><br>
  <?php
  if (!isset($_POST['submit'])) {
  ?>
    <form enctype="multipart/form-data" method="post">
      <table width="100%" border="0">
        <tr>
          <td>NIM</td>
          <td>:</td>
          <td><input type="text" name="nim" size="30" placeholder="NIM" value="<?php echo $dataMhs[3] ?>" readonly="readonly"></td>
        </tr>
        <tr>
          <td>Nilai Tugas</td>
          <td>:</td>
          <td><input type="number" name="tugas" size="30" placeholder="Tugas" value="<?php echo $dataMhs[0] ?>"></td>
        </tr>
        <tr>
          <td>Nilai UTS</td>
          <td>:</td>
          <td><input type="number" name="uts" size="30" placeholder="UTS" value="<?php echo $dataMhs[1] ?>"></td>
        </tr>
        <tr>
          <td>Nilai UAS</td>
          <td>:</td>
          <td><input type="number" name="uas" size="30" placeholder="UAS" value="<?php echo $dataMhs[2] ?>"></td>
        </tr>
        <tr>
          <td><input name="submit" type="submit" value="Edit" style="color: white; text-decoration: none; background-color: green; padding: 5px 15px 5px 15px; border-radius: 5px; margin-top: 20px; border: none;"> <a href="mahasiswaView.php" style="color: white; text-decoration: none; background-color: blue; padding: 5px 15px 5px 15px; border-radius: 5px; margin-top: 20px;">Kembali</a></td>
        </tr>
      </table>
    </form>
  <?php
  } else {
    $mahasiswa = $_POST["nim"];
    $dosen = $_POST["dosen"];
    $tugas = $_POST["tugas"];
    $uts = $_POST["uts"];
    $uas = $_POST["uas"];

    $updateNilai = "UPDATE nilai SET tugas='$tugas', uts='$uts', uas='$uas' WHERE nim='$mahasiswa'";
    $queryNilai = mysqli_query($koneksi, $updateNilai);

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