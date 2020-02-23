<?php
namespace app\controllers;

use yii\web\Controller;
use Yii;
use app\models\Page;

class AppController extends Controller {

    /**
     * Метод устанавливает мета-теги для страницы сайта
     * @param string $title
     * @param string $keywords
     * @param string $description
     */
	 
	 public $pageMenu;
	 
	 public function beforeAction($action) {
        $this->pageMenu = Page::getTree();
        return parent::beforeAction($action);
    }
	 
	 public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
	 
    protected function setMetaTags($title = '', $keywords = '', $description = '') {
        $this->view->title = $title ?: Yii::$app->name;
        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $keywords ?: Yii::$app->params['defaultKeywords']
        ]);
        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => $description ?: Yii::$app->params['defaultDescription']
        ]);
    }
}