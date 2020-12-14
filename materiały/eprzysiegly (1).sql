-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 05 Lis 2019, 18:32
-- Wersja serwera: 5.6.12-log
-- Wersja PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `eprzysiegly`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `administratorzy`
--

CREATE TABLE IF NOT EXISTS `administratorzy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` char(255) DEFAULT NULL,
  `pass` char(255) DEFAULT NULL,
  `ranga` int(11) DEFAULT NULL,
  `mail` char(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `administratorzy`
--

INSERT INTO `administratorzy` (`id`, `login`, `pass`, `ranga`, `mail`) VALUES
(1, 'superadmin', '21232f297a57a5a743894a0e4a801fc3', 1, 'estronanet@gmail.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `aktualnosci`
--

CREATE TABLE IF NOT EXISTS `aktualnosci` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opis_en` longtext,
  `opis_pl` longtext,
  `opis_ru` longtext,
  `opis_rum` longtext,
  `tytul_en` varchar(255) DEFAULT NULL,
  `tytul_pl` char(255) DEFAULT NULL,
  `tytul_ru` varchar(255) DEFAULT NULL,
  `tytul_rum` varchar(255) DEFAULT NULL,
  `meta_slowa_en` longtext,
  `meta_slowa_pl` longtext,
  `meta_opis_en` longtext,
  `meta_opis_pl` longtext,
  `data` date DEFAULT NULL,
  `poziom` int(11) NOT NULL,
  `meta_tytul_en` char(255) NOT NULL,
  `aktywny` int(11) NOT NULL DEFAULT '1',
  `prefix` char(255) NOT NULL,
  `podtytul_en` char(255) NOT NULL,
  `podtytul_pl` char(255) DEFAULT NULL,
  `podtytul_ru` longtext,
  `podtytul_rum` longtext,
  `systemowa` int(11) NOT NULL DEFAULT '0',
  `meta_tytul_pl` char(255) DEFAULT NULL,
  `special` char(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `movie` longtext,
  `wyswietlenia` int(11) DEFAULT '0',
  `kolejnosc` int(11) NOT NULL,
  `cena` char(255) NOT NULL,
  `promocja` char(255) NOT NULL,
  `sklad` longtext NOT NULL,
  `pranie` longtext NOT NULL,
  `parametry` longtext NOT NULL,
  `cennik` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Zrzut danych tabeli `aktualnosci`
--

INSERT INTO `aktualnosci` (`id`, `opis_en`, `opis_pl`, `opis_ru`, `opis_rum`, `tytul_en`, `tytul_pl`, `tytul_ru`, `tytul_rum`, `meta_slowa_en`, `meta_slowa_pl`, `meta_opis_en`, `meta_opis_pl`, `data`, `poziom`, `meta_tytul_en`, `aktywny`, `prefix`, `podtytul_en`, `podtytul_pl`, `podtytul_ru`, `podtytul_rum`, `systemowa`, `meta_tytul_pl`, `special`, `type`, `movie`, `wyswietlenia`, `kolejnosc`, `cena`, `promocja`, `sklad`, `pranie`, `parametry`, `cennik`) VALUES
(12, '', '<p>TÅUMACZ PRZYSIÄ˜GÅY - JÄ˜ZYKA NIEMIECKIEGO</p>\n', NULL, NULL, '', 'sylwia szymaÅ„ska', NULL, NULL, '', '', '', '', '2019-06-12', 1, '', 1, '267ad0fbe88d5a7766820e5bded90e85', '', 'sylwia,sadasdasd', NULL, NULL, 0, '', '', 0, NULL, 0, 0, '', '', '', '', '', ''),
(13, '', '<p><strong>J</strong>estem tÅ‚umaczem przysiÄ™gÅ‚ym jÄ™zyka niemieckiego wpisanym na listÄ™ tÅ‚umaczy przysiÄ™gÅ‚ych <strong>Ministerstwa SprawiedliwoÅ›ci</strong> pod nr <strong>TP/109/18</strong>.</p>\n\n<p><strong>S</strong>pecjalizujÄ™ siÄ™ w przekÅ‚adach wszelkiego rodzaju <strong>dokument&oacute;w urzÄ™dowych, prawniczych, handlowych, medycznych</strong>, etc. z jÄ™zyka niemieckiego na jÄ™zyk polski oraz z jÄ™zyka polskiego na jÄ™zyk niemiecki.</p>\n\n<p><strong>W</strong>ykonuje tÅ‚umaczenia zwykÅ‚e i uwierzytelnione (przysiÄ™gÅ‚e), pisemne i ustne.</p>\n', NULL, NULL, '', 'TÅUMACZ PRZYSIÄ˜GÅY JÄ˜ZYKA NIEMIECKIEGO', NULL, NULL, '', '', '', '', '2019-06-12', 1, '', 1, '5eff6b84b548df4826a0aad88daab9c1', '', '', NULL, NULL, 0, '', '', 0, NULL, 0, 0, '', '', '', '', '', ''),
(14, '', '<p><strong>J</strong>estem absolwentkÄ… filologii germaÅ„skiej Uniwersytetu Å&oacute;dzkiego.</p>\n\n<p><strong>O</strong>d 10 lat zajmujÄ™ siÄ™ tÅ‚umaczeniem tekst&oacute;w i dokument&oacute;w z jÄ™zyka niemieckiego i na jÄ™zyk niemiecki. <strong>P</strong>rawo do wykonywania zawodu tÅ‚umacza przysiÄ™gÅ‚ego jÄ™zyka niemieckiego uzyskaÅ‚am wedÅ‚ug nowych regulacji, zgodnie z ustawÄ… z dnia 25 listopada 2004 r. o zawodzie tÅ‚umacza przysiÄ™gÅ‚ego (Dz. U. Nr 273, poz. 2702 z p&oacute;z. zm.), kt&oacute;ra weszÅ‚a w Å¼ycie 27 stycznia 2005r. Traktuje ona o tym, iÅ¼ kaÅ¼dy, kto chce zostaÄ‡ tÅ‚umaczem przysiÄ™gÅ‚ym, musi zdaÄ‡ stosowny (pisemny i ustny) egzamin paÅ„stwowy przed PaÅ„stwowÄ… KomisjÄ… EgzaminacyjnÄ… w Ministerstwie SprawiedliwoÅ›ci (przed wejÅ›ciem w Å¼ycie przywoÅ‚anej powyÅ¼ej ustawy, zaw&oacute;d ten mogli wykonywaÄ‡ w Polsce magistrzy filologii lub absolwenci studi&oacute;w podyplomowych, kt&oacute;rych ustanawiali prezesi sÄ…d&oacute;w okrÄ™gowych).</p>\n\n<p><strong>Z</strong>dawalnoÅ›Ä‡ egzaminu na tÅ‚umacza przysiÄ™gÅ‚ego pozostaje od lat na bardzo niskim poziomie (ok.20-30%). Wymagania stawiane kandydatom na egzaminie gwarantujÄ…, Å¼e zaw&oacute;d bÄ™dÄ… wykonywaÄ‡ tylko odpowiednio wykwalifikowane osoby. Dlatego moja satysfakcja z uzyskania uprawnieÅ„ do wykonywania zawodu tÅ‚umacza przysiÄ™gÅ‚ego jÄ™zyka niemieckiego zgodnie z obowiÄ…zujÄ…ca obecnie ustawÄ… jest ogromna.</p>\n\n<p><strong>Zapraszam PaÅ„stwa do wsp&oacute;Å‚pracy!</strong></p>\n', NULL, NULL, '', 'Referencje', NULL, NULL, '', '', '', '', '2019-06-12', 1, '', 1, 'c7184f3789428ca7af8d88e6c25497b9', '', '', NULL, NULL, 0, '', '', 0, NULL, 0, 0, '', '', '', '', '', ''),
(15, '', '', NULL, NULL, '', 'Cennik', NULL, NULL, '', '', '', '', '2019-06-12', 1, '', 1, '1d6f9e1c87f4fc2613dd61661e4900b9', '', 'PoniÅ¼sza oferta ma charakter informacyjny i nie stanowi oferty handlowej w rozumieniu art. 66 Â§1 Kodeksu Cywilnego', NULL, NULL, 0, '', '', 0, NULL, 0, 0, '', '', '', '', '', ''),
(16, '', '<p><strong>PoniedziaÅ‚ek - niedziela</strong> w godz. 09:00 - 20:00 (proszÄ™ o uprzedni kontakt telefoniczny)</p>\n\n<p><strong>B</strong>IURO W ÅODZI ul. TatrzaÅ„ska 111/86 93-279 Å&oacute;dÅº</p>\n\n<p><strong>B</strong>IURO DLA POZOSTAÅYCH LOKALIZACJI (woj. Å›wiÄ™tokrzyskie): WÅ‚oszczowa, JÄ™drzej&oacute;w, MaÅ‚ogoszcz - przetÅ‚umaczone dokument(y) moÅ¼na odebraÄ‡ bezpoÅ›rednio w biurze w woj. Å›wiÄ™tokrzyskim (Lipno 77, 28-363 Oksa) lub teÅ¼ dostarczane sÄ… do klienta w um&oacute;wione miejsce.</p>\n', NULL, NULL, '', 'DostÄ™pnoÅ›Ä‡', NULL, NULL, '', '', '', '', '2019-06-12', 1, '', 1, '29eaedf7193718f69931e38f593c37fd', '', '', NULL, NULL, 0, '', '', 0, NULL, 0, 0, '', '', '', '', '', ''),
(17, '', '<p><strong>S</strong>ylwia SzymaÅ„ska</p>\n\n<p><strong>tel</strong>.: <a href="tel:697089947">+48 697089947</a></p>\n\n<p><strong>E-mail</strong>: <span style="color:rgb(0, 0, 0); font-family:verdana,arial,helvetica,sans-serif; font-size:11.3333px">szymanska@e-przysiegly.pl</span></p>\n', NULL, NULL, '', 'DANE KONTAKTOWE', NULL, NULL, '', '', '', '', '2019-06-12', 1, '', 1, '70b98d30e383df910ce3d693603404fb', '', '', NULL, NULL, 0, '', '', 0, NULL, 0, 0, '', '', '', '', '', ''),
(18, '', 'PRZYSIÄ˜GÅE - 40 ZÅ \nZWYKÅE 35 ZÅ', NULL, NULL, '', 'TÅUMACZENIA NA JÄ˜ZYK POLSKI', NULL, NULL, '', '', '', '', '2019-06-12', 3, '', 1, '8be745a0c6670957f8d9bd163f27ecf8', '', '', NULL, NULL, 0, '', '', 0, NULL, 0, 0, '', '', '', '', '', ''),
(19, '', '<p>120 ZÅ ZA KAÅ»DÄ„ ROZPOCZÄ˜TÄ„ GODZINÄ˜</p>\n', NULL, NULL, '', 'TÅUMACZENIE USTNE', NULL, NULL, '', '', '', '', '2019-06-12', 3, '', 1, '6a14d9353a12cff69627970f40a37ab1', '', '', NULL, NULL, 0, '', '', 0, NULL, 0, 0, '', '', '', '', '', ''),
(20, '', '<p>PRZYSIÄ˜GÅE - 45 ZÅ ZWYKÅE - 40 ZÅ</p>\n', NULL, NULL, '', 'TÅUMACZENIA NA JÄ˜ZYK NIEMIECKI', NULL, NULL, '', '', '', '', '2019-06-12', 3, '', 1, '9ef7f0360a59458d3fc8146ac7df4c71', '', '', NULL, NULL, 0, '', '', 0, NULL, 0, 0, '', '', '', '', '', ''),
(21, '', '- KARTA POJAZDU I DOWÃ“D REJESTRACYJNY - 140 ZÅ \n- KARTA POJAZDU DOWÃ“D REJESTRACYJNY I UMOWA KUPNA-SPRZEDAÅ»Y LUB FAKTURA - \n170 ZÅ ', NULL, NULL, '', 'TÅUMACZENIE DOKUMENTÃ“W SAMOCHODOWYCH', NULL, NULL, '', '', '', '', '2019-06-12', 3, '', 1, '785fd4ef52fd1d71349aa445067237f5', '', '', NULL, NULL, 0, '', '', 0, NULL, 0, 0, '', '', '', '', '', ''),
(22, '', 'TEGO SAMEGO DNI +100ZÅ\nNASTÄ˜PNEGO DNIA +50%', NULL, NULL, '', 'TRYB EXPRESS', NULL, NULL, '', '', '', '', '2019-06-12', 3, '', 1, '487a927f745a1a5362436f97ecac2067', '', '', NULL, NULL, 0, '', '', 0, NULL, 0, 0, '', '', '', '', '', ''),
(23, '', '- 10% STAWKI PODSTAWOWEJ ', NULL, NULL, '', 'KOPIA TÅUMACZENIA UWIERZYTELNIONEGO', NULL, NULL, '', '', '', '', '2019-06-12', 3, '', 1, 'b612ab69c19fffe447e0e08ac844afb7', '', '', NULL, NULL, 0, '', '', 0, NULL, 0, 0, '', '', '', '', '', ''),
(24, '', 'CENA ZA INDYWIDUALNE NAUCZANIE 1 OSOBY - 70 ZÅ (60 MIN) ', NULL, NULL, '', 'KOREPETYCJE', NULL, NULL, '', '', '', '', '2019-06-12', 3, '', 1, '86eced29d06ab5930c4646926f4ea9fa', '', '', NULL, NULL, 0, '', '', 0, NULL, 0, 0, '', '', '', '', '', ''),
(25, '', '', NULL, NULL, '', 'Korepetycje', NULL, NULL, '', '', '', '', '2019-06-12', 1, '', 1, '752f91f951f6d2943d76cf5cb844097b', '', '', NULL, NULL, 0, '', '', 0, NULL, 0, 0, '', '', '', '', '', ''),
(26, '', '<h2>Polityka prywatnoÅ›ci opisuje zasady przetwarzania przez nas informacji na Tw&oacute;j temat, w tym danych osobowych oraz ciasteczek, czyli tzw. cookies.</h2>\n\n<hr />\n<div class="lh166" style="box-sizing: border-box; line-height: 21.58px; color: rgb(50, 50, 50); font-family: Arial;">\n<h2><strong>1. Informacje og&oacute;lne</strong></h2>\n\n<ol>\n	<li>Niniejsza polityka dotyczy Serwisu www, funkcjonujÄ…cego pod adresem url:&nbsp;<strong>http://www.e-przysiegly.pl</strong></li>\n	<li>Operatorem serwisu oraz Administratorem danych osobowych jest: Sylwia SzymaÅ„ska</li>\n	<li>Adres kontaktowy poczty elektronicznej operatora:&nbsp;</li>\n	<li>Operator jest Administratorem Twoich danych osobowych w odniesieniu do danych podanych dobrowolnie w Serwisie.</li>\n	<li>Serwis wykorzystuje dane osobowe w nastÄ™pujÄ…cych celach:\n	<ul>\n		<li>ObsÅ‚uga zapytaÅ„ przez formularz</li>\n		<li>Prezentacja oferty lub informacji</li>\n	</ul>\n	</li>\n	<li>Serwis realizuje funkcje pozyskiwania informacji o uÅ¼ytkownikach i ich zachowaniu w nastÄ™pujÄ…cy spos&oacute;b:\n	<ol>\n		<li>Poprzez dobrowolnie wprowadzone w formularzach dane, kt&oacute;re zostajÄ… wprowadzone do system&oacute;w Operatora.</li>\n		<li>Poprzez zapisywanie w urzÄ…dzeniach koÅ„cowych plik&oacute;w cookie (tzw. &bdquo;ciasteczka&rdquo;).</li>\n	</ol>\n	</li>\n</ol>\n\n<h2><strong>2. Wybrane metody ochrony danych stosowane przez Operatora</strong></h2>\n\n<ol>\n	<li>Miejsca logowania i wprowadzania danych osobowych sÄ… chronione w warstwie transmisji (certyfikat SSL). DziÄ™ki temu dane osobowe i dane logowania, wprowadzone na stronie, zostajÄ… zaszyfrowane w komputerze uÅ¼ytkownika i mogÄ… byÄ‡ odczytane jedynie na docelowym serwerze.</li>\n	<li>Dane osobowe przechowywane w bazie danych sÄ… zaszyfrowane w taki spos&oacute;b, Å¼e jedynie posiadajÄ…cy Operator klucz moÅ¼e je odczytaÄ‡. DziÄ™ki temu dane sÄ… chronione na wypadek wykradzenia bazy danych z serwera.</li>\n	<li>HasÅ‚a uÅ¼ytkownik&oacute;w sÄ… przechowywane w postaci hashowanej. Funkcja hashujÄ…ca dziaÅ‚a jednokierunkowo - nie jest moÅ¼liwe odwr&oacute;cenie jej dziaÅ‚ania, co stanowi obecnie wsp&oacute;Å‚czesny standard w zakresie przechowywania haseÅ‚ uÅ¼ytkownik&oacute;w.</li>\n	<li>W serwisie jest stosowana autentykacja dwuskÅ‚adnikowa, co stanowi dodatkowÄ… formÄ™ ochrony logowania do Serwisu.</li>\n	<li>Operator okresowo zmienia swoje hasÅ‚a administracyjne.</li>\n	<li>W celu minimalizacji ryzyka nieuprawnionego dostÄ™pu do danych, Operator stosuje hasÅ‚a zÅ‚oÅ¼one, zawierajÄ…ce maÅ‚e i wielkie litery, cyfry oraz znaki specjalne, nie kr&oacute;tsze niÅ¼ 8 znak&oacute;w.</li>\n</ol>\n\n<h2><strong>3. Hosting</strong></h2>\n\n<ol>\n	<li>Serwis jest hostowany (technicznie utrzymywany) na serwera operatora: sw-hosting.pl</li>\n</ol>\n\n<h2><strong>4. Twoje prawa i dodatkowe informacje o sposobie wykorzystania danych</strong></h2>\n\n<ol>\n	<li>W niekt&oacute;rych sytuacjach Administrator ma prawo przekazywaÄ‡ Twoje dane osobowe innym odbiorcom, jeÅ›li bÄ™dzie to niezbÄ™dne do wykonania zawartej z TobÄ… umowy lub do zrealizowania obowiÄ…zk&oacute;w ciÄ…Å¼Ä…cych na Administratorze. Dotyczy to takich grup odbiorc&oacute;w:\n	<ul>\n		<li>osoby upowaÅ¼nione przez nas, pracownicy i wsp&oacute;Å‚pracownicy, kt&oacute;rzy muszÄ… mieÄ‡ dostÄ™p do danych osobowych w celu wykonywania swoich obowiÄ…zk&oacute;w,</li>\n		<li>firma hostingowa,</li>\n		<li>firmy obsÅ‚ugujÄ…ca mailingi,</li>\n		<li>firmy obsÅ‚ugujÄ…ca komunikaty SMS,</li>\n		<li>firmy, z kt&oacute;rymi Administrator wsp&oacute;Å‚pracuje w zakresie marketingu wÅ‚asnego,</li>\n		<li>kurierzy,</li>\n		<li>ubezpieczyciele,</li>\n		<li>kancelarie prawne i windykatorzy,</li>\n		<li>banki,</li>\n		<li>operatorzy pÅ‚atnoÅ›ci,</li>\n		<li>organy publiczne.</li>\n	</ul>\n	</li>\n	<li>Twoje dane osobowe przetwarzane przez Administratora nie dÅ‚uÅ¼ej, niÅ¼ jest to konieczne do wykonania zwiÄ…zanych z nimi czynnoÅ›ci okreÅ›lonych osobnymi przepisami (np. o prowadzeniu rachunkowoÅ›ci). W odniesieniu do danych marketingowych dane nie bÄ™dÄ… przetwarzane dÅ‚uÅ¼ej niÅ¼ przez 3 lata.</li>\n	<li>PrzysÅ‚uguje Ci prawo Å¼Ä…dania od Administratora:\n	<ul>\n		<li>dostÄ™pu do danych osobowych Ciebie dotyczÄ…cych,</li>\n		<li>ich sprostowania,</li>\n		<li>usuniÄ™cia,</li>\n		<li>ograniczenia przetwarzania,</li>\n		<li>oraz przenoszenia danych.</li>\n	</ul>\n	</li>\n	<li>PrzysÅ‚uguje Ci prawo do zÅ‚oÅ¼enia sprzeciwu w zakresie przetwarzania wskazanego w pkt 3.3 c) wobec przetwarzania danych osobowych w celu wykonania prawnie uzasadnionych interes&oacute;w realizowanych przez Administratora, w tym profilowania, przy czym prawo sprzeciwu nie bÄ™dzie mogÅ‚o byÄ‡ wykonane w przypadku istnienia waÅ¼nych prawnie uzasadnionych podstaw do przetwarzania, nadrzÄ™dnych wobec Ciebie interes&oacute;w, praw i wolnoÅ›ci, w szczeg&oacute;lnoÅ›ci ustalenia, dochodzenia lub obrony roszczeÅ„.</li>\n	<li>Na dziaÅ‚ania Administratora przysÅ‚uguje skarga do Prezesa UrzÄ™du Ochrony Danych Osobowych, ul. Stawki 2, 00-193 Warszawa.</li>\n	<li>Podanie danych osobowych jest dobrowolne, lecz niezbÄ™dne do obsÅ‚ugi Serwisu.</li>\n	<li>W stosunku do Ciebie mogÄ… byÄ‡ podejmowane czynnoÅ›ci polegajÄ…ce na zautomatyzowanym podejmowaniu decyzji, w tym profilowaniu w celu Å›wiadczenia usÅ‚ug w ramach zawartej umowy oraz w celu prowadzenia przez Administratora marketingu bezpoÅ›redniego.</li>\n	<li>Dane osobowe nie sÄ… przekazywane od kraj&oacute;w trzecich w rozumieniu przepis&oacute;w o ochronie danych osobowych. Oznacza to, Å¼e nie przesyÅ‚amy ich poza teren Unii Europejskiej.</li>\n</ol>\n\n<h2><strong>5. Informacje w formularzach</strong></h2>\n\n<ol>\n	<li>Serwis zbiera informacje podane dobrowolnie przez uÅ¼ytkownika, w tym dane osobowe, o ile zostanÄ… one podane.</li>\n	<li>Serwis moÅ¼e zapisaÄ‡ informacje o parametrach poÅ‚Ä…czenia (oznaczenie czasu, adres IP).</li>\n	<li>Serwis, w niekt&oacute;rych wypadkach, moÅ¼e zapisaÄ‡ informacjÄ™ uÅ‚atwiajÄ…cÄ… powiÄ…zanie danych w formularzu z adresem e-mail uÅ¼ytkownika wypeÅ‚niajÄ…cego formularz. W takim wypadku adres e-mail uÅ¼ytkownika pojawia siÄ™ wewnÄ…trz adresu url strony zawierajÄ…cej formularz.</li>\n	<li>Dane podane w formularzu sÄ… przetwarzane w celu wynikajÄ…cym z funkcji konkretnego formularza, np. w celu dokonania procesu obsÅ‚ugi zgÅ‚oszenia serwisowego lub kontaktu handlowego, rejestracji usÅ‚ug itp. KaÅ¼dorazowo kontekst i opis formularza w czytelny spos&oacute;b informuje, do czego on sÅ‚uÅ¼y.</li>\n</ol>\n\n<h2><strong>6. Logi Administratora</strong></h2>\n\n<ol>\n	<li>Informacje zachowaniu uÅ¼ytkownik&oacute;w w serwisie mogÄ… podlegaÄ‡ logowaniu. Dane te sÄ… wykorzystywane w celu administrowania serwisem.</li>\n</ol>\n\n<h2><strong>7. Istotne techniki marketingowe</strong></h2>\n\n<ol>\n	<li>Operator stosuje analizÄ™ statystycznÄ… ruchu na stronie, poprzez Google Analytics (Google Inc. z siedzibÄ… w USA). Operator nie przekazuje do operatora tej usÅ‚ugi danych osobowych, a jedynie zanonimizowane informacje. UsÅ‚uga bazuje na wykorzystaniu ciasteczek w urzÄ…dzeniu koÅ„cowym uÅ¼ytkownika. W zakresie informacji o preferencjach uÅ¼ytkownika gromadzonych przez sieÄ‡ reklamowÄ… Google uÅ¼ytkownik moÅ¼e przeglÄ…daÄ‡ i edytowaÄ‡ informacje wynikajÄ…ce z plik&oacute;w cookies przy pomocy narzÄ™dzia: https://www.google.com/ads/preferences/</li>\n	<li>Operator stosuje korzysta z piksela Facebooka. Ta technologia powoduje, Å¼e serwis Facebook (Facebook Inc. z siedzibÄ… w USA) wie, Å¼e dana osoba w nim zarejestrowana korzysta z Serwisu. Bazuje w tym wypadku na danych, wobec kt&oacute;rych sam jest administratorem, Operator nie przekazuje od siebie Å¼adnych dodatkowych danych osobowych serwisowi Facebook. UsÅ‚uga bazuje na wykorzystaniu ciasteczek w urzÄ…dzeniu koÅ„cowym uÅ¼ytkownika.</li>\n</ol>\n\n<h2><strong>8. Informacja o plikach cookies</strong></h2>\n\n<ol>\n	<li>Serwis korzysta z plik&oacute;w cookies.</li>\n	<li>Pliki cookies (tzw. &bdquo;ciasteczka&rdquo;) stanowiÄ… dane informatyczne, w szczeg&oacute;lnoÅ›ci pliki tekstowe, kt&oacute;re przechowywane sÄ… w urzÄ…dzeniu koÅ„cowym UÅ¼ytkownika Serwisu i przeznaczone sÄ… do korzystania ze stron internetowych Serwisu. Cookies zazwyczaj zawierajÄ… nazwÄ™ strony internetowej, z kt&oacute;rej pochodzÄ…, czas przechowywania ich na urzÄ…dzeniu koÅ„cowym oraz unikalny numer.</li>\n	<li>Podmiotem zamieszczajÄ…cym na urzÄ…dzeniu koÅ„cowym UÅ¼ytkownika Serwisu pliki cookies oraz uzyskujÄ…cym do nich dostÄ™p jest operator Serwisu.</li>\n	<li>Pliki cookies wykorzystywane sÄ… w nastÄ™pujÄ…cych celach:\n	<ol>\n		<li>utrzymanie sesji uÅ¼ytkownika Serwisu (po zalogowaniu), dziÄ™ki kt&oacute;rej uÅ¼ytkownik nie musi na kaÅ¼dej podstronie Serwisu ponownie wpisywaÄ‡ loginu i hasÅ‚a;</li>\n		<li>realizacji cel&oacute;w okreÅ›lonych powyÅ¼ej w czÄ™Å›ci &quot;Istotne techniki marketingowe&quot;;</li>\n	</ol>\n	</li>\n	<li>W ramach Serwisu stosowane sÄ… dwa zasadnicze rodzaje plik&oacute;w cookies: &bdquo;sesyjne&rdquo; (session cookies) oraz &bdquo;staÅ‚e&rdquo; (persistent cookies). Cookies &bdquo;sesyjne&rdquo; sÄ… plikami tymczasowymi, kt&oacute;re przechowywane sÄ… w urzÄ…dzeniu koÅ„cowym UÅ¼ytkownika do czasu wylogowania, opuszczenia strony internetowej lub wyÅ‚Ä…czenia oprogramowania (przeglÄ…darki internetowej). &bdquo;StaÅ‚e&rdquo; pliki cookies przechowywane sÄ… w urzÄ…dzeniu koÅ„cowym UÅ¼ytkownika przez czas okreÅ›lony w parametrach plik&oacute;w cookies lub do czasu ich usuniÄ™cia przez UÅ¼ytkownika.</li>\n	<li>Oprogramowanie do przeglÄ…dania stron internetowych (przeglÄ…darka internetowa) zazwyczaj domyÅ›lnie dopuszcza przechowywanie plik&oacute;w cookies w urzÄ…dzeniu koÅ„cowym UÅ¼ytkownika. UÅ¼ytkownicy Serwisu mogÄ… dokonaÄ‡ zmiany ustawieÅ„ w tym zakresie.&nbsp;PrzeglÄ…darka internetowa umoÅ¼liwia usuniÄ™cie plik&oacute;w cookies. MoÅ¼liwe jest takÅ¼e automatyczne blokowanie plik&oacute;w cookies Szczeg&oacute;Å‚owe informacje na ten temat zawiera pomoc lub dokumentacja przeglÄ…darki internetowej.</li>\n	<li>Ograniczenia stosowania plik&oacute;w cookies mogÄ… wpÅ‚ynÄ…Ä‡ na niekt&oacute;re funkcjonalnoÅ›ci dostÄ™pne na stronach internetowych Serwisu.</li>\n	<li>Pliki cookies zamieszczane w urzÄ…dzeniu koÅ„cowym UÅ¼ytkownika Serwisu wykorzystywane mogÄ… byÄ‡ r&oacute;wnieÅ¼ przez wsp&oacute;Å‚pracujÄ…ce z operatorem Serwisu podmioty, w szczeg&oacute;lnoÅ›ci dotyczy to firm: Google (Google Inc. z siedzibÄ… w USA), Facebook (Facebook Inc. z siedzibÄ… w USA), Twitter (Twitter Inc. z siedzibÄ… w USA).</li>\n</ol>\n\n<h2><strong>9. ZarzÄ…dzanie plikami cookies &ndash; jak w praktyce wyraÅ¼aÄ‡ i cofaÄ‡ zgodÄ™?</strong></h2>\n\n<ol>\n	<li>JeÅ›li uÅ¼ytkownik nie chce otrzymywaÄ‡ plik&oacute;w cookies, moÅ¼e zmieniÄ‡ ustawienia przeglÄ…darki. Zastrzegamy, Å¼e wyÅ‚Ä…czenie obsÅ‚ugi plik&oacute;w cookies niezbÄ™dnych dla proces&oacute;w uwierzytelniania, bezpieczeÅ„stwa, utrzymania preferencji uÅ¼ytkownika moÅ¼e utrudniÄ‡,&nbsp;a w skrajnych przypadkach moÅ¼e uniemoÅ¼liwiÄ‡ korzystanie ze stron www</li>\n	<li>W celu zarzÄ…dzania ustawienia cookies wybierz z listy poniÅ¼ej przeglÄ…darkÄ™ internetowÄ…, kt&oacute;rej uÅ¼ywasz i postÄ™puj zgodnie z instrukcjami:\n	<ul>\n		<li><a href="https://support.microsoft.com/pl-pl/help/10607/microsoft-edge-view-delete-browser-history" style="box-sizing: border-box; background-color: transparent; color: rgb(50, 50, 50); text-decoration-line: none; font-family: ">Edge</a></li>\n		<li><a href="https://support.microsoft.com/pl-pl/help/278835/how-to-delete-cookie-files-in-internet-explorer" style="box-sizing: border-box; background-color: transparent; color: rgb(50, 50, 50); text-decoration-line: none; font-family: ">Internet Explorer</a></li>\n		<li><a href="http://support.google.com/chrome/bin/answer.py?hl=pl&amp;answer=95647" style="box-sizing: border-box; background-color: transparent; color: rgb(50, 50, 50); text-decoration-line: none; font-family: ">Chrome</a></li>\n		<li><a href="http://support.apple.com/kb/PH5042" style="box-sizing: border-box; background-color: transparent; color: rgb(50, 50, 50); text-decoration-line: none; font-family: ">Safari</a></li>\n		<li><a href="http://support.mozilla.org/pl/kb/W%C5%82%C4%85czanie%20i%20wy%C5%82%C4%85czanie%20obs%C5%82ugi%20ciasteczek" style="box-sizing: border-box; background-color: transparent; color: rgb(50, 50, 50); text-decoration-line: none; font-family: ">Firefox</a></li>\n		<li><a href="http://help.opera.com/Windows/12.10/pl/cookies.html" style="box-sizing: border-box; background-color: transparent; color: rgb(50, 50, 50); text-decoration-line: none; font-family: ">Opera</a></li>\n	</ul>\n\n	<p>UrzÄ…dzenia mobilne:</p>\n\n	<ul>\n		<li><a href="http://support.google.com/chrome/bin/answer.py?hl=pl&amp;answer=95647" style="box-sizing: border-box; background-color: transparent; color: rgb(50, 50, 50); text-decoration-line: none; font-family: ">Android</a></li>\n		<li><a href="http://support.apple.com/kb/HT1677?viewlocale=pl_PL" style="box-sizing: border-box; background-color: transparent; color: rgb(50, 50, 50); text-decoration-line: none; font-family: ">Safari (iOS)</a></li>\n		<li><a href="http://www.windowsphone.com/pl-pl/how-to/wp7/web/changing-privacy-and-other-browser-settings" style="box-sizing: border-box; background-color: transparent; color: rgb(50, 50, 50); text-decoration-line: none; font-family: ">Windows Phone</a></li>\n	</ul>\n	</li>\n</ol>\n</div>\n', NULL, NULL, '', 'Polityka prywatnoÅ›ci', NULL, NULL, '', '', '', '', '2019-06-12', 4, '', 1, '546d23cbe87887207b6c401f422826c6', '', '', NULL, NULL, 0, '', '', 0, NULL, 0, 0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `codes`
--

CREATE TABLE IF NOT EXISTS `codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) DEFAULT NULL,
  `percent` char(255) DEFAULT NULL,
  `kolejnosc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `codes`
--

INSERT INTO `codes` (`id`, `name`, `percent`, `kolejnosc`) VALUES
(1, 'wiosna2018', '15', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `colors`
--

CREATE TABLE IF NOT EXISTS `colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) DEFAULT NULL,
  `html` char(255) DEFAULT NULL,
  `kolejnosc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Zrzut danych tabeli `colors`
--

INSERT INTO `colors` (`id`, `name`, `html`, `kolejnosc`) VALUES
(1, 'Czarny', '#000000', 1),
(2, 'Szary', '#9b9aa7', 2),
(3, 'Czerwony', '#ed0e30', 3),
(4, 'RÃ³Å¼owy', '#ef47d1', 4),
(5, 'Pudrowy', '#ff93ff', 5),
(6, 'BiaÅ‚y', '#ffffff', 6),
(7, 'Niebieski', '#2b2bff', 7),
(9, 'BÅ‚Ä™kit', '#59acff', 8),
(10, 'Å»Ã³Å‚ty', '#edf307', 9),
(11, 'Khaki', '#8a8a00', 10),
(12, 'Bordo', '#820000', 11),
(13, 'BeÅ¼', '#ffb56a', 12);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie_tresci`
--

CREATE TABLE IF NOT EXISTS `kategorie_tresci` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tytul_en` char(255) DEFAULT NULL,
  `tytul_pl` char(255) DEFAULT NULL,
  `tytul_ru` varchar(255) DEFAULT NULL,
  `tytul_rum` varchar(255) DEFAULT NULL,
  `tresc` longtext,
  `metaopis` longtext,
  `metakey` longtext,
  `przypisanie` char(255) DEFAULT NULL,
  `poziom` int(11) DEFAULT NULL,
  `kategoria` char(255) DEFAULT NULL,
  `kolejnosc` int(11) DEFAULT NULL,
  `wyswietlono` int(11) DEFAULT NULL,
  `lang` int(11) DEFAULT NULL,
  `aktywny` int(11) NOT NULL DEFAULT '1',
  `haslo` char(255) NOT NULL,
  `link_en` char(255) NOT NULL,
  `link_pl` char(255) DEFAULT NULL,
  `link_ru` varchar(255) DEFAULT NULL,
  `link_rum` varchar(255) DEFAULT NULL,
  `podtytul_en` char(255) DEFAULT NULL,
  `podtytul_pl` char(255) DEFAULT NULL,
  `podtytul_ru` varchar(255) DEFAULT NULL,
  `podtytul_rum` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `linki`
--

CREATE TABLE IF NOT EXISTS `linki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tytul_en` char(255) DEFAULT NULL,
  `tytul_pl` char(255) DEFAULT NULL,
  `tresc` longtext,
  `metaopis` longtext,
  `metakey` longtext,
  `przypisanie` char(255) DEFAULT NULL,
  `poziom` int(11) DEFAULT NULL,
  `kategoria` char(255) DEFAULT NULL,
  `kolejnosc` int(11) DEFAULT NULL,
  `wyswietlono` int(11) DEFAULT NULL,
  `lang` int(11) DEFAULT NULL,
  `aktywny` int(11) NOT NULL DEFAULT '1',
  `haslo` char(255) NOT NULL,
  `link_en` char(255) NOT NULL,
  `link_pl` char(255) DEFAULT NULL,
  `podtytul_en` char(255) DEFAULT NULL,
  `podtytul_pl` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `linki`
--

INSERT INTO `linki` (`id`, `tytul_en`, `tytul_pl`, `tresc`, `metaopis`, `metakey`, `przypisanie`, `poziom`, `kategoria`, `kolejnosc`, `wyswietlono`, `lang`, `aktywny`, `haslo`, `link_en`, `link_pl`, `podtytul_en`, `podtytul_pl`) VALUES
(1, 'wpisy gÅ‚Ã³wne', 'wpisy gÅ‚Ã³wne', '', '', '', '0', 0, NULL, 1, NULL, NULL, 1, '', '', '', '', ''),
(3, 'cenniki', 'cenniki', '', '', '', '0', 0, NULL, 3, NULL, NULL, 1, '', '', '', '', ''),
(4, '', 'Polityka prywatnoÅ›ci', '', '', '', '0', 0, NULL, 3, NULL, NULL, 1, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `meta`
--

CREATE TABLE IF NOT EXISTS `meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keywords_en` longtext NOT NULL,
  `description_en` longtext NOT NULL,
  `title_en` longtext NOT NULL,
  `statistic_en` longtext NOT NULL,
  `keywords_pl` longtext NOT NULL,
  `description_pl` longtext NOT NULL,
  `title_pl` char(255) NOT NULL,
  `statistic_pl` longtext NOT NULL,
  `keywords_ru` longtext,
  `description_ru` longtext,
  `title_ru` longtext,
  `statistic_ru` longtext,
  `keywords_rum` longtext,
  `description_rum` longtext,
  `title_rum` longtext,
  `statistic_rum` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `meta`
--

INSERT INTO `meta` (`id`, `keywords_en`, `description_en`, `title_en`, `statistic_en`, `keywords_pl`, `description_pl`, `title_pl`, `statistic_pl`, `keywords_ru`, `description_ru`, `title_ru`, `statistic_ru`, `keywords_rum`, `description_rum`, `title_rum`, `statistic_rum`) VALUES
(1, '', '', 'EnvyMe ', '5', '', '', 'EnvyMe', '', '', '', 'EnvyMe ', NULL, '', '', 'EnvyMe ', NULL),
(2, '4', '3', '2', '5', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pliki`
--

CREATE TABLE IF NOT EXISTS `pliki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tytul` char(255) DEFAULT NULL,
  `prefix` char(255) DEFAULT NULL,
  `kolejnosc` int(11) DEFAULT NULL,
  `typ` char(255) DEFAULT NULL,
  `foto_opis_pl` longtext,
  `foto_opis_en` longtext,
  `foto_opis_ru` longtext,
  `foto_opis_rum` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=234 ;

--
-- Zrzut danych tabeli `pliki`
--

INSERT INTO `pliki` (`id`, `tytul`, `prefix`, `kolejnosc`, `typ`, `foto_opis_pl`, `foto_opis_en`, `foto_opis_ru`, `foto_opis_rum`) VALUES
(1, '1_787094310.jpg', '297b51d372955449d68d0b67ffda8c80', 1, NULL, NULL, NULL, NULL, NULL),
(2, '809_sukienka_dzianina_165457198.jpg', 'c0dba5809c620f70942856ad09b144d0', 2, NULL, 'kremowy1', 'kremowy', 'kremowy', 'kremowy'),
(4, '809_sukienka_dzianina_722030257.jpg', 'c0dba5809c620f70942856ad09b144d0', 1, NULL, 'akasldkm', 'lkasmsdlasskdm', 'laskdmasldkm', 'awwsldkmasld'),
(5, '210_nowoaa_jesieazima_20162017_497834677.jpg', 'cee3162a27e516aea7fde212b5da1460', 1, NULL, NULL, NULL, NULL, NULL),
(6, '210_nowoaa_jesieazima_20162017_1014431211.jpg', 'cee3162a27e516aea7fde212b5da1460', 3, NULL, NULL, NULL, NULL, NULL),
(7, '210_nowoaa_jesieazima_20162017_281901198.jpg', 'cee3162a27e516aea7fde212b5da1460', 2, NULL, NULL, NULL, NULL, NULL),
(8, '109_sukienka_dzianina_247906091.jpg', '3a6061966d28f3c94afbd77dfb66832f', 1, NULL, NULL, NULL, NULL, NULL),
(9, '109_sukienka_dzianina_210941791.jpg', '3a6061966d28f3c94afbd77dfb66832f', 2, NULL, NULL, NULL, NULL, NULL),
(10, '109_sukienka_dzianina_1183158825.jpg', '3a6061966d28f3c94afbd77dfb66832f', 3, NULL, NULL, NULL, NULL, NULL),
(11, '0110_nowoaa_wiosna_2017_392535908.jpg', 'd9d84f7dc910c42dc377f67ccfafee07', 2, NULL, NULL, NULL, NULL, NULL),
(12, '0110_nowoaa_wiosna_2017_619098236.jpg', 'd9d84f7dc910c42dc377f67ccfafee07', 1, NULL, NULL, NULL, NULL, NULL),
(13, '0110_nowoaa_wiosna_2017_439956931.jpg', 'd9d84f7dc910c42dc377f67ccfafee07', 3, NULL, NULL, NULL, NULL, NULL),
(14, '0302_1026006760.jpg', '0a54b19a13b6712dc04d1b49215423d8', 1, NULL, NULL, NULL, NULL, NULL),
(15, '0302_23409289.jpg', '0a54b19a13b6712dc04d1b49215423d8', 2, NULL, NULL, NULL, NULL, NULL),
(16, '0302_967741728.jpg', '0a54b19a13b6712dc04d1b49215423d8', 3, NULL, NULL, NULL, NULL, NULL),
(17, '0303_283536406.jpg', 'e644a5af2b0b0834f14f1a0d2dfdd728', 1, NULL, NULL, NULL, NULL, NULL),
(18, '0303_657611681.jpg', 'e644a5af2b0b0834f14f1a0d2dfdd728', 2, NULL, NULL, NULL, NULL, NULL),
(19, '0303_958532927.jpg', 'e644a5af2b0b0834f14f1a0d2dfdd728', 3, NULL, NULL, NULL, NULL, NULL),
(20, 'alsdkajdl__dzianina_poliester_1060346121.jpg', '8392a047beb5d88a6531bfc878ccfe3e', 1, NULL, NULL, NULL, NULL, NULL),
(21, 'alsdkajdl__dzianina_poliester_1342849765.jpg', '8392a047beb5d88a6531bfc878ccfe3e', 4, NULL, NULL, NULL, NULL, NULL),
(22, 'alsdkajdl__dzianina_poliester_475372087.jpg', '8392a047beb5d88a6531bfc878ccfe3e', 3, NULL, NULL, NULL, NULL, NULL),
(23, 'alsdkajdl__dzianina_poliester_1253946105.jpg', '8392a047beb5d88a6531bfc878ccfe3e', 2, NULL, NULL, NULL, NULL, NULL),
(24, 'alsdkajdl__dzianina_poliester_699395540.jpg', '8392a047beb5d88a6531bfc878ccfe3e', 5, NULL, NULL, NULL, NULL, NULL),
(25, 'alsdkajdl__dzianina_poliester_864164231.jpg', '8392a047beb5d88a6531bfc878ccfe3e', 6, NULL, NULL, NULL, NULL, NULL),
(26, 'alsdkajdl__dzianina_poliester_911714349.jpg', '8392a047beb5d88a6531bfc878ccfe3e', 7, NULL, NULL, NULL, NULL, NULL),
(27, 'alsdkajdl__dzianina_poliester_961157866.jpg', '8392a047beb5d88a6531bfc878ccfe3e', 8, NULL, NULL, NULL, NULL, NULL),
(28, 'asadasa_1318278618.jpg', 'cad720d4655d44867660372097a3188b', 2, NULL, NULL, NULL, NULL, NULL),
(29, 'asadasa_683344686.jpg', 'cad720d4655d44867660372097a3188b', 1, NULL, NULL, NULL, NULL, NULL),
(30, 'sdfghj_1113533403.jpg', '72cec634a1ef606c43358b64e235e83c', 5, NULL, NULL, NULL, NULL, NULL),
(31, 'sdfghj_354323686.jpg', '72cec634a1ef606c43358b64e235e83c', 3, NULL, NULL, NULL, NULL, NULL),
(32, 'sdfghj_507904114.jpg', '72cec634a1ef606c43358b64e235e83c', 1, NULL, NULL, NULL, NULL, NULL),
(33, 'sdfghj_129095343.jpg', '72cec634a1ef606c43358b64e235e83c', 2, NULL, NULL, NULL, NULL, NULL),
(34, 'sdfghj_678223904.jpg', '72cec634a1ef606c43358b64e235e83c', 4, NULL, NULL, NULL, NULL, NULL),
(35, 'sdfghj_230908538.jpg', '72cec634a1ef606c43358b64e235e83c', 6, NULL, NULL, NULL, NULL, NULL),
(40, '_1363167851.jpg', '4c0a7bdd46ceb88d497eec5de360328e', 3, NULL, NULL, NULL, NULL, NULL),
(41, '_1953369081.jpg', '4c0a7bdd46ceb88d497eec5de360328e', 2, NULL, NULL, NULL, NULL, NULL),
(42, '_3753241021.jpg', '4c0a7bdd46ceb88d497eec5de360328e', 4, NULL, NULL, NULL, NULL, NULL),
(43, '_4341937243.jpg', '4c0a7bdd46ceb88d497eec5de360328e', 5, NULL, NULL, NULL, NULL, NULL),
(44, '_3664509598.jpg', '4c0a7bdd46ceb88d497eec5de360328e', 6, NULL, NULL, NULL, NULL, NULL),
(45, '_9558079093.jpg', '4c0a7bdd46ceb88d497eec5de360328e', 7, NULL, NULL, NULL, NULL, NULL),
(46, '_8683899231.jpg', '4c0a7bdd46ceb88d497eec5de360328e', 1, NULL, NULL, NULL, NULL, NULL),
(50, '_522515331.jpg', '122915b6774a4467be946ddae541af52', 5, NULL, NULL, NULL, NULL, NULL),
(51, '_9278004942.jpg', '122915b6774a4467be946ddae541af52', 1, NULL, NULL, NULL, NULL, NULL),
(52, '_3096868437.jpg', '122915b6774a4467be946ddae541af52', 4, NULL, NULL, NULL, NULL, NULL),
(53, '_8818320906.jpg', '122915b6774a4467be946ddae541af52', 3, NULL, NULL, NULL, NULL, NULL),
(54, '_6124034333.jpg', '122915b6774a4467be946ddae541af52', 2, NULL, NULL, NULL, NULL, NULL),
(55, '_166594972.jpg', '122915b6774a4467be946ddae541af52', 6, NULL, NULL, NULL, NULL, NULL),
(64, '_2328885905.jpg', '122915b6774a4467be946ddae541af52', 7, NULL, NULL, NULL, NULL, NULL),
(71, '_9812692860.jpg', '80fe651f52abe7a9ea11a3cc79f5a170', 1, NULL, NULL, NULL, NULL, NULL),
(72, '_4721889384.jpg', '80fe651f52abe7a9ea11a3cc79f5a170', 3, NULL, NULL, NULL, NULL, NULL),
(73, '_2375334459.jpg', '80fe651f52abe7a9ea11a3cc79f5a170', 2, NULL, NULL, NULL, NULL, NULL),
(74, '_5068900538.jpg', '80fe651f52abe7a9ea11a3cc79f5a170', 4, NULL, NULL, NULL, NULL, NULL),
(79, '_6237315940.jpg', '6246bbd28be0b22ff440cc5413329f36', 4, NULL, NULL, NULL, NULL, NULL),
(80, '_1433120253.jpg', '6246bbd28be0b22ff440cc5413329f36', 3, NULL, NULL, NULL, NULL, NULL),
(81, '_7441462301.jpg', '6246bbd28be0b22ff440cc5413329f36', 5, NULL, NULL, NULL, NULL, NULL),
(83, '_5764143271.jpg', '6246bbd28be0b22ff440cc5413329f36', 1, NULL, NULL, NULL, NULL, NULL),
(84, '_8302761735.jpg', '6246bbd28be0b22ff440cc5413329f36', 6, NULL, NULL, NULL, NULL, NULL),
(85, '_9201667057.jpg', '6246bbd28be0b22ff440cc5413329f36', 2, NULL, NULL, NULL, NULL, NULL),
(86, '_88281906.jpg', '6246bbd28be0b22ff440cc5413329f36', 7, NULL, NULL, NULL, NULL, NULL),
(93, '_8737195618.jpg', 'fd43e5467f81d95e5d71d2586a4de655', 2, NULL, NULL, NULL, NULL, NULL),
(94, '_7729541375.jpg', 'fd43e5467f81d95e5d71d2586a4de655', 1, NULL, NULL, NULL, NULL, NULL),
(95, '_2480790573.jpg', 'fd43e5467f81d95e5d71d2586a4de655', 3, NULL, NULL, NULL, NULL, NULL),
(99, '_7933508758.jpg', '178b0113689dce8a7e48360c3886dc99', 1, NULL, NULL, NULL, NULL, NULL),
(100, '_92398426.jpg', '178b0113689dce8a7e48360c3886dc99', 2, NULL, NULL, NULL, NULL, NULL),
(101, '_5208861953.jpg', '178b0113689dce8a7e48360c3886dc99', 3, NULL, NULL, NULL, NULL, NULL),
(102, '_2869456163.jpg', '178b0113689dce8a7e48360c3886dc99', 4, NULL, NULL, NULL, NULL, NULL),
(103, '_7253220467.jpg', '178b0113689dce8a7e48360c3886dc99', 5, NULL, NULL, NULL, NULL, NULL),
(109, '_850337259.jpg', 'adf5f10bd8632f3015b0b42691c3ce3d', 2, NULL, NULL, NULL, NULL, NULL),
(110, '_4470792128.jpg', 'adf5f10bd8632f3015b0b42691c3ce3d', 3, NULL, NULL, NULL, NULL, NULL),
(111, '_8771262494.jpg', 'adf5f10bd8632f3015b0b42691c3ce3d', 1, NULL, NULL, NULL, NULL, NULL),
(112, '_15477887.jpg', 'adf5f10bd8632f3015b0b42691c3ce3d', 4, NULL, NULL, NULL, NULL, NULL),
(113, '_9596261857.jpg', 'adf5f10bd8632f3015b0b42691c3ce3d', 5, NULL, NULL, NULL, NULL, NULL),
(114, '_7558360137.jpg', '7e510e310add5a7c7ec277f77d71a691', 1, NULL, NULL, NULL, NULL, NULL),
(115, '_7902901237.jpg', '7e510e310add5a7c7ec277f77d71a691', 2, NULL, NULL, NULL, NULL, NULL),
(116, '_1725907693.jpg', '7e510e310add5a7c7ec277f77d71a691', 3, NULL, NULL, NULL, NULL, NULL),
(117, '_7457342674.jpg', 'fd19479b38208dc63188090a08f461b2', 1, NULL, NULL, NULL, NULL, NULL),
(118, '_7705301879.jpg', 'fd19479b38208dc63188090a08f461b2', 2, NULL, NULL, NULL, NULL, NULL),
(119, '_7639165702.jpg', 'cba9bcb59f1df2a1ca9358684c3b1f4b', 1, NULL, NULL, NULL, NULL, NULL),
(120, '_144095565.jpg', 'cba9bcb59f1df2a1ca9358684c3b1f4b', 2, NULL, NULL, NULL, NULL, NULL),
(121, '_4670265289.jpg', 'cba9bcb59f1df2a1ca9358684c3b1f4b', 3, NULL, NULL, NULL, NULL, NULL),
(122, '_192739348.jpg', 'eddc3427c5d77843c2253f1e799fe933', 1, NULL, NULL, NULL, NULL, NULL),
(124, '_777153969.jpg', 'b4591e1ef51fdd8a9a8e7e7659c1a702', 1, NULL, NULL, NULL, NULL, NULL),
(125, '_167479692.jpg', 'd79058bc2cc9eb428ee4f86439ab2070', 1, NULL, NULL, NULL, NULL, NULL),
(127, '_646380386.jpg', 'fe91f119280a32d25e0f7d0a78e1eafa', 1, NULL, NULL, NULL, NULL, NULL),
(128, '_948936840.jpg', 'f3c5584ec143ec7367dad58cb07b955b', 1, NULL, NULL, NULL, NULL, NULL),
(132, '_520555457.jpg', 'f14cc2114263b35910d1ca6338cda6ef', 1, NULL, NULL, NULL, NULL, NULL),
(133, '_318349117.jpg', 'f14cc2114263b35910d1ca6338cda6ef', 2, NULL, NULL, NULL, NULL, NULL),
(134, '_70615153.jpg', 'c2be9d15da478de8a9de02f9125a1b11', 1, NULL, NULL, NULL, NULL, NULL),
(135, '_1155919707.jpg', 'c2be9d15da478de8a9de02f9125a1b11', 2, NULL, NULL, NULL, NULL, NULL),
(136, '_1074718736.jpg', 'c2be9d15da478de8a9de02f9125a1b11', 3, NULL, NULL, NULL, NULL, NULL),
(137, '_838431225.jpg', 'c2be9d15da478de8a9de02f9125a1b11', 4, NULL, NULL, NULL, NULL, NULL),
(138, '_1355931427.jpg', '98c0061232e69721a6bad0927408bc9e', 1, NULL, NULL, NULL, NULL, NULL),
(139, '_843724134.jpg', '98c0061232e69721a6bad0927408bc9e', 2, NULL, NULL, NULL, NULL, NULL),
(140, '_864938803.jpg', '98c0061232e69721a6bad0927408bc9e', 3, NULL, NULL, NULL, NULL, NULL),
(141, '_647499212.jpg', '3fac57f21c01e07b20df9c3c6dff6ae4', 1, NULL, NULL, NULL, NULL, NULL),
(161, 'gallery_1189699656.jpg', '35a721419aeeb9779f69359d946fcb41', 1, NULL, NULL, NULL, NULL, NULL),
(162, 'gallery_1033279131.jpg', '35a721419aeeb9779f69359d946fcb41', 2, NULL, NULL, NULL, NULL, NULL),
(163, 'gallery_794065459.jpg', '35a721419aeeb9779f69359d946fcb41', 3, NULL, NULL, NULL, NULL, NULL),
(164, 'gallery_783952990.jpg', '35a721419aeeb9779f69359d946fcb41', 4, NULL, NULL, NULL, NULL, NULL),
(165, 'gallery_805339786.jpg', '35a721419aeeb9779f69359d946fcb41', 5, NULL, NULL, NULL, NULL, NULL),
(166, 'gallery_118079207.jpg', '35a721419aeeb9779f69359d946fcb41', 6, NULL, NULL, NULL, NULL, NULL),
(167, 'gallery_887530488.jpg', '35a721419aeeb9779f69359d946fcb41', 7, NULL, NULL, NULL, NULL, NULL),
(168, 'gallery_484279666.jpg', '35a721419aeeb9779f69359d946fcb41', 8, NULL, NULL, NULL, NULL, NULL),
(178, 'tukan_logistics_825220469.jpg', 'e113f04a85b490586bb87f85211a1201', 7, NULL, NULL, NULL, NULL, NULL),
(180, 'autopremiumclub_501105092.jpg', 'e113f04a85b490586bb87f85211a1201', 6, NULL, NULL, NULL, NULL, NULL),
(181, 'autopremiumclub_401486519.jpg', 'e113f04a85b490586bb87f85211a1201', 5, NULL, NULL, NULL, NULL, NULL),
(182, 'autopremiumclub_1386483991.jpg', 'e113f04a85b490586bb87f85211a1201', 1, NULL, NULL, NULL, NULL, NULL),
(183, 'autopremiumclub_869112885.jpg', 'e113f04a85b490586bb87f85211a1201', 4, NULL, NULL, NULL, NULL, NULL),
(184, 'autopremiumclub_151213679.jpg', 'e113f04a85b490586bb87f85211a1201', 3, NULL, NULL, NULL, NULL, NULL),
(185, 'autopremiumclub_214040079.jpg', 'e113f04a85b490586bb87f85211a1201', 2, NULL, NULL, NULL, NULL, NULL),
(189, 'maserati_ghibli_491810227.jpg', 'b741d1cb6af143c63557766ab45f724f', 1, NULL, NULL, NULL, NULL, NULL),
(190, 'mercedes_glc_43_amg__442495806.jpg', 'e6549eafff98e784495d4ccf5057d2b2', 1, NULL, NULL, NULL, NULL, NULL),
(192, 'infiniti_q50s__377560848.jpg', '06bb5972b23ee930944d21c6a8f8c132', 1, NULL, NULL, NULL, NULL, NULL),
(193, 'maserati_ghibli_185165754.jpg', 'b741d1cb6af143c63557766ab45f724f', 4, NULL, NULL, NULL, NULL, NULL),
(194, 'maserati_ghibli_1171669339.jpg', 'b741d1cb6af143c63557766ab45f724f', 5, NULL, NULL, NULL, NULL, NULL),
(195, 'maserati_ghibli_15362345.jpg', 'b741d1cb6af143c63557766ab45f724f', 2, NULL, NULL, NULL, NULL, NULL),
(196, 'maserati_ghibli_156721747.jpg', 'b741d1cb6af143c63557766ab45f724f', 3, NULL, NULL, NULL, NULL, NULL),
(197, 'infiniti_q50s__884389168.jpg', '06bb5972b23ee930944d21c6a8f8c132', 2, NULL, NULL, NULL, NULL, NULL),
(198, 'infiniti_q50s__868940758.jpg', '06bb5972b23ee930944d21c6a8f8c132', 3, NULL, NULL, NULL, NULL, NULL),
(199, 'infiniti_q50s__925613614.jpg', '06bb5972b23ee930944d21c6a8f8c132', 4, NULL, NULL, NULL, NULL, NULL),
(200, 'infiniti_q50s__823757388.jpg', '06bb5972b23ee930944d21c6a8f8c132', 5, NULL, NULL, NULL, NULL, NULL),
(201, 'infiniti_q50s__451145194.jpg', '06bb5972b23ee930944d21c6a8f8c132', 6, NULL, NULL, NULL, NULL, NULL),
(202, 'infiniti_q50s__1323184241.jpg', '06bb5972b23ee930944d21c6a8f8c132', 7, NULL, NULL, NULL, NULL, NULL),
(203, 'infiniti_q50s__468960352.jpg', '06bb5972b23ee930944d21c6a8f8c132', 8, NULL, NULL, NULL, NULL, NULL),
(204, 'infiniti_q50s__841486482.jpg', '06bb5972b23ee930944d21c6a8f8c132', 9, NULL, NULL, NULL, NULL, NULL),
(205, 'mercedes_glc_43_amg__726548594.jpg', 'e6549eafff98e784495d4ccf5057d2b2', 2, NULL, NULL, NULL, NULL, NULL),
(206, 'mercedes_glc_43_amg__320715865.jpg', 'e6549eafff98e784495d4ccf5057d2b2', 3, NULL, NULL, NULL, NULL, NULL),
(207, 'mercedes_glc_43_amg__1185009192.jpg', 'e6549eafff98e784495d4ccf5057d2b2', 4, NULL, NULL, NULL, NULL, NULL),
(208, 'mercedes_glc_43_amg__1337212602.jpg', 'e6549eafff98e784495d4ccf5057d2b2', 5, NULL, NULL, NULL, NULL, NULL),
(209, 'mercedes_glc_43_amg__103276275.jpg', 'e6549eafff98e784495d4ccf5057d2b2', 6, NULL, NULL, NULL, NULL, NULL),
(210, 'mercedes_glc_43_amg__1212850754.jpg', 'e6549eafff98e784495d4ccf5057d2b2', 7, NULL, NULL, NULL, NULL, NULL),
(211, 'mercedes_glc_43_amg__516295311.jpg', 'e6549eafff98e784495d4ccf5057d2b2', 8, NULL, NULL, NULL, NULL, NULL),
(229, 'mercedes_glc_43_amg__1027211650.png', 'e6549eafff98e784495d4ccf5057d2b2', 9, NULL, NULL, NULL, NULL, NULL),
(230, '_790967171.jpg', '267ad0fbe88d5a7766820e5bded90e85', 1, NULL, NULL, NULL, NULL, NULL),
(231, '_72336424.jpg', '5eff6b84b548df4826a0aad88daab9c1', 1, NULL, NULL, NULL, NULL, NULL),
(232, '_31714422.jpg', 'c7184f3789428ca7af8d88e6c25497b9', 1, NULL, NULL, NULL, NULL, NULL),
(233, '_1322194510.jpg', 'c7184f3789428ca7af8d88e6c25497b9', 2, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL DEFAULT '0',
  `opis_en` longtext,
  `opis_pl` longtext,
  `opis_ru` longtext,
  `opis_rum` longtext,
  `tytul_en` varchar(255) DEFAULT NULL,
  `tytul_pl` char(255) DEFAULT NULL,
  `tytul_ru` varchar(255) DEFAULT NULL,
  `tytul_rum` varchar(255) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `poziom` int(11) NOT NULL,
  `aktywny` int(11) NOT NULL DEFAULT '1',
  `prefix` char(255) NOT NULL,
  `podtytul_en` char(255) NOT NULL,
  `podtytul_pl` char(255) DEFAULT NULL,
  `podtytul_ru` varchar(255) DEFAULT NULL,
  `podtytul_rum` varchar(255) DEFAULT NULL,
  `systemowa` int(11) NOT NULL DEFAULT '0',
  `special` char(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `ean` int(11) NOT NULL,
  `kod_producenta` char(255) NOT NULL,
  `kod_dostawcy` longtext NOT NULL,
  `dostawca` char(255) NOT NULL,
  `producent` char(255) NOT NULL,
  `kolor_pl` char(255) NOT NULL,
  `kolor_en` char(255) NOT NULL,
  `rozmiar` char(255) NOT NULL,
  `ilosc` int(11) NOT NULL,
  `cena_detal` char(255) NOT NULL,
  `cena_hurt` char(255) NOT NULL,
  `vat` int(11) NOT NULL,
  `cena_sugerowana` char(255) NOT NULL,
  `parametry_en` longtext,
  `parametry_pl` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `shipping`
--

CREATE TABLE IF NOT EXISTS `shipping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) DEFAULT NULL,
  `price` char(255) DEFAULT NULL,
  `kolejnosc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `shipping`
--

INSERT INTO `shipping` (`id`, `name`, `price`, `kolejnosc`) VALUES
(2, 'Kurier GLS', '12', 1),
(3, 'Paczkomat InPost', '15', 2),
(4, 'Poczta Polska', '12', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sizes`
--

CREATE TABLE IF NOT EXISTS `sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size` char(255) DEFAULT NULL,
  `kolejnosc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Zrzut danych tabeli `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `kolejnosc`) VALUES
(3, 'XS', 1),
(6, 'S', 2),
(7, 'M', 3),
(8, 'L', 4),
(9, 'XL', 5),
(10, '34', 6),
(11, '36', 7),
(12, '38', 8),
(13, '40', 9),
(14, '42', 10),
(15, 'Uni size', 11);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE IF NOT EXISTS `uzytkownicy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `imie` char(255) NOT NULL,
  `nazwisko` char(255) NOT NULL,
  `mail` char(255) NOT NULL,
  `firma` char(255) NOT NULL,
  `kraj` char(255) NOT NULL,
  `telefon` char(255) NOT NULL,
  `branza` char(255) NOT NULL,
  `zrodlo` char(255) NOT NULL,
  `aktywny` int(11) DEFAULT NULL,
  `ip` char(255) DEFAULT NULL,
  `www` char(255) DEFAULT NULL,
  `opis` longtext,
  `fax` char(255) DEFAULT NULL,
  `mobile` char(255) DEFAULT NULL,
  `komunikator` char(255) DEFAULT NULL,
  `mailing` char(255) DEFAULT NULL,
  `id_firmy` char(255) DEFAULT NULL,
  `miasto` char(255) DEFAULT NULL,
  `kod` char(255) DEFAULT NULL,
  `ulica` char(255) DEFAULT NULL,
  `zalogowany` int(11) DEFAULT NULL,
  `premium` int(11) DEFAULT NULL,
  `premium_data` date DEFAULT NULL,
  `haslo` char(255) DEFAULT NULL,
  `avatar` char(255) DEFAULT NULL,
  `administrator` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `data`, `imie`, `nazwisko`, `mail`, `firma`, `kraj`, `telefon`, `branza`, `zrodlo`, `aktywny`, `ip`, `www`, `opis`, `fax`, `mobile`, `komunikator`, `mailing`, `id_firmy`, `miasto`, `kod`, `ulica`, `zalogowany`, `premium`, `premium_data`, `haslo`, `avatar`, `administrator`) VALUES
(1, NULL, 'Dominik', 'Stawicki', 'estronanet@gmail.com', '', '', '605343440', '', '', 1, NULL, NULL, NULL, NULL, NULL, 'crazybike2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, 1),
(2, '2018-07-04', 'Szymon', 'Owczarek', 'biuro@professional-interior.pl', '', '', '', '', '', 1, '', '', '', '', '', '', '', '', '', '', '', NULL, 0, NULL, '7488e331b8b64e5794da3fa4eb10ad5d', NULL, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
