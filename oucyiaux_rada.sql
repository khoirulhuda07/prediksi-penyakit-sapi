-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 22 Agu 2025 pada 08.50
-- Versi server: 10.6.22-MariaDB-cll-lve
-- Versi PHP: 8.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oucyiaux_rada`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataset`
--

CREATE TABLE `dataset` (
  `id_dataset` int(11) NOT NULL,
  `gejala` varchar(222) DEFAULT NULL,
  `penyakit` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dataset`
--

INSERT INTO `dataset` (`id_dataset`, `gejala`, `penyakit`) VALUES
(30, 'G01, G05, G06', 'P01'),
(31, 'G02, G03, G01, G013, G05, G04', 'P02'),
(32, 'G01,G02,G03,G05,G06,G012,G14,G16,G15', 'P03'),
(33, 'G05, G01, G10, G03, G02, G11, G012', 'P04'),
(34, 'G01, G02, G03, G06, G11', 'P05'),
(35, 'G01, G07, G03, G05, G06, G11', 'P06'),
(36, 'G01, G02, G05, G10, G11', 'P04'),
(37, 'G01, G02, G05, G03, G06', 'P08'),
(38, 'G01, G05, G11, G10', 'P09'),
(39, 'G01, G05, G06', 'P01'),
(41, 'G02, G03, G01, G013, GO5, G04', 'P02'),
(42, 'G07, G08, G09, G01, G05, G012', 'P03'),
(43, 'G05, G01, G10, G03, G02, G11, G012', 'P04'),
(44, 'G01, G02, G03, G06, G11', 'P05'),
(45, 'G01, G07, G03, G05, G06, G11', 'P06'),
(46, 'G01, G02, G05, G10, G11', 'P04'),
(47, 'G01, G02, G05, G03, G06', 'P08'),
(48, 'G01, G05, G10, G11', 'P04'),
(49, 'G01, G05, G06', 'P01'),
(50, 'G07, G08, G09, G01, G05, G012', 'P06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `ID_GEJALA` int(11) NOT NULL,
  `KODE_GEJALA` varchar(222) DEFAULT NULL,
  `GEJALA` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`ID_GEJALA`, `KODE_GEJALA`, `GEJALA`) VALUES
(1, 'G01', 'Batuk'),
(2, 'G02', 'Keluar cairan dari hidung '),
(3, 'G03', 'Demam'),
(5, 'G05', 'Kesulitan bernapas'),
(6, 'G06', 'Penurunan nafsu makan'),
(7, 'G07', 'Hidung bernanah'),
(8, 'G08', 'Radang hidung'),
(9, 'G09', 'Radang saluran pernapasan '),
(10, 'G10', 'Penurunan berat badan'),
(11, 'G11', 'Lemas'),
(12, 'G012', 'Napas berbunyi'),
(17, 'G14', 'Mata berair'),
(20, 'G20', 'Sapi Joget'),
(22, 'G21', 'Pingsan'),
(23, 'G16', 'Pembengkakan paru-paru'),
(24, 'G15', 'Komplikasi sekunder'),
(25, 'G13', 'Kerusakan jaringan lunak pada mulut dan hidung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `ID_PENYAKIT` int(11) NOT NULL,
  `KODE_PENYAKIT` varchar(222) DEFAULT NULL,
  `PENYAKIT` varchar(222) DEFAULT NULL,
  `solusi` longtext DEFAULT NULL,
  `pencegahan` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`ID_PENYAKIT`, `KODE_PENYAKIT`, `PENYAKIT`, `solusi`, `pencegahan`) VALUES
(1, 'P01', 'Bovine Respiratory Disease (BRD)', 'Pemberian antibiotik spektrum luas, antiinflamasi, dan terapi suportif untuk meringankan gejala serta mempercepat pemulihan. bisa juga dengan tambahaan pakan herbal seperti kayu manis, jahe, akar manis, dan timus/timi bisa membantu memperkuat imun sapi.', 'Vaksinasi rutin, menjaga kondisi lingkungan, serta mengelola stres dan kepadatan ternak untuk mengurangi risiko infeksi.'),
(2, 'P02', 'Infectious Bovine Rhinotracheitis (IBR)', 'Pemberian antiviral disertai pengobatan suportif untuk mengurangi gejala dan meningkatkan sistem imun (jahe, bawang putih, atau kunyit bisa membantu memperkuat daya tahan tubuh sapi agar tidak mudah sakit atau mempercepat pemulihan).', 'Vaksinasi IBR secara teratur, karantina hewan baru, dan menjaga kebersihan kandang untuk mencegah penularan.'),
(3, 'P03', 'Bovine Respiratory Syncytial Virus (BRSV)', 'Pengobatan dengan antibiotik jarang berhasil, biasanya dilakukan pemisahan dan pemusnahan hewan positif untuk mencegah penyebaran (Ekstrak etanol(alkohol) dari kencur,  sambiloto, dan meniran, berhasil menghambat aktivitas virus BRSV).', 'Pemberian vaksin, kontrol lalu lintas hewan, serta pemisahan hewan terinfeksi sangat penting untuk mencegah wabah.'),
(4, 'P04', 'Pneumonia Granulomatosa', 'Jika penyakit sudah kronis dan parah, dilakukan euthanasia. Pengobatan antifungal dapat diberikan pada tahap awal (obat herbal seperti Daun vasaka (Segar/Kering), Bawang Putih (cincang halus), Daun time/ timi (kering), Daun kayu putih (kering), Jahe segar (geprek)).', 'Menjaga sanitasi kandang dan deteksi dini sangat penting untuk mencegah penyebaran penyakit yang bersifat kronis.'),
(5, 'P05', 'Parainfluenza Virus (PI-3)', 'Pengobatan simptomatik dan suportif seperti antipiretik dan vitamin, (terdapat cara tradisional seperti kayu putih dan bawang putih membantu membersihkan saluran napas dan mendukung pengurangan lendir).', 'Vaksinasi terhadap virus parainfluenza serta memastikan ventilasi kandang baik untuk menghindari paparan virus.'),
(6, 'P06', 'Pneumonia Bakterial', 'Diberikan antibiotik yang sesuai hasil uji laboratorium serta obat antiinflamasi untuk mengurangi peradangan, (Bahan seperti times/timi, oregano, kayu manis, adas manis dapat mendukung daya tahan tubuh sapi).', 'Vaksinasi, menjaga kebersihan lingkungan dan mengurangi stres hewan sangat efektif dalam mencegah pneumonia bakterial.'),
(7, 'P07', 'Mycoplasma Pneumonia', 'Pengobatan menggunakan antibiotik spesifik seperti Tylosin atau Florfenicol yang efektif terhadap Mycoplasma (bawang putih, times/timi, oregano, Ekstrak Lebah atau rosemary dikenal memiliki efek melawan penyebab penyakit dan membuat tubuh lebih kuat).', 'Melakukan isolasi terhadap hewan baru dan menjaga biosekuriti untuk mencegah penyebaran bakteri Mycoplasma.'),
(8, 'P08', 'Aspiration Penumonia', 'Pemberian antibiotik dan terapi suportif untuk mencegah infeksi sekunder dan membantu pernapasan. terdapat obat herbal seperti Uap dari minyak kayu putih, peppermint oil dan time/timi dapat membantu membuka saluran napas dan menekan pertumbuhan bakteri ada juga times/timi, oregano, adas manis, kayu manis bisa dicampur ke pakan untuk meningkatkan imun dan bantu melawan infeksi ringan.', 'Pelatihan peternak dalam teknik pemberian pakan dan obat untuk mencegah aspirasi ke saluran pernapasan.'),
(9, 'P09', 'Pneumonia Intersstitial', 'Diberikan terapi suportif dan antiinflamasi seperti kortikosteroid untuk mengurangi reaksi inflamasi.  Terdapat cara herbal seperti bubuk horehound putih , bawang putih  , timi, oregano dan minyak kayu putih', 'Menghindari paparan terhadap zat beracun, stres lingkungan, dan infeksi virus melalui manajemen peternakan yang baik.'),
(13, 'P20', 'SAPI GILA', 'SIKOLOG', 'BERDOA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rule`
--

CREATE TABLE `rule` (
  `ID_GEJALA` int(11) NOT NULL,
  `ID_PENYAKIT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rule`
--

INSERT INTO `rule` (`ID_GEJALA`, `ID_PENYAKIT`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 7),
(2, 8),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 8),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 6),
(5, 7),
(5, 8),
(5, 9),
(6, 1),
(6, 2),
(6, 5),
(6, 6),
(6, 8),
(7, 6),
(10, 3),
(10, 4),
(10, 7),
(10, 9),
(11, 4),
(11, 5),
(11, 6),
(11, 7),
(11, 9),
(12, 3),
(12, 4),
(17, 3),
(17, 13),
(20, 13),
(22, 13),
(23, 3),
(24, 3),
(25, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$Lu9j0ciSLXPbxfWeY0bjm.a5kW6SK700epwFbowvyJXXbAe7u1Cim', NULL, '2025-05-17 19:54:01', '2025-05-17 19:54:01'),
(2, 'Admin2', 'Admin2@gmail.com', NULL, '$2y$10$xjw.bqFJdZT6zMyOmrUXs.vlrG5w2KNqPVCCrV7yq/x9Q765CsWa2', NULL, '2025-05-17 20:45:33', '2025-05-17 20:45:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dataset`
--
ALTER TABLE `dataset`
  ADD PRIMARY KEY (`id_dataset`),
  ADD KEY `wr22342` (`gejala`),
  ADD KEY `wihii3` (`penyakit`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`ID_GEJALA`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`ID_PENYAKIT`),
  ADD KEY `PENYAKIT` (`PENYAKIT`);

--
-- Indeks untuk tabel `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`ID_GEJALA`,`ID_PENYAKIT`),
  ADD KEY `dfgfgfe` (`ID_PENYAKIT`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dataset`
--
ALTER TABLE `dataset`
  MODIFY `id_dataset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `ID_GEJALA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `ID_PENYAKIT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `rule`
--
ALTER TABLE `rule`
  ADD CONSTRAINT `dfgfgfe` FOREIGN KEY (`ID_PENYAKIT`) REFERENCES `penyakit` (`ID_PENYAKIT`),
  ADD CONSTRAINT `gfgfg` FOREIGN KEY (`ID_GEJALA`) REFERENCES `gejala` (`ID_GEJALA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
