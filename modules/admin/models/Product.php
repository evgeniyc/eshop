<?php
namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Это модель для таблицы БД `product`
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
class Product extends ActiveRecord {

    /**
     * Возвращает имя таблицы базы данных
     */
    public static function tableName() {
        return 'product';
    }

    /**
     * Возвращает данные о родительской категории
     */
    public function getCategory() {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Возвращает наименование родительской категории
     */
    public function getCategoryName() {
        $parent = $this->category;
        return $parent ? $parent->name : '';
    }

    /**
     * Возвращает данные о бренде товара
     */
    public function getBrand() {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }

    /**
     * Возвращает наименование бренда товара
     */
    public function getBrandName() {
        $brand = $this->brand;
        return $brand ? $brand->name : '';
    }

    /**
     * Правила валидации полей формы при создании и редактировании товара
     */
    public function rules() {
        return [
            [['category_id', 'brand_id', 'name'], 'required'],
            [['category_id', 'brand_id', 'hit', 'new', 'sale'], 'integer'],
            [['content'], 'string'],
            [['price'], 'number'],
            [['name', 'keywords', 'description', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * Возвращает имена полей формы для создания и редактирования товара
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'brand_id' => 'Бренд',
            'name' => 'Наименование',
            'content' => 'Описание',
            'price' => 'Цена',
            'keywords' => 'Мета-тег keywords',
            'description' => 'Мета-тег description',
            'image' => 'Изображение',
            'hit' => 'Лидер продаж',
            'new' => 'Новинка',
            'sale' => 'Распродажа',
        ];
    }
}