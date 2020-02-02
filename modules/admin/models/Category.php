<?php
namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id Уникальный идентификатор
 * @property int $parent_id Родительская категория
 * @property string $name Наименование категории
 * @property string $content Описание категории
 * @property string $keywords Мета-тег keywords
 * @property string $description Мета-тег description
 * @property string $image Имя файла изображения
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'required'],
            [['name', 'content', 'keywords', 'description', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'content' => 'Content',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'image' => 'Image',
        ];
    }
}