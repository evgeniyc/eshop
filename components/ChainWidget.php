<?php
namespace app\components;

use app\models\Category;
use yii\base\Widget;
use Yii;

/**
 * Виджет для вывода цепочки навигации (хлебные крошки)
 */
class ChainWidget extends Widget {

    /**
     * Идентификатор текущей категории
     */
    public $itemCurrent;

    /**
     * Показывать текущую категорию?
     */
    public $showCurrent = true;

    public function run() {
        if (empty($this->itemCurrent)) {
            return '';
        }
        // пробуем извлечь данные из кеша
        $show = $this->showCurrent ? 'true' : 'false';
        $key = 'widget-chain-'.$this->itemCurrent.'-show-'.$show;
        $html = Yii::$app->cache->get($key);
		$html = false;

        if ($html === false) {
            // данных нет в кеше, получаем их заново
            //$chain = (new Category())->getParent($this->itemCurrent);
			$chain = Category::parents($this->itemCurrent);
			if (!$this->showCurrent) {
                array_pop($chain);
            }
            $html = $this->render('chain', ['chain' => $chain]);
            // сохраняем полученные данные в кеше
            Yii::$app->cache->set($key, $html, 25);
			
			//$cat = Category::findOne($this->itemCurrent);
			$html = $this->render('chain', ['chain' => $chain]);
        }
        return $html;
    }

}