<?php
require '../config/koneksi.php';

// Tambah buku
if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $stok = $_POST['stok'];

    // Simpan gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp, "../assets/img/$gambar");

    mysqli_query($conn, "INSERT INTO books (gambar, judul, penulis, stok) 
                         VALUES ('$gambar', '$judul', '$penulis', $stok)");
    header("Location: ../admin/");
    exit;
}

// Edit buku
// Edit buku
if (isset($_POST['edit'])) {
    $id        = $_POST['id_buku'];
    $judul     = $_POST['judul'];
    $penulis   = $_POST['penulis'];
    $stok      = $_POST['stok'];
    $gambarLama = $_POST['gambar_lama'];

    // Cek apakah ada gambar baru diupload
    if ($_FILES['gambar']['name'] != '') {
        $gambarBaru = $_FILES['gambar']['name'];
        $tmp        = $_FILES['gambar']['tmp_name'];

        // Pindahkan file baru ke folder
        move_uploaded_file($tmp, "../assets/img/" . $gambarBaru);
        $gambar = $gambarBaru;
    } else {
        // Jika tidak ada file baru, gunakan gambar lama
        $gambar = $gambarLama;
    }

    // Update database
    mysqli_query($conn, "UPDATE books SET 
        judul='$judul', 
        penulis='$penulis', 
        stok=$stok, 
        gambar='$gambar' 
        WHERE id_buku=$id");

    header("Location: ../admin/kelola_buku.php");
    exit;
}


// Hapus buku
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM books WHERE id_buku=$id");
    header("Location: ../admin/");
    exit;
}
