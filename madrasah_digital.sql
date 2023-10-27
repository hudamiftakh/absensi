-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Agu 2023 pada 04.11
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `madrasah_digital`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(20230608091341);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id` int(11) UNSIGNED NOT NULL,
  `nis` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `keterangan_pulang` text NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `nama` varchar(100) NOT NULL,
  `catatan` text NOT NULL,
  `semester` varchar(100) NOT NULL,
  `tahun_ajaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_absen`
--

INSERT INTO `tb_absen` (`id`, `nis`, `id_siswa`, `kelas`, `keterangan`, `keterangan_pulang`, `tanggal`, `jam_masuk`, `jam_pulang`, `nama`, `catatan`, `semester`, `tahun_ajaran`) VALUES
(12, 237563727, 2, '6-A', 'Terlambat', '', '2023-06-10', '09:00:59', '00:00:00', 'Abdullah Faqih', '', '', ''),
(13, 237563727, 3, '6-A', 'Terlambat', '', '2023-06-18', '18:29:05', '00:00:00', 'Alfieka Maisaroh', '', '', ''),
(14, 237563727, 1, '6-A', 'Terlambat', '', '2023-08-22', '08:11:53', '00:00:00', 'Mahardhika Arya Bimnantara', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `kelas`, `username`, `password`, `level`) VALUES
(1, 'Administrator', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(2, 'Admin MIN 1 JBG', '', 'admin_absen', '21232f297a57a5a743894a0e4a801fc3', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) UNSIGNED NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_buku` varchar(100) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `pengarang` text NOT NULL,
  `thn_terbit` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `tgl_input` date NOT NULL,
  `status_buku` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `id_kategori`, `kode_buku`, `judul_buku`, `pengarang`, `thn_terbit`, `penerbit`, `isbn`, `jumlah_buku`, `lokasi`, `gambar`, `tgl_input`, `status_buku`) VALUES
(1, 1, 'B12212KB', 'Dasar Pemrograman Java', 'Muhammad Ali M.', '2020', 'CV KARYA RASA', '1233223223', 99, 'RAK-1', '-', '2023-06-08', 'active'),
(2, 3, 'B12214KB', 'TRIK SQL', 'Muhammad Ali M.', '2020', 'CV UJUNG PENA', '1233223223', 100, 'RAK-1', '-', '2023-06-08', 'active'),
(3, 4, 'B12215KB', 'Matematika Dasar', 'Muhammad Ali M.', '2020', 'CV UJUNG PENA', '1233223223', 100, 'RAK-1', '-', '2023-06-08', 'active'),
(4, 3, 'B12214KB', 'Dasar Pemrograman PHP MYSQL', 'Muhammad Ali M.', '2020', 'CV UJUNG PENA', '1233223223', 99, 'RAK-1', '-', '2023-06-08', 'active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_denda`
--

CREATE TABLE `tb_denda` (
  `id` int(5) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(100) NOT NULL,
  `total_denda` int(255) NOT NULL,
  `id_siswa` int(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_peminjaman`
--

CREATE TABLE `tb_detail_peminjaman` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(100) NOT NULL,
  `id_buku` int(100) NOT NULL,
  `id_siswa` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id`, `nama`) VALUES
(1, '6-A'),
(2, '6-B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kunjungan_perpus`
--

CREATE TABLE `tb_kunjungan_perpus` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_siswa` int(100) NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `jam_kunjungan` time NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nis` int(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_kunjungan_perpus`
--

INSERT INTO `tb_kunjungan_perpus` (`id`, `id_siswa`, `tanggal_kunjungan`, `jam_kunjungan`, `kelas`, `nama`, `nis`, `keterangan`) VALUES
(1, 2, '2023-06-10', '09:04:00', '6-A', 'Abdullah Faqih', 237563727, 'Kunjungan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peminjaman_buku`
--

CREATE TABLE `tb_peminjaman_buku` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(100) NOT NULL,
  `id_siswa` int(100) NOT NULL,
  `nis` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `jml_buku` int(100) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `durasi` int(100) NOT NULL,
  `denda` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengaturan`
--

CREATE TABLE `tb_pengaturan` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengembalian`
--

CREATE TABLE `tb_pengembalian` (
  `id` int(11) NOT NULL,
  `kode_transaksi` text NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` text NOT NULL,
  `denda` int(11) NOT NULL,
  `tgl_pengembalian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `rfid` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `jk` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `nisn` int(255) NOT NULL,
  `nis` int(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `siswa_tahun` varchar(255) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `alamat_ayah` text NOT NULL,
  `alamat_ibu` text NOT NULL,
  `agama` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id`, `nama`, `rfid`, `foto`, `jk`, `alamat`, `telepon`, `kelas`, `nisn`, `nis`, `tempat_lahir`, `tanggal_lahir`, `siswa_tahun`, `nama_ayah`, `nama_ibu`, `alamat_ayah`, `alamat_ibu`, `agama`, `status`) VALUES
(1, 'Mahardhika Arya Bimnantara', '0014037362', '2100232.png', 'L', 'Jombang Jawa Timur', '6285748496135', '6-A', 237563727, 237563727, 'Jombang', '2023-05-02', '2022', 'SASMITO', 'SARMINAH', 'Jombang', 'Jombang', 'Islam', 'Active'),
(2, 'Abdullah Faqih', '0014114337', '1.png', 'L', 'Jombang Jawa Timur', '6285733070035', '6-A', 237563727, 237563727, 'Jombang', '2023-05-02', '2022', 'SASMITO', 'SARMINAH', 'Jombang', 'Jombang', 'Islam', 'Active'),
(3, 'Alfieka Maisaroh', '0014053635', '2.png', 'L', 'Jombang Jawa Timur', '6285748496135', '6-A', 237563727, 237563727, 'Jombang', '2023-05-02', '2022', 'SASMITO', 'SARMINAH', 'Jombang', 'Jombang', 'Islam', 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tabungan`
--

CREATE TABLE `tb_tabungan` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `kode_transaksi` text NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(11) NOT NULL,
  `kelas` varchar(11) NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `saldo_terakhir` int(11) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tgl_record` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_tabungan`
--

INSERT INTO `tb_tabungan` (`id`, `id_siswa`, `kode_transaksi`, `nis`, `nama`, `kelas`, `debit`, `kredit`, `saldo_terakhir`, `tgl_transaksi`, `tgl_record`) VALUES
(5, 1, 'TRX93478', 237563727, 'Mahardhika ', '6-A', 10000, 0, 0, '2023-06-07 17:00:00', '2023-06-08 16:27:36'),
(6, 3, 'TRX32029', 237563727, 'Alfieka Mai', '6-A', 10000, 0, 0, '2023-06-07 17:00:00', '2023-06-08 16:35:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tahun`
--

CREATE TABLE `tb_tahun` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `tb_denda`
--
ALTER TABLE `tb_denda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_detail_peminjaman`
--
ALTER TABLE `tb_detail_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kunjungan_perpus`
--
ALTER TABLE `tb_kunjungan_perpus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_peminjaman_buku`
--
ALTER TABLE `tb_peminjaman_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pengaturan`
--
ALTER TABLE `tb_pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_tabungan`
--
ALTER TABLE `tb_tabungan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_tahun`
--
ALTER TABLE `tb_tahun`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_denda`
--
ALTER TABLE `tb_denda`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_peminjaman`
--
ALTER TABLE `tb_detail_peminjaman`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_kunjungan_perpus`
--
ALTER TABLE `tb_kunjungan_perpus`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_peminjaman_buku`
--
ALTER TABLE `tb_peminjaman_buku`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_pengaturan`
--
ALTER TABLE `tb_pengaturan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_tabungan`
--
ALTER TABLE `tb_tabungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_tahun`
--
ALTER TABLE `tb_tahun`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
