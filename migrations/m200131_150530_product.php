<?php

use yii\db\Schema;
use yii\db\Migration;

class m200131_150530_product extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            'product',
            [
                'id'=> $this->primaryKey(10)->unsigned()->comment('Уникальный \r\nидентификатор'),
                'category_id'=> $this->integer(10)->unsigned()->notNull()->comment('Родительская категория'),
                'brand_id'=> $this->integer(10)->unsigned()->notNull()->comment('Идентификатор бренда'),
                'name'=> $this->string(255)->notNull()->comment('Наименование товара'),
                'content'=> $this->text()->null()->defaultValue(null)->comment('Описание товара'),
                'price'=> $this->decimal(10, 2)->notNull()->defaultValue('0.00')->comment('Цена товара'),
                'keywords'=> $this->string(255)->null()->defaultValue(null)->comment('Мета-тег keywords'),
                'description'=> $this->string(255)->null()->defaultValue(null)->comment('Мета-тег description'),
                'image'=> $this->string(255)->null()->defaultValue(null)->comment('Имя файла изображения'),
                'hit'=> $this->tinyInteger(1)->unsigned()->notNull()->defaultValue(0)->comment('Лидер продаж?'),
                'new'=> $this->tinyInteger(1)->unsigned()->notNull()->defaultValue(0)->comment('Новый товар?'),
                'sale'=> $this->tinyInteger(1)->unsigned()->notNull()->defaultValue(0)->comment('Распродажа?'),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('product');
    }
}
