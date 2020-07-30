-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jul 2020 pada 10.09
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mmif`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `No.` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `NIM` varchar(255) NOT NULL,
  `VISI_MISI` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`No.`, `jabatan`, `nama`, `foto`, `NIM`, `VISI_MISI`) VALUES
(1, 'kandidat_ketude1', '', '', '', ''),
(2, 'kandidat_ketude2', '', '', '', ''),
(3, 'kandidat_ketum1', '', '', '', ''),
(4, 'kandidat_ketum2', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `No.` int(11) NOT NULL,
  `NIM` varchar(12) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_sso` varchar(100) NOT NULL,
  `ketude` varchar(10) NOT NULL,
  `ketum` varchar(10) NOT NULL,
  `memilih` varchar(255) NOT NULL,
  `registrasi` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `logout` varchar(255) NOT NULL,
  `submit_memilih` varchar(255) NOT NULL,
  `submit_tdkMemilih` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`No.`, `NIM`, `admin`, `nama`, `password`, `email_sso`, `ketude`, `ketum`, `memilih`, `registrasi`, `login`, `logout`, `submit_memilih`, `submit_tdkMemilih`) VALUES
(1, 'D42114319', '', '', '', 'shadiqm14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(2, 'D42114505', '', '', '', 'abdulrahmann14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(3, 'D42114506', '', '', '', 'setiadia14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(4, 'D42114509', '', '', '', 'bulancol14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(5, 'D42114510', '', '', '', 'rakf14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(6, 'D42114512', '', '', '', 'rojiyyahu14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(7, 'D42114513', '', '', '', 'alamsyahmn14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(8, 'D42114514', '', '', '', 'hidayatullahs14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(9, 'D42114517', '', '', '', 'mallisaig14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(10, 'D42114518', '', '', '', 'syarifak14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(11, 'D42115002', '', '', '', 'amasss15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(12, 'D42115003', '', '', '', 'sulfianaa15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(13, 'D42115004', '', '', '', 'mardiaha15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(14, 'D42115005', '', '', '', 'imrana15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(15, 'D42115006', '', '', '', 'khatimak15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(16, 'D42115007', '', '', '', 'utamians15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(17, 'D42115008', '', '', '', 'julianas15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(18, 'D42115009', '', '', '', 'winarkonan15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(19, 'D42115010', '', '', '', 'raflir15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(20, 'D42115011', '', '', '', 'rahmasariad15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(21, 'D42115012', '', '', '', 'charina15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(22, 'D42115013', '', '', '', 'safitridk15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(23, 'D42115014', '', '', '', 'hamidfk15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(24, 'D42115015', '', '', '', 'biantongwsp15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(25, 'D42115016', '', '', '', 'aprilyahun15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(26, 'D42115017', '', '', '', 'jenara15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(27, 'D42115018', '', '', '', 'indanid15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(28, 'D42115019', '', '', '', 'abdullahba15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(29, 'D42115020', '', '', '', 'nainggolanln15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(30, 'D42115021', '', '', '', 'yuliani15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(31, 'D42115022', '', '', '', 'jusmiati15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(32, 'D42115023', '', '', '', 'umarm15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(33, 'D42115024', '', '', '', 'putriae15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(34, 'D42115301', '', '', '', 'aprisanr15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(35, 'D42115302', '', '', '', 'wicaksonoma15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(36, 'D42115304', '', '', '', 'apriliamf15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(37, 'D42115305', '', '', '', 'ardiansyahr15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(38, 'D42115306', '', '', '', '', '', '', '', '', '', '', '', ''),
(39, 'D42115307', '', '', '', 'amaliad15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(40, 'D42115308', '', '', '', 'kelvin15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(41, 'D42115309', '', '', '', 'kadirar15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(42, 'D42115310', '', '', '', 'chaedara15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(43, 'D42115311', '', '', '', 'hgw15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(44, 'D42115312', '', '', '', 'fatmarn15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(45, 'D42115313', '', '', '', 'halimkc15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(46, 'D42115315', '', '', '', 'fahrezamd15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(47, 'D42115316', '', '', '', 'asiarimz15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(48, 'D42115317', '', '', '', 'jenara15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(49, 'D42115318', '', '', '', 'reginar15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(50, 'D42115319', '', '', '', 'phandicy15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(51, 'D42115320', '', '', '', 'ramadhanfr15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(52, 'D42115321', '', '', '', 'assykinwar15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(53, 'D42115322', '', '', '', 'nasirbsm15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(54, 'D42115501', '', '', '', 'munzirma15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(55, 'D42115502', '', '', '', 'fathurrachmanam15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(56, 'D42115503', '', '', '', 'rijalm15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(57, 'D42115505', '', '', '', 'salsabilalh15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(58, 'D42115506', '', '', '', 'wiriadinataa15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(59, 'D42115507', '', '', '', 'arminf15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(60, 'D42115508', '', '', '', 'amrullahake15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(61, 'D42115509', '', '', '', 'nawirnai15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(62, 'D42115510', '', '', '', 'yusufaa15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(63, 'D42115511', '', '', '', 'saktishr15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(64, 'D42115512', '', '', '', 'fatmarn15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(65, 'D42115513', '', '', '', 'fuadm15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(66, 'D42115514', '', '', '', 'akbaranr15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(67, 'D42115515', '', '', '', 'muhtasanm15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(68, 'D42115516', '', '', '', 'marzoekiaea15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(69, 'D42115517', '', '', '', 'tandungcs15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(70, 'D42115518', '', '', '', 'wahyudid15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(71, 'D42115519', '', '', '', 'sarik15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(72, 'D42115520', '', '', '', 'rahmatamo15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(73, 'D42115521', '', '', '', 'pratamagw15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(74, 'D42115701', '', '', '', 'zulkifli15d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(75, 'D42116002', '', '', '', 'purnamard16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(76, 'D42116003', '', '', '', 'mayangsaria16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(77, 'D42116004', '', '', '', 'fadillahsn16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(78, 'D42116005', '', '', '', 'ramadanial16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(79, 'D42116006', '', '', '', 'lukiss16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(80, 'D42116007', '', '', '', 'alfiansyahr16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(81, 'D42116008', '', '', '', 'syammk16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(82, 'D42116009', '', '', '', 'gauryi16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(83, 'D42116010', '', '', '', 'dewiry16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(84, 'D42116011', '', '', '', 'safina16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(85, 'D42116012', '', '', '', 'qadril16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(86, 'D42116014', '', '', '', 'amaliat16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(87, 'D42116015', '', '', '', 'thomaset16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(88, 'D42116016', '', '', '', 'ismayanti16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(89, 'D42116017', '', '', '', 'halikmfa16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(90, 'D42116019', '', '', '', 'kasiy16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(91, 'D42116020', '', '', '', 'raniags16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(92, 'D42116022', '', '', '', 'qadriamra16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(93, 'D42116301', '', '', '', 'arianim16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(94, 'D42116302', '', '', '', 'amirahnn16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(95, 'D42116303', '', '', '', 'muchtamaram16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(96, 'D42116304', '', '', '', 'radifanmr16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(97, 'D42116305', '', '', '', 'asharimi16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(98, 'D42116306', '', '', '', 'ilhama16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(99, 'D42116307', '', '', '', 'annisam16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(100, 'D42116309', '', '', '', 'pradanaada16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(101, 'D42116311', '', '', '', 'chandrak16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(102, 'D42116312', '', '', '', 'kamaldu16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(103, 'D42116314', '', '', '', 'purnamasaric16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(104, 'D42116315', '', '', '', 'adrimy16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(105, 'D42116316', '', '', '', 'siswantod16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(106, 'D42116501', '', '', '', 'wiludjengdf16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(107, 'D42116502', '', '', '', 'hidayatamaa16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(108, 'D42116503', '', '', '', 'oktianawatia16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(109, 'D42116504', '', '', '', 'handoyoat16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(110, 'D42116505', '', '', '', 'musyawirm14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(111, 'D42116506', '', '', '', 'angriani16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(112, 'D42116507', '', '', '', 'astriafa16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(113, 'D42116508', '', '', '', 'bakatsp16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(114, 'D42116509', '', '', '', 'ismailabp16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(115, 'D42116510', '', '', '', 'masyitafl16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(116, 'D42116511', '', '', '', 'jordik16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(117, 'D42116512', '', '', '', 'shoreandidw16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(118, 'D42116513', '', '', '', 'sahbanai16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(119, 'D42116514', '', '', '', 'paladapv16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(120, 'D42116515', '', '', '', 'mahanima16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(121, 'D42116516', '', '', '', 'wijayaa16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(122, 'D42116518', '', '', '', 'ramadantiaa16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(123, 'D42116520', '', '', '', 'alammf16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(124, 'D42116521', '', '', '', 'musfirahn16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(125, 'D42116522', '', '', '', 'ramlias16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(126, 'D42116523', '', '', '', 'nurdamsa16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(127, 'D42116524', '', '', '', 'assegafsmi16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(128, 'D121171001', '', '', '', 'putrirz17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(129, 'D121171002', '', '', '', 'rayanig17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(130, 'D121171003', '', '', '', 'rahayun17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(131, 'D121171004', '', '', '', 'amiruddin17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(132, 'D121171005', '', '', '', 'mmgs17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(133, 'D121171006', '', '', '', 'syahbanaar17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(134, 'D121171007', '', '', '', 'yusril17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(135, 'D121171008', '', '', '', 'jufrii17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(136, 'D121171009', '', '', '', 'anwarh17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(137, 'D121171010', '', '', '', 'taslinda17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(138, 'D121171011', '', '', '', 'rifati17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(139, 'D121171012', '', '', '', 'nasirf17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(140, 'D121171013', '', '', '', 'jamaluddinjj17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(141, 'D121171014', '', '', '', 'badjaraddn17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(142, 'D121171015', '', '', '', 'yusufm17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(143, 'D121171301', '', '', '', 'rialrf17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(144, 'D121171304', '', '', '', 'akibm17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(145, 'D121171305', '', '', '', 'hakimhq17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(146, 'D121171306', '', '', '', 'goesgh17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(147, 'D121171307', '', '', '', 'aymanamg17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(148, 'D121171308', '', '', '', 'kasyfillahmi17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(149, 'D121171309', '', '', '', 'ilham17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(150, 'D121171310', '', '', '', 'putrapa17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(151, 'D121171311', '', '', '', 'pratamamaa17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(152, 'D121171312', '', '', '', 'sugiantoma17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(153, 'D121171313', '', '', '', 'ahmadac17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(154, 'D121171314', '', '', '', 'septiansyaha17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(156, 'D121171316', '', '', '', 'sadrahmzf17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(157, 'D121171317', '', '', '', 'ikbalm17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(159, 'D121171319', '', '', '', 'sinrangaps17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(160, 'D121171320', '', '', '', 'askarimi17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(161, 'D121171321', '', '', '', 'alifkamo17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(162, 'D121171322', '', '', '', 'purwoatmojodg17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(163, 'D121171323', '', '', '', 'rizkyam17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(165, 'D121171325', '', '', '', 'basoami17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(166, 'D121171501', '', '', '', 'hidayatk17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(167, 'D121171502', '', '', '', 'sumaramwr17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(168, 'D121171503', '', '', '', 'faliqmn17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(169, 'D121171504', '', '', '', 'anwarik17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(170, 'D121171505', '', '', '', 'fmam17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(171, 'D121171506', '', '', '', 'aminuddinmbya17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(172, 'D121171507', '', '', '', 'jihadii17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(173, 'D121171508', '', '', '', 'saadi17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(174, 'D121171509', '', '', '', 'muzakkirsa17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(175, 'D121171510', '', '', '', 'putramaa17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(176, 'D121171511', '', '', '', 'lothianza17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(177, 'D121171512', '', '', '', 'ramadhanimi17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(178, 'D121171513', '', '', '', 'ramadhanmr17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(179, 'D121171514', '', '', '', 'anwarfa17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(180, 'D121171515', '', '', '', 'ismailin17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(181, 'D121171516', '', '', '', 'faisalmw17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(182, 'D121171517', '', '', '', 'suwardiaa17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(183, 'D121171518', '', '', '', 'hidayatm17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(184, 'D121171519', '', '', '', 'petrusgci17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(185, 'D121171520', '', '', '', 'sakinasn17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(186, 'D121171521', '', '', '', 'muisna17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(187, 'D121171522', '', '', '', 'chenb17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(188, 'D121171523', '', '', '', 'bahrunnidamfb17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(189, 'D121171525', '', '', '', 'paad17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(190, 'D121171526', '', '', '', 'wahyudiartoe17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(191, 'D121171527', '', '', '', 'unruasb17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(192, 'D121171528', '', '', '', 'syaputrawa17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(193, 'D121171701', '', '', '', 'timiselah17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(194, 'D121171702', '', '', '', 'kamborimr17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(195, 'D121171703', '', '', '', 'marajamkad17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(196, 'D121171704', '', '', '', 'millangaab17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(197, 'D121181001', '', '', '', 'hamdaniaa18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(198, 'D121181002', '', '', '', 'abunawasnh18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(199, 'D121181003', '', '', '', 'kayyumma18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(200, 'D121181004', '', '', '', 'ruslinu18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(201, 'D121181005', '', '', '', 'saputras18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(202, 'D121181006', '', '', '', 'padudungfbj18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(203, 'D121181007', '', '', '', 'shalehm18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(204, 'D121181008', '', '', '', 'malahadi18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(205, 'D121181009', '', '', '', 'wicaksonoa18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(206, 'D121181010', '', '', '', 'ramadhans18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(207, 'D121181011', '', '', '', 'fatrasri18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(208, 'D121181012', '', '', '', 'pirda18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(209, 'D121181013', '', '', '', 'karyadima18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(210, 'D121181014', '', '', '', 'musyfirahk18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(211, 'D121181015', '', '', '', 'hikmahn18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(212, 'D121181016', '', '', '', 'safruddinra18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(213, 'D121181017', '', '', '', 'ikhsand18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(214, 'D121181018', '', '', '', 'ichwanmf18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(215, 'D121181019', '', '', '', 'ramadhanmi18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(216, 'D121181020', '', '', '', 'alifwani18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(217, 'D121181021', '', '', '', 'febriantamamn18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(218, 'D121181022', '', '', '', 'lakitatyi18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(219, 'D121181023', '', '', '', 'aulianit18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(220, 'D121181024', '', '', '', 'kaharaa18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(221, 'D121181025', '', '', '', 'hamkaaia18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(222, 'D121181026', '', '', '', 'mandeimr18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(223, 'D121181027', '', '', '', 'putriaa18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(224, 'D121181301', '', '', '', 'fauzann18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(225, 'D121181302', '', '', '', 'ilyasmi18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(226, 'D121181303', '', '', '', 'ridhoim18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(227, 'D121181304', '', '', '', 'malikk18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(228, 'D121181305', '', '', '', 'rosadyaaf18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(229, 'D121181306', '', '', '', 'alberto18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(230, 'D121181307', '', '', '', 'sms18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(231, 'D121181308', '', '', '', 'nurhikmad18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(232, 'D121181309', '', '', '', 'affandya18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(233, 'D121181310', '', '', '', 'wildammnr18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(234, 'D121181311', '', '', '', 'kasima18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(235, 'D121181312', '', '', '', 'amzarmf18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(236, 'D121181313', '', '', '', 'jabalnur18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(237, 'D121181314', '', '', '', 'karimatl18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(238, 'D121181315', '', '', '', 'ramadhanif18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(239, 'D121181316', '', '', '', 'suriani18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(240, 'D121181317', '', '', '', 'sabrinapa18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(241, 'D121181318', '', '', '', 'indrayf18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(242, 'D121181319', 'admin', '', '', 'hasanwa18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(243, 'D121181322', '', '', '', 'masrini18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(244, 'D121181323', '', '', '', 'maulanamr18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(245, 'D121181324', '', '', '', 'almiwst18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(246, 'D121181325', '', '', '', 'abdullahf18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(247, 'D121181326', '', '', '', 'badullahi18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(248, 'D121181327', '', '', '', 'salahuddin18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(249, 'D121181328', '', '', '', 'rahmadani18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(250, 'D121181329', '', '', '', 'nurrm18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(251, 'D121181330', '', '', '', 'thahirrt18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(252, 'D121181331', '', '', '', 'sullerta18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(253, 'D121181333', '', '', '', 'febriansyahma18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(254, 'D121181334', '', '', '', 'patiungir18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(255, 'D121181336', '', '', '', 'todingbuarj18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(256, 'D121181337', '', '', '', 'nurfadillah18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(257, 'D121181338', '', '', '', 'tamrintrr18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(258, 'D121181339', '', '', '', 'nurfaidah18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(259, 'D121181340', '', '', '', 'mardiani18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(260, 'D121181341', '', '', '', 'wijayaw18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(261, 'D121181342', '', '', '', 'machmudamh18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(262, 'D121181501', '', '', '', 'nurhasanahi18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(263, 'D121181503', '', '', '', 'smnf18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(264, 'D121181504', '', '', '', 'suwandirc18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(265, 'D121181505', '', '', '', 'mingguayl18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(266, 'D121181506', '', '', '', 'dirgantaradg18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(267, 'D121181507', '', '', '', 'adininsiae18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(268, 'D121181508', '', '', '', 'annisarn18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(269, 'D121181509', '', '', '', 'abustanamin18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(270, 'D121181510', '', '', '', 'mmdd18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(271, 'D121181511', '', '', '', 'pallampaaap18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(272, 'D121181513', '', '', '', 'akrammn18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(273, 'D121181514', '', '', '', 'dimasmg18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(274, 'D121181515', '', '', '', 'daniwoapw18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(275, 'D121181516', '', '', '', 'trymem18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(276, 'D121181517', '', '', '', 'piradeshy18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(277, 'D121181518', '', '', '', 'khaikalmf18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(278, 'D121181519', '', '', '', 'tirayohnr18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(279, 'D121181520', '', '', '', 'zanimts18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(280, 'D121181701', '', '', '', 'fadlurachmanmf18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(281, 'D121181702', '', '', '', 'suyotofnl18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(282, 'D121191001', '', '', '', 'ismailmh19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(284, 'D121191003', '', '', '', 'fadilaan19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(285, 'D121191004', '', '', '', 'gassingmi19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(286, 'D121181705', '', '', '', 'polipm19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(287, 'D121191006', '', '', '', 'ramlanam19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(288, 'D121191007', '', '', '', 'wmyth19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(289, 'D121191008', '', '', '', 'zulfikarir19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(290, 'D121191009', '', '', '', 'damopoliaaa19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(291, 'D121191010', '', '', '', 'naimzrm19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(292, 'D121191012', '', '', '', 'iskandarhm19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(293, 'D121191013', '', '', '', 'sucitraaw19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(294, 'D121191014', 'admin', '', '', 'masagenass19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(295, 'D121191015', '', '', '', 'makmuraba19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(296, 'D121191016', '', '', '', 'ramadhanadr19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(297, 'D121191017', '', '', '', 'wasisathawd19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(298, 'D121191018', '', '', '', 'fitria19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(299, 'D121191019', '', '', '', 'poetriabafa19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(300, 'D121191020', '', '', '', 'pahrul19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(301, 'D121191021', '', '', '', 'khalika19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(302, 'D121191022', '', '', '', 'ramadhanmn19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(303, 'D121191024', '', '', '', 'zhafirinmzz19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(304, 'D121191025', '', '', '', 'amriasa19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(305, 'D121191026', '', '', '', 'safaqdillahma19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(306, 'D121191027', '', '', '', 'prihadid19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(307, 'D121191029', '', '', '', 'raza19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(308, 'D121191030', '', '', '', 'saliml19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(309, 'D121191031', '', '', '', 'fauzirn19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(310, 'D121191032', '', '', '', 'fahiran19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(311, 'D121191033', '', '', '', 'adamw19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(312, 'D121191034', '', '', '', 'tandierana19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(313, 'D121191035', '', '', '', 'israfilmr19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(314, 'D121191036', '', '', '', 'sihotanggmr19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(315, 'D121191037', '', '', '', 'bakesa19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(316, 'D121191038', '', '', '', 'ramadhanakb19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(317, 'D121191039', '', '', '', 'adimurfiqa19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(318, 'D121191041', '', '', '', 'putramry19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(319, 'D121191042', '', '', '', 'aryatamaaa19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(320, 'D121191043', '', '', '', 'ahmadmz19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(321, 'D121191044', '', '', '', 'pironom19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(322, 'D121191045', '', '', '', 'putrisf19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(323, 'D121191046', '', '', '', 'ramadhaninp19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(324, 'D121191047', '', '', '', 'hijnurbr19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(325, 'D121191048', '', '', '', 'adilafm19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(326, 'D121191049', '', '', '', 'hakimfk19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(327, 'D121191050', '', '', '', 'rahmas19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(328, 'D121191051', '', 'Reinhart Wibisono Soplantila', '$2y$10$NlD0Gbf36KpkY880tigfAuc66/cM2PsCMbSA2Dm.kcX1f0sFdNZtu', 'soplantilarw19d@student.unhas.ac.id', '', '', '', '', 'login', 'logout', '', 'tidak memilih'),
(329, 'D121191052', '', '', '', 'aljjd19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(330, 'D121191053', '', '', '', 'nursadihdhp19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(331, 'D121191054', '', '', '', 'makkasauagh19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(332, 'D121191055', '', '', '', 'adjiatw19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(333, 'D121191056', '', '', '', 'djayanayp19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(334, 'D121191057', '', '', '', 'nurazkiyahad19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(335, 'D121191058', '', '', '', 'buanasws19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(336, 'D121191059', '', '', '', 'seprianto19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(337, 'D121191060', '', '', '', 'soeanap19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(338, 'D121191064', '', '', '', 'arismz19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(339, 'D121191065', 'admin', '', '', 'wijayaap19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(340, 'D121191066', '', '', '', 'jamalaw19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(341, 'D121191067', '', '', '', 'mansurya19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(342, 'D121191068', '', '', '', 'nurhadimi19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(343, 'D121191070', '', '', '', 'nengsihpa19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(344, 'D121191071', '', '', '', 'asrama19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(345, 'D121191072', '', '', '', 'abrarmf19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(346, 'D121191074', '', '', '', 'putraamre19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(347, 'D121191075', '', '', '', 'darwism19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(348, 'D121191077', '', '', '', 'alamakobr19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(349, 'D121191078', '', '', '', 'aryaa19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(350, 'D121191079', '', '', '', 'rusmiatia19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(351, 'D121191081', '', '', '', 'abdullahmf19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(352, 'D121191082', '', '', '', 'adyatamaf19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(353, 'D121191083', '', '', '', 'saputridw19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(354, 'D121191084', '', '', '', 'ilham19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(355, 'D121191085', '', '', '', 'hudaasi19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(356, 'D121191086', '', '', '', 'ameliar19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(357, 'D121191087', '', '', '', 'hermantos19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(358, 'D121191088', '', '', '', 'ardiansyahlf19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(359, 'D121191089', '', '', '', 'ahmadks19d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(360, 'D42114005', '', '', '', 'arlinmre14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(361, 'D42114007', '', '', '', 'alamsyahi14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(362, 'D42114010', '', '', '', 'idrusf14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(363, 'D42114015', '', '', '', 'aziswa14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(364, 'D42114018', '', '', '', 'firmanr14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(365, 'D42114303', '', '', '', 'rmaa14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(366, 'D42114305', '', '', '', 'sariam14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(367, 'D42114308', '', '', '', 'yakip14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(368, 'D42114311', '', '', '', 'jamaluddin14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(369, 'D42114312', '', '', '', 'yusringmzaq14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(370, 'D42114313', '', '', '', 'kuddusmkf14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(371, 'D42114314', '', '', '', 'safrinh14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(372, 'D42114318', '', '', '', 'aya14d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(373, 'D42116001', '', '', '', 'hasbiw16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(374, 'D42116013', '', '', '', 'istiqomahanf16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(375, 'D42116018', '', '', '', 'raysfm16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(376, 'D42116313', '', '', '', 'sadewomz16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(377, 'D42116517', '', '', '', 'ardiansyahmh16d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(378, 'D121171302', '', '', '', 'suaibara17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(379, 'D121171303', '', '', '', 'averroesma17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(380, 'D121171315', '', '', '', 'roemodaras17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(381, 'D121171318', '', '', '', 'irfangm17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(382, 'D121171324', '', '', '', 'syukran17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(383, 'D121171326', '', '', '', 'syafrirs17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(384, 'D121171524', '', '', '', 'wijayalomto17d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(385, 'D121181320', '', '', '', 'mmfa18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(386, 'D121181321', '', '', '', 'nurm18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(387, 'D121181332', '', '', '', 'amdarfi18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(388, 'D121181335', '', '', '', 'adityawarmanrmi18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(389, 'D121181502', '', '', '', 'utamaikap18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(390, 'D121181512', '', '', '', 'sujarmanms18d@student.unhas.ac.id', '', '', '', '', '', '', '', ''),
(391, 'D121191090', '', '', '', 'angguijyp19d@student.unhas.ac.id', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suara_mmif`
--

CREATE TABLE `suara_mmif` (
  `No.` int(11) NOT NULL,
  `NIM` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `calonketude1` int(255) NOT NULL,
  `calonketude2` int(255) NOT NULL,
  `calonketum1` int(255) NOT NULL,
  `calonketum2` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `suara_mmif`
--

INSERT INTO `suara_mmif` (`No.`, `NIM`, `created_at`, `calonketude1`, `calonketude2`, `calonketum1`, `calonketum2`) VALUES
(44, 'RDEyMTE5MTA1MQ==', '2020-07-30 05:06:27', 1, 1, 0, 1),
(45, 'RDEyMTE5MTA1MQ==', '2020-07-30 05:06:27', 1, 1, 0, 1),
(46, 'RDEyMTE5MTA1MQ==', '2020-07-30 05:06:27', 1, 1, 0, 1),
(47, 'RDEyMTE5MTA1Mg==', '2020-07-26 11:56:29', 0, 0, 0, 0),
(48, 'RDEyMTE5MTA1MQ==', '2020-07-30 05:06:27', 1, 1, 0, 1),
(49, 'RDEyMTE5MTA2NQ==', '0000-00-00 00:00:00', 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`No.`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`No.`,`NIM`,`password`);

--
-- Indeks untuk tabel `suara_mmif`
--
ALTER TABLE `suara_mmif`
  ADD PRIMARY KEY (`No.`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `No.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `No.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=392;

--
-- AUTO_INCREMENT untuk tabel `suara_mmif`
--
ALTER TABLE `suara_mmif`
  MODIFY `No.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
