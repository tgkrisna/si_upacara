/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.31-MariaDB : Database - db_forestku
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_forestku` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_forestku`;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2020_04_04_005200_create_m__users_table',1),
(2,'2020_04_21_131240_create_m__kategoris_table',2);

/*Table structure for table `tb_detil_post` */

DROP TABLE IF EXISTS `tb_detil_post`;

CREATE TABLE `tb_detil_post` (
  `id_det_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_tag` int(11) DEFAULT NULL,
  `id_post` int(11) DEFAULT NULL,
  `id_parent_post` int(11) DEFAULT NULL,
  `id_root_post` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `spesial` int(11) DEFAULT NULL,
  `posisi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_det_post`),
  KEY `id_post` (`id_post`),
  KEY `id_tag` (`id_tag`),
  KEY `id_status` (`id_status`),
  KEY `id_parent_post` (`id_parent_post`),
  KEY `tb_detil_post_ibfk_6` (`id_root_post`),
  CONSTRAINT `tb_detil_post_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `tb_tag` (`id_tag`) ON DELETE SET NULL,
  CONSTRAINT `tb_detil_post_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `tb_status` (`id_status`) ON DELETE SET NULL,
  CONSTRAINT `tb_detil_post_ibfk_4` FOREIGN KEY (`id_post`) REFERENCES `tb_post` (`id_post`) ON DELETE SET NULL,
  CONSTRAINT `tb_detil_post_ibfk_5` FOREIGN KEY (`id_parent_post`) REFERENCES `tb_post` (`id_post`) ON DELETE SET NULL,
  CONSTRAINT `tb_detil_post_ibfk_6` FOREIGN KEY (`id_root_post`) REFERENCES `tb_post` (`id_post`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=latin1;

/*Data for the table `tb_detil_post` */

insert  into `tb_detil_post`(`id_det_post`,`id_tag`,`id_post`,`id_parent_post`,`id_root_post`,`id_status`,`spesial`,`posisi`) values 
(51,5,23,30,23,NULL,NULL,NULL),
(52,5,23,31,23,NULL,NULL,NULL),
(70,5,23,50,23,NULL,NULL,NULL),
(71,5,23,55,23,NULL,NULL,NULL),
(72,5,24,32,24,NULL,NULL,NULL),
(73,5,24,34,24,NULL,NULL,NULL),
(74,5,25,52,25,NULL,NULL,NULL),
(75,5,26,53,26,NULL,NULL,NULL),
(76,5,26,54,26,NULL,NULL,NULL),
(77,5,26,56,26,NULL,NULL,NULL),
(79,5,29,43,29,NULL,NULL,NULL),
(80,5,27,35,27,NULL,NULL,NULL),
(81,3,1,2,NULL,1,1,1),
(82,1,3,23,NULL,NULL,NULL,NULL),
(83,5,3,30,23,NULL,NULL,NULL),
(87,1,8,23,NULL,NULL,NULL,NULL),
(90,5,8,50,23,NULL,NULL,NULL),
(92,1,9,23,NULL,NULL,NULL,NULL),
(95,5,9,50,23,NULL,NULL,NULL),
(97,1,10,24,NULL,NULL,NULL,NULL),
(98,5,10,32,24,NULL,NULL,NULL),
(100,1,11,27,NULL,NULL,NULL,NULL),
(101,5,11,35,27,NULL,NULL,NULL),
(102,1,11,23,NULL,NULL,NULL,NULL),
(106,5,11,55,23,NULL,NULL,NULL),
(107,1,16,26,NULL,NULL,NULL,NULL),
(108,5,16,53,26,NULL,NULL,NULL),
(111,1,15,26,NULL,NULL,NULL,NULL),
(113,5,15,54,26,NULL,NULL,NULL),
(115,1,14,27,NULL,NULL,NULL,NULL),
(116,5,14,35,27,NULL,NULL,NULL),
(117,1,14,23,NULL,NULL,NULL,NULL),
(121,5,14,55,23,NULL,NULL,NULL),
(122,1,13,26,NULL,NULL,NULL,NULL),
(125,5,13,56,26,NULL,NULL,NULL),
(126,1,12,26,NULL,NULL,NULL,NULL),
(130,5,26,105,26,NULL,NULL,NULL),
(131,5,12,105,26,NULL,NULL,NULL),
(132,5,24,106,24,NULL,NULL,NULL),
(133,1,21,24,NULL,NULL,NULL,NULL),
(136,5,21,106,24,NULL,NULL,NULL),
(137,3,1,3,NULL,1,1,2),
(138,1,3,23,NULL,NULL,1,NULL),
(139,5,3,30,23,NULL,1,NULL),
(140,3,1,4,NULL,1,1,3),
(141,3,1,5,NULL,1,1,4),
(142,3,1,6,NULL,1,1,5),
(143,3,1,7,NULL,1,1,6),
(144,3,1,8,NULL,1,1,7),
(145,1,8,23,NULL,NULL,1,NULL),
(146,5,8,50,23,NULL,1,NULL),
(147,3,1,9,NULL,1,1,8),
(148,1,9,23,NULL,NULL,1,NULL),
(149,5,9,50,23,NULL,1,NULL),
(150,3,1,10,NULL,1,1,9),
(151,1,10,24,NULL,NULL,1,NULL),
(152,5,10,32,24,NULL,1,NULL),
(153,3,1,57,NULL,1,1,10),
(154,3,1,11,NULL,2,1,NULL),
(155,1,11,27,NULL,NULL,1,NULL),
(156,5,11,35,27,NULL,1,NULL),
(157,1,11,23,NULL,NULL,1,NULL),
(158,5,11,55,23,NULL,1,NULL),
(160,1,12,26,NULL,NULL,1,NULL),
(161,5,12,105,26,NULL,1,NULL),
(163,1,13,26,NULL,NULL,1,NULL),
(164,5,13,56,26,NULL,1,NULL),
(165,3,1,12,NULL,2,1,NULL),
(166,1,12,26,NULL,NULL,1,NULL),
(167,5,12,105,26,NULL,1,NULL),
(168,3,1,13,NULL,2,1,NULL),
(169,1,13,26,NULL,NULL,1,NULL),
(170,5,13,56,26,NULL,1,NULL),
(171,3,1,14,NULL,2,1,NULL),
(172,1,14,27,NULL,NULL,1,NULL),
(173,5,14,35,27,NULL,1,NULL),
(174,1,14,23,NULL,NULL,1,NULL),
(175,5,14,55,23,NULL,1,NULL),
(176,3,1,15,NULL,2,1,NULL),
(177,1,15,26,NULL,NULL,1,NULL),
(178,5,15,54,26,NULL,1,NULL),
(179,3,1,16,NULL,2,1,NULL),
(180,1,16,26,NULL,NULL,1,NULL),
(181,5,16,53,26,NULL,1,NULL),
(182,3,1,17,NULL,3,1,NULL),
(184,3,1,18,NULL,3,1,NULL),
(185,3,1,19,NULL,3,1,NULL),
(186,3,1,20,NULL,3,1,NULL),
(187,3,1,21,NULL,3,1,NULL),
(188,1,21,24,NULL,NULL,1,NULL),
(189,5,21,106,24,NULL,1,NULL),
(190,3,1,22,NULL,3,1,NULL),
(191,1,1,23,NULL,NULL,1,NULL),
(192,1,1,24,NULL,NULL,1,NULL),
(193,1,1,26,NULL,NULL,1,NULL),
(194,1,1,27,NULL,NULL,1,NULL);

/*Table structure for table `tb_kategori` */

DROP TABLE IF EXISTS `tb_kategori`;

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(20) DEFAULT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kategori` */

insert  into `tb_kategori`(`id_kategori`,`nama_kategori`,`deskripsi`,`gambar`) values 
(1,'Dewa Yadnya','Dewa Yadnya',NULL),
(2,'Pitra Yadnya','Pitra Yadnya',NULL),
(3,'Manusa Yadnya','Manusa Yadnya',NULL),
(4,'Rsi Yadnya','Rsi Yadnya',NULL),
(5,'Bhuta Yadnya','Bhuta Yadnya',NULL);

/*Table structure for table `tb_post` */

DROP TABLE IF EXISTS `tb_post`;

CREATE TABLE `tb_post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) DEFAULT NULL,
  `id_tag` int(11) DEFAULT NULL,
  `nama_post` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `video` text,
  `gambar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_post`),
  KEY `id_tag` (`id_tag`),
  KEY `tb_post_ibfk_2` (`id_kategori`),
  CONSTRAINT `tb_post_ibfk_1` FOREIGN KEY (`id_tag`) REFERENCES `tb_tag` (`id_tag`) ON DELETE SET NULL,
  CONSTRAINT `tb_post_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;

/*Data for the table `tb_post` */

insert  into `tb_post`(`id_post`,`id_kategori`,`id_tag`,`nama_post`,`deskripsi`,`video`,`gambar`) values 
(1,2,NULL,'Atma Wedana','<p>Atma Wedana adalah upacara yadnya yang bertujuan untuk menyucikan sang atma pitara setelah prosesi ngaben atau sawa wedana selesai yang dilaksanakan dengan upacara Nyekah atau Mamukur.</p>\r\n<p>Melalui upacara Atma Wedana ini yang diawali dengan dilaksanakannya upacara ngangget don bingin sebagai sarana ngawi sekah utawi puspa sarira sajeroning upacara mamukur sehingga nantinya roh atau atman leluhur kita itu menjadi Dewa Pitara untuk selanjutnya dapat menstanakannya di Kemulan.</p>','y-L05nIbOn0','1598346946_Atma Wedana.jpg'),
(2,NULL,3,'Wangun Bale Petak','<p>Wangun Bale Petak merupakan proses membangun Bale Petak yang digunakan sebagai tempat bersetana-Nya Sang Pitara di bale Payajnan. Bale Petak ini dibangun dalam keadaan yang cukup tinggi dikarenakan Sang Pitara bersetana disana.</p>','uvkKyxc_fpc','1598347316_Wangun Bale Petak.jpg'),
(3,NULL,3,'Melaspas Wewangunan','<p>Melaspas asal kata dari &ldquo;paspas&rdquo; yang artinya membersihkan atau membuang yang tidak perlu, disini dimaksudkan bahwa bangunan yang dibangun seperti Bale Petak agar aman dan kuat selama upacara berlangsung.</p>','QRVgXz6jkwA','1598347486_Melaspas Wewangunan.jpg'),
(4,NULL,3,'Ngadegang Bhatara Sri','<p>Ngadegang Bhatara Sri adalah prosesi yang ditujukan sebagai ucapan rasa syukur terhadap Bhatara Sri atau rasa syukur terhadap Hyang Widhi dalam hal pencipta maupun pemelihara.</p>','NcPxMUQCp88','1598347794_Ngadegang Bhatara Sri.jpg'),
(5,NULL,3,'Matur Piuning Lan Nunas Tirta','<p>Pengertian Matur Piuning, Matur berarti menghadap, sedangkan Piuning yang artinya memberitahukan atau mengabarkan. Jadi secara arti kata matur piuning adalah menghadap untuk memberitahukan atau mengabarkan. Proses Matur Piuning pada Upacara Atma Wedana sendiri dilaksanakan di Pura Kahyangan Tiga, dan atau Pura Kahyangan Jagat. Biasanya dalam melaksanakan Matur Piuning, juga dilakukan proses Nunas Tirta pada mata air terdekat.</p>','09ddfhGdoc4','1598348008_Matur Piuning.jpg'),
(6,NULL,3,'Ngulapin ring Segara','<p>Ngulapin ring Segara merupakan prosesi upacara yang bertujuan untuk memanggil Atma yang telah dihanyut terdahulu agar Atma tersebut bisa kembali dan berstana nantinya di Bale Penyadnyan.</p>','F6xC16UJf_8','1598348123_Ngulapin ring Segara.jpg'),
(7,NULL,3,'Munggah ring Bale Peyadnyan','<p>Munggah ring Bale Peyadnyan merupakan prosesi upacara yang bertujuan untuk menghaturkan Atma yang sebelumnya telah dipanggil agar bisa melinggih (berstana) di Dewa Hyang nantinya.</p>','mpbEHqE9za8','1598348269_Munggah ring Bale.jpg'),
(8,NULL,3,'Ngingsah','<p>Ngingsah merupakan prosesi upacara yang dimaksudkan sebagai upaya untuk menyucikan beras yang akan dipergunakan selama pelaksanaan upacara ini. Ngingsah juga mengandung makna sebagai ungkapan kesiapan warga dalam pelaksanaan suatu upacara.</p>','610FW-BFFIA','1598348382_Ngingsah.jpg'),
(9,NULL,3,'Mapepada','<p>Mapepada merupakan prosesi upacara yang dimaksudkan sebagai pamarisudhawewalungan atau penyucian hewan-hewan yang dipergunakan sebagai korban upacara agar roh hewan-hewan korban tersebut nantinya dapat meningkat menjadi mahluk yang lebih tinggi tingkatannya.</p>','h_DkeQW7iss','1598348511_Mapepada.jpg'),
(10,NULL,3,'Ngangget Don Bingin','<p>Upacara Memetik Daun Beringin (kalpataru/kalpavriksa) untuk dipergunakan sebagai bahan puspasarira (simbol badan roh) yang nantinya dirangkai sedemikian rupa seperti sebuah tumpeng (dibungkus kain putih), dilengkapi dengan prerai (ukiran/lukisan wajah manusia, laki/perempuan) dan dihiasi dengan bunga ratna. Upacara ini berupa prosesi (mapeed) menuju pohon beringin diawali dengan tedung agung, mamas, bandrang dan lain-lainnya. Sebagai alas daun yang dipetik adalah tikar kalasa yang di atasnya ditempatkan kain putih sebagai pembungkus daun beringin tersebut.</p>','qvP-4f2wI4A','1598348662_Ngangget don bingin.jpg'),
(11,NULL,3,'Pengaskaran','<p>Ngaskara (atau &ldquo;askara&rdquo; berarti penyucian/pembersihan) artinya mawinten bagi Sang Lina, yaitu penyucian roh dari Atma Petra menjadi Pitara. Ketika kematian terjadi, prakerti (badan kasar) terpisah dengan atma (antakarana sarira) namun masih diikuti oleh suksma sarira (alam pikiran, perasaan, keinginan, nafsu) sehingga perlu dilakukan pebersihan.</p>','1zXUMMLL2UY','1598348879_Pengasakaran.jpg'),
(12,NULL,3,'Memendak','<p>Memendak adalah proses penjemputan untuk sekah yang sebelumnya masih kosong. Proses ini biasanya dilakukan oleh preti sentana diantar oleh Pandita dengan Puja Sapta Ongkara Atma, Setelah itu sekah (simbol atma) disatukan dengan rantasan (simbol badan halus). Sekah sangge untuk menampung Atma lain yang ingin ikut upacara.</p>','WVucA35A5SM','1598349028_Memendak.jpg'),
(13,NULL,3,'Mapralina','<p>Mapralina adalah yaitu upacara dilakukan oleh pandita (Sulinggih) sebagai simbol pelepasan Atma dari ikatan Sukma Sarira.</p>','y8RBwJVshmY','1598349150_Mepralina.jpg'),
(14,NULL,3,'Mamutru','<p>Mamutru adalah proses pembacaan lontar yang biasanya dilakukan oleh satu atau dua orang. Pembaca lontar ini akan disediakan empat khusus biasanya disebelah bale pandita dengan sebuah daksina gede ditambah selembar kain putih untuk destar sebagai punianya. Mamutru biasanya akan membacakan adalah salah satu parwa seperti, Adi Parwa, Udyoga Parwa atau Swarga-Rohana Parwa sebagai Upanisad.</p>','ksCFHOGM4jE','1598349225_Mamutru.jpg'),
(15,NULL,3,'Mapurwa Daksina','<p>Mapurwa daksina terdiri dari kata &ldquo;Purwa&rdquo; yang berarti timur dan &ldquo;Daksina&rdquo; yang berarti selatan dalam pengider-ider bhuwana. Mapurwa daksina bertujuan untuk mensthanakan sang pitara dibale payajnan atau bale petak pada tempat yang paling atas. Mapurwa daksina dilakukan dengan berjalan mengelilingi areal upacara (bale Payajnan) dari arah timur ke selatan (dari kiri ke kanan sesuai dengan arah jarum jam) sebanyak tiga kali yang diiringi dengan tari pendet dan kekidungan.</p>','o3yOp9IAPEI','1598349403_Mapurwa.jpg'),
(16,NULL,3,'Ngajum Sekah','<p>Prosesi Ngajum Sekah adalah prosesi setelah daun beringin tiba di tenpat upacara, maka untuk masing-masing perwujudan roh, dipilih sebanyak 108 lembar, ditusuk an dirangkai sedemikian rupa kemudian disebut Sekah. Jumlah Sekah sebanyak roh yang akan diupacarakan, di samping jumlah tersebut, dibuat juga untuk Lingga atau Sangge. Setelah Sekah dihiasi seperti tubuh manusia dengan busana selengkapnya (berwarna putih), dilakukan upacara Ngajum, yaitu mensthanakan roh pada Sekah tersebut, sekaligus ditempatkan di panggung upacara yang disebut Payajnan (tempat upacara yang khusus untuk itu terbuat dari batang pinag yang sudah dihaluskan).</p>','3jjTyKTE_2k','1598349516_Ngajum Sekah.jpg'),
(17,NULL,3,'Nganyut ke Segara','<p>Nganyut ke Segara adalah merupakan tahap terakhir dari suatu upacara seperti Mamukur atau Ngaben, dapat dilakukan pagi hari selesai upacara Ngeseng Sekah (Upacara Ngirim). Setelah tiba di tepi pantai, arang/abu yang ditempatkan didalam kelapa gading dikeluarkan dan ditebarkan di tepi pantai yang didahului dengan upacara persembahyangan sesajen kepada Sang Hyang Baruna, sebagai penguasa laut, sekaligus permohonan penyucian terhadap roh yang diupacarakan dan diakhiri dengan persembayhangan oleh keluarga.</p>','Qg5m2Tsf0hM','1598349768_Nganyut.jpg'),
(18,NULL,3,'Memendak Dewa Pitara ring Segara','<p>Memendak Dewa Pitara ring Segara adalah upacara kelanjutan dari upacara Mamukur. Upacara ini sering disebut juga sebagai Ngalinggihang Dewa Hyang yaitu, merupakan tradisi lebih lanjut dari mendharma-kan leluhurnya pada pura kawitan masing-masing yang dirangkai pula dengan upacara Nyegara-Gunung atau Maajar-ajar, seperti ke Pura Goalawah dan Pura Dalem Puri serta Pura Penataran Agung Besakih.</p>\r\n','InbFLyBq7cY','1598349900_Memendak Dewa.jpg'),
(19,NULL,3,'Nyegara Gunung','<p>Nyegara Gunung dapat diartikan sebagai suatu proses penciptaan dari dewa pitara menjadi Dewata-dewati. Kata &ldquo;segara&rdquo; sebagai lambang predhana dan &ldquo;gunung&rdquo; sebagai lambing purusa. Upacara nyegara gunung dilaksanakan setelah upacara nyekah pada rangkaian upacara Atma Wedana. Upacara nyegara gunung wajib dilaksanakan karena merupakan sarana atau media yang digunakan untuk mendak Dewata-dewati yang selanjutnya disthanakan di Sanggah atau Sanggah Kemulan atau Pura Kawitan.</p>','gR4vPRSsuJE','1598349990_Nyegara.jpg'),
(20,NULL,3,'Matur Sembah','<p>Matur sembah merupakan upacara persembahyangan yang didahului dengan pemujaan kepada Sang Hyang Surya sebagai saksi agung alam semesta, kemudian kepada para dewata dan leluhur, serta sembah untuk pelepasan roh (Atma) dari ikatan Sukma Sarira yang diikuti oleh Sang Yajamana dan seluruh keluarga besarnya.</p>','6kFtPmYiYKI','1598350122_Matur Sembah.jpg'),
(21,NULL,3,'Mapegat Semaya','<p>Upacara Mapegat Semaya bertujuan untuk memutuskan ikatan duniawi dan sekaligus untuk meningkatkan kesucian atman seseorang yang telah meninggal dunia. Upacara yang juga disebut Mapepegat ini dilaksanakan di pintu kori masuk pekarangan rumah. Mereka yang mengantarkan ke setra, menyelenggarakan upacara mepegat, sebagai simbol pemutusan hubungan duniawi dengan sang meninggal dengan sarana bebantenan dan tali benang yang dihubungkan pada daun carang dapdap. Setelah selesai banten (yadnya) dihaturkan, tali benang ini dilabrak masuk hingga putus yang menandai bahwa putusnya sebuah hubungan.</p>','HKrhyQbAzl0','1598350258_Mapegat.jpg'),
(22,NULL,3,'Ngelinggihang ring Kemulan','<p>Ngelinggihang ring Kemulan ditujukan untuk mendak Atma (Dewata-dewati) yang bermaksud untuk mempersatukan dewa pitara (atman leluhur yang sudah suci melalui proses upacara Pitra Yadnya) kepada sumbernya (Hyang Kamulan). Kalimat \"irika mapisan lawan dewa Hyangnia Nguni&rdquo; mengandung pengertian bersatunya atma yang telah suci dengan sumbernya, yakni Sivatma (ibunta) dan Paratma (ayahta). Hal ini adalah merupakan realisasi dari tujuan akhir Agama Hindu yakni mencapai moksa (penyatuan Atma dengan paratma). Atma yang dapat diunggahkan pada Sanggah Kamulan yaitu Atma yang telah disucikan melalui proses upacara Nyekah atau mamukur.</p>','DkmjXpW11w4','1598350431_linggih.jpg'),
(23,NULL,1,'Gamelan Gong Kebyar','<p>Gong Kebyar adalah sebuah barungan baru. Sesuai dengan nama yang diberikan kepada barungan ini (Kebyar yang bermakna cepat, tiba-tiba dan keras) gamelan ini menghasilkan musik-musik keras dan dinamis. Gamelan ini dipakai untuk mengiringi tari-tarian atau memainkan tabuh-tabuhan instrumental. Secara fisik Gong Kebyar adalah pengembangan kemudian dari Gong Gede dengan pengurangan peranan, atau pengurangan beberapa buah instrumennya. Misalnya saja peranan trompong dalam Gong Gebyar dikurangi, bahkan pada tabuh-tabuh tertentu tidak dipakai sama sekali, gangsa jongkoknya yang berbilah 5 dirubah menjadi gangsa gantung berbilah 9 atau 10 . cengceng kopyak yang terdiri dari 4 sampai 6 pasang dirubah menjadi 1 atau 2 set cengceng kecil. Kendang yang semula dimainkan dengan memakai panggul diganti dengan pukulan tangan.</p>\r\n<p>Secara konsep Gong Kebyar adalah perpaduan antara Gender Wayang, Gong Gede dan Pelegongan. Rasa-rasa musikal maupun pola pukulan instrumen Gong Kebyar ada kalanya terasa Gender Wayang yang lincah, Gong Gedeyang kokoh atau Pelegonganyang melodis. Pola Gagineman Gender Wayang, pola Gegambangan dan pukulan Kaklenyongan Gong Gede muncul dalam berbagai tabuh Gong Kebyar. Gamelan Gong Kebyar adalah produk kebudayaan Bali modern. Barungan ini diperkirakan muncul di Singaraja pada tahun 1915 (McPhee, 1966 : 328). Desa yang sebut-sebut sebagai asal pemunculan Gong Kebyar adalah Jagaraga (Buleleng) yang juga memulai tradisi Tari Kebyar. Ada juga informasi lain yang menyebutkan bahwa Gong Kebyar muncul pertama kali di desa Bungkulan (Buleleng). Perkembangan Gong Kebyar mencapai salah satu puncaknya pada tahun 1925 dengan datangnya seorang penari Jauk yang bernama I Mario dari Tabanan yang menciptakan sebuah tari Kebyar Duduk atau Kebyar Trompong.</p>\r\n<p>Gong Kebyar berlaras pelog lima nada dan kebanyakan instrumennya memiliki 10 sampai 12 nada, karena konstruksi instrumennya yang lebih ringan jika dibandingkandengan Gong Gede. Tabuh-tabuh Gong Kebyar lebih lincah dengan komposisi yang lebih bebas, hanya pada bagian-bagian tertentu saja hukum-hukum tabuh klasik masih dipergunakan, seperti Tabuh Pisan, Tabuh Dua, Tabuh Telu dan sebagainya.</p>\r\n<p>Lagu-lagunya seringkali merupakan penggarapan kembali terhadap bentuk-bentuk (repertoire) tabuh klasik dengan merubah komposisinya, melodi, tempo dan ornamentasi melodi. Matra tidak lagi selamanya ajeg, pola ritme ganjil muncul di beberapa bagian komposisi tabuh.</p>','ldPMifPbngc','1598353289_Gong Kebyar.jpg'),
(24,NULL,1,'Gamelan Baleganjur','<p>Baleganjur adalah salah satu ensamble gamelan Bali. Istilah ini berasal dari kata Bala dan Ganjur. Bala berarti pasukan atau barisan, Ganjur berarti berjalan. Balaganjur kemudian menjadi Baleganjur yaitu suatu pasukan atau barisan yang sedang berjalan, yang kini pengertiannya lebih berhubungan dengan sebuah barungan gamelan. Balaganjur adalah pengiring prosesi yang paling umum dikenal di Bali. Hampir dapat dipastikan bahwa setiap prosesi membawa sesajen ke pura, atau melasti (mensucikan pusaka / pratima), atau upacara ngaben akan diiringi oleh barungan yang sangat dinamis dan bersemangat.</p>','MRUj9eudLyA','1598353438_Baleganjur.jpg'),
(25,NULL,1,'Gamelan Geguntangan','<p>Gamelan Geguntangan&nbsp;adalah barungan baru yang juga disebut sebagai gamelan Arja&nbsp;atau&nbsp;Paarjaan. Gamelan ini adalah pengiring pertunjukan dramatari&nbsp;Arja&nbsp;yang diperkirakan muncul pada permulaan abad XX. Sesuai dengan bentuk&nbsp;Arja&nbsp;yang lebih mengutamakan tembang dan melodrama, maka diperlukan musik pengiring yang suaranya tidak terlalu keras, sehingga tidak sampai mengurangi keindahan lagu-lagu vokal yang dinyanyikan para penari. Melibatkan antara 10 sampai 12 orang penabuh, gamelan ini termasuk barungan kecil.</p>','AT-l6Kwthtk','1598353752_Geguntangan.jpg'),
(26,NULL,1,'Gamelan Gong Luang','<p>Gong Luwang adalah gamelan langka yang pada umumnya dipergunakan untuk mengiringi upacara kematian (ngaben). Gamelan yang berlaras pelog (tujuh nada) dan merupakan barungan madya ini, yang barungannya lebih kecil dari pada Gong Kebyar, termasuk salah satu jenis gamelan yang jarang dimainkan untuk mengiringi suatu pertunjukan tari atau drama. Kalaupun Gong Luwang dimainkan di atas pentas, seperti dalam pagelaran dramatari Calonarang, barungan ini hanya dipakai untuk mengiringi adegan memandikan mayat atau mandusin watangan.</p>\r\n<p>Ada 8 atau 9 macam instrumen yang membentuk barungan gamelan Gong Luwang dengan jumlah penabuh antara 16 (enam belas) sampai 20 (duapuluh) orang.</p>','jKi0vz-lsSQ','1598353883_Gong Luang.jpg'),
(27,NULL,1,'Gamelan Gender Wayang','<p>Gender Wayang adalah barungan alit yang merupakan gamelan Pewayangan (Wayang Kulit dan Wayang Wong) dengan instrumen pokoknya yang terdiri dari 4 tungguh gender berlaras slendro (lima nada). Keempat gender ini terdiri dari sepasang gender pemade (nada agak besar) dan sepasang kantilan (nada agak kecil). Keempat gender, masing-masing berbilah sepuluh (dua oktaf) yang dimainkan dengan mempergunakan 2 panggul. Gender wayang ini juga dipakai untuk mengiringi upacara Manusa Yadnya (potong gigi) dan upacara Pitra Yadnya (ngaben). Untuk kedua upacaranya ini, dan untuk mengiringi pertunjukan wayang lemah (tanpa kelir), hanya sepasang gender yang dipergunakan. Untuk mengiringi pertunjukan wayang kulit Ramayana, wayang wong Ramayana maupun Mahabharata (Parwa), 2 pasang gender ini dilengkapi dengan sepasang kendang kecil, sepasang cengceng kecil, sebuah kajar, klenang dan instrumen-instrumen lainnya, sehingga melahirkan sebuah barungan yang disebut gamelan Batel Gender Wayang.</p>','jRbiIY4-Ujg','1598354039_Gender Wayang.jpg'),
(29,NULL,1,'Gamelan Angklung','<p>Gamelan Angklung adalah gamelan berlaras slendro, tergolong barungan madya yang dibentuk oleh instrumen berbilah dan pencon dari krawang, kadang-kadang ditambah angklung bambu kocok (yang berukuran kecil). Dibentuk oleh alat-alat gamelan yang relatif kecil dan ringan (sehingga mudah dimainkan sambil berprosesi). Di Bali Selatan gamelan ini hanya mempergunakan 4 nada sedangkan di Bali Utara mempergunakan 5 nada.</p>\r\n<p>Satu barung gamelan angklung bisa berperan keduanya, karena seringkali mempergunakan alat-alat gamelan dan penabuh yang sama. Di kalangan masyarakat luas gamelan ini dikenal sebagai pengiring upacara-upacara Pitra Yadnya (ngaben). Di sekitar kota Denpasar dan beberapa tempat lainnya, penguburan mayat warga Tionghoa seringkali diiringi dengan Gamelan angklung. menggantikan fungsi gamelan Gong Gede yang dipakai untuk mengiringi upacara Dewa Yadnya (odalan) dan upacara lainnya.</p>','WXe_AK8wjgU','1598354495_angklung.jpg'),
(30,NULL,5,'Tabuh Jagul','<p>Tabuh jagul merupakan sebuah gending kekunoan karya Alm. Wayan Lotring yang biasanya dibawakan pada gambelan pelegongan. Gambelan pelegongan pada awalnya hanya berfungsi sebagai iringan Tari Legong namun berkat jasa&nbsp; Mpu Karawitan Wayan Lotring akhirnya lahirlah sebuah gending petegak ciptaan yang pertama bernama Tabuh Jagul. Dengan demikian Gambelan Pelegongan yang awalnya hanya berfungsi sebagai pengiring Tari Legong kini&nbsp; juga mempunyai ciri khas sendiri untuk fungsi lain seperti jenis barungan gambelan yang lainnya.&nbsp;</p>','ivflFnYUuA4','1598354768_note fix.png'),
(31,NULL,5,'Tabuh Buaya Mangap','<p>Tabuh Buaya Mangap merupakan jenis&nbsp; tabuh telu dalam gending-gending lelambatan kuno. Mengapa disebut tabuh telu karena ketika gending ini dimainkan terdapat sebuah pukulan kempur sebanyak tiga kali pada bagian pengawak dari gending tersebut sehingga gending ini digolongkan ke dalam jenis lelambatan tabuh telu. Sama seperti tabuh telu lainnya, tabuh ini biasanya difungsikan sebagai gending pembuka pada saat berlangsung upacara&nbsp; adat yang tergolong ke dalam Dewa Yadnya.</p>','h2jfJgPn70M','1598354993_note fix.png'),
(32,NULL,5,'Tabuh Baleganjur Pangastuti','<p>Barungan gambelan baleganjur berdasarkan garapannya dapat digolongkan menjadi baleganjur bebarongan, baleganjur lelambatan, dan baleganjur bebonangan. Tabuh Baleganjur Pengastuti tergolong ke dalam baleganjur bebonangan karena biasanya dalam membawakan gending ini terdapat instrument tambahan seperti terompong,jublag dan jegog.&nbsp;</p>','JMIQu8Lu7xo','1598355046_note fix.png'),
(33,NULL,5,'Tabuh Taman Penasar','<p>Tabuh Taman Penasar merupakan tipe lagu atau gending yang diimplementasikan ke barungan gambelan geguntangan. Tabuh Taman Penasar itu sendiri sangat erat kaitannya dengan tembang-tembang pengarjan, maka dari itu tabuh ini biasanya difungsikan ketika ingin menampilkan sebuah pertunjukkan Arja Negak.</p>','GGa6g7tkpW0','1598355122_note fix.png'),
(34,NULL,5,'Tabuh Gilak','<p>Gilak merupakan tabuh dasar&nbsp; dari yang biasanya dibawakan pada gambelan Gong Gede atau Gong Kebyar. Gilak biasanya difungsikan dalam suatu upacara adat yang tergolong ke dalam Dewa Yadnya misalnya saat upacara odalan terdapat prosesi Purwa Daksina, ketika itulah biasanya gending atau tabuh gilak ini dibawakan.</p>','zbJw6pxXGgM','1598355165_note fix.png'),
(35,NULL,5,'Tabuh Kayonan','<p>Tabuh Kayonan ini termasuk gending atau tabuh yang dibawakan oleh barungan gender wayang. Gender Wayang itu sendiri tidak lepas dengan sebuah pertunjukkan Wayang Lemah, pada saat sebelum seorang Dalang Memaparkan sebuah cerita pewayangan maka setelah Tabuh Pembuka wajiblah seorang dalang untuk memainka Wayang Kayonan terlebih dahulu, tabuh kayonan itu sendiri memiliki fungsi untuk mengiringi wayang kayonan.</p>','daZCbE-fDAM','1598355219_note fix.png'),
(36,NULL,5,'Tabuh Bapang Selisir','<p>Tabuh Bapang Selisir merupakan sebuah rekontruksi dari Gambelan Pegambuhan, yang saat ini dijadikan sebagai tabuh atau gending pembukaan dan dibawakan dengan gambelan semara pegulingan atau pelegongan.</p>','y4FCq8EshgE','1598355271_note fix.png'),
(37,NULL,5,'Tabuh Sekar Gadung','<p>Tabuh Sekar Gadung tergolong ke dalam jenis Tabuh Telu dalam tipe gending-gending lelambatan. Sama seperti Tabuh Telu Buaya Mangap, tabuh sekar gadung juga berfungsi sebagai tabuh pembukaan.</p>','bNmKjxr-f-Q','1598355393_note fix.png'),
(38,NULL,5,'Tabuh Sinom Ladrang','<p>Sama dengan Tabuh Bapang Selisir, tabuh ini merupakan hasil dari rekontruksi gambelan pegambuhan yang kemudian dibawakan dengan gambelan semara peguligan dengan fungsi&nbsp; sebagai tabuh pembuka.</p>','Nm9ooUX2EZ0','1598355456_note fix.png'),
(39,NULL,5,'Tabuh Ririg Gede','<p>Ririg Gede tergolong ke dalam tipe tabuh Sekatian. Sekatian itu sendiri merupakan gaya tabuh lelambatan khas Bali Utara yang biasanya gending-gending sekatian ini dibawakan dengan gambelan gong kebyar style Bali Utara.</p>','lQJ_K53MJHU','1598355510_note fix.png'),
(40,NULL,5,'Tabuh Lasem','<p>Tabuh Lasem yaitu sebuah tabuh pelegongan yang biasanya berfungsi untuk mengiringi Tari Legong Keraton. Namun biasanya seperti beberapa daerah di Denpasar tabuh ini juga dapat dialih fungsikan sebagai pelengkap pada saat upacara piodalan.</p>','aeAxXWx1Omk','1598355560_note fix.png'),
(41,NULL,5,'Tabuh Ririg Cenik','<p>Ririg Cenik merupakan tipe tabuh&nbsp; yang sama persis dengan Ririg Gede yaitu tergolong ke dalam tipe gending sekatian yang merupakan ciri khas Bali Utara, yang membedakan Ririg Gede dan Ririg Cenik yaitu melodi gending itu sendiri.</p>','NfJ_zsEUvoo','1598355651_note fix.png'),
(42,NULL,5,'Tabuh Kicang Kicung','<p>Tabuh Kicang Kicung tergolong ke dalam jenis tabuh agung biasanya dibawakan dengan gambelan gong gede atau gong kebyar dan difungsikan sebagai pendukung prosesi pada saat menggelar upacara Piodalan.</p>','Lh2Ww4tt-tk','1598355801_note fix.png'),
(43,NULL,5,'Tabuh Alas Arum','<p>Tabuh Alas Arum merupakan tabuh yang biasanya dibawakan dengan gambelan semara pegulingan. Fungsi tabuh ini biasanya sebagai pembuka atau penutup ketika upacara sudah selesai.</p>','RoGLJ6yWQ3o','1598355846_note fix.png'),
(44,NULL,5,'Tabuh Jaran Sirig','<p>Tabuh Jaran Sirig tergolong ke dalam Tabuh Petopengan karena tabuh inilah yang biasanya difungsikan untuk mengiringi Tari Topeng Arsa Wijaya yang biasanya dipertunjukkan pada saat menggelar Upacara Wali.</p>','fCeadQEnav0','1598355895_note fix.png'),
(45,NULL,5,'Tabuh Gilak Sasak','<p>Gilak Sasak tergolong ke dalam jenis tabuh gilak yang menjadi dasar-dasar gending, yang dibawakan oleh instrument Gambelan Gong Gede ataau Gong Kebyar.</p>','i78h2vuPfEo','1598355943_note fix.png'),
(46,NULL,5,'Tabuh Pependetan','<p>Tabuh Pependetan sesuai dengan namanya yaitu tabuh yang berfungsi untuk mengiringi Tarian Pendet. Namun tabuh pependetan yang biasanya dibawakan di Pura tertentu jelas berbeda dengan Tari Pendet yang dipentaskan di panggung.</p>','h9A-3PuojDQ','1598355984_note fix.png'),
(47,NULL,5,'Tabuh Mangun Anyar','<p>Tabuh Mangun Anyar tergolong ke dalam tabuh pisan. Sama seperti tabuh telu namun yang membedakan disini yaitu pukulan kempur yang hanya dipukul sekali pada bagian pengawak gending. Itu yang menjadi dasar dalam sebuah garapan gending-gending lelambatan dan mengapa tabuh ini disebut Tabuh Pisan jawabannya yaitu terletak pada pukulan kempur pada bagian pengawak.</p>','HecT09HqYok','1598356025_note fix.png'),
(48,NULL,5,'Tabuh Sekar Gendot','<p>Tabuh Sekar Gendot juga merupakan hasil karya I wayan Lotring yang berfungsi sebagai tabuh pembukaan pada gambelan semara pegulingan atau gambelan pelegongan.</p>','hPLwN3xYwBY','1598356066_note fix.png'),
(49,NULL,5,'Tabuh Penganteb Sekar','<p>Tabuh Penganteb Sekar merupakan sebuah tipe gending yang tergolong ke dalam tipe gending sekatian yang membedakan yaitu biasanya Tabuh Penganteb Sekar&nbsp; dibawakan pada saat prosesi Memendak dalam rentetan Upacara Piodalan.</p>','DZPyGs4Pne0','1598356229_note fix.png'),
(50,NULL,5,'Tabuh Gilak Pengider-ider','<p>Sama seperti Tabuh Gilak lainnya, Tabuh Gilak Pengider&ndash;ider tergolong ke dalam jenis tabuh gilak yang dibawakan dengan Gambelan Gong Kebyar atau Gong Gede yang dibawakan ketika prosesi Ngider Bhuwana</p>','zbJw6pxXGgM','1598356352_note fix.png'),
(51,NULL,5,'Tabuh Gilak Pekaad','<p>Tabuh Gilak Pekaad dalam teknik garapan juga merupakan tippe gending atau tabuh yang sama dengan tabuh gilak yang lainnya namun yang membedakan yaitu&nbsp; khusus Tabuh Gilak Pekaad ini dibawaka ketika suatu Upacara Agama telah selesai berlangsung.</p>','30h_6kHAGnA','1598356431_note fix.png'),
(52,NULL,5,'Tabuh Sinom','<p>Tabuh Sinom ini biasanya digunakan untuk mengiringi Geguntangan yang sedang berlangsung dalam suatu prosesi upacara.</p>','mBIeuNt-VrY','1598356671_note fix.png'),
(53,NULL,5,'Tabuh Tut Baru','<p>Tabuh Tut Baru, merupakan tabuh kreasi lama yang biasanya digunakan untuk mengiringi Tari Baris pada suatu prosesi upacara.</p>','xMgtTGGDUYU','1598356811_note fix.png'),
(54,NULL,5,'Tabuh Nila Pati','<p>Tabuh Nila Pati, merupakan tabuh yang dimainkan oleh Gamelan Gong Luang. Tabuh ini sakral, biasanya digunakan dalam mengiringi Tari Baris serta prosesi besar seperti Mapurwa Daksina.</p>','OLbn7fG6fsI','1598356987_note fix.png'),
(55,NULL,5,'Tabuh Tari Baris','<p>Tabuh Tari Baris merupakan tabuh khusus yang digunakan untuk mengiringi Tari Baris. Tabuh ini biasanya dimainkan pada Gamelan Gong Kebyar.</p>','f5AUgUX7GIE','1598357362_note fix.png'),
(56,NULL,5,'Tabuh Sekatian','<p>Tabuh Sekatian biasanya dimainkan saat piodalan (upacara perayaan) pura atau upacara Dewa Yadnya.</p>','eaE-5kMDlfI','1598357681_note fix.png'),
(57,NULL,3,'Nyurat Nama','<p>Nyurat Nama merupakan prosesi ngelinggihang Sang Hyang Pitara dari tapakan menuju linggih puspa, kemudian kalinggihang di bale payajnan. Setiap puspa berisi nama orang yang diupacarai. Saat upacara nyurat nama, roh masing-masing nama yang tertera di puspa akan dipanggil melalui upacara yang dipimpin oleh pandita.</p>','Y8qwdfqi5iA','1598359199_Nyurat nama.jpg'),
(58,1,3,'Ngiring Pretima ke Beji','<p>Merupakan proses membersihkan Pretima, dimana bertujuan untuk tempat berstana/melinggih dari Ida Bhatara nantinya.</p>','QL5Qiz5zvgY','1598453101_beji.jpg'),
(88,NULL,2,'Tari A','<p>Tari A adalah Tari A</p>','9lVPAWLWtWc','1600849832_beji.jpg'),
(105,NULL,5,'Tabuh Gilak Luhur Agung','<p>Merupakan tabuh yang dimiliki oleh Gamelan Gong Luang. Tabuh ini biasa digunakan pada prosesi seperti memendak. Tabuh ini memiliki alunan yang megah.</p>','P9tDwYVHeLo','1602846693_note fix.png'),
(106,NULL,5,'Tabuh Gilak Penyuud','<p>Tabuh Gilak Penyuud merupakan tabuh yang digunakan untuk prosesi upacara yang terletak di akhir. Tabuh Gilak ini memiliki alunan yang cepat dan teratur.</p>','AlCSmiIWI7Y','1602846912_note fix.png'),
(107,2,NULL,'Ngaben','<p>Ngaben merupakan upacara kremasi atau pembakaran&nbsp;jenazah bagi umat Hindu utamanya di Bali. Upacara&nbsp;adat Ngaben merupakan sebuah ritual yang dilakukan&nbsp;untuk mengirim jenazah pada kehidupan mendatang.</p>','Rc6E3d6gMBE','1602857107_dde803af68fbdfdcf9c66c30ba93c66a.jpg'),
(108,NULL,3,'Ngening','<p>Ngening merupakan prosesi awal dari Upacara Ngaben.&nbsp;Ngening bertujuan untuk meminta (nunas) Tirta Ening di mata air terdekat.&nbsp;Tirta Ening ini digunakan untuk membersihkan&nbsp;Atma sebelum nantinya akan diminta (nunas) Atma di Pura Dalem.</p>','GiA38D-adA4','1602858930_ngening.jpg'),
(109,NULL,3,'Melaspas Joli/Bade','<p>Melaspas Joli/Bade merupakan prosesi awal, dimana kata Melaspas&nbsp;asal kata dari &ldquo;paspas&rdquo; artinya membersihkan atau membuang&nbsp;yang tidak perlu, disini dimaksudkan bahwa Joli/Bade yang&nbsp;digunakan dalam prosesi Ngaben nantinya agar aman dan kuat&nbsp;selama upacara berlangsung.</p>','Td81jYCmJj0','1602859115_melaspas bade.jpg'),
(110,NULL,3,'Nunas Atma','<p>Nunas Atma merupakan prosesi awal&nbsp;sebelum masuk ke prosesi utama dari&nbsp;Upacara Ngaben. Nunas Atma merupakan prosesi&nbsp;meminta Atma di Pura Dalem, agar Atma yang dilakukan&nbsp;upacara Ngaben ini bereinkarnasi atau mencapai Moksa dalam Hindu.</p>','UD1c8OrMzBk','1602859270_nunas atma.jpg'),
(111,NULL,3,'Pralina','<p>Pralina merupakan prosesi puncak dimana&nbsp;prosesi ini bertujuan untuk mengembalikan badan kasar&nbsp;kembali ke Panca Maha Bhuta (dari tanah kembali ke tanah,&nbsp;dari angin kembali ke angin, dari air kembali ke air).</p>','V6ilIl4Nz-Q','1602859956_pralina2.jpg'),
(112,NULL,3,'Nguyeg','<p>Prosesi ini merupakan prosesi puncak setelah&nbsp;proses Pengabenan selesai. Prosesi ini bertujuan untuk&nbsp;membersihkan dan menghaluskan abu dari prosesi Pengabenan. Nantinya abu akan disimpan di dalam Kelapa Bungkak (Bungkak Nyuh Gading)&nbsp;sebelum nantinya di Pralina.</p>','6onfgySf14k','1602859766_Nguyeg.jpg'),
(113,NULL,3,'Pengabenan/Ngeseng Sawa','<p>Pengabenan/Ngeseng Sawa merupakan prosesi&nbsp;puncak dimana jenazah dibakar hingga menjadi abu.</p>','XRSptmbzHnc','1602859894_pralina.jpg'),
(114,NULL,3,'Memargi ke Setra/Pakiriman Ngutang','<p>Memargi ke Setra atau Pakiriman Ngutang merupakan prosesi upacara membawa jenazah dengan Joli atau Bade&nbsp;menuju Setra atau kuburan untuk dilakukan prosesi Pengabenan.</p>','HWKl4L2o6AM','1602860187_ke setra.jpg'),
(115,NULL,3,'Nyiramang Layon','<p>Nyiramang Layon merupakan prosesi puncak dari Ngaben, dimana prosesi ini merupakan prosesi memandikan jenazah sebelum dilakukan Pengabenan nantinya.</p>','QrjTsgD-8t0','1602860848_nyiram.jpg'),
(116,NULL,3,'Ngulapin','<p>Upacara untuk memanggil Sang Atma. Upacara ini juga dilaksanakan apabila&nbsp;yang bersangkutan meninggal luar rumah yang bersangkutan&nbsp;(misalnya di Rumah Sakit, dll). Upacara ini dapat berbeda-beda tergantung&nbsp;tata cara dan tradisi setempat, ada yang melaksanakan di perempatan jalan, pertigaan jalan, dan kuburan setempat.</p>','R6niN8TR8Ik','1602861277_ngulapin.jpg'),
(117,NULL,3,'Ngajum Kajang','<p>Kajang adalah selembar kertas putih yang ditulisi dengan aksara-aksara&nbsp;magis oleh pemangku, pendeta atau tetua adat setempat. Setelah selesai&nbsp;ditulis maka para kerabat dan keturunan dari yang bersangkutan akan&nbsp;melaksanakan upacara ngajum kajang dengan cara menekan kajang itu&nbsp;sebanyak 3x, sebagai simbol kemantapan hati para kerabat melepas&nbsp;kepergian mendiang dan menyatukan hati para kerabat sehingga mendiang&nbsp;dapat dengan cepat melakukan perjalanannya ke alam selanjutnya.</p>','rjthLxeJK8c','1602861481_ngajum.jpg'),
(118,NULL,3,'Mameras','<p>Mameras berasal dari kata peras yang artinya berhasil, sukses,&nbsp;atau selesai. Upacara ini dilaksanakan apabila mendiang sudah memiliki&nbsp;cucu, karena menurut keyakinan cucu tersebutlah yang akan menuntun&nbsp;jalannya mendiang melalui doa dan karma baik yang mereka lakukan.</p>','HNNB4oW-Zi0','1602861834_mameras.jpg'),
(119,NULL,3,'Makelud','<p>Makelud biasanya dilaksanakan 12 hari setelah upacara pembakaran&nbsp;jenazah. Makna upacara makelud ini adalah membersihkan dan menyucikan&nbsp;kembali lingkungan keluarga akibat kesedihan yang melanda keluarga yang ditinggalkan. Filosofis 12 hari kesedihan ini diambil dari Wiracarita Mahabharata, saat Sang Pandawa mengalami masa hukuman 12 tahun di tengah&nbsp;hutan.</p>','qtOw086PIBs','1602862237_makelud.jpeg');

/*Table structure for table `tb_status` */

DROP TABLE IF EXISTS `tb_status`;

CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_status` */

insert  into `tb_status`(`id_status`,`nama_status`) values 
(1,'Awal'),
(2,'Puncak'),
(3,'Akhir');

/*Table structure for table `tb_tag` */

DROP TABLE IF EXISTS `tb_tag`;

CREATE TABLE `tb_tag` (
  `id_tag` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tag` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tb_tag` */

insert  into `tb_tag`(`id_tag`,`nama_tag`,`deskripsi`,`gambar`) values 
(1,'Gamelan Bali','Gamelan Bali',NULL),
(2,'Tari Bali','Tari Bali',NULL),
(3,'Prosesi Upacara','Prosesi Upacara',NULL),
(4,'Kidung','Kidung',NULL),
(5,'Tabuh','Tabuh',NULL),
(6,'Mantram','Mantram',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `m__users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id_user`,`email`,`password`,`name`,`remember_token`,`created_at`,`updated_at`) values 
(1,'tes@gmail.com','123456','Tes123',NULL,NULL,'2020-04-16 11:01:27'),
(2,'lonte@gmail.com','123456','Made Lonte 2',NULL,'2020-04-13 13:43:11','2020-04-13 13:43:11'),
(4,'atta@gmail.com','123456','Atta Halilintar 2',NULL,'2020-04-13 13:47:06','2020-04-16 11:01:10');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
