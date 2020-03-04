<?php
/*
 * Страница раздела каталога, файл views/catalog/category.php
 */

use app\components\TreeWidget;
use app\components\BrandsWidget;
use app\components\ChainWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use rmrevin\yii\fontawesome\FAS;
use yii\bootstrap\Modal;
?>

<section>
    <div class="container">
	<?= ChainWidget::widget(['itemCurrent' => $category['id'], 'showCurrent' => true]); ?>
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
					<?php if (!empty($products)): ?>
                    <h2>Категория: <?= Html::encode($category['name']); ?></h2>
                    <div class="row no-gutters">
                        <?php foreach ($products as $product): ?>
                            <div class="col-6 col-sm-4 col-md-3">
                                <div class="product-wrapper text-center">
									<a href="<?= Url::to(['catalog/product', 'id' => $product['id']]); ?>">
										<p class="product-title"><?= Html::encode($product['name']); ?></p>
										<p class="product-info"><?php
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
										</p>
										<?=
										Html::img(
											'@web/images/products/medium/'.$product['image'],
											['alt' => $product['name'], 'class' => 'img-responsive']
										);
										?>
										<p class="product-price">Цена: <?= $product['price']; ?> грн.</p>
									</a>
                                    <form method="post"
                                          action="<?= Url::to(['basket/add']); ?>">
                                        <input type="hidden" name="id"
                                               value="<?= $product['id']; ?>">
                                        <?=
                                        Html::hiddenInput(
                                            Yii::$app->request->csrfParam,
                                            Yii::$app->request->csrfToken
                                        );
                                        ?>
                                        <button type="submit" class="btn btn-warning">
                                            <i class="fa fa-shopping-cart"></i>
                                            Добавить в корзину
                                        </button>
                                    </form>
									<button class="btn btn-warning add-to-basket">
                                            <i class="fa fa-shopping-cart"></i>
                                            Добавить в корзину
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

					<?= LinkPager::widget(['pagination' => $pages]); /* постраничная навигация */ ?>
					<?php else: ?>
						<p>Нет товаров в этой категории.</p>
					<?php endif; ?>
				</div>
            </div>
        </div>
    </div>
</section>
<div id="zero" class="row"></div>
<div id="ajax-answer"></div>
<?php
Modal::begin([
    'header' => '<h2>Заказ добавлен.</h2>',
    'id' => 'basket-message',
    //'size'=>'modal-lg',
    //'footer' => $footer
]);
	echo 'Ваш заказ успешно добавлен в корзину.';
Modal::end();
?>