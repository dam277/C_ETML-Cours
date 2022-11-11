-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 12 Décembre 2018 à 13:08
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_news`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_article`
--

CREATE TABLE `t_article` (
  `idArticle` int(11) NOT NULL,
  `artTitle` varchar(255) NOT NULL,
  `artText` text NOT NULL,
  `artImage` varchar(255) NOT NULL,
  `artSource` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_article`
--

INSERT INTO `t_article` (`idArticle`, `artTitle`, `artText`, `artImage`, `artSource`) VALUES
(2, 'Que serait Noël sans amour? Ce petit hérisson nous apprend à aimer et à surmonter les inégalités - VIDEO', '<p>Une publicité devenue virale pour apprendre à aimer et à vaincre les différences. C’est l\'idée eue par Erste Bank und Sparkasse, un groupe bancaire autrichien, qui avec sa campagne publicitaire a ravivé l\'esprit de Nöel de millions d\'internautes.\r\n</p>\r\n<p>\r\nLe personnage principal de la publicité, qui a connu un grand succès sur les réseaux sociaux du monde entier, est un hérisson que ses camarades de classe évitent en raison de ses caractéristiques physiques. L\'histoire, après une série de déceptions, réserve une surprise et vise à transmettre des messages de tolérance et d\'acceptation mutuelle.\r\n</p>  ', 'hedgehog-468228_1920.jpg', 'https://www.corsenetinfos.corsica/Que-serait-Noel-sans-amour-Ce-petit-herisson-nous-apprend-a-aimer-et-a-surmonter-les-inegalites-VIDEO_a37044.html'),
(4, 'Les singes noirs du Costa Rica deviennent jaunes, et la cause présumée est amèrement triste', '<p>Comme vous vous en doutiez très certainement en lisant le titre de cet article, les singes noirs du Costa Rica sont censés être… noirs, à l’exception de quelques poils orangés vers le bas du dos.\r\n</p>\r\n<p>\r\nEn effet, le singe hurleur à manteau (Alouatta palliata) est principalement recouvert d’une fourrure noire. Il en va de même pour tous les singes hurleurs noirs des forêts d’Amérique centrale, et du nord de l’Amérique du Sud.\r\n</p>\r\n<p>\r\nCependant, au Costa Rica, il se passe quelque chose d’étrange : au cours de ces cinq dernières années, les singes hurleurs de cette région ont commencé à changer de couleur, en passant du noir au jaune… Au début, il ne s’agissait que d’une ou deux taches jaunes crème sur les membres et la queue, et cela ne concernait que quelques individus seulement.\r\n</p>\r\n<p>\r\nMais au fil du temps, ces cas se sont multipliés. À présent, les scientifiques ont signalé au moins 21 singes hurleurs ayant une fourrure jaune, et vivant à l’état sauvage le long de la côte du Costa Rica.\r\n</p>\r\n<p>\r\nLes taches de fourrure jaune semblent augmenter non seulement en nombre, mais aussi en taille. Chez certains singes, la pigmentation jaunâtre surpasse même le volume de fourrure noire. Les scientifiques ont signalé au moins deux singes sauvages entièrement recouverts de fourrure jaune, sans plus aucune coloration noire. Bien entendu, ces changements rapides ont dérouté les scientifiques, qui ont mené des inspections minutieuses des fourrures de ces animaux, et suggèrent que les pesticides pourraient en être la cause.\r\n</p>\r\n<p>\r\nEn effet, en analysant la fourrure de ces anomalies costariciennes, les chercheurs ont découvert une différence dans le type de mélanine produite. À savoir que la mélanine est le pigment qui colore les cheveux et la peau. Différentes formes de mélanine permettent de créer une variété de couleurs : chez la plupart des singes hurleurs à manteau noir, c’est un pigment appelé eumélanine qui règne, produisant une fourrure noire, grise ou brun foncée.\r\n</p>\r\n<p>\r\nMais depuis un moment, chez certains singes hurleurs, l’eumélanine s’est littéralement transformée en phéomélanine, qui produit des tons jaune, rouge ou orange. « Ces observations représentent des cas de pigmentation totalement anormaux, ceux-ci n’ayant jamais été signalés auparavant chez des animaux en captivité, ou dans la nature. De plus, nous ne sommes pas au courant de quelconques changements similaires dans la pigmentation d’autres primates ou d’autres groupes de mammifères à travers le monde », concluent les auteurs.\r\n</p>\r\n<p>\r\nIl s’agit donc de la première fois que des scientifiques constatent un changement aussi rapide et radical dans la pigmentation de la fourrure des primates, ou de tout autre mammifère.\r\n</p>\r\n<p>\r\nSelon les chercheurs, bien que les raisons pour lesquelles ces pigments changent de cette manière ne sont toujours pas parfaitement clairs, les pesticides en sont très probablement les principaux responsables.\r\n</p>\r\n<p>\r\nEn effet, il s’avère que le pigment responsable des fourrures jaunes des singes contient du soufre, et que ce dernier constitue également la base de la plupart des pesticides utilisés à travers le monde. De ce fait, les chercheurs supposent que, comme ces singes du Costa Rica sont davantage exposés à des pesticides, l’abondance de soufre corrompt le pigment de leur fourrure, modifiant ainsi la structure de la mélanine et, par conséquent, leur couleur générale.\r\n</p>\r\n<p>\r\nDe plus, au Costa Rica, les exploitations d’ananas, de bananes et d’huile de palme ont récemment commencé à utiliser un plus grand nombre de pesticides contenant du soufre. En effet, le Costa Rica est l’un des pays qui utilise le plus de pesticides au monde, avec une moyenne de plus de 25 kilogrammes appliqués par hectare de terre cultivée.\r\n</p>\r\n<p>\r\nLes singes hurleurs à manteau noir pourraient donc bien être les victimes de ces produits chimiques. Au Costa Rica, ces singes se nourrissent principalement de feuilles d’arbres entourant ces types d’exploitations. De ce fait, ils consomment probablement une quantité importante de pesticides, ce qui pourrait avoir comme conséquence d’influencer la mélanine, et par conséquent, la couleur de leur fourrure.\r\n</p>\r\n<p>\r\nBien entendu, pour l’instant, il ne s’agit que de spéculations des chercheurs. Il faudra encore approfondir les recherches afin de déterminer la cause exacte de ce changement de pigmentation. De plus, il est crucial pour la survie de ces singes de comprendre ce qui se passe réellement, car ce changement de couleur de fourrure pourrait les rendre également plus vulnérables aux attaques des jaguars et des autres prédateurs.\r\nSource : Mammalian Biology\r\n</p>', 'monkey-1197100_1920.jpg', 'https://trustmyscience.com/changement-fourrure-singes-noirs-costa-rica-deviennent-jaunes/'),
(6, 'Voici les noms de chien les plus populaires au Canada en 2018', '<p>Un des moments les plus attendus au Sac de chips chaque année est la publication de la liste des noms de bébés les plus populaires émise par le gouvernement du Québec.\r\n</p>\r\n<p>\r\n Ce n’est malheureusement pas ce magnifique moment de l’année, mais.... \r\n</p>\r\n<p>\r\nPour la première fois, le site Rover.com a publié une liste des noms de chiens les plus populaires des douze derniers mois. \r\n</p>\r\n<p>\r\n Sans plus tarder, voici ce fameux palmarès présenté en ordre décroissant de popularité.  \r\n</p>\r\n<p>\r\n<strong>Chiens mâles</strong>\r\n<ul>\r\n<li>10. Rocky</li>\r\n<li>9. Leo</li>\r\n<li>8. Winston</li>\r\n<li>7. Jack</li>\r\n<li>6. Tucker</li>\r\n<li>5. Buddy</li>\r\n<li>4. Milo</li>\r\n<li>3. Cooper</li>\r\n<li>2. Max</li>\r\n<li>1. Charlie</li>\r\n</ul>\r\n</p>\r\n<p>\r\n<strong>Chiennes femelles</strong>\r\n<ul>\r\n<li>10. Maggie</li>\r\n<li>9. Sadie</li>\r\n<li>8. Bailey</li>\r\n<li>7. Stella</li>\r\n<li>6. Lola</li>\r\n<li>5. Molly</li>\r\n<li>4. Lucy</li>\r\n<li>3. Daisy</li>\r\n<li>2. Luna</li>\r\n<li>1. Bella</li>\r\n</ul>\r\n</p>', 'dog-216282_1920.jpg', 'https://www.journaldemontreal.com/2018/12/11/voici-les-noms-de-chien-les-plus-populaire-en-2018'),
(7, 'Et voici (enfin) la première bande-annonce du film «Le Roi Lion»', '<p>S\'il y a bien un dessin animé qui a marqué des générations d\'enfants, c\'est bien «Le Roi Lion»! Et Disney va nous proposer de ressortir les mouchoirs en nous proposant une adaptation en film de son histoire culte sortie en 1994, avec un casting cinq étoiles: Donald Glover dans le rôle de Simba, Beyoncé dans celui de Nala ou John Oliver, dans celui de Zazu.\r\n</p>\r\n<p>\r\nEt le premier teaser dévoilé ce vendredi donne des indices intéressants sur la qualité du projet. On remarque que le film respecte scrupuleusement les scènes de l\'original, dans un mimétisme saisissant.\r\n</p>\r\n<p>\r\nAprès «La Belle et la Bête», «Cendrillon», «Maléfique», «Le Livre de la jungle» et «Alice au Pays des Merveilles», «Le Roi Lion» va s’inscrire dès l’année prochaine dans la stratégie de transformation des dessins animés en films live.\r\n</p>\r\n<p>\r\nRendez-vous le 17 juillet 2019 pour découvrir ce film d\'animation qui promet beaucoup. (Le Matin)\r\n</p>', 'lion-565820_1920.jpg', 'https://www.lematin.ch/loisirs/cinema/enfin-premiere-bandeannonce-film-roi-lion/story/30673560'),
(8, '"Game of Thrones" a été inventé grâce à des tortues', '<p>\r\nDans une interview télévisée donnée le 21 novembre à Stephen Colbert, Geroge RR Martin a encore surpris tout le monde. Au menu des révélations du créateur de "Game of Thrones", la sortie de son livre "Fire and Blood", son processus d\'écriture pour "The Wins of Winter", et surtout... l\'éclosion de sa vocation pour écrire grâce à un animal assez inattendu: la tortue.\r\n</p>\r\n<p>\r\nGeroge RR Martin était initialement invité sur le plateau du Late Show pour parler de son nouveau livre "Fire and Blood", un prequel de l\'univers de "Games of Thrones" sorti le 21 novembre dernier en France, dans lequel il relate sous forme de chroniques -du point de vue de "mestres" (érudits)- les épisodes les plus marquants de la dynastie Targaryen depuis la conquête de Westeros, 300 ans avant la saga originale.\r\n</p>\r\n<p>\r\n"Mais il fait 700 pages!" s\'étonne Stephen Colbert dans l\'interview. Ce à quoi l\'écrivain de 70 ans répond en riant que ce n\'est qu\'une première partie. L\'animateur lui rappelle alors ébahi qu\'il a d\'autres livres à écrire: "Ne devriez-vous pas finir \'The Winds of Winter\' pendant ce temps?\' [...] Vous venez de faire un \'crochet\' de 700 pages!".\r\n</p>\r\n<p>\r\nCar oui, Geroge RR Martin écrit plusieurs livre à la fois. Entre le volume 2 de "Fire and Blood", "Winds of Winter" et "A dream of Spring" -les sixième et septième tomes de la saga "Game of Thrones"- il ne semble plus savoir où donner de la tête.\r\n</p>\r\n<p>\r\nLe livre "Winds of Winter", dont les premiers chapitres avaient été livrés par l\'écrivain sur son blog, semble donner du fil a retordre à Geroge RR Martin, qui avoue s\'empêtrer dans les méandres du récit.\r\n</p>\r\n<p>\r\nDans une interview donnée à Entertainement Weeklyle 19 novembre dernier, l\'écrivain s\'était confié sur les difficultés qu\'il a à terminer ce livre: "Je sais que beaucoup de gens sont très fâchés contre moi parce que \'Winds of Winter\' n\'est pas fini. Moi-même, ça me rend fou. Je souhaitais l\'avoir terminé il y a quatre ans. Je souhaitais que ce soit fini maintenant.[...] J\'ai eu des nuits sombres où je me suis cogné la tête contre le clavier en me disant: \'Mon Dieu, ne finirai-je donc jamais? L\'histoire va de plus en plus loin et je vais toujours plus loin dans l\'histoire. Qu\'est-ce qui se passe? Je dois finir ça.\' "\r\n</p>', 'turtle-182121_1920.jpg', 'https://www.huffingtonpost.fr/2018/11/23/game-of-thrones-a-ete-invente-grace-a-des-tortues_a_23597963/');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_article`
--
ALTER TABLE `t_article`
  ADD PRIMARY KEY (`idArticle`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_article`
--
ALTER TABLE `t_article`
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
