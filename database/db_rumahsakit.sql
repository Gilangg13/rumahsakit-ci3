-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2023 pada 10.36
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rumahsakit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `dokter_id` int(11) NOT NULL,
  `poliklinik_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `spesialis` varchar(255) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`dokter_id`, `poliklinik_id`, `name`, `spesialis`, `nomor_telepon`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dr. Maria Dewi', 'Dokter Umum', '08123456789', 'maria.dewi@example.com', '2023-06-25', '2023-06-25'),
(4, 2, 'Dr. Iwan Prasetyo', 'Dokter Gigi', '089767667575', ' iwan.prasetyo@example.com', '2023-06-25', '2023-06-25'),
(5, 2, 'Dr. Ratna Wulandari', 'Dokter Gigi', '0823456789', ' ratna.wulandari@example.com', '2023-06-25', '0000-00-00'),
(6, 7, 'Dr. Agus Santoso', 'Dokter Anak', '087575953962', 'agus.santoso@example.com', '2023-06-25', '0000-00-00'),
(7, 5, 'Dr. Putri Lestari', 'Dokter Jantung', '089767667575', ' putri.lestari@example.com', '2023-06-25', '0000-00-00'),
(8, 3, 'Dr. Budi Kusuma', 'Dokter Mata', '08764545767', 'budi.kusuma@example.com', '2023-06-25', '0000-00-00'),
(9, 4, 'Dr. Siti Rahayu', 'Dokter Kulit', '0898765432', 'siti.rahayu@example.com', '2023-06-25', '0000-00-00'),
(10, 3, 'Dr. Rudi Hermawan', 'Dokter Mata', '089765987345', ' rudi.hermawan@example.com', '2023-06-25', '0000-00-00'),
(11, 1, 'Dr. Maya Susanti', 'Dokter Anak', '082755345965', ' maya.susanti@example.com', '2023-06-25', '0000-00-00'),
(12, 6, 'Dr. Dian Pratiwi', 'Dokter Saraf', '089798535679', 'dian.pratiwi@example.com', '2023-06-25', '0000-00-00'),
(14, 1, 'Dr. Antonius Wijaya', 'Dokter Umum', '089633445941', 'antonius.wijaya@example.com', '2023-06-28', '0000-00-00'),
(15, 2, 'Dr. Lina Kartika', 'Dokter Gigi', '08965443435', ' lina.kartika@example.com', '2023-06-28', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_dokter`
--

CREATE TABLE `jadwal_dokter` (
  `jadwal_id` int(11) NOT NULL,
  `dokter_id` int(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`jadwal_id`, `dokter_id`, `hari`, `jam_mulai`, `jam_selesai`, `lokasi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Senin', '08:00:00', '12:00:00', 'Ruang Praktek 101', '2023-06-25', '2023-06-25'),
(5, 4, 'Selasa', '09:30:00', '14:00:00', 'Ruang Praktek 205', '2023-06-25', '2023-06-25'),
(6, 5, 'Rabu', '13:00:00', '18:00:00', 'Ruang Praktek 309', '2023-06-25', '0000-00-00'),
(7, 6, 'Kamis', '10:00:00', '16:00:00', 'Ruang Praktek 402', '2023-06-25', '0000-00-00'),
(8, 7, 'Jumat', '07:30:00', '11:30:00', 'Ruang Praktek 110', '2023-06-25', '0000-00-00'),
(9, 8, 'Senin', '13:00:00', '17:00:00', 'Ruang Praktek 203', '2023-06-25', '0000-00-00'),
(10, 9, 'Rabu', '09:30:00', '14:00:00', 'Ruang Praktek 305', '2023-06-25', '0000-00-00'),
(11, 10, 'Kamis', '10:30:00', '16:00:00', 'Ruang Praktek 408', '2023-06-25', '0000-00-00'),
(12, 11, 'Jumat', '08:30:00', '13:00:00', 'Ruang Praktek 206', '2023-06-25', '0000-00-00'),
(13, 12, 'Jumat', '14:30:00', '19:00:00', 'Ruang Praktek 310', '2023-06-25', '0000-00-00'),
(15, 1, 'Rabu', '13:00:00', '20:00:00', 'Ruang Praktek 109', '2023-06-25', '2023-06-26'),
(16, 1, 'Kamis', '13:00:00', '17:00:00', 'Ruang Praktek 109', '2023-06-26', '2023-06-25'),
(18, 4, 'Rabu', '13:00:00', '19:00:00', 'Ruang Praktek 309', '2023-06-27', '2023-06-27'),
(19, 14, 'Selasa', '08:00:00', '12:00:00', 'Ruang Praktek 102', '2023-06-28', '0000-00-00'),
(20, 15, 'Rabu', '13:00:00', '17:00:00', 'Ruang Praktek 206', '2023-06-28', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `janji_temu`
--

CREATE TABLE `janji_temu` (
  `janji_id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `dokter_id` int(11) NOT NULL,
  `poliklinik_id` int(11) NOT NULL,
  `tanggal_janji` date NOT NULL,
  `keluhan` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `janji_temu`
--

INSERT INTO `janji_temu` (`janji_id`, `pasien_id`, `dokter_id`, `poliklinik_id`, `tanggal_janji`, `keluhan`, `created_at`, `updated_at`) VALUES
(20, 18, 1, 1, '2023-06-28', 'Demam Tinggi', '2023-06-27 17:01:55', '2023-06-28 20:30:41'),
(21, 19, 6, 2, '2023-06-29', 'Sakit Gigi', '2023-06-28 04:12:38', '0000-00-00 00:00:00'),
(34, 30, 15, 2, '2023-07-02', 'Periksa Gigi', '2023-07-01 04:35:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `pasien_id` int(11) NOT NULL,
  `name_pasien` varchar(255) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`pasien_id`, `name_pasien`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `nomor_telepon`, `email`) VALUES
(18, 'Gilang Gumelar', 'Kuningan', '2002-09-13', 'Laki-Laki', 'Kuningan', '089633445941', 'gilangputra295@gmail.com'),
(19, 'Budi Santoso', 'Kuningan', '2023-05-29', 'Perempuan', 'Kuningan', '087554436467', 'budi@gmail.com'),
(20, 'Ahmad Hidayat', 'Kuningan', '2023-05-29', 'Laki-Laki', 'Kuningan', '089765434765', 'ahmadhidayat@gmail.com'),
(21, 'Arfhan ', 'Kuningan', '2009-02-16', 'Laki-Laki', 'Kuningan', '089765434765', 'arfanhasif88@gmail.com'),
(26, 'Siti Rahmawati', '', '2023-06-04', 'Perempuan', 'Bandung', '087554436467', 'siti.rahayu@example.com'),
(28, 'Test123', 'Kuningan', '2023-05-28', 'Laki-Laki', 'Kuningan', '087554436467', 'coba@gmail.com'),
(29, 'Test123', 'Kuningan', '2023-05-28', 'Perempuan', 'Kuningan', '087554436467', 'test@gmail.com'),
(30, 'Test', 'Kuningan', '2002-09-13', 'Laki-Laki', 'Jl. Cigintung No.1 RT04/RW01, Cigintung, Kuningan', '089466856436', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poliklinik`
--

CREATE TABLE `poliklinik` (
  `poliklinik_id` int(11) NOT NULL,
  `nama_poliklinik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `poliklinik`
--

INSERT INTO `poliklinik` (`poliklinik_id`, `nama_poliklinik`) VALUES
(1, 'Poliklinik Umum'),
(2, 'Poliklinik Gigi'),
(3, 'Poliklinik Mata'),
(4, 'Poliklinik Kulit'),
(5, 'Poliklinik Jantung'),
(6, 'Poliklinik Syaraf'),
(7, 'Poliklinik Anak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `role_id`, `image`, `date_created`) VALUES
(1, 'Gilang Gumelar', 'gilangputra295@gmail.com', '1234', 1, 'default.jpg', 1687630313),
(2, 'Arfhan', 'arfanhasif88@gmail.com', '1234', 2, 'default.jpg', 1687630313),
(3, 'User Gilang', 'gilang@gmail.com', '123', 2, 'default.jpg', 1687630770);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`dokter_id`),
  ADD KEY `poliklinik_id` (`poliklinik_id`);

--
-- Indeks untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `dokter_id` (`dokter_id`);

--
-- Indeks untuk tabel `janji_temu`
--
ALTER TABLE `janji_temu`
  ADD PRIMARY KEY (`janji_id`),
  ADD KEY `poliklinik_id` (`poliklinik_id`),
  ADD KEY `janji_temu_ibfk_2` (`dokter_id`),
  ADD KEY `janji_temu_ibfk_1` (`pasien_id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`pasien_id`);

--
-- Indeks untuk tabel `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`poliklinik_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `dokter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `janji_temu`
--
ALTER TABLE `janji_temu`
  MODIFY `janji_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `pasien_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `poliklinik`
--
ALTER TABLE `poliklinik`
  MODIFY `poliklinik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`poliklinik_id`) REFERENCES `poliklinik` (`poliklinik_id`);

--
-- Ketidakleluasaan untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD CONSTRAINT `jadwal_dokter_ibfk_1` FOREIGN KEY (`dokter_id`) REFERENCES `dokter` (`dokter_id`);

--
-- Ketidakleluasaan untuk tabel `janji_temu`
--
ALTER TABLE `janji_temu`
  ADD CONSTRAINT `janji_temu_ibfk_1` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`pasien_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `janji_temu_ibfk_2` FOREIGN KEY (`dokter_id`) REFERENCES `dokter` (`dokter_id`),
  ADD CONSTRAINT `janji_temu_ibfk_4` FOREIGN KEY (`poliklinik_id`) REFERENCES `poliklinik` (`poliklinik_id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
