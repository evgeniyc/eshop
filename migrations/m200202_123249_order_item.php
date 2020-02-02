<?php

use yii\db\Schema;
use yii\db\Migration;

class m200202_123249_order_item extends Migration
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
            '{{%order_item}}',
            [
                'id'=> $this->primaryKey(10)->unsigned()->comment('Идентификатор элемента'),
                'order_id'=> $this->integer(10)->unsigned()->notNull()->comment('Идентификатор заказа'),
                'product_id'=> $this->integer(10)->unsigned()->notNull()->comment('Идентификатор товара'),
                'name'=> $this->string(255)->notNull()->defaultValue('')->comment('Наименование товара'),
                'price'=> $this->decimal(10, 2)->notNull()->defaultValue('0.00')->comment('Цена товара'),
                'quantity'=> $this->smallInteger(5)->unsigned()->notNull()->defaultValue(1)->comment('Количество в заказе'),
                'cost'=> $this->decimal(10, 2)->notNull()->defaultValue('0.00')->comment('Стоимость = Цена * Кол-во'),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%order_item}}');
    }
}
