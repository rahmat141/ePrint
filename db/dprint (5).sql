-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 08:20 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dprint`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idbarang` int(11) NOT NULL,
  `nama` text NOT NULL,
  `keterangan` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `kategori` text NOT NULL,
  `foto` text NOT NULL,
  `owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `nama`, `keterangan`, `harga`, `stok`, `kategori`, `foto`, `owner`) VALUES
(27, 'Baju kaos', 'Baju lengan pendek polos', 55000, 500, 'Baju', 'OIP.jpg', 19),
(28, 'Celana ', 'Celana pendek polos', 30000, 2000, 'Celana', 'OIPLC4BMRRP.jpg', 19),
(29, 'Portofolio Sidu', 'Kertas fortofolio 1 rim', 65000, 200, 'Kertas', 'kertas.jpg', 27),
(30, 'Pin', 'Pin bundar, sesuai gambar', 3000, 5000, 'Pin', 'pin.jpg', 27),
(31, 'Stiker ', 'Gambar stiker dapat di rikwes ukuran 15x15cm ', 2000, 500, 'Sticker', 'stiker.jpg', 27),
(32, 'Topi', 'Topi berwarna hitam polos', 15000, 200, 'Topi', 'topihitam.jpg', 19),
(33, 'Topi Putih', 'Topi berwarna putih polos polos', 18000, 350, 'Topi', 'topi_putih.jpg', 20),
(34, 'Pin', 'Pin perangkat desa', 55000, 100, 'Pin', 'download11.jpg', 20),
(35, 'Stiker Desain', 'Stiker berbahan tebal dan lem tidak mudah hilang', 17000, 370, 'Sticker', 'download_(1)1.jpg', 20),
(36, 'Kertas binder', 'Kertas berukuran A5, di jual dalam 1 pak isi 200 lembar', 35000, 400, 'Kertas', 'download_(2)1.jpg', 21),
(37, 'Celana training wanita', 'Celana panjang dewasa wanita', 65000, 600, 'Celana', 'images.jpg', 21),
(38, 'Baju berkera', 'Baju ukuran dewasa', 80000, 5000, 'Baju', 'download_(3).jpg', 21),
(39, 'Spanduk', 'Spanduk ini terbuat dari kertas yang tahan air, ukuran 3x6m', 50000, 200, 'Kertas', '5777883_370c3753-8f0d-405b-a420-89ecdc8b6f19_2048_0.jpg', 25),
(40, 'Baju olahraga muslim', 'Baju ini memiliki panjang hingga di atas lutut, kami menjualnya 1 pasang dengan celanan', 155000, 500, 'Baju', 'download_(4).jpg', 25),
(41, 'Pin berbentuk', 'Pin anggota DPRD', 30000, 5000, 'Pin', 'images_(1).jpg', 25),
(42, 'Kaos Kaki', 'Ukuran dewasa batas mata kaki', 3000, 7000, 'Baju', 'WhatsApp_Image_2020-05-03_at_22_13_14.jpeg', 19);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `nama_pemesan` varchar(250) NOT NULL,
  `bintang` int(11) DEFAULT 5,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `nama_pemesan`, `bintang`, `keterangan`) VALUES
(1, 'Vera', 5, 'WOW hasilnya bagus banget deh'),
(2, 'Fau', 4, 'Bagus !');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(250) NOT NULL,
  `gambar_kategori` varchar(250) NOT NULL,
  `list_paket` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `gambar_kategori`, `list_paket`) VALUES
(1, 'TShirt', 'tshirt.jpeg', 'paket_tshirt.jpeg'),
(2, 'Almamater', 'almet.jpeg', 'paket_alma.jpeg'),
(3, 'Jaket', 'jaket.jpeg', 'paket_jaket.jpeg'),
(4, 'Polo', 'polo.jpeg', 'paket_polo.jpeg'),
(5, 'Hoodie', 'hoodie.jpeg', 'paket_hoodie.jpeg'),
(6, 'Kaos Lapangan', 'kaoslapangan.jpeg', 'paket_rompi.jpeg'),
(7, 'Jersey', 'jersey.jpeg', 'paket_jersey.jpeg'),
(8, 'Jas', 'jaz.jpeg', 'paket_alma.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pakaiian`
--

CREATE TABLE `pakaiian` (
  `id_pakaiian` int(11) NOT NULL,
  `id_kategori` int(250) NOT NULL,
  `paket` varchar(250) NOT NULL,
  `kelas` varchar(250) NOT NULL,
  `jenis_bahan` varchar(250) NOT NULL,
  `jenis_bordir` varchar(250) NOT NULL,
  `kategori_jersey` varchar(250) NOT NULL,
  `jenis_sablon` varchar(250) NOT NULL,
  `ketebalan` varchar(250) NOT NULL,
  `harga` int(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pakaiian`
--

INSERT INTO `pakaiian` (`id_pakaiian`, `id_kategori`, `paket`, `kelas`, `jenis_bahan`, `jenis_bordir`, `kategori_jersey`, `jenis_sablon`, `ketebalan`, `harga`, `keterangan`) VALUES
(1, 2, 'Paket 1', 'Sultan', 'Toyobo + Cotton', 'Bordir Computer', '', '', '', 175000, 'Free Design'),
(2, 1, 'Paket 1', 'Medium', 'Cotton Toto', '', '', 'Rubber', '20s', 68000, 'Free Design KK'),
(3, 1, 'Paket 2', 'Medium', 'Cotton', 'Bordir HP', '', 'rubber', '20s', 60000, 'free design'),
(4, 2, 'Paket 2', 'Reguler', 'Cotton', 'Bordir', '', 'rubber', '20s', 52000, 'free design');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_bayar` varchar(250) NOT NULL,
  `total_bayar` int(250) NOT NULL,
  `nama_pemesan` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `alamat_rumah` varchar(250) NOT NULL,
  `jenis_bayar` int(11) NOT NULL,
  `bukti_bayar` varchar(250) NOT NULL,
  `bukti_dp` varchar(250) DEFAULT NULL,
  `notes` varchar(250) NOT NULL,
  `penilaiian` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `ukuran_s` int(11) NOT NULL,
  `ukuran_m` int(11) NOT NULL,
  `ukuran_l` int(11) NOT NULL,
  `ukuran_xl` int(11) NOT NULL,
  `ukuran_xxl` int(11) NOT NULL,
  `ukuran_3xl` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `total_harga` int(250) NOT NULL,
  `status_pesanan` varchar(250) NOT NULL,
  `tanggal_checkout` date DEFAULT NULL,
  `desain_produk` varchar(250) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `postingan`
--

CREATE TABLE `postingan` (
  `id_posting` int(11) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `gambar2` varchar(250) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `jenis` varchar(250) NOT NULL,
  `caption` varchar(250) NOT NULL,
  `tanggal_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postingan`
--

INSERT INTO `postingan` (`id_posting`, `gambar`, `gambar2`, `id_kategori`, `jenis`, `caption`, `tanggal_upload`) VALUES
(1, '60153a45c4584.jpg', 'ts1.png', 1, 'T-Shrit Impos', 'Ketika kamu jadi impostor tapi kamu bukan jadi suspect be like? mungkin among us sedang booming boomingnya bulan bulan kemarin, tapi ternyata hingga saat ini masih banyak juga loh yang main among us...', '2020-11-05'),
(2, '60154b623f832.jpg', '60154b95300d9.jpg', 2, 'Almamater keren cuy', 'Ketika kamu jadi impostor tapi kamu bukan jadi suspect be like? mungkin among us sedang booming boomingnya bulan bulan kemarin, tapi ternyata hingga saat ini masih banyak juga loh yang main among us...', '2020-11-05'),
(5, '601cf59eefcdb.jpg', '', 1, 'T Shirt wow keren banget', 'OK', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `jenis_pengguna` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `jenis_pengguna`) VALUES
(1, 'Siswa'),
(2, 'Mahasiswa'),
(3, 'Pekerja'),
(4, 'Masyarakat Biasa');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `role_id`, `username`, `email`, `password`, `alamat`, `created_at`, `status`) VALUES
(2, 1, 'Farhan', 'farhando1123@gmail.com', '$2y$10$J3l2QCYtuxKJPJ3QzMW70ebsZV1UT1Q93WNP.J6z8cTurkpL8pJUy', '', '15-11-2020, 06:44:04', 1),
(3, 5, 'desy', 'desyRahmat@gmail.com', '$2y$10$J3l2QCYtuxKJPJ3QzMW70ebsZV1UT1Q93WNP.J6z8cTurkpL8pJUy', 'Bandung Barat', '15-11-2020, 09:01:55', 1),
(4, 2, 'vera', 'veraardianipertiwi@gmail.com', '$2y$10$Nl/u4RBc.Hfsi7KalkCs2u/Ocd9.f6plwM3QkPqCQhkvcdYH95R16', 'Bandung', '08-12-2020, 12:28:46', 1),
(13, 2, 'ikko', 'rezadhioo9@gmail.com', '$2y$10$uv08QQNurfwpmKUm6E1jTeQ6DNJEFlrVYtIabTiLM3caA51u1QRuy', '', '11-02-2021, 06:19:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pakaiian`
--
ALTER TABLE `pakaiian`
  ADD PRIMARY KEY (`id_pakaiian`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `postingan`
--
ALTER TABLE `postingan`
  ADD PRIMARY KEY (`id_posting`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `pakaiian`
--
ALTER TABLE `pakaiian`
  MODIFY `id_pakaiian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postingan`
--
ALTER TABLE `postingan`
  MODIFY `id_posting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
