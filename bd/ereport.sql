--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 6.3.358.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 20.03.2016 14:32:02
-- Версия сервера: 5.6.21
-- Версия клиента: 4.1
--


-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

-- 
-- Установка базы данных по умолчанию
--
USE ereport;

--
-- Описание для таблицы area
--
DROP TABLE IF EXISTS area;
CREATE TABLE area (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name_area VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы form_report
--
DROP TABLE IF EXISTS form_report;
CREATE TABLE form_report (
  id INT(11) NOT NULL AUTO_INCREMENT,
  form_name VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 5461
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы fos_user
--
DROP TABLE IF EXISTS fos_user;
CREATE TABLE fos_user (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL,
  username_canonical VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  email_canonical VARCHAR(255) NOT NULL,
  enabled TINYINT(1) NOT NULL,
  salt VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  last_login DATETIME DEFAULT NULL,
  locked TINYINT(1) NOT NULL,
  expired TINYINT(1) NOT NULL,
  expires_at DATETIME DEFAULT NULL,
  confirmation_token VARCHAR(255) DEFAULT NULL,
  password_requested_at DATETIME DEFAULT NULL,
  roles LONGTEXT NOT NULL COMMENT '(DC2Type:array)',
  credentials_expired TINYINT(1) NOT NULL,
  credentials_expire_at DATETIME DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX UNIQ_957A647992FC23A8 (username_canonical),
  UNIQUE INDEX UNIQ_957A6479A0D96FBF (email_canonical)
)
ENGINE = INNODB
AUTO_INCREMENT = 3
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы organization
--
DROP TABLE IF EXISTS organization;
CREATE TABLE organization (
  id INT(11) NOT NULL AUTO_INCREMENT,
  organization_name VARCHAR(255) NOT NULL,
  organization_phone VARCHAR(255) DEFAULT NULL,
  organization_description LONGTEXT DEFAULT NULL,
  organization_short_name VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы report
--
DROP TABLE IF EXISTS report;
CREATE TABLE report (
  id INT(11) NOT NULL AUTO_INCREMENT,
  date_in DATETIME NOT NULL,
  description LONGTEXT DEFAULT NULL,
  organization INT(11) NOT NULL,
  status INT(11) NOT NULL,
  date_accepted DATETIME NOT NULL,
  type_report INT(11) NOT NULL,
  file_adress VARCHAR(255) NOT NULL,
  area INT(11) NOT NULL,
  form_report INT(11) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы status
--
DROP TABLE IF EXISTS status;
CREATE TABLE status (
  id INT(11) NOT NULL AUTO_INCREMENT,
  status_name VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы type_report
--
DROP TABLE IF EXISTS type_report;
CREATE TABLE type_report (
  id INT(11) NOT NULL AUTO_INCREMENT,
  type_name VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 3
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы base_forms
--
DROP TABLE IF EXISTS base_forms;
CREATE TABLE base_forms (
  id INT(11) NOT NULL AUTO_INCREMENT,
  form_report INT(11) NOT NULL,
  type_report_id INT(11) NOT NULL,
  description LONGTEXT DEFAULT NULL,
  organization INT(11) NOT NULL,
  file_adress VARCHAR(255) NOT NULL,
  date_accepted DATETIME NOT NULL,
  image_name VARCHAR(255) NOT NULL,
  PRIMARY KEY (id),
  INDEX IDX_40148A25FF14E5D0 (type_report_id),
  CONSTRAINT FK_40148A25FF14E5D0 FOREIGN KEY (type_report_id)
    REFERENCES type_report(id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 6
AVG_ROW_LENGTH = 5461
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

-- 
-- Вывод данных для таблицы area
--
INSERT INTO area VALUES
(1, 'Первомайский'),
(2, 'Сверловский'),
(3, 'Октябрьский');

-- 
-- Вывод данных для таблицы form_report
--
INSERT INTO form_report VALUES
(1, 'Форма №1'),
(2, 'Форма №2'),
(3, 'Форма №3');

-- 
-- Вывод данных для таблицы fos_user
--
INSERT INTO fos_user VALUES
(1, 'gordondalos', 'gordondalos', 'gordonalos@gmail.vom', 'gordonalos@gmail.vom', 1, '88ohmyni7a80csg0oc8kkk4oc0w4wg', '$2y$13$88ohmyni7a80csg0oc8kkembZUjoU6Sk3lklhBYeCSa5cQMr2L.au', '2016-03-16 13:27:25', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(2, 'Вася Пупкин', 'вася пупкин', 'vasa@mail.ru', 'vasa@mail.ru', 1, 'h7wsdpahp5w0w8wk44k8sswgoow80k4', '212354568789', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL);

-- 
-- Вывод данных для таблицы organization
--
INSERT INTO organization VALUES
(1, 'Государственная Налоговая Инспекция', '+996777777', 'Описание организации', 'ГНС'),
(2, 'Социальный Фонд', NULL, NULL, 'СФ'),
(3, 'Государственный Статистический Коммитет', '1223456', 'Принимают отчеты', 'СтатКом');

-- 
-- Вывод данных для таблицы report
--

-- Таблица ereport.report не содержит данных

-- 
-- Вывод данных для таблицы status
--
INSERT INTO status VALUES
(1, 'Новый'),
(2, 'Принят'),
(3, 'На рассмотрении'),
(4, 'Утвержден');

-- 
-- Вывод данных для таблицы type_report
--
INSERT INTO type_report VALUES
(1, 'Первоначальный'),
(2, 'Уточненный');

-- 
-- Вывод данных для таблицы base_forms
--
INSERT INTO base_forms VALUES
(1, 1, 1, 'bla bla bla', 1, 'qweqwe', '2011-01-01 00:00:00', ''),
(2, 1, 1, NULL, 1, '654654654', '2011-01-01 00:00:00', ''),
(3, 1, 1, NULL, 1, 'qweqweqweqwe', '2011-01-01 00:00:00', 'csslive.PNG');

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;