-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2022 at 08:51 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scg`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `poh` varchar(50) NOT NULL,
  `periode_kerja` varchar(50) NOT NULL,
  `jadwal_cuti` varchar(50) NOT NULL,
  `tgl_mulai_cuti` date NOT NULL,
  `tgl_kmbli_cuti` date NOT NULL,
  `tgl_kompss_ph` date NOT NULL,
  `tgl_untuk_ph` date NOT NULL,
  `jadwal_off` date NOT NULL,
  `jadwal_mulai_efektif_kerja` date NOT NULL,
  `job_pending` varchar(200) NOT NULL,
  `penerima_jp` varchar(50) NOT NULL,
  `alamat_cuti` varchar(50) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `bantuan_transport` varchar(50) NOT NULL,
  `realisasi` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `email_diatas_atasan` varchar(50) NOT NULL,
  `email_atasan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`email`, `nama`, `nik`, `jabatan`, `dept`, `poh`, `periode_kerja`, `jadwal_cuti`, `tgl_mulai_cuti`, `tgl_kmbli_cuti`, `tgl_kompss_ph`, `tgl_untuk_ph`, `jadwal_off`, `jadwal_mulai_efektif_kerja`, `job_pending`, `penerima_jp`, `alamat_cuti`, `hp`, `bantuan_transport`, `realisasi`, `keterangan`, `email_diatas_atasan`, `email_atasan`) VALUES
('', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('eggy.winanto@sebukucoalgroup.co.id', 'Eggy Yuli Winanto', '01220299', 'IT Foreman', 'ITC', 'Surabaya', '10 Minggu Onsite', '2 Minggu Off', '2022-09-15', '2022-09-29', '2022-09-25', '2022-09-26', '2022-09-29', '2022-09-30', 'Tidak Ada', 'Firdaus IT', 'Malang', '08563056391', 'Ya', '', '', 'lucas@sebukucoalgroup.co.id', 'jimi@sebukucoalgroup.co.id'),
('', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `greencard`
--

CREATE TABLE `greencard` (
  `id` int(10) NOT NULL,
  `nama_pelapor` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  `dept` varchar(20) NOT NULL,
  `dept_terkait` varchar(20) NOT NULL,
  `lok_area` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `rekomendasi` varchar(100) NOT NULL,
  `tindakan` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `remark` varchar(150) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `duedate` datetime NOT NULL,
  `upd_onprog` varchar(200) NOT NULL,
  `tgl_onprog` datetime NOT NULL,
  `foto_onprog` varchar(255) NOT NULL,
  `upd_close` varchar(200) NOT NULL,
  `tgl_close` datetime NOT NULL,
  `foto_close` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `greencard`
--

INSERT INTO `greencard` (`id`, `nama_pelapor`, `tanggal`, `dept`, `dept_terkait`, `lok_area`, `lokasi`, `kondisi`, `rekomendasi`, `tindakan`, `status`, `remark`, `foto`, `kategori`, `duedate`, `upd_onprog`, `tgl_onprog`, `foto_onprog`, `upd_close`, `tgl_close`, `foto_close`) VALUES
(53, 'Fahrul Hidayat', '2022-08-15 08:08:00', 'MEP', 'HSE', 'Tambang/PIT', 'tambang t1 utara', 'stilimpon sudah tidak berpungsi dengan baik karna lumpur sudh menumpuk di galian stilimon', 'kalo bisa lumpur y d buang dlu atau di keruk', '', 'Open', 'tidak ada', 'bukti/jalan-penghubung-kecamatan-krayan-barat.jpg', 'KTA / Kondisi Tidak Aman', '2022-08-22 08:08:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', ''),
(54, 'Edi Murdani', '2022-08-15 08:13:00', 'HSE', 'HSE', 'Tambang/PIT', 'Settling Pond 03', 'Kondisi paritan bekas outlet pintu air SP 03 yang tidak terdapat hard barricade di sisi kiri jalan m', 'Menutup paritan yang sudah tidak terpakai  lagi atau memasang hard barricade pada sisi paritan agar ', 'Sudah dilakukan penutupan pada paritan', 'Close', 'tidak ada', 'bukti/padang-birau3-parit-stockpile-yang-dipenuhi-batubara.jpg', 'KTA / Kondisi Tidak Aman', '2022-08-16 08:13:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', ''),
(55, 'Rendra Wirama Setiaw', '2022-08-15 08:19:00', 'SCM', 'HRGA', 'Kantor', 'Area office - mess', 'Tidak menggunakan helm mengendarai motor dan dengan kecepatan tinggi (Amat)', 'Agar menggunakan helm dan tidak mengendarai dengan kecepatan tinggi di area office', '', 'Open', 'tidak ada', 'bukti/4199156781.jpg', 'TTA / Tindakan Tidak Aman', '2022-08-16 08:19:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', ''),
(56, 'Rendra Wirama Setiaw', '2022-08-15 08:23:00', 'SCM', 'ITC', 'Kantor', 'Area Admin Logistik', 'Cable Duct yang sudah pecah sehingga bisa mengakibatkan terkait saat melewatinya', 'Agar diganti dengan cable duct yang baru atau dialihkan ketempat yg tidak dilewati saat berjalan', '', 'Close', 'tidak ada', 'bukti/2305098optik1780x390.jpg', 'KTA / Kondisi Tidak Aman', '2022-08-22 08:23:00', 'akan dilakukan penggantian kabel duct tsb', '2022-08-15 08:33:00', '', 'Telah selesai dilakukan penggantian kabel duct tsb', '2022-08-15 08:38:00', ''),
(57, 'Rendra Wirama Setiaw', '2022-08-15 08:26:00', 'SCM', 'HRGA', 'Kantor', 'Tangga besi darurat ', 'Ada satu anak tangga yg mana 1 sisinya penahan las-las besi tersebut tidak menyatu lagi', 'Agar sisi nya tersebut bisa diperbaiki (untuk menghindari resiko bahaya selanjutnya)', '', 'Open', 'tidak ada', 'bukti/tangga-besi-melingkar.jpg', 'KTA / Kondisi Tidak Aman', '2022-08-29 08:26:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', ''),
(58, 'Ary Setiawan', '2022-08-18 07:52:00', 'MEP', 'HSE', 'Kantor', 'Simpang empat Selaru', 'Tidak adanya rambu stop dari arah kantor STC', 'Memasang rambu stop dan rambu lainnya yang sesuai', 'Walau tak ada rambu, tetap berhati hati dan bertindak aman', 'Open', 'tidak ada', 'bukti/Lalu-lalang-pengendara-di-Simpang-Empat-Jalan-Jenderal-Sudirman.jpg', 'KTA / Kondisi Tidak Aman', '2022-08-19 07:52:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', ''),
(59, 'Ary Setiawan', '2022-08-18 08:09:00', 'MEP', 'ITC', 'Tambang/PIT', 'Pit SSC AWDU', 'Tidak ada chanel radio \"AWDU\" di radio LV', 'Instal Chanel \"AWDU\" di setiap radio LV', 'Hati hati, memastikan operator melihat keberadaan kita', 'On Progress', 'tidak ada', 'bukti/rig.jpg', 'KTA / Kondisi Tidak Aman', '2022-08-20 08:09:00', 'Akan dilakukan seting Chanel \"AWDU\" di setiap radio LV', '2022-08-18 08:24:00', 'bukti/WhatsApp Image 2022-08-18 at 8.23.24 AM.jpeg', '', '0000-00-00 00:00:00', ''),
(60, 'Ary Setiawan', '2022-08-18 08:30:00', 'MEP', 'HRGA', 'Kantor', 'Pintu masuk pos utama', 'Tanaman pagar menutupi pandangan, kendaraan dari samping tidak terlihat', 'Memangkas tanaman pagar', 'Hati hati, berhenti sejenak, lihat kanan kiri, setelah pasti gak ada kendaraan baru gas', 'Open', 'tidak ada', 'bukti/2564129174.jpg', 'KTA / Kondisi Tidak Aman', '2022-08-25 08:30:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', ''),
(61, 'Jimmy Ishak PL', '2022-08-18 16:45:00', 'ITC', 'HSE', '', 'Parkiran', 'Tidak ada Rambu Stop ', 'Pasang Rambu Stop', 'Tidak ada', 'Close', 'tidak ada', 'bukti/BNSP.png', 'TTA / Tindakan Tidak Aman', '2022-08-20 16:45:00', '', '0000-00-00 00:00:00', '', 'Sudah dipasang rambu ', '2022-08-18 16:50:00', 'bukti/b6f492e2f6c122c6ba9c6d88a5fdf8e0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `isi`
--

CREATE TABLE `isi` (
  `email` int(50) NOT NULL,
  `nama` date NOT NULL,
  `nik` int(50) NOT NULL,
  `Jabatan` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(200) NOT NULL,
  `nik` int(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dep` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'image/user.png',
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `nik`, `password`, `dep`, `image`, `id`) VALUES
('Firdaus', 2200049, '0049', 'ITC', 'image/IMG-20210516-WA0017.jpeg', 3),
('R. Teguh Martono', 1210196, '0196', 'Non Departement', 'image/download.jpeg', 4),
('Zulfikar Darwin', 1210187, '0187', 'MEP', 'image/user.png', 5),
('Teguh Ismar Malasi', 1180028, '0028', 'TS', 'image/user.png', 6),
('Arnold Antokepan Mangalik', 1200144, '0144', 'MEP', 'image/user.png', 7),
('Parsaulian Harianja', 1100004, '0004', 'MEP', 'image/20220304_164154.jpg', 8),
('Wilmar Reinaldy', 1210226, '0226', 'MEP', 'image/user.png', 9),
('Gerianto El Kana', 1200123, '0123', 'MEP', 'image/IMG20211215065717.jpg', 10),
('Wasron Nainggolan', 1200124, '0124', 'MEP', 'image/user.png', 11),
('Syarifudin,ST', 1210234, '0234', 'MEP', 'image/user.png', 12),
('Setyarno Adi Saputro', 1200135, '0135', 'MEP', 'image/user.png', 13),
('Iwan', 1210239, '0239', 'MEP', 'image/user.png', 14),
('Raden Achmat Nordiyantoro', 1200138, '0138', 'MEP', 'image/IMG_20220102_145332.jpg', 15),
('Andri Faizal', 1200134, '0134', 'MEP', 'image/user.png', 16),
('Selamat Heriyadi', 1200130, '0130', 'MEP', 'image/user.png', 17),
('Wahyu Dwi Agustian', 1210229, '0229', 'MEP', 'image/20211119_143100.jpg', 18),
('Zaenal Abidin', 1210227, '0227', 'MEP', 'image/user.png', 19),
('Misrudin Alfiani', 1200122, '0122', 'MEP', 'image/user.png', 20),
('Yoskar Bakker', 1200165, '0165', 'MEP', 'image/user.png', 21),
('Akhmad Fauzan', 1200172, '0172', 'MEP', 'image/user.png', 22),
('Rabiatul Adawiyah', 1200168, '0168', 'MEP', 'image/user.png', 23),
('Hengki', 1200173, '0173', 'MEP', 'image/user.png', 24),
('M. Sulaiman', 1210180, '0180', 'MEP', 'image/user.png', 25),
('Wahyuddin', 1210182, '0182', 'MEP', 'image/user.png', 26),
('Ejed Mutakin', 1210230, '0230', 'MEP', 'image/user.png', 27),
('Rahman', 1210232, '0232', 'MEP', 'image/user.png', 28),
('Rani Saputra', 1210233, '0233', 'MEP', 'image/user.png', 29),
('Tomy Adam ', 1210231, '0231', 'MEP', 'image/user.png', 30),
('Muhammad Nanda', 1210244, '0244', 'MEP', 'image/user.png', 31),
('Didi Wahyudi', 1210211, '0211', 'MEP', 'image/user.png', 32),
('Burhanuddin', 1210198, '0198', 'MEP', 'image/user.png', 33),
('Ra\'oef  Herbani', 1210200, '0200', 'MEP', 'image/user.png', 34),
('Muhammad Aidil Saputra', 1210201, '0201', 'MEP', 'image/user.png', 35),
('Rahmadi', 1210199, '0199', 'MEP', 'image/user.png', 36),
('Rusdy Wardana', 1200133, '0133', 'MEP', 'image/user.png', 45),
('Aris Setiyadi', 1200094, '0094', 'MEP', 'image/user.png', 46),
('Ary Setiawan', 1180045, '0045', 'MEP', 'image/user.png', 47),
('Indra Purwana', 1170020, '0020', 'MEP', 'image/IMG_20210816_224425.jpg', 48),
('Ummas', 1190068, '0068', 'MEP', 'image/user.png', 49),
('Abdul Gafar', 1190069, '0069', 'MEP', 'image/IMG-20220118-WA0023.jpg', 50),
('Akhmad Mukhlisin', 1190070, '0070', 'MEP', 'image/FB_IMG_16415994150169695.jpg', 51),
('Abi Hasan', 1190074, '0074', 'MEP', 'image/IMG20220101143120_01.jpg', 52),
('Misda Harianti Nabila', 1190081, '0081', 'MEP', 'image/user.png', 53),
('Diki Amrullah', 1200166, '0166', 'MEP', 'image/IMG_20211109_111753.jpg', 54),
('Fahrul Hidayat', 1200167, '0167', 'MEP', 'image/user.png', 55),
('Salih', 1200175, '0175', 'MEP', 'image/user.png', 56),
('Saipul Rahman', 1210246, '0246', 'MEP', 'image/user.png', 57),
('Syahrul Irawan ', 1210247, '0247', 'MEP', 'image/user.png', 58),
('Jefri Tangko', 1210250, '0250', 'HSE', 'image/user.png', 64),
('Andriana', 1210245, '0245', 'HSE', 'image/user.png', 65),
('Chandra Leonardo Sianipar', 1210194, '0194', 'HSE', 'image/user.png', 66),
('Nurul Ulviani Hidayah', 1200157, '0157', 'HSE', 'image/user.png', 67),
('Rahmadani Rijal', 1190075, '0075', 'HSE', 'image/user.png', 68),
('Andri Hidayat', 1210249, '0249', 'HSE', 'image/user.png', 69),
('Edi Murdani', 1200176, '0176', 'HSE', 'image/user.png', 70),
('Abdul Sadiq ', 1200164, '0164', 'HSE', 'image/user.png', 71),
('Rasid Riyadi', 1210185, '0185', 'HSE', 'image/user.png', 72),
('Muhammad Aspandy', 1210248, '0248', 'HSE', 'image/user.png', 73),
('Syamsinar', 1210188, '0188', 'HSE', 'image/user.png', 74),
('Zakaria', 1210242, '0242', 'HSE', 'image/user.png', 75),
('Maulana', 1210240, '0240', 'HSE', 'image/user.png', 76),
('Ardian', 1210241, '0241', 'HSE', 'image/user.png', 77),
('Rudi Hartono', 1210203, '0203', 'HSE', 'image/user.png', 79),
('Mohammad Aldi', 1210210, '0210', 'HSE', 'image/user.png', 80),
('M. Mirsan', 1210204, '0204', 'HSE', 'image/user.png', 81),
('Muhammad Taufiq Ismail', 1210202, '0202', 'HSE', 'image/user.png', 82),
('Cornelius Adi Tamtomo', 1210191, '0191', 'PRODEV', 'image/user.png', 96),
('Leonard', 1210218, '0218', 'PRODEV', 'image/user.png', 97),
('Abdul Latib', 1210215, '0215', 'PRODEV', 'image/user.png', 98),
('Malik Idham', 1210216, '0216', 'PRODEV', 'image/user.png', 99),
('Djeki Sulistiawan', 1200192, '0192', 'PRODEV', 'image/user.png', 100),
('Edward Heriady', 2190012, '0012', 'PRODEV', 'image/20210427_190516.jpg', 101),
('Rifki Fauzi Norhadi', 1200171, '0171', 'PRODEV', 'image/user.png', 102),
('Syahrian Wahyudi', 1210193, '0193', 'PRODEV', 'image/user.png', 103),
('Yunita Arianti', 1210235, '0235', 'PRODEV', 'image/user.png', 104),
('Kadek Puri Handayani', 1200170, '0170', 'PRODEV', 'image/user.png', 105),
('Karman Ady Saputra', 1210205, '0205', 'PRODEV', 'image/user.png', 106),
('Sukri', 1210206, '0206', 'PRODEV', 'image/user.png', 107),
('Wanra', 1210207, '0207', 'PRODEV', 'image/user.png', 108),
('Arbani', 1210208, '0208', 'PRODEV', 'image/user.png', 109),
('Edy Purwanto', 2200044, '0044', 'SHIP', 'image/user.png', 117),
('Tomi Bayu Putranto', 2200026, '0026', 'SHIP', 'image/user.png', 118),
('Adi Saputra Dwi Cahyono', 2200046, '0046', 'SHIP', 'image/user.png', 119),
('Irwandi', 2200029, '0029', 'SHIP', 'image/user.png', 120),
('Ahmad Badiul Bahalwan', 2200032, '0032', 'SHIP', 'image/user.png', 121),
('M. Tahir', 2200048, '0048', 'SHIP', 'image/user.png', 122),
('Dita Novita Sari', 2200042, '0042', 'SHIP', 'image/user.png', 123),
('M. Rafie', 2200040, '0040', 'SHIP', 'image/user.png', 124),
('Iwan Turi', 2200041, '0041', 'SHIP', 'image/user.png', 125),
('Jamaluddin', 2210051, '0051', 'SHIP', 'image/user.png', 126),
('Sarpendi', 2210069, '0069', 'SHIP', 'image/user.png', 127),
('Amul Ridani', 2210070, '0070', 'SHIP', 'image/user.png', 128),
('Aliansyah', 2210067, '0067', 'SHIP', 'image/user.png', 129),
('Arbain.', 2210073, '0073', 'SHIP', 'image/user.png', 130),
('Irwansyah', 2210071, '0071', 'SHIP', 'image/user.png', 131),
('Masrudin', 2210068, '0068', 'SHIP', 'image/user.png', 132),
('Suhardi', 2210072, '0072', 'SHIP', 'image/user.png', 133),
('Yakobus Andy Yulianus', 2210074, '0074', 'SHIP', 'image/user.png', 134),
('Gunawan. H', 2210053, '0053', 'SHIP', 'image/user.png', 135),
('Doni Mantiri', 2180006, '0006', 'CPP', 'image/user.png', 139),
('Agus Setiawan', 2200023, '0023', 'CPP', 'image/user.png', 140),
('Adinda Maulana', 2210079, '0079', 'CPP', 'image/user.png', 141),
('Firmansyah Van Dapperen', 2200045, '0045', 'CPP', 'image/user.png', 142),
('Filemon Sator Dallo', 2200047, '0047', 'CPP', 'image/user.png', 143),
('Imanuel Ramba', 2210076, '0076', 'CPP', 'image/user.png', 144),
('Woro', 2210077, '0077', 'CPP', 'image/user.png', 145),
('Haryanto Bin Matius', 2210080, '0080', 'CPP', 'image/user.png', 146),
('Melna Ayudia', 2200025, '0025', 'CPP', 'image/user.png', 147),
('Sri Suhartini', 2190014, '0014', 'CPP', 'image/user.png', 148),
('Abul Asy\'ari', 2200027, '0027', 'CPP', 'image/user.png', 149),
('Zulfikar', 2200022, '0022', 'CPP', 'image/user.png', 150),
('Iswandi', 2190009, '0009', 'CPP', 'image/user.png', 151),
('Syahriadi', 2200031, '0031', 'CPP', 'image/user.png', 152),
('M. Syakir', 2200033, '0033', 'CPP', 'image/user.png', 153),
('M. Abdhie Pratama', 2210050, '0050', 'CPP', 'image/user.png', 154),
('Fitriannor', 2190020, '0020', 'CPP', 'image/user.png', 155),
('Jainudin', 2210052, '0052', 'CPP', 'image/user.png', 156),
('Mahrudin Gali', 2210054, '0054', 'CPP', 'image/user.png', 157),
('Rahim', 2210065, '0065', 'CPP', 'image/user.png', 158),
('M. Junaidi', 2210061, '0061', 'CPP', 'image/user.png', 159),
('Suriansyah', 2210066, '0066', 'CPP', 'image/user.png', 160),
('Sarifuddin', 2210055, '0055', 'CPP', 'image/user.png', 161),
('Sudirman', 2210058, '0058', 'CPP', 'image/user.png', 162),
('M. Sallihin', 2210060, '0060', 'CPP', 'image/user.png', 163),
('Abdul Kadir', 2210064, '0064', 'CPP', 'image/user.png', 164),
('Muhammad Hamsyah', 2210057, '0057', 'CPP', 'image/user.png', 165),
('Rahman.', 2210056, '0056', 'CPP', 'image/user.png', 166),
('Dwi Sudiratno', 2210059, '0059', 'CPP', 'image/user.png', 167),
('Sarkani', 2210075, '0075', 'CPP', 'image/user.png', 168),
('Akhmad Januariansyah', 2200043, '0043', 'CPP', 'image/user.png', 169),
('M. Ismail', 2210063, '0063', 'CPP', 'image/user.png', 170),
('Heldi Suwandi', 2200035, '0035', 'CPP', 'image/user.png', 171),
('M. Noor', 2200039, '0039', 'CPP', 'image/user.png', 172),
('M. Rasidi', 2200036, '0036', 'CPP', 'image/user.png', 173),
('Riduansyah', 2200038, '0038', 'CPP', 'image/user.png', 174),
('Trisdianto Ruben Rudy T', 1180030, '0030', 'HRGA', 'image/IMG_20220313_065745.jpg', 175),
('Herry Twoesty Nugroho', 1210225, '0225', 'HRGA', 'image/user.png', 176),
('Kalfin Rombe Padati', 1210243, '121487', 'HRGA', 'image/IMG_20191013_090447_008.jpg', 177),
('Syahdinor', 1190062, '0062', 'HRGA', 'image/user.png', 178),
('Okty Novita', 1170017, '0017', 'HRGA', 'image/user.png', 179),
('Theresia Irma Susanti', 1210197, '0197', 'HRGA', 'image/user.png', 180),
('Reza S Wahyudi', 1200169, '0169', 'HRGA', 'image/user.png', 181),
('Anita Sanggola', 1200162, '0162', 'HRGA', 'image/user.png', 182),
('Habibullah', 1190067, '0067', 'HRGA', 'image/user.png', 183),
('Rian Febriandi', 1200161, '0161', 'HRGA', 'image/user.png', 184),
('Rahmansyah', 1190072, '0072', 'HRGA', 'image/user.png', 185),
('Agus Irawansyah', 1190080, '0080', 'HRGA', 'image/user.png', 186),
('Hermani', 1190084, '0084', 'HRGA', 'image/user.png', 187),
('Satijo', 1190085, '0085', 'HRGA', 'image/user.png', 188),
('Budimansyah', 1200096, '0096', 'HRGA', 'image/user.png', 189),
('Makkasau', 1200097, '0097', 'HRGA', 'image/user.png', 190),
('Muhammad Hafiludin', 1200140, '0140', 'HRGA', 'image/user.png', 191),
('Ahmad Yani', 1200177, '0177', 'HRGA', 'image/user.png', 192),
('Rianto Firdaus', 1200109, '0109', 'HRGA', 'image/user.png', 193),
('Suparti', 1200110, '0110', 'HRGA', 'image/user.png', 194),
('Salihin', 2190007, '0007', 'HRGA', 'image/user.png', 195),
('Muhamat Asrani', 2190019, '0019', 'HRGA', 'image/user.png', 196),
('Riduansyah.', 1210222, '0222', 'HRGA', 'image/user.png', 197),
('Misri', 2210078, '0078', 'HRGA', 'image/user.png', 198),
('Ahmad Jumansyah', 1210181, '0181', 'HRGA', 'image/user.png', 199),
('Hari Antoni', 1210224, '0224', 'HRGA', 'image/user.png', 200),
('Sutanto', 1210221, '0221', 'HRGA', 'image/user.png', 201),
('Rusdi Rahim', 1210220, '0220', 'HRGA', 'image/user.png', 202),
('Rasikun', 3190001, '0001', 'HRGA', 'image/user.png', 203),
('Kahrani', 1200191, '0191', 'EA', 'image/user.png', 204),
('Eko Rusdiono', 1210236, '0236', 'EA', 'image/33E08D54-3D13-4C9C-A83A-8619C0F2724D.jpeg', 205),
('Muhamad Hilmy Abdullah', 1210238, '0238', 'EA', 'image/user.png', 206),
('Putri Puspita Sari', 1210223, '0223', 'EA', 'image/user.png', 207),
('Ahmad Akhdiat', 1210190, '0190', 'EA', 'image/user.png', 208),
('Yohanis Dallo', 1170021, '0021', 'EA', 'image/user.png', 209),
('Rizal Sake', 1170023, '0023', 'EA', 'image/user.png', 210),
('La Ode Rachman Marsaban', 1210251, '0251', 'EA', 'image/user.png', 211),
('Rheiner Silalahi', 1200107, '0107', 'EA', 'image/user.png', 212),
('Mardiono', 1190064, '0064', 'EA', 'image/user.png', 213),
('Rahmad Huntua', 1190065, '0065', 'EA', 'image/user.png', 214),
('Ronald Wahyudi', 1210237, '0237', 'EA', 'image/Screenshot_20220109-171054_WhatsApp.jpg', 215),
('Muhidin Asmail', 1190071, '0071', 'EA', 'image/user.png', 216),
('Apriansyah', 1190082, '0082', 'EA', 'image/user.png', 217),
('Kamarudin', 1200129, '0129', 'EA', 'image/user.png', 218),
('Mansur DG Sanrang', 3190002, '0002', 'EA', 'image/user.png', 219),
('Anisa Mauliyanti', 1200141, '0141', 'EA', 'image/user.png', 220),
('Siti Rahilah', 1200091, '0091', 'EA', 'image/user.png', 221),
('Maria Ike Safitri', 1190088, '0088', 'EA', 'image/user.png', 222),
('Boy Wijanarko', 1160014, '0014', 'FA', 'image/user.png', 223),
('Agie Kusnopriadi', 1180044, '0044', 'FA', 'image/user.png', 224),
('Bagus Aryadi', 1210212, '0212', 'FA', 'image/user.png', 225),
('Muliya', 1210183, '0183', 'FA', 'image/user.png', 226),
('M. Susilo Wahyudi', 1210228, '0228', 'FA', 'image/user.png', 227),
('Kurnia Ramadhan', 1200139, '0139', 'SCM', 'image/user.png', 228),
('Syamsuddin', 1210219, '0219', 'SCM', 'image/user.png', 229),
('Suriadi', 2190010, '0010', 'SCM', 'image/user.png', 230),
('Subhan', 2190011, '0011', 'SCM', 'image/user.png', 231),
('Jaya Maulana', 2190017, '0017', 'SCM', 'image/user.png', 232),
('Ferry Pradika Saputra', 1200132, '0132', 'SCM', 'image/user.png', 233),
('Rendra Wirama Setiawan', 1200174, '0174', 'SCM', 'image/user.png', 234),
('Jimmy Ishak PL', 1200126, '0126', 'ITC', 'image/PXL_20211007_033045067~2.jpg', 235),
('Kalfin Rombe ', 1210243, '0243', 'HRDGA', '', 236),
('Lukas Hendri', 1200127, '0127', 'ITC', 'image/saitama.mp4', 237),
('La Ode Rachman', 1210251, '0251', '-Pilih-', '', 238),
('Heri Susanto', 4220, '4220', 'HRDGA', 'image/2021_03_22_09_00_IMG_4621.JPG', 239),
('HSE Admin', 1299999, '9999', 'admin', 'image/user.png', 240),
('Hilcon Jaya Sakti', 9999999, '9999', 'Hilcon Jaya Sakti', 'image/user.png', 241);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `greencard`
--
ALTER TABLE `greencard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `greencard`
--
ALTER TABLE `greencard`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
