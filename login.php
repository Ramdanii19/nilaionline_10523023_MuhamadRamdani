<?php
session_start();
include 'koneksi/koneksi.php';

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $query = $koneksi->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
  $query->bind_param("ss", $username, $password);
  $query->execute();
  $result = $query->get_result();
  if ($result->num_rows > 0) {
    $_SESSION['role'] = 'admin';
    header("Location: admin/index.php");
    exit();
  }

  $query = $koneksi->prepare("SELECT * FROM dosen WHERE nip = ? AND password = ?");
  $query->bind_param("ss", $username, $password);
  $query->execute();
  $result = $query->get_result();
  if ($result->num_rows > 0) {
    $_SESSION['role'] = 'dosen';
    $_SESSION['nip'] = $username;
    header("Location: admin/dosenView.php");
    exit();
  }

  $query = $koneksi->prepare("SELECT * FROM mahasiswa WHERE nim = ? AND password = ?");
  $query->bind_param("ss", $username, $password);
  $query->execute();
  $result = $query->get_result();
  if ($result->num_rows > 0) {
    $_SESSION['role'] = 'mahasiswa';
    $_SESSION['nim'] = $username;
    header("Location: mahasiswa/mahasiswaView.php");
    exit();
  }

  // Jika tidak ditemukan
  echo "<script>alert('Username atau password salah!'); window.location.href='index.php';</script>";
}
