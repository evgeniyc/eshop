<?php
namespace app\controllers;

use app\models\Product;
use Yii;

class PageController extends AppController {
    /*
     * Главная страница сайта
     */
    public function actionIndex() {
        // получаем лидеров продаж
        $hitProducts = Yii::$app->cache->get('hit-products');
        if ($hitProducts === false) {
            $hitProducts = Product::find()->where(['hit' => 1])->limit(3)->asArray()->all();
            Yii::$app->cache->set('hit-products', $hitProducts);
        }
        // получаем новые товары
        $newProducts = Yii::$app->cache->get('new-products');
        if ($newProducts === false) {
            $newProducts = Product::find()->where(['new' => 1])->limit(3)->asArray()->all();
            Yii::$app->cache->set('new-products', $newProducts);
        }
        // получаем товары распродажи
        $saleProducts = Yii::$app->cache->get('sale-products');
        if ($saleProducts === false) {
            $saleProducts = Product::find()->where(['sale' => 1])->limit(3)->asArray()->all();
            Yii::$app->cache->set('sale-products', $saleProducts);
        }

        // устанавливаем мета-теги для страницы
        $this->setMetaTags();

        return $this->render(
            'index',
            compact('hitProducts', 'newProducts', 'saleProducts')
        );
    }
}