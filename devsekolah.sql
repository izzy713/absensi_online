-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 12:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devsekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(10) NOT NULL,
  `id_siswa` varchar(12) NOT NULL,
  `flag_absen` char(1) NOT NULL COMMENT 'ABSENPAGI',
  `tanggal_absen` datetime NOT NULL DEFAULT current_timestamp() COMMENT '08:00',
  `status_kehadiran` enum('Hadir','Tidak Hadir','Sakit','Izin','Alfa') NOT NULL,
  `lokasi_lat` varchar(255) NOT NULL,
  `lokasi_long` varchar(255) NOT NULL,
  `Keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absen`, `id_siswa`, `flag_absen`, `tanggal_absen`, `status_kehadiran`, `lokasi_lat`, `lokasi_long`, `Keterangan`) VALUES
(1, '1234567890', 'M', '2024-06-10 11:30:45', 'Sakit', '', '', ''),
(2, '01', 'M', '2024-06-10 01:08:18', 'Alfa', '', '', ''),
(3, '0987654321', 'M', '2024-06-10 19:10:03', 'Hadir', '892657892657896', '6347826597834678953', '');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` varchar(10) NOT NULL,
  `nama` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama`) VALUES
('14657864', 'Farhan SKOM'),
('5327869073', 'yandra'),
('8904576893', 'Surya');

-- --------------------------------------------------------

--
-- Table structure for table `izin_absen`
--

CREATE TABLE `izin_absen` (
  `id_data_izin` int(11) NOT NULL,
  `id_orang_tua` varchar(10) NOT NULL,
  `desc_izin` varchar(255) NOT NULL,
  `dokumen_pendukung` varchar(255) NOT NULL,
  `status_izin` enum('Sakit','Izin','Alfa','') NOT NULL,
  `izin_cdate` datetime NOT NULL DEFAULT current_timestamp(),
  `izin_cuser` varchar(10) NOT NULL COMMENT 'user yang membuat (user login)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `izin_absen`
--

INSERT INTO `izin_absen` (`id_data_izin`, `id_orang_tua`, `desc_izin`, `dokumen_pendukung`, `status_izin`, `izin_cdate`, `izin_cuser`) VALUES
(1, 'ORT001', 'Sakit', 'Surat dokter.pdf', 'Sakit', '2024-06-10 14:40:16', ''),
(2, 'ORT002', 'Acara keluarga', '', 'Alfa', '2024-06-10 18:07:35', '');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(25) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `tingkat` varchar(2) NOT NULL,
  `jurusan` varchar(10) NOT NULL,
  `sub_kelas` int(1) NOT NULL,
  `id_guru` varchar(10) DEFAULT NULL,
  `id_sekolah` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `tingkat`, `jurusan`, `sub_kelas`, `id_guru`, `id_sekolah`) VALUES
('1', '10 TKJ 1', '10', 'TKJ', 1, '14657864', 'SKL001'),
('2', '10 TKR 1', '10', 'TKR', 1, '14657864', 'SKL002');

-- --------------------------------------------------------

--
-- Table structure for table `orang_tua`
--

CREATE TABLE `orang_tua` (
  `id_orang_tua` varchar(25) NOT NULL,
  `nama_orang_tua` varchar(40) NOT NULL,
  `email` varchar(25) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orang_tua`
--

INSERT INTO `orang_tua` (`id_orang_tua`, `nama_orang_tua`, `email`, `nomor_telepon`) VALUES
('ORT001', 'Harman Kardon', 'harman.kardon@gmail.com', '081236493678'),
('ORT002', 'Jeff Bezos', 'Jeff.bezkui@gmail.com', '08123647863'),
('ORT003', 'Najashi', 'najashi@gmail.comdone', '0127894123'),
('ORT005', 'Hadi', 'hadi@gmail.com', '0863567153'),
('ORT006', 'abc', 'abc@gmail.com', '97128964');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` varchar(6) NOT NULL,
  `nama_sekolah` varchar(40) NOT NULL,
  `alamat_sekolah` varchar(255) NOT NULL,
  `lokasi_lat` varchar(255) NOT NULL,
  `lokasi_long` varchar(255) NOT NULL,
  `sekolah_cuser` int(10) DEFAULT NULL,
  `sekolah_cdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nama_sekolah`, `alamat_sekolah`, `lokasi_lat`, `lokasi_long`, `sekolah_cuser`, `sekolah_cdate`) VALUES
('SKL001', 'SMK Negeri 1 Depok', 'Jalan Taposs', '6782364915', '123647896502134', 1, '2024-05-06 21:54:42'),
('SKL002', 'SMK Negeri 2 Depok', 'Jalan Raya Sawangan', '1273864798', '6967932649165', 2, '2024-05-06 21:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` varchar(12) NOT NULL COMMENT 'NIS',
  `nama_siswa` varchar(40) NOT NULL,
  `id_orang_tua` varchar(25) DEFAULT NULL,
  `id_kelas` varchar(25) DEFAULT NULL,
  `nisn` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `id_orang_tua`, `id_kelas`, `nisn`) VALUES
('01', 'test bisa', 'ORT002', '1', '0012'),
('0987654321', 'Willy Wonka', 'ORT002', '1', '86784517925344'),
('1234567890', 'Adit Zonasi', 'ORT001', '2', '567834916723'),
('12589745087', 'Rizky', 'ORT002', '2', '137489057432'),
('65784296', 'Hardi Susanto', 'ORT002', '2', '94758969245');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'user', 'user', 'user'),
(2, 'admin', 'admin', 'admin'),
(14, 'admintest', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(15, 'gurutest', '77e69c137812518e359196bb2f5e9bb9', 'guru'),
(16, 'abc', '81dc9bdb52d04dc20036dbd8313ed055', 'orangtua'),
(17, '5327869073250', '81dc9bdb52d04dc20036dbd8313ed055', 'guru'),
(18, '12589745087', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `izin_absen`
--
ALTER TABLE `izin_absen`
  ADD PRIMARY KEY (`id_data_izin`),
  ADD KEY `id_orang_tua` (`id_orang_tua`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_sekolah` (`id_sekolah`);

--
-- Indexes for table `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD PRIMARY KEY (`id_orang_tua`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`),
  ADD KEY `sekolah_cuser` (`sekolah_cuser`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_orang_tua` (`id_orang_tua`),
  ADD KEY `kelas` (`id_kelas`),
  ADD KEY `kelas_2` (`id_kelas`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `izin_absen`
--
ALTER TABLE `izin_absen`
  MODIFY `id_data_izin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `kelas_ibfk_3` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`);

--
-- Constraints for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD CONSTRAINT `sekolah_ibfk_1` FOREIGN KEY (`sekolah_cuser`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_orang_tua`) REFERENCES `orang_tua` (`id_orang_tua`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
