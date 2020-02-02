<?php
namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id Уникальный идентификатор
 * @property int $category_id Родительская категория
 * @property int $brand_id Идентификатор бренда
 * @property string $name Наименование товара
 * @property string $content Описание товара
 * @property string $price Цена товара
 * @property string $keywords Мета-тег keywords
 * @property string $description Мета-тег description
 * @property string $image Имя файла изображения
 * @property int $hit Лидер продаж?
 * @property int $new Новый товар?
 * @property int $sale Распродажа?
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'brand_id', 'name'], 'required'],
            [['category_id', 'brand_id', 'hit', 'new', 'sale'], 'integer'],
            [['content'], 'string'],
            [['price'], 'number'],
            [['name', 'keywords', 'description', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'brand_id' => 'Brand ID',
            'name' => 'Name',
            'content' => 'Content',
            'price' => 'Price',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'image' => 'Image',
            'hit' => 'Hit',
            'new' => 'New',
            'sale' => 'Sale',
        ];
    }
}