CREATE TABLE `buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,  -- Auto increment untuk id buku
  `isbn` varchar(13) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `status` enum('tersedia','dipinjam') DEFAULT 'tersedia',
  PRIMARY KEY (`id`)  -- Primary key untuk tabel buku
);

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,  -- Auto increment untuk id pengguna
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  PRIMARY KEY (`id`)  -- Primary key untuk tabel pengguna
);

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_jatuh_tempo` date NOT NULL,
  `status` enum('dipinjam','dikembalikan','terlambat') DEFAULT 'dipinjam',
  PRIMARY KEY (`id`),  -- Primary key untuk tabel peminjaman
  CONSTRAINT `fk_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna`(`id`) ON DELETE CASCADE,  -- Relasi ke tabel pengguna
  CONSTRAINT `fk_buku` FOREIGN KEY (`id_buku`) REFERENCES `buku`(`id`) ON DELETE CASCADE  -- Relasi ke tabel buku
);

INSERT INTO `buku` (`isbn`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `kategori`, `status`) VALUES
('9780439139601', 'Harry Potter and the Goblet of Fire', 'J.K. Rowling', 'Bloomsbury', 2000, 'Fantasy', 'tersedia'),
('9780316769488', 'The Catcher in the Rye', 'J.D. Salinger', 'Little, Brown', 1951, 'Fiction', 'tersedia'),
('9780451524935', '1984', 'George Orwell', 'Secker & Warburg', 1949, 'Dystopian', 'tersedia'),
('9780743273565', 'The Great Gatsby', 'F. Scott Fitzgerald', 'Scribner', 1925, 'Fiction', 'tersedia'),
('9780316015844', 'Twilight', 'Stephenie Meyer', 'Little, Brown', 2005, 'Romance', 'tersedia'),
('9781400079179', 'Life of Pi', 'Yann Martel', 'Knopf Canada', 2001, 'Adventure', 'tersedia'),
('9780061120084', 'To Kill a Mockingbird', 'Harper Lee', 'J.B. Lippincott & Co.', 1960, 'Fiction', 'tersedia'),
('9781451673319', 'Fahrenheit 451', 'Ray Bradbury', 'Ballantine Books', 1953, 'Dystopian', 'tersedia'),
('9780553283686', 'Dune', 'Frank Herbert', 'Chilton Books', 1965, 'Science Fiction', 'tersedia'),
('9780374531263', 'The Road', 'Cormac McCarthy', 'Alfred A. Knopf', 2006, 'Post-apocalyptic', 'tersedia');

INSERT INTO `pengguna` (`nama`, `email`, `password`, `role`) VALUES
('Admin', 'admin@gmail.com', '$2y$10$bLo.f6hRPmTqOcChSK73RuAQYYEMbmFnv4R.KJLSBgkRnxRh96muG', 'admin'),  -- Admin user pass:12345
('User1', 'user1@gmail.com', '$2y$10$bLo.f6hRPmTqOcChSK73RuAQYYEMbmFnv4R.KJLSBgkRnxRh96muG', 'user'),  -- Regular user 1 pass:12345
('User2', 'user2@gmail.com', '$2y$10$bLo.f6hRPmTqOcChSK73RuAQYYEMbmFnv4R.KJLSBgkRnxRh96muG', 'user');  -- Regular user 2 pass:12345

INSERT INTO `peminjaman` (`id_pengguna`, `id_buku`, `tanggal_peminjaman`, `tanggal_jatuh_tempo`, `status`) VALUES
(5, 1, '2024-09-01', '2024-09-15', 'dipinjam'),  -- User 1 meminjam buku Harry Potter
(5, 3, '2024-09-03', '2024-09-17', 'dipinjam'),  -- User 1 meminjam buku 1984
(6, 5, '2024-09-01', '2024-09-15', 'dipinjam'),  -- User 2 meminjam buku Twilight
(6, 6, '2024-09-02', '2024-09-16', 'dipinjam');  -- User 2 meminjam buku Life of Pi