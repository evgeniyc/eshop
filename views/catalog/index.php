<?php
/*
 * Главная страница каталога, файл views/catalog/index.php
 */

use app\components\TreeWidget;
use app\components\BrandsWidget;
use yii\helpers\Html;
use yii\helpers\Url;
?>

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
                <?php if (!empty($roots)): ?>
                    <h2>Категории</h2>
                    <div class="row">
                        <?php foreach ($roots as $root): ?>
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <?=
                                    Html::img(
                                        '@web/images/categories/thumb/'.$root['image'],
                                        ['alt' => $root['name']]
                                    );
                                    ?>
                                    <div class="caption">
                                        <h2>
                                            <a href="<?= Url::to(['catalog/category', 'id' => $root['id']]); ?>">
                                                <?= Html::encode($root['name']); ?>
                                            </a>
                                        </h2>
                                        <p><?= Html::encode($root['content']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($brands)): ?>
                    <h2>Популярные бренды</h2>
                    <div class="row">
                        <?php foreach ($brands as $brand): ?>
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <?=
                                    Html::img(
                                        '@web/images/brands/thumb/'.$brand['image'],
                                        ['alt' => $brand['name']]
                                    );
                                    ?>
                                    <div class="caption">
                                        <h2>
                                            <a href="<?= Url::to(['catalog/brand', 'id' => $brand['id']]); ?>">
                                                <?= Html::encode($brand['name']); ?>
                                            </a>
                                        </h2>
                                        <p><?= Html::encode($brand['content']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>