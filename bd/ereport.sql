--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 6.3.358.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 28.03.2016 0:09:59
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
  inn VARCHAR(25) DEFAULT NULL,
  number_socialn_fond VARCHAR(255) DEFAULT NULL,
  bank VARCHAR(255) DEFAULT NULL,
  bank_account VARCHAR(255) DEFAULT NULL,
  bank_bik VARCHAR(255) DEFAULT NULL,
  director VARCHAR(255) DEFAULT NULL,
  director_phone VARCHAR(255) DEFAULT NULL,
  buhgalter VARCHAR(255) DEFAULT NULL,
  buhgalterphone VARCHAR(255) DEFAULT NULL,
  phisical_adress VARCHAR(255) DEFAULT NULL,
  ur_adress VARCHAR(255) DEFAULT NULL,
  mail_adress VARCHAR(255) DEFAULT NULL,
  site VARCHAR(255) DEFAULT NULL,
  full_name_organization VARCHAR(255) DEFAULT NULL,
  short_name_organization VARCHAR(255) DEFAULT NULL,
  time_job VARCHAR(255) DEFAULT NULL,
  gns VARCHAR(255) DEFAULT NULL,
  okpo VARCHAR(255) DEFAULT NULL,
  director_post VARCHAR(255) DEFAULT NULL,
  date_registration DATE DEFAULT NULL,
  okved VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX UNIQ_957A647992FC23A8 (username_canonical),
  UNIQUE INDEX UNIQ_957A6479A0D96FBF (email_canonical)
)
ENGINE = INNODB
AUTO_INCREMENT = 18
AVG_ROW_LENGTH = 2730
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы news
--
DROP TABLE IF EXISTS news;
CREATE TABLE news (
  id INT(11) NOT NULL AUTO_INCREMENT,
  short_news TEXT NOT NULL,
  all_news TEXT NOT NULL,
  date_news DATE NOT NULL,
  news_title TEXT NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 6
AVG_ROW_LENGTH = 5461
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
  area_id INT(11) NOT NULL,
  is_report INT(11) DEFAULT NULL,
  status_id INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX IDX_40148A2532C8A3DE (organization_id),
  INDEX IDX_40148A253AD21BCC (form_report_id),
  INDEX IDX_40148A256BF700BD (status_id),
  INDEX IDX_40148A2585564492 (create_user_id),
  INDEX IDX_40148A25BD0F409C (area_id),
  INDEX IDX_40148A25FF14E5D0 (type_report_id),
  CONSTRAINT FK_40148A2532C8A3DE FOREIGN KEY (organization_id)
    REFERENCES organization(id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT FK_40148A253AD21BCC FOREIGN KEY (form_report_id)
    REFERENCES form_report(id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT FK_40148A256BF700BD FOREIGN KEY (status_id)
    REFERENCES status(id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT FK_40148A2585564492 FOREIGN KEY (create_user_id)
    REFERENCES fos_user(id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT FK_40148A25BD0F409C FOREIGN KEY (area_id)
    REFERENCES area(id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT FK_40148A25FF14E5D0 FOREIGN KEY (type_report_id)
    REFERENCES type_report(id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 49
AVG_ROW_LENGTH = 409
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
AVG_ROW_LENGTH = 2730
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
(3, 'Администраторы', 'a:0:{}'),
(4, 'Пользователи', 'a:0:{}');

-- 
-- Вывод данных для таблицы fos_user
--
INSERT INTO fos_user VALUES
(1, 'gordondalos', 'gordondalos', 'gordondalos@gmail.com', 'gordondalos@gmail.com', 1, '88ohmyni7a80csg0oc8kkk4oc0w4wg', '$2y$13$88ohmyni7a80csg0oc8kkembZUjoU6Sk3lklhBYeCSa5cQMr2L.au', '2016-03-27 23:59:26', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'Azure предлагает ежемесячное соглашение об уровне обслуживания с доступностью на уровне 99,95 % и позволяет тебе создавать и запускать высокодоступные приложения, не сосредотачивая внимания на инфраструктуре. Эта платформа обладает возможностью автоматического применения исправлений для операционной системы и служб, встроенной балансировкой сетевой нагрузки и устойчивостью к аппаратным сбоям. Она поддерживает модель развертывания, которая позволяет вам обновлять приложение с нулевым временем простоя.\r\n\r\nКомпоненты и службы предоставляются с помощью открытых протоколов REST. Клиентские библиотеки Azure доступны для нескольких языков программирования, выпускаются по лицензии с открытым исходным кодом и размещаются на сайте GitHub.', '+996777999029', '03003201010010', '3232220', 'Банк Азии', '3323365545875', '11245', 'Евгений Бондаренко', '0555777999', 'Василиса Прекрасная', '0777888888', 'Бишкек 151', 'Мароко 128', 'gordondalos@gmail.com', 'teamexpert.tk', 'ЗАО "Рога и Копыта"', 'Рожки', '15:30-17:30', 'Октябрьский 125', '12321', 'Директор', '2015-01-16', '123456'),
(2, 'Вася Пупкин', 'вася пупкин', 'vasa@mail.ru', 'vasa@mail.ru', 1, '88ohmyni7a80csg0oc8kkk4oc0w4wg', '$2y$13$88ohmyni7a80csg0oc8kkembZUjoU6Sk3lklhBYeCSa5cQMr2L.au', '2016-03-27 23:56:51', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, NULL, NULL, '045112354432544', '5456', 'РСК Банк', '011244501000112', '004', 'Дядя Вася', '0555555555', 'Плюшкина Елизавета Васильевна', '07755456321', 'Какой то адрес', 'Какой то адрес', 'Какой то адрес', NULL, 'Вася Корпорейшн', 'Вася Корпорейшн', NULL, 'Первомайская 001', '5426', 'Директор', '2011-01-01', '12345'),
(3, 'Колян', 'колян', 'kolyan@mail.ru', 'kolyan@mail.ru', 1, 'eev030e33tc84wkoggwowc0wwow08w4', '$2y$13$eev030e33tc84wkoggwowOYqiFtflmpXN3pkimOfatZyAuyR3Nlxa', '2016-03-27 17:40:12', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '456789', '1235654', '111111111', '445556-ьв', NULL, NULL, NULL, 'Шышкин Василий Петровч', '+99566541122', 'Василиса Васильевна', '987987987', 'Гдето в Аврике', 'гдето в Бишкеке', 'Почта туда не ходит', NULL, 'Тойота моторс', 'Тойота моторс', NULL, 'Первомайская 001', '22222', 'Председатель соверта директоров', '2011-01-01', '123456-уа'),
(7, 'Вини пух', 'вини пух', 'bondarenko.kg@mail.ru', 'bondarenko.kg@mail.ru', 1, '83195z9xd6w4kwws0g4kwo8kco8o4k0', '123', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, NULL, '0555555555', NULL, NULL, NULL, NULL, NULL, 'Василий Теркин', '0312545658', 'Вини Пух', '0555666999', 'Ул Коммунаров дом 112', 'Ул Коммунаров дом 112', 'Ул Коммунаров дом 112', NULL, 'Google', 'Google', NULL, NULL, NULL, 'Профессор', '2011-01-01', NULL),
(16, 'Barbosa', 'barbosa', 'Barbosa@zxc.as', 'barbosa@zxc.as', 1, 'fszxgzq6hoo4cw0ockwoc488s8ksk8c', '$2y$13$fszxgzq6hoo4cw0ockwocupXERfZR4IwITtQAIzD3GVHisNxWBcGe', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, NULL, '123123123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2011-01-01', NULL),
(17, 'Teamwox', 'teamwox', 'Teamwox@Teamwox.fg', 'teamwox@teamwox.fg', 1, 'negwhcl6uysg08w4c40wsookg0w0c8o', '$2y$13$negwhcl6uysg08w4c40wsecWm2dwP8bx11IYh7YAkfzMOAA48qhC6', '2016-03-27 18:50:59', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Teamwox', 'Teamwox', 'Teamwox', 'Teamwox', 'Teamwox', 'Teamwox', 'Teamwox', 'Teamwox', '111111', 'Teamwox', '222222', 'Teamwox Teamwox Teamwox', 'Teamwox Teamwox Teamwox', 'Teamwox Teamwox', 'Teamwox', 'Teamwox', 'Teamwox', 'Teamwox', 'Teamwox', 'Teamwox', 'Teamwox', '2011-01-01', 'Teamwox');

-- 
-- Вывод данных для таблицы news
--
INSERT INTO news VALUES
(1, 'The FOSUserBundle provides a number of command line utilities to help manage your application''s users. Commands are available for the following tasks:', 'The FOSUserBundle provides a number of command line utilities to help manage your application''s users. Commands are available for the following tasks:The FOSUserBundle provides a number of command line utilities to help manage your application''s users. Commands are available for the following tasks:The FOSUserBundle provides a number of command line utilities to help manage your application''s users. Commands are available for the following tasks:The FOSUserBundle provides a number of command line utilities to help manage your application''s users. Commands are available for the following tasks:', '2011-01-01', 'Заголовок Первой новости'),
(2, 'Чтобы Doctrine могла сделать это, надо просто создать “метаданные” или конфигурацию, которые в точности расскажут ей как класс Product и его свойства должны быть отображены в базу данных. Эти метаданные могут быть указаны в большом количестве форматов, включая YAML, XML или прямо внутри класса Product через аннотации:', 'Чтобы Doctrine могла сделать это, надо просто создать “метаданные” или конфигурацию, которые в точности расскажут ей как класс Product и его свойства должны быть отображены в базу данных. Эти метаданные могут быть указаны в большом количестве форматов, включая YAML, XML или прямо внутри класса Product через аннотации:Чтобы Doctrine могла сделать это, надо просто создать “метаданные” или конфигурацию, которые в точности расскажут ей как класс Product и его свойства должны быть отображены в базу данных. Эти метаданные могут быть указаны в большом количестве форматов, включая YAML, XML или прямо внутри класса Product через аннотации:Чтобы Doctrine могла сделать это, надо просто создать “метаданные” или конфигурацию, которые в точности расскажут ей как класс Product и его свойства должны быть отображены в базу данных. Эти метаданные могут быть указаны в большом количестве форматов, включая YAML, XML или прямо внутри класса Product через аннотации:Чтобы Doctrine могла сделать это, надо просто создать “метаданные” или конфигурацию, которые в точности расскажут ей как класс Product и его свойства должны быть отображены в базу данных. Эти метаданные могут быть указаны в большом количестве форматов, включая YAML, XML или прямо внутри класса Product через аннотации:', '2011-01-01', 'Заголовок Второй Новости'),
(5, 'Since you can store the locale of the user in the session, it may be tempting to use the same URL to display a resource in different languages based on the user''s locale. For example, http://www.example.com/contact could show content in English for one user and French for another user. Unfortunately, this violates a fundamental rule of the Web: that a particular URL returns the same resource regardless of the user. To further muddy the problem, which version of the content would be indexed by search engines?', 'Since you can store the locale of the user in the session, it may be tempting to use the same URL to display a resource in different languages based on the user''s locale. For example, http://www.example.com/contact could show content in English for one user and French for another user. Unfortunately, this violates a fundamental rule of the Web: that a particular URL returns the same resource regardless of the user. To further muddy the problem, which version of the content would be indexed by search engines?', '2016-03-27', 'Since you can store the locale of the user in the session, it may be tempting to use the same URL to display a resource in different languages based on the user''s locale.');

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
(6, 2, NULL, 1, '2011-01-01 00:00:00', 'logo2.png', 1, 1, 2, NULL, 1),
(7, 1, NULL, 2, '2011-01-01 00:00:00', 'Бриф на создание сайта (1).docx', 3, 1, 1, NULL, 1),
(9, 1, NULL, 1, '2011-01-01 00:00:00', 'csslive.PNG', 1, 2, 2, NULL, 1),
(12, 2, NULL, 2, '2016-03-23 01:55:00', 'scrollbar-e1430861620392.jpg', 2, 1, 1, NULL, 1),
(13, 1, NULL, 3, '2016-03-23 20:27:25', 'csslive.PNG', 1, 1, 2, NULL, 1),
(14, 2, NULL, 3, '2016-03-23 21:05:54', 'Этапы создания сайта.docx', 1, 1, 3, NULL, 1),
(15, 1, NULL, 2, '2016-03-23 21:47:15', 'БРИФ Для Жени отчетность.docx', 2, 1, 2, NULL, 1),
(16, 1, NULL, 1, '2016-03-23 22:11:57', 'logo2.png', 1, 1, 1, 1, 1),
(17, 1, NULL, 1, '2016-03-23 22:12:27', 'Вопросы.txt', 1, 1, 1, NULL, 1),
(18, 1, NULL, 1, '2016-03-23 22:18:44', 'поиск работы.txt', 1, 1, 1, 1, 1),
(19, 1, NULL, 1, '2016-03-23 22:21:01', 'Этапы создания сайта.docx', 1, 1, 1, 1, 1),
(20, 1, NULL, 1, '2016-03-23 22:21:42', 'report-Бриф на создание сайта (1).docx', 1, 1, 1, 1, 1),
(21, 2, 'qweqwe', 3, '2016-03-23 22:22:46', 'Вопросы.txt', 2, 1, 1, 1, 1),
(22, 1, NULL, 2, '2016-03-23 22:53:26', 'wp.txt', 1, 1, 2, 1, 1),
(23, 2, NULL, 2, '2016-03-23 23:07:26', 'wp.txt', 1, 1, 1, 1, 1),
(24, 1, NULL, 2, '2016-03-23 23:17:57', 'greensoft20160111.sql', 1, 2, 2, 1, 1),
(25, 1, NULL, 3, '2016-03-23 23:19:48', 'поиск работы.txt', 3, 2, 2, 1, 1),
(26, 1, NULL, 3, '2016-03-23 23:21:07', 'поиск работы.txt', 1, 2, 1, 1, 1),
(27, 1, NULL, 1, '2016-03-23 23:52:27', '56f2d7db51db9_wp.txt', 1, 2, 1, 1, 1),
(28, 1, NULL, 1, '2016-03-23 23:53:12', '56f2d8084a2f5_wp.txt', 1, 2, 1, 1, 1),
(29, 1, NULL, 1, '2016-03-24 00:25:47', '56f2dfab8151e_report-Бриф на создание сайта (1).docx', 1, 2, 1, 1, 2),
(30, 1, NULL, 1, '2016-03-24 01:09:39', '56f2e9f3e31d3_jQuery-File-Upload-9.12.1.zip', 1, 1, 1, 1, 1),
(31, 1, NULL, 1, '2016-03-24 01:12:53', '56f2eab5cb745_report-logo2.png', 1, 1, 1, 1, 1),
(32, 1, NULL, 1, '2016-03-24 01:20:52', '56f2ec9462522_123.PNG', 1, 1, 1, 1, 1),
(33, 1, NULL, 1, '2016-03-24 01:28:37', '56f2ee6526290_Вопросы.txt', 1, 1, 1, 1, 1),
(34, 1, NULL, 1, '2016-03-24 01:30:07', '56f2eebf9410e_отчет2.txt', 1, 1, 1, 1, 1),
(35, 1, NULL, 1, '2016-03-24 01:36:26', '56f2f03a5e847_123.PNG', 1, 1, 1, 1, 2),
(36, 1, NULL, 1, '2016-03-24 01:52:58', '56f2f41a0ab56_logo2.png', 1, 1, 1, 1, 1),
(37, 1, NULL, 1, '2016-03-24 02:02:09', '56f2f6416fea1_123.txt', 1, 1, 1, 1, 2),
(38, 2, NULL, 2, '2016-03-24 11:47:02', '56f37f561d61a_Резюме.docx', 2, 1, 1, NULL, 1),
(39, 1, NULL, 2, '2016-03-24 11:49:06', '56f37fd2e07bc_greensoft20160111.sql', 1, 1, 2, 1, 1),
(40, 1, NULL, 1, '2016-03-24 22:36:39', '56f417977957e_Вопросы.txt', 1, 1, 1, 1, 1),
(41, 1, NULL, 1, '2016-03-24 22:58:40', '56f41cc0bfcbb_logo2.png', 1, 1, 1, 1, 2),
(42, 1, NULL, 1, '2016-03-25 00:04:10', '56f42c1a0d059_roboto.zip', 1, 2, 1, 1, 4),
(43, 1, NULL, 1, '2016-03-25 00:19:21', '56f42fa9e32bd_report-logo2.png', 1, 2, 1, 1, 2),
(44, 1, NULL, 1, '2016-03-27 15:00:15', '56f7a11f8d7ae_Резюме.docx', 1, 2, 1, 1, 2),
(45, 1, NULL, 2, '2016-03-27 23:36:27', '56f81ba7b2a0a_Этапы создания сайта.docx', 3, 2, 1, 1, 1),
(46, 1, NULL, 2, '2016-03-27 23:45:32', '56f81c3c13cf7_report-logo2.png', 1, 2, 2, 1, 1),
(47, 1, NULL, 2, '2016-03-27 23:48:29', '56f81ceda9fee_ckeditor_4.5.6_full.zip', 1, 2, 1, 1, 1),
(48, 1, NULL, 1, '2016-03-27 23:57:39', '56f81f1339cbe_report-Бриф на создание сайта (1).docx', 1, 2, 2, 1, 1);

-- 
-- Вывод данных для таблицы fos_user_group
--
INSERT INTO fos_user_group VALUES
(1, 4),
(2, 3),
(3, 4),
(7, 4),
(16, 4),
(17, 4);

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;