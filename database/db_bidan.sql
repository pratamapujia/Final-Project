-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jun 2020 pada 11.04
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bidan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anamnesis`
--

CREATE TABLE `anamnesis` (
  `id_anamnesis` varchar(8) NOT NULL,
  `id_pasien` varchar(8) NOT NULL,
  `riwayat_penyakit` varchar(25) NOT NULL,
  `jml_keguguran` int(5) NOT NULL,
  `cara_persalinan` varchar(25) NOT NULL,
  `kehamilan` varchar(2) NOT NULL,
  `tekanan_darah` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anamnesis`
--

INSERT INTO `anamnesis` (`id_anamnesis`, `id_pasien`, `riwayat_penyakit`, `jml_keguguran`, `cara_persalinan`, `kehamilan`, `tekanan_darah`) VALUES
('ANM001', 'PSN001', 'Tidak ada', 0, 'normal', '2', '180'),
('ANM002', 'PSN002', 'Tidak ada', 0, 'normal', '1', '180'),
('ANM003', 'PSN003', 'Tidak ada', 0, 'sesar', '1', '190');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidan`
--

CREATE TABLE `bidan` (
  `id_bidan` varchar(8) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nama_bidan` varchar(25) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `telepon_bidan` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bidan`
--

INSERT INTO `bidan` (`id_bidan`, `foto`, `nama_bidan`, `alamat`, `telepon_bidan`) VALUES
('BDN001', 'doctor-thumb-07.jpg', 'Sulis', 'Jl Kali Brantas No 13', '08155456578'),
('BDN002', 'doctor-thumb-10.jpg', 'Susi', 'Jl. Tropodo 1 Barat No 319B', '0111888222'),
('BDN003', 'doctor-thumb-05.jpg', 'Vivi', 'Jl. Kali Brantas No. 15', '088822123123'),
('BDN004', 'doctor-03.jpg', 'Siti', 'Jl. Tropodo 1 Barat No 319B', '08155456578');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` varchar(8) NOT NULL,
  `id_pasien` varchar(8) NOT NULL,
  `nama_obat` varchar(15) NOT NULL,
  `jenis_obat` varchar(15) NOT NULL,
  `fungsi` varchar(20) NOT NULL,
  `komposisi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `id_pasien`, `nama_obat`, `jenis_obat`, `fungsi`, `komposisi`) VALUES
('OBT001', 'PSN001', 'Analgetik', 'Pil', 'Penghilang rasa saki', '3x1'),
('OBT002', 'PSN003', 'Antasida', 'Cair', 'Untuk perut kembung', '3x1'),
('OBT003', 'PSN022', 'Antimo', 'Pil', 'Penambah Imun', '3x1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` varchar(8) NOT NULL,
  `nama_pasien` varchar(25) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `umur` int(3) NOT NULL,
  `nama_suami` varchar(25) NOT NULL,
  `pekerjaan` varchar(25) NOT NULL,
  `telepon_pasien` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `tanggal_daftar`, `umur`, `nama_suami`, `pekerjaan`, `telepon_pasien`, `alamat`) VALUES
('PSN001', 'Riyanti', '2019-07-19', 37, 'Riyan', 'Karyawan swasta', '081553566510', 'Jl Kali Brantas No 13'),
('PSN002', 'Sulis', '2019-07-24', 41, 'puji', 'Karyawan swasta', '081553566510', 'Jl. Kali Brantas No. 13'),
('PSN003', 'Dira', '2019-08-07', 40, 'Abi', 'Belum Bekerja', '081553566510', 'Jl. Kali Brantas No. 13'),
('PSN004', 'Dinda', '2019-08-29', 21, 'Pratama', 'Karyawan swasta', '081553566510', 'Jl. Kali Brantas No. 15'),
('PSN005', 'Ambar', '2019-08-31', 41, 'Anto', 'Karyawan swasta', '081553566510', 'Jl Kali Brantas No 13'),
('PSN006', 'Siti', '2019-09-15', 41, 'Muji', 'Karyawan swasta', '081553566510', 'Jl. Kali Brantas No. 13'),
('PSN007', 'Vivi', '2019-09-18', 30, 'Yanto', 'Karyawan swasta', '081553566510', 'Jl. Tropodo 1 Barat No 319B'),
('PSN008', 'Endang', '2019-09-29', 37, 'Makin', 'Karyawan swasta', '081553566510', 'Jl Kali Brantas No 13'),
('PSN009', 'Anggi', '2019-09-30', 45, 'Gandi', 'Karyawan swasta', '081553566510', 'Jl. Kali Brantas No. 15'),
('PSN010', 'Amel', '2019-09-30', 48, 'Fadil', 'Karyawan swasta', '081553566510', 'Jl. Kali Brantas No. 15'),
('PSN011', 'Anita', '2019-10-09', 20, 'Ferdi', 'Karyawan swasta', '081553566510', 'Jl. Kali Brantas No. 13'),
('PSN012', 'Arsi', '2019-11-01', 37, 'Pratama', 'Karyawan swasta', '081553566510', 'Jl Kali Brantas No 13'),
('PSN013', 'Rani', '2019-11-07', 20, 'Abi', 'Karyawan swasta', '081553566510', 'Jl Kali Brantas No 13'),
('PSN014', 'Fanya', '2019-11-22', 41, 'Anto', 'Belum Bekerja', '081553566510', 'Jl Kali Brantas No 13'),
('PSN015', 'Ririn', '2019-12-18', 40, 'Riyan', 'Belum Bekerja', '081553566510', 'Jl. Tropodo 1 Barat No 319B rt20 rw02'),
('PSN016', 'Siti', '2020-01-07', 37, 'Abi', 'Karyawan swasta', '081553566510', 'Jl. Kali Brantas No. 15'),
('PSN017', 'Fitri', '2020-02-12', 41, 'Dandi', 'Karyawan swasta', '081553566510', 'Jl. Kali Brantas No. 13'),
('PSN018', 'Sulis', '2020-03-17', 20, 'Anto', 'Karyawan swasta', '081553566510', 'Jl. Kali Brantas No. 13'),
('PSN019', 'Nabila', '2020-04-22', 37, 'Pratama', 'Karyawan swasta', '081553566510', 'Jl. Kali Brantas No. 15'),
('PSN020', 'Dinda', '2020-04-30', 37, 'Riyan', 'Karyawan swasta', '081553566510', 'Jl. Kali Brantas No. 13'),
('PSN021', 'Riyanti', '2020-05-21', 20, 'Riyan', 'Ibu Rumah Tangga', '081553566510', 'Jl. Kali Brantas No. 15'),
('PSN022', 'Ambar', '2020-05-28', 37, 'Pratama', 'Belum Bekerja', '081553566510', 'Jl Kali Brantas No 13'),
('PSN023', 'Ambarwati', '2020-06-02', 41, 'Brama', 'Belum Bekerja', '081553566510', 'Jl. Kali Brantas No. 15'),
('PSN024', 'Iis', '2020-02-28', 40, 'Abi', 'Karyawan swasta', '081553566510', 'Jl Kali Brantas No 13'),
('PSN025', 'Siti', '2020-02-29', 41, 'puji', 'Karyawan swasta', '081553566510', 'Jl. Kali Brantas No. 13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `id_pemeriksaan` varchar(8) NOT NULL,
  `id_pasien` varchar(8) NOT NULL,
  `id_bidan` varchar(8) NOT NULL,
  `id_obat` varchar(8) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `tanggal_periksa` varchar(10) NOT NULL,
  `kunjungan` varchar(2) NOT NULL,
  `keluhan` text NOT NULL,
  `diagnosa` varchar(25) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id_pemeriksaan`, `id_pasien`, `id_bidan`, `id_obat`, `nama_pasien`, `tanggal_periksa`, `kunjungan`, `keluhan`, `diagnosa`, `keterangan`) VALUES
('PMR001', 'PSN001', 'BDN001', 'OBT001', 'Riyanti', '2020-04-18', '1', 'Kurang Vitamin', 'Tekanan Darah rendah', 'minum obat setiap hari 2 kali'),
('PMR002', 'PSN002', 'BDN001', 'OBT001', 'Sulis', '2020-06-01', '2', 'Kurang Vitamin', 'Tekanan Darah rendah', 'jangan terlalu capek');

-- --------------------------------------------------------

--
-- Struktur dari tabel `persalinan`
--

CREATE TABLE `persalinan` (
  `id_persalinan` varchar(8) NOT NULL,
  `id_pasien` varchar(8) NOT NULL,
  `id_bidan` varchar(8) NOT NULL,
  `tanggal_persalinan` varchar(10) NOT NULL,
  `jenis_persalinan` varchar(20) NOT NULL,
  `status_lahir` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `persalinan`
--

INSERT INTO `persalinan` (`id_persalinan`, `id_pasien`, `id_bidan`, `tanggal_persalinan`, `jenis_persalinan`, `status_lahir`) VALUES
('PSL001', 'PSN007', 'BDN003', '2020-04-08', 'Normal', 'Normal'),
('PSL002', 'PSN008', 'BDN001', '2020-05-12', 'Normal', 'Normal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$sCGvpuA..BH873n2R1hEoubbYbax7yYrnoYLN4hbSF.KGSBkyXLvC'),
(2, 'staf', '$2y$10$tSaPM.S15uF1Grw1feE0g.tJ1HpOL1G37wRNEKnx5vOdqz6Gox..G');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anamnesis`
--
ALTER TABLE `anamnesis`
  ADD PRIMARY KEY (`id_anamnesis`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indeks untuk tabel `bidan`
--
ALTER TABLE `bidan`
  ADD PRIMARY KEY (`id_bidan`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`id_pemeriksaan`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_bidan` (`id_bidan`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indeks untuk tabel `persalinan`
--
ALTER TABLE `persalinan`
  ADD PRIMARY KEY (`id_persalinan`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_bidan` (`id_bidan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anamnesis`
--
ALTER TABLE `anamnesis`
  ADD CONSTRAINT `anamnesis_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD CONSTRAINT `pemeriksaan_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemeriksaan_ibfk_2` FOREIGN KEY (`id_bidan`) REFERENCES `bidan` (`id_bidan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemeriksaan_ibfk_3` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `persalinan`
--
ALTER TABLE `persalinan`
  ADD CONSTRAINT `persalinan_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `persalinan_ibfk_2` FOREIGN KEY (`id_bidan`) REFERENCES `bidan` (`id_bidan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
