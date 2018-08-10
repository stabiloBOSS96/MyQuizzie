-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 22. Jul 2018 um 20:17
-- Server-Version: 10.1.9-MariaDB
-- PHP-Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `quiz`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category`
--

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `category`
--

INSERT INTO `category` (`id`, `title`, `description`) VALUES
(1, 'Allgemeinwissen', 'Hier kannst du dein Allgemeinwissen testen.'),
(2, 'Physik/Technik', 'Die richtige Kategorie für alle Albert Einsteins dieser Welt.');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `logindata`
--

CREATE TABLE `logindata` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pwd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `logindata`
--

INSERT INTO `logindata` (`id`, `name`, `pwd`) VALUES
(1, 'Max Mustermann', 'test'),
(2, 'Erika Musterfrau', 'test');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `question`
--

CREATE TABLE `question` (
  `id` int(11) UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_a` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_b` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_c` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_d` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right_answer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `question`
--

INSERT INTO `question` (`id`, `question`, `answer_a`, `answer_b`, `answer_c`, `answer_d`, `right_answer`, `quiz_id`) VALUES
(1, '''Welchen Namen trägt ein erfolgreicher Frankfurter Fußballverein?', 'Borussia', 'Eintracht', 'Wacker', 'Kickers', 'b', 1),
(2, 'Mit welchem chemischen Stoff wird das Wasser im Schwimmbad sauber gehalten?', 'mit Chlor', 'mit Natron', 'mit Blei', 'mit Schwefel', 'a', 1),
(3, 'In was misst man die Frequenz?', 'in Niere', 'in Milz', 'in Hertz', 'in Leber', 'c', 1),
(4, 'Mit welchem Programm wurde der Wiederaufbau des zerstörten Nachkriegseuropas gefördert?', 'Eisenhower-Doktrin', 'Truman-Doktrin', 'Marshallplan', 'Allan-Parsons Project', 'c', 1),
(5, 'Wie heißt der Film nach dem gleichnamigen Roman von Hunter S. Thompson vollständig, "Fear and Loathing in ..."?', 'Las Vegas', 'San Francisco', 'New York', 'San Diego', 'a', 1),
(6, 'Kalorik ist...', 'Lehre vom Licht', 'Wärmelehre', 'Lehre der Bewegung', 'Lehre vom Schall', 'b', 2),
(7, 'Aus wie vielen elementaren Fermionen besteht nach dem Standardmodell die gesamte Materie?', '6', '12', '8', '16', 'b', 2),
(8, 'Ein Lichtquant nennt man auch ...', 'Photo', 'Meson', 'Quark', 'Photon', 'd', 2),
(9, 'Wer erfand bereits 1854 eine Glühlampe mit einer verkohlten Bambusfaser?', 'Philipp Reis', 'Thomas Alva Edison', 'Elisha Gray', 'Heinrich Goebel', 'd', 2),
(10, 'Wenn das Wetter gut ist, wird der Bauer bestimmt den Eber, das Ferkel und...?', '...einen draufmachen', '...die Nacht durchzechen', '...die Sau rauslassen', '...auf die Kacke hauen', 'c', 3),
(11, 'Was ist meist ziemlich viel?', 'stolze Summe', 'selbstbewusste Differenz', 'arroganter Quotient', 'hochmütiges Produkt', 'a', 3),
(12, 'Wessen Genesung schnell voranschreitet, der erholt sich...?', '...hinguckends', '...anschauends', '...zusehends', '...glotzends', 'c', 3),
(13, 'Natürlich spielten musikalische Menschen auch im...?', '...Westsaxo Fon', '...Nordklari Nette', '...Südpo Saune', '...Ostblock Flöte', 'd', 3),
(14, 'Wobei gibt es keine geregelten Öffnungszeiten?', 'Baumärkte', 'Möbelhäuser', 'Teppichgeschäfte', 'Fensterläden', 'd', 3),
(15, 'Welcher General vertrieb im 19. Jahrhundert die Mexikaner aus dem heutigen US-Bundesstaat Texas?', 'John Denver', 'Sam Houston', 'Michael Miami', 'Phil A. Delphia', 'b', 3),
(16, 'Wer sollte sich mit der "Zwanzig nach vier"-Stellung auskennen?', 'Fahrlehrer', 'Karatemeister', 'Kellner', 'Landschaftsarchitekt', 'c', 3),
(17, 'Wie heißen die Entwickler dieser App?', 'Sinan, Markus und Leon', 'Simon, Max und Lorenz', 'Sinai, Max und Lukas', 'Sinan, Max und Lukas', 'd', 4),
(18, 'Wie viel Mühe steckt in der App?', 'keine', 'sehr viel', 'ultra viel', 'viel', 'c', 4),
(19, 'Wer hält die Vorlesung "Web-DB-Kopplung"?', 'Prof. Dr. Funk', 'Thomas Perschke', 'Prof. Dr. Stoll', 'Steffen Vietz', 'b', 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) UNSIGNED NOT NULL,
  `quizname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quizdescription` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `owner_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `quiz`
--

INSERT INTO `quiz` (`id`, `quizname`, `quizdescription`, `category_id`, `owner_id`) VALUES
(1, 'Allgemeinwissen 1', '5 einfache Fragen, die dein Allgemeinwissen testen.', 1, 1),
(2, 'Grundlagen 1', 'Eine kleine Auswahl an Fragen zu Physik-Grundlagen.', 2, 2),
(3, 'Wer wird Millionär 1', 'Spiele hier Fragen aus dem TV-Klassiker nach.', 1, 2),
(4, 'Must-Know', 'Hier testest du dein Wissen zu dieser Homepage', 1, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `stats`
--

CREATE TABLE `stats` (
  `id` int(11) UNSIGNED NOT NULL,
  `points` int(11) UNSIGNED DEFAULT NULL,
  `maxpoints` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `quizid_id` int(11) UNSIGNED DEFAULT NULL,
  `player_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `stats`
--

INSERT INTO `stats` (`id`, `points`, `maxpoints`, `date`, `quizid_id`, `player_id`) VALUES
(1, 40, 50, '2018-07-22 19:47:28', 1, 1),
(2, 30, 40, '2018-07-22 19:59:30', 2, 2),
(3, 50, 70, '2018-07-22 20:07:20', 3, 2),
(4, 30, 30, '2018-07-22 20:16:07', 4, 2);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `logindata`
--
ALTER TABLE `logindata`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_question_quiz` (`quiz_id`);

--
-- Indizes für die Tabelle `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_quiz_category` (`category_id`),
  ADD KEY `index_foreignkey_quiz_owner` (`owner_id`);

--
-- Indizes für die Tabelle `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_stats_quizid` (`quizid_id`),
  ADD KEY `index_foreignkey_stats_player` (`player_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `logindata`
--
ALTER TABLE `logindata`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT für Tabelle `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `stats`
--
ALTER TABLE `stats`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `c_fk_question_quiz_id` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `c_fk_quiz_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_quiz_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `logindata` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints der Tabelle `stats`
--
ALTER TABLE `stats`
  ADD CONSTRAINT `c_fk_stats_player_id` FOREIGN KEY (`player_id`) REFERENCES `logindata` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_stats_quizid_id` FOREIGN KEY (`quizid_id`) REFERENCES `quiz` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
