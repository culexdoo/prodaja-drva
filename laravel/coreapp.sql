-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2016 at 12:47 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dentist-finder`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `permalink` varchar(255) NOT NULL,
  `intro` text NOT NULL,
  `content` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `permalink`, `intro`, `content`, `status`, `image`, `created_at`, `updated_at`) VALUES
(14, 'Inicijalna parodontološka terapija', 'inicijalna-parodontoloska-terapija', '<p style="margin-bottom: 20px; padding: 0px; border: 0px; font-stretch: inherit; font-size: 17px; line-height: 1.7; font-family: "Open Sans", open-sanslight, "Trebuchet MS", Helvetica, Arial, sans-serif; vertical-align: baseline;"><strong style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: inherit; vertical-align: baseline;">Glavni cilj inicijalne parodontološke terapije je smanjiti upalu zubnog mesa</strong> i sprječiti širenje upale na koštane “pretince” zuba što može uzrokovati resorpciju kosti i u konačnici i gubitak zuba. Prvi korak u terapiji je uzimanje podrobne anamneze od pacijenta i klinički pregled.</p><p style="margin-bottom: 20px; padding: 0px; border: 0px; font-stretch: inherit; font-size: 17px; line-height: 1.7; font-family: "Open Sans", open-sanslight, "Trebuchet MS", Helvetica, Arial, sans-serif; vertical-align: baseline;">Pacijenti kojima je potrebna ova vrsta terapije navode kao simptome: <strong style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: inherit; vertical-align: baseline;">krvarenje zubnog mesa (gingive), pomičnost zubi, neugodan zadah i otežano čišćenje zubi</strong>. Pregledom usne šupljine, stomatolog najčešće primjećuje crvenu, otečenu gingivu, slabije provođenu oralnu higijenu, pomičnost zubi, krvarenje, neugodan zadah. Nakon toga tzv. sondiranjem zubnog mesa, mjerenjem dubine parodontnih džepova i pregledom panoramskih snimki čeljusti, stomatolog odlučuje o daljnim koracima terapije.</p>', '<p style="margin-bottom: 20px; padding: 0px; border: 0px; font-stretch: inherit; font-size: 17px; line-height: 1.7; font-family: "Open Sans", open-sanslight, "Trebuchet MS", Helvetica, Arial, sans-serif; vertical-align: baseline;">U terapiji je od iznimne važnosti i suradnja samog pacijenta pravilnim održavanjem oralne higijene, čime se postiže smanjenje količine plaka i mikroorganizama. Pacijent mora biti upućen da je <strong style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: inherit; vertical-align: baseline;">važna učinkovitost čišćenja i sistematičnost postupka</strong>, a ne vrsta četkice i paste za zube. Također je potrebno redovito čišćenje zubi četkicom upotpuniti drugim oblicima mehaničkog čišćenja, kao što su upotreba zubnog konca ili interdentalnih četkica, jer se početne promjene parodontnih bolesti najčešće nalaze u prostorima između zubi. U slučaju da je prisutan i neugodan zadah, postoje posebni strugači jezika. Preporučena je i primjena otopina za ispiranje usta na bazi klorheksidina koji ima visoku djelotvornost u redukciji plaka, primijenjen kao dodatak mehaničkom čišćenju.</p><p style="margin-bottom: 20px; padding: 0px; border: 0px; font-stretch: inherit; font-size: 17px; line-height: 1.7; font-family: "Open Sans", open-sanslight, "Trebuchet MS", Helvetica, Arial, sans-serif; vertical-align: baseline;">Nakon upućivanja pacijenta kako pravilno održavati oralnu higijenu, slijedi <strong style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: inherit; vertical-align: baseline;">uklanjanje mekih i tvrdih zubnih naslaga iznad i ispod razine zubnog mesa ručnim i strojnim instrumentima</strong>. Najčešće se kombiniraju ultrazvučni aparati i ručni strugači (kirete). Ultrazvučni aparati vibracijama postižu lomljenje i skidanje zubnog kamenca, odstranjuju obojenja zuba i zubni plak, dok se kiretama najčešće stružu i poliraju korijenovi zubi u parodontnim džepovima. Zatim slijedi završno poliranje gumicama, trakama, četkicama i pastama za poliranje. Radi uspostavljanja povoljnijih uvjeta za održavanje oralne higijene, potrebna je i korekcija grubih, loše oblikovanih, odstojećih ispuna te neadekvatnih protetskih radova.</p>', 'objavljeno', 'inicijalna-parodontoloska-terapijac81e7-2016-06-14.jpg', '2016-06-14 19:47:58', '2016-06-14 20:42:48'),
(15, 'Zašto je važno koristiti interdentalne četkice?', 'zasto-je-vazno-koristiti-interdentalne-cetkice', '<p><span style="font-family: "Open Sans", open-sanslight, "Trebuchet MS", Helvetica, Arial, sans-serif; font-size: 17px; line-height: 28.9px;">Kao što im i samo ime kaže, </span><strong style="margin: 0px; padding: 0px; border: 0px; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: "Open Sans", open-sanslight, "Trebuchet MS", Helvetica, Arial, sans-serif; vertical-align: baseline;">interdentalne četkice koriste se za čišćenje prostora između zubi</strong><span style="font-family: "Open Sans", open-sanslight, "Trebuchet MS", Helvetica, Arial, sans-serif; font-size: 17px; line-height: 28.9px;">. Imaju istu funkciju kao i zubni konac – uklanjanje hrane i plaka iz područja do kojih ne možemo doprijeti četkicom za zube. Gingivitis i ostala stomatološka stanja prouzročena su hranom i plakom zaostalim u međuzubnim prostorima. Upravo za prevenciju takvih stanja koriste se interdentalne četkice. Ove su četkice većinom jednokratne i dolaze u različitim veličinama.</span><br></p>', '<p style="margin-bottom: 20px; padding: 0px; border: 0px; font-stretch: inherit; font-size: 17px; line-height: 1.7; font-family: "Open Sans", open-sanslight, "Trebuchet MS", Helvetica, Arial, sans-serif; vertical-align: baseline;">Svakodnevno korištenje interdentalnih četkica <strong style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: inherit; vertical-align: baseline;">jednako je važno kao i pranje zubi</strong>. Iako korištenje interdentalnih četkica sve više dobiva na popularnosti, velik broj ljudi i dalje nije upoznat sa čišćenjem interdentalnog plaka. Glavni razlog korištenja ovih četkica je <strong style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: inherit; vertical-align: baseline;">prevencija upala i oticanja desni</strong>. Naime, nakon obroka, sitni komadići hrane se talože između zubi. Njihovim raspadanjem dolazi do razvoja bakterija i stvaranja plaka što može dovesti do problema sa desnima. Osobe koje su bile izložene takvim problemima znaju koliko bolna upala desni može biti. Stomatološko uklanjanje plaka kompliciranije je i bolnije od svakodnevne njege i čišćenja interdentalnog prostora. Iako je svima poznato da se hrana nakon objeda nakuplja i u međuzubnom prostoru, mnogi, unatoč tome, zanemaruju važnost temeljitog čišćenja zubi interdentalnim četkicama.</p><p style="margin-bottom: 20px; padding: 0px; border: 0px; font-stretch: inherit; font-size: 17px; line-height: 1.7; font-family: "Open Sans", open-sanslight, "Trebuchet MS", Helvetica, Arial, sans-serif; vertical-align: baseline;">Korištenje zubnog konca također je učinkovito, ali poprilično staromodno i nepraktično. Konac je kompliciraniji za korištenje pa čišćenje zubi koncem ne polazi svakome za rukom, dok se interdentalne četkice mogu koristiti jednom rukom, baš kao i obične četkice za zube. Također, zubni konac može prouzročiti krvarenje desni, što se pri korištenju interdentalne četkice događa znatno rijeđe. Interdentalne četkice često su korištene od strane stomatologa i osoba koje su spoznale važnost čišćenja međuzubnog prostora i to iz više razloga: <strong style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: inherit; vertical-align: baseline;">jednostavne su za uporabu</strong>,<strong style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: inherit; vertical-align: baseline;"> lako čiste međuzubni prostor</strong> te znatno<strong style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: inherit; vertical-align: baseline;">skraćuju vrijeme </strong>čišćenja zubi.</p>', 'objavljeno', 'zasto-je-vazno-koristiti-interdentalne-cetkice-45c48-2016-06-14.jpg', '2016-06-14 19:55:24', '2016-06-14 20:45:26'),
(16, 'VIDEO: Recesija gingive', 'video-recesija-gingive', '<p style="margin-bottom: 20px; padding: 0px; border: 0px; font-stretch: inherit; font-size: 17px; line-height: 1.7; font-family: "Open Sans", open-sanslight, "Trebuchet MS", Helvetica, Arial, sans-serif; vertical-align: baseline;"><strong style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: inherit; vertical-align: baseline;"><span style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Preosjetljivi su Vam zubni vratovi prilikom četkanja? Nezadovoljni ste izgledom povučenog zubnog mesa?</span></strong></p><p style="margin-bottom: 20px; padding: 0px; border: 0px; font-stretch: inherit; font-size: 17px; line-height: 1.7; font-family: "Open Sans", open-sanslight, "Trebuchet MS", Helvetica, Arial, sans-serif; vertical-align: baseline;"><strong style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: inherit; vertical-align: baseline;">Što je recesija gingive?</strong></p>', '<p style="margin-bottom: 20px; padding: 0px; border: 0px; font-stretch: inherit; font-size: 17px; line-height: 1.7; font-family: "Open Sans", open-sanslight, "Trebuchet MS", Helvetica, Arial, sans-serif; vertical-align: baseline;">Recesija gingive (povlačenje zubnog mesa), tj. pomicanje ruba gingive u smjeru korijena zuba može zahvatiti gotovo sve zube ili se javiti samo na pojedinim zubima. Ono je najčešće posljedica nepravilnog pristupa četkanju zubi (korištenje četkica sa tvrdim vlaknima, primjena prevelikog pritiska prilikom četkanja, nepravilna tehnika četkanja…), ali isto tako može se razviti i kao posljedica upale uzrokovane plakom ili uznapredovalog stadija parodontne bolesti.</p><p style="margin-bottom: 20px; padding: 0px; border: 0px; font-stretch: inherit; font-size: 17px; line-height: 1.7; font-family: "Open Sans", open-sanslight, "Trebuchet MS", Helvetica, Arial, sans-serif; vertical-align: baseline;"><strong style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: inherit; vertical-align: baseline;">Koji su simptomi?</strong></p><p style="margin-bottom: 20px; padding: 0px; border: 0px; font-stretch: inherit; font-size: 17px; line-height: 1.7; font-family: "Open Sans", open-sanslight, "Trebuchet MS", Helvetica, Arial, sans-serif; vertical-align: baseline;">Izložen je korijen zuba, javlja Vam se osjećaj preosjetljivosti, neugodnost prilikom četkanja i žvakanja ili ste samo nezadovoljni izgledom defekta zubnog mesa. Izloženo područje također može biti i mjesto nastanka karijesa ili mehaničkih defekata zbog slabije mineraliziranog cementa koji prekriva korijen.</p>', 'objavljeno', 'video-recesija-gingive-45c48-2016-06-14.png', '2016-06-14 20:39:24', '2016-06-14 20:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `user_group` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `user_group`, `username`, `first_name`, `last_name`, `password`, `profile_image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nikola.papratovic@gmail.com', 'admin', '', 'Nikola', 'Papratović', '$2y$10$31xGJpSAQ7nYIW4mdTy81OoN9XyJ8nSQXumI2NlK8qGHFitVxKq26', '', 'T2Si9GlQMHLs4SwhW892STmBCjCL29wTye70CrZTcjGxcL23H0n16ecRoSa9', '2015-10-09 11:40:24', '2016-06-15 00:27:02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
