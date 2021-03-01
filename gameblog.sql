-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 01 2021 г., 17:32
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
  `date` date NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `showSlider` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `cat_id`, `title`, `description`, `author`, `date`, `image`, `meta_desc`, `meta_keywords`, `showSlider`) VALUES
(1, 13, 'ТЫСЯЧЕЛИКИЙ СМЫСЛ: ОБ ИНТЕРПРЕТАЦИИ ВИДЕОИГР', 'Со школьных уроков литературы нас приучают к мысли о том, как важно интерпретировать произведения искусства, а не просто наслаждаться чтением. Это важный навык высококультурного человека, как минимум благодаря ему можно поговорить о произведении, а не просто обмениваться репликами о том, как всё восхитительно. Но затея школы провальная, потому что проблема не в неумении людей отыскивать дополнительные смыслы, а в отсутствии такого желания. Школе очень редко удаётся привить его.\r\n\r\nОднако всем нам знакомы вопросы в духе «Что имел в виду автор?» и «Почему судьба героя такова?». Многие книги и фильмы специально устроены так, что без попыток что-то поразгадывать вообще нет смысла на них тратить время. Про них говорят: «Заумная муть», хотя стоило бы сказать: «Фильм не мобилизовал мои интерпретативные способности». Со временем отсылки, контексты и оммажи стали привычны и далеко за рамками артхауса (в тех же творениях Marvel и DС), но люди всё равно предпочитают просто удовольствие, а не удовольствие от интеллектуальной работы.', '1', '2021-02-13', '', '', '', 1),
(2, 13, 'ATELIER RYZA 2: LOST LEGENDS & THE SECRET FAIRY', 'Atelier Ryza: Ever Darkness & The Secret Hideout мы назвали лучшей для знакомства с этой древней серией алхимических JRPG, которая существует уже более 20 лет. Почему же сиквел, Atelier Ryza 2: Lost Legends & the Secret Fairy, подходит для этого ещё лучше (во всяком случае, для знакомства на персональных компьютерах) и чем в принципе хороша новая игра? Отвечаем.', '1', '2021-02-11', '', '', '', 0),
(3, 14, 'SHERLOCK HOLMES: CHAPTER ONE', 'Сегодня, 25 мая, была анонсирована Sherlock Holmes: Chapter One – новая игра в именитой уже серии от украинского коллектива Frogwares. Она станет этаким мягким перезапуском и расскажет о первом большом деле ещё молодого Шерлока Холмса, который вынужден вернуться на живописный средиземноморский остров – именно там прошло его детство. Центральным нервом повествования станут взаимоотношения молодого Шерлока с его другом детства Джонатаном. Появится новая система расследований и вообще достаточно много свежих для серии механик. Накануне анонса мы побеседовали о новом проекте с Сергеем Оганесяном, комьюнити-менеджером и продюсером Frogwares.', '2', '2021-02-11', '', '', '', 0),
(6, 13, 'qqqqq', '<p>qqqqqq</p>\r\n', '1', '2021-02-25', '', 'q', 'q', 0),
(9, 13, 'edit', '<p>авп равр пр апр ар&nbsp;</p>\r\n\r\n<p><strong>skdlfjlfjifj jfgj fd j[f j</strong></p>\r\n', '1', '2021-02-28', '', 'авр апр авпр', 'вар вапр авр авр', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` int(11) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `showSlider` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `blogs`
--

INSERT INTO `blogs` (`id`, `cat_id`, `title`, `description`, `author`, `date`, `image`, `meta_desc`, `meta_keywords`, `showSlider`) VALUES
(1, 16, 'КОРОТКО И ПО ФАКТАМ О VALHEIM', 'Коротко и по фактам о том, почему стоит поиграть в Valheim.\r\n\r\nВальхэйм - добротный выживастик в открытом фэнтезийном мире основанном на скандинавской мифологии.', 1, '2021-02-15', '', '', '', 0),
(2, 17, 'STOPGAME LIVE — ФЕВРАЛЬ 2021', 'Всем оттаивающий стримовый привет! Кажется, обозримое будущее наших стримов стало чуть-чуть... обозримее, что ли. Короче, пока есть прогнозы чуть более дальновидные, чем на день-два вперёд, самое время поделиться расписанием...\r\n\r\n\r\nGENSHIN IMPACT. Соберём их всех\r\nСУББОТА, 13 ФЕВРАЛЯ, 18:00\r\nВторой эпизод «китайской трилогии», которую учиняют в прямом эфире Уэс и Флинн. На сей раз они отвергают одиночество и пускаются в совместное приключение на живописных просторах.', 2, '2021-02-15', '', '', '', 0),
(4, 16, 'блог 1', '<p>фывыа q</p>\r\n', 1, '2021-02-28', '', 'ыва', 'ыва', 0);

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
(16, 'Топ', 'top', 'blogs'),
(17, 'Темы недели', 'weeks', 'blogs'),
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
  `date` date NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `showSlider` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cheats`
--

INSERT INTO `cheats` (`id`, `cat_id`, `title`, `description`, `author`, `date`, `image`, `meta_desc`, `meta_keywords`, `showSlider`) VALUES
(1, 19, 'LITTLE NIGHTMARES 2: ГАЙД: ВСЕ ШЛЯПЫ И ДУШИ', 'В Little Nightmares 2 есть две разновидности коллекционных предметов – головные уборы и хаотичные останки (или шляпы и души соответственно). Ниже я расскажу, как отыскать каждый из доступных предметов, с которыми связано несколько разных достижений и даже бонусная кат-сцена, показываемая в самом конце игры.\r\n\r\nПо умолчанию у главного героя будет открыт только один головной убор – бумажный пакет. Еще два головных убора появляются в игре в качестве двух отдельных дополнений – маска Мокудзина и колпак гнома. Наконец, еще одна шляпа, как у Тонкого человека, будет разблокирована сразу по завершении игры. Остальные восемь головных уборов можно отыскать на внутриигровых локациях – по две в первых четырех главах (в пятой, последней, никаких коллекционок нет). Колпак гнома будет спрятан аналогичным образом, а вот маска Мокудзина разблокируется и станет доступной с самого начала игры, как только вы установите соответствующее дополнение.\r\n\r\nСобрав все шляпы, вы разблокируете три достижения. Первое выдается за 6 разблокированных головных уборов, следующие два – за все собранные уборы и экипировку шляпы Тонкого человека (то есть нужно будет повторно запустить новую игру).\r\n\r\nЧто касается хаотичных останков или душ, то их в игре 18 штук. Разбросаны души по четырем главам игры, за исключением пятой. Благодаря этим душам вы сможете разблокировать бонусную концовку и пять отдельных ачивок – четыре за сбор всех хаотичных останков в каждой отдельной главе, и еще одну за сбор хаотичных останков во всех главах.\r\nГлава 1\r\nХаотичные останки №1. Где-то неподалеку от начала первой главы вы окажетесь перед непреодолимой пропастью и сломанным мостом. Когда спуститесь вниз, спрыгнув на выступ на переднем плане экрана (не прыгайте сразу в яму, иначе Моно разобьется), то обнаружите остатки моста, по которым нужно выбраться на правый край. Вместо того чтобы подниматься по доскам, двигайтесь мимо них вправо, вдоль переднем плана. Продолжайте идти вправо, пока не окажетесь в туннеле, который ведет в небольшую пещеру с могилой и лопатой. Здесь будут останки.\r\n\r\nХаотичные останки №2. Немного дальше, после первого взаимодействия с опасными ловушками и ударом палкой для активации капкана, вам нужно будет спуститься вниз по полому бревну. Поднявшись, обернитесь, пригнитесь и двигайтесь под бревном в левую сторону, чтобы через другой туннель попасть в пещеру с трупом медведя и душой.\r\n\r\nГоловной убор №1. Вскоре после этого вы окажетесь в жилом доме. Пройдите внутрь через окно, двигайтесь через кухню и попадете в коридор. Бегите на передний план экрана, затем сверните в комнату слева и обнаружите на полу шапку из енота или какого-то другого зверька.', '1', '2021-02-20', '', '', '', 0),
(2, 18, 'MACHIAVILLAIN: КОДЫ', '<p><strong>build</strong>&nbsp;&mdash; Мгновенная постройка<br />\r\n<strong>dbg</strong>&nbsp;&mdash; Открывает меню отладки<br />\r\n<strong>addfresh</strong>&nbsp;&mdash; Добавить 20 шут | мясо, мозг, кровь<br />\r\n<strong>addstartfurniture</strong>&nbsp;&mdash; Добавляет 1 скамью и 1 дверь жертвы<br />\r\n<strong>addsmallfood</strong>&nbsp;&mdash; Добавляет 10 копченостей и 10 копченых голов<br />\r\n<strong>addxppoint</strong>&nbsp;&mdash; Уровень всех миньонов увеличить на +1<br />\r\n<strong>sendvictim</strong>&nbsp;&mdash; Немедленно отправляет выбранную рекламную кампанию / жертву<br />\r\n<strong>allweapon</strong>&nbsp;&mdash; Добавляет по одному очку из каждого оружия<br />\r\n<strong>allcosumable</strong>&nbsp;&mdash; Добавляет по 2 из каждого расходного материала / зелья<br />\r\n<strong>healall</strong>&nbsp;&mdash; Полностью исцеляет всех Миньонов<br />\r\n<strong>addresearchpoint</strong>&nbsp;&mdash; Добавляет 20 базовых и продвинутых банок исследования<br />\r\n<strong>Addevilium</strong>&nbsp;&mdash; Добавляет 10000 Evilium<br />\r\n<strong>allprecious</strong>&nbsp;&mdash; Добавляет 10 штук | золотые самородки, золотые монеты, печатные платы<br />\r\n<strong>allother</strong>&nbsp;&mdash; Выдаёт 10 паутины и 10 яда паука<br />\r\n<strong>unlockall</strong>&nbsp;&mdash; Разблокирует все исследовательские проекты<br />\r\n<strong>nofogofwar</strong>&nbsp;&mdash; Отключает туман войны и ограниченный вид<br />\r\n<br />\r\n<strong>addmoney</strong>&nbsp;&mdash; 7000 золота<br />\r\n<strong>addevilpoint</strong>&nbsp;&mdash; 1000 Evilium<br />\r\n<strong>addstone</strong>&nbsp;&mdash; 50 камней<br />\r\n<strong>addwood</strong>&nbsp;&mdash; 50 деревьев<br />\r\n<strong>addevilwood</strong>&nbsp;&mdash; Добавляет 50 злых пород дерева<br />\r\n<strong>addall</strong>&nbsp;&mdash; Добавляет 50 штук | Камень, Дерево, Злое дерево, Метал. Также добавляет 7000 золота<br />\r\n<strong>addfood</strong>&nbsp;&mdash; Добавляет 10 штук | сырое мясо, сырой мозг, кость, кровь, копченое мясо, копченый мозг, копченая кровь<br />\r\n<strong>addbasic</strong>&nbsp;&mdash; Добавляет 60 штук | копченое мясо, копченый мозг, копченая кровь.<br />\r\n<strong>adddemo</strong>&nbsp;&mdash; Добавляет 50 копченостей, 50 копченых голов, 160 злых пород дерева, 600 древесины, 1000 золота.</p>\r\n', '2', '2021-02-19', '', 'MACHIAVILLAIN: КОДЫ', 'MACHIAVILLAIN: КОДЫ', 0),
(3, 19, 'THE MEDIUM: ПРОХОЖДЕНИЕ', 'The Medium – мистическая адвенчура с видом от третьего лица, главной героиней которой является девушка-медиум по имени Марианна. Ей предстоит отправиться в партийный дом отдыха «Нива», чтобы разобраться в тайнах своего прошлого.\r\nПохоронное бюро\r\nПосле вступительного видеоролика The Medium вы окажетесь в квартире над похоронным бюро, где и завершится уровень. Во время исследования игровых локаций обращайте внимание на белые точки, которые по мере приближения превращаются в изображение «мыши». Так в игре помечаются интерактивные объекты, которые могут содержать важную информацию, предысторию или банальной декорацией (например, плакаты). Хотя в игре не предусмотрено достижение за обнаружение всех интерактивных объектов, часть из них все же придется осмотреть/собрать. Более того, есть ачивка, которая срабатывает только в том случае, если вы в рамках одного прохождения будете взаимодействовать не менее чем со 150 объектами.\r\n\r\nКак только получите контроль над Марианной, пройдите к журнальному столику, где расположен календарь. Изучите его, чтобы ознакомиться с ближайшими делами, которые запланировал приемный отец девушки. Когда закончите, жмите на Q, чтобы отойти, и идите к двойным дверям. Взаимодействуйте, чтобы выйти в коридор. Эта часть уровня посвящена многим основным механикам игры, включая взаимодействие с предметами, инвентарем и применение способностей Марианны.\r\n\r\nНайти зажим Джека\r\n\r\nПосле того как увидите в коридоре кошку, идите вперед. Дверь по левую сторону нельзя открыть, поскольку она ведет на выход, но вы еще не отыскали зажим для галстука Джека. Технически, это единственная цель, которую нужно достичь для продвижения по сюжету, но в вашем распоряжении целая квартира, полная другой информации, доступной для изучения. За первой дверью справа находится кухня. Здесь есть несколько объектов, включая пустую миску для кошачьего корма. Слева на прилавке есть банка с этим самым кормом. Заберите ее, вернитесь к миске и взаимодействуйте. Выберите кошачий корм, чтобы накормить кошку и получить достижение. На кухонном столе справа есть свежий выпуск местной газеты, в которой рассказывается о мировых событиях. Она также подтверждает, что события игры разворачиваются в 1999 году.\r\n\r\nПроявить фотографию\r\n\r\nИз кухни, как вы догадались, нужно заглянуть в комнату с красным светом – фотолабораторию. К стене с воздуховодом приклеена инструкция, которая объясняет процесс проявления фотографий.\r\n\r\n– Подсветить фото на 5 секунд\r\n\r\n– Погрузить фотографию в проявитель на 3 секунды\r\n\r\n– Погрузить фото в стоп-раствор на 3 секунды\r\n\r\n– Погрузить фото в фиксатор на 3 секунды\r\n\r\nЭто не последний раз, когда придется проявлять фотографии в The Medium, поэтому изучите механику досконально. Возьмите верхний белый листок из стопки бумаг на правой части стола. Затем разместите его на деревянной подставке под лампой для проявки. Следуйте инструкциям. Включите лампу и посчитайте 5 секунд. Можете прислушиваться к тому, как тикает механизм в устройстве. Когда придет время, выключите лампу, заберите фотографию и выполните следующие шаги. Добавьте фотоснимок в каждую ванночку с жидкостью, двигаясь справа налево. При этом в каждой из них фотография должна пробыть 3 секунды. Если вы достанете ее слишком быстро, Марианна прокомментирует этот момент, заявив, что нужно подождать чуть дольше. Если все сделано правильно, изменится название предмета в инвентаре. Продолжайте действия с каждой ванночкой, чтобы в итоге разблокировать предмет коллекционирования – фото Джека.\r\n\r\nЭто все, что можно отыскать в этих двух помещениях. Идите ко второй двери справа по коридору, чтобы оказаться в ванной комнате. Здесь особо и рассматривать-то нечего: только книгу «1984». Можете изучить ее, а после смело вернуться в коридор.\r\n\r\nНастало время двигаться в том направлении, на которое игра намекала ранее. Вернитесь к двери в первую комнату, где оказались после вступления, затем идите по коридору вглубь экрана и пройдите в открытое помещение по левую руку. Здесь вы увидите кота и разные предметы, напоминающие о Джеке. Изучив стену слева, вы сможете заглянуть в небольшую шкатулку, в которой должен лежать зажим для галстука. Но внутри ничего нет. В этот момент игра впервые расскажет вам об интуиции, которую может использовать Марианна. Зажмите левый CTRL, чтобы обнаружить очертания зажима за настольными часами. После этого вы сможете взаимодействовать с этими часами, чтобы сдвинуть их в сторону и забрать предмет. Не забывайте об этом умении, поскольку в некоторые моменты игра попросту не будет напоминать об интуиции, хотя она будет ой-как нужна!\r\n\r\nЕсли хотите продолжить сюжет, просто хватайте зажим и вернитесь к входной двери в другом конце коридора и выйдите из квартиры. Если желаете исследовать апартаменты, осмотрите коллекцию значков на стене слева. На столе Джека есть фотография его и Марианны, а на стене справа висят иконы. Выходите в коридор и воспользуйтесь двойной дверью в глубине экрана. Это бывшая спальня Марианны. Можете изучить коллекцию бабочек на левой стене, фотографию из приюта на столе и несколько предметов на комоде с зеркалом справа. Здесь вы начнете понимать, что «таланты» Марианны проявлялись уже с самого детства. А в три года она поступила в больницу после пожара, получив ожоги второй степени (35% кожи).', '3', '2021-02-17', '', '', '', 0),
(4, 18, 'CYBERPUNK 2077: КОДЫ', '<p><strong>Чтобы использовать эти команды, установите модификацию: &laquo;CyberConsole&raquo;</strong></p>\r\n\r\n<p><strong>Список модификаторов</strong><br />\r\nItems.Preset_Katana_Default<br />\r\nItems.Preset_Katana_Arasaka_2020<br />\r\nItems.Preset_Katana_Neon<br />\r\nItems.Preset_Katana_Military<br />\r\nItems.Preset_Katana_Cocktail<br />\r\nItems.Preset_Katana_Hiromi<br />\r\nItems.Preset_Katana_Takemura<br />\r\nItems.Preset_Katana_Saburo<br />\r\nItems.Preset_Katana_Surgeon<br />\r\nItems.q115_katana<br />\r\nItems.Q005_Johnny_Shirt<br />\r\nItems.Q005_Johnny_Glasses<br />\r\nItems.Q005_Johnny_Shoes<br />\r\nItems.Q005_Johnny_Pants<br />\r\nItems.WeaponMalfunctionLvl2Program<br />\r\nItems.WeaponMalfunctionLvl4Program<br />\r\nItems.LocomotionMalfunctionLvl2Program<br />\r\nItems.LocomotionMalfunctionLvl3Program<br />\r\nItems.LocomotionMalfunctionLvl4Program<br />\r\nItems.LocomotionMalfunctionProgram</p>\r\n\r\n<p><strong>Материалы для крафта</strong><br />\r\nItems.CommonMaterial1<br />\r\nItems.UncommonMaterial1<br />\r\nItems.EpicMaterial1<br />\r\nItems.LegendaryMaterial1<br />\r\nItems.LegendaryMaterial2<br />\r\nItems.QuickHackCommonMaterial1<br />\r\nItems.QuickHackEpicMaterial1<br />\r\nItems.QuickHackLegendaryMaterial1<br />\r\nItems.QuickHackRareMaterial1<br />\r\nItems.QuickHackUncommonMaterial1<br />\r\n<br />\r\n<strong>Рецепты для крафта</strong><br />\r\nItems.Recipe_Preset_Ajax_Moron (Moron Labe)<br />\r\nItems.Recipe_Preset_Burya_Comrade (Comrade&#39;s Hammer)<br />\r\nItems.Recipe_Preset_Copperhead_Genesis (Psalm 11:6)<br />\r\nItems.Recipe_Preset_Dian_Yinglong (Yinglong)<br />\r\nItems.Recipe_Preset_Nekomata_Breakthrough (Breakthrough)<br />\r\nItems.Recipe_Preset_Pulsar_Buzzsaw (Buzzsaw)<br />\r\nItems.Recipe_Preset_Tactician_Headsman (The Headsman)<br />\r\nItems.Recipe_Preset_Zhuo_Eight_Star (Ba Xing Chong)</p>\r\n', '6', '2021-02-16', '', 'Чтобы использовать эти команды, установите модификацию: «CyberConsole»', 'cyberpunk 2077: коды', 0);

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
  `date` date NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `author_id`, `author`, `text`, `table_name`, `table_row_id`, `date`, `active`) VALUES
(1, 1, 'admin', 'нормальный контент', 'news', 1, '2021-02-14', 1),
(2, 2, 'user', 'фыв ыа ыа ы аыв а', 'news', 2, '2021-02-14', 1),
(3, 6, 'pasipaka', 'фыв ыа ыа ы аыв аыаы', 'articles', 1, '2021-02-14', 1),
(30, 3, 'allex', 'sdfsdf sfsd fsdf fg sg dfg', 'blogs', 2, '2021-02-27', 1),
(31, 9, 'kuku}{a', 'орцапвкашфцукнгпцщжреагш3й4кцу', 'blogs', 2, '2021-02-28', 1),
(32, 3, 'allex', 'qqq  eef f \r\nrf r fr f', 'news', 3, '2021-02-28', 1),
(33, 3, 'allex', 'qd wd wef ef er f', 'articles', 9, '2021-02-28', 1),
(34, 3, 'allex', 'qdqwdwed we', 'articles', 9, '2021-02-28', 1),
(35, 3, 'allex', 'wedwe wf', 'articles', 9, '2021-02-28', 1),
(36, 3, 'allex', 'erferfer erf erf erf efr erf erf erf', 'blogs', 4, '2021-02-28', 1),
(37, 9, 'kuku}{a', 'hfkhgfk kfkhgfkhgfkhg f', 'news', 1, '2021-02-28', 1);

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
-- Структура таблицы `guids`
--

CREATE TABLE `guids` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `date` date NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `showSlider` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `cat_id`, `title`, `description`, `author`, `date`, `image`, `meta_desc`, `meta_keywords`, `showSlider`) VALUES
(1, 1, 'Геймплей boreal alyph — ещё одной фанатской игры по слитому сценарию half-life 2: episode three', 'Как показала Black Mesa, фанаты у Half-Life достаточно сумасшедшие, чтобы на голом энтузиазме создавать целые игры. Новым святым Граалем, который не даёт покоя сообществу, стали слитые наброски сюжета Half-Life 2: Episode Three от бывшего сценариста серии Марка Лэйдлоу (Marc Laidlaw). По их мотивам запустили разработку нескольких проектов, в том числе Boreal Alyph.\r\n\r\nИгрой занимается коллектив Keep Away From Fire. На сайте команды говорится, что в неё входит свыше 40 программистов, художников, сценаристов, дизайнеров уровней, актёров озвучивания и так далее. Всех энтузиастов объединяет желание творить и создавать проекты на Source — они даже получили лицензию на движок от Valve.', 1, '2021-02-12', '', '', '', 1),
(2, 11, 'Именитые разработчики называют самые ожидаемые игры на playstation', 'Блог PlayStation попросил лидеров известных студий назвать свои самые ожидаемые игры. Судя по всему, жёсткой привязки к году выхода не было: разработчики могли выбрать любую игру, даже если её дата релиза неизвестна. Да и указывать только одну фаворитку никто не требовал.\r\n\r\nDeathloop\r\nЭнтони Пеппер (Anthony Pepper), старший дизайнер Fall Guys: Ultimate Knockout:\r\n\r\nDishonored — одна из моих любимейших игр прошедшего десятилетия. Благодаря Dishonored я готов доверить Arkane Studios свою жизнь. Пока что всё, что я видел по Deathloop, разжигает во мне интерес — от боевой системы до стиля, ритма и задумки в центре сюжета. Я в деле.\r\n\r\nDeathloop также выбрали:\r\n\r\nСирилл Имберт (Cyrille Imbert), исполнительный продюсер Streets of Rage 4,\r\nНед Уотерхаус (Ned Waterhouse), дизайнер Sackboy: A Big Adventure,\r\nЛуис Стаддерт (Louis Studdert), продюсер Crash Bandicoot 4,\r\nДжейсон Чуан (Jason Chuang), старший менеджер по маркетингу Genshin Impact,\r\nКурт Марджено (Kurt Margenau), игровой соруководитель The Last of Us Part II,\r\nРеймон Рассел (Ramone Russell), специалист по коммуникациям в производстве и развитию бренда в MLB: The Show 20.', 1, '2021-02-11', '', '', '', 0),
(3, 1, 'В steam появились системные требования biomutant', 'На самом деле, в Steam уже давно были указаны минимальные системные требования приключенческого экшена Biomutant, но недавно их обновили и добавили рекомендуемые.\r\n\r\nМинимальные\r\nОперационная система: 64-разрядная Windows 7/8.1/10,\r\nпроцессор: AMD FX-8350 или Intel Core i5-4690K,\r\nвидеокарта: GeForce GTX 960 или Radeon R9 380,\r\nDirectX 11,\r\nоперативная память: 8 Гб,\r\nместо на накопителе: 25 Гб.\r\nРекомендуемые\r\nОперационная система: 64-разрядная Windows 10,\r\nпроцессор: AMD Ryzen 5 1600 или Intel Core i7-6700K,\r\nвидеокарта: GeForce GTX 1660Ti или Radeon RX 590,\r\nDirectX 11,\r\nоперативная память: 16 Гб,\r\nместо на накопителе: 25 Гб.', 1, '2021-02-13', '', '', '', 1),
(4, 7, 'Гигантский марио-кот против боузера — ролик к выходу super mario 3d world + bowser\'s fury', 'На Nintendo Switch запустилась Super Mario 3D World + Bowser\'s Fury — дополненная версия платформера с Wii U. Релизу посвящён соответствующий трейлер.\r\n\r\nSuper Mario 3D World + Bowser\'s Fury состоит из двух частей. 3D World — та самая игра родом с Wii U без кардинальных изменений. Марио проходит разнообразные уровни, управлять камерой при этом нельзя — она двигается самостоятельно. Bowser\'s Fury — новое приключение в составе ремастера; здесь водопроводчик исследует одну большую локацию, а камера двигается по велению пользователя, как, например, в Super Mario 64.\r\n\r\nНа StopGame.ru комплект получил высшую оценку — «Изумительно» и «Наш выбор». По мнению Алексея Лихачёва, 3D World и так шикарна, а замечательная Bowser\'s Fury превращает переиздание в настоящий подарок для ценителей платформеров в целом и серии Super Mario в частности.\r\n\r\nИгру можно приобрести в Nintendo eShop за 4 499 рублей.', 2, '2021-02-13', '', '', '', 0),
(5, 2, 'Дни бесплатной игры на xbox стартовали в warhammer: vermintide 2, nascar heat 5 и space crew', 'Подписчики Xbox Live Gold, встречайте очередные дни бесплатной игры на Xbox! В программе — Warhammer: Vermintide 2, NASCAR Heat 5 и Space Crew.\r\n\r\nАкция продлится до 14 февраля, 10:59 по Москве. В этот срок на игры также действуют скидки:\r\n\r\nWarhammer: Vermintide 2:\r\nстандартное издание — 29.99 7.49 доллара.\r\nNASCAR Heat 5:\r\nстандартное издание — 29.99 20.09 доллара,\r\nзолотое издание — 44.99 30.14 доллара.\r\nSpace Crew:\r\nстандартное издание — 21.49 14.39 доллара.', 2, '2021-02-15', '', '', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`id`, `date`) VALUES
(1, '2021-02-23');

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
  `date` date NOT NULL,
  `role` enum('admin','moderator','user') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `email`, `image`, `date`, `role`) VALUES
(1, 'admin', '$2y$10$wqwbbbdOlSbw3fC0MQqIZuAr0QVyyR9NA3JesV4egP/2nHlbIY5Dy', 'Админимтратор', 'admin@gameblog.ru', 'cyberpunk.jpg', '2021-02-02', 'admin'),
(2, 'user', '$2y$10$B3m3c1UzwOD6pMXIAnT9mO4AzuFL4ijdIw4SYbPksNXlnWLfGP.ny', 'Модератор', 'user@mail.ru', 'hitman.jpg', '2021-02-01', 'moderator'),
(3, 'allex', '$2y$10$iOcT4kSKbOhmUXBK5Z1yDeWWCRGASB5QNic8Rku5azPeO5Om7pe/C', 'Алексей', 'all@mail.by', '1614534685kyberPunk.jpg', '2021-01-11', 'user'),
(6, 'pasipaka', '$2y$10$sqjjihy3m6L45wMgwW4Kx.dgBXYcd2X7AzWkgDq2HhudadzPhfOGy', 'pasipaka', 'pasipaka@mail.ru', '', '2020-11-10', 'user'),
(9, 'kuku}{a', '$2y$10$TUQbOcKWoL9Owdr0Rplg1eMZ3VndR1S7oIO1KnKfEKKlSgU2uTNZm', 'Кукуха', 'kukuxa@mail.ru', '1614534764kyberPunk.jpg', '2021-02-28', 'user');

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
(1, '127.0.0.1', 'news', 5, 69),
(2, '127.0.0.1', 'news', 4, 16),
(4, '127.0.0.1', 'news', 2, 10),
(5, '127.0.0.1', 'cheats', 2, 20),
(6, '127.0.0.1', 'cheats', 1, 10),
(7, '127.0.0.1', 'news', 1, 43),
(8, '127.0.0.1', 'cheats', 4, 66),
(9, '127.0.0.1', 'news', 3, 15),
(10, '127.0.0.1', 'articles', 1, 7),
(11, '127.0.0.1', 'articles', 3, 3),
(12, '127.0.0.1', 'cheats', 3, 7),
(13, '127.0.0.1', 'news', 0, 3),
(15, '127.0.0.1', 'news', 51, 2),
(16, '127.0.0.1', 'articles', 41, 1),
(17, '127.0.0.1', 'articles', 12, 1),
(18, '127.0.0.1', 'news', 52, 1),
(19, '127.0.0.1', 'articles', 2, 1),
(20, '127.0.0.1', 'cheats', 43, 1),
(21, '127.0.0.1', 'news', 6, 6),
(22, '127.0.0.1', 'news', 7, 1),
(36, '127.0.0.1', 'blogs', 2, 47),
(37, '127.0.0.1', 'blogs', 1, 5),
(39, '127.0.0.1', 'articles', 9, 11),
(40, '127.0.0.1', 'blogs', 4, 4),
(41, '127.0.0.1', 'articles', 6, 1);

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
-- Индексы таблицы `guids`
--
ALTER TABLE `guids`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `test`
--
ALTER TABLE `test`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `cheats`
--
ALTER TABLE `cheats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `guids`
--
ALTER TABLE `guids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
