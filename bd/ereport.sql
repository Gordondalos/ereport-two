--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 6.3.358.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 23.03.2016 20:49:55
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
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы fos_group
--
DROP TABLE IF EXISTS fos_group;
CREATE TABLE fos_group (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  roles LONGTEXT NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (id),
  UNIQUE INDEX UNIQ_4B019DDB5E237E06 (name)
)
ENGINE = INNODB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 8192
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
  description TEXT DEFAULT NULL,
  phone VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX UNIQ_957A647992FC23A8 (username_canonical),
  UNIQUE INDEX UNIQ_957A6479A0D96FBF (email_canonical)
)
ENGINE = INNODB
AUTO_INCREMENT = 7
AVG_ROW_LENGTH = 3276
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
  type_report_id INT(11) NOT NULL,
  description LONGTEXT DEFAULT NULL,
  organization_id INT(11) NOT NULL,
  date_accepted DATETIME NOT NULL,
  image_name VARCHAR(255) NOT NULL,
  form_report_id INT(11) NOT NULL,
  create_user_id INT(11) NOT NULL,
  PRIMARY KEY (id),
  INDEX IDX_40148A2532C8A3DE (organization_id),
  INDEX IDX_40148A253AD21BCC (form_report_id),
  INDEX IDX_40148A25FF14E5D0 (type_report_id),
  CONSTRAINT FK_40148A2532C8A3DE FOREIGN KEY (organization_id)
    REFERENCES organization(id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT FK_40148A253AD21BCC FOREIGN KEY (form_report_id)
    REFERENCES form_report(id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT FK_40148A25FF14E5D0 FOREIGN KEY (type_report_id)
    REFERENCES type_report(id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 14
AVG_ROW_LENGTH = 3276
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы fos_user_group
--
DROP TABLE IF EXISTS fos_user_group;
CREATE TABLE fos_user_group (
  user_id INT(11) NOT NULL,
  group_id INT(11) NOT NULL,
  PRIMARY KEY (user_id, group_id),
  INDEX IDX_583D1F3EA76ED395 (user_id),
  INDEX IDX_583D1F3EFE54D947 (group_id),
  CONSTRAINT FK_583D1F3EA76ED395 FOREIGN KEY (user_id)
    REFERENCES fos_user(id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT FK_583D1F3EFE54D947 FOREIGN KEY (group_id)
    REFERENCES fos_group(id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AVG_ROW_LENGTH = 4096
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
-- Вывод данных для таблицы fos_group
--
INSERT INTO fos_group VALUES
(3, 'Администратор', 'a:0:{}'),
(4, 'Пользователи', 'a:0:{}');

-- 
-- Вывод данных для таблицы fos_user
--
INSERT INTO fos_user VALUES
(1, 'gordondalos', 'gordondalos', 'gordondalos@gmail.com', 'gordondalos@gmail.com', 1, '88ohmyni7a80csg0oc8kkk4oc0w4wg', '$2y$13$88ohmyni7a80csg0oc8kkembZUjoU6Sk3lklhBYeCSa5cQMr2L.au', '2016-03-23 01:33:56', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'Какое то описание', '+996777999029'),
(2, 'Вася Пупкин', 'вася пупкин', 'vasa@mail.ru', 'vasa@mail.ru', 1, '88ohmyni7a80csg0oc8kkk4oc0w4wg', '$2y$13$88ohmyni7a80csg0oc8kkembZUjoU6Sk3lklhBYeCSa5cQMr2L.au', '2016-03-22 17:36:12', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, NULL, NULL),
(3, 'Колян', 'колян', 'kolyan@mail.ru', 'kolyan@mail.ru', 1, 'eev030e33tc84wkoggwowc0wwow08w4', '123123', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '456789', '1235654'),
(4, 'test', 'test', 'emal@mail.ru', 'emal@mail.ru', 1, '7tk55k7uywg8os8gwgcocokk88cwoc4', '321321321', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '321321321', '055555555'),
(5, 'tsrt2', 'tsrt2', 'qwe@qwe', 'qwe@qwe', 1, 'pxb307hmnms0gog84kgks0oko04k080', 'qwe', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'qwe', 'qweqwe'),
(6, 'йцу', 'йцу', 'qwe@qweqwe', 'qwe@qweqwe', 1, 'hnncjfrx35wgksw84wgws4o0ccscwo4', 'qwe', NULL, 1, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'qwe', '123456');

-- 
-- Вывод данных для таблицы organization
--
INSERT INTO organization VALUES
(1, 'Государственная Налоговая Инспекция', '+996777777', 'Описание организации', 'ГНС'),
(2, 'Социальный Фонд', '54565-54', '987987987', 'СФ'),
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
(6, 2, NULL, 1, '2011-01-01 00:00:00', 'logo2.png', 1, 1),
(7, 1, NULL, 2, '2011-01-01 00:00:00', 'Бриф на создание сайта (1).docx', 3, 1),
(9, 1, NULL, 1, '2011-01-01 00:00:00', 'csslive.PNG', 1, 2),
(12, 2, NULL, 2, '2016-03-23 01:55:00', 'scrollbar-e1430861620392.jpg', 2, 1),
(13, 1, NULL, 3, '2016-03-23 20:27:25', 'csslive.PNG', 1, 1);

-- 
-- Вывод данных для таблицы fos_user_group
--
INSERT INTO fos_user_group VALUES
(1, 4),
(2, 3),
(4, 3),
(4, 4),
(6, 4);

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;