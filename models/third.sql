-- Структура таблицы `order`
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
-- Структура таблицы `order_item`
CREATE TABLE `order_item` (
  `id` int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Идентификатор элемента',
  `order_id` int(10) UNSIGNED NOT NULL COMMENT 'Идентификатор заказа',
  `product_id` int(10) UNSIGNED NOT NULL COMMENT 'Идентификатор товара',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT 'Наименование товара',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Цена товара',
  `quantity` smallint(5) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Количество в заказе',
  `cost` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Стоимость = Цена * Кол-во'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;