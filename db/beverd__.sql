-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 11, 2025 alle 20:07
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beverdì`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `ricette`
--

CREATE TABLE `ricette` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `categoria` varchar(40) NOT NULL,
  `livello_alcool` varchar(40) NOT NULL,
  `bicchiere` varchar(40) NOT NULL,
  `ingredienti` text NOT NULL,
  `id_utente` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `ricette`
--

INSERT INTO `ricette` (`id`, `nome`, `categoria`, `livello_alcool`, `bicchiere`, `ingredienti`, `id_utente`) VALUES
(4, 'PROVA2', 'Shot', 'Alcoholic', 'Jar', '10:Light;10:Gin;150:Amaretto;12:Tea;', 17),
(5, 'DISPERAZIONE', 'Cocktail', 'Alcoholic', 'Highball glass', '11:Apricot\r\n500:Jack\r\n40:aMARETTO', 17),
(6, 'NOME', 'Punch / Party Drink', 'Optional alcohol', 'Old-fashioned glass', '1:Apricot\r;1:Triple\r;2:Brandy\r;2:Dark\r;500:Amaretto\r;10:Tea\r;1:Applejack;', 26),
(7, 'claudiotiamo', 'Shot', 'Alcoholic', 'Mason jar', '5:Gin\r;10:Tea\r;15:Cognac;', 26),
(9, 'LebronJames', 'Shot', 'Alcoholic', 'Cordial glass', '100:Jack;100:Baileys;', 16);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `pfp` text NOT NULL,
  `data_nascita` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `username`, `password`, `pfp`, `data_nascita`) VALUES
(16, 'nicog', '50673507d58a8bebf0c374aaff06633b', '../img/champagne.png', '2025-05-02'),
(17, 'giu', '8d84dd7c18bdcb39fbb17ceeea1218cd', '../img/woman2.png', '2006-03-28');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `ricette`
--
ALTER TABLE `ricette`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `ricette`
--
ALTER TABLE `ricette`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
