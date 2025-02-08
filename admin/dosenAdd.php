<?php
include "../koneksi/koneksi.php";

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
  <title>Tambah Data Dosen</title>
</head>

<body>
  <h3>Tambah Data Dosen</h3>
  <hr><br>
  <?php
  if (!isset($_POST['submit'])) {
  ?>
    <form enctype="multipart/form-data" method="post">
      <table width="100%" border="0">
        <tr>
          <td>Nip</td>
          <td>:</td>
          <td><input type=" text" name="nip" size="30" placeholder="NIP"></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td><input type="text" name="nama" size="30" placeholder="Nama"></td>
        </tr>
        <tr>
          <td>Kode Matkul</td>
          <td>:</td>
          <td><input type="text" name="kode_matkul" size="30" placeholder="Kode Matkul" maxlength="5"></td>
        </tr>
        <tr>
          <td>Password</td>
          <td>:</td>
          <td><input type="passwors" name="password" size="30" placeholder="********"></td>
        </tr>
        <tr>
          <td><input name="submit" type="submit" value="Tambah" style="color: white; text-decoration: none; background-color: green; padding: 5px 15px 5px 15px; border-radius: 5px; margin-top: 20px; border: none;"> <a href="mahasiswaView.php" style="color: white; text-decoration: none; background-color: blue; padding: 5px 15px 5px 15px; border-radius: 5px; margin-top: 20px;">Kembali</a></td>
        </tr>
      </table>
    </form>
  <?php
  } else {
    $nip = $_POST["nip"];
    $nama = $_POST["nama"];
    $kode_matkul = $_POST["kode_matkul"];
    $password = md5($_POST["password"]);

    $insertDosen = "INSERT INTO dosen (nip, nama, kode_matkul, password) VALUES ('$nip', '$nama', '$kode_matkul', '$password')";
    $queryDosen = mysqli_query($koneksi, $insertDosen);

    if ($queryDosen) {
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