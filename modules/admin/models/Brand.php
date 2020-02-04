<?php
namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Это модель для таблицы БД `category`
 *
 * @property int $id Уникальный идентификатор
 * @property string $name Наименование бренда
 * @property string $content Описание бренда
 * @property string $keywords Мета-тег keywords
 * @property string $description Мета-тег description
 * @property string $image Имя файла изображения
 */
class Brand extends ActiveRecord {

    /**
     * Возвращает имя таблицы базы данных
     */
    public static function tableName() {
        return 'brand';
    }

    /**
     * Правила валидации полей формы при создании и редактировании бренда
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['name', 'content', 'keywords', 'description', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * Возвращает имена полей формы для создания и редактирования бренда
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'content' => 'Описание',
            'keywords' => 'Мета-тег keywords',
            'description' => 'Мета-тег description',
            'image' => 'Изображение',
        ];
    }
}