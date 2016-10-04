-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2016 at 04:34 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `third`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` char(30) NOT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `name` char(30) NOT NULL,
  `email` char(30) NOT NULL,
  `password` char(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `job` char(30) NOT NULL,
  `credit_card` bigint(20) NOT NULL,
  `role` char(5) DEFAULT 'Guest',
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`name`, `email`, `password`, `phone`, `job`, `credit_card`, `role`) VALUES
('George Sanidas', 'gsan@yahoo.gr', '1234', 2104387690, 'accountant', 1234123412341234, 'Admin'),
('Aris Georgoulis', 'aris@hotmail.gr', '4321', 2103342167, 'Economist', 1111111111111111, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `painter`
--

DROP TABLE IF EXISTS `painter`;
CREATE TABLE IF NOT EXISTS `painter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL,
  `bio` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `painter`
--

INSERT INTO `painter` (`id`, `name`, `bio`) VALUES
(1, 'Leonardo da Vinci', 'Ο Λεονάρντο ντα Βίντσι ένας πολύ έξυπνος και δημιουργικός άνθρωπος (Leonardo da Vinci, 15 Απριλίου 1452 — 2 Μαΐου 1519) ήταν Ιταλός αρχιτέκτονας, ζωγράφος, γλύπτης, μουσικός, εφευρέτης, μηχανικός, ανατόμος, γεωμέτρης, παλαιοντολόγος και γιατρός, που έζησε την περίοδο της Αναγέννησης.'),
(2, 'Vincent van Gogh', 'Ο Πάμπλο Πικάσο ή Ντιέγο Χοσέ Φρανθίσκο ντε Πάουλα Χουάν Νεμοπουθένο Μαρία ντε λος Ρεμέδιος Θιπριάνο ντε λα Σαντίσιμα Τρινιδάδ Ρουίθ ι Πικάσο (25 Οκτωβρίου 1881 - 8 Απριλίου 1973) ήταν Ισπανός ζωγράφος.'),
(3, 'Edvard Munch', 'Ο Έντβαρτ Μουνκ (Edvard Munch, 12 Δεκεμβρίου 1863 - 23 Ιανουαρίου 1944) ήταν Νορβηγός ζωγράφος, που ανήκει στους προδρόμους του εξπρεσιονισμού. Γεννήθηκε στις 12 Δεκεμβρίου 1863 στο χωριό Άνταλσμπρουκ της Νορβηγίας και μεγάλωσε στο Όσλο. Πέθανε στις 23 Ιανουαρίου 1944 στο Όσλο. Το πιο γνωστό του έργο είναι «Η Κραυγή».'),
(4, 'Pablo Picasso', 'Ο Πάμπλο Πικάσο ή Ντιέγο Χοσέ Φρανθίσκο ντε Πάουλα Χουάν Νεμοπουθένο Μαρία ντε λος Ρεμέδιος Θιπριάνο ντε λα Σαντίσιμα Τρινιδάδ Ρουίθ ι Πικάσο (25 Οκτωβρίου 1881 - 8 Απριλίου 1973) ήταν Ισπανός ζωγράφος.'),
(5, 'Salvador Dali', 'Ο Σαλβαδόρ Νταλί (πλήρες όνομα: Salvador Felip Jacint Dalí Domènech) (Φιγέρες, 11 Μαΐου 1904[1] — Φιγέρες, 23 Ιανουαρίου 1989) ήταν ένας από τους σημαντικότερους Ισπανούς ζωγράφους. Συνδέθηκε με το καλλιτεχνικό κίνημα του υπερρεαλισμού, στο οποίο ανήκε για ένα διάστημα. Αποτελεί έναν από τους πιο γνωστούς ζωγράφους του 20ου αιώνα και μια πολύ εκκεντρική φυσιογνωμία της σύγχρονης τέχνης.'),
(6, 'Gustav Klimt', 'Ο Γκούσταφ Κλιμτ (Gustav Klimt, 14 Ιουλίου 1862 – 6 Φεβρουαρίου 1918) ήταν Αυστριακός ζωγράφος και ένας από τους σημαντικότερους εκπροσώπους του κινήματος της Απόσχισης (Sezession) της Βιέννης που διαδραμάτισε σημαντικό ρόλο στην ανάπτυξη της Αρ Νουβό (Art Nouveau). Είχε σημαντική συμβολή στη διεθνή αναγνώριση της αυστριακής τέχνης και υπήρξε από τους πρώτους που κατάφεραν να συνδυάσουν την εικονιστική με την αφηρημένη ζωγραφική.'),
(7, 'Claude Monet', 'Ο Κλωντ Μονέ (Claude Oscar Monet, 14 Νοεμβρίου 1840 - 5 Δεκεμβρίου 1926) ήταν Γάλλος ζωγράφος και ένας από τους σημαντικότερους εκπροσώπους του κινήματος του ιμπρεσιονισμού.');

-- --------------------------------------------------------

--
-- Table structure for table `painting`
--

DROP TABLE IF EXISTS `painting`;
CREATE TABLE IF NOT EXISTS `painting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(30) NOT NULL,
  `description` mediumtext NOT NULL,
  `year_` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `painter_id` int(11) NOT NULL,
  `art_movement` char(30) NOT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `availability` date DEFAULT NULL,
  `image_painting` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `painter_id` (`painter_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `painting`
--

INSERT INTO `painting` (`id`, `title`, `description`, `year_`, `price`, `painter_id`, `art_movement`, `width`, `height`, `availability`, `image_painting`) VALUES
(1, 'Mona Lisa', 'Η Μόνα Λίζα (γνωστή και ως Τζιοκόντα, ή Πορτραίτο της Λίζα Γκεραρντίνι, συζύγου του Φρανσέσκο ντελ Τζιοκόντο) είναι προσωπογραφία που ζωγράφισε ο Ιταλός καλλιτέχνης Λεονάρντο ντα Βίντσι. Πρόκειται για ελαιογραφία σε ξύλο λεύκης, που ολοκληρώθηκε μέσα στη χρονική περίοδο 1503-1519.', 1503, 20000, 1, 'Renaissance', 53, 77, '2010-05-10', 'images/painting-01.jpg'),
(2, 'The Starry Night', 'Στο έργο του αυτό ο Βαν Γκογκ έχει απεικονίσει χαοτικές δίνες που ακολουθούν την κλιμάκωση Κολμογκόροφ, όπως προκύπτει από μαθηματική ανάλυση της εικόνας. Ο Βαν Γκογκ αναπαράγει σε πίνακές του, επακριβώς, νόμους της φύσης', 1889, 15000, 2, 'Post-Impressionism', 92, 74, '2016-10-10', 'images/painting-02.jpg'),
(3, 'The Scream', 'Η Κραυγή (Νορβηγικά: Skrik) είναι μία σειρά από εξπρεσιονιστικούς ζωγραφικούς πίνακες του Νορβηγού Έντβαρτ Μουνκ (Edvard Munch), που απεικονίζει μια αγωνιούσα μορφή με φόντο ουρανό σε χρώμα κόκκινο του αίματος. Θεωρείται από μερικούς πως συμβολίζει το ανθρώπινο είδος κάτω από τη συντριβή του υπαρξιακού τρόμου.', 1893, 18000, 3, 'Expressionism', 74, 91, '2013-05-12', 'images/painting-03.jpg'),
(4, 'Guernica', 'Αυτός ο τεράστιος καμβάς (3,54x7,82μ.) περιγράφει την απανθρωπιά, τη βιαιότητα και την απόγνωση του πολέμου. Ήταν παραγγελία της δημοκρατικής κυβέρνησης της Ισπανίας για τη Διεθνή Έκθεση του Παρισιού το 1937.', 1937, 25000, 4, 'Surrealism', 776, 349, '2017-04-03', 'images/painting-04.jpg'),
(5, 'The Persistence of Memory', 'Η εμμονή της μνήμης είναι ελαιογραφία σε καμβά (1931) του Νταλί. Η σκηνή που απεικονίζεται είναι η πραγματική έρημος κοντά στην Καταλονία της Ισπανίας, όπου έμενε ο Νταλί. Τα ρολόγια που λιώνουν αντιπροσωπεύουν το χάσιμο της σημασίας του χρόνου που θέλει να δείξει ο Νταλί. ', 1931, 30000, 5, 'Surrealism', 33, 24, '2012-07-02', 'images/painting-05.jpg'),
(6, 'Self-Portrait without Beard', 'Η Αυτοπροσωπογραφία χωρίς γενειάδα είναι ένα 1889 πίνακας σε καμβά ζωγραφικής από την μετα-ιμπρεσιονιστική εποχή του  καλλιτέχνη Βίνσεντ βαν Γκογκ . Η εικόνα , που μπορεί να ήταν η τελευταία αυτοπροσωπογραφία του Βαν Γκογκ , ολοκληρώθηκε το Σεπτέμβριο του ίδιου έτους .', 1889, 50000, 2, 'Post-Impressionism', 54, 65, '2009-04-11', 'images/painting-06.jpg'),
(7, 'The Kiss', 'Το Φιλί (γερμανικά: Der Kuss) είναι διάσημος πίνακας του Αυστριακού ζωγράφου Γκούσταφ Κλιμτ. Ο πίνακας δημιουργήθηκε την περίοδο 1907-1908 και ανήκει στη λεγόμενη χρυσή περίοδο του Κλιμτ. Θεωρείται το πιο διάσημο έργο του Κλιμτ, αλλά και ένα από τα διασημότερα της Αρ Νουβό. ', 1908, 8000, 6, 'Symbolism', 180, 180, '2008-04-09', 'images/painting-07.jpg'),
(8, 'Impression, Sunrise', 'Εντύπωση , ανατέλλων ήλιος ( γαλλικά : Impression , Soleil Levant ) είναι ένας πίνακας του Κλοντ Μονέ . Εμφανίστηκε σε ό, τι αργότερα θα γίνει γνωστό ως ', 1872, 40000, 7, 'Impressionism', 63, 48, '2017-06-01', 'images/painting-08.jpg'),
(10, 'Virgin And Child', 'Παρουσιάζει την Αγία Άννα, την κόρη της, την Παρθένο Μαρία, και τον Ιησού ως νήπιο. Ο Χριστός παρουσιάζεται να αγκαλιάζει ένα προβατάκι (ο αμνός της θυσίας), που συμβολίζει το Πάθος του, ενώ η Παρθένος προσπαθεί να τον συγκρατήσει. Το έργο έγινε παραγγελία για το Ιερό της εκκλησίας Santissima Annunziata στη Φλωρεντία και το θέμα του απασχόλησε για πολύ το μεγάλο ζωγράφο.', 1508, 100000, 1, 'Impressionism', 801, 1233, '2016-09-06', 'images/painting-09.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `single_purchase`
--

DROP TABLE IF EXISTS `single_purchase`;
CREATE TABLE IF NOT EXISTS `single_purchase` (
  `painting_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `purchase_time` datetime DEFAULT NULL,
  PRIMARY KEY (`painting_id`,`cart_id`),
  KEY `cart_id` (`cart_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
