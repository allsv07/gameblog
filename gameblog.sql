-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 03 2021 г., 22:30
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gameblog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `showSlider` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `cat_id`, `title`, `description`, `author`, `date`, `image`, `meta_desc`, `meta_keywords`, `showSlider`) VALUES
(3, 13, 'Мир с подсказкой: как игры помогают нам в прохождении', '<p>Исследуя видеоигры, многие чрезмерно заостряют внимание на интерактивности и/или виртуальности. Однако и то и другое свойственно также гипертекстам в Интернете, неигровым симуляторам и программам. Поэтому хочется обратиться к другим, необычным элементам, которые есть только или почти только в играх Конечно, в играх многое понамешано, а что-то давно заимствовали геймифицированные сайты и приложения. И всё же в качестве недооценённого элемента видеоигр я хочу поговорить об игровых подсказках.</p>\r\n', '1', '2021-03-03 20:07:58', '1614791278.jpeg', 'ewfw', 'wef', 1),
(4, 15, 'Факультет гейм-дизайна — это как? Интервью с Николаем Дыбовским, часть третья', '<p>Это третья часть интервью, где мы с&nbsp;<u>Николаем Дыбовским</u>, главой студии&nbsp;<strong>Ice-Pick Lodge</strong>, обсуждаем направление &laquo;Гейм-дизайн и виртуальная реальность&raquo; Высшей школы экономики, которое Николай курирует, а также в целом обучение гейм-дизайну. Настоятельно рекомендую начать чтение с&nbsp;<a href=\"https://stopgame.ru/show/117295/fakultet_geym_dizayna_eto_kak_interview_s_nikolaem_dybovskim_chast_pervaya\">первой</a>&nbsp;и&nbsp;<a href=\"https://stopgame.ru/show/117318/fakultet_geym_dizayna_eto_kak_interview_s_nikolaem_dybovskim_chast_vtoraya\">второй</a>&nbsp;частей.<br />\r\n<br />\r\n<strong>StopGame:</strong>&nbsp;Что если бы не было никакого университета? Была бы кучка студентов, которые четыре года делали что-то своё, и к ним периодически приходили бы квалифицированные и опытные работники и давали обратную связь по их проектам. Зачем из этого делать, собственно, университет?<br />\r\n<br />\r\n<strong>Николай Дыбовский:</strong>&nbsp;Вот почему. В романе&nbsp;<u>Торнтона Уайлдера</u>&nbsp;(Thornton Wilder) &laquo;День восьмой&raquo; &ndash; кстати, очень советую, прекрасная книжка &ndash; главу одного семейства обвиняют в убийстве и приговаривают к смертной казни. Ему чудом удаётся бежать, но на его детях лежит клеймо. Этих детей травят, и они вынуждены уехать зарабатывать себе на жизнь в Чикаго. И у каждого складывается интересная, уникальная, очень яркая судьба.<br />\r\n<br />\r\nОдин из них, Роберт, стал журналистом, а начинал с нуля, с классики: мыл посуду в ресторане. И&nbsp;<u>Уайлдер</u>&nbsp;посвящает очень красивый пассаж тому, что это был единственный человек, который своим примером доказал, что можно стать образованным человеком, не получив высшего образования. И потом к этой теме несколько раз возвращаются и некоторые персонажи, и сам&nbsp;<u>Уайлдер</u>, говоря, что главное, что человеку даёт университет, &ndash; это не знания, а повод эти знания получать. Он как бы выстраивает систему, заставляющую брать себя за шкирку и, как Мюнхгаузен за косичку, себя из болота тащить.<br />\r\n<br />\r\nИ эти знания приходится получать через не могу, через не хочу, потому что сессия, потому что есть некие университетские традиции. Это почти ритуальный, обрядовый момент. Мы готовимся к сессии, мы сдаём сессию, кранчи, дедлайны, неспящие головы, все эти неадекватные преподаватели-звери, &laquo;Ой, не тот билет вытащил&raquo;, какой-то мухлёж на экзамене&hellip; Это всё часть университетской культуры, которая представляет собой серию ритуалов. Эти ритуалы очень сильно помогают человеку самоорганизоваться.<img alt=\"\" src=\"https://images.stopgame.ru/articles/2021/02/20/fakultet_geym_dizayna_eto_kak_interview_s_nikolaem_dybovskim_chast_tretya-1613820864-s.jpg\" style=\"height:282px; width:400px\" /></p>\r\n\r\n<p>Меня заставляли учиться. Если бы у меня был повод не сдавать сессию, я бы её не сдал. Если бы у меня был повод не готовиться к семинару, я бы к нему не готовился. Но я верю, что есть уникумы, которые могут взять и самому себе написать программу. И сейчас действительно всё в эту сторону движется, потому что появилась инфраструктура и культура для самообразования. Про него много спорят, много говорят, много открывается онлайн-курсов, ведётся конкуренция за наиболее эффективные способы&hellip; Культура самообразования очень сильно выросла, но университеты всё равно продолжают оставаться прежде всего питательной средой, которая тебя мотивирует и заряжает. То есть если сравнить знания с углём, который бросается в топку паровоза, то университет &ndash; это как бы топка, которая обеспечивает определённую температуру и подачу пара в клапаны, чтобы паровоз поехал. Просто бросать уголь в домашнюю печку может оказаться не так интересно и полезно.<br />\r\n<br />\r\n<strong>SG:</strong>&nbsp;Как за четыре года изменился процесс обучения? Вы говорите, что на первом курсе на студентах методом проб и ошибок тестировали всё, что могли, и, по идее, за четыре года этот процесс должен был как-то устояться. Хорошее &ndash; прижиться, плохое &ndash; отмереть.<br />\r\n<br />\r\n<strong>НД:</strong>&nbsp;Конечно.<br />\r\n<br />\r\n<strong>SG:</strong>&nbsp;Раскройте этот процесс трансформации.<br />\r\n<br />\r\n<strong>НД:</strong>&nbsp;Ну, во-первых, у нас сильно сместился фокус с графики. С того, чтобы делать такие интерактивные графические виньетки. Потому что, даже если человек говорит: &laquo;У меня будет сайд-скроллер не хуже&nbsp;<a href=\"https://stopgame.ru/game/gris\"><strong>GRIS</strong></a>, вот вам из него пара уровней&raquo;, возникает иллюзия, что он научился делать игры. Хотя на самом деле он даже технодемки делать не научился. Но его уже прёт от того, что у него чего-то там бегает, шевелится, двигается и всё это красиво выглядит.</p>\r\n\r\n<p><img alt=\"\" src=\"https://images.stopgame.ru/articles/2021/02/20/fakultet_geym_dizayna_eto_kak_interview_s_nikolaem_dybovskim_chast_tretya-1613820865-s.jpg\" style=\"height:394px; width:700px\" /></p>\r\n\r\n<p>Со следующего года у меня будет маленький курс по формальной логике. Просто чтобы люди понимали, что такое формальная логика и как она работает. Сейчас мне нужен преподаватель, который сумеет сделать какой-то творческий курс математики. Помните, как в нашем детстве были книжки&nbsp;<u>Перельмана</u>: &laquo;Живая арифметика&raquo;, &laquo;Живая математика&raquo;&hellip; Этот курс тоже должен быть в виде таких задачек, но именно с фокусом на гейм-дизайн. Человека, который сможет разработать такой авторский курс, хорошо зная математику, я прямо затащу к себе изо всех сил. Это первое.<br />\r\n<br />\r\nСтало гораздо больше системного гейм-дизайна. Весь второй год у нас теперь сильно отполирован именно под игровые механики. Студенты много занимаются настольными играми, даже настольную ролевую игру типа&nbsp;<strong>D&amp;D</strong>&nbsp;пытаются спроектировать. Мы пытаемся выбить их из парадигмы, что игры &ndash; это только видеоигры. А видеоигры &ndash; это в первую очередь какие-то однопользовательские сайд-скроллеры типа&nbsp;<a href=\"https://stopgame.ru/game/hollow_knight\"><strong>Hollow Knight</strong></a>. Мы ещё столкнулись с тем, что даже среди видеоигр, которые являются лишь одним из континентов в мире гейм-дизайна, люди фокусируются только на какой-то конкретной области с устоявшимися жанрами, сеттингами, механиками.</p>\r\n\r\n<p><img alt=\"\" src=\"https://images.stopgame.ru/articles/2021/02/20/fakultet_geym_dizayna_eto_kak_interview_s_nikolaem_dybovskim_chast_tretya-1613820866-s.jpg\" style=\"height:394px; width:700px\" /></p>\r\n\r\n<p>И типа всё понятно. &laquo;Чего вы тут нам, Николай, затираете? Ну выбор. Чего думать-то про выбор?&raquo; И я говорю: &laquo;Вы знаете, я вам сейчас такого про выборы нарассказываю, что нам двух месяцев не хватит, чтобы увидеть, какое это сложное понятие и как с ним непросто работать&raquo;. Целый год уходит на то, чтобы разобрать только восемь понятий. Восемь. Сколько у&nbsp;<u>Джесси Шелла</u>&nbsp;(Jesse Schell) призм в&nbsp;<a href=\"https://stopgame.ru/to/?https://www.goodreads.com/book/show/49406092\" target=\"_blank\">книге</a>?<br />\r\nСейчас я понимаю, что эти годы были, наверное, самыми важными: они зарядили меня багажом на всю оставшуюся жизнь. Мне 42 года, и я могу сказать, что соотношение идей, с которыми я продолжаю работать сейчас, и идей, которые были приобретены уже потом, &ndash; наверное, 80 к 20, по принципу Парето. Поэтому не надо упускать возможность учиться. Если есть хоть малейшая возможность не бросаться сразу в пучину самостоятельного зарабатывания денег, а всё-таки поучиться, воспользуйтесь ею. Потому что, как я уже сказал, учёба &ndash; это не поход на базар, откуда вы унесёте несколько арбузов, тыкву, яблоки, груши и будете с ними дальше идти. Нет. Это, скорее, полоса препятствий, которую вы пройдёте и которая позволит вам в дальнейшем забираться туда, куда мало кто умеет. Наверное, это всё, что я хочу сказать&hellip; (Смеётся.) О войне во Вьетнаме.</p>\r\n', '1', '2021-03-03 20:15:25', '1614791725.jpeg', 'wedwe', 'wedwed', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `showSlider` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `author`, `date`, `image`, `meta_desc`, `meta_keywords`, `showSlider`) VALUES
(2, 'Строим шумерские города. Обзор Sumerians', '<p>Простенький, но приятный градостроительный симулятор. Ранний доступ.</p>\r\n\r\n<p><img alt=\"\" src=\"https://images.stopgame.ru/uploads/users/2021/316065/r912x513/Psgu0pcbuOsQvlP1MP8hEg/00333.S9dyz1B.jpg\" style=\"height:419px; width:700px\" /></p>\r\n\r\n<p>Игра заявлена для платформы Windows.</p>\r\n\r\n<p><strong>ИНТЕРЕСНЫЙ ФАКТ</strong></p>\r\n\r\n<p>В 1964(!) году была выпущена игра The Sumerian Game для платформы IBM 7090. Шумерская игра - это текстовая стратегическая видеоигра по управлению землями и ресурсами. Узнал это совершенно случайно, собирая материалы для Sumerians.</p>\r\n', 19, '2021-03-03 20:21:30', '1614792395.jpeg', 'dewe', 'wedwed', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`, `code`, `table_name`) VALUES
(1, 'PC', 'pc', 'news'),
(2, 'Xbox One', 'xboxone', 'news'),
(3, 'Xbox Series', 'xboxseries', 'news'),
(4, 'Playstation 4', 'playstation4', 'news'),
(5, 'Playstation 5', 'playstation5', 'news'),
(6, 'VR', 'vr', 'news'),
(7, 'Nintendo', 'nintendo', 'news'),
(8, 'MMO', 'mmo', 'news'),
(9, 'Мобильные', 'mobile', 'news'),
(10, 'Железо', 'hard', 'news'),
(11, 'Индустрия', 'industry', 'news'),
(12, 'Киберспорт', 'cybersport', 'news'),
(13, 'Обзоры', 'review', 'articles'),
(14, 'Превью', 'priview', 'articles'),
(15, 'Интервью', 'interview', 'articles'),
(16, 'Темы недели', 'weeks', 'blogs'),
(17, 'Темы месяца', 'month', 'blogs'),
(18, 'Коды', 'codes', 'cheats'),
(19, 'Прохождения', 'solutions', 'cheats'),
(20, 'Советы и тактика', 'tactics', 'cheats');

-- --------------------------------------------------------

--
-- Структура таблицы `cheats`
--

CREATE TABLE `cheats` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `showSlider` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cheats`
--

INSERT INTO `cheats` (`id`, `cat_id`, `title`, `description`, `author`, `date`, `image`, `meta_desc`, `meta_keywords`, `showSlider`) VALUES
(2, 18, 'Nioh 2: The Complete Edition', '<p>+6 трейнер (для версии v1.25).<br />\r\nРаспакуйте все файлы из архива.<br />\r\nЗапустите трейнер.<br />\r\nЗапустите игру, не закрывая трейнер.<br />\r\nВо время игры нажимайте на клавиши, указанные в трейнере.<br />\r\n<br />\r\nОпции:<br />\r\n<br />\r\nNumpad 1 &ndash; Здоровье<br />\r\nNumpad 2 &ndash; Выносливость<br />\r\nNumpad 3 &ndash; Очки<br />\r\nNumpad 4 &ndash; Золото<br />\r\nNumpad 5 &ndash; Способности / Добавить уровень<br />\r\nNumpad 6 &ndash; Легкое убийство</p>\r\n', '19', '2021-03-03 20:34:44', '1614792884.jpeg', 'qwe', 'wqeq', 0),
(3, 18, 'Biotech Samurai', '<p>+2 трейнер (для версии v1.0).<br />\r\nРаспакуйте все файлы из архива.<br />\r\nЗапустите трейнер.<br />\r\nЗапустите игру, не закрывая трейнер.<br />\r\nВо время игры нажимайте на клавиши, указанные в трейнере.<br />\r\n<br />\r\nОпции:<br />\r\n<br />\r\n<strong>Numpad 1 &ndash; Activate Trainer</strong><br />\r\nHealth<br />\r\nStamina</p>\r\n', '19', '2021-03-03 20:36:58', '1614793018.jpeg', 'wewe', 'wedwed', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `author` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'anonim',
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_row_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `author_id`, `author`, `text`, `table_name`, `table_row_id`, `date`, `active`) VALUES
(5, 18, 'kuku}{a', 'Пошли за Кирпичами!', 'blogs', 2, '2021-03-03 20:31:04', 1),
(6, 18, 'kuku}{a', 'Коды, по крайней мере некоторые будут работать только после ввода «imacheater» консоль «F1».', 'cheats', 3, '2021-03-03 20:46:32', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `game_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `platform` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `janr` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `developer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `raiting` int(11) NOT NULL,
  `cat_games` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `games`
--

INSERT INTO `games` (`id`, `game_name`, `image`, `platform`, `janr`, `release_date`, `developer`, `raiting`, `cat_games`) VALUES
(1, 'Witcher 3: Wild Hunt - Complete Edition, The', 'the_witcher3.png', 'PC, PS4, XONE, NSW', 'rpg', '2016-08-16', 'CD PROJEKT RED', 0, 1),
(2, 'Resident Evil 2 Remake', 'ResidentEvilRemake.png', 'PC, PS4, XONE', 'action', '2019-01-25', 'CAPCOM Co., Ltd.', 9, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `showSlider` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `cat_id`, `title`, `description`, `author`, `date`, `image`, `meta_desc`, `meta_keywords`, `showSlider`) VALUES
(2, 3, 'Новинки Xbox Game Pass: NBA 2K21, Star Wars: Squadrons и не только', '<p>В Xbox Game Pass близится очередное пополнение. По традиции&nbsp;<strong>Microsoft</strong>&nbsp;<a href=\"https://stopgame.ru/to/?https://news.xbox.com/ru-ru/2021/03/03/xbox-game-pass-nba-2k21-football-manager-2021/\" target=\"_blank\">рассказала</a>, какие игры скоро попадут в каталог сервиса, а с какими предстоит проститься.</p>\r\n\r\n<h3>Появятся</h3>\r\n\r\n<p><strong>4 марта</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Football Manager 2021</strong>&nbsp;(PC),</li>\r\n	<li><strong>Football Manager 2021 Xbox Edition</strong>&nbsp;(консоли и PC),</li>\r\n	<li><strong>NBA 2K21</strong>&nbsp;(консоли).</li>\r\n</ul>\r\n\r\n<p><strong>В марте</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Star Wars: Squadrons</strong>&nbsp;(консоли).</li>\r\n</ul>\r\n\r\n<p><strong>В апреле</strong></p>\r\n\r\n<ul>\r\n	<li><strong>NHL 21</strong>&nbsp;(консоли).</li>\r\n</ul>\r\n', 1, '2021-03-03 20:04:22', '1614791062.jpeg', 'ewe', 'wef', 1),
(3, 10, 'AMD представила Radeon RX 6700 XT — видеокарту для игры в 1440p', '<p><strong>AMD</strong>&nbsp;провела очередную презентацию из серии Where Gaming Begins. На этот раз в центре внимания оказалась новая видеокарта на базе архитектуры RDNA 2 &mdash; Radeon RX 6700 XT.</p>\r\n\r\n<p>Новинка обладает следующими характеристиками:</p>\r\n\r\n<ul>\r\n	<li>Число вычислительных блоков: 40,</li>\r\n	<li>частота в играх: 2 424 МГц,</li>\r\n	<li>кеш: 96 Мб,</li>\r\n	<li>объём памяти GDDR6: 12 Гб,</li>\r\n	<li>максимальное энергопотребление: 230 Вт.</li>\r\n</ul>\r\n\r\n<p>По словам производителя, видеокарта рассчитана на игру в разрешении 1440p.</p>\r\n\r\n<p>Radeon RX 6700 XT поступит в продажу 18 марта. В этот день станут доступны версии от&nbsp;<strong>AMD</strong>&nbsp;и компаний-партнёров &mdash;&nbsp;<strong>ASUS</strong>,&nbsp;<strong>Gigabyte</strong>,&nbsp;<strong>PowerColor</strong>&nbsp;и других. Цена &mdash; $479.</p>\r\n', 1, '2021-03-03 20:05:10', '1614791110.jpeg', 'ewef', 'weferf', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `email`, `image`, `date`, `role`) VALUES
(1, 'admin', '$2y$10$wqwbbbdOlSbw3fC0MQqIZuAr0QVyyR9NA3JesV4egP/2nHlbIY5Dy', 'Администратор', 'admin@gameblog.ru', 'no-avatar.jpg', '2021-02-02 00:00:00', 'admin'),
(18, 'kuku}{a', '$2y$10$aG8fkAkmtry7flo8paFXV.OK8BLlUlETO90uXHG0vPAlQ/j9xh1HG', 'Пасипака', 'kukuxa@Yandex.ru', '1614789257.jpeg', '2021-03-03 19:10:31', 'user'),
(19, 'Боб Келсо', '$2y$10$raI6lbXHhBhzO8tDH8iM8Oyr4xA2iQTefkA2h3BGCg9alcNUVnL8q', '', 'bob@mail.ru', 'no-avatar.jpg', '2021-03-03 20:18:56', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_row_id` int(11) NOT NULL,
  `c_views` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `views`
--

INSERT INTO `views` (`id`, `ip`, `table_name`, `table_row_id`, `c_views`) VALUES
(6, '127.0.0.1', 'news', 3, 1),
(7, '127.0.0.1', 'articles', 4, 1),
(8, '127.0.0.1', 'news', 2, 1),
(9, '127.0.0.1', 'blogs', 2, 1),
(10, '127.0.0.1', 'cheats', 3, 1),
(11, '127.0.0.1', 'cheats', 2, 1),
(12, '127.0.0.1', 'articles', 3, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cheats`
--
ALTER TABLE `cheats`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `cheats`
--
ALTER TABLE `cheats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
