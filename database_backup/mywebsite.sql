-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 04:56 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mywebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `username` text NOT NULL,
  `password` text NOT NULL,
  `Mail` text NOT NULL,
  `PhoneNumber` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`username`, `password`, `Mail`, `PhoneNumber`, `id`) VALUES
('alexandra', 'alexandra', '', '', 1),
('maria', 'maria', '', '', 2),
('ana', 'ana', '', '', 3),
('andreea', 'andreea', 'bcjdsbv@yahoo.com', '0747573', 4);

-- --------------------------------------------------------

--
-- Table structure for table `comentarii`
--

CREATE TABLE `comentarii` (
  `Id` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Comentariu` text NOT NULL,
  `Id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comentarii`
--

INSERT INTO `comentarii` (`Id`, `Data`, `Comentariu`, `Id_client`) VALUES
(8, '2021-01-02', 'imi place ', 1),
(10, '2021-01-02', 'Cea mai buna agentie din oras.Foarte multumita', 3),
(11, '2021-01-02', 'frumos', 1),
(14, '2021-01-02', 'foarte bine', 2),
(15, '2021-01-02', 'nu', 3);

-- --------------------------------------------------------

--
-- Table structure for table `descriere`
--

CREATE TABLE `descriere` (
  `Titlu1` text NOT NULL,
  `Descriere` text NOT NULL,
  `Titlu2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `descriere`
--

INSERT INTO `descriere` (`Titlu1`, `Descriere`, `Titlu2`) VALUES
('Iubim sa calatorim', 'Break free a luat nastere din pasiune pentru calatorie,iar dupa 10 ani in care ne-am plimbat prin toata lumea,acum e momentul pentru a descoperi mai bine acasa,Romania.De fiecare data cand ati calatorit cu noi ati avut parte de cele mai frumoase experiente pe care le poate avea omul intr-o viata si nu v-am dezamagit.Indiferent de obstacole,mereu gasim o cale spre a fi mai buni,suntem inventivi si cu zambetul pe buze.Calatorim pentru gust,savoare,arome inedite,caldura,valuri si peisaje montane de cand ne stim si ajutam pe cei care ne trec pragul sa se descopere pe ei insisi,sa isi intreaca limitele,sa cante si sa danseze asa cum le place,ca intre prieteni.Prietenie,suport,siguranta si fericire intr-un pahar.Asta este ceea ce va oferim de 10 ani si vom continua si in viitor.Fie ca suntem in Romania,Franta,Austria,Serbia sau Slovacia,vom descoperi impreuna,in natura,cultura si arhitectura,cea mai frumoasa parte din noi.', 'CUNOASTE ECHIPA');

-- --------------------------------------------------------

--
-- Table structure for table `despre-noi`
--

CREATE TABLE `despre-noi` (
  `Imagine` text NOT NULL,
  `Titlu3` text NOT NULL,
  `Subtitlu3` text NOT NULL,
  `Mail` text NOT NULL,
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `despre-noi`
--

INSERT INTO `despre-noi` (`Imagine`, `Titlu3`, `Subtitlu3`, `Mail`, `Id`) VALUES
('images/poza2.jpg', 'Testoasa', 'Chief Executive Officer', 'testoasa@gmail.com', 1),
('images/poza3.jpg', 'Something', 'Something else', 'mail@mail.com', 3),
('images/poza2.jpg', 'Testutaa', 'CTO', 'testutaa_micutaa@gmail.com', 6),
('images/poza3.jpg', 'Mamutaa', 'MDA', 'mutovici@gmail.com', 7),
('images/agent01.jpg', 'MiuMiu', 'Sales Agent', 'miutrei@delta.com', 8);

-- --------------------------------------------------------

--
-- Table structure for table `destinatii`
--

CREATE TABLE `destinatii` (
  `Id` int(11) NOT NULL,
  `Poza` text NOT NULL,
  `Titlu` text NOT NULL,
  `Descriere` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinatii`
--

INSERT INTO `destinatii` (`Id`, `Poza`, `Titlu`, `Descriere`) VALUES
(1, 'images/pozabordeaux.jpg', 'Bordeaux,Franta', 'Bordeaux este un oraș în sud-vestul Franței, prefectura departamentului Gironde și capitala regiunii Noua Aquitania.Orașul este traversat de fluviul Garonne. Centrul istoric vechi al orașului Bordeaux a fost înscris în anul 2005 pe lista patrimoniului cultural mondial UNESCO.Orasul este cunoscut în lume pentru vinurile Bordeaux si pentru podgoriile bordeaulese, în special din secolul XVIII, care a fost o veritabila era de aur pentru oras.Aria urbana a Bordeaux are 1 215 769 locuitori în 2015, fiind a cincea arie urbana din Franta.'),
(2, 'images/pozamarseille.jpg', 'Marseille,Franta', 'Marsilia (în franceză Marseille, occitană Marselha) este al doilea cel mai mare oraș din Franța. Situată pe coasta Mediteranei, în vechea Provența (Provenza în italiană, în franceză Provence, Provença în occitană), este cel mai mare port comercial al țării. Marsilia este prefectura departamentului Bouches-du-Rhône și capitala regiunii Provence-Alpi-Coasta de Azur.'),
(3, 'images/pozabucegi.jpg', 'Muntii Bucegi,Romania', 'Masivul Bucegi, cu o suprafață de circa 300 km2, se află la extremitatea estică a Carpaților Meridionali, desfășurându-se între Valea Prahovei la est și culoarul Branului și Valea Ialomiței la vest; cade brusc spre nord către depresiunea Bârsei și spre sud, până la contactul cu Subcarpații de curbură. Se întinde pe teritoriul județelor Dâmbovița, Prahova și Brașov. Fiind de o mare complexitate structurală și morfologică, masivul apare ca o cetate naturală, cu incinta suspendată la 1600 – 2500 m, sprijinită de abrupturi puternice.'),
(4, 'images/pozaapuseni.jpg', 'Muntii Apuseni,Romania', 'Munții Apuseni sunt un lanț muntos din Transilvania, parte a Carpaților Occidentali. Cel mai înalt vârf este Vârful Bihor, din munții Bihor cu o altitudine de 1849 de metri. Sunt delimitați la nord de Râul Barcău, la sud de Râul Mureș, la vest de Dealurile și Câmpia de Vest, iar la est de Depresiunea Colinară a Transilvaniei. În Munții Apuseni se află peste 400 de peșteri.'),
(5, 'images/pozaviena.jpg', 'Viena,Austria', 'Viena (învechit Beciu, în maghiară Bécs) este capitala Austriei. Orașul este situat în extremitatea răsăriteană a acestei republici federale, în landul (regiunea autonomă) Viena, și este traversat de Dunăre. Regiunea autonomă Viena este, cu cei aproape două milioane de locuitori ai săi, ce reprezintă un sfert din populația totală a Austriei, al zecelea oraș ca mărime din cadrul Uniunii Europene.'),
(6, 'images/pozatatra.jpg', 'Muntii Tatra,Slovacia', 'Munții Tatra reprezintă sectorul cel mai înalt al lanțului montan carpatic, grupa Carpaților de Vest. Se întinde la granița dintre Slovacia și Polonia, cea mai mare parte a masei montane revenindu-i primei. Cel mai înalt punct este vârful Gerlachovský, cu o altitudine de 2.655 m din partea slovacă. Mai multe vârfuri depășesc 2.600 m, toate în Slovacia.');

-- --------------------------------------------------------

--
-- Table structure for table `imagini`
--

CREATE TABLE `imagini` (
  `Id` int(11) NOT NULL,
  `Imagine` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imagini`
--

INSERT INTO `imagini` (`Id`, `Imagine`) VALUES
(1, 'images/poza1.1.jpg'),
(2, 'images/poza4.jpg'),
(3, 'images/poza5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `userid` int(11) NOT NULL,
  `destinationid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`userid`, `destinationid`) VALUES
(1, 3),
(1, 2),
(2, 4),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `textintro`
--

CREATE TABLE `textintro` (
  `Titlu` text NOT NULL,
  `Descriere` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `textintro`
--

INSERT INTO `textintro` (`Titlu`, `Descriere`) VALUES
('De ce noi?', 'Pentru ca Break Free e mai mult decat o simpla agentie de turism.Este locul unde se leaga cele mai frumoase prietenii,iar momentele alaturi de noi sunt de neuitat.Just break free!	');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comentarii`
--
ALTER TABLE `comentarii`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `despre-noi`
--
ALTER TABLE `despre-noi`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `destinatii`
--
ALTER TABLE `destinatii`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `imagini`
--
ALTER TABLE `imagini`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comentarii`
--
ALTER TABLE `comentarii`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `despre-noi`
--
ALTER TABLE `despre-noi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `destinatii`
--
ALTER TABLE `destinatii`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `imagini`
--
ALTER TABLE `imagini`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
