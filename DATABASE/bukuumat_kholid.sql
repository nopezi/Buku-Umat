-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Sep 2019 pada 23.57
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bukuumat_kholid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama_admin` varchar(225) NOT NULL,
  `jk_admin` enum('laki-laki','perempuan') NOT NULL,
  `telp_admin` char(13) NOT NULL,
  `alamat_admin` text NOT NULL,
  `foto_admin` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`, `nama_admin`, `jk_admin`, `telp_admin`, `alamat_admin`, `foto_admin`) VALUES
(1, 'kholidldk@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Kholidun', 'laki-laki', '089652152699', 'Jl. Sidikan no. 66 Rt. 34 Rw. 09 Sorogenen, Sorosutan UH. 6 Yogyakarta', 'user.png'),
(3, 'antonius@trainit.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'antonius', 'laki-laki', '', 'jogja', '2019_08_01_06_35_48_logo.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_detail_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pembelian` int(11) DEFAULT NULL,
  `nama_produk` varchar(225) DEFAULT NULL,
  `harga_produk` int(11) DEFAULT NULL,
  `berat_produk` int(225) DEFAULT NULL,
  `jumlah_produk` int(225) DEFAULT NULL,
  `subberat_produk` int(11) NOT NULL,
  `subharga_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_detail_pembelian`, `id_produk`, `id_pembelian`, `nama_produk`, `harga_produk`, `berat_produk`, `jumlah_produk`, `subberat_produk`, `subharga_produk`) VALUES
(1, 41, 5, 'Biografi Empat Imam Mazhab', 148500, 846, 1, 846, 148500),
(2, 42, 6, 'Ushul Fikih Tingkat Dasar', 50000, 900, 1, 900, 50000),
(3, 44, 7, 'Amalan di Tanah Suci', 75000, 700, 1, 700, 75000),
(4, 42, 8, 'Ushul Fikih Tingkat Dasar', 50000, 900, 1, 900, 50000),
(5, 48, 9, 'Bahaya Game', 35000, 300, 1, 300, 35000),
(6, 54, 10, 'Ibunda Tokoh-Tokoh Teladan', 49000, 2500, 1, 2500, 49000),
(7, 50, 11, 'Thibbun Nabawi', 60000, 500, 1, 500, 60000),
(8, 51, 12, 'Tuntunan Tobat', 42000, 700, 1, 700, 42000),
(9, 45, 13, 'Amalan Sunnah Sehari-Hari Rasulullah', 70000, 900, 1, 900, 70000),
(10, 45, 14, 'Amalan Sunnah Sehari-Hari Rasulullah', 70000, 900, 1, 900, 70000),
(11, 45, 15, 'Amalan Sunnah Sehari-Hari Rasulullah', 70000, 900, 1, 900, 70000),
(12, 52, 16, 'Sejarah Daulah Umawiyah & Abbasiyah', 99000, 1000, 1, 1000, 99000),
(13, 43, 17, 'Adab-Adab Halaqah Al-Qurâ€™an', 49000, 500, 1, 500, 49000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_produk`
--

CREATE TABLE `foto_produk` (
  `id_foto` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `foto_produk`
--

INSERT INTO `foto_produk` (`id_foto`, `id_produk`, `nama_foto`) VALUES
(105, 42, '2019_07_29_07_42_21_ushul fikih tingkat dasar 2.png'),
(106, 43, '2019_07_29_09_52_04_Adab Adab halaqah Al Quran.png'),
(108, 45, '2019_07_29_09_57_51_Amalan sunah sehari hari.png'),
(111, 48, '2019_07_29_10_05_18_Bahaya game.png'),
(113, 50, '2019_07_29_10_10_14_Thibbun Nabawi.jpg'),
(114, 51, '2019_07_29_10_11_56_Tuntunan Tobat.jpg'),
(115, 52, '2019_07_29_10_15_54_Sejarah Daulah Umawiyah _ Abbasiyah.png'),
(122, 54, '2019_07_29_13_39_51_Ibunda Tokoh tokoh Teladan.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(225) NOT NULL,
  `keterangan_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `keterangan_kategori`) VALUES
(1, 'Sejarah', 'tentang cerita masa lampau '),
(5, 'Biografi', 'Tentang Pribadi seorang tokoh Nasional maupun Internasional '),
(7, 'Parenting', 'Tentang edukasi untuk keluarga, baik pasangan suami istri maupun untuk anaknya '),
(8, 'Muslimah', 'Buku khusus untuk pengembangan diri seorang Muslimah '),
(9, 'Fikih', 'Tentang Ilmu Islam yang terkait bidang Fikih maupun Ushul '),
(10, 'Quran Hadits', 'Buku yang berkaitan dengan pelajaran yang dimuat dalam Al-Quran maupun Al-Hadits '),
(11, 'Umum', 'Buku yang bersifat umum yang masih ada kaitannya dengan keislaman '),
(12, 'Ibadah', 'Mempelajari ibadah Islam sehari-hari '),
(13, 'kesehatan', 'buku tentang sehat cara nabi sesuai Quran dan Sunnah ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `media`
--

CREATE TABLE `media` (
  `id_media` int(11) NOT NULL,
  `nama_media` varchar(225) NOT NULL,
  `foto_media` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `media`
--

INSERT INTO `media` (`id_media`, `nama_media`, `foto_media`) VALUES
(1, 'slider satu', '2018_12_30_04_57_36_RAIN.jpg'),
(2, 'slider dua', '2018_12_30_04_58_35_titiknol_1o7_memberi.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) DEFAULT NULL,
  `tgl_transfer` date DEFAULT NULL,
  `tgl_konfirmasi` date DEFAULT NULL,
  `struk_transfer` varchar(225) DEFAULT NULL,
  `nama_bank` varchar(225) DEFAULT NULL,
  `nama_akun` varchar(225) DEFAULT NULL,
  `jumlah_transfer` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `tgl_transfer`, `tgl_konfirmasi`, `struk_transfer`, `nama_bank`, `nama_akun`, `jumlah_transfer`) VALUES
(1, 2, '2018-07-17', '2018-07-18', 'struk.jpg', 'BRI', 'Azmi', '100000'),
(2, 8, '2019-02-21', '2019-02-21', 'misto transfer BRI buku 30HJJ.jpeg', 'bri', 'Anton', '2771000'),
(3, 10, '2019-06-21', '2019-06-21', 'IMG-20181027-WA0042.jpg', 'bri', 'Antonius', '101000'),
(4, 10, '2019-06-21', '2019-06-21', 'IMG-20181027-WA0042.jpg', 'bri', 'Antonius', '1010000'),
(5, 10, '0000-00-00', '2019-06-21', '', '', '', ''),
(6, 10, '2019-06-21', '2019-06-21', 'IMG-20181030-WA0032.jpg', 'mandiri', 'Antonius', '101000'),
(7, 11, '2019-06-21', '2019-06-21', '', 'bri', 'Arif', '904343'),
(8, 13, '2019-06-28', '2019-06-28', 'IMG-20181029-WA0017.jpg', 'bri', 'Andi', '101000'),
(9, 12, '2019-06-28', '2019-06-28', 'IMG-20181031-WA0017.jpg', 'mandiri', 'Alif', '55000'),
(10, 14, '2019-06-28', '2019-06-28', 'IMG-20181104-WA0032.jpeg', 'bri', 'Joni', '232434'),
(11, 15, '2019-06-28', '2019-06-28', 'IMG-20181112-WA0028.jpg', 'bri', 'Toni', '19999'),
(12, 5, '2019-07-28', '2019-07-29', '', 'bri', 'Kholidun', '170000'),
(13, 7, '2019-06-02', '2019-09-03', '', 'bri', 'Tika', '81107');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `tgl_beli` datetime NOT NULL,
  `total_beli` varchar(225) NOT NULL,
  `total_berat` varchar(225) NOT NULL,
  `total_harga` varchar(225) NOT NULL,
  `biaya_ongkir` varchar(225) NOT NULL,
  `expedisi` varchar(225) NOT NULL,
  `paket_expedisi` varchar(225) NOT NULL,
  `nama_penerima` varchar(225) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `telp_penerima` char(13) NOT NULL,
  `kodepos_penerima` varchar(225) NOT NULL,
  `status_pembelian` varchar(225) NOT NULL,
  `status_kirim` varchar(225) NOT NULL,
  `no_resi` varchar(225) DEFAULT NULL,
  `potongan` int(11) NOT NULL,
  `kode_unik` int(11) NOT NULL,
  `kode_pembelian` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `tgl_beli`, `total_beli`, `total_berat`, `total_harga`, `biaya_ongkir`, `expedisi`, `paket_expedisi`, `nama_penerima`, `alamat_penerima`, `telp_penerima`, `kodepos_penerima`, `status_pembelian`, `status_kirim`, `no_resi`, `potongan`, `kode_unik`, `kode_pembelian`) VALUES
(5, '2019-07-29 06:58:47', '1', '846', '148500', '22000', 'JNE', 'REG', 'Kholidun', 'Krucut no. 90', '08987765645', '45611', 'Lunas', 'pending', '9887665', 0, 306, ''),
(6, '2019-07-29 07:43:59', '1', '900', '50000', '0', 'JNE', 'REG', 'Antonius', 'jogja karta', '09866555', '55111', 'Lunas', 'pending', NULL, 0, 0, ''),
(7, '2019-07-29 23:37:52', '1', '700', '150000', '50000', 'JNE', 'REG', 'Tika', 'Jalan sidikan 78, umbulharjo, yogyakarta', '085803964810', '55111', 'Lunas', 'pending', NULL, 0, 0, ''),
(8, '2019-09-04 02:37:28', '1', '900', '50000', '7000', 'POS Indonesia', 'Paket Kilat Khusus', 'Andi', 'Ciamis kota', '08643746736', '55111', 'Belum Lunas', 'pending', NULL, 0, 789, ''),
(9, '2019-09-04 08:38:53', '1', '300', '200000', '0', 'POS Indonesia', 'Paket Kilat Khusus', 'Pak Herdiesel', 'Jogja', '0898676656', '55111', 'Lunas', 'pending', NULL, 0, 0, ''),
(10, '2019-09-06 10:30:23', '1', '2500', '49000', '18000', 'JNE', 'REG', 'Alif', 'Kantor Trainit', '089655443423', '55715', 'Belum Lunas', 'pending', NULL, 0, 424, ''),
(11, '2019-09-06 10:57:40', '1', '500', '60000', '7000', 'POS Indonesia', 'Paket Kilat Khusus', 'Arif', 'Kantor team trainit', '098987766', '55513', 'Belum Lunas', 'pending', NULL, 20000, 457, 'ZYIP20190906105740'),
(12, '2019-09-06 11:04:18', '1', '700', '42000', '9000', 'JNE', 'OKE', 'Soleh', 'Pajangan', '0897676656', '53211', 'Belum Lunas', 'pending', NULL, 0, 84, 'SYKY06110418'),
(13, '2019-09-06 11:48:01', '1', '900', '70000', '8000', 'TIK', 'ECO', 'Ardia', 'kecamtan bantul', '089787767665', '55715', 'Belum Lunas', 'pending', NULL, 0, 250, 'DFBB06114801'),
(14, '2019-09-06 11:48:26', '1', '900', '70000', '8000', 'TIK', 'ECO', 'Ardia', 'kecamtan bantul', '089787767665', '55715', 'Belum Lunas', 'pending', NULL, 0, 921, 'EKEE06114826'),
(15, '2019-09-06 11:48:54', '1', '900', '70000', '8000', 'TIK', 'ECO', 'Ardia', 'kecamtan bantul', '089787767665', '55715', 'Belum Lunas', 'pending', NULL, 0, 145, 'CNPK06114854'),
(16, '2019-09-06 11:52:25', '1', '1000', '99000', '15000', 'POS Indonesia', 'Paket Kilat Khusus', 'Santoso', 'wong jakarta', '08987676', '10540', 'Belum Lunas', 'pending', NULL, 0, 424, 'EZVK06115225'),
(17, '2019-09-10 05:42:51', '1', '500', '49000', '19000', 'POS Indonesia', 'Paket Kilat Khusus', 'Kholidun', 'Jl. dadap lama blok dodog rt. 08 rw. 03', '089652152699', '45214', 'Belum Lunas', 'pending', NULL, 0, 436, 'HKBH10054251');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `kolom` varchar(225) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id_pengaturan`, `kolom`, `isi`) VALUES
(1, 'rekening pembayran di nota', 'silakan melakukan pembayran ke bang BRI 30181343434,atas nama Kholidun'),
(2, 'email perusahaan toko buku', 'kholid@elkhair.com, elkhari@yahoo.com'),
(3, 'catatan perusahaan', 'biaya kurir yang terlewat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `nama_produk` varchar(225) NOT NULL,
  `penulis` varchar(225) NOT NULL,
  `penerbit` varchar(225) NOT NULL,
  `jenis_cover` varchar(225) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `potongan` int(15) NOT NULL,
  `nominal` int(15) NOT NULL,
  `harga_potongan` int(15) NOT NULL,
  `sinopsis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `isbn`, `nama_produk`, `penulis`, `penerbit`, `jenis_cover`, `harga_produk`, `berat_produk`, `stok_produk`, `potongan`, `nominal`, `harga_potongan`, `sinopsis`) VALUES
(42, 9, '978-602-6579-37-9', 'Ushul Fikih Tingkat Dasar', 'DR. Muhammad Sulaiman Al-Asyqar', 'Ummul Qura', 'Hard Cover', 50000, 900, 93, 0, 0, 50000, '<p>Ushul Fikih merupakan disiplin ilmu tentang cara atau metode mengeluarkan hukum dari dalil-dalilnya, yaitu tentang apa yang dikehendaki oleh perintah dan apa pula yang dikehendaki oleh larangan. Yang menjadi obyek pembahasan disiplin ilmu ini adalah:</p>\r\n\r\n<p>1.&nbsp;&nbsp;&nbsp;&nbsp; Menjelaskan macam-macam hukum dan jenis-jenis hukum seperti wajib, haram, sunnat, makruh, dan mubah.</p>\r\n\r\n<p>2.&nbsp;&nbsp;&nbsp;&nbsp; Menjelaskan macam-macam dalil dan permasalahannya.</p>\r\n\r\n<p>3.&nbsp;&nbsp;&nbsp;&nbsp; Menjelaskan cara mengeluarkan hukum dari dalil-dalilnya.</p>\r\n\r\n<p>4.&nbsp;&nbsp;&nbsp;&nbsp; Menjelaskan ijtihad dan cara-caranya.</p>\r\n\r\n<p>Adapun yang materi menjadi pokok pembahasan Ushul Fikih antara lain:</p>\r\n\r\n<p>1.&nbsp;&nbsp;&nbsp;&nbsp; Hukum,yang di dalamnya meliputi wajib, sunah, makruh, mubah, haram, dan lain-lain.</p>\r\n\r\n<p>2.&nbsp;&nbsp;&nbsp;&nbsp; Adillah ,yaitu dalil-dalil Al-Qur&rsquo;an, As-Sunnah, Ijma&rsquo;, dan Qiyas.</p>\r\n\r\n<p>3.&nbsp;&nbsp;&nbsp;&nbsp; Istinbath atau pengambilan kesimpulan hukum.</p>\r\n\r\n<p>4.&nbsp;&nbsp;&nbsp;&nbsp; Mustanbith, yaitu mujtahid dengan syarat-syaratnya.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ushul Fikih sangat bermanfaat bagi seorang Muslim yang terus menghadapi dinamika sosial sehingga selalu muncul persoalan-persoalan baru didalam masyarakat. Untuk memecahkan persoalan yang beru belum ada nash yang jelas, tentu diperlukan istinbath, yaitu mengeluarkan hukum-hukum baru terhadap berbagai permasalahan yang&nbsp; muncul dengan melakukan ijtihad.</p>\r\n\r\n<p>Buku ini ditulis oleh pakar yang berkompeten dalam disiplin ilmu ini. Sesuai dengan judul aslinya, Al-Wadhih fi Ushul Al-Fiqh, buku ini juga cocok bagi kalangan pemula. Telah teruji sebagai pegangan selama bertahun-tahun bagi para penuntut ilmu, pelajar, mahasiswa, maupun para pengajar.</p>\r\n\r\n<p>Dr. Muhammad Al-Asyqar. Lahir pada 30 September 1930 di Nablus, Palestina. Seorang alim yang merupakan saudara dari alim lainnya, yaitu Dr. Umar Al-Asyqar. Menempuh pendidikan formal di Fakultas Syariah, Riyadh serta meraih gelar magister dan doctor dari Universitas Al-Azhar, Kairo. Semasa hidup belajar: (i) Tafsir dan Ushul Fikih kepada Syekh Muhammad Al-Amin Asy-Syinqithi (penulis Tafsir Adhwa&rsquo; Al-Bayan), (ii) Akidah dan Fikih kepada Syekh Abdul Aziz bin Baz, (iii) Hadits kepada Syekh Abdurrahman Al-Ifriqi, (iv) Fara&rsquo;idh kepada Syekh Abdul Aziz Ar-Rasyid, dan (v) Nahwu kepada Syekh Abdul Lathif Sarhan.</p>\r\n\r\n<p>Semasa hidupnya telah menghasilkan banyak karya selain buku Al-Wadhih fi Ushul Al-Fiqh, di antaranya Zubdah At-Tafsir min Fath Al-Qadir (Ringkasan Tafsir Asy-Syaukani) di bidang Tafsir (dicetak oleh Kementerian Wakaf Kuwait dan Qatar), Shahih Musnad Al-Imam Ahmad &#39;ala Syarth Al-Bukhari di bidang Hadits, Al-Mujalla fi Al-Fiqh Al-Hanbali (2 jilid) di bidang Fikih, Mu&rsquo;jam &lsquo;Ulum Al-Lughah Al-&lsquo;Arabiyyah di bidang Bahasa Arab, dan lain-lain. Wafat pada 5 November 2009 di Amman, Yordania.</p>\r\n'),
(43, 10, '978-979-039-361-5', 'Adab-Adab Halaqah Al-Qurâ€™an', 'Sayyid Mukhtar Abu Syadi', 'Aqwam', 'Soft Cover', 49000, 500, 97, 0, 0, 49000, '<p>&ldquo;Sungguh, Allah telah memberi karunia kepada kaum mukmin ketika Allah mengutus di antara mereka seorang Rasul dari golongan mereka sendiri, yang membacakan kepada mereka ayat-ayat Allah, membersihkan (jiwa) mereka, dan mengajarkan kepada mereka Al-Kitab dan Al-Hikmah.&rdquo; (QS. Al&rsquo;Imran: 164)</p>\r\n\r\n<p>Ayat di atas menunjukan bahwa misi Nabi tidak terbatas pada membacakan Al-Qur&rsquo;an agar dihafal oleh para sahabat, tetapi juga menjelaskan arti dan juga hokum-hukum yang dikandungnya. Nabi menggabungkan antara perhatian terhadap bacaan dan hafalan dengan perhatian terhadap penyucian jiwa dan pengajaran. Hanya menekankan pada hafalan tanpa penghayatan dan keteladanan merupakan pendidikan yang timpang.</p>\r\n\r\n<p>Oleh karena itu, para ulama menekankan pentingnya memerhatikan adab-adab dalam proses belajar mengajar Al-Qur&rsquo;an. Dengannya, akan terbentuk kepribadian qur&rsquo;ani yang tidak hanya terlihat dari beberapa banyak hafalan seseorang, tetapi juga seberapa jauh Al-Qur&rsquo;an menjadi Akhlaknya, sebagaimana kesaksian ibunda aisyah tentang sosok Rasul: &ldquo;adalah akhlak beliau itu Al-Qur&rsquo;an.&rdquo;</p>\r\n\r\n<p>Rasulullah juga pernah bersabda, &ldquo;pada hari kiamat, Al-Qur&rsquo;an dan Ahlul Qur&rsquo;an yang dahulu (di dunia) mengamalkan isinya akan didatangkan, dia diantarkan oleh surah Al-Baqarah dan Al-Imran&rdquo;. (HR Muslim nomor 805). Bila demikian ganjaran bagi Ahlul Qur&rsquo;an yang mengamalkan isinya, bagaimana dengan guru-guru Al-Qur&rsquo;an yang mendidik murid muridnya agar mengamalkan Al-Qur&rsquo;an? Bagaimana dengan guru-guru yang telah menelurkan jumlah murid yang banyak?</p>\r\n\r\n<p>Pada Zaman ini, kita merindukan insan yang membaca Al-Qur&rsquo;an dengan sebenar-benarnya serta berakhlak dengan ajarannya. Manusia-manusia model ini hanya bisa lahir lewat halaqah-halaqah Al-Qur&rsquo;an yang menekankan adab adab dan motivasi yang kuat. Buku ini hadir sebagai panduan dalam rangka menjawab kebutuhan tersebut. Apalagi di tengah semakin meningkatnya kebutuhan dan kesadaran masyarakat kembali kepada Al-Qur&rsquo;an.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(45, 12, '978-979-039-370-7', 'Amalan Sunnah Sehari-Hari Rasulullah', 'Abdullah Bin Hamud Al-Furaih', 'Istanbul', 'Soft cover', 70000, 900, 98, 0, 0, 70000, '<p>&nbsp;&ldquo;Ibnu &lsquo;Atha&rsquo; mengatakan, &lsquo;Barang siapa yang mewajibkan dirinya (melazimi) adab-adab Sunah maka Allah akan menerangi hatinya dengan cahaya makrifat (pengetahuan). Tidak ada kedudukan yang lebih mulia daripada mengikuti Sang Kekasih (Nabi S) dalam berbagai perintah, perbuatan, dan akhlaknya.&rsquo;.&rdquo;&nbsp; (Mad&acirc;rijus S&acirc;lik&icirc;n: II/644).</p>\r\n\r\n<p>Ibnul Qayim juga menjelaskan, bahwa siapa pun yang mewajibkan dirinya atau memaksakan dirinya berkomitmen dengan amalan-amalan sunah yang dicontohkan Rasulullah S maka Allah akan menganugerahkan kepadanya cahaya makrifat, rahmat, manisnya hidup, kehormatan, dan kedudukan yang mulia yang tidak diraih orang lain. Selain itu, mengikuti sunah Nabi S juga akan memberikan &ldquo;buah yang manis&rdquo;, di antaranya: mencapai tingkatan mahabbah (cinta) dari Allah, meraih ma&rsquo;iyyah (kebersamaan dan pertolongan) Allah, serta pengabulan doa.</p>\r\n\r\n<p>Buku yang ada di hadapan pembaca ini, membahas tentang amalan sunah sehari-hari yang senantiasa dikerjakan oleh teladan kita, Nabi Muhammad S, sejak beliau bangun dari tidur hingga beranjak tidur kembali.</p>\r\n\r\n<p>Buku ini memiliki banyak kelebihan, antara lain:</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pembahasan diuraikan secara sistematis.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Setiap amalan didasarkan kepada dalil-dalil yang bersumber dari Nabi S.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Disertai penjelasan beberapa ulama kenamaan, seperti Ibnu Taimiyah, Ibnul Qayyim, Ibnu Hajar Al-Asqalani, An-Nawawi, Ibnu Utsaimin, dan yang lainnya.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jika ada perbedaan pendapat mengenai suatu amalan maka pendapat-pendapat yang ada akan dikemukakan, kemudian dikemukakan pula pendapat yang dipandang rajih (kuat).</p>\r\n\r\n<p>Ketika membaca buku ini, seakan kita menyaksikan langsung rutinitas harian Rasulullah S yang sarat dengan keberkahan dan pahala berlimpah. Jadi, buku ini layak dimiliki setiap muslim yang hendak meneladani amalan sunah sehari-hari Rasulullah S.</p>\r\n'),
(48, 7, '978-979-039-367-7', 'Bahaya Game', 'Syaikh Muhammad Al-Munajjid', 'Aqwam', 'Soft Cover', 35000, 300, 96, 0, 0, 35000, '<p>Salah satu produk dari kemajuan teknologi adalah munculnya permainan atau game elektronik. Alatnya pun beragam; ada PlayStation, Nintendo, Xbox, PC Game, hingga yang kini banyak dipakai adalah game yang dimainkan di gadget seperti smartphone dan komputer tablet. Apalagi banyak anak-anak yang kini menghabiskan waktu bermain game ini baik offline maupun online.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Namun, tahukah Anda bahwa game-game tersebut punya dampak negatif? Kecanduan bermain game ternyata berpengaruh negatif pada tumbuh-kembang anak. Juga, berpengaruh negatif bagi kesehatan fisiknya.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dari sisi kejiwaan, game juga memiliki dampak psikologis yang besar pada anak-anak di dunia nyata. Penelitian ilmiah-akademik menunjukkan, anak-anak yang menghabiskan banyak waktu bermain video memiliki kepribadian lebih agresif dan cenderung berperilaku kurang baik dengan lingkungan sekitar. Mereka bisa agresif terhadap teman, guru, bahkan orangtua.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ini baru sekelumit dari sisi negatif game elektronik yang perlu Anda diketahui. Masih banyak sisi-sisi lain yang diuraikan dalam buku ini. Termasuk menjawab pertanyaan soal ada tidaknya sisi positif darinya. Jika ada, apa saja kriterianya. Terakhir&mdash;dan yang paling penting&mdash;adalah bagaimana syariat Islam memandang fenomena game ini. Semoga dengan buku ini pembaca bisa mengetahui dan mengantisipasi bahaya game.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(50, 13, '978-979-039-348-6', 'Thibbun Nabawi', 'Shubhi Sulaiman', 'Istanbul', 'Soft Cover', 60000, 500, 97, 0, 0, 60000, '<p>Kita sering mendengar petuah-petuah Nabi S seputar pola makan, tata cara bersuci, dan banyak kegiatan lain yang mengarah ke dampak kesehatan kita. Selama ini, sabda-sabda tersebut jarang digali sisi ilmiahnya, selain sebatas sebuah perintah dari manusia agung yang harus ditaati.</p>\r\n\r\n<p>Dalam buku ini, penulis mengurai selaksa misteri hikmah medis di balik sabda-sabda Nabi. Hikmah yang membawa dampak pada kesehatan fisik kita. Sebuah kajian unik, mengingat selama ini kita lebih sering mengenal Nabi sebagai tabib rohani. Jarang yang mengaitkan langsung dengan dampak fisik/jasmani.</p>\r\n\r\n<p>Jadi, selain jiwa yang puas mengharap pahala dengan mengikuti perintah beliau, jasmani kita pun mendulang manfaat dari kebenaran sabda-sabdanya.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(51, 12, '978-979-039-336-3', 'Tuntunan Tobat', 'Muhammad Nabil Dhaif', 'Istanbul', 'Soft Cover', 42000, 700, 97, 0, 0, 42000, '<p>Dikisahkan, seorang lelaki telah beribadah selama 70 tahun. Namun, di ujung usianya ia terperosok dalam maksiat; berzina dengan seorang wanita selama 7 hari. Ia kemudian melakukan perjalanan dengan setiap selangkah kakinya, dia shalat dan sujud, begitu seterusnya demi menebus kesalahannya.</p>\r\n\r\n<p>Akhirnya, lelaki tersebut meninggal dalam keadaan lemah dan lapar karena satu-satunya roti yang dimilikinya dia sedekahkan kepada orang lain yang juga lapar.</p>\r\n\r\n<p>Amal ibadahnya selama 70 tahun kemudian ditimbang dengan dosa zinanya selama 7 hari. Ternyata, dosa 7 harinya lebih berat ketimbang 70 tahun ibadahnya. Sedekah rotinya pun kemudian ditimbang dengan dosa 7 harinya. Ternyata, sedekah rotinya lebih berat pahalanya ketimbang dosa 7 harinya.</p>\r\n\r\n<p>Demikianlah, tidak ada manusia yang tidak berdosa; dan satu-satunya penebus dosa adalah tobat.</p>\r\n\r\n<p>Buku ini akan menuntun kita untuk menimbang diri sendiri sebelum pengadilan akhirat menimbang dan memutuskan nasib kita. Kita akan diajak untuk mengenal dengan lebih baik sifat Pengampun dan Penyayangnya Allah, mengetahui beberapa amalan yang dapat melebur dosa, dan membawa kita masuk ke alam bawah sadar untuk membayangkan dan merasakan bagaimana mati, dimandikan, dikafani, dishalati, dan diantar ke kubur.</p>\r\n\r\n<p>Beberapa kisah klasik yang unik tentang tobat para hamba dan kebesaran sifat Allah Yang Maha Pengampun di dalamnya menjadikannya tak sekadar sebagai buku tuntunan, tetapi juga motivasi. Yaitu motivasi ruhiyah bagi yang ingin bertobat, tetapi bingung bagaimana dan kapan harus memulainya.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(52, 1, '978-602-7637-54-2', 'Sejarah Daulah Umawiyah & Abbasiyah', 'Dr. Ali Muhammad Ash-Shallabi', 'Ummul Qura', 'Hard cover', 99000, 1000, 97, 0, 0, 99000, '<p>Daulah Umawiyah dan Daulah Abbasiyah merupakan dua dinasti yang dikenal sebagai penerus pemerintahan Khulafa&rsquo; Rasyidin. Selama ratusan tahun kedua khilafah tersebut berhasil melewati beragam tantangan zaman dan menorehkan segudang prestasi. Meski demikian, sunnatullah tetap berlaku: &ldquo;Dan masa (kejayaan dan kehancuran) itu, Kami pergilirkan di antara manusia (agar mereka mendapat pelajaran).&rdquo; (Surah Ali &lsquo;Imran: 140).</p>\r\n\r\n<p>Dari sini, Daulah Umawiyah dan Daulah Abbasiyah menjadi kajian historis yang menarik untuk dipelajari. Apa saja faktor-faktor yang mendorong kesuksesan maupun kemundurannya perlu diketahui oleh kaum Muslimin. Oleh karenanya, dibutuhkan buku pegangan yang kredibel, lengkap, namun tidak terlalu &lsquo;berat&rsquo; untuk dikaji oleh berbagai level penuntut ilmu. Kiranya buku karya Dr. Ali Ash-Shallabi ini memenuhi kriteria tersebut. Penulis yang dikenal otoritatif dengan banyak karya tentang sejarah Islam ini menyajikan banyak info menarik di dalam buku ini, seperti:</p>\r\n\r\n<p>-&nbsp;&nbsp; Latar belakang historis Bani Umayyah dan Bani Abbasiyah</p>\r\n\r\n<p>-&nbsp;&nbsp; Proses transisi politik dari Khulafa&rsquo; Rasyidin ke Daulah Umawiyah kemudian Daulah Abbasiyah.</p>\r\n\r\n<p>-&nbsp;&nbsp; Kemajuan dan perkembangan peradaban yang berhasil dicapai pada masa kedua negara tersebut, baik dari sisi ilmiah, politik, ekonomi, maupun militer.</p>\r\n\r\n<p>-&nbsp;&nbsp; Deskripsi kejayaan, kemunduran, hingga keruntuhan Bani Umayyah dan Bani Abbasiyah</p>\r\n\r\n<p>-&nbsp;&nbsp; Keistimewaan Umar bin Abdul Aziz dan era berkuasanya para amir dan gubernur.</p>\r\n\r\n<p>-&nbsp;&nbsp; Prestasi negara otonom Daulah Aghalibah di Afrika Utara di bawah Khilafah Abbasiyah.</p>\r\n\r\n<p>-&nbsp;&nbsp; Kemunculan dan perkembangan Khawarij, khususnya sekte Ibadhiyah di Afrika Utara.</p>\r\n\r\n<p>Topik-topik menarik di atas sayang untuk dilewatkan</p>\r\n'),
(54, 8, '978 -979-039-359-2', 'Ibunda Tokoh-Tokoh Teladan', 'Jumâ€™ah Saâ€™ad Fathul Bab', 'Aqwam', 'Soft Cover', 49000, 2500, 96, 0, 0, 49000, '<p>&ldquo;Di belakang orang yang hebat ada sosok wanita yang hebat pula&rdquo;. Ungkapan ini populer kita dengar. itu pula yang coba dibuktikan oleh penulis. Buku yang berJudul asli <em>Mothers Made Ideals </em>ini menghimpun kisah-kisah munculnya orang-orang hebat dalam sejarah umat Islam.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Seorang ibu adalah pilar masyarakat. Ia adalah sekolah yang pertama sekaligus terbaik. Contoh idealnya adalah ibunda Khadijah RA, istri Rasulullah SAW. Sosok yang kemudian melahirkan dan membesarkan salah satu figur wanita terbaik, yaitu Fatimah binti Muhammad SAW. Dari rahim ibu terbaik, Fatimah berkembang menjadi pendamping terbaik dari salah seorang manusia terbaik, yaitu Ali bin Abi Thalib, yang telah di jamin Nabi SAW masuk surga. Dari kedua manusia terbaik in kemudian lahir para pemuda terbaik Al-Hasan dan Al-Husain dan cucu kesanyangan Rasul SAW. Demikian seterusnya; tokoh-tokoh terbaik memang lahir dari para ibu terbaik.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dalam buku ini , kita akan jumpai dengan sejumlah tokoh dan ibu mereka, seperti:</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Istri Imran dan putrinya Maryam, ibunda dari Nabi Isa AS.</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Para ibu terbaik dari kalangan sahabiyah Nabi, seperti Asma&rsquo; binti Abu Bakar RA, ibu dari sosok pemimpin besar Abdullah bin Az-Zubbair dan ulama sekelas Urwah bin Az-Zubair RA.</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ibunda para Imam seperti Imam Malik, As-Syafi&rsquo;i, Ahmad dan Al-Bukhori.</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ibunda para figur kontemporer seperti Syekh As-Sudais, Imam Al-Masjid Al-Haram, serta para wanita yang telah mendidik putra-putra berprestasi dari berbagai belahan dunia Islam.</p>\r\n\r\n<p>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Prestasi mereka inilah yang layak di pelajari &ldquo;resep rahasianya&rdquo;. Dengan membaca kisah-kisah hidup, pembaca akan menyaksikan bagaimana keteladan ibu dalam mendidik dan menanamkan&nbsp; karakter mulia para ulama dan tokoh teladan pemimpin umat.</p>\r\n\r\n<p>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tak lupa, penulis juga merangkum kiat-kiat penting bagi para ibu dalam menanamkan dasar-dasar agama dan pokok-pokok akidah Islamiyah untuk buah hati, karena inilah kunci sukses dunia dan akhirat. Semoga, buku ini menjadi awal yang baik dari lahirnya generasi terbaik pada masa kita.</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request`
--

CREATE TABLE `request` (
  `id_request` int(11) NOT NULL,
  `nama_request` varchar(225) NOT NULL,
  `hp_request` char(13) NOT NULL,
  `judul_request` varchar(225) NOT NULL,
  `penulis` varchar(225) NOT NULL,
  `penerbit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `request`
--

INSERT INTO `request` (`id_request`, `nama_request`, `hp_request`, `judul_request`, `penulis`, `penerbit`) VALUES
(1, 'Toni', '08976767563', 'Tobat', 'kholid', 'elkhair'),
(2, 'Midun', '0876655323', 'Mohon ampun', 'Abdur Rahman', 'Aqwam'),
(3, 'Nirwan', '0087878343', 'Api Sejarah', 'A. Mansur Surya Negara', 'Pena'),
(4, 'Tangin', '089765543', 'Rindu Kekasih', 'Zaki', 'Kos 66'),
(5, 'Idun', '08874384738', 'Hamka Sejarah', 'Abdul Somad', 'Pro-U'),
(6, 'Anton', '08978748', 'Laskar Pelangi', 'Andrea Hirata', 'Republika'),
(7, 'Arif', '09993439439', '30 Hari Jago Jualan', 'Dewa Eka Prayoga', 'billionaire Store'),
(8, 'Alif', '0893483', 'PHP', 'Arif', 'Trainit'),
(9, 'Antonius', '089876544', 'Laskar Pelangi', 'Arif', 'Team Trainit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `nama_testimoni` varchar(100) NOT NULL,
  `isi_testimoni` text NOT NULL,
  `foto_testimoni` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `nama_testimoni`, `isi_testimoni`, `foto_testimoni`) VALUES
(1, 'Hapsari Wulandari', 'Setelah Saya beli buku di Buku Umat, saya membaca buku *Nikmatnya Pacaran Setelah Pernikahan*. Isi bukunya, membuat perempuan semakin mantap memperbaiki diri dan ingin disggerakan. Yaa, di buku itu isinya memang contoh2 kehidupannya Rasulullah..dan memang patut kita conoh. ', 'wulan.jpeg'),
(2, 'RK Nirwan', 'Pesan buku di Buku Umat yang saya suka yaitu bisa request buku yang saya cari, alhamdulillah adminnya baik banget, mau mencarikan buku pilihan saya.', 'rk nirwan.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voucher`
--

CREATE TABLE `voucher` (
  `id_voucher` int(11) NOT NULL,
  `kode_voucher` varchar(225) NOT NULL,
  `potongan` int(11) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `voucher`
--

INSERT INTO `voucher` (`id_voucher`, `kode_voucher`, `potongan`, `status`) VALUES
(1, 'bukuumat', 20000, 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detail_pembelian`);

--
-- Indeks untuk tabel `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id_media`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_request`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indeks untuk tabel `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id_voucher`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detail_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `foto_produk`
--
ALTER TABLE `foto_produk`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `request`
--
ALTER TABLE `request`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id_voucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
