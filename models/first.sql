CREATE TABLE `category` ( 
  `id` int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Уникальный 
идентификатор', 
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Родительская категория', 
  `name` varchar(255) NOT NULL COMMENT 'Наименование категории', 
  `content` varchar(255) DEFAULT NULL COMMENT 'Описание категории', 
  `keywords` varchar(255) DEFAULT NULL COMMENT 'Мета-тег keywords', 
  `description` varchar(255) DEFAULT NULL COMMENT 'Мета-тег description', 
  `image` varchar(255) DEFAULT NULL COMMENT 'Имя файла изображения' 
) ENGINE=InnoDB DEFAULT CHARSET=utf8; 
 
-- 
-- Структура таблицы `product` 
-- 
CREATE TABLE `product` ( 
  `id` int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Уникальный 
идентификатор', 
  `category_id` int(10) UNSIGNED NOT NULL COMMENT 'Родительская категория', 
  `brand_id` int(10) UNSIGNED NOT NULL COMMENT 'Идентификатор бренда', 
  `name` varchar(255) NOT NULL COMMENT 'Наименование товара', 
  `content` text COMMENT 'Описание товара', 
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Цена товара', 
  `keywords` varchar(255) DEFAULT NULL COMMENT 'Мета-тег keywords', 
  `description` varchar(255) DEFAULT NULL COMMENT 'Мета-тег description', 
  `image` varchar(255) DEFAULT NULL COMMENT 'Имя файла изображения', 
  `hit` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Лидер продаж?', 
  `new` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Новый товар?', 
  `sale` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Распродажа?' 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;