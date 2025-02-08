<?php
include "../koneksi/koneksi.php";

$getNim = $_GET["nim"];
$editMhs = "SELECT * FROM nilai WHERE nim='$getNim'";
$resultMhs = mysqli_query($koneksi, $editMhs);
$dataMhs = mysqli_fetch_array($resultMhs);
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
          <td width="27%">Nim</td>
          <td width="4%">:</td>
          <td width="69%"><input type="text" name="nim" size="30" placeholder="NIM" value="<?php echo $dataMhs[3] ?>" readonly="readonly"></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td><input type="text" name="nama" size="30" placeholder="Nama" value="<?php echo $dataMhs[1] ?>"></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>:</td>
          <td>
            <label>
              <input type="radio" name="jk" value="Laki-Laki"
                <?php if ($dataMhs[2] == "Laki-Laki") echo "checked"; ?>> Laki Laki
            </label>
            <label>
              <input type="radio" name="jk" value="Perempuan"
                <?php if ($dataMhs[2] == "Lerempuan") echo "checked"; ?>> Perempuan
            </label>
          </td>
        </tr>
        <tr>
          <td height="50">JURUSAN</td>
          <td>:</td>
          <td>
            <select name="jurusan">
              <option value="<?php echo $dataMhs[3] ?>"><?php echo $dataMhs[3] ?></option>
              <option value="Sistem Informasi">Sistem Informasi</option>
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Teknik Komputer">Teknik Komputer</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Password</td>
          <td>:</td>
          <td><input type="text" name="password" size="30" placeholder="PASSWORD" value="<?php echo $dataMhs[4] ?>"></td>
        </tr>
        <tr>
          <td><input name="submit" type="submit" value="Edit" style="color: white; text-decoration: none; background-color: green; padding: 5px 15px 5px 15px; border-radius: 5px; margin-top: 20px; border: none;"> <a href="mahasiswaView.php" style="color: white; text-decoration: none; background-color: blue; padding: 5px 15px 5px 15px; border-radius: 5px; margin-top: 20px;">Kembali</a></td>
        </tr>
      </table>
    </form>
  <?php
  } else {
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $jk = $_POST["jk"];
    $jurusan = $_POST["jurusan"];
    $password = $_POST["password"];

    $updateMhs = "UPDATE mahasiswa SET nama='$nama', jk='$jk', jur='$jurusan', password='$password'";
    $queryMhs = mysqli_query($koneksi, $updateMhs);

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