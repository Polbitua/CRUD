<?php

session_start();

require_once "../includes/auth.php";

?>

<!DOCTYPE html>
<html>

<head>

    <title>Tambah Mobil</title>

    <link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="navbar">

    <div class="container">

        <a href="index.php">Dashboard</a>
        <a href="produk.php">Mobil</a>

    </div>

</div>

<div class="container">

    <div class="card">

        <h1>Tambah Mobil</h1>

        <form
            action="proses_produk.php"
            method="POST"
            enctype="multipart/form-data"
        >

            <input
                type="hidden"
                name="aksi"
                value="tambah"
            >

            <label>Nama Mobil</label>

            <input
                type="text"
                name="nama"
                required
            >

            <label>Jenis Mobil</label>

            <select name="kategori" required>

                <option value="">
                    Pilih kategori
                </option>

                <option value="City Car">
                    City Car
                </option>

                <option value="MPV">
                    MPV
                </option>

                <option value="SUV">
                    SUV
                </option>

            
                <option value="Premium">
                    Premium
                </option>
</select>

            <label>Deskripsi</label>

            <textarea
                name="deskripsi"
                rows="5"
                required
            ></textarea>

            <label>Harga Sewa per Hari</label>

            <input
                type="number"
                name="harga"
                min="0"
                required
            >

            <label>Unit Tersedia</label>

            <input
                type="number"
                name="stok"
                min="0"
                required
            >

            <label>Gambar Mobil</label>

            <input
                type="file"
                name="gambar"
                accept=".jpg,.jpeg,.png,.webp"
            >

            <br>

            <button
                type="submit"
                class="btn"
            >
                Simpan Mobil
            </button>

            <a
                href="produk.php"
                class="btn"
            >
                Kembali
            </a>

        </form>

    </div>

</div>

</body>
</html>