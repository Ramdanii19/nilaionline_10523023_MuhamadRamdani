<?php
$host = "localhost";
$username = "root";
$password = "";
$db       = "nilaionline";

$koneksi = mysqli_connect($host, $username, $password, $db);

if (!$koneksi) {
  echo "Koneksi gagal";
}
