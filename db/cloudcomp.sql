-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 07 2017 г., 18:43
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cloudcomp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `ID_article` int(20) NOT NULL,
  `article_title` text NOT NULL,
  `article_content` longtext NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`ID_article`, `article_title`, `article_content`, `date`) VALUES
(1, 'Синкретизм 1', 'Синкретизм мифа — это слитность в одном целом зачатков всех форм духовного освоения мира — искусства, религии, морали и др. Синкретическая природа мифологии послужила исходной категориально-смысловой базой и первичным художественно переработанным материалом для всех последующих явлений духовного производства, и в сфере словесного творчества (сказка, легенда, историческое предание, эпос), \nПрозрачность мифологического сознания проявляется в том, что представленная в мифе картина мира полностью отождествляется первобытным человеком с самой реальностью; индивид наивно верит в то, что вещи и явления окружающего мира именно таковы, какими они выглядят в мифологической интерпретации.\n\nПрозрачность мифа означает, что человек видит мир через призму существующих мировоззренческих представлений, при этом сама эта призма, подобно стеклам оптического прибора, никак не воспринимается. Другими словами, концептуально-смысловая сторона мифа полностью элиминирована из самосознания субъекта.\n\nОтсюда: не существует никакого \"зазора\", никакого несовпадения, противоречия между мифом и реальностью. Прозрачность мифа позволяет ответить на кардинальный для функционирования любого типа мировоззрения вопрос: каким образом в данной системе мировоззрения обеспечивается стабильность и убедительность. Никакая мировоззренческая система не может существовать, не располагая основаниями убедительности. ', '0000-00-00'),
(2, 'Синкретизм', 'Синкретизм мифа — это слитность в одном целом зачатков всех форм духовного освоения мира — искусства, религии, морали и др. Синкретическая природа мифологии послужила исходной категориально-смысловой базой и первичным художественно переработанным материалом для всех последующих явлений духовного производства, и в сфере словесного творчества (сказка, легенда, историческое предание, эпос), \nПрозрачность мифологического сознания проявляется в том, что представленная в мифе картина мира полностью отождествляется первобытным человеком с самой реальностью; индивид наивно верит в то, что вещи и явления окружающего мира именно таковы, какими они выглядят в мифологической интерпретации.\n\nПрозрачность мифа означает, что человек видит мир через призму существующих мировоззренческих представлений, при этом сама эта призма, подобно стеклам оптического прибора, никак не воспринимается. Другими словами, концептуально-смысловая сторона мифа полностью элиминирована из самосознания субъекта.\n\nОтсюда: не существует никакого \"зазора\", никакого несовпадения, противоречия между мифом и реальностью. Прозрачность мифа позволяет ответить на кардинальный для функционирования любого типа мировоззрения вопрос: каким образом в данной системе мировоззрения обеспечивается стабильность и убедительность. Никакая мировоззренческая система не может существовать, не располагая основаниями убедительности. ', '0000-00-00');

-- --------------------------------------------------------

--
-- Структура таблицы `companies`
--

CREATE TABLE `companies` (
  `id` int(4) NOT NULL,
  `company_name` varchar(40) NOT NULL,
  `company_description` tinytext NOT NULL,
  `year` year(4) NOT NULL,
  `site` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(5) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `date`, `title`, `text`) VALUES
(1, '2017-05-04', 'asa', 'asdasdasd'),
(2, '2017-05-04', 'Article', 'Content'),
(3, '2017-06-07', 'werwer', 'werwer');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) UNSIGNED NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` binary(32) NOT NULL,
  `Role` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`User_ID`, `Username`, `Password`, `Role`) VALUES
(1, 'user1', 0x3161316463393163393037333235633639323731646466306339343462633732, 0),
(2, 'user2', 0x6331353732643035343234643065636232613635656336613832616561636266, 0),
(3, 'user3', 0x6331353732643035343234643065636232613635656336613832616561636266, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ID_article`);

--
-- Индексы таблицы `companies`
--
ALTER TABLE `companies`
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
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `User_ID` (`User_ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `ID_article` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
