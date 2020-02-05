DROP TABLE IF EXISTS `category`;
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
DROP TABLE IF EXISTS `product`; 
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
DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` ( 
  `id` int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Уникальный 
идентификатор', 
  `name` varchar(255) NOT NULL COMMENT 'Наименование', 
  `content` varchar(255) DEFAULT NULL COMMENT 'Краткое описание', 
  `keywords` varchar(255) DEFAULT NULL COMMENT 'Мета-тег keywords', 
  `description` varchar(255) DEFAULT NULL COMMENT 'Мета-тег description', 
  `image` varchar(255) DEFAULT NULL COMMENT 'Имя файла изображения' 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Идентификатор заказа',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Идентификатор пользователя',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT 'Имя и фамилия покупателя',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT 'Почта покупателя',
  `phone` varchar(50) NOT NULL DEFAULT '' COMMENT 'Телефон покупателя',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT 'Адрес доставки',
  `comment` varchar(255) NOT NULL DEFAULT '' COMMENT 'Комментарий к заказу',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Сумма заказа',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Статус заказа',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата и время создания',
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
   ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата и время обновления'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `order_item`;
CREATE TABLE `order_item` (
  `id` int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Идентификатор элемента',
  `order_id` int(10) UNSIGNED NOT NULL COMMENT 'Идентификатор заказа',
  `product_id` int(10) UNSIGNED NOT NULL COMMENT 'Идентификатор товара',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT 'Наименование товара',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Цена товара',
  `quantity` smallint(5) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Количество в заказе',
  `cost` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Стоимость = Цена * Кол-во'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `page`;
CREATE TABLE `page` (
  `id` int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Уникальный идентификатор',
  `parent_id` int(10) UNSIGNED NOT NULL COMMENT 'Родительская страница',
  `name` varchar(100) NOT NULL COMMENT 'Заголовок страницы',
  `slug` varchar(100) NOT NULL UNIQUE KEY COMMENT 'Для создания ссылки',
  `content` text COMMENT 'Содержимое страницы',
  `keywords` varchar(255) DEFAULT NULL COMMENT 'Мета-тег keywords',
  `description` varchar(255) DEFAULT NULL COMMENT 'Мета-тег description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;