<?php
require_once "config/database.php";
$query = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC LIMIT 6");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental OLDsky - Rental Mobil</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="navbar"><div class="container">
    <a href="index.php" class="brand">Rental OLDsky</a>
    <div class="nav-links">
        <a href="index.php">Beranda</a><a href="produk.php">Mobil</a><a href="tentang.php">Tentang Kami</a><a href="auth/login.php">Admin</a>
    </div>
</div></div>
<section class="hero"><div class="container hero-content">
    <span class="badge">RENTAL MOBIL TERPERCAYA</span>
    <h1>Sewa Mobil Mudah,<br><span>Nyaman &amp; Aman.</span></h1>
    <p>Rental OLDsky menyediakan berbagai pilihan mobil untuk perjalanan keluarga, bisnis, liburan, dan kebutuhan harian.</p>
    <a href="produk.php" class="btn">Lihat Pilihan Mobil</a>
</div></section>
<div class="container section">
    <div class="section-title"><div><span class="eyebrow">PILIHAN MOBIL</span><h2>Mobil Siap Disewa</h2></div><a href="produk.php" class="link">Lihat semua →</a></div>
    <div class="grid">
    <?php while ($row = mysqli_fetch_assoc($query)): ?>
        <div class="card vehicle-card">
            <?php if ($row['gambar']): ?><img src="uploads/produk/<?= htmlspecialchars($row['gambar']); ?>" class="product-image" alt="<?= htmlspecialchars($row['nama']); ?>"><?php endif; ?>
            <div class="card-body"><span class="category"><?= htmlspecialchars($row['kategori']); ?></span><h3><?= htmlspecialchars($row['nama']); ?></h3><p><?= htmlspecialchars($row['deskripsi']); ?></p><div class="price">Rp <?= number_format($row['harga'],0,',','.'); ?> <small>/ hari</small></div><a href="detail.php?id=<?= $row['id']; ?>" class="btn">Detail &amp; Sewa</a></div>
        </div>
    <?php endwhile; ?>
    </div>
</div>
<section class="features"><div class="container"><div class="grid feature-grid">
    <div><div class="icon">🚗</div><h3>Armada Terawat</h3><p>Mobil diperiksa dan dirawat secara berkala sebelum disewakan.</p></div>
    <div><div class="icon">✓</div><h3>Proses Mudah</h3><p>Pilih mobil, cek detail, lalu hubungi kami untuk pemesanan.</p></div>
    <div><div class="icon">★</div><h3>Layanan Nyaman</h3><p>Pilihan mobil beragam untuk berbagai kebutuhan perjalanan.</p></div>
</div></div></section>
</body></html>
