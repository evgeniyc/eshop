<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "order".
 *
 * @property int $id Идентификатор заказа
 * @property int $user_id Идентификатор пользователя
 * @property string $name Имя и фамилия покупателя
 * @property string $email Почта покупателя
 * @property string $phone Телефон покупателя
 * @property string $address Адрес доставки
 * @property string $comment Комментарий к заказу
 * @property float $amount Сумма заказа
 * @property int $status Статус заказа
 * @property string $created Дата и время создания
 * @property string $updated Дата и время обновления
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'status'], 'integer'],
            [['amount'], 'number'],
            [['created', 'updated'], 'safe'],
            [['name', 'email', 'phone'], 'string', 'max' => 50],
            [['address', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * Возвращает имена полей формы для редактирования заказа
     */
    public function attributeLabels() {
        return [
            'id' => 'Номер',
            'user_id' => 'User ID',
            'name' => 'Имя',
            'email' => 'Почта',
            'phone' => 'Телефон',
            'address' => 'Адрес доставки',
            'comment' => 'Комментарий',
            'amount' => 'Сумма',
            'status' => 'Статус',
            'created' => 'Дата создания',
            'updated' => 'Дата обновления',
        ];
    }
	
	public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    // при обновлении существующей записи присвоить атрибуту
                    // updated значение метки времени UNIX
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated'],
                ],
                // если вместо метки времени UNIX используется DATETIME
                'value' => new Expression('NOW()'),
            ],
        ];
    }
	
	/**
     * Удаляет товары заказа при удалении заказа
     */
    public function afterDelete() {
        parent::afterDelete();
        OrderItem::deleteAll(['order_id' => $this->id]);
    }
}
