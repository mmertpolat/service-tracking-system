-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 May 2019, 04:53:30
-- Sunucu sürümü: 10.1.32-MariaDB
-- PHP Sürümü: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `istakip`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'password');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmet`
--

CREATE TABLE `hizmet` (
  `id` int(11) NOT NULL,
  `hizmetkodu` varchar(12) CHARACTER SET utf8 NOT NULL,
  `musterisite` varchar(225) NOT NULL,
  `musteripaket` varchar(225) NOT NULL,
  `tarih` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `hizmet`
--

INSERT INTO `hizmet` (`id`, `hizmetkodu`, `musterisite`, `musteripaket`, `tarih`) VALUES
(7, '03U8WV30', 'www.r10.net', '', '20-03-2017 - 16:20'),
(8, '91BB4IG5', 'www.babagogo.com', '', '20-03-2017 - 17:03'),
(9, 'SXADVYNQ', 'www.yandex.com', 'PHP Kurulum', '23-03-2017 - 22:57');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `islemler`
--

CREATE TABLE `islemler` (
  `id` int(11) NOT NULL,
  `hizmetkod` varchar(12) NOT NULL,
  `hizmet_site` varchar(335) NOT NULL,
  `hizmet_adi` varchar(225) NOT NULL,
  `yapilan_islem` text NOT NULL,
  `islem_saati` varchar(20) NOT NULL,
  `islem_tarih` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `islemler`
--

INSERT INTO `islemler` (`id`, `hizmetkod`, `hizmet_site`, `hizmet_adi`, `yapilan_islem`, `islem_saati`, `islem_tarih`) VALUES
(9, 'SXADVYNQ', '', '', 'tesadafsfdsafas', '22:58', '23.03.2017'),
(10, 'SXADVYNQ', '', '', 'dsagdsagdsa', '22:58', '23.03.2017'),
(11, 'SXADVYNQ', '', '', 'gadagdsafdsafas', '22:58', '23.03.2017');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `hizmet`
--
ALTER TABLE `hizmet`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `islemler`
--
ALTER TABLE `islemler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `hizmet`
--
ALTER TABLE `hizmet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `islemler`
--
ALTER TABLE `islemler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
