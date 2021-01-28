-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Des 2020 pada 19.35
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_lengkap_admin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `umur` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `nama_lengkap_admin`, `alamat`, `jenis_kelamin`, `status`, `umur`, `gambar`) VALUES
(2, 'fau', '', '', '', '', 0, 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `almamater`
--

CREATE TABLE `almamater` (
  `ID` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kualitas` varchar(250) NOT NULL,
  `jenis_bahan1` varchar(250) NOT NULL,
  `jenis_bahan2` varchar(250) NOT NULL,
  `jenis_bordir` varchar(250) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `almamater`
--

INSERT INTO `almamater` (`ID`, `id_kategori`, `kualitas`, `jenis_bahan1`, `jenis_bahan2`, `jenis_bordir`, `harga`, `keterangan`) VALUES
(1, 2, 'Sultan', 'Toyobo', 'Cotton', 'Bordir Komputer', 175000, 'Free Design (edit sendiri aja nannti ya)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
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
-- Dumping data untuk tabel `barang`
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
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `nama_pemesan` varchar(250) NOT NULL,
  `bintang` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `nama_pemesan`, `bintang`, `keterangan`) VALUES
(1, 'Vera', 5, 'WOW hasilnya bagus banget deh'),
(2, 'Fau', 2, 'Jelek banget');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hoodie`
--

CREATE TABLE `hoodie` (
  `ID` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kualitas` varchar(250) NOT NULL,
  `jenis_bahan1` varchar(250) NOT NULL,
  `jenis_sablon_dan_bordir` varchar(250) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hoodie`
--

INSERT INTO `hoodie` (`ID`, `id_kategori`, `kualitas`, `jenis_bahan1`, `jenis_sablon_dan_bordir`, `harga`, `keterangan`) VALUES
(1, 5, 'Medium', 'Diadora', 'Plastisol Ink', 175000, 'Free Desing (edit sendiri ya ver)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jaket`
--

CREATE TABLE `jaket` (
  `ID` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kualitas` varchar(250) NOT NULL,
  `jenis_bahan1` varchar(250) NOT NULL,
  `jenis_bahan2` varchar(250) NOT NULL,
  `jenis_bordir` varchar(250) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jaket`
--

INSERT INTO `jaket` (`ID`, `id_kategori`, `kualitas`, `jenis_bahan1`, `jenis_bahan2`, `jenis_bordir`, `harga`, `keterangan`) VALUES
(1, 3, 'Reguler', 'Vegas', 'American Drill', 'Bordir Komputer', 190000, 'Free Design (oke)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jas`
--

CREATE TABLE `jas` (
  `ID` int(11) NOT NULL,
  `ID_Kategori` int(11) DEFAULT NULL,
  `kualitas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jersey`
--

CREATE TABLE `jersey` (
  `ID` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kualitas` varchar(250) NOT NULL,
  `jenis_bahan1` varchar(250) NOT NULL,
  `kategori_jersey` varchar(250) NOT NULL,
  `jenis_sablon` varchar(250) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kaoslapangan`
--

CREATE TABLE `kaoslapangan` (
  `ID` int(11) NOT NULL,
  `ID_kategori` int(11) NOT NULL,
  `kualitas` varchar(100) NOT NULL,
  `jenis_bahan1` varchar(255) NOT NULL,
  `jenis_bahan2` varchar(255) NOT NULL,
  `jenis_bordir` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kaoslapangan`
--

INSERT INTO `kaoslapangan` (`ID`, `ID_kategori`, `kualitas`, `jenis_bahan1`, `jenis_bahan2`, `jenis_bordir`, `harga`, `keterangan`) VALUES
(1, 6, 'Sultan', 'Hisofy', 'Hisofy Drill', 'Bordir Komputer', 160000, 'Free Design');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(250) NOT NULL,
  `gambar_kategori` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `gambar_kategori`) VALUES
(1, 'TShirt', ''),
(2, 'Almamater', ''),
(3, 'Jaket', ''),
(4, 'Polo', ''),
(5, 'Hoodie', ''),
(6, 'KaosLapangan', ''),
(7, 'Jersey', ''),
(61, 'Jas', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_lengkap_konsumen` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `umur` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`id_konsumen`, `username`, `nama_lengkap_konsumen`, `alamat`, `jenis_kelamin`, `status`, `umur`, `gambar`, `tanggal_lahir`) VALUES
(6, 'adhil', 'M. Abdillah', 'Jl Poros Matompi', 'Laki-laki', '', 0, 'default.png', '2005-02-28'),
(7, 'faizah', 'Faizah Hasanah', 'Jl Ahmad Yani', 'Perempuan', '', 0, 'default.png', '2002-05-06'),
(8, 'sunarti', 'Sunarti', 'Jl. Benteng Raya', 'Perempuan', '', 0, 'default.png', '1989-06-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
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
  `bukti_bayar` varchar(250) NOT NULL,
  `notes` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `id_user`, `tanggal_bayar`, `total_bayar`, `nama_pemesan`, `email`, `phone`, `alamat_rumah`, `bukti_bayar`, `notes`) VALUES
(1, 8, '1608748426', 1035000, 'asdsa', 'm.abizard1123@gmail.com', '12312312', 'asdasdsa', '5fe38d8a4d037.jpg', 'asdasdsa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
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
  `desain_produk` varchar(250) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pesanan`, `id_barang`, `id_kategori`, `ukuran_s`, `ukuran_m`, `ukuran_l`, `ukuran_xl`, `ukuran_xxl`, `ukuran_3xl`, `jumlah_barang`, `harga_paket`, `total_harga`, `status_pesanan`, `desain_produk`, `id_user`, `id_bayar`) VALUES
(4, 3, 1, 100, 0, 0, 0, 0, 0, 100, 2000, 200000, 'pesanan selesai', 'tidak upload desain', 1, 0),
(5, 1, 2, 6, 7, 6, 0, 0, 0, 19, 175000, 3325000, 'pesanan selesai', 'tidak upload desain', 1, 0),
(7, 3, 1, 1, 0, 1, 0, 0, 0, 2, 2000, 4000, 'di dalam keranjang', 'tidak upload desain', 1, 0),
(9, 1, 3, 2, 0, 0, 0, 0, 0, 2, 190000, 380000, 'di dalam keranjang', '5fba3bc52bf33.jpeg', 1, 0),
(10, 3, 1, 1, 0, 0, 0, 0, 0, 1, 2000, 2000, 'di dalam keranjang', '5fba3d2b8119b.jpeg', 1, 0),
(11, 1, 1, 1, 0, 0, 1, 0, 0, 2, 80000, 160000, 'di dalam keranjang', 'tidak upload desain', 1, 0),
(13, 1, 2, 5, 0, 0, 0, 0, 0, 5, 175000, 875000, 'pending', 'tidak upload desain', 8, 1),
(14, 1, 1, 2, 0, 0, 0, 0, 0, 2, 80000, 160000, 'pending', 'tidak upload desain', 8, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `idpesanan` int(11) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
  `jumlahbarang` int(11) NOT NULL,
  `hargabarang` int(11) NOT NULL,
  `totalharga` int(11) NOT NULL,
  `kategoribarang` varchar(100) NOT NULL,
  `keteranganbarang` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `namakonsumen` varchar(100) NOT NULL,
  `idbarang` varchar(10) NOT NULL,
  `statuspemesanan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `polo`
--

CREATE TABLE `polo` (
  `ID` int(11) NOT NULL,
  `ID_kategori` int(11) NOT NULL,
  `kualitas` varchar(100) NOT NULL,
  `jenis_bahan` varchar(255) NOT NULL,
  `jenis_bordir` varchar(255) NOT NULL,
  `harga` int(250) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `polo`
--

INSERT INTO `polo` (`ID`, `ID_kategori`, `kualitas`, `jenis_bahan`, `jenis_bordir`, `harga`, `keterangan`) VALUES
(1, 4, 'Sultan', 'Lacoste Cotton Pique', 'Bordir Komputer', 115000, 'Free Design');

-- --------------------------------------------------------

--
-- Struktur dari tabel `postingan`
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
-- Dumping data untuk tabel `postingan`
--

INSERT INTO `postingan` (`id_posting`, `gambar`, `gambar2`, `id_kategori`, `jenis`, `caption`, `tanggal_upload`) VALUES
(1, 'ts1.png', '', 1, 'T-Shrit Impostor', 'Ketika kamu jadi impostor tapi kamu bukan jadi suspect be like🙃 mungkin among us sedang booming boomingnya bulan bulan kemarin, tapi ternyata hingga saat ini masih banyak juga loh yang main among us...\r\n', '2020-11-05'),
(2, 'ts1.png', '', 2, 'Almamater keren cuy', 'Ketika kamu jadi impostor tapi kamu bukan jadi suspect be like🙃 mungkin among us sedang booming boomingnya bulan bulan kemarin, tapi ternyata hingga saat ini masih banyak juga loh yang main among us...\r\n', '2020-11-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `jenis_pengguna` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`role_id`, `jenis_pengguna`) VALUES
(1, 'Siswa'),
(2, 'Mahasiswa'),
(3, 'Pekerja'),
(4, 'Masyarakat Biasa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rompi`
--

CREATE TABLE `rompi` (
  `ID` int(11) NOT NULL,
  `ID_kategori` int(11) NOT NULL,
  `kualitas` varchar(100) NOT NULL,
  `jenis_bahan1` varchar(255) NOT NULL,
  `jenis_bahan2` varchar(255) NOT NULL,
  `jenis_bordir` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pesanan` varchar(250) NOT NULL,
  `nama_pemesan` varchar(250) NOT NULL,
  `no_hp_pemesan` varchar(250) NOT NULL,
  `alamat_pemesan` varchar(250) NOT NULL,
  `note` varchar(250) NOT NULL,
  `tanggal_bayar` varchar(250) NOT NULL,
  `bukti_bayar` varchar(250) NOT NULL,
  `status_pesanan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tshirt`
--

CREATE TABLE `tshirt` (
  `ID` int(11) NOT NULL,
  `ID_kategori` int(11) NOT NULL,
  `kualitas` varchar(255) NOT NULL,
  `jenis_bahan` varchar(100) NOT NULL,
  `ketebalan_bahan` varchar(255) NOT NULL,
  `jenis_sablon` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tshirt`
--

INSERT INTO `tshirt` (`ID`, `ID_kategori`, `kualitas`, `jenis_bahan`, `ketebalan_bahan`, `jenis_sablon`, `harga`, `keterangan`) VALUES
(1, 1, 'Sultan', 'Cotton Hoka', '24s', 'Plastisol', 80000, 'Free Design'),
(3, 1, 'Sultan', 'Cotton Hoka', '24s', 'Plastisol', 2000, 'Free Design');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `role_id`, `username`, `email`, `password`, `alamat`, `created_at`, `status`) VALUES
(2, 1, 'Farhan', 'abizardo1123@gmail.com', '$2y$10$kPaYcSwrQTOFwfQ0WWo24OzPoyDBEBDfZmMd6/4ikUkJoCMDR17vm', '', '15-11-2020, 06:44:04', 1),
(3, 5, 'desy', 'desyRahmat@gmail.com', '$2y$10$J3l2QCYtuxKJPJ3QzMW70ebsZV1UT1Q93WNP.J6z8cTurkpL8pJUy', '', '15-11-2020, 09:01:55', 1),
(4, 2, 'vera', 'veraardianipertiwi@gmail.com', '$2y$10$Nl/u4RBc.Hfsi7KalkCs2u/Ocd9.f6plwM3QkPqCQhkvcdYH95R16', '', '08-12-2020, 12:28:46', 1),
(5, 1, 'abii2', 'abizard@student.telkomuniversity.ac.id', '$2y$10$RLqazHC7zryUkThcHFhzKe5wmx6hZP5FmynDI7Ufp08MYNfsIbnri', '', '08-12-2020, 12:34:15', 1),
(7, 2, 'abizard11', 'abizardoalvaredo1123@gmail.com', '$2y$10$MIskl5bcvRfzGHDPFFWUuecrNS6zY6j/8Db5yRxA9AJqMpUXJMFyC', '', '08-12-2020, 12:42:04', 0),
(8, 2, 'abii31', 'm.abizard1123@gmail.com', '$2y$10$F3l2wWkttymsmNW.SkT1yeaUgYPiAzPVrsQdpmdSTTdODAbqnHqdy', '', '23-12-2020, 15:55:44', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(6, 'desyRahmat@gmail.com', 'gBAGKfcOaWUkeI3SH2NR5YNm0/UXToWyMEys9EkBzGE=', 1605427315),
(9, 'abizardoalvaredo1123@gmail.com', 'eTncCBG6o9+nQCsPJcLP43VKXqbCWPf+iSsrXiToScY=', 1607427532),
(10, 'abizardoalvaredo1123@gmail.com', 'YudOO01oe5qbTkX0o7rZUvQO0sQGzGwZ4kUqn30UCK8=', 1607427724);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_lengkap_vendor` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `umur` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`id_vendor`, `username`, `nama_lengkap_vendor`, `alamat`, `jenis_kelamin`, `status`, `umur`, `gambar`) VALUES
(9, 'rajawali', 'Rajawali Printing', 'Jl Buah Batu', 'Laki-laki', '', 0, 'default.png'),
(10, 'trapesium', 'Trapesium', 'Jl.Telekomunikasi', 'Laki-laki', '', 0, 'default.png'),
(11, 'familly', 'Familly Printing', 'Jl. Poros Timampu', 'Perempuan', '', 0, 'default.png'),
(12, 'baruga', 'Baruga Printing', 'Jl Poros Wawondula', 'Laki-laki', '', 0, 'default.png'),
(15, 'join', '', '', '', '', 0, 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `almamater`
--
ALTER TABLE `almamater`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indeks untuk tabel `hoodie`
--
ALTER TABLE `hoodie`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `jaket`
--
ALTER TABLE `jaket`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `jas`
--
ALTER TABLE `jas`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `jersey`
--
ALTER TABLE `jersey`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `kaoslapangan`
--
ALTER TABLE `kaoslapangan`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`idpesanan`);

--
-- Indeks untuk tabel `polo`
--
ALTER TABLE `polo`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `postingan`
--
ALTER TABLE `postingan`
  ADD PRIMARY KEY (`id_posting`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `rompi`
--
ALTER TABLE `rompi`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tshirt`
--
ALTER TABLE `tshirt`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `almamater`
--
ALTER TABLE `almamater`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `hoodie`
--
ALTER TABLE `hoodie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jaket`
--
ALTER TABLE `jaket`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jas`
--
ALTER TABLE `jas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jersey`
--
ALTER TABLE `jersey`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kaoslapangan`
--
ALTER TABLE `kaoslapangan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `idpesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `polo`
--
ALTER TABLE `polo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `postingan`
--
ALTER TABLE `postingan`
  MODIFY `id_posting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rompi`
--
ALTER TABLE `rompi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tshirt`
--
ALTER TABLE `tshirt`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
