-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26 Feb 2024 pada 10.33
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_puskesmas_imunisasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_balita`
--

CREATE TABLE `tbl_balita` (
  `id_balita` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `nama_balita` varchar(50) NOT NULL,
  `jenkel_balita` enum('L','P') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_balita`
--

INSERT INTO `tbl_balita` (`id_balita`, `id_login`, `nama_balita`, `jenkel_balita`, `tanggal_lahir`, `nama_ibu`, `nama_ayah`, `alamat`, `no_hp`) VALUES
(2, 6, 'Lisa Wati', 'P', '2021-06-08', 'Sumiati', 'Suprapto', 'Jl Saudara, Medan', '081335467892'),
(6, 2, 'Johan', 'L', '2024-02-09', 'Budi', 'Dian', 'Jl Melati', '081239213123'),
(7, 3, 'Vanta Meilina', 'P', '2024-02-14', 'Agus', 'Bonita', 'medan', '08123129234'),
(8, 0, 'Berliana', 'P', '2024-02-15', 'Miskha', 'Suryadi', 'Pardede', '082345167'),
(9, 0, 'Janheri', 'L', '2024-02-13', 'Bara', 'Sinta', 'jl surya', '098625533'),
(10, 0, 'Kevin', 'L', '2024-02-13', 'berta', 'jen', 'Pardede', '0812345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_daftar`
--

CREATE TABLE `tbl_daftar` (
  `id_daftar` int(11) NOT NULL,
  `id_balita` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `no_antrian` int(12) NOT NULL,
  `tinggi` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `keluhan` text,
  `status` enum('Daftar','Periksa','Selesai','Batal') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_daftar`
--

INSERT INTO `tbl_daftar` (`id_daftar`, `id_balita`, `id_petugas`, `tgl_daftar`, `no_antrian`, `tinggi`, `berat`, `keluhan`, `status`) VALUES
(2, 2, 1, '2024-01-25', 1, 60, 12, 'tidak ada', 'Selesai'),
(7, 7, 1, '2024-02-27', 1, 65, 15, 'Kosong', 'Selesai'),
(8, 2, 1, '2024-02-26', 1, 57, 16, 'Tidak ada', 'Selesai'),
(9, 6, 1, '2024-02-26', 2, 55, 20, '-', 'Selesai'),
(10, 8, 1, '2024-02-22', 3, 90, 10, 'Demam', 'Selesai'),
(11, 9, 1, '2024-02-27', 3, 67, 56, '-', 'Periksa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `spesialisasi` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_dokter`
--

INSERT INTO `tbl_dokter` (`id_dokter`, `nama_dokter`, `spesialisasi`, `no_hp`, `jenis_kelamin`) VALUES
(3, 'dr Mahadewi Suprapto, MKsT', 'Anak', '081239839434', 'P');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_imunisasi`
--

CREATE TABLE `tbl_imunisasi` (
  `id_imunisasi` int(11) NOT NULL,
  `id_vaksin` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `id_balita` int(11) NOT NULL,
  `id_daftar` int(11) DEFAULT NULL,
  `tindakan` text,
  `tgl_vaksin` date NOT NULL,
  `id_dokter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_imunisasi`
--

INSERT INTO `tbl_imunisasi` (`id_imunisasi`, `id_vaksin`, `id_petugas`, `id_balita`, `id_daftar`, `tindakan`, `tgl_vaksin`, `id_dokter`) VALUES
(2, 3, 1, 2, 2, 'Pemberian vaksin', '2024-01-15', 3),
(3, 4, 1, 2, 2, 'Pemberian vaksin', '2024-02-25', 3),
(4, 3, 1, 7, 7, 'Pemberian vaksin', '2024-02-25', 3),
(5, 5, 1, 2, 8, 'Pemberian vaksin', '2024-02-26', 3),
(6, 3, 1, 6, 9, 'Pemberian vaksin', '2024-02-26', 3),
(7, 3, 1, 8, 10, 'Pemberian vaksin dan obat', '2024-02-26', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `jadwal` text NOT NULL,
  `id_dokter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id_login` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `group` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_login`
--

INSERT INTO `tbl_login` (`id_login`, `nama`, `username`, `password`, `group`) VALUES
(1, 'Berliana', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(2, 'Johan', 'johan', '759412786bc533369b22377bf83fb9056c5b25b2', 3),
(3, 'Vanta Meilina', 'vanta', '3e09ecd21ff3e39e4840456967e73182e0fcf5b6', 3),
(6, 'Lisa Wati', 'lisa', 'c4ed14e2020dd45edb57b5fba2f40dd93952505e', 3),
(8, 'Sany Sobrata', 'sany', '4e0e2f177d1b01f2f4533d3dc2605e76a67073af', 2),
(9, 'Berliana', 'Berliana', 'b521caa6e1db82e5a01c924a419870cb72b81635', 3),
(10, 'Berliana', 'Berliana', 'b521caa6e1db82e5a01c924a419870cb72b81635', 3),
(11, 'Berliana', 'Berliana', 'b521caa6e1db82e5a01c924a419870cb72b81635', 3),
(12, 'Berliana', 'Berliana', 'b521caa6e1db82e5a01c924a419870cb72b81635', 3),
(13, 'Berliana', 'Berliana', 'b521caa6e1db82e5a01c924a419870cb72b81635', 3),
(14, 'Berliana', 'Berliana', 'b521caa6e1db82e5a01c924a419870cb72b81635', 3),
(15, 'Berliana', 'Berliana', 'b521caa6e1db82e5a01c924a419870cb72b81635', 3),
(16, 'Berliana', 'Berliana', 'b521caa6e1db82e5a01c924a419870cb72b81635', 3),
(17, 'Janheri', 'Janheri', 'd033e22ae348aeb5660fc2140aec35850c4da997', 3),
(18, 'Kevin', 'Kevin', 'e043899daa0c7add37bc99792b2c045d6abbc6dc', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `id_login` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `nama_petugas`, `jabatan`, `jenis_kelamin`, `id_login`) VALUES
(1, 'Sany Sobrata', 'perawat', 'P', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_vaksin`
--

CREATE TABLE `tbl_vaksin` (
  `id_vaksin` int(11) NOT NULL,
  `nama_vaksin` varchar(50) DEFAULT NULL,
  `keterangan` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_vaksin`
--

INSERT INTO `tbl_vaksin` (`id_vaksin`, `nama_vaksin`, `keterangan`) VALUES
(3, 'BCG Polio 1', 'Usia 0-1 Bulan,\r\nMencegah penularan tuberculosis dan polio'),
(4, 'DPT-HB-Hib 1 Polio 2', 'Usia 2 bulan, \r\nMencegah polio, difteri, batuk rejan, retanus, hepatitis B, meningitis, & pneumonia'),
(5, 'DPT-HB-Hib 2 Polio 3', 'Usia 3 bulan'),
(6, ' DPT-HB-Hib 3 Polio 4', 'Usia 4 bulan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_balita`
--
ALTER TABLE `tbl_balita`
  ADD PRIMARY KEY (`id_balita`);

--
-- Indexes for table `tbl_daftar`
--
ALTER TABLE `tbl_daftar`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tbl_imunisasi`
--
ALTER TABLE `tbl_imunisasi`
  ADD PRIMARY KEY (`id_imunisasi`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `foreignkey4` (`id_dokter`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tbl_vaksin`
--
ALTER TABLE `tbl_vaksin`
  ADD PRIMARY KEY (`id_vaksin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_balita`
--
ALTER TABLE `tbl_balita`
  MODIFY `id_balita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_daftar`
--
ALTER TABLE `tbl_daftar`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_imunisasi`
--
ALTER TABLE `tbl_imunisasi`
  MODIFY `id_imunisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_vaksin`
--
ALTER TABLE `tbl_vaksin`
  MODIFY `id_vaksin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD CONSTRAINT `foreignkey4` FOREIGN KEY (`id_dokter`) REFERENCES `tbl_dokter` (`id_dokter`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
