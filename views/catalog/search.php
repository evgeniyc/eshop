<?php
/*
 * Страница результатов поиска по каталогу, файл views/catalog/search.php
 */

use app\components\TreeWidget;
use app\components\BrandsWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
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
                <?php if (!empty($products)): ?>
                    <h2>Результаты поиска по каталогу</h2>
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
                    <p>По вашему запросу ничего не найдено.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>