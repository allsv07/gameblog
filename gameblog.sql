-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 14 2021 г., 23:18
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
  `cat_article` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `cat_article`, `title`, `description`, `author`, `date`, `views`, `image`) VALUES
(1, 1, 'ТЫСЯЧЕЛИКИЙ СМЫСЛ: ОБ ИНТЕРПРЕТАЦИИ ВИДЕОИГР', 'Со школьных уроков литературы нас приучают к мысли о том, как важно интерпретировать произведения искусства, а не просто наслаждаться чтением. Это важный навык высококультурного человека, как минимум благодаря ему можно поговорить о произведении, а не просто обмениваться репликами о том, как всё восхитительно. Но затея школы провальная, потому что проблема не в неумении людей отыскивать дополнительные смыслы, а в отсутствии такого желания. Школе очень редко удаётся привить его.\r\n\r\nОднако всем нам знакомы вопросы в духе «Что имел в виду автор?» и «Почему судьба героя такова?». Многие книги и фильмы специально устроены так, что без попыток что-то поразгадывать вообще нет смысла на них тратить время. Про них говорят: «Заумная муть», хотя стоило бы сказать: «Фильм не мобилизовал мои интерпретативные способности». Со временем отсылки, контексты и оммажи стали привычны и далеко за рамками артхауса (в тех же творениях Marvel и DС), но люди всё равно предпочитают просто удовольствие, а не удовольствие от интеллектуальной работы.', 'Иван Кудряшов', '2021-02-13', 0, ''),
(2, 1, 'ATELIER RYZA 2: LOST LEGENDS & THE SECRET FAIRY', 'Atelier Ryza: Ever Darkness & The Secret Hideout мы назвали лучшей для знакомства с этой древней серией алхимических JRPG, которая существует уже более 20 лет. Почему же сиквел, Atelier Ryza 2: Lost Legends & the Secret Fairy, подходит для этого ещё лучше (во всяком случае, для знакомства на персональных компьютерах) и чем в принципе хороша новая игра? Отвечаем.', 'Кирилл Волошин', '2021-02-11', 0, ''),
(3, 3, 'SHERLOCK HOLMES: CHAPTER ONE', 'Сегодня, 25 мая, была анонсирована Sherlock Holmes: Chapter One – новая игра в именитой уже серии от украинского коллектива Frogwares. Она станет этаким мягким перезапуском и расскажет о первом большом деле ещё молодого Шерлока Холмса, который вынужден вернуться на живописный средиземноморский остров – именно там прошло его детство. Центральным нервом повествования станут взаимоотношения молодого Шерлока с его другом детства Джонатаном. Появится новая система расследований и вообще достаточно много свежих для серии механик. Накануне анонса мы побеседовали о новом проекте с Сергеем Оганесяном, комьюнити-менеджером и продюсером Frogwares.', 'Кирилл Волошин', '2021-02-11', 0, ''),
(4, 3, 'CONQUEROR\'S BLADE', 'Неделю назад вы могли видеть короткое превью Conqueror’s Blade, китайского гибрида MMO и тактической стратегии. Тогда нам удалось поиграть всего пару часов, а потому в понимании осталось множество пробелов. Некоторые из них нам помог устранить SEO-продюсер компании-разработчика Си Ван, любезно ответив на несколько вопросов.', 'Евгений Баранов', '2021-02-14', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `category_article`
--

CREATE TABLE `category_article` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category_article`
--

INSERT INTO `category_article` (`id`, `title`) VALUES
(1, 'Обзоры'),
(2, 'Превью'),
(3, 'Интерьвью');

-- --------------------------------------------------------

--
-- Структура таблицы `category_news`
--

CREATE TABLE `category_news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category_news`
--

INSERT INTO `category_news` (`id`, `title`) VALUES
(1, 'PC'),
(2, 'Xbox One'),
(3, 'Xbox Series'),
(4, 'Playstation 4'),
(5, 'Playstation 5'),
(6, 'VR'),
(7, 'Nintendo'),
(8, 'MMO'),
(9, 'Мобильные'),
(10, 'Железо'),
(11, 'Индустрия'),
(12, 'Киберспорт');

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
  `cat_news` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `cat_news`, `title`, `description`, `author`, `date`, `views`, `image`) VALUES
(1, 1, 'ГЕЙМПЛЕЙ BOREAL ALYPH — ЕЩЁ ОДНОЙ ФАНАТСКОЙ ИГРЫ ПО СЛИТОМУ СЦЕНАРИЮ HALF-LIFE 2: EPISODE THREE', 'Как показала Black Mesa, фанаты у Half-Life достаточно сумасшедшие, чтобы на голом энтузиазме создавать целые игры. Новым святым Граалем, который не даёт покоя сообществу, стали слитые наброски сюжета Half-Life 2: Episode Three от бывшего сценариста серии Марка Лэйдлоу (Marc Laidlaw). По их мотивам запустили разработку нескольких проектов, в том числе Boreal Alyph.\r\n\r\nИгрой занимается коллектив Keep Away From Fire. На сайте команды говорится, что в неё входит свыше 40 программистов, художников, сценаристов, дизайнеров уровней, актёров озвучивания и так далее. Всех энтузиастов объединяет желание творить и создавать проекты на Source — они даже получили лицензию на движок от Valve.', 'Геннадий', '2021-02-12', 1, ''),
(2, 11, 'ИМЕНИТЫЕ РАЗРАБОТЧИКИ НАЗЫВАЮТ САМЫЕ ОЖИДАЕМЫЕ ИГРЫ НА PLAYSTATION', 'Блог PlayStation попросил лидеров известных студий назвать свои самые ожидаемые игры. Судя по всему, жёсткой привязки к году выхода не было: разработчики могли выбрать любую игру, даже если её дата релиза неизвестна. Да и указывать только одну фаворитку никто не требовал.\r\n\r\nDeathloop\r\nЭнтони Пеппер (Anthony Pepper), старший дизайнер Fall Guys: Ultimate Knockout:\r\n\r\nDishonored — одна из моих любимейших игр прошедшего десятилетия. Благодаря Dishonored я готов доверить Arkane Studios свою жизнь. Пока что всё, что я видел по Deathloop, разжигает во мне интерес — от боевой системы до стиля, ритма и задумки в центре сюжета. Я в деле.\r\n\r\nDeathloop также выбрали:\r\n\r\nСирилл Имберт (Cyrille Imbert), исполнительный продюсер Streets of Rage 4,\r\nНед Уотерхаус (Ned Waterhouse), дизайнер Sackboy: A Big Adventure,\r\nЛуис Стаддерт (Louis Studdert), продюсер Crash Bandicoot 4,\r\nДжейсон Чуан (Jason Chuang), старший менеджер по маркетингу Genshin Impact,\r\nКурт Марджено (Kurt Margenau), игровой соруководитель The Last of Us Part II,\r\nРеймон Рассел (Ramone Russell), специалист по коммуникациям в производстве и развитию бренда в MLB: The Show 20.', 'Геннадий', '2021-02-11', 10, ''),
(3, 1, 'В STEAM ПОЯВИЛИСЬ СИСТЕМНЫЕ ТРЕБОВАНИЯ BIOMUTANT', 'На самом деле, в Steam уже давно были указаны минимальные системные требования приключенческого экшена Biomutant, но недавно их обновили и добавили рекомендуемые.\r\n\r\nМинимальные\r\nОперационная система: 64-разрядная Windows 7/8.1/10,\r\nпроцессор: AMD FX-8350 или Intel Core i5-4690K,\r\nвидеокарта: GeForce GTX 960 или Radeon R9 380,\r\nDirectX 11,\r\nоперативная память: 8 Гб,\r\nместо на накопителе: 25 Гб.\r\nРекомендуемые\r\nОперационная система: 64-разрядная Windows 10,\r\nпроцессор: AMD Ryzen 5 1600 или Intel Core i7-6700K,\r\nвидеокарта: GeForce GTX 1660Ti или Radeon RX 590,\r\nDirectX 11,\r\nоперативная память: 16 Гб,\r\nместо на накопителе: 25 Гб.', 'Руслан', '2021-02-13', 2, ''),
(4, 7, 'ГИГАНТСКИЙ МАРИО-КОТ ПРОТИВ БОУЗЕРА — РОЛИК К ВЫХОДУ SUPER MARIO 3D WORLD + BOWSER\'S FURY', 'На Nintendo Switch запустилась Super Mario 3D World + Bowser\'s Fury — дополненная версия платформера с Wii U. Релизу посвящён соответствующий трейлер.\r\n\r\nSuper Mario 3D World + Bowser\'s Fury состоит из двух частей. 3D World — та самая игра родом с Wii U без кардинальных изменений. Марио проходит разнообразные уровни, управлять камерой при этом нельзя — она двигается самостоятельно. Bowser\'s Fury — новое приключение в составе ремастера; здесь водопроводчик исследует одну большую локацию, а камера двигается по велению пользователя, как, например, в Super Mario 64.\r\n\r\nНа StopGame.ru комплект получил высшую оценку — «Изумительно» и «Наш выбор». По мнению Алексея Лихачёва, 3D World и так шикарна, а замечательная Bowser\'s Fury превращает переиздание в настоящий подарок для ценителей платформеров в целом и серии Super Mario в частности.\r\n\r\nИгру можно приобрести в Nintendo eShop за 4 499 рублей.', 'Андрей', '2021-02-13', 1, ''),
(5, 2, 'ДНИ БЕСПЛАТНОЙ ИГРЫ НА XBOX СТАРТОВАЛИ В WARHAMMER: VERMINTIDE 2, NASCAR HEAT 5 И SPACE CREW', 'Подписчики Xbox Live Gold, встречайте очередные дни бесплатной игры на Xbox! В программе — Warhammer: Vermintide 2, NASCAR Heat 5 и Space Crew.\r\n\r\nАкция продлится до 14 февраля, 10:59 по Москве. В этот срок на игры также действуют скидки:\r\n\r\nWarhammer: Vermintide 2:\r\nстандартное издание — 29.99 7.49 доллара.\r\nNASCAR Heat 5:\r\nстандартное издание — 29.99 20.09 доллара,\r\nзолотое издание — 44.99 30.14 доллара.\r\nSpace Crew:\r\nстандартное издание — 21.49 14.39 доллара.', 'Руслан', '2021-02-13', 0, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_article`
--
ALTER TABLE `category_article`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_news`
--
ALTER TABLE `category_news`
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
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `category_article`
--
ALTER TABLE `category_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `category_news`
--
ALTER TABLE `category_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
