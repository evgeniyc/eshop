<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "brand".
 *
 * @property int $id Уникальный  идентификатор
 * @property string $name Наименование
 * @property string|null $content Краткое описание
 * @property string|null $keywords Мета-тег keywords
 * @property string|null $description Мета-тег description
 * @property string|null $image Имя файла изображения
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brand';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
            'name' => 'Наименование',
            'content' => 'Краткое описание',
            'keywords' => 'Мета-тег keywords',
            'description' => 'Мета-тег description',
            'image' => 'Имя файла изображения',
        ];
    }
	
	/** 
     * Метод возвращает массив товаров бренда 
     */ 
    public function getProducts() { 
        // связь таблицы БД `brand` с таблицей `product` 
        return $this->hasMany(Product::class, ['brand_id' => 'id']); 
    } 
 
    /** 
     * Возвращает информацию о бренде с идентификатором $id 
     */ 
    public function getBrand($id) { 
        $id = (int)$id; 
        return self::findOne($id); 
    } 
     
    /** 
     * Возвращает массив всех брендов каталога и 
     * количество товаров для каждого бренда 
     */ 
    public function getAllBrands() { 
        $query = self::find(); 
        $brands = $query 
            ->select([ 
                'id' => 'brand.id', 
                'name' => 'brand.name', 
                'content' => 'brand.content', 
                'image' => 'brand.image', 
                'count' => 'COUNT(*)' 
            ]) 
            ->innerJoin( 
                'product', 
                'product.brand_id = brand.id' 
            ) 
            ->groupBy([ 
                'brand.id', 'brand.name', 'brand.content', 'brand.image' 
            ]) 
            ->orderBy(['name' => SORT_ASC]) 
            ->asArray() 
            ->all(); 
        return $brands; 
    }

 /*...*/ 
 
    /** 
     * Возвращает массив популярных брендов и 
     * количество товаров для каждого бренда 
     */ 
    public function getPopularBrands() { 
        // получаем бренды с наибольшим кол-вом товаров 
        $brands = self::find() 
            ->select([ 
                'id' => 'brand.id', 
                'name' => 'brand.name', 
                'count' => 'COUNT(*)' 
            ]) 
            ->innerJoin( 
                'product', 
                'product.brand_id = brand.id' 
            ) 
            ->groupBy([ 
                'brand.id', 'brand.name' 
            ]) 
            ->orderBy(['count' => SORT_DESC]) 
            ->limit(10) 
            ->asArray() 
            // для дальнейшей сортировки 
            ->indexBy('name') 
            ->all(); 
        // теперь нужно отсортировать бренды по названию 
        ksort($brands); 
        return $brands; 
    } 
 
    /*...*/ 
}

 
    
