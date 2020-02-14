<?php
namespace app\models;

use yii\data\Pagination;
use yii\db\ActiveRecord;
use Yii;

class Category extends ActiveRecord {

    /**
     * Метод возвращает имя таблицы БД
     */
    public static function tableName() {
        return 'category';
    }

    /**
     * Метод описывает связь таблицы БД `category` с таблицей `product`
     */
    public function getProducts() {
        // связь таблицы БД `category` с таблицей `product`
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }

    /**
     * Метод описывает связь таблицы БД `category` с таблицей `category`
     */
    public function getParent() {
        return $this->hasOne(self::class, ['id' => 'parent_id']);
    }

	/**
     * Метод создает цепочку категорий от заданной $id
     */
    public static function Parents($id) {
		$current = self::findOne($id);
		$chain[0]['id'] = $current->id;
		$chain[0]['name'] = $current->name;
		if ($current->parent_id == 0)
			return $chain;
		$i = 1;
		do {
			$current = $current->parent;
			$chain[$i]['id'] = $current->id;
			$chain[$i]['name'] = $current->name;
			$i++;
		} while($current->parent_id > 0);
		
        return array_reverse($chain);
    }
	
    /**
     * Метод описывает связь таблицы БД `category` с таблицей `category`
     */
    public function getChildren() {
        return $this->hasMany(self::class, ['parent_id' => 'id']);
    }

    /**
     * Возвращает информацию о категории с иденификатором $id
     */
    public function getCategory($id) {
        return self::find()->where(['id' => $id])->asArray()->one();
    }

    /**
     * Возвращает массив всех товаров в категории с идентификатором $id
     * и в ее потомках, т.е. в дочерних, дочерних-дочерних и так далее
     */
    public function getCategoryProducts($id) {
        // получаем массив идентификаторов всех потомков категории
        $ids = $this->getAllChildIds($id);
        $ids[] = $id;
        // для постаничной навигации получаем только часть товаров
        $query = Product::find()->where(['in', 'category_id', $ids]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => Yii::$app->params['pageSize'],
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $query
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->asArray()
            ->all();
        return [$products, $pages];
    }

    /**
     * Возвращает массив идентификаторов всех потомков категории $id,
     * т.е. дочерние, дочерние дочерних и так далее
     */
    protected function getAllChildIds($id) {
        $children = [];
        $ids = $this->getChildIds($id);
        foreach ($ids as $item) {
            $children[] = $item;
            $c = $this->getAllChildIds($item);
            foreach ($c as $v) {
                $children[] = $v;
            }
        }
        return $children;
    }

    /**
     * Возвращает массив идентификаторов дочерних категорий (прямых
     * потомков) категории с уникальным идентификатором $id
     */
    protected function getChildIds($id) {
        $children = self::find()->where(['parent_id' => $id])->asArray()->all();
        $ids = [];
        foreach ($children as $child) {
            $ids[] = $child['id'];
        }
        return $ids;
    }
}