-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 08 2017 г., 20:43
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
CREATE DATABASE IF NOT EXISTS `cloudcomp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cloudcomp`;

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
(1, 'Синкретизм 1', 'Синкретизм мифа — слитность в одном целом зачатков всех форм духовного освоения мира — искусства, религии, морали и др. Синкретическая природа мифологии послужила исходной категориально-смысловой базой и первичным художественно переработанным материалом для всех последующих явлений духовного производства, и в сфере словесного творчества (сказка, легенда, историческое предание, эпос), \nПрозрачность мифологического сознания проявляется в том, что представленная в мифе картина мира полностью отождествляется первобытным человеком с самой реальностью; индивид наивно верит в то, что вещи и явления окружающего мира именно таковы, какими они выглядят в мифологической интерпретации.\n\nПрозрачность мифа означает, что человек видит мир через призму существующих мировоззренческих представлений, при этом сама эта призма, подобно стеклам оптического прибора, никак не воспринимается. Другими словами, концептуально-смысловая сторона мифа полностью элиминирована из самосознания субъекта.\n\nОтсюда: не существует никакого &quot;зазора&quot;, никакого несовпадения, противоречия между мифом и реальностью. Прозрачность мифа позволяет ответить на кардинальный для функционирования любого типа мировоззрения вопрос: каким образом в данной системе мировоззрения обеспечивается стабильность и убедительность. Никакая мировоззренческая система не может существовать, не располагая основаниями убедительности. ', '0000-00-00'),
(3, 'Облачные вычисления: ожидания и реальность', 'Такие термины, как “облака” и “облачные вычисления” с начала нулевых начали достаточно часто употребляться широкой публикой и активно форситься IT-стартаперами. Для многих эти понятия являются абстрактными и размытыми. Давайте же разберемся, что же, конкретно, такое - облачные вычисления.\n\nОблачные вычисления — расхожий термин, который определяется в авторитетных источниках примерно следующим образом:\n\nОблачные вычисления — это принцип (модель), согласно которому вычислительные ресурсы, такие как сервера, устройства хранения и обработки данных (или же сервисы, программы — в других источниках) предоставляются по запросу со стороны клиента, предоставляются с использованием сетевого соединения.\nПри этом есть несколько характеристик, которыми система должна обладать для признания ее облачной. Вот самые распространенные из них:\n\n   1. Одни и те же ресурсы (услуги, данные) можно получить вне зависимости от того, каким устройством и в каком узле сети пользуется клиент;\n   2. Возможность клиента определять объем ресурсов, которые он использует;\n   3. Расчет цены в зависимости от объема используемых услуг;\n   4. Эластичность — возможность для клиента в любой момент изменить объем используемых им ресурсов в автоматическом режиме;\n   5. Наличие у сервиса, предоставляющего вычислительные услуги, API.\n   6. Объединение ресурсов, распределяемых между клиентами, в одну систему.\n\n \n\nТакже зачастую выделяют три варианта, три модели сервисов (англ. service — услуг, служб) в облаках:\n1. IaaS — инфраструктура в виде сервиса. Инфраструктура эта состоит из всех необхоимых для ЭВМ частей и предоставляется таким образом, что может быть кастомизирована почти как железо в виде компьютера. Естественно, она подается в абстрактном виде — после виртуализации.\n2. PaaS — платформа в виде сервиса. В этом случае клиент работает с системой на более высоком уровне. Если сравнивать эти два сервиса со стандартными сервисами хостинга, то разницу между PaaS и IaaS можно представить как разницу между обычным виртуальным хостингом и VDS.\n3. SaaS — программное обеспечение в виде сервиса. Пользователю предоставляются только реализованные в рамках программы-сервиса возможности.\n\nА теперь давайте посмотрим на то, как все это выглядит на практике.\n\nРазнообразные институты и консорциумы формулируют свои, зачастую похожие, определения и признаки облачных вычислений/технологий. Однако, от этого облака не становятся физически осязаемыми или стандартизированными для всех и каждого: они ведь находятся на очень высоком уровне абстракции работы с битами.\n\nВнимательный читатель заметит, что границы между тремя моделями сервисов в облаках очень размыты. Например, один и тот же сервис компания может позиционировать и как платформу и как ПО: сервисы по передаче и обработке информации на подобие push или e-mail сообщений являются, с одной стороны программами, с другой — платформами. А инфраструктура, предоставляемая в облаке, в любом случае, получена путем виртуализации и иногда может вполне тянуть на платформу.\n\nЗаметим, что слово “вычисления” в контексте облаков употребляются не как название математических операций. В английском варианте обозначения “облачные вычисления” используется слово computing, которое имеет немного отличный от нашего аналога смысловой оттенок.\n\nТеперь давайте вернемся к вышеперечисленным обязательным характеристикам, которыми должны обладать облачные вычисления.\n\nПервая из характеристик, возможность доступа к ресурсам из любого места и с любого устройства, в принципе, является характеристикой интернета в целом. Идем дальше.\nВторой пункт: возможность для клиента определять объем используемых им ресурсов. Очевидно, что клиент может определить объем в каком-то приближении: не до единиц в битах и герцах. Сервисы предоставляют клиентам некоторый набор возможных конфигураций или пакетов. И, даже если этот пакет один, есть два варианта на выбор: пользоваться сервисом, или нет — и это тоже будет определением объема используемых ресурсов со стороны пользователя.\nТретий пункт говорит нам по сути то, что у сервиса есть разные тарифы. По аналогии со вторым пунктом, для реализации облака нам будет достаточно одного тарифа.\nЧетвертый пункт: эластичность. При использовании любого сервиса у клиента есть возможность сменить тариф/пакет услуг. Но, конечно же, автоматически это делается не в каждом из них.\nПятый пункт, наличие API. Система выдачи сайтом разных страниц по разным адресам также считается реализацией API. Так что, если у вас есть сайт — вы тоже, от части, предоставляете облачные услуги.\nВ шестом пункте говорится об объединении серверов в случае c IaaS, или о единых функциях сервиса, которые могут вызывать разные пользователи.\n\nТаким образом, для того чтобы назвать свой сервис облачным достаточно реализовать только то, что написано в третьем пункте из списка обязательных характеристик. А именно: автоматизировать выбор тарифов и прием платежей. Остальные же требования к облакам будут для SaaS-систем, почти всегда, выполняться по умолчанию.\n\nКонечно же, кроме Всемирной паутины есть еще и интранет-системы, для которых эти признаки не актуальны. Но в таком случае окажется, что принцип перенесения вычислений в т.н. «облако» используется для реализации исследований и вычислений чуть ли не с начала истории ЭВМ.\nЗаметьте, под первоначальное определение ресурсов, которые реализуют модель облачных вычислений, подходят все ресурсы в сети Интернет, если не фильтровать их характеристиками.', '2017-06-08'),
(4, 'statya', 'средства бизнес-аналитики\n\nПрограммные средства, которые извлекают данные из бизнес-систем и интегрируют их в репозиторий, например хранилище данных, в котором данные можно анализировать. Средства аналитики включают как электронные таблицы со статистическими функциями, так и сложные средства интеллектуального анализа данных и прогнозного моделирования.\n\n\nсредства бизнес-аналитики (BI)\n\nПрограммные средства, которые обрабатывают большие объемы неструктурированных данных в книгах, журналах, документах, отчетах о состоянии здоровья, изображениях, файлах, электронных сообщениях, видео и так далее, помогают находить значимые тенденции и выявлять новые возможности для бизнеса.\n\n\nоблако\n\nМетафора, обозначающая глобальную сеть. Ранее ее использовали по отношению к телефонной сети, а теперь — к Интернету.\n', '2017-06-08');

-- --------------------------------------------------------

--
-- Структура таблицы `companies`
--

CREATE TABLE `companies` (
  `id` int(4) NOT NULL,
  `company_name` varchar(40) NOT NULL,
  `company_description` tinytext NOT NULL,
  `year` year(4) NOT NULL,
  `site` varchar(40) NOT NULL,
  `logo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `company_description`, `year`, `site`, `logo`) VALUES
(1, 'asdasd', 'asd', 1971, 'asda', ''),
(2, 'tata', 'opa', 2015, 'tetet', ''),
(3, 'sddf', 'sdfsd', 1971, 'sdf', ''),
(4, 'asd', 'sds', 1971, 'asd', ''),
(5, 'ssdfsdf', 'dsfdsfd', 1973, 'sdfsdfsd', '7833f038a7408ef1e296b3887aa1f3c9.png'),
(6, 'fghfg', 'fghfgh', 1973, 'fghfg', '');

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
  MODIFY `ID_article` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
