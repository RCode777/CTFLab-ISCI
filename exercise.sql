-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2022 pada 08.39
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ctflab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `exercise`
--

CREATE TABLE `exercise` (
  `id` int(11) NOT NULL,
  `judul` varchar(400) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `path` longtext NOT NULL,
  `author` varchar(400) NOT NULL,
  `flag` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `exercise`
--

INSERT INTO `exercise` (`id`, `judul`, `deskripsi`, `path`, `author`, `flag`) VALUES
(1, 'Secret Message', 'Rendy di berikan sebuah file yang berformat .txt dari nomor Whatsapp yang tidak di kenal tetapi saat rendy mencoba untuk membuka filenya, ia tidak dapat membaca isi file tersebut karena isi teks dalam file itu ter-encrypt. Dapat kah kamu membantu Rendy untuk membaca isi file tersebut?', 'exercise/secret.txt', 'R.Code', 'ISCI{Aku_5uka_KAmu}'),
(2, 'Image', 'Naila sedang membersihkan foto foto lama di galeri nya agar hp nya tidak berat, saat menghapus beberapa gambar, ia menemukan sebuah gambar batik dan dia tidak ingat kapan ia menyimpan gambar tersebut. Dapatkah kamu membantu naila untuk membongkar isi dari gambar tersebut?', 'exercise/gambar.png', 'R.Code', 'ISCI{dOwNlOaD_Fr0M_cHroM3_On_19Agu5tus}'),
(3, 'Ransom', 'Raihan sedang mendownload software di chrome, saat membuka software yg ia download, semua file dan folder di laptop raihan ter enskripsi. Dapatkah kamu memulihkan file file dari laptop raihan?', 'exercise/raihan.enc', 'Hamez71', 'ISCI{7ereNSKr1pSI_euy}');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `exercise`
--
ALTER TABLE `exercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
