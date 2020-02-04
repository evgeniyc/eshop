<?php
namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Это модель для таблицы БД `category`
 *
 * @property int $id Уникальный идентификатор
 * @property int $parent_id Родительская категория
 * @property string $name Наименование категории
 * @property string $content Описание категории
 * @property string $keywords Мета-тег keywords
 * @property string $description Мета-тег description
 * @property string $image Имя файла изображения
 */
class Category extends ActiveRecord {

    /**
     * Возвращает имя таблицы базы данных
     */
    public static function tableName() {
        return 'category';
    }

    /**
     * Возвращает данные о родительской категории
     */
    public function getParent() {
        return $this->hasOne(Category::class, ['id' => 'parent_id']);
    }

    /**
     * Возвращает наименование родительской категории
     */
    public function getParentName() {
        $parent = $this->parent;
        return $parent ? $parent->name : '';
    }

    /**
     * Правила валидации полей формы при создании и редактировании категории
     */
    public function rules() {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'required'],
            [['name', 'content', 'keywords', 'description', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * Возвращает имена полей формы для создания и редактирования категории
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'parent_id' => 'Родитель',
            'name' => 'Наименование',
            'content' => 'Описание',
            'keywords' => 'Мета-тег keywords',
            'description' => 'Мета-тег description',
            'image' => 'Изображение'
        ];
    }
}