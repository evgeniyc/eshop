<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id Уникальный  идентификатор
 * @property int $parent_id Родительская категория
 * @property string $name Наименование категории
 * @property string|null $content Описание категории
 * @property string|null $keywords Мета-тег keywords
 * @property string|null $description Мета-тег description
 * @property string|null $image Имя файла изображения
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
            'id' => 'Уникальный идентификатор',
            'parent_id' => 'Родительская категория',
            'name' => 'Наименование категории',
            'content' => 'Описание категории',
            'keywords' => 'Мета-тег keywords',
            'description' => 'Мета-тег description',
            'image' => 'Имя файла изображения',
        ];
    }
	
	  /** 
     * Возвращает товары категории 
     */ 
    public function getProducts() { 
        // связь таблицы БД `category` с таблицей `product` 
        return $this->hasMany(Product::class, ['category_id' => 'id']); 
    } 
 
    /** 
     * Возвращает родительскую категорию 
     */ 
    public function getParent() { 
        // связь таблицы БД `category` с таблицей `category` 
        return $this->hasOne(self::class, ['id' => 'parent_id']); 
    } 
 
    /** 
     * Возвращает дочерние категории 
     */ 
    public function getChildren() { 
        // связь таблицы БД `category` с таблицей `category` 
        return $this->hasMany(self::class, ['parent_id' => 'id']); 
    } 
}
