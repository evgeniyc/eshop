CREATE TABLE `brand` ( 
  `id` int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Уникальный 
идентификатор', 
  `name` varchar(255) NOT NULL COMMENT 'Наименование', 
  `content` varchar(255) DEFAULT NULL COMMENT 'Краткое описание', 
  `keywords` varchar(255) DEFAULT NULL COMMENT 'Мета-тег keywords', 
  `description` varchar(255) DEFAULT NULL COMMENT 'Мета-тег description', 
  `image` varchar(255) DEFAULT NULL COMMENT 'Имя файла изображения' 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;