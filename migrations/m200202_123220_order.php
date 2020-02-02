<?php

use yii\db\Schema;
use yii\db\Migration;

class m200202_123220_order extends Migration
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
            '{{%order}}',
            [
                'id'=> $this->primaryKey(10)->unsigned()->comment('Идентификатор заказа'),
                'user_id'=> $this->integer(11)->notNull()->defaultValue(0)->comment('Идентификатор пользователя'),
                'name'=> $this->string(50)->notNull()->defaultValue('')->comment('Имя и фамилия покупателя'),
                'email'=> $this->string(50)->notNull()->defaultValue('')->comment('Почта покупателя'),
                'phone'=> $this->string(50)->notNull()->defaultValue('')->comment('Телефон покупателя'),
                'address'=> $this->string(255)->notNull()->defaultValue('')->comment('Адрес доставки'),
                'comment'=> $this->string(255)->notNull()->defaultValue('')->comment('Комментарий к заказу'),
                'amount'=> $this->decimal(10, 2)->notNull()->defaultValue('0.00')->comment('Сумма заказа'),
                'status'=> $this->tinyInteger(1)->unsigned()->notNull()->defaultValue(0)->comment('Статус заказа'),
                'created'=> $this->datetime()->notNull()->defaultExpression("CURRENT_TIMESTAMP")->comment('Дата и время создания'),
                'updated'=> $this->timestamp()->notNull()->defaultExpression("CURRENT_TIMESTAMP")->comment('Дата и время обновления'),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
