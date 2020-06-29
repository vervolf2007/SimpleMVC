-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `edited` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tasks` (`id`, `name`, `email`, `text`, `status`, `edited`) VALUES
(1,	'Don Jonson',	'test@test.ru',	'Some tasks text 1',	1,	1),
(2,	'Иванов И.И.',	'test2@test.ru',	'Тут какое-то описание',	0,	0),
(3,	'Имя',	'test3@test.ru',	'Тут текст',	0,	0),
(4,	'Name Namen',	'email@email.com',	'Text',	0,	0),
(5,	'Петров П.П.',	'test4@test.ru',	'Проверка',	0,	0),
(20,	'Имя пользователя',	'email@test.ru',	'фыыфввыыфв',	0,	0),
(21,	'Сидоров Вади Валерьянович',	'test@test.ru',	'Проверка. Текст проверки\r\nalert(‘test’);\r\n1234',	1,	1);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2020-06-29 15:45:25
