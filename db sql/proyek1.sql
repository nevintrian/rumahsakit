-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2021 pada 12.36
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(4) NOT NULL,
  `tgl_antrian` date NOT NULL,
  `no_antrian` varchar(10) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `no_rm` int(6) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `tgl_antrian`, `no_antrian`, `id_daftar`, `no_rm`) VALUES
(15, '2021-12-20', '1', 20, 000001),
(16, '2021-12-20', '2', 21, 000002),
(17, '2021-12-20', '3', 22, 000001),
(18, '2021-12-20', '4', 23, 000003),
(19, '2021-12-20', '5', 24, 000004),
(20, '2021-12-21', '1', 25, 000001);

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian_poli`
--

CREATE TABLE `antrian_poli` (
  `id_antrian_poli` int(4) NOT NULL,
  `id_antrian` int(4) NOT NULL,
  `no_rm` int(11) NOT NULL,
  `id_poli` int(5) NOT NULL,
  `no_antrian_poli` varchar(10) NOT NULL,
  `tgl_antrian_poli` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_dokter`
--

CREATE TABLE `tabel_dokter` (
  `id_dokter` int(5) NOT NULL,
  `id_login` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `id_poli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_dokter`
--

INSERT INTO `tabel_dokter` (`id_dokter`, `id_login`, `nama_dokter`, `id_poli`) VALUES
(40007, 5, 'Latifatud Dini', 9),
(40008, 7, 'sulistio', 6),
(40009, 8, 'Kelvin', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_jadwalpoli`
--

CREATE TABLE `tabel_jadwalpoli` (
  `no_rm` int(11) NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `hari` varchar(10) NOT NULL,
  `id_dokter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_jadwalpoli`
--

INSERT INTO `tabel_jadwalpoli` (`no_rm`, `jam_buka`, `jam_tutup`, `hari`, `id_dokter`) VALUES
(101, '08:00:00', '12:00:00', 'Selasa', '40007'),
(102, '00:00:00', '00:00:00', 'Selasa', 'dr. Anik'),
(103, '00:00:00', '00:00:00', 'Selasa', 'dr. Rosa'),
(104, '00:00:00', '00:00:00', 'Selasa', 'dr. Damayanti'),
(106, '00:00:00', '00:00:00', 'Senin', 'dr. Hasyim'),
(107, '12:00:00', '19:00:00', 'Rabu', '40008'),
(109, '08:00:00', '17:00:00', 'Senin', '40009'),
(111, '17:00:00', '21:00:00', 'Rabu', '40008'),
(112, '06:00:00', '17:00:00', 'Kamis', '40008');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_jenis_pasien`
--

CREATE TABLE `tabel_jenis_pasien` (
  `id_jns_pasien` int(11) NOT NULL,
  `jns_pasien` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_jenis_pasien`
--

INSERT INTO `tabel_jenis_pasien` (`id_jns_pasien`, `jns_pasien`) VALUES
(2, 'BPJS'),
(3, 'Umum'),
(5, 'Khusus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kunjung`
--

CREATE TABLE `tabel_kunjung` (
  `id_kunjung` int(5) NOT NULL,
  `cara_kunjung` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_kunjung`
--

INSERT INTO `tabel_kunjung` (`id_kunjung`, `cara_kunjung`) VALUES
(1, 'Datang Sendiri'),
(2, 'Dirujuk '),
(3, 'Kecelakaan'),
(4, 'Di Angkat'),
(5, 'Dibuang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pasien`
--

CREATE TABLE `tabel_pasien` (
  `no_rm` int(6) UNSIGNED ZEROFILL NOT NULL,
  `no_identitas` varchar(35) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `j_kel` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(30) NOT NULL,
  `pekerjaan` varchar(40) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_pasien`
--

INSERT INTO `tabel_pasien` (`no_rm`, `no_identitas`, `nama_pasien`, `alamat`, `j_kel`, `tgl_lahir`, `agama`, `pekerjaan`, `no_telp`, `username`, `pass`) VALUES
(000001, '765382', 'Reza Fauzan', 'Semarang', 'Laki-Laki', '1998-03-04', '', '', '0987654321', 'reza97', 'd3a33788c755ebcef244fd61c04f408a'),
(000002, '23789527323', 'John', 'Banyuwangi Atas', 'Laki-Laki', '1998-02-20', '', '', '0987654322', 'john123', '6e0b7076126a29d5dfcbd54835387b7b'),
(000003, '412482873', 'Joko', 'Surabaya', 'Laki-Laki', '2010-02-02', '', '', '0987654321', 'joko21', '6fb75cfc8d65674d998f50efbc7a33c6'),
(000004, '0214889088', 'Jeno Le', 'Semarang', 'Perempuan', '2021-12-02', '', '', '0987654321', 'jeno123', '658c5298bd772d21476086d0cc9fae94'),
(000005, '343434343434', 'Nathu', 'Semarang', 'Laki-Laki', '2021-12-20', 'Kristen', 'Mahasiswa', '0987654321', 'nathu123', '5215acf52feba1548959c410c05fba2b'),
(000006, '8787878787', 'Anis', 'Surakarta', 'Perempuan', '2002-02-22', 'Islam', 'Sales', '0987654321', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pelayanan`
--

CREATE TABLE `tabel_pelayanan` (
  `id_pelayanan` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `no_rm` int(6) UNSIGNED ZEROFILL NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `anamnesa` text NOT NULL,
  `diagnosa` text NOT NULL,
  `pem_fisik` text NOT NULL,
  `tindakan` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_pelayanan`
--

INSERT INTO `tabel_pelayanan` (`id_pelayanan`, `id_daftar`, `no_rm`, `nama_pasien`, `anamnesa`, `diagnosa`, `pem_fisik`, `tindakan`, `foto`) VALUES
(4, 20, 000001, 'Reza Fauzan', 'SEHAT', 'Sehat', 'SEHAT', 'Sehat', 'user_1639969762.jpeg'),
(5, 24, 000004, 'Jeno Le', 'SEHAT', 'Sakit', 'Sakit', 'Sakit', 'user_1639992031.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_poli`
--

CREATE TABLE `tabel_poli` (
  `id_poli` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_poli` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_poli`
--

INSERT INTO `tabel_poli` (`id_poli`, `tanggal`, `nama_poli`) VALUES
(1, '2021-12-07', 'Poli Umum'),
(6, '2021-12-09', 'Poli Mata'),
(8, '2021-12-09', 'Poli KIA'),
(9, '2021-12-17', 'Poli THT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_resep`
--

CREATE TABLE `tabel_resep` (
  `id_daftar` int(11) NOT NULL,
  `no_rm` int(6) UNSIGNED ZEROFILL NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `kode_resep` int(5) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `jumlah` varchar(5) NOT NULL,
  `aturan_pakai` text NOT NULL,
  `tgl_resep` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_resep`
--

INSERT INTO `tabel_resep` (`id_daftar`, `no_rm`, `nama_pasien`, `kode_resep`, `nama_obat`, `jumlah`, `aturan_pakai`, `tgl_resep`) VALUES
(20, 000001, 'Reza Fauzan', 7, 'Paracetamol', '3', '2x Sehari', '2021-12-20'),
(24, 000004, 'Jeno Le', 9, 'Paracetamol', '2', '2x Sehari', '2021-12-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_biaya_denda`
--

CREATE TABLE `tbl_biaya_denda` (
  `id_biaya_denda` int(11) NOT NULL,
  `harga_denda` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL,
  `tgl_tetap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_biaya_denda`
--

INSERT INTO `tbl_biaya_denda` (`id_biaya_denda`, `harga_denda`, `stat`, `tgl_tetap`) VALUES
(1, '4000', 'Aktif', '2019-11-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL,
  `buku_id` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `sampul` varchar(255) DEFAULT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `thn_buku` varchar(255) DEFAULT NULL,
  `isi` text,
  `jml` int(11) DEFAULT NULL,
  `tgl_masuk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `buku_id`, `id_kategori`, `id_rak`, `sampul`, `isbn`, `lampiran`, `title`, `penerbit`, `pengarang`, `thn_buku`, `isi`, `jml`, `tgl_masuk`) VALUES
(8, 'BK008', 2, 1, '0', '132-123-234-231', '0', 'CARA MUDAH BELAJAR PEMROGRAMAN C++', 'INFORMATIKA BANDUNG', 'BUDI RAHARJO ', '2012', '<table class=\"table table-bordered\" style=\"background-color: rgb(255, 255, 255); width: 653px; color: rgb(51, 51, 51);\"><tbody><tr><td style=\"padding: 8px; line-height: 1.42857; border-color: rgb(244, 244, 244);\">Tipe Buku</td><td style=\"padding: 8px; line-height: 1.42857; border-color: rgb(244, 244, 244);\">Kertas</td></tr><tr><td style=\"padding: 8px; line-height: 1.42857; border-color: rgb(244, 244, 244);\">Bahasa</td><td style=\"padding: 8px; line-height: 1.42857; border-color: rgb(244, 244, 244);\">Indonesia</td></tr></tbody></table>', 23, '2019-11-23 11:49:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_daftar`
--

CREATE TABLE `tbl_daftar` (
  `id_daftar` int(11) NOT NULL,
  `no_rm` int(6) UNSIGNED ZEROFILL NOT NULL,
  `jns_pasien` varchar(255) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_kunjung` date NOT NULL,
  `jns_kunjung` varchar(255) NOT NULL,
  `cara_kunjung` varchar(255) NOT NULL,
  `id_dokter` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_daftar`
--

INSERT INTO `tbl_daftar` (`id_daftar`, `no_rm`, `jns_pasien`, `tgl_masuk`, `tgl_kunjung`, `jns_kunjung`, `cara_kunjung`, `id_dokter`, `status`) VALUES
(20, 000001, '3', '2021-12-20', '2021-12-20', 'Baru', '1', '40007', 2),
(21, 000002, '2', '2021-12-20', '2021-12-20', 'Lama', '1', '40008', 1),
(22, 000001, '2', '2021-12-20', '2021-12-20', 'Lama', '1', '40008', 0),
(23, 000003, '2', '2021-12-20', '2021-12-20', 'Baru', '2', '40009', 0),
(24, 000004, '2', '2021-12-20', '2021-12-20', 'Baru', '1', '40007', 2),
(25, 000001, '5', '2021-12-21', '2021-12-21', 'Lama', '4', '40007', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_denda`
--

CREATE TABLE `tbl_denda` (
  `id_denda` int(11) NOT NULL,
  `pinjam_id` varchar(255) NOT NULL,
  `denda` varchar(255) NOT NULL,
  `lama_waktu` int(11) NOT NULL,
  `tgl_denda` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_denda`
--

INSERT INTO `tbl_denda` (`id_denda`, `pinjam_id`, `denda`, `lama_waktu`, `tgl_denda`) VALUES
(3, 'PJ001', '0', 0, '2020-05-20'),
(5, 'PJ009', '0', 0, '2020-05-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(3, 'Pemrograman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id_login` int(11) NOT NULL,
  `anggota_id` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` varchar(255) NOT NULL,
  `jenkel` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tgl_bergabung` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_login`
--

INSERT INTO `tbl_login` (`id_login`, `anggota_id`, `user`, `pass`, `level`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenkel`, `alamat`, `telepon`, `email`, `tgl_bergabung`, `foto`) VALUES
(4, 'AG003', 'nrlkhomariah@gmail.com', '55811d685377dc59c4f23b946670dcca', 'Kepala Rekam Medik', 'Nurul Khomariah', 'Probolinggo', '2003-03-14', 'Perempuan', 'Jalan Kh Abdul Hamid', '089899877677', 'khomariahn99@yahoo.com', '2021-12-04', 'user_1638574027.jpg'),
(5, 'AG005', 'latifadini@gmail.com', 'f37cba4701496097435bc4842f62002a', 'Dokter Poliklinik', 'Latifatud Dini', 'Banyuwangi', '2001-07-26', 'Perempuan', 'Jalan anggrek ', '087887998009', 'latifaa@gmail.com', '2021-12-04', 'user_1638574154.jpg'),
(6, 'AG006', 'kelompok5@gmail.com', '01cfcd4f6b8770febfb40cb906715822', 'Petugas Pendaftaran', 'Putri Bella', 'Madiun', '2001-06-12', 'Perempuan', 'Jalan Lumba lumba', '086678543123', 'yukbisayuk@gmail.com', '2021-12-04', 'user_1638592414.jpg'),
(7, 'AG007', 'sulistio@gmail.com', 'c1422147466610799916eec658eee72e', 'Dokter Poliklinik', 'sulistio', 'Banyuwangi', '1997-07-16', 'Laki-Laki', 'Jalan lumbang', '086678543122', 'sulistio123@gmail.com', '2021-12-17', 'user_1639720107.jpg'),
(8, 'AG008', 'Kapten', '202cb962ac59075b964b07152d234b70', 'Dokter Poliklinik', 'Kelvin', 'Banyuwangi', '2021-12-19', 'Laki-Laki', 'Banyuwangi Atas', '0987654322', 'kelvinirawan@gmail.com', '2021-12-19', 'user_1639903863.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pinjam`
--

CREATE TABLE `tbl_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `pinjam_id` varchar(255) NOT NULL,
  `anggota_id` varchar(255) NOT NULL,
  `buku_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_pinjam` varchar(255) NOT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `tgl_balik` varchar(255) NOT NULL,
  `tgl_kembali` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pinjam`
--

INSERT INTO `tbl_pinjam` (`id_pinjam`, `pinjam_id`, `anggota_id`, `buku_id`, `status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali`) VALUES
(8, 'PJ001', 'AG002', 'BK008', 'Di Kembalikan', '2020-05-19', 1, '2020-05-20', '2020-05-20'),
(10, 'PJ009', 'AG002', 'BK008', 'Di Kembalikan', '2020-05-20', 1, '2020-05-21', '2020-05-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rak`
--

CREATE TABLE `tbl_rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rak`
--

INSERT INTO `tbl_rak` (`id_rak`, `nama_rak`) VALUES
(1, 'Rak Buku 1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`);

--
-- Indeks untuk tabel `antrian_poli`
--
ALTER TABLE `antrian_poli`
  ADD PRIMARY KEY (`id_antrian_poli`);

--
-- Indeks untuk tabel `tabel_dokter`
--
ALTER TABLE `tabel_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `tabel_jadwalpoli`
--
ALTER TABLE `tabel_jadwalpoli`
  ADD PRIMARY KEY (`no_rm`);

--
-- Indeks untuk tabel `tabel_jenis_pasien`
--
ALTER TABLE `tabel_jenis_pasien`
  ADD PRIMARY KEY (`id_jns_pasien`);

--
-- Indeks untuk tabel `tabel_kunjung`
--
ALTER TABLE `tabel_kunjung`
  ADD PRIMARY KEY (`id_kunjung`);

--
-- Indeks untuk tabel `tabel_pasien`
--
ALTER TABLE `tabel_pasien`
  ADD PRIMARY KEY (`no_rm`);

--
-- Indeks untuk tabel `tabel_pelayanan`
--
ALTER TABLE `tabel_pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indeks untuk tabel `tabel_poli`
--
ALTER TABLE `tabel_poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indeks untuk tabel `tabel_resep`
--
ALTER TABLE `tabel_resep`
  ADD PRIMARY KEY (`kode_resep`);

--
-- Indeks untuk tabel `tbl_biaya_denda`
--
ALTER TABLE `tbl_biaya_denda`
  ADD PRIMARY KEY (`id_biaya_denda`);

--
-- Indeks untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `tbl_daftar`
--
ALTER TABLE `tbl_daftar`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indeks untuk tabel `tbl_denda`
--
ALTER TABLE `tbl_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indeks untuk tabel `tbl_rak`
--
ALTER TABLE `tbl_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `antrian_poli`
--
ALTER TABLE `antrian_poli`
  MODIFY `id_antrian_poli` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tabel_dokter`
--
ALTER TABLE `tabel_dokter`
  MODIFY `id_dokter` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40010;

--
-- AUTO_INCREMENT untuk tabel `tabel_jadwalpoli`
--
ALTER TABLE `tabel_jadwalpoli`
  MODIFY `no_rm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT untuk tabel `tabel_jenis_pasien`
--
ALTER TABLE `tabel_jenis_pasien`
  MODIFY `id_jns_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tabel_kunjung`
--
ALTER TABLE `tabel_kunjung`
  MODIFY `id_kunjung` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tabel_pasien`
--
ALTER TABLE `tabel_pasien`
  MODIFY `no_rm` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tabel_pelayanan`
--
ALTER TABLE `tabel_pelayanan`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tabel_poli`
--
ALTER TABLE `tabel_poli`
  MODIFY `id_poli` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tabel_resep`
--
ALTER TABLE `tabel_resep`
  MODIFY `kode_resep` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_biaya_denda`
--
ALTER TABLE `tbl_biaya_denda`
  MODIFY `id_biaya_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_daftar`
--
ALTER TABLE `tbl_daftar`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tbl_denda`
--
ALTER TABLE `tbl_denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_rak`
--
ALTER TABLE `tbl_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
