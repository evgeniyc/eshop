<?php

use yii\db\Schema;
use yii\db\Migration;

class m200131_150329_category extends Migration
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
            'category',
            [
                'id'=> $this->primaryKey(10)->unsigned()->comment('Уникальный \r\nидентификатор'),
                'parent_id'=> $this->integer(10)->unsigned()->notNull()->defaultValue(0)->comment('Родительская категория'),
                'name'=> $this->string(255)->notNull()->comment('Наименование категории'),
                'content'=> $this->string(255)->null()->defaultValue(null)->comment('Описание категории'),
                'keywords'=> $this->string(255)->null()->defaultValue(null)->comment('Мета-тег keywords'),
                'description'=> $this->string(255)->null()->defaultValue(null)->comment('Мета-тег description'),
                'image'=> $this->string(255)->null()->defaultValue(null)->comment('Имя файла изображения'),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('category');
    }
}
