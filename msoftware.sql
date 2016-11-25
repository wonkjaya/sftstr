-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2016 at 10:09 AM
-- Server version: 5.5.52-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msoftware`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `ID` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `dibuat` date NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` tinytext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `ID` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kas_keluar` int(11) NOT NULL,
  `kas_masuk` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`ID`, `id_pemilik`, `tanggal`, `kas_keluar`, `kas_masuk`, `keterangan`) VALUES
(26, 1, '2015-10-02', 0, 400000, '2 bulan');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `ID` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `id_kode_type` int(11) NOT NULL COMMENT 'mengambil di log_type',
  `id_user` int(11) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `user_agent` varchar(200) NOT NULL,
  `status` int(3) NOT NULL COMMENT '100:error;111:sukses',
  `keterangan` tinytext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_type`
--

CREATE TABLE `log_type` (
  `ID` int(11) NOT NULL,
  `kode` varchar(3) NOT NULL,
  `nama_type` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_type`
--

INSERT INTO `log_type` (`ID`, `kode`, `nama_type`) VALUES
(1, '100', 'aktivitas'),
(2, '200', 'login');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_pelanggan`
--

CREATE TABLE `pengajuan_pelanggan` (
  `ID` int(11) NOT NULL,
  `nomor_telpon` varchar(16) NOT NULL,
  `keluhan` text NOT NULL COMMENT 'bentuk json',
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_pelanggan`
--

INSERT INTO `pengajuan_pelanggan` (`ID`, `nomor_telpon`, `keluhan`, `status`) VALUES
(1, 'Masukkan No. Tel', '{"domain":"Cari nama Domain","deskripsi":"Tulis Deskripsi"}', 0),
(2, 'Masukkan No. Tel', '{"domain":"Cari nama Domain","deskripsi":"Tulis Deskripsi"}', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk_data`
--

CREATE TABLE `produk_data` (
  `ID` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL,
  `kode_produk` char(10) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `nama_produk` char(30) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `diskon` tinyint(4) NOT NULL,
  `url_demo` tinytext NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_data`
--

INSERT INTO `produk_data` (`ID`, `created`, `id_user`, `kode_produk`, `slug`, `nama_produk`, `id_kategori`, `harga_beli`, `harga_jual`, `diskon`, `url_demo`, `status`) VALUES
(11, '2016-09-19 05:23:21', 2, 'cb001', 'CloudBerry-cb001', 'CloudBerry', 8, 0, 1200000, 3, 'software-1474251058.zip', 1),
(12, '2016-09-19 06:23:53', 2, 'dpb001', 'Dropbox-dpb001', 'Dropbox', 7, 0, 50000, 10, 'software-1474253765.zip', 1),
(13, '2016-09-19 05:34:42', 2, 'GM002', 'Gimp-GM002', 'Gimp', 8, 0, 190000, 0, '', 1),
(14, '2016-09-19 06:23:59', 2, 'LGS012', 'Logo-Studio-LGS012', 'Logo Studio', 8, 0, 120000, 12, '', 1),
(15, '2016-09-19 12:23:44', 2, 'MP029', 'Moniries-Payment-MP029', 'Moniries Payment', 6, 0, 450000, 10, '', 1),
(16, '2016-09-05 05:58:58', 2, 'OPN011', 'Aplikasi-OpenVPN--OPN011', 'Aplikasi OpenVPN', 7, 0, 12000, 0, '', 0),
(17, '2016-09-05 06:02:18', 2, 'PCS03', 'Picasa-Image--PCS03', 'Picasa Image', 8, 0, 240000, 0, '', 0),
(18, '2016-09-05 06:04:37', 2, 'WHM003', 'WHMS-Hosting-Manager-WHM003', 'WHMS Hosting Manager', 7, 0, 500000, 0, '', 0),
(19, '2016-09-19 01:36:33', 2, 'MY002', 'Aplikasi-Akuntansi-MYOB-MY002', 'Aplikasi Akuntansi MYOB', 1, 0, 200000, 0, 'software-1474248993.zip', 0),
(20, '2016-09-19 07:51:13', 2, 'LAIN09', 'lain-LAIN09', 'lain', 8, 0, 129999, 1, 'software-1474271473.zip', 0),
(21, '2016-09-30 03:32:58', 2, 'er223', 'dddd-er223', 'dddd', 1, 0, 45000, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk_deskripsi`
--

CREATE TABLE `produk_deskripsi` (
  `ID` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `manual_book` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_deskripsi`
--

INSERT INTO `produk_deskripsi` (`ID`, `id_produk`, `deskripsi_produk`, `manual_book`, `status`) VALUES
(8, 11, '<p>Cloudberry adalah sebuah tool yang digunakan untuk menyimpan data secara cloud dengan kapasitas yang cukup besar yaitu 3GB dan dapat ditambah lagi dengan mengupgrade ke akun profesional.</p>', 'manual_book-1474251058.pdf', 0),
(9, 12, '<p>Dropbox merupakan aplikasi penyimpanan data secara cloud yang mempunyai kapasitas penyimpanan 1GB per user dan dapat ditambahkan dengan mengupgrade akun. Dropbox saat ini mempunyai 3 lokasi dara pusat di berbagai benua.</p>', 'manual_book-1474253765.pdf', 0),
(10, 13, '<p>Gimp adalah sebuah aplikasi yang digunakan untuk mengedit foto dan membuat halaman website. aplikasi ini sama dengan adobe photosop akan tetapi untuk menjalankan aplikasi ini anda harus membayar lisensi seharga yang tertera di atas.</p>', '', 0),
(11, 14, '<p>Logo Studio adalah sebuah aplikasi buatan ANI Studios , digunakan untuk membuat logo baik dari awal maupun untuk mengedit logo yang sudah ada.</p>', '', 0),
(12, 15, '<p>Aplikasi ini berfungsi sebagai aplikasi pembayaran mulai dari pembayaran listrik sampai tagihan kredit sehingga pelanggan dimudahkan dengan aplikasi ini. aplikasi ini menggunakan koneksi aman dalam menjalankan aplikasinya sehingga pengguna tidak perlu khawatir</p>', '', 0),
(13, 16, '<p>OpenVPN adalah aplikasi yang digunakan untuk mengakses internet secara privat sehingga pengguna akan merasa aman dalam melakukan akses internet dan mempercepat dalam proses loading dari sebuah website.</p>', '', 0),
(14, 17, '<p>Picasa adalah produk buatan google yang digunakan untuk backup data berupa file image. aplikasi ini disupport hampir semua sistem operasi terutama windows,linux dan mac, sehingga semua user dapat menjalankan aplikasi ini.</p>', '', 0),
(15, 18, '<p>WHMS Hosting Manager adalah sebuah aplikasi yang digunakan untuk memanage semua fitur yang ada di dalam sebuah hosting maupun vps sehingga pengguna tidak perlu mensetting semua konfigurasi server secara manual</p>', '', 0),
(16, 20, '<p>asdasd</p>', 'manual_book-1474271473.pdf', 0),
(17, 21, '<p>ini adalah prduk baru yaaa</p>', 'manual_book-1474288015.pdf', 0),
(18, 21, '<p>hhhh</p>', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk_gambar`
--

CREATE TABLE `produk_gambar` (
  `ID` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `image1` tinytext NOT NULL,
  `image2` tinytext NOT NULL,
  `image3` tinytext NOT NULL,
  `image4` tinytext NOT NULL,
  `image5` tinytext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_gambar`
--

INSERT INTO `produk_gambar` (`ID`, `id_produk`, `image1`, `image2`, `image3`, `image4`, `image5`) VALUES
(8, 11, 'image1-1473053967.jpg', '', '', '', ''),
(9, 12, 'image1-1473054450.jpg', '', '', '', ''),
(10, 13, 'image1-1473054618.png', '', '', '', ''),
(11, 14, 'image1-1473054718.jpg', '', '', '', ''),
(12, 15, 'image1-1473054935.png', '', '', '', ''),
(13, 16, 'image1-1473055138.png', '', '', '', ''),
(14, 17, 'image1-1473055338.png', '', '', '', ''),
(15, 18, 'image1-1473055477.png', '', '', '', ''),
(16, 20, 'image1-1474271473.png', '', '', '', ''),
(17, 21, 'image1-1474288015.png', '', '', '', ''),
(18, 21, 'image1-1475206249.jpg', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `produk_kategori`
--

CREATE TABLE `produk_kategori` (
  `ID` int(11) NOT NULL,
  `name` char(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_kategori`
--

INSERT INTO `produk_kategori` (`ID`, `name`, `status`) VALUES
(1, 'Akuntansi', 1),
(2, 'Pajak', 1),
(3, 'Perkantoran', 1),
(4, 'Gudang', 1),
(5, 'Logistik', 1),
(6, 'Penjualan', 1),
(7, 'Tools Internet', 1),
(8, 'Aplikasi Desktop', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk_meta`
--

CREATE TABLE `produk_meta` (
  `ID` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `key_meta` varchar(50) NOT NULL,
  `value` varchar(170) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_meta`
--

INSERT INTO `produk_meta` (`ID`, `id_produk`, `key_meta`, `value`) VALUES
(15, 11, 'keywords', 'cloudberrry'),
(16, 11, 'description', 'Cloudberry adalah sebuah tool yang digunakan untuk menyimpan data secara cloud dengan kapasitas yang cukup besar yaitu 3GB dan dapat ditambah lagi dengan mengup'),
(17, 12, 'keywords', 'dropbox'),
(18, 12, 'description', 'Dropbox merupakan aplikasi penyimpanan data secara cloud yang mempunyai kapasitas penyimpanan 1GB per user dan dapat ditambahkan dengan mengupgrade akun. Dropbo'),
(19, 13, 'keywords', 'gimp'),
(20, 13, 'description', 'Gimp adalah sebuah aplikasi yang digunakan untuk mengedit foto dan membuat halaman website. aplikasi ini sama dengan adobe photosop akan tetapi untuk menjalanka'),
(21, 14, 'keywords', 'logostudio'),
(22, 14, 'description', 'Logo Studio adalah sebuah aplikasi buatan ANI Studios , digunakan untuk membuat logo baik dari awal maupun untuk mengedit logo yang sudah ada.'),
(23, 15, 'keywords', 'aplikasi-monities'),
(24, 15, 'description', 'Aplikasi ini berfungsi sebagai aplikasi pembayaran mulai dari pembayaran listrik sampai tagihan kredit sehingga pelanggan dimudahkan dengan aplikasi ini. aplika'),
(25, 16, 'keywords', 'openvpn'),
(26, 16, 'description', 'OpenVPN adalah aplikasi yang digunakan untuk mengakses internet secara privat sehingga pengguna akan merasa aman dalam melakukan akses internet dan mempercepat '),
(27, 17, 'keywords', 'picasa-image'),
(28, 17, 'description', 'Picasa adalah produk buatan google yang digunakan untuk backup data berupa file image. aplikasi ini disupport hampir semua sistem operasi terutama windows,linux'),
(29, 18, 'keywords', 'whms'),
(30, 18, 'description', 'WHMS Hosting Manager adalah sebuah aplikasi yang digunakan untuk memanage semua fitur yang ada di dalam sebuah hosting maupun vps sehingga pengguna tidak perlu '),
(31, 20, 'keywords', 'asd'),
(32, 20, 'description', 'asdasd'),
(33, 21, 'keywords', 'produk-baru'),
(34, 21, 'description', 'ini produk baru'),
(35, 21, 'keywords', 'ggg'),
(36, 21, 'description', 'jj');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL COMMENT '* tidak boleh ada yang sama',
  `user_pass` varchar(200) NOT NULL,
  `user_level` varchar(3) NOT NULL DEFAULT '10' COMMENT '00:admin;01:marketing;03:editor;10:user;',
  `user_registered_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_activation_key` varchar(200) NOT NULL COMMENT 'bentuk MD5',
  `user_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:nonaktif;1:aktif;2:banned'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `user_email`, `user_pass`, `user_level`, `user_registered_date`, `user_activation_key`, `user_status`) VALUES
(2, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '00', '2016-08-24 09:59:59', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `ID` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ktp` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL COMMENT 'L/P',
  `nomor_telp` varchar(14) NOT NULL,
  `profile_pic` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_kode_type` (`id_kode_type`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `log_type`
--
ALTER TABLE `log_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pengajuan_pelanggan`
--
ALTER TABLE `pengajuan_pelanggan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `produk_data`
--
ALTER TABLE `produk_data`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `kode_product` (`kode_produk`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_kategori_2` (`id_kategori`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `produk_deskripsi`
--
ALTER TABLE `produk_deskripsi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk_gambar`
--
ALTER TABLE `produk_gambar`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk_kategori`
--
ALTER TABLE `produk_kategori`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `produk_meta`
--
ALTER TABLE `produk_meta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `id_user` (`id_user`,`id_ktp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log_type`
--
ALTER TABLE `log_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pengajuan_pelanggan`
--
ALTER TABLE `pengajuan_pelanggan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produk_data`
--
ALTER TABLE `produk_data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `produk_deskripsi`
--
ALTER TABLE `produk_deskripsi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `produk_gambar`
--
ALTER TABLE `produk_gambar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `produk_kategori`
--
ALTER TABLE `produk_kategori`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `produk_meta`
--
ALTER TABLE `produk_meta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
