<?php

use yii\db\Schema;
use yii\db\Migration;

class m200201_084048_brand extends Migration
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
            '{{%brand}}',
            [
                'id'=> $this->primaryKey(10)->unsigned()->comment('Уникальный \r\nидентификатор'),
                'name'=> $this->string(255)->notNull()->comment('Наименование'),
                'content'=> $this->string(255)->null()->defaultValue(null)->comment('Краткое описание'),
                'keywords'=> $this->string(255)->null()->defaultValue(null)->comment('Мета-тег keywords'),
                'description'=> $this->string(255)->null()->defaultValue(null)->comment('Мета-тег description'),
                'image'=> $this->string(255)->null()->defaultValue(null)->comment('Имя файла изображения'),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%brand}}');
    }
}
