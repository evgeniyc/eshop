<?php

use yii\db\Schema;
use yii\db\Migration;

class m200205_141755_page extends Migration
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
            'page',
            [
                'id'=> $this->primaryKey(10)->unsigned()->comment('Уникальный идентификатор'),
                'parent_id'=> $this->integer(10)->unsigned()->notNull()->comment('Родительская страница'),
                'name'=> $this->string(100)->notNull()->comment('Заголовок страницы'),
                'slug'=> $this->string(100)->notNull()->comment('Для создания ссылки'),
                'content'=> $this->text()->null()->defaultValue(null)->comment('Содержимое страницы'),
                'keywords'=> $this->string(255)->null()->defaultValue(null)->comment('Мета-тег keywords'),
                'description'=> $this->string(255)->null()->defaultValue(null)->comment('Мета-тег description'),
            ],$tableOptions
        );
        $this->createIndex('slug','{{%page}}',['slug'],true);

    }

    public function safeDown()
    {
        $this->dropIndex('slug', '{{%page}}');
        $this->dropTable('page');
    }
}
