--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 6.3.358.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 15.03.2016 0:30:26
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
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы base_forms
--
DROP TABLE IF EXISTS base_forms;
CREATE TABLE base_forms (
  id INT(11) NOT NULL AUTO_INCREMENT,
  form_report INT(11) NOT NULL,
  type_report INT(11) NOT NULL,
  description LONGTEXT DEFAULT NULL,
  organization INT(11) NOT NULL,
  file_adress VARCHAR(255) NOT NULL,
  date_accepted DATETIME NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
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
AUTO_INCREMENT = 1
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
AUTO_INCREMENT = 2
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
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
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
AUTO_INCREMENT = 1
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
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

-- 
-- Вывод данных для таблицы area
--

-- Таблица ereport.area не содержит данных

-- 
-- Вывод данных для таблицы base_forms
--

-- Таблица ereport.base_forms не содержит данных

-- 
-- Вывод данных для таблицы form_report
--

-- Таблица ereport.form_report не содержит данных

-- 
-- Вывод данных для таблицы fos_user
--
INSERT INTO fos_user VALUES
(1, 'gordondalos', 'gordondalos', 'gordonalos@gmail.vom', 'gordonalos@gmail.vom', 1, '88ohmyni7a80csg0oc8kkk4oc0w4wg', '$2y$13$88ohmyni7a80csg0oc8kkembZUjoU6Sk3lklhBYeCSa5cQMr2L.au', '2016-03-15 00:13:01', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL);

-- 
-- Вывод данных для таблицы organization
--

-- Таблица ereport.organization не содержит данных

-- 
-- Вывод данных для таблицы report
--

-- Таблица ereport.report не содержит данных

-- 
-- Вывод данных для таблицы status
--

-- Таблица ereport.status не содержит данных

-- 
-- Вывод данных для таблицы type_report
--

-- Таблица ereport.type_report не содержит данных

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;