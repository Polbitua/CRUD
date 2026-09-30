<?php
require_once "config/database.php";
$id=(int)($_GET['id']??0);
$q=mysqli_query($conn,"SELECT * FROM produk WHERE id=$id");
$produk=mysqli_fetch_assoc($q);
if(!$produk) die("Mobil tidak ditemukan.");
?>
<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0"><title><?= htmlspecialchars($produk['nama']); ?> - Rental OLDsky</title><link rel="stylesheet" href="assets/style.css"></head><body>
<div class="navbar"><div class="container"><a href="index.php" class="brand">Rental OLDsky</a><div class="nav-links"><a href="index.php">Beranda</a><a href="produk.php">Mobil</a><a href="tentang.php">Tentang Kami</a></div></div></div>
<div class="container section"><div class="detail card"><div><?php if($produk['gambar']): ?><img src="uploads/produk/<?= htmlspecialchars($produk['gambar']); ?>" class="detail-image" alt="<?= htmlspecialchars($produk['nama']); ?>"><?php endif; ?></div><div class="detail-info"><span class="category"><?= htmlspecialchars($produk['kategori']); ?></span><h1><?= htmlspecialchars($produk['nama']); ?></h1><p><?= nl2br(htmlspecialchars($produk['deskripsi'])); ?></p><div class="price big">Rp <?= number_format($produk['harga'],0,',','.'); ?> <small>/ hari</small></div><p class="availability">✓ <?= (int)$produk['stok']; ?> unit tersedia</p><div class="specs"><div><strong>Tarif</strong><span>Per hari</span></div><div><strong>Ketersediaan</strong><span><?= (int)$produk['stok']; ?> unit</span></div></div><a href="mailto:rental.oldsky@example.com?subject=Pemesanan%20<?= rawurlencode($produk['nama']); ?>" class="btn">Ajukan Sewa</a><a href="produk.php" class="btn btn-light">Kembali</a></div></div></div>
</body></html>
