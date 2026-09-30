<?php
require_once "config/database.php";
$keyword = trim($_GET['keyword'] ?? '');
$kategori = trim($_GET['kategori'] ?? '');
$where = [];
if ($keyword !== '') { $safe = mysqli_real_escape_string($conn, $keyword); $where[] = "nama LIKE '%$safe%'"; }
if ($kategori !== '') { $safe = mysqli_real_escape_string($conn, $kategori); $where[] = "kategori = '$safe'"; }
$where_sql = $where ? 'WHERE '.implode(' AND ', $where) : '';
$query = mysqli_query($conn, "SELECT * FROM produk $where_sql ORDER BY id DESC");
?>
<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0"><title>Mobil - Rental OLDsky</title><link rel="stylesheet" href="assets/style.css"></head><body>
<div class="navbar"><div class="container"><a href="index.php" class="brand">Rental OLDsky</a><div class="nav-links"><a href="index.php">Beranda</a><a href="produk.php">Mobil</a><a href="tentang.php">Tentang Kami</a></div></div></div>
<div class="container section"><span class="eyebrow">ARMADA KAMI</span><h1>Daftar Mobil Rental</h1><p class="muted">Temukan mobil yang sesuai dengan kebutuhan perjalanan Anda.</p>
<div class="card"><form method="GET" class="search-form"><input type="text" name="keyword" placeholder="Cari nama mobil..." value="<?= htmlspecialchars($keyword); ?>"><select name="kategori"><option value="">Semua Jenis</option><option value="City Car" <?= $kategori==='City Car'?'selected':''; ?>>City Car</option><option value="MPV" <?= $kategori==='MPV'?'selected':''; ?>>MPV</option><option value="SUV" <?= $kategori==='SUV'?'selected':''; ?>>SUV</option><option value="Premium" <?= $kategori==='Premium'?'selected':''; ?>>Premium</option></select><button class="btn" type="submit">Cari</button><a class="btn btn-light" href="produk.php">Reset</a></form></div>
<div class="grid"><?php while($row=mysqli_fetch_assoc($query)): ?><div class="card vehicle-card"><?php if($row['gambar']): ?><img src="uploads/produk/<?= htmlspecialchars($row['gambar']); ?>" class="product-image" alt="<?= htmlspecialchars($row['nama']); ?>"><?php endif; ?><div class="card-body"><span class="category"><?= htmlspecialchars($row['kategori']); ?></span><h3><?= htmlspecialchars($row['nama']); ?></h3><p><?= htmlspecialchars($row['deskripsi']); ?></p><div class="price">Rp <?= number_format($row['harga'],0,',','.'); ?> <small>/ hari</small></div><p class="availability">✓ <?= (int)$row['stok']; ?> unit tersedia</p><a href="detail.php?id=<?= $row['id']; ?>" class="btn">Lihat Detail</a></div></div><?php endwhile; ?></div>
</div></body></html>
