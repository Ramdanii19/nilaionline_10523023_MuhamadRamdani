<?php
include "../koneksi/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Mahasiwswa</title>
</head>

<body>
  <h3>Tambah Data Mahasiswa</h3>
  <hr><br>
  <?php
  if (!isset($_POST['submit'])) {
  ?>
    <form enctype="multipart/form-data" method="post">
      <table width="100%" border="0">
        <tr>
          <td>Nim</td>
          <td>:</td>
          <td><input type=" text" name="nim" size="30" placeholder="NIM"></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td><input type="text" name="nama" size="30" placeholder="Nama"></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>:</td>
          <td>
            <label>
              <input type="radio" name="jk" value="Laki-Laki"> Laki Laki
            </label>
            <label>
              <input type="radio" name="jk" value="Perempuan"> Perempuan
            </label>
          </td>
        </tr>
        <tr>
          <td height="50">JURUSAN</td>
          <td>:</td>
          <td>
            <select name="jurusan">
              <option value="">-=PIlih=-</option>
              <option value="Sistem Informasi">Sistem Informasi</option>
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Teknik Komputer">Teknik Komputer</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Password</td>
          <td>:</td>
          <td><input type="password" name="password" size="30" placeholder="PASSWORD"></td>
        </tr>
        <tr>
          <td><input name="submit" type="submit" value="Tambah" style="color: white; text-decoration: none; background-color: green; padding: 5px 15px 5px 15px; border-radius: 5px; margin-top: 20px; border: none;"> <a href="mahasiswaView.php" style="color: white; text-decoration: none; background-color: blue; padding: 5px 15px 5px 15px; border-radius: 5px; margin-top: 20px;">Kembali</a></td>
        </tr>
      </table>
    </form>
  <?php
  } else {
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $jk = $_POST["jk"];
    $jurusan = $_POST["jurusan"];
    $password = md5($_POST["password"]);

    $insertMhs = "INSERT INTO mahasiswa (nim, nama, jk, jur, password) VALUES ('$nim', '$nama', '$jk', '$jurusan', '$password')";
    $queryMhs = mysqli_query($koneksi, $insertMhs);

    if ($queryMhs) {
      echo "<script>alert('Daftar Berhasil Disimpan !') </script>";
      echo "<script type='text/javascript'>window.location = 'mahasiswaView.php'</script>";
    } else {
      echo "<script>alert('Daftar Gagal Disimpan !') </script>";
      echo "<script type='text/javascript'>window.location = 'mahasiswaView.php'</script>";
    }
  }
  ?>
</body>

</html>