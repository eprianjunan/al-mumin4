-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2021 at 07:36 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yayasan6`
--

-- --------------------------------------------------------

--
-- Table structure for table `akunguru`
--

CREATE TABLE `akunguru` (
  `guru_id` int(15) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `nip` int(15) NOT NULL,
  `matpel` varchar(30) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akunguru`
--

INSERT INTO `akunguru` (`guru_id`, `nama_guru`, `nip`, `matpel`, `level`) VALUES
(56, 'pengajar1', 2131, '1', 3),
(57, 'pengajar', 23412, '2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `akunsiswa`
--

CREATE TABLE `akunsiswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `nis` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akunsiswa`
--

INSERT INTO `akunsiswa` (`id_siswa`, `nama_siswa`, `nis`, `kelas`, `level`) VALUES
(43, 'siswa', 432231, '3', 2),
(44, 'siswa1', 3410, '5', 2);

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `slug_berita` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `gambar`, `deskripsi`, `slug_berita`) VALUES
(40, 'Kegiatan Bakti Sosial', '1630980392_1253ccdfe9fdf1405694.jpeg', 'Kegiatan sosialisasi ', 'kegiatan-bakti-sosial'),
(42, 'Kegiatan Belajar Mengajar', '1630980399_bcf353cbda65b965de04.jpeg', 'Kegiatan Belajar Mengajar', 'kegiatan-belajar-mengajar'),
(43, 'Pertemuan Orang Tua', '1630980410_4fb8befebfd30225cef3.jpeg', 'Pertemuan Orang Tua', 'pertemuan-orang-tua'),
(45, 'Kegiatan Paskibraka', '1630980420_1662f658d2a2047c6ac6.jpeg', 'Kegiatan Paskibra', 'kegiatan-paskibraka');

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakulikuler`
--

CREATE TABLE `ekstrakulikuler` (
  `id_ekstrakulikuler` int(11) NOT NULL,
  `slug_ekstrakulikuler` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ekstrakulikuler`
--

INSERT INTO `ekstrakulikuler` (`id_ekstrakulikuler`, `slug_ekstrakulikuler`, `judul`, `deskripsi`, `gambar`) VALUES
(2, 'sanggar-seni', 'Sanggar Seni', 'Sanggar Seni Yayasan Pendidikan Islam Al - Mu\'min\r\n', 'SanggarSeni.jpeg'),
(3, 'futsal', 'Futsal', 'Kegiatan Futsal Yayasan Pendidikan Islam Al - Mu\'min', 'Futsal_1.jpeg'),
(4, 'paskibra', 'Paskibra', 'Kegiatan Paskibra Yayasan Pendidikan Islam Al - Mu \' min', 'Paskibra.jpeg'),
(5, 'pramuka', 'Pramuka', 'Kegiatan Pramuka Yayasan Pendidikan Islam Al - Mu\'min', 'Pramuka_1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `slug_fasilitas` varchar(50) NOT NULL,
  `judul_fasilitas` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `slug_fasilitas`, `judul_fasilitas`, `deskripsi`, `gambar`) VALUES
(1, 'lab-komputer', 'Lab Komputer', 'Ini hanya', '1630980160_6d3fd89043b9c8319ca3.jpeg'),
(2, 'perpustakaan', 'Perpustakaan', 'Ini perpus', '1630980168_ce6a2088786cd32a2f50.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `id_nip` varchar(35) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gurumapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `id_nip`, `nama`, `gurumapel`) VALUES
(1, '121232050167160020', 'AHMAD MUSTOFA, SE.SY', 'Guru Mapel NONPSN'),
(13, '8953748650200042 121232050167120009', 'ASEP ISNAENI, S.PD.', 'Guru Mapel N/A'),
(14, '2543740645300002 196101201990032001', 'DRA DRA. HJ. ANI HANIFAH, MMPD, MMPD', 'Guru Mapel NONPSN'),
(15, '4251742644300063 121232050167090012', 'DRA. ILA JAMILAH RAHAYUNINGSIH', 'Guru Mapel N/A'),
(16, '2341744647300063 121232050167290006', 'DRA. ROHIDAH', 'Guru Mapel N/A'),
(17, '4138745648200063 121232050167040003', 'DRS. H. DONO DARSONO G', 'Guru Mapel N/A'),
(18, '0847747650200092 121232050167030015', 'ENDANG BADRU JAMAN, S.AG. ', 'Guru Mapel N/A');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(45) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `parent_id`) VALUES
(1, 'VII-A', NULL),
(2, 'VII-B', NULL),
(3, 'VIII-A', NULL),
(4, 'VIII-B', NULL),
(5, 'IX-A', NULL),
(6, 'IX-B', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id_kelassiswa` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id_kelassiswa`, `siswa_id`, `kelas_id`) VALUES
(15, 39, 1),
(17, 41, 1),
(1, 19, 2),
(16, 40, 3),
(19, 43, 3),
(20, 44, 5);

-- --------------------------------------------------------

--
-- Table structure for table `kepalasekolah`
--

CREATE TABLE `kepalasekolah` (
  `id_kepsek` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kepalasekolah`
--

INSERT INTO `kepalasekolah` (`id_kepsek`, `gambar`, `deskripsi`) VALUES
(1, 'KepalaSekolah.jpeg', 'Sambutan\r\nPuji syukur kami panjatkan ke hadirat Allah SWT atas karunia dan hidayah-Nya, sehingga kita semua dapat membaktikan segala hal yang kita miliki untuk kemajuan dunia pendidikan. Apapun bentuk dan sumbangsih yang kita berikan, jika dilandasi niat yang tulus tanpa memandang imbalan apapun akan menghasilkan mahakarya yang agung untuk bekal kita dan generasi setelah kita. Pendidikan adalah harga mati untuk menjadi pondasi bangsa dan negara dalam menghadapi perkembangan zaman.\r\n\r\nHal ini seiring dengan penguasaan teknologi untuk dimanfaatkan sebaik mungkin, sehingga menciptakan iklim kondusif dalam ranah keilmuan. Dengan konsep yang kontekstual dan efektif, kami mengejewantahkan nilai-nilai pendidikan yang tertuang dalam visi misi MTs Al-Mu\'min Kecamatan Pasirwangi, sebagai panduan hukum dalam menjabarkan tujuan hakiki pendidikan.\"\"\"');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `notelp` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `lokasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `notelp`, `email`, `lokasi`) VALUES
(1, '+62 852-2119-3385', 'mtssalmu39min@yahoo.com', 'Pasirwangi');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`) VALUES
(1, 'Bahasa Indonesia'),
(2, 'Matematika'),
(9, 'B.Inggris'),
(10, 'Agama');

-- --------------------------------------------------------

--
-- Table structure for table `mapel_guru`
--

CREATE TABLE `mapel_guru` (
  `id_mapelguru` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `pengajar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel_guru`
--

INSERT INTO `mapel_guru` (`id_mapelguru`, `mapel_id`, `pengajar_id`) VALUES
(11, 1, 33),
(13, 1, 35),
(17, 1, 39),
(32, 1, 43),
(26, 1, 48),
(27, 1, 49),
(29, 1, 51),
(34, 1, 56),
(12, 2, 34),
(18, 2, 40),
(21, 2, 43),
(22, 2, 44),
(23, 2, 45),
(28, 2, 50),
(35, 2, 57),
(19, 9, 41),
(24, 9, 46),
(25, 9, 47),
(20, 10, 42),
(30, 10, 49),
(31, 10, 53);

-- --------------------------------------------------------

--
-- Table structure for table `mapel_kelas`
--

CREATE TABLE `mapel_kelas` (
  `id_mapelkelas` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel_kelas`
--

INSERT INTO `mapel_kelas` (`id_mapelkelas`, `mapel_id`, `kelas_id`) VALUES
(9, 1, 1),
(10, 2, 6),
(11, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `mapel_id` int(11) DEFAULT NULL,
  `pengajar_id` int(11) DEFAULT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `files` text DEFAULT NULL,
  `tgl_posting` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `mapel_id`, `pengajar_id`, `siswa_id`, `judul`, `deskripsi`, `files`, `tgl_posting`) VALUES
(7, 1, 56, NULL, 'hello', 'Hello', 'kisi-kisi uas metode numerik_1.docx', '2021-09-14 07:43:05'),
(8, 2, 53, NULL, 'Test', 'asasa', NULL, '2021-10-15 05:16:04'),
(11, 2, 57, NULL, 'lahh', 'deadaw', 'yayasan5.sql', '2021-10-14 23:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `materi_kelas`
--

CREATE TABLE `materi_kelas` (
  `id_materikelas` int(11) NOT NULL,
  `materi_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sambutan`
--

CREATE TABLE `sambutan` (
  `id_sambutan` int(11) NOT NULL,
  `judul` varchar(70) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sambutan`
--

INSERT INTO `sambutan` (`id_sambutan`, `judul`, `gambar`, `deskripsi`) VALUES
(1, 'Sambutan Ketua Yayasan Pendidikan Islam  Al - Mu\'min', '1630978764_184dbb849705e0710f67.jpg', 'Sambutan Puji syukur kami panjatkan ke hadirat Allah SWT atas karunia dan hidayah-Nya, sehingga kita semua dapat membaktikan segala hal yang kita miliki untuk kemajuan dunia pendidikan. Apapun bentuk dan sumbangsih yang kita berikan, jika dilandasi niat\"\"');

-- --------------------------------------------------------

--
-- Table structure for table `tenagaadministrasi`
--

CREATE TABLE `tenagaadministrasi` (
  `id_tenagaadministrasi` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `bagian` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenagaadministrasi`
--

INSERT INTO `tenagaadministrasi` (`id_tenagaadministrasi`, `nama`, `bagian`) VALUES
(1, 'August Nugraha', 'Operator\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tentangkami`
--

CREATE TABLE `tentangkami` (
  `id_tentangkami` int(11) NOT NULL,
  `judul` varchar(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tentangkami`
--

INSERT INTO `tentangkami` (`id_tentangkami`, `judul`, `gambar`, `deskripsi`) VALUES
(1, 'Tentang Kami', '1630980669_f89d0c3bd69128fe6ca4.jpeg', 'Sambutan\r\nPuji syukur kami panjatkan ke hadirat Allah SWT atas karunia dan hidayah-Nya, sehingga kita semua dapat membaktikan segala hal yang kita miliki untuk kemajuan dunia pendidikan. Apapun bentuk dan sumbangsih yang kita berikan, jika dilandasi niat yang tulus tanpa memandang imbalan apapun akan menghasilkan mahakarya yang agung untuk bekal kita dan generasi setelah kita. Pendidikan adalah harga mati untuk menjadi pondasi bangsa dan negara dalam menghadapi perkembangan zaman.\r\n\r\nHal ini seiring dengan penguasaan teknologi untuk dimanfaatkan sebaik mungkin, sehingga menciptakan iklim kondusif dalam ranah keilmuan. Dengan konsep yang kontekstual dan efektif, kami mengejewantahkan nilai-nilai pendidikan yang tertuang dalam visi misi MTs Al-Mu\'min Kecamatan Pasirwangi, sebagai panduan hukum dalam menjabarkan tujuan hakiki pendidikan.');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `mapel_id` int(11) DEFAULT NULL,
  `pengajar_id` int(11) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `file` text NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `durasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `mapel_id`, `pengajar_id`, `judul`, `deskripsi`, `file`, `tgl_buat`, `durasi`) VALUES
(3, NULL, NULL, 'MIPA', 'Kerjakan ya..', 'JADWAL PERWALIAN SEMESTER GANJIL 21-22_1.pdf', '2021-09-14 10:04:52', '2021-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) DEFAULT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `pengajar_id` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `deadline_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `siswa_id`, `pengajar_id`, `email`, `created_at`, `deadline_at`) VALUES
(1, 'mtsalmumin', 'b880e0ff0ceccf0d11537334a00567a1', 1, NULL, NULL, 'mtsalmumingrt@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'pengajar1', '9310f83135f238b04af729fec041cca8', 3, NULL, 56, NULL, '2021-10-12 09:51:10', '2022-04-10 09:51:10'),
(91, 'pengajar', '9310f83135f238b04af729fec041cca8', 3, NULL, 57, NULL, '2021-10-12 09:57:15', '2022-04-10 09:57:15'),
(92, 'siswa', '3afa0d81296a4f17d477ec823261b1ec', 2, 43, NULL, NULL, '2021-10-12 10:10:07', '2022-04-10 10:10:07'),
(93, 'siswa1', '3afa0d81296a4f17d477ec823261b1ec', 2, 44, NULL, NULL, '2021-10-12 10:14:25', '2022-04-10 10:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `visimisi`
--

CREATE TABLE `visimisi` (
  `id_visimisi` int(11) NOT NULL,
  `visi` varchar(70) NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visimisi`
--

INSERT INTO `visimisi` (`id_visimisi`, `visi`, `misi`) VALUES
(1, 'TERDEPAN DALAM BERPRESTASI SERTA MENGUTAMAKAN AKHLAK', '1. Menciptakan tercapainya meningkatkan mutu dan efesiensi pendidikan, membina prestasi pendidikan dengan dilandasi semangat keteladanan dan ukuwah islamiah\r\n2. Menumbuhkembangkan lingkungan dan perilaku religius sehingga peserta didik dapat mengamalkan dan menghayati ajaran slam secara kaffah\r\n3. Melaksanakan proses pembelajaran PAIKEM (Pembelajaran Aktif Inovatif Kreatif Efektif dan Menyenangkan) atau CTL, (Belajar Mengajar Kontekstual)\r\n4. Mewujudkan peningkatan prestasi lulusan\r\n5. Mengembangkan silaturahmi baik di dalam maupun di luar lingkungan lembaga\r\n6. Memberikan pelayanan prima bagi seluruh stake holder\r\n7. Mengembangkan budaya disiplin kerja dan profesionalisme\r\n8. Menjalin mitra kerja dengan pertimbangan prinsip kekeluargaan dan kebersarnaan serta rasa memiliki\r\n9. Menciptakan media Pembelajaran yang berbasis apektif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akunguru`
--
ALTER TABLE `akunguru`
  ADD PRIMARY KEY (`guru_id`);

--
-- Indexes for table `akunsiswa`
--
ALTER TABLE `akunsiswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `nis_2` (`nis`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  ADD PRIMARY KEY (`id_ekstrakulikuler`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD UNIQUE KEY `parent_id` (`parent_id`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id_kelassiswa`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `kelas_id` (`kelas_id`,`siswa_id`) USING BTREE;

--
-- Indexes for table `kepalasekolah`
--
ALTER TABLE `kepalasekolah`
  ADD PRIMARY KEY (`id_kepsek`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `mapel_guru`
--
ALTER TABLE `mapel_guru`
  ADD PRIMARY KEY (`id_mapelguru`),
  ADD KEY `pengajar_id` (`pengajar_id`),
  ADD KEY `mapel_id` (`mapel_id`,`pengajar_id`) USING BTREE;

--
-- Indexes for table `mapel_kelas`
--
ALTER TABLE `mapel_kelas`
  ADD PRIMARY KEY (`id_mapelkelas`),
  ADD KEY `mapel_id` (`mapel_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `mapel_id_2` (`mapel_id`),
  ADD KEY `pengajar_id_2` (`pengajar_id`),
  ADD KEY `siswa_id_2` (`siswa_id`);

--
-- Indexes for table `materi_kelas`
--
ALTER TABLE `materi_kelas`
  ADD PRIMARY KEY (`id_materikelas`),
  ADD KEY `materi_id` (`materi_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `sambutan`
--
ALTER TABLE `sambutan`
  ADD PRIMARY KEY (`id_sambutan`);

--
-- Indexes for table `tenagaadministrasi`
--
ALTER TABLE `tenagaadministrasi`
  ADD PRIMARY KEY (`id_tenagaadministrasi`);

--
-- Indexes for table `tentangkami`
--
ALTER TABLE `tentangkami`
  ADD PRIMARY KEY (`id_tentangkami`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mapel_id` (`mapel_id`),
  ADD KEY `pengajar_id` (`pengajar_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pengajar_id_2` (`pengajar_id`),
  ADD UNIQUE KEY `siswa_id_4` (`siswa_id`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `pengajar_id` (`pengajar_id`),
  ADD KEY `siswa_id_2` (`siswa_id`),
  ADD KEY `siswa_id_3` (`siswa_id`),
  ADD KEY `username` (`username`,`pengajar_id`,`siswa_id`) USING BTREE;

--
-- Indexes for table `visimisi`
--
ALTER TABLE `visimisi`
  ADD PRIMARY KEY (`id_visimisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akunguru`
--
ALTER TABLE `akunguru`
  MODIFY `guru_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `akunsiswa`
--
ALTER TABLE `akunsiswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  MODIFY `id_ekstrakulikuler` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id_kelassiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kepalasekolah`
--
ALTER TABLE `kepalasekolah`
  MODIFY `id_kepsek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mapel_guru`
--
ALTER TABLE `mapel_guru`
  MODIFY `id_mapelguru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `mapel_kelas`
--
ALTER TABLE `mapel_kelas`
  MODIFY `id_mapelkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `materi_kelas`
--
ALTER TABLE `materi_kelas`
  MODIFY `id_materikelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sambutan`
--
ALTER TABLE `sambutan`
  MODIFY `id_sambutan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tenagaadministrasi`
--
ALTER TABLE `tenagaadministrasi`
  MODIFY `id_tenagaadministrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tentangkami`
--
ALTER TABLE `tentangkami`
  MODIFY `id_tentangkami` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `visimisi`
--
ALTER TABLE `visimisi`
  MODIFY `id_visimisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
