-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Мар 11 2023 г., 20:35
-- Версия сервера: 5.7.35-cll-lve
-- Версия PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cwqkudzo_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tranzactions`
--

CREATE TABLE `tranzactions` (
  `id` int(11) NOT NULL,
  `first_ps` varchar(255) CHARACTER SET utf8 NOT NULL,
  `second_ps` varchar(255) CHARACTER SET utf8 NOT NULL,
  `amount_first` varchar(255) CHARACTER SET utf8 NOT NULL,
  `amount_second` varchar(255) CHARACTER SET utf8 NOT NULL,
  `wallet` varchar(255) CHARACTER SET utf32 NOT NULL,
  `contact` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 -  создана 1 - оплачена (кнопка я оплатил) 2- выведена)'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tranzactions`
--

INSERT INTO `tranzactions` (`id`, `first_ps`, `second_ps`, `amount_first`, `amount_second`, `wallet`, `contact`, `date`, `status`) VALUES
(1, 'BITCOIN (BTC)', 'ETHEREUM (ETH)', '0.01244', '0.17802', 'qqqqqqqqqqqqqqqq', 'test@mail.ru', 1103, 0),
(2, 'BITCOIN (BTC)', 'ETHEREUM (ETH)', '1', '14.3208', 'qqqqqqqqqqqqqqqq', 'test@mail.ru', 1103, 0),
(3, 'BITCOIN (BTC)', 'ETHEREUM (ETH)', '2', '28.6212', 'wefwefwefwef', 'test@mail.ru', 1103, 0),
(4, 'BITCOIN (BTC)', 'ETHEREUM (ETH)', '2', '28.6212', 'wefwefwefwef', 'test@mail.ru', 1103, 0),
(5, 'BITCOIN (BTC)', 'ETHEREUM (ETH)', '2', '28.6212', 'wefwefwefwef', 'test@mail.ru', 1103, 0),
(6, 'BITCOIN (BTC)', 'ETHEREUM (ETH)', '2', '28.6212', 'wefwefwefwef', 'test@mail.ru', 1103, 0),
(7, 'BITCOIN (BTC)', 'ETHEREUM (ETH)', '2', '28.6212', 'wefwefwefwef', 'test@mail.ru', 1103, 0),
(8, 'BITCOIN (BTC)', 'ETHEREUM (ETH)', '0.01245', '0.17817', 'eeeeeeeeeee', 'eeee@mail.ru', 1103, 0),
(9, 'BITCOIN (BTC)', 'ETHEREUM (ETH)', '0.01245', '0.17817', 'eeeeeeeeeee', 'eeee@mail.ru', 1678553640, 0),
(10, 'BITCOIN (BTC)', 'ETHEREUM (ETH)', '0.01245', '0.17817', 'eeeeeeee', 'mail.r@mail.ru', 1678553700, 0),
(11, 'BITCOIN (BTC)', 'ETHEREUM (ETH)', '0.01245', '0.17817', 'eeeeeeee', 'mail.r@mail.ru', 1678553700, 0),
(12, 'BITCOIN (BTC)', 'ETHEREUM (ETH)', '0.01245', '0.17817', 'eeeeeeee', 'mail.r@mail.ru', 1678553700, 0),
(13, 'BITCOIN (BTC)', 'ETHEREUM (ETH)', '0.01245', '0.17804', '11111111111111', 'test@mail.ru', 1678553700, 0),
(1477201159, 'POLYGON (MATIC)', 'ETHEREUM (ETH)', '246.54832', '0.17817', 'ertyuiuytre', 'test@mail.ru', 1678556760, 0),
(1477201160, 'POLYGON (MATIC)', 'ETHEREUM (ETH)', '246.54832', '0.17817', 'ertyuiuytre', 'test@mail.ru', 1678556820, 0),
(1477201161, 'BITCOIN (BTC)', 'ETHEREUM (ETH)', '0.052', '0.74097', 'цуцуауацуацуацуа', 'test@maik.ru', 1678558140, 0),
(1477201162, 'BITCOIN (BTC)', 'ETHEREUM (ETH)', '0.01235', '0.17611', 'цуацуаау', 'wefwe@mail.ru', 1678558320, 0),
(1477201163, 'BITCOIN (BTC)', 'ETHEREUM (ETH)', '0.01233', '0.1757', 'ewfffffffffffffffffffffffff', 'test@mail.ru4', 1678558800, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(1) NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL,
  `pass` char(32) NOT NULL DEFAULT '',
  `hash` varchar(255) NOT NULL,
  `ip` char(15) NOT NULL DEFAULT '',
  `status` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `user`, `pass`, `hash`, `ip`, `status`) VALUES
(1, 'kirilandrejev799@gmail.com', 'socol', 'socol', '8f3fb2635131a5313da6f5e1eeea0c14', '188.130.178.27', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `wallet` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wallet`
--

INSERT INTO `wallet` (`id`, `name`, `wallet`) VALUES
(1, 'BITCOIN (BTC)', 'crypto_adds'),
(2, 'ETHEREUM (ETH)', 'crypto_add'),
(3, 'BINANCE COIN (BNB)', 'crypto_add'),
(4, 'SOLANA (SOL)', 'crypto_add'),
(5, 'RIPPLE (XRP)', 'crypto_add'),
(6, 'MONERO (XMR)', 'crypto_add'),
(7, 'TRON (TRX)', 'crypto_add'),
(8, 'DASH (DASH)', 'crypto_add'),
(9, 'LITECOIN (LTC)', 'crypto_add'),
(10, 'STELLAR (XLM)', 'crypto_add'),
(11, 'DOGECOIN (DOGE)', 'crypto_add'),
(13, 'CARDANO (ADA)', 'crypto_add'),
(14, 'TETHER (USDT)', 'crypto_add'),
(15, 'SHIBA INU (SHIB)', 'crypto_add'),
(16, 'POLYGON (MATIC)', 'crypto_add');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tranzactions`
--
ALTER TABLE `tranzactions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login` (`login`),
  ADD KEY `login_2` (`login`),
  ADD KEY `user` (`user`),
  ADD KEY `id` (`id`);
ALTER TABLE `users` ADD FULLTEXT KEY `login_3` (`login`);

--
-- Индексы таблицы `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tranzactions`
--
ALTER TABLE `tranzactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1477201164;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2237;

--
-- AUTO_INCREMENT для таблицы `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
