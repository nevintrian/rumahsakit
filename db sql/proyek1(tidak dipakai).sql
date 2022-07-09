-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Des 2021 pada 10.49
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `no_antrian` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `nama_dokter` varchar(100) NOT NULL,
  `poli` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_dokter`
--

INSERT INTO `tabel_dokter` (`id_dokter`, `nama_dokter`, `poli`) VALUES
(1, 'dr. Nurul', 'Poli KIA'),
(40002, 'dr. Dian', 'Poli KIA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_jadwalpoli`
--

CREATE TABLE `tabel_jadwalpoli` (
  `no_rm` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(10) NOT NULL,
  `nama_poli` varchar(25) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_jadwalpoli`
--

INSERT INTO `tabel_jadwalpoli` (`no_rm`, `tanggal`, `hari`, `nama_poli`, `nama_dokter`) VALUES
(101, '2021-12-14', 'Selasa', 'Poli Umum', 'dr. Hasyim'),
(102, '2021-12-14', 'Selasa', 'Poli Gigi', 'dr. Anik'),
(103, '2021-12-14', 'Selasa', 'Poli Penyakit Dalam', 'dr. Rosa'),
(104, '2021-12-14', 'Selasa', 'Poli Mata', 'dr. Damayanti'),
(105, '2021-12-13', 'Senin', 'Poli Mata', 'dr. Damayanti'),
(106, '2021-12-13', 'Senin', 'Poli Umum', 'dr. Hasyim'),
(107, '2021-12-15', 'Rabu', 'Poli Umum', 'dr. Hasyim'),
(108, '2021-12-15', 'Rabu', 'Poli Mata', 'dr. Damayanti');

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
(3, 'Kecelakaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pasien`
--

CREATE TABLE `tabel_pasien` (
  `no_rm` int(11) NOT NULL,
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
(40001, '', 'Jeno Lee', 'Jalan a', 'Laki-Laki', '2021-12-05', 'Islam', 'Idol', '089877677877', '', ''),
(400040002, '', 'ayu', 'jalan ikan', 'Perempuan', '2021-12-15', 'Islam', 'Guru', '089889098799', 'cobacoba', 'c3ec0f7b054e729c5a716c8125839829'),
(404040002, '', 'Kim Myungsoo', 'Jalan Mawar', 'Perempuan', '2021-12-11', 'Islam', 'Mahasiswa', '087654321123', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pelayanan`
--

CREATE TABLE `tabel_pelayanan` (
  `id_pelayanan` int(11) NOT NULL,
  `no_rm` int(11) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `anamnesa` text NOT NULL,
  `diagnosa` varchar(100) NOT NULL,
  `pem_fisik` text NOT NULL,
  `kode_icd` varchar(10) NOT NULL,
  `penunjang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `no_rm` int(11) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `kode_resep` int(5) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `jumlah` varchar(5) NOT NULL,
  `aturan_pakai` text NOT NULL,
  `tgl_resep` date NOT NULL,
  `nama_poli` varchar(50) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_resep`
--

INSERT INTO `tabel_resep` (`no_rm`, `nama_pasien`, `kode_resep`, `nama_obat`, `jumlah`, `aturan_pakai`, `tgl_resep`, `nama_poli`, `nama_dokter`) VALUES
(40001, 'Jeno Lee', 1, 'Paracetamol', '10', '1 X Sehari sesudah makan', '2021-12-10', 'Poli Umum', 'dr. dian');

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
  `isi` text DEFAULT NULL,
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
  `no_rm` int(11) NOT NULL,
  `jns_pasien` varchar(255) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_kunjung` date NOT NULL,
  `jns_kunjung` varchar(255) NOT NULL,
  `cara_kunjung` varchar(255) NOT NULL,
  `ke_poli` varchar(255) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_daftar`
--

INSERT INTO `tbl_daftar` (`id_daftar`, `no_rm`, `jns_pasien`, `tgl_masuk`, `tgl_kunjung`, `jns_kunjung`, `cara_kunjung`, `ke_poli`, `nama_dokter`) VALUES
(1, 40001, 'BPJS', '2021-12-06', '2021-12-06', 'lama', 'Rujukan', 'Gigi', 'Drg.Bahgianto');

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
(2, 'Pemrograman');

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
(7, 'AG007', 'sulistio@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Dokter Poliklinik', 'sulistio', 'Banyuwangi', '1997-07-16', 'Laki-Laki', 'Jalan lumbang', '086678543122', 'sulistio123@gmail.com', '2021-12-17', 'user_1639720107.jpg');

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
  MODIFY `id_antrian` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `antrian_poli`
--
ALTER TABLE `antrian_poli`
  MODIFY `id_antrian_poli` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tabel_dokter`
--
ALTER TABLE `tabel_dokter`
  MODIFY `id_dokter` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40003;

--
-- AUTO_INCREMENT untuk tabel `tabel_jadwalpoli`
--
ALTER TABLE `tabel_jadwalpoli`
  MODIFY `no_rm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT untuk tabel `tabel_kunjung`
--
ALTER TABLE `tabel_kunjung`
  MODIFY `id_kunjung` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tabel_pasien`
--
ALTER TABLE `tabel_pasien`
  MODIFY `no_rm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=404040003;

--
-- AUTO_INCREMENT untuk tabel `tabel_pelayanan`
--
ALTER TABLE `tabel_pelayanan`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tabel_poli`
--
ALTER TABLE `tabel_poli`
  MODIFY `id_poli` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tabel_resep`
--
ALTER TABLE `tabel_resep`
  MODIFY `kode_resep` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_denda`
--
ALTER TABLE `tbl_denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
