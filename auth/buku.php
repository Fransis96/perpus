<?php
require '../config/koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM books");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>daftar buku</title>
</head>
<body>

  <h2>Daftar Buku</h2>
  <a href="#">Kembali</a>

  <ul>
    <?php while ($row = mysqli_fetch_assoc($buku)) : ?>
      <a href="../assets/img/<?= $row['gambar']; ?>">
        <img src="../assets/img/<?= $row['gambar']; ?>" alt="<?= htmlspecialchars($row['judul']); ?>">
      </a>
      <li>Judul :<?= htmlspecialchars($row['judul']); ?></li>
      <li>Penulis:<?= htmlspecialchars($row['penulis']); ?></li>
      <li>Stok: <strong><?= $row['stok']; ?></strong></li>
    <?php endwhile; ?>
  </ul>

</body>
</html>