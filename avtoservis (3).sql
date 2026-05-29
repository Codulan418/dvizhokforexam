-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 21 2026 г., 11:31
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `avtoservis`
--

-- --------------------------------------------------------

--
-- Структура таблицы `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `text1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `about`
--

INSERT INTO `about` (`id`, `text1`, `text2`, `text3`, `img`) VALUES
(1, 'Мы — современный автосервис, предоставляющий услуги по диагностике, ремонту и техническому обслуживанию автомобилей. Наша команда сочетает профессиональный подход, качественное оборудование и внимательное отношение к каждому клиенту.', 'Мы стремимся сделать обслуживание автомобиля надёжным, понятным и комфортным. Все работы выполняются опытными специалистами с соблюдением сроков и стандартов качества. Для нас важно не только устранить неисправность, но и обеспечить безопасность и уверенность на дороге.', 'Мы ценим доверие клиентов, поэтому придерживаемся прозрачности на каждом этапе работы — от диагностики до завершения ремонта.', 'car-onas.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `advantages`
--

CREATE TABLE `advantages` (
  `id` int(11) NOT NULL,
  `img` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `advantages`
--

INSERT INTO `advantages` (`id`, `img`, `name`, `text`) VALUES
(1, 'car_rental.svg', 'Качественный ремонт', 'Мы используем проверенные технологии и современное оборудование, что позволяет точно выявлять неисправности и выполнять работы на высоком уровне.'),
(2, 'badge.svg', 'Опытные специалисты', 'В нашем сервисе работают мастера с практическим опытом, которые регулярно повышают квалификацию и знают особенности различных марок автомобилей.'),
(3, 'price_change.svg', 'Прозрачные цены', 'Перед началом работ мы подробно согласовываем стоимость и объём услуг. Вы всегда понимаете, за что платите — без скрытых платежей и неожиданных доплат.'),
(4, 'calendar.svg', 'Соблюдение сроков', 'Мы ценим ваше время и строго придерживаемся оговорённых сроков. Все работы выполняются точно в назначенное время.'),
(5, 'sweep.svg', 'Гарантия на услуги', 'На все выполненные работы предоставляется гарантия, что подтверждает качество нашего сервиса и уверенность в результате.'),
(6, 'workspace.svg', 'Индивидуальный подход', 'Мы учитываем особенности каждого автомобиля и подбираем оптимальные решения, исходя из его состояния и потребностей клиента.');

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `phone` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_hours` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `login` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `login`, `email`, `message`, `created`) VALUES
(1, 'Максим', 'mkirienkov120908@gmail.com', 'Какое то например сообщение', '2026-05-07 12:58:46');

-- --------------------------------------------------------

--
-- Структура таблицы `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_brand` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_year` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `comment` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `login` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_approved` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `login`, `text`, `rating`, `is_approved`, `created`) VALUES
(14, 'admin', 'Отзвыв', '3', '1', '2026-05-13 17:55:13'),
(15, 'User.1', 'Спасибо, шиномонтаж просто супер, сделали все быстро и оперативно!', '5', '1', '2026-05-18 09:46:54'),
(16, 'User.2', 'Очень вежливый персонал, приехал заменить масло, все объяснили все сделали супер', '5', '1', '2026-05-18 09:48:03'),
(17, 'User.3', 'Все супер, но немного показалось дорогова-то', '4', '1', '2026-05-18 09:48:48'),
(18, 'User.4', 'Все сделали супер!', '5', '1', '2026-05-18 09:57:19'),
(19, 'admin', 'Тестовый отзыв', '4', '3', '2026-05-18 20:07:54'),
(20, 'User.5', 'Все сделали супер!', '5', '0', '2026-05-18 20:13:45');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'user'),
(2, 'admin'),
(3, 'moderator');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `type` enum('Профилактика','Ремонт','Доп.услуги') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `popular` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `price`, `type`, `image`, `popular`) VALUES
(1, 'Замена моторного масла', 'Полная замена масла с промывкой двигателя', 3500, 'Профилактика', 'oil.jpg', 1),
(2, 'Диагностика ходовой части', 'Комплексная проверка амортизаторов', 1800, 'Профилактика', 'diagnostics.jpg', 1),
(3, 'Регулировка развал-схождения', 'Компьютерная корректировка углов', 2500, 'Профилактика', 'collapse-convergence.jpg', 0),
(4, 'Замена тормозной жидкости', 'Вакуумная прокачка системы', 2200, 'Профилактика', 'brake_fluid.jpg', 1),
(5, 'Чистка инжектора', 'Ультразвуковая промывка форсунок', 4000, 'Профилактика', 'injector.jpg', 1),
(6, 'Замена сцепления', 'Демонтаж КПП, замена диска', 12000, 'Ремонт', 'clutch.jpg', 0),
(7, 'Ремонт ГРМ', 'Замена цепи ГРМ, натяжителя', 9500, 'Ремонт', 'grm.jpg', 0),
(8, 'Замена тормозных колодок и дисков', 'Комплексная замена колодок и дисков', 6800, 'Ремонт', 'brake.jpg', 0),
(9, 'Ремонт генератора', 'Замена щеток, подшипников', 3200, 'Ремонт', 'generator.jpg', 0),
(10, 'Устранения течи масла', 'Замена сальников коленвала', 5000, 'Ремонт', 'engine_oil.jpg', 0),
(11, 'Установка доп освещения', 'Монтаж противотуманных фар', 3900, 'Доп.услуги', 'lighting.jpg', 0),
(12, 'Антикоррозийная обработка днища', 'Нанесение полимерно-битумного состава', 7500, 'Доп.услуги', 'bottom.jpg', 0),
(13, 'Чистка салона', 'Глубокая чистка обивки сидений', 4500, 'Доп.услуги', 'cleaning_salona.jpg', 0),
(14, 'Полировка кузова', 'Восстановление ЛКП', 6500, 'Доп.услуги', 'polishing.jpg', 0),
(15, 'Шумоизоляция арок и багажника', 'Оклейка виброматериалами', 8000, 'Доп.услуги', 'noise_insulation.jpg', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `description` varchar(512) NOT NULL,
  `link` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `slider`
--

INSERT INTO `slider` (`id`, `title`, `description`, `link`, `image`) VALUES
(1, 'Статус требует подхода', 'Профессиональный сервис для премиальных автомобилей', 'record.php', '123.jpg'),
(2, 'Мойка кузова + химчистка салона = скидка 30%', 'Комплексный уход за вашим автомобилем за один визит', '#', 'car-test.jpg'),
(3, 'Шиномонтаж + балансировка = 1500₽', 'Для колёс R16–R18. Акция действует до конца месяца', '#', 'orig.jpg'),
(4, 'Эвакуатор 0₽ до автосервиса', 'При любом ремонте от 10 000₽', '#', '125.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `img` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speciality` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `staff`
--

INSERT INTO `staff` (`id`, `img`, `name`, `speciality`, `experience`) VALUES
(1, 'nikolay.jpg', 'Николай', 'Автослесарь', 'Стаж: 8 лет'),
(2, 'evgeniy.jpg', 'Евгений', 'Моторист', 'Стаж: 5 лет'),
(3, 'sergey.jpg', 'Сергей', 'Агрегатчик', 'Стаж: 4 года'),
(4, 'vladimir.jpg', 'Владимир', 'Автомаляр', 'Стаж: 3 года');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_hash` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password_hash`, `role_id`, `created_at`) VALUES
(6, 'admin', 'admin@gmail.com', '$2y$10$BZYXXW3l.7IR0fcTWEIG7OhY3zI/r/tgjm7ZHt8pumz01BcSq3rZC', 2, '2026-05-13 12:30:43'),
(7, 'User.1', 'user1@pohta.ru', '$2y$10$SfRiGK.ns62AA7bRITSFBe/uCcsOW7YV2tsB9tgVeCsWM4j961kMW', 3, '2026-05-18 09:42:36'),
(8, 'User.2', 'user2@pohta.ru', '$2y$10$CNhI/ZAphE/u5CBj8O98x.oQLFaON.7fjkyNGiu8iud.81GkJt0.O', 1, '2026-05-18 09:43:40'),
(9, 'User.3', 'user3@pohta.ru', '$2y$10$FtLP.m.vMK8TgV8z489DWe9IZe5/xVNmH.DC/YBXi068Q4tb6hZAa', 1, '2026-05-18 09:44:19');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `advantages`
--
ALTER TABLE `advantages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `advantages`
--
ALTER TABLE `advantages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
