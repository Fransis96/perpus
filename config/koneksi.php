<?php
$conn = mysqli_connect("localhost", "root", "", "perpus");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>