<?php
/*
 * Главная страница сайта, файл views/page/index.php
 */

use app\components\TreeWidget;
use app\components\BrandsWidget;
use yii\helpers\Url;
use yii\helpers\Html;
?>
<section>
    <div class="container">
        <!-- Слайдер из трех элементов -->
        <div id="slider" class="carousel slide" data-ride="carousel">
            <!-- Индикатор текущего элемента -->
            <ol class="carousel-indicators">
                <!-- Активный элемент -->
                <li data-target="#slider" data-slide-to="0" class="active"></li>
                <li data-target="#slider" data-slide-to="1"></li>
                <li data-target="#slider" data-slide-to="2"></li>
            </ol>

            <!-- Обертка для слайдов -->
            <div class="carousel-inner" role="listbox">
                <!-- Активный элемент -->
                <div class="item active">
                    <img src="images/slider/1.jpg" alt="...">
                    <div class="carousel-caption">Бытовая техника</div>
                </div>
                <div class="item">
                    <img src="images/slider/2.jpg" alt="...">
                    <div class="carousel-caption">Электроника</div>
                </div>
                <div class="item">
                    <img src="images/slider/3.jpg" alt="...">
                    <div class="carousel-caption">Стройматериалы</div>
                </div>
            </div>

            <!-- Элементы управления -->
            <a class="left carousel-control" href="#carousel-example"
               role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Предыдущий</span>
            </a>
            <a class="right carousel-control" href="#carousel-example"
               role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Следующий</span>
            </a>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                    <h2>Каталог</h2>
                    <div class="category-products">
                        <?= TreeWidget::widget(); ?>
                    </div>

                    <h2>Бренды</h2>
                    <div class="brand-products">
                        <?= BrandsWidget::widget(); ?>
                    </div>
            </div>

            <div class="col-sm-9">
                <?php if (!empty($hitProducts)): ?>
                    <h2>Лидеры продаж</h2>
                    <div class="row">
                        <?php foreach ($hitProducts as $hit): ?>
                            <div class="col-sm-4">
                                <div class="product-wrapper text-center">
                                    <?=
                                    Html::img(
                                        '@web/images/products/medium/'.$hit['image'],
                                        ['alt' => $hit['name'], 'class' => 'img-responsive']
                                    );
                                    ?>
                                    <h2><?= $hit['price']; ?> руб.</h2>
                                    <p>
                                        <a href="<?= Url::to(['catalog/product', 'id' => $hit['id']]); ?>">
                                            <?= Html::encode($hit['name']); ?>
                                        </a>
                                    </p>
                                    <a href="#" class="btn btn-warning">
                                        <i class="fa fa-shopping-cart"></i>
                                        Добавить в корзину
                                    </a>
                                    <?php
                                    if ($hit['new']) { // новинка?
                                        echo Html::img(
                                            '@web/images/home/new.png',
                                            ['alt' => 'Новинка', 'class' => 'new']
                                        );
                                    }
                                    if ($hit['sale']) { // распродажа?
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
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>