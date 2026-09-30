CREATE DATABASE IF NOT EXISTS rental_oldsky CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE rental_oldsky;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;

CREATE TABLE IF NOT EXISTS admin (
  id int(11) NOT NULL AUTO_INCREMENT,
  nama varchar(100) NOT NULL,
  username varchar(50) NOT NULL,
  password varchar(255) NOT NULL,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY username (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS produk (
  id int(11) NOT NULL AUTO_INCREMENT,
  nama varchar(100) NOT NULL,
  kategori varchar(50) NOT NULL,
  deskripsi text NOT NULL,
  harga decimal(12,2) NOT NULL,
  stok int(11) NOT NULL DEFAULT 0,
  gambar varchar(255) DEFAULT NULL,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DELETE FROM produk;
INSERT INTO produk (nama,kategori,deskripsi,harga,stok,gambar) VALUES
('Toyota Avanza','MPV','MPV nyaman untuk keluarga, perjalanan dalam kota maupun luar kota.','350000',5,'avanza.jpg'),
('Toyota Innova Reborn','MPV','MPV luas dan nyaman untuk perjalanan keluarga dan kebutuhan bisnis.','550000',3,'innova.jpg'),
('Honda Brio','City Car','City car irit dan lincah untuk kebutuhan perjalanan sehari-hari di dalam kota.','300000',6,'brio.jpg'),
('Toyota Fortuner','SUV','SUV tangguh dengan kabin luas untuk perjalanan keluarga dan luar kota.','850000',2,'fortuner.jpg'),
('Mitsubishi Xpander','MPV','MPV modern dengan ruang kabin lega dan nyaman untuk perjalanan bersama.','450000',4,'xpander.jpg'),
('Toyota Alphard','Premium','Kendaraan premium dengan kabin mewah untuk kebutuhan khusus dan perjalanan bisnis.','1800000',1,'alphard.jpg');

INSERT INTO admin (nama,username,password) VALUES
('Administrator Rental OLDsky','admin','$2y$10$98vbxh4xT65X0Rnc9/L33eWkPdxz8VL4hbvd338D7IILqDOqYj4e6');
COMMIT;
