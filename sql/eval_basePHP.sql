-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author` (`author`),
  CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `article` (`id`, `title`, `content`, `image`, `author`) VALUES
(1,	'un tigre s’effondre et convulse en pleine représentation',	'Un tigre a été victime d’un malaise après avoir sauté dans des cerceaux enflammés lors d’une représentation du cirque d’Arthur et Karina Bagdasarov, à Magnitogorsk en Russie (23/09/2018). Les images de ce terrible incident sont choquantes et démontrent une fois de plus que les animaux sauvages ne sont absolument pas à leur place dans ces spectacles.',	'5beed1973c06f-le-tigre-a-ete-neutralise-par-le-personnel-du-cirque-d-ou-il-s-etait-echappe.jpg',	33),
(5,	'Trois tigres retrouvent la libert&eacute;',	'Un ami russophile m\'a envoy&eacute; la nouvelle de cette lib&eacute;ration de trois tigres, deux m&acirc;les et une femelle pr&eacute;alablement &eacute;duqu&eacute;s &agrave; la pr&eacute;dation d\'animaux vivants car ils ont &eacute;t&eacute; recueillis petits suite &agrave; l\'abattage de leurs m&egrave;res par des braconniers. Ils sont &eacute;quip&eacute;s d\'un collier &eacute;quip&eacute; d\'une puce qui permet de les localiser par satellite.',	'5beedb06ad598-inside_tiger_2.jpg',	1),
(13,	'je suis bout du rouleau',	'j\'en peu plus de ce dm ',	'5bf089e137a43-le-tigre-a-ete-neutralise-par-le-personnel-du-cirque-d-ou-il-s-etait-echappe.jpg',	35),
(14,	'je vais mourirrrrrr',	'une corde svp ? ',	'5bf08c6e49df4-alimentacion_tigre.jpg',	1),
(15,	'c\'est jolie les tigres',	'oui j\'aime beaucoup et non ce n\'est pas un monologue je deraille ',	'5bf08c882bee3-1028430040.jpg',	1),
(16,	'je fais que des conneries',	'met une bonne notes stp',	'5bf092c01a4ed-TIGRE-BLANC-SOUS-L-EAU-4.jpg',	36),
(17,	'Bonjour',	'bonsoir',	'5bf092c9ea756-1028430040.jpg',	36),
(18,	'AQSZ',	'ZEKDD??DF JJJJ',	'5bf092d76a47d-alimentacion_tigre.jpg',	36),
(19,	'EEEEEE',	'ezfklneslkfself&ugrave;l=od,zmzodjeflkmfrguylfhujidkoslqm&ugrave;`',	'5bf092e33c10d-alimentacion_tigre.jpg',	36),
(20,	'eeeee',	'eeeeeeefffffssssss',	'5bf092ef10c3c-le-tigre-a-ete-neutralise-par-le-personnel-du-cirque-d-ou-il-s-etait-echappe.jpg',	36);

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `article` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article` (`article`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`article`) REFERENCES `article` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_username_uindex` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1,	'Ilies',	'$2y$12$tmlcTHxsNen/.1oxcA0gWu9qRUVoVySu4sR9kvYjDdWVjBSiYSe9G'),
(5,	'Iliess',	'$2y$12$/CkxRrl8cRpFL8ovCV01D.wFL7Lhmx/Cf9EbSLhVTWhTQ0ViPCBmy'),
(6,	'Iliesss',	'$2y$12$MNzgmI2ZaVWNoe0mj3hIx.a4T2KBFEovUqq.jno1omI8ibKcMnRyK'),
(7,	'jetestencoe',	'$2y$12$Tshmn/N1Eov20S46MnbHPusHElXs/HybUOgCcWSb12ZCFVnHSLDNC'),
(8,	'azsq',	'$2y$12$hmDmEXrPPla3qQYSksk1vuu.bUZ1P3OyLpXwI7Zfo.G.rRJf4mfh2'),
(9,	'blabla',	'$2y$12$D0i4x0GX6fYjwVEKdyzBZeIvXYOv6qVrGuEm1lYhRzLVL9BR06vB2'),
(10,	'test',	'$2y$12$Y9Z0lT3Xooc.injt6AJEsuGdQ5stoSI1cQ5hwrHRrhFpWDIo1w1gO'),
(11,	'aa',	'$2y$12$PcvW7I4KftVX7oDsRcn6kO9tZ14tVJaxEMMJrrpM5aHqftKktf6aG'),
(12,	'q',	'$2y$12$S/AmtLQcklajY9hevsFcXenvHxz02Gmd5XhYeNEcgDtCmv9zto/32'),
(13,	'zzz',	'$2y$12$RvmwMiEb6kq3XJfOyrCd2Oq0w7DOAaMl.VZXCqy0WaQT1BG3ei/bK'),
(14,	'qq',	'$2y$12$soLV9Lw2H5quX5rQPcBB/eYu/wZj5w/h3zOW4Vr0kfGTEiGTfS7p.'),
(15,	'er',	'$2y$12$GG8yb5VpVf/Hr4/hJRuiDOYF5Uik047n9JKnYYpcrixedEgtO3cPy'),
(16,	'aaaaa',	'$2y$12$jVl6StoaD6w2LsDb.SvMcelSk86jL8npIWBizFSda2hiIlPqVDtwe'),
(17,	'aaaaaaa',	'$2y$12$gpaxVgZ6/AlGa8Xcionp3OMGIIoy091a79sQl0In70vJvQFsVUKqq'),
(18,	'azsqd',	'$2y$12$ZBagUIm0yPcVmnhogevpreWy/3f8nRTao4SJdpx.TlAz8XC8s.rXe'),
(19,	'aqw',	'$2y$12$QDNcuYY8q5zYSOG.negZG.8cB38EiMpK57cqrfhkOxQEXmISBKB.e'),
(20,	'azed',	'$2y$12$QMxBNbJ7ynbct5ftc5uQa..P47kZRRnqLo7c9jMEMH6tYtSnbPcFC'),
(21,	'azsqq',	'$2y$12$y1KUSemctw9J1mEkR8orHusDeBqi/UqP7/mltuF5F3TYdKGszR51u'),
(22,	'aaaaaaaaaa',	'$2y$12$fBtOfIKvWIhWGLRWjDw1V.EeVV9Mr2raiciOZncXL.p5Swat4f1xm'),
(23,	'jerem',	'$2y$12$PU7NfMa0TT/pgglA/ealG.mVn7BXc8E.0BzPBzHxS2n/by8JMSIGq'),
(24,	'aaqs',	'$2y$12$UUwalcqa2oueVwTGUvCZO.qhadNSs8xlVgbIm57IHY8o4oLzuTTtG'),
(25,	'azssssssss',	'$2y$12$PDTL5PiylGLXzkwRzA3zG.nlFQZmizq5vhKeUedWkJ5a4feoS6inu'),
(26,	'aaazsdsd',	'$2y$12$GQuKZAt4MHiZ72eLmRiBielosMdsvbUbG0STnUw9IpeFeb1aBkeMC'),
(27,	'aqwxsz',	'$2y$12$PCrQAwveVSKC/N8AkMLxo.cxJgf4SHVHcpr4z98ynTTLnC7vBp2gK'),
(28,	'qqq',	'$2y$12$w4dfC6c6zlLwumOg9xeFd.ITpf7DBXhsPit3RnlOqZ0fqLqZEvgby'),
(29,	'aaaaaaaass',	'$2y$12$QPN54Ffku5a9mklj19eQqu7MT1TDy4t.rHQPfnghf8e55j6pbhlVW'),
(30,	'Ilies94',	'$2y$12$YDaRmZkL6wKLkkr3NE0uz.0nx//fZEiNQ4avjjPonRYaCgN.ddtwm'),
(31,	'uiokj',	'$2y$12$yE1U4YEq3l/E5AGthCg4NeMc8gXTpOzCRcZ1/N4NSpoqch53byrxG'),
(32,	'rs',	'$2y$12$D.V0NSUq5fITBdG78z5htO4kfXamDDgCYj23n9ZXg8jZSKSBjHj1e'),
(33,	'w',	'$2y$12$Dvy7GfDPaCpF3bYYPIZiwOv6JPoNgwFkqtRv8gXe/SY59yB3XGU2i'),
(34,	'&lt;script&gt;alert(\'toto\')&lt;/script&gt;',	'$2y$12$eq5yWoSar86wuWwRcp00deVFEbYmrCQsX5HKaKhkLfmEXqxRtpl4O'),
(35,	'Anonyme',	'$2y$12$aKesO6RfOx2.SRsRJ.9H/.elEsLniaNnEGEuXQHGO9TpTVRVgbAo.'),
(36,	'wze',	'$2y$12$cJzF5XojDLUgzYkJ5NT.PORqN7J0KI9mdVCreKj0EVjCsgSDwABem');

-- 2018-11-17 23:02:51
