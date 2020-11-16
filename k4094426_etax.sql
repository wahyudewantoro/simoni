-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 22 Jul 2019 pada 05.13
-- Versi server: 5.5.62-cll
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k4094426_etax`
--

DELIMITER $$
--
-- Fungsi
--
$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_menu`
--

CREATE TABLE `ms_menu` (
  `id_inc` int(11) NOT NULL,
  `nama_menu` varchar(100) DEFAULT NULL,
  `link_menu` varchar(100) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_menu`
--

INSERT INTO `ms_menu` (`id_inc`, `nama_menu`, `link_menu`, `parent`, `sort`, `icon`) VALUES
(1, 'Sistem', '#', 0, 90, 'fa fa-cogs'),
(2, 'role', 'role', 1, 1, 'fa fa-lock'),
(3, 'pengguna', 'pengguna', 1, 2, 'fa fa-user'),
(4, 'menu', 'menu', 1, 3, 'fa fa-list'),
(5, 'Beranda', 'welcome', 0, 0, 'fa fa-home'),
(27, 'Master', '#', 0, 4, 'fa fa-cubes'),
(28, 'Jenis Pajak', 'refjenispajak', 27, 1, 'fa fa-database'),
(29, 'Wajib Pajak', 'refclient', 0, 3, 'fa fa-users'),
(31, 'Transaksi', '#', 0, 2, 'fa fa-line-chart'),
(32, 'Monitoring Transaksi', 'transaksi', 31, 1, 'fa fa-binoculars'),
(33, 'Monitoring Transaksi All', 'transaksi/alldata', 31, 2, 'fa fa-cubes'),
(34, 'Transaksi Wajib Pajak', 'transaksi/wp', 31, 3, 'fa fa-users'),
(35, 'Data WP tidak termonitor', 'transaksi/gagal', 31, 4, 'fa fa-close'),
(36, 'Konfigurasi', 'konfigurasi', 27, 2, 'fa fa-database');

--
-- Trigger `ms_menu`
--
DELIMITER $$
CREATE TRIGGER `trig_newmenu` AFTER INSERT ON `ms_menu` FOR EACH ROW BEGIN
	INSERT INTO ms_privilege (ms_role_id,ms_menu_id,`status`) 
	VALUE ('1',new.id_inc,'1');
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_pengguna`
--

CREATE TABLE `ms_pengguna` (
  `id_inc` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `ms_role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_pengguna`
--

INSERT INTO `ms_pengguna` (`id_inc`, `nama`, `username`, `password`, `ms_role_id`) VALUES
(8, 'super user', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_privilege`
--

CREATE TABLE `ms_privilege` (
  `id_inc` int(11) NOT NULL,
  `ms_role_id` int(11) DEFAULT NULL,
  `ms_menu_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_privilege`
--

INSERT INTO `ms_privilege` (`id_inc`, `ms_role_id`, `ms_menu_id`, `status`) VALUES
(1, 1, 1, 1),
(2, 1, 5, 1),
(3, 1, 2, 1),
(4, 1, 3, 1),
(5, 1, 4, 1),
(8, 1, 27, 1),
(9, 1, 28, 1),
(10, 1, 29, 1),
(12, 1, 31, 1),
(13, 1, 32, 1),
(14, 1, 33, 1),
(15, 1, 34, 1),
(16, 1, 35, 1),
(17, 1, 36, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_role`
--

CREATE TABLE `ms_role` (
  `id_inc` int(11) NOT NULL,
  `nama_role` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_role`
--

INSERT INTO `ms_role` (`id_inc`, `nama_role`) VALUES
(1, 'Super User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_client`
--

CREATE TABLE `ref_client` (
  `kd_client` int(11) NOT NULL,
  `nama_wp` varchar(100) DEFAULT NULL,
  `npwp` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_client`
--

INSERT INTO `ref_client` (`kd_client`, `nama_wp`, `npwp`, `email`) VALUES
(5, 'Rachmat H', '100000007616', NULL),
(6, 'MOCH ROCHIM', '100000567805', NULL),
(7, 'Drs. MUJIB SHOVY', '200000578002', NULL),
(8, 'H. WAHAB', '100000625414', NULL),
(9, 'JAYA MAKMUR. PT', '200000687801', NULL),
(10, 'BALITAS', '200000727903', NULL),
(11, 'WARIONO', '100000757803', NULL),
(12, 'NURALI', '100000927106', NULL),
(13, 'STEVAN BASUKI', '100001237706', NULL),
(14, 'HENRY SUGIARTO TRISNO', '200001367809', NULL),
(15, 'Rudi', '100001855602', NULL),
(16, 'Nanik Sumiati', '100002580000', NULL),
(17, 'MS.PRESILIA OKTAVIANI TJAHYONO', '100002770000', NULL),
(18, 'SUGIARTO', '200003175608', NULL),
(19, 'TAN SUNTONO', '100003237805', NULL),
(20, 'H ARDI', '100003247805', NULL),
(21, 'Anwar Taruna', '200003259999', NULL),
(22, 'M. Yusuf', '100003485606', NULL),
(23, 'HM Husein', '100003940000', NULL),
(24, 'UMI CHORBIATUL MUNAWAROH', '200004507001', NULL),
(321, 'HARYOK', '100008485506', NULL),
(854, 'Kursus Gamajaya Sengkaling', '100018598002', NULL),
(4093, 'TEGUH', '100064416501', NULL),
(9027, 'AGUS SUYANTO', '100173047707', NULL),
(10083, 'ERLIANDINI RIFKA AMALIA', '100190825401', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_jenispajak`
--

CREATE TABLE `ref_jenispajak` (
  `kd_jenispajak` int(11) NOT NULL,
  `rekening` varchar(50) DEFAULT NULL,
  `nama_pajak` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_jenispajak`
--

INSERT INTO `ref_jenispajak` (`kd_jenispajak`, `rekening`, `nama_pajak`) VALUES
(2, '0501.00.00.4.1.1.01', 'Hotel'),
(3, '0501.00.00.4.1.1.02', 'Restoran'),
(4, '0501.00.00.4.1.1.03', 'Hiburan'),
(5, '0501.00.00.4.1.1.07', 'Parkir'),
(6, '0501.00.00.4.1.1.06', 'MBLB'),
(7, '0501.00.00.4.1.1.09', 'Sarang Burung'),
(8, '0501.00.00.4.1.1.05', 'PPJ'),
(9, '0501.00.00.4.1.1.08', 'Air Tanah'),
(10, '0501.00.00.4.1.1.04', 'Reklame');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_client`
--

CREATE TABLE `tb_client` (
  `id_inc` int(11) NOT NULL,
  `kd_client` int(11) DEFAULT NULL,
  `kd_jenispajak` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_config`
--

CREATE TABLE `tb_config` (
  `kd_config` int(5) NOT NULL,
  `nama_wp` varchar(100) DEFAULT NULL,
  `kode_aktivasi` varchar(10) DEFAULT NULL,
  `last_id_database` varchar(100) DEFAULT NULL,
  `kd_jenispajak` varchar(100) DEFAULT NULL,
  `id_client` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `database_client` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `interval_process` int(10) DEFAULT NULL,
  `path_csv` varchar(200) DEFAULT NULL,
  `string_query` varchar(200) DEFAULT NULL,
  `path_move` varchar(200) DEFAULT NULL,
  `url_server` tinytext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_config`
--

INSERT INTO `tb_config` (`kd_config`, `nama_wp`, `kode_aktivasi`, `last_id_database`, `kd_jenispajak`, `id_client`, `username`, `database_client`, `password`, `interval_process`, `path_csv`, `string_query`, `path_move`, `url_server`) VALUES
(6, 'Drs. MUJIB SHOVY', '21621', '0', '01', '111111', 'root', 'etax', '', 60, 'D:\\\\bapenda\\\\epajak\\\\etax\\\\data_transaksi.csv', 'SELECT * FROM tb_transaksi', 'D:\\\\bapenda\\\\epajak\\\\etax\\\\move\\\\', 'http://dnh-solution.com/etax/JavaJson/krmDataJson'),
(5, 'MOCH ROCHIM', '99590', '0', '01', '111111', 'root', 'etax', '', 60, 'D:\\\\Project-DNH\\\\Etax\\\\data_transaksi.csv', 'SELECT * FROM tb_transaksi', 'D:\\\\Project-DNH\\\\Etax\\\\move\\\\', 'http://dnh-solution.com/etax/JavaJson/krmDataJson'),
(4, 'BALITAS', '18114', '0', '01', '111111', 'root', 'etax', '', 60, 'F:\\\\bapenda\\\\epajak\\\\etax\\\\data_transaksi.csv', 'SELECT * FROM tb_transaksi', 'F:\\\\bapenda\\\\epajak\\\\etax\\\\move\\\\', 'http://dnh-solution.com/etax/JavaJson/krmDataJson'),
(13, 'H. WAHAB', '35436', '0', '01', '111111', 'root', 'etax', '', 60, 'D:\\\\bapenda\\\\epajak\\\\etax\\\\data_transaksi.csv', 'SELECT * FROM tb_transaksi', 'D:\\\\bapenda\\\\epajak\\\\etax\\\\move\\\\', 'http://dnh-solution.com/etax/JavaJson/krmDataJson'),
(10, 'NURALI', '91845', '0', '01', '111111', 'root', 'etax', '', 60, 'D:\\\\Project-DNH\\\\Etax\\\\data_transaksi.csv', 'Select * from tb_transaksi', 'D:\\\\Project-DNH\\\\Etax\\\\move\\\\', 'http://dnh-solution.com/etax/JavaJson/krmDataJson'),
(8, 'Rachmat H', '81364', '0', '01', '111111', 'root', 'etax', '', 60, 'D:\\\\Project-DNH\\\\Etax\\\\data_transaksi.csv', 'SELECT * FROM tb_transaksi', 'D:\\\\Project-DNH\\\\Etax\\\\move\\\\', 'http://dnh-solution.com/etax/JavaJson/krmDataJson\r\n'),
(14, 'H ARDI', '88614', '0', '01', '111111', 'root', 'etax', '', 60, 'E:\\\\Program\\\\simoni\\\\data_transaksi.csv', 'SELECT * FROM tb_transaksi', 'E:\\\\Program\\\\simoni\\\\move\\\\', 'http://dnh-solution.com/etax/JavaJson/krmDataJson');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `kd_trx` int(11) NOT NULL,
  `kd_client` int(11) DEFAULT NULL,
  `npwp` varchar(100) DEFAULT NULL,
  `nama_wp` varchar(100) DEFAULT NULL,
  `kd_jenispajak` int(11) DEFAULT NULL,
  `rekening` varchar(100) DEFAULT NULL,
  `jenis_pajak` varchar(100) DEFAULT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `waktu_trx` timestamp NULL DEFAULT NULL,
  `nilai_trx` int(11) DEFAULT NULL,
  `disc_trx` int(11) DEFAULT NULL,
  `keterangan` text,
  `tanggal_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`kd_trx`, `kd_client`, `npwp`, `nama_wp`, `kd_jenispajak`, `rekening`, `jenis_pajak`, `id_transaksi`, `waktu_trx`, `nilai_trx`, `disc_trx`, `keterangan`, `tanggal_insert`) VALUES
(11723, 111111, NULL, 'surabaya', 2, NULL, '', 2560, '2017-12-13 07:00:00', 10000, 0, 'keterangan 2', '2018-11-16 07:09:00'),
(11724, 111111, NULL, 'denpasar', 2, NULL, '', 2561, '2017-12-13 07:00:00', 10000, 0, 'keterangan 2', '2018-11-16 07:09:00'),
(11725, 111111, NULL, 'wp satu', 2, NULL, '', 2816, '2017-12-13 06:00:00', 10000, 0, 'keterangan satu', '2018-11-16 07:09:00'),
(11726, 111111, NULL, 'pekanbaru', 2, NULL, '', 2817, '2018-11-16 14:05:00', 10000, NULL, 'keterangan', '2018-11-16 07:09:00'),
(11727, 111111, NULL, 'H ARDI', 1, NULL, 'Restoran', 304460, '2018-06-07 23:59:59', 54000, -770, 'Nasi Goreng^2^10000.00|Es Jeruk^2^5000.00|Peyek^2^2000.00', '2019-06-21 09:38:20'),
(11728, 111111, NULL, 'surabaya', 2, NULL, '', 11723, '2017-12-13 14:00:00', 10000, 0, 'keterangan 2', '2019-06-21 10:13:51'),
(11729, 111111, NULL, 'denpasar', 2, NULL, '', 11724, '2017-12-13 14:00:00', 10000, 0, 'keterangan 2', '2019-06-21 10:13:51'),
(11730, 111111, NULL, 'wp satu', 2, NULL, '', 11725, '2017-12-13 13:00:00', 10000, 0, 'keterangan satu', '2019-06-21 10:13:51'),
(11731, 111111, NULL, 'pekanbaru', 2, NULL, '', 11726, '2018-11-16 21:05:00', 10000, NULL, 'keterangan', '2019-06-21 10:13:52'),
(11732, 111111, NULL, 'H ARDI', 1, NULL, '', 11727, '2018-06-08 06:59:59', 54000, -770, 'Nasi Goreng^2^10000.00|Es Jeruk^2^5000.00|Peyek^2^2000.00', '2019-06-21 10:13:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ms_menu`
--
ALTER TABLE `ms_menu`
  ADD PRIMARY KEY (`id_inc`),
  ADD KEY `FK_ms_menu` (`parent`);

--
-- Indeks untuk tabel `ms_pengguna`
--
ALTER TABLE `ms_pengguna`
  ADD PRIMARY KEY (`id_inc`),
  ADD KEY `FK_ms_pengguna` (`ms_role_id`);

--
-- Indeks untuk tabel `ms_privilege`
--
ALTER TABLE `ms_privilege`
  ADD PRIMARY KEY (`id_inc`),
  ADD KEY `FK_ms_privilege` (`ms_role_id`),
  ADD KEY `FK_ms_priasilege` (`ms_menu_id`);

--
-- Indeks untuk tabel `ms_role`
--
ALTER TABLE `ms_role`
  ADD PRIMARY KEY (`id_inc`);

--
-- Indeks untuk tabel `ref_client`
--
ALTER TABLE `ref_client`
  ADD PRIMARY KEY (`kd_client`);

--
-- Indeks untuk tabel `ref_jenispajak`
--
ALTER TABLE `ref_jenispajak`
  ADD PRIMARY KEY (`kd_jenispajak`);

--
-- Indeks untuk tabel `tb_client`
--
ALTER TABLE `tb_client`
  ADD PRIMARY KEY (`id_inc`);

--
-- Indeks untuk tabel `tb_config`
--
ALTER TABLE `tb_config`
  ADD PRIMARY KEY (`kd_config`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`kd_trx`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ms_menu`
--
ALTER TABLE `ms_menu`
  MODIFY `id_inc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `ms_pengguna`
--
ALTER TABLE `ms_pengguna`
  MODIFY `id_inc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `ms_privilege`
--
ALTER TABLE `ms_privilege`
  MODIFY `id_inc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `ms_role`
--
ALTER TABLE `ms_role`
  MODIFY `id_inc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ref_client`
--
ALTER TABLE `ref_client`
  MODIFY `kd_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10084;

--
-- AUTO_INCREMENT untuk tabel `ref_jenispajak`
--
ALTER TABLE `ref_jenispajak`
  MODIFY `kd_jenispajak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_client`
--
ALTER TABLE `tb_client`
  MODIFY `id_inc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_config`
--
ALTER TABLE `tb_config`
  MODIFY `kd_config` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `kd_trx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11733;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ms_pengguna`
--
ALTER TABLE `ms_pengguna`
  ADD CONSTRAINT `FK_ms_pengguna` FOREIGN KEY (`ms_role_id`) REFERENCES `ms_role` (`id_inc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ms_privilege`
--
ALTER TABLE `ms_privilege`
  ADD CONSTRAINT `FK_ms_priasilege` FOREIGN KEY (`ms_menu_id`) REFERENCES `ms_menu` (`id_inc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ms_privilege` FOREIGN KEY (`ms_role_id`) REFERENCES `ms_role` (`id_inc`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
