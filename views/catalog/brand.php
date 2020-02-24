<?php
/*
 * Страница списка товаров бренда, файл views/catalog/brand.php
 */

use app\components\TreeWidget;
use app\components\BrandsWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>

<section>
    <div class="container">
	
        <div class="row no-gutters row-flex">
            <div class="col-sm-3">
                <div id="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="category-products">
                        <?= TreeWidget::widget(); ?>
                    </div>

                    <h2>Бренды</h2>
                    <div class="brand-products">
                        <?= BrandsWidget::widget(); ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9">
				<div id="main-part">
					<?php if (!empty($products)): /* выводим товары бренда */ ?>
                    <h2><?= Html::encode($brand['name']); ?></h2>
                    <div class="row">
                        <?php foreach ($products as $product): ?>
                            <div class="col-sm-4">
                                <div class="product-wrapper text-center">
                                    <?=
                                    Html::img(
                                        '@web/images/products/medium/'.$product['image'],
                                        ['alt' => $product['name'], 'class' => 'img-responsive']
                                    );
                                    ?>
                                    <h2><?= $product['price']; ?> руб.</h2>
                                    <p>
                                        <a href="<?= Url::to(['catalog/product', 'id' => $product['id']]); ?>">
                                            <?= Html::encode($product['name']); ?>
                                        </a>
                                    </p>
                                    <a href="#" class="btn btn-warning">
                                        <i class="fa fa-shopping-cart"></i>
                                        Добавить в корзину
                                    </a>
                                    <?php
                                    if ($product['new']) { // новинка?
                                        echo Html::img(
                                            '@web/images/home/new.png',
                                            ['alt' => 'Новинка', 'class' => 'new']
                                        );
                                    }
                                    if ($product['sale']) { // распродажа?
                                        echo Html::img(
                                            '@web/images/home/sale.png',
                                            ['alt' => 'Распродажа', 'class' => 'sale']
                                        );
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?= LinkPager::widget(['pagination' => $pages]); /* постраничная навигация */ ?>
                <?php else: ?>
                    <p>Нет товаров у этого бренда.</p>
                <?php endif; ?>
				</div>
            </div>
        </div>
    </div>
</section>
<div id="zero" class="row"></div>