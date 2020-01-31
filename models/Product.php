<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id Уникальный  идентификатор
 * @property int $category_id Родительская категория
 * @property int $brand_id Идентификатор бренда
 * @property string $name Наименование товара
 * @property string|null $content Описание товара
 * @property float $price Цена товара
 * @property string|null $keywords Мета-тег keywords
 * @property string|null $description Мета-тег description
 * @property string|null $image Имя файла изображения
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
            'id' => 'Уникальный идентификатор',
            'category_id' => 'Родительская категория',
            'brand_id' => 'Идентификатор бренда',
            'name' => 'Наименование товара',
            'content' => 'Описание товара',
            'price' => 'Цена товара',
            'keywords' => 'Мета-тег keywords',
            'description' => 'Мета-тег description',
            'image' => 'Имя файла изображения',
            'hit' => 'Лидер продаж?',
            'new' => 'Новый товар?',
            'sale' => 'Распродажа?',
        ];
    }
	
	 /** 
     * Возвращает родительскую категорию 
     */ 
    public function getCategory() { 
        // связь таблицы БД `product` с таблицей `category` 
        return $this->hasOne(Category::class, ['id' => 'category_id']); 
    } 
}
