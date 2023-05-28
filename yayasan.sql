-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2021 at 06:49 AM
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
-- Database: `yayasan`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `gambar`, `deskripsi`) VALUES
(60, 'Kegiatan Paskibraka', '1630471360_44af87b87d945539b6d0.jpeg', 'Kegiatan Paskibra'),
(61, 'Kegiatan Pramuka', 'Pramuka.jpeg', 'Kegiatan Pramuka'),
(62, 'Kegiatan Futsal', '1630471442_7a80588291bfc46f55f8.jpeg', 'Kegiatan Futsal Rutin'),
(63, 'Kegiatan Sanggar Seni', 'SanggarSeni.jpeg', 'Kegiatan Sanggar Seni Rutin'),
(64, 'Fasilitas Lab Komputer', 'LabKom1.jpeg', 'Fasilitas Lab Komputer Yang tersedia'),
(65, 'Perpustakaan ', 'Perpustakaan.jpeg', 'Fasilitas Perpustakaan Yang Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakulikuler`
--

CREATE TABLE `ekstrakulikuler` (
  `id` int(11) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ekstrakulikuler`
--

INSERT INTO `ekstrakulikuler` (`id`, `slug`, `judul`, `deskripsi`, `gambar`) VALUES
(1, 'osis', 'OSIS', 'Osis adalah .....', '');

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
(1, 'lab-komputer', 'Lab Komputer', 'Ini hanya', '1.jpg_gray.jpg'),
(2, 'perpustakaan', 'Perpustakaan', 'Ini perpus', '1.jpg_negasi.jpg'),
(3, 'sarana-ibadah', 'Sarana Ibadah', 'Mesjid', '1.jpg_crop.jpg'),
(4, 'sarana-olahraga', 'Sarana Olahraga', 'adfasfsaf afdsa  afda ', '');

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
(1, 'KepalaSekolah.jpeg', 'Sambutan\r\nPuji syukur kami panjatkan ke hadirat Allah SWT atas karunia dan hidayah-Nya, sehingga kita semua dapat membaktikan segala hal yang kita miliki untuk kemajuan dunia pendidikan. Apapun bentuk dan sumbangsih yang kita berikan, jika dilandasi niat yang tulus tanpa memandang imbalan apapun akan menghasilkan mahakarya yang agung untuk bekal kita dan generasi setelah kita. Pendidikan adalah harga mati untuk menjadi pondasi bangsa dan negara dalam menghadapi perkembangan zaman.\r\n\r\nHal ini seiring dengan penguasaan teknologi untuk dimanfaatkan sebaik mungkin, sehingga menciptakan iklim kondusif dalam ranah keilmuan. Dengan konsep yang kontekstual dan efektif, kami mengejewantahkan nilai-nilai pendidikan yang tertuang dalam visi misi MTs Al-Mu\'min Kecamatan Pasirwangi, sebagai panduan hukum dalam menjabarkan tujuan hakiki pendidikan.\"\"');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `notelp` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `lokasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `notelp`, `email`, `lokasi`) VALUES
(1, '+62 852-2119-3385', 'mtssalmu39min@yahoo.com', 'Pasirwangi');

-- --------------------------------------------------------

--
-- Table structure for table `sambutan`
--

CREATE TABLE `sambutan` (
  `id` int(11) NOT NULL,
  `judul` varchar(70) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sambutan`
--

INSERT INTO `sambutan` (`id`, `judul`, `gambar`, `deskripsi`) VALUES
(1, 'Sambutan Ketua Yayasan Pendidikan Islam   Al - Mu\'min', '1630470006_87379f412e54465f171b.jpg', 'Sambutan Puji syukur kami panjatkan ke hadirat Allah SWT atas karunia dan hidayah-Nya, sehingga kita semua dapat membaktikan segala hal yang kita miliki untuk kemajuan dunia pendidikan. Apapun bentuk dan sumbangsih yang kita berikan, jika dilandasi niat\"\"');

-- --------------------------------------------------------

--
-- Table structure for table `tenagaadministrasi`
--

CREATE TABLE `tenagaadministrasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `bagian` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenagaadministrasi`
--

INSERT INTO `tenagaadministrasi` (`id`, `nama`, `bagian`) VALUES
(1, 'August Nugraha', 'Operator\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tentangkami`
--

CREATE TABLE `tentangkami` (
  `id` int(11) NOT NULL,
  `judul` varchar(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tentangkami`
--

INSERT INTO `tentangkami` (`id`, `judul`, `gambar`, `deskripsi`) VALUES
(1, 'Tentang Kami', '1630470111_c09c4e8686b9a97bd57c.jpeg', 'Sambutan\r\nPuji syukur kami panjatkan ke hadirat Allah SWT atas karunia dan hidayah-Nya, sehingga kita semua dapat membaktikan segala hal yang kita miliki untuk kemajuan dunia pendidikan. Apapun bentuk dan sumbangsih yang kita berikan, jika dilandasi niat yang tulus tanpa memandang imbalan apapun akan menghasilkan mahakarya yang agung untuk bekal kita dan generasi setelah kita. Pendidikan adalah harga mati untuk menjadi pondasi bangsa dan negara dalam menghadapi perkembangan zaman.\r\n\r\nHal ini seiring dengan penguasaan teknologi untuk dimanfaatkan sebaik mungkin, sehingga menciptakan iklim kondusif dalam ranah keilmuan. Dengan konsep yang kontekstual dan efektif, kami mengejewantahkan nilai-nilai pendidikan yang tertuang dalam visi misi MTs Al-Mu\'min Kecamatan Pasirwangi, sebagai panduan hukum dalam menjabarkan tujuan hakiki pendidikan.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', '1'),
(2, 'guru', 'guru', '2'),
(3, 'siswa', 'siswa', '3');

-- --------------------------------------------------------

--
-- Table structure for table `visimisi`
--

CREATE TABLE `visimisi` (
  `id` int(11) NOT NULL,
  `visi` varchar(70) NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visimisi`
--

INSERT INTO `visimisi` (`id`, `visi`, `misi`) VALUES
(1, '\"TERDEPAN DALAM BERPRESTASI SERTA MENGUTAMAKAN AKHLAK\"', '1. Menciptakan tercapainya meningkatkan mutu dan efesiensi pendidikan, membina prestasi pendidikan dengan dilandasi semangat keteladanan dan ukuwah islamiah\r\n2. Menumbuhkembangkan lingkungan dan perilaku religius sehingga peserta didik dapat mengamalkan dan menghayati ajaran slam secara kaffah\r\n3. Melaksanakan proses pembelajaran PAIKEM (Pembelajaran Aktif Inovatif Kreatif Efektif dan Menyenangkan) atau CTL, (Belajar Mengajar Kontekstual)\r\n4. Mewujudkan peningkatan prestasi lulusan\r\n5. Mengembangkan silaturahmi baik di dalam maupun di luar lingkungan lembaga\r\n6. Memberikan pelayanan prima bagi seluruh stake holder\r\n7. Mengembangkan budaya disiplin kerja dan profesionalisme\r\n8. Menjalin mitra kerja dengan pertimbangan prinsip kekeluargaan dan kebersarnaan serta rasa memiliki\r\n9. Menciptakan media Pembelajaran yang berbasis apektif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `kepalasekolah`
--
ALTER TABLE `kepalasekolah`
  ADD PRIMARY KEY (`id_kepsek`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sambutan`
--
ALTER TABLE `sambutan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenagaadministrasi`
--
ALTER TABLE `tenagaadministrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tentangkami`
--
ALTER TABLE `tentangkami`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visimisi`
--
ALTER TABLE `visimisi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kepalasekolah`
--
ALTER TABLE `kepalasekolah`
  MODIFY `id_kepsek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sambutan`
--
ALTER TABLE `sambutan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tenagaadministrasi`
--
ALTER TABLE `tenagaadministrasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tentangkami`
--
ALTER TABLE `tentangkami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visimisi`
--
ALTER TABLE `visimisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
