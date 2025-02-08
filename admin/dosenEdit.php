<?php
include "../koneksi/koneksi.php";

$getNip = $_GET["nip"];
$editDosen = "SELECT * FROM dosen WHERE nip='$getNip'";
$resultDosen = mysqli_query($koneksi, $editDosen);
$dataDosen = mysqli_fetch_array($resultDosen);

session_start();
if (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'admin')) {
  header("Location: ../index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Dosen</title>
</head>

<body>
  <h3>Edit Data Dosen</h3>
  <br>
  <hr><br>
  <?php
  if (!isset($_POST['submit'])) {
  ?>
    <form enctype="multipart/form-data" method="post">
      <table width="100%" border="0">
        <tr>
          <td>NIP</td>
          <td>:</td>
          <td><input type="text" name="nip" size="30" placeholder="NIP" value="<?php echo $dataDosen[0] ?>" readonly="readonly"></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td><input type="text" name="nama" size="30" placeholder="Nama" value="<?php echo $dataDosen[1] ?>"></td>
        </tr>
        <tr>
          <td>Kode Matkul</td>
          <td>:</td>
          <td><input type="text" name="kode_matkul" size="30" placeholder="Kode_Matkul" value="<?php echo $dataDosen[2] ?>"></td>
        </tr>
        <tr>
          <td>Password</td>
          <td>:</td>
          <td><input type="password" name="password" size="30" placeholder="********" value="<?php echo $dataDosen[3] ?>"></td>
        </tr>
        <tr>
          <td><input name="submit" type="submit" value="Edit" style="color: white; text-decoration: none; background-color: green; padding: 5px 15px 5px 15px; border-radius: 5px; margin-top: 20px; border: none;"> <a href="mahasiswaView.php" style="color: white; text-decoration: none; background-color: blue; padding: 5px 15px 5px 15px; border-radius: 5px; margin-top: 20px;">Kembali</a></td>
        </tr>
      </table>
    </form>
  <?php
  } else {
    $nip = $_POST["nip"];
    $nama = $_POST["nama"];
    $kode_matkul = $_POST["kode_matkul"];
    $password = md5($_POST["password"]);

    $updatedosen = "UPDATE dosen SET nama='$nama', kode_matkul='$kode_matkul', password='$password' WHERE nip ='$nip'";
    $querydosen = mysqli_query($koneksi, $updatedosen);

    if ($querydosen) {
      echo "<script>alert('Daftar Berhasil Disimpan !') </script>";
      echo "<script type='text/javascript'>window.location = 'dosenView.php'</script>";
    } else {
      echo "<script>alert('Daftar Gagal Disimpan !') </script>";
      echo "<script type='text/javascript'>window.location = 'dosenView.php'</script>";
    }
  }
  ?>

</body>

</html>