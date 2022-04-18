-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 19 2022 г., 02:17
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `session_id` text NOT NULL,
  `users_id` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `product_id`, `price`, `quantity`, `session_id`, `users_id`) VALUES
(92, 3, 180, 1, 'crgo6k26mjbrm6umsgphnih05hbma26u', 2),
(93, 3, 180, 1, 'crgo6k26mjbrm6umsgphnih05hbma26u', 2),
(94, 2, 150, 1, 'crgo6k26mjbrm6umsgphnih05hbma26u', 2),
(95, 1, 200, 1, 'crgo6k26mjbrm6umsgphnih05hbma26u', 2),
(96, 1, 200, 1, 'j4ral797thp0sk2svlbp8s1c27a31sv0', 2),
(97, 2, 150, 1, 'j4ral797thp0sk2svlbp8s1c27a31sv0', 2),
(98, 1, 200, 1, 'j4ral797thp0sk2svlbp8s1c27a31sv0', 2),
(99, 3, 180, 1, 'j4ral797thp0sk2svlbp8s1c27a31sv0', 2),
(100, 5, 800, 1, 'j4ral797thp0sk2svlbp8s1c27a31sv0', 2),
(101, 1, 200, 1, 'r6ge1ononlspb9m8mfj5c1dm5mqshadf', 1),
(102, 2, 150, 1, 'r6ge1ononlspb9m8mfj5c1dm5mqshadf', 1),
(103, 2, 150, 1, '0l0r7cvfaekdqqfeesaq4uqqidav2fif', 2),
(104, 1, 200, 1, '0l0r7cvfaekdqqfeesaq4uqqidav2fif', 2),
(105, 2, 150, 1, '5lc1suqhhmq55peg8jjavsoal0mtcmgu', 0),
(106, 3, 180, 1, '5lc1suqhhmq55peg8jjavsoal0mtcmgu', 0),
(107, 2, 150, 1, '5lc1suqhhmq55peg8jjavsoal0mtcmgu', 0),
(108, 3, 180, 1, 'ec3f5afj7iegiapl4kk4v84cnn0o8b6a', 0),
(109, 2, 150, 1, 'ec3f5afj7iegiapl4kk4v84cnn0o8b6a', 0),
(110, 4, 160, 1, 'ec3f5afj7iegiapl4kk4v84cnn0o8b6a', 0),
(111, 3, 180, 1, 'pe2ieb6tbee0vj2sd9t1g01ni96srval', 2),
(112, 2, 150, 1, 'smdnofobot7trhfjqu36n4sij2lnukoi', 0),
(113, 2, 150, 1, 'smdnofobot7trhfjqu36n4sij2lnukoi', 0),
(114, 2, 150, 1, 'smdnofobot7trhfjqu36n4sij2lnukoi', 0),
(115, 2, 150, 1, 'smdnofobot7trhfjqu36n4sij2lnukoi', 0),
(116, 2, 150, 1, 'smdnofobot7trhfjqu36n4sij2lnukoi', 0),
(117, 2, 150, 1, 'smdnofobot7trhfjqu36n4sij2lnukoi', 0),
(118, 3, 180, 1, 'smdnofobot7trhfjqu36n4sij2lnukoi', 0),
(119, 3, 180, 1, 'smdnofobot7trhfjqu36n4sij2lnukoi', 0),
(120, 2, 150, 1, 'smdnofobot7trhfjqu36n4sij2lnukoi', 0),
(121, 3, 180, 1, 'smdnofobot7trhfjqu36n4sij2lnukoi', 0),
(122, 3, 180, 1, 'smdnofobot7trhfjqu36n4sij2lnukoi', 0),
(123, 1, 200, 1, 'smdnofobot7trhfjqu36n4sij2lnukoi', 0),
(129, 2, 150, 1, 'ejtj2vp4tbb8g94b0bm3204n5533mdb4', 0),
(135, 2, 150, 1, 'ejtj2vp4tbb8g94b0bm3204n5533mdb4', 0),
(136, 2, 150, 1, 'ejtj2vp4tbb8g94b0bm3204n5533mdb4', 0),
(141, 2, 150, 1, 'ejtj2vp4tbb8g94b0bm3204n5533mdb4', 0),
(142, 2, 150, 1, 'ejtj2vp4tbb8g94b0bm3204n5533mdb4', 2),
(143, 3, 180, 1, 'ejtj2vp4tbb8g94b0bm3204n5533mdb4', 2),
(144, 3, 180, 1, '5rdu370vbsf82spqvfqj5k5u0uovel1k', 0),
(152, 2, 150, 1, '5rdu370vbsf82spqvfqj5k5u0uovel1k', 0),
(162, 7, 125, 1, '5rdu370vbsf82spqvfqj5k5u0uovel1k', 0),
(163, 2, 150, 1, '5rdu370vbsf82spqvfqj5k5u0uovel1k', 0),
(164, 2, 150, 1, '5rdu370vbsf82spqvfqj5k5u0uovel1k', 0),
(165, 6, 125, 1, '5rdu370vbsf82spqvfqj5k5u0uovel1k', 0),
(166, 1, 200, 1, 'f6vs9299d2cjvtqjhbljls0j105agdnl', 2),
(167, 2, 150, 1, 'f6vs9299d2cjvtqjhbljls0j105agdnl', 2),
(168, 3, 180, 1, 'ok4sfok6hlrt8g38rcmdencgdbma3ted', 2),
(169, 2, 150, 1, 'ok4sfok6hlrt8g38rcmdencgdbma3ted', 2),
(170, 2, 150, 1, 'oue2drf890mnd6mldf21ocggeiltmfh2', 1),
(171, 3, 180, 1, 'oue2drf890mnd6mldf21ocggeiltmfh2', 1),
(172, 1, 200, 1, 'oue2drf890mnd6mldf21ocggeiltmfh2', 1),
(173, 2, 150, 1, '3avovl86ueph8f7kk511s4hl1r43sohs', 1),
(174, 3, 180, 1, '3avovl86ueph8f7kk511s4hl1r43sohs', 1),
(175, 1, 200, 1, '3avovl86ueph8f7kk511s4hl1r43sohs', 1),
(176, 2, 150, 1, 'c4ookqs8na6hmjtrunsh67fe80t4b9mg', 1),
(177, 1, 200, 1, 'c4ookqs8na6hmjtrunsh67fe80t4b9mg', 1),
(178, 3, 180, 1, 'c4ookqs8na6hmjtrunsh67fe80t4b9mg', 1),
(179, 4, 160, 1, 'c4ookqs8na6hmjtrunsh67fe80t4b9mg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `feedback`, `product_id`) VALUES
(1, 'Полина', 'Но слезы лились ручьями, и вскоре вокруг нее образовалась большая лужа дюйма в четыре глубиной. Вода разлилась по полу и уже дошла до середины зала. Немного спустя вдалеке послышался топот маленьких ног. Алиса торопливо вытерла глаза и стала ждать. Это возвращался Белый Кролик. Одет он был парадно, в одной руке держал пару лайковых перчаток, а в другой - большой веер. На бегу он тихо бормотал:', 1),
(2, 'Кирилл', 'Нет, вы только подумайте! - говорила она. - Какой сегодня день странный! А вчера все шло, как обычно! Может это я изменилась за ночь? Дайте-ка вспомнить: сегодня утром, когда я встала, я это была или не я? Кажется, уже не совсем я! Но если это так, то кто же я в таком случае? Это так сложно...', 1),
(3, 'Егор', 'Во всяком случае, я не Ада! - сказала она решительно. - У нее волосы вьются, а у меня нет! И уж, конечно, я не Мейбл. Я столько всего знаю, а она совсем ничего! И вообще она это она, а я это я! Как все непонятно! А ну-ка проверю, помню я то, что знала, или нет. Значит так: четырежды пять - двенадцать, четырежды шесть - тринадцать, четырежды семь... Так я до двадцати никогда не дойду! Ну, ладно, таблица умножения - это неважно! Попробую географию! Лондон - столица Парижа, а Париж - столица Рима, а Рим... Нет, все не так, все неверно! Должно быть, я превратилась в Мейбл... Попробую прочитать « Как дорожит...»', 2),
(10, 'Екатерина', 'Руку Алиса при этом положила на макушку, чтобы чувствовать, что с ней происходит. Но, к величайшему ее удивлению, она не стала ни выше, ни ниже. Конечно, так всегда и бывает, когда ешь пирожки, но Алиса успела привыкнуть к тому, что вокруг происходит одно только удивительное; ей показалось скучно и глупо, что жизнь опять пошла по-обычному. Она откусила еще кусочек и вскоре съела весь пирожок', 2),
(12, 'Наталья', 'Чай очень вкусный)))', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` int NOT NULL,
  `quantity_views` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `size`, `quantity_views`) VALUES
(21, '01.jpg', 111456, 1),
(22, '02.jpg', 70076, 0),
(23, '03.jpg', 70215, 0),
(24, '04.jpg', 61733, 1),
(25, '05.jpg', 160617, 0),
(26, '06.jpg', 89871, 1),
(27, '07.jpg', 99418, 0),
(28, '08.jpg', 103775, 0),
(29, '09.jpg', 81022, 0),
(30, '10.jpg', 97127, 0),
(31, '11.jpg', 98579, 0),
(32, '12.jpg', 139286, 0),
(33, '13.jpg', 113016, 0),
(34, '14.jpg', 151814, 5),
(35, '15.jpg', 112488, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `session_id` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `users_id` int DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Ожидает оформления'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `session_id`, `phone`, `name_user`, `users_id`, `status`) VALUES
(12, 'crgo6k26mjbrm6umsgphnih05hbma26u', '+7 (541) 236-52-63', 'user', 2, 'Ожидает оформления'),
(13, 'j4ral797thp0sk2svlbp8s1c27a31sv0', '+7 (541) 236-52-63', 'Тест', 2, 'Заказ оформлен'),
(14, 'r6ge1ononlspb9m8mfj5c1dm5mqshadf', '+7 (111) 111-11-11', 'admin', 1, 'Заказ оформлен'),
(15, '0l0r7cvfaekdqqfeesaq4uqqidav2fif', '+7 (541) 236-52-63', 'user', 2, 'Ожидает оформления'),
(16, '5lc1suqhhmq55peg8jjavsoal0mtcmgu', '+7 (541) 236-52-63', 'Тест', 0, 'Заказ оформлен'),
(17, 'ec3f5afj7iegiapl4kk4v84cnn0o8b6a', '+7 (541) 236-52-63', 'Тест', 0, 'Заказ оформлен'),
(18, 'pe2ieb6tbee0vj2sd9t1g01ni96srval', '+7 (541) 236-52-63', 'user', 0, 'Заказ оформлен'),
(19, '5rdu370vbsf82spqvfqj5k5u0uovel1k', '+7 (541) 236-52-63', 'Тест', 2, 'Ожидает оформления'),
(20, 'f6vs9299d2cjvtqjhbljls0j105agdnl', '+7 (541) 236-52-63', 'Тест', 2, 'Заказ оформлен'),
(21, 'ok4sfok6hlrt8g38rcmdencgdbma3ted', '+7 (541) 236-52-63', 'Тест', 2, 'Заказ оформлен'),
(22, '3avovl86ueph8f7kk511s4hl1r43sohs', '+7 (541) 236-52-63', 'gfd', 1, 'Заказ оформлен'),
(23, 'c4ookqs8na6hmjtrunsh67fe80t4b9mg', '+7 (541) 236-52-63', 'df', 1, 'Заказ оформлен');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name_product` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` int NOT NULL,
  `path` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name_product`, `price`, `path`, `description`) VALUES
(1, 'Суши', 200, 'sushi.jpg', '- Надеюсь, они не забудут в полдник налить ей молочка... Ах, Дина, милая, как жаль, что тебя со мной нет. Правда, мышек в воздухе нет, но зато мошек хоть отбавляй! Интересно, едят ли кошки мошек?\r\nТут Алиса почувствовала, что глаза у нее слипаются. Она сонно бормотала:\r\n- Едят ли кошки мошек? Едят ли кошки мошек?\r\nИногда у нее получалось:\r\n- Едят ли мошки кошек?\r\nАлиса не знала ответа ни на первый, ни на второй вопрос, и потому ей было все равно, как их ни задать. Она чувствовала, что засыпает. Ей уже снилось, что она идет об руку с Диной и озабоченно спрашивает ее:\r\n- Признайся, Дина, ты когда-нибудь ела мошек?\r\nТут раздался страшный треск. Алиса упала на кучу валежника и сухих листьев.'),
(2, 'Роллы', 150, 'rolls.jpg', 'Видишь ли, она начиталась всяких прелестных историй о том, как дети сгорали живьем или попадали на съедение диким зверям, - и все эти неприятности происходили с ними потому, что они не желали соблюдать простейших правил, которым обучали их друзья: если слишком долго держать в руках раскаленную докрасна кочергу, в конце концов обожжешься; если поглубже полоснуть по пальцу ножом, из пальца обычно идет кровь; если разом осушить пузырек с пометкой «Яд!», рано или поздно почти наверняка почувствуешь недомогание. Последнее правило Алиса помнила твердо.\r\nОднако на этом пузырьке никаких пометок не было, и Алиса рискнула отпить из него немного. Напиток был очень приятен на вкус - он чем-то напоминал вишневый пирог с кремом, ананас, жареную индейку, сливочную помадку и горячие гренки с маслом. Алиса выпила его до конца.\r\n- Какое странное ощущение! - воскликнула Алиса. - Я, верно, складываюсь, как подзорная труба.\r\nИ не ошиблась - в ней сейчас было всего десять дюймов росту. Она подумала, что теперь легко пройдет сквозь дверцу в чудесный сад, и очень обрадовалась. Но сначала на всякий случай она немножко подождала - ей хотелось убедиться, что больше она не уменьшается. Это ее слегка тревожило.'),
(3, 'Чай', 180, 'tea.jpg', '- Если я и дальше буду так уменьшаться, - сказала она про себя, - я могу я вовсе исчезнуть. Сгорю как свечка! Интересно, какая я тогда буду?\r\nИ она постаралась представить себе, как выглядит пламя свечи после того, как свеча потухнет. Насколько ей помнилось, такого она никогда не видала.\r\nПодождав немного и убедившись, что больше ничего не происходит, она решила тотчас же выйти в сад. Бедняжка! Подойдя к дверце, она обнаружила, что забыла золотой ключик на столе, а вернувшись к столу, поняла, что ей теперь до него не дотянуться. Сквозь стекло она ясно видела снизу лежащий на столе ключик. Она попыталась взобраться на стол по стеклянной ножке, но ножка была очень скользкая. Устав от напрасных усилий, бедная Алиса села на пол и заплакала.\r\n- Ну, хватит! - строго приказала она себе немного спустя. - Слезами горю не поможешь. Советую тебе сию же минуту перестать!'),
(4, 'Кофе', 160, 'coffee.jpg', 'Она всегда давала себе хорошие советы, хоть следовала им нечасто. Порой же ругала себя так беспощадно, что глаза ее наполнялись слезами. А однажды она даже попыталась отшлепать себя по щекам за то, что схитрила, играя в одиночку партию в крокет. Эта глупышка очень любила притворяться двумя разными девочками сразу.\r\n- Но сейчас это при всем желании невозможно! - подумала бедная Алиса. - Меня и на одну-то едва-едва хватает!\r\nТут она увидела под столом маленькую стеклянную коробочку. Алиса открыла ее - внутри был пирожок, на котором коринками было красиво написано: «СЪЕШЬ МЕНЯ!»\r\n- Что ж, - сказала Алиса, - я так и сделаю. Если при этом я вырасту, я достану ключик, а если уменьшусь - пролезу под дверь. Мне бы только попасть в сад, а как - все равно!\r\nОна откусила от пирожка и с тревогой подумала:\r\n- Расту или уменьшаюсь? Расту или уменьшаюсь?'),
(5, 'Морепродукты', 800, 'seafood.jpg', ' Все страньше и страньше! - вскричала Алиса. От изумления она совсем забыла, как нужно говорить. - Я теперь раздвигаюсь, словно подзорная труба. Прощайте, ноги!\r\n(В эту минуту она как раз взглянула на ноги и увидела, как стремительно они уносятся вниз. Еще мгновение - и они скроются из виду.)\r\n- Бедные мои ножки! Кто же вас будет теперь обувать? Кто натянет на вас чулки и башмаки? Мне же до вас теперь, мои милые, не достать. Мы будем так далеки друг от друга, что мне будет совсем не до вас... Придется вам обходиться без меня.\r\nТут она призадумалась.\r\n- Все-таки надо быть с ними поласковее, - сказала она про себя. - А то еще возьмут и пойдут не в ту сторону. Ну, ладно! На рождество буду посылать им в подарок новые ботинки.\r\nИ она принялась строить планы.'),
(6, 'Пицца', 125, 'sushi.jpg', 'Описание'),
(7, 'Пицца', 125, 'sushi.jpg', 'Описание'),
(8, 'Пицца', 125, 'sushi.jpg', 'Описание'),
(9, 'Пицца', 125, 'sushi.jpg', 'Описание'),
(10, 'Пицца', 186, 'sushi.jpg', 'Описание'),
(12, 'Суши', 186, 'sushi.jpg', 'Описание'),
(13, 'Суши', 145, 'sushi.jpg', 'Описание'),
(14, 'Суши', 186, 'sushi.jpg', 'Test2');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` text NOT NULL,
  `hash` text NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'guest'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`, `role`) VALUES
(1, 'admin', '$2y$10$m1Exrzvp.vZ6xGWr/xktNOqVfKdacvK2pzd6UlADlPqe925MenHmO', '1409339047625cdb00d32ee5.54340237', 'admin'),
(2, 'user', '$2y$10$jsqGiEoGnb.yBHcxJjmjMuvnf8XLmZwd9Xfyx8oDqsjyB.HH23Yvm', '1793416483623391c24f1820.40774930', 'guest'),
(3, 'dad', '$2y$10$Mls11Sc2fT9gE5pDC3CMaelb6xvKuYECcdBLkSYlg2Z4UirP3EB0e', '78135313462336bf6052bf6.49747550', 'guest'),
(4, 'lily', '$2y$10$dpMjXcyBzxeqY/95iF6NruP6UqFtX6tOW5EVG0AXc.u0LGjX5g/xy', '101522995262336c53831246.19897498', 'guest'),
(5, 'mom', '$2y$10$8HQ3Bu06TAfht2ly.H0CPepmloonDfuLvj.cPVCsfcNqp9rkSsWOS', '9620607962336cb3d7e588.19612408', 'guest'),
(6, 'pol', '$2y$10$brHq/rtBwUL3e2BuTuw2.uVCENIstvvLjG3FW59S1Ptt4PthveYZO', '156728706762336d87183974.95055162', 'guest'),
(7, 'dad2', '$2y$10$jaWt7XuTslkHTQRxz0cxWumqLWZzzL9heHOz7S8I2cxEkJhon0Mg.', '6236717936249f6a740b650.02604950', 'guest'),
(8, 'lily2', '$2y$10$r2JQHSzInvQlU5rs0aZyfefSmY3yINeZ3WjSYxDn5.vDZRuy1WUkS', '69131957624ca0a293e028.75705218', 'guest');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT для таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
