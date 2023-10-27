-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 22, 2022 alle 21:05
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alfatecnica`
--
CREATE DATABASE IF NOT EXISTS `alfatecnica` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `alfatecnica`;

-- --------------------------------------------------------

--
-- Struttura della tabella `anagrafica`
--

CREATE TABLE `anagrafica` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sede` varchar(100) NOT NULL,
  `path_logo` varchar(40) NOT NULL,
  `indirizzo` varchar(150) NOT NULL,
  `CAP` int(10) NOT NULL,
  `citta` varchar(50) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `telefono1` varchar(20) DEFAULT NULL,
  `email1` varchar(50) DEFAULT NULL,
  `rif_personale` text DEFAULT NULL,
  `telefono2` varchar(20) DEFAULT NULL,
  `cellulare` varchar(20) DEFAULT NULL,
  `email2` varchar(50) DEFAULT NULL,
  `noteAziendali` text DEFAULT NULL,
  `noteCliente` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `anagrafica`
--

INSERT INTO `anagrafica` (`id`, `nome`, `sede`, `path_logo`, `indirizzo`, `CAP`, `citta`, `provincia`, `telefono1`, `email1`, `rif_personale`, `telefono2`, `cellulare`, `email2`, `noteAziendali`, `noteCliente`) VALUES
(1, 'Dallara', 'Varano de Melegari', 'img/loghi/Dallara.png', 'Via Provinciale, 33', 43040, 'Varano de Melegari', 'PR', '3408871542', 'dallarastradale@dallara.auto', NULL, '0521887265', '6528716254', NULL, NULL, NULL),
(2, 'Bercella', 'Varano de Melegari', 'img/loghi/azienda2.png', 'Via Enzo Ferrari, 10', 43040, 'Varano de Melegari', 'PR', '3338765298', 'bercella@bercella.it', NULL, '0521829983', '9992837625', NULL, NULL, NULL),
(3, 'NonSoloTabacchi', 'Ozzano Taro', 'img/loghi/azienda3.png', 'Via Nazionale, 64', 43044, 'Ozzano Taro', 'PR', '3762983625', 'nonsolotabacchi@gmail.com', NULL, '0521765287', '7725276534', 'tabaccheriaozzano_64@nonsolotabacchi.it', NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `app`
--

CREATE TABLE `app` (
  `idAnagrafica` int(11) NOT NULL,
  `idPlanimetria` int(11) NOT NULL,
  `idProdotto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `app`
--

INSERT INTO `app` (`idAnagrafica`, `idPlanimetria`, `idProdotto`) VALUES
(1, 1, 1),
(1, 1, 2),
(1, 1, 3),
(1, 1, 4),
(1, 1, 9),
(1, 1, 25),
(1, 1, 26),
(1, 1, 27),
(2, 3, 5),
(2, 3, 6),
(2, 3, 7),
(2, 3, 8),
(2, 3, 10),
(2, 3, 21),
(2, 3, 22),
(2, 3, 23),
(2, 3, 24);

-- --------------------------------------------------------

--
-- Struttura della tabella `campi`
--

CREATE TABLE `campi` (
  `id` int(11) NOT NULL,
  `stato` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `cliente`
--

CREATE TABLE `cliente` (
  `idUtente` int(11) NOT NULL,
  `idAnagrafica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `c_p`
--

CREATE TABLE `c_p` (
  `idCampo` int(11) NOT NULL,
  `idProdotto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `domande`
--

CREATE TABLE `domande` (
  `id` int(11) NOT NULL,
  `testo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `d_q`
--

CREATE TABLE `d_q` (
  `idQuestionario` int(11) NOT NULL,
  `idDomanda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `planimetrie`
--

CREATE TABLE `planimetrie` (
  `id` int(11) NOT NULL,
  `path_img` tinytext NOT NULL,
  `width` float NOT NULL,
  `height` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `planimetrie`
--

INSERT INTO `planimetrie` (`id`, `path_img`, `width`, `height`) VALUES
(1, 'img/planimetrie/Dallara.png', 532, 392),
(2, 'img/planimetrie/checojon-scaled.png', 532, 392),
(3, 'img/planimetrie/planimetrie-case.jpg', 952, 692);

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

CREATE TABLE `prodotti` (
  `id` int(11) NOT NULL,
  `pos_x` float NOT NULL,
  `pos_y` float NOT NULL,
  `idProdImg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prodotti`
--

INSERT INTO `prodotti` (`id`, `pos_x`, `pos_y`, `idProdImg`) VALUES
(1, 223, 502, 1),
(2, 300, 560, 1),
(3, 697, 428, 2),
(4, 299, 576, 1),
(5, 727, 224, 1),
(6, 578, 246, 2),
(7, 609, 560, 2),
(8, 255, 176, 1),
(9, 145, 234, 1),
(10, 100, 100, 2),
(11, 187, 190, 3),
(12, 289, 598, 2),
(13, 478.5, 345, 3),
(14, 289.5, 334, 3),
(15, 291.931, 485.406, 2),
(16, 367, 326, 2),
(17, 548.5, 465, 3),
(18, 295.384, 342.609, 1),
(19, 743, 244, 3),
(20, 506, 127, 3),
(21, 926.003, 106.323, 2),
(22, 926.003, 106.323, 1),
(23, 25.5, 308, 2),
(24, 457.5, 23, 1),
(25, 390, 294, 2),
(26, 283, 191, 1),
(27, 447, 29, 1),
(28, 137, 303, 1),
(29, 162, 261, 1),
(30, 177, 284, 1),
(31, 304.925, 249.185, 2),
(32, 348, 483, 2),
(33, 182.5, 242, 2),
(34, 199.606, 344.723, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti_img`
--

CREATE TABLE `prodotti_img` (
  `id` int(11) NOT NULL,
  `path_img` tinytext NOT NULL,
  `nome_prodotto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prodotti_img`
--

INSERT INTO `prodotti_img` (`id`, `path_img`, `nome_prodotto`) VALUES
(1, 'img/prodotti/estintore_click.png', 'estintore'),
(2, 'img/prodotti/idrante.png', 'idrante'),
(3, 'img/prodotti/tavolo.png', 'tavolo');

-- --------------------------------------------------------

--
-- Struttura della tabella `p_d`
--

CREATE TABLE `p_d` (
  `idProdotto` int(11) NOT NULL,
  `idDomanda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `p_q`
--

CREATE TABLE `p_q` (
  `idProdotto` int(11) NOT NULL,
  `idQuestionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `questionario`
--

CREATE TABLE `questionario` (
  `id` int(11) NOT NULL,
  `testo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `revisioni`
--

CREATE TABLE `revisioni` (
  `id` int(11) NOT NULL,
  `idProdotto` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `ris_rev`
--

CREATE TABLE `ris_rev` (
  `idRevisione` int(11) NOT NULL,
  `idcampo` int(11) NOT NULL,
  `valore` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cognome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `anagrafica`
--
ALTER TABLE `anagrafica`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`idAnagrafica`,`idPlanimetria`,`idProdotto`),
  ADD KEY `idAnagrafica` (`idAnagrafica`),
  ADD KEY `idPlanimetria` (`idPlanimetria`),
  ADD KEY `idProdotto` (`idProdotto`);

--
-- Indici per le tabelle `campi`
--
ALTER TABLE `campi`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idUtente`,`idAnagrafica`),
  ADD KEY `idUtente` (`idUtente`),
  ADD KEY `idAnagrafica` (`idAnagrafica`);

--
-- Indici per le tabelle `c_p`
--
ALTER TABLE `c_p`
  ADD PRIMARY KEY (`idCampo`,`idProdotto`),
  ADD KEY `idCampo` (`idCampo`),
  ADD KEY `idProdotto` (`idProdotto`);

--
-- Indici per le tabelle `domande`
--
ALTER TABLE `domande`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `d_q`
--
ALTER TABLE `d_q`
  ADD PRIMARY KEY (`idQuestionario`,`idDomanda`),
  ADD KEY `idQuestionario` (`idQuestionario`),
  ADD KEY `idDomanda` (`idDomanda`);

--
-- Indici per le tabelle `planimetrie`
--
ALTER TABLE `planimetrie`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_prodotti_img` (`idProdImg`) USING BTREE;

--
-- Indici per le tabelle `prodotti_img`
--
ALTER TABLE `prodotti_img`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `p_d`
--
ALTER TABLE `p_d`
  ADD PRIMARY KEY (`idProdotto`,`idDomanda`),
  ADD KEY `idProdotto` (`idProdotto`),
  ADD KEY `idDomanda` (`idDomanda`);

--
-- Indici per le tabelle `p_q`
--
ALTER TABLE `p_q`
  ADD PRIMARY KEY (`idProdotto`,`idQuestionario`),
  ADD KEY `idQuestionario` (`idQuestionario`),
  ADD KEY `idProdotto` (`idProdotto`);

--
-- Indici per le tabelle `questionario`
--
ALTER TABLE `questionario`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `revisioni`
--
ALTER TABLE `revisioni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProdotto` (`idProdotto`);

--
-- Indici per le tabelle `ris_rev`
--
ALTER TABLE `ris_rev`
  ADD PRIMARY KEY (`idRevisione`,`idcampo`),
  ADD KEY `idRevisione` (`idRevisione`),
  ADD KEY `idRevisione_2` (`idRevisione`),
  ADD KEY `idcampo` (`idcampo`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `anagrafica`
--
ALTER TABLE `anagrafica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `campi`
--
ALTER TABLE `campi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `domande`
--
ALTER TABLE `domande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `planimetrie`
--
ALTER TABLE `planimetrie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT per la tabella `prodotti_img`
--
ALTER TABLE `prodotti_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `questionario`
--
ALTER TABLE `questionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `revisioni`
--
ALTER TABLE `revisioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `app`
--
ALTER TABLE `app`
  ADD CONSTRAINT `app_ibfk_1` FOREIGN KEY (`idAnagrafica`) REFERENCES `anagrafica` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `app_ibfk_2` FOREIGN KEY (`idPlanimetria`) REFERENCES `planimetrie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `app_ibfk_3` FOREIGN KEY (`idProdotto`) REFERENCES `prodotti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idUtente`) REFERENCES `utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`idAnagrafica`) REFERENCES `anagrafica` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `c_p`
--
ALTER TABLE `c_p`
  ADD CONSTRAINT `c_p_ibfk_1` FOREIGN KEY (`idCampo`) REFERENCES `campi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c_p_ibfk_2` FOREIGN KEY (`idProdotto`) REFERENCES `prodotti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `d_q`
--
ALTER TABLE `d_q`
  ADD CONSTRAINT `d_q_ibfk_1` FOREIGN KEY (`idQuestionario`) REFERENCES `questionario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `d_q_ibfk_2` FOREIGN KEY (`idDomanda`) REFERENCES `domande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  ADD CONSTRAINT `prodotti_ibfk_1` FOREIGN KEY (`idProdImg`) REFERENCES `prodotti_img` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `p_d`
--
ALTER TABLE `p_d`
  ADD CONSTRAINT `p_d_ibfk_1` FOREIGN KEY (`idDomanda`) REFERENCES `domande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_d_ibfk_2` FOREIGN KEY (`idProdotto`) REFERENCES `prodotti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `p_q`
--
ALTER TABLE `p_q`
  ADD CONSTRAINT `p_q_ibfk_1` FOREIGN KEY (`idProdotto`) REFERENCES `prodotti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_q_ibfk_2` FOREIGN KEY (`idQuestionario`) REFERENCES `questionario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `revisioni`
--
ALTER TABLE `revisioni`
  ADD CONSTRAINT `revisioni_ibfk_1` FOREIGN KEY (`idProdotto`) REFERENCES `prodotti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `ris_rev`
--
ALTER TABLE `ris_rev`
  ADD CONSTRAINT `ris_rev_ibfk_1` FOREIGN KEY (`idcampo`) REFERENCES `campi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ris_rev_ibfk_2` FOREIGN KEY (`idRevisione`) REFERENCES `revisioni` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
