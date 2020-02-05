CREATE TABLE `page` (
  `id` int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Уникальный идентификатор',
  `parent_id` int(10) UNSIGNED NOT NULL COMMENT 'Родительская страница',
  `name` varchar(100) NOT NULL COMMENT 'Заголовок страницы',
  `slug` varchar(100) NOT NULL UNIQUE KEY COMMENT 'Для создания ссылки',
  `content` text COMMENT 'Содержимое страницы',
  `keywords` varchar(255) DEFAULT NULL COMMENT 'Мета-тег keywords',
  `description` varchar(255) DEFAULT NULL COMMENT 'Мета-тег description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;