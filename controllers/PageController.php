<?php
namespace app\controllers;

use app\models\Product;
use app\models\Page;
use Yii;

class PageController extends AppController {
    /*
     * Главная страница сайта
     */
    public function actionIndex() {
        // получаем лидеров продаж
        $hitProducts = Yii::$app->cache->get('hit-products');
		$hitProducts = false;
        if ($hitProducts === false) {
            $hitProducts = Product::find()->where(['hit' => 1])->limit(3)->asArray()->all();
            Yii::$app->cache->set('hit-products', $hitProducts, 25);
        }
        // получаем новые товары
        $newProducts = Yii::$app->cache->get('new-products');
        if ($newProducts === false) {
            $newProducts = Product::find()->where(['new' => 1])->limit(3)->asArray()->all();
            Yii::$app->cache->set('new-products', $newProducts, 25);
        }
        // получаем товары распродажи
        $saleProducts = Yii::$app->cache->get('sale-products');
        if ($saleProducts === false) {
            $saleProducts = Product::find()->where(['sale' => 1])->limit(3)->asArray()->all();
            Yii::$app->cache->set('sale-products', $saleProducts, 25);
        }
		// устанавливаем мета-теги для страницы
        $this->setMetaTags();

        return $this->render(
            'index',
            compact('hitProducts', 'newProducts', 'saleProducts')
        );
    }
	
	public function actionView($slug) {
        if ($page = Page::find()->where(['slug' => $slug])->one()) {
            $this->setMetaTags(
                $page->name,
                $page->keywords,
                $page->description
            );
            return $this->render(
                'view',
                ['page' => $page]
            );
        }
        throw new NotFoundHttpException('Запрошенная страница не найдена');
    }
	
	public function actionTest() {
		$data = Page::getTree();
		return $this->render(
                'test',
                ['data' => $data]);
	}
}