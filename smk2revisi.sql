-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05 Des 2023 pada 05.43
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smk2revisi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_siswa`
--

CREATE TABLE `absen_siswa` (
  `id_absen_siswa` int(11) NOT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `hadir` int(11) DEFAULT NULL,
  `izin` int(11) DEFAULT NULL,
  `sakit` int(11) DEFAULT NULL,
  `alpha` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `username` varchar(1024) DEFAULT NULL,
  `password` varchar(1024) DEFAULT NULL,
  `nama_guru` varchar(1024) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `jk_guru` enum('Pria','Wanita') DEFAULT NULL,
  `tgl_lahir_guru` date DEFAULT NULL,
  `tlp_guru` varchar(20) DEFAULT NULL,
  `alamat_guru` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `guru`
--
DELIMITER $$
CREATE TRIGGER `tguru` AFTER INSERT ON `guru` FOR EACH ROW replace into user (id_user,id_guru,username,password) (select null as id_user,id_guru,nip as username,MD5(nip) as password from guru)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat') DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `kelas_jurusan` enum('X','XI','XII') DEFAULT NULL,
  `kode_jurusan` varchar(1024) DEFAULT NULL,
  `nama_jurusan` varchar(1024) DEFAULT NULL,
  `ruang_jurusan` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `kelas_jurusan`, `kode_jurusan`, `nama_jurusan`, `ruang_jurusan`) VALUES
(4, 'X', 'DPIB', 'Desain Pemodelan dan Informasi Bangunan', 'I'),
(5, 'XI', 'DPIB', 'Desain Pemodelan dan Informasi Bangunan', 'I'),
(6, 'XII', 'DPIB', 'Desain Pemodelan dan Informasi Bangunan', 'I'),
(7, 'X', 'TITL', 'Teknik ketenagalistrikan', 'I'),
(8, 'XI', 'TITL', 'Teknik ketenagalistrikan', 'I'),
(9, 'XII', 'TITL', 'Teknik ketenagalistrikan', 'I'),
(10, 'X', 'TPM', 'Teknik Permesinan', 'I'),
(11, 'XI', 'TPM', 'Teknik Permesinan', 'I'),
(12, 'XII', 'TPM', 'Teknik Permesinan', 'I'),
(13, 'X', 'TO', 'Teknik Otomotif', 'I'),
(14, 'XI', 'TO', 'Teknik Otomotif', 'I'),
(15, 'XII', 'TO', 'Teknik Otomotif', 'I'),
(16, 'X', 'TJKT', 'Teknik Jaringan Komputer dan Telekomunikasi', 'I'),
(17, 'XI', 'TJKT', 'Teknik Jaringan Komputer dan Telekomunikasi', 'I'),
(18, 'XII', 'TJKT', 'Teknik Jaringan Komputer dan Telekomunikasi', 'I'),
(19, 'X', 'RPL', 'Pengembangan Perangkat Lunak dan Gim', 'I'),
(20, 'XI', 'RPL', 'Pengembangan Perangkat Lunak dan Gim', 'I'),
(21, 'XII', 'RPL', 'Pengembangan Perangkat Lunak dan Gim', 'I'),
(22, 'X', 'TKI', 'Teknik Kimia Industri', 'I'),
(23, 'XI', 'TKI', 'Teknik Kimia Industri', 'I'),
(24, 'XII', 'TKI', 'Teknik Kimia Industri', 'I'),
(25, 'X', 'TE', 'Teknik Elektronika', 'I'),
(26, 'XI', 'TE', 'Teknik Elektronika', 'I'),
(27, 'XII', 'TE', 'Teknik Elektronika', 'I');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `kode_mapel` varchar(1024) DEFAULT NULL,
  `nama_mapel` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `tugas` int(11) DEFAULT NULL,
  `ulangan` int(11) DEFAULT NULL,
  `uts` int(11) DEFAULT NULL,
  `uas` int(11) DEFAULT NULL,
  `nilai_akhir` int(11) DEFAULT NULL,
  `capaian_kompetensi` varchar(999) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `username` varchar(1024) DEFAULT NULL,
  `password` varchar(1024) DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `nama_siswa` varchar(1024) DEFAULT NULL,
  `tgl_lahir_siswa` date DEFAULT NULL,
  `jk_siswa` enum('Pria','Wanita') DEFAULT NULL,
  `tlp_siswa` varchar(20) DEFAULT NULL,
  `alamat_siswa` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `siswa`
--
DELIMITER $$
CREATE TRIGGER `tsiswa` AFTER INSERT ON `siswa` FOR EACH ROW replace into user (id_user,id_siswa,username,password) (select null as id_user,id_siswa,nis as username,MD5(nis) as password from siswa)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `username` varchar(1024) DEFAULT NULL,
  `password` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_guru`, `id_siswa`, `username`, `password`) VALUES
(5, NULL, NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vabsensi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vabsensi` (
`id_absen_siswa` int(11)
,`id_mapel` int(11)
,`id_siswa` int(11)
,`hadir` int(11)
,`izin` int(11)
,`sakit` int(11)
,`alpha` int(11)
,`id_guru` int(11)
,`kode_mapel` varchar(1024)
,`nama_mapel` varchar(1024)
,`id_jurusan` int(11)
,`username_siswa` varchar(1024)
,`nis` varchar(20)
,`nama_siswa` varchar(1024)
,`tgl_lahir_siswa` date
,`jk_siswa` enum('Pria','Wanita')
,`tlp_siswa` varchar(20)
,`alamat_siswa` varchar(1024)
,`username_guru` varchar(1024)
,`nama_guru` varchar(1024)
,`nip` varchar(20)
,`jk_guru` enum('Pria','Wanita')
,`kelas_jurusan` enum('X','XI','XII')
,`kode_jurusan` varchar(1024)
,`nama_jurusan` varchar(1024)
,`ruang_jurusan` varchar(1024)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vjadwal`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vjadwal` (
`id_jadwal` int(11)
,`id_jurusan` int(11)
,`id_mapel` int(11)
,`hari` enum('Senin','Selasa','Rabu','Kamis','Jumat')
,`jam_mulai` time
,`jam_selesai` time
,`kelas_jurusan` enum('X','XI','XII')
,`kode_jurusan` varchar(1024)
,`nama_jurusan` varchar(1024)
,`ruang_jurusan` varchar(1024)
,`id_guru` int(11)
,`kode_mapel` varchar(1024)
,`nama_mapel` varchar(1024)
,`username_guru` varchar(1024)
,`nama_guru` varchar(1024)
,`nip` varchar(20)
,`jk_guru` enum('Pria','Wanita')
,`tgl_lahir_guru` date
,`tlp_guru` varchar(20)
,`alamat_guru` varchar(1024)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vmapel`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vmapel` (
`id_mapel` int(11)
,`id_guru` int(11)
,`kode_mapel` varchar(1024)
,`nama_mapel` varchar(1024)
,`username` varchar(1024)
,`nama_guru` varchar(1024)
,`nip` varchar(20)
,`jk_guru` enum('Pria','Wanita')
,`tgl_lahir_guru` date
,`tlp_guru` varchar(20)
,`alamat_guru` varchar(1024)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vnilai`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vnilai` (
`id_nilai` int(11)
,`id_jurusan` int(11)
,`id_mapel` int(11)
,`id_siswa` int(11)
,`tugas` int(11)
,`ulangan` int(11)
,`uts` int(11)
,`uas` int(11)
,`nilai_akhir` int(11)
,`capaian_kompetensi` varchar(999)
,`kelas_jurusan` enum('X','XI','XII')
,`kode_jurusan` varchar(1024)
,`nama_jurusan` varchar(1024)
,`ruang_jurusan` varchar(1024)
,`id_guru` int(11)
,`kode_mapel` varchar(1024)
,`nama_mapel` varchar(1024)
,`username_guru` varchar(1024)
,`nama_guru` varchar(1024)
,`nip` varchar(20)
,`jk_guru` enum('Pria','Wanita')
,`nis` varchar(20)
,`username_siswa` varchar(1024)
,`nama_siswa` varchar(1024)
,`tgl_lahir_siswa` date
,`jk_siswa` enum('Pria','Wanita')
,`tlp_siswa` varchar(20)
,`alamat_siswa` varchar(1024)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vsiswa`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vsiswa` (
`id_siswa` int(11)
,`id_jurusan` int(11)
,`username` varchar(1024)
,`password` varchar(1024)
,`nis` varchar(20)
,`nama_siswa` varchar(1024)
,`tgl_lahir_siswa` date
,`jk_siswa` enum('Pria','Wanita')
,`tlp_siswa` varchar(20)
,`alamat_siswa` varchar(1024)
,`kelas_jurusan` enum('X','XI','XII')
,`kode_jurusan` varchar(1024)
,`nama_jurusan` varchar(1024)
,`ruang_jurusan` varchar(1024)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vabsensi`
--
DROP TABLE IF EXISTS `vabsensi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vabsensi`  AS  select `absen_siswa`.`id_absen_siswa` AS `id_absen_siswa`,`absen_siswa`.`id_mapel` AS `id_mapel`,`absen_siswa`.`id_siswa` AS `id_siswa`,`absen_siswa`.`hadir` AS `hadir`,`absen_siswa`.`izin` AS `izin`,`absen_siswa`.`sakit` AS `sakit`,`absen_siswa`.`alpha` AS `alpha`,`mapel`.`id_guru` AS `id_guru`,`mapel`.`kode_mapel` AS `kode_mapel`,`mapel`.`nama_mapel` AS `nama_mapel`,`siswa`.`id_jurusan` AS `id_jurusan`,`siswa`.`username` AS `username_siswa`,`siswa`.`nis` AS `nis`,`siswa`.`nama_siswa` AS `nama_siswa`,`siswa`.`tgl_lahir_siswa` AS `tgl_lahir_siswa`,`siswa`.`jk_siswa` AS `jk_siswa`,`siswa`.`tlp_siswa` AS `tlp_siswa`,`siswa`.`alamat_siswa` AS `alamat_siswa`,`guru`.`username` AS `username_guru`,`guru`.`nama_guru` AS `nama_guru`,`guru`.`nip` AS `nip`,`guru`.`jk_guru` AS `jk_guru`,`jurusan`.`kelas_jurusan` AS `kelas_jurusan`,`jurusan`.`kode_jurusan` AS `kode_jurusan`,`jurusan`.`nama_jurusan` AS `nama_jurusan`,`jurusan`.`ruang_jurusan` AS `ruang_jurusan` from ((((`absen_siswa` join `mapel` on((`absen_siswa`.`id_mapel` = `mapel`.`id_mapel`))) join `guru` on((`mapel`.`id_guru` = `guru`.`id_guru`))) join `siswa` on((`absen_siswa`.`id_siswa` = `siswa`.`id_siswa`))) join `jurusan` on((`siswa`.`id_jurusan` = `jurusan`.`id_jurusan`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vjadwal`
--
DROP TABLE IF EXISTS `vjadwal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vjadwal`  AS  select `jadwal`.`id_jadwal` AS `id_jadwal`,`jadwal`.`id_jurusan` AS `id_jurusan`,`jadwal`.`id_mapel` AS `id_mapel`,`jadwal`.`hari` AS `hari`,`jadwal`.`jam_mulai` AS `jam_mulai`,`jadwal`.`jam_selesai` AS `jam_selesai`,`jurusan`.`kelas_jurusan` AS `kelas_jurusan`,`jurusan`.`kode_jurusan` AS `kode_jurusan`,`jurusan`.`nama_jurusan` AS `nama_jurusan`,`jurusan`.`ruang_jurusan` AS `ruang_jurusan`,`mapel`.`id_guru` AS `id_guru`,`mapel`.`kode_mapel` AS `kode_mapel`,`mapel`.`nama_mapel` AS `nama_mapel`,`guru`.`username` AS `username_guru`,`guru`.`nama_guru` AS `nama_guru`,`guru`.`nip` AS `nip`,`guru`.`jk_guru` AS `jk_guru`,`guru`.`tgl_lahir_guru` AS `tgl_lahir_guru`,`guru`.`tlp_guru` AS `tlp_guru`,`guru`.`alamat_guru` AS `alamat_guru` from (((`jadwal` join `jurusan` on((`jadwal`.`id_jurusan` = `jurusan`.`id_jurusan`))) join `mapel` on((`jadwal`.`id_mapel` = `mapel`.`id_mapel`))) join `guru` on((`mapel`.`id_guru` = `guru`.`id_guru`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vmapel`
--
DROP TABLE IF EXISTS `vmapel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vmapel`  AS  select `mapel`.`id_mapel` AS `id_mapel`,`mapel`.`id_guru` AS `id_guru`,`mapel`.`kode_mapel` AS `kode_mapel`,`mapel`.`nama_mapel` AS `nama_mapel`,`guru`.`username` AS `username`,`guru`.`nama_guru` AS `nama_guru`,`guru`.`nip` AS `nip`,`guru`.`jk_guru` AS `jk_guru`,`guru`.`tgl_lahir_guru` AS `tgl_lahir_guru`,`guru`.`tlp_guru` AS `tlp_guru`,`guru`.`alamat_guru` AS `alamat_guru` from (`mapel` join `guru` on((`mapel`.`id_guru` = `guru`.`id_guru`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vnilai`
--
DROP TABLE IF EXISTS `vnilai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vnilai`  AS  select `nilai`.`id_nilai` AS `id_nilai`,`nilai`.`id_jurusan` AS `id_jurusan`,`nilai`.`id_mapel` AS `id_mapel`,`nilai`.`id_siswa` AS `id_siswa`,`nilai`.`tugas` AS `tugas`,`nilai`.`ulangan` AS `ulangan`,`nilai`.`uts` AS `uts`,`nilai`.`uas` AS `uas`,`nilai`.`nilai_akhir` AS `nilai_akhir`,`nilai`.`capaian_kompetensi` AS `capaian_kompetensi`,`jurusan`.`kelas_jurusan` AS `kelas_jurusan`,`jurusan`.`kode_jurusan` AS `kode_jurusan`,`jurusan`.`nama_jurusan` AS `nama_jurusan`,`jurusan`.`ruang_jurusan` AS `ruang_jurusan`,`mapel`.`id_guru` AS `id_guru`,`mapel`.`kode_mapel` AS `kode_mapel`,`mapel`.`nama_mapel` AS `nama_mapel`,`guru`.`username` AS `username_guru`,`guru`.`nama_guru` AS `nama_guru`,`guru`.`nip` AS `nip`,`guru`.`jk_guru` AS `jk_guru`,`siswa`.`nis` AS `nis`,`siswa`.`username` AS `username_siswa`,`siswa`.`nama_siswa` AS `nama_siswa`,`siswa`.`tgl_lahir_siswa` AS `tgl_lahir_siswa`,`siswa`.`jk_siswa` AS `jk_siswa`,`siswa`.`tlp_siswa` AS `tlp_siswa`,`siswa`.`alamat_siswa` AS `alamat_siswa` from ((((`nilai` join `jurusan` on((`nilai`.`id_jurusan` = `jurusan`.`id_jurusan`))) join `mapel` on((`nilai`.`id_mapel` = `mapel`.`id_mapel`))) join `siswa` on((`nilai`.`id_siswa` = `siswa`.`id_siswa`))) join `guru` on((`mapel`.`id_guru` = `guru`.`id_guru`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vsiswa`
--
DROP TABLE IF EXISTS `vsiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vsiswa`  AS  select `siswa`.`id_siswa` AS `id_siswa`,`siswa`.`id_jurusan` AS `id_jurusan`,`siswa`.`username` AS `username`,`siswa`.`password` AS `password`,`siswa`.`nis` AS `nis`,`siswa`.`nama_siswa` AS `nama_siswa`,`siswa`.`tgl_lahir_siswa` AS `tgl_lahir_siswa`,`siswa`.`jk_siswa` AS `jk_siswa`,`siswa`.`tlp_siswa` AS `tlp_siswa`,`siswa`.`alamat_siswa` AS `alamat_siswa`,`jurusan`.`kelas_jurusan` AS `kelas_jurusan`,`jurusan`.`kode_jurusan` AS `kode_jurusan`,`jurusan`.`nama_jurusan` AS `nama_jurusan`,`jurusan`.`ruang_jurusan` AS `ruang_jurusan` from (`siswa` join `jurusan` on((`siswa`.`id_jurusan` = `jurusan`.`id_jurusan`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen_siswa`
--
ALTER TABLE `absen_siswa`
  ADD PRIMARY KEY (`id_absen_siswa`),
  ADD KEY `FK_absen_siswa_ibfk_1` (`id_mapel`),
  ADD KEY `FK_absen_siswa_ibfk_2` (`id_siswa`),
  ADD KEY `FK_absen_siswa_ibfk_3` (`id_jurusan`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `FK_jadwal_ibfk_1` (`id_jurusan`),
  ADD KEY `FK_jadwal_ibfk_2` (`id_mapel`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `FK_guru_ibfk_1` (`id_guru`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `FK_nilai_ibfk_1` (`id_siswa`),
  ADD KEY `FK_nilai_ibfk_2` (`id_mapel`),
  ADD KEY `FK_nilai_ibfk_3` (`id_jurusan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `FK_siswa_ibfk_1` (`id_jurusan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `FK_user_ibfk_2` (`id_guru`),
  ADD KEY `FK_user_ibfk_1` (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen_siswa`
--
ALTER TABLE `absen_siswa`
  MODIFY `id_absen_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2578;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=609;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absen_siswa`
--
ALTER TABLE `absen_siswa`
  ADD CONSTRAINT `FK_absen_siswa_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absen_siswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `FK_jadwal_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_jadwal_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `FK_nilai_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_nilai_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `FK_siswa_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
