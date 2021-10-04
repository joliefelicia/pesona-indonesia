-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Okt 2021 pada 07.33
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_wisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `adminID` char(4) NOT NULL,
  `adminNAMA` varchar(30) NOT NULL,
  `adminEMAIL` varchar(60) NOT NULL,
  `adminPASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`adminID`, `adminNAMA`, `adminEMAIL`, `adminPASSWORD`) VALUES
('id01', 'UAS', 'UAS@YAHOO.COM', '1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `area`
--

CREATE TABLE `area` (
  `areaID` char(4) NOT NULL,
  `areanama` char(35) NOT NULL,
  `areawilayah` char(35) NOT NULL,
  `areaketerangan` varchar(255) NOT NULL,
  `provinsiID` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `area`
--

INSERT INTO `area` (`areaID`, `areanama`, `areawilayah`, `areaketerangan`, `provinsiID`) VALUES
('id03', 'Sleman', 'Sleman', 'Kabupaten', '03'),
('id05', 'Singkawang', 'Singkawang', 'desa', '04'),
('id07', 'Medan', 'Medan', 'Ibukota', '02'),
('id08', 'Pontianak', 'Pontianak', 'Ibukota', '04'),
('id09', 'Jakarta Utara', 'Jakarta Utara', 'Kabupaten', '01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiID` char(5) NOT NULL,
  `destinasinama` varchar(35) NOT NULL,
  `destinasialamat` varchar(255) NOT NULL,
  `kategoriID` char(4) NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `destinasi`
--

INSERT INTO `destinasi` (`destinasiID`, `destinasinama`, `destinasialamat`, `kategoriID`, `areaID`) VALUES
('id01', 'Pasir Panjang', 'Jl. Pasir Panjang No.89, Sedau, Singkawang Sel', 'wk01', 'id05'),
('id02', ' Merapi', 'jl gunung merapi', 'wk01', 'id03'),
('id03', ' Toba', 'jl Danau Toba', 'wk01', 'id07'),
('id04', 'Kapuas', 'Jl Kapuas', 'wk01', 'id08'),
('id05', 'Museum Negeri Sejarah Budaya Khas', 'Jl. Jenderal Ahmad Yani, Parit Tokaya, Kec. Pontianak Selatan, Kota Pontianak, Kalimantan Barat.', 'wk13', 'id08'),
('id06', 'Pantai Ancol', 'JL. Lodan Timur,', 'wk01', 'id09'),
('id07', 'Prambanan', 'Jl. Raya Solo – Yogyakarta No.16, Kranggan, Bokoharjo, Prambanan, Sleman, Daerah Istimewa Yogyakarta 55571', 'wk13', 'id03'),
('id08', 'Dufan', 'Jl. Lodan Timur No.7, RW.10, Ancol, Kec. Pademangan, Kota Jakarta Utara', 'wk14', 'id09'),
('id09', 'Kolam Renang JC Oevang Oeray', 'Jl. Letkol Soegiono, Akcaya, Kec. Pontianak Selatan, Kota Pontianak, Kalimantan Barat.', 'wk14', 'id08'),
('id10', 'Pulau Simping', 'Sedau, Kec. Singkawang Selatan, Kota Singkawang, Kalimantan Barat.', 'wk01', 'id05'),
('id11', 'Bukit Bougenvil', 'Jl. Pertanian, Sijangkung, Kec. Singkawang Selatan, Kota Singkawang, Kalimantan Barat.', 'wk01', 'id05'),
('id12', 'Air Terjun Sipiso Piso', 'jl  Pengambaten, Merek, Karo Regency', 'wk01', 'id07'),
('id13', 'Hillpark Sibolangit', 'Jl. Raya Merek KM 9. Deli Serdang', 'wk14', 'id07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `fotoID` char(5) NOT NULL,
  `fotonama` char(60) NOT NULL,
  `destinasiID` char(4) NOT NULL,
  `fotofile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fotodestinasi`
--

INSERT INTO `fotodestinasi` (`fotoID`, `fotonama`, `destinasiID`, `fotofile`) VALUES
('ft001', 'Sungai Kapuas', 'id04', 'kapuas.jpg'),
('ft002', 'Gunung Merapi', 'id02', 'gunung merapi.jpg'),
('ft003', 'Pasir Panjang', 'id01', 'pasir panjang.jpg'),
('ft004', 'Danau Toba', 'id03', 'danau toba.jpg'),
('ft005', 'Museum Negeri Sejarah Budaya Khas', 'id05', 'museum.jpg'),
('ft006', 'Pantai Ancol', 'id06', 'ancol.jpg'),
('ft007', 'Candi Prambanan', 'id07', 'prambanan.jpg'),
('ft008', 'Wahana Dufan', 'id08', 'Dufan.jpg'),
('ft009', 'Kolam Renang JC Oevang Oeray', 'id09', 'kolamrenang.jpg'),
('ft010', 'Pulai Simping', 'id10', 'pulausimping.jpg'),
('ft011', 'Bukit Bougenvil', 'id11', 'bukitbougenvil.jpg'),
('ft012', 'Air Terjun Sipiso Piso', 'id12', 'air terjun sipiso-piso.jpg'),
('ft013', 'Hillpark Sibolangit', 'id13', 'Wisata-Hits-Hillpark-Sibolangit-Medan.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guesthouse`
--

CREATE TABLE `guesthouse` (
  `guesthouseID` char(4) NOT NULL,
  `namaguesthouse` varchar(20) NOT NULL,
  `alamatguesthouse` varchar(20) NOT NULL,
  `areaID` char(4) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guesthouse`
--

INSERT INTO `guesthouse` (`guesthouseID`, `namaguesthouse`, `alamatguesthouse`, `areaID`, `rating`) VALUES
('gh01', 'ka', 'ka', 'id02', 5),
('gh02', 'aey', 'jl pemuda', 'id01', 5),
('gh01', 'Rumah Ukhi', 'Jl. Rocket, Jl. Sido', 'id03', 5),
('gh02', 'Nariska Suite', 'Jalan Jambon RT 07 R', 'id03', 4),
('gh03', 'Rengganis', 'jl Sleman Permai 2 N', 'id03', 4),
('gh04', 'Mitra House', 'Jalan Abdul Rahman S', 'id08', 5),
('gh05', 'Tanjung Ria', 'Jl. Rahadi Usman No.', 'id08', 4),
('gh06', 'Astina Graha', 'Jl. Melati No.32, Ja', 'id05', 4),
('gh07', 'RedDoorz near RSUD D', 'Jl. Jend. Ahmad Yani', 'id05', 4),
('gh08', 'Oase', 'Jl. Mataram No.21, P', 'id07', 5),
('gh09', 'K77', 'Jl. Seto No.6, Tegal', 'id07', 5),
('gh10', 'Gading Indah', 'Jl. Tanah Merah No. ', 'id09', 5),
('gh11', 'Venice', 'jl Taman Permata Ind', 'id09', 5),
('gh12', 'Wesly', 'jl. Sei Sirah No.12,', 'id07', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `hotelID` char(4) NOT NULL,
  `namahotel` varchar(20) NOT NULL,
  `alamathotel` varchar(20) NOT NULL,
  `areaID` char(4) NOT NULL,
  `bintang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`hotelID`, `namahotel`, `alamathotel`, `areaID`, `bintang`) VALUES
('id01', 'Ã©L Hotel Royale', 'Jl. Raya Gading Kira', 'id09', 4),
('id02', 'Golden Tulip', 'Jl. Teuku Umar No.39', 'id08', 4),
('id03', 'Bueno Colombo', 'Jl. Raya Jogya - Sol', 'id03', 5),
('id04', 'Maestro', 'Jl. Slt. Abdurrahman', 'id08', 4),
('id05', 'Sunlake', ' Jl. Danau Permai Ra', 'id09', 5),
('id06', 'Swiss-Belinn', 'Jl. Alianyang, Pasir', 'id05', 5),
('id07', 'Kama ', 'Jl. Jend. Ahmad Yani', 'id07', 5),
('id08', 'Emerald Garden', 'Jl. Kol. Yos Sudarso', 'id07', 5),
('id09', 'Mahkota Singkawang', 'Gg. Timur, Pasiran, ', 'id05', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategoriID` varchar(4) NOT NULL,
  `kategorinama` varchar(300) NOT NULL,
  `kategoriketerangan` varchar(300) NOT NULL,
  `kategorireferensi` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategoriID`, `kategorinama`, `kategoriketerangan`, `kategorireferensi`) VALUES
('wk01', 'Alam', 'Indonesia kaya akan keindahan wisata alam sehingga menjadi daya tarik turis asing. Ada berberapa manfaat wisata alam bagi Indonesia yaitu, meningkatkan pertumbuhan ekonomi, meningkatkan kesejahteraan rakyat, memupuk rasa cinta tanah air, memperkukuh jadi diri dan kesatuan bangsa.', 'Buku'),
('wk13', 'Budaya', ' Banyak manfaat dari mengunjungi obyek wisata budaya di Indonesia. Selain menambah pengalaman, tentu kamu akan mendapat pembelajaran hidup bermakna yang bisa kamu saksikan secara langsung melalui tradisi dan gaya kehidupan masyarakat setempat.', 'Wikipedia'),
('wk14', 'Buatan', 'Saat ini banyak dikembangkan wisata buatan di kab/kota, misalnya taman rekreasi yang menjadi trend pilihan tujuan. Karena disamping sebagai tempat refreshing melepas penat dan hiruk pikuk suasana, juga menjadikan tempat ini sebagai pilihan tujuan jujugan yang murah dan nyaman.', 'Wikipedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `idnews` char(4) NOT NULL,
  `judulnews` varchar(100) DEFAULT NULL,
  `deskripsiawal` varchar(300) DEFAULT NULL,
  `provinsiID` char(4) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `sumber` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`idnews`, `judulnews`, `deskripsiawal`, `provinsiID`, `foto`, `sumber`) VALUES
('id01', 'Petak Enam Mengadakan Program Vaksinasi Covid-19', 'Kampung Wisata Petak Enam merupakan salah satu tempat yang bisa dikunjungi saat berwisata ke Jakarta. Tentunya saat situasi sudah memungkinkan nanti.', '01', 'vaksinasi.jpg', 'Kompas.com'),
('id02', 'Destinasi Wisata di Jawa Tengah Harus Lakukan Simulasi Sebelum Buka', 'Kebijakkan tersebut wajib dilakukan destinasi wisata di daerah berstatus pemberlakuan pembatasan kegiatan masyarakat (PPKM) Level 2. Hasil simulasi selanjutnya dilaporkan terlebih dahulu ke pihak Pemerintah Provinsi (Pemprov) Jawa Tengah.', '03', 'beritaid02.jpg', 'Kompas.com'),
('id03', 'Sehari di Singkawang? Kunjungi Tempat-tempat Ini Saja', 'Singkawang terkenal dengan julukan Kota Seribu Klenteng. Kota yang juga ikonik dan ramai dikunjungi wisatawan di setiap acara Cap Go Meh ini punya banyak tempat menarik.', '04', 'disingkawang.jpg', 'travel.detik.com'),
('id04', 'Tempat Vaksinasi Gratis di Medan', 'Sejauh ini, dari sekitar 1,8 juta jiwa yang menjadi target vaksinasi, lebih dari 40 persen di antaranya sudah divaksin.', '02', 'vaksinasidimedan.jpg', 'Kompas.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `provinsiID` char(2) NOT NULL,
  `provinsinama` char(25) NOT NULL,
  `provinsitglberdiri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`provinsiID`, `provinsinama`, `provinsitglberdiri`) VALUES
('01', 'Jakarta', '1527-06-22'),
('02', 'Sumatera Utara', '1945-04-15'),
('03', 'Jawa Tengah', '1950-08-15'),
('04', 'Kalimantan Barat', '1957-01-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `restoran`
--

CREATE TABLE `restoran` (
  `restoranID` char(4) NOT NULL,
  `restorannama` varchar(20) NOT NULL,
  `restoranpemilik` varchar(20) NOT NULL,
  `jenismakanan` varchar(20) NOT NULL,
  `restoranalamat` varchar(20) NOT NULL,
  `areaID` char(4) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `restoran`
--

INSERT INTO `restoran` (`restoranID`, `restorannama`, `restoranpemilik`, `jenismakanan`, `restoranalamat`, `areaID`, `rating`) VALUES
('rs01', 'Restoran Pondok Kaka', 'Pak Rudi', 'Pontianak', 'Jl. Ismail Marzuki N', 'id08', 5),
('rs02', 'RM. Sari Bento', 'Bu Sari ', 'Shabu', 'Jl. Jend. Ahmad Yani', 'id08', 5),
('rs03', 'Jejamuran', 'Ibu Suri', 'Khas Jogja', 'Jl. Pendowoharjo, Ni', 'id03', 5),
('rs04', 'The Westlake Resto', 'Pak Bejo', 'Daerah hingga luar', 'Jl. Ringroad Barat, ', 'id03', 4),
('rs05', 'Sate Ratu', 'Ibu Ratu', 'Sate', 'Jalan Magelang No.KM', 'id03', 5),
('rs06', 'Alila Nusantara Sing', 'Bu Santi', 'Daerah', 'Jl. Nusantara, Condo', 'id05', 4),
('rs07', 'Rumah Makan Muare Ne', 'Pak Bagas', 'seafood', 'Jl. Tani, Pasiran, S', 'id05', 4),
('rs08', 'Ji Long', 'Hui Bong', 'Chinese', 'JL.Balai Kota ,Medan', 'id07', 5),
('rs09', 'wajir', 'Pak Wajir', 'seafood', 'Jl. Kol. Sugiono No.', 'id07', 5),
('rs10', 'Otw Food Street', 'Rayu', 'Barat', 'Jl. Raya Klp. Kopyor', 'id09', 5),
('rs11', 'Seafood Ayu', 'Ayu', 'Seafood', ' Jl. Boulevard Bar. ', 'id03', 5),
('rs12', 'Mie Aceh Titi Bobrok', 'Titik', 'daerah aceh', 'Jl. Setia Budi No.17', 'id07', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `villa`
--

CREATE TABLE `villa` (
  `villaID` char(4) NOT NULL,
  `namavilla` varchar(20) NOT NULL,
  `alamatvilla` varchar(20) NOT NULL,
  `areaID` char(4) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `villa`
--

INSERT INTO `villa` (`villaID`, `namavilla`, `alamatvilla`, `areaID`, `rating`) VALUES
('vl01', 'Green Hill ', 'Jalan Danau Biru I N', 'id07', 5),
('vl02', 'SZ Nine One', 'Jl. Muara Takus No.4', 'id07', 5),
('vl03', 'Cemara Asli', 'Komplek Cemara Asri,', 'id07', 5),
('vl04', 'Arusha ', 'Jl. Bulus Tempel, Bu', 'id03', 5),
('vl05', 'KAMPUNG AYEM ', 'Jl. Godean, Klinyo, ', 'id03', 4),
('vl06', 'Bukit Mas Singkawang', ' Jl. A. Yani, Gang B', 'id05', 5),
('vl07', 'Diamond Hills ', 'Jl. Raya Sedau, Seda', 'id05', 5),
('vl08', 'Permata Gading', ' Jl. Permata Indah N', 'id09', 5),
('vl09', 'Mas Mediterania 2', 'Jl. Vikamas Tengah 6', 'id09', 5),
('vl10', 'Ceria Lestari', 'jl Villa Ceria Lesta', 'id08', 3),
('vl11', 'Gamma', 'jl Benua Melayu Dara', 'id08', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indeks untuk tabel `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`areaID`);

--
-- Indeks untuk tabel `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiID`);

--
-- Indeks untuk tabel `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD PRIMARY KEY (`fotoID`);

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelID`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategoriID`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`idnews`),
  ADD KEY `provinsiID` (`provinsiID`);

--
-- Indeks untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`provinsiID`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`provinsiID`) REFERENCES `provinsi` (`provinsiID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
