<?php
/*
 * Главная страница каталога, файл views/catalog/index.php
 */

use app\components\TreeWidget;
use app\components\BrandsWidget;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "Главная";
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
					<?php if (!empty($roots)): ?>
						<h2>Категории</h2>
						<div class="row no-gutters">
							<?php foreach ($roots as $root): ?>
								<div class="col-6 col-sm-4 col-md-3">
									<div class="product-wrapper text-center">
										<a href="<?= Url::to(['catalog/category', 'id' => $root['id']]); ?>">
											<p class="product-title"><?= Html::encode($root['name']); ?></p>
											
											<?=
												Html::img(
												'@web/images/categories/thumb/'.$root['image'],
												['alt' => $root['name'], 'class' => 'img-responsive']
											);
											?>
											<p class="cat-descr"><?= Html::encode($root['content']); ?></p>
										</a>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if (!empty($brands)): ?>
						<h2>Популярные бренды</h2>
						<div class="row no-gutters">
							<?php foreach ($brands as $brand): ?>
								<div class="col-6 col-sm-4 col-md-3">
									<div class="product-wrapper text-center">
										<a href="<?= Url::to(['catalog/brand', 'id' => $brand['id']]); ?>">
											<!--<p class="product-title"><?= Html::encode($brand['name']); ?></p>-->
											
											<?=
												Html::img(
												'@web/images/brands/thumb/'.$brand['image'],
												['alt' => $brand['name'], 'class' => 'img-responsive']
											);
											?>
											<!--<p><?= Html::encode($brand['content']); ?></p>-->
										</a>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<div id="zero" class="row"></div>