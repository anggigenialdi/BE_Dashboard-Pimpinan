-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2022 at 09:50 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prod_suratonline_kotabdg`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_skpd`
--

CREATE TABLE `master_skpd` (
  `id` int(11) NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `kode_skpd` varchar(100) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telp` varchar(100) DEFAULT NULL,
  `faks` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `watermark` varchar(100) DEFAULT NULL,
  `kop_setda` tinyint(1) NOT NULL DEFAULT 0,
  `aktif` tinyint(1) NOT NULL DEFAULT 1,
  `dibuat_pada` datetime DEFAULT current_timestamp(),
  `dibuat_oleh` int(11) DEFAULT NULL,
  `diubah_pada` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `diubah_oleh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_skpd`
--

INSERT INTO `master_skpd` (`id`, `id_parent`, `kode_skpd`, `nama`, `alias`, `email`, `telp`, `faks`, `alamat`, `logo`, `watermark`, `kop_setda`, `aktif`, `dibuat_pada`, `dibuat_oleh`, `diubah_pada`, `diubah_oleh`) VALUES
(1, 261, '4.05.02-2', 'Dinas Kependudukan dan Pencatatan Sipil', 'Disdukcapil', 'disdukcapill@bandung.go.id', '0224209891', '0224209891', 'Jl. Ambon no 1b, Bandung Wetan, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:01:03', 1, '2021-10-25 15:22:48', 5815),
(2, 5, '4.05.02-3', 'Asisten Perekonomian dan Pembangunan', 'As-EkBang', 'prodekbangbdgl@gmail.com', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:01:03', 1, '2021-08-24 13:48:59', 5815),
(3, 5, '2', 'Asisten Administrasi Umum', 'AsistenUmum', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 0, '2018-07-06 19:27:39', 1, '2021-10-25 15:12:15', 5815),
(5, NULL, '4.05.02', 'Sekretariat Daerah', 'Setda', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-05-05 09:58:22', 5815),
(6, NULL, '4.05.05', 'Inspektorat Daerah', 'INSPEKTORAT', 'email@bandung.go.id', '0224231418', '0224231418', 'Jl. Tera No.20, Braga, Sumur Bandung, Kota Bandung, Jawa Barat 40111', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-05-10 09:18:53', 2267),
(7, NULL, '4.01.01', 'Badan Perencanaan Pembangunan, Penelitian dan Pengembangan', 'Bappelitbang', 'bappelitbang@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-05-10 09:17:20', 328),
(8, 100, '4.03.01', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'BKPSDM', 'bkpsdm@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-07-01 10:01:31', 5815),
(9, 100, '4.02.01', 'Badan Keuangan dan Aset Daerah', 'BKAD', 'dpkadbandung@gmail.com', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-10-22 15:13:40', 5815),
(10, NULL, '4.02.03', 'Badan Pendapatan Daerah', 'Bapenda', 'Watipjk@gmail.com', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-05-10 09:19:21', 7309),
(11, NULL, '4.05.06', 'Badan Kesatuan Bangsa dan Politik', 'Kesbangpol', 'kesbangpolbandungjuara@gmail.com', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-05-20 09:53:48', 7311),
(12, 2, '1.01.01', 'Dinas Pendidikan', 'DISDIK', 'disdik@bandung.go.id', '02227208007', '02227208007', 'Jl. Achmad Yani 239, Merdeka, Sumur Bandung, Kota Bandung, Jawa Barat 40117', '6093527711ec0.jpg', NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-07-08 14:41:33', 6185),
(13, 2, '1.02.01', 'Dinas Kesehatan', 'Dinkes', 'dinkes@bandung.go.id', '02224234793', '02224234793', 'Jl. Supratman No.73, Cihapit, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40114', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-07-08 14:41:33', 179),
(14, 2, '1.03.01', 'Dinas Pekerjaan Umum', 'DPU', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-07-08 14:41:33', 75),
(15, NULL, '1', 'Dinas Perumahan dan Kawasan Pemukiman, Pertanahan dan Pertamanan', 'DPKP3', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 0, '2018-07-06 19:27:39', 1, '2021-04-23 18:31:07', 1),
(16, 2, '1.06.01', 'Dinas Sosial', 'Dinsos', 'dinsos.bdg@bandung.go.id', '-', '-', 'Jl.Babakan Karet Belakang Rusunawa Rancacili Kelurahan Derwati Kecamatan Rancasari', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-05-06 09:24:23', 7315),
(17, NULL, '4', 'Dinas Tenaga Kerja', 'Disnaker', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 0, '2018-07-06 19:27:39', 1, '2021-04-24 02:55:13', 1),
(18, NULL, '0', 'Dinas Pemberdayaan Perempuan, Perlindungan Anak dan Pemerdayaan Masyarakat', 'DP3APM', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 0, '2018-07-06 19:27:39', 1, '2021-04-22 09:17:42', 1),
(19, 2, '2.02.01', 'Dinas Pengendalian Penduduk dan Keluarga Berencana', 'DPPKB', 'disppkb@gmail.com', '0227305023', '0227300640', 'Jl. Maskumambang No. 4 Kota Bandung, Jawa Barat 40264', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-07-08 14:41:33', 7321),
(20, NULL, '2.17.01', 'Dinas Arsip dan Perpustakaan', 'Disarpus', 'dispusip@bandung.go.id', '02224234793', '02224234793', 'Jl. Seram No. 2 Bandung', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-05-07 09:04:13', 2906),
(21, 2, '1.05.02', 'Dinas Kebakaran dan Penanggulangan Bencana', 'DKPB', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-07-08 14:41:33', 75),
(22, NULL, '1.05.01', 'Satuan Polisi Pamong Praja', 'Satpol.PP', 'satpolpp@bandung.go.id', '0227313276', '0227313276', 'Jl. R.A.A. Marta Negara No. 4 Kota Bandung 40264', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-05-10 09:14:23', 7906),
(23, NULL, '1.02.02', 'Rumah Sakit Umum Daerah', 'RSUD', 'rsudkotabandung@yahoo.com', '0227811794', '0227809581', 'Jl. Rumah Sakit No. 22 Kecamatan Cinambo Kelurahan Pakemitan 40294', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-05-10 09:19:02', 8484),
(24, NULL, '1.02.03', 'Rumah Sakit Khusus Ibu dan Anak', 'RSKIA', 'sekretariat@rskiakotabandung.com', '02286037777', '0225221531', 'Jl. K H. Wahid Hasyim No. 311 Bandung', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-05-10 09:19:03', 8482),
(25, NULL, '1.02.04', 'Rumah Sakit Khusus Gigi dan Mulut', 'RSKGM', 'rskgm.bandung@gmail.com', '0224234058', '0224234058', 'Jl. L.L.R.E. Martadinata No. 45 Bandung', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-05-10 09:18:54', 8485),
(26, 1, '4.05.02-2.5', 'Bagian Tata Pemerintahan Setda', 'Bag.Tapem', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 1, 1, '2018-07-06 19:27:39', 1, '2021-05-05 09:27:50', 7341),
(27, 1, '4.05.02-2.3516', 'Bagian Kesejahteraan Rakyat', 'Bag.Kesra', 'bag.kesmas@bandung.go.id', '02224234889', '02224234889', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 1, 1, '2018-07-06 19:27:39', 1, '2021-05-05 09:11:40', 7343),
(28, 1, '4.05.02-2.3102', 'Bagian Kerja Sama', 'Bagian Kerja Sama', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-23 02:39:14', 1),
(29, 3, '3', 'Bagian Hubungan Masyarakat', 'HUMAS', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 0, '2018-07-06 19:27:39', 1, '2021-04-23 18:33:20', 1),
(30, 2, '4.05.02-3.17', 'Bagian Perekonomian', 'Bag.Ek', 'bagianekonomi.bdg@gmail.com', '0224235180', '0224235180', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 1, 1, '2018-07-06 19:27:39', 1, '2021-05-05 09:14:12', 7347),
(31, NULL, '5', 'Bagian Program Desain dan Kualitas Pembangunan', 'Prodekbang', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-24 02:56:16', 1),
(32, 2, '2.03.01', 'Dinas Ketahanan Pangan dan Pertanian', 'DKPP', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-07-08 14:41:33', 1),
(33, 2, '2.05.01', 'Dinas Lingkungan Hidup dan Kebersihan', 'DLHK', 'dlhkkota@bandung.go.id', '022-2514327', '-', 'Jl. Sadang Tengah No.4&6, Sekeloa, Coblong, Kota Bandung, Jawa Barat 40133', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-07-08 14:41:33', 2455),
(34, NULL, '6', 'Dinas Kependudukan dan Catatan Sipil', 'DISDUKCAPIL', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 0, '2018-07-06 19:27:39', 1, '2021-04-24 02:56:48', 1),
(35, 35, '2.09.01', 'Dinas Perhubungan', 'Dishub', 'dishub@bandung.go.id', '02287509898', '02287509898', 'Jl.Pendamping SOR GBLA Kel.Rancabolang Kecamatan Gedebage Bandung', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-05-07 09:04:16', 7323),
(36, 2, '2.10.01', 'Dinas Komunikasi dan Informatika', 'DISKOMINFO', 'diskominfo@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', '5c175b62d803a.png', NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-07-16 15:56:27', 1),
(37, NULL, '7', 'Dinas Koperasi Usaha Mikro', 'Diskoum', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 0, '2018-07-06 19:27:39', 1, '2021-04-24 02:57:22', 1),
(38, 2, '3.06.01', 'Dinas Perdagangan dan Perindustrian', 'DISDAGIN', 'disdagin@bandung.go.id', '02224234793', '02224234793', 'Jl. Nuansa Mas Raya No. 2 Cipamokolan Bandung', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-07-08 14:41:33', 494),
(39, 2, '2.12.01', 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'DPMPTSP', 'dpmptsp@bandung.go.id', '0227217587', '0227217587', 'Jalan Cianjur No. 34 Bandung', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-07-08 14:41:33', 7327),
(40, NULL, '8', 'Dinas Pemuda dan Olah Raga', 'Dispora', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 0, '2018-07-06 19:27:39', 1, '2021-04-24 02:57:34', 1),
(41, 2, '2.16.01', 'Dinas Kebudayaan dan Pariwisata', 'Disbudpar', 'disbudpar@bandung.go.id', '02224234793', '02224234793', 'Jl. Ahmad Yani No.277, Babakan Surabaya,Kiaracondong, Kota Bandung, Jawa Barat 40281', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-07-08 14:41:33', 7331),
(42, NULL, '9', 'Bagian Layanan Pengadaan', 'Balap', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 0, '2018-07-06 19:27:39', 1, '2021-04-24 02:57:54', 1),
(43, NULL, '10', 'Bagian Organisasi dan Pemberdayaan Aparatur Daerah', 'Daerah  Bag. ORPAD', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 0, '2018-07-06 19:27:39', 1, '2021-04-24 02:58:10', 1),
(44, 27, '4.05.02-2.19', 'Bagian Hukum', 'Bag.Kum', 'baghukumbandung@gmail.com', '0222432338', '0222432338', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 1, 1, '2018-07-06 19:27:39', 1, '2021-05-19 08:23:09', 7345),
(45, NULL, '4.05.02-4.6', 'Bagian Umum', 'Bagum', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-06 10:32:08', 1),
(46, NULL, '11', 'Bagian Tata Usaha Pimpinan', 'Bag. TU Pimp', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 0, '2018-07-06 19:27:39', 1, '2021-04-24 02:58:23', 1),
(47, NULL, '4.05.16', 'Kecamatan Cibeunying Kaler', 'Cibkal', 'cibkalkecamatan@gmail.com', '0222500961', '0222500961', 'Jl. Cigadung Selaatan No 100 C, Kota Bandung, Jawa Barat 40191', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-07 10:58:28', 5851),
(48, NULL, '4.05.08', 'Kecamatan Cidadap', 'Kec. Cddp', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-06 10:32:08', 75),
(49, 1, '4.05.09', 'Kecamatan Sukajadi', 'Kec. Skjd', 'kecamatansukajadi04@gmail.com', '02224234793', '02224234793', 'Jl. Sukamulya No. 04 Kelurahan Sukagalih Kecamatan Sukajadi', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-07 17:16:26', 5917),
(50, NULL, '4.05.10', 'Kecamatan Cicendo', 'Kec. Ccd', 'kec.cicendo@gmail.com', '02224234793', '02224234793', 'Jl.Purabaya No.1 Kota Bandung', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-07 14:46:14', 5822),
(51, 51, '4.05.11', 'Kecamatan Andir', 'Kec. Andir', 'kec.andir@bandung.go.id', '02224234793', '02224234793', 'Jl. Srigunting Raya No. 1 Bandung', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-07 11:04:40', 5814),
(52, NULL, '4.05.12', 'Kecamatan Coblong', 'Coblong', 'kcoblong@gmail.com', '02224234793', '02224234793', 'Jl. Sangkuriang NO.10 A Bandung', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-07 14:44:37', 5882),
(53, NULL, '4.05.13', 'Kecamatan Bandung Wetan', 'Kec. Bawet', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-06 10:32:09', 75),
(54, NULL, '4.05.14', 'Kecamatan Sumur Bandung', 'Kec. Surban', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-06 10:32:09', 75),
(55, NULL, '4.05.15', 'Kecamatan Cibeunying Kidul', 'Kec. Cib.Kid', 'cibkidul@gmail.com', '0227271665', '0227271665', 'Jl. Sukasenang No. 11', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-07 10:58:41', 5853),
(56, 5, '4.05.07', 'Kecamatan Sukasari', 'SUKASARI', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-06 10:32:08', 1),
(57, 26, '4.05.17', 'Kecamatan Astana anyar', 'Kec. Anyar', 'astanaanyarkecamatan@gmail.com', '0225200419', '0225200419', 'Jl. Bojongloa No.69 Bandung 40242', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-05-20 12:17:45', 5833),
(58, NULL, '4.05.18', 'Kecamatan Bojongloa Kaler', 'Kec. Bojkal', 'kecamatanbojkal@gmail.com', '-', '-', 'Jl. K.H Wahid Hasyim No.258 Kota Bandung', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-07 10:58:32', 5845),
(59, NULL, '4.05.19', 'Kecamatan Bojongloa Kidul', 'Kec. Bojkid', 'kec.bojongloakidul@gmail.com', '02254416547', '02254416547', 'Jl. Leuwipanjang Kebonlega II Situsaeur, Kecamatan Bojongloa Kidul, Kota Bandung, Jawa Barat 40234', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-07 10:58:49', 5847),
(60, NULL, '4.05.20', 'Kecamatan Babakan Ciparay', 'Kec. Bacip', 'email@bandung.go.id', '(022) 6015723', '-', 'Jl.Babakan Ciparay 212, Kota Bandung Jawa Barat 40223', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-29 09:10:17', 5835),
(61, NULL, '4.05.21', 'Kecamatan Bandung Kulon', 'Kec. Bankul', 'email@bandung.go.id', '02287786548', '02287786548', 'Jl. Holis No. 210', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-07 10:59:27', 5839),
(62, NULL, '4.05.22', 'Kecamatan Regol', 'Kec. Regol', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-06 10:32:09', 75),
(63, NULL, '4.05.23', 'Kecamatan Lengkong', 'Kec. Lkg', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-06 10:32:09', 75),
(64, NULL, '4.05.24', 'Kecamatan Batununggal', 'Kec. Btng', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-06 10:32:09', 75),
(65, NULL, '12', 'Kecamatan Ujung Berung', 'ujungberung', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 0, '2018-07-06 19:27:39', 1, '2021-04-24 02:58:48', 1),
(66, 26, '4.05.26', 'Kecamatan Kiaracondong', 'Kec.KC', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Babakan Sari No. 177 Kota Bandung', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-07 14:45:47', 5890),
(67, NULL, '4.05.27', 'Kecamatan Arcamanik', 'Kec. Arcamanik', 'kec.arcamanik@bandung.go.id', '02224234793', '02224234793', 'Jl. Arcamanik No.2 Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-29 09:09:29', 5831),
(68, NULL, '4.05.28', 'Kecamatan Cibiru', 'Cibiru', 'kec.cibiru@gmail.com', '02224234793', '02224234793', 'Jl. Manisi 13 Kecamatan Cibiru', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-07 14:44:35', 5817),
(69, NULL, '4.05.30', 'Kecamatan Rancasari', 'Kec. Ranca', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-06 10:32:10', 75),
(70, NULL, '4.05.29', 'Kecamatan Antapani', 'Kec.Atp', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-29 09:10:39', 5829),
(71, NULL, '14', 'Kecamatan Buah Batu', 'Kec. Bubat', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 0, '2018-07-06 19:27:39', 1, '2021-04-24 02:59:10', 1),
(72, NULL, '4.05.32', 'Kecamatan Bandung Kidul', 'Kec. Bankid', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-06 10:32:10', 75),
(73, NULL, '4.05.33', 'Kecamatan Gedebage', 'GDBG', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl Gedebage Selatan No 292 Bandung', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-07 14:44:37', 5887),
(74, NULL, '4.05.34', 'Kecamatan Panyileukan', 'Kec.Nyileuk', 'email@bandung.go.id', '022-7812727', '-', 'Jl Soekarno Hatta Km 12,5', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-08 10:35:07', 5902),
(75, 1, '4.05.35', 'Kecamatan Cinambo', 'Kec. Cnb', 'ciambo.kecamatan@yahoo.com', '0227815274', '0227815274', 'Jl. Cinambo No.56 Bandung', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-07 14:44:53', 5875),
(76, 76, '4.05.36', 'Kecamatan Mandalajati', 'Kec. Mdljt', 'kmandalajati@gmail.com', '02224234793', '02224234793', 'Jl. Pasir Impun No. 33A Bandung', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-29 09:09:31', 5897),
(77, NULL, '13', 'PDAM', 'PDAM', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 0, '2018-07-06 19:27:39', 1, '2021-04-24 03:00:55', 1),
(78, NULL, '15', 'PD Kebersihan', 'PD Kebersihan', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 0, '2018-07-06 19:27:39', 1, '2021-04-24 03:01:18', 1),
(79, NULL, '16', 'PD BPR', 'PD BPR', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-04-24 03:01:38', 1),
(80, NULL, '17', 'PD Pasar Bermartabat', 'PD Pasar Bermartabat', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 0, '2018-07-06 19:27:39', 1, '2021-04-24 03:02:15', 1),
(81, 2, '1.03.02', 'Dinas Penataan Ruang', 'DISTARU', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Cianjur No. 34 Kota Bandung', '5bf6137f8180d.png', NULL, 0, 1, '2018-11-22 09:25:03', 1, '2021-12-23 16:06:07', 6014),
(82, 47, '4.05.16-886', 'Kelurahan Cigadung', 'CIGADUNG', 'cigadung@bandung.go.id', '022222222', '022222222', 'Cigadung, Cibeunying Kaler, Kota Bandung', '5c072b018c760.png', NULL, 0, 1, '2018-12-05 08:33:53', 1, '2021-04-06 10:32:09', 1),
(83, 53, '4.05.13-1372', 'Kelurahan Citarum', 'Citarum', 'kelcitarum@bandung.go.id', '022 4237234', '022 4237234', 'Jl. Gempol Wetan No. 60', '5c40431358d1c.png', NULL, 0, 1, '2019-01-17 15:55:47', 1, '2021-04-06 10:32:09', NULL),
(84, 50, '4.05.10-1403', 'Kelurahan Pajajaran', 'Pajajaran', 'kelpajajaran@bandung.go.id', '022 6020717', '-', 'Jl. Terusan Baladewa No. 62', '5c404383ad5ea.png', NULL, 0, 1, '2019-01-17 15:57:39', 1, '2021-04-06 10:32:09', NULL),
(85, 70, '4.05.29-601', 'Kelurahan Antapani Tengah', 'Antapani Tengah', 'kelantapanitengah@bandung.go.id', '0227210374', '0227210374', 'Jalan Jatiwangi Raya Nomor 17A', '5e21639a2e8f9.png', '5e21639a546af.png', 0, 1, '2020-01-17 14:34:50', 1, '2021-04-06 10:32:10', 1),
(87, 2, '1.04.01', 'Dinas Perumahan dan Kawasan Permukiman, Pertanahan dan Pertamanan', 'DPKP3', 'yadsmustopa@gmail.com', '(022) 5410403', '5410403', 'Jalan Caringin Nomor 103', NULL, NULL, 0, 1, '2021-04-06 10:32:08', NULL, '2021-07-08 14:42:03', 7313),
(88, 88, '2.01.01', 'Dinas Ketenagakerjaan', 'Disnaker', 'disnaker@bandung.go.id', '0227313130', '0227313130', 'Jl. R.A.A. Marta Negara No.4, Turangga, Kec. Lengkong, Kota Bandung, Jawa Barat 40264', NULL, NULL, 0, 1, '2021-04-06 10:32:08', NULL, '2021-05-06 09:27:01', 7317),
(89, 2, '2.06.01', 'Dinas Kependudukan dan Pencatatan Sipil', 'DISDUKCAPIL', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 0, '2021-04-06 10:32:08', NULL, '2021-07-08 14:42:03', 1),
(90, 2, '2.08.01', 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak', 'DP3A', 'dp3apmkotabdg@gmail.com', '0224231921', '\'-', 'Jl. Seram No. 2 Bandung', NULL, NULL, 0, 1, '2021-04-06 10:32:08', NULL, '2021-07-08 14:42:03', 7319),
(91, 2, '2.11.01', 'Dinas Koperasi dan Usaha Kecil Dan Menengah', 'DKUKM', 'dinaskumkm.bdg@gmail.com', '02224234793', '02224234793', 'Jl.Kawaluyaan No. 2 Bandung', NULL, NULL, 0, 1, '2021-04-06 10:32:08', NULL, '2021-07-08 14:42:03', 7325),
(92, 2, '2.13.01', 'Dinas Pemuda dan Olahraga', 'Dispora', 'dispora@bandung.go.id', '0222500950', '0222500950', 'Jl. Taman Sari No 76 Bandung', NULL, NULL, 0, 1, '2021-04-06 10:32:08', NULL, '2021-07-08 14:42:03', 7329),
(98, 2, '4.05.02-3.18', 'Bagian Administrasi Pembangunan', 'Adbang', 'admin.adbang@bandung.go.id', '-', '-', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 1, 1, '2021-04-06 10:32:08', NULL, '2021-05-05 11:20:58', 7349),
(99, 2, '4.05.02-3.20', 'Bagian Pengadaan Barang/Jasa', 'bagbarjas', 'bpbjkotabdg@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 1, 1, '2021-04-06 10:32:08', NULL, '2021-05-05 10:56:52', 7351),
(100, 5, '4.05.02-4', 'Asisten Administrasi Umum', 'AdmUmum', 'admumum@bandung.go.id', '1234121111', '123124411', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 1, 1, '2021-04-06 10:32:08', NULL, '2021-07-14 09:39:13', 5815),
(101, 100, '4.05.02-4.21', 'Bagian Organisasi', 'Bagor', 'siak_orpad@yahoo.com', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 1, 1, '2021-04-06 10:32:08', NULL, '2021-05-05 09:11:31', 7353),
(102, 100, '4.05.02-4.3517', 'Bagian Perencanaan, Keuangan dan Kepegawaian', 'Bag.Perkapeg', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 1, 1, '2021-04-06 10:32:08', NULL, '2021-05-05 09:13:25', 7357),
(103, 100, '4.05.02-4.7', 'Bagian Protokol dan Komunikasi Pimpinan', 'Bag.Prokopim', 'setda.prokopim@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 1, 1, '2021-04-06 10:32:08', NULL, '2021-07-14 09:37:38', 5815),
(104, NULL, '4.05.04', 'Sekretariat Dewan Perwakilan Rakyat Daerah', 'Setwan', 'setwan@bandung.go.id', '02224234793', '02224234793', 'Jl. Sukabumi No.30 Kota Bandung', NULL, NULL, 0, 1, '2021-04-06 10:32:08', NULL, '2021-08-04 11:19:21', 5815),
(105, 56, '4.05.07-754', 'Kelurahan Geger Kalong', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:08', NULL, NULL, NULL),
(106, 56, '4.05.07-765', 'Kelurahan Isola', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:08', NULL, NULL, NULL),
(107, 56, '4.05.07-773', 'Kelurahan Sukarasa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:08', NULL, NULL, NULL),
(108, 56, '4.05.07-779', 'Kelurahan Sarijadi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:08', NULL, NULL, NULL),
(109, 48, '4.05.08-801', 'Kelurahan Ciumbuleuit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:08', NULL, NULL, NULL),
(110, 48, '4.05.08-812', 'Kelurahan Hegarmanah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:08', NULL, NULL, NULL),
(111, 48, '4.05.08-818', 'Kelurahan Ledeng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:08', NULL, NULL, NULL),
(112, 49, '4.05.09-607', 'Kelurahan Cipedes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:08', NULL, NULL, NULL),
(113, 49, '4.05.09-675', 'Kelurahan Pasteur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:08', NULL, NULL, NULL),
(114, 49, '4.05.09-689', 'Kelurahan Sukabungah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:08', NULL, NULL, NULL),
(115, 49, '4.05.09-701', 'Kelurahan Sukagalih', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:08', NULL, NULL, NULL),
(116, 49, '4.05.09-728', 'Kelurahan Sukawarna', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:08', NULL, NULL, NULL),
(117, 50, '4.05.10-1237', 'Kelurahan Pasir Kaliki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:08', NULL, NULL, NULL),
(118, 50, '4.05.10-1364', 'Kelurahan Arjuna', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:08', NULL, NULL, NULL),
(119, 50, '4.05.10-1389', 'Kelurahan Pamoyanan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(120, 50, '4.05.10-1759', 'Kelurahan Husein Sastranegara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(121, 50, '4.05.10-1775', 'Kelurahan Sukaraja', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(122, 51, '4.05.11-1056', 'Kelurahan Ciroyom', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(123, 51, '4.05.11-1171', 'Kelurahan Garuda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(124, 51, '4.05.11-1182', 'Kelurahan Kebon Jeruk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(125, 51, '4.05.11-1186', 'Kelurahan Dungus Cariang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(126, 51, '4.05.11-1192', 'Kelurahan Campaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(127, 51, '4.05.11-1211', 'Kelurahan Maleber', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(128, 52, '4.05.12-1540', 'Kelurahan Lebak Siliwangi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(129, 52, '4.05.12-1549', 'Kelurahan Cipaganti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(130, 52, '4.05.12-1552', 'Kelurahan Lebak Gede', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(131, 52, '4.05.12-1555', 'Kelurahan Sekeloa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(132, 52, '4.05.12-1560', 'Kelurahan Sadang Serang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(133, 52, '4.05.12-1563', 'Kelurahan Dago', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(134, 53, '4.05.13-1361', 'Kelurahan Cihapit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(135, 53, '4.05.13-1407', 'Kelurahan Tamansari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(136, 54, '4.05.14-1399', 'Kelurahan Merdeka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(137, 54, '4.05.14-1744', 'Kelurahan Babakan Ciamis', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(138, 54, '4.05.14-1750', 'Kelurahan Kebon Pisang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(139, 54, '4.05.14-1760', 'Kelurahan Braga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(140, 55, '4.05.15-1004', 'Kelurahan Padasuka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(141, 55, '4.05.15-1011', 'Kelurahan Cicadas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(142, 55, '4.05.15-1017', 'Kelurahan Sukamaju', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(143, 55, '4.05.15-960', 'Kelurahan Pasirlayung', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(144, 55, '4.05.15-965', 'Kelurahan Sukapada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(145, 55, '4.05.15-995', 'Kelurahan Cikutra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(146, 47, '4.05.16-894', 'Kelurahan Neglasari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(147, 47, '4.05.16-898', 'Kelurahan Sukaluyu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(148, 47, '4.05.16-904', 'Kelurahan Cihaurgeulis', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(149, 57, '4.05.17-1828', 'Kelurahan Cibadak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(150, 57, '4.05.17-1832', 'Kelurahan Pelindung Hewan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(151, 57, '4.05.17-1833', 'Kelurahan Nyengseret', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(152, 57, '4.05.17-1834', 'Kelurahan Karasak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(153, 57, '4.05.17-1842', 'Kelurahan Panjunan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(154, 57, '4.05.17-1887', 'Kelurahan Karang Anyar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(155, 58, '4.05.18-1003', 'Kelurahan Jamika', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(156, 58, '4.05.18-1008', 'Kelurahan Sukaasih', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(157, 58, '4.05.18-1009', 'Kelurahan Kopo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(158, 58, '4.05.18-1022', 'Kelurahan Babakan Tarogong', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(159, 58, '4.05.18-903', 'Kelurahan Babakan Asih', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(160, 59, '4.05.19-1331', 'Kelurahan Kebonlega', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(161, 59, '4.05.19-1344', 'Kelurahan Cibaduyut Kidul', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(162, 59, '4.05.19-1544', 'Kelurahan Cibaduyut', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(163, 59, '4.05.19-1546', 'Kelurahan Cibaduyut Wetan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(164, 59, '4.05.19-1723', 'Kelurahan Mekarwangi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(165, 60, '4.05.20-1096', 'Kelurahan Babakan Ciparay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(166, 60, '4.05.20-1102', 'Kelurahan Sukahaji Kel. Sukahaji', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(167, 60, '4.05.20-1107', 'Kelurahan Babakan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(168, 60, '4.05.20-1112', 'Kelurahan Margahayu Utara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(169, 60, '4.05.20-1117', 'Kelurahan Margasuka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(170, 60, '4.05.20-1122', 'Kelurahan Cirangrang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(171, 61, '4.05.21-1016', 'Kelurahan Cijerah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(172, 61, '4.05.21-1023', 'Kelurahan Caringin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(173, 61, '4.05.21-1058', 'Kelurahan Cigondewah Rahayu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(174, 61, '4.05.21-1064', 'Kelurahan Gempolsari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(175, 61, '4.05.21-1071', 'Kelurahan Cibuntu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(176, 61, '4.05.21-1094', 'Kelurahan Cigondewah Kaler', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(177, 61, '4.05.21-1156', 'Kelurahan Cigondewah Kidul', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(178, 61, '4.05.21-1166', 'Kelurahan Warungmuncang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(179, 62, '4.05.22-1041', 'Kelurahan Cigereleng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(180, 62, '4.05.22-1049', 'Kelurahan Ciseureuh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(181, 62, '4.05.22-1267', 'Kelurahan Pungkur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(182, 62, '4.05.22-1326', 'Kelurahan Balonggede', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(183, 62, '4.05.22-1345', 'Kelurahan Ciateul', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(184, 63, '4.05.23-1151', 'Kelurahan Malabar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(185, 63, '4.05.23-1369', 'Kelurahan Cijagra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(186, 63, '4.05.23-1371', 'Kelurahan Burangrang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(187, 63, '4.05.23-1384', 'Kelurahan Paledang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(188, 63, '4.05.23-1391', 'Kelurahan Cikawao', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(189, 64, '4.05.24-1332', 'Kelurahan Cibangkong', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(190, 64, '4.05.24-1333', 'Kelurahan Kebon Gedang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(191, 64, '4.05.24-1335', 'Kelurahan Maleer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(192, 64, '4.05.24-1337', 'Kelurahan Kacapiring', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(193, 64, '4.05.24-1351', 'Kelurahan Samoja', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(194, 64, '4.05.24-1425', 'Kelurahan Kebon Waru', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(195, 64, '4.05.24-1429', 'Kelurahan Gumuruh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(196, 64, '4.05.24-1434', 'Kelurahan Binong', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(197, NULL, '4.05.25', 'Kecamatan Ujungberung', 'Kec.Uber', 'kec.ujungberung@bandung.go.id', '123456', '14123123', 'Jl. Alun-alun Utara No. 221 Bandung', NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, '2021-04-07 15:55:22', 5925),
(198, 197, '4.05.25-1230', 'Kelurahan Cigending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:09', NULL, NULL, NULL),
(199, 197, '4.05.25-1232', 'Kelurahan Pasanggrahan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(200, 197, '4.05.25-1233', 'Kelurahan Pasirjati', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(201, 197, '4.05.25-1294', 'Kelurahan Pasirwangi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(202, 66, '4.05.26-1229', 'Kelurahan Kebon Jayanti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(203, 66, '4.05.26-1256', 'Kelurahan Kebon Kangkung', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(204, 66, '4.05.26-1270', 'Kelurahan Babakan Surabaya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(205, 66, '4.05.26-1297', 'Kelurahan Cicaheum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(206, 66, '4.05.26-1310', 'Kelurahan Sukapura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(207, 66, '4.05.26-1370', 'Kelurahan Babakan Sari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(208, 67, '4.05.27-1577', 'Kelurahan Cisaranten Kulon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(209, 67, '4.05.27-1778', 'Kelurahan Cisaranten Endah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(210, 67, '4.05.27-1785', 'Kelurahan Sukamiskin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(211, 67, '4.05.27-2038', 'Kelurahan Cisaranten Bina Harapan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(212, 68, '4.05.28-470', 'Kelurahan Cipadung', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(213, 68, '4.05.28-471', 'Kelurahan Pasir Biru', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(214, 68, '4.05.28-472', 'Kelurahan Palasari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(215, 68, '4.05.28-474', 'Kelurahan Cisurupan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(216, 70, '4.05.29-1651', 'Kelurahan Antapani Wetan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(217, 70, '4.05.29-583', 'Kelurahan Antapani Kidul', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(218, 70, '4.05.29-603', 'Kelurahan Antapani Kulon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(219, 69, '4.05.30-1478', 'Kelurahan Derwati', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(220, 69, '4.05.30-1483', 'Kelurahan Cipamokolan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(221, 69, '4.05.30-1490', 'Kelurahan Mekarjaya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(222, 69, '4.05.30-1501', 'Kelurahan Manjahlega', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(223, 71, '4.05.31', 'Kecamatan Buahbatu', 'Kec.Buahbatu', 'umpegkec.buahbatu@gmail.com', '02288881971', '02288881971', 'Jalan Ciwastra No 291 Bandung', NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, '2021-04-07 11:00:55', 5849),
(224, 223, '4.05.31-854', 'Kelurahan Cijawura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(225, 223, '4.05.31-857', 'Kelurahan Margasari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(226, 223, '4.05.31-862', 'Kelurahan Sekejati', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(227, 223, '4.05.31-868', 'Kelurahan Jatisari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(228, 72, '4.05.32-926', 'Kelurahan Batununggal', 'KEL.BTGL', 'kelbtgl@gmail.com', '022 7507674', 'tak ada', 'Jl.Terusan Buah Batu No.66', NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, '2021-08-18 09:21:19', 8772),
(229, 72, '4.05.32-935', 'Kelurahan Kujangsari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(230, 72, '4.05.32-951', 'Kelurahan Wates', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(231, 72, '4.05.32-955', 'Kelurahan Mengger', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(232, 73, '4.05.33-559', 'Kelurahan Rancabolang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(233, 73, '4.05.33-561', 'Kelurahan Rancanumpang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(234, 74, '4.05.34-712', 'Kelurahan Cipadung Kidul', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(235, 74, '4.05.34-715', 'Kelurahan Mekarmulya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(236, 74, '4.05.34-720', 'Kelurahan Cipadung Kulon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(237, 74, '4.05.34-722', 'Kelurahan Cipadung Wetan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(238, 75, '4.05.35-649', 'Kelurahan Babakan Penghulu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(239, 75, '4.05.35-653', 'Kelurahan Cisaranten Wetan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(240, 75, '4.05.35-655', 'Kelurahan Sukamulya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-04-06 10:32:10', NULL, NULL, NULL),
(250, 2, 'SKPD001', 'Dinas ABC (Demo)', 'DINAS ABC', 'skpd1@bandung.go.id', '022-123456', '022-234567', 'Jl. Wastukancana No. 2', '606e8d6f684b9.png', '606e8d6f77c8b.png', 0, 1, '2021-04-08 11:58:23', 1, '2021-06-22 15:12:04', 5815),
(251, NULL, '231231321', 'Bapak Wali Kota', 'Bapak Wali Kota', 'walikota@bandung.go.id', '2131241232131', '213123123', 'wastukencana', '607113ea5158d.jpg', '605c397ff0499.png', 0, 1, '2021-03-25 14:19:28', 2273, '2021-05-18 08:09:34', 5815),
(257, 2, 'bag.abc-1', 'Bagian ABC (Demo)', 'bag.abc', 'bagian_abc@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', '6091024093648.png', '60910240a27fd.png', 1, 1, '2021-05-04 15:11:53', 1, '2021-07-07 14:42:27', 5815),
(258, NULL, '99999', 'Dewan Perwakilan Rakyat Daerah', 'DPRD', 'dprd@bandung.go.id', '02224234793', '02224234793', 'Jl. Sukabumi No.30 Kota Bandung', NULL, NULL, 0, 1, '2021-04-06 10:32:08', NULL, '2021-05-10 09:36:34', 7335),
(261, 5, '4.05.02-2', 'Asisten Pemerintahan dan Kesejahteraan Rakyat', 'AsistenKesra', 'email@bandung.go.id', '02224234793', '02224234793', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117', NULL, NULL, 0, 1, '2018-07-06 19:27:39', 1, '2021-10-25 15:12:15', 5815);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_skpd`
--
ALTER TABLE `master_skpd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_parent` (`id_parent`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_skpd`
--
ALTER TABLE `master_skpd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `master_skpd`
--
ALTER TABLE `master_skpd`
  ADD CONSTRAINT `master_skpd_ibfk_1` FOREIGN KEY (`id_parent`) REFERENCES `master_skpd` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
